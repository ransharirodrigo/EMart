<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../../libs/connection.php";

    $searchText = isset($_POST['searchText']) ? $_POST['searchText'] : '';
    $sortOption = isset($_POST['sortOption']) ? $_POST['sortOption'] : '0';
    $category = isset($_POST['category']) ? $_POST['category'] : '0';
    $minPrice = isset($_POST['minPrice']) ? $_POST['minPrice'] : '';
    $maxPrice = isset($_POST['maxPrice']) ? $_POST['maxPrice'] : '';
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '0';
    $color = isset($_POST['color']) ? $_POST['color'] : '0';

    if ($searchText == "" && $sortOption == 0 && $category == 0 && $minPrice == "" && $maxPrice == "" && $brand == 0 && $color == 0) {
        echo "Default";
    } else {

        $query = "SELECT * FROM `product` LEFT JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_product_id` ";

        $searchTextStatus = 0;
        $categoryStatus = 0;
        $brandStatus = 0;
        $colorStatus = 0;

        if ($searchText == "" && $category == 0 && $brand == 0 && $color == 0 && $minPrice == "" && $maxPrice == "") {


            if ($sortOption == 1) {
                $query .= "ORDER BY `price` ASC";
            } elseif ($sortOption == 2) {
                $query .= "ORDER BY `price` DESC";
            } elseif ($sortOption == 3) {
                $query .= "ORDER BY `date_added` DESC";
            }
        } else {

            $query .= "WHERE ";

            if ($searchText != "") {
                $query .= "`title` LIKE '%$searchText%'";
                $searchTextStatus = 1;
            }

            if ($category != 0) {

                if ($searchTextStatus == 1) {
                    $query .= " AND ";
                }

                $query .= "`category_category_id`='$category'";

                $categoryStatus = 1;
            }

            if ($brand != 0) {

                if ($searchTextStatus == 1 || $categoryStatus == 1) {
                    $query .= " AND ";
                }

                $query .= "`brand_brand_id`='$brand'";

                $brandStatus = 1;
            }


            if ($color != 0) {

                if ($searchTextStatus == 1 || $categoryStatus == 1 || $brandStatus == 1) {
                    $query .= " AND ";
                }

                $query .= "`color_color_id`='$color'";

                $colorStatus = 1;
            }

            if ($minPrice != "" || $maxPrice != "") {

                if ($searchTextStatus == 1 || $categoryStatus == 1 || $brandStatus == 1 || $colorStatus == 1) {
                    $query .= " AND ";
                }

                if ($minPrice == "") {
                    $query .= "`price` <='$maxPrice'";
                } else {

                    if ($maxPrice != "") {
                        $query .= "`price` BETWEEN '$minPrice' AND '$maxPrice'";
                    } else {
                        $query .= "`price` >='$minPrice'";
                    }
                }
            }

            $query .= " AND `status_status_id`='1'";

            if ($sortOption != 0) {

                if ($sortOption == 1) {
                    $query .= "ORDER BY `price` ASC";
                } elseif ($sortOption == 2) {
                    $query .= "ORDER BY `price` DESC";
                } elseif ($sortOption == 3) {
                    $query .= "ORDER BY `date_added` DESC";
                }
            }
        }

        $product_resultset = Database::execute($query);

?>
        <div class="row">
            <div class="col-12">
                <!-- Content -->
                <div class="row" id="productContainer">

                    <?php
                    if ($product_resultset->num_rows == 0) {
                    ?>
                        <div>
                            <span>No Products</span>
                        </div>
                        <?php
                    } else {


                        for ($i = 0; $i < $product_resultset->num_rows; $i++) {
                            $product_data =   $product_resultset->fetch_assoc();

                        ?>
                            <div class="col-12 col-sm-6 col-md-4 productItemInAdvancedSearchPage ">

                                <div class="row">
                                    <a href="singleProductView.php?product_id=<?php echo ($product_data['product_id']) ?>" class="text-decoration-none text-reset">
                                        <?php
                                        if ($product_data["path"] == null) {
                                        ?>
                                            <img src="../../assets/img/product_images/default_product_icon.svg" class="productImageInAdvancedSearchPage" alt="product image" />
                                        <?php
                                        } else {
                                        ?>
                                            <img src="../../<?php echo $product_data['path'] ?>" class="productImageInAdvancedSearchPage" alt="product image" />
                                        <?php
                                        }

                                        ?>

                                        <h5 class="mt-2"><?php echo $product_data["title"] ?></h5>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-2 ">
                                        <i class="bi bi-bag-heart-fill wishlist_icon_for_product_card" onclick="addToWishList(<?php echo $product_data['product_id'] ?>)"></i>
                                    </div>
                                    <div class="col-2 ">
                                        <i class="bi  bi-cart-fill cart_icon_for_product_card" onclick="addToCart(<?php echo $product_data['product_id'] ?>)"></i>
                                    </div>
                                </div>

                            </div>
                    <?php
                        }
                    }

                    ?>

                </div>

            </div>
        </div>


<?php

    }
}
