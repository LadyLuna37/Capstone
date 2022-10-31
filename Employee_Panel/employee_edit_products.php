 <?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Employee Panel - Edit Products</title>
   <link rel="stylesheet" href="homepage.css">
   <style>
    .form {
  margin-left: auto;
  margin-right: auto;
}
   
.btnEdit{
    background-color: blue ;
   padding:  5px 20px;
    color: white;
    text-decoration: none;
    font-weight: bold;
   border: #ffffff 2px solid;
  margin: 8px 0;
  cursor: pointer;
  width: auto;
}

.btnEdit:hover{
    background-color: green ;
}

.btnDelete{
      background-color: black ;
   padding:  5px 10px;
    color: white;
    text-decoration: none;
    font-weight: bold;
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
    <?php include "employee_header.php";?>

    <br>
    <br>
    <?php
      $id=$_GET['id'];

                     $sql2 = "SELECT * FROM products WHERE id=$id";

                     $res2 = mysqli_query($conn, $sql2);

                     if($res2 == true){
                         $count2 = mysqli_num_rows($res2);

                         if ($count2==1){
                             $rows = mysqli_fetch_assoc($res2);
                                $id=$rows['id'];
                                $image_name=$rows['image_name'];
                                $p_name=$rows['p_name'];
                                $p_description=$rows['p_description'];
                                $p_price = $rows['p_price'];
                         }
                         else
                         {
                         header("location: admin_products.php");
                         }
                     }?>
    <blockquote>
        <form  action="" method ="post" class="form" style ="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%">
            <div class="add">
               <div class="clearfix">
               
                   <p style="text-align: center;color: white; font-size: 25px; background-color: brown; border: 2px solid #ffffff; width: auto">Edit Products</p>
                    <center><?php 
                   if (isset($_SESSION['updateProduct'])){
                           echo $_SESSION['updateProduct'];
                           unset ($_SESSION['updateProduct']);
                       }
                  ?></center>
                   <!-- form information -->
                  <label>Product Name:&nbsp;&nbsp;&nbsp;</label><br>
                  <input type="text" name="p_name" value="<?php echo $p_name;?>"><br><br>
                  
                  <label>Product Description:&nbsp;&nbsp;&nbsp;</label><br>
                  <input type="text" style="width:75%" name="p_description"  value="<?php echo $p_description;?>"><br><br>
                  
                 <label>Product Price:&nbsp;&nbsp;&nbsp;</label><br>
                 <input type="text" name="p_price"  value="<?php echo $p_price;?>" ><br><br>
                 
                 <label>Product Image:&nbsp;&nbsp;&nbsp;</label><br>
                 <input type="file" name="image_name"><br><br>

                   <div class="clearfix">
                      <input type="hidden" name="id" value ="<?php echo $id;?>">
                       <input type="submit" name="submit" class="button"  value="Update Product"> <br><br>
                </div>
               </div>
                </div>
            </form><br><br>
    </blockquote>
   <?php
   if (isset($_POST['submit'])){
        $id = $_POST['id'];
        $p_name = $_POST['p_name']; 
        $p_description=$_POST['p_description'];  
        $p_price = $_POST['p_price'];
        $image_name = $_POST['image_name'];               
     
     $sql2 = "UPDATE products SET  p_name ='$p_name', p_description = '$p_description', p_price = '$p_price' WHERE id='$id'";
     
     $res2 = mysqli_query($conn, $sql2);
     
     if ($res2==true){
        $_SESSION['updateProduct'] = '<div class="database_success">Product '.$id.' has been successfully updated.</div>';
        header("location:admin_products.php");
     }else{
        $_SESSION['updateProduct'] = '<div class="database_error">Product '.$id.' was not updated.</div>';
         header("location: admin_edit_product.php");
     }
   }
    
   
   ?>
   
 <?php include 'login_footer.php';?>

</body>
 <
