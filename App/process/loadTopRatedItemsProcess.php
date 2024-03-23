<?php

include "../../libs/connection.php";

$category_name = $_GET["category_name"];

$query = "SELECT * FROM `product` INNER JOIN `category` ON product.category_category_id=category.category_id LEFT JOIN product_images ON product.product_id=product_images.product_product_id WHERE `product`.`status_status_id`='1' AND";

if ($category_name != "All") {
    $query .= "`category`.`category_name`='$category_name' AND ";
}
$query .= " `date_added` LIKE '2024-01%' ORDER BY `points` DESC LIMIT 4";

$top_rated_items_resultset = Database::execute($query);

if ($top_rated_items_resultset->num_rows > 0) {

    for ($i = 0; $i < $top_rated_items_resultset->num_rows; $i++) {
        $top_rated_items_array =    $top_rated_items_resultset->fetch_assoc();
?>
        <div class="col-8 offset-2  col-md-4 offset-md-0 col-lg-3 mt-2">
            <a href="App/views/singleProductView.php?product_id=<?php echo( $top_rated_items_array["product_id"]) ?>" class="text-decoration-none text-reset">
                <div class="card">
                    <?php
                    if (isset($top_rated_items_array["path"])) {
                    ?>
                        <img src="<?php echo $top_rated_items_array["path"] ?>" class="card-img-top" alt="...">
                    <?php
                    } else {
                    ?>
                        <img src="assets/img/product_images/default_product_icon.svg" class="card-img-top " alt="product.img">
                    <?php
                    }
                    ?>

                    <div class="text-center">
                        <span><?php echo $top_rated_items_array["title"] ?></span>
                    </div>
                </div>
            </a>
            <div class="row">
                <div class="col-2 offset-5">
                    <i class="bi bi-bag-heart-fill wishlist_icon_for_product_card" onclick="addToWishList(<?php echo ($top_rated_items_array['product_id']) ?>)"></i>
                </div>
                <div class="col-2 ">
                    <i class="bi  bi-cart-fill cart_icon_for_product_card"  onclick="addToCart(<?php echo $top_rated_items_array['product_id']?>)"></i>
                </div>
            </div>
        </div>
<?php
    }
}
