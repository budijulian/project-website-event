
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Event</li>
                        </ol>
                    </nav>
                    <!-- test loading  -->
                <div class="spinner" style="display:none">
                    <img id="img-spinner" src="<?=base_url()?>assets/img/loading.gif" >
                </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Events</h6>
                        </div>
                        <div class="card-body">
                                <div class="mb-4 ">
                                <div class="table-responsive">
                                    <table style="font-size:14px;" id="data-event" class="table table-sm table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Event</th>
                                                <th>Kategori</th>
                                                <!-- <th>Penanggung Jawab</th> -->
                                                <th>Jadwal</th>
                                                <th>Jenis Event</th>
                                                <th>Status</th>
                                                <th> Pilihan&nbsp;Tindakan </th>
                                            </tr>
                                        </thead>
                                        <tbody id="load-data">

                                        </tbody>
                                    </table>
                            </div> </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

<script>
var table;
    $(document).ready(function(){

        table = $('#data-event').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('admin/events/load_data_event')?>",
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
    //   show_events(); //call function show all events  
      
     
        // atur status data event      
               $('#load-data').on('click','#atur-event',function(){    
                //    ambil data 
                    var kd_event = $(this).attr('data-kode');
                    var status = $(this).attr('data-status');
                    if(status == "Selesai"){
                        status ="Segera";
                    }else if(status == "Segera"){
                        status ="Buka";
                    }else if(status =="Buka"){
                        status ="Selesai";
                    }
                    // alert(status);
                    $.ajax({
                        url	 : '<?=base_url()?>admin/events/gantistatus',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            kd_event : kd_event, status : status 
                        },
                        success  : function(respons){ 
                           Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Status Berubah',
                            showConfirmButton: false,
                            timer: 1500})
                            refreshData();
                             
                        //    alert(status);
                        } 
                      })
               });
    
</script>

