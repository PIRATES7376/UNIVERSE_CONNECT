<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <link rel="stylesheet" href="../css/assignments.css"> <!-- Link to the CSS file -->
</head>
<body>
    <?php
    session_start(); // Start the session before including stNavBar.php
    require('stNavBar.php'); // Include the student navigation bar
    ?>

    <div class="assignments-container">
        <h1>Upcoming Assignments</h1>

        <!-- Assignment List -->
        <div class="assignment-list">
            <!-- Assignment 1 -->
            <div class="assignment-card">
                <h3>Assignment 1: Physics Problem Set</h3>
                <p>Due Date: October 25, 2023</p>
                <p>Status: <span class="status pending">Pending</span></p>
                <a href="assignmentDetails.php?id=1" class="btn view-btn">View Details</a>
                <a href="submitAssignment.php?id=1" class="btn submit-btn">Submit Assignment</a>
            </div>

            <!-- Assignment 2 -->
            <div class="assignment-card">
                <h3>Assignment 2: Chemistry Problem Set</h3>
                <p>Due Date: October 30, 2023</p>
                <p>Status: <span class="status submitted">Submitted</span></p>
                <a href="assignmentDetails.php?id=2" class="btn view-btn">View Details</a>
                <a href="submitAssignment.php?id=2" class="btn submit-btn disabled">Submitted</a>
            </div>

            <!-- Assignment 3 -->
            <div class="assignment-card">
                <h3>Assignment 3: Biology Homework</h3>
                <p>Due Date: November 5, 2023</p>
                <p>Status: <span class="status pending">Pending</span></p>
                <a href="assignmentDetails.php?id=3" class="btn view-btn">View Details</a>
                <a href="submitAssignment.php?id=3" class="btn submit-btn">Submit Assignment</a>
            </div>
        </div>
    </div>

    <!-- Link to the JavaScript file for dynamic functionality -->
    <script src="../js/assignments.js"></script>
</body>
</html>