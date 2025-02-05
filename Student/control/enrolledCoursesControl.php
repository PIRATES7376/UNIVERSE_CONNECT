<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('../model/db.php');

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_SESSION['user'])) {
        echo json_encode(["message" => "You must be logged in to view your courses."]);
        exit();
    }

    $username = $_SESSION['user']['username'];
    $response = getEnrolledCourses($username);

    echo json_encode($response);
}

?>
