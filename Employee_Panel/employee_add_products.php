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
</style>
</head>


  <body>  
      
      <?php include 'employee_header.php';?>
      <br><br>
<blockquote>
        <form  action="" method ="post" class="form" enctype="multipart/form-data" style ="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%">
            <div class="add">
               <div class="clearfix">
               
                   <h1 style="text-align: center;font-size: 20px; color: white; background-color: brown; border: 2px solid #ffffff; width: auto">Add New Product</h1>
                    
                 <label>Product Name:&nbsp;&nbsp;&nbsp;</label><br>
                 <input type="text" name="p_name" placeholder="Enter Product Name" class="box" ><br><br>
             
                     
           
                 <label>Product Description:&nbsp;&nbsp;&nbsp;</label><br>
                 <textarea name="p_description" placeholder="Enter Product Description" class="box" rows="5" cols="30"></textarea><br><br>
         
                     
          
                 <label>Product Price:&nbsp;&nbsp;&nbsp;</label><br>
                 <input type="text" name="p_price" placeholder="Enter Product Price" class="box" ><br><br>
       
                     
      
                <label>Product Image:&nbsp;&nbsp;&nbsp;</label><br>
                 <input type="file" name="image_name" class="box" ><br><br>
   
              
                   <div class="clearfix">
                      <button type="submit" name="add_product"  class="button">Add Product</button><br><br> 
                   </div>
               </div>
                </div>
            </form>
    
    </blockquote>
                 <?php
       if(isset($_POST['submit'])){
                      
                    $p_name = $_POST['p_name']; 
                    $p_description=$_POST['p_description'];  
                    $p_price = $_POST['p_price'];
                    $image_name = $_FILES['image_name']['p_name'];
   
         if (isset($_FILES['image_name']['p_name'])){
                    
                    //gets image data
                    $image_name = $_FILES['image_name']['p_name'];
                    
                    //error handling for image
                    if ($image_name!= ""){
                        
                        //adds ending extention (.jpg, .gif etc)
                        $ext = end(explode('.',$image_name));
                           
                        //renames image file 
                        $image_name = "Product_Name-".rand(0000,9999).".".$ext; 

                        //source path of image
                        $src = $_FILES['image_name']['tmp_p_name'];

                        //destination path
                        $dstpth = "./Images/".$image_name;       

                        //upload image
                        $upload = move_uploaded_file($src, $dstpth);

                        //error handling
                        if($upload == false){
                            $_SESSION['upload'] = "<div class='error'>Image Upload Fail.</div>";
                            header("location: admin_products.php"); 
                            die();
                            }
                        }
                        }else
                        {
                            $image_name = "";
                        }
                   
           //Check input errors before inserting into product database
        //error handling
                        
                 $sql2 = "INSERT INTO products SET
                     image_name = '$image_name',
                     p_name = '$p_name',
                     p_description = '$p_description',
                     p_price = '$p_price'
                   ";

                 $res2 = mysql_query($conn, $sql2);

                 if ($res2 == true){
                     $_SESSION['addProduct'] = "<div class ='success'>Product successfully added.</div>";
                     header("location: admin_products.php");
                 }else{
                     $_SESSION['addProduct'] = "<div class ='error'>Product could not be added.</div>";
                     header("location: admin_products.php?error=FailedToAddProduct");
                 }
                }
  ?>
                <hr>
    <?php include "login_footer.php";?>
                
  </body>
</html>
