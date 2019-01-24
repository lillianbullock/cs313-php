<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>
   <title>Cart</title>
</head>
<body>
   <h1>Cart</h1>
   <p>
       <?php
        $_SESSION[$cart[$_GET[add]]]++;
       
        foreach ($_SESSION[$cart] as $x => $x_val) {
            echo "<p> " . $x . " [". $x_val . "]";
        }
       
       ?>
    </p>
</body>
</html>