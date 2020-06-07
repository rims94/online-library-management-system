<?php
    session_start();
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    } else if(isset($_SESSION['admin'])) {
        unset($_SESSION['admin']);
    } else {
        header("location:login.php");
    }
    header("location:index.php");
?>

