<?php
/**
 * Contr�leur secondaire charg� de la gestion des Attaques
 * @author  Kojuri
 */

// biblioth�ques � utiliser
require_once ('modele/App/Application.class.php');
require_once ('modele/App/Notification.class.php');
require_once ('modele/Render/AdminRender.class.php');
require_once ('modele/Bll/Animes.class.php');
require_once ('modele/Bll/Genres.class.php');

// r�cup�ration de l'action � effectuer
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = 'gererAnimes';
}
// si un nom est pass� en param�tre, cr�er un objet (pour consultation)
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    
}

// charger la vue en fonction du choix de l'utilisateur
switch ($action) {
    case 'consulterAnime' : {
        if (!isset($id) or Animes::AnimeExiste($id)==0) {
			$lesAnimes=Animes::chargerLesAnimes(1, "all");
			$nbAnimes=count($lesAnimes);
			include 'vues/v_listeAnimes.php';         
		}
        else {
				require_once ('modele/Bll/Episodes.class.php');
				$unAnime = Animes::chargerAnimeParId($id);	
				$lesEpisodes = Episodes::chargerLesEpisodesParAnime(1, $id);
				$nbEpisodes=count($lesEpisodes);				
				include 'vues/v_consulterAnime.php';
        }
    } break;
	case 'ajouterAnime' : {
		 if(!isset($_SESSION['login']) and !isset($_SESSION['role']) and $_SESSION['role'] != 'master')
		 {
			 echo "<script>document.location.href='Animes';</script>";
		 }
		 else
		 {
			 require_once ('modele/Bll/Genres.class.php');
			 require_once ('modele/Bll/Themes.class.php');
			 // initialisation des variables
			 $hasErrors = false;
			 $strTitre = '';
			 $strOrigine = '';
			 $strStudio = '';
			 $strSynopsis = '';
			 $strAnnee = '';
			 $lesThemes = Themes::chargerLesThemes(1);
			 $strThemes ;
			 $lesGenres = Genres::chargerLesGenres(1);
			 $strGenres ;
			 $newid = Animes::newAnimeId();
			// traitement de l'option : saisie ou validation ?
			if (isset($_GET["option"])) {
				$option = htmlentities($_GET["option"]);
			}
			else {
				$option = 'saisirAnime';
			}
			switch($option) {            
				case 'saisirAnime' : {
					include 'vues/v_ajouterAnime.php';
				} break;
				case 'validerAnime' : {
					// tests de gestion du formulaire
					if (isset($_POST["cmdValider"])) {
						// test zones obligatoires
						if (!empty($_POST["txtTitre"]) and !empty($_POST["txtAnnee"])) {
							// les zones obligatoires sont pr�sentes
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
							if(isset($_POST["genres"])){
								$strGenres = $_POST["genres"]
							;}
							if(isset($_POST["themes"])){
								$strThemes = $_POST["themes"]
							;}
							else {
								// une ou plusieurs valeurs n'ont pas �t� saisies
								if (empty($strTitre)) {                                
									Application::addNotification(new Notification("Le titre doit �tre renseign� !", ERROR));
								}
								if (empty($strAnnee)) {
									Application::addNotification(new Notification("L'ann�e doit �tre renseign�e !", ERROR));
								}
								$hasErrors = true;
							}

							$strID = htmlentities(
								$_POST["txtID"]
							);
							 
							// Constantes
							define('TARGET_AFFICHES', '/images/affiches/');    // Repertoire cible
							define('TARGET_POSTERS', '/images/posters/');    // Repertoire cible

							// Tableaux de donnees
							$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
							$infosImg = array();
							
							// Variables
							$extension = '';
							$message = '';
							$nomImage = '';
							
							
							 // On verifie si le champ est rempli
							if( !empty($_FILES['fichier_affiche']['name']) )
							{
								// Recuperation de l'extension du fichier
								$extension  = pathinfo($_FILES['fichier_affiche']['name'], PATHINFO_EXTENSION);
							
								// On verifie l'extension du fichier
								if(in_array(strtolower($extension),$tabExt))
								{
								// On recupere les dimensions du fichier
								$infosImg = getimagesize($_FILES['fichier_affiche']['tmp_name']);
							
								// On verifie le type de l'image
								if($infosImg[2] >= 1 && $infosImg[2] <= 14)
								{
									
									// Parcours du tableau d'erreurs
									if(isset($_FILES['fichier_affiche']['error']) 
										&& UPLOAD_ERR_OK === $_FILES['fichier_affiche']['error'])
									{
										// On renomme le fichier
										$nomImage = $strID.'.'. $extension;
							
										// Si c'est OK, on teste l'upload
										if(move_uploaded_file($_FILES['fichier_affiche']['tmp_name'], TARGET_AFFICHES.$nomImage))
										{
										$message = 'Upload réussi !';
										}
									}
								}
							}							
						}
					}
						if (!$hasErrors) {
							// ajout dans la base de donn�es
							$unAnime = Animes::ajouterAnime(array($strTitre,$strOrigine, $strStudio, $strSynopsis, $strAnnee));
							if(isset($strGenres)){
								foreach($strGenres as $unGenre)
								{
									Animes::ajouterAnimeGenre(array($unAnime, $unGenre));
								}
							}
							if(isset($strThemes)){
								foreach($strThemes as $unTheme)
								{
									Animes::ajouterAnimeTheme(array($unAnime, $unTheme));
								}
							}
							//Application::addNotification(new Notification("Le Pok�mon a �t� ajout� !", SUCCESS));
							echo "<script>
							document.location.href='Animes';
							</script>";
						}
						else {
							include 'vues/v_ajouterAnime.php';
						}
					}
				} break;
			} 
		 }
    } break; 
	case 'modifierAnime' : {
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
							// les zones obligatoires sont pr�sentes
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
							// une ou plusieurs valeurs n'ont pas �t� saisies
							if (empty($strTitre)) {                                
								Application::addNotification(new Notification("Le titre doit �tre renseign� !", ERROR));
							}
							if (empty($strAnnee)) {
								Application::addNotification(new Notification("L'ann�e doit �tre renseign�e !", ERROR));
							}
							$hasErrors = true;
						}
						if (!$hasErrors) {
							 $unAnime->settitre($strTitre);
							 $unAnime->setorigine($strOrigine);
							 $unAnime->setstudio($strStudio);
							 $unAnime->setsynopsis($strSynopsis);
							 $unAnime->setannee($strAnnee);;
							// ajout dans la base de donn�es
							$res = Animes::modifierAnime($unAnime);
							/*if(isset($strGenres)){
								foreach($strGenres as $unGenre)
								{
									Animes::ajouterAnimeGenre(array($unAnime, $unGenre));
								}
							}
							if(isset($strThemes)){
								foreach($strThemes as $unTheme)
								{
									Animes::ajouterAnimeTheme(array($unAnime, $unTheme));
								}
							}*/
							//Application::addNotification(new Notification("Le Pok�mon a �t� ajout� !", SUCCESS));
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
	default:
	{      
		$lesAnimes=Animes::chargerLesAnimes(1, "all");
		$nbAnimes=count($lesAnimes);
		include 'vues/v_listeAnimes.php'; 
    } break;   
}

