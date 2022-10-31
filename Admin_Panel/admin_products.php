<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Admin Panel - Products</title>
   <link rel="stylesheet" href="homepage.css">
   <style>
 .form {
  margin-left: auto;
  margin-right: auto;
}
 
.btnEdit{
    background-color: blue ;
   padding:  5px 10px;
    color: white;
    text-decoration: none;
    font-weight: bold;
     font-size: 16px;
   border: #ffffff 2px solid;
  margin: 8px 0;
  cursor: pointer;
 width: auto;
  height: auto;
}

.btnEdit:hover{
    background-color: green ;
}

.btnDelete{
      background-color: black ;
   padding:  5px 20px;
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 16px;
   border: #ffffff 2px solid;
  margin: 8px 0;
  cursor: pointer;
  width: auto;
  height: auto;
}

.btnDelete:hover{
    background-color: yellow ;
    color: black;
}
.database_success{
    color: black;
    background-color:white;
    border: 2px solid black;
    text-shadow: 1px 1px green;
    width:30%;
}

.database_error{
   color: black;
    background-color:white;
    border: 2px solid black;
    text-shadow: 1px 1px #ff6348;
    width:30%;
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
}
</style>
</head>

<body>

<?php include 'admin_header.php'; 

    ?>
    
       <center><a href="admin_add_products.php?id=<?php echo $id;?>" class="btnAdd" style="text-decoration:none">Add New Product</a></center><br><br><br> 

         <div class="clearfix">
                     <center><?php
                   if (isset($_SESSION['addnewProduct'])){
                           echo $_SESSION['addnewProduct'];
                           unset ($_SESSION['addnewProduct']);
                       }
                       
                        if (isset($_SESSION['deleteProduct'])){
                           echo $_SESSION['deleteProduct'];
                           unset ($_SESSION['deleteProduct']);
                       }
                       if (isset($_SESSION['updateProduct'])){
                           echo $_SESSION['updateProduct'];
                           unset ($_SESSION['updateProduct']);
                       }
                     ?></center> 
                </div>
                <!-- add product form -->
            <blockquote>
                    <div class="rows">
            <div class="column-Products" style="text-align: center">
            <table align="center" style="border: 3px solid white" class="Products"> <br>
                   <!-- form information -->
                 <div class="clearfix">  
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
                            
                            $count2 = mysqli_num_rows($res2);
                            $p_id = 1;
                        if ($count2>0){
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
                           <a href="admin_edit_product.php?id=<?php echo $id;?>" class="btnEdit" style="text-decoration:none">Edit Product</a>                           
                           <a href="admin_delete_product.php?id=<?php echo $id;?>" class='btnDelete' style="text-decoration:none">Delete Product</a>   
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
          
            </table>
                </div>
                    </div>
    </blockquote><br><br> <br><br><br><br><br><br>
    
                <?php include "login_footer.php";?>  
                
</body>
</html>
