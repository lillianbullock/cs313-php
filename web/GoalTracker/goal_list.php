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
            $stmt = $db->prepare('Select g.goal_id
                                , g.name
                                , cl1.label as entry_type
                                , cl2.label as frequency
                                FROM goal g JOIN common_lookup cl1
                                ON entry_type = cl1.common_lookup_id
                                JOIN common_lookup cl2 
                                ON frequency_type = cl2.common_lookup_id
                                WHERE owner = :person_id;');
            // TODO get from session when login working
            $stmt->execute(array(':person_id' => 1)); 
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            // Goal table
            <span>My Goals</span>
            <table class='centre'>
                <tr>
                    <th>Goal Name</th>
                    <th>Type</th>
                    <th>Frequency</th>
                </tr>

                <?php
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
                    echo $row['entry_type'];
                    echo '</td><td>';
                    echo $row['frequency'];
                    echo "</td></tr>\n";
                }
                ?>  

            </table>
            <br/>

            <?php
            // TODO add list of accessible goals along with your goals
            $stmt = $db->prepare('Select g.goal_id
                                , g.name
                                , cl1.label as entry_type
                                , cl2.label as frequency
                        FROM goal g JOIN access a
                        ON g.goal_id = a.goal_id
                        AND a.person_id = :person_id
                        JOIN common_lookup cl1 
                        ON entry_type = cl1.common_lookup_id
                        JOIN common_lookup cl2 
                        ON frequency_type = cl2.common_lookup_id;');
            // TODO get from session when login working
            $stmt->execute(array(':person_id' => 1)); 
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <span>Shared with Me</span>
            <table class='centre'>
            <tr><th>Goal Name</th><th>Type</th><th>Frequency</th></tr>

            <?php
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
                echo $row['entry_type'];
                echo '</td><td>';
                echo $row['frequency'];
                echo "</td></tr>\n";
            }
            
            echo "</table>";
            // TODO add list of accessible goals along with your goals
            ?> 



            <form action="/GoalTracker/create_goal.php">
                <input type="submit" value="Add a New Goal">
            </form> 
        
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>