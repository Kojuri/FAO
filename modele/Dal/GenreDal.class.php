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

class GenreDal { 
       
    /**
     * @param  $style : 0 == tableau assoc, 1 == objet
     * @return  un objet de la classe PDOStatement
    */   
    public static function loadGenres($style) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadGenres';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }
   
	
	public static function loadGenreById($id) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadGenreById(?)';
        $res = $cnx->getRows($qry,array($id),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    } 	
	
	public static function loadGenresByAnime($id_anime, $style) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM genre INNER JOIN anime_genre ON genre.id = anime_genre.id_genre WHERE id_anime = ?';
        $res = $cnx->getRows($qry,array($id_anime),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    } 
}
