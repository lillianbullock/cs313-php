<!DOCTYPE html>
<html lang = "en" >
    <head>
        <link rel="stylesheet" type="text/css" href="include/style.css">
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Goal List</title>
      
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
            // TODO when login is working, add that to the query        
            $stmt = $db->prepare('Select g.goal_id, g.name, cl.label
                                FROM goal g JOIN access a
                                USING(goal_id)
                                JOIN common_lookup cl
                                ON a.level_type = cl.common_lookup_id
                                WHERE a.person_id = :person_id;');
            $stmt->execute(array(':person_id' => 1));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            //var_dump($rows);
            
        // Goal table

        // TODO add frequency and type to this table
            echo "<table class='centre'>";
            echo "<tr><th>Goal Name</th><th>Permissions</th></tr>";

            foreach ($rows as $row)
            {
                echo '<tr><td>';

                echo '<form action="/GoalTracker/goal_view.php" method="POST">';
                echo '<input type="hidden" id="goal_id" name="goal_id" value="';
                echo $row['goal_id'];
                echo '"><input class="purplebutton" type="submit" value="';
                echo $row['name'];
                echo '"></form>';
                
                echo '</td><td>';
                echo $row['label'];
                echo "</td></tr>\n";
            }
            
            echo "</table>";

            ?>  

            <form action="/GoalTracker/create_goal.php">
                <input type="submit" value="Add a New Goal">
            </form> 
        
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>