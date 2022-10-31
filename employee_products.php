<?php
require_once 'config.php';
session_start();
$p_name = $p_description = $p_price = $image_name = "";
$p_nameErr = $p_descriptionErr = $p_priceErr= $image_nameErr="";
//Process form data when form is submitted
 $image = array(
          '<img src="cafe_latte.jpg" alt="cafe_latte" width = "100" height= "100" class=rounded>',
          '<img src="irish_cream_breve.jpg" alt="irish_cream_breve" width="100" height="100" class=rounded>',
          '<img src="cappuccino.jpg" alt="cappuccino" width = "100" height= "100" class=rounded>',
          '<img src="mexi_mocha.jpg" alt="mexi_mocha" width = "100" height= "100" class=rounded>',
          '<img src="salted_caramel_mocha.jpg" alt="salted_caramel_mocha" width = "100" height= "100" class=rounded>')
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Employee Panel - Products</title>
   <link rel="stylesheet" href="homepage.css">
   <style>
    .form {
  margin-left: auto;
  margin-right: auto;
}
.btnAdd{
        background-color: brown;
        border: 2px solid white;
        color: white;
        padding: 20px 34px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
}
     
.btnAdd:hover{
    background-color: whitesmoke ;
    color: brown;
    border: brown 2px solid;
</style>
</head>




<body>

<?php include 'employee_header.php'; 

    ?>
    <br><br><br><br><br><br><br><br>
      
                      <center><a href="employee_add_products.php?id=<?php echo $id;?>" class="btnAdd" style="text-decoration:none">Add Product</a></center><br><br><br> 

                <div class="clearfix">
                                           <center><?php
                   if (isset($_SESSION['addnewProduct'])){
                           echo $_SESSION['addnewProduct'];
                           unset ($_SESSION['addnewProduct']);
                       }
                       
                       if (isset($_SESSION['updateProduct'])){
                           echo $_SESSION['updateProduct'];
                           unset ($_SESSION['updateProduct']);
                       }
                     ?></center> 
                </div>
                   
          
 
                <blockquote>
                    <div class="rows">
            <div class="column-Products" style="text-align: center">
            <table align="center" style="border: 3px solid white" class="Products"> <br>
                   <!-- form information -->
                   <tr>                   
                   <center><h1 style="text-align: center; font-size: 20px; text-shadow:1px 1px black; color: brown; background-color: white; border: 2px solid black; width: 50%">Company Products</h1></center>
                   </tr>
                   
                   <tr style="border: 3px solid white; background-color: brown; text-align: center; color: white; text-shadow: 1px 1px black" class="Products">
                   <th>Product<br>ID #</th>
                   
                   <th>Product<br>Image</th>
                  
                   <th>Product<br>Name</th>
                  
                   <th>Product<br>Description</th>
                   
                   <th>Product<br>Price</th>
                 
                   <th>Actions</th>
                  
                   </tr>
                   
                   <?php
         
                        $sql2 = "SELECT * FROM products";
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
              
                       <div class="clearfix">
                       <td style="text-shadow:1px 1px black; font-size: 12px; width:30%">
                           <a href="employee_edit_products.php?id=<?php echo $id;?>" class="button" style=" background-color: blue ;text-decoration:none">Edit Product</a>                           
                           <a href="employee_reorder.php?id=<?php echo $id;?>" class='button' style=" background-color: green ;text-decoration:none">Reorder Product</a>   
                       </td> 
                     </div>    
                   </tr>
                   
                                <?php
                                 
                            }
                        }   else{
                            
                        } 
                        }
                   
                   
                   
                   ?>
                   
               </div>
                </div>
            </table>
    </blockquote><br><br> <br><br><br><br><br><br><br><br>
    
    
    
                <?php include "login_footer.php";?>  
                
</body>
</html>