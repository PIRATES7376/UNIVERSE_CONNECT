<?php session_start(); include '../control/profile_control.php'; // Include profile control logic 

if (!isset($_SESSION["username"])) { 
    header("Location: ../view/login.php"); // Redirect to login if session not found 
    exit(); 
}
?>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="../css/edit_profile.css"> <!-- Link to the updated CSS -->
</head>
<body>
    <div class="profile-container">
        <h1>Edit Your Profile</h1>
        <form method="post" action="../control/edit_profile_control.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($userData['username']); ?>" required><br>

            <label for="password">PassWord:</label>
            <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($userData['password']); ?>" required><br>

            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" value="<?php echo htmlspecialchars($userData['contact']); ?>" required><br>

            <label for="gender">Gender:</label>
            <select name="gender" id="gender" required>
                <option value="male" <?php echo ($userData['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo ($userData['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
            </select><br>

            <input type="submit" value="Update Profile">
        </form>
    </div>
</body>
</html>
