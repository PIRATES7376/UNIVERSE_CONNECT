<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Your Profile</h1>
    <form method="post" action="../control/edit_profile_control.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" required><br>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>

        <input type="submit" value="Update Profile">
    </form>
</body>
</html>
