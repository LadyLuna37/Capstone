 <?php
require_once 'config.php';
// Initialize the session
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
 $username= $_POST['username'];
  $query = "Select * from users where username='$username'";
    $result = mysqli_query($conn, $query);
    $count= mysqli_num_rows($result);
    if ($count>0)
    {
        session_start();
        $_SESSION["loggedin"]= true;
        $_SESSION["username"] = $username;
       
    }
}
//Define the products and info
$image = array(
          '<img src="cafe_latte.jpg" alt="cafe_latte" width = "100" height= "100" class=rounded>',
          '<img src="irish_cream_breve.jpg" alt="irish_cream_breve" width="100" height="100" class=rounded>',
          '<img src="cappuccino.jpg" alt="cappuccino" width = "100" height= "100" class=rounded>',
          '<img src="mexi_mocha.jpg" alt="mexi_mocha" width = "100" height= "100" class=rounded>',
          '<img src="salted_caramel_mocha.jpg" alt="salted_caramel_mocha" width = "100" height= "100" class=rounded>'
            );

$products = array("Cafe Latte", "Irish Cream Breve", "Cappuccino","Mexi-Mocha Latte", "Salted Caramel Mocha Latte");
$description = array(
            "Dark roast espresso topped with steamed milk",
            "Irish cream syrup, espresso with half and half",
            "Espresso, Steamed milk, and a silky layer of foam",
            "Classic Mexican chocolate powder, espresso, and steamed milk",
            "Dark Espresso, Rich chocolate, and sweet salted caramel drizzle");
$amounts = array("3.99", "5.99", "4.99","6.99", "5.99");?>
<?php
//Load up session
 if ( !isset($_SESSION["total"]) ) {
   $_SESSION["total"] = 0;
   for ($i=0; $i< count($products); $i++) {
    $_SESSION["qty"][$i] = 0;
   $_SESSION["amounts"][$i] = 0;
  }
 }
 //Reset

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
  if ( isset($_GET['reset']))
 {
 if ($_GET["reset"] == true)
   {
   unset($_SESSION["qty"]); //The quantity for each product
   unset($_SESSION["amounts"]); //The amount from each product
   unset($_SESSION["total"]); //The total cost
   unset($_SESSION["cart"]); //Which item has been chosen
   }
 }
 ?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <style type="text/css">
        
        #aid{
            border 2px solid chocolate;
        }

    </style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name ="description" content ="Our Coffee is Heavenly!">
<title>Luna Coffee</title>
<link rel="stylesheet" href="homepage.css"/>
<script src="https://kit.fontawesome.com/9b44d189ed.js" crossorigin="anonymous"></script>
</head>


<body>
<?php include "customer_header.php";?>

    <?php echo '<strong><h1 align="center" style ="color:chocolate; background-color:white; border:2px solid #a0785a; text-shadow: 2px 2px 4px black">Our Heavenly Coffee Selection</strong>';?>
   
<!-- product information -->
  
<div class="container" >
        <div class ="clearfix">    
        <div class="rows">
            <div class="column-Products" style="text-align: center">
            <table align="center"style="border: 3px solid chocolate; background-color: white" class="Products"> <br>
            <tr class="Product-info"style="border: 3px solid chocolate">
                <th> </th> 
               
                <th><u>Drink Name</u></th>
                
                <th><u>Description</u></th>
              
                <th><u>Price</u></th>
                
                <th><u>Add to Cart</u></th>
                
        <?php
         for ($i=0; $i< count($products); $i++) {
           ?>
           <tr style="background-color:cornsilk">
           <td><?php echo $image[$i]; ?> </td> 
          
           <td><?php echo $products[$i]; ?></td>
          
           <td><?php echo $description[$i]; ?></td>
         
           <td><?php echo $amounts[$i]; ?></td>
        
           <td><a  href="?add=<?php echo $i; ?>"><img src="Add_Cart.ico" alt="alt"style="border:3px solid brown"/></a></td>
           </tr>
           <?php
            }
            ?>
            </table>
            </div>
         </div>
        </div>
    <br><br>    

   <?php
                        if ( isset($_SESSION["cart"]) ) {
                     ?>
            <div class="container" >
        <div class ="clearfix">    
            <div class="rows">
            <tr class="Product-info"style="border: 3px solid chocolate">
                <table align="center"style="text-align: center; border: 3px solid chocolate; background-color: white" class="Products">
                    <tr>
                    <th style="color:white; border:2px solid white; background-color:chocolate;text-shadow:1px 1px black">Cart</th>
                           
                            <th id="product"> Product  </th>
                           
                            <th id="qty"> Qty  </th>
                          
                            <th id="amount"> Amount  </th>
                        
                            <th id="remove"> Remove Item </th>
                            </tr>
                            
                            <?php
                            $total = 0;
                            foreach ( $_SESSION["cart"] as $i ) {
                            ?>
                            
                            <tr style="background-color:cornsilk">
                             <td><?php echo $image[$_SESSION["cart"][$i]] ; ?></td>
                           
                            <td><?php echo $products[$_SESSION["cart"][$i]] ; ?></td>
                           
                            <td><?php echo $_SESSION["qty"][$i] ; ?></td>
                           
                            <td><?php echo $_SESSION["amounts"][$i] ; ?></td>
                          
                            <td><a href="?delete=<?php echo $i; ?>"><img src="Delete.ico" alt="alt" style="border:3px solid chocolate" class="button" onclick="Delete()"/></a></td>
                            <script>
                               function Delete() {
                        var ask = window.confirm("Are you sure you want to delete item?");
                        if (ask) {
                            window.alert("Item successfully deleted!");

                            window.location.href = "?delete=<?php echo $i; ?>";

                        }
                        }
                            </script>
                            
                            
                            </tr>
            </div>
                            <?php
                            $total = $total + $_SESSION["amounts"][$i];
                            }
                            $_SESSION["total"] = $total;
                            ?>
                           
                            <center><tr class="table-bottom">
                                    <td colspan="3"style="border:2px solid black"><strong style="font-family:copperplate; font-size: 25px">TOTAL: $<?php echo($total); ?></strong></td>
                                    <td><a href="?reset=true" id="aid" style="border 2px solid chocolate" class="button" onClick="reset()"><button>EMPTY CART</button></a></td>
                        <td><button style="border 2px solid chocolate" class="checkout_cart" onClick="Confirm()">CONFIRM ORDER!</a></button></td>
                        
                        <script>
                               function reset() {
                        var ask = window.confirm("Are you sure you want to empty your cart?");
                        if (ask) {
                            window.alert("Cart successfully emptied!");

                            window.location.href = "?reset=true";

                        }
                        }   
                        
                        function Confirm(){
                            var ask = window.confirm("Are you sure your order is complete?");
                            if (ask){
                                window.alert("ORDER COMPLETE!!");
                                window.location.href ="order_confirmation.php";
                            }
                           
                        }
                        </script>
                                
                                </tr></center>
                        
                    </table>
                </tr>
            </div>
            </div>
</div>
<br><br><br><br>
                    <?php
                        }
                    ?>
                  
            </div>
     
    <br/><br/><br/>
    
        
  

<?php include "login_footer.php";?>
    
</body>
</html>









