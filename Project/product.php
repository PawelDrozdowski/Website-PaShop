<?php

  if(!isset($_GET["0"])||!isset($_GET["1"])||!isset($_GET["2"])||!isset($_GET["3"])){
    header("Location: index.php");
    die();
  }
  $id = $_GET["0"];
  if(!file_exists("images/product$id.webp")){
    header("Location: index.php");
    die();
  }

  session_start();
  
  if(isset($_POST['to_cart']))
  { 
    $data = array($_POST["id"],$_POST["size"],$_POST["quantity"]);
    $error = false;
    if(!ctype_digit($data[0]) || !ctype_digit($data[2]))//id is not int || quantity is not int
      $error = true;

    $correctSizes = array("S","M","L","XL");
    if($error || !in_array($data[1], $correctSizes))
      $error = true;

    
    if(!$error && !isset($_SESSION["products"]))
      $_SESSION["products"] = array($data);
    else if(!$error)
    {
      $sameProductFound = 0;
      for($i=0;$i<count($_SESSION["products"]);$i++)
        if($_SESSION["products"][$i][0]== $data[0] && $_SESSION["products"][$i][1]==$data[1]){
          $data[2] += $_SESSION["products"][$i][2];
          $_SESSION["products"][$i] = $data;
          $sameProductFound = 1;
          break;
          }
          if($sameProductFound == 0)
            $_SESSION["products"] = 
              array_pad($_SESSION["products"], count($_SESSION["products"])+1, $data);
    }
  }
  if(isset($_POST['reset']))
  { 
    unset($_SESSION["products"]);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" type="image/s" href="images/shortcut.png">
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital@1&family=Montserrat+Alternates:wght@100&family=Proza+Libre&display=swap"
    rel="stylesheet" rel="preload" as="style">
    <script src="https://kit.fontawesome.com/ba43e8ddba.js" crossorigin="anonymous" defer></script>
  <link rel="stylesheet" href="css/main.css"/>
  <script src="js/productSlideshow.js" defer></script>
  <title>Product Name PaShop</title>
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
    include("components/navbar.php")
    ?>
    <!--End of Header-->

    <!--Products-->
    <section class="details">
      <!-- Slideshow container -->
      <div class="product-slideshow-container">

        <?php
          $id = $_GET["0"];//GET checked at top

          echo
          "<div class='product-slideshow-slide fade'>
            <img src='images/product$id.webp'>
          </div>";

          $number = 1;
          while(file_exists("images/product$id-$number.webp"))
          {
            echo
            "<div class='product-slideshow-slide fade'>
              <img src='images/product$id-$number.webp'>
            </div>";
            $number++;
          }
        ?>

        <a class="prev product-slideshow-btn" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next product-slideshow-btn" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <!-- End of Slideshow container -->

      <div class="details-purchase">
        <div>
          <h2 class="details-purchase-name">
            <?php
              echo $_GET["1"];//GET checked at top
            ?>
          </h2>
          <h2 class="details-purchase-price">
            <?php
              echo '$'.$_GET["3"];//GET checked at top
            ?>
          </h2>

          <form method="post">
            <?php
              $id = $_GET["0"];
              echo "<input name='id' type='hidden' value='$id'></input>";
            ?>

            <span>Size:</span>
            <select name="size" class="select">
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>

            <span>Quantity:</span>
            <select name="quantity" class="select">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <div class="inputs-group">
              <input type="submit" name='to_cart' class="details-purchase-btn" value="Buy">
              <input type="submit" name='reset' class="details-purchase-btn" value="Reset - dev tool">
            </div>
          </form>
          <?php
            if(isset($_SESSION["products"]))
              echo  json_encode($_SESSION["products"]);
          ?>

        </div>
      </div>
      <div class="details-preview">
        <div class="details-product desc">
          <hr class="hr-solid">
          <h2 class="product-description details-description">
            <?php
              echo $_GET["2"];//GET checked at top
            ?>
          </h2>
        </div>
      </div>
      <br />
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