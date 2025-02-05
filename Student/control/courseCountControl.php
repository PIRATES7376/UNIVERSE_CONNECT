<?php
session_start();
include('../model/db.php'); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_SESSION['user'])) {
        echo json_encode(["message" => "You must be logged in to view your courses."]);
        exit();
    }

    $username = $_SESSION['user']['username'];
    $response = getEnrolledCourseCount($username);

    echo json_encode($response);
}
?>
