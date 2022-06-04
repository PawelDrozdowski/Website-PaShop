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
      <?php
        $category = "%";
        if(isset($_GET['category']) && $_GET['category'] != "all")
          $category = $_GET['category'];

        $arr = [$category];
        $server = "localhost";
        $user = "root";
        $password = "";
        try {
          $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
          $stmt = $conn->prepare(
            'SELECT PRODUCT_BASE.id, name, price, description, category, max(quantity) as max_q, max(enabled) as max_en
            FROM PRODUCT_BASE
            LEFT JOIN PRODUCTS ON PRODUCTS.base_id = PRODUCT_BASE.id
            WHERE category LIKE ?
            GROUP BY PRODUCT_BASE.id
            HAVING max_en = 1
            AND max_q > 0
            LIMIT 30'
          );
          
          $stmt->execute($arr);
          while($row = $stmt->fetch()){
            //print_r($row);
            $desc = $row['name'] . " - " . substr($row['description'],0,17) . "...";
            $img = "images/product" . $row['id'] . ".webp";
            $href = "product.php?id=" . $row['id'];
            $price = $row['price'];

            echo 
              "<a href=\"$href\" class='product'>
              <img src=\"$img\" alt='' class='product-img'>
              <h2 class='product-description'>
                $desc 
              </h2>
              <h2 class='product-price'>
                $$price
              </h2>
              </a>";
          }
        }catch(PDOException $e) {
          echo "Connection error: " . $e->getMessage();
        }
        ?>
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