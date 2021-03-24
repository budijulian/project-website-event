
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Tiket | Event</title>
    
  <link rel="shortcut icon" href="<?=base_url()?>assets/img/logohimasi.png">
     <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script><!-- Custom styles for this template -->
  <link href="<?=base_url()?>assets/css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/vendor/fontawesome-free/css/fontawesome.min.css">
 <!-- animas.css  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
 <!-- dropzone -->

  <script src="<?=base_url()?>assets/dropzone/jquery-3.2.1.min.js"></script>
  <script src="<?=base_url()?>assets/dropzone/dropzone.js"></script>
   <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dropzone/dropzone.css" /> 
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>  -->
  <!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/dropzone/min/dropzone.min.css" /> -->
 <!-- sweet alert -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.all.min.js"></script>
 
 <style>
 
.content{
    padding: 5px;
    margin: 0 auto;
}
.content span{
    width: 250px;
}

.dz-message{
    text-align: center;
    font-size: 28px;
}
 </style>
</head>

<?php foreach($tiket as $t)?>
<?php foreach($event as $e)?>
<body style="background-color: rgb(196,194,194);">
   <div class="fixed-bottom mt-3" style=" background-color:	rgb(220,220,220)">
		<div class="container">
			<div class="row border-0 mt-1 mb-1">
				<div class=" col-lg-6 col-sm-12 col-md-12 col-12 col-auto float-right mt-1 mb-1">
					<h6 class="font-weight-bolder"> <span
							class="fa fa-calendar-check-o  fa-2x fa-sm auto w-auto h-auto fa-auto"
							style="color:rgb(200, 0, 0);"></span> <?= $e->nama_event?> </h6>
				</div>
				<div class=" col-lg-3 col-sm-12 col-md-12 col-12 col-auto mb-1 ">
					<h4 id="total_bayar" class="text-dark font-weight-bold mt-2 float-right h-auto w-auto"><span class="fa fa-money-bill"></span>
                     <?= $t->jumlah?><small class="float-right">(<?= $t->jenis_tiket?>)</small></h4>
				</div>
				<div class="col-lg-3 col-sm-12 col-md-12 mt-2 mb-1 float-right text-white text-center ">
					<a onclick="bayar_sekarang();" class=" btn btn-xm btn-danger col-sm-8 col-md-8"
						style="background-color:rgb(200, 0, 0);">
						<span class="fa fa-shopping-cart"></span>&nbsp; <strong>Bayar</strong></a>
				</div>
				
			</div>
		</div>
	</div>

    <div class="container mb-4">
        <div class="row ">
            <div class="col-lg-2 col-sm-0 col-md-0 col-auto"> </div>
            <div class="card  col-lg-8 col-sm-12 col-md-12 col-auto animate__animated animate__slideInUp mt-2 mb-5"> 
            <h3 class=" card-title text-dark text-center mt-3"> <span class="fa fa-calendar-check-o text-danger"> </span> <?= $e->nama_event?></h3>
            <div class="text-info bg-light">
            <p class="text-info mt-2 mb-2 mr-2 ml-2"> <span class="fa fa-question-circle-o"></span>
             Upload bukti screenshot bukti pembayaran (format: jpeg/png/jpeg).
             </p>
            <!-- <p class="text-info mt-2 mb-2 mr-2 ml-2"> <span class="fa fa-question-circle-o"></span>
             Data pendukung, silahkan upload bukti screenshot ketentuan yg tertera di data pendukung (format: jpeg/png/jpeg).
             Pembayaran hanya menggunakan transfer bank. Mohon lampirkan bukti pembayaran (format: jpeg/png/jpeg).</p> -->
            </div>
            <div class="row card-header bg-transparent mb-3">
                <div class="col-lg-4 col-sm-4 col-md-4 col-auto rounded-right float-left  rounded-pill rounded-left badge badge-counter">
                    <h6 class="text-dark"><span class='fa fa-user-circle-o'></span> Data Diri</h6>
                </div>
                <div class=" col-lg-4 col-sm-4 col-md-4 col-auto rounded-right float-left  rounded-pill rounded-left badge badge-danger">
                    <h6 class="text-white"><span class='fa fa-money-bill'></span> Bukti Pembayaran</h6>
                </div>
                <div class=" col-lg-4 col-sm-4 col-md-4 col-auto rounded-right float-left  rounded-pill rounded-left badge badge-counter">
                    <h6 class="text-dark"><span class='fa fa-envelope'></span> Konfirmasi</h6>
                </div>
            </div>
            <div class="card-body mt-3 mb-3 bg-light">
                <div class="row" >
                <div class=" col-lg-6 col-sm-6 col-md-6 col-auto">
                    <label class="font-weight-bold " >Informasi Peserta</label>
                        <table class="table table-sm text-black">
                        <tr>
                        <td><small>Nama</small></td><td><small><?= base64_decode($this->session->userdata('nama'));?></small></td>
                        </tr>
                        <tr>
                        <td><small>Email</small></td><td><small><?= base64_decode($this->session->userdata('email'));?></small></td>
                        </tr>
                         <tr>
                        <td><small>No HP</small></td><td><small><?= base64_decode($this->session->userdata('nohp'));?></small></td>
                        </tr>
                        </table>
                </div>
                <div class=" col-lg-6 col-sm-6 col-md-6 col-auto">
                    <label class="font-weight-bold " >Informasi Event</label>
                        <table class="table table-sm text-black">
                        <tr>
                        <td><small>Tanggal</small></td><td><small> <?= date('d F Y', strtotime($e->dari_tanggal))." - ".date('d F Y', strtotime($e->sampai_tanggal))?></small></td>
                        </tr>
                        <tr>
                        <td><small>Waktu</small></td><td><small> <?= $e->dari_jam."-".$e->sampai_jam. " WIB"?></small></td>
                        </tr>
                        <tr>
                        <td><small>Lokasi</small></td><td><small> <?= $e->lokasi?></small></td>
                        </tr>
                        </table>
                </div>
                <div class=" col-lg-6 col-sm-6 col-md-6 col-auto">
                    <!-- <label class="font-weight-bold " for="" >Punya Voucher?</label> -->
                        <!-- <table class="table table-sm table-borderless text-black-50">
                            <tr><td> <small id="notif-vouchers" class="badge badge-info"></small></td></tr>
                            <tr>
                            <td><input id="token" type="text" name="voucher" placeholder="Masukan Kode Vouchers" 
                                    class=" input-group-text bg-transparent"></td>
                            <td>  <button class="check-vouchers btn btn-success mt-1 text-left btn-sm text-white"  
                                    id="check-vouchers">Gunakan</button></td>
                            </tr>
                        </table> -->
                          
                    </div>
                        <div class="form-group  col-lg-12 col-sm-12 col-md-12 col-auto">
                            <label class="font-weight-bold " >Data Pendukung </label>
                        </div>
                        <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto">
                            <form action='<?=base_url()?>events/set_pembayaran2' 
                                class="dropzone" id="myAwesomeDropzone"> 
                            </form>  
                        </div>
                   
                    <div class="form-group col-lg-12 col-sm-12 col-md-12 col-auto mt-2">
                        <!-- <a  href="<?=base_url()?>events/pembayaran/page/1"  name="kembali" class="btn btn-info text-white float-left">
                        <span class="fa fa-angle-left"></span>
                         Kembali </a> -->
                   <br>
                    </div>
                  <br>
			    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-0 col-md-0 mb-5 mt-5 col-auto"> </div>
        </div>

    </div>

    <!-- dropzone file -->
    <script type='text/javascript'>
         Dropzone.autoDiscover = false;
        $(".dropzone").dropzone({
            addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name; 
                $.ajax({
                    type: 'POST',
                    url:  '<?=base_url()?>events/set_pembayaran2',
                    data: {name: name, request: 2},
                    sucess: function(data){
                        console.log('success: ' + data);
                        
                    }
                });
                
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
                    
        });
        //ini belum kelar untuk bikin alert pembayaran
        function  bayar_sekarang(){
            <?php echo 'window.location.href ="'.base_url().'e/pembayaran/page/3"'; ?>                     
            }
     </script>
   
  <!-- icon fa awesome -->
  <script src="https://use.fontawesome.com/f5efeb45d7.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- <script src="<?=base_url()?>assets/js/dropzone/min/dropzone.min.js"></script> -->
</body>
</html>

