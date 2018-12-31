<?php 
session_start();
$_SESSION['keyword']=$_POST['keyword'];
$_SESSION['x']=$_POST['x'];
$_SESSION['y']=$_POST['y'];
$_SESSION['z']=$_POST['z'];
$_SESSION['date']=date("d.m.y");
// Read JSON file
$json = file_get_contents('../JSON/document.json');

//Decode JSON
$json_data = json_decode($json,true);
//Print data
print_r($json_data);
$obj['x']=$_POST['x'];
$obj['date']=date("d.m.y");
$obj['y']=$_POST['y'];
$obj['z']=$_POST['z'];
$obj['keyword']=$_POST['keyword'];

$json_data['user'][]=$_SESSION['pseudo'];
$json_data['keyword'][]=$_POST['keyword'];
$json_data['date'][]=date("d.m.y");
$json_data['x'][]=$_POST['x'];
$json_data['y'][]=$_POST['y'];
$json_data['z'][]=$_POST['z'];

$jsonData = json_encode($json_data);
print_r($json_data);
file_put_contents('../JSON/document.json', $jsonData);
?>


