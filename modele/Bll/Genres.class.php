<?php

/**
 * 
 * French Anime Online
 * © French Anime Online, 2017
 * 
 * Business Logic Layer
 *
 * Utilise les services des classes de la bibliothèque Reference
 * Utilise les services de la classe AttaqueDal
 * Utilise les services de la classe Application
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.0
 */


/*
 *  ====================================================================
 *  Classe Genres : fabrique d'objets Genre
 *  ====================================================================
 */

// sollicite les méthodes de la classe AttaqueDal
require_once ('./modele/Dal/GenreDal.class.php');
// sollicite les services de la classe Application
require_once ('./modele/App/Application.class.php');
// sollicite la référence
require_once ('./modele/Reference/Genre.class.php');

class Genres {

    /**
     * Méthodes publiques
     */
    
    /**
     * récupère les Genres
     * @param   $mode : 0 == tableau assoc, 1 == tableau d'objets
     * @return  un tableau de type $mode 
     */    
    public static function chargerLesGenres($mode) {
        $tab = GenreDal::loadGenres(1);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unGenre = new Genre(
                            $ligne->id, 
							$ligne->nom
                    );
                    array_push($res, $unGenre);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }

    public static function chargerGenreParId($id) {
        $values = GenreDal::loadGenreById($id, 1);
        if (Application::dataOK($values)) {
            $id = $values[0]->id;
			$nom = $values[0]->nom;
            return new Genre ($id,$nom);
        }
        return NULL;
    }    
	
	public static function GenreExiste($id) {
        $values = GenreDal::loadGenreById($id, 1);
        if (Application::dataOK($values)) {
            return 1;
        }
        return 0;
    }
	
	public static function chargerLesGenresParAnime($id_anime, $mode) {
        $tab = GenreDal::loadGenresByAnime($id_anime, $mode);
		if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unGenre = new Genre(
                            $ligne->id, 
							$ligne->nom
                    );
                    array_push($res, $unGenre);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }
	
}
