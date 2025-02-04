<?php 
session_start();
include '../model/db.php';

// Ensure instructor is logged in
if (!isset($_SESSION["username"])) {
    header("Location: ../view/login.php");
    exit();
}

// Handle assignment upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload_assignment'])) {
    $course_id = $_POST['course_id'];
    $assignment_title = $_POST['assignment_title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp_name = $file['tmp_name'];
    $file_error = $file['error'];

    if ($file_error === 0) {
        $upload_dir = '../uploads/assignments/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_path = $upload_dir . basename($file_name);

        if (move_uploaded_file($file_tmp_name, $file_path)) {
            $mydb = new mydb();
            $conobj = $mydb->openCon();
            $result = $mydb->uploadAssignment("assignments", $course_id, $assignment_title, $description, $due_date, $file_name, $file_path, $conobj);
            if ($result) {
                echo "File uploaded successfully.";
                header("Location: ../view/assignments.php");
                exit();
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    }

    $conobj->close();
}

// Function to get courses for the logged-in instructor
function getCoursesOptions($username) {
    $mydb = new mydb();
    $conobj = $mydb->openCon();
    $sql = "SELECT id, course_name FROM offered_courses WHERE instructor_username = ?";
    $stmt = $conobj->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['course_name']}</option>";
        }
    } else {
        $options .= "<option>No courses available</option>";
    }

    $conobj->close();
    return $options;
}

function getAssignments($username) {
    $mydb = new mydb();
    $conobj = $mydb->openCon();
    
    $course_table = "offered_courses";
    $result = $mydb->getInstructorAssignments("assignments", $course_table, $conobj, $username);
    
    $assignments = "";
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $assignments.= "<tr>
                <td>{$row['course_name']}</td>
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>
                <td>{$row['due_date']}</td>
                <td><a href='{$row['file_path']}'>Download</a></td>
            </tr>";
        }
    } else {
        $assignments .= "<tr><td colspan='5'>No assignments found.</td></tr>";
    }
    
    $conobj->close();
    return $assignments;
}
?>
