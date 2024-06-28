<?php

session_start();

if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>

        <link rel="icon" href="../../assets/img/e_mart_logo.png" />
        <link rel="stylesheet" href="../../assets/css/style.css" />


    </head>

    <body class="adminDashboardBackground" onload="loadTodayIncomeInAdminDashboard(); loadTodayInvoiceCount(); loadHappyCustomerCount(); loadTopSellingItemDetailsToTheTable()">

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
                    <div class="row text-center">
                        <h5 class="fw-fw-bolder fs-3 text-success" id="todayIncome"></h5>
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
                    <div class="row text-center">
                        <h5 class="fw-fw-bolder fs-3 text-success" id="todayInvoices"></h5>
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
                    <div class="row text-center">
                        <h5 class="fw-fw-bolder fs-3 text-success" id="happyCustomerCount"></h5>
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
                            <p>"Fantastic shopping experience! The website is easy to navigate, and the product descriptions are detailed. My order arrived on time, and the quality exceeded my expectations. Will definitely shop here again!"</p>
                        </div>


                        <div class="col-10 mb-2 bg-secondary bg-opacity-50 px-3 py-2 rounded-2">
                            <p>"Great variety of products at reasonable prices."</p>
                        </div>

                        <div class="col-10 mb-2 bg-secondary bg-opacity-50 px-3 py-2 rounded-2">
                            <p>"Excellent service! The advanced search feature made it easy for me to find exactly what I was looking for. Adding items to my wishlist was a breeze. Highly recommend this site to all my friends!"</p>
                        </div>

                        <div class="col-10 mb-2 bg-secondary bg-opacity-50 px-3 py-2 rounded-2">
                            <p>"Top-notch e-commerce platform! The product range is impressive, and I appreciate the detailed filters in the advanced search. My order arrived in perfect condition. Five stars!"</p>
                        </div>



                    </div>
                </div>
                <div class="col-10 col-md-7 offset-md-1 bg-white rounded-4">
                    <div class="row mt-2">
                        <h5>Income</h5>
                      
                    </div>
                    <div class="row ">
                        <div id="columnChartContainer" style="width: 100%; "></div>
                    </div>
                </div>
            </div>

            <div class="row my-4 d-flex justify-content-center">
                <div class="col-10 col-md-11 bg-white rounded-4 adminPagePendingOrderTable  overflow-y-scroll py-2">
                    <h5 class="fw-bold">Top Selling Items</h5>

                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Product ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="" id="topSellingItemsTableBody">


                        </tbody>
                    </table>
                </div>


            </div>

        </div>

        <script src="../../assets/js/script.js"></script>

        <!-- Google charts -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
        <script type="text/javascript">
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart']
            });

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawColumnChart);

            // Callback function to fetch data and draw the chart.
            function drawColumnChart() {
                // Create a new XMLHttpRequest object.
                var xhr = new XMLHttpRequest();

                // Define the URL endpoint for your backend data.
                var url = '../adminProcess/income_data.php';

                // Configure the request: GET method, asynchronous.
                xhr.open('GET', url, true);

                // Set up onload handler to process the response.
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 400) {
                        // Parse JSON response from the server.
                        var data = JSON.parse(xhr.responseText);

                        // Prepare data in Google DataTable format.
                        var dataTable = new google.visualization.DataTable();
                        dataTable.addColumn('string', 'Date');
                        dataTable.addColumn('number', 'Total Income');

                        // Add data rows to the DataTable.
                        data.forEach(item => {
                            dataTable.addRow([item.date, parseFloat(item.income)]);
                        });

                        // Set chart options.
                        var options = {
                            title: 'Total Income by Day for Last 10 Days',
                            chartArea: {
                                width: '50%'
                            },
                            hAxis: {
                                title: 'Date'
                            },
                            vAxis: {
                                title: 'Total Income'
                            }
                        };

                        // Instantiate and draw the chart.
                        var chart = new google.visualization.ColumnChart(document.getElementById('columnChartContainer'));
                        chart.draw(dataTable, options);
                    } else {
                        console.error('Error fetching data:', xhr.statusText);
                    }
                };

                // Set up onerror handler for network errors.
                xhr.onerror = function() {
                    console.error('Request failed.');
                };

                // Send the request.
                xhr.send();
            }
        </script>








    </body>

    </html>
<?php
} else {
    header("Location:signIn.php");
}
?>