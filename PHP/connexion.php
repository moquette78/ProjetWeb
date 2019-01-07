<?php
   
    $fichier = fopen('../fichier.txt', 'r+'); //ouverture du fichier en lecture et ecriture
    $valide=false;
        while($ligne=fgets($fichier)){    //tant qu'il y a des lignes dans le fichier on coupe la ligne en deux
            $mots = explode(" ", $ligne);
            if ($mots[0]== $_POST['pseudo']) {  //si le pseudo entré dans le input et le pseudo du fichier correspondent alors on teste si les deux mots de passe correspondent
                if (trim($mots[1])==$_POST['mdp']) {
                    session_start();
                    $_SESSION["pseudo"]=$_POST['pseudo']; // si tout correpond alors connexion et retourne Success
                    echo "Success";
                	$valide=true;
                	break;
                }
            }
        }

        if (!$valide) {
        	echo "Failed"; // sinon retourne Failed
        }
        fclose($fichier);

?>
