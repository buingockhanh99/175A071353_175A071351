<?php 
session_start(); 
if (isset($_SESSION['TENTK'])){
    unset($_SESSION['TENTK']); // xóa session login
    header('location:index.php');
}

?>


<!-- session_start();
session_destroy(); -->

