<link rel="stylesheet" href="homepage.css"/>
<?php
include 'config.php';
session_start();

//admin delete vendor//
$id = $_GET['vid'];

$sql1 = "DELETE FROM vendors WHERE vid = $id";

$res1 = mysqli_query($conn, $sql1);

if($res1 == true){
    $_SESSION['deleteVendor'] = '<div class = "database_success"> Company vendor has been deleted.</div>';
    header("location: admin_vendors.php");
}else{
    $_SESSION['deleteVendor'] = '<div class = "database_error">Company vendor not deleted</div>';
    header("location: admin_vendors.php");
}

?>
