<?php

class EvalCombiMM {
    protected $nbBienPlaces = 0;
    protected $nbMalPlaces = 0;
    
    public function __construct($val1 = 0, $val2 = 0){
        $this->nbBienPlaces = $val1;
        $this->nbMalPlaces = $val2;
    }
    
    public function __destruct(){}
    
    public function __toString(){
        return "[nbBienPlaces : ".$this->getNbBienPlaces().", nbMalPlaces : ".$this->getNbMalPlaces()."]";
    }
    
    public function getNbBienPlaces(){
        return $this->nbBienPlaces;
    } 
        
    public function getNbMalPlaces(){
        return $this->nbMalPlaces;
    }
        
    public function setNbBienPlaces($val){
        $this->nbBienPlaces = $val;
    }
        
    public function setNbMalPlaces($val){
        $this->nbMalPlaces = $val;
    }
}

/*$salut = new EvalCombiMM(1,2);
echo $salut."<br/>";

$salut = new EvalCombiMM();
echo $salut."<br/>";*/

?>