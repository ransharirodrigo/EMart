<?php
if (isset($_GET['id'])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo ($_GET['name']) ?></title>

        <link rel="icon" href="../../assets/img/e_mart_logo.png" />
        <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../../assets/css/style.css" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">

                <?php
                include "../../config.php";
                include(BASE_PATH . '/components/header.php');
                ?>

                <div class="col-3">
                    <select name="" id="">
                        <option value="">Default Sort</option>
                        <option value="">Name</option>
                    </select>
                </div>

            </div>
        </div>

    </body>

    </html>
<?php
} else {

    header("Location:../../index.php");
}
