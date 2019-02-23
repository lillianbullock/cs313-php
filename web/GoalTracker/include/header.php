<?php
    session_start();
    $page = basename($_SERVER['PHP_SELF']);

    echo '<header class="l-blue">';

    // Webpage title
    echo '<span class="title">Goal Tracker</span><br/>', "\n";

    if ($page == 'login.php' || $page == 'login_submit.php' || $page == 'logout.php'){
        // this is just a placeholder in case I want to put something here
        echo '<div class="rightFloat"></div>';
    } else {
        // logged in or nah message
        echo '<div class="rightFloat">';
        if (isset($_SESSION['name'])) {
            echo 'Welcome ' , $_SESSION['name'];
            echo '<br/><a href="logout.php">Logout</a>', "\n";
        } else {
            echo 'You are not logged in <br/>';
            echo '<a href="login.php">Login</a>', "\n";
        }
        echo '</div>';
    }

    // ifelse for each part of header 
    // TODO figure out how to get these to centre, but keep the login message
    echo '<div class="centre">';
    if ($page == 'home.php') {
        echo '<b>Home</b>', "\n";
    } else {
        echo '<a href = "home.php"><b>Home</b></a>', "\n";
    }

    if ($page == 'goal_list.php') {
        echo ' <b>Goal List</b>', "\n";
    } else {
        echo ' <a href = "goal_list.php"><b>Goal List</b></a>', "\n";
    }
    echo '</div>';

    echo '</header><br/>';
?>