<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>

<body class="reportPage" onload="loadInvoiceDetails('all','0','0')">

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
                    <button class="btn btn-success bg-opacity-50 col-6" onclick="loadInvoiceDetails('today')">Today Invoices</button>
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
                                    <input type="date" id="startDate" class="form-control" onchange="handleStartDateChange()" />
                                </div>
                            </div>
                            <div class="col-4 offset-2">
                                <div class="row text-center">
                                    <p class="text-white fs-5">To</p>
                                </div>
                                <div class="row">
                                    <input type="date" id="endDate" class="form-control" onchange="handleEndDateChange()" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row h-100 d-flex align-items-end justify-content-center">
                            <button class="btn btn-danger col-6" onclick="clearInAdminReports()">Clear</button>
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
                            <th>Customer Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="invoiceDetailsTableBody">
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="../../assets/js/script.js"></script>
</body>

</html>