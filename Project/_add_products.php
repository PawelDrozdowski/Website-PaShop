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
      <form action="">
        <div class="inputs-group" style="flex-direction: column;">
          <input type="text" class="admin-table-input" name="name" placeholder="Name" style="width: 10%;">
          <button class="inputs-group-btn" style="margin: 0 1%;font-size: 2rem; width:10%;">Add Photo</button>
          <div style="width: 10%; margin: 0 1%;">
            <img src="images/product1.png" style="width: 100%;">
            <p id="admin-productPhoto-label" style="width: 100%; text-align: center;">photo.jpg</p>
          </div>

          <input type="number" class="admin-table-input" name="price" placeholder="Price">
          
          <div style="width: 20%; display: flex; align-items: center;">
            <input type="number" class="admin-table-input" name="quantity" placeholder="Quantity"style="width: 50%;">
            <select class="select admin-table-input" style="width: 20%;">
              <option value="Option 1">S</option>
              <option value="Option 2">M</option>
              <option value="Option 1">L</option>
              <option value="Option 2">XL</option>
            </select>
          </div>

          <div style="width: 65vw; display: flex; align-items: center;">
            <textarea class="admin-table-input" rows="6" name="description" placeholder="Description" style="width: 70%; padding: 1rem; margin: 0.5%;"></textarea>
            <button class="inputs-group-btn" style="font-size: 2rem; width:10%;">Add</button>
          </div>

        </div>
      </form>
    </div>

</body>

</html>