<?php
include '../model/db.php';
session_start();
$unanmeError = "";
$contactError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = 0;

    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $gender = isset($_REQUEST["gender"]) ? $_REQUEST["gender"] : "";
    $contact = isset($_REQUEST["Contact"]) ? $_REQUEST["Contact"] : "";

    // Username validation
    if (empty($username)) {
        $unanmeError = "Please enter a username";
        $hasError++;
    } else {
        echo $username;
    }
    echo "<br>";

    // Password validation
    if ($password == "") {
        echo "Please enter a password";
        $hasError++;
    } else {
        echo $password;
    }
    echo "<br>";

    // Gender validation
    if (empty($gender)) {
        echo "Please select a gender";
        $hasError++;
    } else {
        echo $gender;
    }
    echo "<br>";

    // Contact validation
    if (empty($contact)) {
        $contactError = "Contact field is required.";
        $hasError++;
    } elseif (!preg_match('/^\d{10,15}$/', $contact)) {
        $contactError = "Contact number must be numeric and between 10 to 15 digits.";
        $hasError++;
    } else {
        echo $contact;
    }
    echo "<br>";

    // File upload validation
   /* if (!empty($_FILES["profile-picture"]["name"])) {
        echo $_FILES["profile-picture"]["name"];
        move_uploaded_file($_FILES["profile-picture"]["tmp_name"], "../uploads/" . $_FILES["profile-picture"]["name"]);
    } else {
        echo "No file uploaded.";
        $hasError++;
    }*/

    // Error check and database insertion
    if ($hasError > 0) {
        echo "Please insert correct data";
    } else {
        $mydb = new mydb();
        $conobj = $mydb->openCon();
        $result = $mydb->addInstructor("instructor",
            $username,
            $password,
            $gender,
            $contact,
            $conobj
        );
        if ($result === TRUE) {
            $_SESSION["uname"] = $_REQUEST["username"];
            header("Location: ../Instructor/login.php");
        } else {
            echo "Error " . $conobj->error;
        }
    }
}
?>
