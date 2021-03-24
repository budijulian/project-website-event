<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?php foreach($event as $e)?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>[KONFIRMASI EVENT] <?= $e->nama_event?></title>
 <link rel="shortcut icon" href="<?=base_url()?>assets/img/logohimasi.png">
  <!-- icons  -->
<script src="https://kit.fontawesome.com/997fbe78b5.js" crossorigin="anonymous"></script>
</head>
<style>
#outlook a {
            padding: 0;
        }

        body {
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            margin: 0;
            color: black;
            padding: 0;
            font-family: Helvetica, arial, sans-serif;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        .backgroundTable {
            margin: 0;
            padding: 0;
            width: 100% !important;
            line-height: 100% !important;
        }

        .main-temp table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            font-family: Helvetica, arial, sans-serif;
        }

        .main-temp table td {
            border-collapse: collapse;
        }

        .button {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
            width: 100%;
            height: 30px;
        }

        .button:hover {
            background-color: #FFFFFF;
            color: white;
        }
</style>
<body style="background-color:#ededed;">

<?php foreach($event as $e)?>
<?php foreach($tiket as $t)?>
<?php foreach($konfirmasi as $k)?>
<?php foreach($tiket_peserta as $tp)?>
<table width="100%" cellpadding="0" cellspacing="0" margin-top="50px" border="0" class="backgroundTable main-temp">
        <tbody>
            <tr>
                <td>
                    <table width="600" align="center" cellpadding="15" cellspacing="0" border="0" class="devicewidth" style="background-color:  #FFFFFF;">
                        <tbody>
                            <!-- Start header Section -->
                            <tr style="background-color:#921111;">
                                <td style="padding-top: 30px; border-radius: 0px 0px 30px 30px;">
                                    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee; text-align: center;">
                                        <tbody>
                                        <tr>
                                         <td style="padding-bottom: 0px; font-size: 24px; line-height: 28px; color: white;">
                                             <img src="<?= base_url('assets/img/logohimasi.png') ?>" title="HIMASI EVENT" style="width:100px;height:100px;text-decoration:none;">
                                             
                                             </td>
                                        </tr>
                                           
                                            <tr>
                                                <td style="padding-bottom: 10px; font-size: 24px; line-height: 28px; color: white;">
                                                    <strong> Terimakasih Atas Pemesanan Anda</strong>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 14px; line-height: 18px; color: white; padding-bottom: 10px">

                                                    Info detail mengenai pemesanan anda ada dibawah ini:
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- End header Section -->

                            <!-- Start address Section -->
                            <tr>
                                <td style="padding-top: 20;">
                                    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                        <tbody>
                                        <tr>
                                            <td >
                                                <h4 > Informasi Tiket</h4>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    QRCode
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    <img src="<?=base_url()?>assets/img/qrcode/<?=$name_qrcode?>" alt="" style="width: 180px; height:180px; align:center;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Waktu Pemesanan
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?= date('d M Y H:i', strtotime($tp->waktu_daftar));?>
                                                </td>
                                            </tr>
                                              <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Status Pemesanan
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?= $tp->status_tiket?>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Nomor Tiket
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?= $tp->kd_tiket_peserta?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Jenis Tiket
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?= $t->jenis_tiket?>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Email
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    :&nbsp;<?=$email;?>
                                                </td>
                                            </tr>
                                            <tr>
                                             <?php
                                               if($e->kategori =="E-Sports") {
                                                echo ' <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Nama Kapten
                                                </td>';}
                                                else {
                                                    echo ' <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Nama Lengkap
                                                </td>';
                                                }?>

                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?=$nama;?>
                                                </td>
                                            </tr>
                                            <tr>
                                            <?php
                                               if($e->kategori =="E-Sports") {
                                                   echo '<td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Nama Team
                                                </td> '; }
                                                else{
                                                     echo '<td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Perguruan Tinggi/Instansi
                                                </td> ';
                                                }?>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?=$instansi;?>
                                                </td>
                                            </tr>
                                            <tr>
                                              <?php
                                               if($e->kategori =="E-Sports") {

                                               }else{
                                                   echo '<td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Jurusan/Pekerjaan
                                                </td>';
                                               }?>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?=$jurusan;?>
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Nama Event
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?= $e->nama_event?>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Waktu
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?= date('d M Y', strtotime($e->dari_tanggal))." ".date('H:i', strtotime($e->dari_jam))." - ".date('d M Y', strtotime($e->sampai_tanggal))." ".date('H:i', strtotime($e->sampai_jam));?> 
                                                    
                                                </td>
                                            </tr>
                                             <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                Tempat
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?= $e->lokasi?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Harga Tiket
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : Rp.<?=$t->jumlah?>,-
                                                </td>
                                            </tr>  
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <hr>
                            <!-- End address Section -->
                            <!--Start Description Section -->
                                <table width="560" align="left" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style=" text-align: left;">
                                    <tbody>
                                       <tr>
                                            <td style=" padding-top:5px; width:100%; text-align:center; font-size: 14px; ">
                                                 <a style="width: 40%; height:5%; background-color:  #660106; border:solid white; border-radius: 15px 15px 15px 15px; text-align:center;" 
                                                 target="n_blank" href="<?=base_url()?>user/cetakinvoicetiket?status=true&id=<?= base64_encode($tp->kd_tiket_peserta)?>">
                                                     <div >Download Tiket</div></a>
                                              </td>   
                                       </tr>
                                        <tr>
                                            <td style=" padding-top:5px; font-size: 14px; ">
                                                 <!-- pesan konfirmasi email  -->
                                             <?=$k->konfirmasi?>                          
                                            </td>
                                        </tr>
                                            <!--Start terms and conditions Section -->
                                        <tr>
                                            <td style=" padding-top:5px;  font-size: 14px; ">
                                                <h6 style="font-size: 14px;"> Syarat & Ketentuan : </h6>
                                                <p style="font-size: 14px;"><?=$e->ketentuan?></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                           <!-- End Description Section -->
                           
                             
                         <!-- Start payment method Section -->
                            <tr style="background-color:#921111;">
                                <td style="padding-top: 30px; border-radius: 30px 30px 0px 0px;">
                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="text-align: center;">
                                        <tbody>
                                            <tr style="background-color:#921111; ">
                                                <td colspan="2" style="width: 100%; text-align: center; font-style: italic; font-size: 13px; font-weight: 600; color: white; padding: 15px 0;">
                                                    <small>Social Media HIMASI</small>
                                                    <br><br>
                                                    <a style="color:#921111;" target="n_blank" title="Email HIMASI" href="mailto:himasiunas@gmail.com">
                                                        <i style="font-size: 26px; padding-right:5px; color:white;">
                                                            <img widht="30px" height="30px" src="<?=base_url()?>assets/img/gmail.png" class="fas fa-envelope-square">
                                                        </i>   
                                                    </a>
                                                    <a style="color:#921111;" target="n_blank"  title="OA Line" href="https://lin.ee/S1usGrm">
                                                        <i style="font-size: 30px; padding-right:5px; color:white;">
                                                           <img widht="35px" height="35px"  src="<?=base_url()?>assets/img/line.png" class="fas fa-envelope-square">
                                                        </i>   
                                                    </a>
                                                     <a style="color:#921111;" target="n_blank" title="Youtube Channel" href="https://www.youtube.com/channel/UCdJF12PYit1xneWAge1Mjlg">
                                                        <i style="font-size: 30px; padding-right:5px; color:white;">
                                                            <img widht="40px" height="40px"  src="<?=base_url()?>assets/img/youtube.png" class="fas fa-envelope-square">
                                                        </i> 
                                                    </a>
                                                     <a style="color:#921111;" target="n_blank"  title="Instagram" href="https://www.instagram.com/himasi.unas1949/">
                                                        <i style="font-size: 40px; padding-right:5px; color:white;">
                                                           <img widht="40px" height="40px"  src="<?=base_url()?>assets/img/instagram.png" class="fas fa-envelope-square">
                                                        </i>      
                                                          
                                                    </a>
                                                    
                                                    <a style="color:#921111;" target="n_blank"  title="Website" href="https://himasi.ftki.unas.ac.id">
                                                        <i style="font-size: 36px; padding-right:5px; color:white;">
                                                            <img widht="30px" height="30px"  src="<?=base_url()?>assets/img/globe.png" class="fas fa-envelope-square">
                                                        </i>   
                                                    </a>
                                                     

                                                </td>
                                            </tr>
                                            <tr style="background-color:#921111;">
                                                <td colspan="2" style="width: 100%; text-align: center; font-style: italic; font-size: 13px; font-weight: 600; color: white; padding: 5px 0 15px 0;">
                                                   
                                                     <small>Copyright &copy; HIMASI</small> 
                                                    <small><br>Developed by Divisi Litbang <br> 2020/2021</small>
                                                    <br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            
                            <!-- End payment method Section -->

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    
<body>

</html>