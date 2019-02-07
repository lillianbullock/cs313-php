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
        <?php try {
            $dbUrl = getenv('DATABASE_URL');

            $dbOpts = parse_url($dbUrl);

            $dbHost = $dbOpts["host"];
            $dbPort = $dbOpts["port"];
            $dbUser = $dbOpts["user"];
            $dbPassword = $dbOpts["pass"];
            $dbName = ltrim($dbOpts["path"],'/');

            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'Error!: ' . $ex->getMessage();
            die();
        }
        
        echo '<form action="submit_goal.php">';
        
        echo 'Goal name:<br>';
        echo '<input type="text" name="name"><br>';
        
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