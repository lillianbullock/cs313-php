<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
   <title>Cart</title>
</head>
<body>
   <h1>Cart</h1>
   <p>
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>#</th>
            </tr>
            <tr>
                <td>$x</td>
                <td>$_SESSION['Inventory'][$x]</td>
                <td>$x_val</td>
            </tr>
    
       
       <?php
        foreach ($_SESSION['cart'] as $x => $x_val) {
            echo "<tr>";
            echo "<td>" . $x . "</td>";
            echo "<td>" . $_SESSION['Inventory'][$x] . "</td>";
            echo "<td>" . $x_val . "</td>";
            echo "</tr>";
        }
       
       //var_dump($_SESSION);
       
       ?>
            
        </table>
    
    </p>
</body>
</html>