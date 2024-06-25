<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
    <link rel="icon" href="../../assets/css/style.css" />

    <title>Product Management</title>
</head>

<body onload="loadProductDetailsForAdmin(); loadColorsForAdminProductManagementModal(); loadProductModelsForAdminProductManagementModal(); loadCategoriesForAdminProductManagementModal(); loadBrandForAdminProductManagementModal();">

    <div class="container-fluid">
        <div class="row">
            <?php
            include("../../config.php");
            include("../../components/adminHeader.php");
            ?>
        </div>
        <div class="row mt-3">


            <!-- Search bar and button -->
            <div class="col-md-6 offset-md-3">
                <div class="input-group">
                    <input type="text" class="form-control " placeholder="Search products..." style="width: 400px;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-warning " type="submit">Search</button>
                    </div>
                </div>
            </div>


            <!-- Product details table -->
            <div class="col-md-10 offset-md-1 mt-5">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Title</th>
                                        <th>Product Status</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Add product button -->
            <div class="col-md-10 offset-md-1 mt-3">
                <div class="row mt-3">
                    <div class="col-10 col-md-4">
                        <button class="btn btn-success mb-2" onclick="openAddProductModal()">Add New Product</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Update Modal -->
        <div class="modal fade" id="productModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-light">
                    <div class="modal-header bg-success bg-opacity-50 text-white">
                        <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                        <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close" onclick="productViewPopupClose()">

                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mt-3">
                                        <h6>Product ID</h6>
                                        <input type="text" class="form-control" id="productId" readonly>
                                    </div>
                                    <div class="mt-3">
                                        <h6>Title</h6>
                                        <input type="text" class="form-control" id="productTitle">
                                    </div>
                                    <div class="mt-3">
                                        <h6>Quantity</h6>
                                        <input type="text" class="form-control" id="productQuantity" oninput="validateQuantityInputInProductManagementModal(this)">
                                    </div>
                                    <div class="mt-3">
                                        <h6>Model</h6>
                                        <select class="form-select" id="productModel">

                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <h6>Description</h6>
                                        <input type="text" class="form-control" id="productDescription">
                                    </div>
                                    <div class="mt-3">
                                        <h6>Date Added</h6>
                                        <input id="productDateAdded" class="form-control" readonly />
                                    </div>
                                    <div class="mt-3">
                                        <h6>Points</h6>
                                        <input id="productPoints" class="form-control" readonly />
                                    </div>
                                    <!-- <div class="mt-3">
                                        <h6>Quantity</h6>
                                        <input type="text" class="form-control" id="productQuantity" oninput="validateQuantityInputInProductManagementModal(this)">
                                    </div> -->
                                    <div class="mt-3">
                                        <h6>Price</h6>
                                        <input type="text" class="form-control" id="productPrice" oninput="validatePriceInputsInProductManagementPanel(this)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-3">
                                        <h6>Delivery Fee (Colombo)</h6>
                                        <input type="text" class="form-control" id="productDeliveryFeeColombo" oninput="validatePriceInputsInProductManagementPanel(this)">
                                    </div>
                                    <div class="mt-3">
                                        <h6>Delivery Fee (Other)</h6>
                                        <input type="text" class="form-control" id="productDeliveryFeeOther" oninput="validatePriceInputsInProductManagementPanel(this)">
                                    </div>
                                    <div class="mt-3">
                                        <h6>Color</h6>
                                        <select class="form-select" id="productColor">

                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <h6>Category</h6>
                                        <select class="form-select" id="productCategory">


                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <h6>Brand</h6>
                                        <select class="form-select" id="productBrand">

                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <h6>Status</h6>
                                        <select class="form-select" id="productStatus">
                                            <option value="1" selected>Active</option>
                                            <option value="2">Deactive</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-10 col-md-4">
                                    <button class="btn btn-outline-success mb-2" onclick="updateProductDetails()">Update Product</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Product Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success bg-opacity-50">
                        <h5 class="modal-title text-white" id="addProductModalLabel">Add New Product</h5>
                        <button type="button" class="btn-close btn-close-white" onclick="closeAddProductModal()"></button>
                    </div>
                    <div class="modal-body ">
                        <form id="addProductForm">
                            <div class="mb-3">
                                <label for="productTitle" class="form-label">Product Title</label>
                                <input type="text" class="form-control" id="productTitleInAddProductModal" required>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Product Description</label>
                                <textarea class="form-control" id="productDescriptionInAddProductModal" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Price</label>
                                <input type="text" step="0.01" class="form-control" id="productPriceInAddProductModal" required oninput="validatePriceInputsInProductManagementPanel(this)">
                            </div>
                            <div class="mb-3">
                                <label for="productDeliveryFeeColombo" class="form-label">Delivery Fee (Colombo)</label>
                                <input type="text" step="0.01" class="form-control" id="productDeliveryFeeColomboInAddProductModal" required oninput="validatePriceInputsInProductManagementPanel(this)">
                            </div>
                            <div class="mb-3">
                                <label for="productDeliveryFeeOther" class="form-label">Delivery Fee (Other)</label>
                                <input type="text" step="0.01" class="form-control" id="productDeliveryFeeOtherInAddProductModal" required oninput="validatePriceInputsInProductManagementPanel(this)">
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="productQuantityInAddProductModal" required oninput="validateQuantityInputInProductManagementModal(this)">
                            </div>
                            <div class="mb-3">
                                <label for="productColor" class="form-label">Color</label>
                                <select class="form-select" id="productColorInAddProductModal" required>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select class="form-select" id="productCategoryInAddProductModal" required>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="productBrand" class="form-label">Brand</label>
                                <select class="form-select" id="productBrandInAddProductModal" required>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="productModel" class="form-label">Model</label>
                                <select class="form-select" id="productModelInAddProductModal" required>

                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="addProductProcess()">Add Product</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Javascript files -->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>


    <script>
        // Product update modal initiate
        var productModal = new bootstrap.Modal(document.getElementById('productModal'), {
            backdrop: false
        });

        // Add product modal initiate
        var addProductModal = new bootstrap.Modal(document.getElementById('addProductModal'), {});

        // Close product update modal 
        function productViewPopupClose() {
            productModal.hide();
        }

        // Open add product modal
        function openAddProductModal() {
            addProductModal.show();
        }

        // Close add product modal
        function closeAddProductModal() {
            addProductModal.hide();
        }

        // Open product update modal
        function productViewPopUp(product_id, product_title, product_description, date_added, points, price, delivery_fee_colombo, delivery_fee_other, product_color_id, product_color, category_id, brand_id, product_status_id, product_model_id, product_qty) {
            document.getElementById("productId").value = product_id;
            document.getElementById("productTitle").value = product_title;
            document.getElementById("productDescription").value = product_description;
            document.getElementById("productDateAdded").value = date_added;
            document.getElementById("productPoints").value = points;
            document.getElementById("productPrice").value = price;
            document.getElementById("productDeliveryFeeColombo").value = delivery_fee_colombo;
            document.getElementById("productDeliveryFeeOther").value = delivery_fee_other;
            document.getElementById("productColor").value = product_color_id;
            document.getElementById("productCategory").value = category_id;
            document.getElementById("productBrand").value = brand_id;
            document.getElementById("productStatus").value = product_status_id;
            document.getElementById("productModel").value = product_model_id;
            document.getElementById("productQuantity").value = product_qty;

            productModal.show();
        }

        // Product update process 
        function updateProductDetails() {
            var product_id = document.getElementById("productId").value;
            var delivery_fee_colombo = document.getElementById("productDeliveryFeeColombo").value;
            var delivery_fee_other = document.getElementById("productDeliveryFeeOther").value;
            var product_title = document.getElementById("productTitle").value;
            var product_description = document.getElementById("productDescription").value;
            var price = document.getElementById("productPrice").value;
            var product_color_id = document.getElementById("productColor").value;
            var category_id = document.getElementById("productCategory").value;
            var brand_id = document.getElementById("productBrand").value;
            var product_status = document.getElementById("productStatus").value;
            var product_model_id = document.getElementById("productModel").value;
            var productQuantity = document.getElementById("productQuantity").value;

            var form = new FormData();

            form.append('product_id', product_id);
            form.append('delivery_fee_colombo', delivery_fee_colombo);
            form.append('delivery_fee_other', delivery_fee_other);
            form.append('product_title', product_title);
            form.append('product_description', product_description);
            form.append('price', price);
            form.append('product_color_id', product_color_id);
            form.append('category_id', category_id);
            form.append('brand_id', brand_id);
            form.append('product_status', product_status);
            form.append('product_model_id', product_model_id);
            form.append('productQuantity', productQuantity);


            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {

                if (request.readyState == 4 && request.status == 200) {
                    alert(request.responseText);

                    if (request.responseText == "Product Details Updated Successfully") {
                        productViewPopupClose();
                        loadProductDetailsForAdmin();
                    }

                }
            };
            request.open('POST', '../adminProcess/updateProductDetailsProcess.php', true);
            request.send(form);
        }

        // Add product process function 
        function addProductProcess() {
            var productTitle = document.getElementById("productTitleInAddProductModal").value;
            var productDescription = document.getElementById("productDescriptionInAddProductModal").value;
            var productPrice = document.getElementById("productPriceInAddProductModal").value;
            var productDeliveryFeeColombo = document.getElementById("productDeliveryFeeColomboInAddProductModal").value;
            var productDeliveryFeeOther = document.getElementById("productDeliveryFeeOtherInAddProductModal").value;
            var productColorId = document.getElementById("productColorInAddProductModal").value;
            var productCategoryId = document.getElementById("productCategoryInAddProductModal").value;
            var productBrandId = document.getElementById("productBrandInAddProductModal").value;
            var productQuantity = document.getElementById("productQuantityInAddProductModal").value;
            var productModelId = document.getElementById("productModelInAddProductModal").value;

            var form = new FormData();
            form.append('product_title', productTitle);
            form.append('product_description', productDescription);
            form.append('price', productPrice);
            form.append('delivery_fee_colombo', productDeliveryFeeColombo);
            form.append('delivery_fee_other', productDeliveryFeeOther);
            form.append('product_color_id', productColorId);
            form.append('category_id', productCategoryId);
            form.append('brand_id', productBrandId);
            form.append('product_model_id', productModelId);
            form.append('productQuantity', productQuantity);

            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState === 4 && request.status === 200) {
                    alert(request.responseText);

                    if (request.responseText == "Product added successfully.") {
                        clearAddProductModalTextFields();
                        closeAddProductModal();
                        loadProductDetailsForAdmin();
                    }
                }
            };
            request.open("POST", "../adminProcess/addProductProcess.php", true);
            request.send(form);
        }


        // Clear text fields in product add modal 
        function clearAddProductModalTextFields() {
            document.getElementById("productTitleInAddProductModal").value = "";
            document.getElementById("productDescriptionInAddProductModal").value = "";
            document.getElementById("productPriceInAddProductModal").value = "";
            document.getElementById("productDeliveryFeeColomboInAddProductModal").value = "";
            document.getElementById("productDeliveryFeeOtherInAddProductModal").value = "";
            document.getElementById("productColorInAddProductModal").value = "";
            document.getElementById("productCategoryInAddProductModal").value = "";
            document.getElementById("productBrandInAddProductModal").value = "";
            document.getElementById("productModelInAddProductModal").value = "";
        }
    </script>
</body>

</html>