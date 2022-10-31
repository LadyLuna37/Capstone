<?php
// Include config file
require "config.php";
session_start();
/// REGISTER FORM ///
// Define variables and initialize with empty values
$name =$username = $password = $c_password = $role = "";
$nameErr =$usernameErr = $passwordErr = $c_passwordErr = "";
 
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
        $sql = "SELECT id FROM users WHERE username = ?";
        
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
                    $usernameErr = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
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
    } elseif(strlen(trim($_POST["password"])) < 6){
        $passwordErr = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["c_password"]))){
        $c_passwordErr = "Please confirm password.";     
    } else{
        $c_password = trim($_POST["c_password"]);
        if(empty($passwordErr) && ($password != $c_password)){
            $c_passwordErr = "Passwords do not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($nameErr) && empty($usernameErr) && empty($passwordErr) && empty($c_passwordErr)){
        
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
             
                // Redirect to login page
                header("location: login.php?message=AccountSuccessfullyCreated"); 
            } else{
                echo "Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
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
</head>

<body>
<center><h1  style=" align-content: center; text-align: center;color: brown; text-shadow:2px 2px 4px black; background-color: cornsilk; border: 3px solid chocolate; width:50%"> <img src="CoffeeLeaf.jpg" alt="" width="30" height="30" />Luna Coffee<img src="CoffeeLeaf.jpg" alt="" width="30" height="30" /></h1></center>
     <!-- Registration form -->
   <blockquote><br><br>
       <div class="wrapper">
        <center><form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%;margin-left: auto;
        margin-right: auto;">
            <h2 style="text-align: center;  color: white;background-color: chocolate;text-shadow:2px 2px 4px black; border: 2px solid #ffffff; width: auto;text-shadow: 2px 2px 4px black">Create Account</h2>
                <div class="form-group">
                 <label style="color:white; text-shadow:1px 1px 3px black">Full Name: </label><br/>
                    <input type="text" name="name" placeholder="Enter Full Name" >
                    <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $nameErr; ?></span><br/>
                    
                    
                <label  style="color:white; text-shadow:1px 1px 3px black">Username: </label><br>
                <input type="text" name="username"  placeholder="Enter Username"  class="form-control <?php echo (!empty($usernameErr)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $usernameErr; ?></span>
            </div><br>
            
            <div class="form-group">
                <label  style="color:white; text-shadow:1px 1px 3px black">Password: </label><br>
                <input type="password" name="password"  placeholder="Enter Password" class="form-control <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $passwordErr; ?></span>
            </div><br>
            
            <div class="form-group">
                <label  style="color:white; text-shadow:1px 1px 3px black">Confirm Password: </label><br>
                <input type="password" name="c_password"  placeholder="Enter Password"  class="form-control <?php echo (!empty($c_passwordErr)) ? 'is-invalid' : ''; ?>" value="<?php echo $c_password; ?>">
                <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $c_passwordErr; ?></span>
            </div><br>
            
            <div class="form-group">
                <button type="submit" name="submit">Register</button>
               
                <button type="reset" name="reset" >Reset</button><br><br>
                
                <p>Already Have An Account?<br><br>
                <a href= "login.php" style="color:white; text-shadow:1px 1px 1px black; width: 50%; border: 2px solid chocolate; background-color: brown">LOGIN HERE!</a>    
            </div>
            </form>
        </center>
    </div> 
    </blockquote>
     
    </body>
</html>
