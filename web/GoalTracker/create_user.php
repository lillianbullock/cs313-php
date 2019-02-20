<!DOCTYPE html>
<html lang = "en" >
    <head>
        <link rel="stylesheet" type="text/css" href="include/style.css">
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entry</title>
      
        <!--internal style sheets-->
        <style> </style>

        <script src=include/script.js> </script>
                  
    </head>
    
    <body>
        <?php    
            require 'include/header.php';
            require 'include/getDB.php';
        ?>

        <div class='centre purple'>
            <form action="insert_goal.php" method="POST" class="centre"
            onsubmit="return validateCreateGoal()" onreset="reseterrors()"
            >
                Name:
                <span id="fnameError" class="error">Empty Field</span><br/>
                <input type="text" id="fname" name="fname"
                onchange="validateText('fname', 'fnameError')"><br>

                Email:
                <span id="emailError" class="error">Empty Field</span><br/>
                <input type="email" id="email" name="email"
                onchange="validateText('email', 'emailError')"><br>

                Password:
                <span id="passError" class="error">Empty Field</span><br/>
                
                <input type="password" id="pass1" name="pass1"><br>

                <input type="password" id="pass2" name="pass2"
                onchange="validatePass('pass1', 'pass2', 'passError')"><br>


                <br/><input type="submit" value="Submit">
                <input type="reset" value="Reset"/>
            </form>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>