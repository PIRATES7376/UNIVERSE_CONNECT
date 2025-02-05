<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants List</title>
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php"><span>Welcome, <?php echo $_SESSION['user']['username'];?>!</span></a>
        <div class="navbar-links">
            <a href="courses.php">Courses</a>
            <a href="assignments.php">Assignments</a>
            <a href="logout.php">Logout</a> 
        </div>
    </div>
</body>
</html>