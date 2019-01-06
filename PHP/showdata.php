 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/website.css">
</head>

<body>


<?php
 echo "You choosed user: " . $_POST['userData'] . "<br><br>";
 $json =  file_get_contents("../JSON/document.json");
 $json = json_decode($json,true);
 
$graph_index = 0;
 
 foreach(array_keys($json["user"],$_POST['userData']) as $index){	
 
//Show just the records with the matching keyword
if($json["keyword"][$index] === $_POST["keyword_data"]) 
	echo " Your Keyword: \"" . $json["keyword"][$index] . "\" Date of recording: " . $json["date"][$index] . "<br>"; 
	
$graph_index = $index;

}

$xArray = $json["x"][$graph_index];
$yArray = $json["y"][$graph_index];
$zArray = $json["z"][$graph_index];


?>



<canvas id="myX" width="100" height="100" style="border:1px solid #d3d3d3;"></canvas>
<canvas id="myY" width="100" height="100" style="border:1px solid #d3d3d3;"></canvas>
<canvas id="myZ" width="100" height="100" style="border:1px solid #d3d3d3;"></canvas>

<script type="text/javascript">

	var arrX = <?php echo json_encode ($xArray); ?>;
	var arrY = <?php echo json_encode ($yArray); ?>;
	var arrZ = <?php echo json_encode ($zArray); ?>;
	var sizeofgraph = 100; //this value needs the same as the value from the html document	
	
	/*var str = "";
	for(var i=0; i<arrX.length; i++){
	str += String(arrX[i]) + "  ";        	
    	}
	console.log(str); */
	drawGraphZ();
	drawGraphY();
	drawGraphX();

//The same function as in Myscript.js
function drawGraphZ() {
    

    c = document.getElementById("myZ");
    ctx = c.getContext("2d");
    
    ctx.moveTo(0, sizeofgraph/2);
    ctx.lineTo(100,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);

    for(var i = 0; i < arrZ.length; i++)
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrZ[i],10));


    ctx.lineWidth = 1;
    ctx.strokeStyle = '#008000';
    ctx.stroke(); 
}

function drawGraphY() {
    
    c = document.getElementById("myY");
    ctx = c.getContext("2d");
    
    ctx.moveTo(0,sizeofgraph/2);
    ctx.lineTo(100,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
    

    for(var i = 0; i < arrY.length; i++)
  	ctx.lineTo(i, (sizeofgraph/2) - parseInt(arrY[i],10));

    ctx.lineWidth = 1;
    ctx.strokeStyle = '#0000ff';
    ctx.stroke(); 
  }

function drawGraphX() {
    

    c = document.getElementById("myX");
    ctx = c.getContext("2d");
    
    ctx.moveTo(0,sizeofgraph/2);
    ctx.lineTo(100,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
        
    for(var i = 0; i < arrX.length; i++)
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrX[i],10));

    ctx.lineWidth = 1;
    ctx.strokeStyle = '#ff0000';
    ctx.stroke(); 
  }


</script>
</body>
</html> 
