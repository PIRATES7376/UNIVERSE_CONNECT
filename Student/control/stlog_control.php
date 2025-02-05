<?php
session_start();
include_once("../model/db.php");
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username == "") {
        $error = "Please enter a username";
    } elseif ($password == "") {
        $error = "Please enter a password";
    } else {
        $user = loginUser($username, $password);
        if($user){
            header("Location: ../view/dashboard.php");
        }
    }
}
?>