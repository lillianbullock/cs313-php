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

        <div class='centre purple'>
        
        <?php

        //var_dump("$_POST");

        try {
        // inserts the received goal, and if it fails deals with the
        // exception instead of just breaking the page
            $stmt = $db->prepare("INSERT INTO goal
                                ( name, owner, entry_type, frequency_type)
                                VALUES ( :name
                                , :owner
                                , :entry_type
                                , :frequency_type );");
            $stmt->execute(array('name' => $_POST['name']
                                , 'owner' => '1' // TODO get from session when login working
                                , 'entry_type' => $_POST['entry']
                                , 'frequency_type' => $_POST['frequency']));

            echo "Row inserted";

            //$newId = $db->lastInsertId('goal_goal_id_seq');
            //echo "New Id is  ", $newId;

        } catch (exception $e) {
            echo "The insert failed";
        }
        ?>

        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>