<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Login | HIMASI EVENT</title>

  <link rel="shortcut icon" href="<?=base_url()?>assets/img/logohimasi.png">
    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
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
                <img src="<?=base_url()?>assets/img/logohimasi.png" alt="" class="img-fluid mx-auto d-block">
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4" id="teks"><span><b> ADMINISTRATOR
                                            <br> HIMASI EVENT </b></span>
                                        </h1>
                                    </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="username" class="mt-1"><b> USERNAME </b></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input id="username" type="text" class="form-control form-control-user" autocomplete="off" id="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="password" class="mt-1"><b> PASSWORD </b></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input id="pass" type="password" class="form-control form-control-user" autocomplete="off" id="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="password" class="mt-1"><b> SEBAGAI </b></label>
                                                </div>
                                                <div class="col-md-9">
                                                <input type="radio" name="sebagai" value="Admin"  autocomplete="off" id="sebagai"> Admin 
                                                <input type="radio" name="sebagai" value="Panitia" autocomplete="off" id="sebagai2"> Panitia 
                                               
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <a id="masuk"  class="btn btn-danger text-white col-4  text-center">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>assets/admin/js/sb-admin-2.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script><!-- Custom styles for this template -->
 <!-- sweet alert -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

 <!-- sweet alert -->
 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</body>
  <script type="text/javascript">
		$(document).ready(function(){
           //tampil_event_terbaru();

            $('#masuk').click(function(){
                var username = $('#username').val();
                var pass = $('#pass').val();
                var sebagai = document.querySelector('input[name="sebagai"]:checked').value;
                   login(username,pass,sebagai);
            });
            // Get the input field
            var input = document.getElementById("pass");

            // Execute a function when the user releases a key on the keyboard
            input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("masuk").click();
            }
            });
            function login(username,pass,sebagai){
                $.ajax({
						url	     : '<?=base_url()?>admin/dashboard/set_login',
						type     : 'POST',
						dataType : 'json',
						data     : 'username='+username+'&pass='+pass+'&sebagai='+sebagai,
						success  : function(hasil){
                            if(hasil.length > 0){
                                    window.location.href ="<?=base_url()?>admin/dashboard";
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Login',
                                    text: 'Username atau password anda salah!!',
                                    })
                            
                            }
						}})
            }
        });

</script>
</html>