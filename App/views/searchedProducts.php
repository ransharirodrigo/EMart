<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            include("../../config.php");

            include(BASE_PATH . '/components/header.php');
            ?>

            <div class="col-12">
                <div class="row" id="productDiv">

                </div>
            </div>

            <?php
            include "../../components/footer.php";
            ?>


        </div>
    </div>

    <script>
        document.addEventListener(
            "DOMContentLoaded",
            function() {
                var searchedProductsDesignJSON = localStorage.getItem("searchedProductsDesign");
                var searchedProductsDesign = JSON.parse(searchedProductsDesignJSON);

                document.getElementById("productDiv").innerHTML = searchedProductsDesign;
            }
        );
    </script>
    <script src="../../assets/js/script.js"></script>
</body>

</html>