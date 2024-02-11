<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location:../../index.php");
} else {
?>
    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E Mart Sign In</title>

        <link rel="icon" href="../../assets/img/e_mart_logo.png" />
        <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../../assets/css/style.css" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center vh-100">
                <div class="col-12">
                    <div class="row">
                        <div class=" d-flex justify-content-center ">
                            <img class="logo" src="../../assets/img/e_mart_logo.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-8 col-sm-6 col-lg-5  border py-3 rounded-3">

                    <div class="row text-center">
                        <div>
                            <h3>Sign In</h3>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 col-lg-3">
                            <span>Email</span>
                        </div>
                        <div class="col-12 col-lg-9">
                            <?php
                            if (isset($_COOKIE["email"])) {
                            ?>
                                <input type="email" class="form-control" id="email" value="<?php echo $_COOKIE["email"] ?>" />
                            <?php
                            } else {
                            ?>
                                <input type="email" class="form-control" id="email" value="" />
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-lg-3">
                            <span>Password</span>
                        </div>
                        <div class="col-12 col-lg-9">
                            <input type="password" class="form-control" id="password" />
                        </div>
                    </div>

                    <div class="row row-gap-4 mt-4">
                        <div class="col-12 col-xl-7">
                            <div class="row">

                                <input type="checkbox" class="col-1 offset-xl-1" id="remember_me" />
                                <span class="col-6">Remember Me</span>

                            </div>
                        </div>
                        <div class="col-12 col-xl-5">
                            <a href="">Forgot Password</a>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <button class="btn btn-warning col-6" onclick="signIn();">Sign In</button>
                    </div>

                </div>

                <div class="col-12 ">
                    <div class="row justify-content-center">
                        <div class="col-8 col-sm-6 col-lg-5">
                            <div class="row align-items-center text-center">
                                <hr class="col-2 col-sm-3 col-lg-4 " />
                                <p class="col-8 col-sm-6 col-lg-4">New to EMart ?</p>
                                <hr class="col-2 col-sm-3 col-lg-4 " />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 ">
                    <div class="row justify-content-center">
                        <div class="col-8 col-sm-6 col-lg-3">
                            <div class="row justify-content-center">
                                <a href="signUp.php" class="text-decoration-none text-reset">
                                    <button class="btn btn-outline-secondary col-8">Create Account</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="../../assets/js/script.js"></script>
    </body>

    </html>

<?php
}

?>