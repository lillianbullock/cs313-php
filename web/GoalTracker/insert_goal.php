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
        require 'include/getDB.php';
        require 'include/header.php'; 
        
        // TODO change the goal table to have an owner, and access to just be view access
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
        $stmt->execute(array('name' => $_POST['name']
                             , 'entry_type' => $_POST['entry']
                             , 'frequency_type' => $_POST['frequency']));
        $user = $stmt->fetch();
        // TODO --> how to know if failed other than logs?? - some way to tell user it failed?
        // TODO --> query to get goal_id and add access to person logged in
        ?>

        <div class='centre purple'>
            Row inserted
        </div>



        <?php require 'include/footer.php'; ?>
    </body>
</html>