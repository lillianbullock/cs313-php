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

        <!-- TODO add javascript validation -->
        <div class='centre purple'>
            <form action="insert_goal.php" method="POST" class="centre">
                Goal name:
                <span id="nameError" class="error">Empty Field</span><br/>
                <!-- TODO remove default value for production-->
                <input type="text" id="name" name="name" value="Test"
                onchange="validateText('name', 'nameError')"><br>
            
                <br>Frequency:<br>
                <span id="frequencyError" class="error">Empty Field</span><br/>
                <?php
                // gets all the possible frequencies
                foreach ($db->query("SELECT value, label 
                                    FROM common_lookup 
                                    WHERE column_name = 'FREQUENCY_TYPE'
                                    AND table_name = 'GOAL';") as $row)
                {
                    echo '<input type="radio" id="frequency" name="frequency" value="';
                    echo $row['value'];
                    echo '" onchange="validateRadio("frequency", "frequencyError")">';
                    //makes string lowercase, and then upercases first letter of each word
                    echo ucwords(strtolower($row['label'])); 
                    echo "<br>\n";
                }
                
                // gets all the possible input types
                echo '<br>Input Type:<br>';
                foreach ($db->query("SELECT value, label 
                                    FROM common_lookup 
                                    WHERE column_name = 'ENTRY_TYPE' 
                                    AND table_name = 'GOAL';") as $row)
                {
                    echo '<input type="radio" id="entry" name="entry" value="';
                    echo $row['value'];
                    echo '">';
                    //makes string lowercase, and then upercases first letter of each word
                    echo ucwords(strtolower($row['label'])); 
                    echo "<br>\n";
                }
                ?>

                <br/><input type="submit" value="Submit">
            </form>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>