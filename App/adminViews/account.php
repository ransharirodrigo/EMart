<?php

session_start();

if (isset($_SESSION["admin"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Account</title>


        <link rel="stylesheet" href="../../assets/css/bootstrap.css">
        <link rel="icon" href="../../assets/img/e_mart_logo.png" />
    </head>

    <body>

        <div class="container-fluid ">
            <div class="row">
                <?php
                include("../../config.php");
                include("../../components/adminHeader.php");
                ?>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <!-- Admin Name Section -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Admin Name</h5>
                            <p class="card-text"><?php echo $_SESSION["admin"]["name"] ?></p>
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
                                <button type="submit" class="btn btn-success" onclick="changeAdminPassword()">Change Password</button>
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
                                <button type="submit" class="btn btn-secondary">Add Admin</button>
                            </form>
                        </div>
                    </div>

                    <!-- Logout Button -->
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-danger" onclick="adminLogout()">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../assets/js/script.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:signIn.php");
}
?>