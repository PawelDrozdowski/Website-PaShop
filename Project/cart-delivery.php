<?php
session_start();
if(!isset($_SESSION["shipment_cost"]) || !isset($_SESSION["products_cost"]))
{
  header("Location: cart.php");
  die();
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
  <title>Your cart</title>
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

    <!--Details-->
    <section class="details">
      <div class="purchase-products">

        <form class="delivery">
          <h2>1. Delivery</h2>
          <div class="inputs-group">
            <input type="radio" id="InPost" name="delivery" value="inPost" checked>
            <label for="InPost">InPost</label>
          </div>
          <input type="radio" id="Collection_in_person" name="delivery" value="collectionInPerson">
          <label for="Collection_in_person">Collection in person</label>


          <h2>2. Address</h2>
          <div class="inputs-group">
            <input type="text" class="inputs-group-text" name="fname" placeholder="First Name">
            <input type="text" class="inputs-group-text" name="lname" placeholder="Last Name">
          </div>
          <div class="inputs-group">
            <input type="text" class="inputs-group-text" name="streetAddress" placeholder="Street Address">
            <input type="text" class="inputs-group-text" name="streetNo" placeholder="Street No.">
          </div>
          <div class="inputs-group">
            <input type="text" class="inputs-group-text" name="city" placeholder="City">
            <input type="text" class="inputs-group-text" name="ZIP" placeholder="Postal / ZIP Code">
          </div>
          <div class="inputs-group">
            <input type="email" class="inputs-group-email" name="email" placeholder="Email Address">
            <input type="text" class="inputs-group-email" name="phone" placeholder="Phone Number">
          </div>

          <h2>3. Payment</h2>
          <div class="inputs-group">
            <input type="radio" id="Check" name="payment" value="check" checked>
            <label for="Check">Check</label>
          </div>
          <input type="radio" id="cash" name="payment" value="cash">
          <label for="cash">Cash</label>

        </form>


      </div>
      <?php
        $shipment_cost = $_SESSION["shipment_cost"];
        $products_cost = $_SESSION["products_cost"];
        include("components/order-cost.php");
      ?>
      <br />
    </section>
    <!--End of Details-->
  </div>
</body>

</html>