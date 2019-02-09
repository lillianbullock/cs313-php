<!DOCTYPE html>
<html lang = "en" >
    <head>
        <link rel="stylesheet" type="text/css" href="include/style.css">
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Goal</title>
      
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
                
            $stmt = $db->prepare('SELECT g_entry_id, name, input, timestamp
                                    FROM goal_entry ge
                                    WHERE goal_id = :goal_id;');
            $stmt->execute(array('goal_id' => $_POST['goal_id']));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<h1>';
            echo $row['name'];
            echo '</h1>';

            echo "<table class='centre'>";
            echo "<tr><th>Entry</th><th>Date/Time</th></tr>";

            foreach ($rows as $row)
            {
                echo '<tr><td>';
                // TODO entry_edit to be made later
                echo '<form action="/GoalTracker/edit_entry.php" method="POST">';
                echo '<input type="hidden" name="goal_id" value="';
                echo $_POST['goal_id'];
                echo '"><input type="hidden" name="entry_id" value="';
                echo $row['g_entry_id'];
                echo '"><input class="purplebutton" type="submit" value="';
                echo $row['input'];
                echo '"></form></td><td>';
                echo $row['timestamp'];
                echo "</td></tr>\n";
            }

            echo "</table>";
            ?>

            <!-- TODO create a create_entry & insert_entry -->
            <form action="/GoalTracker/create_entry.php" method="POST">
                <?php
                echo '<input type="hidden" name="goal_id" value="';
                echo $_POST['goal_id'];
                echo '">';
                ?>
                <input type="submit" value="Add a New Entry">
            </form> 

            <!-- TODO create a create_access & insert_access -->
            <form action="/GoalTracker/create_access.php" method="POST">
                <?php
                echo '<input type="hidden" name="goal_id" value="';
                echo $_POST['goal_id'];
                echo '">';
                ?>
                <input type="submit" value="Share">
            </form> 

            <!-- TODO create a delete_goal -->
            <!-- should have a 'yes I understand that I am deleting literally everything' checkbox-->
            <form action="/GoalTracker/delete_goal.php" method="POST">
                <?php
                echo '<input type="hidden" name="goal_id" value="';
                echo $_POST['goal_id'];
                echo '">';
                ?>
                <input type="submit" value="Delete Goal">
            </form> 
       
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>