 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/website.css">
</head>

<body>


<?php
//Find User Data 
function find_information_ofuser($userName, $json) {


 $counter = 0;
 foreach($json["user"] as $sub_json){
	if($sub_json === $_POST['userData'])
		return $counter;
	else
		$counter++;
 }	
}

 echo "You choosed user: " . $_POST['userData'] . "<br>";
 $json =  file_get_contents("../JSON/document.json");
 $json = json_decode($json,true);
 
 $index = find_information_ofuser($_POST['userData'],$json);
 
 
 echo " Your Keyword: " . $json["keyword"][$index] . "<br>";
 echo " Date of recording " . $json["date"][$index] . "<br>";

?>

</body>
</html> 
