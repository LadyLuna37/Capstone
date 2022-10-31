<?php
include 'config.php';
session_start();



$vid= $v_id= $v_name = $v_location = $v_street = $v_city = $v_state = $v_zip = $v_category ="";
$v_nameErr = $v_locationErr = $v_streetErr = $v_cityErr = $v_stateErr = $v_zipErr = $v_categoryErr ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
 if(empty(trim($_POST["v_name"]))){
        $v_nameErr = "Please enter a vendor name.";
    } else{
        // Prepare a select statement
        $sql1= "SELECT vid FROM vendors WHERE v_name = ?";
        
        if($stmt = mysqli_prepare($conn, $sql1)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_v_name);
            
            // Set parameters
            $param_v_name = trim($_POST["v_name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $v_nameErr = "Vendor already exists in database";
                } else{
                    $v_name= trim($_POST["v_name"]);
                }
            } else{
                echo "Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }  


            // Validate vendor address
        if(empty(trim($_POST["v_street"]))){
        $v_streetErr = "Please Enter vendor street name and number";     
    }else{
        $v_street = trim($_POST["v_street"]);
    }
    
    
        if(empty(trim($_POST["v_city"]))){
        $v_cityErr = "Please Enter vendor city";     
    }else{
        $v_city = trim($_POST["v_city"]);
    }
  
      if(empty(trim($_POST["v_state"]))){
        $v_stateErr = "Please select vendors state";     
    }else{
        $v_state = trim($_POST["v_state"]);
    }
    
       if(empty(trim($_POST["v_zip"]))){
        $v_zipErr = "Please Enter vendors zip code";     
    }else{
        $v_zip = trim($_POST["v_zip"]);
    }
   
    // Validates phone number
    if(empty(trim($_POST["v_phone"]))){
        $v_phoneErr = "Please enter a phone number.";     
    }elseif(strlen(trim($_POST["v_phone"])) < 10){
        $v_phoneErr = "Phone number must between 10 digits.";
    }else{
        $v_phone = trim($_POST["v_phone"]);
    }
    
    // Validates vendor category
      if(empty(trim($_POST["v_category"]))){
        $v_categoryErr = "Please select a category.";     
    }else{
        $v_category = trim($_POST["v_category"]);
    }
    
    // Check input errors before inserting in database
    if(empty($v_nameErr) && empty($v_streetErr) && empty($v_cityErr) && empty($v_stateErr) && empty($v_zipErr) && empty($v_phoneErr) && empty($v_categoryErr)){
        
        // Prepare an insert statement
        $sql1 = "INSERT INTO vendors (v_name, v_street, v_city, v_state, v_zip, v_phone, v_category) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql1)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_v_name, $v_street, $v_city, $v_state, $v_zip, $v_phone, $v_category);
            
            $param_v_name = $v_name;
        
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
             
                echo "Vendor Added Successfully"; 
                unset($_SESSION['addnewVendor']);
                header("location: admin_vendors.php");
            } else{
                echo "Vendor Creation FAIL";
                 unset($_SESSION['addnewVendor']);
                header("location: admin_vendors.php");
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
   <title>Luna Coffee - Admin Panel - Add Vendor</title>
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
        <form  action="" method ="post" class="form" style ="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%">
            <div class="add">
               <div class="clearfix">
               
                   <h1 style="text-align: center;font-size: 20px; color: white; background-color: brown; border: 2px solid #ffffff; width: auto">Add New Vendor</h1>
                    
                   <!-- form information -->
                 <label id ="v_name"><b>Vendor Name: </b></label><br/>
                    <input type="text" name="v_name" placeholder="Vendor Name"  style ="text-align: center;" >
                    <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $v_nameErr; ?></span><br/>
                    
                    <label id ="v_street"><b>Vendor Address: </b></label><br/>
                    <input type="text" name="v_street" placeholder="Number and Street Name" style ="text-align: center;">
                    <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $v_streetErr; ?></span><br/>

                    <label id ="v_city"><b>Vendor City: </b></label><br/>
                    <input type="text" name="v_city" placeholder="City"  style ="text-align: center;">
                    <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $v_cityErr; ?></span><br/>
                    
                    <label>Vendor State</label><br/>
                    <select name="v_state" style ="text-align: center;">
                            <option value="AL">Select State</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                    </select><br/><br/>		
       
                     <label id ="v_zip"><b>Zip Code: </b></label><br/>
                    <input type="text" name="v_zip" placeholder="Zip Code" style ="text-align: center;">
                    <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $v_zipErr; ?></span><br/>
                    
                     <label id ="v_phone"><b>Vendor Phone Number: </b></label><br/>
                    <input type="text" name="v_phone" placeholder="(000)&nbsp;000-0000" style ="text-align: center;">
                    <span style="color:white; text-shadow: 2px 2px 4px red" class="invalid-feedback"><br><?php echo $v_phoneErr; ?></span><br/>
                    
                        <label>Vendor Category</label><br/>
                      <select name="v_category" style ="text-align: center;">
                    <option>Select Category</option>
                    <option value="Coffee Supplier">Coffee Supplier</option>
                    <option value="Accessory Supplier">Accessory Supplier</option>
                    <option value="Church">Church</option>
                    <option value="Charity">Charity</option>
                     </select><br><br>
                   <div class="clearfix">
                       
                       <button type="submit" name="addnewVendor">Add Vendor</button> <br><br> 
                </div>
               </div>
                </div>
            </form>
    </blockquote>
                
                <?php include "login_footer.php";?>  
                
</body>
</html>
