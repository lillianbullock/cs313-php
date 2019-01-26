<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
   <title>Cart</title>
</head>
<body>
   <h1>Cart</h1>
   <div>
    
        
        <form action='confirm.php' method='post'>
            <input type="text" name="name">
            <input type="text" name="address">
            <input type="text" name="address2">
            <input type="text" name="city">
            <input type="text" name="state">
            <input type="text" name="zip">
            
        <button onclick='submit'>Submit</button>
        </form><br/>
        
        <form action='cart.php' method='post'>
        <button onclick='submit'>Back to Cart</button>
        </form><br/>
    
    </div>
</body>
</html>