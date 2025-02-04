<?php 
    session_start(); 
    include '../control/my_course_control.php';   
    if (!isset($_SESSION["username"])) { 
        header("Location: ../view/login.php"); // Redirect if not logged in 
        exit(); 
    } 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>My Courses</title>
    <link rel="stylesheet" href="../css/my_courses.css"> <!-- Link to the CSS file -->
</head> 
<body> 
    <h2>My Courses</h2> 
    <div class="course-container"> 
        <?php  
            if ($result && $result->num_rows > 0) { 
                while ($row = $result->fetch_assoc()) { 
                    echo "<div class='course-block'>";
                    echo "<h3>" . htmlspecialchars($row["course_name"]) . "</h3>";
                    echo "<p><strong>Code:</strong> " . htmlspecialchars($row["course_code"]) . "</p>";
                    echo "<p><strong>Description:</strong> " . htmlspecialchars($row["course_description"]) . "</p>";
                    echo "<p><strong>Price:</strong> " . htmlspecialchars($row["price"]) . " Taka</p>";
                    echo "<a href='../view/manage_course.php?course_id=" . $row["id"] . "'>";
                    echo "<button type='button'>Manage Course</button>";
                    echo "</a>";
                    echo "</div>";
                } 
            } else { 
                echo "<p style='text-align: center;'>No courses found.</p>"; 
            } 
        ?> 
    </div> 
    <br> 
    <div style="text-align: center;"> 
        <a href="../view/dashboard.php"> 
            <button type="button">Back to Dashboard</button> 
        </a> 
    </div> 
</body> 
</html>
