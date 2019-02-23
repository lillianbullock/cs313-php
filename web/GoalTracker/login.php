<!DOCTYPE html>
<html lang = "en" >
    <head>
        <link rel="stylesheet" type="text/css" href="include/style.css">
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entry</title>
      
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
            <form action="login_submit.php" class='centre' method="POST">
                Email:<br>
                <input type="email" name="email"><br/><br/>

                Password:<br/>
                <input type="password" name="password"><br/><br/>

                <input type="submit" value="Login">
            </form>

            <form action="/GoalTracker/create_user.php">
                <input type="submit" value="Create new account">
            </form> 

        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>