<!DOCTYPE html>
<html>
<head>
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

    $book = $_GET['book'];

    $stmt = $db->prepare('SELECT * FROM Scriptures WHERE book=:book');
    $stmt->execute(array(':book' => $book));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    var_dump($rows);
    
    foreach ($rows as $row)
    {
        echo '<a href="details.php?id=' . $row['id'] . '"><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> ' . '</a><br>';
    }


?>

</body>
</html>