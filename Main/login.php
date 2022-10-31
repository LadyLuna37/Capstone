<?php
require_once 'config.php';
session_start();

$username = $password = "";
$usernameErr = $passwordErr = $loginErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty(trim($_POST["username"]))){
        $usernameErr = "Please enter username";
    }else{
        $username = trim($_POST["username"]);
    }
    
    if (empty(trim($_POST["password"]))){
        $passwordErr = "Please enter password";
    }else{
        $password = trim($_POST["password"]);
    }
    
    if (!empty($_POST['submit']))
{
    $username= $_POST['username'];
    $password= $_POST['password'];
 
   
    $sql = "(Select * from users where username='$username'and password = '$password' and role = '')";
    $admin_query = "(Select * from users where username = '$username' and password = '$password' and role = 'administrator')";
    $employee_query = "(Select * from users where username ='$username' and password = '$password' and role = 'employee')";
    
    
    $res = mysqli_query($conn, $sql);
    $admin_result = mysqli_query($conn, $admin_query);
    $employee_result = mysqli_query($conn, $employee_query);
    
    $count= mysqli_num_rows($res);
    $admin_count = mysqli_num_rows($admin_result);
    $employee_count = mysqli_num_rows($employee_result);
    
    if ($count>0)
    {
        
        session_start();
        $_SESSION["loggedin"]= true;
        $_SESSION["username"] = $username;
        header("location: customer_welcome.php");
    }
    elseif ($admin_count>0)
    {
              
        session_start();
        $_SESSION["loggedin"]= true;
        $_SESSION["username"] = $username;
        header("location: admin_welcome.php");
    
    }  elseif ($employee_count>0)
    {
              
        session_start();
        $_SESSION["loggedin"]= true;
        $_SESSION["username"] = $username;
        header("location: employee_welcome.php");
    
    }else 
    {
      
       $loginErr = "INVALID LOGIN <br> Please Check Your Username & Password!";
    }
     
}
  
    // Close connection
    mysqli_close($conn);
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
      <?php include 'login_header.php';?>   
       <br> <br>
 
    <!-- homepage title -->
<center><h1  style=" align-content: center; text-align: center; text-shadow:1px 1px 3px black; color: brown; background-color: cornsilk; border: 3px solid chocolate; width:50%"> <img src="CoffeeLeaf.jpg" alt="" width="30" height="30" />Luna Coffee<img src="CoffeeLeaf.jpg" alt="" width="30" height="30" /></h1></center>


    
    <!-- login form -->
    <blockquote>
        <br> <br><form  action="" method ="post" class="form" style ="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%">
            <div class="login">
               <div class="clearfix">

                   <h1 style="text-align: center;color: white; background-color: chocolate; text-shadow:2px 2px 4px black; border: 2px solid #ffffff; width: auto;text-shadow: 2px 2px 4px black">Login Account</h1>
                    
                 <?php 
                    if(!empty($loginErr)){
                    echo '<div style="color:blue; text-shadow:1px 1px 3px white" class="alert alert-danger">' . $loginErr . '</div>';
                    }        
                    ?>
                   
                   <!-- form information -->
                   
                <div class="form-group">
                <label style="color:white; text-shadow:1px 1px 3px black">Username: </label><br>
                <input type="text" name="username" placeholder="Enter Username" class="form-control" >
                <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $usernameErr; ?></span>
                </div><br>
            
                <div class="form-group">
                <label style="color:white; text-shadow:1px 1px 3px black">Password: </label><br>
                <input type="password" name="password" placeholder="Enter Password" class="form-control" >
                <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $passwordErr; ?></span>
                </div><br>
            
                <div class="form-group">
                    <button type= "submit" name="submit" value="LOGIN" style="color:white; text-shadow:1px 1px 1px black">Login</button>     
                </div>
               </div>
                </div>
            </form>
    </blockquote>
        <?php include 'footer.php';?>
    </body>

</html>

   
  
 
  
  
 
