<?php
    
    session_start();

    function __autoload($classe){
        $filename="./".$classe.".php";
        include $filename;
    }

    include "head.html";
    include "header.html";

    if (!isset($_SESSION['mm'])) {
        $_SESSION['mm'] = new MasterMind();
        $mm = $_SESSION['mm'];
    }else{
        $mm = $_SESSION['mm'];
        
        if(isset($_POST['0']) && !$mm->finPartie()){
            $cmm = new CombiMM($_POST['0'],$_POST['1'],$_POST['2'],$_POST['3']);
            $mm->ajouterProposition($cmm);
            $mm->evalueDerniereProposition();
            
            
        }/*else{
            if($mm->finPartie()){
                if($mm->isPropositionGagnante()){
                    echo "<script>alert(\"Vous avez gagné, félicitation ! :-)</br>Cliquez sur le bouton \"Recommencer\" pour lancer une nouvelle partie ! ;-)\")</script>"; 
                } else{
                    echo "<script>alert(\"HAHA ! Une prochaine fois peut-être ! :-D</br>Cliquez sur le bouton \"Recommencer\" pour lancer une nouvelle partie ! ;-)\")</script>"; 
                }
            }
        }*/
        
        if($mm->finPartie()){
            if($mm->isPropositionGagnante()){
                echo "<script>alert(\"Vous avez gagné, félicitation ! :-)\")</script>"; 
            } else{
                echo "<script>alert(\"Dommage ! Une prochaine fois peut-être ! :-(\")</script>"; 
            }
        }
    }

    $mmui = new MM_UI($mm);

    echo $mmui->getDivHistorique();
    echo $mmui->getDivFormulaire();

    include "footer.html";


?>
