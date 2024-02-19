<?php
include "../../libs/connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wish List</title>

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="">

    <div class="container-fluid pt-5">
        <div class="row d-flex justify-content-center">


            <!-- Breadcrumb -->
            <div class=" offset-1 col-11">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb -->

            <!-- Wishlist page heading -->
            <div class="text-center my-3">
                <h2>WISHLIST</h2>
            </div>
            <!-- Wishlist page heading -->


            <?php
            session_start();

            if (isset($_SESSION["user_wishlist_id"])) {
                $user_wishlist_id = $_SESSION["user_wishlist_id"];


                $wishlist_resultset = Database::execute("SELECT * FROM `wishlist`
                     INNER JOIN `product` ON product.product_id=wishlist.product_id 
                     LEFT JOIN `product_images` ON product_images.product_product_id=product.product_id
                    WHERE wishlist.user_wishlist_id='$user_wishlist_id'");

                if ($wishlist_resultset->num_rows == 0) {
            ?>
                    <div class="text-center mt-5">
                        <span class="text-secondary ">No products added to the wishlist</span>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-10 overflow-y-scroll wishlist_item_div">

                        <?php
                        for ($i = 0; $i < $wishlist_resultset->num_rows; $i++) {
                            $wishlist_array = $wishlist_resultset->fetch_assoc();
                        ?>
                            <div class="row mb-3">
                                <div class="col-1 d-flex justify-content-center align-items-center">
                                    <i class="bi bi-x-lg remove_from_wishlist" onclick="removeFromWishlist(<?php echo ($wishlist_array['product_id']) ?>)"></i>
                                </div>
                                <div class="col-3  justify-content-center">

                                    <?php
                                    if (isset($wishlist_array["path"])) {
                                    ?>

                                        <img src="../../<?php echo ($wishlist_array['path']) ?>" class="wishlist_item_image" alt="wishlist_image" onclick="open_wishlist_single_item_popup_view_modal('<?php echo $wishlist_array['title'] ?>','<?php echo $wishlist_array['description'] ?>','<?php echo $wishlist_array['price'] ?>','<?php echo $wishlist_array['points'] ?>','<?php echo $wishlist_array['path'] ?>');" />
                                    <?php
                                    } else {
                                    ?>
                                        <img src="../../assets/img/product_images/default_product_icon.svg" class="wishlist_item_image" alt="wishlist_image" onclick="open_wishlist_single_item_popup_view_modal('<?php echo $wishlist_array['title'] ?>','<?php echo $wishlist_array['description'] ?>','<?php echo $wishlist_array['price'] ?>','<?php echo $wishlist_array['points'] ?>','../../assets/img/product_images/default_product_icon.svg');" />
                                    <?php
                                    }

                                    ?>

                                </div>

                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-12 text-center col-md-5">
                                            <span><?php echo ($wishlist_array["title"]) ?></span>
                                        </div>
                                        <div class="col-12  text-center mt-2 mt-md-0 col-md-5">
                                            <span><?php echo ($wishlist_array["price"]) ?>/=</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 ">
                                    <div class="row justify-content-center">
                                        <button class="btn btn-warning col-12 col-md-5">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                <?php
                }

                ?>

            <?php
            } else {
            ?>
                <div class="text-center mt-5">
                    <span class="text-secondary ">No products added to the wishlist</span>
                </div>

            <?php
            }
            ?>

        </div>


        <!-- wishlist_single_item_popup_view_modal -->
        <div class="modal" id="wishlist_single_item_popup_view_modal" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body ">
                        <div class="row d-flex justify-content-end">
                            <div class="col-1">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <img src="../../assets/img/product_images/default_product_icon.svg" alt="product_image" id="product_image" />
                            </div>
                            <div class="col-6 ">
                                <div class="row">
                                    <h3 id="product_name">product name</h3>
                                </div>
                                <div class="row">
                                    <span id="price">price</span>
                                </div>
                                <div class="row mt-5">
                                    <i class="bi bi-star col-1"></i>
                                    <i class="bi bi-star col-1"></i>
                                    <i class="bi bi-star col-1"></i>
                                    <i class="bi bi-star col-1"></i>
                                    <i class="bi bi-star col-1"></i>
                                </div>
                                <div class="row mt-2">
                                    <p id="product_description">product description</p>
                                </div>
                                <div class="row input-group ">
                                    <span class="col-7 input-group-text">Quantity</span>
                                    <input type="number" id="quantityInput" class="col-5 form-control" value="1" oninput="validateQuantity()" />
                                </div>
                                <div class="row mt-3 ">
                                    <button class="btn btn-dark col-11">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist_single_item_popup_view_modal -->

    </div>


    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>
</body>

</html>