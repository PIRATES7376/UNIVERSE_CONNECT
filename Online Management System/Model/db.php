<?php  
class mydb {

    // Open database connection
    function openCon() {
        $dbhost = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "mydb";
        
        $connobject = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
        return $connobject;
    }

    // Add Instructor
    function addInstructor($table, $username, $password, $gender, $contact, $connobject) {
        $sql = "INSERT INTO $table (username, password, gender, contact) 
                VALUES ('$username', '$password', '$gender', '$contact')";
        return $connobject->query($sql);
    }

    // Login Function
    function login($table, $username, $password, $connobject) {
        $sql = "SELECT username, password FROM $table WHERE username='$username' AND password='$password'";
        $result = $connobject->query($sql);
        return $result;
    }

    // Add Course
    function addCourse($table, $course_name, $course_code, $course_description, $price, $instructor_username, $connobject) {
        $sql = "INSERT INTO $table (course_name, course_code, course_description, price, instructor_username) 
                VALUES ('$course_name', '$course_code', '$course_description', '$price', '$instructor_username')";
        return $connobject->query($sql);
    }

    // Get Courses by Instructor
    function getCourses($table, $conobj, $username) {
        $sql = "SELECT * FROM offered_courses WHERE instructor_username='$username'";
        return $conobj->query($sql);
    }
    function getCoursesOptions($username) {
        $mydb = new mydb();
        $conobj = $mydb->openCon();
        $result = $mydb->getCourses("offered_courses", $conobj, $username);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['course_name']}</option>";
            }
        } else {
            echo "<option>No courses available</option>";
        }
    
        $conobj->close();
    }
    

    // Get User Profile
    function getUserProfile($table, $conobj, $username) {
        $sql = "SELECT username, password, gender, contact FROM $table WHERE username='$username'";
        $result = $conobj->query($sql);
        return $result->num_rows > 0 ? $result->fetch_assoc() : null;
    }

    function updateProfile($table, $conobj, $username, $new_password, $new_contact, $new_gender) {
        $sql = "UPDATE $table SET password='$new_password', contact='$new_contact', gender='$new_gender' WHERE username='$username'";
        return $conobj->query($sql);
    }
    // Upload Content
    function uploadContent($table, $course_id, $file_name, $file_path, $conobj) {
        $sql = "INSERT INTO $table (course_id, file_name, file_path) VALUES ('$course_id', '$file_name', '$file_path')";
        return $conobj->query($sql);
    }

    // Get Uploaded Content for a Course
    function getUploadedContent($table, $conobj, $course_id) {
        $sql = "SELECT file_name, file_path FROM $table WHERE course_id='$course_id'";
        return $conobj->query($sql);
    }

    // Get Instructor Content
    function getInstructorContent($table, $conobj, $course_id) {
        $sql = "
            SELECT cc.file_name, cc.file_path, oc.course_name
            FROM $table cc
            JOIN offered_courses oc ON cc.course_id = oc.id
            WHERE cc.course_id = '$course_id'
        ";
        return $conobj->query($sql);
    }

    // Get Enrolled Students for a Course
    function getEnrolledStudents($table, $conobj, $course_id) {
        $sql = "
            SELECT students.username, students.contact 
            FROM $table 
            JOIN students ON $table.student_id = students.id
            WHERE $table.course_id='$course_id'
        ";
        return $conobj->query($sql);
    }

    // Upload Assignment
    function uploadAssignment($table, $course_id, $title, $description, $due_date, $file_name, $file_path, $conobj) {
        $sql = "INSERT INTO $table (course_id, title, description, due_date, file_name, file_path) 
                VALUES ('$course_id', '$title', '$description', '$due_date', '$file_name', '$file_path')";
        return $conobj->query($sql);
    }
    // Get Instructor Assignments
    function getInstructorAssignments($table, $course_table, $conobj, $username) {
        $sql = "SELECT a.title, a.description, a.due_date, a.file_name, a.file_path, oc.course_name
                FROM $table a
                JOIN $course_table oc ON a.course_id = oc.id
                WHERE oc.instructor_username = '$username'";

        return $conobj->query($sql);
    }
    // Post Announcement
    function postAnnouncement($table, $course_id, $message, $conobj) {
        $sql = "INSERT INTO $table (course_id, message) VALUES ('$course_id', '$message')";
        return $conobj->query($sql);
    }

    
}
?>
