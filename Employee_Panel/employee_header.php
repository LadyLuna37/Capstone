<?php
session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Admin Panel - Welcome</title>
   <link rel="stylesheet" href="homepage.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .sidebar {
  height: 25%;
  width: auto;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: brown;
  overflow: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
}

.sidebar a:hover {
  color: whitesmoke;
}

.main {
  margin-left: 300px; /* Same as the width of the sidenav */
  padding: 0px 30px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

    .form {
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>




<body>
<center><header  style=" align-content: center; text-align: center; font-family: Georgia, serif; font-size: 48px; text-shadow:1px 1px 3px black; color: brown; background-color: cornsilk; border: 3px solid chocolate; width:50%"> <img src="CoffeeLeaf.jpg" alt="" width="30" height="30" />Employee Panel<img src="CoffeeLeaf.jpg" alt="" width="30" height="30" /></header></center>

<?php
echo '<div class="sidebar">
      <a class="active" style = "border: 2px solid chocolate; background-color:white; color: brown" href="employee_welcome.php"><center><img src="CoffeeLeaf.jpg" alt="" width="30" height="30" />Luna Coffee<img src="CoffeeLeaf.jpg" alt="" width="30" height="30" /><br><img src="lgCoffeeIco.ico" alt="alt"/><br>Employee Home</center></a><br><br>
      <a href="employee_orders.php"><i class="fa fa-shopping-cart">&nbsp;&nbsp;&nbsp;</i>New Orders</a><br>
      <a href="employee_products.php"><i class="fa fa-coffee">&nbsp;&nbsp;&nbsp;</i>Edit Product</a><br>
      </div>';?>
</body>
</html>
