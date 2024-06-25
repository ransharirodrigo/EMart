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
                    <input type="text" class="form-control f" name="query" placeholder="Search products..." style="width: 400px;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-warning " type="submit">Search</button>
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
                            <button class="btn btn-success mb-2">Add New Category</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success bg-opacity-50">
                        <h5 class="modal-title text-white" id="categoryModalLabel">Category Details</h5>
                        <button type="button" class="btn-close btn-close-white" onclick="categoryViewPopupClose()" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="categoryId">Category ID:</label>
                            <input type="text" class="form-control mt-1" id="categoryId" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label for="categoryName">Category Name:</label>
                            <input type="text" class="form-control mt-1" id="categoryName">
                        </div>
                        <div class="form-group mt-3">
                            <label for="categoryStatus">Status:</label>
                            <select class="form-control mt-1" id="categoryStatus">
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 col-md-6">
                                <button class="btn btn-outline-success mb-2" onclick="updateCategoryDetails()">Update Category</button>
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
        // Category details update modal initiate
        var categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'), {
            backdrop: false
        });

        // Load details to update category modal 
        function categoryViewPopUp(category_id, category_name, status_id) {
            document.getElementById("categoryId").value = category_id;
            document.getElementById("categoryName").value = category_name;
            document.getElementById("categoryStatus").value = status_id;

            categoryModal.show();
        }

        // Update category modal close
        function categoryViewPopupClose() {
            categoryModal.hide();
        }

        // Update category details process function 
        function updateCategoryDetails() {
            var category_id = document.getElementById("categoryId").value;
            var category_name = document.getElementById("categoryName").value;
            var status_id = document.getElementById("categoryStatus").value;

            var form = new FormData();
            form.append('category_id', category_id);
            form.append('category_name', category_name);
            form.append('status_id', status_id);


            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    alert(request.responseText);
                    if (request.responseText == "Category details updated successfully.") {
                        categoryViewPopupClose();
                        loadCategories();
                    }
                }
            };
            request.open('POST', '../adminProcess/updateCategoryDetails.php', true);
            request.send(form);

        }
    </script>
</body>

</html>