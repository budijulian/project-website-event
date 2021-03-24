
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/events?all=true">Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dokumentasi</li>
                        </ol>
                    </nav>
                     
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Dokumentasi Event</h6>
                        </div>
                        <div class="card-body">
                            <div class="row container-fluid">
                                 <div class="mb-4 col-12 col-md-5 card bg-light ">
                                    <label class="text-center" for="">Tambah Data</label>
                                        <div class="row ">
                                            <div class="col-6 col-md-6  mb-2 mt-2 ">
                                            
                                            <button   data-target="#ModalTambahDokumentasi" href="javascript:void(0);" data-toggle="modal"  
                                            class="btn btn-primary font-weight-bolder col-12 "> <span class="fa fa-plus "></span> Tambah</button></div>
                                        <div class="col-6 col-md-6  mb-2 mt-2 "> 
                                        </div>
                                        
                                        </div>
                                </div>
                                <div class="mb-4 col-12 col-md-5 card bg-light ml-4 ">
                                
                                </div>
                                <div class="mb-4 col-md-12">
                                <div class="table-responsive-sm">
                                    <table style="font-size:14px;" id="data-dokumentasi" class="table table-sm table-bordered"  style="width:100%"  cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Event</th>
                                                <th>Judul </th>
                                                <th>Keterangan</th>
                                                <th>Tindakan</th>
                                            </tr>
                                          
                                        </thead>
                                        <tbody id="load-data-dokumentasi">


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Event</th>
                                                <th>Judul </th>
                                                <th>Keterangan</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

<!-- start modal edit data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalDataDokumentasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Dokumentasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <form class="form-horizontal" id="edit_dokumentasi">
                    <div class="modal-body">
                        <div class="embed-responsive">
                                <div id="DataPeserta" class="row container ">
                                        <div class="row">
                                            <div class="col col-lg-8 col-sm-12 col-md-12 col-auto">
                                                <label class="text-dark ">Informasi Data</label>
                                                <table class="table table-sm text-black text-left">
                                                <tr><td><small>Event</small></td>
                                                <td><input value="" id="kd_event" name="kd_event" type="hidden">
                                                <input value="" name="kd_dokumentasi" id="kd_dokumentasi" type="hidden">
                                                    <input id="nama_event" type="text" disabled=true value="" name="nama_event" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
                                                </td>
                                                </tr>
                                                <tr>
                                                <td><small>Judul Dokumentasi</small></td><td> 
                                                    <textarea id="judul"  type="text" value="" cols="5" rows="5" name="judul" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent"></textarea>
                                                
                                                </td></tr>
                                            <tr><td><small>Status</small></td>
                                                <td>
                                                    <select class="col-12 border-0 form-control-xm bg-transparent" name="status" id="status">
                                                        <option value="">-Pilih-</option>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                    </select>
                                                </td>
                                                </tr>
                                            </table>
                                            </div>		
                                            <div class="col col-lg-4 col-sm-12 col-md-12 col-auto">
                                                <label class="text-dark" >Foto</label>
                                                <table class="table table-borderless text-black text-left">
                                                    <tr>
                                                        <td><img id="foto_dokumentasi" height="200px" witdh="200px" src="" alt="Dokumentasi"></td>
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
                        <button class="btn btn-primary" type="submit" id="edit_dokumentasi" href="#"> <span class="fa fa-pen-square "></span> Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- start modal tambah data  -->
<div class=" modal fade modal-static" witdh="100%" id="ModalTambahDokumentasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" witdh="100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dokumentasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
            	</div>
                <form class="form-horizontal" id="tambah_dokumentasi">
                    <div class="modal-body">
                        <div class="embed-responsive">
                                <div id="DataPeserta" class="row container ">
                                    <div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
                                        <div class="row">
                                            <div class="col col-lg-12 col-sm-12 col-md-12 col-auto">
                                                <label class="text-dark ">Informasi Dokumentasi</label>
                                                <table class="table table-sm text-black text-left">
                                                <tr><td><small>Event</small></td>
                                                <td> 
                                                    <select class="col-12 border-0 form-control-xm bg-transparent" name="kd_event2" id="kd_event2">
                                                        <option value="">--Pilih--</option>
                                                        <?php foreach ($event_pilihan AS $e){?>
                                                        <option value="<?=$e->kd_event?>"><?=$e->nama_event?></option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td><small>Judul Dokumentasi</small></td><td> 
                                                <textarea id="judul2"  type="text" value="" cols="5" rows="5" name="judul2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent"></textarea>
                                                </td></tr>
                                            <tr><td><small>Status</small></td>
                                                <td>
                                                    <select class="col-12 border-0 form-control-xm bg-transparent" name="status2" id="status2">
                                                        <option value="">--Pilih--</option>
                                                        <option selected value="Aktif">Aktif</option>
                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                    </select>
                                                </td>
                                                </tr>
                                                <tr><td><small>File Foto</small></td>
                                                <td>
                                                            <input id="file_foto2"  type="file" value="" name="file_foto2" placeholder="Tidak Ada Data!"  class=" col-12 border-0 form-control-xm bg-transparent">
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
                        <button class="btn btn-primary" type="submit"  href="#" id="tambah_dokumentasi" >Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

 <div class=" modal fade modal-static" id="ModalHapusDokumentasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa Kamu Menghapus Data Ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                </div>
                <div class="modal-body">
                Judul : <label id="data-judul" for=""></label><br>
                <input type="hidden" id="kd_dokumentasi" value="">
                KLik "Iya" untuk melanjutkan perintah ini ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary text-white" id="iya-hapus">Iya</button>
                </div>
            </div>
        </div>
    </div>


<script>
     $(document).ready(function(){  
          
        show_dokumentasi(); 
         $('#data-dokumentasi').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv', 'excel', 'pdf'
                ]
            } );

             $('#tambah_dokumentasi').submit(function(e){
            e.preventDefault(); 
                  var judul2 = $('#judul2').val();
                  var kd_event2 = $('#kd_event2').val();
                  var status2 = $('#status2').val();
                  var file_foto2 = $('#file_foto2').val();
                //   var password = $('#password2').val();
                if((judul2 == "") || (kd_event2 == "") || (status2 == "") || (file_foto2 == "")){
                    Swal.fire({
                          icon: 'error',
                          title: 'Warning',
                          text: 'Form Data Masih Kosong!!',
                          showConfirmButton: false,
                          timer: 2000
                          })
                }else{
                     $.ajax({
                        url   : '<?=base_url()?>admin/dokumentasi/tambah_dokumentasi',
                        type: "POST",
                        data:new FormData(this),
                        processData:false,
                        contentType:false,
                        cache:false,
                        async:false,
                        success  : function(respons){ 
                            
                          $('#judul2').val("");
                          $('#nama_event2').val("");
                          $('#status2').val("");
                          $('#ModalTambahDokumentasi').modal('hide');
                          Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil Ditambah'
                          });
                          show_dokumentasi();
                        } 
                      })
                    }
				});
            $('#edit_dokumentasi').submit(function(e){
            e.preventDefault(); 
                     $.ajax({
                        url   : '<?=base_url()?>admin/dokumentasi/edit_dokumentasi',
                        type:"POST",
                        data:new FormData(this),
                        processData:false,
                        contentType:false,
                        cache:false,
                        async:false,
                        success  : function(respons){ 
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil Diubah',
                          showConfirmButton: false,
                          timer: 2000
                          })
                          $('#ModalDataDokumentasi').modal('hide');
                            show_dokumentasi();
                        
                        } 
                      })
				});
// detail data dokumentasi
            $('#load-data-dokumentasi').on('click','#detail-dokumentasi',function(){
                var kd_dokumentasi = $(this).attr('data-kode');
                var kd_event = $(this).attr('data-event');
                var nama_event = $(this).attr('data-nama');
                        $('#kd_event').val(kd_event);
                        $('#nama_event').val(nama_event);
                
                    //   console.log(kd_dokumentasi);
                $.ajax({
                    type  : "ajax",
                    method : "POST",
                    url   : '<?=base_url()?>admin/dokumentasi/get_dokumentasi',
                    async : true,
                    data     : { kd_dokumentasi : kd_dokumentasi},
                    dataType : "json",
                    success  : function(hasil){
                      console.log(hasil);
                       for(var i=0; i < hasil.length; i++){
                        $('#kd_dokumentasi').val(hasil[i].kd_dokumentasi);
                        $('#judul').val(hasil[i].judul);
                        $('#kd_event').val(kd_event);
                        $('#nama_event').val(nama_event);
                        $('#status').val(hasil[i].status);
                        var foto2 = document.getElementById("foto_dokumentasi");
                        foto2.setAttribute('src','<?=base_url()?>assets/img/dokumentasi/'+hasil[i].foto);
                       }

                    }
                });
              });
        // modal hapus data dokumentasi 
        $('#load-data-dokumentasi').on('click','#hapus-dokumentasi',function(){
                var kd_dokumentasi = $(this).attr('data-kode');
                var data_judul = $(this).attr('data-judul');
                document.getElementById('data-judul').innerHTML = data_judul;
                $('#kd_dokumentasi').val(kd_dokumentasi);
                // console.log(kd_dokumentasi);
              });
        // hapus data dokumentasi 
$('#ModalHapusDokumentasi').on('click','#iya-hapus',function(){
               var kd_dokumentasi =  $('#kd_dokumentasi').val();
                     $.ajax({
                        url   : '<?=base_url()?>admin/dokumentasi/hapus_dokumentasi',
                        type  : "ajax",
                        method : "POST",
                        data     : { kd_dokumentasi : kd_dokumentasi },
                        success  : function(respons){ 
                            Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: 'Data Berhasil DiHapus',
                          showConfirmButton: false,
                          timer: 2000
                          })
                          $('#ModalHapusDokumentasi').modal('hide');
                           show_dokumentasi();
                           
                        } 
                      })
                       return false;
                       
              });
   
  
    // showLoading();
            // show data dokumentasi
       function show_dokumentasi(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/dokumentasi/load_data_dokumentasi',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    // setting a timeout loading data
                      loadingData();
                },
                success : function(dokumentasi){
                //    console.log(dokumentasi);
                    var html = "";
                    for(var i=0; i < dokumentasi.length; i++){
                        var str = dokumentasi[i].nama_event;
                        var subStrEvent = str.substring(0,15);
                        html += '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+ subStrEvent +'...'+'</td>'+
                                    '<td>'+dokumentasi[i].judul+'</td>'+
                                    '<td>'+dokumentasi[i].status+'</td>'+
                                    '<td><a class=" btn btn-sm btn-primary detail-dokumentasi" id="detail-dokumentasi" data-target="#ModalDataDokumentasi" href="javascript:void(0);" data-toggle="modal"  title="Detail Data" data-kode="'+dokumentasi[i].kd_dokumentasi+'" data-event="'+dokumentasi[i].kd_event+'" data-judul="'+dokumentasi[i].judul+'" data-nama="'+dokumentasi[i].nama_event+'"><span class="fa  fa-user-edit text-white"></span></a>'+' '+
                                    '<a class="btn btn-sm btn-info hapus-dokumentasi" id="hapus-dokumentasi" data-target="#ModalHapusDokumentasi" href="javascript:void(0);" data-toggle="modal" title="Hapus Data"  data-kode="'+dokumentasi[i].kd_dokumentasi+'" data-judul="'+dokumentasi[i].judul+'" ><span class="fa fa-trash text-white"></span></a></td>'+
                                '</tr>';
                    }
                    $('#load-data-dokumentasi').html(html);
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
                    })
         }
       });
</script>
            