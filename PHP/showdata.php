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
 

 
 foreach(array_keys($json["user"],$_POST['userData']) as $index){	
 
//Show just the records with the matching keyword
if($json["keyword"][$index] === $_POST["keyword_data"]) 
	echo " Your Keyword: \"" . $json["keyword"][$index] . "\" Date of recording: " . $json["date"][$index] . "<br>"; 
	

	//if($_POST["start_date"] < $_POST["fin_date"])
	//TODO

}

?>

</body>
</html> 
