<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>E Mart</title>

    <link rel="icon" href="assets/img/e_mart_logo.png">
</head>

<body class="" onload="loadBestSellingItems('All'); loadTopRatedItems('All')">

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
                                <img src="<?php echo $category_data['category_img'] ?>" class="card-img-top" alt="<?php echo $category_data['category_name'] . " " . "Image" ?>">
                                <div class="card-footer text-center text-white">
                                    <a href="App/views/categoryPage.php?id=<?php echo $category_data['category_id'] ?>&name=<?php echo $category_data['category_name'] ?>" class="text-decoration-none text-reset"><?php echo $category_data['category_name'] ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>


            <!-- Best selling -->
            <div class="col-12 mt-md-5">
                <div class="row">

                    <div class="col-12">
                        <h3>Best Selling</h3>
                    </div>

                    <div class="col-12 mt-3 ">
                        <div class="row ">

                            <?php
                            $best_selling_category_resultset = Database::execute("SELECT DISTINCT(`category_name`) FROM `top_selling_items` INNER JOIN `product` ON `product`.`product_id`=`top_selling_items`.`product_product_id` INNER JOIN `category` ON `category`.`category_id`=`product`.`category_category_id` LIMIT 4");
                            ?>

                            <span class="col-2 col-md-1 best_selling_items_category_span" onclick="loadBestSellingItems('All');">All</span>

                            <?php
                            for ($i = 0; $i < $best_selling_category_resultset->num_rows; $i++) {
                                $best_selling_category_data = $best_selling_category_resultset->fetch_assoc();

                            ?>
                                <span class="col-2 col-md-1 best_selling_items_category_span" onclick="loadBestSellingItems('<?php echo $best_selling_category_data['category_name'] ?>');"> <?php echo $best_selling_category_data["category_name"] ?></span>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row" id="best_selling_items_div">


                        </div>
                    </div>

                </div>
            </div>
            <!-- Best selling -->

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

            <!-- Three Images -->
            <div class="d-none d-md-block col-md-8 offset-md-2 mt-5">
                <div class="row">
                    <div class="col-6">
                        <img src="assets/img/index_page_img1.jpg" class="w-100" alt="img.jpg ">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <img src="assets/img/index_page_img2.jpg" class="w-100" alt="img.jpg">
                            </div>
                        </div>
                        <div class="row mt-3 mt-md-4 mt-lg-5">
                            <div class="col-12">
                                <img src="assets/img/index_page_img3.jpg" class="w-100" alt="img.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Three Images -->

            <!-- Top Rated -->
            <div class="col-12 mt-5 mb-5">
                <div class="row">

                    <div class="col-12">
                        <h3>Top Ratings</h3>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row">
                            <span class="col-2 col-md-1 top_ratings_category_span" onclick="loadTopRatedItems('All')">All</span>

                            <?php
                            $top_rated_category_resultset = Database::execute("SELECT DISTINCT(`category_name`) FROM `category` WHERE `category`.`category_name` IN (SELECT `category_name` FROM `category` INNER JOIN `product` ON `product`.`category_category_id`=`category`.`category_id` ORDER BY `product`.`points` DESC)  LIMIT 4");
                            for ($i = 0; $i <  $top_rated_category_resultset->num_rows; $i++) {
                                $top_rated_category_array = $top_rated_category_resultset->fetch_assoc();
                            ?>
                                <span class="col-2 col-md-1 top_ratings_category_span" onclick="loadTopRatedItems('<?php echo  $top_rated_category_array['category_name'] ?>')"><?php echo  $top_rated_category_array["category_name"] ?></span>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row" id="top_rated_items_div">


                        </div>
                    </div>

                </div>
            </div>
            <!-- Top Rated -->

            <?php
            include "components/footer.php";
            ?>

        </div>

    </div>


</body>

</html>