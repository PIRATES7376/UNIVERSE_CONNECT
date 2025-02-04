<?php
session_start();
include '../model/db.php';  // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = 0;

    // Collect form data
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $course_description = $_POST['course_description'];
    $price = $_POST['price'];
    $instructor_username = $_SESSION['username'];

    // Validate inputs
    if (empty($course_name)) {
        echo "Course name is required.<br>";
        $hasError++;
    }

    if (empty($course_code)) {
        echo "Course code is required.<br>";
        $hasError++;
    }

    if (empty($course_description)) {
        echo "Course description is required.<br>";
        $hasError++;
    }

    if (empty($price)) {
        echo "Course price is required.<br>";
        $hasError++;
    }

    // If there are no errors, proceed with the database insertion
    if ($hasError == 0) {
        $mydb = new mydb();
        $conobj = $mydb->openCon(); // Establish database connection
        
        // Insert the new course into the offered_course table
        $result = $mydb->addCourse("offered_courses", $course_name, $course_code, $course_description, $price, $instructor_username, $conobj);
        
        if ($result === TRUE) {
            echo "Course successfully added!";
            // Optionally, redirect to a different page after success
            // header("Location: course_list.php"); 
        } else {
            echo "Error: " . $conobj->error;
        }
        
        // Close database connection
        $conobj->close();
    } else {
        echo "Please fix the errors above.";
    }
}
?>
