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

            <!-- scroll div -->
            <div class=" overflow-y-scroll col-10 cart_item_div">
                <?php
                for ($i = 0; $i < 5; $i++) {
                ?>
                    <div class="row mt-3">
                        <div class="col-1">
                            <i class="bi bi-x-lg"></i>
                        </div>
                        <div class="col-3 ">
                            <img src="../../assets/img/product_images/default_product_icon.svg" class="cart_item_image" alt="cart product image" />
                        </div>
                        <div class="col-3 col-md-2">
                            <span>Bella Grey</span>
                        </div>
                        <div class="col-2 offset-md-2">
                            <span>$62.00</span>
                        </div>
                        <div class="col-2 col-md-1">
                            <div class="row">
                                <input type="number" />
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- scroll div -->

        </div>
    </div>

</body>

</html>