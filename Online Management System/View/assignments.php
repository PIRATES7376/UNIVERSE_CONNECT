<?php 
include '../control/assignment_control.php';

if (!isset($_SESSION["username"])) {
    header("Location: ../view/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignments</title>
    <link rel="stylesheet" type="text/css" href="../css/assignments.css">
</head>
<body>

<h2>Assignments</h2>

<form action="../control/assignment_control.php" method="POST" enctype="multipart/form-data">
    <label for="course">Select Course:</label>
    <select name="course_id" required>
        <?php echo getCoursesOptions($_SESSION["username"]); ?>
    </select>
    <br><br>

    <label for="assignment_title">Assignment Title:</label>
    <input type="text" name="assignment_title" required>
    <br><br>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <br><br>

    <label for="due_date">Due Date:</label>
    <input type="date" name="due_date" required>
    <br><br>

    <label for="file">Upload Assignment File:</label>
    <input type="file" name="file" required>
    <br><br>

    <button type="submit" name="upload_assignment">Upload Assignment</button>
</form>

<h3>Uploaded Assignments</h3>
<table border="1">
    <tr>
        <th>Course</th>
        <th>Title</th>
        <th>Description</th>
        <th>Due Date</th>
        <th>File</th>
    </tr>
    <?php echo getAssignments($_SESSION["username"]); ?>
</table>

<a href="../view/manage_course.php?course_id=<?= isset($course_id) ? $course_id : 'default_course_id' ?>">
    <button>Back</button>
</a>

</body>
</html>
