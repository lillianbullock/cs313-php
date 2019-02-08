<?php
    $page = basename($_SERVER['PHP_SELF']);

    echo '<header class="l-blue">';

    echo '<span class="title">Goal Tracker</span><br/>';

    if ($page == 'home.php') {
        echo '<b>Home</b>';
    } else {
        echo '<a href = "GoalTracker/home.php"><b>Home</b></a>';
    }

    if ($page == 'goal_list.php') {
        echo ' <b>Goal List</b>';
    } else {
        echo ' <a href = "GoalTracker/goal_list.php"><b>Goal List</b></a>';
    }

    echo '<div align=rightFloat>';
    if (isset($_SESSION['user'])) {
        echo 'Welcome' . $_SESSION['user']['name'];
    } else {
        echo 'You are not logged in';
    }
    echo '</div>';

    echo '</header><br/>';
?>