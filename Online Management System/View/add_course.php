<?php include '../control/add_course_control.php'; ?>

<html>
<head>
    <title>Add New Course</title>
    <link rel="stylesheet" href="../css/add_course.css"> <!-- Link to the CSS file -->
</head>
<body>
    <h2>Add New Course</h2>
    <form method="POST" action="">
        <fieldset>
            <legend>Course Information:</legend>
            <table>
                <tr>
                    <td><label for="course_name">Course Name:</label></td>
                    <td><input type="text" id="course_name" name="course_name" required></td>
                </tr>
                <tr>
                    <td><label for="course_code">Course Code:</label></td>
                    <td><input type="text" id="course_code" name="course_code" required></td>
                </tr>
                <tr>
                    <td><label for="course_description">Course Description:</label></td>
                    <td><textarea id="course_description" name="course_description" rows="4" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="price">Course Price:</label></td>
                    <td><input type="number" id="price" name="price" step="0.01" required></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">Add Course</button></td>
                    <td><button type="reset">Clear</button></td>
                    <td><button type="button"><a href="../view/dashboard.php">Back</a></button></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
