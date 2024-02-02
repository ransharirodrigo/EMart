<?php
include "../../libs/connection.php";

$date = date("Y");

$category_name = $_GET["category_name"];

$query = "SELECT product.title,product_images.path FROM emart_db.top_selling_items
 INNER JOIN `product` ON product.product_id=top_selling_items.product_product_id 
 LEFT JOIN emart_db.product_images ON product.product_id=product_images.product_product_id
  INNER JOIN emart_db.category ON category.category_id=product.category_category_id";

if ($category_name != "All") {
    $query .= " WHERE category.category_name='" . $category_name . "' AND `top_selling_items`.`date_time` LIKE '". $date ."%"."'";
}else{
    $query .= " WHERE `top_selling_items`.`date_time` LIKE '" . $date ."%". "' ORDER BY `top_selling_items`.`qty` LIMIT 4";
}



$best_selling_items_resultset = Database::execute($query);

if ($best_selling_items_resultset->num_rows > 0) {

    for ($i = 0; $i < $best_selling_items_resultset->num_rows; $i++) {
        $best_selling_items_array = $best_selling_items_resultset->fetch_assoc();
?>
        <div class="col-8 offset-2  col-md-4 offset-md-0 col-lg-3 mt-2">
            <a href="#" class="text-decoration-none text-reset">
                <div class="card">

                    <?php
                    if (isset($best_selling_items_array["path"])) {
                    ?>
                        <img src="<?php echo $best_selling_items_array["path"] ?>" class="card-img-top " alt="<?php echo $best_selling_items_array["title"] . "img" ?>">
                    <?php
                    } else {
                    ?>
                        <img src="assets/img/product_images/default_product_icon.svg" class="card-img-top " alt="product.img">
                    <?php
                    }
                    ?>

                    <div class="text-center">
                        <span><?php echo $best_selling_items_array["title"] ?></span>
                    </div>
                </div>
            </a>
        </div>

<?php
    }
} else {
    echo ("No items in the top sellling table");
}
