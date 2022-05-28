<?php
if(isset($_POST["id"],$_POST["size"],$_POST["enabled"])){
    $id = $_POST["id"];
    $enabled = $_POST["enabled"];
    $enabledValues = [0,1];
    if(!ctype_digit($id) || !ctype_digit($enabled) || !in_array($enabled, $enabledValues))
      die();

    $server = "localhost";
    $user = "root";
    $password = "";
    $arr = [$enabled, $id, $_POST["size"]];
    try {
      //print_r($arr);
      $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
      $stmt = $conn->prepare('UPDATE PRODUCTS SET `enabled` = ? WHERE base_id = ? AND size = ?');
      $stmt->execute($arr);
      }
    catch(PDOException $e) {
      echo "Connection error: " . $e->getMessage();
    }
}
?>