<?php

function openCon() {
    $dbhost = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "user";
    $connobject = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
    return $connobject;
}

// Function to register a new user
function registerUser($user) {
    $con = openCon();
    $sql = "INSERT INTO users (username, password, email, name, role) VALUES ('{$user['username']}', '{$user['password']}', '{$user['email']}', '{$user['name']}', '{$user['role']}')";
    $result = mysqli_query($con, $sql);
    if($result){
        return true;
    }
    else{
        return false;
    }
}

// Function to log in a user
function loginUser($username, $password) {
    $con = openCon();
    $sql = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        $_SESSION['user'] = ['username' => $user['username'], 'role' => $user['role']];
        return true;
    } else {
        return "Invalid username or password";
    }
}

function getOfferedCourses() {
    $con = openCon();
    $sql = "SELECT * FROM offered_courses";
    $result = mysqli_query($con, $sql);
    $courses = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
    
    return $courses;
}

function getCourseDetails($course_code) {
    $con = openCon();
    $sql = "SELECT * FROM offered_courses WHERE course_code = '$course_code'";
    $result = mysqli_query($con, $sql);
    $course = mysqli_fetch_assoc($result);
    return $course;
}

function enrollStudentInCourse($username, $course_id) {
    $con = openCon();
    $sql = "INSERT INTO enrolled_courses (username, course_id) VALUES ('$username', '$course_id')";

    if (mysqli_query($con, $sql)) {
        return ["success" => true, "message" => "Successfully enrolled!"];
    } else {
        return ["success" => false, "message" => "Enrollment failed."];
    }
}

function getEnrolledCourseCount($username) {
    $con = openCon();
    $sql = "SELECT course_id FROM enrolled_courses WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        $count = mysqli_num_rows($result);
        return ["course_count" => $count];
    }
    return ["message" => "Failed to retrieve enrolled courses count."];
}

function getEnrolledCourses($username) {
    $con = openCon();

    // Step 1: Fetch all course_ids that the user is enrolled in from the enrolled_courses table
    $sql = "SELECT course_id FROM enrolled_courses WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    
    $courses = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $course_id = $row['course_id'];

            // Step 2: For each course_id, fetch the corresponding details from offered_courses table
            $course_sql = "SELECT id, course_name, instructor_username, course_description, course_code
                           FROM offered_courses 
                           WHERE id = '$course_id'";

            $course_result = mysqli_query($con, $course_sql);
            
            if ($course_result && mysqli_num_rows($course_result) > 0) {
                while ($course_row = mysqli_fetch_assoc($course_result)) {
                    $courses[] = $course_row;  // Add the course details to the array
                }
            }
        }
    }

    mysqli_close($con);

    // Return the array of courses
    return ["courses" => $courses];
}




?>