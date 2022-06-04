<?php
session_start();
if(!isset($_SESSION["products"]))
  die();

if(isset($_POST["id"]) && isset($_POST["quantity"]) && isset($_POST["size"])){
  $id = $_POST["id"];
  $size = $_POST["size"];
  $quantity = $_POST["quantity"];

  // $correctSizes = array("S","M","L","XL");
  // if(!in_array($size, $correctSizes))
  //   die();

  if(!ctype_digit($id) || !ctype_digit($quantity))
    die();

  for($i=0; $i<count($_SESSION["products"]); $i++)
  {
    if($_SESSION["products"][$i][0] == $id && $_SESSION["products"][$i][1] == $size)
    {
      if($quantity > 0)
        $_SESSION["products"][$i][2] = $quantity;
      else
        \array_splice($_SESSION["products"], $i, 1);
      break;
    }
  }

  if(count($_SESSION["products"]) == 0)
   unset($_SESSION["products"]);

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

  $shipment_cost = 5;
  $products_cost = 0;
  for($i = 0; $i < count($_SESSION["products"]); $i++)
  {
    $id = $_SESSION["products"][$i][0]-1;
    $unitPrice = $products[$id]['price'];
    $quantity = $_SESSION["products"][$i][2];
    $price = $unitPrice * $quantity;
    $products_cost += $price;
  }

  $_SESSION["shipment_cost"] = $shipment_cost;
  $_SESSION["products_cost"] = $products_cost;
  die();
}
?>