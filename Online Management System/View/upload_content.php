<?php 
include '../control/upload_content_control.php';

if (!isset($_SESSION["username"])) {
    header("Location: ../view/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Content</title>
    <!-- Link to External CSS -->
    <link rel="stylesheet" type="text/css" href="../css/upload_content.css">
</head>
<body>

<h2>Upload Course Content</h2>

<form action="../control/upload_content_control.php" method="POST" enctype="multipart/form-data">
    <label for="course">Select Course:</label>
    <select name="course_id" required>
        <?php echo getCoursesOptions($_SESSION["username"]); ?>
    </select>
    <br><br>

    <label for="file">Upload File:</label>
    <input type="file" name="file" required>
    <br><br>

    <button type="submit">Upload</button>
</form>

<a href="../view/manage_course.php?course_id=<?= isset($course_id) ? $course_id : 'default_course_id' ?>">
    <button>Back</button>
</a>



</body>
</html>
