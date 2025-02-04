<?php
session_start();
include '../model/db.php'; // Include the database connection file

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location:../view/login.php");
    exit();
}

$mydb = new mydb();
$conobj = $mydb->openCon(); // Establish database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username']; // Get the logged-in user's username
    $new_password = $_POST["password"];
    $new_contact = $_POST["contact"];
    $new_gender = $_POST["gender"];

    // Call the updateProfile method from the mydb object
    if ($mydb->updateProfile("instructor", $conobj, $username, $new_password, $new_contact, $new_gender)) {
        echo "Profile updated successfully!";
        header("Location: ../view/profile.php");
    } else {
        echo "Error updating profile.";
    }
}
?>
