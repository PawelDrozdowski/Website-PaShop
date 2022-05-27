<?php
  $valuesSet = isset($_POST["id"],$_POST["modify_fName"],$_POST["modify_lName"],
        $_POST["modify_mail"],$_POST["modify_role"],$_POST["modify_enabled"]);

    $role = $valuesSet ? $_POST["modify_role"] : 0;
    $enabled = $valuesSet ? $_POST["modify_enabled"] : -1;

  if($valuesSet && ctype_digit($_POST["id"]) && ctype_digit($role) && ctype_digit($enabled) && filter_var($_POST["modify_mail"], FILTER_VALIDATE_EMAIL)){
    $correctEnabled = $enabled == 0 || $enabled == 1;
    $correctRole = $role > 0 && $role < 3;//risky - need better connection to DB here
    if($correctEnabled && $correctRole){
        $server = "localhost";
        $user = "root";
        $password = "";
        $arr = [$_POST["modify_fName"],$_POST["modify_lName"],$_POST["modify_mail"],
            $_POST["modify_role"],$_POST["modify_enabled"],$_POST["id"]];
        try {
        print_r($arr);
        $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
        $stmt = $conn->prepare('UPDATE USERS SET
            `fname`= ?, `lname`= ?, `mail`= ?, `role_id`= ?, `enabled`= ?
            WHERE id = ?');
        $stmt->execute($arr);
        }
        catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
        }
    }
  }
  header("Location: ../_users.php");
?>