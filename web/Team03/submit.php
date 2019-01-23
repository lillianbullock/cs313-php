<!DOCTYPE html>
<html>
<head>
   <title>About Us</title>
</head>
<body>
   <?php include 'header.php'; ?>
    
   <h1>About Us</h1>
   <p>
      
       <form action="submit.php" method="post" >
            Name: <?php echo $_POST["name"]; ?> <br/> <br/>
            
            Email: <?php echo "mailto:"; echo $_POST["email"]; ?> <br/> <br/>
                
            Major: <?php 
            $majorArr = array("CS" => "Computer Science", 
                                  "WDD" => "Web Design and Development", 
                                  "CIT" => "Computer Information Technology", 
                                  "CE" => "Computer Engineering");
           
            echo $majorArr[$_POST["major"]]; ?> <br/> <br/>
              
            Continents Visited: <br/>
           
            <?php  
            $continentArr = array("NA" => "North America", 
                                  "SA" => "South America", 
                                  "E" => "Europe", 
                                  "As" => "Asia", 
                                  "Au" => "Australia", 
                                  "Af" => "Africa", 
                                  "An" => "Antarctica");
           
           
            if(!empty($_POST['continent'])) {
                foreach($_POST['continent'] as $selected) {
                    echo $continentArr[$selected] ."<br/>";
                }
            }
            ?>
           
            <br/>
            Comments: <?php echo $_POST["comment"]; ?> <br/> <br/>         
              
           
           
            <br/> <br/>
            
          </form>
       
    </p>
</body>
</html>