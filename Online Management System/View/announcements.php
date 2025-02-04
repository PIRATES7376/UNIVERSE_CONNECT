<?php
include '../control/announcements_control.php';

if (!isset($_SESSION["username"])) {
    header("Location: ../view/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Announcements</title>
    <link rel="stylesheet" href="../css/announcements.css">
</head>
<body>

<h2>Announcements</h2>

<form action="../control/announcements_control.php" method="POST">
    <label for="course">Select Course:</label>
    <select name="course_id" required>
        <?php echo getCoursesOptions($_SESSION["username"]); ?>
    </select>
    <br><br>

    <label for="announcement">Write Announcement:</label>
    <textarea name="announcement" rows="4" required></textarea>
    <br><br>

    <button type="submit">Post Announcement</button>
</form>

<h3>Previous Announcements</h3>
<table border="1">
    <tr>
        <th>Course</th>
        <th>Announcement</th>
        <th>Date</th>
    </tr>
    <?php echo getAnnouncements($_SESSION["username"]); ?>
</table>

<br>


</body>
<a href="../view/manage_course.php?course_id=<?= isset($course_id) ? $course_id : 'default_course_id' ?>">
    <button>Back</button>
</a>
</html>
