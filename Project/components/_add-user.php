<?php
  $valuesSet = 
    isset($_POST["add_fName"],$_POST["add_lName"],$_POST["add_mail"],$_POST["add_role"],$_POST["add_password"]);
  if($valuesSet && ctype_digit($_POST["add_role"]) && filter_var($_POST["add_mail"], FILTER_VALIDATE_EMAIL)){
    $server = "localhost";
    $user = "root";
    $password = "";
    $arr = [$_POST["add_fName"],$_POST["add_lName"],$_POST["add_mail"],$_POST["add_role"],$_POST["add_password"]];
    try {
      //print_r($arr);
      $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
      $stmt = $conn->prepare('INSERT INTO USERS
        (`id`, `fname`, `lname`, `mail`, `role_id`, `enabled`, `password`)
        VALUES (NULL, ?, ?, ?, ?, 1, ?)');
      $stmt->execute($arr);
      }
    catch(PDOException $e) {
      echo "Connection error: " . $e->getMessage();
    }
  }
  header("Location: ../_users.php");
?>