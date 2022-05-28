<?php
print_r($_POST);
  $valuesSet = 
    isset($_POST["add_name"],$_POST["add_size"],$_POST["add_price"],$_POST["add_quantity"],$_POST["add_description"]);
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
        }
        catch(PDOException $e) {//not a comfortable method - better split add_products into two forms
            echo "Connection error: " . $e->getMessage();
            if(ctype_digit($_POST["add_price"]))
            {
                $arr = [$_POST["add_name"],$_POST["add_price"],$_POST["add_description"]];
                $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
                $stmt = $conn->prepare('INSERT INTO PRODUCT_BASE
                    (`id`, `name`, `price`, `description`)
                    VALUES (NULL, ?, ?, ?)');
                $stmt->execute($arr);

                $arr = [$_POST["add_id"],$_POST["add_size"],$_POST["add_quantity"]];
                $stmt = $conn->prepare('INSERT INTO PRODUCTS
                (`base_id`, `size`, `quantity`, `enabled`)
                VALUES (?, ?, ?, 0)');
                $stmt->execute($arr);
            }
        }
        catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
  }
  header("Location: ../_products.php");
?>