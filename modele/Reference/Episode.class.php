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
 *  Classe Episode : représente un épisode
 *  ====================================================================
*/

class Episode {
    private $id;
	private $numero;
	private $titre;
	private $url;
	private $id_anime;
	private $saison;
	private $date_ajout;
    
    /**
     * Constructeur 
    */				
    public function __construct(
            $p_id,
            $p_numero,
			$p_titre,
			$p_url,
			$p_id_anime,
			$p_saison,
			$p_date_ajout
    ) {
        $this->setid($p_id);
        $this->setnumero($p_numero);
		$this->settitre($p_titre);
		$this->seturl($p_url);
		$this->setid_anime($p_id_anime);
		$this->setsaison($p_saison);
		$this->setdate_ajout($p_date_ajout);
    }  
    
    /**
     * Accesseurs
    */

    public function getid () {
        return $this->_id;
    }

    public function getnumero () {
        return $this->_numero;
    }
    
   public function gettitre () {
	return $this->_titre;
}
   public function geturl () {
	return $this->_url;
}
   public function getid_anime () {
	return $this->_id_anime;
}
   public function getsaison () {
	return $this->_saison;
}
public function getdate_ajout () {
	return $this->_date_ajout;
}
  
    /**
     * Mutateurs
    */
    
	   public function setid ($p_id) {
		 return $this->_id=$p_id;
	}

	   public function setnumero ($p_numero) {
	     return $this->_numero=$p_numero;
	}
		
	   public function settitre ($p_titre) {
		return $this->_titre=$p_titre;
	}
	   public function seturl ($p_url) {
		return $this->_url=$p_url;
	}
	   public function setid_anime ($p_id_anime) {
		return $this->_id_anime=$p_id_anime;
	}
	   public function setsaison ($p_saison) {
		return $this->_saison=$p_saison;
	}
	 public function setdate_ajout ($p_date_ajout) {
		return $this->_date_ajout=$p_date_ajout;
	}

}
