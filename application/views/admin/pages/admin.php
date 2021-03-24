

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Admin</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                        </div>
                        <div class="card-body">
                            <div class="row container-fluid">
                                <div class="mb-4 col-12 col-md-5 card bg-light ">
                                    <label class="text-center" for="">Tambah Admin</label>
                                        <div class="row ">
                                            <div class="col-6 col-md-6  mb-2 mt-2 ">
                                            
                                            <button  id="tambah-panitia" data-target="#ModalTambahPanitia" href="javascript:void(0);" data-toggle="modal"  
                                            class="btn btn-primary font-weight-bolder col-12 "> <span class="fa fa-plus "></span> Tambah</button></div>
                                        <div class="col-6 col-md-6  mb-2 mt-2 "> 
                                        </div>
                                        
                                        </div>
                                </div>
                                <div class="mb-4 col-12 col-md-5 card bg-light ml-4 ">
                                
                                </div>
                                
                                <div class="mb-4 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered" id="data-admin" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Level Admin</th>
                                                <th>Sebagai</th>
                                                <th>Status</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody id="load-data-panitia">
                                            
                                        
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
<!-- start modal edit data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalDataPanitia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Admin</h5>
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
											<label class="text-dark ">Informasi Data</label>
                                            <table class="table table-sm text-black text-left">
                                                <tr>
                                                <input id="kd_admin3" type="hidden" value="">
                                                <td><small>Level Admin</small></td><td> 
                                                <input id="level3" type="text" value="" name="level3" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td></tr>
                                                <tr>
                                                <td><small>Sebagai</small></td><td>
                                                <input id="sebagai3" type="text" value="" disabled=true name="sebagai3" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td>
                                                </tr>
                                                <tr>
                                                <td><small>Username</small></td><td><input id="username3" type="text" value="" name="username3" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td>
                                                </tr>
                                                <tr>
                                                <td><small>Password</small></td><td><input id="password3" type="password" value="" name="password3" placeholder="Tidak Ada Data!"  class=" col-8 border-0 form-control-xm bg-transparent float-left">
                                                <span id="lihat-password" data-status="true" class="ml-2 float-left btn btn-sm btn-info">Lihat</span></td>
                                                </tr>
                                                <tr>
                                                <td><small>Status</small></td><td>
                                                    <select  class=" col-4 border-0 form-control-xm bg-transparent" name="status3" id="status3">
                                                        <option value="">--</option>
                                                        <option value="aktif">Aktif</option>
                                                        <option value="tidak aktif">Tidak Aktif</option>
                                                    </select>
                                                </td>
                                                </tr>
                                                
                                            </table>
										</div>
									</div>
								</div>
							</div>
					</div>

				</div>
				<div class="modal-footer">
                    <button  class="btn btn-primary" id="edit_admin" href="#"> <span class="fa fa-pen-square "> </span> Edit</button>
            	</div>
            </div>
        </div>
    </div>
<!-- start modal tambah data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalTambahPanitia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
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
											<label class="text-dark ">Informasi Data</label>
										<table class="table table-sm text-black text-left">
											<tr>
											<td><small>Level Admin</small></td><td> 
											<input required id="level2" type="text" value="" name="level2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
											<tr>
											<td><small>Sebagai</small></td><td>
                                                <select required class=" col-4 border-0 form-control-xm bg-transparent" name="sebagai2" id="sebagai2">
                                                    <option value="">--</option>
                                                    <option selected value="Admin">Admin</option>
                                                </select>
											</td>
											</tr>
											<tr>
											<td><small>Username</small></td><td><input required id="username2" type="text" value="" name="username2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Password</small></td><td><input required id="password2" type="text" value="" name="password2" placeholder="Tidak Ada Data!"  class=" col-8 border-0 form-control-xm bg-transparent float-left">
                                            </td>
											</tr>
											
										</table>
										</div>
									</div>
								</div>
							</div>
					</div>

				</div>
				<div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="tambah_admin" href  >Tambah</button>
            	</div>
            </div>
        </div>
    </div>
  <div class=" modal fade modal-static" id="ModalHapusData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa Kamu Menghapus Data Ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                </div>
                <div class="modal-body">
                Data : <label id="data-level" for=""></label><br>
                <input type="hidden" id="kd_admin" value="">
                KLik "Iya" untuk melanjutkan perintah ini ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary text-white" id="iya-hapus">Iya</a>
                </div>
            </div>
        </div>
    </div>

<script>
       var table;
    $(document).ready(function(){

        table = $('#data-admin').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('admin/akun/load_data_akun')?>",
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
    }
    
     $('#ModalDataPanitia').on('click','#lihat-password',function(){
           var status = $(this).attr('data-status'); 
           var btnpass, btnstatus;
            if(status = true){
                btnpass = document.getElementById('password3');
                btnpass.setAttribute('type','text');
                btnstatus = document.getElementById('lihat-password');
                btnstatus.setAttribute('data-status','false');
            }                                              
     });

    $('#ModalTambahPanitia').on('click','#tambah_admin',function(){
                  var level = $('#level2').val();
                  var sebagai = $('#sebagai2').val();
                  var username = $('#username2').val();
                  var password = $('#password2').val();
                   var status = 'aktif';
                   if (level == "" && sebagai =="" && username ==""&& password ==""){
                       alert('error : form masih kosong!');
                   }
                   else{
                     $.ajax({
                        url   : '<?=base_url()?>admin/akun/tambah_akun',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            level : level,
                            sebagai : sebagai ,username : username, password: password, 
                            status :status
                        },
                        success  : function(respons){ 
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil Ditambah',
                          showConfirmButton: false,
                          timer: 2000
                          })
                          $('#level2').val("");
                          $('#sebagai2').val("");
                          $('#username2').val("");
                          $('#password2').val("");
                          $('#ModalTambahPanitia').modal('hide');
                          refreshData();
                        } 
                      })
                   }
				});
             $('#edit_admin').click(function(){
                  var kd_admin = $('#kd_admin3').val();
                  var level = $('#level3').val();
                  var username =   $('#username3').val();
                  var password =  $('#password3').val();
                  var status =  $('#status3').val();
                     $.ajax({
                        url   : '<?=base_url()?>admin/akun/edit_akun',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            kd_admin : kd_admin, level : level,
                            username : username, password: password, 
                            status :status
                        },
                        success  : function(respons){ 
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil Diubah',
                          showConfirmButton: false,
                          timer: 2000
                          })
                          $('#ModalDataPanitia').modal('hide');
                          refreshData();
                        } 
                      })
				});
            // detail data admin / panitia 
            $('#load-data-panitia').on('click','#detail-panitia',function(){
                var kd_admin = $(this).attr('data-kode');
                var level = $(this).attr('data-level');
                var sebagai = $(this).attr('data-sebagai');
                var pass = $(this).attr('data-pass');
                var username = $(this).attr('data-user');
                var status = $(this).attr('data-status');
                $('#kd_admin3').val(kd_admin);
                $('#level3').val(level);
                $('#sebagai3').val(sebagai);
                $('#username3').val(username);
                $('#password3').val(pass);
                $('#status3').val(status);
            });                     
        // modal hapus data panitia 
            $('#load-data-panitia').on('click','#hapus-panitia',function(){
                        var kd_admin = $(this).attr('data-kode');
                        var data_level = $(this).attr('data-level');
                        document.getElementById('data-level').innerHTML = data_level;
                        $('#kd_admin').val(kd_admin);
            });
        // hapus data panitia 
            $('#ModalHapusData').on('click','#iya-hapus',function(){
               var kd_admin =  $('#kd_admin').val();
                     $.ajax({
                        url   : '<?=base_url()?>admin/akun/hapus_akun',
                        type  : "ajax",
                        method : "POST",
                        data     : { kd_admin : kd_admin },
                        success  : function(respons){ 
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil DiHapus',
                          showConfirmButton: false,
                          timer: 2000
                          })
                          $('#ModalHapusData').modal('hide');
                           refreshData();
                        } 
                      })
              });

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