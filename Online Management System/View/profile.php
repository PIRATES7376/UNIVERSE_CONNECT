<?php session_start(); include '../control/profile_control.php'; // Include profile control logic 

if (!isset($_SESSION["username"])) { 
    header("Location: ../view/login.php"); // Redirect to login if session not found 
    exit(); 
}
?>

<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../Css/profile.css"> <!-- Link to the new CSS -->
</head>
<body>
    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>

        <?php if (!empty($userData)): ?>
            <div class="profile-info">
                <p><strong>Username:</strong> <?php echo htmlspecialchars($userData["username"]); ?></p>
                <p><strong>Password:</strong> <?php echo htmlspecialchars($userData["password"]); ?></p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars($userData["gender"]); ?></p>
                <p><strong>Contact:</strong> <?php echo htmlspecialchars($userData["contact"]); ?></p>
            </div>
        <?php else: ?>
            <p style="color: red;">No user data found.</p>
        <?php endif; ?>

        <a href="edit_profile.php">Edit Profile</a>
        <a href="dashboard.php">Go Back to Dashboard</a>
        <a href="../control/session_destroy.php">Logout</a>
    </div>
</body>
</html>
