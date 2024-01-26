<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Mart</title>

    <link rel="icon" href="assets/img/e_mart_logo.png">
</head>

<body class="">

    <div class="container-fluid m-0 ">
        <div class="row">
            <?php
            include "components/header.php";
            ?>

            <div class=" col-12 d-flex justify-content-center">
                <img src="assets/img/welcome_image.jpg" class="w-50" alt="">
            </div>

            <div class="col-12">
                <div class="row">
                    <?php
                    for ($i = 0; $i < 8; $i++) {
                    ?>
                        <div class="d-none d-md-block col-md-3 col-lg-2 mt-2">
                            <div class="card">
                                <img src="assets/img/mobile_tmp.jpeg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <a href="#" class="text-decoration-none text-reset">Laptops</a>
                                </div>
                            </div>
                        </div>

                    <?php
                    }

                    ?>
                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="row">


                    <div class="col-12">
                        <h3>Best Selling</h3>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <span class="col-2 col-md-1">All</span>
                            <span class="col-2 col-md-1">Mobiles</span>
                            <span class="col-2 col-md-1">Laptops</span>
                            <span class="col-2 col-md-1">Cameras</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <?php
                            for ($i = 0; $i < 4; $i++) {
                            ?>
                                <div class="col-8 offset-2  col-md-4 offset-md-0 col-lg-3 mt-2">
                                    <a href="#" class="text-decoration-none text-reset">
                                        <div class="card">
                                            <img src="assets/img/mobile_tmp.jpeg" class="card-img-top" alt="...">
                                            <div class="text-center">
                                                <span>Iphone 11</span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12">

            </div>

            <?php
            include "components/footer.php";
            ?>

        </div>

    </div>


</body>

</html>