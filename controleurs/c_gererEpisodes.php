<?php
/**
 * Contrôleur secondaire chargé de la gestion des Attaques
 * @author  Kojuri
 */

// bibliothèques à utiliser
require_once ('modele/App/Application.class.php');
require_once ('modele/App/Notification.class.php');
require_once ('modele/Render/AdminRender.class.php');
require_once ('modele/Bll/Episodes.class.php');
require_once ('modele/Bll/Animes.class.php');

// récupération de l'action à effectuer
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = 'gererEpisodes';
}
// si un nom est passé en paramètre, créer un objet (pour consultation)
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    
}
// charger la vue en fonction du choix de l'utilisateur
switch ($action) {
    case 'consulterEpisode' : {
        if (!isset($id) or Episodes::EpisodeExiste($id)==0) {
		   echo '<script>document.location="/"</script>'   ;   
	    }
        else {
				$unEpisode = Episodes::chargerEpisodeParId($id);
				$unAnime = Animes::chargerAnimeParId($unEpisode->getid_anime());
				include 'vues/v_consulterEpisode.php';
        }
    } break;
	
	case 'ajouterEpisode' : {
		 if(!isset($_SESSION['login']) and !isset($_SESSION['role']) and $_SESSION['role'] != 'master')
		 {
			 echo "<script>document.location.href='Animes';</script>";
		 }
		 else
		 {
			 // initialisation des variables
			 $hasErrors = false;
			 $strTitre = '';
			 $strNumero = '';
			 $strSaison = '';
			 $strURL = '';
			 if(isset($_GET['anime'])){
				 $strAnime = Animes::chargerAnimeParId($_GET['anime']);
			 }
			 else{
				 $strAnime = '';
			 }
			 $lesAnimes = Animes::chargerLesAnimes(1, "all");
			// traitement de l'option : saisie ou validation ?
			if (isset($_GET["option"])) {
				$option = htmlentities($_GET["option"]);
			}
			else {
				$option = 'saisirEpisode';
			}
			switch($option) {            
				case 'saisirEpisode' : {
					include 'vues/v_ajouterEpisode.php';
				} break;
				case 'validerEpisode' : {
					// tests de gestion du formulaire
					if (isset($_POST["cmdValider"])) {
						// test zones obligatoires
						if (!empty($_POST["txtTitre"]) and !empty($_POST["txtNumero"]) and !empty($_POST["txtSaison"]) and !empty($_POST["txtURL"]) and !empty($_POST["cbxAnimes"])) {
							// les zones obligatoires sont présentes
							$strTitre = htmlentities(
									$_POST["txtTitre"]
							);
							$strNumero = htmlentities(
									$_POST["txtNumero"]
							);
							
							$strSaison = htmlentities(
									$_POST["txtSaison"]
							);
							$strURL = htmlentities(
									$_POST["txtURL"]
							);
							$strAnime = htmlentities(
									$_POST["cbxAnimes"]
							);
						}
						else {
							Application::addNotification(new Notification("Veuillez renseigner tous les champs", ERROR));
							$hasErrors = true;
						}
						if (!$hasErrors) {
							// ajout dans la base de données
							$res = Episodes::ajouterEpisode(array($strNumero,$strSaison, $strTitre, $strURL, $strAnime));
							//Application::addNotification(new Notification("L'épisode a été ajouté !", SUCCESS));
							echo "<script>
							document.location.href='Anime/".$strAnime."';
							</script>";
						}
						else {
							include 'vues/v_ajouterEpisode.php';
						}
					}
				} break;
			} 
		 }
    } break; 
	/*case 'modifierAnime' : {
		 if(!isset($_SESSION['login']) and !isset($_SESSION['role']) and $_SESSION['role'] != 'master')
		 {
			 echo "<script>document.location.href='Animes';</script>";
		 }
		 else
		 {
			 require_once ('modele/Bll/Genres.class.php');
			 require_once ('modele/Bll/Themes.class.php');
			 $unAnime = Animes::chargerAnimeParId($id);	
			 // initialisation des variables
			 $hasErrors = false;
			 $strTitre = $unAnime->gettitre();
			 $strOrigine = $unAnime->getorigine();
			 $strStudio = $unAnime->getstudio();
			 $strSynopsis = $unAnime->getsynopsis();
			 $strAnnee = $unAnime->getannee();
			 $lesThemes = Themes::chargerLesThemes(1);
			 $strThemes = Themes::chargerLesThemes($id, 1);
			 $lesGenres = Genres::chargerLesGenres(1);
			 $strGenres = Genres::chargerLesGenres($id, 1);
			
			// traitement de l'option : saisie ou validation ?
			if (isset($_GET["option"])) {
				$option = htmlentities($_GET["option"]);
			}
			else {
				$option = 'saisirAnime';
			}
			switch($option) {            
				case 'saisirAnime' : {
					include 'vues/v_modifierAnime.php';
				} break;
				case 'validerAnime' : {
					// tests de gestion du formulaire
					if (isset($_POST["cmdValider"])) {
						// test zones obligatoires
						if (!empty($_POST["txtTitre"]) and !empty($_POST["txtAnnee"])) {
							// les zones obligatoires sont présentes
							$strTitre = htmlentities(
									$_POST["txtTitre"]
							);
							$strOrigine = htmlentities(
									$_POST["txtOrigine"]
							);
							
							$strStudio = htmlentities(
									$_POST["txtStudio"]
							);
							$strSynopsis = htmlentities(
									$_POST["txtSynopsis"]
							);
							$strAnnee = htmlentities(
									$_POST["txtAnnee"]
							);
							;
							if(isset($_POST["genres"])){
								$strGenres = $_POST["genres"]
							;}
							if(isset($_POST["themes"])){
								$strThemes = $_POST["themes"]
							;}
						}
						else {
							// une ou plusieurs valeurs n'ont pas été saisies
							if (empty($strTitre)) {                                
								Application::addNotification(new Notification("Le titre doit être renseigné !", ERROR));
							}
							if (empty($strAnnee)) {
								Application::addNotification(new Notification("L'année doit être renseignée !", ERROR));
							}
							$hasErrors = true;
						}
						if (!$hasErrors) {
							 $unAnime->settitre($strTitre);
							 $unAnime->setorigine($strOrigine);
							 $unAnime->setstudio($strStudio);
							 $unAnime->setsynopsis($strSynopsis);
							 $unAnime->setannee($strAnnee);;
							// ajout dans la base de données
							$res = Animes::modifierAnime($unAnime);
							//Application::addNotification(new Notification("Le Pokémon a été ajouté !", SUCCESS));
							echo "<script>
							document.location.href='Anime/".$unAnime->getid()."';
							</script>";
						}
						else {
							include 'vues/v_modifierAnime.php';
						}
					}
				} break;
			} 
		 }
    } break;  
	case 'supprimerAnime' : {
	 if(!isset($_SESSION['login']) and !isset($_SESSION['role']) and $_SESSION['role'] != 'master')
	 {
		 echo "<script>document.location.href='Animes';</script>";
	 }
	 else
	 {
        if (!isset($id) or Animes::AnimeExiste($id)==0) 
		{
			// afficher la liste
			echo "<script>
			document.location.href='Animes';
			</script>"; 
		}
		else
		{
			// supprimer l'anime
			Animes::supprimerAnime($id);
			// afficher la liste
			echo "<script>
			document.location.href='Animes';
			</script>"; 
		}
	 }		
    } break; 
	*/
	default:
	{       
		   echo '<script>document.location="/"</script>'   ;   
    } break;   
}

