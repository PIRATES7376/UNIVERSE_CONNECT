<?php
include_once("../control/registrationControl.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>

<link rel="stylesheet" href="../css/style.css">      
</head>
<body>
<?php require('navbar.php'); ?>
<div class="registration-form">
<h2>Register</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" >
        <?= $usernameError ?>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" >
        <?=  $passwordError?>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >
        <?=  $emailError  ?>

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" >
        <?=  $nameError ?>

        <label for="role">Role:</label>
        <select id="role" name="role" >
            <option value="student">Student</option>
            <option value="instructor">Instructor</option>
            <option value="admin">Admin</option>
        </select>
        <?=  $roleError ?>
        
    
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>
 