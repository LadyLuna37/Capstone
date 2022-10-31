<?php
include 'config.php';
session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Admin Panel - Add Products</title>
   <link rel="stylesheet" href="homepage.css">
   <style>
    .form {
  margin-left: auto;
  margin-right: auto;
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
  color: #ffffff;
  padding:  10px 18px;
  margin: 8px 0;
  border: #ffffff 2px solid;
  cursor: pointer;
  width: auto;
}

.btnAdd:hover{
    background-color: whitesmoke ;
    color: brown;
    border: brown 2px solid;
</style>
</head>


  <body>  
      <!-- admin add header  --> 
      <?php include 'admin_header.php';?>
      
                        <div class="clearfix">
                            <center> <?php 
                        if (isset($_SESSION['uploadProduct'])){
                          echo $_SESSION['uploadProduct'];
                          unset ($_SESSION['uploadProduct']);
                          }
                        ?></center>
                        </div>

   <blockquote>
       <!-- admin add product form  --> 
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method ="POST" class="form" enctype="multipart/form-data" style ="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%">
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
                       <button type="submit" name="addnewProduct">Add Product</button><br><br> 
                   </div>
               </div>
                </div>
            </form>
    </blockquote>
              <!-- admin add products database  --> 
        
        <?php

       if(isset($_POST['addnewProduct'])){
                    $id = $_POST['id'];
                    $p_name = $_POST['p_name']; 
                    $p_description=$_POST['p_description'];  
                    $p_price = $_POST['p_price'];
                    $image_name = $_POST['image_name'];
                 
   
         if (isset($_FILES['image_name']['name'])){
                    
                    //gets image data
                    $image_name = $_FILES['image_name']['name'];
                    
                    //error handling for image
                   if ($image_name!= ""){
                        
                        //adds ending extention (.jpg, .gif etc)
                       $image_info = explode(".", $image_name);
                       $ext=end($image_info);
                           
                        //renames image file 
                        $image_name = "NEW_PRODUCT-".rand(0000,9999).".".$ext; 

                        //source path of image
                        $src = $_FILES['image_name']['tmp_name'];

                        //destination path
                        $dst = "../images/".$image_name;       

                        //upload image
                        $upload = move_uploaded_file($src, $dst);
                        }
                        //error handling
                        if($upload == false){
                            
                            $_SESSION['uploadProduct'] = "<div class='database_error'>Image Upload Fail.</div>";
                            header("location: admin_products.php"); 
                            die();
                            }
                       
                        }else
                        {
                            $image_name = "";
                        }
                   
           //Check input errors before inserting into product database
        //error handling
                        
                 $sql2 = "INSERT INTO products (image_name, p_name, p_description, p_price) VALUES ('$image_name','$p_name','$p_description','$p_price')";

                 $res2 = mysql_query($conn, $sql2);

                 if ($res2 == true){
                     $_SESSION['addProduct'] = "<div class ='database_success'>Product successfully added.</div>";
                     header("location: admin_products.php");
                 }else{
                     $_SESSION['addProduct'] = "<div class ='database_error'>Product could not be added.</div>";
                     header("location: admin_products.php");
                 }
                }
 
  ?>  
            <!-- admin footer  -->    
        <?php include "login_footer.php";?>      
</body>
</html>