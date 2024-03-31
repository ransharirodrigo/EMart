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
                        <button class="btn btn-primary btn-lg btn-block mb-2">Add New Product</button>
                    </div>
                    <div class="col-10 col-md-4">
                        <button class="btn btn-success btn-lg btn-block mb-2">Update Product</button>
                    </div>
                    <div class="col-10 col-md-4">
                        <button class="btn btn-danger btn-lg btn-block mb-2">Disable Product</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="productViewPopupClose()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="details-item">
                                        <h6>Title</h6>
                                        <p id="productTitle"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Description</h6>
                                        <p id="productDescription"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Date Added</h6>
                                        <p id="productDateAdded"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Points</h6>
                                        <p id="productPoints"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Quantity</h6>
                                        <p id="productQuantity"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="details-item">
                                        <h6>Price</h6>
                                        <p id="productPrice"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Delivery Fee (Colombo)</h6>
                                        <p id="productDeliveryFeeColombo"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Delivery Fee (Other)</h6>
                                        <p id="productDeliveryFeeOther"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Color</h6>
                                        <p id="productColor"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Category</h6>
                                        <p id="productCategory"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Brand</h6>
                                        <p id="productBrand"></p>
                                    </div>
                                    <div class="details-item">
                                        <h6>Status</h6>
                                        <p id="productStatus"></p>
                                    </div>
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

            document.getElementById("productTitle").innerHTML = product_title;
            document.getElementById("productDescription").innerHTML = product_description;
            document.getElementById("productDateAdded").innerHTML = date_added;
            document.getElementById("productPoints").innerHTML = points;
            document.getElementById("productQuantity").innerHTML = qty;
            document.getElementById("productPrice").innerHTML = price;
            document.getElementById("productDeliveryFeeColombo").innerHTML = delivery_fee_colombo;
            document.getElementById("productDeliveryFeeOther").innerHTML = delivery_fee_other;
            document.getElementById("productColor").innerHTML = product_color;
            document.getElementById("productCategory").innerHTML = category;
            document.getElementById("productBrand").innerHTML = brand;
            document.getElementById("productStatus").innerHTML = product_status;
          
            productModal.show();
        }

        function productViewPopupClose() {
            productModal.hide();
        }
    </script>
</body>

</html>