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
        if ($_POST['pass1'] != $_POST['pass2']) {
            echo "Your Passwords did not match";
        } else {

            $passwordHash = password_hash($_POST['Pass1'], PASSWORD_DEFAULT);

            try {
            // inserts, and if it fails deals with the
            // exception instead of just breaking the page
                $stmt = $db->prepare("INSERT INTO person
                                    ( username, email, password)
                                    VALUES ( :name
                                    , :email
                                    , :password );");
                $stmt->execute(array( 'name' => $_POST['name']
                                    , 'email' => $_POST['email']
                                    , 'password' => $passwordHash));

                echo "Row inserted";

                //$newId = $db->lastInsertId('goal_goal_id_seq');
                //echo "New Id is  ", $newId;

            } catch (exception $e) {
                echo "The insert failed $e";
            }
        }
        ?>

        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>