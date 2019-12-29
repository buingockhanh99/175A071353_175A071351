<?php 
    ob_start();
session_start(); 
if (isset($_SESSION['Username'])){
    unset($_SESSION['Username']); // xóa session login
    header('location:index.php');
}

?>


<!-- session_start();
session_destroy(); -->

