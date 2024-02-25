<?php
if (isset($_GET['id'])) {

    $category_id = $_GET["id"];
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo ($_GET['name']) ?></title>

        <link rel="icon" href="../../assets/img/e_mart_logo.png" />
        <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../../assets/css/style.css" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row ">

                <?php
                include "../../config.php";
                include(BASE_PATH . '/components/header.php');

                $query = "SELECT * FROM `product`";

                if ($category_id != 0) {
                    $query .= " WHERE `category_category_id`='$category_id'";
                }

                $category_resultset = Database::execute($query);

                ?>

                <!-- <div class="col-1  ">
                    <select name="" id="" class="form-select">
                        <option value="">Default Sort</option>
                        <option value="">Name</option>
                    </select>
                </div> -->

                <div class="col-12 mb-5">
                    <div class="row  ">

                        <?php

                        if ($category_resultset->num_rows == 0) {
                        ?>
                            <div>
                                <span>No Products</span>
                            </div>

                            <?php
                        } else {
                            for ($i = 0; $i < $category_resultset->num_rows; $i++) {
                            ?>
                                <div class="col-8 col-md-6 col-lg-3  mt-5 ">
                                    <!-- <img src="../../assets/img/product_images/iphone_11.jpeg" class="category_page_product_image" alt="product image" /> -->


                                    <div class="row">
                                        <a href="" class="text-decoration-none text-reset  ">
                                            <img src="../../assets/img/product_images/iphone_11.jpeg" class="category_page_product_image" alt="product image" />
                                            <div class="card-body">
                                                <span>Iphone</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 ">
                                            <i class="bi bi-bag-heart-fill wishlist_icon_for_product_card"></i>
                                        </div>
                                        <div class="col-2 ">
                                            <i class="bi  bi-cart-fill cart_icon_for_product_card"></i>
                                        </div>
                                    </div>
                                </div>


                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>


                <?php
                include "../../components/footer.php";
                ?>

            </div>
        </div>

    </body>

    </html>
<?php
} else {

    header("Location:../../index.php");
}
