<?php

/**
 * Login.class [ MODEL ]
 * Responável por autenticar, validar, e checar usuário do sistema de login!
 * 
 * @copyright (c) 2014, Robson V. Leite UPINSIDE TECNOLOGIA
 */
class Login {



    private $Level;
    private $Login;
    private $Senha;
    private $Error;
    private $Result;

    /**
     * <b>Informar Level:</b> Informe o nível de acesso mínimo para a área a ser protegida.
     * @param INT $Level = Nível mínimo para acesso
     */
    function __construct($Level) {
        $this->Level = (int) $Level;
    }

    /**
     * <b>Efetuar Login:</b> Envelope um array atribuitivo com índices STRING user [email], STRING pass.
     * Ao passar este array na ExeLogin() os dados são verificados e o login é feito!
     * @param ARRAY $UserData = user [email], pass
     */
    public function ExeLogin(array $UserData) {


        $this->Login = (string) strip_tags(trim($UserData['LOGIN']));
        $this->Senha = (string) strip_tags(trim($UserData['SENHA']));

        
        $this->setLogin();


    }

    /**
     * <b>Verificar Login:</b> Executando um getResult é possível verificar se foi ou não efetuado
     * o acesso com os dados.
     * @return BOOL $Var = true para login e false para erro
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com uma mensagem e um tipo de erro WS_.
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /**
     * <b>Checar Login:</b> Execute esse método para verificar a sessão USERLOGIN e revalidar o acesso
     * para proteger telas restritas.
     * @return BOLEAM $login = Retorna true ou mata a sessão e retorna false!
     */
    public function CheckLogin() {
        if (empty($_SESSION['LoginUsuario']) || $_SESSION['LoginUsuario']['LVL'] < $this->Level):
            unset($_SESSION['LoginUsuario']);

            return false;
        else:
            return true;
        endif;
    }




    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */








    //Valida os dados e armazena os erros caso existam. Executa o login!
    private function setLogin() {
        // if (!$this->Email || !$this->Senha || !Check::Email($this->Email)):
        //     $this->Error = ['Informe seu E-mail e senha para efetuar o login!', KFR_INFO];
        //     $this->Result = false;
        // elseif 

        if(!$this->getUser()):
            $this->Error = ['Os dados informados não são compatíveis!', KFR_ALERTA];
            $this->Result = false;
        elseif ($this->Result['LVL'] < $this->Level):
            $this->Error = ["Desculpe {$this->Result['NOME']}, você não tem permissão para acessar esta área!", KFR_ALERTA];
            $this->Result = false;
        elseif ($this->Result['STATUS'] <> 1):

            $this->Error = ["Desculpe {$this->Result['NOME']}, você não tem permissão para acessar esta área!", KFR_ALERTA];
            $this->Result = false;
        
        else:  


            $this->Execute();
        endif;
    }

    //Vetifica usuário e senha no banco de dados!
    private function getUser() {
        $this->Senha = md5($this->Senha);

        $read = new Read;
        $read->ExeRead("usuario", "WHERE LOGIN = :e AND SENHA = :p", "e={$this->Login}&p={$this->Senha}");




        if ($read->getResult()):
            $this->Result = $read->getResult()[0];
            return true;
        else:
            return false;
        endif;
    }


    private function Ativo(){
        $ativo = new Read;
        $ativo->ExeRead("usuario", "WHERE LOGIN = :e AND LVL = 'Ativo'", "e={$this->Login}");
        if($ativo->getResult()):
            $this->Result = $ativo->getResult()[0];
            return true;
        else:
            return false;
        endif;

    }

    //Executa o login armazenando a sessão!
    private function Execute() {
        if (!session_id()):
            session_start();

        endif;




        $DadosUsuario = $this->Result;

 
        $DadosSessao = [
            "online_session" => session_id(),
            "online_startview" => date('Y-m-d H:i:s'),
            "online_endview" => date('Y-m-d H:i:s', strtotime("+10minutes")),
            "online_ip" => filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP),
            "online_url" => filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT),
            "online_agent" => filter_input(INPUT_SERVER, "HTTP_USER_AGENT", FILTER_DEFAULT)
        ];


        $_SESSION['LoginUsuario'] =  array_merge($DadosUsuario, $DadosSessao);


        $this->Error = ["Olá {$this->Result['NOME']}, seja bem vindo(a). Aguarde redirecionamento!", WS_ACCEPT];
        $this->Result = true;
    }

}
