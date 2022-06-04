<?php
  $valuesSet = isset($_POST["add_size"],$_POST["add_quantity"]);
  $possibleSizes=["S","M","L","XL"];
    if($valuesSet && ctype_digit($_POST["add_quantity"]) && ctype_digit($_POST["add_id"]) && in_array($_POST["add_size"], $possibleSizes)){
        $server = "localhost";
        $user = "root";
        $password = "";
        try {
        $arr = [$_POST["add_id"],$_POST["add_size"],$_POST["add_quantity"]];
        $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
        $stmt = $conn->prepare('INSERT INTO PRODUCTS
            (`base_id`, `size`, `quantity`, `enabled`)
            VALUES (?, ?, ?, 0)');
        $stmt->execute($arr);
        }catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
  }
  header("Location: ../_products.php");
?>