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
              
            Comments: <?php echo $_POST["comment"]; ?> <br/> <br/>         
              
            <br/> <br/>
            
          </form>
       
    </p>
</body>
</html>