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
  <title>Employee Add Products</title>
</head>

<body>
  <div class="container">
    <div class="heading">
      <div class="logo">
        <img src="images/logo.webp" alt="" class="logo-img-small">
      </div>
    </div>
    <a href="_menu.php" class="button inputs-group-btn admin-backBtn">Back</a>

    <div class="contact" style="grid-column:1/-1">
      <form action="components/_add-product-size.php" method="POST">
      <h1>Add size</h1>
        <div class="inputs-group" style="flex-direction: column;">
          <input type="text" class="admin-table-input" name="add_id" placeholder="ID" style="width: 10%;">
          
          <div style="width: 20%; display: flex; align-items: center;">
            <input type="number" class="admin-table-input" name="add_quantity" placeholder="Quantity"style="width: 50%;">
            <select class="select admin-table-input" name="add_size" style="width: 20%;">
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>
          </div>

          <div style="width: 65vw; display: flex; align-items: center;">
            <input type="submit" class="inputs-group-btn" value="Add" style="font-size: 2rem; width:10%;">
          </div>

        </div>
      </form>
      
      <hr class='hr-solid'>

      <form action="components/_add-product.php" method="POST">
        <h1>Add product</h1>
        <div class="inputs-group" style="flex-direction: column;">
          <input type="text" class="admin-table-input" name="add_name" placeholder="Name" style="width: 10%;">
          <input type="text" class="admin-table-input" name="add_id" placeholder="ID (unique)" style="width: 10%;">

          <div style="width: 10%; margin: 0 1%; text-align:center">
            <i class="fa-solid fa-file-arrow-up"style="font-size:10rem; color:#0E659C"></i>
            <p id="admin-productPhoto-label" style="width: 100%; text-align: center;">photo-id-.webp<br/>Remember to upload a photo to ./images/</p>
          </div>

          <input type="number" class="admin-table-input" name="add_price" placeholder="Price">
          
          <div style="width: 20%; display: flex; align-items: center;">
            <select class="select admin-table-input" name="add_category" style="width: 59%;">
              <option value="1">Men</option>
              <option value="2">Women</option>
            </select>
          </div>

          <div style="width: 65vw; display: flex; align-items: center;">
            <textarea class="admin-table-input" rows="6" name="add_description" placeholder="Description" style="width: 70%; padding: 1rem; margin: 0.5%;"></textarea>
            <input type="submit" class="inputs-group-btn" value="Add" style="font-size: 2rem; width:10%;">
          </div>

        </div>
      </form>
    </div>

</body>

</html>