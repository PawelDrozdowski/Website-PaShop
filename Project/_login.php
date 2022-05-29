<?php
  session_start();
  if(isset($_SESSION["login"]))
    header("Location: _menu.php");
  else if(isset($_POST["login"],$_POST["password"])){
      $server = "localhost";
      $user = "root";
      $password = "";
      try {
        $arr = [$_POST["login"], $_POST["password"]];
        $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
        $stmt = $conn->prepare('SELECT mail, password FROM USERS
            WHERE mail = ?
            AND password = ?
            LIMIT 1');
        $stmt->execute($arr);
        
        if($row = $stmt->fetch()){
          $_SESSION["login"] = $row["mail"];
          header("Location: _menu.php");
        }
      }
      catch(PDOException $e) {
          echo "Connection error: " . $e->getMessage();
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" type="image/png" href="images/shortcut.png">
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital@1&family=Montserrat+Alternates:wght@100&family=Proza+Libre&display=swap"
    rel="stylesheet">
    <script src="https://kit.fontawesome.com/ba43e8ddba.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/main.css" />
  <title>Employee login</title>
</head>

<body>
  <div class="container">
    <div class="heading">
      <div class="logo">
        <img src="images/logo.webp" alt="" class="logo-img">
      </div>
    </div>

    <div class="contact" style="grid-column:4/8">
      <h2 class="contact-heading">
        Log In
      </h2>
      <p class="contact-paragraph">
        For employees only. Have a good day!
      </p>

      <form action="_login.php" method="POST">
        <div class="inputs-group" >
          <input type="email" class="inputs-group-text" name="login" placeholder="Email" style="width:100%">
        </div>
        <div class="inputs-group">
          <input type="password" class="inputs-group-email" name="password" placeholder="Password">
          <input type="submit" class="inputs-group-btn" value="Login">
        </div>
      </form>
  </div>

</body>

</html>