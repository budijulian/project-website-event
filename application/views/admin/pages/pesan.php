
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Pesan</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kirim Pesan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-lg-8 col-sm-12 col-12">   
                                    <div class="form-group">
                                        <label class="text-dark py-3 col-4" for="">Email Peserta</label>
                                        <input id="email_pesan" text="email_pesan" required class=" form-control-sm col-6 text-dark py-3 ml-2" for=""></input>
                                
                                        <label class="text-dark py-3 col-4" for="">Subjek</label>
                                        <input id="subjek_pesan" text="subjek_pesan" required class=" form-control-sm col-6 text-dark py-3 ml-2" for=""></input>
                                    </div>
                                 </div>
                                <div class="col col-lg-4 col-sm-12 col-12">
                                   <span class="fa fa-question-circle mb-2"></span>
                                     <div class="form-group">
                                       <button id="kirim_pesan" class="btn btn-outline-success" type="submit"><span class="fa fa-send-o"></span> Kirim Pesan</button>
                                     </div> 
                                </div>
                                <div class="col col-lg-12 col-sm-12 col-12">
                                <small>Text Body</small>
                                <textarea class="form-control-plaintext col-12" value="" name="text_pesan" id="text_pesan"></textarea>
                                </div>

                        
                         </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->
<!-- ckeditor  -->
 <script>
 
   CKEDITOR.replace( 'text_pesan' , {
       
      uiColor: '#CCEAEE',
      width: '100%',
      height: 300
    });
   
</script>

<script>
               $('#kirim_pesan').click(function(){
                     var email_pesan =  $('#email_pesan').val();
                      var subjek_pesan =  $('#subjek_pesan').val();
                      var text_pesan  = CKEDITOR.instances['text_pesan'].getData();
                       
                        // console.log(email_pesan);
                        // console.log(subjek_pesan);
                        // console.log(text_pesan);
                    if(email_pesan == "" && subjek_pesan == ""){
                         Swal.fire({
                          icon: 'warning',
                          title: 'Oops',
                          text: 'Email/ Subjek kosong. .'
                          })
                    }else{
                       $.ajax({
                        url	 : '<?=base_url()?>admin/pesan/send',
                        type  : "ajax",
                        method : "POST",
                        data     : {
                            email_pesan : email_pesan, subjek_pesan : subjek_pesan,
                            text_pesan : text_pesan 
                        },
                        success  : function(respons){ 
                              Swal.fire({
                          icon: 'success',
                          title: 'Send',
                          text: 'Pesan Terkirim.'
                          })
                        } 
                      })
                      }
                    });
</script>