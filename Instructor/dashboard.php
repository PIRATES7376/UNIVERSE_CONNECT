<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login_form.php"); // Redirect to login if not logged in
    exit();
}
$username = $_SESSION['username']; // Retrieve logged-in user's username
?>

<!DOCTYPE html>
<html>
<head>
    <title>Instructor Dashboard</title>
</head>
<body>
    <h1>Welcome to the Instructor Dashboard</h1>
    <ul>
        <li><a href="../control/dashboard_control.php?action=edit_profile">Edit Profile</a></li>
        <li><a href="../control/dashboard_control.php?action=my_courses">My Courses</a></li>
        <li><a href="../control/dashboard_control.php?action=add_course">Add Course</a></li>
        <li><a href="../control/dashboard_control.php?action=logout">Logout</a></li>
    </ul>
</body>
</html>

