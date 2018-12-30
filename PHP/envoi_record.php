<?php
 session_start ();
 $_SESSION['x']=$_POST['x'];
 $_SESSION['y']=$_POST['y'];
 $_SESSION['z']=$_POST['z'];
 $_SESSION['keyword']=$_POST['keyword'];
 $_SESSION['date']=time();
?>