<!DOCTYPE html>
<html>
<head>
   <title>About Us</title>
</head>
<body>
   <h1>About Us</h1>
   <p>
      
       <form action="submit.php" method="get" >
            Name:<br/>
                <input type="text" name="name"/><br/>
            <br/>
            
           Email:<br/>
                <input type="email" name="email"/><br/>
            <br/>
                
            Major:<br/>
           
            <?php
                $majorArr = array("CS" => "Computer Science", 
                                  "WDD" => "Web Design and Development", 
                                  "CIT" => "Computer Information Technology", 
                                  "CE" => "Computer Engineering");

                foreach ($majorArr as $x => $x_val) {
                    echo "<input type='radio' name='major' 
                       value='" . $x . "'/>" . $x_val . "<br/>";
                } 
           
                echo "<br/>";
            ?>
                
            Continents Visited: <br/>
           
            <?php
                $continentArr = array("NA" => "North America", 
                                  "SA" => "South America", 
                                  "E" => "Europe", 
                                  "As" => "Asia", 
                                  "Au" => "Australia", 
                                  "Af" => "Africa", 
                                  "An" => "Antarctica");

                foreach ($continentArr as $y => $y_val) {
                    echo "<input type='checkbox' name='continent[]' 
                       value='" . $y . "'/>" . $y_val . "<br/>";
                } 
           
                echo "<br/>";
            ?>
              
            Comments: <br/>
                <textarea rows="4" cols="62" name="comment" style="width:400px"></textarea>             
              
            <br/> <br/>
            <input type="submit" value="Submit"/>
            <input type="reset"/>
          </form>
       
    </p>
</body>
</html>