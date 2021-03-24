<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>[DOWNLOAD TIKET]</title>
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
            width: 50% !important;
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
<body  style="background-color:#ededed;">
<?php foreach ($tiket_peserta as $tp) ?>
<table id="output" style="padding-left : 20px;" width="70%" cellpadding="0" cellspacing="0" margin-top="50px" border="0" class="backgroundTable main-temp">
        <tbody>
            <tr>
                <td style="padding-top:40px">
                    <table width="800" align="center" cellpadding="10" cellspacing="0" border="0" class="devicewidth" >
                        <tbody>
                            <!-- Start header Section -->
                            <tr style="background-color:#921111;">
                                <td style=" border-radius: 0px 15px 0px 0px; height:0px">
                                </td>
                                <td style=" border-radius: 15px 0px 0px 0px; height:0px">
                                </td>
                            </tr>
                            <!-- End header Section -->

                            <!-- Start address Section -->
                            <tr style="background-color:  #FFFFFF;">
                                <td style="padding-top: 20;border-right-style: dashed; border-right-color: #921111">
                                    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                        <tbody>
                                            <tr>
                                                <td style="width: 75%; font-size: 14px; font-weight: bold;  padding-bottom: 0px;">
                                                    <img src="<?=base_url()?>assets/img/logohimasi.png" alt="" style="width: 30px; height:30px;">
                                                    <span style="color: #660106; font-size:18px; padding-top:-5px;">HIMASI EVENT</span>
                                                    <h1 style="font-size:32px;"  > E-TIKET</h4>
                                                </td>
                                                 <td style="width: 25%; font-size: 14px;  font-weight: bold; padding-left: 10px; padding-bottom: 0px;">
                                                    <div style="width: 100%; height:20%; background-color:  #660106; border:solid white; border-radius: 15px 15px 15px 15px; text-align:center;">
                                                    <h1 style="font-size:18px; color:white;"> 
                                                    <?php if($tp->status_tiket == "Verifikasi"){ 
                                                             echo "Verified";
                                                        }else{
                                                             echo "Not Verified";
                                                        }?>
                                                      </h1>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                     <table style="padding-bottom: 20px;" width="560" align="right" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                         <tbody>
                                         <tr><td style="width: 5%; height:25px; "></td>
                                                <td style="width: 70%; height:25px; font-weight: bold; text-align:right; color: black; padding-bottom: 0px;">
                                                     <p style="padding-right:5px;font-size: 18px;text-align:right; font-weight: bold; " >
                                                    <?= $tp->nama_event ?> </p>
                                                     <small style=" padding-right:5px; font-size: 16px;text-align:right; font-weight: bold;"> 
                                                      <?= $tp->kategori ?>  </small>

                                                </td>
                                                <td style="width: 25%; height:25px; line-height: 50% !important; border-left:solid 4px; color: black; padding-bottom: 0px;">
                                                    <p style="padding-left:10px;font-size: 35px;color: #740216;text-align:left; font-weight: bold; ">
                                                    <?= date('d', strtotime($tp->dari_tanggal));?><span style="padding-left:1px;padding-right:5px; font-size: 25px;text-align:right; color: black; font-weight: bold;">
                                                    <?= date('M', strtotime($tp->dari_tanggal));?></span>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                         <tbody>
                                            <tr>
                                                <td style="width: 15%; height:40px; font-weight: bold;  padding-bottom: 5px;">
                                                     <p style="padding-left:5px;font-size: 12px;text-align:left;color: #2C2C2C; font-weight: bold; " >
                                                    Tanggal  </p>
                                                     <p style="padding-left:5px;font-size: 12px;text-align:left;color: #2C2C2C; font-weight: bold; " >
                                                    Waktu </p>
                                                     <p style="padding-left:5px;font-size: 12px;text-align:left;color: #2C2C2C; font-weight: bold; " >
                                                    Lokasi </p>
                                                </td>
                                                <td style="width: 35%; height:50px; font-weight: bold;  padding-bottom: 5px;">
                                                     <p style="padding-left:5px; font-size: 14px;text-align:left; color: black;"> <?= date('d M Y', strtotime($tp->dari_tanggal))." - ".date('d M Y', strtotime($tp->sampai_tanggal));?> </p>
                                                     <p style="padding-left:5px; font-size: 14px;text-align:left;  color: black;"> <?= date('H:i', strtotime($tp->dari_jam))." - ".date('H:i', strtotime($tp->sampai_jam));?></p>
                                                      <p style="padding-left:5px; font-size: 14px;text-align:left;  color: black;"> <?= $tp->lokasi?> </p>
                                                </td>
                                                 <td style="width: 15%; height:40px; font-weight: bold;  padding-bottom: 5px;">
                                                     <p style="padding-left:5px;font-size: 12px;text-align:left;color: #2C2C2C; font-weight: bold; " >
                                                    Jenis Tiket </p>
                                                     <p style="padding-left:5px;font-size: 12px;text-align:left;color: #2C2C2C; font-weight: bold; " >
                                                    Harga </p>
                                                     <p style="padding-left:5px;font-size: 12px;text-align:left;color: #2C2C2C; font-weight: bold; " >
                                                    Status </p>
                                                </td>
                                                <td style="width: 30%; height:40px; font-weight: bold;  padding-bottom: 5px;">
                                                     <p style="padding-left:15px; font-size: 14px;text-align:left; color: black;"> <?= $tp->jenis_tiket?></p>
                                                     <p style="padding-left:15px; font-size: 14px;text-align:left;  color: black;"> Rp. <?= $tp->jumlah?>,-</p>
                                                      <p style="padding-left:15px; font-size: 14px;text-align:left;  color: black;"> Tiket <?= $tp->keterangan?></p>
                                                </td>
                                               
                                            </tr>
                                        </tbody>
                                    </table>
                                     <table  style="padding-top:20px;" width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                         <tbody>
                                         <tr>
                                             <td style="width: 80%; height:40px;text-align:left; background-color: #DCDCDC; font-weight: bold; color: black; 
                                                font-size: 7px; padding-right :5px;padding-left:5px;  padding-bottom: 5px; border-radius: 5px 5px 5px 5px; ">
                                                     <p style="padding-left:5px;text-align:left; font-weight: bold; " >
                                                    Ketentuan :
                                                     <?= $tp->ketentuan?>
                                            </td>
                                            <td style="width: 20%;  height:0px;">
                                            <td>
                                        </tr>
                                        <tr>
                                                <td style="width: 80%;  height:0px;">
                                                    <span style='font-size: 6px; '>*E-tiket merupakan tiket elektronik yang dikeluarkan oleh website HIMASI EVENT dan hanya berlaku pada waktu tertentu.</span>
                                                </td>
                                                <td style="width: 20%;  height:0px;">
                                                    <small style='font-size: 8px; text-align:right; font-weight: bold; color: black; '>Daftar: <?=$tp->waktu_daftar?></small>
                                                    <small style='font-size: 8px; text-align:right; font-weight: bold; color: black; '>Cetak: <?=date('d/m/Y H:i:s');?></small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style=" border-radius: 0px 0px 0px 0px; height:0px">
                                    <table width="50" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                        <tbody>
                                         <tr>
                                             <p style="padding-right:5px;font-size: 14px;text-align:center; color: #747474; font-weight: bold; " >
                                             Scan Me!</p>
                                            <td style="width: 20%; font-size: 14px; text-align:center; line-height: 18px; color: black;">
                                                    <img src="<?=base_url()?>assets/img/qrcode/<?=$tp->kd_tiket_peserta?>.png" alt="" style="width: 150px; height:150px; align:center;">
                                                    <small style="font-size: 12px; text-align:center; color: black; font-weight: bold;">#<?=$tp->kd_tiket_peserta?># <br> (<?=$tp->jenis_tiket?>)</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 100%; font-size: 14px; line-height: 100% !important; color: black; border-left:solid 5px; border-color: #430009; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    <p style="padding-left:5px;font-size: 12px;text-align:left; font-weight: bold; " >
                                                    <?=$tp->nama_event?> </p>
                                                </td>
                                                <td style="width: 20%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                   
                                                </td>
                                            </tr>
                                            <tr style=" border-radius: 0px 0px 0px 0px; height:0px;background-color:  white; ">
                                                 <td style="width: 20%; font-size: 14px; font-weight: bold; color: black;text-align:right; padding-bottom: 5px;">
                                                 <h1 style="font-size:18px; color:black;">  <?php if($tp->status_tiket == "Verifikasi"){ 
                                                             echo "Verified";
                                                        }else{
                                                             echo "Not Verified";
                                                        }?>  </h1> </td>
                                                        
                                                <td style="width: 20%; height:50px; float: left; line-height: 100% !important; color: black; border-right:solid #660106 10px; color: #003000; padding-bottom: 5px;">
                                                </td>
                                            </tr>
                                             <tr>
                                                <td style="width: 100%;  height:0px;padding-top:25px; padding-bottom:-5px;">
                                                    <span style='font-size: 8px; text-align:left;color: black;  font-weight: bold;'>*Gunting disini.</span>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- End address Section -->
                            <!-- Start header Section -->
                            <tr style="background-color:#921111;">
                                <td style=" border-radius: 0px 0px 15px 0px; height:0px">
                                </td>
                                <td style=" border-radius: 0px 0px 0px 15px; height:0px">
                                </td>
                            </tr>
                           

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
<body>

</html>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        // $("#btnPrint").live("click", function () {
            var divContents = $("#output").html();
            var printWindow = window.open('', '', 'height=450,width=870');
            printWindow.document.write('<html><head><title> Tiket Peserta Event <?= $tp->nama_event ?> </title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
            printWindow.save('Tiket Peserta Event <?= $tp->nama_event ?> .pdf');
        // });

    </script>