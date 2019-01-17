<?php
   $page = basename($_SERVER['PHP_SELF']);

      if ($page == 'about-us.php') {
         echo '<a href = "about-us.php"><b>About Us</b></a> -
         <a href = "home.php">Home</a> -
         <a href = "login.php">Login</a>';
      }
      if ($page == 'home.php') {
       echo '<a href = "about-us.php">About Us</a> -
         <a href = "home.php"><b>Home</b></a> -
         <a href = "login.php">Login</a>';
      }
      if ($page == 'login.php') {
         echo '<a href = "about-us.php">About Us</a> -
         <a href = "home.php">Home</a> -
         <a href = "login.php"><b>Login</b></a>';
      }
?>