<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
   <title>Checkout</title>
</head>
<body>
   <h1>Checkout</h1>
   <div>
    
        
        <form action='confirm.php' method='post'>
            Name: <br/>
            <input type="text" name="name" value="frog"> <br/> <br/>
            Address: <br/>
            <input type="text" name="address" value="123 gerard pl"> <br/>
            <input type="text" name="address2"> <br/><br/>
            City: <br/>
            <input type="text" name="city" value="arad"> <br/><br/>
            State: <br/>
            <input type="text" name="state"value="AS"> <br/><br/>
            Zip Code: <br/>
            <input type="text" name="zip"value="1234"> <br/><br/>
            
        <button onclick='submit'>Submit</button>
        </form><br/>
        
        <form action='cart.php' method='post'>
        <button onclick='submit'>Back to Cart</button>
        </form><br/>
    
    </div>
</body>
</html>