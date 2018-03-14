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
 *  Classe Anime : représente un anime
 *  ====================================================================
*/

class Anime {
    private $id;
	private $titre;
	private $origine;
	private $studio;
	private $genres;
	private $themes;
	private $date_maj;
	private $synopsis;
	private $annee;
    
    /**
     * Constructeur 
    */				
    public function __construct(
            $p_id,
			$p_titre,
			$p_origine,
			$p_studio,
			$p_genres,
			$p_themes,
			$p_date_maj,
			$p_synopsis,
			$p_annee
    ) {
        $this->setid($p_id);
		$this->settitre($p_titre);
		$this->setorigine($p_origine);
		$this->setstudio($p_studio);
		$this->setgenres($p_genres);
		$this->setthemes($p_themes);
		$this->setdate_maj($p_date_maj);
		$this->setsynopsis($p_synopsis);
		$this->setannee($p_annee);
    }  
    
    /**
     * Accesseurs
    */

    public function getid () {
        return $this->_id;
    }
    
   public function gettitre () {
	return $this->_titre;
}
   public function getorigine () {
	return $this->_origine;
}
   public function getstudio () {
	return $this->_studio;
}
 public function getgenres () {
	return $this->_genres;
}
 public function getthemes () {
	return $this->_themes;
}
 public function getdate_maj () {
	return $this->_date_maj;
}
	public function getsynopsis () {
		return $this->_synopsis;
	}
	
	public function getannee () {
		return $this->_annee;
	}
  
    /**
     * Mutateurs
    */
    
	   public function setid ($p_id) {
		 return $this->_id=$p_id;
	}
		
	   public function settitre ($p_titre) {
		return $this->_titre=$p_titre;
	}
	   public function setorigine ($p_origine) {
		return $this->_origine=$p_origine;
	}
	   public function setstudio ($p_studio) {
		return $this->_studio=$p_studio;
	}
		public function setgenres ($p_genres) {
		return $this->_genres=$p_genres;
	}
	   public function setthemes ($p_themes) {
		return $this->_themes=$p_themes;
	}
		   public function setdate_maj ($p_date_maj) {
		return $this->_date_maj=$p_date_maj;
	}
	  public function setsynopsis ($p_synopsis) {
		return $this->_synopsis=$p_synopsis;
	}
	public function setannee ($p_annee) {
		return $this->_annee=$p_annee;
	}
}
