 <!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/website.css">
</head>

<body>
<form action="../PHP/deconnexion.php">
	<input id="deco" type="submit" value="Se deconnecter">
</form>


<!-- Start sans retardateur --> 
<h1 id="startSansRetardateur">Press on this button for recording</h1>
<button type="button" onclick="sansRedardeteur()" id="SansButton">Start</button>


<!-- Start avec retardateur --> 
<h1 id="startAvecRetardateur">Press on this button for a 3 second delay recording</h1>
<button type="button" onclick="avecRedardateur()" id="AvecButton"">Start</button> 
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
<?php session_start(); echo $_SESSION['pseudo']; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script type="text/javascript" src="../JAVASCRIPT/myScript.js">

</script>
</body>
</html> 
