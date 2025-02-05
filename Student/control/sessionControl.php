<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header('location: ../view/student_login.php');
    }
?>