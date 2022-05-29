<?php
    session_start();
    if(!isset($_SESSION["login"]))
      header("Location: _login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" type="image/png" href="images/shortcut.png">
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital@1&family=Montserrat+Alternates:wght@100&family=Proza+Libre&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/ba43e8ddba.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/main.css" />
  <title>Employee Orders</title>
</head>

<body>
  <div class="container">
    <div class="heading">
      <div class="logo">
        <img src="images/logo.webp" alt="" class="logo-img-small">
      </div>
    </div>
    
    <a href="_menu.php" class="button inputs-group-btn admin-backBtn">Back</a>

    <div class="contact" style="grid-column:1/-1">
      <form action="_orders.php" method="GET">
        <div class="inputs-group" style="width:calc(100% - 2rem)">
          <input type="number" class="admin-table-input" name="id" placeholder="ID" style="margin: 0 1%;">
          <input type="text" class="admin-table-input" name="client" placeholder="Client" style="margin: 0 1%;">
          <input type="text" class="admin-table-input" name="delivery" placeholder="Delivery" style="margin: 0 1%;">
          <input type="number" class="admin-table-input" name="price" placeholder="Price" style="margin: 0 1%;">
          <input type="text" class="admin-table-input" name="payment" placeholder="Payment" style="margin: 0 1%;">
          <input type="text" class="admin-table-input" name="status" placeholder="Status" style="margin: 0 1%;">
          <input type="date" class="admin-table-input" name="dateFrom" placeholder="Date From" style="margin: 0 1%;">
          <input type="date" class="admin-table-input" name="dateTo" placeholder="Date To" style="margin: 0 1%;">
          <input type="submit" class="inputs-group-btn" value="Search" style="margin: 0 1%;font-size: 2rem; width:10%;">
        </div>
      </form>
      <table class="admin-table">
        <?php
        $columns = ['id','client','delivery','payment','status','price','dateFrom','dateTo'];
        $arr = [];
        for($i = 0; $i<count($columns);$i++){
          if(isset($_GET[$columns[$i]]) && $_GET[$columns[$i]] != ""){
            if($i > 4)//payment, dateFrom, dateTo
              array_push($arr, $_GET[$columns[$i]]);
            else
              array_push($arr, "%".$_GET[$columns[$i]]."%");
          }
          else{
            if($i == 6)//dateFrom
              array_push($arr, "1989-01-01");
            else if($i == 7)//dateTo
              array_push($arr, date("Y-m-d H:i:s"));
            else
              array_push($arr,"%");
          }   
        }

        $server = "localhost";
        $user = "root";
        $password = "";
        try {
          //print_r($arr);
          $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
          $stmt = $conn->prepare('SELECT ORDERS.id, CONCAT(fname, " ", lname) AS "client", order_date, price,
           DELIVERY_TYPES.name AS delivery, PAYMENT_TYPES.name AS payment, STATUS_TYPES.name AS "status"
           FROM ORDERS
           LEFT JOIN DELIVERY_TYPES ON ORDERS.delivery_id = DELIVERY_TYPES.id
           LEFT JOIN STATUS_TYPES ON ORDERS.status_id = STATUS_TYPES.id
           LEFT JOIN PAYMENT_TYPES ON ORDERS.payment_id = PAYMENT_TYPES.id
           HAVING ORDERS.id LIKE ?
            AND client LIKE ?
            AND delivery LIKE ?
            AND payment LIKE ?
            AND status LIKE ?
            AND price LIKE ?
            AND order_date >= ?
            AND order_date <= ?');
          
          $stmt->execute($arr);
          while($row = $stmt->fetch()){
            echo"
              <tr class='admin-table-row'>
                <td class='admin-table-orders'>".$row['id']."</td>
                <td class='admin-table-orders'>".$row['client']."</td>
                <td class='admin-table-orders'>".$row['delivery']."</td>
                <td class='admin-table-orders'>$".$row['price']."</td>
                <td class='admin-table-orders'>".$row['payment']."</td>
                <td class='admin-table-orders'>".$row['status']."</td>
                <td class='admin-table-ordersX2'>".$row['order_date']."</td>
                <td class='admin-table-orders'><a href='#'><i class='fa-solid fa-angle-down'></i></a></td>
              </tr>";
          }
        } catch(PDOException $e) {
          echo "Connection error: " . $e->getMessage();
        }
        
        ?>
      </table>
    </div>

</body>

</html>