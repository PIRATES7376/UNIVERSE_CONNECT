<?php
include '../model/db.php';

function getStudentList($username) {
    $mydb = new mydb();
    $conobj = $mydb->openCon();
    $result = $mydb->getEnrolledStudents("enrollments", "offered_courses", "students", $conobj, $username);
    $list = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $list .= "<tr>
                        <td>{$row['course_name']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['contact']}</td>
                      </tr>";
        }
    } else {
        $list .= "<tr><td colspan='3'>No students enrolled.</td></tr>";
    }

    $conobj->close();
    return $list;
}
?>
