<?php
session_start();
if(session_destroy())
{
    header("Location: ../view/reg.php");
    header("Location: ../view/login.php");

}
?>