<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>

<body class="adminDashboardBackground">

    <div class="container-fluid">
        <div class="row">
            <?php
            include("../../config.php");
            include("../../components/adminHeader.php");
            ?>
        </div>

        <div class="row d-flex justify-content-center mt-4">
            <div class="col-10 col-md-3 mb-2 mb-md-0 bg-white  py-4 rounded-4">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="bi bi-cash-coin fs-1"></i>
                    </div>
                    <div class="col-9">
                        <h5 class="fw-bold">Today Income</h5>
                    </div>
                </div>
            </div>
            <div class="col-10  col-md-3 mb-2 mb-md-0 bg-white offset-md-1 py-4  rounded-4">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="bi bi-receipt fs-1"></i>
                    </div>
                    <div class="col-9">
                        <h5 class="fw-bold">Today Invoices</h5>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-3 mb-2 mb-md-0 bg-white offset-md-1 py-4  rounded-4">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="bi bi-people fs-1"></i>
                    </div>
                    <div class="col-9">
                        <h5 class="fw-bold">Happy Customer</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-10 col-md-3 adminDashboardCustomerReviewDiv bg-white py-3 rounded-4 mb-4 mb-md-0">
                <div class="row h-25">
                    <h5 class="fw-bold">Customer Review</h5>
                </div>

                <div class="row h-75 d-flex justify-content-center overflow-y-scroll">
                    <div class="col-10 mb-2 bg-secondary bg-opacity-50 px-3 py-2 rounded-2">
                        <p>Customer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer ReviewCustomer Review</p>
                    </div>


                    <div class="col-10 mb-2 bg-secondary bg-opacity-50 px-3 py-2 rounded-2">
                        <p>Customer Review</p>
                    </div>

                    <div class="col-10 mb-2 bg-secondary bg-opacity-50 px-3 py-2 rounded-2">
                        <p>Customer Review</p>
                    </div>

                    <div class="col-10 mb-2 bg-secondary bg-opacity-50 px-3 py-2 rounded-2">
                        <p>Customer Review</p>
                    </div>



                </div>
            </div>
            <div class="col-10 col-md-7 offset-md-1 bg-white rounded-4">
                <div>
                    Graph
                </div>
            </div>
        </div>

        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-10 col-md-11 bg-white rounded-4 ">
                <table class="table adminPagePendingOrderTable">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Order Complete Date</th>
                            <th scope="col">User Email</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr class="pendingOrdertableRow">
                            <td>1</td>
                            <td>2024-04-12</td>
                            <td>user1@example.com</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2024-04-11</td>
                            <td>user2@example.com</td>
                        </tr>
                        
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>


        </div>


    </div>


</body>

</html>