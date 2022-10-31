<?php
include "config.php";
session_start();
echo '<div class="header"><blockquote>
    <a class="active" style = "border: 4px solid brown; background-color:white; color: brown" href="#"><center>Luna<br><br><img src="order_notification.ico" alt="alt" style="border: 2px solid brown; background-color:black"/><br><br>Coffee</center></a><br><br>
    
    <center><h1  align: center style=" text-align: center; font-family: Georgia, serif; font-size: 48px; text-shadow:1px 1px 3px black; color: brown; background-color: cornsilk; border: 3px solid brown; width:50%"><img src="CoffeeLeaf.jpg" alt="" width="30" height="30" />Welcome<img src="CoffeeLeaf.jpg" alt="" width="30" height="30" /><br>'.$_SESSION['username'].'!</h1>

</div>
</blockquote></div>'; 
