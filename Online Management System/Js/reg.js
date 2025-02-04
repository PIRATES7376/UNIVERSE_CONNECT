function printText(){

    var text = document.getElementById("input").value;
    document.getElementById("print").innerHTML=text;
}

function checkUsername(){
    var username = document.getElementById("username").value;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if(username=="" || !emailRegex.test(username)){
        document.getElementById("error").innerHTML="enter valid  username";
        return false;
    }
    else{
        document.getElementById("error").innerHTML="";
    }
}
function validatePassword() {
    var pass = document.getElementById("pass").value;
    if(pass<3){
        document.getElementById("passError").innerHTML="enter valid  password";
        return false;
    }
}
function validation(){
  
    if(checkUsername()==false || validatePassword()==false){
        return false;
    }
}