

function goToLogin() {
    window.location.href = "login.html";
}
function goToSignup() {
    window.location.href = "signup.html";
}
   function validateLogin(event) {
    event.preventDefault();
    var email = document.getElementById("email").value.trim();
    var pass = document.getElementById("password").value.trim();
    var error = document.getElementById("error");
    error.innerHTML = "";
    if (!email || !pass) {
        error.innerHTML = "Error. Both field are required";
        return false;
    }
    if (!email.includes("@")) {
        error.innerHTML = "Invalid email";
        return false;
    }
    let emailsub = email.substring(email.indexOf("@") + 1);
    if (emailsub !== "gmail.com") {
        error.innerHTML = "Please use a gmail account.";
        return false;
    }

    if (pass.length > 12) {
        error.innerHTML = "Password too long.";
        return false;
    } else if (pass.length < 6) {
        error.innerHTML = "Password too short.";
        return false;
    }
    window.location.href = "index.html";
}
function validateSignUp() {
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var pass2 = document.getElementById("confirmpass").value;
    var error = document.getElementById("error");
    error.innerHTML = "";
    if (!email || !pass || !pass2) {
        error.innerHTML = "Error. Both field are required";
        return false;
    }
    if (!email.includes("@")) {
        error.innerHTML = "Invalid email";
        return false;
    }
    let emailsub = email.substring(email.indexOf("@") + 1);
    if (emailsub !== "gmail.com") {
        error.innerHTML = "Invalid email";
        return false;
    }

    if (pass.length > 12) {
        error.innerHTML = "Password too long.";
        return false;
    } else if (pass.length < 6) {
        error.innerHTML = "Password too short.";
        return false;
    }
    if (pass !== pass2) {
        error.innerHTML = "Passwords do not match.";
        return false;
    }
    window.location.href = "index.html";
}

function goToPlanting(){
    alert("JS LOADED");
    window.location.href="planting.html";
}
function goToMaintenance(){
    window.location.href="maintenance.html";
}