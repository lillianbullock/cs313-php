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
            <form action="insert_goal.php" method="POST" class="centre"
            onsubmit="return validateCreateEntry()" onreset="reseterrors()"
            >
                <?php 
                $Gid = $_POST['goal_id'];
                $statement = $db->query("SELECT name
                                        , entry_type
                                        , frequency_type
                                        FROM goal
                                        WHERE goal_id = $Gid;");
                $bEntry = $statement->fetchAll(PDO::FETCH_ASSOC);
                $entry = $bEntry[0];

                var_dump($bEntry);
                echo '<br/>';
                var_dump($entry);
                
                ?>

                Goal name:
                <span id="nameError" class="error">Empty Field</span><br/>
                <!-- TODO remove default value for production-->
                <input type="text" id="name" name="name" value="Test"
                onchange="validateText('name', 'nameError')"><br>
            
                <br>Frequency:
                <span id="frequencyError" class="error">Empty Field</span><br/>

                <select id="frequency" name="frequency"
                onchange="validateDropDown('frequency', 'frequencyError')">
                    <option value="none">Choose One</option>
                    <?php
                    // gets all the possible frequencies
                    foreach ($db->query("SELECT common_lookup_id, label 
                                        FROM common_lookup 
                                        WHERE column_name = 'FREQUENCY_TYPE'
                                        AND table_name = 'GOAL';") as $row) {
                        echo '<option value="';
                        echo $row['common_lookup_id'];
                        echo '">';
                        echo $row['label']; 
                        echo "</option>\n";
                    }
                    ?>
                </select><br/>
                
                <br>Input Type:
                <span id="entryError" class="error">Empty Field</span><br/>

                <select id="entry" name="entry"
                onchange="validateDropDown('entry', 'entryError')">
                    <option value="none">Choose One</option>
                    <?php
                    // gets all the possible frequencies
                    foreach ($db->query("SELECT common_lookup_id, label 
                                        FROM common_lookup 
                                        WHERE column_name = 'ENTRY_TYPE' 
                                        AND table_name = 'GOAL';") as $row) {
                        echo '<option value="';
                        echo $row['common_lookup_id'];
                        echo '">';
                        echo $row['label']; 
                        echo "</option>\n";
                    }
                    ?>
                </select><br/>

                <br/><input type="submit" value="Submit">
                <input type="reset" value="Reset"/>
            </form>
        </div>

        <?php require 'include/footer.php'; ?>
    </body>
</html>