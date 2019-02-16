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
        $id = $_POST['goal_id'];
        foreach ($db->query("SELECT owner from goal where goal_id = $id;") as $row)
        {
            var_dump($row);
            if ($row['owner'] != 1) {// TODO replace when login working 
                echo "You don't have permission to delete this goal";
            }
            else {
                echo 'Are you sure that you want to delete this goal? <br/>';
                echo 'It will not be recoverable.';

                echo '<form action="/GoalTracker/delete_goal.php" method="POST">';
                echo '<input type="hidden" id="goal_id" name="goal_id" value="';
                echo $id;
                echo '"><input class="purplebutton" type="submit" value="Yes"></form>';

                echo '<form action="/GoalTracker/goal_list.php" method="POST">';
                echo '<input class="purplebutton" type="submit" value="No"></form>';
            }
        }
        ?>

        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>