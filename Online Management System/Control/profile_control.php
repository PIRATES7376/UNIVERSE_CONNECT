<?php
include '../model/db.php'; // Include database connection

if (!isset($_SESSION["username"])) {
    header("Location: ../view/login.php"); // Redirect to login instead of profile
    exit();
}

$mydb = new mydb();
$conobj = $mydb->openCon(); // Establish database connection

$username = $_SESSION["username"];

// Ensure database connection is valid
if (!$conobj) {
    die("Database connection failed.");
}

// Fetch user profile data
$userData = $mydb->getUserProfile("instructor", $conobj, $username);

// Close database connection
$conobj->close();
?>
