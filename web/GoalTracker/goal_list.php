<!DOCTYPE html>
<html lang = "en" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
      
        <!--internal style sheets-->
        <style> </style>

        <!-- <script src=prove01.js> </script> -->
          
    </head>
    
    <body>
        <?php 
        require 'header.php';

        require 'getDB.php';
        
        // TODO when login is working, add that to the query        
        $stmt = $db->prepare('Select g.name, cl.label
                            FROM goal g JOIN access a
                            USING(goal_id)
                            JOIN common_lookup cl
                            ON a.level_type = cl.common_lookup_id
                            WHERE a.person_id = :person_id;');
        $stmt->execute(array(':person_id' => 1));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //var_dump($rows);
        
        echo "<div class='centre'>";

        foreach ($rows as $row)
        {
            echo '<br/> name: ' . $row['name'];
            echo ' value: ' . $row['label'];
            echo '<br/>';
        }
        
        echo "</div>"

        ?>  
        
        <br/>
        
        <footer>© Brooke Bullock, 2019</footer>
    </body>
</html>