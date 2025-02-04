<?php 
session_start(); 
include '../model/db.php';  

// Ensure course_id is defined from GET, POST, or SESSION
$course_id = isset($_GET['course_id']) ? $_GET['course_id'] : (isset($_SESSION['course_id']) ? $_SESSION['course_id'] : '');

if (empty($course_id)) {
    echo "Error: Course ID is missing.";
    exit();
}

function getContentList($course_id) {
    $mydb = new mydb();
    $conobj = $mydb->openCon();
    
    // Fetch the content details including course_name from offered_courses
    $result = $mydb->getInstructorContent("course_content", $conobj, $course_id);
    
    $list = "";
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $list .= "<tr>
                        <td>{$row['course_name']}</td>
                        <td>{$row['file_name']}</td>
                        <td><a href='{$row['file_path']}' download>Download</a></td>
                      </tr>";
        }
    } else {
        $list .= "<tr><td colspan='3'>No content found.</td></tr>";
    }
    
    $conobj->close();
    return $list;
}


?>
