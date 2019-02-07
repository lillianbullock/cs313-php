<!DOCTYPE html>
<html lang = "en" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
      
        <!--internal style sheets-->
        <style> </style>

        <script src=prove01.js> </script>
          
    </head>
    
    <body>
        <?php 
        
        require 'getDB.php';
        
        // TODO when login is working, add that to the query
        $stmt = $pdo->prepare('Select g.name, cl.value
                            FROM goal g JOIN access a
                            USING(goal_id)
                            JOIN common_lookup cl
                            ON a.level_type = common_lookup_id;');
        $stmt->execute([$email, $status]);
        $rows = $stmt->fetch();
        
        var_dump($rows);
        
        foreach ($rows as $row)
        {
            echo 'name: ' . $row['name'];
            echo ' value: ' . $row['value'];
            echo '<br/>';
        }
        
        ?>  
        
        <br/>
        
        <footer>© Brooke Bullock, 2019</footer>
    </body>
</html>