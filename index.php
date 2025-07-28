<?php



ob_start();


if($_SERVER['SERVER_NAME'] == 'www.dinamicovestibulares.com.br'){

 	require('_config.php');

 }else{

 	require('_config-local.php');

 }


require_once('./_app/Library/PHPMailer/class.phpmailer.php');


$Session = new Session;

date_default_timezone_set("America/Sao_Paulo");

setlocale(LC_ALL, 'pt_BR');


?>

<!DOCTYPE html>

	<html lang="pt-br" class="no-js"> 

		<head>   <!-- ALWAYS IN MY MIND -->
		<!--        *-*-*-*       META  INICIAIS - CONSTANTES  *-*-*-             -->

		<meta charset="UTF-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<meta name="author" content="Tiago Myller">



<!--               GUARDAR OU NÃO GUARDAR O CACHE?              -->



	<!-- <meta http-equiv="pragma" content="no-cache" /> --> 


<!--               META TAGS FACEBOOK              -->


<!--              CONSTRUÇÃO DO SEO PAGINAÇÃO              -->



<!-- WORK HARD -->


	<?php

		$Link = new Link;
		$Link->getTags();




	?>





		<!--  FAV ICONS PARA TODOS OS GOSTOS - REVISAR NECESSIDADE              -->



		<link rel="shortcut icon" type="image/x-icon" href="<?=BASE?>/fav/favicon.ico">



		<link rel="icon" href="<?=BASE?>/fav/favicon.ico" type="image/x-icon">



		<link rel="apple-touch-icon" sizes="180x180" href="<?=BASE?>/fav/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=BASE?>/fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=BASE?>/fav/favicon-16x16.png">
		<link rel="manifest" href="<?=BASE?>/fav/site.webmanifest">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">




    <?php require(REQUIRE_PATH . '/inc/_css.inc.php'); ?>



<!-- 
	<script type="text/javascript" src="<?=REQUIRE_PATH?>/_assets/js/modernizr.js"></script> -->
<!-- Meta Pixel Code -->



<!-- <script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '314119215633818');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=314119215633818&ev=PageView&noscript=1"
/></noscript> -->




<!-- End Meta Pixel Code -->


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16622870538">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-16622870538');
</script>



</head>     <!-- ALWAYS IN MY MIND -->








 <!--     YOUR BODY IS BEAUTIFUL              -->



    
	 <?php require(REQUIRE_PATH . '/inc/_body.inc.php');  /*include_once(REQUIRE_PATH . '/inc/loader.inc.php');  */ ?> 



		<!--                FACEBOOK - CRAZY - REVISAR              -->


		<!--               GOOGLE ANALYTICS WORKING              -->



   <?php 


   	if(BASE == 'http://www.tiagomyller.com'){

   		include_once("analyticstracking.php");
   	}



		/* CONSTRUINDO PAGINAS - NAVEGAÇÃO CAPITÃO */



		require(REQUIRE_PATH . '/inc/_header.inc.php'); 


		// require(REQUIRE_PATH . '/inc/sidebar.inc.php');     


		if (!require($Link->getPatch())):
			Ops('Erro ao incluir arquivo de navegação!', DANGER, true);
		endif;


		require(REQUIRE_PATH . '/inc/_footer.inc.php');

		?>



		<!--                VOLTAR AO TOPO              -->


	</div>



	<!--==========================================



                  SCRIPTS



	===========================================-->




   

        <!--========== END JAVASCRIPTS ==========-->



		</body> <!--     YOUR BODY IS BEAUTIFUL              -->


 <?php require(REQUIRE_PATH . '/inc/_js.inc.php'); ?>


	</html>



	<?php



	ob_end_flush();



