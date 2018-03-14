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

class AnimeDal { 
       
    /**
     * @param  $style : 0 == tableau assoc, 1 == objet
     * @return  un objet de la classe PDOStatement
    */   
    public static function loadAnimes($style) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadAnimes()';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }

	public static function loadAnimeById($id) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadAnimeById(?)';
        $res = $cnx->getRows($qry,array($id),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    } 	
	
	 public static function lastAnimes($style) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_lastAnimes()';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }
	
	public static function addAnime(
             $titre,
			 $origine,
			 $studio,
			 $synopsis,
			 $annee
    ) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_addAnime(?,?,?,?,?)';
        $res = $cnx->execSQL($qry,array(
				 $titre,
				 $origine,
				 $studio,
				 $synopsis,
				 $annee
            )
        );
		$cnx = new PdoDao();
		$qry = "CALL sp_lastAnimeId()";
		$res = $cnx->getValue($qry,array(),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }
	
	public static function lastAnimeId(){
		$cnx = new PdoDao();
		$qry = "CALL sp_lastAnimeId()";
		$res = $cnx->getValue($qry,array(),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
	}
	
	public static function setAnime(
			 $id,
             $titre,
			 $origine,
			 $studio,
			 $synopsis,
			 $annee
    ) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_updateAnime(?,?,?,?,?,?)';
        $res = $cnx->execSQL($qry,array(
				 $titre,
				 $origine,
				 $studio,
				 $synopsis,
				 $annee,
				 $id
            ));
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }

    public static function deleteAnime($id) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_deleteAnime(?);
				CALL sp_deleteAnimeGenre(?);
				CALL sp_deleteAnimeTheme(?);
		';
        $res = $cnx->execSQL($qry,array($id, $id, $id));
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    } 
	
	public static function addAnimeGenre(
             $anime,
			 $genre
    ) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_addAnimeGenre(?,?)';
        $res = $cnx->execSQL($qry,array(
				 $anime,
				 $genre
            )
        );
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return 1;
    }
	
	public static function addAnimeTheme(
             $anime,
			 $theme
    ) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_addAnimeTheme(?,?)';
        $res = $cnx->execSQL($qry,array(
				 $anime,
				 $theme
            )
        );
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return 1;
    }
	
	 public static function loadAnimesByGenre($style, $genre) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadAnimesByGenre(?)';
        $res = $cnx->getRows($qry,array($genre),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }
	
	 public static function loadAnimesByTheme($style, $theme) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadAnimesByTheme(?)';
        $res = $cnx->getRows($qry,array($theme),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }
}
