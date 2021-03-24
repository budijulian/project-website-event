
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Konfirmasi Tiket | Event </title>
    
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
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/dropzone/dropzone.css" />
 <!-- sweet alert -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.all.min.js"></script>
 
</head>
<?php foreach($event as $e)?>
<body style="background-color: rgb(196,194,194);">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-0 col-md-0 col-auto"> </div>
            <div class="card col-lg-8 col-sm-12 col-md-12 col-auto mt-2 mb-5 "> 
            <h4 class=" card-title text-dark text-center mt-3"> <span class="fa fa-calendar-check-o text-danger"> </span> <?=$e->nama_event?> </h4>
           
            <div class="row card-header bg-transparent mb-3">
                <div class="col-lg-4 col-sm-4 col-md-4 col-auto rounded-right float-left  rounded-pill rounded-left badge badge-counter">
                    <h6 class="text-dark"><span class='fa fa-user-circle-o'></span> Data Diri</h6>
                </div>
                <div class=" col-lg-4 col-sm-4 col-md-4 col-auto rounded-right float-left  rounded-pill rounded-left badge badge-counter">
                    <h6 class="text-dark"><span class='fa fa-money-bill'></span> Bukti Pembayaran</h6>
                </div>
                <div class=" col-lg-4 col-sm-4 col-md-4 col-auto rounded-right float-left  rounded-pill rounded-left badge badge-danger">
                    <h6 class="text-white"><span class='fa fa-envelope'></span> Konfirmasi</h6>
                </div>
            </div>
            <div class="card-body mt-2 mb-2 bg-light text-center">
                <?php if($this->session->userdata('kd_tiket_peserta') == null){
                    echo '<h2 class="animate__animated animate__heartBeat"><span class="fa fa-3x fa-times-circle-o text-danger"></span><br>GAGAL</h2>
                    <br><small>Maaf,Data Anda Belum Lengkap.</small>';
                }else if($this->session->userdata('kd_tiket_peserta') != null){
                    echo '<h2 class="animate__animated animate__heartBeat"><span class="fa fa-3x fa-check-circle text-success"></span><br>BERHASIL</h2>';
                }?>
                <br>
               <p for=""><strong>Nomor Tiket : <?= $this->session->userdata('kd_tiket_peserta');?> </strong><br>
                <strong>Waktu Pemesanan : <?= date('d-m-Y H:i');?> </strong></p>
                <!-- <button id="download_tiket" class="btn btn-info btn-sm" > Download Tiket</button> -->
              <?php if($this->session->userdata('kd_tiket_peserta') != null){
               echo '<p style="font-size:12px" class=" text-black rounded mt-2 mr-2 mt-2 ml-2">
               <span class="fa fa-send-o"></span>
               Pemesanan anda sedang di proses.<br> Konfirmasi pemesanan event akan kami kirimkan melalui email.
               <br>Terimakasih.</p>';
              }else{}?> 
              <p style="font-size:14px;"><a id="save_link" target="n_blank" href=""  >Buat Reminder</a></p>
              <a href="<?=base_url()?>user/cetak_tiket" target="n_blank" class="btn btn-sm btn-info" type="button" >Download Tiket</a>
            </div>
             <div class="form-group col-lg-12 mt-2 mb-2 text-right">
              <a href="<?=base_url()?>event/kembali" name="kembali" class="btn btn-sm btn-primary text-white float-right"><span class="fa fa-home"></span> Beranda </a>
                   
             </div>
            <div class="col-lg-2 col-sm-0 col-md-0 col-auto"> </div>
        </div>

    </div>
    
</body>

<!--Moment is convert datatime library  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
<?php foreach($event as $e)?>
const nama_event = "<?=$e->nama_event?>";
const lokasi = "<?=$e->lokasi?>";
const str1 = "<?=$e->dari_tanggal.' '.$e->dari_jam?>";
const str2 = "<?=$e->sampai_tanggal.' '.$e->sampai_jam?>";
var date1 = moment(str1).format('YYYYMMDDTHH:mm:ss');
var date2 = moment(str2).format('YYYYMMDDTHH:mm:ss');
var save_link = document.getElementById("save_link");
                    save_link.setAttribute("href", 'https://calendar.google.com/calendar/u/0/r/eventedit?text=[REMINDER+EVENT+HIMASI]+'+nama_event+''+
                    '&dates='+date1+'c/'+date2+'c'+
                    '&location='+lokasi+''+
                    '&details=HALLO Sobat HIMASI, jangan lupa menghadiri event '+nama_event+' yang akan diselenggarakan pada : '+
                    '%0A%0ATanggal : '+moment(str1).format("DD-MM-YYYY")+' '+moment(str2).format("DD-MM-YYYY")+''+
                    '%0AWaktu : '+moment(str1).format("HH:mm")+' - '+moment(str2).format("HH:mm")+" WIB"+
                    '%0ALokasi : '+lokasi+''+
                    '%0A%0A Ingat yaa!!, selalu stay tuned. Dan jangan lupa follow kami juga di Instragram dan Website Official HIMASI. ');

});                 
</script>
  <!-- icon fa awesome -->
  <script src="https://use.fontawesome.com/f5efeb45d7.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?=base_url()?>assets/js/dropzone/dropzone.js"></script>
</html>

