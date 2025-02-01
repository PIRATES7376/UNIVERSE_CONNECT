<?php
session_start();
include '../model/db.php'; 

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../Instructor/login.php"); 
    exit();
}

// Get the requested action
$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'edit_profile':
        header("Location: ../Instructor/edit_profile.php");
        break;

    case 'my_courses':
        header("Location: ../Instructor/my_courses.php"); // Create `my_courses.php` if needed
        break;

    case 'add_course':
        header("Location: ../Instructor/add_course.php"); // Create `add_course.php` if needed
        break;

    default:
        echo "Invalid action. Please select a valid option.";
}
?>
