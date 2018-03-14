<?php
/** 
 * French Anime Online
 * © French Anime Online, 2017
 * 
 * Data Access Layer
 * Classe d'accès aux données 
 *
 * Utilise les services de la classe PdoDao
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.0
 */

// sollicite les services de la classe PdoDao
require_once ('PdoDao.class.php');

class EpisodeDal { 

    /**
     * charge un objet de la classe Episode à partir de son nom
     * @param  s$nom : le nom de l'Episode
     * @return  un objet de la classe Episode
    */   
    public static function loadEpisodesByAnime($id_anime) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadEpisodesByAnime(?)';
        $res = $cnx->getRows($qry,array($id_anime),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }     
	
	public static function loadEpisodeById($id) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadEpisodeById(?)';
        $res = $cnx->getRows($qry,array($id),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    } 	
	
	public static function lastEpisodes($style) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_lastEpisodes';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }
	
	public static function addEpisode(
             $numero,
			 $saison,
			 $titre,
			 $url,
			 $id_anime
    ) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_addEpisode(?,?,?,?,?);
				CALL sp_updateDateAnime(?);
		';
        $res = $cnx->execSQL($qry,array(
				 $numero,
				 $saison,
				 $titre,
				 $url,
				 $id_anime,
				 $id_anime
            )
        );
        return $res;
    }
	
	public static function setEpisode(
			 $id,
             $numero,
			 $saison,
			 $titre,
			 $url,
			 $id_anime
    ) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_updateEpisode(?,?,?,?,?,?)';
        $res = $cnx->execSQL($qry,array(
				 $id,
				 $titre,
				 $numero,
				 $saison,
				 $url,
				 $id_anime
            ));
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }

    public static function deleteEpisode($id) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_deleteEpisode(?);
		';
        $res = $cnx->execSQL($qry,array($id));
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    } 
}
