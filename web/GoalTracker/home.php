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
        
        <div class="centre purple">

        <?php
        // this is just a sample thing
        foreach ($db->query('SELECT column_name, value 
                             FROM common_lookup') as $row)
        {
            echo 'column_name: ' . $row['column_name'];
            echo ' value: ' . $row['value'];
            echo '<br/>';
        }
        ?>  
        
        

        <form action="/GoalTracker/goal_list.php">
            <input type="submit" value="Goal List">
        </form> 
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>