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
                            <button class="btn btn-success mb-2" onclick="addCategoryModalOpen()">Add New Category</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Category details and update modal  -->
        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success bg-opacity-50">
                        <h5 class="modal-title text-white" id="categoryModalLabel">Category Details</h5>
                        <button type="button" class="btn-close btn-close-white" onclick="categoryViewPopupClose()" aria-label="Close"></button>
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
                        <div class="form-group mt-3">
                            <label for="categoryImage">Category Image:</label>
                            <input type="file" class="form-control mt-1" id="categoryImage" accept="image/*" onchange="previewCategoryImage(event)">
                        </div>
                        <div class="form-group mt-3">
                            <img id="categoryImagePreview" src="" alt="Category Image" class="img-fluid">
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

        <!-- Add new category modal  -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success bg-opacity-50">
                        <h5 class="modal-title text-white" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close btn-close-white" onclick="addCategoryModalClose()"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addCategoryForm">
                            <div class="mb-3">
                                <label for="newCategoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="newCategoryName" required>
                            </div>
                            <div class="mb-3">
                                <label for="newCategoryImage" class="form-label">Category Image</label>
                                <input type="file" class="form-control" id="newCategoryImage" accept="image/jpeg, image/png, image/svg+xml" onchange="previewNewCategoryImage(event)" required>
                            </div>
                            <div class="mb-3">
                                <img id="newCategoryImagePreview" src="" alt="" class="img-fluid d-none">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="addNewCategory()">Add Category</button>
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

            // Add new category modal initiate
            var addCategoryModal = new bootstrap.Modal(document.getElementById('addCategoryModal'), {
                backdrop: false
            });

            // Load details to update category modal 
            function categoryViewPopUp(category_id, category_name, status_id, category_image) {
                document.getElementById("categoryId").value = category_id;
                document.getElementById("categoryName").value = category_name;
                document.getElementById("categoryStatus").value = status_id;
                document.getElementById("categoryImagePreview").src = "../../" + category_image;

                categoryModal.show();
            }

            // Update category modal close
            function categoryViewPopupClose() {
                categoryModal.hide();
            }

            // Add new category modal opne
            function addCategoryModalOpen() {
                addCategoryModal.show();
            }

            // Add new category modal close
            function addCategoryModalClose() {
                addCategoryModal.hide();
                clearTextFieldsInAddNewCategoryModal();
            }

            // Update category details process function 
            function updateCategoryDetails() {
                var category_id = document.getElementById("categoryId").value;
                var category_name = document.getElementById("categoryName").value;
                var status_id = document.getElementById("categoryStatus").value;
                var category_image = document.getElementById("categoryImage").files[0];

                var form = new FormData();
                form.append('category_id', category_id);
                form.append('category_name', category_name);
                form.append('status_id', status_id);
                form.append('category_image', category_image);

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

            // Add new category process function 
            function addNewCategory() {
                var newCategoryName = document.getElementById('newCategoryName').value;
                var newCategoryImage = document.getElementById('newCategoryImage').files[0];

                var form = new FormData();
                form.append('categoryName', newCategoryName);
                form.append('categoryImage', newCategoryImage);

                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        alert(request.responseText);

                        if (request.responseText == "Category added successfully.") {
                            addCategoryModalClose();
                            clearTextFieldsInAddNewCategoryModal();
                            loadCategories();
                        }
                    }
                };
                request.open('POST', '../adminProcess/addNewCategoryProcess.php', true);
                request.send(form);
            }


            // Clear text fields in add new category modal
            function clearTextFieldsInAddNewCategoryModal() {
                document.getElementById('newCategoryName').value = "";

                var previewElement = document.getElementById('newCategoryImagePreview');
                previewElement.src = "";
                previewElement.classList.add('d-none');


                document.getElementById('newCategoryImage').value = "";


            }
        </script>
</body>

</html>