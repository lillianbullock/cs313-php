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
                
            Major: <?php echo $_POST["major"]; ?> <br/> <br/>
              
            Continents Visited: <br/>
           
            <?  if(isset($_POST['NA']) &&
                $_POST['NA'] == 'Yes')
                {
                    echo "North America <br/>";
                }
           
                if(isset($_POST['SA']) &&
                $_POST['SA'] == 'Yes')
                {
                    echo "South America <br/>";
                }
           
                if(isset($_POST['E']) &&
                $_POST['E'] == 'Yes')
                {
                    echo "Europe <br/>";
                }
           
                if(isset($_POST['As']) &&
                $_POST['As'] == 'Yes')
                {
                    echo "Asia <br/>";
                }
           
                if(isset($_POST['Aus']) &&
                $_POST['Aus'] == 'Yes')
                {
                    echo "Australia <br/>";
                }
           
                if(isset($_POST['Af']) &&
                $_POST['Af'] == 'Yes')
                {
                    echo "Africa <br/>";
                }
           
                if(isset($_POST['Ant']) &&
                $_POST['Ant'] == 'Yes')
                {
                    echo "Antarctica <br/>";
                }
            
            Comments: <?php echo $_POST["comment"]; ?> <br/> <br/>         
              
           
           
            <br/> <br/>
            
          </form>
       
    </p>
</body>
</html>