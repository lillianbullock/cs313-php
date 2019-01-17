<?php

function header(page) {
    echo '<header class="lightbg">
        <span class="header">Assignments</span><br/>';
    if (page == 'home') {
        echo 'Home';
    } else echo '<a href="prove01.html">Home</a>';
        
    if (page == assignments) {
        echo 'Assignments';
    } else echo '<a href="assignments.html">Assignments</a>';
    echo '</header>' 
}

?>