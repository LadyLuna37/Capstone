<?php
$conn = mysqli_connect("localhost","database","username","password");
if (!$conn){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
