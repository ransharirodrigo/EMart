<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container-fluid ">
        <div class="row">
            <?php
            include("../../config.php");
            include("../../components/adminHeader.php");
            ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Admin Name Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Admin Name</h5>
                        <p class="card-text">John Doe</p>
                    </div>
                </div>

                <!-- Change Password Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Change Password</h5>
                        <form>
                            <div class="form-group">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword">
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmPassword">
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>

                <!-- Add New Admin Section -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Admin</h5>
                        <form>
                            <div class="form-group">
                                <label for="newAdminName">Name</label>
                                <input type="text" class="form-control" id="newAdminName">
                            </div>
                            <div class="form-group">
                                <label for="newAdminEmail">Email</label>
                                <input type="email" class="form-control" id="newAdminEmail">
                            </div>
                            <div class="form-group">
                                <label for="newAdminPassword">Password</label>
                                <input type="password" class="form-control" id="newAdminPassword">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Admin</button>
                        </form>
                    </div>
                </div>

                <!-- Logout Button -->
                <div class="text-center mt-4">
                    <a href="#" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>