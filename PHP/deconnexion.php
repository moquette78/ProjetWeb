<?php
session_start();
session_destroy(); // destruction de session puis retour au menu
header('location: ../HTML/index.html');
exit;
?>