
<?php

session_start();

$donation = "";
require 'config.php';
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee  - Order Cancelled</title>
   <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <?php include 'customer_header.php';?>
    
<center><h1 style=" align-content: center; text-align: center; font-family: Georgia, serif; font-size: 20px; text-shadow:1px 1px 3px black; color: brown; background-color: white; border: 3px solid chocolate; width:50%">Your Order Has Been Cancelled!<br>Please contact us about your order!<br>We are sorry for the inconvenience !</h1></center>

<?php
                        if ( isset($_SESSION["cart"]) ) {
                     ?>
            <div class="container" >
        <div class ="clearfix">    
            <div class="rows">
            <tr class="Product-info" style="border: 3px solid chocolate">
                <table align="center" style="text-align: center; border: 3px solid chocolate; width:50%" class="Products">
                    <tr style="color:white; border:2px solid white; background-color:brown;text-shadow:1px 1px black">
                    <th>Your Items: </th>
                           
                            <th id="product"> Product  </th>
                           
                            <th id="qty"> Qty  </th>
                          
                            <th id="amount"> Amount  </th>
                       
                            </tr>
                            
                            <?php
                            $total = 0;
                            foreach ( $_SESSION["cart"] as $i ) {
                            ?>
                            
                            <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white">
                             <td><?php echo  $image[$_SESSION["cart"][$i]]; ?></td>
                           
                            <td><?php echo $products[$_SESSION["cart"][$i]] ; ?></td>
                           
                            <td><?php echo $_SESSION["qty"][$i] ; ?></td>
                           
                            <td><?php echo $_SESSION["amounts"][$i] ; ?></td>
                            
                           
                            </tr>
           
                            <?php
                            $total = $total + $_SESSION["amounts"][$i];
                            }
                            $_SESSION["total"] = $total;
                            ?>
                           
                        <tr class="table-bottom" style="background-color: white"> 
                        <div class="clearfix">
                        <td colspan="1"style="border:2px solid black"><strong style="font-family:copperplate; font-size: 25px">TOTAL: $<?php echo($total); ?></strong></td>
                        </div>
                        </tr>
                          
                    </table>
               
            </div>
            </div>
</div>
<?php
                        }
    ?>
<br><br>
   
<br><br>
        
<?php include "login_footer.php";?>  
                
</body>
</html>