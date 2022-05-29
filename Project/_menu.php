<?php
    session_start();
    if(!isset($_SESSION["login"]))
      header("Location: _login.php");
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
  <title>Employee menu</title>
</head>

<body>
  <div class="container">
    <div class="heading">
      <div class="logo">
        <img src="images/logo.webp" alt="" class="logo-img">
      </div>
    </div>

    <div class="contact" style="grid-column:4/8">
      <div class="admin-menu-btn-container">
        <?php
          echo "<h2>Welcome ". $_SESSION['login'] ." </h2>";
        ?>
        <a href="_products.php" class="button inputs-group-btn admin-menu-btn">Products</a>
        <a href="_orders.php" class="button inputs-group-btn admin-menu-btn">Orders</a>
        <a href="_users.php" class="button inputs-group-btn admin-menu-btn">Accounts</a>
        <a href="components/_logout.php" class="button inputs-group-btn admin-menu-btn" style="width: 32%;">Logout</a>
      </div>
    </div>

</body>

</html>