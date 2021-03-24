<!-- Begin Page Content -->
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="<?=base_url()?>admin/events?all=true">Events</a></li>
			<li class="breadcrumb-item active" aria-current="page"> Peserta</li>
			<li class="breadcrumb-item active"  aria-current="page"><?php if($event){foreach($event as $e){echo $e->nama_event;}} elseif(empty($event)){echo "Semua Data";} ?> </li>
		</ol>
	</nav>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Peserta</h6>
		</div>
		<div class="card-body ">
            <div class="row container-fluid">
                <div class="mb-4 col-12 col-md-5 card bg-light ">
                         <label class="text-center" for="">Tambah Peserta</label>
                         <div class="row ">
                                <div class="col-6 col-md-6  mb-2 mt-2 ">
                                   <button  id="tambah-peserta" data-target="#ModalTambahPeserta" href="javascript:void(0);" data-toggle="modal"  
                                     class="btn btn-primary font-weight-bolder col-12 "> <span class="fa fa-plus "></span> Tambah</button>
                                </div>
                                   <div class="col-6 col-md-6  mb-2 mt-2 "> 

                                </div> 
                       </div>
                </div>
                <div class="mb-4 col-12 col-md-5 card bg-light ml-4 ">
                    <label class="text-center" for="">Export Data</label>
                        <div class="col-6 col-md-6  mb-2 mt-2 "> 
                            <button data-target="#ModalExportPeserta" href="javascript:void(0);" data-toggle="modal" class="btn btn-info  font-weight-bolder  col-12 ">
                        <span class="fa fa-plus "></span> Export</button></div>
                </div>
            </div>
            
        <ul class="nav nav-tabs" >
            <li class="nav-item">
                <a class="nav-link active font-weight-bold text-dark " data-toggle="tab" href="#pesertafix">Peserta</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-dark " data-toggle="tab" href="#calonpeserta">Calon Peserta</a>
            </li>
           
        </ul>
        <div class="tab-content " id="myTabContent">
           <div id="pesertafix" class=" tab-pane active  mt-2 ">
                <div class="table-responsive">
						<table style="font-size:14px;" class="table table-sm table-bordered" id="data-peserta" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>#</th>
									<th>No</th>
									<th>Waktu Daftar</th>
									<th>Email Peserta</th>
									<th>Nama Lengkap</th>
									<th>Nama Instansi</th>		
									<th>Nama Event</th>	
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="load-data-peserta">
								
							</tbody>
						</table>
					</div>

            </div>
             <div id="calonpeserta" class=" tab-pane  mt-2 ">
			 <div class="table-responsive">
                <table style="font-size:14px;" class="table table-sm table-bordered" id="data-calon-peserta" width="100%" cellspacing="0">
								<thead>
									<tr>
                                        <th>#</th>
										<th>No</th>
										<th>Waktu Daftar</th>
										<th>Email Peserta</th>
										<th>Nama Lengkap</th>
										<th>Nama Instansi</th>	
										<th>Nama Event</th>	
										<th>Status</th>
									</tr>
								</thead>
								<tbody id="load-data-calon-peserta">
									
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
<div class=" modal fade modal-static" witdh="100%" id="ModalDataPeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<ul class="nav nav-tabs" >
							<li class="nav-item">
								<a class="nav-link active font-weight-bold text-dark " data-toggle="tab" href="#DataPeserta">Data Peserta</a>
							</li> 
							<li class="nav-item">
								<a class="nav-link font-weight-bold text-dark " data-toggle="tab" href="#DataUpload">Data Upload</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div id="DataPeserta" class="row container tab-pane active border">
								<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
									<div class="row">
										<div class="col col-lg-8 col-sm-12 col-md-12 col-auto">
											<label class="text-dark ">Informasi Peserta</label>
										<table style="font-size:16px;" class="table table-sm text-black text-left">
											<tr>
											<td><small>Nama Peserta</small></td><td> 
                                            <input type="hidden" id="kd_peserta" value="">
											<input id="nama_lengkap" style="font-size:14px;" type="text" value="" name="nama_lengkap" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
											<tr>
											<td><small>Email Peserta</small></td><td>
											<input id="email" style="font-size:14px;" type="text" value="" name="email" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Nim Peserta</small></td><td><input id="nim" type="text" style="font-size:14px;" value="" name="nim" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Instansi Peserta</small></td><td><input id="instansi" style="font-size:14px;" type="text" value="" name="instansi" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Jurusan Peserta</small></td><td><input id="jurusan" style="font-size:14px;" type="text" value="" name="jurusan" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Jalur </small></td><td><input id="jalur" type="text" style="font-size:14px;" style="font-size:14px;" value="" name="jalur" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>No WA</small></td><td><input id="no_hp" type="text" style="font-size:14px;" value="" name="no_hp" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td></td><td><a id="edit_peserta" href="#"> <span class="fa fa-pen-square"> Edit Data</span></a></td>
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
												<td><small>Nama Event</small></td><td><small id="nama_event"></small></td>
												</tr>
												<tr>
												<td><small>Tanggal</small></td><td><small id="tanggal"> </small></td>
												</tr>
												<tr>
												<td><small>Jam</small></td><td><small id="jam"> </small></td>
												</tr>
												<tr>
												<td><small>Lokasi</small></td><td><small id="lokasi"></small></td>
												</tr>
												<tr>
												<td><small>Penyelenggara</small></td><td><small id="penyelenggara"></small></td>
												</tr>
												</table>
										</div>
										<div class="col-6 col-lg-6 col-sm-6 col-md-6 col-auto">
											<label class="text-dark " >Informasi Tiket</label>
												<table style="font-size:16px;"  class="table table-sm text-black">
												<tr>
												<td><small>Waktu Daftar</small></td><td><small id="waktu_daftar"></small></td>
												</tr>
												<tr>
												<td><small>Jenis Tiket</small></td><td><small id="jenis_tiket"></small></td>
												</tr>
												<tr>
												<td><small>Harga Tiket</small></td><td><small id="harga"> </small></td>
												</tr>
												<tr>
												<td><small>Diskon,-</small></td><td><small id="diskon"></small></td>
												</tr>
												<tr>
												<td><small>Total Bayar</small></td><td><small id="bayar" class="font-weight-bold"></small></td>
												</tr>
												<tr>
												<td><small>Status</small></td><td><small id="statusP" class="font-weight-bold text-success"></small></td>
												</tr>

												</table>
										</div>
									</div>
								</div>
							</div>
							<div id="DataUpload" class="container tab-pane  border ">
								<div class='col-sm-6' id="TampilBuktiFoto">
                  					<a data-toggle='modal' href='javascript:void(0);'>
									  <img id="bukti_foto" src='' alt="Data Pendukung" class='img-thumbnail' witdh='200px' height='200px'> 
                                        <p id="title_bukti_foto" class="text-dark mt-2"></p>
                                    </a>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
                    <button id="btn-hapus"  class="btn btn-danger float-left" type="button" >Hapus Data </button>
                    <button id="btn-verifikasi"  class="btn btn-primary float-right" type="button" > </button>
            	</div>
            </div>
        </div>
    </div>

<!-- start modal tambah data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalTambahPeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA PESERTA EVENT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <div class="modal-body">
					<div class="embed-responsive">
							<div id="DataTambahPeserta" class="row container">
								<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
									<div class="row">
										<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
											<label class="text-dark ">Informasi Data</label>
										<table class="table table-sm text-black text-left">
                                             <form id="form-tambahdata"> 
                                                <tr>
                                                <td><small>Event </small></td><td> 
                                                <select required class=" col-12 border-0 form-control-xm bg-transparent" style="font-size:14px;"  name="kd_event_t" id="kd_event_t">
                                                        <option value="">--Pilih--</option>
                                                        <?php foreach ($event_pilihan AS $e){?>
                                                        <option value="<?=$e->kd_event?>"><?=$e->nama_event?></option>
                                                        <?php }?>
                                                </select>
                                                </td></tr>                                           
                                                <tr><td><small>Jenis Tiket </small></td><td> 
                                                    <select required class=" col-12 border-0 form-control-xm bg-transparent" style="font-size:14px;"  name="kd_tiket_t" id="kd_tiket_t">
                                                        <!-- load data tiket  -->
                                                        <option value="">--Pilih--</option>
                                                    </select>
                                                </td>
                                                </tr>
                                                <tr>      
                                                <td><small>Bukti Pembayaran</small></td><td> 
                                                <input id="file-foto"  style="font-size:14px;" type="file" value="" name="file-foto" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                <small class="ml-2" style="font-size:12px;" >*kosongkan jika tiket gratis</small>
                                                </td> 
                                                </tr>
                                                <tr>
                                                <td><small>Email Peserta </small></td><td> 
                                                <input id="email_t"  style="font-size:14px;" onkeyup="checkFunction();" type="text" required value="" name="email_t" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td>
                                                </tr>
                                                <tr>
                                                <td><small>Nama Lengkap Peserta </small></td><td> 
                                                <input id="nama_lengkap_t"  style="font-size:14px;" required  type="text" value="" name="nama_lengkap_t" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td></tr>
                                                <tr>
                                                <td><small>Nomor Induk Peserta </small></td><td> 
                                                <input id="nomor_induk_t"  style="font-size:14px;" required type="text" value="" name="nomor_induk_t" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td></tr>
                                                <tr>
                                                <td><small>Instansi Peserta </small></td><td> 
                                                <input id="instansi_t"  style="font-size:14px;" required type="text" value="" name="instansi_t" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td> 
                                                </tr>
                                                <tr>         
                                                <td><small>Jurusan Peserta </small></td><td> 
                                                <input id="jurusan_t"  style="font-size:14px;" required type="text" value="" name="jurusan_t" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td> 
                                                </tr>
                                                <tr>         
                                                <td><small>Jalur </small></td><td> 
                                                     <select  style="font-size:14px;" class=" col-12 border-0 form-control-xm bg-transparent" name="jalur_t" id="jalur_t">
                                                        <option value="-">--Jalur--</option>
                                                        <option value="Reguler">Reguler</option>
                                                        <option value="Karyawan">Karyawan</option>
                                                        </select>  
                                                 </td> 
                                                </tr>
                                                <tr>         
                                                <td><small>No WA Peserta </small></td><td> 
                                                <input id="nohp_t"  style="font-size:14px;" required type="text" value="" name="nohp_t" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td> 
                                                </tr>
                                                <tr><td></td>
                                                <td>
                                                    <button class="btn btn-primary mt-3" type="submit" id="tambah_peserta" href  >Tambah Peserta</button>
                                                </td></tr>
                                            </form>
										</table>
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


<!-- start modal export data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalExportPeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EXPORT DATA PESERTA EVENT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <div class="modal-body">
					<div class="embed-responsive">
							<ul class="nav nav-tabs" >
                                <li class="nav-item">
                                    <a class="nav-link active font-weight-bold text-dark " data-toggle="tab" href="#exportpesertafix">Peserta</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold text-dark " data-toggle="tab" href="#exportcalonpeserta">Calon Peserta</a>
                                </li>
                            
                            </ul>
                            <div class="tab-content " id="myTabContent">
                            <div id="exportpesertafix" class=" tab-pane active  mt-2 ">
                                    <div class="table-responsive">
                                            <table style="font-size:12px;" class="table table-sm table-bordered" id="tbl-export-peserta" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Waktu Daftar</th>
                                                        <th>Status </th>
                                                        <th>Email </th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Nomor Induk</th>	
                                                        <th>Jurusan/Pekerjaan</th>
                                                        <th>Universitas/Instansi</th>
                                                        <th>Jalur</th>
                                                        <th>NO HP</th>	
                                                        <th>Nama Event</th>	
                                                        <th>Jenis Tiket</th>
                                                        <th>Jumlah Bayar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="export-data-peserta">
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                </div>
                                <div id="exportcalonpeserta" class=" tab-pane  mt-2 ">
                                <div class="table-responsive">
                                    <table style="font-size:12px;" class="table table-sm table-bordered" id="tbl-export-calon-peserta" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Waktu Daftar</th>
                                                            <th>Status </th>
                                                            <th>Email </th>
                                                            <th>Nama Lengkap</th>
                                                            <th>Nomor Induk</th>	
                                                            <th>Jurusan/Pekerjaan</th>
                                                            <th>Universitas/Instansi</th>
                                                            <th>Jalur</th>
                                                            <th>NO HP</th>	
                                                            <th>Nama Event</th>	
                                                            <th>Jenis Tiket</th>
                                                            <th>Jumlah Bayar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="export-data-calon-peserta">
                                                        
                                                    </tbody>
                                        </table>
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



<script>
    
var table,table2;
  $(document).ready(function(){   
            export_data_peserta();
            export_data_calon_peserta();
             $('#tbl-export-peserta').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            'csv', 'excel', 'pdf'
                        ]
                    } ); 
             $('#tbl-export-calon-peserta').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            'csv', 'excel', 'pdf'
                        ]
                    } );  
			// show_data_peserta();
            table = $('#data-peserta').DataTable({ 
                
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                
                // Load data for the table's content from an Ajax source
                "ajax": {
                "url": "<?php echo site_url('admin/peserta/load_data_peserta')?>",
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
            table2 = $('#data-calon-peserta').DataTable({ 
                
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                
                // Load data for the table's content from an Ajax source
                "ajax": {
                "url": "<?php echo site_url('admin/peserta/load_data_calon_peserta')?>",
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
        function export_data_calon_peserta(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/peserta/exportDataCalonPeserta',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    
                },
                success : function(calon_peserta){
                    var html = "";
                    for(var i=0; i < calon_peserta.length; i++){
                        var str = calon_peserta[i].nama_event;
                        var new_str = str.substring(0, 10);
                        new_str = new_str + "...";
                        console.log(calon_peserta);
                        html += '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+calon_peserta[i].waktu_daftar+'</td>'+
                                    '<td>'+calon_peserta[i].status+'</td>'+
                                    '<td>'+calon_peserta[i].email+'</td>'+
                                    '<td>'+calon_peserta[i].nama_lengkap+'</td>'+
                                    '<td>'+calon_peserta[i].nim+'</td>'+
                                    '<td>'+calon_peserta[i].instansi+'</td>'+
                                    '<td>'+calon_peserta[i].jurusan+'</td>'+
                                    '<td>'+calon_peserta[i].jalur+'</td>'+
                                    '<td>'+calon_peserta[i].no_hp+'</td>'+
                                    '<td>'+new_str+'</td>'+
                                    '<td>'+calon_peserta[i].jenis_tiket+'</td>'+
                                    '<td>'+calon_peserta[i].bayar+'</td>'+
                                '</tr>';
                    }
                    $('#export-data-calon-peserta').html(html);
                    
                }
                
            })
        }
        function export_data_peserta(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/peserta/exportDataPeserta',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    
                },
                success : function(peserta){
                    
                    var html = "";
                    for(var i=0; i < peserta.length; i++){
                        var str = peserta[i].nama_event;
                        var new_str = str.substring(0, 10);
                        new_str = new_str + "...";
                        console.log(peserta);
                        html += '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+peserta[i].waktu_daftar+'</td>'+
                                    '<td>'+peserta[i].status+'</td>'+
                                    '<td>'+peserta[i].email+'</td>'+
                                    '<td>'+peserta[i].nama_lengkap+'</td>'+
                                    '<td>'+peserta[i].nim+'</td>'+
                                    '<td>'+peserta[i].instansi+'</td>'+
                                    '<td>'+peserta[i].jurusan+'</td>'+
                                    '<td>'+peserta[i].jalur+'</td>'+
                                    '<td>'+peserta[i].no_hp+'</td>'+
                                    '<td>'+new_str+'</td>'+
                                    '<td>'+peserta[i].jenis_tiket+'</td>'+
                                    '<td>'+peserta[i].bayar+'</td>'+
                                '</tr>';
                    }
                    $('#export-data-peserta').html(html);
                    
                }
                
            })
        }
        
});
        function refreshData()
        {
        table.ajax.reload(null,false); //reload datatable ajax 
        table2.ajax.reload(null,false); //reload datatable ajax 
        }			
        // tambah data get data event 
        // tambah data get data event 
        $('#DataTambahPeserta').on('click','#kd_event_t',function(){ 
            var kd_event = $('#kd_event_t').val();
            $.ajax({
                        url	 : "<?=base_url()?>admin/events/get_kategori_tiket_event",
                        type  : "ajax",
                        method : "POST",
                        dataType : "json",
                        data     : {
                            kd_event : kd_event
                        },
                        success  : function(hasil){ 
                            console.log(hasil);
                           var html;
                           for(var i=0; i < hasil.length; i++){
                               html +='<option value="'+hasil[i].kd_tiket+'">['+hasil[i].jenis_tiket+'] Rp.'+hasil[i].jumlah+' ('+hasil[i].keterangan+')</option>';
                              }
                    $('#kd_tiket_t').html(html);
                    } 
                })
            
        });
        function checkFunction(){
            var email_t = $('#email_t').val();
            var kd_event_t = $('#kd_event_t').val();
                $.ajax({
                        type  : "ajax",
                        method : "POST",
                        url   : "<?=base_url()?>admin/peserta/check_data_peserta_event",
                        async : true,
                        data     : { email_t : email_t, kd_event_t:kd_event_t},
                        dataType : "json",
                        success  : function(hasil){
                        if(hasil.length == 0){
                        }else{
                            Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Data email tidak boleh sama.'
                                        })
                        }
                    }
            })     
        }
         $('#form-tambahdata').submit(function(e){
            e.preventDefault();
                    $.ajax({
                            url   : "<?=base_url()?>admin/peserta/set_data_peserta_event",
                            type  : "POST",
                            data  : new FormData(this),
                            processData:false,
                            contentType:false,
                            cache:false,
                            async:false,
                            success  : function(respons){
                               Swal.fire({
                              icon: 'success',
                               title: 'Berhasil',
                               text: 'Data berhasil ditambahkan.',
                                showConfirmButton: false,
                                timer: 2000
                              })
                              refreshData();
                              $('#ModalTambahPeserta').modal('hide');
                        }
                  })
            });

			 /// <1>  view data peserta 
            $('#load-data-peserta').on('click','#tampil-data',function(){
                var kd_peserta = $(this).attr('data-kode');
                var status = $(this).attr('data-status');
                detail_data_peserta("<?=base_url()?>admin/peserta/get_data_peserta",kd_peserta,status);
              });
              //   tampil data calon peserta 
              $('#load-data-calon-peserta').on('click','#tampil-data2',function(){
                var kd_peserta = $(this).attr('data-kode');
                var status = $(this).attr('data-status2');
                detail_data_peserta("<?=base_url()?>admin/peserta/get_data_calon_peserta",kd_peserta,status);
              });

			 $('#ModalDataPeserta').on('click','#edit_peserta',function(){
                  var kd_peserta = $('#kd_peserta').val();
                  var nama = $('#nama_lengkap').val();
                  var email = $('#email').val();
                  var nim =  $('#nim').val();
                  var instansi =   $('#instansi').val();
                  var jurusan =  $('#jurusan').val();
                   var jalur =  $('#jalur').val();
                   var no_hp =  $('#no_hp').val();
                    //status dari peserta
                    var url;
                    var status = document.getElementById("status").innerHTML;
                   if (status == "Verifikasi"){
                       url ='<?=base_url()?>admin/peserta/edit_peserta';
                      
                   }else{
                        url ='<?=base_url()?>admin/peserta/edit_calon_peserta';
                   }
                     $.ajax({
                        url	 : url,
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            kd_peserta : kd_peserta, nama : nama,
                            email : email ,nim : nim, instansi: instansi, 
                            jurusan :jurusan, jalur : jalur, no_hp : no_hp
                        },
                        success  : function(respons){ 
                            Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil berubah!!',
                            showConfirmButton: false,
                            timer: 2000
                            })
                            $('#ModalDataPeserta').modal('hide');
                            refreshData();
                        } 

                      })
                      
				});
                $('#ModalDataPeserta').on('click','#btn-hapus',function(){ 
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
                               var kd_peserta = $('#kd_peserta').val();
                               var table_name;
                               var status = document.getElementById("btn-verifikasi").innerText;
                                    if(status == "Terverifikasi"){
                                        table_name = "tbl_calon_peserta";
                                    }else if(status == "Belum Terverifikasi"){
                                        table_name = "tbl_peserta";
                                    }
                                $.ajax({
                                        type  : "ajax",
                                            method : "POST",
                                            url      : "<?=base_url()?>admin/peserta/set_hapuspeserta",
                                            data     : { kd_peserta : kd_peserta, table_name : table_name},
                                            success  : function(respons){
                                            Swal.fire({
                                            icon: 'success',
                                            title: 'Hapus Data',
                                            text: 'Data berhasil terhapus!!',
                                            showConfirmButton: false,
                                            timer: 2000
                                            })
                                            $('#ModalDataPeserta').modal('hide');
                                            refreshData();
                                            }
                                        })
                                }
                            })
                });
				$('#ModalDataPeserta').on('click','#btn-verifikasi',function(){ 
                    var url;
                    var kd_peserta = $('#kd_peserta').val();
                    var status = document.getElementById("btn-verifikasi").innerText;
                    if(status == "Terverifikasi"){
                        url = "<?=base_url()?>admin/peserta/set_belumverifikasipeserta";

                    }else if(status == "Belum Terverifikasi"){
                        url = "<?=base_url()?>admin/peserta/set_verifikasipeserta";
                    }
                     $.ajax({
                       type  : "ajax",
                        method : "POST",
                        url      : url,
                        data     : { kd_peserta : kd_peserta},
                        success  : function(respons){
                         Swal.fire({
                          icon: 'success',
                          title: status,
                          text: 'Data berhasil berubah!!'
                          })
                           $('#ModalDataPeserta').modal('hide');
                           refreshData();
                           }
                    })
                    
                });

              function detail_data_peserta(link,kd_peserta,status){
                  var get_status = status;
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
                           console.log(hasil);
                        $('#kd_peserta').val(hasil[i].kd_peserta);
                        $('#nama_lengkap').val(hasil[i].nama_lengkap);
                        $('#email').val(hasil[i].email);
                        $('#nim').val(hasil[i].nim);
                        $('#instansi').val(hasil[i].instansi);
                        $('#jurusan').val(hasil[i].jurusan);
                        $('#jalur').val(hasil[i].jalur);
                        $('#no_hp').val(hasil[i].no_hp);

                        document.getElementById('nama_event').innerHTML =hasil[i].nama_event;
                        document.getElementById('tanggal').innerHTML =hasil[i].dari_tanggal + " - "+hasil[i].sampai_tanggal;
                        document.getElementById('jam').innerHTML =hasil[i].dari_jam +" - "+hasil[i].sampai_jam;
                        document.getElementById('lokasi').innerHTML =hasil[i].lokasi;
                        document.getElementById('penyelenggara').innerHTML =hasil[i].penyelenggara;

                        document.getElementById('waktu_daftar').innerHTML =hasil[i].waktu_daftar;
                        document.getElementById('jenis_tiket').innerHTML =hasil[i].jenis_tiket;
                        document.getElementById('harga').innerHTML =hasil[i].jumlah;
                        document.getElementById('diskon').innerHTML = hasil[i].diskon;
                        document.getElementById('bayar').innerHTML =hasil[i].bayar;
                        document.getElementById('statusP').innerHTML = hasil[i].statusP;
                        //manipulasi foto dengan attribut DOM
                        var qrcode = document.getElementById("qrcode");
                        var bukti_bayar = document.getElementById("bukti_foto");
                        var title_bukti_foto = document.getElementById("title_bukti_foto");
                        qrcode.setAttribute('src','<?=base_url()?>assets/img/qrcode/'+hasil[i].kd_tiket_peserta+'.png');   
                        if(hasil[i].bukti_bayar == ""){
                            bukti_bayar.setAttribute('style','display:none;');
                            title_bukti_foto.innerText ='Tidak Ada Bukti Pembayaran';
                        }else{
                             bukti_bayar.setAttribute('style','display:block;');
                            bukti_bayar.setAttribute('src','<?=base_url()?>assets/img/pembayaran/'+hasil[i].bukti_bayar);
                            title_bukti_foto.innerText ="";
                        }
                        //custom tombol verifikasi
                        var btn = document.getElementById("btn-verifikasi");
                        if(get_status == "verifikasi"){
                            btn.setAttribute('data-status','Terverifikasi');
                            btn.innerText = "Belum Terverifikasi";
                        }
                        if(get_status == "belum verifikasi"){
                            btn.setAttribute('data-status','Belum Terverifikasi');
                            btn.innerText = "Terverifikasi";
                        }
                       }

                    }
                });
			  }
			
        function loadingData(){
             swal.fire({
                        title: 'Loading Data',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        timer: 2000,
                        onOpen: () => {
                        swal.showLoading();
                        }
                    });
         }
	</script>