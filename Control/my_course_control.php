<?php
include '../model/db.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login_form.php");
    exit();
}

$mydb = new mydb();
$conobj = $mydb->openCon();

$username = $_SESSION['username'];

$result = $mydb->getCourses("courses", $conobj, $username);

echo "<h1>My Courses</h1>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Course: " . $row['course_name'] . "</p>";
    }
} else {
    echo "<p>No courses found.</p>";
}
?>
