<?php

class mydb{

    function openCon(){
$dbhost="localhost";
$dbusername="root";
$dbpassword="";
$dbname="mydb";
$connobject=new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
return $connobject;    
}
function addInstructor($table,$username,
$password,$Gender,$Conatct,$connobject )
{
    $sql="INSERT INTO $table (username, password , gender, Contact) 
    VALUES 
   ('$username','$password', '$Gender', '$Conatct')";
   return $connobject->query($sql);
   
    }
function login($table, $username, $password, $connobject)
{
        $sql="SELECT username, password FROM $table
        WHERE username='$username' AND password='$password'";
        $result=$connobject->query($sql);
        return $result;
    }
    function getCourses($table, $conobj, $username) {
        $sql = "SELECT * FROM $table WHERE instructor_username='$username'";
        return $conobj->query($sql);
    }
    function addCourse($table, $conobj, $username, $course_name) {
        $sql = "INSERT INTO $table (instructor_username, course_name) VALUES ('$username', '$course_name')";
        return $conobj->query($sql);
    }
}
?>