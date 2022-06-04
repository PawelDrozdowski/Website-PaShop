<?php

  $valuesSet = isset($_POST["add_id"],$_POST["add_name"],$_POST["add_price"],$_POST["add_description"]);

    if($valuesSet && ctype_digit($_POST["add_id"])){
        $server = "localhost";
        $user = "root";
        $password = "";
        try {
            if(ctype_digit($_POST["add_price"]) && ctype_digit($_POST["add_id"]))
            {
                $arr = [$_POST["add_id"],$_POST["add_name"],$_POST["add_price"],$_POST["add_description"],$_POST["add_category"]];
                $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
                $stmt = $conn->prepare('INSERT INTO PRODUCT_BASE
                    (`id`, `name`, `price`, `description`, `category`)
                    VALUES (?, ?, ?, ?, ?)');
                $stmt->execute($arr);
            }
        }
        catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
  }
  header("Location: ../_add_products.php");
?>