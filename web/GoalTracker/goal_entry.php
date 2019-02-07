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
        
        echo '<form action="submit_goal.php">';
        
        echo 'Goal name:<br>';
        echo '<input type="text" name="name"><br>';
        
        // gets all the possible frequencies
        echo '<br>Frequency:<br>';
        foreach ($db->query("SELECT value from common_lookup where column_name = 'FREQUENCY_TYPE' AND table_name = 'GOAL';") as $row)
        {
            echo '<input type="radio" name="frequency" value="';
            echo $row['value'];
            echo '">';
            //makes string lowercase, and then upercases first letter of each word
            echo ucwords(strtolower($row['value'])); 
            echo '<br>';
        }
        
        // gets all the possible input types
        echo '<br>Input Type:<br>';
        foreach ($db->query("SELECT value from common_lookup where column_name = 'ENTRY_TYPE' AND table_name = 'GOAL';") as $row)
        {
            echo '<input type="radio" name="entry" value="';
            echo $row['value'];
            echo '">';
            //makes string lowercase, and then upercases first letter of each word
            echo ucwords(strtolower($row['value'])); 
            echo '<br>';
        }
        echo '<input type="submit" value="Submit">';
        echo '</form>';
        
        ?>
        
        <br/>
      
        
      
        <footer>© Brooke Bullock, 2019</footer>
    </body>
</html>