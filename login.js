

function goToLogin() {
    window.location.href = "login.html";
}
function goToSignup() {
    window.location.href = "signup.html";
}
function logout() {
    var sure = confirm("Are you sure you want to logout?");
    if (sure) {
        window.location.href = "logout.php";
    }
}
function confirmRedirectBuy() {
    var sure = confirm("Please log in to make a purchase, do you want to go to login now?");
    if (sure) {
        window.location.href = "login.php";
    }
}
function confirmRedirectOther() {
    var sure = confirm("Please log in to proceed, do you want to go to login now?");
    if (sure) {
        window.location.href = "login.php";
    }
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
}

function goToPlanting(){
    window.location.href="planting.html";
}
function goToMaintenance(){
    window.location.href="maintenance.html";
}
function addToCart(productId) {
    fetch("add_to_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + productId
    })
    .then(response => response.text())
    .then(data => {
        alert("Product added to cart!");
    })
    .catch(error => {
        console.error(error);
    });
}
function removeFromCart(productId) {
    fetch("remove_from_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + productId
    })
    .then(res => res.text())
    .then(data => {
        alert("Removed from cart!");
        console.log(data);
    })
    .catch(err => console.error(err));
}