

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Sertifikat</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Sertifikat Event</h6>
                        </div>
                        <div class="card-body">
                            <div class="row container-fluid">
                                <div class="mb-4 col-12 col-sm-6  col-md-4 card bg-light ">
                                    <label class="text-center" for=""><span class=" badge badge-success">1</span> Tambah Sertifikat</label>
                                        <div class="row ">
                                            <div class="col-6 col-md-6  mb-2 mt-2 ">
                                        <button id="tambah-sertifikat" data-target="#ModalTambahSertifikat" href="javascript:void(0);" data-toggle="modal"  class="btn btn-light font-weight-bolder  col-12 ">
                                            <span class="fa fa-plus "></span> MANUAL</button>
                                            </div>
                                        <div class="col-6 col-md-6  mb-2 mt-2 "> 
                                        </div>
                                        
                                        </div>
                                </div>
                                <div class="mb-4 col-12 col-sm-6 col-md-5 card bg-light ml-2">
                                    <label class="text-center" for=""><span class=" badge badge-success">2</span>  Upload Sertifikat</label>
                                    <div class="row ">
                                            <div class="col-6 col-md-6  mb-2 mt-2 ">
                                             <button id="generate"  data-target="#ModalNomorSertifikat" href="javascript:void(0);" data-toggle="modal"  class="btn btn-primary  font-weight-bolder col-12 "> <span class="fa fa-tools "></span> Generate <span class=" badge bg-transparent">1</span></button></div>
                                        <div class="col-6 col-md-6  mb-2 mt-2 "> 
                                            
                                            <button id="upload_file" data-target="#ModalImportSertifikat" href="javascript:void(0);" data-toggle="modal"  class="btn btn-primary  font-weight-bolder col-12 "> <span class="fa fa-upload "></span> Upload Excel <span class=" badge bg-transparent">2</span></button>
                                        </div>
                                        
                                        </div>
                                </div>
                                <div class="mb-4 col-12 col-sm-12 col-md-2 card bg-light ml-2">
                                    <label class="text-center" for=""><span class=" text-white badge badge-success"></span>  Petunjuk</label>
                                    <div class="row ">
                                            <div class="col-12 col-md-12  mb-2 mt-2 ">
                                             <a id="petunjuk"  data-target="#ModalPetunjuk" href="javascript:void(0);" data-toggle="modal" title="Petunjuk" class="btn btn-primary  font-weight-bolder col-12 "> <span class=" fa fa-question "></span> Cara Upload</a></div>
                                            </div>
                                        
                                     </div>
                                </div>
                                
                                <div class="mb-4 col-12 col-sm-12 col-md-12">
                                <div class="table-responsive">
                                    <table style="font-size:14px;" class="table table-sm table-bordered" id="data-sertifikat" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Sertifikat</th>
                                                <th>Nama Event</th>
                                                <th>Nama Peserta</th>
                                                <th>Email Peserta</th>
                                                <th>Status</th>
                                                <th>Link</th>
                                            </tr>
                                        </thead>
                                        <tbody id="load-data-sertifikat">
                                            
                                        
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
            
<!-- start modal tambah data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalPetunjuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tata Cara Upload Sertifikat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <div class="modal-body">
					<div class="embed-responsive">
						<div class="row container ">
							<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
                                <ul>
                                    <li>Klik tombol Generate Sertifikat, kemudian isi nomor sertifkat (optional) dan pilih nama event yang akan digenerate sertifikat.</li>
                                    <li>Export Data Generate Sertifikat ke format CSV atau xlsx.</li>
                                    <li>Gunakan Aplikasi Pihak ketiga. </li>
                                    <li>Disarankan menggunakan Google Spreadsheets with Add-ons "AutoCrat"</li>
                                    <small>tutorial youtube : <a href="https://www.youtube.com/watch?v=RD1aYj7_AC8">https://www.youtube.com/watch?v=RD1aYj7_AC8</a> </small>
                                    <li>Ikuti tutorial dan langkah-langkah generate sertifikat dengan Google Spreadsheets.</li>
                                    <li>Jika telah berhasil, simpan file excel yang telah di generate dalam format CSV atau xlsx.</li>
                                    <small>seperti contoh : </small>
                                    <li>
                                        <img src="<?=base_url()?>assets/img/example-import.png"  witdh="100%" height="100px" alt="">
                                    </li>
                                    <li>Import File Excel ke Database</li>
                                    <li>Selesai.</li>
                                </ul>
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
<!-- start modal tambah data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalTambahSertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sertifikat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <div class="modal-body">
					<div class="embed-responsive">
							<div id="DataPeserta" class="row container ">
								<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
									<div class="row">
										<div class="col col-lg-4 col-sm-12 col-md-12 col-auto">
											<label class="text-dark ">Informasi Data</label>
										<table class="table table-sm text-black text-left">
                                            <tr>
											<td><small>Event  </small></td><td> 
                                            <input type="hidden" value="" id="kd_event">
											<input id="nama_event" disabled=true type="text" value="" name="nama_event" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
                                            <tr>
											<td><small>Nama Peserta </small></td><td> 
                                            <input type="hidden" value="" id="kd_peserta">
											<input id="nama" disabled=true type="text" value="" name="nama" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
                                            <tr>
											<td><small>Email Peserta </small></td><td> 
											<input id="email" disabled=true type="text" value="" name="email" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
											<td><small>Nomor Sertifikat </small></td><td> 
											<input id="nomor"  type="text" value="" name="nomor" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
											<tr>
											<td><small>Link Sertifikat</small></td><td>
                                                <textarea type="text" class=" col-12 border-0 form-control-xm bg-transparent"  rows="7" name="link" id="link">
                                                </textarea>
											</td>
											</tr>
											<tr><td><small>Status</small></td>
                                            <td>
                                                 <select class="col-12 border-0 form-control-xm bg-transparent" name="status2" id="status2">
                                                    <option value="">--Pilih--</option>
                                                    <option selected value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
											</td>
											</tr>
                                            <tr><td></td>
                                            <td>
                                                <button class="btn btn-primary mt-3" type="button" id="tambah_sertifikat" href  >Tambah</button>
                                            </td></tr>
										</table>
										</div>
                                        <div class="col col-lg-8 col-sm-12 col-md-12 col-auto">
                                        <label class="text-dark ">Data Peserta</label>
                                        <div class="table-responsive ">
                                            <table  class="table table-sm text-black text-left" witdh="100%" height="40%" id="data-peserta">
                                                <thead>
                                                <th><small class="font-weight-bold">NO</small> </th>
                                                <th><small class="font-weight-bold">Nama Peserta</small> </th>
                                                <th><small class="font-weight-bold">Sertifikat</small> </th>
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
<!-- modal generate sertifikat event -->
<div class=" modal fade modal-static" witdh="100%" id="ModalGenerateSertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generate Data Sertifikat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <div class="modal-body">
					<div class="embed-responsive">
							<div id="DataPeserta" class="row container ">
								<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
									<div class="row">
                                        <div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
                                        <label class="text-dark ">Data Generate Sertifikat</label>
                                        <div class="table-responsive ">
                                            <table  class="table table-sm text-black text-left" witdh="100%" height="40%" id="data-generate">
                                                <thead>
                                                    <th><small class="font-weight-bold">NO</small> </th>
                                                    <th><small class="font-weight-bold">Kode Sertifikat</small> </th>
                                                    <th><small class="font-weight-bold">Kode Peserta</small> </th>
                                                    <th><small class="font-weight-bold">Kode Event</small> </th>
                                                    <th><small class="font-weight-bold">Nomor</small> </th>
                                                    <th><small class="font-weight-bold">Email</small> </th>
                                                    <th><small class="font-weight-bold">Status</small> </th>
                                                    <th><small class="font-weight-bold">Link Sertifikat</small> </th>
                                                </thead>
                                                <tbody id="load-data-generate">
                                                
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
<!-- modal generate sertifikat event -->
<div class=" modal fade modal-static" witdh="100%" id="ModalImportSertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <form method="post" id="import_form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Excel Sertifikat</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive">
                                <div id="DataImportSertifikat" class="row container ">
                                    <div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
                                        <div class="row">
                                            <div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
                                                
                                                    <table class="table table-sm text-black text-left">
                                                        <tr>
                                                            <td><small>Import File </small></td><td> 
                                                            <input id="import_file"  style="font-size:14px;"  type="file" value="" name="import_file" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                            <small>format : excel | csv </small>
                                                            </td>
                                                            <small class='text-left'><span class="text-danger">* Pastikan data sertifikat peserta sudah benar dan lengkap.</span></small>
                                                        </tr>
                                                    </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn_import_data" class="btn btn-primary" >Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- modal input data generate sertifikat  -->
<div class=" modal fade modal-static" id="ModalNomorSertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Generate </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                </div>
                <div class="modal-body">
                 <label id="data-level" for="">Nomor Sertifikat :</label><br>
                <input class=" col-12 border-1 form-control-xm" type="text" placeholder="../WEB/SI/FTKI/VII/2020" id="nomorsertifikat" value=""><br> 
                <label id="data-level" for="">Event :</label><br>
                    <select class="col-12 border-1 form-control-xm " name="eventsertifikat" id="eventsertifikat">
                            <option value="">--Pilih--</option>
                            <?php foreach ($event AS $e){?>
                            <option value="<?=$e->kd_event?>"><?=$e->nama_event?></option>
                            <?php }?>
                    </select><br>
                Klik "Iya" untuk melanjutkan perintah ini ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary text-white" id="iya-generate">Iya</a>
                </div>
            </div>
        </div>
    </div>
<script>
     $(document).ready(function(){  
show_peserta();
show_sertifikat();//call function show all panitia 

    $('#import_form').on('submit', function(event){
        event.preventDefault();
            $.ajax({
                url:"<?=base_url()?>admin/sertifikat/import_data_sertifikat",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                   
                }
            })
            Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data Berhasil Diimport.',
                            showConfirmButton: false,
                            timer: 2000
                                })
             $('#import_file').val('');
             $('#ModalImportSertifikat').modal('hide');
             <?php
                     if((isset($_GET['id'])) || (isset($_GET['all'])) ){
                        if($_GET['all'] == 'true'){
                            echo 'window.location.href ="'.base_url().'admin/sertifikat?all=true";';
                        }else{
                            echo 'window.location.href ="'.base_url().'admin/sertifikat?id='.$_GET['id'].'&all=false";';
                        }
                     }?>

        });
    
 $('#generate').click(function(){
     $('#ModalNomorSertifikat').modal('show');
 });
 $('#ModalNomorSertifikat').on('click','#iya-generate',function(){
     var kd_sertifikat =  $('#nomorsertifikat').val();
     var kd_event =  $('#eventsertifikat').val();
     window.location.href ="<?=base_url()?>admin/sertifikat?generate=true&id="+kd_event+"&no="+kd_sertifikat+"";
     $('#ModalNomorSertifikat').modal('hide');
     
 });    

  $('#load-data-sertifikat').on('click','#ganti-status',function(){    
                //    ambil data 
                    var kd_sertifikat = $(this).attr('data-kode');
                    var status = $(this).attr('data-status');
                    var status2;
                    if(status == "Aktif"){
                        status2 ="Tidak Aktif";
                    }else{
                        status2 ="Aktif";
                    }
                    $.ajax({
                        url	 : '<?=base_url()?>admin/sertifikat/gantistatus',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            kd_sertifikat : kd_sertifikat, status : status2 
                        },
                        success  : function(respons){ 
                           Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Status Berubah.',
                            showConfirmButton: false,
                            timer: 2000
                                }) 
                      }
                     })
                     <?php
                     if((isset($_GET['id'])) || (isset($_GET['all'])) ){
                        if($_GET['all'] == 'true'){
                            echo 'window.location.href ="'.base_url().'admin/sertifikat?all=true";';
                        }else{
                            echo 'window.location.href ="'.base_url().'admin/sertifikat?id='.$_GET['id'].'&all=false";';
                        }
                     }?>
                      
    });        
 $('#load-data-peserta').on('click','#ambil-data',function(){
     
        var kd_event = $(this).attr('data-event'); 
        var kd_peserta = $(this).attr('data-kode');
        var data_namap = $(this).attr('data-namap');
        var data_nama = $(this).attr('data-nama');
        var email = $(this).attr('data-email');
        var nomor = $(this).attr('data-nomor');
        var link = $(this).attr('data-link');
        $('#kd_peserta').val(kd_peserta);
        $('#kd_event').val(kd_event);
        $('#nama').val(data_namap);
        $('#email').val(email);
        $('#nama_event').val(data_nama);
        $('#nomor').val(nomor);
        $('#link').val(link);
        
 });
 $('#ModalTambahSertifikat').on('click','#tambah_sertifikat',function(){
                  var kd_event =  $('#kd_event').val(); 
                var email =  $('#email').val();
                  var kd_peserta =   $('#kd_peserta').val(); 
                  var nomor =   $('#nomor').val();
                  var link =   $('#link').val();
                  var status =   $('#status2').val();
                  console.log(status);
                if((kd_event == "") || (kd_peserta == "") || (nomor == "")||(email == "")|| (link == "")){
                    Swal.fire({
                          icon: 'error',
                          title: 'Warning',
                          text: 'Form Data Masih Kosong!!',
                          showConfirmButton: false,
                          timer: 2000
                          })
                }else{
                     $.ajax({
                        url   : '<?=base_url()?>admin/sertifikat/tambah_sertifikat',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            kd_event : kd_event, link : link, email : email, 
                            kd_peserta : kd_peserta, nomor : nomor, status : status
                        },
                        success  : function(respons){
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil Ditambah',
                          showConfirmButton: false,
                          timer: 2000
                          })
                          $('#nomor').val("");
                          $('#nama_event').val("");
                          $('#link').val("");
                          $('#email').val("");
                          $('#ModalTambahSertifikat').modal('hide');
                         
                          } 
                      })
                      <?php
                     if((isset($_GET['id'])) || (isset($_GET['all'])) ){
                        if($_GET['all'] == 'true'){
                            echo 'window.location.href ="'.base_url().'admin/sertifikat?all=true";';
                        }else{
                            echo 'window.location.href ="'.base_url().'admin/sertifikat?id='.$_GET['id'].'&all=false";';
                        }
                     }?>
                }
		});
          
 // show data sertifikat 
        function show_peserta(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/sertifikat/load_data_peserta',
                async : false,
                dataType : 'json',
                success : function(peserta){
                    console.log(peserta);
                    var html = "";
                    for(var i=0; i < peserta.length; i++){
                            var s = peserta[i].status;
                            var ClrBtn, badge;
                            if(s=="sudah"){
                                ClrBtn ="btn-success";
                                badge =" <span class='badge badge-success'>Sudah</span>";
                            }else{
                                ClrBtn = "btn-danger";
                                badge =" <span class='badge badge-danger'>Belum</span>";
                            }
                            html+='<tr><td>'+(i+1)+'</td>'+
                                    '<td>'+peserta[i].nama_lengkap+'</td>'+
                                    '<td>'+badge+'</td>'+
                                    '<td><a href="javascript:void(0);"  id="ambil-data" class=" btn btn-sm '+ClrBtn+'"'+
                                    'data-nomor="'+peserta[i].nomor+'"  data-link="'+peserta[i].link+'" data-kode ="'+peserta[i].kd_peserta+'" data-email ="'+peserta[i].email+'" data-namap="'+peserta[i].nama_lengkap+'" data-event ="'+peserta[i].kd_event+'" data-nama ="'+peserta[i].nama_event+'"'+
                                     'title="Tambah Sertifikat"><span class=" text-white fa fa-hand-paper"></span></a></td>'+
                                '</tr>';
                    }
                     
                    $('#load-data-peserta').html(html);
                }
            });
        }
        // show data sertifikat 
        function show_sertifikat(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/sertifikat/load_data_sertifikat',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    // setting a timeout loading data
                    //   loadingData();
                },
                success : function(sertifikat){
                    // console.log(sertifikat);
                    var html = "";
                    var a;
                    for(var i=0; i < sertifikat.length; i++){
                        if(sertifikat[i].status== "Aktif"){
                        a ='<span class="badge badge-success"> Aktif</span>';
                        }else{
                            a ='<span class="badge badge-secondary"> Tidak Aktif</span>';
                        }
                            html+='<tr><td>'+(i+1)+'</td>'+
                                    '<td>'+sertifikat[i].nomor+'</td>'+
                                    '<td>'+sertifikat[i].nama_event+'</td>'+
                                    '<td>'+sertifikat[i].nama_lengkap+'</td>'+
                                    '<td>'+sertifikat[i].email+'</td>'+
                                    '<td>'+ a +
                                    '<a href="javascript:void(0);"  id="ganti-status" data-kode="'+sertifikat[i].kd_sertifikat+'" data-status="'+sertifikat[i].status+'" class="text-primary"><span class="float-right ml-2 mr-2 fa fa-refresh "></span></a>'+'</td>'+
                                    '<td><a target="_blank" class=" btn btn-sm btn-success download-link" href="'+sertifikat[i].link+'" title="Download Sertifikat"><span class="fa fa-download text-white"></span></a></td>'+
                                '</tr>';
                    }
                     
                    $('#load-data-sertifikat').html(html);
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

         $('#data-generate').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv', 'excel', 'pdf'
                ]
            } ); 
            $('#data-sertifikat').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv', 'excel', 'pdf'
                ]
            } ); 
            $('#data-peserta').DataTable( {  } );
        });
         
        </script>