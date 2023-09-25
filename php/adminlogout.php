<?php
    require('connection.php');
    $_SESSION['admin_login']='no';
    header('location:adminlogin.php');
    die();
?>