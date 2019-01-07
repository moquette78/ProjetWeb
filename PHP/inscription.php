<?php

    $fichier = fopen('../fichier.txt', 'r+'); //ouverture du fichier en lecture et ecriture
    $pseudovalide=true;

        // si le pseudo n'existe pas dans le fichier alors c'est bon
        while($ligne=fgets($fichier)){
            $mots = explode(" ", $ligne);
            if ($mots[0]== $_POST['pseudo']) {
                echo "Failed"; 
                $pseudovalide=false;
            }
        }
        // ajout du pseudo et du mot de passe dans le fichier
        if($pseudovalide){
            fputs($fichier, $_POST['pseudo']." ".$_POST['mdp']."\n");
                session_start();
                $_SESSION["pseudo"]=$_POST['pseudo'];
                echo "Success";
        }
        fclose($fichier);
?>
