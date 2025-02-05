<?php
session_start();
include_once("../model/db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_SESSION['user'])) {
        echo json_encode(["message" => "You must be logged in to enroll."]);
        exit();
    }

    // Check if the course ID is provided
    if (!isset($_POST['course_id'])) {
        echo json_encode(["message" => "Course ID missing."]);
        exit();
    }

    // Get the necessary data
    $username = $_SESSION['user']['username'];
    $course_id = $_POST['course_id'];

    // Call the function to enroll the student
    $response = enrollStudentInCourse($username, $course_id);

    // Return the response based on the function result
    echo json_encode($response);
}
?>
