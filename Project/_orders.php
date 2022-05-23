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
      <div class="inputs-group" style="width:calc(100% - 2rem)">
        <input type="number" class="admin-table-input" name="id" placeholder="ID" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="client" placeholder="Client" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="delivery" placeholder="Delivery" style="margin: 0 1%;">
        <input type="number" class="admin-table-input" name="price" placeholder="Price" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="payment" placeholder="Payment" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="status" placeholder="Status" style="margin: 0 1%;">
        <input type="date" class="admin-table-input" name="dateFrom" placeholder="Date From" style="margin: 0 1%;">
        <input type="date" class="admin-table-input" name="dateTo" placeholder="Date To" style="margin: 0 1%;">
        <button class="inputs-group-btn" style="margin: 0 1%;font-size: 2rem; width:10%;">Search</button>
      </div>
      <table class="admin-table">
        <tr class="admin-table-row">
          <td class="admin-table-orders">1</td>
          <td class="admin-table-orders">Paweł Drozdowski</td>
          <td class="admin-table-orders">InPost</td>
          <td class="admin-table-orders">$25</td>
          <td class="admin-table-orders">Cash</td>
          <td class="admin-table-orders">Delivered</td>
          <td class="admin-table-ordersX2">18.06.2019 14:20:11</td>
          <td class="admin-table-orders"><a href="#"><i class="fa-solid fa-angle-down"></i></a></td>
        </tr>
        <tr class="admin-table-row">
          <td class="admin-table-orders">2</td>
          <td class="admin-table-orders">Paweł Drozdowski</td>
          <td class="admin-table-orders">In person</td>
          <td class="admin-table-orders">$105</td>
          <td class="admin-table-orders">Check</td>
          <td class="admin-table-orders">Sent</td>
          <td class="admin-table-ordersX2">18.06.2019 13:10:43</td>
          <td class="admin-table-orders"><a href="#"><i class="fa-solid fa-angle-down"></i></a></td>
        </tr>
        <tr class="admin-table-row">
          <td class="admin-table-orders">3</td>
          <td class="admin-table-orders">Tymon Tymański</td>
          <td class="admin-table-orders">InPost</td>
          <td class="admin-table-orders">$60</td>
          <td class="admin-table-orders">Cash</td>
          <td class="admin-table-orders">Delivered</td>
          <td class="admin-table-ordersX2">19.06.2019 11:00:03</td>
          <td class="admin-table-orders"><a href="#"><i class="fa-solid fa-angle-down"></i></a></td>
        </tr>
      </table>
    </div>

</body>

</html>