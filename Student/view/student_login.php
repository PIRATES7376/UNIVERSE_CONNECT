<?php
include_once("../control/stlog_control.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="../css/mystyle.css">
    <style>
        
    </style>
</head>
<body>
    <?php require('navbar.php'); ?>
    <div class="login-container">
        <h1>Student Login</h1>
        <form action="" method="post">
            <input type="text" id = "username" name="username" placeholder="Enter Username" >
            <div> 
            <span id = "error"></span>
            </div>
            <input type="password" id= "password" name="password" placeholder="Enter Password" >
            <div> 
            <span id = "passError"></span>
            </div>
            
            <div class="form-buttons">
                <input type="submit" onclick="return validation()"  class="btn btn-login" name="btnlogin" value="Login">
            </div>
        </form>
        <div class="links">
            <p>Don't have an account? <a href="registration.php">Register Now</a></p>
            <p>Forgot password? <a href="#">Reset Here</a></p>
        </div>
    </div>
    <script src="../js/login.js" defer></script>
</body>
</html>
