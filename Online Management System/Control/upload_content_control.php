<?php
session_start();
include '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mydb = new mydb();
    $conobj = $mydb->openCon();

    $username = $_SESSION["username"];
    $course_id = $_POST["course_id"];
    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $upload_dir = "../uploads/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_path = $upload_dir . basename($file_name);

    if (move_uploaded_file($file_tmp, $file_path)) {
        $result = $mydb->uploadContent("course_content", $course_id, $file_name, $file_path, $conobj);
        if ($result) {
            echo "File uploaded successfully.";
            header("Location: ../view/upload_content.php");
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Failed to move uploaded file.";
    }

    $conobj->close();
}

function getCoursesOptions($username) {
    $mydb = new mydb();
    $conobj = $mydb->openCon();
    $result = $mydb->getCourses("offered_courses", $conobj, $username);
    $options = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['course_name']}</option>";
        }
    }
    
    $conobj->close();
    return $options;
}
?>
