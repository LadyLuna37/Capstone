<?php 
session_start();
echo '<div class="header">
  <a class="active" href="index.php" style="color:chocolate; text-shadow:1px 1px 1px black"><img src="Coffee_Cup.ico" alt="alt"/><br><u>Home</u></a>
<button type= "submit" onClick ="signup()" style="color:white; text-shadow:1px 1px 1px black">Need to Register?<br>REGISTER HERE!</a></button>    
<a href="aboutus.php" style="color:white; text-shadow:1px 1px 1px black"><u>About Luna Coffee</u></a>
<a href="contactus.php" style="color:white; text-shadow:1px 1px 1px black"><u>Contact Us!</u></a>
     
<script>
                function signup(){
                    window.location.href ="index.php";
                }
                </script>

  </div>
</div>'; 