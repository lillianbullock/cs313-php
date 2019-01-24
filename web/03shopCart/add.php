<?php session_start(); 

$_SESSION[$cart[$_GET[add]]]++;
       
header("Location: browse.php");
die();        
       
?>
   