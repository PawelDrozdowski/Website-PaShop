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
  <title>Employee Products</title>
</head>

<body>
  <div class="container">
    <div class="heading">
      <div class="logo">
        <img src="images/logo.webp" alt="" class="logo-img-small">
      </div>
    </div>

    <a href="_menu.php" class="button inputs-group-btn admin-backBtn">Back</a>
    
    <form action="_add_products.php">
      <input type="submit" class="inputs-group-btn admin-addBtn" value="Add">
    </form>
    <div class="contact" style="grid-column:1/-1">
      <div class="inputs-group" style="width:calc(100% - 2rem)">
        <input type="number" class="admin-table-input" name="id" placeholder="ID" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="name" placeholder="Name" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="photo" placeholder="Photo" style="margin: 0 1%;">
        <input type="number" class="admin-table-input" name="price" placeholder="Price" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="quantity" placeholder="Quantity" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="size" placeholder="Size" style="margin: 0 1%;">
        <input type="text" class="admin-table-input admin-table-productsX2" name="description" placeholder="Description"  style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="enabled" placeholder="Enabled" style="margin: 0 1%;">
        <button class="inputs-group-btn" style="margin: 0 1%;font-size: 2rem; width:10%;">Search</button>
      </div>
      <table class="admin-table">
        <tr class="admin-table-row">
          <td class="admin-table-products">1</td>
          <td class="admin-table-products">Joop Shirt</td>
          <td class="admin-table-products">...</td>
          <td class="admin-table-products">$25</td>
          <td class="admin-table-products">55</td>
          <td class="admin-table-products">M</td>
          <td class="admin-table-productsX2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum autem natus, porro obcaecati velit voluptate repellendus in voluptas. Reiciendis consequatur quam voluptatibus magnam, id unde vitae cumque quisquam quidem. Qui....</td>
          <td class="admin-table-products">true</td>
          <td class="admin-table-products"><a href="#"><i class="fa-solid fa-trash"></i></a><a href="#"><i class="fa-solid fa-angle-down"></i></a></td>
        </tr>
        <tr class="admin-table-row">
          <td class="admin-table-products">2</td>
          <td class="admin-table-products">Gio Dress</td>
          <td class="admin-table-products">...</td>
          <td class="admin-table-products">$50</td>
          <td class="admin-table-products">12</td>
          <td class="admin-table-products">L</td>
          <td class="admin-table-productsX2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere consequuntur. Cumque, illum aperiam totam temporibus a ipsam debitis quisquam aliquam expedita ratione minus. Sint eos voluptatem laboriosam provident enim....</td>
          <td class="admin-table-products">true</td>
          <td class="admin-table-products"><a href="#"><i class="fa-solid fa-trash"></i></a><a href="#"><i class="fa-solid fa-angle-down"></i></a></td>
        </tr>
        <tr class="admin-table-row">
          <td class="admin-table-products">3</td>
          <td class="admin-table-products">Joop Shirt</td>
          <td class="admin-table-products">...</td>
          <td class="admin-table-products">$25</td>
          <td class="admin-table-products">30</td>
          <td class="admin-table-products">XL</td>
          <td class="admin-table-productsX2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptate exercitationem quis iure nemo consequatur eum, harum accusantium repudiandae cum, quasi facere illum amet minus deserunt. Quae cupiditate culpa laboriosam....</td>
          <td class="admin-table-products">true</td>
          <td class="admin-table-products"><a href="#"><i class="fa-solid fa-trash"></i></a><a href="#"><i class="fa-solid fa-angle-down"></i></a></td>
        </tr>
      </table>
    </div>

</body>

</html>