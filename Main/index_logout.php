<?php
session_start();
setcookie(session_name(), '', 100);
session_unset();
session_destroy();  
$_SESSION['username'];
 header("location:./index.php?Message=SessionEnded");  
