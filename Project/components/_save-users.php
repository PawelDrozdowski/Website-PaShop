<?php
if(isset($_POST["id"]) && isset($_POST["enabled"])){
    $id = $_POST["id"];
    $enabled = $_POST["enabled"];
    $enabledValues = [0,1];
    if(!ctype_digit($id) || !ctype_digit($enabled) || !in_array($enabled, $enabledValues))
      die();

      $server = "localhost";
      $user = "root";
      $password = "";
      $arr = [$enabled,$id];
      try {
        //print_r($arr);
        $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
        $stmt = $conn->prepare('UPDATE USERS SET enabled = ? where id = ?');
        $stmt->execute($arr);
        }
      catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
      }
}
?>