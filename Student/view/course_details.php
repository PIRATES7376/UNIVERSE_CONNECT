<?php
include_once("../model/db.php");
include_once("../control/courseDetailsControl.php");

if (!isset($_GET['course'])) {
    die("Course not specified.");
}

$course_code = $_GET['course'];
$course = getCourseDetails($course_code);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link rel="stylesheet" href="../css/viewDetails.css">
    <script src="../js/enrollCourse.js" defer></script>
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION['user'])){
            require('navbar.php');
        }else{
            require('stNavBar.php');
        }
    ?>
     <div class="container">
        <h1><?php echo ($course['course_name']); ?></h1>
        <p><strong>Course Code:</strong> <?php echo ($course['course_code']); ?></p>
        <p><strong>Instructor:</strong> <?php echo ($course['instructor_username']); ?></p>
        <p><strong>Description:</strong> <?php echo ($course['course_description']); ?></p>
        <p class="course-price">Price: <?php echo ($course['price']); ?> Taka</p>
        <button class="btn" id="enroll-btn" data-course-id="<?php echo $course['id']; ?>">Enroll Now</button>
        <p id="enroll-message"></p>
    </div>
</body>
</html>
