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


    </div>

    <script src="../../assets/js/script.js"></script>

   
</body>

</html>