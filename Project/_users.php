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
  <title>Employee Users</title>
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
      <form action="_users.php" method="GET">
        <div class="inputs-group" style="width:calc(100% - 2rem)">
          <input type="number" class="admin-table-input" name="id" placeholder="ID" style="margin: 0 1%;">
          <input type="text" class="admin-table-input" name="fName" placeholder="First Name" style="margin: 0 1%;">
          <input type="text" class="admin-table-input" name="lName" placeholder="Last Name" style="margin: 0 1%;">
          <input type="text" class="admin-table-input admin-table-usersX2" name="mail" placeholder="Mail"
            style="margin: 0 1%;">
          <input type="text" class="admin-table-input" name="role" placeholder="Role" style="margin: 0 1%;">
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
        $columns = ['id','fName','lName','mail','role','enabled'];
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
          $stmt = $conn->prepare('SELECT USERS.id, fname, lname, mail, enabled, role_id,
            ROLE_TYPES.name AS role
            FROM USERS
            LEFT JOIN ROLE_TYPES ON USERS.role_id = ROLE_TYPES.id
            HAVING USERS.id LIKE ?
              AND fname LIKE ?
              AND lname LIKE ?
              AND mail LIKE ?
              AND role LIKE ?
              AND enabled LIKE ?');
          
          $stmt->execute($arr);
          while($row = $stmt->fetch()){
            $enabled = $row['enabled'] == 1 ? 'true' : 'false';
            $disableButton = $enabled == 'true' ? "<a href='#'><i class='fa-solid fa-trash'></i></a>" : "";

            echo"
              <tr class='admin-table-row'>
                <td class='admin-table-users id'>".$row['id']."</td>
                <td class='admin-table-users fname'>".$row['fname']."</td>
                <td class='admin-table-users lname'>".$row['lname']."</td>
                <td class='admin-table-usersX2 mail'>".$row['mail']."</td>
                <td class='admin-table-users'>".$row['role']."</td>
                <td class='admin-table-users enabled-displayed'>$enabled</td>
                <td class='admin-table-users role'style='display:none'>".$row['role_id']."</td>
                <td class='admin-table-users enabled'style='display:none'>".$row['enabled']."</td>
                <td class='admin-table-users'>
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

      

      <form action="components/_add-user.php" method="POST">
        <div class="inputs-group" style="width:calc(100% - 2rem); position: sticky; bottom: 1rem;">
          <input type="number" class="admin-table-input" name="id" placeholder="ID"
            style="margin: 0 1%; visibility: hidden;">
          <input type="text" class="admin-table-input" name="add_fName" placeholder="First Name" style="margin: 0 1%;" required>
          <input type="text" class="admin-table-input" name="add_lName" placeholder="Last Name" style="margin: 0 1%;" required>
          <input type="email" class="admin-table-input admin-table-usersX2" name="add_mail" placeholder="Mail"
            style="margin: 0 1%;" required>
          <select class="select admin-table-input" name="add_role" style="padding:0 1rem;font-size: 1.6rem;margin: 0 2%;" required>
            <option value="1">Employee</option>
            <option value="2">Admin</option>
          </select>
          <input type="password" class="admin-table-input" name="add_password" placeholder="(Enabled) Password" style="margin: 0 1%;" required>
          <input type="submit" class="inputs-group-btn" value="Add" style="margin: 0 1%;font-size: 2rem; width:10%;">
        </div>
      </form>

      <form id="modify-form" action="components/_modify-user.php" method="POST" style="display:none">
        <div class="inputs-group" style="width:100%; height:6%; padding: 6% 0; position: fixed; bottom: 0; background-color:white; border-top: 0.5rem dashed black">
          <a href='#'style="width:1rem; height:1rem; position: absolute; top: 0; right:50%;font-size:4rem">
            <i class='fa-solid fa-angle-down'></i>
          </a>
          <input id="modify-id" type="number" class="admin-table-input" name="id" placeholder="ID"
            style="margin: 0 1%; visibility: hidden;">
          <input id="modify-fname" type="text" class="admin-table-input" name="modify_fName" placeholder="First Name" style="margin: 0 1%;" required>
          <input id="modify-lname" type="text" class="admin-table-input" name="modify_lName" placeholder="Last Name" style="margin: 0 1%;" required>
          <input id="modify-mail" type="email" class="admin-table-input admin-table-usersX2" name="modify_mail" placeholder="Mail"
            style="margin: 0 1%;" required>
          <select id="modify-role" class="select admin-table-input" name="modify_role" style="padding:0 1rem;font-size: 1.6rem;margin: 0 2%;" required>
            <option value="1">Employee</option>
            <option value="2">Admin</option>
          </select>
          <input id="modify-enabled" type="number" class="admin-table-input" name="modify_enabled" placeholder="(Enabled 1/0)" style="margin: 0 1%;" required>
          <input type="submit" class="inputs-group-btn" value="Modify" style="margin: 0 1%;font-size: 2rem; width:10%;">
        </div>
      </form>

    </div>

    

  <script src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    function disableUser(id){
      $.ajax({
          url : 'components/_save-users.php',
          type : 'post',
          cache : 'false',
          data : {id : id, enabled : 0},
          error : function(XMLHttpRequest, textStatus, errorThrown){
            alert ("Error Occured");
          }
        });
    }
    $(document).ready(function(){
      //delete user trigger
      $(".fa-trash").on('click',function() {
        var container = $(this).parent().parent().parent();
        var id = $(container).find(".id").text();
        disableUser(id);
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
        let dataNames = ["id","fname","lname","mail","role","enabled"];
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