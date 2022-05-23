<?php
session_start();
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
    <section class="slideshow" width="100vw" height="80vh">
      <div class="slideshow-slide">
        <div class="slideshow-content">
          <h2>Slide 1</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eius iusto cum consequuntur enim eveniet delectus
            doloribus similique at assumenda maxime.</p>
        </div>
        <img src="images/img1.webp" alt="" width="100vw" height="80vh">
      </div>

      <div class="slideshow-slide">
        <div class="slideshow-content">
          <h2>Slide 2</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eius iusto cum consequuntur enim eveniet delectus
            doloribus similique at assumenda maxime.</p>
        </div>
        <img src="images/img2.webp" alt="" width="100vw" height="80vh">
      </div>

      <div class="slideshow-slide">
        <div class="slideshow-content">
          <h2>Slide 3</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eius iusto cum consequuntur enim eveniet delectus
            doloribus similique at assumenda maxime.</p>
        </div>
        <img src="images/img3.webp" alt="" width="100vw" height="80vh">
      </div>

      <div class="slideshow-slide">
        <div class="slideshow-content">
          <h2>Slide 4</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eius iusto cum consequuntur enim eveniet delectus
            doloribus similique at assumenda maxime.</p>
        </div>
        <img src="images/img4.webp" alt="" width="100vw" height="80vh">
      </div>

      <div class="slideshow-slide">
        <div class="slideshow-content">
          <h2>Slide 5</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eius iusto cum consequuntur enim eveniet delectus
            doloribus similique at assumenda maxime.</p>
        </div>
        <img src="images/img5.webp" alt="" width="100vw" height="80vh">
      </div>
    </section>
    <!--End of Slidershow-->

    <!--Products-->
    <section class="products">
      <div class="products-heading">
        <h1 class="products-heading-text">Featured Products</h1>
      </div>

      <div class="products-wrapper">
        <!--Gallery-->
        <?php
          include("components/_temp-products.php");
          for($i=0; $i<count($products);$i++){
            $desc = $products[$i][1] . " - " . substr($products[$i][2],0,17) . "...";
            $img = "images/product" . $products[$i][0] . ".webp";
            $href = "product.php?" . http_build_query($products[$i]);
            $price = $products[$i][3];

            echo 
              "<a href=\"$href\" class='product'>
              <img src=\"$img\" alt='' class='product-img' loading='lazy'>
              <h2 class='product-description'>
                $desc 
              </h2>
              <h2 class='product-price'>
                $$price
              </h2>
              </a>";
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