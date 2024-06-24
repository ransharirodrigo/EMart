<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
    <link rel="icon" href="../../assets/css/style.css" />

    <title>Product Management</title>
</head>

<body onload="loadProductDetailsForAdmin()">

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


        <div class="modal fade" id="productModal" tabindex="-1" >
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
                                    <div class="details-item">
                                        <h6>Title</h6>
                                        <input type="text" class="form-control" id="productTitle">
                                    </div>
                                    <div class="details-item">
                                        <h6>Description</h6>
                                        <input type="text" class="form-control" id="productDescription">
                                    </div>
                                    <div class="details-item">
                                        <h6>Date Added</h6>
                                        <p id="productDateAdded" class="form-control-static"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Points</h6>
                                        <p id="productPoints" class="form-control-static"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Quantity</h6>
                                        <input type="text" class="form-control" id="productQuantity">
                                    </div>
                                    <div class="details-item">
                                        <h6>Price</h6>
                                        <input type="text" class="form-control" id="productPrice">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-item">
                                        <h6>Delivery Fee (Colombo)</h6>
                                        <input type="text" class="form-control" id="productDeliveryFeeColombo">
                                    </div>
                                    <div class="details-item">
                                        <h6>Delivery Fee (Other)</h6>
                                        <input type="text" class="form-control" id="productDeliveryFeeOther">
                                    </div>
                                    <div class="details-item">
                                        <h6>Color</h6>
                                        <select class="form-select" id="productColor">
                                            
                                            <option value="Black">Black</option>
                                            <option value="Dark Blue">Dark Blue</option>
                                            <option value="White">White</option>
                                            <option value="Grey">Grey</option>
                                            <!-- Add more color options as needed -->
                                        </select>
                                    </div>

                                    <div class="details-item">
                                        <h6>Category</h6>
                                        <select class="form-select" id="productCategory">
                                            <option value="Laptops">Laptops</option>
                                            <option value="Smartphones">Smartphones</option>
                                            <option value="Headphones">Headphones</option>
                                            <option value="Smart Watches">Smart Watches</option>
                                            <option value="Tablets">Tablets</option>
                                            <option value="Monitors">Monitors</option>
                                            
                                        </select>
                                    </div>
                                    <div class="details-item">
                                        <h6>Brand</h6>
                                        <select class="form-select" id="productBrand">
                                            <option value="Apple">Apple</option>
                                            <option value="Samsung">Samsung</option>
                                            <option value="MSI">MSI</option>
                                            <option value="HP">HP</option>
                                            <option value="Lenovo">Lenovo</option>
                                        </select>
                                    </div>

                                    <div class="details-item">
                                        <h6>Status</h6>
                                        <select class="form-select" id="productStatus">
                                            <option value="Active" selected>Active</option>
                                            <option value="Deactive">Deactive</option>
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
                                    <button class="btn btn-outline-secondary mb-2">Update Product</button>
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

        function productViewPopUp(product_id, product_title, product_description, date_added, points, qty, price, delivery_fee_colombo, delivery_fee_other, product_color, category, brand, product_status) {

            document.getElementById("productTitle").value = product_title;
            document.getElementById("productDescription").value = product_description;
            document.getElementById("productDateAdded").innerHTML = date_added;
            document.getElementById("productPoints").innerHTML = points;
            document.getElementById("productQuantity").value = qty;
            document.getElementById("productPrice").value = price;
            document.getElementById("productDeliveryFeeColombo").value = delivery_fee_colombo;
            document.getElementById("productDeliveryFeeOther").value = delivery_fee_other;
            document.getElementById("productColor").value = product_color;
            document.getElementById("productCategory").value = category;
            document.getElementById("productBrand").value = brand;
            document.getElementById("productStatus").value = product_status;

            productModal.show();
        }

        function productViewPopupClose() {
            productModal.hide();
        }

      
    </script>
</body>

</html>