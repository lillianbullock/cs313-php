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

        var_dump($_GET);

        $stmt = $db->prepare("INSERT INTO goal
                            ( name, entry_type, frequency_type)
                            VALUES ( :name
                            , (SELECT common_lookup_id from common_lookup 
                            where column_name = 'ENTRY_TYPE'
                            AND   table_name = 'GOAL'
                            AND  value = :entry_type )
                            , (SELECT common_lookup_id from common_lookup 
                            where column_name = 'FREQUENCY_TYPE'
                            AND   table_name = 'GOAL'
                            AND  value = :frequency_type ) );");
        // TODO --> does PDO take care of all special chars? Or Do I have to do some management myslef????
        $stmt->execute(array('name' => $_GET['name']
                             , 'entry_type' => $_GET['entry']
                             , 'frequency_type' => $_GET['frequency']));
        $user = $stmt->fetch();
        // TODO --> how to know if failed??

        var_dump($user);
        
        ?>
        
        <?php 
        require 'header.php'; 
        make_header('assignments');
        ?> 
        
        <br/>
      
        <div>
            <ul>
                <li>01 - <a href="hello.html">Hello World</a></li>
                <li>02 - <a href="prove01.php">Homepage</a></li>
                <li>03 - <a href="03shopCart/browse.php">Shopping Cart</a></li>
                <li>04 - <a href="doesNotExist.html">Big Project 1</a></li>
            </ul>
      
        </div>
      
        <footer>© Brooke Bullock, 2019</footer>
    </body>
</html>