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
        require 'getDB.php';


        //var_dump($_GET);

        // inserts the received goal
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
        $stmt->execute(array('name' => $_GET['name']
                             , 'entry_type' => $_GET['entry']
                             , 'frequency_type' => $_GET['frequency']));
        $user = $stmt->fetch();
        // TODO --> how to know if failed other than logs?? - some way to tell user it failed?

        echo "<p>Row inserted</p>";
        
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
      
        <?php require 'footer.php'; ?>
    </body>
</html>