<?php session_start(); 

$item = $_POST['rm'];


if ($_SESSION['cart'][$item] > 0) {
    $_SESSION['cart'][$item]--;
}
header("Location: browse.php");
die();        
       
?>
   