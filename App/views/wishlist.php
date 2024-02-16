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
</head>

<body class="">

    <div class="container-fluid pt-5">
        <div class="row d-flex justify-content-center">


            <!-- Breadcrumb -->
            <div class=" offset-1 col-11">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb -->

            <!-- Wishlist page heading -->
            <div class="text-center mt-5">
                <h2>WISHLIST</h2>
            </div>
            <!-- Wishlist page heading -->


            <?php
            session_start();

            if (isset($_SESSION["user_wishlist_id"])) {
                $user_wishlist_id = $_SESSION["user_wishlist_id"];
            ?>

                <div class="col-10 overflow-y-scroll wishlist_item_div">
                    <?php
                    $wishlist_resultset = Database::execute("SELECT * FROM `wishlist`
                     INNER JOIN `product` ON product.product_id=wishlist.product_id 
                     LEFT JOIN `product_images` ON product_images.product_product_id=product.product_id
                    WHERE wishlist.user_wishlist_id='$user_wishlist_id'");
                    ?>

                    <?php
                    for ($i = 0; $i < $wishlist_resultset->num_rows; $i++) {
                        $wishlist_array = $wishlist_resultset->fetch_assoc();
                    ?>
                        <div class="row mb-3">
                            <div class="col-3  justify-content-center">

                                <?php
                                if (isset($wishlist_array["path"])) {
                                ?>

                                    <img src="../../<?php echo ($wishlist_array['path']) ?>" class="wishlist_item_image" alt="wishlist_image">
                                <?php
                                } else {
                                ?>
                                    <img src="../../assets/img/product_images/default_product_icon.svg" class="wishlist_item_image" alt="wishlist_image">
                                <?php
                                }

                                ?>


                            </div>

                            <div class="col-5 ">
                                <div class="row">
                                    <div class="col-12 text-center col-md-5">
                                        <span><?php echo($wishlist_array["title"])?></span>
                                    </div>
                                    <div class="col-12  text-center mt-2 mt-md-0 col-md-5">
                                        <span><?php echo($wishlist_array["price"])?>/=</span>
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
            } else {
            ?>
                <div class="text-center mt-5">
                    <span class="text-secondary ">No products added to the wishlist</span>
                </div>

            <?php
            }
            ?>



        </div>
    </div>

</body>

</html>