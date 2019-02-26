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
        require 'include/getDB.php';
        ?>

        <div class='centre purple'>
        
        <?php

        try {
        // inserts the received goal, and if it fails deals with the
        // exception instead of just breaking the page
            $stmt = $db->prepare("UPDATE goal_entry 
                                SET input = :entry 
                                WHERE g_entry_id = :goal_entry_id;");
            $stmt->execute(array( 'entry' => $_POST['entry']
                                , 'goal_entry_id' => $_POST['g_entry_id']));

            echo "Row updated";

            //$newId = $db->lastInsertId('goal_goal_id_seq');
            //echo "New Id is  ", $newId;

        } catch (exception $e) {
            echo "The insert failed";
        }
        ?>
        
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>