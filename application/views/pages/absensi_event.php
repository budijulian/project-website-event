
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <title><?= $title;?></title>
  <link rel="shortcut icon" href="<?=base_url()?>assets/img/logohimasi.png">
  <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- animas.css  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
   <link href="<?=base_url()?>assets/css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/vendor/fontawesome-free/css/fontawesome.min.css">
 <!-- dropzone -->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/dropzone/min/dropzone.min.js" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/dropzone/min/dropzone.min.css" />
 <!-- sweet alert -->
 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
 <!-- font by googlefont -->
 <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Caudex:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
   <!-- datatables  -->
   
   <style>
   body{
font-family: 'Fjalla One', sans-serif;
   }
		#header-img {
			content: "";
			position: fixed;
			z-index: -4;
			background-size: cover;
			background-position: center top;
			display: block;
			width: 100%;
			height: 600px;
			filter: blur(2px);
			-webkit-filter: blur(3px);
		}

		#header-body {
			padding-top: 5px;
		}
    #status{
   -moz-transform: rotate(-25deg);
    -webkit-transform: rotate(-25deg);
    -ms-transform: rotate(-25deg);
    -o-transform: rotate(-25deg);
    }

a.scrolltotop {
     background: #800000 none repeat scroll 0 0;
     bottom: 20px;
     color: #ffffff;
     display: none;
     font-size: 20px;
     height: 40px;
     padding-top: 0px;
     position: fixed;
     right: 20px;
     text-align: center;
     width: 40px;
     z-index: 99;
 }

 /* menghilangkan object pada  slide pada rensponsive mobile  */
 
 #slide-2{
    display: block;
    /* background-image : url('assets/img/bg-2.jpg');  */
    /* background-repeat : no-repeat; */
    width : 100%;
    height :100%;
    background-size: 100%;
    position: absolute;
		top: 20px;
		z-index: 3;
}

 #slide-1{
    display: block;
    /* background-image : url('assets/img/bg-2.jpg');  */
    /* background-repeat : no-repeat; */
    width : 70%;
    height : 40%;
			content: "";
			position: absolute;
			background-size: cover;
    background-size: 60%;
		top: 70px;
    left: 60%;
		z-index: 1;
}

@media (max-width: 764px) 
{
    #slide-1
    {
        display: none;
    }
}

</style>

</head>

  <!-- icons  -->
<script src="https://kit.fontawesome.com/997fbe78b5.js" crossorigin="anonymous"></script>
  <!-- ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- animasi css  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!-- icon fa awesome -->
  <script src="https://use.fontawesome.com/f5efeb45d7.js"></script>
  <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script><!-- Custom styles for this template -->
 <!-- sweet alert -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<body class="bg-light">

  <?php foreach($event as $e)?>
	<header class="row border-0">
		<img id="header-img" src="<?=base_url()?>assets/img/plamplet/<?=$e->foto?>" class="embed-responsive" witdh="100%"
			height="350px" alt="">
	</header>
	<!-- Page Content -->
	<div class="container">
		<div class="row  mb-3 ">
			<div class="col-lg-3"></div>
			<div id="header-body" class="card col-lg-5 mb-3 shadow-lg animate__animated animate__slideInUp">
				<div class="card-body">
					<div class="bg-info rounded rounded-sm ">
						<div  class="mt-2 mb-3">
							<h3 style="font-size:22px;" class=" text-white text-center font-weight-bold">FORM KEHADIRAN PESERTA </h3>
							<h5 style="font-size:18px;" class="text-white text-center ">"<?=$e->nama_event?>"</h5>
							<p style="font-size:14px;" class="mb-2 text-white text-center"><span class=" fa fa-calendar-alt"></span> <?php echo date('d-M-Y H:i');?></p>
						</div>
					</div>
					
					<form action="" class="form-absen" method="POST">
						<div class="row">
							<div class="form-group col-12  col-lg-12 col-sm-12 col-md-12 col-auto">
								<label class="font-weight-bold" for="" >Email Terdaftar<span class="text-danger">*</span></label>
            	</div>
					
							<div class="form-group col-12 col-lg-12 col-sm-12 col-md-12 col-auto">
              <input type="hidden" name="email" id="email">
								<input id="email2" type="text" value=""
								required name="email2" placeholder="Masukan Email Anda" onkeyup="checkFunction();"
								class="border-danger col-12  border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
								 <small class="text-danger">*gunakan email yang terdaftar</small> 
							</div>
						
							<div class="form-group col-12 col-lg-12 col-sm-12 col-md-12 col-auto">
									<label class="font-weight-bold" for="" >Nama Lengkap <span class="text-danger">*</span></label>
							</div>
							<div class="form-group col-12 col-lg-12 col-sm-12 col-md-12 col-auto">
                  <input type="hidden" name="kd_peserta" id="kd_peserta">
              	<input id="nama" type="text" value=""
								required name="nama" placeholder="Masukan Nama Lengkap Anda"  
								class="border-danger col-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
							</div>
							<div class="form-group col-12 col-lg-12 col-sm-12 col-md-12 col-auto">
								<label class="font-weight-bold" for="" >Perguruan Tinggi/Instansi<span class="text-danger">*</span></label>
							</div>
							<div class="form-group col-12 col-lg-12 col-sm-12 col-md-12 col-auto">
								<input id="instansi" type="text" value=""
								required name="instansi" placeholder="Masukan Perguruan Tinggi/Instansi Anda" 
								class="border-danger col-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
							</div>
							<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
								<a href="<?=base_url()?>event/kembali" title="Kembali ke Home" name="kembali" class="  mb-4 btn btn-sm btn-info float-left text-white "> <span class="fa fa-home"></span> Home </a>
								<a id="absen-sekarang" name="absen-sekarang" title="Absen Sekarang" class="col col-6 col-lg-3 mb-4 btn btn-sm btn-success float-right text-white "><strong> ABSEN SEKARANG</strong>  </a>
							</div>
						</div>
						</form>


					</div>
				</div>

			</div>
		</div>
	</div>
	      <!-- absen pada formkehadiran -->
    <script type="text/javascript">
     function checkFunction(){
            var email = document.getElementById("email2");
            var get_email = email.value.toLowerCase();  
                  if(get_email != ""){
                       $.ajax({
                              url	     : '<?=base_url()?>event/get_data_peserta',
                              type     : 'POST',
                              dataType : 'json',
                              data     : 'email='+get_email,
                              success  : function(hasil){
                                if(hasil.length == 0){
                                  $('#nama').val("");
                                  $('#instansi').val("");
                                  $('#kd_peserta').val("");
                                }else{
                                  for(i=0; i<hasil.length; i++){
                                    $('#nama').val(hasil[i].nama_lengkap);
                                    $('#instansi').val(hasil[i].instansi);
                                    $('#kd_peserta').val(hasil[i].kd_peserta);
                                    $('#email').val(hasil[i].email);
                                }
                              }
                            }
                         })
                  }else if(get_email == ""){
                     $('#nama').val("");
                     $('#instansi').val("");
                     $('#kd_peserta').val("");
                  }

      }
      $(document).ready(function(){
               $("#absen-sekarang").click(function(){
                  var email;
                  var nama = $('#nama').val();
                  var instansi = $('#instansi').val();
                  var kd_peserta = $('#kd_peserta').val();
                  if(kd_peserta == ""){
                    email = $('#email2').val();
                  }else{
                    email = $('#email').val();
                  }
                  if((email != "") && (nama != "")  && (instansi != "")){
                          //kondisi email peserta pernah digunakan atau tidak);
                        $.ajax({
                              url	     : '<?=base_url()?>event/set_absensi',
                              type     : 'POST',
                              async    : false,
                              dataType : "json",
                              data     : {email : email, nama : nama,  instansi : instansi, kd_peserta: kd_peserta},
                              success  : function(hasil){
                                console.log(hasil);
                                // kondisi saat absen 
                                if(hasil.length <= 0){
                                    Swal.fire({
                                          icon: 'success',
                                          title: 'Terimakasih.',
                                          text: 'Anda berhasil absen.',
                                          })
                                }else{
                                    Swal.fire({
                                          icon: 'error',
                                          title: 'Opps.',
                                          text: 'Anda tidak bisa absen 2 kali.',
                                          })
                                }
                                 window.location.href ="<?=base_url()?>event/kembali";
                              }
                            });
                             
                          } 
                    });
             
          });
      </script>
