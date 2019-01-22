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
            Name:<br/>
                <?php echo $_POST["name"]; ?> <br/>
            
           Email:<br/>
                <?php echo "mailto:"; echo $_POST["email"]; ?> <br/>
                
            Major:<br/>
                <?php echo $_POST["major"]; ?> <br/>
              
            Comments: <br/>
                <?php echo $_POST["comment"]; ?>  <br/>           
              
            <br/> <br/>
            
          </form>
       
    </p>
</body>
</html>