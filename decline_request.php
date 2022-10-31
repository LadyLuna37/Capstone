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
   <title>Luna Coffee - Admin Panel - Vendor Request Declined</title>
   <link rel="stylesheet" href="homepage.css">
</head>




<body>

<?php include 'admin_header.php'; ?>

<center><h1 style=" align-content: center; text-align: center; font-family: Georgia, serif; font-size: 20px; text-shadow:1px 1px 3px black; color: brown; background-color: white; border: 3px solid chocolate; width:50%">Unfortunately Vendors Have Denied Your Re-Order Request</h1></center>

                    <div class="rows">
            <div class="column-Products" style="text-align: center">
                <blockquote><table align="center" style="border: 3px solid white" class="Products"> <br>
                   <!-- form information -->
                   <tr>                   
                   <center><h1 style="text-align: center; font-size: 20px; text-shadow:1px 1px black; color: brown; background-color: white; border: 2px solid black; width: 50%">Product Reorder Requests</h1></center>
                   </tr>
                   
                 <tr style="border: 3px solid white; background-color: brown; text-align: center; color: white; text-shadow: 1px 1px black" class="Products">
                   <th>Product<br>ID #</th>
                   
                   <th>Product<br>Image</th>
                  
                   <th>Product<br>Name</th>
                  
                   <th>Product<br>Qty <br> Needed</th>
                   
                   <th>Product<br>Vendor</th>
                  
                   </tr>
                   
                   
                              
                        <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white; font-size: 18px">
                       <td>1</td>
                     
                       <td style="text-shadow:1px 1px black; font-size: 18px"><img src="cafe_latte.jpg" alt="cafe_latte" width = "100" height= "100" class=rounded></td> 
                     
                       <td style="text-shadow:1px 1px black; font-size: 18px">Cafe Latte</td> 
            
                       <td style="text-shadow:1px 1px black; font-size: 18px">4</td> 
                       
                       <td style="text-shadow:1px 1px black; font-size: 18px">Vienna Coffee</td> 
              
                        </tr>
                   
                   
               </div>
                </div>
            </table></blockquote>
    <br><br>  
    

    
 
<?php include "login_footer.php";?>  
                
</body>
</html>