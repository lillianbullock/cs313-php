<!DOCTYPE html>
<html lang = "en" >
    <head>
        <link rel="stylesheet" type="text/css" href="include/style.css">
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Goal</title>
      
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
            echo "helller";

            var_dump($_POST);
            $stmt = $db->prepare('SELECT input, timestamp
                                    FROM goal_entry ge
                                    WHERE goal_id = :goal_id;');
            $stmt->execute(array('goal_id' => $_POST['goal_id']));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            var_dump($rows);

            echo "hweeeee";
        ?>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>