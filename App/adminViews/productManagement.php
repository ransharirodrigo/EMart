<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php
            include("../../config.php");
            include("../../components/adminHeader.php");
            ?>
        </div>
        <div class="row mt-3" >
            <div class="col-md-6 offset-md-3">
              
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" name="query" placeholder="Search products..." style="width: 400px;">
                        <div class="input-group-append">
                            <button class="btn btn-outline-warning btn-lg" type="submit">Search</button>
                        </div>
                    </div>
              
            </div>
        </div>


    </div>


</body>

</html>