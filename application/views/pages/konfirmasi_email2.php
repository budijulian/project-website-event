<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Konfirmasi Pembayaran Tiket Event</title>
 <link rel="shortcut icon" href="<?=base_url()?>assets/img/logohimasi.png">
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

<body>

<?php foreach($event as $e)?>
<?php foreach($tiket as $t)?>

<table width="100%" cellpadding="0" cellspacing="0" margin-top="50px" border="0" class="backgroundTable main-temp">
        <tbody>
            <tr>
                <td>
                    <table width="600" align="center" cellpadding="15" cellspacing="0" border="0" class="devicewidth" style="background-color:  #FFFFFF;">
                        <tbody>
                            <!-- Start header Section -->
                            <tr style="background-color:#921111;">
                                <td style="padding-top: 30px;">
                                    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee; text-align: center;">
                                        <tbody>
                                        <tr>
                                         <td style="padding-bottom: 0px; font-size: 24px; line-height: 28px; color: white;">
                                             <img src="<?= base_url('assets/img/logohimasi.png') ?>" title="HIMASI" style="width:100px;height:100px;text-decoration:none;">
                                             
                                             </td>
                                        </tr>
                                           
                                            <tr>
                                                <td style="padding-bottom: 10px; font-size: 24px; line-height: 28px; color: white;">
                                                    <strong> Terimakasih Atas Pembayaran Anda</strong>

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
                                                    <img src="https://www.wb-web.de/_Resources/Persistent/feb7a0d8ee35621aa5ac515bd019ed1e9f59746b/QRCode1.jpg" alt="" style="width: 150px; height:150px; align:center;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Waktu Pemesanan
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : 2020-09-10 09:00
                                                </td>
                                            </tr>
                                             <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Nomor Tiket
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?= $this->session->userdata('kd_tiket_peserta');?>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Email
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    :<?=$email;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Nama Lengkap
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?=$nama;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Peguruan Tinggi/Instansi
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : <?=$instansi;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; font-size: 14px; font-weight: bold; color: black; padding-bottom: 5px;">
                                                    Jurusan/Pekerjaan
                                                </td>
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
                                                    : <?= $e->dari_tanggal." ".$e->dari_jam." - ".$e->sampai_tanggal." ".$e->sampai_jam?>
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
                                                    Harga
                                                </td>
                                                <td style="width: 60%; font-size: 14px; line-height: 18px; color: black;">
                                                    : Rp.<?=$harga;?>,-
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <hr>
                            <!-- End address Section -->
                            <!--Start Description Section -->
                                <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee; text-align: left;">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 15 10px; padding-top:10px; font-size: 14px; border-top: 1px solid #eeeeee;">
                                                <h4> Diskripsi : </h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia maiores voluptates corporis ducimus voluptatum. Quisquam facilis in laudantium, recusandae illo distinctio quo. In minima facilis debitis enim velit, odio quia!</p>
                                           
                                           
                                            </td>
                                            </tr>
                                            <!--Start terms and conditions Section -->
                                        <tr>
                                            <td style="padding: 15 10px; font-size: 14px; ">
                                                <h4> Syarat & Ketentuan : </h4>
                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat incidunt officia adipisci deleniti non laborum dolore ut quas, quos repellendus dolor assumenda maiores, harum dignissimos necessitatibus? Molestias ab voluptate quae.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                           <!-- End Description Section -->
                           
                             
                           <!-- End terms and conditions Section -->

                            <!-- Start payment method Section -->
                            <tr>
                                <td style="padding: 0 10px; font-size: 14px">
                                    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="width: 100%; text-align: center; font-style: italic; font-size: 13px; font-weight: 600; color: black; padding: 15px 0; border-top: 1px solid #eeeeee;">
                                                    <b style="font-size: 14px;">Note:</b>
                                                    Cek kembali mengenai data tersebut, bila terdapat kesalahan silahkan hubungi kami.
                                                </td>
                                            </tr>
                                            <tr style="background-color:#921111;">
                                                <td colspan="2" style="width: 100%; text-align: center; font-style: italic; font-size: 13px; font-weight: 600; color: white; padding: 15px 0; border-top: 1px solid #eeeeee;">
                                                    <b style="font-size: 14px;">Follow Us</b><br>
                                                    <small>Social Media HIMASI</small>
                                                    <br><br>
                                                    <a target="n_blank" href="mailto:himasiunas@gmail.com">
                                                        <img src="<?= base_url('assets/img/gmail.png') ?>" title="Email" style="width:30px;height:30px;text-decoration:none;">
                                                    </a>
                                                    <a target="n_blank" href="https://lin.ee/S1usGrm">
                                                        <img src="<?= base_url('assets/img/line.png') ?>" title="OA Line" style="width:30px;height:30px;text-decoration:none;">
                                                    </a>
                                                    <a target="n_blank" href="https://www.instagram.com/himasi.unas1949/">
                                                        <img src="<?= base_url('assets/img/instagram.png') ?>" title="Instagram" style="width:30px;height:30px;text-decoration:none;">
                                                    </a>
                                                    <a target="n_blank" href="https://www.youtube.com/channel/UCdJF12PYit1xneWAge1Mjlg">
                                                        <img src="<?= base_url('assets/img/youtube.png') ?>" title="Youtube Channel" style="width:30px;height:30px;text-decoration:none;">
                                                    </a>
                                                   

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