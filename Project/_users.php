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
      <div class="inputs-group" style="width:calc(100% - 2rem)">
        <input type="number" class="admin-table-input" name="id" placeholder="ID" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="fName" placeholder="First Name" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="lName" placeholder="Last Name" style="margin: 0 1%;">
        <input type="email" class="admin-table-input admin-table-usersX2" name="mail" placeholder="Mail"
          style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="role" placeholder="Role" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="enabled" placeholder="Enabled" style="margin: 0 1%;">
        <button class="inputs-group-btn" style="margin: 0 1%;font-size: 2rem; width:10%;">Search</button>
      </div>
      <table class="admin-table">
        <tr class="admin-table-row">
          <td class="admin-table-users">1</td>
          <td class="admin-table-users">John</td>
          <td class="admin-table-users">Doe</td>
          <td class="admin-table-usersX2">johndoe@mail.com</td>
          <td class="admin-table-users">Admin</td>
          <td class="admin-table-users">true</td>
          <td class="admin-table-users"><a href="#"><i class="fa-solid fa-trash"></i></a><a href="#"><i
                class="fa-solid fa-angle-down"></i></a></td>
        </tr>
        <tr class="admin-table-row">
          <td class="admin-table-users">2</td>
          <td class="admin-table-users">Johnny</td>
          <td class="admin-table-users">Bravo</td>
          <td class="admin-table-usersX2">johnnybravo@mail.com</td>
          <td class="admin-table-users">Employee</td>
          <td class="admin-table-users">false</td>
          <td class="admin-table-users"><a href="#"><i class="fa-solid fa-trash"></i></a><a href="#"><i
                class="fa-solid fa-angle-down"></i></a></td>
        </tr>
        <tr class="admin-table-row">
          <td class="admin-table-users">3</td>
          <td class="admin-table-users">Jonathan</td>
          <td class="admin-table-users">Joestar</td>
          <td class="admin-table-usersX2">jojo@mail.com</td>
          <td class="admin-table-users">Employee</td>
          <td class="admin-table-users">true</td>
          <td class="admin-table-users"><a href="#"><i class="fa-solid fa-trash"></i></a><a href="#"><i
                class="fa-solid fa-angle-down"></i></a></td>
        </tr>
      </table>
      <div class="inputs-group" style="width:calc(100% - 2rem); position: sticky; bottom: 1rem;">
        <input type="number" class="admin-table-input" name="id" placeholder="ID"
          style="margin: 0 1%; visibility: hidden;">
        <input type="text" class="admin-table-input" name="add_fName" placeholder="First Name" style="margin: 0 1%;">
        <input type="text" class="admin-table-input" name="add_lName" placeholder="Last Name" style="margin: 0 1%;">
        <input type="email" class="admin-table-input admin-table-usersX2" name="add_mail" placeholder="Mail"
          style="margin: 0 1%;">
        <select class="select admin-table-input" style="padding:0 1rem;font-size: 1.6rem;margin: 0 2%;">
          <option value="Option 1">Employee</option>
          <option value="Option 2">Admin</option>
        </select>
        <input type="text" class="admin-table-input" name="add_password" placeholder="(Enabled) Password" style="margin: 0 1%;">
        <button class="inputs-group-btn" style="margin: 0 1%;font-size: 2rem; width:10%;">Add</button>
      </div>
    </div>

</body>

</html>