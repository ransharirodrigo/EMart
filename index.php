<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Mart</title>

    <link rel="icon" href="assets/img/e_mart_logo.png">
</head>

<body class="">

    <div class="container-fluid m-0 ">
        <div class="row">
            <?php
            include "components/header.php";
            $category_resultset = Database::execute("SELECT * FROM `category`");
            ?>

            <div class=" col-12 d-flex justify-content-center">
                <img src="assets/img/welcome_image.jpg" class="w-50" alt="welcome_image.jpg">
            </div>

            <div class="col-12 mt-5">
                <div class="row">
                    <?php
                    for ($i = 0; $i < $category_resultset->num_rows; $i++) {
                        $category_data = $category_resultset->fetch_assoc();
                    ?>
                        <div class="d-none d-md-block col-md-3 col-lg-2 mt-2">
                            <div class="card bg-success bg-opacity-50 ">
                                <img  src="<?php echo $category_data['category_img'] ?>" class="card-img-top" alt="<?php echo $category_data['category_name'] . " " . "Image" ?>">
                                <div class="card-footer text-center text-white">
                                    <a href="#" class="text-decoration-none text-reset"><?php echo $category_data['category_name'] ?></a>
                                </div>
                            </div>
                        </div>

                    <?php
                    }

                    ?>
                </div>
            </div>

            <div class="col-12 mt-md-5">
                <div class="row">

                    <div class="col-12">
                        <h3>Best Selling</h3>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row">
                            <span class="col-2 col-md-1">All</span>
                            <span class="col-2 col-md-1">Mobiles</span>
                            <span class="col-2 col-md-1">Laptops</span>
                            <span class="col-2 col-md-1">Cameras</span>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row">

                            <?php
                            for ($i = 0; $i < 4; $i++) {
                            ?>
                                <div class="col-8 offset-2  col-md-4 offset-md-0 col-lg-3 mt-2">
                                    <a href="#" class="text-decoration-none text-reset">
                                        <div class="card">
                                            <img src="assets/img/mobile_tmp.jpeg" class="card-img-top" alt="...">
                                            <div class="text-center">
                                                <span>Iphone 11</span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-10 offset-md-1 bg-success bg-opacity-25 py-5 px-4 rounded-3 mt-5">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="row">
                            <i class="bi bi-truck index_page_green_div_icon"></i>
                        </div>
                        <div class="row">
                            <h4>Fast Delivery</h4>
                        </div>
                        <div class="row">
                            <p>Elevate your shopping experience with lightning-fast delivery!</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="row">
                            <i class="bi bi-currency-dollar index_page_green_div_icon"></i>
                        </div>
                        <div class="row">
                            <h4>Save Money</h4>
                        </div>
                        <div class="row">
                            <p>Shop savvy, spend wisely, and unlock unbeatable deals!</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="row">
                            <i class="bi bi-telephone-fill index_page_green_div_icon"></i>
                        </div>
                        <div class="row">
                            <h4>Contact with us</h4>
                        </div>
                        <div class="row">
                            <p>Our team is just a click away, ready to assist you with a smile!</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="d-none d-md-block col-md-8 offset-md-2 mt-5">
                <div class="row">
                    <div class="col-6">
                        <img src="assets/img/index_img1.jpg " class="w-100" alt="img.jpg ">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <img src="assets/img/index_img2.jpg" class="w-100" alt="img.jpg">
                            </div>
                        </div>
                        <div class="row mt-3 mt-md-4 mt-lg-5">
                            <div class="col-12">
                                <img src="assets/img/index_img3.jpg" class="w-100" alt="img.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 mt-5 mb-5">
                <div class="row">

                    <div class="col-12">
                        <h3>Top Ratings</h3>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row">
                            <span class="col-2 col-md-1">All</span>
                            <span class="col-2 col-md-1">Mobiles</span>
                            <span class="col-2 col-md-1">Laptops</span>
                            <span class="col-2 col-md-1">Cameras</span>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row">

                            <?php
                            for ($i = 0; $i < 4; $i++) {
                            ?>
                                <div class="col-8 offset-2  col-md-4 offset-md-0 col-lg-3 mt-2">
                                    <a href="#" class="text-decoration-none text-reset">
                                        <div class="card">
                                            <img src="assets/img/mobile_tmp.jpeg" class="card-img-top" alt="...">
                                            <div class="text-center">
                                                <span>Iphone 11</span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>

            <?php
            include "components/footer.php";
            ?>

        </div>

    </div>


</body>

</html>