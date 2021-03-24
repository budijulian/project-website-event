
 
<header class="border-0" id="hometop" >
  <img style="display: block;position: relative;
		z-index: 1; 
		top: 0px;" src="<?=base_url()?>assets/img/bg-2.jpg" class="embed-responsive" witdh="100%"
			height="400px" alt="">
    <div class="mt-3" >
      <div class="mt-4 text-center  " id="slide-2" >
               <div class=" alert  bg-transparent alert-dismissible   fade show" role="alert" >
                  <marquee class="text-dark"> <small><strong>Info : </strong> Selamat Datang, Website ini dikelola oleh Himpunan Mahasiswa Sistem Informasi Universitas Nasional 
                        untuk menunjang penyelenggaraan event selama periode berlangsung </small></marquee>
                  <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="container">
                  <div class="rounded rounded-lg" style="background: rgb(255,76,56,0.2);
          background: radial-gradient(circle, rgba(255,76,56,0.3) 25%, rgba(244,52,81,0.2) 75%);">
                          <h2 class="text-center "><span class=" mt-3 fa fa-2x fa-calendar text-danger"></h1>
                            <h5 class="mt-2 mb-2  fa-3x font-weight-bolder text-white" style="font-family: Impact, Charcoal, sans-serif">  E v e n t &nbsp; K a m i <br></h5>
                            <h4 class="ml-2 mb-2 text-white font-weight-lighter "> <span class="font-italic" id="typed"></span></h4>
                            <a  href="#events" class="ml-3 mt-4 mb-3 btn btn-outline-primary scroll text-white   border rounded rounded-lg shadow  ">Temukan <span class="fa fa-2x fa-angle-down"></span> </a>
                  </div>
                </div>
          </div> 
       </div>
</header>
  
  <!-- Page Content -->
  <div class="container ">
    <div class="mt-4 mb-3 ">
        <div class="row ">	
        <?php  foreach($t_events AS $te)?>
          <div class="col-6 col-lg-3 col-auto portfolio-item animate__animated animate__zoomIn">
            <div class="card h-80 shadow shadow-sm">
               <div class="card-body row text-center">
                <div class="col-12 col-lg-6 col-sm-12 col-xs-12 col-md-12 col-auto float-left">
                  <h2>
                      <span class=" fa fa-calendar fa-1x text-danger "></span>
                    </h2>
                </div>
                <div class="col-12 col-lg-6 col-sm-12 col-xs-12 col-md-12 col-auto float-left ">
                    <h2 class="text-dark font-weight-bold"> <?= $te->t_event?></h2>
                    <p class=""> Events</p>
                </div>
              </div>
            </div>
          </div>
          
        <?php  foreach($t_ip AS $tip)?>
           <div class="col-6 col-lg-3 col-auto portfolio-item animate__animated animate__zoomIn">
            <div class="card h-80 shadow shadow-sm">
               <div class="card-body row text-center">
                <div class="col-12 col-lg-6 col-sm-12 col-xs-12 col-md-12 col-auto float-left">
                  <h3>
                      <span class=" fa fa-user-circle-o fa-1x text-danger "></span>
                    </h3>
                </div>
                <div class="col-12 col-lg-6 col-sm-12 col-xs-12 col-md-12 col-auto float-left ">
                    <h2 class="text-dark font-weight-bold"> <?=$tip->t_ip?></h2>
                    <p class=""> Visitors</p>
                </div>
              </div>
            </div>
          </div>

        <?php  foreach($t_peserta AS $tp)?>
          <div class="col-6 col-lg-3 col-auto portfolio-item animate__animated animate__zoomIn">
            <div class="card h-80 shadow shadow-sm">
               <div class="card-body row text-center">
                <div class="col-12 col-lg-6 col-sm-12 col-xs-12 col-md-12 col-auto float-left">
                  <h3>
                      <span class=" fa fa-group fa-1x text-danger "></span>
                    </h3>
                </div>
                <div class="col-12 col-lg-6 col-sm-12 col-xs-12 col-md-12 col-auto float-left ">
                    <h2 class="text-dark font-weight-bold"> <?=$tp->t_p?></h2>
                    <p class=""> Participant</p>
                </div>
              </div>
            </div>
          </div>

        <?php  foreach($t_merchandise AS $tm)?>
          <div class="col-6 col-lg-3 col-auto portfolio-item animate__animated animate__zoomIn">
            <div class="card h-80 shadow shadow-sm">
               <div class="card-body row text-center">
                  <div class="col-12 col-lg-5 col-sm-12 col-xs-12 col-md-12 col-auto float-left">
                    <h3>
                        <span class=" fa fa-shopping-bag fa-1x text-danger "></span>
                      </h3>
                  </div>
                  <div class="col-12 col-lg-7 col-sm-12 col-xs-12 col-md-12 col-auto float-left ">
                      <h2 class="text-dark font-weight-bold">  <?=$tm->t_merc?></h2>
                      <p class=""> Merchandise</p>
                  </div>
              </div>
            </div>
          </div>

        </div>
        
    </div>

    <div class="mt-5 mb-5 ">
        <h1 class="my-4 text-center "><span class="fa fa-calendar text-danger"></h1>
        <h3 class=" text-center text-dark"></span> Event Terbaru<br>
          <small class="text-danger">____</small></h3>
         
        <div class="row mt-5" id="show_data_terbaru">
          
        </div>
      </div>
      <hr>
    <!-- end event terbaru -->
    <div class="mt-5 mb-5" id="events">
      <h1 class="my-4 text-center "><span class="fa fa-calendar text-danger"></h1>
        <h3 class=" text-center text-dark"></span> Event Kami<br>
          <small class="text-danger">____</small></h3>
         <!-- <hr class="col-sm-1 col-auto border border-danger mb-2" > -->
        <form class="mt-5 mb-5 row" action="">
          <label class="col-2  col-lg-2 col-sm-3 col-xd-3" for="">Filter </label>
         <select class=" col-4 col-lg-2 col-sm-3 col-xd-3 form-control-sm mr-2" name="kategori" id="kategori">
           <option value="">-- Kategori --</option>
           <option value="Workshop">Workshop</option>
           <option value="Seminar">Seminar</option>
           <option value="E-Sports">E-Sports</option>
           <option value="Forum">Forum</option>
           <option value="Talkshow">Talkshow</option>
           <option value="Pelatihan">Pelatihan</option>
           <option value="Lainnya">Lainnya</option>
         </select>
         <select class=" col-4 col-lg-2 col-sm-3 col-xd-3  form-control-sm mr-2 " name="jenis_tiket" id="jenis_tiket">
          <option value="">-- Events --</option>
           <option value="Berbayar">Event Berbayar</option>
           <option value="Gratis">Event Gratis</option>
         </select>
        </form>

        <div class="row mt-2 " id="show_data">
          <!-- menampilkan data dengan ajax -->
        
        </div>
    </div>
    <!-- /.end daftar event -->
      <hr>
     <!-- end event terbaru -->
    <div class="mt-5 mb-5" id="merchandise">
      <h1 class="my-4 text-center "><span class="fa fa-shopping-bag text-danger"></h1>
        <h3 class=" text-center text-dark"></span> Merchandise<br>
          <small class="text-danger">____</small></h3>
          <!-- <hr class="col-sm-2 col-auto border border-danger mb-4" > -->

        <div class="row mt-5" id="show_data_merchandise">
          
            <!-- data merchandise  -->
        </div>
    </div>
    <!-- /.end daftar event -->

      <hr>
                    <div class="row mt-5" id="QnA">
                        <div class="col col-lg-12 text-center">
                            <div class=" bg-transparent mb-4">
                               <h1 class="my-4 text-center "><span class="fa fa-question-circle text-danger"></h1>
                                  <h3 class=" text-center text-dark"></span> QnA<br>
                                    <small class="text-danger">____</small></h3>
                            </div>
                        </div>
                        <div class="col col-lg-12 card-body bg-white ">
                            <div class="col col-lg-12">
                                <div class="row">
                                    <div class="accordion text-sm-left" id="accordionExample">
                                        <div class="row">
                                            <div class="col-lg-12" id="headingOne">
                                                <a class="font-weight-bold text-dark " type="button" data-toggle="collapse"
                                                        data-target="#satu" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    <h6 class="mb-3 "><span class="fa fa-2x fa-angle-down text-danger"></span>
                                                      <strong>Q:</strong> Bagaimana cara mendaftar event di Website Event Himasi?
                                                </h6> </a>
                                            </div>
        
                                            <div id="satu" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body bg-white">
                                                     <ol class="animate__animated animate__zoomIn">
                                                     <strong>A:</strong>
                                                       <li>Pilih event terlebih dahulu,</li>
                                                       <li>Pilih kategori tiket yang diinginkan,</li>
                                                       <li>Klik tombol Pesan Tiket,</li>
                                                       <li>Masukan data diri dengan benar,</li>
                                                       <li>Untuk Event berbayar silakan upload bukti pembayaran dalam format (jpeg,png),</li>
                                                       <li>Mohon tunggu beberapa saat. Konfirmasi pemesanan akan dikirimkan lewat email. </li>
                                                       <li>Selesai.</li>
                                                     </ol>  
                                                 <div class=" text-center animate__animated animate__zoomIn">
                                                      <small class="fa-3x text-danger col-12">.......</small>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="accordion text-sm-left" id="accordionExample">
                                        <div class="row">
                                            <div class="col-lg-12" id="headingTwo">
                                              <a class="font-weight-bold text-dark" type="button" data-toggle="collapse"
                                                        data-target="#dua" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    <h6 class="mb-3"><span class="fa fa-2x fa-angle-down text-danger"></span>
                                                       <strong>Q:</strong> Apa metode pembayaran yang tersedia di Website Event Himasi?
                                                </h6> </a>
                                            </div>
                                            <div id="dua" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#accordionExample">
                                                <div class="card-body bg-white">
                                                  <p class="animate__animated animate__zoomIn">
                                                   <strong>A:</strong> Kami hanya menerima metode pembayaran transfer bank.
                                                  </p>
                                                  <div class="text-center animate__animated animate__zoomIn">
                                                      <small class="fa-3x text-danger col-12">.......</small>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="accordion text-sm-left" id="accordionExample">
                                        <div class="row">
                                            <div class="col-lg-12" id="headingtree">
                                              <a class="font-weight-bold text-dark" type="button" data-toggle="collapse"
                                                        data-target="#tiga" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    <h6 class="mb-3"><span class="fa fa-2x fa-angle-down text-danger"></span>
                                                        <strong>Q:</strong> Bagaimana cara mendapatkan sertifikat?
                                                </h6> </a>
                                            </div>
        
                                            <div id="tiga" class="collapse" aria-labelledby="headingtree"
                                                data-parent="#accordionExample">
                                                <div class="card-body bg-white">
                                                  <p class="animate__animated animate__zoomIn">
                                                    <strong>A:</strong> Untuk event yang menyediakan e-sertifikat dapat diunduh di halaman event dalam waktu 30 hari setelah acara berlangsung.
                                                  </p>
                                                  <div class="col-12 text-center animate__animated animate__zoomIn">
                                                      <small class="fa-3x text-danger ">.......</small>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="accordion text-sm-left" id="accordionExample">
                                        <div class="row">
                                            <div class="col-lg-12" id="headingtree">
                                              <a class="font-weight-bold text-dark" type="button" data-toggle="collapse"
                                                        data-target="#empat" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    <h6 class="mb-3"><span class="fa fa-2x fa-angle-down text-danger"></span>
                                                       <strong>Q:</strong> Bagaimana saya mendapatkan bukti pemesanan tiket?
                                                </h6> </a>
                                            </div>
        
                                            <div id="empat" class="collapse" aria-labelledby="headingtree"
                                                data-parent="#accordionExample">
                                                <div class="card-body bg-white">
                                                  <p class="animate__animated animate__zoomIn">
                                                   <strong>A:</strong> Bukti pemesanan akan dikirimkan melalui email peserta.
                                                  </p>
                                                  <div class="col-12 text-center animate__animated animate__zoomIn">
                                                      <small class="fa-3x text-danger ">.......</small>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="accordion text-sm-left" id="accordionExample">
                                        <div class="row">
                                            <div class="col-lg-12" id="headingTwo">
                                              <a class="font-weight-bold text-dark" type="button" data-toggle="collapse"
                                                        data-target="#lima" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    <h6 class="mb-3"><span class="fa fa-2x fa-angle-down text-danger"></span>
                                                       <strong>Q:</strong> Apakah ada batas waktu untuk pemesanan atau transaksi di Website Event Himasi?
                                                </h6> </a>
                                            </div>
        
                                            <div id="lima" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#accordionExample">
                                                <div class="card-body bg-white">
                                                  <p class="animate__animated animate__zoomIn">
                                                  <strong>A:</strong> Proses pemesanan tiket di website ini memiliki batas waktu 1 jam per transaksi.
                                                   Jika melewati batas waktu  pemesanan akan dimulai dari awal kembali.
                                                  </p>
                                                  <div class="text-center animate__animated animate__zoomIn">
                                                      <small class="fa-3x text-danger col-12">.......</small>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>


                            </div>
                        </div>
                        
                    </div>

    <!-- /.row -->
    <div class="row mt-5 mb-5">
     <div class="col col-lg-12 text-center" id="kontak">
                            <div class=" bg-transparent">
                              <h1 class="my-4 text-center "><span class="fa fa-phone text-danger"></h1>
        <h3 class=" text-center text-dark"></span> Kontak<br>
          <small class="text-danger">____</small></h3>
                                <!-- <hr class="col-sm-2 col-auto border border-danger mb-4" > -->

                            </div>
                        </div>
      <div class="col-lg-6 mt-2 mb-4 animate__animated animate__zoomIn">
        <p>Tinggalkan Kami Sebuah Pesan</p>
         
          <div class="control-group form-group">
            <div class="controls">
              <label>Email:</label>
              <input id="email" type="email" class="form-control border border-left-0  border-danger border-top-0 border-right-0" id="email" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Pesan:</label>
              <textarea id="pesan" rows="6" cols="100" class="form-control border border-left-0  border-danger border-top-0 border-right-0" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button id="kirim_pesan"  type="submit" class="btn btn-primary" >Kirim Pesan</button>
     
      </div>
      <div class="col-lg-6  mt-5">
        <!-- Embedded Google Map -->
        <iframe class="shadow shadow-sm animate__animated animate__zoomIn" width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
         src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.869713173459!2d106.83717571431083!3d-6.280853663227932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f214e50a570f%3A0x67700098346de1e3!2sUniversitas%20Nasional!5e0!3m2!1sen!2sid!4v1594974757694!5m2!1sen!2sid"></iframe>
      </div>

    </div>
    <!-- /.row -->
  </div>
  
		<!-- type.js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.8/typed.min.js"></script>
  <!-- /.container -->
  <script type="text/javascript">
   new Typed('#typed', {
            strings: ['Seminar','Workshop','Talkshow','Pelatihan','E-Sports','Forum'],
            typeSpeed: 100,
            delaySpeed: 80,
            loop: true
          });
          
         $('.alert').alert("close"); 
  </script>