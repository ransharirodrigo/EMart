<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Mart Sign In</title>

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>

<body>
    <div class="container-fluid">


        <div class="row flex justify-content-center align-items-center vh-100">
            <div class="col-12">
                <div class="row">
                    <div class=" d-flex justify-content-center ">
                        <img class="logo" src="../../assets/img/e_mart_logo.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-8 col-sm-6 col-lg-5  border py-3 rounded-3">

                <div class="row text-center">
                    <div>
                        <h3>Create You E-Mart Account</h3>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-lg-3">
                        <span>First Name</span>
                    </div>
                    <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="first_name">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-lg-3">
                        <span>Last Name</span>
                    </div>
                    <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="last_name"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-lg-3">
                        <span>Email</span>
                    </div>
                    <div class="col-12 col-lg-9">
                        <input type="email" class="form-control" id="email"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-lg-3">
                        <span>Mobile</span>
                    </div>
                    <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="mobile"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-lg-3">
                        <span>Username</span>
                    </div>
                    <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="username"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-lg-3">
                        <span>Password</span>
                    </div>
                    <div class="col-12 col-lg-9">
                        <input type="password" class="form-control" id="password"/>
                    </div>
                </div>

                
                <div class="row justify-content-center mt-4">
                    <button class="btn btn-warning col-6" onclick="signUp();">Sign Up</button>
                </div>

            </div>
        </div>



    </div>

    <script src="../../assets/js/script.js"></script>
</body>

</html>