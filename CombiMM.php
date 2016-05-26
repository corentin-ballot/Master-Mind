<?php

class CombiMM {
    const TAILLE_COMBIMM = 4;
    const NB_COULEURS = 8;
    
    protected $lesValeurs;
    
    public static function initAleatoire(){
        return new CombiMM(rand(1,CombiMM::NB_COULEURS),rand(1,CombiMM::NB_COULEURS),rand(1,CombiMM::NB_COULEURS),rand(1,CombiMM::NB_COULEURS));
    }
    
    public function __construct($val1, $val2, $val3, $val4){
        $this->lesValeurs = array($val1, $val2, $val3, $val4);
    }
    
    public function __destruct(){}
    
    public function __toString(){
        $tmp = "[lesValeurs : [";
        for($i=0; $i<CombiMM::TAILLE_COMBIMM; $i++){
            $tmp .= $this->lesValeurs[$i];
            if($i < CombiMM::TAILLE_COMBIMM-1){
                $tmp .= ", ";
            }
        }
        return $tmp .= "]]";
    }
    
    public function getCouleur($pos){
        return $this->lesValeurs[$pos];
    }
        
    public function setCouleur($pos, $col){
        $this->lesValeurs[$pos] = $col;
    }
        
    public function evalueCasesBienPlacees($cm){
        $bonne_place = 0;
        for($i=0; $i<CombiMM::TAILLE_COMBIMM;$i++){
            if($cm->getCouleur($i) == $this->lesValeurs[$i]){
                $bonne_place++;
            }
        }
        return $bonne_place;
    }
      
    public function evalueCasesMalPlacees($cmm){
		$bonne_couleur_mal_place=0;
        $array = array();
        
        for($i=0;$i<CombiMM::TAILLE_COMBIMM;$i++){
            array_push($array, 0);    
        }
        
        for($i=0;$i<CombiMM::TAILLE_COMBIMM;$i++){ // Parcours du premier tableau
			if($this->getCouleur($i)!=$cmm->getCouleur($i)){ // On retire le cas ou la couleur est bien placé
				for($j=0;$j<CombiMM::TAILLE_COMBIMM;$j++){ // Comparaison en parcourant le second tableau
					if($this->getCouleur($i)==$cmm->getCouleur($j)){ // On retire le cas ou la couleur est bien placé
						if($this->getCouleur($j)!=$cmm->getCouleur($j) && $array[$i] == 0){ 
							$bonne_couleur_mal_place++;
                            $array[$i] = 1;
						}
					}
				}
			}
		}
		return $bonne_couleur_mal_place;
	}
}

/*$salut1 = new CombiMM(1,2,3,4);
$salut2 = new CombiMM(1,2,2,1);

echo $salut1."<br/>";
echo $salut2."<br/>"    ;

echo $salut1->evalueCasesBienPlacees($salut2);
echo " cases bien placees , ";
echo $salut1->evalueCasesMalPlacees($salut2); 
echo " mal placees.";*/

?>