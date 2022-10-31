<?php
include 'config.php';
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

    
$vid= $v_id = $v_name = $v_location = $v_street = $v_city = $v_state = $v_zip = $v_category ="";
$v_nameErr = $v_locationErr = $v_streetErr = $v_cityErr = $v_stateErr = $v_zipErr = $v_categoryErr ="";
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Admin Panel - Welcome</title>
   <link rel="stylesheet" href="homepage.css">
</head>




<body>
<?php include 'admin_header.php';?>
    
    <!-- display current users -->

   <blockquote>
                    <div class="rows">
            <div class="column-Products" style="text-align: center">
            <table align="center" style="border: 3px solid white; width: 60%" class="Products"> 
                   <!-- form information -->
                   <tr>                   
                   <center><h1 style="text-align: center; font-size: 20px; text-shadow:1px 1px black; color: brown; background-color: white; border: 2px solid black; width: 50%">Company Users</h1></center>
                   </tr>
                   <tr style="border: 3px solid white; background-color: brown; text-align: center; color: white; text-shadow: 1px 1px black" class="Products">
                   <th id="id">Company<br>ID #</th>
                   <th id="name">Employee<br>Name</th>
                   <th id="username">Employee<br>Usernames</th>
                   <th id="role">Company<br>Role</th>
                   </tr>
                   
                   <?php
         
                        $sql = "SELECT * FROM users WHERE role = 'administrator' OR role = 'employee' ORDER BY role ASC";
                        $res = mysqli_query($conn, $sql);
                        
                        if($res == true){
                            
                            $count = mysqli_num_rows($res);
                            $uid = 1;
                        if ($count>0){
                            while ($rows = mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $name=$rows['name'];
                                $username=$rows['username'];
                                $role = $rows['role'];
                    ?>  
                              
                        <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white">
                       <td><?php echo $uid++ ;?></td>
                     
                       <td style="text-shadow:1px 1px black"><?php echo $name ;?></td> 
                     
                       <td style="text-shadow:1px 1px black"><?php echo $username ;?></td> 
            
                       <td style="text-shadow:1px 1px black"><?php echo $role ;?></td> 
              
                       
                   </tr>
                                <?php 
                            }
                        }   
                        } 
                   ?>
            </table> <br><br> 
   
    <!-- display current vendors -->
            <table align="center" style="border: 3px solid white" class="Products">
                   <!-- form information -->
                   <tr>                   
                   <center><h1 style="text-align: center; font-size: 20px; text-shadow:1px 1px black; color: brown; background-color: white; border: 2px solid black; width: 50%">Company Vendors</h1></center>
                   </tr>
                   
                   <tr style="border: 3px solid white; background-color: brown; text-align: center; color: white; text-shadow: 1px 1px black" class="Products">
                   <th id="v_id">Vendor<br>ID #</th>
                   <th id="v_name">Vendor<br>Name </th>
                   <th id="v_address">Vendor<br>Address</th>
                   <th id="v_phone">Vendor<br>Phone Number</th>
                   <th id="v_category">Vendor<br>Category</th>
                   </tr>
                   
                   <?php
         
                        $sql1 = "SELECT * FROM vendors ORDER BY v_name ASC";
                        $res1 = mysqli_query($conn, $sql1);
                        
                        if($res1 == true){
                            
                            $count = mysqli_num_rows($res1);
                            $v_id = 1;
                        if ($count>0){
                            while ($rows = mysqli_fetch_assoc($res1)){
                                $vid=$rows['vid'];
                                $v_name=$rows['v_name'];
                                $v_street=$rows['v_street'];
                                $v_city = $rows['v_city'];
                                $v_state = $rows['v_state'];
                                $v_zip = $rows['v_zip'];
                                $v_phone=$rows['v_phone'];
                                $v_category = $rows['v_category'];
                                    
                            ?>  
                              
                        <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white; font-size: 18px">
                       <td><?php echo $v_id++ ;?></td>
                     
                       <td style="text-shadow:1px 1px black; font-size: 18px"><?php echo $v_name ;?></td> 
                     
                       <td style="text-shadow:1px 1px black; font-size: 18px"><?php echo $v_street,'<br>',$v_city,'<br>',$v_state,'<br>',$v_zip ;?></td>
                     
            
                       <td style="text-shadow:1px 1px black; font-size: 18px"><?php echo $v_phone ;?></td> 
                       
                       <td style="text-shadow:1px 1px black; font-size: 18px"><?php echo $v_category ;?></td> 
                        </tr>
                            <?php
                            }
                            }   
                            }
                             ?>
            </table>
    <br><br>
 
 
    <!-- display current products -->

        
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
                   
                   <?php
         
                        $sql2 = "SELECT * FROM products ORDER BY p_name ASC";
                        $res2 = mysqli_query($conn, $sql2);
                        
                        if($res2 == true){
                            
                            $count = mysqli_num_rows($res2);
                            $p_id = 1;
                        if ($count>0){
                            while ($rows = mysqli_fetch_assoc($res2)){
                                $p_id=$rows['p_id'];
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
       <br><br><br><br><br><br> <br><br><br><br><br><br>  <br><br><br><br><br><br>             

    </blockquote>
    
    
    
    
<?php include 'login_footer.php';?>


</body>
</html>