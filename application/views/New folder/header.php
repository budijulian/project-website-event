<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <title><?= $status;?></title>
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
    /* background-image : url('assets/img/bg-2.jpg');  */
    /* background-repeat : no-repeat; */
    width : 70%;
    height : 40%;
		content: "";
    display: none;
		position: absolute;
    background-size: 60%;
		top: 30px;
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

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top text-white shadow shadow-sm  " 
  style="background: rgb(144,3,3);
background: #80000;
color:white;">
    <div class="container">
    <img class=" text-white float-right font-weight-bold" src="<?=base_url()?>assets/img/logohimasi.png" class="float-left" witdh="40px" height="40px" alt="">  
      <a class="navbar-brand text-white float-right font-weight-bold" href="<?=base_url()?>">&nbsp;HIMASI EVENT </a>
     
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span style="color:white;">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a  class="scroll nav-link text-white " href="<?=base_url()?>#events"><strong> Event &nbsp;|</strong> </a>
            </li>
            <li class="nav-item">
            <a  class="scroll nav-link text-white " href="<?=base_url()?>#merchandise"><strong> Merchandise &nbsp;|</strong> </a>
            </li>
            <li class="nav-item">
            <a  class="scroll nav-link text-white " href="<?=base_url()?>#QnA"> <strong>QnA &nbsp;|</strong> </a>
            </li>
            <li class="nav-item">
            <a  class="scroll nav-link text-white " href="<?=base_url()?>#kontak"> <strong> Kontak &nbsp;|</strong></a>
            </li>
            <li class="nav-item float-right">
              <form action="<?=base_url()?>pencarian" method="post" id="pencarian">
                  <input class="form-control float-left mr-sm-4 rounded-pill mr-xl-6 mr-lg-6 mr-md-4 border-0" type="search" placeholder="Cari Event" name="cari" aria-label="Search">
              </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <a href="javascript:;" class="scrolltotop"><span class="fa fa-2x fa-angle-up" style="padding-top:-20px"></span></a>