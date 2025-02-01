<?php
session_start();
include '../model/db.php'; // Include the database connection

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login_form.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch courses from the database
$query = "SELECT * FROM courses WHERE instructor = '$username'";
$result = $conn->query($query);
?>