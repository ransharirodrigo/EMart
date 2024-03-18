<?php

include "../../libs/connection.php";


if (empty($_GET["searchText"])) {
    echo "Please enter the Name of the product you are looking for";
} else if (isset($_GET["searchText"]) && isset($_GET["categoryID"])) {

    $searchText = $_GET["searchText"];
    $categoryID = $_GET["categoryID"];

    $query = "SELECT * FROM `product` LEFT JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_product_id` WHERE `title` LIKE '%" . $searchText . "%' AND `status_status_id`='1'";

    if ($categoryID != 0) {
        $query .= " AND `product`.`category_category_id`='$categoryID'";
    }

    $search_product_resultset = Database::execute($query);

    if ($search_product_resultset->num_rows != 0) {
        for ($i = 0; $i < $search_product_resultset->num_rows; $i++) {
            $search_product_data = $search_product_resultset->fetch_assoc();
?>
            <div class="col-8 col-md-6 col-lg-3  mt-5 ">
                <div class="row">
                    <a href="" class="text-decoration-none text-reset  ">

                        <?php
                        if ($search_product_data["path"] == null) {
                        ?>
                            <img src="../../assets/img/product_images/default_product_icon.svg" class="category_page_product_image" alt="product image" />
                        <?php
                        } else {
                        ?>
                            <img src="../../<?php echo $search_product_data["path"] ?>" class="category_page_product_image" alt="product image" />
                        <?php
                        }

                        ?>


                        <div class="card-body">
                            <span><?php echo $search_product_data["title"] ?></span>
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
    } else {
        echo "No Products";
    }
} else {
    echo ("Something Went Wrong");
}
