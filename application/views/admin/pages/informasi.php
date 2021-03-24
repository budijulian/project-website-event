

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Informasi</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Informasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="row container-fluid">
                                <div class="mb-4 col-12 col-md-5 card bg-light ">
                                    <label class="text-center" for="">Tambah Informasi</label>
                                        <div class="row ">
                                            <div class="col-6 col-md-6  mb-2 mt-2 ">
                                            
                                            <button  id="tambah-informasi" data-target="#ModalTambahInformasi" href="javascript:void(0);" data-toggle="modal"  
                                            class="btn btn-primary font-weight-bolder col-12 "> <span class="fa fa-plus "></span> Tambah</button></div>
                                        <div class="col-6 col-md-6  mb-2 mt-2 "> 
                                        </div>
                                        
                                        </div>
                                </div>
                                <div class="mb-4 col-12 col-md-5 card bg-light ml-4 ">
                                
                                </div>
                                
                                <div class="mb-4 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered" id="data-informasi" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Text Informasi</th>
                                                <th>Status</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody id="load-data-informasi">
                                            
                                        
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
<div class=" modal fade modal-static" witdh="100%" id="ModalDataInformasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Informasi</h5>
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
                                            <input id="kd_informasi3" type="hidden" value="">
											<td><small>Text Informasi</small></td><td> 
											<textarea name="text3" id="text3" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent" cols="30" rows="10"></textarea>
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
                    <button class="btn btn-primary" id="edit_informasi"  type="button" data-dismiss="modal" >Edit Data</button>
            	</div>
            </div>
        </div>
    </div>
<!-- start modal tambah data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalTambahInformasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Informasi</h5>
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
											<td><small>Text Informasi</small></td><td> 
											<textarea name="text2" id="text2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent" cols="30" rows="10"></textarea>
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
                    <button class="btn btn-primary" type="button" id="tambah_informasi" href  >Tambah</button>
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
                <input type="hidden" id="kd_informasi" value="">
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
       
 show_informasi();//call function show all informasi  

                  

        $('#ModalTambahInformasi').on('click','#tambah_informasi',function(){
                  var text = $('#text2').val();
                   var status = 'aktif';
                     $.ajax({
                        url   : '<?=base_url()?>admin/informasi/tambah_informasi',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            text : text, 
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
                          $('#text2').val("");
                          $('#ModalTambahInformasi').modal('hide');
                           show_informasi();
                        } 
                      })
				});
        $('#edit_informasi').click(function(){
                  var kd_informasi = $('#kd_informasi3').val();
                  var status = $('#status3').val();
                  var text =   $('#text3').val();
                     $.ajax({
                        url   : '<?=base_url()?>admin/informasi/edit_informasi',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            kd_informasi : kd_informasi, text : text,
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
                          $('#ModalDataInformasi').modal('hide');
                           show_informasi();
                        } 
                      })
				});
// detail data informasi / informasi 
            $('#load-data-informasi').on('click','#detail-informasi',function(){
                var kd_informasi = $(this).attr('data-kode');
                var text = $(this).attr('data-text');
                var status = $(this).attr('data-status');
                $('#kd_informasi3').val(kd_informasi);
                $('#text3').val(text);
                $('#status3').val(status);
              });
        // modal hapus data informasi 
        $('#load-data-informasi').on('click','#hapus-informasi',function(){
                var kd_informasi = $(this).attr('data-kode');
                $('#kd_informasi').val(kd_informasi);
              });
        // hapus data informasi 
$('#ModalHapusData').on('click','#iya-hapus',function(){
               var kd_informasi =  $('#kd_informasi').val();
                     $.ajax({
                        url   : '<?=base_url()?>admin/informasi/hapus_informasi',
                        type  : "ajax",
                        method : "POST",
                        data     : { kd_informasi : kd_informasi },
                        success  : function(respons){ 
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil DiHapus',
                          showConfirmButton: false,
                          timer: 2000
                          })
                          $('#ModalHapusData').modal('hide');
                           show_informasi();
                        } 
                      })
              });




 // show data informasi/ informasi 
        function show_informasi(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/informasi/load_data_informasi',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    // setting a timeout loading data
                      loadingData();
                },
                success : function(datainformasi){
                    // console.log(datainformasi);
                    var html = "";
                    for(var i=0; i < datainformasi.length; i++){
                        var kd_informasi = datainformasi[i].kd_informasi;
                        // var decodedString = atob(encodedString);
                        // var encodedString = btoa(string);
                        // var kd_informasi2 = btoa(kd_informasi);
                        var span;
                        if(datainformasi[i].status == "aktif")
                        {   span = '<span class="badge badge-info">Aktif</span>'; }
                        else {  span = '<span class="badge badge-danger">Tidak Aktif</span>'; }
                        var info = datainformasi[i].text;
                        html += '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+ info.substr(0,50)+'...</td>'+
                                    '<td>' + span +'</td>'+
                                    '<td><a class=" btn btn-sm btn-primary detail-informasi" id="detail-informasi" data-target="#ModalDataInformasi" href="javascript:void(0);" data-toggle="modal" title="Lihat Data" data-kode="'+datainformasi[i].kd_informasi+'" data-text="'+datainformasi[i].text+'" data-status="'+datainformasi[i].status+'" ><span class="fa fa-user-edit text-white"></span></a>'+' '+
                                    '<a class="btn btn-sm btn-info hapus-informasi" id="hapus-informasi" data-target="#ModalHapusData" href="javascript:void(0);" data-toggle="modal" title="Hapus Informasi" data-kode="'+datainformasi[i].kd_informasi+'" data-text="'+datainformasi[i].text+'"><span class="fa fa-trash-o text-white"></span></a></td>'+
                                '</tr>';
                    }
                     
                    $('#load-data-informasi').html(html);
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
            
            $('#data-informasi').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv', 'excel', 'pdf'
                ]
            } );

        });
        </script>