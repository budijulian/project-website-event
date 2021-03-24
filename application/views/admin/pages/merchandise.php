                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Merchandise</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Merchandise</h6>
                        </div>
                        <div class="card-body">
                            <div class="row container-fluid">
                                <div class="mb-4 col-12 col-md-5 card bg-light ">
                                        <label class="text-center" for="">Tambah Merchandise</label>
                                        <div class="row ">
                                                <div class="col-6 col-md-6  mb-2 mt-2 ">
                                                <button  id="tambah-merchandise" data-target="#ModalTambahMerchandise" href="javascript:void(0);" data-toggle="modal"  
                                                    class="btn btn-primary font-weight-bolder col-12 "> <span class="fa fa-plus "></span> Tambah</button>
                                                </div>
                                                <div class="col-6 col-md-6  mb-2 mt-2 "> 
                                                    </div> 
                                    </div>
                                </div>
                                <div class="mb-4 col-12 col-md-5 card bg-light ml-4 ">

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered" id="data-merchandise" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Merchandise</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Keterangan</th>
                                             <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="load-data-merchandise">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            
<script>
var table;
      $(document).ready(function(){ 
          
            load_data_merchandise();
             $('#data-merchandise').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            'csv', 'excel', 'pdf'
                        ]
                    } );
        //    table = $('#data-merchandise').DataTable({ 
                
        //         // "processing": false, //Feature control the processing indicator.
        //         // "serverSide": false, //Feature control DataTables' server-side processing mode.
        //         // "order": [], //Initial no order.
        //         // // "scrollX": true,
        //         // // "lengthChange" : true,
        //         // // "searching": true,
        //         // // "ordering": true,
        //         // // "bJQueryUI": true,
        //         // "paging": true,
        //         // Load data for the table's content from an Ajax source
        //         "ajax": {
        //             "url" : "<?=base_url()?>admin/merchandise/load_data_merchandise",
        //             "type"  : 'POST',
        //             "async" : false,
        //             "dataType" : 'json',
        //             beforeSend : function() {
        //                 // setting a timeout loading data
        //                // loadingData();
        //             },
        //             success : function(merchandise){
        //                 //  console.log(merchandise);
        //                 var html = "";
        //                 for(var i=0; i < merchandise.length; i++){
        //                     html += '<tr>'+
        //                                 '<td>'+(i+1)+'</td>'+
        //                                 '<td>'+merchandise[i].nama+'</td>'+
        //                                 '<td>'+merchandise[i].kategori+'</td>'+
        //                                 '<td>'+merchandise[i].harga+'</td>'+
        //                                 '<td>'+merchandise[i].keterangan+'</td>'+
        //                                 '<td><a class=" btn btn-sm btn-primary lihat-merchandise" data-target="#ModalDataMerchandise" id="tampil-data" data-toggle="modal"  title="Lihat Data" href="javascript:void(0);" data-kode="'+merchandise[i].kd_merchandise+'"><span class="fa fa-eye text-white"></span></a>'+' '+
        //                                 '<a class=" btn btn-sm btn-danger hapus-merchandise" data-target="#ModalHapusMerchandise" id="hapus-data" data-toggle="modal"  title="Hapus Data" href="javascript:void(0);" data-kode="'+merchandise[i].kd_merchandise+'" data-nama="'+merchandise[i].nama+'"><span class="fa fa-trash-o text-white"></span></a></td>'+
        //                             '</tr>';
        //                 }
                        
        //                 $('#load-data-merchandise').html(html);
        //             }
        //         }

        //     });
            // table.ajax.reload(null,true);
           
        //  table =  $('#data-merchandise').DataTable({
        //         dom: 'Bfrtip',
        //         buttons: [
        //              'csv', 'excel', 'pdf'
        //         ]
        //     });
            
            // table.ajax.reload();
        // load_data_merchandise();
        
        
        $('#load-data-merchandise').on('click','#tampil-data',function(){
                var kd_merchandise = $(this).attr('data-kode');
                detail_data_merchandise("<?=base_url()?>admin/merchandise/get_data_merchandise",kd_merchandise);
                console.log(kd_merchandise);
                
              });
       
        function detail_data_merchandise(link,kd_merchandise){
                  $.ajax({
                    type  : "ajax",
                    method : "POST",
                    url   : link,
                    async : true,
                    data     : { kd_merchandise : kd_merchandise},
                    dataType : "json",
                    success  : function(get_hasil){
                     //   console.log(hasil);
                       for(var i=0; i < get_hasil.length; i++){
                        $('#kd_merchandise').val(get_hasil[i].kd_merchandise);
                        $('#nama_merchandise').val(get_hasil[i].nama);
                        $('#kategori').val(get_hasil[i].kategori);
                        $('#harga').val(get_hasil[i].harga);
                        $('#kontak').val(get_hasil[i].kontak);
                        $('#keterangan').val(get_hasil[i].keterangan);
                        $('#diskripsi').val(get_hasil[i].diskripsi);
                        $('#waktu').val(get_hasil[i].timestamp);
                        var foto = document.getElementById("foto_merchandise");
                        foto.setAttribute('src','<?=base_url()?>assets/img/merchandise/'+get_hasil[i].foto);
                        // //manipulasi foto dengan attribut DOM
                        // var merchandise = document.getElementById("foto_merchandise");
                        // merchandise.setAttribute('src','<?=base_url()?>assets/img/merchandise/'+get_hasil[i].foto);
                         
                       }

                    }
                })
			  }
//  $('#ModalTambahMerchandise').on('click','#tambah_merchandise',function(){
     $('#tambah_merchandise').submit(function(e){
            e.preventDefault(); 
               var nama_merchandise2 = $('#nama_merchandise2').val();
               var kategori2 = $('#kategori2').val();
               var harga2 = $('#harga2').val();
               var kontak2 = $('#kontak2').val();
               var keterangan2 = $('#keterangan2').val();
               var diskripsi2 = $('#diskripsi2').val();
               var file_foto2 = $('#file_foto2').val();
                if((nama_merchandise2 == "") || (kategori2 == "") || (harga2 == "") || (kontak2 == "")
                || (keterangan2 == "")|| (diskripsi2 == "")|| (file_foto2 == "")){
                    Swal.fire({
                          icon: 'error',
                          title: 'Warning',
                          text: 'Form Data Masih Kosong!!',
                          showConfirmButton: false,
                          timer: 2000
                          })
                }else{
                     $.ajax({
                     url: '<?=base_url()?>admin/merchandise/tambah_merchandise',
                     type:"POST",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil Ditambah'
                          })
                         $('#nama_merchandise2').val("");
                          $('#kategori2').val("");
                          $('#harga2').val("");
                          $('#kontak2').val("");
                          $('#keterangan2').val("");
                          $('#diskripsi2').val("");
                          $('#file_foto2').val("");
                          $('#ModalTambahMerchandise').modal('hide');
                           load_data_merchandise();
                        }    
                    })
                    }
				});
         $('#edit_merchandise').submit(function(e){
            e.preventDefault(); 
                     $.ajax({
                        url   : '<?=base_url()?>admin/merchandise/edit_merchandise',
                        type  : "POST",
                        data  : new FormData(this),
                        processData:false,
                        contentType:false,
                        cache:false,
                        async:false,
                        success  : function(respons){ 
                            // console.log(kd_merchandise);
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil Diubah'
                          })
                          $('#nama_merchandise').val("");
                          $('#kategori').val("");
                          $('#harga').val("");
                          $('#kontak').val("");
                          $('#keterangan').val("");
                          $('#diskripsi').val("");
                          $('#file_foto').val("");
                          $('#ModalDataMerchandise').modal('hide');
                           load_data_merchandise();
                        } 
                      })
				});

        // modal hapus data panitia 
        $('#load-data-merchandise').on('click','#hapus-data',function(){
                var kd_merchandise = $(this).attr('data-kode');
                var data_nama = $(this).attr('data-nama');
                // console.log(kd_merchandise);
                document.getElementById('data-nama').innerHTML = data_nama;
                $('#kd_merchandise').val(kd_merchandise);
              });
        // hapus data panitia 
$('#ModalHapusMerchandise').on('click','#iya-hapus',function(){
               var kd_merchandise =  $('#kd_merchandise').val();
                     $.ajax({
                        url   : '<?=base_url()?>admin/merchandise/hapus_merchandise',
                        type  : "ajax",
                        method : "POST",
                        data     : { kd_merchandise : kd_merchandise },
                        success  : function(respons){ 
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil DiHapus'
                          })
                          $('#ModalHapusMerchandise').modal('hide');
                           load_data_merchandise();
                        } 
                      })
              });

        function load_data_merchandise(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/merchandise/load_data_merchandise',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    // setting a timeout loading data
                      loadingData();
                },
                success : function(merchandise){
                    //  console.log(merchandise);
                    var html = "";
                    for(var i=0; i < merchandise.length; i++){
                        html += '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+merchandise[i].nama+'</td>'+
                                    '<td>'+merchandise[i].kategori+'</td>'+
                                    '<td>'+merchandise[i].harga+'</td>'+
                                    '<td>'+merchandise[i].keterangan+'</td>'+
                                    '<td><a class=" btn btn-sm btn-primary lihat-merchandise" data-target="#ModalDataMerchandise" id="tampil-data" data-toggle="modal"  title="Lihat Data" href="javascript:void(0);" data-kode="'+merchandise[i].kd_merchandise+'"><span class="fa fa-eye text-white"></span></a>'+' '+
                                     '<a class=" btn btn-sm btn-danger hapus-merchandise" data-target="#ModalHapusMerchandise" id="hapus-data" data-toggle="modal"  title="Hapus Data" href="javascript:void(0);" data-kode="'+merchandise[i].kd_merchandise+'" data-nama="'+merchandise[i].nama+'"><span class="fa fa-trash-o text-white"></span></a></td>'+
                                '</tr>';
                    }
                    $('#load-data-merchandise').html(html);
                    
                }
                
            })
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
         

       
     });
</script>
<!-- start modal edit data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalDataMerchandise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Merchandise</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                 <form class="form-horizontal" id="edit_merchandise">
                    <div class="modal-body">
                        <div class="embed-responsive">
                                <div id="DataPeserta" class="row container ">
                                        <div class="row">
                                            <div class="col col-lg-8 col-sm-12 col-md-12 col-auto">
                                                <label class="text-dark ">Informasi Data</label>
                                                <table class="table table-sm text-black text-left">
                                                <tr>
                                                <td><small>Waktu</small></td><td> 
                                                <input id="waktu" type="text" value="" disabled name="waktu" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td></tr>
                                                <tr>
                                                <td><small>Nama Merchandise</small></td><td> 
                                                <input type="hidden" value="" name="kd_merchandise" id="kd_merchandise">
                                                <input id="nama_merchandise" type="text" value="" name="nama_merchandise" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td></tr>
                                                <tr>
                                                <td><small>Kategori</small></td><td>
                                                <input id="kategori" type="text" value="" name="kategori" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td>
                                                </tr>
                                                <tr>
                                                <td><small>Harga</small></td><td><input id="harga" type="text" value="" name="harga" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td>
                                                </tr>
                                                    <tr>
                                                <td><small>Kontak</small></td><td><input id="kontak" type="text" value="" name="kontak" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td>
                                                </tr>
                                                <tr>
                                                <td><small>Status</small></td>
                                                <td>
                                                    <select class="col-12 border-0 form-control-xm bg-transparent" name="keterangan" id="keterangan">
                                                        <option value="">-- Status --</option>
                                                        <option value="Tersedia">Tersedia</option>
                                                        <option value="Habis">Habis</option>
                                                    </select>
                                                </td>
                                                </tr>
                                                <tr> 
                                                <td><small>Diskripsi</small></td><td><textarea id="diskripsi"  type="text" value="" cols="5" rows="5" name="diskripsi" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent"></textarea>
                                                </td>
                                                </tr>
                                            </table>
                                            </div>		
                                            <div class="col col-lg-4 col-sm-12 col-md-12 col-auto">
                                                <label class="text-dark" >Foto</label>
                                                <table class="table table-borderless text-black text-left">
                                                    <tr>
                                                        <td><img id="foto_merchandise" height="200px" witdh="200px" src="" alt="Merchandise"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input id="file-foto"  type="file" value="" name="file-foto" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                        </td>
                                                </tr>
                                                </table>
                                            </div>
                                            
                                            </div>
                                        </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal" >Tutup</button>
                        <button class="btn  btn-primary" type="submit" id="edit_merchandise" href="#"> <span class="fa fa-pen-square "></span> Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal hapus data  -->
<div class=" modal fade modal-static" id="ModalHapusMerchandise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa Kamu Menghapus Data Ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                </div>
                <div class="modal-body">
                Data : <label id="data-nama" for=""></label><br>
                <input type="hidden" id="kd_merchandise" value="">
                KLik "Iya" untuk melanjutkan perintah ini ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary text-white" id="iya-hapus">Iya</a>
                </div>
            </div>
        </div>
    </div>

<!-- start modal tambah data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalTambahMerchandise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Merchandise</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <form class="form-horizontal" id="tambah_merchandise">
                <div class="modal-body">
					<div class="embed-responsive">
							<div id="DataPeserta" class=" container ">
									<div class="row">
										<div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
                                            <label class="text-dark ">Informasi Data</label>
                                            <table class="table table-sm text-black text-left">
                                            <tr>
											<td><small>Nama Merchandise</small></td><td> 
											<input id="nama_merchandise2" type="text" value="" name="nama_merchandise2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td></tr>
											<tr>
											<td><small>Kategori</small></td><td>
											<input id="kategori2" type="text" value="" name="kategori2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
											<tr>
											<td><small>Harga</small></td><td><input id="harga2" type="text" value="" name="harga2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
                                            	<tr>
											<td><small>Kontak</small></td><td><input id="kontak2" type="text" value="" name="kontak2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
                                            </tr>
                                            <tr>
                                            <td><small>Status</small></td>
                                            <td>
                                                 <select class="col-12 border-0 form-control-xm bg-transparent" name="keterangan2" id="keterangan2">
                                                    <option value="">-- Status --</option>
                                                    <option selected value="Tersedia">Tersedia</option>
                                                    <option value="Habis">Habis</option>
                                                </select>
											</td>
											</tr>
                                            <tr> 
											<td><small>Diskripsi</small></td><td><textarea id="diskripsi2"  type="text" value="" cols="5" rows="5" name="diskripsi2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent"></textarea>
											</td>
											</tr>
                                            <tr>
											<td><small>Foto</small></td><td><input id="file-foto2"  type="file" value="" name="file-foto2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
											</td>
											</tr>
										</table>
										</div>		
								</div>
							</div>
					</div>

				</div>
				<div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" >Tutup</button>
                    <button class="btn  btn-primary" type="submit" id="tambah_merchandise" href="#"> <span class="fa fa-pen-square "></span> Tambah Data</button>
            	</div>
                </form>
            </div>
        </div>
    </div>