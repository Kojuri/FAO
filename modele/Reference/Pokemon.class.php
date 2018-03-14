<?php
/** 
 * 
 * Pokédex
 * © ChrysaDex, 2016
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
 *  Classe Pokemon : représente un Pokemon d'ouvrage 
 *  ====================================================================
*/

class Pokemon {
    private $_Numero;
    private $_NomFR;
	private $_NomEN;
	private $_NomJP;
	private $_Type1;
	private $_Type2;
	private $_Famille;
	private $_PMale;
	private $_PFemelle;
	private $_TauxCapture;
	private $_Bonheur;
	private $_ExpMax;
	private $_PasEclosion;
	private $_Taille;
	private $_Poids;
	private $_PVBase;
	private $_AtqBase;
	private $_DefBase;
	private $_AtqSpeBase;
	private $_DefSpeBase;
	private $_VitBase;
	private $_Description;
	private $_Couleur;
	private $_Tier;
	private $_MoyStat;

    /**
     * Constructeur 
    */				
    public function __construct(
            $p_Numero,
            $p_NomFR,
			$p_NomEN,
			$p_NomJP,
			$p_Type1,
			$p_Type2,
			$p_Famille,
			$p_PMale,
			$p_PFemelle,
			$p_TauxCapture,
			$p_Bonheur,
			$p_ExpMax,
			$p_PasEclosion,
			$p_Taille,
			$p_Poids,
			$p_PVBase,
			$p_AtqBase,
			$p_DefBase,
			$p_AtqSpeBase,
			$p_DefSpeBase,
			$p_VitBase,
			$p_Description,
			$p_Couleur,
			$p_Tier,
			$p_MoyStat
    ) {
        $this->setNumero($p_Numero);
        $this->setNomFR($p_NomFR);
		$this->setNomEN($p_NomEN);
		$this->setNomJP($p_NomJP);
		$this->setType1($p_Type1);
		$this->setType2($p_Type2);
		$this->setFamille($p_Famille);
		$this->setPMale($p_PMale);
		$this->setPFemelle($p_PFemelle);
		$this->setTauxCapture($p_TauxCapture);
		$this->setBonheur($p_Bonheur);
		$this->setExpMax($p_ExpMax);
		$this->setPasEclosion($p_PasEclosion);
		$this->setTaille($p_Taille);
		$this->setPoids($p_Poids);
		$this->setPVBase($p_PVBase);
		$this->setAtqBase($p_AtqBase);
		$this->setDefBase($p_DefBase);
		$this->setAtqSpeBase($p_AtqSpeBase);
		$this->setDefSpeBase($p_DefSpeBase);
		$this->setVitBase($p_VitBase);
		$this->setDescription($p_Description);
		$this->setCouleur($p_Couleur);
		$this->setTier($p_Tier);
		$this->setMoyStat($p_MoyStat);
    }  
    
    /**
     * Accesseurs
    */

    public function getNumero () {
        return $this->_Numero;
    }

    public function getNomFR () {
        return $this->_NomFR;
    }
    
   public function getNomEN () {
	return $this->_NomEN;
}
   public function getNomJP () {
	return $this->_NomJP;
}
   public function getType1 () {
	return $this->_Type1;
}
   public function getType2 () {
	return $this->_Type2;
}
   public function getFamille () {
	return $this->_Famille;
}
   public function getPMale () {
	return $this->_PMale;
}
   public function getPFemelle () {
	return $this->_PFemelle;
}
   public function getTauxCapture () {
	return $this->_TauxCapture;
}
   public function getBonheur () {
	return $this->_Bonheur;
}
   public function getExpMax () {
	return $this->_ExpMax;
}
   public function getPasEclosion () {
	return $this->_PasEclosion;
}
   public function getTaille () {
	return $this->_Taille;
}
   public function getPoids () {
	return $this->_Poids;
}
   public function getPVBase () {
	return $this->_PVBase;
}
   public function getAtqBase () {
	return $this->_AtqBase;
}
   public function getDefBase () {
	return $this->_DefBase;
}
   public function getAtqSpeBase () {
	return $this->_AtqSpeBase;
}
   public function getDefSpeBase () {
	return $this->_DefSpeBase;
}
   public function getVitBase () {
	return $this->_VitBase;
}
   public function getCouleur () {
	return $this->_Couleur;
}
   public function getDescription () {
	return $this->_Description;
}
   public function getTier () {
	return $this->_Tier;
}
 public function getMoyStat () {
	return $this->_MoyStat;
}
	
    /**
     * Mutateurs
    */
    
	   public function setNumero ($p_Numero) {
		 return $this->_Numero=$p_Numero;
	}

	   public function setNomFR ($p_NomFR) {
	     return $this->_NomFR=$p_NomFR;
	}
		
	   public function setNomEN ($p_NomEN) {
		return $this->_NomEN=$p_NomEN;
	}
	   public function setNomJP ($p_NomJP) {
		return $this->_NomJP=$p_NomJP;
	}
	   public function setType1 ($p_Type1) {
		return $this->_Type1=$p_Type1;
	}
	   public function setType2 ($p_Type2) {
		return $this->_Type2=$p_Type2;
	}
	   public function setFamille ($p_Famille) {
		return $this->_Famille=$p_Famille;
	}
	   public function setPMale ($p_PMale) {
		return $this->_PMale=$p_PMale;
	}
	   public function setPFemelle ($p_PFemelle) {
		return $this->_PFemelle=$p_PFemelle;
	}
	   public function setTauxCapture ($p_TauxCapture) {
		return $this->_TauxCapture=$p_TauxCapture;
	}
	   public function setBonheur ($p_Bonheur) {
		return $this->_Bonheur=$p_Bonheur;
	}
	   public function setExpMax ($p_ExpMax) {
		return $this->_ExpMax=$p_ExpMax;
	}
	   public function setPasEclosion ($p_PasEclosion) {
		return $this->_PasEclosion=$p_PasEclosion;
	}
	   public function setTaille ($p_Taille) {
		return $this->_Taille=$p_Taille;
	}
	   public function setPoids ($p_Poids) {
		return $this->_Poids=$p_Poids;
	}
	   public function setPVBase ($p_PVBase) {
		return $this->_PVBase=$p_PVBase;
	}
	   public function setAtqBase ($p_AtqBase) {
		return $this->_AtqBase=$p_AtqBase;
	}
	   public function setDefBase ($p_DefBase) {
		return $this->_DefBase=$p_DefBase;
	}
	   public function setAtqSpeBase ($p_AtqSpeBase) {
		return $this->_AtqSpeBase=$p_AtqSpeBase;
	}
	   public function setDefSpeBase ($p_DefSpeBase) {
		return $this->_DefSpeBase=$p_DefSpeBase;
	}
	   public function setVitBase ($p_VitBase) {
		return $this->_VitBase=$p_VitBase;
	}
	   public function setCouleur ($p_Couleur) {
		return $this->_Couleur=$p_Couleur;
	}
	   public function setDescription ($p_Description) {
		return $this->_Description=$p_Description;
	}
	   public function setTier ($p_Tier) {
		return $this->_Tier=$p_Tier;
	}
	 public function setMoyStat ($p_MoyStat) {
		return $this->_MoyStat=$p_MoyStat;
	}

}
