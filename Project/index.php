<?php
session_start();
function isMobile() {
  return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Clothes store. Fashion straight outta PWSZ.
   Find newest collections that match your style perfectly!">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" type="image/png" href="images/shortcut.png">
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital@1&family=Montserrat+Alternates:wght@100&family=Proza+Libre&display=swap"
    rel="stylesheet" rel="preload" as="style">
    <script src="https://kit.fontawesome.com/ba43e8ddba.js" crossorigin="anonymous" defer></script>
  <link rel="stylesheet" href="css/main.css"/>
  <title>PaShop Clothes Store</title>
</head>

<body>
  <div class="container">
    <div class="heading">
      <div class="logo">
        <img src="images/logo.webp" alt="" class="logo-img">
      </div>
      <h1 class="heading-text">Clothes Store</h1>
    </div>
    <!--Header-->
    <?php
    include("components/navbar.php")
    ?>
    <!--End of Header-->

    <!--Slidershow-->
    <?php
    //remove slideshow for faster mobile load
    if(!isMobile()){
      echo"<section class='slideshow' width='100vw' height='80vh'>";

      for($i=1; $i<6;$i++){
          echo"
            <div class='slideshow-slide'>
            <div class='slideshow-content'>
                <h2>Slide $i</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Eius iusto cum consequuntur enim eveniet delectus
                doloribus similique at assumenda maxime.</p>
            </div>
            <img src='images/img$i.webp' alt='' width='100vw' height='80vh'>
            </div>";
      }
    }

    echo"</section>";
    ?>
    <!--End of Slidershow-->

    <!--Products-->
    <section class="products">
      <div class="products-heading">
        <h1 class="products-heading-text">Featured Products</h1>
      </div>

      <div class="products-wrapper">
        <!--Gallery-->
        <?php
        $server = "localhost";
        $user = "root";
        $password = "";
        try {
          $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
          $stmt = $conn->prepare(
            'SELECT PRODUCT_BASE.id, name, price, description
            FROM PRODUCT_BASE
            LIMIT 3'
          );
          
          $stmt->execute();
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
      <!--End of Gallery-->
      
      <br />
      <div class="products-btn">
        <a href="#" class="btn">
          <div class="btn-bg"></div>
          <div class="arrow">
            <div class="arrow-line line-1"></div>
            <div class="arrow-line line-2"></div>
            <div class="arrow-line line-3"></div>
          </div>
          <span class="btn-text">See More</span>
        </a>
      </div>
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