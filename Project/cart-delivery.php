<?php
session_start();
$valuesSet = isset($_POST["fname"],$_POST["lname"],$_POST["payment"],$_POST["delivery"]);
if($valuesSet &&  strlen($_POST["fname"]) > 1 && strlen($_POST["lname"]) > 1){
  $server = "localhost";
  $user = "root";
  $password = "";
  $arr = [$_POST["fname"],$_POST["lname"],$_POST["delivery"],$_POST["cost"],$_POST["payment"],date("Y-m-d H:i:s")];
  try {

    $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
    $stmt = $conn->prepare('INSERT INTO ORDERS
      (`id`, `fname`, `lname`, `delivery_id`, `price`, `payment_id`, `status_id`, `order_date`)
      VALUES (NULL, ?, ?, ?, ?, ?, 1, ?)');
    $stmt->execute($arr);
    }
  catch(PDOException $e) {
    echo "Connection error: " . $e->getMessage();
  }
  unset($_SESSION["products"]);
  header("Location: cart.php");
}  
if(!isset($_SESSION["shipment_cost"]) || !isset($_SESSION["products_cost"]))
{
  header("Location: cart.php");
  die();
}
$shipment_cost = $_SESSION["shipment_cost"];
$products_cost = $_SESSION["products_cost"];
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

        <form class="delivery" id="order" action="#" method="POST">
          <h2>1. Delivery</h2>
          <div class="inputs-group">
            <input type="radio" id="InPost" name="delivery" value="1" checked>
            <label for="InPost">InPost</label>
          </div>
          <input type="radio" id="Collection_in_person" name="delivery" value="2">
          <label for="Collection_in_person">Collection in person</label>


          <h2>2. Address</h2>
          <div class="inputs-group">
            <input type="text" class="inputs-group-text" name="fname" minlength ="2" placeholder="First Name" required>
            <input type="text" class="inputs-group-text" name="lname" minlength ="2" placeholder="Last Name" required>
          </div>
          <div class="inputs-group">
            <input type="text" class="inputs-group-text" name="streetAddress" placeholder="Street Address" required>
            <input type="text" class="inputs-group-text" name="streetNo" placeholder="Street No." required>
          </div>
          <div class="inputs-group">
            <input type="text" class="inputs-group-text" name="city" placeholder="City" required>
            <input type="text" class="inputs-group-text" name="ZIP" placeholder="Postal / ZIP Code" required>
          </div>
          <div class="inputs-group">
            <input type="email" class="inputs-group-email" name="email" placeholder="Email Address" required>
            <input type="text" class="inputs-group-email" name="phone" placeholder="Phone Number" required>
          </div>

          <h2>3. Payment</h2>
          <div class="inputs-group">
            <input type="radio" id="Check" name="payment" value="1" checked>
            <label for="Check">Check</label>
          </div>
          <input type="radio" id="cash" name="payment" value="2">
          <label for="cash">Cash</label>
        <?php
          $total_cost = $shipment_cost + $products_cost;
          echo "<input type='hidden' name='cost' id='cost' value = $total_cost>";
        ?>
        </form>


      </div>
      <?php
        include("components/order-cost.php");
      ?>
      <br />
    </section>
    <!--End of Details-->
  </div>
</body>

</html>