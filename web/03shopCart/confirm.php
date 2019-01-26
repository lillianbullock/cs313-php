<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
   <title>Cart</title>
</head>
<body>
   <h1>Cart</h1>
   <div>
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>#</th>
            </tr>
       
       <?php
        foreach ($_SESSION['cart'] as $x => $x_val) {
            echo "<tr>";
            echo "<td>" . $x . "</td>";
            echo "<td>" . $_SESSION['inventory'][$x] . "</td>";
            echo "<td>" . $x_val . "</td>";
            echo "</tr>";
        }
            
            // REMOVE FROM CART BUTTON
            // SUBTOTAL FIELD
       ?>
            
        </table>
    
        <?php//var_dump($_SESSION);?>
    
       // ADDRESS INFO 
       
       <br/>
    
    </div>
</body>
</html>