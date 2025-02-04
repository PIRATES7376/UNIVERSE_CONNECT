<?php
include '../control/view_content_control.php';

// Ensure instructor is logged in
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
    <title>View Course Content</title>
    <!-- Link to External CSS -->
    <link rel="stylesheet" type="text/css" href="../css/view_content.css">
</head>
<body>

<h2>Course Content</h2>

<table>
    <tr>
        <th>Course</th>
        <th>File Name</th>
        <th>Download</th>
    </tr>
    <?php
    // Ensure that content is displayed only for the selected course
    echo getContentList($course_id);
    ?>
</table>

<br>
<a href="../view/manage_course.php?course_id=<?= isset($course_id) ? $course_id : 'default_course_id' ?>">
    <button>Back</button>
</a>


</body>
</html>
