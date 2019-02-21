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

        //var_dump($rows);
        $pass = $_POST['password'];

        var_dump($pass);
        var_dump($rows[0]['password']);


        if (!is_null($pass) && password_verify($pass, $rows[0]['password'])) {
            $_SESSION['user_id'] = $rows[0]['person_id'];
            $_SESSION['name'] = $rows[0]['username'];
            echo "login successful. Welcome ";
            echo $_SESSION['name']; 

            echo '<br/><form action="/GoalTracker/goal_list.php">';
            echo '<input type="submit" value="Goal List">';
            echo '</form>';

        } else {
            echo 'login failed';

            echo '<form action="/GoalTracker/login.php">';
            echo '<input type="submit" value="Try Again">';
            echo '</form>';
        }

        $_SESSION['user_id'] = 1;
        ?>

        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>
