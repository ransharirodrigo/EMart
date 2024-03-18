<?php
if (isset($_GET['id'])) {

    $category_id = $_GET["id"];
    $pageno;
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
            <div class="row " >

                <?php
                include "../../config.php";
                include(BASE_PATH . '/components/header.php');

                $query = "SELECT * FROM `product` WHERE";

                if ($category_id != 0) {
                    $query .= " `category_category_id`='$category_id' AND `status_status_id`='1'";
                } else {
                    $query .= "`status_status_id`='1'";
                }


                $product_resultset = Database::execute($query);

                ?>

                <!-- <div class="col-1  ">
                    <select name="" id="" class="form-select">
                        <option value="">Default Sort</option>
                        <option value="">Name</option>
                    </select>
                </div> -->

                <div class="col-12 mb-5">
                    <div class="row" >

                        <?php

                        if ($product_resultset->num_rows == 0) {
                        ?>
                            <div>
                                <span>No Products</span>
                            </div>

                            <?php
                        } else {

                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }

                            $product_num = $product_resultset->num_rows;

                            $results_per_page = 5;
                            $number_of_pages = ceil($product_num / $results_per_page);


                            $page_results = ($pageno - 1) * $results_per_page;

                            $select_query = "SELECT * FROM `product` LEFT JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_product_id` WHERE";

                            if ($category_id != 0) {
                                $select_query .= " `category_category_id`='$category_id' AND `status_status_id`='1'";
                            } else {
                                $select_query .= " `status_status_id`='1'";
                            }

                            $select_query .= " LIMIT " . $results_per_page . " OFFSET " . $page_results . "";

                            $selected_product_resultset = Database::execute($select_query);


                            for ($i = 0; $i < $selected_product_resultset->num_rows; $i++) {

                                $selected_product_data =   $selected_product_resultset->fetch_assoc();
                            ?>
                                <div class="col-8 col-md-6 col-lg-3  mt-5 ">
                                    <!-- <img src="../../assets/img/product_images/iphone_11.jpeg" class="category_page_product_image" alt="product image" /> -->


                                    <div class="row">
                                        <a href="" class="text-decoration-none text-reset  ">
                                            <?php

                                            if ($selected_product_data["path"] == null) {
                                            ?>

                                                <img src="../../assets/img/product_images/default_product_icon.svg" class="category_page_product_image" alt="product image" />
                                            <?php
                                            } else {
                                            ?>
                                                <img src="../../<?php echo $selected_product_data['path'] ?>" class="category_page_product_image" alt="product image" />
                                            <?php
                                            }

                                            ?>



                                            <div class="card-body">
                                                <span><?php echo $selected_product_data["title"] ?></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 ">
                                            <i class="bi bi-bag-heart-fill wishlist_icon_for_product_card" onclick="addToWishList(<?php echo $selected_product_data['product_id'] ?>)"></i>
                                        </div>
                                        <div class="col-2 ">
                                            <i class="bi  bi-cart-fill cart_icon_for_product_card" onclick="addToCart(<?php echo $selected_product_data['product_id'] ?>)"></i>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">

                        <li class="page-item"><a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    // echo "&page=" . ($pageno - 1);
                                                    echo "categoryPage.php?id=".$_GET['id']."&name=". $_GET["name"] ."&page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a></li>


                        <?php
                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {
                        ?>
                                <li class="page-item active">
                                    <a class="page-link" href="<?php echo "categoryPage.php?id=".$_GET['id']."&name=". $_GET["name"] ."&page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo "categoryPage.php?id=".$_GET['id']."&name=". $_GET["name"] ."&page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }
                        ?>

                        <li class="page-item">
                            <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "categoryPage.php?id=".$_GET['id']."&name=". $_GET["name"] ."&page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

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
