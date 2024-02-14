function loadBestSellingItems(category_name) {

    var category_name = category_name;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("best_selling_items_div").innerHTML = request.responseText;
        }
    };
    request.open("GET", "App/process/loadBestSellingItemsProcess.php?category_name=" + category_name, true);
    request.send();

}

function loadTopRatedItems(category_name) {

    var category_name = category_name;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            document.getElementById("top_rated_items_div").innerHTML = request.responseText;
        }
    };
    request.open("GET", "App/process/loadTopRatedItemsProcess.php?category_name=" + category_name, true);
    request.send();
}

function signUp() {

    var first_name = document.getElementById("first_name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var password = document.getElementById("password").value;

    var form = new FormData();
    form.append("first_name", first_name);
    form.append("last_name", last_name);
    form.append("email", email);
    form.append("mobile", mobile);
    form.append("password", password);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if (request.responseText == "success") {
                window.location.href = "signIn.php";
            } else {
                alert(request.responseText);
            }
        }
    };
    request.open("POST", "../../App/process/signUpProcess.php", true);
    request.send(form);
}

function signIn() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var remember_me = document.getElementById("remember_me").checked;
    // alert(remember_me);

    var form = new FormData();
    form.append("email", email);
    form.append("password", password);
    form.append("remember_me", remember_me);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if (request.responseText == "success") {
                window.location.href = "profile.php";
            } else {
                alert(request.responseText);
            }


        }
    };
    request.open("POST", "../../App/process/signInProcess.php", true);
    request.send(form);
}

function updateProfileDetails() {

    var first_name = document.getElementById("first_name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var password = document.getElementById("password").value;
    var image_file = document.getElementById("profile_img").files[0];

    var form = new FormData();
    form.append("first_name", first_name);
    form.append("last_name", last_name);
    form.append("email", email);
    form.append("mobile", mobile);
    form.append("password", password);
    form.append("image_file", image_file);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            alert(request.responseText);

            if (request.responseText == "success") {
                window.location.reload();
            }
        }
    };
    request.open("POST", "../../App/process/profileDetailsUpdateProcess.php", true);
    request.send(form);

}

function changeProfileImage() {

    var profile_img = document.getElementById("profile_img");

    profile_img.onchange = function () {
        var new_img = this.files[0];

        var url = window.URL.createObjectURL(new_img);

        document.getElementById("image").src = url;
    }

}

function signOut() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if ("success") {
                window.location.href = "../../index.php";
            }
        }
    };
    request.open("GET", "../../App/process/signOutProcess.php", true);
    request.send();
}

function addToWishList(product_id) {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            alert(request.responseText);
        }
    };
    request.open("GET", "App/process/addToWishlistProcess.php?product_id=" + product_id, true);
    request.send();

}