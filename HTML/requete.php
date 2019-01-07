
<!DOCTYPE html>
<html>
<?php 
	session_start();
	if(!isset($_SESSION['pseudo'])){
		header('Location: index.html');
	}
?>
<head>
<title>Requete</title>
<link rel="stylesheet" type="text/css" href="../CSS/requete.css">
</head>

<body>

<header>
<div>
	<a href="../HTML/website.php">
	<input id="requete" type="submit" value="ENREGISTRER DES DONNEES">
	</a>
<a href="../PHP/deconnexion.php">
	<input id="deco" type="submit" value="SE DECONNECTER">
</a>
</div>
<h1 id="headline">Faite une requete </h1>
</br>
<hr>

</header>

<form action ="../PHP/showdata.php" method = "POST"  onsubmit="return compareStrings(keyword_data.value);">


<?php  //echo $_SESSION['pseudo']; 
 $json =  file_get_contents("../JSON/document.json");
 $json = json_decode($json,true); 
 //print_r($json); 
 // -- Creat Liste of Users 
	$count = 0;	
	echo "Choose one user and see his data ";
	echo "<select name='userData' id='userData'>";
	foreach(array_unique($json["user"]) as $value)	
	echo "<option value='". $value . "'>" . $value . "</option>";
	echo "<select>";
?>

<input type="date" id="trip_start" name="start_date"
       min="2018-01-01" max="2019-12-31" required onchange="showHint(keyword_data.value)">
<input type="date" id="trip_fin" name="fin_date"
       min="2018-01-01" max="2019-12-31" required onchange="showHint(keyword_data.value)">

<input type="text" id="keyword_data" name="keyword_data" required placeholder="Keyword" onkeyup="showHint(this.value)" >
<input  value="Show Data of User" type ="submit"/>
<br>
<p id="suggest">Suggestions-Keywords: <span id="txtHint" name="txtHint">Keys</span></p>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script type="text/javascript" src="../JAVASCRIPT/myScript.js"></script>
</body>

</html> 
