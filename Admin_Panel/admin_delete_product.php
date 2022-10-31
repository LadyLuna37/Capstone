<?php
include 'config.php';
session_start();

//admin delete product//
$id = $_GET['id'];

$sql2 = "DELETE FROM products WHERE id = $id";

$res2 = mysqli_query($conn, $sql2);

if ($res2==true){
        $_SESSION['deleteProduct'] = '<div class="database_success">Product '.$id.' has been successfully deleted.</div>';
        header("location:admin_products.php");
     }else{
        $_SESSION['deleteProduct'] = '<div class="database_error">Product '.$id.' was not deleted.</div>';
         header("location: admin_edit_product.php");
     }

?>
