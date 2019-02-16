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
            // delete access rows
            $stmt = $db->prepare('DELETE from access
                                WHERE goal_id = :goal_id;');
            $stmt->execute(array(':goal_id' => $_POST['goal_id'])); 
                        
            // delete goal_entry rows      
            $stmt = $db->prepare('DELETE from goal_entry
                                WHERE goal_id = :goal_id;');
            $stmt->execute(array(':goal_id' => $_POST['goal_id']));

            // delete the goal row      
            $stmt = $db->prepare('DELETE from goal
                                WHERE goal_id = :goal_id;');
            $stmt->execute(array(':goal_id' => $_POST['goal_id']));
            
            echo 'Goal Deleted';
        } catch (exception $e) {
            echo "The delete failed";
        }

        ?>

        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>