<?php
  $valuesSet = isset($_POST["base_id"],$_POST["modify_name"],$_POST["modify_size"],$_POST["modify_description"],
        $_POST["modify_price"],$_POST["modify_quantity"],$_POST["modify_enabled"]);

    $enabled = $valuesSet ? $_POST["modify_enabled"] : -1;

    print_r($_POST);
  if($valuesSet && ctype_digit($_POST["base_id"]) && ctype_digit($enabled) && ctype_digit($price) && ctype_digit($quantity)){
    $correctEnabled = $enabled == 0 || $enabled == 1;
    
    if($correctEnabled){
        $server = "localhost";
        $user = "root";
        $password = "";
        $arr = [$_POST["modify_quantity"],$_POST["modify_enabled"],$_POST["base_id"],$_POST["modify_size"]];
        try {
        //print_r($arr);
        $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
        $stmt = $conn->prepare('UPDATE PRODUCTS SET
            `quantity`= ?, `enabled`= ?
            WHERE `base_id` = ? AND `size` = ?');
        $stmt->execute($arr);

        $arr = [$_POST["modify_price"],$_POST["modify_description"],$_POST["modify_name"],$_POST["base_id"]];
        $stmt = $conn->prepare('UPDATE PRODUCT_BASE SET
            `price`= ?, `description`= ?, `name`= ?
            WHERE `id` = ?');
        $stmt->execute($arr);
        }
        catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
        }
    }
  }
  header("Location: ../_products.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>