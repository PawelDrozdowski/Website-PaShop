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
  <title>Employee Products</title>
</head>

<body>
  <div class="container">
    <div class="heading">
      <div class="logo">
        <img src="images/logo.webp" alt="" class="logo-img-small">
      </div>
    </div>

    <a href="_menu.php" class="button inputs-group-btn admin-backBtn">Back</a>
    
    <form action="_add_products.php">
      <input type="submit" class="inputs-group-btn admin-addBtn" value="Add" style="position:fixed">
    </form>
    <div class="contact" style="grid-column:1/-1">
    <form action="_products.php" method="GET">
      <div class="inputs-group" style="width:calc(100% - 2rem)">
        <input type="number" class="admin-table-input" name="id" placeholder="ID" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="name" placeholder="Name" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="photo" placeholder="Photo" style="margin: 0 1%;" disabled="disabled" >
        <input type="text" class="admin-table-input" name="size" placeholder="Size" style="margin: 0 1%;">
        <input type="number" class="admin-table-input" name="price" placeholder="Price" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="quantity" placeholder="Quantity" style="margin: 0 1%;">
        <input type="text" class="admin-table-input admin-table-productsX2" name="description" placeholder="Description"  style="margin: 0 1%;">
        <select name="enabled" class="select admin-table-input" style="padding:0 1rem;font-size: 1.6rem;margin: 0 2%;">
            <option value="">Enabled</option>
            <option value="1">true</option>
            <option value="0">false</option>
          </select>
        <!-- <input type="text" class="admin-table-input" name="enabled" placeholder="Enabled" style="margin: 0 1%;"> -->
        <input type="submit" class="inputs-group-btn" value="Search" style="margin: 0 1%;font-size: 2rem; width:10%;">
      </div>
    </form>
      <table class="admin-table">
      <?php
        $columns = ['id','name','price','quantity','size','description','enabled'];
        $arr = [];
        for($i = 0; $i<count($columns);$i++){
          if(isset($_GET[$columns[$i]]) && $_GET[$columns[$i]] != ""){
              array_push($arr, "%".$_GET[$columns[$i]]."%");
          }
          else{
              array_push($arr,"%");
          }   
        }

        $server = "localhost";
        $user = "root";
        $password = "";
        try {
          //print_r($arr);
          $conn = new PDO("mysql:host=$server;dbname=pashop",$user, $password);
          $stmt = $conn->prepare('SELECT PRODUCTS.base_id, size, quantity, enabled, name, price, description
            FROM PRODUCTS
            LEFT JOIN PRODUCT_BASE ON PRODUCTS.base_id = PRODUCT_BASE.id
            HAVING PRODUCTS.base_id LIKE ?
              AND name LIKE ?
              AND price LIKE ?
              AND quantity LIKE ?
              AND size LIKE ?
              AND description LIKE ?
              AND enabled LIKE ?');
          
          $stmt->execute($arr);
          while($row = $stmt->fetch()){
            $enabled = $row['enabled'] == 1 ? 'true' : 'false';
            $disableButton = $enabled == 'true' ? "<a href='#'><i class='fa-solid fa-trash'></i></a>" : "";
            $id = $row['base_id'];
            echo"
              <tr class='admin-table-row'>
                <td class='admin-table-products base_id'>$id</td>
                <td class='admin-table-products name'>".$row['name']."</td>
                <td class='admin-table-products photo'><img src='images/product$id.webp' style='width:5.5rem'></td>
                <td class='admin-table-products size'>".$row['size']."</td>
                <td class='admin-table-products price'>".$row['price']."</td>
                <td class='admin-table-products quantity'>".$row['quantity']."</td>
                <td class='admin-table-productsX2 description'>".$row['description']."</td>
                <td class='admin-table-products enabled-displayed'>$enabled</td>
                <td class='admin-table-products enabled'style='display:none'>".$row['enabled']."</td>
                <td class='admin-table-products'>
                  $disableButton
                  <a href='#'><i class='fa-solid fa-gear'></i></a>
                </td>
              </tr>";
          }
        } catch(PDOException $e) {
          echo "Connection error: " . $e->getMessage();
        }
        
        ?>
      </table>

      <form id="modify-form" action="components/_modify-product.php" method="POST" style="display:none">
        <div class="inputs-group" style="width:100%; height:6%; padding: 6% 0; position: fixed; bottom: 0; background-color:white; border-top: 0.5rem dashed black">
          <a href='#'style="width:1rem; height:1rem; position: absolute; top: 0; right:50%;font-size:4rem">
            <i class='fa-solid fa-angle-down'></i>
          </a>
          <input id="modify-base_id" type="number" class="admin-table-input" name="base_id" placeholder="ID"
            style="margin: 0 1%; visibility: hidden;">
            <input id="modify-photo" type="text" class="admin-table-input" name="modify_photo" placeholder="Photo" style="margin: 0 1%; visibility: hidden;">
          <input id="modify-name" type="text" class="admin-table-input" name="modify_name" placeholder="Name" style="margin: 0 1%;" required>
          <input id="modify-size" type="text" class="admin-table-input" name="modify_size" placeholder="Size" style="margin: 0 1%;" required>
          <input id="modify-price" type="text" class="admin-table-input" name="modify_price" placeholder="Price" style="margin: 0 1%;" required>
          <input id="modify-quantity" type="text" class="admin-table-input" name="modify_quantity" placeholder="Quantity" style="margin: 0 1%;" required>
          <input id="modify-description" type="text" class="admin-table-input admin-table-productsX2" name="modify_description" placeholder="Description"
            style="margin: 0 1%;" required>
          <select id="modify-enabled" class="select admin-table-input" name="modify_enabled" style="padding:0 1rem;font-size: 1.6rem;margin: 0 2%;" required>
            <option value="1">true</option>
            <option value="0">false</option>
          </select>
          <input type="submit" class="inputs-group-btn" value="Modify" style="margin: 0 1%;font-size: 2rem; width:10%;">
        </div>
      </form>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    function disableProduct(id, size){
      $.ajax({
          url : 'components/_save-products.php',
          type : 'post',
          cache : 'false',
          data : {id : id, size : size, enabled : 0},
          error : function(XMLHttpRequest, textStatus, errorThrown){
            alert ("Error Occured");
          }
        });
    }
    $(document).ready(function(){
      //delete product trigger
      $(".fa-trash").on('click',function() {
        var container = $(this).parent().parent().parent();
        var id = $(container).find(".base_id").text();
        var size = $(container).find(".size").text();
        disableProduct(id, size);
        $(container).find(".enabled-displayed").text("false");
        $(this).parent().remove();
      });

      //hide modify-form trigger 
      $(".fa-angle-down").on('click',function() {
        $('#modify-form').css("display", "none");
      });

      //show modify-form trigger 
      $(".fa-gear").on('click',function() {
        var container = $(this).parent().parent().parent();
        let form = $('#modify-form');
        let dataNames = ['base_id','name','price','quantity','size','description','enabled'];
        for(let i =0; i<dataNames.length; i++){
          $(form).find("#modify-"+dataNames[i]).val
            ($(container).find("." + dataNames[i]).text());
        }

        $(form).css("display", "block");
      });
    });
  </script>
</body>

</html>