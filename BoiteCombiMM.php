<?php

    //include "../TP2/CombiMM.php";

    class BoiteCombiMM{
        
        protected $cmm;
        
        public function __construct(CombiMM $cmm){
            $this->cmm = $cmm;
        }
        
        public function __toString(){
            $tmp = '<div class="panel col-xs-8 col-sm-8 col-md-8 col-lg-8 combiMM">';
            
            for($i = 0; $i < CombiMM::TAILLE_COMBIMM; $i++){
                $tmp .= '<div class="conteneur-center col-xs-3 col-sm-3 col-md-3 col-lg-3">';
                $tmp .= '<div class="couleur couleur_'.$this->cmm->getCouleur($i).' inline"></div>';
                $tmp .= "</div>";
            }
            
            $tmp .= "</div>";
            return $tmp;
        }
    }

    /*$salut1 = new BoiteComiMM(new CombiMM(1,2,3,4));
    echo $salut1;*/

?>