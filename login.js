

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
function confirmRedirect() {
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

function goToPlanting() {
    window.location.href = "planting.php";
}
function goToMaintenance() {
    window.location.href = "maintenance.php";
}
function addToCart(productId) {

}
function removeFromCart(productId) {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "cartFrame";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "removeFromCart.php";
    form.target = ifr.name;
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "product_id";
    input.value = productId;
    form.append(input);
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();

    displayCart();
}

function displayCart() {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "cartFrame2";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "cartTable.php";
    form.target = ifr.name;
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();
}

function checkDiscount(code) {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "discountFrame";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "discount.php";
    form.target = ifr.name;
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "code";
    input.value = code;
    form.append(input);
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();
}

function addToBouquet(id, quantity) {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "bouquetFrame";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "addToBouquet.php";
    form.target = ifr.name;
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "id";
    input.value = id;
    form.append(input);
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "quantity";
    input.value = quantity;
    form.append(input);
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();

    displayBouquet();
    alert("Added to bouquet!");
}

function addToCustomBouquets() {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "bouquetFrame";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "addToCustomBouquets.php";
    form.target = ifr.name;
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();

    displayBouquet();
    alert("Added bouquet to cart!");
}

function removeFromBouquet(bouquet_id) {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "bouquetFrame";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "removeFromBouquet.php";
    form.target = ifr.name;
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "bouquet_id";
    input.value = bouquet_id;
    form.append(input);
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();

    displayBouquet();
}

function displayBouquet() {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "bouquetFrame2";
    ifr.id = "bouquetIFrame2";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "bouquetTable.php";
    form.target = ifr.name;
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();
}

function addToCart(id, quantity) {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "cartFrame";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "addToCart.php";
    form.target = ifr.name;
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "id";
    input.value = id;
    form.append(input);
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "quantity";
    input.value = quantity;
    form.append(input);
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();

    alert("Added to cart!");
}

function addToPlanting(id, quantity) {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "plantingFrame";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "addToPlanting.php";
    form.target = ifr.name;
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "id";
    input.value = id;
    form.append(input);
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "quantity";
    input.value = quantity;
    form.append(input);
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();

    alert("Added to planting!");
}

function removeFromPlanting(planting_id) {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "plantingFrame";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "removeFromPlanting.php";
    form.target = ifr.name;
    input = document.createElement("input");
    input.type = "hidden";
    input.name = "planting_id";
    input.value = planting_id;
    form.append(input);
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();

    displayPlanting();
}

function displayPlanting() {
    ifr = document.createElement("iframe");
    ifr.hidden = true;
    ifr.name = "plantingFrame2";
    ifr.id = "plantingIFrame2";
    form = document.createElement("form");
    form.method = "POST";
    form.action = "plantingTable.php";
    form.target = ifr.name;
    ifr.appendChild(form);
    document.body.appendChild(ifr);
    form.submit();
}

function displayBooking(doc) {
    priceP = doc.getElementById("totalPricePlantingService");
    countPlants = doc.getElementsByClassName("planting-row").length;
    priceP.textContent = (parseFloat(doc.querySelector('#plantingTotal').textContent.replace('$', '')) + 15) || 0;
    priceP.textContent = priceP.textContent.substring(0, priceP.textContent.indexOf(".") + 3);
    priceI = doc.getElementById("totalPriceInput");
    priceI.value = priceP.textContent;
}