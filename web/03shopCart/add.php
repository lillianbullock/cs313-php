<?php session_start(); 

$item = $_GET[add];

$_SESSION['cart'[$item]]++;
       
header("Location: browse.php");
die();        
       
?>
   