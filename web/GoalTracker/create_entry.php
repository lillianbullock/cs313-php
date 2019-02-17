<!DOCTYPE html>
<html lang = "en" >
    <head>
        <link rel="stylesheet" type="text/css" href="include/style.css">
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entry</title>
      
        <!--internal style sheets-->
        <style> </style>

        <script src=include/script.js> </script>
                  
    </head>
    
    <body>
        <?php    
            require 'include/header.php';
            require 'include/getDB.php';
        ?>

        <div class='centre purple'>
            <form action="insert_entry.php" method="POST" class="centre"
            onsubmit="return validateCreateEntry()" onreset="reseterrors()"
            >
            <!-- TODO create the js validation --> 

                <input type="hidden" name="goal_id"
                value=" <?php echo $_POST['goal_id']; ?> ">

                <?php 
                $Gid = $_POST['goal_id'];
                $statement = $db->query("SELECT name
                                        , entry_type
                                        , frequency_type
                                        FROM goal
                                        WHERE goal_id = $Gid;");
                $bEntry = $statement->fetchAll(PDO::FETCH_ASSOC);
                $entry = $bEntry[0];
                ?>

                Goal name: <?php echo $entry['name']; ?><br/><br/>

                Entry: 
                <span id="entryError" class="error">Empty Field</span><br/>
                <input type="text" id="entry" name="entry"
                onchange="validateText('entry', 'entryError')"><br><br/>
            
                <!-- add date picker? -->
                Date: <?php echo date("d/m/Y"); ?><br/>

                <br/><input type="submit" value="Submit">
                <input type="reset" value="Reset"/>
            </form>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>