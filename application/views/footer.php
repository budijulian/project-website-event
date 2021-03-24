
<!-- style="background: linear-gradient(to bottom right, #fa0000, #b00e0e, #f25c00 100%);" -->
 
    <!-- Footer -->
    <footer class="py-5"
        style="background: rgb(128,0,0); margin-top: 120px;
        background: linear-gradient(128deg, rgba(128,0,0,1) 0%, rgba(205,26,7,0.9836309523809523) 50%, rgba(128,0,0,1) 100%);">
        <div class="container">
            <div class="row text-white">
                <div class="col col-12 col-lg-4 text-left">
                    <div class="row">
                        <div class="col-lg-12 text-left">
                            <h4 class="white-text">Informasi</h4>
                            <hr class="border bg-white col-6 text-left mb-4">      
                        </div>
                        <div class="col-lg-12">
                            <h6>
                                <ul class="list-unstyled">
                                    <li><span class="fa fa-envelope mt-2"> </span> himasiunas@gmail.com </li><br>
                                    <li><span class="fa fa-instagram mt-2 "></span> Himasi.unas1949</li><br>
                                    <li><span class="fa fa-university mt-2"></span> Sistem Informasi</li><br>
                                    <li><span class="fa fa-university mt-2"></span> Fakultas Teknologi Komunikasi dan
                                        Informatika</li><br>
                                    <li><span class="fa fa-university mt-2"></span> Universitas Nasional</li><br>
                                </ul>
                            </h6>                    
                        </div>                        
                    </div>
                </div>
                <div class="col col-12 col-lg-4 text-left">
                    <div class="row">
                            <div class="col-lg-12">
                                <h4 class="white-text ">Layanan</h4>
                                <hr class="border bg-white col-6 text-left mb-4">                    
                            </div>
                            <div class="col-lg-12">
                                <h6>
                                   <ul class="list-unstyled">
                                        <li ><a class="text-white mt-2" href="https://himasi.ftki.unas.ac.id/pemilu/"> 
                                        <span class="fa fa-globe"></span> Website Pemilu HIMASI</a></li><br>
                                        <li><a class="text-white mt-2" href="https://himasi.ftki.unas.ac.id/"> <span
                                                    class="fa fa-globe"></span> Website Portal HIMASI</a></li><br>
                                        <li><a class="text-white mt-2" href="http://ftki.unas.ac.id/"> <span
                                                    class="fa fa-globe"></span>
                                                Website FTKI</a></li><br>
                                        <li><a class="text-white mt-2" href="https://www.unas.ac.id/"> <span
                                                    class="fa fa-globe"></span>
                                                Website UNAS</a></li>
                                    </ul>
                                </h6><br><br><br><br>
                            </div>                        
                    </div>
                   
                </div>
                <div class=" col col-12 col-lg-4 text-left">
                    <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <h4 class="text-white" style="margin-bottom: 25px;">Himpunan Mahasiswa Sistem Informasi</h4>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                   <img src="<?=base_url()?>assets/img/logohimasi.png"
                                        class=" position-sticky embed-responsive text-center"
                                        style="width:200px; height:180px; padding-left:25px;" alt="Logo Himasi">
                                    <p class="mt-3">Website ini dikelola oleh Himpunan Mahasiswa Sistem Informasi 
               untuk menunjang penyelenggaraan event dan penjualan merchandise selama periode berlangsung.
                                    </p>
                                    <a href="mailto:himasiunas@gmail.com" target="n_blank" title="Email"><div class="border-white"><span class=" fa-2x fa fa-envelope-o text-white float-left mr-3"></span></div></a> 
                                    <a href="https://lin.ee/S1usGrm" target="n_blank" title="OA Line"><div class="border-white"><span class=" fa-2x fab fa-line text-white float-left mr-3"></span></div></a> 
                                    <a href="https://www.youtube.com/channel/UCdJF12PYit1xneWAge1Mjlg" target="n_blank"  title="Youtube Channel"><div class="border-white"><span class="fa fa-2x fa-youtube text-white float-left mr-3"></span> </div></a> 
                                    <a href="https://www.instagram.com/himasi.unas1949/" target="n_blank"  title="Instagram"><div class="border-white"><span class="fa fa-2x fa-instagram text-white float-left mr-3"></span></div></a> 
                                </div>                        
                        </div>
                    
                </div>
            </div>
            <p class="m-0 mt-3 text-center text-white">Copyright &copy; HIMASI</p>
            <p class="m-0 mb-2 text-center text-white" style="font-size: 13px;">Developed by <a href="#"><span
                    class="text-white" >Divisi Litbang <br> 2020/2021</span></a>
            </p>
        </div>
        <!-- /.container -->
    </footer>
</body>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

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

            // tampil data pertama kali reload
           tampil_event("","");
           tampil_event_terbaru();
           tampil_merchandise();

              tampil_dokumentasi();
			
			 $('#download-sertifikat').click(function(){
               var get_email =  $('#email_terdaftar').val();
               cari_sertifikat(get_email);
			});
			$('#foto_dokumentasi').on('click','#edit_data',function(){
				var fotoname= $(this).attr('data-foto');
				var judulfoto= $(this).attr('data-judul');
				
				$('#ModalDokumentasi').modal('show');
				
				document.getElementById("judul-foto").innerHTML =judulfoto;
				var dfoto = document.getElementById("detail_foto");
				dfoto.setAttribute('src','<?=base_url()?>assets/img/dokumentasi/'+fotoname);
			 });


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
                        if(i % 2 == 0){
                            animate = 'data-aos="fade-right"';
                        }else{
                            animate = 'data-aos="fade-left"';
                        }
                       html += ' <div class="col-lg-4 col-sm-4 portfolio-item " '+animate+'>'+
                         ' <div class="card h-80 shadow shadow-sm">'+
                           '<a href="#"><img class="card-img-top" title="'+hasil[i].nama+'" height="220px" src="<?=base_url()?>assets/img/merchandise/'+hasil[i].foto+'" alt="'+hasil[i].nama+'"></a> '+
                          ' <div class="card-body" > '+
                               ' <h4 style="font-size: 18px;" class="card-title">'+hasil[i].nama+' </h4> '+
                               '  <ul style="font-size: 16px;" class="list-unstyled">'+
                                  ' <li><h6 ><span class="badge badge-pill badge-primary"> '+hasil[i].kategori+'</span>'+
                                ' <span  class="badge badge-pill  badge-info">'+hasil[i].keterangan+'</span></h6></li>'+
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
                          var url_name = hasil[i].url_name;
                          if(i % 2 == 0){
                            animate = "data-aos='fade-right'";
                        }else{
                            animate = "data-aos='fade-left'";
                        }
                              html += "<div class='col-lg-4 col-sm-6 portfolio-item '" +animate+">"+
                              "<div class='card h-80 shadow shadow-sm'>"+
                                     " <a href='<?=base_url()?>e/"+url_name+"'>"+
                                     " <img class='card-img-top' src='<?=base_url()?>assets/img/plamplet/"+hasil[i].foto+"' height='220px' alt=''></a>"+
                                     " <div class='card-body'>"+
                                       " <h4 style='font-size: 18px;' class='card-title'> <p >"+hasil[i].nama_event+"</p></h4>"+
                                         "<ul style='font-size: 16px;' class='list-unstyled'>"+
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
                        html= "<h4 style='font-size: 14px;' class='text-dark ml-3 animate__animated animate__zoomIn'>Event Tidak Ditemukan</h4>";
                      }
                     for(i=0; i<hasil.length; i++){
                        // $hasil_replace = preg_replace("![^a-z0-9]+!i", "-", $hasil);
                        var tanggal = hasil[i].dari_tanggal;
                       // var timestamp=new Date('02/10/2016').getTime();
                      
                       var d = new Date(tanggal);
                        var todate = new Date(tanggal).getDate();
                        var tomonth = new Date().getMonth();
                        var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                        var toyear = new Date(tanggal).getFullYear();
                        var tanggal2 = todate+' '+months[d.getMonth()]+' '+toyear;
                        var status, animate;

                        // kode dari event
                        if(hasil[i].keterangan == "Selesai"){
                          status = "<span class='badge badge-pill  badge-success'>Selesai</span>";
                          }
                          else{status ="";}
                        if(i % 2 == 0){
                            animate = "data-aos='fade-right'";
                        }else{
                            animate = "data-aos='fade-left'";
                        }
                          var url_name = hasil[i].url_name;
                          
                              html += "<div class='col-lg-4 col-sm-6 portfolio-item ' "+animate+" >"+
                              "<div class='card h-80 shadow shadow-sm'>"+
                                     " <a href='<?=base_url()?>e/"+url_name+"'>"+
                                     " <img class='card-img-top' src='<?=base_url()?>assets/img/plamplet/"+hasil[i].foto+"' height='220px' alt=''></a>"+
                                     " <div class='card-body'>"+
                                       " <h4 style='font-size: 18px;' class='card-title'> <p >"+hasil[i].nama_event+"</p></h4>"+
                                         "<ul style='font-size: 16px;' class='list-unstyled'>"+
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

       function cari_sertifikat(get_email){
              var email = get_email;
              $.ajax({
                  url	     : '<?=base_url()?>events/get_sertifikat',
                  type  : "ajax",
                  method : "POST",
                  dataType : "json",
                  data     : {email_peserta : email},
                  success  : function(hasil){
                  //console.log(hasil);
                  var html = "";
                  var i;
                      if(hasil == 0){
                        html += "<tr><td></td><td><p class='text-dark ml-3 animate__animated animate__zoomIn'>Sertifikat anda tidak ditemukan.Silakan hubungi panitia, Terimakasih.</p></td><td></td></tr>";
                      }
                      else{
                        for(i=0; i<hasil.length; i++){
                            html += "<tr> "+
                                    "	<td>"+hasil[i].nomor+"</td> "+
                                    "	<td>"+hasil[i].nama_lengkap+"</td> "+
                                    " <td><a target='_blank' class='text-danger list-unstyled' href='"+hasil[i].link_sertifikat+"'>Download</a></td> "+
                                    " </tr>";
                          }
                      }
                      $("#data_sertifikat").html(html); 
                    }
                });
            }
			function tampil_dokumentasi(){
              $.ajax({
                  url	     : '<?=base_url()?>events/get_dokumentasi',
                  type     : 'POST',
                  async    : false,
                  dataType : "json",
                  success  : function(hasil){
                 // console.log(hasil);
                  var html = "";
                  var i;
                  if(hasil <= 0){
                  	html= "<p style='font-size: 14px;' class='text-dark ml-3 animate__animated animate__zoomIn'>Dokumentasi belum ada.</p>";
                  }
                  else{
                  	for(i=0; i<hasil.length; i++){
                  			html += "<div class='col-sm-6 mt-2 mb-2'  >"+
                  					"<a data-toggle='modal' title='"+hasil[i].judul+"' data-judul='"+hasil[i].judul+"' data-foto='"+hasil[i].foto+"' data-target='#ModalDokumentasi' id='edit_data' href='javascript:void(0);'><img src='<?=base_url()?>assets/img/dokumentasi/"+hasil[i].foto+"' "+
                            " class='img-thumbnail animate__animated animate__zoomIn'  witdh='100px' height='100px'> "+
                  					"</a></div>";
                  		}
                      
                  }
                  $("#foto_dokumentasi").html(html); 
                }
                });
            }     
        
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

        
			
       });
          </script> 
    


</html>