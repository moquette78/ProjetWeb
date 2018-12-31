<?php 
session_start();
$_SESSION['keyword']=$_POST['keyword'];
$_SESSION['x']=$_POST['x'];
$_SESSION['y']=$_POST['y'];
$_SESSION['z']=$_POST['z'];
$_SESSION['date']=date("d.m.y");
// Read JSON file
$json = file_get_contents('./student_data.json');

//Decode JSON
$json_data = json_decode($json,true);
?>