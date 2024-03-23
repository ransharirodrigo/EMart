<?php
if (!empty($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Single View</title>

        <link rel="icon" href="../../assets/img/e_mart_logo.png" />
        <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../../assets/css/style.css" />
    </head>

    <body>

        <div class="container-fluid ">
            <div class="row">

                <?php
                include "../../config.php";
                include(BASE_PATH . '/components/header.php');

                $product_resultset =    Database::execute("SELECT * FROM `product` LEFT JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_product_id` WHERE `product`.`product_id`='$product_id'");

                if ($product_resultset->num_rows == 1) {
                    $product_data = $product_resultset->fetch_assoc();
                ?>
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <?php
                        if ($product_data["path"] != null) {
                        ?>
                            <img src="../../<?php echo ($product_data["path"]) ?>" alt="Single Product Image" class="single_product_image" />
                        <?php
                        } else {
                        ?>
                            <img src="../../assets/img/product_images/default_product_icon.svg" alt="Single Product Image" class="single_product_image" />
                        <?php
                        }


                        ?>

                    </div>
                    <div class="col-12 col-md-6 d-flex align-items-center">
                        <div class="row gy-3">
                            <div>
                                <h3><?php echo $product_data['title'] ?></h3>
                            </div>
                            <div>
                                <h5>Rs.<?php echo $product_data['price'] ?>.00</h5>
                            </div>
                            <div>
                                <p class="col-10"><?php echo $product_data['description'] ?></p>
                            </div>
                            <div>
                                <input type="number" class="text-center col-6" value="1" oninput="validateQuantity(this)" />
                            </div>

                            <div>
                                <button class="col-6 btn btn-dark">Add To Cart</button>
                            </div>
                            <div>
                                <button class="col-6 btn btn-secondary">Buy Now</button>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div>
                        <p>Something went wrong</p>
                    </div>
                <?php
                }

                ?>



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
?>