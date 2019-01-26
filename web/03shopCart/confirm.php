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
        ?>
            
        </table>
    
       
        <br/><br/>Address:
        <?php
            echo htmlspecialchars($_POST['name']) . "<br/>";
            echo htmlspecialchars($_POST['address']) . "<br/>";
            echo htmlspecialchars($_POST['address2']) . "<br/>";
            echo htmlspecialchars($_POST['city']) . " ";
            echo htmlspecialchars($_POST['state']) . " ";
            echo htmlspecialchars($_POST['zip']) . "<br/>";
        ?>
       
       // ADDRESS INFO 
       
       <br/>
    
    </div>
</body>
</html>