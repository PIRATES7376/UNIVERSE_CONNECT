<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login_form.php"); // Redirect to login if not logged in
    exit();
}
$username = $_SESSION['username']; // Retrieve logged-in user's username
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Dashboard - Universe Connect</title>
    <link rel="stylesheet" href="../Css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo $username; ?>!</h1>
        
        <div class="dashboard-menu">
            <ul>
                <li><a href="../control/dashboard_control.php?action=profile">Profile</a></li>
                <li><a href="../control/dashboard_control.php?action=edit_profile">Edit Profile</a></li>
                <li><a href="../control/dashboard_control.php?action=my_courses">My Courses</a></li>
                <li><a href="../control/dashboard_control.php?action=add_course">Add Course</a></li>
                <li><a href="../control/dashboard_control.php?action=logout">Logout</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
