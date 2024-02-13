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

<body>

    <div class="container-fluid pt-5">
        <div class="row d-flex justify-content-center">

            <div class="text-center">
                <h2>WISHLIST</h2>
            </div>

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

        </div>
    </div>

</body>

</html>