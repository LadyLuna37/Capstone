<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Admin Panel - Welcome</title>
   <link rel="stylesheet" href="homepage.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://kit.fontawesome.com/9b44d189ed.js" crossorigin="anonymous"></script>
   <style>
  .sidepanel  {
  width: 0;
  position: fixed;
  z-index: 1;
  height: 45%;
  top: 0;
  left: 0;
  background-color: brown;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 30px;
}

.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidepanel a:hover {
  color: white;
  text-shadow: 1px 1px black;
}

.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 18px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: brown;
  color: white;
  padding: 10px 15px;
  border: 2px solid chocolate;
}

.openbtn:hover {
  background-color: white;
  color: brown;
}
    .form {
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>




<body>
<center><h1 style=" align-content: center; text-align: center; font-family: Georgia, serif; font-size: 48px; text-shadow:1px 1px 3px black; color: brown; background-color: cornsilk; border: 3px solid chocolate; width:50%"> <img src="CoffeeLeaf.jpg" alt="" width="30" height="30" />Admin Panel<img src="CoffeeLeaf.jpg" alt="" width="30" height="30" /></h1></center>


<?php
echo '<header><div id="sidepanel" class="sidepanel">
      <a class="active" style = "border: 2px solid chocolate; background-color:white; color: brown" href="admin_welcome.php"><center><img src="CoffeeLeaf.jpg" alt="" width="30" height="30" />Luna Coffee<img src="CoffeeLeaf.jpg" alt="" width="30" height="30" /><br><img src="lgCoffeeIco.ico" alt="alt"/><br>Admin Home</center></a><br><br>
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <a href="admin_orders.php"><i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;</i>New Orders</a><br>
       <a href="admin_reorder.php"><i class="fa fa-bell">&nbsp;&nbsp;&nbsp;</i>Reorder Requests </a><br>
      <a href="admin_products.php"><i class="fa fa-coffee">&nbsp;&nbsp;&nbsp;</i>Update Product</a><br>
      <a href="admin_users.php">  <i class="fa fa-user">&nbsp;&nbsp;&nbsp;</i>Update Users </a><br>
       <a href="admin_vendors.php"> <i class="fa fa-globe">&nbsp;&nbsp;&nbsp;</i>Update Vendors </a>
      </div>
      <button class="openbtn" onclick="openNav()">☰ &nbsp;&nbsp; Menu</button>
        <script>
        function openNav() {
          document.getElementById("sidepanel").style.width = "250px";
        }

        function closeNav() {
          document.getElementById("sidepanel").style.width = "0";
        }
        </script></header>';
?>
</body>
</html>
