
<!-- style="background: linear-gradient(to bottom right, #fa0000, #b00e0e, #f25c00 100%);" -->
  <!-- Footer -->
  <footer class="py-5" style="background: rgb(128,0,0);
background: linear-gradient(128deg, rgba(128,0,0,1) 0%, rgba(205,26,7,0.9836309523809523) 50%, rgba(246,75,2,1) 100%);">
    <div class="container">
      <div class="row text-white">
        
        <div class="col-lg-4 text-left">
          <h4 class="white-text ">Kontak</h4>
          <hr class="border bg-white  col-lg-4 w-auto">
          <div class="float-left">
              <p>
                  <ul class="list-unstyled">
                    <li><span class="fa fa-envelope"> </span> himasiunas@gmail.com </li><br>
                    <li><span class="fa fa-instagram"></span>  Himasi.unas1949</li><br>
                    <li><span class="fa fa-university"></span>  Sistem Informasi</li><br>
                    <li><span class="fa fa-university"></span>  Fakultas Teknologi Komunikasi dan Informatika</li><br>
                    <li><span class="fa fa-university"></span>  Universitas Nasional</li><br>
                  </ul>
                  </p>
            </div>
        </div>
        <div class="col-lg-4">
          <h4 class="white-text ">Layanan</h4>
               <hr class="border bg-white col-lg-4 w-auto">
         <div class="float-left">
              <p >
                  <ul class="list-unstyled">
                   <li ><a class="text-white" href="https://himasi.ftki.unas.ac.id/pemilu/"> <span class="fa fa-globe"></span> Website Pemilu HIMASI</a></li><br>
                  <li ><a class="text-white" href="https://himasi.ftki.unas.ac.id/"> <span class="fa fa-globe"></span> Website Portal HIMASI</a></li><br>
                  <li ><a class="text-white" href="http://ftki.unas.ac.id/"> <span class="fa fa-globe"></span> Website FTKI</a></li><br>
                  <li ><a class="text-white" href="https://www.unas.ac.id/"> <span class="fa fa-globe"></span> Website UNAS</a></li><br>
                  
                </ul>
                  </p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-auto text-left">
           <img src="<?=base_url()?>assets/img/logohimasi.png" class=" position-sticky embed-responsive col-lg-6 col-sm-4 col-md-4 col-auto"
               alt="Logo Himasi">
               <p class="mt-3">Website ini dikelola oleh Himpunan Mahasiswa Sistem Informasi 
               untuk menunjang penyelenggaraan event dan penjualan merchandise selama periode berlangsung.</p>
              <a href="mailto:himasiunas@gmail.com" target="n_blank" title="Email"><div class="border-white"><span class=" fa-2x fa fa-envelope-o text-white float-left mr-3"></span></div></a> 
              <a href="https://lin.ee/S1usGrm" target="n_blank" title="OA Line"><div class="border-white"><span class=" fa-2x fab fa-line text-white float-left mr-3"></span></div></a> 
              <a href="https://www.youtube.com/channel/UCdJF12PYit1xneWAge1Mjlg" target="n_blank"  title="Youtube Channel"><div class="border-white"><span class="fa fa-2x fa-youtube text-white float-left mr-3"></span> </div></a> 
              <a href="https://www.instagram.com/himasi.unas1949/" target="n_blank"  title="Instagram"><div class="border-white"><span class="fa fa-2x fa-instagram text-white float-left mr-3"></span></div></a> 
              
            </div>
         
        </div>
      <p class="m-0 mt-5 text-center text-white">Copyright &copy; <?= date('Y')?></p>
      <p class="m-0 mb-3 text-center text-white">developer by <a href="#"><span class="text-white">Litbang Himasi</span></a></p>
    </div>
    <!-- /.container -->
  </footer>
  
</body>


<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links
        $(".scroll").on('click', function (event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $jarak = 100;
                $('html, body').animate({
                        scrollTop: $(hash).offset().top - $jarak,
                        scrollDown: $(hash).offset().top + $jarak
                    },800,
                    function () {
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
            } // End if
        });
        
    });
</script>

  <script type="text/javascript">
  
		$(document).ready(function(){
      
            // tampil data pertama kali reload
            var kategori=   $('#kategori').val();
            var jenis_tiket=   $('#jenis_tiket').val();
           tampil_event(kategori,jenis_tiket);
           tampil_event_terbaru();
           tampil_merchandise();
           
           


            $('#jenis_tiket').change(function(){
              var kategori=   $('#kategori').val();
              var jenis_tiket=   $('#jenis_tiket').val();
               tampil_event(kategori,jenis_tiket);
            });

              $('#kategori').change(function(){
                var kategori=   $('#kategori').val();
                var jenis_tiket=   $('#jenis_tiket').val();
                tampil_event(kategori,jenis_tiket);
            });
            $('#kirim_pesan').click(function(){
              var email =  $('#email').val();
              var pesan =  $('#pesan').val();
              if((pesan =="") || (email == "")){
                // pesan alert 
                      Swal.fire({
                      position: 'top-end',
                      icon: 'error',
                      title: 'Email atau Pesan tidak boleh kosong.Terimakasih',
                      showConfirmButton: false,
                      timer: 1500
                      })
              }else if((pesan !="") && (email != "")){
                $.ajax({
                    url	     : '<?=base_url()?>user/set_pesan',
                    type  : "ajax",
                    method : "POST",
                    data     : {email : email, pesan : pesan},
                    success  : function(respons){ 
                      $('#email').val("");
                      $('#pesan').val("");
                      // pesan alert 
                      Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Pesan berhasil terkirim. Terimakasih atas masukannya:)',
                      showConfirmButton: false,
                      timer: 1500
                    })
                      }
                  });
              }
            });
            

            function tampil_merchandise(){
               $.ajax({
                type  : "ajax",
                method : "POST",
                url   : "<?= base_url()?>get_merchandise",
                async : false,
                dataType : "json",
                    success : function(hasil) {
                     // console.log(hasil);
                    var html = "";
                    var i,kode;
                     for(i=0; i<hasil.length; i++){
                       html += ' <div class="col-lg-4 col-sm-4 portfolio-item animate__animated animate__zoomIn">'+
                         ' <div class="card h-80 shadow shadow-sm">'+
                           '<a href="#"><img class="card-img-top" title="'+hasil[i].nama+'" height="220px" src="<?=base_url()?>assets/img/merchandise/'+hasil[i].foto+'" alt="'+hasil[i].nama+'"></a> '+
                          ' <div class="card-body" > '+
                               ' <h4 class="card-title">'+hasil[i].nama+' </h4> '+
                               '  <ul class="list-unstyled">'+
                                  ' <li><h6 ><span class="badge badge-pill badge-primary"> '+hasil[i].kategori+'</span>'+
                                ' <span  class="badge badge-pill  badge-success"> Masih tersedia</span></h6></li>'+
                                  ' <li><p><span class="fa fa-money-bill-alt"></span> Harga : '+hasil[i].harga+'</p></li>'+
                                  ' <li><p><span class=""></span> Diskripsi : '+hasil[i].diskripsi+'</p></li>'+
                                  ' <li class="text-right">'+
                                   '  <a target="n_blank" href="https://api.whatsapp.com/send?phone='+hasil[i].kontak+'&text=HALO HIMASI,Saya ingin memesan '+hasil[i].nama+'">'+
                              ' <button class="btn btn-success"><span class="fa fa-whatsapp"></span> Pesan </button></a>'+
                                 '  </li></ul>  </div> </div></div>';
                        } 
                      $("#show_data_merchandise").html(html); 
                    }
                })
            }

        
            function tampil_event_terbaru(){
               $.ajax({
                type  : "ajax",
                method : "POST",
                url   : "<?= base_url()?>get_event_terbaru",
                async : false,
                dataType : "json",
                    success : function(hasil) {
                     // console.log(hasil);
                    var html = "";
                    var i,kode;
                     for(i=0; i<hasil.length; i++){
                        // $hasil_replace = preg_replace("![^a-z0-9]+!i", "-", $hasil);
                        var tanggal = hasil[i].dari_tanggal;
                       // var timestamp=new Date('02/10/2016').getTime();
                       var d = new Date(tanggal);
                        var todate=new Date(tanggal).getDate();
                        var tomonth=new Date(tanggal).getMonth();
                        var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                        var toyear=new Date(tanggal).getFullYear();
                        var tanggal = todate+' '+months[d.getMonth()]+' '+toyear;
                        var status;
                        // kode dari event
                        if(hasil[i].keterangan == "Selesai"){
                          status = "<span class='badge badge-pill  badge-success'>Selesai</span>";
                          }
                          else{status ="";}
                            var kd_event = btoa(hasil[i].kd_event);
                              html += "<div class='col-lg-4 col-sm-6 portfolio-item animate__animated animate__zoomIn'>"+
                              "<div class='card h-80 shadow shadow-sm'>"+
                                     " <a href='<?=base_url()?>detail?q="+kd_event+"'>"+
                                     " <img class='card-img-top' src='<?=base_url()?>assets/img/plamplet/"+hasil[i].foto+"' height='220px' alt=''></a>"+
                                     " <div class='card-body'>"+
                                       " <h4 class='card-title'> <p >"+hasil[i].nama_event+"</p></h4>"+
                                         "<ul class='list-unstyled'>"+
                                         " <li> <h6><span class='badge badge-pill  badge-primary'>"+hasil[i].jenis_tiket+"</span>"+
                                          "  <span class='badge badge-pill  badge-info'>"+hasil[i].kategori+"</span> "+ 
                                          status+ "</h6></li>"+
                                          "  <li><p><span class='fa fa-calendar'></span> "+tanggal+"</p></li> "+
                                           " <li><p><span class='fa fa-clock-o'></span> "+hasil[i].dari_jam+' WIB'+"</p></li>"+
                                           " <li><p><span class='fa fa-map-marker'></span> "+hasil[i].lokasi+"</p></li>"+
                                          "</ul>"+
                                         " </div></div></div>";
                                  } 
                                   $("#show_data_terbaru").html(html); 
                    }
                })
            }

            //Menampilkan Data di tabel
            function tampil_event(kategori,jenis_tiket){
              var kategori = kategori;
              var jenis_tiket = jenis_tiket;
             // var link;
               $.ajax({
                type  : "ajax",
                method : "POST",
                url   : "<?= base_url()?>get_event",
                async : false,
                data  :{kategori : kategori,jenis_tiket : jenis_tiket},
                dataType : "json",
                    success : function(hasil) {
                     // console.log(hasil);
                    var html = "";
                    var i,kode;
                    if(hasil <= 0){
                        html= "<h4 class='text-dark ml-3 animate__animated animate__zoomIn'>Event Tidak Ditemukan</h4>";
                      }
                     for(i=0; i<hasil.length; i++){
                        // $hasil_replace = preg_replace("![^a-z0-9]+!i", "-", $hasil);
                        var tanggal = hasil[i].dari_tanggal;
                       // var timestamp=new Date('02/10/2016').getTime();
                      
                       var d = new Date(tanggal);
                        var todate = new Date(tanggal).getDate();
                        var tomonth = new Date().getMonth();
                        var months = ["Januari", "Februari", "Maret", "April", "Mai", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                        var toyear = new Date().getFullYear();
                        var tanggal2 = todate+' '+months[d.getMonth()]+' '+toyear;
                        var status;

                        // kode dari event
                        if(hasil[i].keterangan == "Selesai"){
                          status = "<span class='badge badge-pill  badge-success'>Selesai</span>";
                          }
                          else{status ="";}
                            var kd_event = btoa(hasil[i].kd_event);
                              html += "<div class='col-lg-4 col-sm-6 portfolio-item animate__animated animate__zoomIn'>"+
                              "<div class='card h-80 shadow shadow-sm'>"+
                                     " <a href='<?=base_url()?>detail?q="+kd_event+"'>"+
                                     " <img class='card-img-top' src='<?=base_url()?>assets/img/plamplet/"+hasil[i].foto+"' height='220px' alt=''></a>"+
                                     " <div class='card-body'>"+
                                       " <h4 class='card-title'> <p >"+hasil[i].nama_event+"</p></h4>"+
                                         "<ul class='list-unstyled'>"+
                                         " <li> <h6><span class='badge badge-pill  badge-primary'>"+hasil[i].jenis_tiket+"</span>"+
                                          "  <span class='badge badge-pill  badge-info'>"+hasil[i].kategori+"</span> "+ 
                                          status+ "</h6></li>"+
                                          "  <li><p><span class='fa fa-calendar'></span> "+tanggal2+"</p></li> "+
                                           " <li><p><span class='fa fa-clock-o'></span> "+hasil[i].dari_jam+' WIB'+"</p></li>"+
                                           " <li><p><span class='fa fa-map-marker'></span> "+hasil[i].lokasi+"</p></li>"+
                                          "</ul>"+
                                         " </div></div></div>";
                                  } 
                                   $("#show_data").html(html); 
                    }
                })
            }


         });

         //ketika di scroll muncul icon scroll ke atas
        $(window).scroll(function () {
              var totalHeight = $(window).scrollTop();
              if (totalHeight > 300) {
                  $(".scrolltotop").fadeIn();
              } else {
                  $(".scrolltotop").fadeOut();
              }
               
          });
      
      //proses scroll
          $('a.scrolltotop').on('click', function (event) {
              $([document.documentElement, document.body]).animate({
                  scrollTop: $("#hometop").offset().top
                }, 800);
          });
      
          </script> 
          <!-- absen pada formkehadiran -->
    

</html>