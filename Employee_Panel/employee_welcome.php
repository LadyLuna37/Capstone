<?php
require_once 'config.php';
session_start();


      if (isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset ($_SESSION['upload']);
        }
        
          if (isset($_SESSION['add_product'])){
        echo $_SESSION['add_product'];
        unset ($_SESSION['add_product']);
        }

$name = $username = $password = $role ="";
$nameErr = $usernameErr = $passwordErr = $roleErr = "";

    
$v_name = $v_location = $v_street = $v_city = $v_state = $v_zip = $v_category ="";
$v_nameErr = $v_locationErr = $v_streetErr = $v_cityErr = $v_stateErr = $v_zipErr = $v_categoryErr ="";
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Employee Panel - Welcome</title>
   <link rel="stylesheet" href="homepage.css">
   <style>
    .form {
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>




<body>
<?php include 'employee_header.php'; ?>

    <!-- display current products -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
        
            <table align="center" style="border: 3px solid white" class="Products"> 
                   <!-- form information -->
                   <tr>                   
                       <center><h1 style="text-align: center; font-size: 20px; text-shadow:1px 1px black; color: brown; background-color: white; border: 2px solid black; width: 40%">Company Products</h1></center>
                   </tr>
                   
                   <tr style="border: 3px solid white; background-color: brown; text-align: center; color: white; text-shadow: 1px 1px black" class="Products">
                   <th id="p_id">Product<br>ID #</th>
                   
                   <th id="image_name">Product<br>Image</th>
                  
                   <th id="p_name">Product<br>Name</th>
                  
                   <th id="p_description">Product<br>Description</th>
                   
                   <th id="p_price">Product<br>Price</th>
                   </tr>
                   <img src="cappuccino.jpg" alt="cappuccino" width = "100" height= "100" class=rounded>
                   <?php
         
                        $sql2 = "SELECT * FROM products ORDER BY p_name ASC";
                        $res2 = mysqli_query($conn, $sql2);
                        
                        if($res2 == true){
                           
                            $count = mysqli_num_rows($res2);
                            $p_id = 1;
                        if ($count>0){
                            while ($rows = mysqli_fetch_assoc($res2)){
                                $id=$rows['id'];
                                $image_name=$rows['image_name'];
                                $p_name=$rows['p_name'];
                                $p_description=$rows['p_description'];
                                $p_price = $rows['p_price'];
                    ?>  
                              
                        <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white">
                       <td><?php echo $p_id++ ;?></td>
                       
                       <td style="text-shadow:1px 1px black"><?php echo $image_name ;?></td> 
                     
                       <td style="text-shadow:1px 1px black"><?php echo $p_name ;?></td> 
                     
                       <td style="text-shadow:1px 1px black"><?php echo $p_description ;?></td> 
            
                       <td style="text-shadow:1px 1px black"><?php echo $p_price ;?></td> 
                        </tr>
                   
                    <?php      
                        }
                        }  
                      
                        }
                    ?>
                   
               </div>
            </div>
            </table>
       <br><br><br><br><br><br>            

    </blockquote>
    
    
    
<?php include "login_footer.php";?>
</body>
</html>
