<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Dashboard | SMK 2 Palembang</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=base_url()?>assets/css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg shadow-lg bg-white fixed-top">
    <div class="container">
    <img src="<?=base_url()?>assets/img/logo.png"  witdh="40px" height="40px" alt="">
      <a class="navbar-brand" href="<?=base_url()?>"> PSB Online SMK 2 Palembang</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="">Home</a>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Bantuan
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="#pesan">Pesan</a>
              <a class="dropdown-item" href="#tentang">Tentang</a>
              
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Hello Budi!
            </a>
            <div class="dropdown-menu dropdown-menu-right row" aria-labelledby="navbarDropdownBlog">
             <a class="dropdown-item" href="<?=base_url()?>user/dataakun">Akun</a>
                <div class="col-lg-12 form-group">
                  <button class="col-lg-8 btn btn-small btn-danger" type="button" name="keluar" id="keluar">Keluar</button>
                </div>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('<?=base_url()?>assets/img/halamanutama1.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>WELCOME TO SMK N 2 PALEMBANG</h3>
            <p>Berintegritas, Bersatu dan Berprestasi.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('<?=base_url()?>assets/img/halamanutama2.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Penerimaan Siswa Baru Tahun Ajaran 2020/2021</h3>
            <p>Dibuka mulai tanggal 1 Juli 2020.</p>
          </div>
        </div>
      
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h2 class="my-4">Penerimaan Siswa Baru SMK N 4 Palembang</h2>

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header"><span class="badge  badge-success">1</span> Mengisi Data Diri </h4>
          <div class="card-body">
            <p class="card-text">Calon siswa baru diwajibkan melengkapi data diri terlebih dahulu, sebelum mengupload berkas administrasi.</p>
           </div>
          <div class="card-footer">
            <a href="#" class="btn btn-info text-left float-left">Lanjut</a>
            <h5><span class="badge badge-success text-right float-right">Berhasil</span></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header"> <span class="badge badge-success">2</span> Upload Berkas</h4>
          <div class="card-body">
            <p class="card-text">
              Berkas harus diupload dalam format PDF.
          </p>
          </div>
          <div class="card-footer">
           <a href="#" class="btn btn-info text-left float-left">Lanjut</a>
            <h5><span class="badge badge-success text-right float-right">Berhasil</span></h5>
          </div>
        </div>
      </div>
       <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header"><span class="badge  badge-success">3</span> Pilih Jurusan</h4>
          <div class="card-body">
            <p class="card-text">Calon siswa baru hanya diperbolehkan memilih 2 jurusan, dimana pilihan pertama adalah pilihan utama dan pilihan kedua adalah cadangan.</p>
          </div>
          <div class="card-footer">
           <a href="#" class="btn btn-info text-left float-left">Lanjut</a>
            <h5><span class="badge badge-success text-right float-right">Berhasil</span></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header"> <span class="badge  badge-success">4</span> Cetak Data</h4>
          <div class="card-body">
            <p class="card-text">Cetak Data Pendaftaran Siswa Baru.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-danger">Cetak Sekarang</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header"> <span class="badge  badge-success">5</span> Hasil Seleksi</h4>
          <div class="card-body">
            <p class="card-text">Hasil Seleksi Akan diumumkan pada tanggal 1 Agustus 2020 pada pukul 12:00 WIB.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-danger">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <h2>Jurusan Kami</h2>

    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="<?=base_url()?>assets/img/akutansi.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p >Akutansi</p>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="<?=base_url()?>assets/img/rpl.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
               <p >Rekayasa Perangkat Lunak</p>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="<?=base_url()?>assets/img/pariwisata.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
               <p >Pariwisata</p>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
          </div>
        </div>
      </div>
     
    </div>
    <!-- /.row -->
    <div class=' row mt-5' id='tentang'></div>
    <!-- Features Section -->
    <div class="row mt-5">
      <div class="col-lg-6">
        <h2>VISI MISI</h2>
        <p>SMK N 4 Palembang</p>
        <ul class="list-unstyled">
          <li>
            <strong>Visi</strong>
          </li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        <ul class="list-unstyled" >
          <li>
            <strong>MISI</strong>
          </li>
        </ul>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
       
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" witdh="200px" height="200px" src="<?=base_url()?>assets/img/logo.png" alt="">
      </div>
    </div>
    <!-- /.row -->

    <hr id="pesan">
    <!-- /.row -->
    <div class=' row mt-5'></div>
    <div class="row">
      <div class="col-lg-6 mb-4">
        <h3>Tinggalkan Kami Sebuah Pesan</h3>
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group form-group">
            <div class="controls">
              <label>Nama:</label>
              <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>No HP:</label>
              <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email:</label>
              <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Pesan:</label>
              <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Kirim Pesan</button>
        </form>
      </div>
      <div class="col-lg-6 mb-4">
        <!-- Embedded Google Map -->
        <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
      </div>

    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
    <div class="row text-white">
				<div class="col-lg-12">
					<h5 class="white-text">Kontak</h5>
					<hr>
					<div class="col-lg-6 ">
						<img width="150px" heiht="150px" class="responsive-img "
							src="<?=base_url()?>assets/img/logo.png" alt="">
					</div>
					<div class="col-lg-6">
						<ul class="list-unstyled">
							<li>smaknegeri4@gmail.com </li>
							<li>088-8210-9521</li>
              <li> SMK N 4 Palembang</li>
              <li>Jalan Kenangan no 3 RT 02 RW 10 Kel.Rambutan Kec.Ciracas Jakarta Selatan</li>
                  <!-- <li><a class="white-text" href="#!">
									088-8210-9521</a></li> -->
						</ul>
					</div>

				</div>
			</div>
      <p class="m-0 text-center text-white">Copyright &copy; 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
