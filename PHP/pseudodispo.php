<?php

    $pseudo=$_POST['pseudo'];   

    $fichier = fopen('..fichier.txt', 'r+'); //ouverture du fichier en lecture et ecriture
    $valide=false;
        // parcourt le fichier et verifie que le pseudo est disponible, envoie success si il est deja prit et failed sinon
        while($ligne=fgets($fichier)){
            $mots = explode(" ", $ligne);
            if ($mots[0]== $pseudo) {
                echo "Success";
                $valide=true;
                break;
            }
        }

        if (!$valide) {
        	echo "Failed";
        }
        fclose($fichier);

?>
