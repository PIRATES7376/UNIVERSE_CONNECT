<?php
session_start();
if(session_destroy())
{
    header("Location: ../Instructor/reg.php");
    header("Location: ../Instructor/login.php");

}
?>