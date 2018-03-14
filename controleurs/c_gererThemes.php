<?php
/**
 * Contrôleur secondaire chargé de la gestion des Thèmes
 * @author  Kojuri
 */

// bibliothèques à utiliser
require_once ('modele/App/Application.class.php');
require_once ('modele/App/Notification.class.php');
require_once ('modele/Render/AdminRender.class.php');
require_once ('modele/Bll/Themes.class.php');
require_once ('modele/Bll/Animes.class.php');

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = 'gererThemes';
}
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    
}
// charger la vue en fonction du choix de l'utilisateur
switch ($action) {
	case 'consulterTheme':
	{
		if (!isset($id) or Themes::ThemeExiste($id)==0) {
			$lesThemes=Themes::chargerLesThemes(1);
			$nbThemes=count($lesThemes);
			include 'vues/v_listeThemes.php';       
		}
        else {
			$lesAnimes=Animes::chargerLesAnimesParTheme(1, $id);
			$nbAnimes=count($lesAnimes);
			$theme = Themes::chargerThemeParId($id);
			$options = ['Thème'=>$theme->getnom()];
			include 'vues/v_listeAnimes.php'; 
		}
	}break;
	default:
	{      
		$lesThemes=Themes::chargerLesThemes(1);
		$nbThemes=count($lesThemes);
		include 'vues/v_listeThemes.php'; 
    } break;   
}

