<?php
session_start();
include_once("../model/db.php");
$usernameError = $passwordError = $emailError = $nameError = $roleError = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $role = $_REQUEST['role'];
    if (!$username) {
        $usernameError = "Please enter a username";
    }
    if (!$password) {
        $passwordError = "Please enter a password";
    } elseif (strlen($password) < 6) {
        $passwordError = "Password must be at least 6 characters";
    }
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please enter a valid email";
    }
    if (!$name) {
        $nameError = "Please enter your full name";
    }
    if (!$role) {
        $roleError = "Please select a role";
    }

    if ($username && $password && $email && $name && $role) {
        $user = ['username' => $username, 'password' => $password, 'email' => $email, 'name' => $name, 'role' => $role];
        $error = registerUser($user);

        if($error){
            header("Location: ../view/student_login.php");
        }

    }
}
?>
