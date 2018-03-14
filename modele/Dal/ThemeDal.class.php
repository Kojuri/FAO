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

class ThemeDal { 
       
    /**
     * @param  $style : 0 == tableau assoc, 1 == objet
     * @return  un objet de la classe PDOStatement
    */   
    public static function loadThemes($style) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadThemes';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }
   
	
	public static function loadThemeById($id) {
        $cnx = new PdoDao();
        $qry = 'CALL sp_loadThemeById(?)';
        $res = $cnx->getRows($qry,array($id),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    } 	
	
	public static function loadThemesByAnime($id_anime, $style) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM theme INNER JOIN anime_theme ON theme.id = anime_theme.id_theme WHERE id_anime = ?';
        $res = $cnx->getRows($qry,array($id_anime),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }    
        return $res;
    } 
	
}
