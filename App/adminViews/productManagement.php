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

            <div class="col-md-6 offset-md-3">
                <div class="input-group">
                    <input type="text" class="form-control form-control-lg" name="query" placeholder="Search products..." style="width: 400px;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-warning btn-lg" type="submit">Search</button>
                    </div>
                </div>
            </div>

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
                                        <th>Quantity</th>
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



            <div class="col-md-10 offset-md-1">
                <div class="row mt-3">
                    <div class="col-10 col-md-4">
                        <button class="btn btn-success mb-2">Add New Product</button>
                    </div>
                </div>
            </div>
        </div>


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
                                    <div class="mt-3">
                                        <h6>Quantity</h6>
                                        <input type="text" class="form-control" id="productQuantity" oninput="validateQuantityInputInProductManagementModal(this)">
                                    </div>
                                    <div class="mt-3">
                                        <h6>Price</h6>
                                        <input type="text" class="form-control" id="productPrice" oninput="validatePriceInputsInProductManagementModal(this)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-3">
                                        <h6>Delivery Fee (Colombo)</h6>
                                        <input type="text" class="form-control" id="productDeliveryFeeColombo" oninput="validatePriceInputsInProductManagementModal(this)">
                                    </div>
                                    <div class="mt-3">
                                        <h6>Delivery Fee (Other)</h6>
                                        <input type="text" class="form-control" id="productDeliveryFeeOther" oninput="validatePriceInputsInProductManagementModal(this)">
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
                                    <button class="btn btn-outline-secondary mb-2" onclick="updateProductDetails()">Update Product</button>
                                </div>
                                <div class="col-10 col-md-4">
                                    <button class="btn btn-danger mb-2">Disable Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>


    <script>
        var productModal = new bootstrap.Modal(document.getElementById('productModal'), {
            backdrop: false
        });

        function productViewPopUp(product_id, product_title, product_description, date_added, points, qty, price, delivery_fee_colombo, delivery_fee_other, product_color_id, product_color, category_id, brand_id, product_status_id, product_model_id) {
            document.getElementById("productId").value = product_id;
            document.getElementById("productTitle").value = product_title;
            document.getElementById("productDescription").value = product_description;
            document.getElementById("productDateAdded").value = date_added;
            document.getElementById("productPoints").value = points;
            document.getElementById("productQuantity").value = qty;
            document.getElementById("productPrice").value = price;
            document.getElementById("productDeliveryFeeColombo").value = delivery_fee_colombo;
            document.getElementById("productDeliveryFeeOther").value = delivery_fee_other;
            document.getElementById("productColor").value = product_color_id;
            document.getElementById("productCategory").value = category_id;
            document.getElementById("productBrand").value = brand_id;
            document.getElementById("productStatus").value = product_status_id;
            document.getElementById("productModel").value = product_model_id;

            productModal.show();

        }

        function productViewPopupClose() {
            productModal.hide();
        }


        function updateProductDetails() {
            var product_id = document.getElementById("productId").value;
            var delivery_fee_colombo = document.getElementById("productDeliveryFeeColombo").value;
            var delivery_fee_other = document.getElementById("productDeliveryFeeOther").value;
            var product_title = document.getElementById("productTitle").value;
            var product_description = document.getElementById("productDescription").value;
            var qty = document.getElementById("productQuantity").value;
            var price = document.getElementById("productPrice").value;
            var product_color_id = document.getElementById("productColor").value;
            var category_id = document.getElementById("productCategory").value;
            var brand_id = document.getElementById("productBrand").value;
            var product_status = document.getElementById("productStatus").value;
            var product_model_id = document.getElementById("productModel").value;
            var form = new FormData();

            form.append('product_id', product_id);
            form.append('delivery_fee_colombo', delivery_fee_colombo);
            form.append('delivery_fee_other', delivery_fee_other);
            form.append('product_title', product_title);
            form.append('product_description', product_description);
            form.append('qty', qty);
            form.append('price', price);
            form.append('product_color_id', product_color_id);
            form.append('category_id', category_id);
            form.append('brand_id', brand_id);
            form.append('product_status', product_status);
            form.append('product_model_id', product_model_id);


            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {

                if (request.readyState == 4 && request.status == 200) {
                    alert(request.responseText)
                    productViewPopupClose();
                    loadProductDetailsForAdmin();
                }
            };
            request.open('POST', '../adminProcess/updateProductDetailsProcess.php', true);
            request.send(form);

        }
    </script>
</body>

</html>