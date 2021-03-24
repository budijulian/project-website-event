

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> SMTP</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data SMTP</h6>
                        </div>
                        <div class="card-body">
                            <div class="row container-fluid">
                                <div class="mb-4 col-12 col-md-5 card bg-light ">
                                    <label class="text-center" for="">Tambah SMTP</label>
                                        <div class="row ">
                                            <div class="col-6 col-md-6  mb-2 mt-2 ">
                                            
                                            <button  id="tambah-smtp" data-target="#ModalTambahSmtp" href="javascript:void(0);" data-toggle="modal"  
                                            class="btn btn-primary font-weight-bolder col-12 "> <span class="fa fa-plus "></span> Tambah</button></div>
                                        <div class="col-6 col-md-6  mb-2 mt-2 "> 
                                        </div>
                                        
                                        </div>
                                </div>
                                <div class="mb-4 col-12 col-md-5 card bg-light ml-4 ">
                                
                                </div>
                                
                                <div class="mb-4 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered" id="data-smtp" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Host Server</th>
                                                <th>User Server</th>
                                                <th>Password Server</th>
                                                <th>Port Server</th>
                                                <th>Status</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody id="load-data-smtp">
                                            
                                        
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
<div class=" modal fade modal-static" witdh="100%" id="ModalDataSmtp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data SMTP</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <div class="modal-body">
					<div class="embed-responsive">
							<div id="DataInformasi" class="row container ">
								<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
									<div class="row">
										<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
											<label class="text-dark ">Informasi Data</label>
										<table class="table table-sm text-black text-left">
											<tr>
                                            <input id="kd_smtp3" type="hidden" value="">
											<td><small>HOST Server</small></td><td> 
											<input name="host3" id="host3" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                            </td></tr>
                                            <tr>
                                            <td><small>User Server</small></td><td> 
											<input name="user3" id="user3" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                            </td></tr>
                                            <tr>
											<td><small>Password Server</small></td><td> 
											<input name="pass3" id="pass3" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                            </td></tr>
                                            <tr>
											<td><small>PORT Server</small></td><td> 
											<input name="port3" id="port3" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                            </td></tr>
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
                    <button class="btn btn-primary" id="edit_smtp"  type="button" data-dismiss="modal" >Edit Data</button>
            	</div>
            </div>
        </div>
    </div>
<!-- start modal tambah data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalTambahSmtp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data SMTP Server</h5>
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
											<td><small>HOST Server</small></td><td> 
											<input name="host2" id="host2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                            </td></tr>
                                            <tr>
											<td><small>User Server</small></td><td> 
											<input name="user2" id="user2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                            </td></tr>
                                            <tr>
											<td><small>Password Server</small></td><td> 
											<input name="pass2" id="pass2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                            </td></tr>
                                            <tr>
                                           <td><small>PORT Server</small></td><td> 
											<input name="port2" id="port2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                            </td></tr>
											
										</table>
										</div>
									</div>
								</div>
							</div>
					</div>

				</div>
				<div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="tambah_smtp" href  >Tambah</button>
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
                <input type="hidden" id="kd_smtp" value="">
                KLik "Iya" untuk melanjutkan perintah ini ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary text-white" id="iya-hapus">Iya</a>
                </div>
            </div>
        </div>
    </div>

<script>
     $(document).ready(function(){    
       
 show_smtp();//call function show all smtp  
        $('#ModalTambahSmtp').on('click','#tambah_smtp',function(){
                  var host = $('#host2').val();
                  var user = $('#user2').val();
                  var pass = $('#pass2').val();
                  var port = $('#port2').val();
                   var status = 'aktif';
                     $.ajax({
                        url   : '<?=base_url()?>admin/smtp/tambah_smtp',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            host : host, user : user,pass : pass, port: port, 
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
                          $('#host2').val("");
                          $('#user2').val("");
                          $('#pass2').val("");
                          $('#port2').val("");
                          $('#ModalTambahSmtp').modal('hide');
                           show_smtp();
                        } 
                      })
				});
        $('#edit_smtp').click(function(){
                  var kd_smtp = $('#kd_smtp3').val();
                  var host = $('#host3').val();
                  var user = $('#user3').val();
                  var pass = $('#pass3').val();
                  var port = $('#port3').val();
                  var status = $('#status3').val();
                     $.ajax({
                        url   : '<?=base_url()?>admin/smtp/edit_smtp',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            kd_smtp : kd_smtp, host : host,
                            user : user,pass : pass, port: port, 
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
                          $('#ModalDataSmtp').modal('hide');
                           show_smtp();
                        } 
                      })
				});
// detail data smtp / smtp 
            $('#load-data-smtp').on('click','#detail-smtp',function(){
                var kd_smtp = $(this).attr('data-kode');
                var host = $(this).attr('data-host');
                var user = $(this).attr('data-user');
                var pass = $(this).attr('data-pass');
                var port = $(this).attr('data-port');
                var status = $(this).attr('data-status');
                $('#kd_smtp3').val(kd_smtp);
                $('#host3').val(host);
                $('#user3').val(user);
                $('#pass3').val(pass);
                $('#port3').val(port);
                $('#status3').val(status);
              });
        // modal hapus data smtp 
$('#load-data-smtp').on('click','#hapus-smtp',function(){
                var kd_smtp = $(this).attr('data-kode');
                $('#kd_smtp').val(kd_smtp);
              });
        // hapus data smtp 
$('#ModalHapusData').on('click','#iya-hapus',function(){
               var kd_smtp =  $('#kd_smtp').val();
                     $.ajax({
                        url   : '<?=base_url()?>admin/smtp/hapus_smtp',
                        type  : "ajax",
                        method : "POST",
                        data     : { kd_smtp : kd_smtp },
                        success  : function(respons){ 
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil DiHapus',
                          showConfirmButton: false,
                          timer: 2000
                          })
                          $('#ModalHapusData').modal('hide');
                           show_smtp();
                        } 
                      })
              });




 // show data smtp/ smtp 
        function show_smtp(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/smtp/load_data_smtp',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    // setting a timeout loading data
                      loadingData();
                },
                success : function(datasmtp){
                    // console.log(datasmtp);
                    var html = "";
                    for(var i=0; i < datasmtp.length; i++){
                        var kd_smtp = datasmtp[i].kd_smtp;
                        // var decodedString = atob(encodedString);
                        // var encodedString = btoa(string);
                        // var kd_smtp2 = btoa(kd_smtp);
                        var span;
                        if(datasmtp[i].status == "aktif")
                        {   span = '<span class="badge badge-info">Aktif</span>'; }
                        else {  span = '<span class="badge badge-danger">Tidak Aktif</span>'; }
                        var pass = datasmtp[i].pass_server;
                        html += '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+ datasmtp[i].host_server +'</td>'+
                                    '<td>'+ datasmtp[i].user_server +'</td>'+
                                    '<td>'+ pass.substr(0,10) +'...</td>'+
                                    '<td>'+ datasmtp[i].port_server +'</td>'+
                                    '<td>' + span +'</td>'+
                                    '<td><a class=" btn btn-sm btn-primary detail-smtp" id="detail-smtp" data-target="#ModalDataSmtp" href="javascript:void(0);" data-toggle="modal" title="Lihat Data" data-kode="'+datasmtp[i].kd_smtp+'" data-host="'+datasmtp[i].host_server+'" data-user="'+datasmtp[i].user_server+'" data-pass="'+datasmtp[i].pass_server+'" data-port="'+datasmtp[i].port_server+'" data-status="'+datasmtp[i].status+'" ><span class="fa fa-user-edit text-white"></span></a>'+' '+
                                    '<a class="btn btn-sm btn-info hapus-smtp" id="hapus-smtp" data-target="#ModalHapusData" href="javascript:void(0);" data-toggle="modal" title="Hapus Informasi" data-kode="'+datasmtp[i].kd_smtp+'"><span class="fa fa-trash-o text-white"></span></a></td>'+
                                '</tr>';
                    }
                     
                    $('#load-data-smtp').html(html);
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
            
            $('#data-smtp').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv', 'excel', 'pdf'
                ]
            } );

        });
        </script>