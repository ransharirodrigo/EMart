<?php
session_start();

include "../../libs/connection.php";

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>

        <link rel="icon" href="../../assets/img/e_mart_logo.png" />
        <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../../assets/css/style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body>

        <div class="container-fluid pt-5">

            <div class="row d-flex justify-content-center">

                <!-- Breadcrumb -->
                <div class=" offset-1 col-11">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none ">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb -->

                <!-- Heading -->
                <div class="col-12 text-center mb-3">
                    <h2>Cart</h2>
                </div>
                <!-- Heading -->

                <?php
                $cart_resultset = Database::execute("SELECT `product`.`product_id` AS `product_id`,
                `product`.`description` AS `description`,
                `product`.`points` AS `points`,
                `product_images`.`path` AS `path`,
                 `product`.`title` AS `title`,
                 `product`.`price` AS `price`,
                 `cart`.`qty` AS `qty`
                 FROM `cart` INNER JOIN `product` ON `product`.`product_id`=`cart`.`product_product_id` LEFT JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_product_id` WHERE `user_email`='" . $user['email'] . "'");

                if ($cart_resultset->num_rows == 0) {

                ?>
                    <div class="col-10 text-center mt-5">
                        <span>No products in the cart</span>
                    </div>
                <?php

                } else {
                ?>
                    <!-- scroll div -->
                    <div class=" overflow-y-scroll col-10 cart_item_div pb-5">
                        <?php
                        for ($i = 0; $i < $cart_resultset->num_rows; $i++) {
                            $cart_data_array = $cart_resultset->fetch_assoc();
                        ?>
                            <div class="row mt-5">
                                <div class="col-1 d-flex align-items-center">
                                    <i class="bi bi-x-lg remove_from_cart" onclick="removeFromCart(<?php echo $cart_data_array['product_id'] ?>)"></i>
                                </div>

                                <?php

                                if (isset($cart_data_array["path"])) {
                                ?>
                                    <div class="col-3  d-flex align-items-center">
                                        <img src="../../<?php echo $cart_data_array["path"] ?>" class="cart_item_image" alt="cart product image"
                                         onclick="open_cart_single_item_popup_view_modal('<?php echo $cart_data_array['title'] ?>','<?php echo $cart_data_array['description'] ?>','<?php echo $cart_data_array['price'] ?>','<?php echo $cart_data_array['points'] ?>','<?php echo $cart_data_array['path'] ?>','<?php echo $cart_data_array['qty'] ?>');" />
                                    </div>
                                <?php

                                } else {
                                ?>
                                    <div class="col-3  d-flex align-items-center">
                                        <img src="../../assets/img/product_images/default_product_icon.svg" class="cart_item_image" alt="cart product image" 
                                         onclick="open_cart_single_item_popup_view_modal('<?php echo $cart_data_array['title'] ?>','<?php echo $cart_data_array['description'] ?>','<?php echo $cart_data_array['price'] ?>','<?php echo $cart_data_array['points'] ?>','../../assets/img/product_images/default_product_icon.svg','<?php echo $cart_data_array['qty'] ?>');"/>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="col-3 col-md-2  d-flex align-items-center">
                                    <span class="fs-5 fw-semibold"><?php echo $cart_data_array["title"] ?></span>
                                </div>
                                <div class="col-2 offset-md-2  d-flex align-items-center">
                                    <span><?php echo $cart_data_array["price"] ?></span>
                                </div>
                                <div class="col-2 col-md-1  d-flex align-items-center">
                                    <div class="row">
                                        <input type="number" class="text-center" id="quantityInput" value="<?php echo $cart_data_array['qty'] ?>" oninput="validateQuantity(this)" />
                                    </div>

                                </div>

                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- scroll div -->

                <?php
                }

                ?>



            </div>


            <?php
            include "../../components/product_modal.php"
            ?>


        </div>

        <script src="../../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/js/script.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:signIn.php");
}

?>