<?php

    $stmt = $db->prepare('SELECT password, person_id, username
                        FROM person
                        WHERE email = :email;');
    $stmt->execute(array(':email' => $_POST['email'])); 
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (password_verify($rows[0]['password'], $_POST['password'])) {
        $_SESSION['user_id'] = $rows['person_id'];
        $_SESSION['name'] = $rows['username'];
        echo "login successful. Welcome ";
        echo $_SESSION['name'];
    } else {
        echo 'login failed';
    }

    $_SESSION['user_id'] = 1;


?>