<?php
include '../control/login_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Login - Universe Connect</title>
    <link rel="stylesheet" href="../Css/login.css"> 
</head>
<body>
    <div class="login-container">
        <h2>Instructor Login</h2>

        <form method="POST" action="">
            <fieldset>
                <legend>Login Information</legend>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
                <button type="reset">Clear</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
