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
            <form action="insert_entry.php" method="POST" class="centre"
            onsubmit="return validateCreateEntry()" onreset="reseterrors()"
            >
            <!-- TODO create the js validation --> 
                Goal name: <?php echo $entry['name']; ?><br/><br/>

                Email user to share with: 
                <span id="emailError" class="error">Empty Field</span><br/>
                <input type="email" id="email" name="email"
                onchange="validateText('email', 'emailError')"><br><br/>
                
                <!-- make it so can edit is a changeable field --> 
                Can edit: No
                
                <br/><input type="submit" value="Submit">
                <input type="reset" value="Reset"/>
            </form>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>