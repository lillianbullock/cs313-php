<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>
   <title>About Us</title>
</head>
<body>
   <h1>About Us</h1>
   <div>
      
        <?php
        $_SESSION[$inventory] = array("Mistcloak" => "9.99", 
                        "Shardblade" => "234.00", 
                        "Shardplate" => "400.00");
       
        foreach ($_SESSION[$inventory] as $x => $x_val) {
            echo $x . " $" . $x_val;
            echo "<form action='cart.php?add=" . $x . "' method='post'>";
            echo "<button onclick='submit'>Add to Cart</button>";
            echo "</form><br/>";
        }
       
        ?>
       
       
    </div>
</body>
</html>