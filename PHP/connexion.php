<?php
   
    $fichier = fopen('../fichier.txt', 'r+'); //ouverture du fichier en lecture et ecriture
    $valide=false;
        while($ligne=fgets($fichier)){
            $mots = explode(" ", $ligne);
            if ($mots[0]== $_POST['pseudo']) {
                if (trim($mots[1])==$_POST['mdp']) {
                    session_start();
                    $_SESSION["pseudo"]=$_POST['pseudo'];
                    echo "Success";
                	$valide=true;
                	break;
                }
            }
        }

        if (!$valide) {
        	echo "Failed";
        }
        fclose($fichier);

?>
