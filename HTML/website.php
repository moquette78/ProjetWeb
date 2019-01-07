 <!DOCTYPE html>
<html>
<?php session_start();?>

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/website.css">
</head>

<body>
<header>
<div>
	<form action="../HTML/requete.php">
	<input id="requete" type="submit" value="FAIRE UNE REQUETE">
	</form>
<form action="../PHP/deconnexion.php">
	<input id="deco" type="submit" value="SE DECONNECTER">
</form>
</div>
<h1 id="headline">Enregistrer vos mouvements </h1>
</br>
<hr>

</header>






<!-- Start sans retardateur --> 
<h1 id="startSansRetardateur" >Appuyer ici pour enregistrer immédiatement</h1>
<button type="button" onclick="sansRedardeteur()" id="SansButton">START</button><br><br>


<!-- Start avec retardateur --> 
<h1 id="startAvecRetardateur">Appuyer ici pour enregistrer avec un retardateur de 3 secondes</h1>
<button type="button" onclick="avecRedardateur()" id="AvecButton">START</button> 
 
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
<button type="button" id="stopButton" onclick ="stopRecording()">STOP</button> 

<br><br>




<p id="ok">Give your Data a Keyword</p> <input type="text" name="keyword" id="keyword" >
<button type="button" id="sendButton" onclick="sendDonnees()">Send your Data to the Server</button>
<button id="refreshButton"onclick="location.reload();">Record Again</button>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script type="text/javascript" src="../JAVASCRIPT/myScript.js">
</script>
</body>
</html> 
