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
            if ($x_val > 0) {
                echo "<tr>";
                echo "<td>" . $x . "</td>";
                echo "<td>" . $_SESSION['inventory'][$x] . "</td>";
                echo "<td>" . $x_val . "</td>";
                echo "</tr>";
            }
        }
            
            // REMOVE FROM CART BUTTON
            // SUBTOTAL FIELD
       ?>
            
        </table>
    
        //var_dump($_SESSION);
    
        <form action='checkout.php' method='post'>
        <button onclick='submit'>Go to Checkout</button>
        </form><br/>
    
    </div>
</body>
</html>