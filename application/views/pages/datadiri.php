
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Peserta | Event</title>
    
  <link rel="shortcut icon" href="<?=base_url()?>assets/img/logohimasi.png">
     <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <!-- animas.css  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script><!-- Custom styles for this template -->
  <link href="<?=base_url()?>assets/css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/vendor/fontawesome-free/css/fontawesome.min.css">
 
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/dropzone/dropzone.css" />
 <!-- sweet alert -->
 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.css'>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.all.min.js"></script>
 
  <!-- icon fa awesome -->
  <script src="https://use.fontawesome.com/f5efeb45d7.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- sweet alert -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script> -->
  <script src="<?=base_url()?>assets/js/dropzone/dropzone.js"></script>
</head>
<body style="background-color: rgb(196,194,194);">

<?php foreach($tiket as $t)?>
<?php foreach($event as $e)?>
    <div class="fixed-bottom" style=" background-color:rgb(220,220,220);">
		<div class="container">
			<div class="row border-0 ">
				<div class=" col-lg-6 col-sm-12 col-md-12 col-12 col-auto float-right mt-1">
					<h6 class="font-weight-bolder"> <span
							class="fa fa-calendar-check-o  fa-2x fa-sm auto w-auto h-auto fa-auto"
							style="color:rgb(200, 0, 0);"></span> <?= $e->nama_event?> </h6>
					</div>
				<div class=" col-lg-4 col-sm-12 col-md-12 col-12 col-auto  float-right">
					<h5 id="jumlah2" class="text-dark font-weight-bold mt-1 float-right h-auto w-auto"><span class="fa fa-money-bill"></span>
                     <?= $t->jumlah?><small id='status' class="float-right">(<?= $t->jenis_tiket?>)</small></h5>
                     <input type="hidden" value="<?= $t->jumlah?>" name="jumlah" id="jumlah">
				</div>
				<div class="col-lg-2 col-sm-12 col-md-12 mt-2 mb-2 float-right text-white text-center ">
					<a  class=" tombol-lanjut btn btn-xm btn-danger col-12"
						style="background-color:rgb(200, 0, 0);">
						<span class="fa fa-shopping-cart"></span>&nbsp;<strong>Daftar</strong></a>
				</div>
			</div>
		</div>
	</div>

    <div class="container">
        <div class="row" style="padding-top:0px; padding-bottom:100px;">
            <div class="col-lg-3 col-sm-0 col-md-0 col-auto"> </div>
            <div class="card  col-lg-6 col-sm-12 col-md-12 col-auto animate__animated animate__slideInUp mb-5"> 
                <h4 class=" card-title text-dark text-center font-weight-bold mt-3 mb-3">
                <span class="fa fa-calendar-check-o text-danger"> </span> <?= $e->nama_event?></h4>
                <div class=" bg-light">
                <p class="text-info mt-2 mb-2 mr-2 ml-2"><span class="fa fa-question-circle-o text-info"></span>
                Mohon isi data diri dengan benar dan lengkap.</p>
                </div>
                <div class="row card-header bg-transparent mt-2 mb-2">
                    <div class="col-lg-4 col-sm-4 col-md-4 col-auto rounded-right float-left  rounded-pill rounded-left badge badge-danger">
                        <h6 class="text-white"><span class='fa fa-user-circle-o'></span> Data Diri</h6>
                    </div>
                    <div class=" col-lg-4 col-sm-4 col-md-4 col-auto rounded-right float-left  rounded-pill rounded-left badge  badge-counter">
                        <h6 class="text-dark"><span class='fa fa-money-bill'></span> Bukti Pembayaran</h6>
                    </div>
                    <div class=" col-lg-4 col-sm-4 col-md-4 col-auto rounded-right float-left  rounded-pill rounded-left badge badge-counter">
                        <h6 class="text-dark"><span class='fa fa-envelope'></span> Konfirmasi</h6>
                    </div>
            </div>
            <div class="card-body">
                <form action="" class=" form-user" method="POST">
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <label class="font-weight-bold " for="" >Email Peserta <span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto text-left">
                        <input id="email" type="email" value="<?= base64_decode($this->session->userdata('email')) ?>" 
                        required name="email" placeholder="Masukan Email Anda" 
                        class="border-danger col-lg-12  border-danger border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                    </div>
                    <?php 
                        if($e->kategori == "E-Sports"){
                            echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <label class="font-weight-bold" for="" > Nama Kapten<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="nama" type="text" value="'. base64_decode($this->session->userdata('nama')).'"
                         required name="nama" placeholder="Masukan Nama Kapten Anda" 
                          class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                    </div>';
                            echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                            <label class="font-weight-bold" for="" >ID Kapten <span class="text-danger">*</span></label></div>
                     <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="nim" type="text" value="'. base64_decode($this->session->userdata('nim')).'"
                         required name="nim" placeholder="Masukan Nomor ID Kapten" 
                          class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                        </div>';
                            
                     echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                            <label class="font-weight-bold" for="" >Nama Team <span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="instansi" type="text" value="'. base64_decode($this->session->userdata("instansi")).'"
                         required name="instansi" placeholder="Masukan Nama Team Anda"  
                         class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                    </div>';
                            echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <label class="font-weight-bold" for="" >Kategori<span class="text-danger"></span></label>
                    </div>
                    <div class="form-group col-lg-4 col-sm-4 col-md-12 col-auto">
                        <select class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent" name="jalur" id="jalur">
                        <option '; if(base64_decode($this->session->userdata('jalur')) ==""){ echo "selected";}else{} echo ' value="-">--Kategori--</option>
                        <option '; if(base64_decode($this->session->userdata('jalur')) =="Mobile Legend"){echo  "selected";}else{} echo ' value="Mobile Legend">Mobile Legend</option>
                        <option '; if(base64_decode($this->session->userdata('jalur')) =="PUBG Mobile"){ echo "selected";}else{} echo ' value="PUBG Mobile">PUBG Mobile</option>
                        </select>
                    </div>';
                        echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                            <label class="font-weight-bold" for="" >Nomor WA<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="nohp" type="tel" value="'.base64_decode($this->session->userdata('nohp')).'" 
                        required name="nohp" placeholder="Masukan Nomor WA Anda" 
                         class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                    </div>
                        ';
                    //     echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                    //         <label class="font-weight-bold" for="" >Nama Anggota <span class="text-danger">*</span></label>
                    // </div>
                    echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="jurusan" type="hidden" value="'.base64_decode($this->session->userdata('jurusan')).'" 
                        required name="jurusan" placeholder="Masukan Nama Anggota Anda" 
                         class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                    </div>';

                        }else{
                          echo' <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                            <label class="font-weight-bold" for="" >Nomor Induk/NPM <span class="text-danger">*</span></label>
                    </div>
                   
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="nim" type="text" value="' . base64_decode($this->session->userdata('nim')).'"
                         required name="nim" placeholder="Masukan Nomor Induk Anda" 
                          class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                        <small>*masukan "-" jika bukan mahasiswa</small> 
                    </div>
                    ';
                     echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                            <label class="font-weight-bold" for="" >Nama Lengkap <span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="nama" type="text" value="' . base64_decode($this->session->userdata('nama')).'"
                         required name="nama" placeholder="Masukan Nama Lengkap Anda"  
                         class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                    </div> ';
                    echo' <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <label class="font-weight-bold" for="" >Perguruan Tinggi/Instansi<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="instansi" type="text" value="' . base64_decode($this->session->userdata('instansi')).'"
                         required name="instansi" placeholder="Masukan Perguruan Tinggi/Instansi Anda" 
                          class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                    </div>';
                    echo ' <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <label class="font-weight-bold" for="" >Jurusan/Pekerjaan<span class="text-danger">*</span></label>
                    </div>
                     <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="jurusan" type="text" value="' . base64_decode($this->session->userdata('jurusan')).'"
                         required name="jurusan" placeholder="Masukan Jurusan/Pekerjaan Anda"  
                         class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                    </div>';
                     echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <label class="font-weight-bold" for="" >Jalur<span class="text-danger"></span></label>
                    </div>
                    <div class="form-group col-lg-6 col-sm-4 col-md-12 col-auto">
                        <select class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent" name="jalur" id="jalur">
                        <option '; if(base64_decode($this->session->userdata('jalur')) ==""){echo "selected";}else{} echo' value="-">--Jalur--</option>
                        <option '; if(base64_decode($this->session->userdata('jalur')) =="Reguler"){echo "selected";}else{} echo ' value="Reguler">Reguler</option>
                        <option '; if(base64_decode($this->session->userdata('jalur')) =="Karyawan"){echo "selected";}else{} echo ' value="Karyawan">Karyawan</option>
                        </select>
                        <small>*abaikan jika bukan mahasiswa</small>
                    </div>';
                     echo '<div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                            <label class="font-weight-bold" for="" >Nomor WA</label>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                        <input id="nohp" type="tel" value="' . base64_decode($this->session->userdata('nohp')) .'" 
                        required name="nohp" placeholder="Masukan Nomor WA Anda" 
                         class="border-danger col-lg-12   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                    </div>';

                        }
                    ?>
			    </form>
                 
                </div>
                <div class="text-right">
                    <a href="<?=base_url()?>event/kembali" title="Kembali ke Home" name="kembali" class=" col-4 mb-4 btn btn-sm btn-info text-white ">  <span class="fa fa-home"></span> Home </a>
                </div>
            </div> 
            <div class="col-lg-3 col-sm-0 col-md-0 col-auto"> </div>
        </div>

    </div>
    <script type="text/javascript">
		$(document).ready(function(){
             Swal.fire({
                position: 'top-center',
                icon: 'info',
                title: 'Mohon isi data dengan benar.',
                showConfirmButton: false,
                timer: 2000
                })
            $(".tombol-lanjut").click(function(){
            var data = $('.form-user').serialize();
            var email = $('#email').val();
            var nama = $('#nama').val();
            var nohp = $('#nohp').val();
            var jurusan = $('#jurusan').val();
            var instansi = $('#instansi').val();
            var nim = $('#nim').val();
            var jumlah = $('#jumlah').val();
            var jenis_tiket = document.getElementById("status").innerText
             
            if((email != "") && (nama != "") && (nohp != "") && (instansi != "") && (jurusan != "") && (nim != "")){
                    //kondisi email peserta pernah digunakan atau tidak
                    $.ajax({
                        url	     : '<?=base_url()?>events/check_email_peserta1',
                        type     : 'POST',
                        dataType : 'json',
                        data     : 'email='+email,
                        success  : function(hasil){
                                //check data hasil
                            if(hasil.length == 0){
                            //menyimpan data ke database
                                $.ajax({
                                url	     : '<?=base_url()?>events/set_datadiri',
                                type     : 'POST',
                                dataType : 'html',
                                data     : data,
                                success  : function(respons){
                                // kondisi jika event bersifat gratis 
                                if((jenis_tiket == '(Gratis)') || (jumlah == 0)){
                                    $.ajax({
                                        url	     : '<?=base_url()?>events/set_pembayaran1',
                                        type     : 'POST',
                                        dataType : 'html',
                                        success  : function(respons){
                                        // redirect halaman
                                        window.location.href ="<?=base_url()?>e/pembayaran/page/3?&payment=true&data=true&result=success";
                                        }});
                                    }
                                    else{
                                        // redirect halaman
                                        window.location.href ="<?=base_url()?>e/pembayaran/page/2?&payment=true&data=true";
                                    }
                                }
                                })
                            }
                            else{
                                Swal.fire({
                                icon: 'error',
                                title: 'Anda tidak boleh menggunakan email yang sama!!',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
						        })
                            }
                        }})
                }
                else{                    
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data anda belum lengkap!!',
                        })
                    }
                });
            });
          <?php  if($this->session->set_flashdata('notif') == true){
                    echo $this->session->set_flashdata('notif');
            }else{} ?>
    </script>
</body>
</html>

