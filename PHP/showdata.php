 <!DOCTYPE html>
<html>
<!-- Projet de: Giovanni Simon, Nadime Barhoumi  -->
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/website.css">


<style>

#return_button {float: right;}
tab {
    display: inline-block; 
    margin-left: 20px; 
}
p {
    display: inline;	
}

h5 {
    display: inline;	
}
canvas {
	display: inline;
}
   
</style>
</head>

<body>

<h1 id="headline">Show my data</h1><hr>

<form>
  <input id="return_button" type="button" value="Retourner!" onclick="history.back()">
</form>

<?php
 echo "<h1>You choosed user: " . $_POST['userData'] . "</h1>";
 $json =  file_get_contents("../JSON/document.json");
 $json = json_decode($json,true);
 
$graph_index = 0;
 
//Look for the user with the matching keyword 

 foreach(array_keys($json["user"],$_POST['userData']) as $index){	
 
//Show just the records with the matching keyword
if($json["keyword"][$index] === $_POST["keyword_data"]) 
	echo "<h1> Your Keyword: \"" . $json["keyword"][$index] . "\" Date of recording: " . $json["date"][$index] . "</h1><br>"; 
	
$graph_index = $index;

}

$xArray = $json["x"][$graph_index];
$yArray = $json["y"][$graph_index];
$zArray = $json["z"][$graph_index];
$aArray = $json["a"][$graph_index];
$bArray = $json["b"][$graph_index];
$cArray = $json["c"][$graph_index];

?>


<div id="topgraph">
<canvas id="myX" width="250" height="250" style="border:1px solid #d3d3d3;"></canvas>
<canvas id="myY" width="250" height="250" style="border:1px solid #d3d3d3;"></canvas>
<canvas id="myZ" width="250" height="250" style="border:1px solid #d3d3d3;"></canvas>
<img src="xyz.jpeg"  alt="Italian Trulli"><brb><brb>

<br><p>Vitesse moyenne X: <h5 id="xMoyenne">fd</h5></p>  <p><tab>Vitesse moyenne Y: <h5 id="yMoyenne"> fd</h5></p><p><tab>Vitesse moyenne Z:<h5 id="zMoyenne"> fd</h5></p>
</div>

<div id="lowgraph">
<canvas id="myA" width="250" height="250" style="border:1px solid #d3d3d3;"></canvas>
<canvas id="myB" width="250" height="250" style="border:1px solid #d3d3d3;"></canvas>
<canvas id="myC" width="250" height="250" style="border:1px solid #d3d3d3;"></canvas>
<br><p>Vitesse moyenne A: <h5 id="aMoyenne">fd</h5></p>  <p><tab>Vitesse moyenne B: <h5 id="bMoyenne"> fd</h5></p><p><tab>Vitesse moyenne C:<h5 id="cMoyenne"> fd</h5></p>
</div>
<script type="text/javascript">

	var arrX = <?php echo json_encode ($xArray); ?>;
	var arrY = <?php echo json_encode ($yArray); ?>;
	var arrZ = <?php echo json_encode ($zArray); ?>;
	var arrA = <?php echo json_encode ($aArray); ?>;
	var arrB = <?php echo json_encode ($bArray); ?>;
	var arrC = <?php echo json_encode ($cArray); ?>;
	
	var sizeofgraph = 250; //this value needs the same as the value from the html document	
	
	/*var str = "";
	for(var i=0; i<arrX.length; i++){
	str += String(arrX[i]) + "  ";        	
    	}
	console.log(str); */
	drawGraphZ();
	drawGraphY();
	drawGraphX();
	drawGraphA();
	drawGraphB();
	drawGraphC();
	


//The same function as in Myscript.js
function drawGraphZ() {
    

    c = document.getElementById("myZ");
    ctx = c.getContext("2d");
    
    ctx.moveTo(0, sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);

    var moyenne = 0;
    var i = 0;
    for(; i < arrZ.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrZ[i],10));
	moyenne += parseInt(arrZ[i],10);
    }
    document.getElementById("zMoyenne").innerHTML = Number.parseFloat(moyenne/i).toFixed(2) + " m/s";


    ctx.lineWidth = 1;
    ctx.strokeStyle = '#008000';
    ctx.stroke(); 
}

function drawGraphY() {
    
    c = document.getElementById("myY");
    ctx = c.getContext("2d");
    
    ctx.moveTo(0,sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
    

    var moyenne = 0;
    var i = 0;
    for(; i < arrY.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrY[i],10));
	moyenne += parseInt(arrY[i],10);
    }
    document.getElementById("yMoyenne").innerHTML = Number.parseFloat(moyenne/i).toFixed(2) + " m/s";

    ctx.lineWidth = 1;
    ctx.strokeStyle = '#0000ff';
    ctx.stroke(); 
  }

function drawGraphX() {
    

    c = document.getElementById("myX");
    ctx = c.getContext("2d");
    
    ctx.moveTo(0,sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
    
    var moyenne = 0;
    var i = 0;
    for(; i < arrX.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrX[i],10));
	moyenne += parseInt(arrX[i],10);
    }
    document.getElementById("xMoyenne").innerHTML = Number.parseFloat(moyenne/i).toFixed(2) + " m/s";
    ctx.lineWidth = 1;
    ctx.strokeStyle = '#ff0000';
    
    ctx.stroke(); 

  }
function drawGraphA() {
    

    c = document.getElementById("myA");
    ctx = c.getContext("2d");
    
    ctx.moveTo(0,sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
    
    var moyenne = 0;
    var i = 0;
    for(; i < arrA.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrA[i],10));
	moyenne += parseInt(arrA[i],10);
    }
    document.getElementById("aMoyenne").innerHTML = Number.parseFloat(moyenne/i).toFixed(2) + " m/s";
    ctx.lineWidth = 1;
    ctx.strokeStyle = '#222222';
    
    ctx.stroke(); 

  }

function drawGraphB() {
    

    c = document.getElementById("myB");
    ctx = c.getContext("2d");
    
    ctx.moveTo(0,sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
    
    var moyenne = 0;
    var i = 0;
    for(; i < arrB.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrB[i],10));
	moyenne += parseInt(arrB[i],10);
    }
    document.getElementById("bMoyenne").innerHTML = Number.parseFloat(moyenne/i).toFixed(2) + " m/s";
    ctx.lineWidth = 1;
    ctx.strokeStyle = '#558050';
    
    ctx.stroke(); 

  }

function drawGraphC() {
    

    c = document.getElementById("myC");
    ctx = c.getContext("2d");
    
    ctx.moveTo(0,sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
    
    var moyenne = 0;
    var i = 0;
    for(; i < arrC.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrC[i],10));
	moyenne += parseInt(arrC[i],10);
    }
    document.getElementById("cMoyenne").innerHTML = Number.parseFloat(moyenne/i).toFixed(2) + " m/s";
    ctx.lineWidth = 1;
    ctx.strokeStyle = '#908010';
    
    ctx.stroke(); 

  }

</script>

</body>
</html> 
