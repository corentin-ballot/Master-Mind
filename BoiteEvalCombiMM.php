<?php

    //include "../TP2/EvalCombiMM.php";

    class BoiteEvalCombiMM{
        
        protected $ecmm;
        
        public function __construct(EvalCombiMM $ecmm){
            $this->ecmm = $ecmm;
        }
        
        public function __toString(){
            $tmp = '<div class="evalCombiMM col-xs-2 col-sm-2 col-md-2 col-lg-2">';
            
            $tmp .= '<div class="row">';
            for($i = 0; $i < $this->ecmm->getNbBienPlaces(); $i++){
                $tmp .= '<div class="conteneur-center col-xs-6 col-sm-6 col-md-6 col-lg-6">';
                $tmp .= "<div class=\"couleur_eval couleur_bien_place inline\"></div>";
                $tmp .= "</div>";
            }
            
            for($i = 0; $i < $this->ecmm->getNbMalPlaces(); $i++){
                $tmp .= '<div class="conteneur-center col-xs-6 col-sm-6 col-md-6 col-lg-6">';
                $tmp .= "<div class=\"couleur_eval couleur_mal_place inline\"></div>";
                $tmp .= "</div>";
            }
            
            for($i = 0; $i < CombiMM::TAILLE_COMBIMM - $this->ecmm->getNbMalPlaces() - $this->ecmm->getNbBienPlaces(); $i++){
                $tmp .= '<div class="conteneur-center col-xs-6 col-sm-6 col-md-6 col-lg-6">';
                $tmp .= "<div class=\"couleur_eval couleur_non_presente inline\"></div>";
                $tmp .= "</div>";
            }
            $tmp .= '</div>';
            
            $tmp .= "</div>";
            return $tmp;
        }
    }

    /*$salut1 = new BoiteEvalComiMM(new EvalCombiMM(1,2));
    echo $salut1;*/

?>