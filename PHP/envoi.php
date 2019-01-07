<?php 
session_start();
//on ajoute l'enregistrement de l'utilisateur en variable de session

$_SESSION['keyword']=$_POST['keyword'];
$_SESSION['x']=$_POST['x'];
$_SESSION['y']=$_POST['y'];
$_SESSION['z']=$_POST['z'];
$_SESSION['a']=$_POST[''];
$_SESSION['b']=$_POST['b'];
$_SESSION['c']=$_POST['c'];
$_SESSION['date']=date("d.m.y");
// Lis le fichier JSON
$json = file_get_contents('../JSON/document.json');

//Decode JSON
$json_data = json_decode($json,true);

//Ajout des données dans le fichier JSON
$json_data['user'][]=$_SESSION['pseudo'];
$json_data['keyword'][]=$_POST['keyword'];
$json_data['date'][]=date("Y-m-d");
$json_data['x'][]=$_POST['x'];
$json_data['y'][]=$_POST['y'];
$json_data['z'][]=$_POST['z'];
$json_data['a'][]=$_POST['a'];
$json_data['b'][]=$_POST['b'];
$json_data['c'][]=$_POST['c'];
$json_data['seconds'][]=$_POST['seconds'];

$jsonData = json_encode($json_data);
print_r($json_data);
//Ecrit les données dans le fichier
file_put_contents('../JSON/document.json', $jsonData);
?>
