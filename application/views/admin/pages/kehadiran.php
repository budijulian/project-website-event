
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/events?all=true">Events</a></li>
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/events/peserta?all=true">Peserta</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Kehadiran</li>
                            <li class="breadcrumb-item active"  aria-current="page"><?php if($event){foreach($event as $e){echo $e->nama_event;}} elseif(empty($event)){echo "Semua Data";} ?> </li>
                        </ol>
                    </nav>
                     
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary float-left">Data Kehadiran Peserta</h6>
                        </div>
                        <div class="card-body">
                            <div class="row container-fluid">
                                <div class="mb-4 col-12 col-md-5 card bg-light ">
                                <label class="text-center" for="">Tambah Kehadiran Peserta</label>
                                    <div class="row ">
                                        <div class="col-6 col-md-6  mb-2 mt-2 ">
                                          <!-- <select name="check-kehadiran" id="check-kehadiran" class="form-control">
                                                <option value="">--Pilih Event--</option>
                                                <?php 
                                                //foreach($data_event as $e){?>
                                                    <option value="<? //$e->kd_event?>"><?//$e->nama_event?></option>
                                                <?php// }?>
                                            </select> -->
                                        <button  id="scan-kehadiran" data-target="#ModalScanKehadiran" href="javascript:void(0);" data-toggle="modal"  class="btn btn-primary  font-weight-bolder col-12 "> 
                                        <span class="fa fa-camera "></span> SCAN QRCODE</button></div>
                                    <div class="col-6 col-md-6  mb-2 mt-2 "> 
                                        <button class="btn btn-light  font-weight-bolder  col-12 " id="manual-kehadiran" data-target="#ModaltambahKehadiran" href="javascript:void(0);" data-toggle="modal" >
                                    <span class="fa fa-plus "></span> MANUAL</button></div>
                                    
                                    </div>
                                </div>
                                <div class="mb-4 col-12 col-md-5 card bg-light ml-4">
                                    <label class="text-center" for="">Export Data</label>
                                    <div class="col-6 col-md-6  mb-2 mt-2 "> 
                                        <a class="btn btn-info  font-weight-bolder  col-12 " data-target="#ModalExportKehadiran" href="javascript:void(0);" data-toggle="modal"> 
                                    <span class="fa fa-plus "></span> Export</a>
                                    </div>

                                </div>
                                <div class="mb-4 col-md-12">
                                    <ul class="nav nav-tabs" >
                                        <li class="nav-item">
                                            <a class="nav-link active font-weight-bold text-dark " data-toggle="tab" href="#hadir">Peserta Hadir</a>
                                        </li> 
                                        <!-- <li class="nav-item">
                                            <a class="nav-link font-weight-bold text-dark " data-toggle="tab" href="#tidakhadir"> Tidak Hadir</a>
                                        </li> -->
                                    
                                    </ul>
                                     <div class="tab-content " id="myTabContent">
                                        <div id="hadir" class=" tab-pane active  mt-2 ">
                                            <div class="table-responsive" >
                                                        <table id="data_hadir" style="font-size:14px;" class="table table-sm table-bordered"  style="width:100%"  cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>No</th>
                                                                    <th>Waktu Daftar</th>
                                                                    <th>Nama Event</th>
                                                                    <th>Email Peserta</th>
                                                                    <th>Nama Lengkap</th>
                                                                    <th>Instansi</th>
                                                                    <th>Keterangan</th>
                                                                </tr>
                                                            
                                                            </thead>
                                                            <tbody id="load-data-kehadiran2">
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                <th>#</th>
                                                                    <th>No</th>
                                                                    <th>Waktu Daftar</th>
                                                                    <th>Nama Event</th>
                                                                    <th>Email Peserta</th>
                                                                    <th>Nama Lengkap</th>
                                                                    <th>Instansi</th>
                                                                    <th>Keterangan</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>                                  

                                </div>
                                
                            </div>                    

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>
<!-- start modal tambah data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModaltambahKehadiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DATA KEHADIRAN PESERTA EVENT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <div class="modal-body">
					<div class="embed-responsive">
							<div id="DataPeserta" class="row container">
								<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
									<div class="row">
										<div class="col col-lg-4 col-sm-12 col-md-12 col-auto">
											<label class="text-dark ">Informasi Data</label>
										<table class="table table-sm text-black text-left">
                                            <tr>
											<td><small>Event </small></td><td> 
                                            <input type="hidden" name="kd_event" id="kd_event">
                                            <input type="hidden" name="kd_peserta" id="kd_peserta">
											<input id="nama_event" style="font-size:14px;" disabled=true type="text" value="" name="nama_event" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
                                            <tr>
											<td><small>Kode Tiket Peserta </small></td><td> 
											<input id="kd_tiket_peserta" disabled=true style="font-size:14px;"  type="text" value="" name="kd_tiket_peserta" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
                                            <tr>
											<td><small>Jenis Tiket </small></td><td> 
											<input id="jenis_tiket" disabled=true style="font-size:14px;"  type="text" value="" name="jenis_tiket" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
                                            </tr><tr>
                                             <tr>
											<td><small>Status Tiket </small></td><td> 
											<input id="status_tiket" disabled=true style="font-size:14px;"  type="text" value="" name="status_tiket" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
                                            </tr><tr>
											<td><small>Waktu Daftar </small></td><td> 
											<input id="waktu_daftar" disabled=true style="font-size:14px;"  type="text" value="" name="waktu_daftar" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
                                            </tr><tr>
											<td><small>Nama Peserta </small></td><td> 
											<input id="nama_lengkap" disabled=true style="font-size:14px;"  type="text" value="" name="nama_lengkap" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
                                            <tr>
											<td><small>Email Peserta </small></td><td> 
											<input id="email" disabled=true style="font-size:14px;"  type="text" value="" name="email" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
                                            </tr>
                                            <tr>
											<td><small>Instansi Peserta </small></td><td> 
											<input id="instansi" disabled=true style="font-size:14px;"  type="text" value="" name="instansi" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td> 
                                            </tr>
                                            <tr>
											<td><small>Jurusan Peserta </small></td><td> 
											<input id="jurusan" disabled=true style="font-size:14px;"  type="text" value="" name="jurusan" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td> 
                                            </tr>
                                           
                                            <tr><td></td>
                                            <td>
                                                <button class="btn btn-primary mt-3" type="button" id="tambah_kehadiran" href  >Tambah Kehadiran</button>
                                            </td></tr>
										</table>
										</div>
                                        <div class="col col-lg-8 col-sm-12 col-md-12 col-auto">
                                        <label class="text-dark ">Data Peserta</label>
                                        <div class="table-responsive ">
                                            <table style="font-size:14px;"  class="table table-sm text-black text-left" witdh="100%" height="40%" id="data-peserta-event">
                                                <thead>
                                                <th><small class="font-weight-bold">NO</small> </th>
                                                <th><small class="font-weight-bold">Waktu Daftar</small> </th>
                                                <th><small class="font-weight-bold">Kode Tiket</small> </th>
                                                <th><small class="font-weight-bold">Nama Peserta</small> </th>
                                                <th><small class="font-weight-bold">Email Peserta</small> </th>
                                                <th><small class="font-weight-bold">Aksi</small> </th>
                                                </thead>
                                                <tbody id="load-data-peserta">
                                                
                                                </tbody>
                                            </table>
                                        
                                        </div>
                                    </div>
									</div>
								</div>
							</div>
					</div>

				</div>
				<div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            	</div>
            </div>
        </div>
    </div>

            <!-- End of Main Content -->
 <div class=" modal fade modal-static" id="ModalScanKehadiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">KEHADIRAN PESERTA EVENT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p id="data-level" for="">Scan QRCode :</p>
                                <div id="qr-reader" style="width:400px"></div>
                                <div id="qr-reader-results"></div>
                            <small>KLik "Start Scanning" untuk melanjutkan perintah ini.</small><br>
                            <small>Arahkan QrCode ke Camera.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<div class=" modal fade modal-static" id="ModalDataScanKehadiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DATA PESERTA EVENT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-12">
                        
                        <small>KLik "Iya" untuk melanjutkan perintah ini ini.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


<!-- start modal export data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalExportKehadiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EXPORT KEHADIRAN PESERTA EVENT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <div class="modal-body">
					<div class="embed-responsive">
                            <div id="exportkehadiranfix" class=" tab-pane active  mt-2 ">
                                    <div class="table-responsive">
                                            <table style="font-size:12px;" class="table table-sm table-bordered" id="tbl-export-kehadiran" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Waktu Daftar</th>
                                                        <th>Nama Event</th>
                                                        <th>Email Peserta</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Instansi</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="export-data-kehadiran">
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                </div>
                     </div>
				</div>
				<div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            	</div>
            </div>
        </div>
    </div>

<!-- End of Main Content -->
<div class=" modal fade modal-static" witdh="100%" id="ModalDetailPeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Peserta</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <div class="modal-body">
					<div class="embed-responsive">
						<div class="tab-content" id="myTabContent">
							<div id="DataPeserta" class="row container tab-pane active border">
								<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
									<div class="row">
										<div class="col col-lg-8 col-sm-12 col-md-12 col-auto">
											<label class="text-dark ">Informasi Peserta</label>
										<table style="font-size:16px;" class="table table-sm text-black text-left">
											<tr>
											<td><small>Nama Peserta</small></td><td> 
                                            <input type="hidden" id="kd_peserta_d" value="">
											<input id="nama_lengkap_d" style="font-size:14px;" type="text" value="" name="nama_lengkap_d" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
											<tr>
											<td><small>Email Peserta</small></td><td>
											<input id="email_d" style="font-size:14px;" type="text" value="" name="email_d" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Nim Peserta</small></td><td><input id="nim_d" type="text" style="font-size:14px;" value="" name="nim_d" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Instansi Peserta</small></td><td><input id="instansi_d" style="font-size:14px;" type="text" value="" name="instansi_d" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Jurusan Peserta</small></td><td><input id="jurusan_d" style="font-size:14px;" type="text" value="" name="jurusan_d" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Jalur </small></td><td><input id="jalur_d" type="text" style="font-size:14px;" style="font-size:14px;" value="" name="jalur_d" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>No WA</small></td><td><input id="no_hp_d" type="text" style="font-size:14px;" value="" name="no_hp_d" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											
										</table>
										</div>		
										<div class="col col-lg-4 col-sm-12 col-md-12 col-auto">
											<label class="text-dark" >QRCode</label>
											<table class="table  table-borderless text-black text-left">
												<tr>
													<td><img id="qrcode" height="200px" witdh="200px" src="" alt="QRCode"></td>
												</tr>
											</table>
										</div>
										<div class="col-6 col-lg-6 col-sm-6 col-md-6 col-auto">
											<label class="text-dark " >Informasi Event</label>
												<table style="font-size:16px;" class="table table-sm text-black text-left">
												<tr>
												<td><small>Nama Event</small></td><td><small id="nama_event_d"></small></td>
												</tr>
												<tr>
												<td><small>Tanggal</small></td><td><small id="tanggal_d"> </small></td>
												</tr>
												<tr>
												<td><small>Jam</small></td><td><small id="jam_d"> </small></td>
												</tr>
												<tr>
												<td><small>Lokasi</small></td><td><small id="lokasi_d"></small></td>
												</tr>
												<tr>
												<td><small>Penyelenggara</small></td><td><small id="penyelenggara_d"></small></td>
												</tr>
												</table>
										</div>
										<div class="col-6 col-lg-6 col-sm-6 col-md-6 col-auto">
											<label class="text-dark " >Informasi Tiket</label>
												<table style="font-size:16px;"  class="table table-sm text-black">
												<tr>
												<td><small>Waktu Daftar</small></td><td><small id="waktu_daftar_d"></small></td>
												</tr>
												<tr>
												<td><small>Jenis Tiket</small></td><td><small id="jenis_tiket_d"></small></td>
												</tr>
												<tr>
												<td><small>Harga Tiket</small></td><td><small id="harga_d"> </small></td>
												</tr>
												<tr>
												<td><small>Diskon,-</small></td><td><small id="diskon_d"></small></td>
												</tr>
												<tr>
												<td><small>Total Bayar</small></td><td><small id="bayar_d" class="font-weight-bold"></small></td>
												</tr>
												<tr>
												<td><small>Status</small></td><td><small id="statusP_d" class="font-weight-bold text-success"></small></td>
												</tr>
                                                </table>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
				<div class="modal-footer">
                    <button id="btn-hapus"  class="btn btn-danger float-left" type="button" >Hapus Data </button>
            	</div>
            </div>
        </div>
    </div>
<script>
 var table,table2;
     
   $(document).ready(function(){
       
       load_export_kehadiran();
         $('#tbl-export-kehadiran').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            'csv', 'excel', 'pdf'
                        ]
                    } ); 
        function load_export_kehadiran(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/kehadiran/exportDataKehadiran',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    
                },
                success : function(kehadiran){
                    var html = "";
                    for(var i=0; i < kehadiran.length; i++){
                        // console.log(kehadiran);
                        html += '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+kehadiran[i].timestamp+'</td>'+
                                    '<td>'+kehadiran[i].nama_event+'</td>'+
                                    '<td>'+kehadiran[i].email+'</td>'+
                                    '<td>'+kehadiran[i].nama_lengkap+'</td>'+
                                    '<td>'+kehadiran[i].instansi+'</td>'+
                                    '<td>'+kehadiran[i].status+'</td>'+
                                '</tr>';
                    }
                    $('#export-data-kehadiran').html(html);
                    
                }
                
            })
        }            
        table = $('#data_hadir').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('admin/kehadiran/load_data_hadir')?>",
          "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
        
      });
      table2 = $('#data-peserta-event').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('admin/kehadiran/load_data_peserta_event')?>",
          "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
        
      });
      
      
   }); 
      function refreshData()
        {
        table.ajax.reload(null,false); //reload datatable ajax 
        table2.ajax.reload(null,false); //reload datatable ajax 
        }
$('#ModalDetailPeserta').on('click','#btn-hapus',function(){ 
                     Swal.fire({
                            title: 'Hapus Data?',
                            text: "Apakah kamu yakin menghapus data ini?",
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Iya'
                            }).then((result) => {
                            if (result.isConfirmed) {
                               var kd_peserta = $('#kd_peserta_d').val();
                                $.ajax({
                                        type  : "ajax",
                                            method : "POST",
                                            url      : "<?=base_url()?>admin/kehadiran/set_hapuspeserta",
                                            data     : { kd_peserta : kd_peserta},
                                            success  : function(respons){
                                            Swal.fire({
                                            icon: 'success',
                                            title: 'Hapus Data',
                                            text: 'Data berhasil terhapus!!',
                                            showConfirmButton: false,
                                            timer: 2000
                                            })
                                            $('#ModalDetailPeserta').modal('hide');
                                            refreshData();
                                            }
                                        })
                                }
                            })
                });
     /// <1>  view data peserta 
            $('#load-data-kehadiran2').on('click','#tampil-data2',function(){
                var kd_peserta = $(this).attr('data-kode');
                detail_data_peserta("<?=base_url()?>admin/peserta/get_data_peserta",kd_peserta);
              });
    function detail_data_peserta(link,kd_peserta){
                  $.ajax({
                    type  : "ajax",
                    method : "POST",
                    url   : link,
                    async : true,
                    data     : { kd_peserta : kd_peserta},
                    dataType : "json",
                    success  : function(hasil){
                     //   console.log(hasil);
                       for(var i=0; i < hasil.length; i++){
                        $('#kd_peserta_d').val(hasil[i].kd_peserta);
                        $('#nama_lengkap_d').val(hasil[i].nama_lengkap);
                        $('#email_d').val(hasil[i].email);
                        $('#nim_d').val(hasil[i].nim);
                        $('#instansi_d').val(hasil[i].instansi);
                        $('#jurusan_d').val(hasil[i].jurusan);
                        $('#jalur_d').val(hasil[i].jalur);
                        $('#no_hp_d').val(hasil[i].no_hp);

                        document.getElementById('nama_event_d').innerHTML =hasil[i].nama_event;
                        document.getElementById('tanggal_d').innerHTML =hasil[i].dari_tanggal + " - "+hasil[i].sampai_tanggal;
                        document.getElementById('jam_d').innerHTML =hasil[i].dari_jam +" - "+hasil[i].sampai_jam;
                        document.getElementById('lokasi_d').innerHTML =hasil[i].lokasi;
                        document.getElementById('penyelenggara_d').innerHTML =hasil[i].penyelenggara;

                        document.getElementById('waktu_daftar_d').innerHTML =hasil[i].waktu_daftar;
                        document.getElementById('jenis_tiket_d').innerHTML =hasil[i].jenis_tiket;
                        document.getElementById('harga_d').innerHTML =hasil[i].jumlah;
                        document.getElementById('diskon_d').innerHTML = hasil[i].diskon;
                        document.getElementById('bayar_d').innerHTML =hasil[i].bayar;
                        document.getElementById('statusP_d').innerHTML = hasil[i].statusP;
                        //manipulasi foto dengan attribut DOM
                        var qrcode = document.getElementById("qrcode");
                        qrcode.setAttribute('src','<?=base_url()?>assets/img/qrcode/'+hasil[i].kd_tiket_peserta+'.png');   
                       
                       }

                    }
                });
			  }	
	
 $('#load-data-peserta').on('click','#tampil-data',function(){
                   var kd_peserta = $(this).attr('data-kode');
                     $.ajax({
                        url	 : "<?php echo base_url('admin/kehadiran/get_kehadiran_peserta_event')?>",
                        type  : "ajax",
                        method : "POST",
                        async : false,
                        dataType : 'json',
                        data     : {
                            kd_peserta : kd_peserta
                        },
                        success  : function(hasil){
                       for(var i=0; i < hasil.length; i++){
                            $('#nama_lengkap').val(hasil[i].nama_lengkap);
                            $('#email').val(hasil[i].email);
                            $('#instansi').val(hasil[i].instansi);
                            $('#jurusan').val(hasil[i].jurusan);
                            $('#waktu_daftar').val(hasil[i].timestamp);
                            $('#nama_event').val(hasil[i].nama_event);
                            $('#status_tiket').val(hasil[i].status);
                            $('#jenis_tiket').val(hasil[i].jenis_tiket);
                            $('#kd_tiket_peserta').val(hasil[i].kd_tiket_peserta);
                            $('#kd_peserta').val(hasil[i].kd_peserta);
                            $('#kd_event').val(hasil[i].kd_event);
                        } 
                        } 
                      })
                      
				});
 $('#ModaltambahKehadiran').on('click','#tambah_kehadiran',function(){
                    var kd_peserta = $('#kd_peserta').val();
                    var kd_event = $('#kd_event').val();
                    var nama_lengkap = $('#nama_lengkap').val();
                    var email = $('#email').val();
                    var instansi =  $('#instansi').val();
                    $.ajax({
                        url	 : "<?php echo base_url('admin/kehadiran/kirimKehadiran')?>",
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            kd_event: kd_event,kd_peserta : kd_peserta, nama_lengkap : nama_lengkap, email : email, instansi : instansi
                        },
                        success  : function(hasil){ 
                            console.log(hasil.length);
                            if(hasil.length == 0){
                                    Swal.fire({
                                          icon: 'success',
                                          title: 'Terimakasih.',
                                          text: 'Data berhasil ditambahkan!!'
                                          })
                            }else if(hasil.length == 1){
                                    Swal.fire({
                                          icon: 'error',
                                          title: 'Opps.',
                                          text: 'Anda tidak bisa absen 2 kali.'
                                          })
                                }
                            $('#ModaltambahKehadiran').modal('hide');
                            refreshData();
                        } 

                      })
                      
				});
    function refreshData()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }
    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(qrCodeMessage) {
            if (qrCodeMessage !== lastResult) {
                // ++countResults;
                lastResult = qrCodeMessage;
                //    console.log(lastResult);
                   sendScanner(lastResult);
            }else{
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    });
    function sendScanner(code){
                     $.ajax({
                        url   : '<?=base_url()?>admin/kehadiran/checkKehadiran',
                        type  : "ajax",
                        method : "POST",
                        async : false,
                        dataType : 'json',
                        data     : { kd_tiket_peserta : code },
                        success  : function(hasil){ 
                            if(hasil.length == 1){
                            // data dikirim ke database 
                                for(var i=0; i < hasil.length; i++){
                                    var kd_peserta = hasil[i].kd_peserta;
                                    // DATA DITEMUKAN DAN DITAMPILKANKE LAYAR 
                                    detail_data_peserta("<?=base_url()?>admin/peserta/get_data_peserta",kd_peserta);
                                    // MENAMPILKAN MODAL DATA PESERTA 
                                    $('#ModalScanKehadiran').modal('hide');
                                    $('#ModalDetailPeserta').modal('show');

                                    var kd_event = hasil[i].kd_event;
                                    // console.log(kd_event);
                                    var email = hasil[i].email;
                                    // console.log(email);
                                    var nama_lengkap = hasil[i].nama_lengkap;
                                    // console.log(nama_lengkap);
                                    var instansi = hasil[i].instansi;
                                    // console.log(instansi);
                                        $.ajax({
                                        url   : '<?=base_url()?>admin/kehadiran/kirimKehadiran',
                                        type  : "ajax",
                                        method : "POST",
                                        async : false,
                                        dataType : 'json',
                                        data     : { kd_peserta : kd_peserta, kd_event : kd_event, email : email, nama_lengkap :nama_lengkap, instansi:instansi },
                                        success  : function(hasil){
                                                if(hasil.length == 1){
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Oops',
                                                        text: 'Anda sudah mengisi Absen!',
                                                        showConfirmButton: true
                                                        }) 
                                                }else if(hasil.length == 0){
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Berhasil',
                                                        text: 'Anda berhasil Absen!',
                                                        showConfirmButton: true
                                                        })
                                                        refreshData();
                                                }
                                            }
                                        })
                                }
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Data Tidak Ditemukan!',
                                    showConfirmButton: true
                                })
                            }
                        } 
                      });        
        }
    function OpenCamera() {

		var scanner = new Instascan.Scanner({
			video: document.getElementById('preview'),
			scanPeriod: 5,
			mirror: false
		});
		scanner.addListener('scan', function (content) {
			// add value database withcode php
			if (content != "") {
				alert("Data Tidak Ditemukan. ");
			} else {
				alert("Silakan Ulangi Scan!");
			}
		});
		Instascan.Camera.getCameras().then(function (cameras) {
			if (cameras.length > 0) {
				scanner.start(cameras[0]);
				$('[name="options"]').on('change', function () {
					if ($(this).val() == 1) {
						if (cameras[0] != "") {
							scanner.start(cameras[0]);
						} else {
							alert('No Front camera found!');
						}
					} else if ($(this).val() == 2) {
						if (cameras[1] != "") {
							scanner.start(cameras[1]);
						} else {
							alert('No Back camera found!');
						}
					}
				});
			} else {
				console.error('No cameras found.');
				alert('No cameras found.');
			}
		}).catch(function (e) {
			console.error(e);
			alert("Mulai Scan ?");
		});
	}

	function CloseCamera() {

		try {
			var scanner = new Instascan.Scanner({
				video: document.getElementById('preview'),
				scanPeriod: 5,
				mirror: false
			});
			scanner.stop();
			// this.scanner.stop(this.camera);
			// _this.hideCamera();

		} catch (error) {}
	}
 
</script>
<script src="<?=base_url()?>assets/qrcodeScanner/html5-qrcode-scanner.js"></script>
<script src="<?=base_url()?>assets/qrcodeScanner/html5-qrcode.js"></script>
<script src="<?=base_url()?>assets/qrcodeScanner/qrcode.js"></script>
<script src="<?=base_url()?>assets/qrcodeScanner/html5-qrcode.min.js"></script>
<script src="<?=base_url()?>assets/qrcodeScanner/qrcode.min.js"></script>