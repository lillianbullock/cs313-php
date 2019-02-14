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

            <form action="edit_c_enter.php" method="POST" class="centre"
            onsubmit="return validateEditGoal()" onreset="reseterrors()">

                <?php

                $statement = $db->query("select g.name
                            , e.g_entry_id
                            , e.input
                            , e.timestamp 
                            FROM goal g JOIN goal_entry e 
                            ON g.goal_id = e.goal_id;");
                $bEntry = $statement->fetchAll(PDO::FETCH_ASSOC);
                $entry = $bEntry[0];
                //var_dump($entry);

                ?>

                Goal name: <span> <?php echo $entry['name']; ?> </span><br/>

                <span id="entryError" class="error">Empty Field</span><br/>
                Input: <input type="text" id="entry" name="entry" value="<?php echo $entry['input']; ?>"
                onchange="validateText('entry', 'entryError')"><br><br/>
            
                TimeStamp: <span> <?php echo $entry['timestamp']; ?> </span><br/>

                <br/><input type="submit" value="Submit">
                <input type="reset" value="Reset"/>
            </form>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>