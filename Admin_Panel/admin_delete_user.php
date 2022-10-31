<link rel="stylesheet" href="homepage.css"/>
<?php
include 'config.php';
session_start();

//admin delete user//
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = $id";

$res = mysqli_query($conn, $sql);

if($res == true){
    $_SESSION['deleteUser'] = "<div class = 'database_success'> Company User has been deleted.</div>";
    header("location: admin_users.php");
}else{
    $_SESSION['deleteUser'] = "<div class = 'database_error'>Company User Not deleted</div>";
    header("location: admin_users.php");
}

?>
