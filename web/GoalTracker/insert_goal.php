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
    
        // inserts the received goal
        $stmt = $db->prepare("INSERT INTO goal
                            ( name, owner, entry_type, frequency_type)
                            VALUES ( :name
                            , :owner
                            , (SELECT common_lookup_id from common_lookup 
                            where column_name = 'ENTRY_TYPE'
                            AND   table_name = 'GOAL'
                            AND  value = :entry_type )
                            , (SELECT common_lookup_id from common_lookup 
                            where column_name = 'FREQUENCY_TYPE'
                            AND   table_name = 'GOAL'
                            AND  value = :frequency_type ) );");
        echo "ONE";

        $stmt->execute(array('name' => $_POST['name']
                            , 'owner' => '1' // TODO get from session when login working
                            , 'entry_type' => $_POST['entry']
                            , 'frequency_type' => $_POST['frequency']));

        $user = $stmt->fetch();

        $newId = $db->lastInsertId('goal_goal_id_seq');

        echo "New Id is  ", $newId;

        // TODO --> how to know if failed other than logs?? - some way to tell user it failed?
        ?>

        <div class='centre purple'>
            Row inserted
        </div>



        <?php require 'include/footer.php'; ?>
    </body>
</html>