<?php
    $page = basename($_SERVER['PHP_SELF']);

    echo '<header class="l-blue">';

    // Webpage title
    echo '<span class="title">Goal Tracker</span><br/>';


    // logged in or nah message
    echo '<div class="rightFloat">';
    if (isset($_SESSION['user'])) {
        echo 'Welcome' . $_SESSION['user']['name'];
        echo '<a href="logout.php">Logout</a>';
    } else {
        echo 'You are not logged in <br/>';
        echo '<a href="login.php">Login</a>'
    }
    echo '</div>';

    // ifelse for each part of header 
    // TODO figure out how to get these to centre, but keep the login message
    echo '<div class="centre">';
    if ($page == 'home.php') {
        echo '<b>Home</b>';
    } else {
        echo '<a href = "home.php"><b>Home</b></a>';
    }

    if ($page == 'goal_list.php') {
        echo ' <b>Goal List</b>';
    } else {
        echo ' <a href = "goal_list.php"><b>Goal List</b></a>';
    }
    echo '</div>';

    echo '</header><br/>';
?>