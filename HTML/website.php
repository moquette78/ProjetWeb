 <!DOCTYPE html>
<html>
<?php session_start();?>

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/website.css">
</head>

<body>
<header>
<h1 id="headline">Record your moves </h1><hr>
<form action="../PHP/deconnexion.php">
	<input id="deco" type="submit" value="Se deconnecter">
</form>
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



<!-- Start sans retardateur --> 
<h1 id="startSansRetardateur" >Press on this button for recording</h1>
<button type="button" onclick="sansRedardeteur()" id="SansButton">Start</button><br><br>


<!-- Start avec retardateur --> 
<h1 id="startAvecRetardateur">Press on this button for a 3 second delay recording</h1>
<button type="button" onclick="avecRedardateur()" id="AvecButton">Start</button> 
 
<hr>

<span id="countdowntimer"> </span>
<h1 id="count-up">Time Passed</h1>

<div class="wrapper">
<div id="coordinates"> 
	<h1 id="X">X Value: <h1 id="demoX"></h1></h1><br>
	<h1 id="Y">Y Value: <h1 id="demoY"></h1></h1><br>
	<h1 id="Z">Z Value: <h1 id="demoZ"></h1></h1>
</div> 


	<div id="graphs">
<!-- Its really important that width and height have the same value as the variable "sizeofgraph" of the javascript file  -->
	<canvas id="my" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas>
<!--add graphes--> 
	<canvas id="myY" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas>
	<canvas id="myZ" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas><br>
	<canvas id="myA" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas> 
	<canvas id="myB" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas>
	<canvas id="myC" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas><br>

	 <h5>Vitesse moyenne X</h5>	
	</div>
</div>
<!--Stop Button -->
<button type="button" id="stopButton" onclick ="stopRecording()">Stop</button> 

<br><br>




<p id="ok">Give your Data a Keyword</p> <input type="text" name="keyword" id="keyword" >
<button type="button" id="sendButton" onclick="sendDonnees()">Send your Data to the Server</button>
<button id="refreshButton"onclick="location.reload();">Record Again</button>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script type="text/javascript" src="../JAVASCRIPT/myScript.js">
</script>
</body>
</html> 
