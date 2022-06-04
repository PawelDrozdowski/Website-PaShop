<?php
session_start();
if(!isset($_SESSION["products"]))
{
  header("Location: cart-empty.php");
  die();
}
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
    <form id="order" action="cart-delivery.php"></form>
    <section class="details">
    <?php
      $server = "localhost";
      $user = "root";
      $password = "";
      try {
        $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
        $stmt = $conn->prepare(
          'SELECT PRODUCT_BASE.id, name, price, description
          FROM PRODUCT_BASE'
        );
          
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
      }
      $amount = count($_SESSION["products"]);
      $products_cost = 0;
      $shipment_cost = 5;


      if(isset($_POST["id"]) && isset($_POST["quantity"])){
        $_id = $_POST["id"];
        $_quantity = $_POST["quantity"];
        echo "$_id - $_quantity";
      }

      echo
          "<ul class='purchase-products'>
            <li class='purchase-products-welcome'>
              <h2 class='purchase-products-amount'>Your cart (<span id='cart-items-count'>$amount</span>)</h2>
            <p class='purchase-products-encouragement'>Remember to place an order before those bargains are gone</p>
          </li>";

          for($i=0;$i<count($_SESSION["products"]);$i++)
          {
            $id = $_SESSION["products"][$i][0]-1;
            $name = $products[$id]['name'];
            $desc = $name . " - " . substr($products[$id]['description'],0,90);
            $img = "images/product" . $products[$id]['id'] . ".webp";
            $href = "product.php?" . $products[$id]['id'];
            $unitPrice = intval($products[$id]['price']);

            $size = $_SESSION["products"][$i][1];
            $quantity = $_SESSION["products"][$i][2];
            $price = intval($unitPrice) * intval($quantity);

            $products_cost += intval($price);
            $id++;
            echo
              "<li class='purchase-products-item'>
              <a href = '$href' class='purchase-products-item-img'>
                <img src='$img'>
              </a>
              <div class='purchase-products-item-details'>
                <a href='$href' class='purchase-products-item-name'>$name</a>
                <span class='purchase-products-item-description'>
                  $desc
                </span>
    
                <span class='purchase-products-item-size'>Size: <span class='size'>$size</span></span>
                <div>
                  <input type='hidden' class='price' value ='$unitPrice'>
                  <input type='hidden' class='id' value ='$id'>
                  <select name = 'size' class='select'>";
                      for($j=0;$j<=$quantity || $j<6;$j++)
                        if($j != $quantity)
                          echo "<option value='$j'>$j</option>";
                        else
                          echo "<option value='$j' selected>$j</option>";
                    echo
                  "</select>
                  <span class='purchase-products-item-price'>$$price</span>
                </div>
              </div>
    
              <button class='purchase-products-item-remove'><i class='fa-solid fa-trash'></i></button>
            </li>";
          }
            echo "</ul>";
            $_SESSION["shipment_cost"] = $shipment_cost;
            $_SESSION["products_cost"] = $products_cost;
            include("components/order-cost.php");
        ?>
        
      <br />
    </section>
    <!--End of Details-->
  </div>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    function decreaseItemsAmount(){
      var amount = parseInt($("#cart-items-count").text());
      $("#cart-items-count").text(--amount);
      $("#cart-navbar-items-count").text(amount);
      if(amount <= 0)
        window.location.href = "index.php";
    }

    function updateCost(changedElemParent, newQuantity){
      var priceContainer = $(changedElemParent).find(".purchase-products-item-price");

      var unitPrice = $(changedElemParent).find(".price").val();
      var oldItemCost = parseInt($(priceContainer).text().slice(1));
      var newItemCost = unitPrice * newQuantity;

      var oldProductsCost = parseInt($("#products-cost").text().slice(1));

      var deliveryPrice = parseInt($("#shipment-cost").text().slice(1));

      $(priceContainer).text("$" + newItemCost); 
      $("#products-cost").text("$" + (oldProductsCost - oldItemCost + newItemCost));
      $("#total-cost").text("$" + (oldProductsCost - oldItemCost + newItemCost + deliveryPrice));
    }
    function updateCart(id, size, quantity){
      $.ajax({
          url : 'components/_save-cart.php',
          type : 'post',
          cache : 'false',
          data : {id : id, size : size, quantity : quantity},
          error : function(XMLHttpRequest, textStatus, errorThrown){
            alert ("Error Occured");
          }
        });
    }
    $(document).ready(function(){

      $(".purchase-products-item-remove").on('click',function() {
        var parent = $(this).parent();
        var id = $(parent).find(".id").val();
        var size = $(parent).find(".size").text();

        updateCart(id, size, 0);
        updateCost(parent, 0);
        $(this).parent().remove();
        decreaseItemsAmount();
      });

      $(".select").on('change',function(){
        var quantity = $(this).val();
        var parent = $(this).parent();
        var size = $(parent).parent().find(".size").text();

        var id = $(parent).find(".id").val();
        updateCost(parent, quantity);
        updateCart(id, size, quantity);

        if(quantity == 0){
          $(parent).parent().parent().remove();
          decreaseItemsAmount();
        }
      });
    });
  </script>
</body>

</html>