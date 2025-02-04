<?php
session_start();
include '../control/manage_course_control.php';

if (!isset($_SESSION["username"])) {
    header("Location: ../view/login.php");
    exit();
}

$course_id = $_GET['course_id'] ?? null;

if (!$course_id) {
    echo "Invalid Course!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Course</title>
    <link rel="stylesheet" href="../css/manage_course.css"> <!-- Link to the CSS file -->
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 style="color: white; text-align: center;">Course Management</h3>
        <a href="../view/dashboard.php">Dashboard</a>
        <a href="../view/my_courses.php">My Courses</a>
        <a href="../view/add_course.php">Add Course</a>
        <a href="../view/manage_course.php?course_id=<?= $course_id ?>">Manage Course</a>
        <a href="../control/session_destroy.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Manage Course</h2>
        <div class="course-actions">
            <a href="upload_content.php?course_id=<?= $course_id ?>">Upload Content</a>
            <a href="view_content.php?course_id=<?= $course_id ?>">View Content</a>
            <a href="student_enrollment.php?course_id=<?= $course_id ?>">Student Enrollment List</a>
            <a href="assignments.php?course_id=<?= $course_id ?>">Assignment Section</a>
            <a href="announcements.php?course_id=<?= $course_id ?>">Announcements</a>
        </div>
    </div>
</body>
</html>
