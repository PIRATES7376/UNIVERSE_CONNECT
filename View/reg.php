 <?php
require '../control/reg_control.php';
?>


<html>
<head>
<title> Universe Connect: A online learning Platform</title>
<body>
<h2 style="text-align: center;">Instructor Registration Form</h2>
<form method ="POST">

<fieldset>       
<legend> Instructor Information:</legend> 
<form action="reg_control.php" method="post" enctype="multipart/form-data">
<table>
<tr>
   <td><label for="fristName">Frist Name:</label></td>
   <td><input type="text" id="firstName" name="firstName" ><td>
</tr>
<tr>
  <td><label for="lastName">Last Name:</label></td>
  <td><input type="text" id="lastName" name="lastName" ></td>
<tr>
        <td><label for="email">Email Address:</label></td>
        <td><input type="email" id="email" name="email"></td>
</tr>
<tr>
        <td><label for="CONTACT">Contact:</label></td>
        <td><input type="CONTACT" id="Contact" name="Contact"></td>
</tr>
<tr>
    <td> Gender: </td>
    <td>
 
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female
    </td>
</tr>

    <tr>
    
    <td><label for="dob">Date of Birth:</label></td>
    <td><input type="date" id="dobPicker" name="dobPicker" ></td>
    </tr>
<tr>
   <td><label for="nid">National ID (NID) Number:</label></td>
    <td><input type="text" id="nid" name="nid"  pattern="^\d{10}|\d{16}$"
           title="NID number must be either 10 or 16 digits.">
</tr>
<tr>
        <td><label for="Nationality">Nationality:</label></td>
        <td><input type="Nationality" id="Nationality" name="Nationality"></td>
</tr>
<tr>
<td> <label for="profile-picture">Profile Picture:</label></td>
<td><input type="file" name="profile-picture" > </td>
</tr>
<tr>
    <td><label for="qualifications">Qualifications and Experience:</label></td>
    <td><input type="text" id="qualifications" name="qualifications" placeholder="e.g., PhD in Mathematics, 10 years teaching experience" ></td>

<tr>
        <td><label for="bio">Bio/Professional Summary:</label></td>
   <td> <textarea id="bio" name="bio" rows="4" placeholder="A brief introduction about yourself..." ></textarea></td>

</tr>
<tr>
    <td><label for="institution">Educational Institution:</label></td>
    <td><input type="text" id="institution" name="institution" placeholder="e.g., University of XYZ" ></td>
</tr>
<tr>
 <td><label for="language">Preferred Language:</label><td>
   <select id="language" name="language" >
      <option value="English">English</option>
      <option value="BANGLA">BANGLA</option>
      <option value="French">French</option>
      <option value="German">German</option>
    </select>
</tr>

<tr>
<td><label for="username">Username:</label></td>
    <td><input type="text" id="username" name="username" ></td>
    <td><?php echo $unanmeError; ?></td>
</tr>
<tr>
   <td> <label for="password">Password:</label></td>
    <td><input type="password" id="password" name="password"></td>
</tr>
<tr>
    <td><label>
      <input type="checkbox" name="terms" required> I agree to the <a href="/terms">terms and conditions</a>.
    </label></td>
</tr>
<tr>
<td><button type="submit">Register</button>
<button type="Reset">Clear</button></td>
</tr>
  </form>
</form>
</table>
</fieldset>
</html>