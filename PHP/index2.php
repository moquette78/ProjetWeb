<!DOCTYPE html>

<html>
<head>
<title>Page de connexion</title>
</head>

<body>
	<form name="signin" > Connexion  <br/>
	<label>Pseudo: </label> <input type="text" name="pseudo_c" id="pseudo_c">
	<label>Mot de passe:</label><input type="password" name="mdp_c" id>
	<input type="submit" id="sub_c">
	</form> <br/>

	<form name="signup" > Inscription  <br/>
	<label>Pseudo: </label> <input type="text" name="pseudo_i">
	<label>Mot de passe:</label><input type="password" name="mdp_i">
	<input type="submit" id="sub_i">
	</form>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script >
		jQuery(document).ready(function(){
    		console.log("jQuery est prêt !");
		});
	</script>
	
</body>

</html>


