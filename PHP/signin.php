<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
Bienvenue

<?php

$fichier = fopen('fichier.txt', 'r+'); //ouverture du fichier en lecture et ecriture
$connecte=false;
while($ligne=fgets($fichier)){
	$mots = explode(" ", $ligne);
	if ($mots[0]== $_POST['pseudo_c']) {
		if ($_POST['mdp_c'] == trim($mots[1])){
			echo 'Vous etes connecté';
			$connecte=true;
			break;
		}
}
}

if (! $connecte){
	echo 'non';
}
fclose($fichier);
?>
</body>

</html>

