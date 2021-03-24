<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Page Login</title>

  <link rel="shortcut icon" href="<?=base_url()?>assets/img/logohimasi.png">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        span {
            color: #b30000;
        }
        
        button {
            float: right;
        }
        
        .btn {
            float: right;
        }
        
        body {
            background-color: #476b6b;
        }
        
        img {
            margin-top: 30px;
            width: 200px;
            height: 200px;
        }
    </style>

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">
                <img src="1594111392209.png" alt="" class="img-fluid mx-auto d-block">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4" id="teks"><span><b> ADMINISTRATOR
                                            <br> EVENT HIMASI </b></span>
                                        </h1>
                                    </div>
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="username" class="mt-3"><b> USERNAME </b></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control form-control-user" autocomplete="off" id="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="password" class="mt-3"><b> PASSWORD </b></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control form-control-user" autocomplete="off" id="password">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="dashboard.html" class="btn btn-danger">Login</a>
                                        <!-- <button type="submit" class="btn btn-danger">Login</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>