<?php session_start(); 

$item = $_POST['add'];

$_SESSION['cart'][$item]++;
       
header("Location: browse.php");
die();        
       
?>
   