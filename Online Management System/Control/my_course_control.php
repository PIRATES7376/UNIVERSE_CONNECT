<?php
include '../model/db.php';


        $mydb = new mydb();
        $conobj = $mydb->openCon(); // Establish database connection
        $username = $_SESSION["username"];
        $result = $mydb->getCourses("offered_courses", $conobj, $username);
        
        $conobj->close(); // Close connection after query execution
        return $result;
        $conobj->close();
?>

