<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Management</title>

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
</head>

<body onload="loadBrandDetails()">

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

                <div class="col-md-10 offset-md-1 mt-5">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Name</th>
                                            <th>Category Status</th>
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
                            <button class="btn btn-primary btn-lg btn-block mb-2">Add New Brand</button>
                        </div>
                        <div class="col-10 col-md-4">
                            <button class="btn btn-success btn-lg btn-block mb-2">Update Brand</button>
                        </div>
                        <div class="col-10 col-md-4">
                            <button class="btn btn-danger btn-lg btn-block mb-2">Disable Brand</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="brandModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="brandModalLabel">Brand Details</h5>
                        <button type="button" class="close" onclick="brandViewPopupClose()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="brandId">Brand ID:</label>
                            <input type="text" class="form-control" id="brandId" >
                        </div>
                        <div class="form-group">
                            <label for="brandName">Brand Name:</label>
                            <input type="text" class="form-control" id="brandName" >
                        </div>
                        <div class="form-group">
                            <label for="brandStatus">Status:</label>
                            <select class="form-control" id="brandStatus" >
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="brandViewPopupClose()" data-dismiss="modal">Close</button>
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
        var brandModal = new bootstrap.Modal(document.getElementById('brandModal'), {
            backdrop: false
        });


        function brandViewPopUp(brand_id,brand_name,status) {
            document.getElementById("brandId").value=brand_id;
            document.getElementById("brandName").value=brand_name;
            document.getElementById("brandStatus").value=status;
            brandModal.show();
        }


        function brandViewPopupClose() {
            brandModal.hide();
        }
    </script>
</body>

</html>