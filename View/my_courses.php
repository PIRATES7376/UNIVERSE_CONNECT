<?php
include '../model/db.php';
include '../control/login_control.php';

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login_form.php");
    exit();
}

$username = $_SESSION['username'];

// Use the database function to fetch courses
$result = getCourses($username);

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Courses</title>
</head>
<body>
    <h1>My Courses</h1>
    <?php if ($result && $result->num_rows > 0): ?>
        <table border="1">
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><a href="delete_course.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No courses found.</p>
    <?php endif; ?>
</body>
</html>
