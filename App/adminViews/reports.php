<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>

<body class="reportPage">

    <div class="container-fluid">
        <div class="row">
            <?php
            include("../../config.php");
            include("../../components/adminHeader.php");
            ?>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-4">
                <div class="row h-100 d-flex align-items-end justify-content-center">
                    <button class="btn btn-success bg-opacity-50 col-6">Today Invoices</button>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="row">
                    <div class="col-8 ">
                        <div class="row text-center ">
                            <p class="text-white fs-5">Search from date</p>
                        </div>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-4">
                                <div class="row text-center">
                                    <p class="text-white fs-5">From</p>
                                </div>
                                <div class="row">
                                    <input type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-4 offset-2">
                                <div class="row text-center">
                                    <p class="text-white fs-5">To</p>
                                </div>
                                <div class="row">
                                    <input type="date" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row h-100 d-flex align-items-end justify-content-center">
                            <button class="btn btn-danger col-6">Clear</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-4  ">
            <div class="col-10 reportsTable overflow-y-scroll">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>INV001</td>
                            <td>2024-04-11</td>
                            <td>$100.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>
                        <tr>
                            <td>INV002</td>
                            <td>2024-04-10</td>
                            <td>$150.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>

                        <tr>
                            <td>INV001</td>
                            <td>2024-04-11</td>
                            <td>$100.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>
                        <tr>
                            <td>INV002</td>
                            <td>2024-04-10</td>
                            <td>$150.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>
                        <tr>
                            <td>INV001</td>
                            <td>2024-04-11</td>
                            <td>$100.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>
                        <tr>
                            <td>INV002</td>
                            <td>2024-04-10</td>
                            <td>$150.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>
                        <tr>
                            <td>INV001</td>
                            <td>2024-04-11</td>
                            <td>$100.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>
                        <tr>
                            <td>INV002</td>
                            <td>2024-04-10</td>
                            <td>$150.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>
                        <tr>
                            <td>INV001</td>
                            <td>2024-04-11</td>
                            <td>$100.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>
                        <tr>
                            <td>INV002</td>
                            <td>2024-04-10</td>
                            <td>$150.00</td>
                            <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</body>

</html>