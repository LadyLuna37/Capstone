 <?php
include 'config.php';
// Initialize the session
session_start();

//Define the products and cost

$image = array(
          '<img src="cafe_latte.jpg" alt="cafe_latte" width = "100" height= "100" class=rounded>',
          '<img src="irish_cream_breve.jpg" alt="irish_cream_breve" width="100" height="100" class=rounded>',
          '<img src="cappuccino.jpg" alt="cappuccino" width = "100" height= "100" class=rounded>',
          '<img src="mexi_mocha.jpg" alt="mexi_mocha" width = "100" height= "100" class=rounded>',
          '<img src="salted_caramel_mocha.jpg" alt="salted_caramel_mocha" width = "100" height= "100" class=rounded>'
            );

$p_name = array("Cafe Latte", "Irish Cream Breve", "Cappuccino","Mexi-Mocha Latte", "Salted Caramel Mocha Latte");
$description = array(
            "Dark roast espresso topped with steamed milk",
            "Irish cream syrup, espresso with half and half",
            "Espresso, Steamed milk, and a silky layer of foam",
            "Classic Mexican chocolate powder, espresso, and steamed milk",
            "Dark Espresso, Rich chocolate, and sweet salted caramel drizzle");
$amounts = array("3.99", "5.99", "4.99","6.99", "5.99");

//Load up session
 if ( !isset($_SESSION["total"]) ) {
   $_SESSION["total"] = 0;
   for ($i=0; $i< count($products); $i++) {
    $_SESSION["qty"][$i] = 0;
   $_SESSION["amounts"][$i] = 0;
  }
 }

 //---------------------------
 //Reset
 if ( isset($_GET['reset']) )
 {
 if ($_GET["reset"] == 'true')
   {
   unset($_SESSION["qty"]); //The quantity for each product
   unset($_SESSION["amounts"]); //The amount from each product
   unset($_SESSION["total"]); //The total cost
   unset($_SESSION["cart"]); //Which item has been chosen
   }
 }

 //---------------------------
 //Add
 if ( isset($_GET["add"]) )
   {
   $i = $_GET["add"];
   $qty = $_SESSION["qty"][$i] + 1;
   $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
   $_SESSION["cart"][$i] = $i;
   $_SESSION["qty"][$i] = $qty;
 }

  //---------------------------
  //Delete
  if ( isset($_GET["delete"]) )
   {
   $i = $_GET["delete"];
   $qty = $_SESSION["qty"][$i];
   $qty--;
   $_SESSION["qty"][$i] = $qty;
   //remove item if quantity is zero
   if ($qty == 0) {
    $_SESSION["amounts"][$i] = 0;
    unset($_SESSION["cart"][$i]);
  }
 else
  {
   $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
  }
 }
 ?>

<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name ="description" content ="Our Coffee is Heavenly!">
<title>Luna Coffee - Welcome</title>
<link rel="stylesheet" href="homepage.css"/>
<script src="https://kit.fontawesome.com/9b44d189ed.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include "customer_header.php";?>
 
    <center><strong><h1 align="center" style =" width: 50%; color:chocolate; background-color:white; border:2px solid #a0785a; text-shadow: 2px 2px 4px black">Our Heavenly Coffee Selection</strong></h1></center><br><br>
     
    <table align="center" style="border: 3px solid white" class="Products"> 
                <tr style="border: 3px solid white; background-color: brown; text-align: center; color: white; text-shadow: 1px 1px black" class="Products">
               <th id="image_name"></th>
                  
                   <th id="p_name">&nbsp;&nbsp;  Drink Name &nbsp;&nbsp; </th>
                  
                   <th id="p_description">&nbsp;&nbsp;  Description &nbsp;&nbsp; </th>
                   
                   <th id="p_price">&nbsp;&nbsp;  Price &nbsp;&nbsp; </th>
                   
                   <th id="cart">&nbsp;&nbsp;  Add To Cart &nbsp;&nbsp; </th>
                </tr>
              <?php
              for ($i=0; $i< count($p_name); $i++) {
                ?>
                <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white">
                     <td><?php echo($image[$i]); ?></td>
                <td><?php echo($p_name[$i]); ?></td>
                <td><?php echo($description[$i]); ?></td>
                <td><?php echo($amounts[$i]); ?></td>
                <td><a href="?add=<?php echo($i); ?>"><img src="Add_Cart.ico" alt="alt"style="border:3px solid brown; background-color:white" class="button"/></a></td>
                </tr>
                <?php
              }
              ?>
              <tr>
              <td colspan="5"></td>
              </tr>
              </table>
              <?php
              if ( isset($_SESSION["cart"]) ) {
              ?>
 <br/><br/><br/>
 
 
 <div class="container" >
        <div class ="clearfix">    
            <div class="rows">
            <tr class="Product-info"style="border: 3px solid chocolate">
                <table align="center"style="text-align: center; border: 3px solid chocolate" class="Products">
                    <tr style="border: 3px solid white; background-color: brown; text-align: center; color: white; text-shadow: 1px 1px black">
                    <th style="color:white; border:2px solid white; background-color:chocolate;text-shadow:1px 1px black">Cart</th>
                    
                   <th id="p_name">&nbsp;&nbsp;  Drink Name &nbsp;&nbsp; </th>
                  
                   <th id="p_price">&nbsp;&nbsp; Qty &nbsp;&nbsp; </th>
                   
                   <th id="cart">&nbsp;&nbsp;  Amount &nbsp;&nbsp; </th>
                   <th id="cart">&nbsp;&nbsp;  Remove From Cart &nbsp;&nbsp; </th>
                    </tr>
                    <?php
                    $total = 0;
                    foreach ( $_SESSION["cart"] as $i ) {
                    ?>
                    <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white">
                    <td><?php echo( $image[$_SESSION["cart"][$i]] ); ?></td>
                    
                    <td><?php echo( $p_name[$_SESSION["cart"][$i]] ); ?></td>
                 
                    <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                  
                    <td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
                  
                    <td><a href="?delete=<?php echo($i); ?>"><img src="Delete.ico" alt="alt"style="border:3px solid brown; background-color:white" class="button"/></a></td>
                    </tr>
                    
                    <?php
                    $total = $total + $_SESSION["amounts"][$i];
                    }
                    $_SESSION["total"] = $total;
                    ?>
                    
                   
                        <tr class="table-bottom" style="background-color: white"> 
                        <div class="clearfix">
                        <td colspan="3"style="border:2px solid black"><strong style="font-family:copperplate; font-size: 25px">TOTAL: $<?php echo($total); ?></strong></td>
                        <td><a href="?reset=true" class="btnAdd" style="font-size: 16px; text-decoration: none">Reset Cart</a></td>
                        <td><a href="order_confirmation.php" class="btnAdd" style="font-size: 16px; text-decoration: none">Place Order</a></td>
                        </div>
                        </tr>
                  
                    
                    </table>
            </div>
        </div>
 </div>
 
                    <?php
                    }
                    ?>
    
            <br><br><br><br><br><br><br><br><br><br>
            
<?php include "login_footer.php";?>
    
</body>
</html>