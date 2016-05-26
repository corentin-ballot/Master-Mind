
<?php

    /*include "../TP2/MasterMind.php";
    include "BoiteCombiMM.php";
    include "BoiteEvalCombiMM.php";*/

    class MM_UI{
        
        protected $mm;
        
        public function __construct($mm){
            $this->mm = $mm;
        }
        
        public function getDivHistorique(){
            $tmp = "<div class=\"row\">";
            
            for($i=$this->mm->getNbPropositions(); $i < MasterMind::TAILLE_MM; $i++){
                $tmp .= "<div class=\"try try$i col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-4\">";
                $bcmm = new BoiteCombiMM(new CombiMM(0,0,0,0));
                $tmp .= $bcmm;
                $ebcmm = new BoiteEvalCombiMM(new EvalCombiMM(0,0));
                $tmp .= $ebcmm;
                $tmp .= "</div>";
            }
            
            for($i=$this->mm->getNbPropositions()-1; $i >= 0; $i--){
                $tmp .= "<div class=\"try try$i col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-4\">";
                $bcmm = new BoiteCombiMM($this->mm->getProposition($i));
                $tmp .= $bcmm;
                $ebcmm = new BoiteEvalCombiMM($this->mm->getEvaluation($i));
                $tmp .= $ebcmm;
                $tmp .= "</div>";
            }
            $tmp .= "</div>";
            return $tmp;
        }
        
        public function getDivFormulaire(){
            $tmp = "<div class=\"row\">";
            $tmp .= "<div class=\"try col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-4\">";
            $tmp .= "<form method=\"post\" class=\"form-inline\">";
            $tmp .= "<div class=\"col-xs-8 col-sm-8 col-md-8 col-lg-8 combiMM\">";
            for($i=0; $i < CombiMM::TAILLE_COMBIMM; $i++){
                $tmp .= "<div class=\"conteneur-center col-xs-3 col-sm-3 col-md-3 col-lg-3\">";
                $tmp .= "<select name=\"$i\" id=\"$i\" class=\"form-control couleur_1\"";
                if($this->mm->finPartie()){
                    $tmp .= " disabled";
                }
                $tmp .= ">";
                $tmp .= $this->getOptions();
                $tmp .= "</select>";
                $tmp .= "</div>";
            }
            $tmp .= "</div>";
            $tmp .= "<div class=\"evalCombiMM col-xs-2 col-sm-2 col-md-2 col-lg-2\">";
            $tmp .= "<button type=\"submit\" class=\"btn btn-default\"";
            if($this->mm->finPartie()){
                $tmp .= " disabled";
            }
            $tmp .= ">Tester</button>";
            $tmp .= "</div>";
            $tmp .= "</form>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            $tmp .= "<div class=\"row conteneur-center\">";
            $tmp .= "<div class=\"col-md-4 col-md-offset-4\">";
            $tmp .= "<a href=\"abandon.php\" class=\"btn btn-default";
            if($this->mm->finPartie()){
                    $tmp .= " disabled";
                }
            $tmp .= "\">Abandonner</a>";
            $tmp .= "<a href=\"logout.php\" class=\"btn btn-default\">Recommencer</a>";
            $tmp .= "</div>";
            $tmp .= "</div>";
            
            $tmp .= "</div>";
            return $tmp;
        }
        
        private function getOptions(){
            $tmp = "";
            for($i = 1; $i < CombiMM::NB_COULEURS+1; $i++){
                $tmp .= "<option value=\"$i\" class=\"couleur_$i\"></option>";
            }
            return $tmp;
        }
        
    }

?>
