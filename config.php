<?php
$conn = mysqli_connect("localhost","ladyluna_Admin","L@dyLun@","ladyluna_test");
if (!$conn){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
