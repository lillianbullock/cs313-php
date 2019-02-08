<!DOCTYPE html>
<html lang = "en" >
    <head>
        <link rel="stylesheet" type="text/css" href="include/style.css">
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
      
        <!--internal style sheets-->
        <style> </style>

        <!-- <script src=prove01.js> </script> -->
                  
    </head>
    
    <body>

        <?php 
            require 'include/header.php'; 
            require 'include/getDB.php'; ?>

        <!-- TODO add js to validate this form -->

        <div class='centre purple'>
            <form action="login.php" class='centre' method="POST">
                Email:<br>
                <input type="email" name="email"><br/><br/>

                Password:<br/>
                <input type="password" name="pswd"><br/><br/>

                <input type="submit" value="Login">
            </form>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>