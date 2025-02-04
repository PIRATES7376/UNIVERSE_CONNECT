<?php
session_start();
include '../model/db.php'; 

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../view/login.php"); 
    exit();
}

// Get the requested action
$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'profile':
        header("Location: ../view/profile.php");
        break;
    case 'edit_profile':
        header("Location: ../view/edit_profile.php");
        break;

    case 'my_courses':
        header("Location: ../view/my_courses.php"); 
        break;

    case 'add_course':
        header("Location: ../view/add_course.php"); 
        break;
    case 'logout':
        session_destroy();
        header("Location: ../view/login.php"); 
        break;

    default:
        echo "Invalid action. Please select a valid option.";
}
?>
