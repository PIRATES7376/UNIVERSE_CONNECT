<?php 
session_start(); 
include '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mydb = new mydb();
    $conobj = $mydb->openCon();

    $username = $_SESSION["username"];
    $course_id = $_POST["course_id"];
    $assignment_title = $_POST["assignment_title"];
    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $upload_dir = "../assignments/";

    // Create directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_path = $upload_dir . basename($file_name);

    // Move uploaded file to the specified directory
    if (move_uploaded_file($file_tmp, $file_path)) {
        // Save assignment details in the database
        $result = $mydb->uploadAssignment("assignments", $course_id, $assignment_title, $file_name, $file_path, $conobj);

        if ($result) {
            echo "Assignment uploaded successfully.";
        } else {
            echo "Error uploading assignment.";
        }
    } else {
        echo "Failed to move uploaded file.";
    }

    $conobj->close();
}
?>
