<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container-fluid bg-secondary py-3">
        <div class="row align-items-center ">

            <div class="col-10 col-lg-4">
                <h3 class="text-light d-inline">Admin</h3>
            </div>

            <div class="col-lg-7 text-right d-none d-lg-block">
                <div class="row">
                    <a href="dashboard.php" class="col-2 d-flex flex-column align-items-center text-decoration-none " style="cursor: pointer;">
                        <i class="bi bi-speedometer2 text-white bi-3x" style="font-size: xx-large;"></i>
                        <span class=" text-light"> Dashboard</span>
                    </a>
                    <a href="productManagement.php" class="col-2 d-flex flex-column align-items-center text-decoration-non" style="cursor: pointer;">
                        <i class="bi bi-box text-white bi-3x" style="font-size: xx-large;"></i>
                        <span class=" text-light "> Products</span>
                    </a>
                    <a href="categoryManagement.php" class="col-2 d-flex flex-column align-items-center text-decoration-none" style="cursor: pointer;">
                        <i class="bi bi-list-ul text-white bi-3x" style="font-size: xx-large;"></i>
                        <span class=" text-light "> Categories</span>
                    </a>

                    <a href="brandManagement.php" class="col-2 d-flex flex-column align-items-center text-decoration-none" style="cursor: pointer;">
                        <i class="bi bi-tags text-white bi-3x" style="font-size: xx-large;"></i>
                        <span class=" text-light "> Brands</span>
                    </a>
                    <a href="reports.php" class="col-2 d-flex flex-column align-items-center text-decoration-none" style="cursor: pointer;">
                        <i class="bi bi-file-earmark-bar-graph text-white bi-3x" style="font-size: xx-large;"></i>
                        <span class=" text-light "> Reports</span>
                    </a>
                    <a href="account.php" class="col-2 d-flex flex-column align-items-center text-decoration-none" style="cursor: pointer;">
                        <i class="bi bi-person text-white" style="font-size: xx-large;"></i>
                        <span class=" text-light "> Account</span>
                    </a>
                </div>
            </div>

            <div class="d-lg-none col-2" style="font-size: xx-large; cursor: pointer;" onclick=" openOffcanvas()">
                <i class="bi bi-list text-white"></i>
            </div>

        </div>


        <div class="offcanvas offcanvas-end" id="offcanvas" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header d-flex justify-content-end">
                <button type="button" class="btn-close" aria-label="Close" onclick="closeOffcanvas()"></button>
            </div>
            <div class="offcanvas-body ">
                <a href="" class=" d-flex  align-items-center text-decoration-none gap-5 mb-3" style="cursor: pointer;">
                    <i class="bi bi-speedometer2  bi-3x text-dark" style="font-size: xx-large;"></i>
                    <span class=" text-dark fs-5"> Dashboard</span>
                </a>
                <a href="" class=" d-flex  align-items-center text-decoration-none gap-5 mb-3" style="cursor: pointer;">
                    <i class="bi bi-box  bi-3x text-dark" style="font-size: xx-large;"></i>
                    <span class=" text-dark fs-5"> Products</span>
                </a>
                <a href="" class=" d-flex  align-items-center text-decoration-none gap-5 mb-3" style="cursor: pointer;">
                    <i class="bi bi-list-ul  bi-3x text-dark" style="font-size: xx-large;"></i>
                    <span class=" text-dark fs-5"> Categories</span>
                </a>

                <a href="" class=" d-flex  align-items-center text-decoration-none gap-5 mb-3" style="cursor: pointer;">
                    <i class="bi bi-tags  bi-3x text-dark" style="font-size: xx-large;"></i>
                    <span class=" text-dark fs-5"> Brands</span>
                </a>
                <a href="" class=" d-flex  align-items-center text-decoration-none gap-5 mb-3" style="cursor: pointer;">
                    <i class="bi bi-file-earmark-bar-graph  bi-3x text-dark" style="font-size: xx-large;"></i>
                    <span class=" text-dark fs-5"> Reports</span>
                </a>
                <a class=" d-flex  align-items-center text-decoration-none gap-5 mb-3" style="cursor: pointer;">
                    <i class="bi bi-person text-dark" style="font-size: xx-large;"></i>
                    <span class=" text-dark fs-5"> Account</span>
                </a>
            </div>
        </div>

    </div>

    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <script>
        var offcanvas = new bootstrap.Offcanvas(document.getElementById("offcanvas"));

        function openOffcanvas() {
            offcanvas.show();
        }

        function closeOffcanvas() {
            offcanvas.hide();
        }
    </script>

</body>

</html>