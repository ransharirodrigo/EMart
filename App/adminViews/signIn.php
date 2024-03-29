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
            <div class="row d-flex justify-content-center align-items-center vh-100">
             
                <div class="col-8 col-sm-6 col-lg-4 border py-3 rounded-3">

                    <div class="row text-center">
                        <div>
                            <h3>Sign In</h3>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 col-lg-3">
                            <span>Email</span>
                        </div>
                        <div class="col-12 col-lg-9">
                           
                                <input type="email" class="form-control" id="email" value="" />
                         

                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-lg-3">
                            <span>Password</span>
                        </div>
                        <div class="col-12 col-lg-9">
                            <input type="password" class="form-control" id="password" />
                        </div>
                    </div>

                    <div class="row justify-content-center my-4">
                        <button class="btn btn-secondary col-6" onclick="adminSignIn()">Sign In</button>
                    </div>

                </div>

              

            </div>
        </div>

        <script src="../../assets/js/script.js"></script>
    </body>

    </html>