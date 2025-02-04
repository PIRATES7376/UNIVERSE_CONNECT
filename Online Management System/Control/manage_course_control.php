<?php
include '../model/db.php';

class ManageCourseControl {
    private $db;
    private $conn;

    function __construct() {
        $this->db = new mydb();
        $this->conn = $this->db->openCon();
    }

    function getCourseDetails($course_id) {
        $sql = "SELECT * FROM offered_courses WHERE id='$course_id'";
        return $this->conn->query($sql);
    }

    function getInstructorContent($table, $conobj, $course_id) {
        // Joining course_content with offered_courses to get the course_name
        $sql = "
            SELECT cc.file_name, cc.file_path, oc.course_name 
            FROM $table cc
            JOIN offered_courses oc ON cc.course_id = oc.id
            WHERE cc.course_id = '$course_id'
        ";
        return $conobj->query($sql);
    }
    

    function getEnrolledStudents($course_id) {
        $sql = "SELECT * FROM student_enrollment WHERE course_id='$course_id'";
        return $this->conn->query($sql);
    }

    function getAssignments($course_id) {
        $sql = "SELECT * FROM assignments WHERE course_id='$course_id'";
        return $this->conn->query($sql);
    }

    function getAnnouncements($course_id) {
        $sql = "SELECT * FROM announcements WHERE course_id='$course_id'";
        return $this->conn->query($sql);
    }
}
?>
