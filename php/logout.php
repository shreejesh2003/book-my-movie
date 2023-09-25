<?php
    require('connection.php');
    $_SESSION['is_login']='no';
    header('location:../index.php');
    die();
?>