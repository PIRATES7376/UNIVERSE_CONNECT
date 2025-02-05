<?php 
include '../control/showOfferCourseControl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Featured Courses</title> -->
    <link rel="stylesheet" href="../css/course.css"> <!-- Link to your external CSS file -->
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION['user'])){
            require('navbar.php');
        }else{
            require('stNavBar.php');
        }
    ?>
    

    <section class="featured-courses">
    <h2>Featured Courses</h2>
        <div class="course-grid">
            <?php foreach ($courses as $course): ?>
                <div class="course-item">
                    <h3><?php echo $course['course_name']; ?></h3>
                    <p><?php echo $course['course_description']; ?></p>
                    <p class="course-price"><?php echo htmlspecialchars($course['price']); ?> Taka Only</p>
                    <a href="course_details.php?course=<?php echo urlencode($course['course_code']); ?>" class="btn">Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


    
</body>
</html>