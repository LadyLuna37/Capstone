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
      $id=$_GET['vid'];

                     $sql1 = "SELECT * FROM vendors WHERE vid=$id";

                     $res1 = mysqli_query($conn, $sql1);

                     if($res1 == true){
                         $count = mysqli_num_rows($res1);

                         if ($count==1){
                             $row = mysqli_fetch_assoc($res1);
                                $v_name = $row['v_name'];
                                $v_street= $row['v_street'];
                                 $v_city = $row['v_city'];
                                 $v_state = $row['v_state'];
                                $v_zip = $row['v_zip'];
                                 $v_phone =  $row['v_phone'];
                                $v_category= $row['v_category'];
                         }
                         else
                         {
                         header("location: admin_vendors.php");
                         }
                     }?>

                <!-- add admin form -->
 <blockquote>
      <center><?php 
                   if (isset($_SESSION['updateVendor'])){
                           echo $_SESSION['updateVendor'];
                           unset ($_SESSION['updateVendor']);
                       }
                  ?></center>
        <form  action="" method ="POST" class="form" style ="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%">
             
                <h1 style="text-align: center;font-size: 20px; color: white; background-color: brown; border: 2px solid #ffffff; width: auto">Edit Existing Vendor</h1>
                  
               <div class="clearfix">
                   <!-- form information -->
                    <label><b>Vendor Name: </b></label><br>
                    <input type="text" name="v_name" value="<?php echo $v_name;?>"  style ="text-align: center;" ><br><br>
                    
                    <label><b>Vendor Address: </b></label><br/>
                    <input type="text" name="v_street" value="<?php echo $v_street;?>"  style ="text-align: center;"><br><br>

                    <label><b>Vendor City: </b></label><br/>
                    <input type="text" name="v_city" value="<?php echo $v_city;?>"   style ="text-align: center;"><br><br>
                    
                    <label>Vendor State</label><br/>
                    <select name="v_state" style ="text-align: center;">
                            <option><?php echo $v_state;?></option>
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
                    </select><br><br>		
       
                     <label><b>Zip Code: </b></label><br/>
                    <input type="text" name="v_zip" value="<?php echo $v_zip;?>"  style ="text-align: center;"><br><br>
                    
                     <label><b>Vendor Phone Number: </b></label><br/>
                    <input type="text" name="v_phone" value="<?php echo $v_phone;?>"  style ="text-align: center;"><br><br>
                    
                        <label>Vendor Category</label><br/>
                      <select name="v_category" style ="text-align: center;">
                    <option><?php echo $v_category;?></option>
                    <option value="Coffee Supplier">Coffee Supplier</option>
                    <option value="Accessory Supplier">Accessory Supplier</option>
                    <option value="Church">Church</option>
                    <option value="Charity">Charity</option>
                     </select><br><br>
       
                   <div class="clearfix">
                       <input type="hidden" name="vid" value ="<?php echo $id;?>">
                       <input type="submit" name="submit1" class="button"  value="Update Vendor"> <br><br>

                </div>
               </div>
          
               </form>
   <?php
   if (isset($_POST['submit1'])){
     $v_name = $_POST['v_name'];
     $v_street=$_POST['v_street'];
      $v_city = $_POST['v_city'];
      $v_state = $_POST['v_state'];
     $v_zip= $_POST['v_zip'];
      $v_phone = $_POST['v_phone'];
     $v_category= $_POST['v_category'];
     
     $sql1 = "UPDATE vendors SET v_name='$v_name', v_street='$v_street', v_city='$v_city', v_state='$v_state', v_zip='$v_zip', v_phone='$v_phone', v_category='$v_category'  WHERE vid='$id'";
     
     $res1 = mysqli_query($conn, $sql1);
     
     if ($res1==true){
        $_SESSION['updateVendor'] = '<div class="database_success">Company vendor '.$v_name.' has been successfully updated.</div>';
        header("location:admin_vendors.php");
     }else{
        $_SESSION['updateVendor'] = '<div class="database_error">Company vendor '.$v_name.' was not updated.</div>';
         header("location: admin_vendors.php");
     }
   }
    
   
   ?>

    </blockquote>
 

                <?php include "login_footer.php";?>  
                
</body>
</html>
