<?php

/**
 * 
 * French Anime Online
 * © French Anime Online, 2017
 * 
 * Business Logic Layer
 *
 * Utilise les services des classes de la bibliothèque Reference
 * Utilise les services de la classe ThemeDal
 * Utilise les services de la classe Application
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.0
 */


/*
 *  ====================================================================
 *  Classe Themes : fabrique d'objets Theme
 *  ====================================================================
 */

// sollicite les méthodes de la classe ThemeDal
require_once ('./modele/Dal/ThemeDal.class.php');
// sollicite les services de la classe Application
require_once ('./modele/App/Application.class.php');
// sollicite la référence
require_once ('./modele/Reference/Theme.class.php');

class Themes {

    /**
     * Méthodes publiques
     */
    
    /**
     * récupère les Themes
     * @param   $mode : 0 == tableau assoc, 1 == tableau d'objets
     * @return  un tableau de type $mode 
     */    
    public static function chargerLesThemes($mode) {
        $tab = ThemeDal::loadThemes(1);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unTheme = new Theme(
                            $ligne->id, 
							$ligne->nom
                    );
                    array_push($res, $unTheme);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }

    public static function chargerThemeParId($id) {
        $values = ThemeDal::loadThemeById($id, 1);
        if (Application::dataOK($values)) {
            $id = $values[0]->id;
			$nom = $values[0]->nom;
            return new Theme ($id,$nom);
        }
        return NULL;
    } 

	public static function chargerLesThemesParAnime($id_anime, $mode) {
        $tab = ThemeDal::loadThemesByAnime($id_anime, $mode);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unTheme = new Theme(
                            $ligne->id, 
							$ligne->nom
                    );
                    array_push($res, $unTheme);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }
	
	public static function ThemeExiste($id) {
        $values = ThemeDal::loadThemeById($id, 1);
        if (Application::dataOK($values)) {
            return 1;
        }
        return 0;
    }
}
