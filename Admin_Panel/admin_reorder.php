<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name ="description" content ="Our Coffee is Heavenly!">
<title>Luna Coffee - Admin Reorders</title>
<link rel="stylesheet" href="homepage.css"/>
<script src="https://kit.fontawesome.com/9b44d189ed.js" crossorigin="anonymous"></script>

</head>
<?php include "admin_header.php";?>

<body>
    
   
            
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
                 
                   <th>Actions</th>
                  
                   </tr>
                   
                   
                              
                        <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white; font-size: 18px">
                       <td>1</td>
                     
                       <td style="text-shadow:1px 1px black; font-size: 18px"><img src="cafe_latte.jpg" alt="cafe_latte" width = "100" height= "100" class=rounded></td> 
                     
                       <td style="text-shadow:1px 1px black; font-size: 18px">Cafe Latte</td> 
            
                       <td style="text-shadow:1px 1px black; font-size: 18px">4</td> 
                       
                       <td style="text-shadow:1px 1px black; font-size: 18px">Vienna Coffee</td> 
              
                       <td style="text-shadow:1px 1px black; font-size: 18px">
                           <button style="background-color: #0000ad; font-size: 12px" onClick="sendRequest()">Send Request<br>To Vendor</button>
                           <button style="background-color:black; font-size: 12px" onClick="declineRequest()">Decline Request</button>
                             <script>  
                                 function sendRequest(){
                                     window.location.href="vendor_request_sent.php";
                                 }
                                   function declineRequest(){
                                   var ask = window.confirm("Are you sure you want to delete this user?");
                                    if (ask) {
                                     window.location.href="admin_delete_user.php?id=<?php echo $id ?>";
                                    window.alert("User deleted successfully!");
                                    }
                                    }
                                 
                             </script>
                       </td>    
                   </tr>
                   
                   
               </div>
                </div>
            </table></blockquote>
    <br><br>  
    

    
</body>
</html>  
<?php include "login_footer.php";
