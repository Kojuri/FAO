<?php

/**
 * 
 * French Anime Online
 * © French Anime Online, 2017
 * 
 * Business Logic Layer
 *
 * Utilise les services des classes de la bibliothèque Reference
 * Utilise les services de la classe EpisodeDal
 * Utilise les services de la classe Application
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.0
 */


/*
 *  ====================================================================
 *  Classe Episodes : fabrique d'objets Episode
 *  ====================================================================
 */

// sollicite les méthodes de la classe EpisodeDal
require_once ('./modele/Dal/EpisodeDal.class.php');
// sollicite les services de la classe Application
require_once ('./modele/App/Application.class.php');
// sollicite la référence
require_once ('./modele/Reference/Episode.class.php');

class Episodes {

    /**
     * Méthodes publiques
     */
    
    /**
     * récupère les Episodes
     * @param   $mode : 0 == tableau assoc, 1 == tableau d'objets
     * @return  un tableau de type $mode 
     */    
    public static function derniersEpisodes($mode) {
        $tab = EpisodeDal::lastEpisodes($mode);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unEpisode = new Episode(
                            $ligne->id, 
							$ligne->numero,
							$ligne->titre,
							$ligne->url,
							$ligne->id_anime,
							$ligne->saison,
							$ligne->date_ajout
                    );
                    array_push($res, $unEpisode);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }

    public static function chargerEpisodeParId($id) {
        $values = EpisodeDal::loadEpisodeById($id, 1);
        if (Application::dataOK($values)) {
            $id = $values[0]->id;
			$numero = $values[0]->numero;
			$titre=$values[0]->titre;
			$url=$values[0]->url;
			$id_anime=$values[0]->id_anime;
			$saison=$values[0]->saison;
			$date_ajout=$values[0]->date_ajout;
            return new Episode ($id,$numero,$titre,$url,$id_anime,$saison, $date_ajout);
        }
        return NULL;
    }    
	
	/**
     * récupère les Episodes d'un Anime
     * @param   $mode : 0 == tableau assoc, 1 == tableau d'objets
     * @return  un tableau de type $mode 
     */    
    public static function chargerLesEpisodesParAnime($mode, $id_anime) {
        $tab = EpisodeDal::loadEpisodesByAnime($id_anime);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unEpisode = new Episode(
                            $ligne->id, 
							$ligne->numero,
							$ligne->titre,
							$ligne->url,
							$ligne->id_anime,
							$ligne->saison,
							$ligne->date_ajout
                    );
                    array_push($res, $unEpisode);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }
	
	public static function EpisodeExiste($id) {
        $values = EpisodeDal::loadEpisodeById($id, 1);
        if (Application::dataOK($values)) {
            return 1;
        }
        return 0;
    }
	
	 public static function ajouterEpisode($valeurs) {
        $episode = EpisodeDal::addEpisode(
            $valeurs[0],
            $valeurs[1],
			$valeurs[2],
			$valeurs[3],
			$valeurs[4]
        );
        return $episode;
    }
	
	public static function modifierEpisode($episode) {
        $ligne = $episode;
		return EpisodeDal::setEpisode(
            $ligne->getid(), 
			$ligne->getnumero(), 
			$ligne->getsaison(),
			$ligne->gettitre(),
			$ligne->geturl(),
			$ligne->getid_anime()
        );
    } 
	
	public static function supprimerEpisode($id) {
        return EpisodeDal::deleteEpisode($id);
    }
	
}
