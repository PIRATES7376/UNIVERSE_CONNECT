<?php include('../control/sessionControl.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css"> 
</head>
<body>
    <?php require('stNavBar.php'); ?>

    <div class="dashboard-content">
        
        <div class="card">
            <h3>My Courses</h3>
            <p>You are enrolled in <span id="courseCount">0</span> courses.</p> 
            <a href="enrolledCourses.php" class="btn">View Courses</a> 
        </div>
        
        <div class="card">
            <h3>Upcoming Assignments</h3>
            <p>You have 2 assignments due this week.</p>
            <a href="assignments.php" class="btn">View Assignments</a> 
        </div>
        
    
    </div>

    <script src="../js/getCourseCount.js"></script>
</body>
</html>
