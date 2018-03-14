<?php
/**
 * Contrôleur secondaire chargé de la gestion des Attaques
 * @author  Kojuri
 */

// bibliothèques à utiliser
require_once ('modele/App/Application.class.php');
require_once ('modele/App/Notification.class.php');
require_once ('modele/Render/AdminRender.class.php');
require_once ('modele/Bll/Genres.class.php');
require_once ('modele/Bll/Animes.class.php');

// récupération de l'action à effectuer
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = 'gererGenres';
}
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    
}
// charger la vue en fonction du choix de l'utilisateur
switch ($action) {
	case 'consulterGenre':
	{
		if (!isset($id) or Genres::GenreExiste($id)==0) {
			$lesGenres=Genres::chargerLesGenres(1);
			$nbGenres=count($lesGenres);
			include 'vues/v_listeGenres.php';       
		}
        else {
			$lesAnimes=Animes::chargerLesAnimesParGenre(1, $id);
			$nbAnimes=count($lesAnimes);
			$genre = Genres::chargerGenreParId($id);
			$options = ['Genre'=>$genre->getnom()];
			include 'vues/v_listeAnimes.php'; 
		}
	}break;
	default:
	{      
		$lesGenres=Genres::chargerLesGenres(1);
		$nbGenres=count($lesGenres);
		include 'vues/v_listeGenres.php'; 
    } break;   
}

