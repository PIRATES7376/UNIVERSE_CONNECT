function checkUname() {
    var uname = document.getElementById("username").value;
   

    if (uname === "" ) {
        document.getElementById("error").innerHTML = "Enter a valid username";
        return false;
    } else {
        document.getElementById("error").innerHTML = "";
        return true;
    }
}

function validatePassword() {
    var password = document.getElementById("password").value;
    if (password.length < 3) {
        document.getElementById("passError").innerHTML = "Password must be at least 6 characters long";
        return false;
    } else {
        document.getElementById("passError").innerHTML = "";
        return true;
    }
}

function validation() {
    if (checkUname() === false || validatePassword() === false) {
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}