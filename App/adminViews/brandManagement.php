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
                    <input type="text" class="form-control " name="query" placeholder="Search products..." style="width: 400px;">
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
                                            <th>Brand ID</th>
                                            <th>Name</th>
                                            <th>Brand Status</th>
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
                            <button class="btn btn-success mb-2" onclick="addNewBrandModelOpen()">Add New Brand</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>


        <!-- View and update brand data modal -->
        <div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="brandModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success bg-opacity-50">
                        <h5 class="modal-title text-white" id="brandModalLabel">Brand Details</h5>
                        <button type="button" class="btn-close btn-close-white" onclick="brandViewPopupClose()" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="brandId">Brand ID:</label>
                            <input type="text" class="form-control mt-1" id="brandIdInUpdateBrandModal" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label for="brandName">Brand Name:</label>
                            <input type="text" class="form-control mt-1" id="brandNameInUpdateBrandModal">
                        </div>
                        <div class="form-group mt-3">
                            <label for="brandStatus">Status:</label>
                            <select class="form-control mt-1" id="brandStatusInUpdateBrandModal">
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                        </div>
                        <div class="row mt-3">
                            <div class="col-10 col-md-4">
                                <button class="btn btn-success mb-2" onclick="updateBrandDetails()">Update Brand</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Add new brand modal -->
        <div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success bg-opacity-50">
                        <h5 class="modal-title text-white" id="addBrandModal">Add New Brand</h5>
                        <button type="button" class="btn-close btn-close-white" onclick="addNewBrandModelClose()"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addBrandForm">
                            <div class="mb-3">
                                <label for="brandName" class="form-label">Brand Name</label>
                                <input type="text" class="form-control" id="newBrandName" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="addNewBrandProcess()">Add Brand</button>
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
        // Update and view brand modal initiate
        var brandModal = new bootstrap.Modal(document.getElementById('brandModal'), {
            backdrop: false
        });

        // add new brand modal initiate
        var addBrandModal = new bootstrap.Modal(document.getElementById('addBrandModal'), {
            backdrop: false
        });

        // View update modal open
        function brandViewPopUp(brand_id, brand_name, status_id) {
            document.getElementById("brandIdInUpdateBrandModal").value = brand_id;
            document.getElementById("brandNameInUpdateBrandModal").value = brand_name;
            document.getElementById("brandStatusInUpdateBrandModal").value = status_id;
            brandModal.show();
        }

        // View update modal close
        function brandViewPopupClose() {
            brandModal.hide();
        }

        // Add brand modal open
        function addNewBrandModelOpen() {
            addBrandModal.show();
        }


        // Add brand modal close
        function addNewBrandModelClose() {
            addBrandModal.hide();
        }


        // Update brand details process function 
        function updateBrandDetails() {
            var brand_id = document.getElementById("brandIdInUpdateBrandModal").value;
            var brand_name = document.getElementById("brandNameInUpdateBrandModal").value;
            var status_id = document.getElementById("brandStatusInUpdateBrandModal").value;

            var form = new FormData();
            form.append('brand_id', brand_id);
            form.append('brand_name', brand_name);
            form.append('status_id', status_id);

            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    alert(request.responseText);
                    if (request.responseText == "Brand details updated successfully.") {

                        brandViewPopupClose();
                        loadBrandDetails();
                    }
                }
            };
            request.open('POST', '../adminProcess/updateBrandDetailsProcess.php', true);
            request.send(form);
        }

        function addNewBrandProcess() {
            var newBrandName = document.getElementById('newBrandName').value;

            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    alert(request.responseText);

                    if (request.responseText == "Brand added successfully.") {
                        addNewBrandModelClose();
                        clearTextFieldsInAddNewBrandModal();
                        loadBrandDetails();
                    }
                }
            };
            request.open('GET', "../adminProcess/addNewBrandProcess.php?brandName=" + newBrandName, true);
            request.send();
        }


        // Clear text fields in add new brand modal
        function clearTextFieldsInAddNewBrandModal() {
            document.getElementById('newBrandName').value = "";
        }
    </script>
</body>

</html>