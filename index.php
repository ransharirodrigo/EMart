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
                        <div class="d-none d-md-block col-md-3 col-lg-2">
                            <div class="card" >
                                <img src="assets/img/mobile_tmp.jpeg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                
                                </div>
                            </div>
                        </div>



                    <?php
                    }

                    ?>
                </div>
            </div>

            <?php
            include "components/footer.php";
            ?>

        </div>

    </div>


</body>

</html>