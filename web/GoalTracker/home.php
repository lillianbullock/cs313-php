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
        
        <div class="centre purple">

        <p>It is a goal tracking system. You can create goals, track progress
        and share the goals with other users. </p>

        <p>Login and then go to the goal_list. From there you can click on a
        goal to view it, or create a new goal. </p>

        <p>From each goal, you can delete the goal (which also deletes access
        and entries), add an entry, or share a goal with another user. You can
        also click on an existing entry to edit it. </p>

        <p>You can use this login that has some existing information, or you
        can create a new user. I ask that if you login using the below that you
        don’t delete any pre-existing information, though you can delete
        anything that you create.</p>

        <p>
        Email: jam@dud.com <br/>
        Password: fred<p>



        <form action="/GoalTracker/goal_list.php">
            <input type="submit" value="Goal List">
        </form> 
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>