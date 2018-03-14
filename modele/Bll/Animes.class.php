<?php

/**
 * 
 * French Anime Online
 * © French Anime Online, 2017
 * 
 * Business Logic Layer
 *
 * Utilise les services des classes de la bibliothèque Reference
 * Utilise les services de la classe AnimeDal
 * Utilise les services de la classe Application
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.0
 */


/*
 *  ====================================================================
 *  Classe Animes : fabrique d'objets Anime
 *  ====================================================================
 */

// sollicite les méthodes de la classe AnimeDal
require_once ('./modele/Dal/AnimeDal.class.php');
// sollicite les services de la classe Application
require_once ('./modele/App/Application.class.php');
// sollicite la référence
require_once ('./modele/Reference/Anime.class.php');
require_once ('./modele/Bll/Genres.class.php');
require_once ('./modele/Bll/Themes.class.php');

class Animes {

    /**
     * Méthodes publiques
     */
    
    /**
     * récupère les Animes
     * @param   $mode : 0 == tableau assoc, 1 == tableau d'objets
     * @return  un tableau de type $mode 
     */    
    public static function chargerLesAnimes($mode, $select) {
        if($select == "last"){
			$tab = AnimeDal::lastAnimes($mode);
		}
		else{
			$tab = AnimeDal::loadAnimes($mode);
		}
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unAnime = new Anime(
                            $ligne->id, 
							$ligne->titre,
							$ligne->origine,
							$ligne->studio,
							Genres::chargerLesGenresParAnime($ligne->id,1),
							Themes::chargerLesThemesParAnime($ligne->id,1),
							$ligne->date_maj,
							$ligne->synopsis,
							$ligne->annee
                    );
                    array_push($res, $unAnime);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }

    /*
     * vérifie si un Anime existe
     * @param   $nom : le nom de l'Anime à contrôler
     * @return  un booléen
     */    
    
	public static function AnimeExiste($id) {
        $values = AnimeDal::loadAnimeById($id, 1);
        if (Application::dataOK($values)) {
            return 1;
        }
        return 0;
    }
   
	public static function newAnimeId() {
        $values = AnimeDal::lastAnimeId();
        if (Application::dataOK($values)) {
            return ($values + 1);
        }
        return 0;
    }
   
    public static function chargerAnimeParId($id) {
        $values = AnimeDal::loadAnimeById($id, 1);
        if (Application::dataOK($values)) {
            $id = $values[0]->id;
			$titre=$values[0]->titre;
			$origine=$values[0]->origine;
			$studio=$values[0]->studio;
			$genres=Genres::chargerLesGenresParAnime($id,1);
			$themes=Themes::chargerLesThemesParAnime($id,1);
			$date_maj=$values[0]->date_maj;
			$synopsis=$values[0]->synopsis;
			$annee=$values[0]->annee;
            return new Anime ($id,$titre,$origine,$studio, $genres, $themes, $date_maj, $synopsis, $annee);
        }
        return NULL;
    }    
	
	  public static function ajouterAnime($valeurs) {
        $anime = AnimeDal::addAnime(
            $valeurs[0],
            $valeurs[1],
			$valeurs[2],
			$valeurs[3],
			$valeurs[4]
        );
        return $anime;
    }
	
	public static function ajouterAnimeGenre($valeurs) {
        AnimeDal::addAnimeGenre(
            $valeurs[0],
            $valeurs[1]
        );
        return 1;
    }
	
	public static function ajouterAnimeTheme($valeurs) {
        AnimeDal::addAnimeTheme(
            $valeurs[0],
            $valeurs[1]
        );
        return 1;
    }
	
	public static function modifierAnime($anime) {
        $ligne = $anime;
		return AnimeDal::setAnime(
            $ligne->getid(), 
			$ligne->gettitre(), 
			$ligne->getorigine(),
			$ligne->getstudio(),
			$ligne->getsynopsis(),
			$ligne->getannee()
        );
    } 
	
	public static function supprimerAnime($id) {
        return AnimeDal::deleteAnime($id);
    }
	
	 public static function chargerLesAnimesParGenre($mode, $genre) {
		$tab = AnimeDal::loadAnimesByGenre($mode, $genre);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unAnime = new Anime(
                            $ligne->id, 
							$ligne->titre,
							$ligne->origine,
							$ligne->studio,
							Genres::chargerLesGenresParAnime($ligne->id,1),
							Themes::chargerLesThemesParAnime($ligne->id,1),
							$ligne->date_maj,
							$ligne->synopsis,
							$ligne->annee
                    );
                    array_push($res, $unAnime);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }
	
	public static function chargerLesAnimesParTheme($mode, $theme) {
		$tab = AnimeDal::loadAnimesByTheme($mode, $theme);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unAnime = new Anime(
                            $ligne->id, 
							$ligne->titre,
							$ligne->origine,
							$ligne->studio,
							Genres::chargerLesGenresParAnime($ligne->id,1),
							Themes::chargerLesThemesParAnime($ligne->id,1),
							$ligne->date_maj,
							$ligne->synopsis,
							$ligne->annee
                    );
                    array_push($res, $unAnime);
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
