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

  $products = array(
    array(1,"Gio Dress","Lorem ipsum dolor",50),
    array(2,"Giorno Pants","Lorem ipsum belor",20),
    array(3,"Joop Shirt","Lorem ipsum deler",20),
  );//DON'T TOUCH!!!

  $shipment_cost = 5;
  $products_cost = 0;
  for($i = 0; $i < count($_SESSION["products"]); $i++)
  {
    $id = $_SESSION["products"][$i][0]-1;
    $unitPrice = $products[$id][3];
    $quantity = $_SESSION["products"][$i][2];
    $price = $unitPrice * $quantity;
    $products_cost += $price;
  }

  $_SESSION["shipment_cost"] = $shipment_cost;
  $_SESSION["products_cost"] = $products_cost;
  die();
}
?>