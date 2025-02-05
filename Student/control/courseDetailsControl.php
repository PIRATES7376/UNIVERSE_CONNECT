<?php
include_once("../model/db.php");

if (isset($_GET['course_code'])) {
    $course_code = $_GET['course_code'];
    $courses = getCourseDetails($course_code);
} else {
    $courses = null;
}
?>
