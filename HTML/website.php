 <!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/website.css">
</head>

<body>
<header>
<h1 id="headline">Record your moves</h1><hr>
<form action="../PHP/deconnexion.php">
	<input id="show" type="submit" value="Voir mes enregistrements">
	<input id="deco" type="submit" value="Se deconnecter">
</form>
</header>







<form action ="../PHP/showdata.php" method = "POST"  onsubmit="return compareStrings(keyword_data.value);">


<?php session_start(); //echo $_SESSION['pseudo']; 

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



<!-- Start sans retardateur --> 
<h1 id="startSansRetardateur" >Press on this button for recording</h1>
<button type="button" onclick="sansRedardeteur()" id="SansButton">Start</button><br><br>


<!-- Start avec retardateur --> 
<h1 id="startAvecRetardateur">Press on this button for a 3 second delay recording</h1>
<button type="button" onclick="avecRedardateur()" id="AvecButton">Start</button> 
 
<hr>

<span id="countdowntimer"> </span>
<h1 id="X">X Value</h1>

<h1 id="count-up">lol</h1>
<h1 id="demoX">Make in Progress</h1>
<h1 id="Y">Y Value</h1>
	<h1 id="demoY">Make in Progress</h1>
<h1 id="Z">Z Value</h1>
<h1 id="demoZ">Make in Progress</h1>

<!--Stop Button -->
<button type="button" id="stopButton" onclick ="stopRecording()">Stop</button> 

<br><br>

<!-- Its really important that width and height have the same value as the variable "sizeofgraph" of the javascript file  -->
<canvas id="my" width="100" height="100" style="border:1px solid #d3d3d3;"></canvas>
<!--add two new graphes--> 
<canvas id="myY" width="100" height="100" style="border:1px solid #d3d3d3;"></canvas>
<canvas id="myZ" width="100" height="100" style="border:1px solid #d3d3d3;"></canvas>


<p id="ok">Give your Data a Keyword</p> <input type="text" name="keyword" id="keyword" >
<button type="button" id="sendButton" onclick="sendDonnees()">Send your Data to the Server</button>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script type="text/javascript" src="../JAVASCRIPT/myScript.js">

</script>
</body>
</html> 
