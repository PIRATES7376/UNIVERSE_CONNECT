<?php
include '../control/student_enrollment_control.php';

if (!isset($_SESSION["username"])) {
    header("Location: ../view/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Enrollment List</title>
</head>
<body>

<h2>Enrolled Students</h2>

<table border="1">
    <tr>
        <th>Course</th>
        <th>Student Name</th>
        <th>Contact</th>
    </tr>
    <?php echo getStudentList($_SESSION["username"]); ?>
</table>

<br>
<a href="../view/manage_course.php"><button>Back</button></a>

</body>
</html>
