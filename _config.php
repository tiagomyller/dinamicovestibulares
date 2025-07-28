<?php



// CONFIGRAÇÕES DO BANCO ####################



define('HOST', 'mysql247.umbler.com'); //    



define('USER', 'dvest');      // 



define('PASS', 'v3stibul4res*');         //   



define('DBSA', 'vest_bd');   




// DEFINE SERVIDOR DE E-MAIL ################



define('MAILUSER', 'contato@dinamicovestibulares.com.br'); 

define('MAILPASS', '}*gBS23TiV');

define('MAILPORT', '587');

define('MAILHOST', 'smtp.umbler.com');




// define('MAILUSER', 'vest.mkti@hotmail.com'); 

// define('MAILPASS', 'din@mic071*');

// define('MAILPORT', '587');

// define('MAILHOST', 'smtp-mail.outlook.com');










// DEFINE IDENTIDADE DO SITE ################



define('SITENAME', 'Colégio Dinâmico Bauru | Poliedro - Escola Particular');



// define('SITEDESC', '');



define('SITEDESC', 'Colégio Dinâmico e Dinâmico Vestibulares: Há mais de 42 anos oferecendo excelência em educação. Do Berçário ao Ensino Médio, com foco em desenvolvimento integral, inovação pedagógica e resultados de destaque. Venha fazer parte dessa história de sucesso!"');



// DEFINE A BASE DO SITE ####################



define('BASE', 'https://www.dinamicovestibulares.com.br');  



define('BASE_ADMIN', 'https://www.dinamicovestibulares.com.br/admin'); 


define('THEME', 'proman');







define('INCLUDE_PATH', BASE . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . THEME);



define('REQUIRE_PATH', 'themes' . DIRECTORY_SEPARATOR . THEME);







// AUTO LOAD DE CLASSES ####################



function __autoload($Class) {







    $cDir = ['Conn', 'Helpers', 'Models', 'Library'];



    $iDir = null;











    foreach ($cDir as $dirName):





 





        if (!$iDir && file_exists(__DIR__ . DIRECTORY_SEPARATOR. '_app'. DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php') && !is_dir(__DIR__ . DIRECTORY_SEPARATOR. '_app'. DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php')):

 

            include_once (__DIR__ . DIRECTORY_SEPARATOR. '_app'. DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php');



            $iDir = true;



        endif;



    endforeach;





    if (!$iDir):







        trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);



        die;



    endif;



}













// TRATAMENTO DE ERROS #####################



//CSS constantes :: Mensagens de Erro



define('KFR_SUCESSO', 'alert alert-success alert-dismissible');



define('KFR_INFO', 'alert alert-info alert-dismissible');



define('KFR_ALERTA', 'alert alert-warning alert-dismissible');



define('KFR_ERRO', 'alert alert-danger alert-dismissible');







//FeedBack :: Exibe erros lançados :: Front



function Ops($ErrMsg, $ErrNo, $Tamanho = '12' ,$ErrDie = null) {



    $CssClass = ($ErrNo == E_USER_NOTICE ? KFR_INFO : ($ErrNo == E_USER_WARNING ? KFR_ALERTA : ($ErrNo == E_USER_ERROR ? KFT_ERRO : $ErrNo)));



    echo "<div class=\"col-md-{$Tamanho}  console opensans text-center erro {$CssClass}\" ><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</button>{$ErrMsg}. {$ErrDie}</div>";







    if ($ErrDie):



        



    endif;



}







//PHPErro :: personaliza o gatilho do PHP



function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {



    $CssClass = ($ErrNo == E_USER_NOTICE ? KFR_INFO : ($ErrNo == E_USER_WARNING ? KFR_ALERTA : ($ErrNo == E_USER_ERROR ? KFR_ERRO : $ErrNo)));



    echo "<p class=\"trigger {$CssClass}\">";



    echo "<b>Erro na Linha: #{$ErrLine} ::</b> {$ErrMsg}<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><br>";



    echo "<small>{$ErrFile}</small>";



    echo "<span class=\"ajax_close\"></span></p>";







    if ($ErrNo == E_USER_ERROR):



        die;



    endif;



}







set_error_handler('PHPErro');



















