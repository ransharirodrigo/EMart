<?php
if (!empty($_GET["product_id"])) {
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
                ?>

                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img src="../../assets/img/product_images/default_product_icon.svg" alt="Single Product Image" class="single_product_image" />
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <div class="row gy-3">
                        <div>
                            <h3>BELLA GREY</h3>
                        </div>
                        <div>
                            <h5>$62.00</h5>
                        </div>
                        <div>
                            <p class="col-10">Sed vel nulla non neque dictum imperdiet. Aliquam egestas hendrerit euismod. Sed sollicitudin Vivamus nisl leo, dapibus quis arcu eget, aliquam egestas hendrerit euismod, Nunc neque nunc, lacinia non consectetur ac, bibendum quis est.</p>
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