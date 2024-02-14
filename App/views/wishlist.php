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
            ?>

                <div class="col-10 mt-5 overflow-y-scroll wishlist_item_div">
                    <?php
                    for ($i = 0; $i < 15; $i++) {
                    ?>
                        <div class="row mb-3">
                            <div class="col-3  justify-content-center">
                                <img src="../../assets/img/index_page_img2.jpg" class="wishlist_item_image" alt="wishlist_image">
                            </div>

                            <div class="col-5 ">
                                <div class="row">
                                    <div class="col-12 text-center col-md-5">
                                        <span>Hpf jgjfj</span>
                                    </div>
                                    <div class="col-12  text-center mt-2 mt-md-0 col-md-5">
                                        <span>150 000/=</span>
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