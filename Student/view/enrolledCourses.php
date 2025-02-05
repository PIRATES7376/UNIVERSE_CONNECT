<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user']['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Enrolled Courses</title>
    <link rel="stylesheet" href="../css/course.css">
    <script src="../js/enrolledCourses.js" defer></script> 
</head>
<body>
    <?php include('stNavBar.php'); ?>
    <h2> Enrolled Courses</h2>
    <div class="course-grid">
        
        <div id="course-list" class="course-grid">
            <p>Loading courses...</p>
        </div>
    </div>
</body>
</html>
