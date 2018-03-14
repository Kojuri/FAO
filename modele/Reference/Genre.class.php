<?php
/** 
 * 
 * French Anime Online
 * © French Anime Online, 2017
 * 
 * References
 * Classes métier
 *
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.0
 */


/*
 *  ====================================================================
 *  Classe Genre : représente un genre
 *  ====================================================================
*/

class Genre {
    private $id;
	private $nom;
    
    /**
     * Constructeur 
    */				
    public function __construct(
            $p_id,
            $p_nom
    ) {
        $this->setid($p_id);
        $this->setnom($p_nom);
    }  
    
    /**
     * Accesseurs
    */

    public function getid () {
        return $this->_id;
    }

    public function getnom () {
        return $this->_nom;
    }
  
    /**
     * Mutateurs
    */
    
	   public function setid ($p_id) {
		 return $this->_id=$p_id;
	}

	   public function setnom ($p_nom) {
	     return $this->_nom=$p_nom;
	}	 

}
