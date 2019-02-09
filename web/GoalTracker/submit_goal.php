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
        require 'include/getDB.php';
        require 'include/header.php'; 
        
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
        // TODO --> query to get goal_id and add access to person logged in

        echo "<p>Row inserted</p>";
        ?>
    

        <?php require 'include/footer.php'; ?>
    </body>
</html>