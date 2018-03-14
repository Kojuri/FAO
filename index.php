<?php
/** 
 * Page d'accueil de l'application French Anime Online

 * Point d'entrée unique de l'application
 * @author Kojuri
 * @package default
 */

session_start();
	if(file_exists('compteur_visites.txt'))
	{
			$compteur_f = fopen('compteur_visites.txt', 'r+');
			$compte = fgets($compteur_f);
	}
	else
	{
			$compteur_f = fopen('compteur_visites.txt', 'a+');
			$compte = 0;
	}
	if(!isset($_SESSION['compteur_de_visite']))
	{
			$_SESSION['compteur_de_visite'] = 'visite';
			$compte++;
			fseek($compteur_f, 0);
			fputs($compteur_f, $compte);
	}
	fclose($compteur_f);
// inclure les bibliothèques de fonctions
require_once 'include/_config.inc.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>French Anime Online</title>
		<meta name ="description" content="Regardez vos animes VOSTFR en ligne ou téléchargez-les directement !" />
		<META NAME="Keywords" CONTENT="anime, streaming, video, mp4, vostfr, japon, download, ddl, telecharger, vf, fr, french, français, telechargement, regarder, en ligne, online">
		<meta charset="UTF-8" />
		<base href="/" />
	    <link rel="icon" type="image/x-icon" href="favicon.ico" />
		<link rel="icon" type="image/png" href="favicon.png" />
		<link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon" href="favicon.png">
		
		<link rel="icon" type="image/png" href="/images/FAO16.png" sizes=16x16>
		<link rel="icon" type="image/png" href="/images/FAO128.png" sizes=128x128>
		<link rel="icon" type="image/png" href="/images/FAO152.png" sizes=152x152>
		<link rel="icon" type="image/png" href="/images/FAO160.png" sizes=160x160>
		<link rel="icon" type="image/png" href="/images/FAO192.png" sizes=192x192>
		<link rel="icon" type="image/png" href="/images/FAO196.png" sizes=196x196>
		<link rel="icon" type="image/png" href="/images/FAO256.png" sizes=256x256>
		<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<meta http-equiv="Content-Type" content="text/html" />-->
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
				function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //for-mobile-apps -->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
		<!--web-fonts-->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">	
</head>
	
    <body>
	<div class="banner" id="home">
	    <?php include("vues/_v_menu.php") ;
 ?>
	
        <?php
        // composants de la page
      //  include("vues/_v_header.php") ;
        
        // Récupère l'identifiant de la page passée par l'URL.
        // Si non défini, on considère que la page demandée est la page d'accueil
        if (isset($_GET["uc"])) {
            $uc = $_GET["uc"];
        }
        else {
            $uc = 'home';
        }
        
        // variables pour la gestion des messages
        $msg = '';    // message passé à la vue v_afficherMessage
        $lien = '';   // message passé à la vue v_afficherErreurs
        
        // charger l'uc selon son identifiant
        switch ($uc) 
        {
            case 'gererThemes' : 
                include 'controleurs/c_gererThemes.php'; break;
			case 'gererGenres' :
				include 'controleurs/c_gererGenres.php'; break;
			case 'gererEpisodes' :
				include 'controleurs/c_gererEpisodes.php'; break;
			case 'gererAnimes' :
				include 'controleurs/c_gererAnimes.php'; break;
			case 'connexion' :
				include 'connexion.php'; break;
			case 'checklogin' :
				include 'check_login.php'; break;
			case 'deconnexion' :
				include 'deconnexion.php'; break;
			default : 
				require_once ('modele/Bll/Episodes.class.php');
				require_once ('modele/Bll/Animes.class.php');
				$lesAnimes=Animes::chargerLesAnimes(1, "last");
				$lesEpisodes=Episodes::derniersEpisodes(1);
				$tbAnimeEp = array();
				foreach($lesEpisodes as $unEpisode){
					$tbAnimeEp[$unEpisode->getid()] = Animes::chargerAnimeParId($unEpisode->getid_anime());
				}
				include 'vues/v_home.php'; break;							
		}
        //echo "</div>";
        include("vues/_v_footer.php");
		
		
        ?>  
		<script src="js/jquery-2.1.4.min.js"></script>

		<script src="js/jssor.slider-26.8.0.min.js" ></script>
    <script>
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $Cols: 1,
              $Align: 0,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 3000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
 <script>jssor_1_slider_init();</script>

		<script src="js/responsiveslides.min.js"></script>
		
								<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									  // Slideshow 4
									  $("#slider3").responsiveSlides({
										auto: true,
										pager:true,
										nav:false,
										speed: 500,
										namespace: "callbacks",
										before: function () {
										  $('.events').append("<li>before event fired.</li>");
										},
										after: function () {
										  $('.events').append("<li>after event fired.</li>");
										}
									  });
								
									});
								 </script>
								  <script>
					// You can also use "$(window).load(function() {"
					$(function () {
					  // Slideshow 4
					  $("#slider4").responsiveSlides({
						auto: true,
						pager:false,
						nav:true,
						speed: 500,
						namespace: "callbacks",
						before: function () {
						  $('.events').append("<li>before event fired.</li>");
						},
						after: function () {
						  $('.events').append("<li>after event fired.</li>");
						}
					  });
				
					});
				  </script>

	<script src="js/easyResponsiveTabs.js"></script>
					<script>
										$(document).ready(function () {
											$('#horizontalTab').easyResponsiveTabs({
												type: 'default', //Types: default, vertical, accordion           
												width: 'auto', //auto or any width like 600px
												fit: true   // 100% fit in a container
											});
										});
										
					</script>





	<!-- start-smoth-scrolling -->
			<script src="js/move-top.js"></script>
			<script src="js/easing.js"></script>
		
	<!-- script-for-menu -->
						<script>					
							$("span.menu").click(function(){
								$(".top-nav ul").slideToggle("slow" , function(){
								});
							});
						</script>
						<!-- script-for-menu -->
	<!-- smooth scrolling -->
		<script>
			$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/								
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<a href="home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->
		<script src="js/bootstrap-3.1.1.min.js"></script>
	</body>
</html>
