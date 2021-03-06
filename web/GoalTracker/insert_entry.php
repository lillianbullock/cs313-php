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
        require 'include/getDB.php';
        ?>

        <div class='centre purple'>
        
        <?php

        try {
        // inserts the received goal, and if it fails deals with the
        // exception instead of just breaking the page
            $stmt = $db->prepare("INSERT INTO goal_entry
                                ( goal_id, input, timestamp)
                                VALUES ( :goal_id
                                , :input
                                , Now());");
            $stmt->execute(array('goal_id' => $_POST['goal_id']
                                , 'input' => $_POST['entry'] ));

            echo "Row inserted";

            //$newId = $db->lastInsertId('goal_goal_id_seq');
            //echo "New Id is  ", $newId;

        } catch (exception $e) {
            echo "The insert failed";
        }
        ?>

        <br/><br/>
        <form action="/GoalTracker/goal_view.php" method="POST">
                <?php
                echo '<input type="hidden" name="goal_id" value="';
                echo $_POST['goal_id'];
                echo '">';
                ?>
                <input type="submit" value="Return to Goal">
            </form> 

        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>