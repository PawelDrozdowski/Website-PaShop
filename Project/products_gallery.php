<?php
session_start();
?>
<html lang="en">

<head>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" type="image/png" href="images/shortcut.png">
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital@1&family=Montserrat+Alternates:wght@100&family=Proza+Libre&display=swap"
    rel="stylesheet" rel="preload" as="style">
    <script src="https://kit.fontawesome.com/ba43e8ddba.js" crossorigin="anonymous" defer></script>
  <link rel="stylesheet" href="css/main.css"/>
  <title>Products</title>
</head>

<body>
  <div class="container">
    <div class="heading">
      <div class="logo">
        <a href="index.php"><img src="images/logo.webp" alt="" class="logo-img-small"></a>
      </div>
    </div>
    <!--Header-->
    <?php
      include("components/navbar.php");
    ?>
    <!--End of Header-->

    <!--Products-->
    <section class="products">
      <div class="products-heading">
        <h1 class="products-heading-text">Category name</h1>
      </div>

      <div class="products-wrapper">
        <div class="product">
          <img src="images/product4.webp" alt="" class="product-img">
          <h2 class="product-description">
            Joop Shirt - Lorem ipsum dolor...
          </h2>
          <h2 class="product-price">
            $20
          </h2>
        </div>

        <div class="product">
          <img src="images/product5.webp" alt="" class="product-img">
          <h2 class="product-description">
            Joop Shirt - Lorem ipsum dolor...
          </h2>
          <h2 class="product-price">
            $20
          </h2>
        </div>

        <div class="product">
          <img src="images/product6.webp" alt="" class="product-img">
          <h2 class="product-description">
            Joop Shirt - Lorem ipsum dolor...
          </h2>
          <h2 class="product-price">
            $20
          </h2>
        </div>

        <div class="product">
          <img src="images/product3.webp" alt="" class="product-img">
          <h2 class="product-description">
            Joop Shirt - Lorem ipsum dolor...
          </h2>
          <h2 class="product-price">
            $20
          </h2>
        </div>

        <div class="product">
          <img src="images/product7.webp" alt="" class="product-img">
          <h2 class="product-description">
            Joop Shirt - Lorem ipsum dolor...
          </h2>
          <h2 class="product-price">
            $20
          </h2>
        </div>
      </div>
      <br />
      <!-- Pagination -->
      <div class="pagination">
        <ul class="pagination-list">
          <li class="pagination-list-item">
            <a href="#" class="pagination-list-item-link">1</a>
          </li>
          <li class="pagination-list-item">
            <a href="#" class="pagination-list-item-link">2</a>
          </li>
          <li class="pagination-list-item">
            ...
          </li>
          <li class="pagination-list-item">
            <a href="#" class="pagination-list-item-link">12</a>
          </li>
        </ul>
      </div>
      <!-- End of Pagination -->
    </section>
    <!--End of Products-->

    <!--Footer-->
    <?php
    readfile("components/footer.html")
    ?>
    <!--End of Footer-->
  </div>
</body>

</html>