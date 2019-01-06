<?php 
session_start();
// Read JSON file
$json = file_get_contents('../JSON/document.json');
$json = json_decode($json,true);

$counter = 0;
foreach(array_keys($json["user"],$_REQUEST['user']) as $index){

if($json["keyword"][$index] === $_REQUEST["key"]){
	$counter = $counter + 1;
		
	break; 
 }
}
 
echo $counter == 1 ? "true" : "false"; 

?>
