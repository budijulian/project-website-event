<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title;?> | HIMASI EVENT</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="<?=base_url()?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
  <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- animas.css  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="shortcut icon" href="<?=base_url()?>assets/admin/img/logo.png">
    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- data tables css  --><link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <!-- ckeditor -->
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
  <style>
        #gambar1 {
            width: 50px;
            height: 50px;
        }
        
        #accordionSidebar {
            background-color: #b30000;
        }
    </style>

</head>
        <!-- QRCODE Library  -->
    <script src="<?=base_url()?>assets/admin/js/qrcode.js"></script> 
    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/admin/vendor/jquery/jquery.min.js"></script> 
  <!-- icons  -->
<script src="https://kit.fontawesome.com/997fbe78b5.js" crossorigin="anonymous"></script>
  <!-- ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- animasi css  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
     <!-- sweet alert -->
 <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->

<!--Moment is convert datatime library  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
 <!-- sweet alert -->
 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <!-- data tables  -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>admin/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?=base_url()?>assets/admin/img/logo.png" alt="" id="gambar1">
                </div>
                <div class="sidebar-brand-text mx-3"><b>HIMASI EVENT</b></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#event" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Kelola Events</span>
                </a>
                <div id="event" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url()?>admin/events/tambah">Menambah Event</a>
                        <a class="collapse-item" href="<?=base_url()?>admin/events?all=true">Data Event</a>
                    </div>
                </div>
            </li>
<?php if($this->session->userdata('sebagai') =="Admin"){
            echo' <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#panitia" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Kelola Panitia</span>
                </a>
                <div id="panitia" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="'.base_url().'admin/panitia?all=true">Data Panitia</a>
                    </div>
                </div>
            </li> ';
                }?>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#peserta" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Peserta</span>
                </a>
                <div id="peserta" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                          <!-- <a class="collapse-item" href="<?=base_url()?>admin/events/peserta/tambah">Menambah Peserta</a> -->
                          <a class="collapse-item" href="<?=base_url()?>admin/kehadiran?all=true">Kehadiran Peserta</a>
                        <a class="collapse-item" href="<?=base_url()?>admin/peserta?all=true">Data Peserta</a>
                    </div>
                </div>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#voucher" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Vouchers</span>
                </a>
                <div id="voucher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                          <a class="collapse-item" href="">Menambah Voucher</a>
                        <a class="collapse-item" href="peserta/data_peserta.html">Data Vouchers</a>
                    </div>
                </div>
            </li> -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sertifikat" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Sertifikat</span>
                </a>
                <div id="sertifikat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <a class="collapse-item" href="<?=base_url()?>admin/sertifikat/tambah">Menambah Sertifikat</a> -->
                        <a class="collapse-item" href="<?=base_url()?>admin/sertifikat?all=true">Data Sertifikat</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dokumentasi" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Dokumentasi</span>
                </a>
                <div id="dokumentasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <a class="collapse-item" href="<?=base_url()?>admin/events/dokumentasi/tambah">Menambah Dokumentasi</a> -->
                        <a class="collapse-item" href="<?=base_url()?>admin/dokumentasi?all=true">Data Dokumentasi</a>
                    </div>
                </div>
            </li>
    <?php if($this->session->userdata('sebagai') =="Admin"){
            echo '<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#merchandise" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-search-dollar"></i>
                    <span>Kelola Merchandise</span>
                </a>
                <div id="merchandise" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--  <a class="collapse-item" href="'.base_url().'admin/merchandise/tambah">Menambah Merchandise</a> -->
                        <a class="collapse-item" href="'.base_url().'admin/merchandise">Data Merchandise</a>
                    </div>
                </div>
            </li>';
             }?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pesan" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Kelola Pesan</span>
                </a>
                <div id="pesan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url()?>admin/pesan">Data Pesan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Setting</span>
                </a>
                <div id="setting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <?php if($this->session->userdata('sebagai') =="Admin"){
                       echo ' <a class="collapse-item" href="'.base_url().'admin/informasi">Informasi</a>';
                       echo '<a class="collapse-item" href="'.base_url().'admin/akun">Akun Admin</a>';   
                       echo '<a class="collapse-item" href="'.base_url().'admin/smtp">SMTP Server</a>';  
                          } ?>
                        
                        <a class="collapse-item" href="<?=base_url()?>admin/developer">Developer</a>
                        <a class="collapse-item" href="<?=base_url()?>admin/about">About</a>
                    </div>
                </div>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-bookmark"></i>
                    <span>Laporan</span>
                </a>
                <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="cards.html">Laporan Keuangan</a>
                        <a class="collapse-item" href="cards.html">Laporan Events</a>
                        <a class="collapse-item" href="cards.html">Laporan Panitia</a>
                        <a class="collapse-item" href="cards.html">Laporan Peserta</a>
                        <a class="collapse-item" href="cards.html">Laporan Merchandise</a>
                    </div>
                </div>
            </li> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

    <script src="<?=base_url()?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
    