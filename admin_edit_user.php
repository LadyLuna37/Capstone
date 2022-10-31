<?php include 'config.php';
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Admin Panel - Edit Users</title>
   <link rel="stylesheet" href="homepage.css">
   <style>
    .form {
  margin-left: auto;
  margin-right: auto;
}
.database_success{
    color: brown;
    background-color:cornsilk;
    border: 2px solid brown;
    text-shadow: 1px 1px black;
    width:100%;
}

.database_error{
   color: black;
    background-color:cornsilk;
    border: 2px solid black;
    text-shadow: 1px 1px #ff6348;
    width:100%;
}
.button {
  background-color: brown;
  color: #ffffff;
  padding:  10px 18px;
  margin: 8px 0;
  border: #ffffff 2px solid;
  cursor: pointer;
  width: auto;

}
</style>
</head>


<?php include 'admin_header.php'; ?>

<body>

 
  <?php
      $id=$_GET['id'];

                     $sql = "SELECT * FROM users WHERE id=$id";

                     $res = mysqli_query($conn, $sql);

                     if($res == true){
                         $count = mysqli_num_rows($res);

                         if ($count==1){
                             $row = mysqli_fetch_assoc($res);
                             $name = $row['name'];
                             $username = $row['username'];
                             $role = $row['role'];
                         }
                         else
                         {
                         header("location: admin_users.php");
                         }
                     }?>

                <!-- add admin form -->
 <blockquote>
      
        <form  action="" method ="POST" class="form" style ="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%">
             
                <h1 style="text-align: center;font-size: 20px; color: white; background-color: brown; border: 2px solid #ffffff; width: auto">Edit Existing User</h1>
                  <center><?php 
                   if (isset($_SESSION['update'])){
                           echo $_SESSION['update'];
                           unset ($_SESSION['update']);
                       }
                  ?></center>
               <div class="clearfix">
                   <!-- form information -->
                    <label ><b>Full Name: </b></label><br/>
                    <input type="text" name="name"  value="<?php echo $name;?>"><br/><br/>
                    
                    <label><b>Company Username: </b></label><br/>
                    <input type="text" name="username"  value="<?php echo $username;?>" ><br/><br/>

                    <label>Edit Users role</label><br/>
                      <select name="role" >
                    <option><?php echo $role;?></option>
                    <option value="administrator">Administrator</option>
                    <option value="employee">Employee</option>
                     </select><br><br>
       
                   <div class="clearfix">
                       <input type="hidden" name="id" value ="<?php echo $id;?>">
                       <input type="submit" name="submit" class="button"  value="Update User"> <br><br>

                </div>
               </div>
          
               </form>
   <?php
   if (isset($_POST['submit'])){
     $id= $_POST['id'];
     $name = $_POST['name'];
     $username = $_POST['username'];
     $role=$_POST['role'];
     
     $sql = "UPDATE users SET name = '$name', username ='$username', role = '$role' WHERE id='$id'";
     
     $res = mysqli_query($conn, $sql);
     
     if ($res==true){
        $_SESSION['update'] = '<div class="database_success">Company User '.$name.' has been successfully updated.</div>';
        header("location:admin_users.php");
     }else{
        $_SESSION['update'] = '<div class="database_error">Company User '.$name.' was not updated.</div>';
         header("location: admin_users.php");
     }
   }
    
   
   ?>

    </blockquote>
 

                <?php include "login_footer.php";?>  
                
</body>
</html>




 