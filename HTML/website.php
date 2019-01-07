 <!DOCTYPE html>
<html>
<?php session_start();?>

<?php 
	if(!isset($_SESSION['pseudo'])){
		header('Location: index.html');
	}
?>

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/website.css">
</head>

<body>
<header>
<div>
	<a href="../HTML/requete.php">
	<input id="requete" type="submit" value="FAIRE UNE REQUETE">
	</a>
<a href="../PHP/deconnexion.php">
	<input id="deco" type="submit" value="SE DECONNECTER">
</a>
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

<h1><span id="countdowntimer"> </span></h1>
<h1 id="count-up">Seconds:</h1>

<div class="wrapper">
<div id="coordinates"> 
	<h4 id="X" style="display:inline">Acceleration direction x Value: <h4 id="demoX" ></h4></h4>
	<h4 id="Y">Acceleration direction y Value: <h4 id="demoY"></h4></h4>
	<h4 id="Z">Acceleration direction z Value: <h4 id="demoZ"></h4></h4>
	<h4 id="A">Inclinaison direction x Value: <h4 id="demoA"></h4></h4>
	<h4 id="B">Inclinaison direction y Value:<h4 id="demoB"></h4></h4>
	<h4 id="C">Inclinaison direction z Value: <h4 id="demoC"></h4></h4>
</div> 


	<div id="graphs">
<!-- Its really important that width and height have the same value as the variable "sizeofgraph" of the javascript file  -->
	<canvas id="myX" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas>
<!--add graphes--> 
	<canvas id="myY" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas>
	<canvas id="myZ" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas><br>
	<div id="graph_discription"><h6>acceleration direction x <tab> acceleration direction y  <tab> acceleration direction z</h6></div>
	<canvas id="myA" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas> 
	<canvas id="myB" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas>
	<canvas id="myC" width="150" height="150" style="border:1px solid #d3d3d3;"></canvas><br>
        <h6>Inclinaison direction x <tab> Inclinaison direction y  <tab> Inclinaison direction z</h6>	
	</div>
</div>
<!--Stop Button -->
<button type="button" id="stopButton" onclick ="stopRecording()">STOP</button> 

<br><br>




<p id="description_data">Give your Data a Keyword</p> <input type="text" name="keyword" id="keyword" >
<button type="button" id="sendButton" onclick="sendDonnees()">Send your Data to the Server</button>
<button id="refreshButton"onclick="location.reload();">Record Again</button>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script type="text/javascript" src="../JAVASCRIPT/myScript.js">
</script>
</body>
</html> 
