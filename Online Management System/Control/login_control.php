<?php
session_start();
include '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } 
    else 
    {
        $mydb = new mydb();
        $conobj = $mydb->openCon();
    
        $result = $mydb->login("instructor", $username, $password, $conobj);

        if ($result->num_rows > 0) 
        {
            $_SESSION['username'] = $username;

            header("Location: ../view/dashboard.php");
            exit();
        } 
        else 
        {
            echo "Invalid username or password.";
        }
    }
}
?>
