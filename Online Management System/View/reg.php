<?php  
require '../control/reg_control.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universe Connect: Online Learning Platform</title>
    <link rel="stylesheet" href="../Css/style.css">
    
</head>
<body>
    <div class="registration-container">
        <h2>Instructor Registration Form</h2>

        <form action="../control/reg_control.php" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
            <fieldset>
                <legend>Instructor Information:</legend>

                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="Contact" required pattern="^\d{10,15}$" title="Contact must be between 10 to 15 digits">

                <label>Gender:</label>
                <input type="radio" name="gender" value="male" required> Male
                <input type="radio" name="gender" value="female"> Female

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dobPicker" name="dobPicker" required>

                <label for="nid">National ID (NID) Number:</label>
                <input type="text" id="nid" name="nid" required pattern="^\d{10}|\d{16}$" title="NID number must be either 10 or 16 digits">

                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="Nationality" required>

                <label for="profile-picture">Profile Picture:</label>
                <input type="file" name="profile-picture">

                <label for="qualifications">Qualifications and Experience:</label>
                <input type="text" id="qualifications" name="qualifications" placeholder="e.g., PhD in Mathematics, 10 years teaching experience" required>

                <label for="bio">Bio/Professional Summary:</label>
                <textarea id="bio" name="bio" rows="4" placeholder="A brief introduction about yourself..." required></textarea>

                <label for="institution">Educational Institution:</label>
                <input type="text" id="institution" name="institution" placeholder="e.g., University of XYZ" required>

                <label for="language">Preferred Language:</label>
                <select id="language" name="language">
                    <option value="English">English</option>
                    <option value="Bangla">Bangla</option>
                    <option value="French">French</option>
                    <option value="German">German</option>
                </select>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <span id="error" class="error"><?php echo $unanmeError; ?></span>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span id="passError" class="error"></span>

                <label>
                    <input type="checkbox" name="terms" required> I agree to the <a href="/terms">terms and conditions</a>.
                </label>

                <button type="submit">Register</button>
                <button type="reset">Clear</button>
            </fieldset>
        </form>
    </div>
    <script src="../js/reg.js"></script>
</body>
</html>
