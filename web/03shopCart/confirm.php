<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
   <title>Confirm</title>
</head>
<body>
   <h1>Confirm Order</h1>
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
            
            if (isset($_POST['address2']) || $_POST['address2'] == "") {
                echo htmlspecialchars($_POST['address2']) . "<br/>";
            }
            echo htmlspecialchars($_POST['city']) . " ";
            echo htmlspecialchars($_POST['state']) . " ";
            echo htmlspecialchars($_POST['zip']) . "<br/>";
        ?>
       
       
       <br/>
    
    </div>
</body>
</html>