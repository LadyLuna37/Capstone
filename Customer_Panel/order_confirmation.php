
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
<html lang ="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name ="description" content ="Our Coffee is Heavenly!">
<title>Luna Coffee</title>
<link rel="stylesheet" href="homepage.css"/>
<script src="https://kit.fontawesome.com/9b44d189ed.js" crossorigin="anonymous"></script>
</head>


<body>
    
    <?php include 'confirmation_header.php';?>
    
<center><h1  style=" align-content: center; text-align: center; text-shadow:1px 1px 3px black; color: brown; background-color: cornsilk; border: 3px solid chocolate; width:50%"> <img src="CoffeeLeaf.jpg" alt="" width="30" height="30" />Order Summary<img src="CoffeeLeaf.jpg" alt="" width="30" height="30" /></h1></center>


           <?php
                        if ( isset($_SESSION["cart"]) ) {
                     ?>
            <div class="container" >
        <div class ="clearfix">    
            <div class="rows">
            <tr class="Product-info"style="border: 3px solid chocolate">
                <table align="center"style="text-align: center; border: 3px solid chocolate; background-color: white ; width:50%" class="Products">
                    <tr style="color:white; border:2px solid white; background-color:chocolate;text-shadow:1px 1px black">
                    <th>Your Items: </th>
                           
                   <th id="p_name">&nbsp;&nbsp;  Drink Name &nbsp;&nbsp; </th>
                  
                   <th id="p_price">&nbsp;&nbsp; Qty &nbsp;&nbsp; </th>
                   
                   <th id="cart">&nbsp;&nbsp;  Amount &nbsp;&nbsp; </th>
                       
                            </tr>
                            
                            <?php
                            $total = 0;
                            foreach ( $_SESSION["cart"] as $i ) {
                            ?>
                            
                            <tr style="background-color:cornsilk">
                             <td><?php echo  $image[$_SESSION["cart"][$i]]; ?></td>
                           
                            <td><?php echo $products[$_SESSION["cart"][$i]] ; ?></td>
                           
                            <td><?php echo $_SESSION["qty"][$i] ; ?></td>
                           
                            <td><?php echo $_SESSION["amounts"][$i] ; ?></td>
                            
                           
                            </tr>
            </div>
                            <?php
                            $total = $total + $_SESSION["amounts"][$i];
                            }
                            $_SESSION["total"] = $total;
                            ?>
                           
                            <tr>
                              
                            <td colspan="4"style="border:2px solid black"><strong style="font-family:copperplate; font-size: 25px ;width:100%">TOTAL: $<?php echo($total); ?></strong></td>
                       
                           </tr>
                          
                        
                    </table>
                </tr>
            </div>
            </div>
</div>
<br><br>
       <?php echo '<center><strong><h2 align="center" style ="width:50%; color:chocolate; background-color:white; border:2px solid #a0785a; text-shadow: 2px 2px 4px black">PAYMENT DUE AT PICK-UP!</h2></strong></center>';?>


<br><br>
                    <?php
                        }
                    ?>
                  
            </div>   
            <?php include 'login_footer.php';?>
</body>
</html>
