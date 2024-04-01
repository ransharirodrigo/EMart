<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Managment</title>

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
</head>

<body onload="loadCategories()">

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
                            <button class="btn btn-primary btn-lg btn-block mb-2">Add New Category</button>
                        </div>
                        <div class="col-10 col-md-4">
                            <button class="btn btn-success btn-lg btn-block mb-2">Update Category</button>
                        </div>
                        <div class="col-10 col-md-4">
                            <button class="btn btn-danger btn-lg btn-block mb-2">Disable Category</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Category Details</h5>
                        <button type="button" class="close" onclick="categoryViewPopupClose()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="categoryId">Category ID:</label>
                            <input type="text" class="form-control" id="categoryId">
                        </div>
                        <div class="form-group">
                            <label for="categoryName">Category Name:</label>
                            <input type="text" class="form-control" id="categoryName">
                        </div>
                        <div class="form-group">
                            <label for="categoryStatus">Status:</label>
                            <select class="form-control" id="categoryStatus">
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="categoryViewPopupClose()">Close</button>
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
        var categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'), {
            backdrop: false
        });

        function categoryViewPopUp(category_id, category_name, status) {
            document.getElementById("categoryId").value = category_id;
            document.getElementById("categoryName").value = category_name;
            document.getElementById("categoryStatus").value = status;

            categoryModal.show();
        }

        function categoryViewPopupClose() {
            categoryModal.hide();
        }
    </script>
</body>

</html>