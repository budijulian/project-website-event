

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/sertifikat?all=true">Sertifikat</a></li>
                            
                            <li class="breadcrumb-item active" aria-current="page"> Generate</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Generate Sertifikat</h6>
                        </div>
                        <div class="card-body">
                                                           
                                <div class="mb-4 col-12 col-sm-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered" id="generate-sertifikat" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Sertifikat</th>
                                                <th>Kode Event</th>
                                                <th>Kode Peserta</th>
                                                <th>Nomor</th>
                                                <th>Email Peserta</th>
                                                <th>Status</th>
                                                <th>Link</th>
                                            </tr>
                                        </thead>
                                        <tbody id="">
                                            <?php $no = 0; 
                                            foreach($generate as $g){ ?>
                                             <tr>
                                                <td><?= $no =$no +1?></td>
                                                <td><?= $kd_sertifikat = "STK".date('ymd').rand(0, 999).rand(0, 99);?> </td>
                                                <td><?= $g->kd_event?></td>
                                                <td><?= $g->kd_peserta?></td>
                                                <td><?= $nomor = (000+$no),"",$_GET['no'];?></td>
                                                <td><?= $g->email?></td>
                                                <td>Aktif</td>
                                                <td></td>
                                            </tr>
                                          <?php   }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->
<script>

 
            $('#generate-sertifikat').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv', 'excel', 'pdf'
                ]
            } );

</script>