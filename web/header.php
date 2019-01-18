<?php

function make_header($page) {
    echo '<header class="lightbg">';
    
    if ($page == 'home') {
        echo '<span class="header">Home</span><br/>';
        echo 'Home  ';
        echo '<a href="assignments.php">Assignments</a>';
    }
    
    if ($page == 'assignments') {
        echo '<span class="header">Assignments</span><br/>';
        echo '<a href="prove01.php">Home</a>  ';
        echo 'Assignments';
    } 
    
    echo '</header>';
}

?>