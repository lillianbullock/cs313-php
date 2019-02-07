<!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
</head>
<body>

  <?php
  
    try
    {
      $dbUrl = getenv('DATABASE_URL');
    
      $dbOpts = parse_url($dbUrl);
    
      $dbHost = $dbOpts["host"];
      $dbPort = $dbOpts["port"];
      $dbUser = $dbOpts["user"];
      $dbPassword = $dbOpts["pass"];
      $dbName = ltrim($dbOpts["path"],'/');
    
      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    echo '<h1>Scripture Resources</h1>';

    echo '<form action="results.php" method="GET"><select name="book">';

    foreach ($db->query('SELECT DISTINCT book FROM Scriptures') as $row)
    {
      echo '<option value="' . $row['book'] . '">' . $row['book'] . '</option>';
    }

    echo '</select>';
    echo '<button type="submit">SUBMIT</button>';
    echo '</form>';


    foreach ($db->query('SELECT * FROM Scriptures') as $row)
    {
      echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b>' . ' - ' . '"' . $row['content'] . '"<br>';
    }
  ?>



</body>
</html>