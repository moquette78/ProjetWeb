<?php

    $fichier = fopen('../fichier.txt', 'r+'); //ouverture du fichier en lecture et ecriture
    $pseudovalide=true;

        while($ligne=fgets($fichier)){
            $mots = explode(" ", $ligne);
            if ($mots[0]== $_POST['pseudo']) {
                echo "Failed"; 
                $pseudovalide=false;
            }
        }
        if($pseudovalide){
            fputs($fichier, $_POST['pseudo']." ".$_POST['mdp']."\n");
                session_start();
                $_SESSION["pseudo"]=$_POST['pseudo'];
                echo "Success";
        }
        fclose($fichier);
?>