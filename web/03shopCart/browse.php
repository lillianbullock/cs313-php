<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>
   <title>Sanderzon</title>
</head>
<body>
   <h1>Sanderzon</h1>
   <div><p> This is the key place to buy items from all the Brandon Sanderson worlds. Magical items and more.</p></div>
    
    <div>
      
        <?php
        $_SESSION[$inventory] = array(
            "Mistcloak" => "9.99", 
            "Shardblade" => "234.00", 
            "Shardplate" => "400.00");
       
        foreach ($_SESSION[$inventory] as $x => $x_val) {
            echo $x . " $" . $x_val;
            echo "<form action='add.php?add=" . $x . "' method='post'>";
            echo "<button onclick='submit'>Add to Cart</button>";
            echo "</form><br/>";
        }
       
        ?>
       
       
    </div>
</body>
</html>