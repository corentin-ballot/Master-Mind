
<?php

include 'CombiMM.php';
include 'EvalCombiMM.php';

class MasterMind {
    const TAILLE_MM = 10;
    
    private $combiGagnante;
    
    protected $lesPropositions;
    protected $lesEvaluations;
    
    public function __construct(){
        $this->combiGagnante = CombiMM::initAleatoire();
        $this->lesPropositions = array();
        $this->lesEvaluations = array();
    }
    
    /*public function __construct($val1, $val2, $val3, $val4){
        $this->combiGagnante = new CombiMM($val1, $val2, $val3, $val4);
        $this->lesPropositions = array();
        $this->lesEvaluations = array();
    }*/
    
    public function __destruct(){}
    
    public function __toString(){
        $tmp = "======================<br/>";
        $tmp .= "COMBINAISON GAGNANTE :<br/>";
        $tmp .= $this->combiGagnante."<br/>";
        $tmp .= "======================<br/>";
        for($i=0; $i<count($this->lesPropositions);$i++){
            $tmp .= $this->lesPropositions . " | " .$this->lesEvaluations."<br\>";
        }
        return $tmp;
    }
    
    public function getCombiGagnante(){
        return $this->combiGagnante;
    }
    
    public function getProposition($pos){
        return $this->lesPropositions[$pos];
    }
    
    public function getEvaluation($pos){
        return $this->lesEvaluations[$pos];
    }
    
    public function ajouterProposition($cmm){
        array_push($this->lesPropositions, $cmm);
    }
    
    public function evalueDerniereProposition(){
        $nb_bien_placees = $this->combiGagnante->evalueCasesBienPlacees($this->lesPropositions[count($this->lesPropositions)-1]);
        $nb_mal_placees = $this->combiGagnante->evalueCasesMalPlacees($this->lesPropositions[count($this->lesPropositions)-1]);
        $eval = new EvalCombiMM($nb_bien_placees, $nb_mal_placees);
        array_push($this->lesEvaluations, $eval);
    }
    
    public function isPropositionGagnante(){
        if(count($this->lesEvaluations) == 0)
            return false;
        else
            return $this->lesEvaluations[count($this->lesEvaluations)-1]->getNbBienPlaces() == CombiMM::TAILLE_COMBIMM;
    }
    
    public function finPartie(){
        if($this->isPropositionGagnante() || (count($this->lesPropositions) >= MasterMind::TAILLE_MM /*&& MasterMind::TAILLE_MM < count($this->lesEvaluations)*/)) {
            return true;
        }
        return false;
    }
    
    public function getNbPropositions(){
        return count($this->lesPropositions);
    }
    
}

/*
$salut = new MasterMind(1,2,3,6);
echo $salut;

echo $salut1."<br/>";

$salut->ajouterProposition($salut1);
$salut->evalueDerniereProposition();

while(!$salut->finPartie()){
    $salut->ajouterProposition($salut1);
    $salut->evalueDerniereProposition();
}

if($salut->isPropositionGagnante())
    echo "TSS ! Un coup de chance... ";
else
    echo "HAHAHAHAHAHAHA ! Perdu ! ";
*/

?>
