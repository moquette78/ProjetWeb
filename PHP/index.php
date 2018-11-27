<!DOCTYPE html>

<!--<?php 

	$monfichier = fopen('fichier.txt','r+');
	function addUser($pseudo,$mdp){
		if(isset($pseudo))
			fputs(fichier.txt,$pseudo);
	}
?> -->

<html>
<head>
<title>Page de connexion</title>
</head>

<body>
	<form name="signin" method="post" action="signin.php"> Connexion  <br/>
	<label>Pseudo: </label> <input type="text" name="pseudo_c">
	<label>Mot de passe:</label><input type="password" name="mdp_c">
	<input type="submit" name="envoie_c">
	</form> <br/>

	<form name="signup" method="post" action="signup.php"> Inscription  <br/>
	<label>Pseudo: </label> <input type="text" name="pseudo_i">
	<label>Mot de passe:</label><input type="password" name="mdp_i">
	<input type="submit" name="envoie_i">
	</form>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script >
		jQuery(document).ready(function(){
    		console.log("jQuery est prêt !");
		});
	</script>
	
</body>

</html>
