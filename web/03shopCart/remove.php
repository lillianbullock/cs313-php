<?php session_start(); 

$item = $_POST[add];


if ($_SESSION['cart'][$item] > 0) {
    $_SESSION['cart'][$item]--;
}
header("Location: browse.php");
die();        
       
?>
   