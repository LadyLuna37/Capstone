<?php
include 'config.php';
session_start();

$id= $name = $username = $password = $role ="";
$nameErr = $usernameErr = $passwordErr = $roleErr = "";
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Luna Coffee - Admin Panel - Company Users</title>
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

<?php include 'admin_header.php'; ?>

                <!-- add admin form -->
 <blockquote>
     
       <center><a href="admin_add_user.php?id=<?php echo $id;?>" class="btnAdd" style="text-decoration:none">Add New User</a></center><br><br><br> 
                   
                        <div class="clearfix">
                       <center> <?php 
                          if (isset($_SESSION['addnewUser'])){
                           echo $_SESSION['addnewUser'];
                           unset ($_SESSION['addnewUser']);
                       }
                       
                        if (isset($_SESSION['deleteUser'])){
                           echo $_SESSION['deleteUser'];
                           unset ($_SESSION['deleteUser']);
                       }
                       if (isset($_SESSION['update'])){
                           echo $_SESSION['update'];
                           unset ($_SESSION['update']);
                       }
                       ?>
                       </center>

                        </div><br><br><br>
               
    </blockquote>
                <hr>
              
                <blockquote>
                    
                    <div class="rows">
            <div class="column-Products" style="text-align: center">
            <table align="center" style="border: 3px solid white" class="Products"> <br>
                   <!-- form information -->
                 <div class="clearfix">  
                     <tr>                   
                   <center><h1 style="text-align: center; font-size: 20px; text-shadow:1px 1px black; color: brown; background-color: white; border: 2px solid black; width: 50%">Company Users</h1></center>
                   </tr>
                   
                   <tr style="border: 3px solid white; background-color: brown; text-align: center; color: white; text-shadow: 1px 1px black" class="Products">
                   <th>Company<br>ID #</th>
                   
                   <th>Employee<br>Full Name</th>
                  
                   <th>Employee<br>Usernames</th>
                  
                   <th>Company<br>Role</th>
                 
                   <th>Actions</th>
                  
                   </tr>
                   
                   <?php
         
                        $sql = "SELECT * FROM users WHERE role = 'administrator' OR role = 'employee' ORDER BY role ASC";
                        $res = mysqli_query($conn, $sql);
                        
                        if($res == true){
                            
                            $count = mysqli_num_rows($res);
                            $uid = 1;
                        if ($count>0){
                            while ($rows = mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $name=$rows['name'];
                                $username=$rows['username'];
                                $role = $rows['role'];
                    ?>  
                              
                        <tr style="text-align: center; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color: white; font-size: 12px">
                       <td><?php echo $uid++ ;?></td>
                     
                       <td style="text-shadow:1px 1px black; font-size: 20px"><?php echo $name ;?></td> 
                     
                       <td style="text-shadow:1px 1px black; font-size: 20px"><?php echo $username ;?></td> 
            
                       <td style="text-shadow:1px 1px black; font-size: 20px"><?php echo $role ;?></td> 
                       
                       <div class="clearfix">
                       <td style="text-shadow:1px 1px black; font-size: 12px; width:30%">
                           <a href="admin_edit_user.php?id=<?php echo $id;?>" class="btnEdit" style="text-decoration:none">Edit User</a>                           
                           <a href="admin_delete_user.php?id=<?php echo $id;?>" class='btnDelete' style="text-decoration:none">Delete User</a> 
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
                    </div>
    </blockquote><br><br> <br><br><br><br><br><br>
    
    
                <?php include "login_footer.php";?>  
                
</body>
</html>