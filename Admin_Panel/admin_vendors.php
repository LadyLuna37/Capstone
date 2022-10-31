<?php
include 'config.php';
session_start();

$vid = $v_id= $v_name = $v_location = $v_street = $v_street1 = $v_city = $v_state = $v_zip = $v_category ="";
$v_nameErr = $v_locationErr = $v_streetErr = $v_street1Err = $v_cityErr = $v_stateErr = $v_zipErr = $v_categoryErr ="";
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Admin Panel - Company Vendors</title>
   <link rel="stylesheet" href="homepage.css">
   <style>
    .form {
  margin-left: auto;
  margin-right: auto;
}


    
.btnEdit{
    background-color: blue ;
   border: 2px solid white;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
}

.btnEdit:hover{
    background-color: green ;
}

.btnDelete{
      background-color: black ;
  border: 2px solid white;
        color: white;
        padding: 15px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
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
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
}
     
.btnAdd:hover{
    background-color: whitesmoke ;
    color: brown;
    border: brown 2px solid;
   
</style>
</head>




<body>

<?php include 'admin_header.php'; 

    ?>
    
                <!-- add admin form -->
 <blockquote>
     
       
                   <div class="clearfix">
                       
                   <center><a href="admin_add_vendor.php?vid=<?php echo $id;?>" class="btnAdd" style="text-decoration:none">Add New Vendor</a></center><br><br><br> 
                    
                       <center> <?php 
                          if (isset($_SESSION['addnewVendor'])){
                           echo $_SESSION['addnewVendor'];
                           unset ($_SESSION['addnewVendor']);
                       }
                       
                        if (isset($_SESSION['deleteVendor'])){
                           echo $_SESSION['deleteVendor'];
                           unset ($_SESSION['deleteVendor']);
                       }
                       if (isset($_SESSION['updateVendor'])){
                           echo $_SESSION['updateVendor'];
                           unset ($_SESSION['updateVendor']);
                       }
                       ?>
                       </center>
                </div> <br><br><br>
               
    </blockquote>
                <hr>
              
                <blockquote>
                    <div class="rows">
            <div class="column-Products" style="text-align: center">
            <table align="center" style="border: 3px solid white" class="Products"> <br>
                   <!-- form information -->
                   <div class="clearfix"> 
                   <tr>                   
                   <center><h1 style="text-align: center; font-size: 20px; text-shadow:1px 1px black; color: brown; background-color: white; border: 2px solid black; width: 50%">Company Vendors</h1></center>
                   </tr>
                   
                   <tr style="border: 3px solid white; background-color: brown; text-align: center; color: white; text-shadow: 1px 1px black" class="Products">
                   <th>Vendor<br>ID #</th>
                   
                   <th>Vendor<br>Name </th>
                  
                   <th>Vendor<br>Address</th>
                   
                   <th>Vendor<br>Phone Number</th>
                  
                   <th>Vendor<br>Category</th>
                 
                   <th>Actions</th>
                  
                   </tr>
                   
                   <?php
         
                        $sql1 = "SELECT * FROM vendors ORDER BY v_name ASC";
                        $res1 = mysqli_query($conn, $sql1);
                        
                        if($res1 == true){
                            
                            $count = mysqli_num_rows($res1);
                            $v_id = 1;
                        if ($count>0){
                            while ($rows = mysqli_fetch_assoc($res1)){
                                $id=$rows['vid'];
                                $v_name=$rows['v_name'];
                                $v_street=$rows['v_street'];
                                $v_city = $rows['v_city'];
                                $v_state = $rows['v_state'];
                                $v_zip = $rows['v_zip'];
                                $v_phone=$rows['v_phone'];
                                $v_category = $rows['v_category'];
                                
                              
                                
                                
                    ?>  
                              
                        <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white; font-size: 18px">
                       <td><?php echo $v_id++ ;?></td>
                     
                       <td style="text-shadow:1px 1px black; font-size: 18px"><?php echo $v_name ;?></td> 
                     
                       <td style="text-shadow:1px 1px black; font-size: 18px"><?php echo $v_street,'<br>',$v_city,'<br>',$v_state,'<br>',$v_zip ;?></td>
                     
            
                       <td style="text-shadow:1px 1px black; font-size: 18px"><?php echo $v_phone ;?></td> 
                       
                       <td style="text-shadow:1px 1px black; font-size: 18px"><?php echo $v_category ;?></td> 
                       
                       <div class="clearfix">
                       <td style="text-shadow:1px 1px black">
                           <a href="admin_edit_vendor.php?vid=<?php echo $id;?>" class="btnEdit" style="text-decoration:none">Edit Vendor</a>                           
                           <a href="admin_delete_vendor.php?vid=<?php echo $id;?>" class='btnDelete' style="text-decoration:none">Delete Vendor</a> 
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
                    
    </blockquote><br><br> 
    
    
    
                <?php include "login_footer.php";?>  
                
</body>
</html>
