<?php

/**
 * AdminPost.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os consultors no Admin do sistema!
 * 
 * @copyright (c) 2014, Robson V. Leite UPINSIDE TECNOLOGIA
 */
class Contato {

    private $Data;
    private $ID;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'contato';

    /**
     * <b>Cadastrar o ID:</b> Envelope os dados do consultor em um array atribuitivo e execute esse método
     * para cadastrar o consultor. Envia a capa automaticamente!
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        $this->checkData();
        $this->setData();

        if ($this->Result):
            $this->Create();
        endif;
    }

    /**
     * <b>Atualizar ID:</b> Envelope os dados em uma array atribuitivo e informe o id de um 
     * consultor para atualiza-lo na tabela!
     * @param INT $FormID = Id do consultor
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeUpdate($FormID, array $Data) {
        $this->ID = (int) $FormID;
        $this->Data = $Data;

        $this->checkData();
        $this->setData();

        if ($this->Result):
            $this->Update();
        endif;
    }

    /**
     * <b>Deleta ID:</b> Informe o ID do consultor a ser removido para que esse método realize uma checagem de
     * pastas e galerias excluinto todos os dados nessesários!
     * @param INT $FormID = Id do consultor
     */
    public function ExeDelete($FormID) {
        $this->ID = (int) $FormID;

        $ReadPost = new Read;
        $ReadPost->ExeRead(self::Entity, "WHERE consultor_id = :consultor", "consultor={$this->ID}");

        if (!$ReadPost->getResult()):
            $this->Error = ["O consultor que você tentou deletar não existe no sistema!", KFR_ERROR];
            $this->Result = false;
        else:
            $PostDelete = $ReadPost->getResult()[0];
            if (file_exists('../uploads/' . $PostDelete['consultor_foto']) && !is_dir('../uploads/' . $PostDelete['consultor_foto'])):
                unlink('../uploads/' . $PostDelete['consultor_foto']);
            endif;

           

            $deleta = new Delete;
            $deleta->ExeDelete("ws_consultors_gallery", "WHERE consultor_id = :gbconsultor", "gbconsultor={$this->ID}");
            $deleta->ExeDelete(self::Entity, "WHERE consultor_id = :consultorid", "consultorid={$this->ID}");

            $this->Error = ["O consultor <b>{$PostDelete['consultor_nome']}</b> foi removido com sucesso do sistema!", KFR_SUCESSO];
            $this->Result = true;

        endif;
    }



    /**
     * <b>Ativa/Inativa ID:</b> Informe o ID do consultor e o status e um status sendo 1 para ativo e 0 para
     * rascunho. Esse méto ativa e inativa os consultors!
     * @param INT $FormID = Id do consultor
     * @param STRING $PostStatus = 1 para ativo, 0 para inativo
     */
    public function ExeStatus($FormID, $PostStatus) {
        $this->ID = (int) $FormID;
        $this->Data['consultor_status'] = (string) $PostStatus;
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE consultor_id = :id", "id={$this->ID}");
    }

   

    /**
     * <b>Verificar Cadastro:</b> Retorna ID do registro se o cadastro for efetuado ou FALSE se não.
     * Para verificar erros execute um getError();
     * @return BOOL $Var = InsertID or False
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com uma mensagem e o tipo de erro.
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
        
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */




    //Verifica os dados digitados no formulário
    private function checkData() {
        if (in_array(' ', $this->Data)):
            $this->Error = ["Existem campos em branco. Favor preencha todos os campos!", KFR_ALERTA];
            $this->Result = false;
        else:

            $this->Result = true;
        endif;
    }



    //Valida e cria os dados para realizar o cadastro
    private function setData() {
       
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);
        

        

    }







    //Cadastra o consultor no banco!
    private function Create() {
        $cadastra = new Create;
        $cadastra->ExeCreate(self::Entity, $this->Data);
        
        if ($cadastra->getResult()){

            $this->Error = ["O dizimista {$this->Data['NOME']} foi cadastrado com sucesso no sistema!", KFR_SUCESSO];
            $this->Result = $cadastra->getResult();
            
        }else{
            $this->Error = ["O dizimista {$this->Data['NOME']} ERRO!", KFR_ERRO];
        }
    }

    //Atualiza o consultor no banco!
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE ID = :id", "id={$this->ID}");
        if ($Update->getResult()):
            $this->Error = ["O dizimista <b>{$this->Data['NOME']}</b> foi atualizado com sucesso no sistema!", KFR_SUCESSO];
            $this->Result = true;
        endif;
    }

}
