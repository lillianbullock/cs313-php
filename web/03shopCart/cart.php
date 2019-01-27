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
                <th>#</th>
                <th>Price</th>
            </tr>
       
       <?php
        foreach($_SESSION['cart'] as $x => $x_val) {
            if ($x_val > 0) {
                echo "<tr>";
                echo "<td>" . $x . "</td>";
                echo "<td>" . $x_val . "</td>";
                echo "<td>" . $_SESSION['inventory'][$x] . "</td>";
                
                echo "<td>";
                echo "<form action='remove.php' method='post'>";
                echo "<input type='hidden' id='rm' name='rm' value='" . $x. "'>";
                echo "<button onclick='submit'>Remove One</button>";
                echo "</form><br/>";
                echo "</td>";
                
                echo "</tr>";
            }
        }
          
        $total = 0;
        foreach ($_SESSION['cart'] as $x => $x_val) {
            if ($x_val > 0) {
                $total += ($x_val * $_SESSION['inventory'][$x]);
            }
        }
        
        echo "<tr><td><b>Total</b></td><td></td><td>";
        echo $total;    
        echo "</td></tr>";
            // SUBTOTAL FIELD
       ?>
            
        </table>
    
       <?php//var_dump($_SESSION);?>
        
        <form action='browse.php' method='post'>
        <button onclick='submit'>Return to Browse</button>
        </form><br/>
       
        <form action='checkout.php' method='post'>
        <button onclick='submit'>Go to Checkout</button>
        </form><br/>
    
    </div>
</body>
</html>