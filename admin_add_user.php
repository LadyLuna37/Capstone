<?php
include 'config.php';
session_start();



$name = $username = $password = $role ="";
$nameErr = $usernameErr = $passwordErr = $roleErr = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty(trim($_POST["name"]))){
        $nameErr = "Please Enter Full Name";     
    }else{
        $name = trim($_POST["name"]);
    }
    // Validate username
   
    if(empty(trim($_POST["username"]))){
        $usernameErr = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $usernameErr = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql= "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $usernameErr = "Username already exists and cannot be used in Admin Panel";
                } else{
                    $username= trim($_POST["username"]);
                }
            } else{
                echo "Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validates password
    if(empty(trim($_POST["password"]))){
        $passwordErr = "Please enter a password.";     
    }elseif(strlen(trim($_POST["password"])) < 6){
        $passwordErr = "Password must have atleast 6 characters.";
    }else{
        $password = trim($_POST["password"]);
    }
    
      if(empty(trim($_POST["role"]))){
        $roleErr = "Please select a role.";     
    }else{
        $role = trim($_POST["role"]);
    }
    
    // Check input errors before inserting in database
    if(empty($nameErr) && empty($usernameErr) && empty($passwordErr) && empty($roleErr)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (name, username, password, role) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $name, $param_username, $param_password, $role);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password; // Creates a password hash
       
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
             
                $_SESSION['addNewUser'] = "<div class = 'database_success'>Company User added Successfully.</div>";
                header("location: admin_users.php");
    
                }
                else
                {

                $_SESSION['addNewUser'] = "<div class = 'database_error'>Company User cannot be added</div>";
                header("location: admin_users.php");
                }
        
                        // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);
    }
   
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Admin Panel - Users</title>
   <link rel="stylesheet" href="homepage.css">
   <style>
    .form {
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>




<body>

<?php include 'admin_header.php'; 
   
    ?>
    
                <!-- add admin form -->
 <blockquote>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method ="post" class="form" style ="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%">
            <div class="add">
               <div class="clearfix">
               
                   <h1 style="text-align: center;font-size: 20px; color: white; background-color: brown; border: 2px solid #ffffff; width: auto">Add New User</h1>
                    
                   <!-- form information -->
                 <label for ="name"><b>Full Name: </b></label><br/>
                    <input type="text" name="name" placeholder="Enter Full Name" >
                    <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $nameErr; ?></span><br/>
                    
                    <label for ="username"><b>Company Username: </b></label><br/>
                    <input type="text" name="username" placeholder="Enter username" >
                    <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $usernameErr; ?></span><br/>

                    <label for ="password"><b>Company Password: </b></label><br/>
                   <input type="text" name="password" placeholder="Enter password" >
                    <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $passwordErr; ?></span><br/>

                    <label>Enter role</label><br/>
                      <select name="role" >
                    <option>Select Role</option>
                    <option value="administrator">Administrator</option>
                    <option value="employee">Employee</option>
                     </select><br><br>
       
                   <div class="clearfix">
                       
                       <button type="submit" name="newUser">Add User</button> <br><br> 
                </div>
               </div>
                </div>
            </form>
    </blockquote>
                
                <?php include "login_footer.php";?>  
                
</body>
</html>
