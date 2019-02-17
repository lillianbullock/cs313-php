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
            <form action="insert_access.php" method="POST" class="centre"
            onsubmit="return validateCreateEntry()" onreset="reseterrors()"
            >
                <input type="hidden" name="goal_id"
                value=" <?php echo $_POST['goal_id']; ?> ">

            <!-- TODO create the js validation --> 

                <?php 
                $Gid = $_POST['goal_id'];
                $statement = $db->query("SELECT name
                                        FROM goal
                                        WHERE goal_id = $Gid;");
                $bEntry = $statement->fetchAll(PDO::FETCH_ASSOC);
                $entry = $bEntry[0];
                ?>
                Goal name: <?php echo $entry['name']; ?> <br/><br/>

                Email user to share with: 
                <span id="emailError" class="error">Empty Field</span><br/>
                <input type="email" id="email" name="email"
                onchange="validateText('email', 'emailError')"><br><br/>
                
                <!-- make it so can edit is a changeable field --> 
                Can edit: No <br/>
                
                <br/><input type="submit" value="Submit">
                <input type="reset" value="Reset"/>
            </form>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>