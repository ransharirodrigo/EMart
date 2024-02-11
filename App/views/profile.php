<?php
session_start();

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>

        <link rel="icon" href="../../assets/img/e_mart_logo.png" />

        <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../../assets/css/style.css" />
    </head>

    <body>
        <div class="container-fluid vh-100 pt-3">

            <div class="row mb-5">

                <div class="col-3 col-sm-2 col-md-1">
                    <p>Home</p>
                </div>

                <div class="col-3 col-sm-2 col-md-1">
                    <p>Signout</p>
                </div>

            </div>

            <div class="row">

                <div class="col-12 col-md-3">

                    <div class="row d-flex justify-content-center">
                        <img src="../../assets/img/profile_images//profile_image_tmp.jpg" alt="profileImage" class="col-6 col-sm-4 col-md-10 col-lg-8">
                    </div>
                    <div class="row  d-flex justify-content-center text-center">
                        <h3 class="col-12"><?php echo ($user["first_name"]) ?></h3>
                    </div>
                    <div class="row d-flex justify-content-center text-center">
                        <span class="col-12 "><?php echo ($user["email"]) ?></span>
                    </div>
                    <div class="row d-flex justify-content-center text-center mt-3">
                        <button class="btn btn-warning  col-10 col-sm-6 col-md-12 col-lg-10 text-dark">Change Profile Image</button>
                    </div>

                </div>

                <div class="col-12 col-md-9 mt-5 mt-md-0">

                    <div class="row text-center">
                        <h2>Profile Settings</h2>
                    </div>

                    <div class="row mt-3 ">
                        <div class="col-10 offset-1 col-md-5 offset-md-0">
                            <div class="row ">
                                <span>First Name</span>
                            </div>
                            <div class="row mt-2">
                                <input type="text" class="form-control" value="<?php echo ($user["first_name"]) ?>" />
                            </div>
                        </div>
                        <div class="col-10 offset-1 col-md-5 ">
                            <div class="row">
                                <span>Last Name</span>
                            </div>
                            <div class="row mt-2">
                                <input type="text" class="form-control" value="<?php echo ($user["last_name"]) ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-10 offset-1 col-md-11 offset-md-0">
                            <div class="row">
                                <span>Email</span>
                            </div>
                            <div class="row mt-2">
                                <input type="email" class="form-control" readonly value="<?php echo($user["email"]) ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 ">
                        <div class="col-10 offset-1  col-md-5 offset-md-0 ">
                            <div class="row">
                                <span>Mobile</span>
                            </div>
                            <div class="row mt-2">
                                <input type="text" class="form-control" value="<?php echo($user["mobile"]) ?>"/>
                            </div>
                        </div>
                        <div class="col-10 offset-1  col-md-5  ">
                            <div class="row">
                                <span>Password</span>
                            </div>
                            <div class="row mt-2">
                                <input type="password" class="form-control" value="<?php echo($user["password"]) ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center my-5 ">

                        <button class="btn btn-outline-success col-4">Save Changes</button>

                    </div>
                </div>

            </div>





        </div>

    </body>

    </html>
<?php


} else {

    header("Location:signIn.php");
} ?>