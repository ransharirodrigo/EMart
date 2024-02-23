<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>bootstrap.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>style.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row mt-4">

            <?php
            include(BASE_PATH . '/libs/connection.php');

            $category_resultset = Database::execute("SELECT * FROM `category`");


            ?>

            <div class="d-none col-lg-6 d-lg-block">
                <div class="row">
                    <span class="col-4 fs-6 ">0761212065</span>
                    <a href="#" class="col-4 fs-6 text-decoration-none text-reset">emart@gmail.com</a>
                    <span class="col-4 fs-6 ">27/A Ward Street</span>
                </div>
            </div>
            <div class="col-5 offset-7 col-md-4 offset-md-8 col-lg-3 offset-lg-3">
                <div class="row">

                    <div class="col-3">

                        <?php
                        session_start();
                        if (isset($_SESSION["user"])) {
                        ?>
                            <a href="<?php echo VIEW_PATH; ?>profile.php" class="text-decoration-none text-reset">
                                <i class="bi bi-person header_top_icon"></i>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a href="<?php echo VIEW_PATH; ?>signIn.php" class="text-decoration-none text-reset">
                                <i class="bi bi-person header_top_icon"></i>
                            </a>
                        <?php
                        }
                        ?>

                    </div>

                    <div class="col-3">
                        <a href="<?php echo VIEW_PATH; ?>wishlist.php" class="text-decoration-none text-reset">
                            <i class="bi bi-heart header_top_icon"></i>
                        </a>
                    </div>

                    <div class="col-3">

                        <?php

                        if (isset($_SESSION["user"])) {
                        ?>
                            <a href="<?php echo VIEW_PATH; ?>cart.php" class="text-decoration-none text-reset">
                                <i class="bi bi-cart-check header_top_icon"></i>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a href="<?php echo VIEW_PATH; ?>signIn.php" class="text-decoration-none text-reset">
                                <i class="bi bi-cart-check header_top_icon"></i>
                            </a>
                        <?php
                        }
                        ?>


                    </div>

                </div>
            </div>
        </div>

        <hr class="my-0" />

        <div class="row d-flex align-items-center">
            <div class="col-3 emart_logo_div" onclick="gotoIndexPage();">
                <img class="logo" src="<?php echo IMG_PATH; ?>e_mart_logo.png" alt="logo.png">
            </div>

            <div class="col-6 d-none d-lg-block mt-4">
                <div class="row">
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo VIEW_PATH; ?>categoryPage.php?id=0&name=All">All</a></li>
                            <?php
                            for ($i = 0; $i < $category_resultset->num_rows; $i++) {
                                $category_data = $category_resultset->fetch_assoc();
                            ?>
                                <li><a class="dropdown-item" href="<?php echo VIEW_PATH ?>categoryPage.php?id=<?php echo ($category_data['category_id']) ?> &name=<?php echo $category_data["category_name"] ?>"><?php echo $category_data["category_name"] ?></a></li>
                            <?php
                            }

                            ?>
                        </ul>
                        <input type="text" class="form-control" autocomplete="off" aria-label="Text input with dropdown button" id="search">
                        <button class="btn btn-secondary" type="button" id="button-addon2">Search</button>
                    </div>
                </div>
            </div>

            <div class="col-5 offset-4 col-lg-2  offset-lg-1">
                <button class="btn btn-warning">Advanced Search</button>
            </div>

        </div>
    </div>

    <script src="<?php echo JS_PATH; ?>bootstrap.bundle.min.js"></script>
    <script src="<?php echo JS_PATH; ?>script.js"></script>

    <script>
        function gotoIndexPage() {
            window.location.href = "<?php echo ROOT_PATH ?>index.php";
        }
    </script>
</body>

</html>