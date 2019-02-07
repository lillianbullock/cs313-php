<?php
    $page = basename($_SERVER['PHP_SELF']);

    if ($page == 'home.php') {
        echo '<b>Home</b>'
    } else {
        echo <a href = "GoalTracker/home.php"><b>Home</b></a>
    }

    if ($page == 'goal_list.php')
        echo '<b>Goal List</b>'
    } else {
        echo <a href = "GoalTracker/goal_list.php"><b>Goal List</b></a>
    }
    
?>