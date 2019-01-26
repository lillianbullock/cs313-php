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
        $_SESSION['inventory'] = array(
            "Mistcloak" => "9.99", 
            "Shardblade" => "234.00", 
            "Shardplate" => "400.00");
       
        foreach ($_SESSION['inventory'] as $x => $x_val) {
            echo $x . " $" . $x_val;
            echo "<form action='add.php' method='post'>";
            echo "<input type='hidden' id='add' name='add' value='" . $x. "'>";
            echo "<button onclick='submit'>Add to Cart</button>";
            echo "</form><br/>";
        }
       
        ?>
       
        <!--
        <form action='cart.php' method='post'>
        <input type="hidden" id="add" name="add" value="$x">
        <button onclick='submit'>Go to Cart</button>
        </form><br/>
        -->

        <form action='cart.php' method='post'>
        <button onclick='submit'>Go to Cart</button>
        </form><br/>
    </div>
</body>
</html>