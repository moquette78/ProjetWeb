<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
Bienvenue

<?php

$fichier = fopen('fichier.txt', 'r+'); //ouverture du fichier en lecture et ecriture
$unique=true;
while($ligne=fgets($fichier)){
	$mots = explode(" ", $ligne);
	if ($mots[0]== $_POST['pseudo_i']) {
		$unique=false;
	}
}
if($unique){
	fputs($fichier, $_POST['pseudo_i']." ".$_POST['mdp_i']."\n");
}
fclose($fichier);
?>
</body>

</html>
