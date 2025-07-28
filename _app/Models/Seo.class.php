<?php

/**
 * Seo [ MODEL ]
 * Classe de apoio para o modelo LINK. Pode ser utilizada para gerar SSEO para as páginas do sistema!
 * 
 * @copyright (c) 2014, Robson V. Leite UPINSIDE TECNOLOGIA
 */
class Seo {

    private $File;
    private $Link;
    private $Data;
    private $Tags;

    /* DADOS POVOADOS */
    private $seoTags;
    private $seoData;

    function __construct($File, $Link) {
        $this->File = strip_tags(trim($File));
        $this->Link = strip_tags(trim($Link));

    }

    /**
     * <b>Obter MetaTags:</b> Execute este método informando os valores de navegação para que o mesmo obtenha
     * todas as metas como title, description, og, itemgroup, etc.
     * 
     * <b>Deve ser usada com um ECHO dentro da tag HEAD!</b>
     * @return HTML TAGS =  Retorna todas as tags HEAD
     */
    public function getTags() {
        $this->checkData();
        return $this->seoTags;
    }

    /**
     * <b>Obter Dados:</b> Este será automaticamente povoado com valores de uma tabela single para arquivos
     * como categoria, artigo, etc. Basta usar um extract para obter as variáveis da tabela!
     * 
     * @return ARRAY = Dados da tabela
     */
    public function getData() {
        $this->checkData();
        return $this->seoData;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Verifica o resultset povoando os atributos
    private function checkData() {
        if (!$this->seoData):
            $this->getSeo();
        endif;
    }




    //Identifica o arquivo e monta o SEO de acordo
    private function getSeo() {
        $ReadSeo = new Read;


        switch ($this->File):



            case '':
                $this->Data = [
                    SITENAME ,
                    SITEDESC,
                    BASE,
                    INCLUDE_PATH . '/_img/logo-dark.png',
                    'website',
                    'colegio dinamico, colegio dinamico bauru, dinamico vestibulares, vest, matrículas abertas, escola particular, bauru, escola bauru, medicina, aprovados, melhor escola de bauru, 42 anos, educação, poliedro, concurso de bolsas, educação infantil, ensino fundamental 1, ensino fundamental 2, berçario, ensino médio, cursinho, curso pré-vestibular'
                ];
                break;  
           
  

            case 'index':
                $this->Data = [
                    SITENAME ,
                    SITEDESC,
                    BASE,
                    INCLUDE_PATH . '/_img/logo-dark.png',
                    'website',
                    'colegio dinamico, colegio dinamico bauru, dinamico vestibulares, vest, matrículas abertas, escola particular, bauru, escola bauru, medicina, aprovados, melhor escola de bauru, 42 anos, educação, poliedro, concurso de bolsas, educação infantil, ensino fundamental 1, ensino fundamental 2, berçario, ensino médio, cursinho, curso pré-vestibular'
                ];
                break;  



            case 'educacaoinfantil':
                $this->Data = [
                     'Educação Infantil - ' .SITENAME ,
                    'Educação Infantil - ' .SITEDESC,
                    BASE . '/educacaoinfantil',
                    INCLUDE_PATH . '/_img/logo-dark.png',
                    'website',
                    'colegio dinamico, colegio dinamico bauru, dinamico vestibulares, vest, matrículas abertas, escola particular, bauru, escola bauru, medicina, aprovados, melhor escola de bauru, 42 anos, educação, poliedro, concurso de bolsas, educação infantil, ensino fundamental 1, ensino fundamental 2, berçario, ensino médio, cursinho, curso pré-vestibular'
                ];
                break;  

            case 'bercario':
                $this->Data = [
                     'Berçário - ' .SITENAME ,
                    'Berçário - ' .SITEDESC,
                    BASE . '/bercario',
                    INCLUDE_PATH . '/_img/logo-dark.png',
                    'website',
                    'colegio dinamico, colegio dinamico bauru, dinamico vestibulares, vest, matrículas abertas, escola particular, bauru, escola bauru, medicina, aprovados, melhor escola de bauru, 42 anos, educação, poliedro, concurso de bolsas, educação infantil, ensino fundamental 1, ensino fundamental 2, berçario, ensino médio, cursinho, curso pré-vestibular'
                ];
                break;  

            case 'ensinofundamental1':
                $this->Data = [
                     'Ensino Fundamental I - ' .SITENAME ,
                    'Ensino Fundamental I - ' .SITEDESC,
                    BASE . '/ensinofundamental1',
                    INCLUDE_PATH . '/_img/logo-dark.png',
                    'website',
                    'colegio dinamico, colegio dinamico bauru, dinamico vestibulares, vest, matrículas abertas, escola particular, bauru, escola bauru, medicina, aprovados, melhor escola de bauru, 42 anos, educação, poliedro, concurso de bolsas, educação infantil, ensino fundamental 1, ensino fundamental 2, berçario, ensino médio, cursinho, curso pré-vestibular'
                ];
                break;  

            case 'ensinofundamental2':
                $this->Data = [
                     'Ensino Fundamental II - ' .SITENAME ,
                    'Ensino Fundamental II - ' .SITEDESC,
                    BASE . '/ensinofundamental2',
                    INCLUDE_PATH . '/_img/logo-dark.png',
                    'website',
                    'colegio dinamico, colegio dinamico bauru, dinamico vestibulares, vest, matrículas abertas, escola particular, bauru, escola bauru, medicina, aprovados, melhor escola de bauru, 42 anos, educação, poliedro, concurso de bolsas, educação infantil, ensino fundamental 1, ensino fundamental 2, berçario, ensino médio, cursinho, curso pré-vestibular'
                ];
                break; 


            case 'ensinomedio':
                $this->Data = [
                     'Ensino Médio - ' .SITENAME ,
                    'Ensino Médio - ' .SITEDESC,
                    BASE . '/ensinomedio',
                    INCLUDE_PATH . '/_img/logo-dark.png',
                    'website',
                    'colegio dinamico, colegio dinamico bauru, dinamico vestibulares, vest, matrículas abertas, escola particular, bauru, escola bauru, medicina, aprovados, melhor escola de bauru, 42 anos, educação, poliedro, concurso de bolsas, educação infantil, ensino fundamental 1, ensino fundamental 2, berçario, ensino médio, cursinho, curso pré-vestibular'
                ];
                break;  

           // case 'empresa':
           //      $this->Data = [
           //          'Empresa - '.SITENAME,
           //          "A Majister Consultoria & Assessoria Farmacêutica empresa que teve inicio de suas atividades em meados de 2013 em Bauru - SP, teve inicio no varejo farmacêutico...",
           //          BASE . '/empresa',
           //          INCLUDE_PATH . '/img/site.jpg',
           //          'website',
           //          'empresa, majister'
           //      ];
           //      break;  


          
            //SEO:: 404
            default :
                $this->Data = [SITENAME . ' - 404 Oppsss, Nada encontrado! Mas continue vasculhando pelo meu site.', SITEDESC, BASE . '/404', INCLUDE_PATH . '/img/site.jpg'];

        endswitch;

        if ($this->Data):
            $this->setTags();
        endif;
    }

    //Monta e limpa as tags para alimentar as tags
    private function setTags() {
        $this->Tags['Title'] = $this->Data[0];
        $this->Tags['Content'] = Check::Words(html_entity_decode($this->Data[1]), 25);
        $this->Tags['Link'] = $this->Data[2];
        $this->Tags['Image'] = $this->Data[3];
        // $this->Tags['Type'] = $this->Data[4];
        if(isset($this->Data[5])){
            $this->Tags['Keywords'] = $this->Data[5];
        }
        

        $this->Tags = array_map('strip_tags', $this->Tags);
        $this->Tags = array_map('trim', $this->Tags);


        $this->Data = null;

        //NORMAL PAGE
        $this->seoTags = '<title>' . $this->Tags['Title'] . '</title> ' . "\n";
        $this->seoTags .= '<meta name="description" content="' . $this->Tags['Content'] . '"/>' . "\n";

        $this->seoTags .= '<meta name="robots" content="index, follow">' . "\n";
        $this->seoTags .= '<meta name="revisit-after" content="1 Day">' . "\n"; 
        $this->seoTags .= '<meta name="googlebot" content="index, follow">' . "\n";

        if(isset($this->Data[5])){
            $this->seoTags .= '<meta name="keywords" content="'.$this->Tags['Keywords'].'"/>'."\n";
        }
       
        


        $this->seoTags .= '<link rel="canonical" href="' . $this->Tags['Link'] . '">' . "\n";
        
        // $this->seoTags .= '<meta name="keywords" content="'. $this->Tags['Keywords']. '"/>' ."\n";
        

        //FACEBOOK
        $this->seoTags .= '<meta property="og:site_name" content="' . SITENAME . '" />' . "\n";
        $this->seoTags .= '<meta property="og:locale" content="pt_BR" />' . "\n";
        $this->seoTags .= '<meta property="og:title" content="' . $this->Tags['Title'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:description" content="' . $this->Tags['Content'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:image" content="' . $this->Tags['Image'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:image:type" content="image/jpeg" />' . "\n";
        $this->seoTags .= '<meta property="og:image:width" content="500" />' . "\n";
        $this->seoTags .= '<meta property="og:url" content="' . $this->Tags['Link'] . '" />' . "\n";
        // $this->seoTags .= '<meta property="og:type" content="' . $this->Tags['Type'] . '" />' . "\n";
        $this->seoTags .= "\n";

        //ITEM GROUP (TWITTER)
        $this->seoTags .= '<meta itemprop="name" content="' . $this->Tags['Title'] . '">' . "\n";
        $this->seoTags .= '<meta itemprop="description" content="' . $this->Tags['Content'] . '">' . "\n";
        $this->seoTags .= '<meta itemprop="url" content="' . $this->Tags['Link'] . '">' . "\n";

        $this->Tags = null;
    }

}
