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

            <form action="update_entry.php" method="POST" class="centre"
            onsubmit="return validateEditEntry()" onreset="reseterrors()">

                <?php

                $g_entry_id = $_POST['g_entry_id'];

                $statement = $db->query("select g.name
                            , e.g_entry_id
                            , e.input
                            , e.timestamp 
                            FROM goal g JOIN goal_entry e 
                            ON g.goal_id = e.goal_id
                            WHERE e.g_entry_id = $g_entry_id;");
                $bEntry = $statement->fetchAll(PDO::FETCH_ASSOC);

                $entry = $bEntry[0];  
                ?>

                Goal name: <span> <?php echo $entry['name']; ?> </span><br/><br/>

                Input: <input type="text" id="entry" name="entry" 
                    value="<?php echo $entry['input']; ?>"
                onchange="validateText('entry', 'entryError')">
                <span id="entryError" class="error">Empty Field</span><br><br/>
            
                <!-- TODO add calendar picker? -->
                TimeStamp: <span> <?php echo $entry['timestamp']; ?> </span><br/>

                <input type="hidden" name="g_entry_id" value="<?php echo $entry['g_entry_id'];?> ">

                <br/><input type="submit" value="Submit">
                <input type="reset" value="Reset"/>
            </form>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>