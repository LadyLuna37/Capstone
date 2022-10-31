<?php
session_start();
setcookie(session_name(), '', 100);
session_unset();
session_unset('username');
session_destroy();  
$_SESSION['username'];
 header("location:./login.php?Message=SessionEnded");  
 
 
