<?php
include '../control/login_control.php';
?>

<html>

<body>
<h2 style="text-align: center;">Instructor Login Form</h2>
<fieldset>       
<legend> Login Information:</legend> 
<form method= "POST" action= "">
<table>
<td><label for="username">Username:</label></td>
    <td><input type="text" id="username" name="username" ></td>
</tr>   
<tr>
   <td> <label for="password">Password:</label></td>
    <td><input type="password" id="password" name="password"></td>
</tr>
<tr>
<td><button type="submit">Login</button>
<button type="Reset">Clear</button></td>
</tr>
</form>
</body>

</html>