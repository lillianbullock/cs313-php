<?php session_start(); ?>

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
        $stmt = $db->prepare('SELECT person_id, password, username
                FROM person
                WHERE email = :email;');
        $stmt->execute(array(':email' => $_POST['email'])); 
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        var_dump($rows);

        if (password_verify($_POST['password'], $rows[0]['password'])) {
            $_SESSION['user_id'] = $rows['person_id'];
            $_SESSION['name'] = $rows['username'];
            echo "login successful. Welcome ";
            echo $_SESSION['name'];
        } else {
            echo 'login failed';
        }

        $_SESSION['user_id'] = 1;
        ?>

        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>
