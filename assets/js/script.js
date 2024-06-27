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
                window.location.href = "../../index.php";
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
            if (request.responseText == "success") {
                alert("Product added to your wishlist");
            } else {
                alert(request.responseText);
            }
        }
    };
    request.open("GET", "/EMart/App/process/addToWishlistProcess.php?product_id=" + product_id, true);
    request.send();

}

function removeFromWishlist(product_id) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if (request.responseText == "Success") {
                window.location.reload();
            } else {
                alert(request.responseText);
            }
        }
    };
    request.open("GET", "../../App/process/removeFromWishlistProcess.php?product_id=" + product_id, true);
    request.send();
}

var product_id_for_add_to_cart;

function open_wishlist_single_item_popup_view_modal(product_id, title, description, price, points, image_path) {

    product_id_for_add_to_cart = product_id;

    if (image_path.startsWith("../")) {
        document.getElementById("product_image").src = image_path;
    } else {
        document.getElementById("product_image").src = "../../" + image_path;
    }

    document.getElementById("product_name").innerHTML = title;
    document.getElementById("price").innerHTML = price;
    document.getElementById("product_description").innerHTML = description;
    document.getElementById("quantityInputInPopup").value = 1;

    document.getElementById("addToCartBtn").classList.add("d-block");
    document.getElementById("buyNowBtn").classList.add("d-none");

    const wishlist_single_item_popup_view_modal = new bootstrap.Modal(document.getElementById("wishlist_single_item_popup_view_modal"), {})
    wishlist_single_item_popup_view_modal.show();
}


function open_cart_single_item_popup_view_modal(title, description, price, points, image_path, qty) {

    if (image_path.startsWith("../")) {
        document.getElementById("product_image").src = image_path;
    } else {
        document.getElementById("product_image").src = "../../" + image_path;
    }

    document.getElementById("product_name").innerHTML = title;
    document.getElementById("price").innerHTML = price;
    document.getElementById("product_description").innerHTML = description;
    document.getElementById("quantityInputInPopup").value = qty;

    document.getElementById("addToCartBtn").classList.add("d-none");
    document.getElementById("buyNowBtn").classList.add("d-block");


    const wishlist_single_item_popup_view_modal = new bootstrap.Modal(document.getElementById("wishlist_single_item_popup_view_modal"), {})
    wishlist_single_item_popup_view_modal.show();
}

function validateQuantity(inputElement) {
    var quantityInput = inputElement;
    var value = quantityInput.value;

    // Ensure the value is a positive integer
    value = value.replace(/\D/g, '');
    if (value === '' || value < 1) {
        quantityInput.value = 1; // Set a minimum value of 1
    } else {
        quantityInput.value = parseInt(value);
    }
}

function validateKeyPressOfQuantityInput(event) {
    // Prevent user from typing negative sign
    if (event.key === '-' || event.key === '+') {
        event.preventDefault();
    }
}

function addToCart(product_id) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responseText = request.responseText;
            alert(responseText);
            if (responseText == "Login First" || responseText == "Something went wrong. Try Sign In again") {
                window.location.href = "/EMart/App/views/signIn.php";
            }
        }
    };
    request.open("GET", "/EMart/App/process/addToCart.php?product_id=" + product_id, true);
    request.send();
}

function removeFromCart(product_id) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if (request.responseText == "Success") {
                window.location.reload();
            } else {
                alert(request.responseText);
            }
        }
    };
    request.open("GET", "../../App/process/removeFromCart.php?product_id=" + product_id, true);
    request.send();
}

function addToCartFromPopup() {

    if (product_id_for_add_to_cart != null && product_id_for_add_to_cart != undefined && product_id_for_add_to_cart != "") {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                if (request.responseText == "Product successfully added to your cart") {

                    var r = new XMLHttpRequest();
                    r.onreadystatechange = function () {
                        if (r.readyState == 4 && r.status == 200) {
                            if (r.responseText == "Success") {
                                product_id_for_add_to_cart = null;
                                window.location.reload();
                            }
                        }
                    }
                    r.open("GET", "../../App/process/removeFromWishlistProcess.php?product_id=" + product_id_for_add_to_cart);
                    r.send();

                } else {
                    alert(request.responseText);
                }
            }
        };
        request.open("GET", "../../App/process/addToCart.php?product_id=" + product_id_for_add_to_cart, true);
        request.send();
    }

}

function searchProducts(category_id) {
    var searchText = document.getElementById("searchText").value;
    var categoryid = category_id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var response = request.responseText;

            if (response == "No Products" || response == "Something Went Wrong" || response == "Please enter the Name of the product you are looking for") {
                alert(response);
            } else {

                localStorage.setItem("searchedProductsDesign", JSON.stringify(response));
                window.location.href = "/EMart/App/views/searchedProducts.php";

            }
        }
    };
    request.open("GET", "/EMart/App/process/searchProcess.php?searchText=" + searchText + "&categoryID=" + categoryid, true);
    request.send();
}

function adminSignIn() {

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {

            if (r.responseText == "success") {
                alert("Admin logged successfully");
                window.location.href = "/EMart/App/adminViews/dashboard.php";
            } else {
                alert(r.responseText);
            }

        }
    }
    r.open("POST", "../../App/adminProcess/signInProcess.php", true);
    r.send(formData);

}


function loadProductDetailsForAdmin() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            document.getElementById("tableBody").innerHTML = request.responseText;
        }
    }
    request.open('POST', '../adminProcess/loadAllProductDetails.php', true);
    request.send();
}

function loadCategories() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            document.getElementById("tableBody").innerHTML = request.responseText;
        }
    }
    request.open('POST', '../adminProcess/loadAllCategoryDetails.php', true);
    request.send();
}

function loadBrandDetails() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            document.getElementById("tableBody").innerHTML = request.responseText;
        }
    }
    request.open('POST', '../adminProcess/loadAllBrandDetails.php', true);
    request.send();
}


function loadColorsForAdminProductManagementModal() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("productColor").innerHTML = request.responseText;
            document.getElementById("productColorInAddProductModal").innerHTML = request.responseText;
        }
    }
    request.open('POST', '../adminProcess/loadColorsForAdminProductManagementModal.php', true);
    request.send();
}


function loadProductModelsForAdminProductManagementModal() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("productModel").innerHTML = request.responseText;
            document.getElementById("productModelInAddProductModal").innerHTML = request.responseText;
        }
    }
    request.open('POST', '../adminProcess/loadProductModelsForAdminProductManagementModal.php', true);
    request.send();
}

function loadCategoriesForAdminProductManagementModal() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("productCategory").innerHTML = request.responseText;
            document.getElementById("productCategoryInAddProductModal").innerHTML = request.responseText;
        }
    }
    request.open('POST', '../adminProcess/loadProductCategoriesForAdminProductManagementModal.php', true);
    request.send();
}

function loadBrandForAdminProductManagementModal() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("productBrand").innerHTML = request.responseText;
            document.getElementById("productBrandInAddProductModal").innerHTML = request.responseText;
        }
    }
    request.open('POST', '../adminProcess/loadProductBrandsForAdminProductManagementModal.php', true);
    request.send();
}

function advancedSearchRequest() {
    var searchText = document.getElementById('searchTextInAdvancedSearchPage').value;
    var sortOption = document.getElementById('sortOption').value;
    var category = document.getElementById('categoryDropdown').value;
    var minPrice = document.getElementById('minPrice').value;
    var maxPrice = document.getElementById('maxPrice').value;
    var brand = document.getElementById('brandDropdown').value;
    var color = document.getElementById('colorDropdown').value;

    var minValue = parseInt(document.getElementById('minPrice').value);
    var maxValue = parseInt(document.getElementById('maxPrice').value);

    if (minValue > maxValue) {
        alert("Minimum price should be less than the maximum price");
    } else {
        var formData = new FormData();
        formData.append('searchText', searchText);
        formData.append('sortOption', sortOption);
        formData.append('category', category);
        formData.append('minPrice', minPrice);
        formData.append('maxPrice', maxPrice);
        formData.append('brand', brand);
        formData.append('color', color);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText != "Default") {
                    document.getElementById("productDiv").innerHTML = xhr.responseText;
                    console.log(xhr.responseText);
                }
            }
        };
        xhr.open('POST', "../process/advancedSearchProcess.php", true);
        xhr.send(formData);
    }

}


function validatePriceInputsInProductManagementPanel(input) {
    var inputField = input;
    var enteredValue = inputField.value;

    // Replace non-numeric characters except the dot
    var convertedValue = enteredValue.replace(/[^0-9.]/g, '');

    // Avoid multiple dots
    convertedValue = convertedValue.replace(/(\..*)\./g, '$1');

    // If the first character is a dot, prepend zero
    if (convertedValue.startsWith('.')) {
        convertedValue = '0' + convertedValue;
    }

    // Update the input field if the value has changed
    if (convertedValue !== enteredValue) {
        inputField.value = convertedValue;
    }
}

function validateQuantityInputInProductManagementModal(input) {

    const quantityInputValue = input.value;

    const convertedValue = quantityInputValue.replace(/\D/g, '');

    if (convertedValue !== quantityInputValue) {
        input.value = convertedValue;
    }

}

function validateNoInputInUserProfile(input) {
    const quantityInputValue = input.value;

    const convertedValue = quantityInputValue.replace(/\D/g, '');

    if (convertedValue !== quantityInputValue) {
        input.value = convertedValue;
    }
}

function updateAddressDetails() {
    var email = document.getElementById("email").value;
    var addressNo = document.getElementById("address_no").value;
    var addressLine1 = document.getElementById("address_line1").value;
    var addressLine2 = document.getElementById("address_line2").value;
    var district = document.getElementById("district").value;

    var form = new FormData();

    form.append("email", email);
    form.append("addressNo", addressNo);
    form.append("addressLine1", addressLine1);
    form.append("addressLine2", addressLine2);
    form.append("district", district);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            alert(request.responseText)

            if (request.responseText == "Address details updated successfully.") {
                window.location.reload();
            }
        }
    }
    request.open('POST', '../process/updateUserAddressDetails.php', true);
    request.send(form);


}


function payNow(product_id) {
    var quantity = document.getElementById("quantity").value;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var response = request.responseText;

            if (response == "Login First") {
                window.location.href = "/EMart/App/views/signIn.php";
                alert(response);
            } else if (response == "Please update your address details.") {
                window.location.href = "/EMart/App/views/profile.php";
                alert(response);
            } else {

                var responseObject = JSON.parse(response);

                var userEmail = responseObject["userEmail"];
                var total = responseObject["total"];


                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);
                    // Note: validate the payment and show success or failure page to the customer

                    saveInvoice(orderId, product_id, userEmail, total, quantity);
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": responseObject["merchant_id"],    // Replace your Merchant ID
                    "return_url": "http://localhost/EMart/App/views/singleProductView.php?product_id=" + product_id,     // Important
                    "cancel_url": "http://localhost/EMart/App/views/singleProductView.php?product_id=" + product_id,      // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": responseObject["order_id"],
                    "items": responseObject["product_title"],
                    "amount": responseObject["total"] + ".00",
                    "currency": "LKR",
                    "hash": responseObject["hash"], // *Replace with generated hash retrieved from backend
                    "first_name": responseObject["first_name"],
                    "last_name": responseObject["last_name"],
                    "email": userEmail,
                    "phone": responseObject["mobile"],
                    "address": responseObject["address"],
                    "city": responseObject["district"],
                    "country": "Sri Lanka",
                    "delivery_address": responseObject["address"],
                    "delivery_city": responseObject["district"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function (e) {
                payhere.startPayment(payment);
                // };
            }


        }
    }
    request.open('GET', '../process/buyNowProcess.php?product_id=' + product_id + "&quantity=" + quantity, true);
    request.send();
}


function saveInvoice(orderId, product_id, userEmail, total, quantity) {
    var form = new FormData();

    form.append("orderId", orderId);
    form.append("product_id", product_id);
    form.append("userEmail", userEmail);
    form.append("total", total);
    form.append("quantity", quantity);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            alert(request.responseText);
            // if (request.responseText == "success") {

            // }
        }
    }
    request.open('POST', '../process/saveInvoiceProcess.php', true);
    request.send(form);

}

function previewCategoryImage(event) {

    var inputElement = event.target;
    var file = inputElement.files[0];

    if (file) {
        var url = URL.createObjectURL(file);
        document.getElementById('categoryImagePreview').src = url;
    }
}

function previewNewCategoryImage(event) {
    var inputElement = event.target;
    var file = inputElement.files[0];

    if (file) {
        var fileType = file.type;
        if (fileType.startsWith('image/')) {
            var url = URL.createObjectURL(file);
            var imgPreview = document.getElementById('newCategoryImagePreview');
            imgPreview.src = url;
            imgPreview.classList.remove('d-none');
            imgPreview.classList.add('d-block');
        } else {
            alert('Please upload only image files (JPEG, PNG, SVG).');
            inputElement.value = '';
            document.getElementById('newCategoryImagePreview').src = '';
            document.getElementById('newCategoryImagePreview').classList.add('d-none');
        }


    }
}


function previewproductImage(event) {
    var inputElement = event.target;
    var file = inputElement.files[0];

    if (file) {
        var url = URL.createObjectURL(file);

        var productImagePreviewElement = document.getElementById('productImagePreview');
        productImagePreviewElement.classList.remove('d-none');
        productImagePreviewElement.classList.add('d-block');
        productImagePreviewElement.src = url;
    }
}


function previewNewProductImage(event) {
    var inputElement = event.target;
    var file = inputElement.files[0];

    if (file) {
        var fileType = file.type;
        if (fileType.startsWith('image/')) {
            var url = URL.createObjectURL(file);
            var imgPreview = document.getElementById('newProductImagePreview');
            imgPreview.src = url;
            imgPreview.classList.remove('d-none');
            imgPreview.classList.add('d-block');
        } else {
            alert('Please upload only image files (JPEG, PNG, SVG).');
            inputElement.value = '';
            document.getElementById('newProductImagePreview').src = '';
            document.getElementById('newProductImagePreview').classList.add('d-none');
        }


    }
}

function loadTodayIncomeInAdminDashboard() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("todayIncome").innerHTML = "Rs " + request.responseText + ".00";
        }
    }
    request.open('GET', '../adminProcess/getTodayIncome.php', true);
    request.send();
}

function loadTodayInvoiceCount() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("todayInvoices").innerHTML = request.responseText;
        }
    }
    request.open('GET', '../adminProcess/getTodayInvoiceCount.php', true);
    request.send();
}

function loadHappyCustomerCount() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("happyCustomerCount").innerHTML = request.responseText;
        }
    }
    request.open('GET', '../adminProcess/getHappyCustomerCount.php', true);
    request.send();
}

function loadTopSellingItemDetailsToTheTable() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("topSellingItemsTableBody").innerHTML = request.responseText;
        }
    }
    request.open('GET', '../adminProcess/getTopSellingItemDetailsProcess.php', true);
    request.send();
}