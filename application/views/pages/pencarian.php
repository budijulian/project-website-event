

	<!-- Page Content -->
	<div class="container" >
		<div class="mt-5 mb-5 -12 col-sm-12" data-aos="zoom-in">
			<h2 class="my-4 text-center"><span class="fa fa-calendar text-danger"></span> Pencarian Event<br>
            <small class="text-danger">____</small></h3>

			<h4 class="float-center text-dark" for="">Kata kunci  : <?= $_POST['cari']?></h4>
			<br />
			<div class="row" id="load_data">
				<?php foreach($hasil as $h){?>
				<div class="col-lg-4 col-sm-6 portfolio-item animate__animated animate__zoomIn">
                                     <a href='<?=base_url()?>e/<?= $h->url_name?>'>
					<div class="card h-80 shadow shadow-sm">
						<a href="<?=base_url()?>e/<?= $h->url_name?>"><img
								title="<?=$h->nama_event?>" class="card-img-top" height='220px'
								src="<?=base_url()?>assets/img/plamplet/<?=$h->foto?>" alt=""></a>
						<div class="card-body">
							<h4 style='font-size: 18px;' class="card-title"><p><?=$h->nama_event?></p></h4>
							<ul class="list-unstyled" style='font-size: 16px;'>
								<li>
									<h6><span class="badge badge-pill  badge-primary"><?=$h->jenis_tiket?></span>
									<span class='badge badge-pill  badge-info'><?=$h->kategori?></span>
								<?php	if($h->keterangan == "Selesai"){
									echo "<span class='badge badge-pill  badge-success'>Selesai</span>";
									}?>
								</h6>
								</li>
								<li><p><span class="fa fa-calendar"></span> <?=$h->dari_tanggal?></p></li>
								<li><p><span class="fa fa-clock-o"></span> <?=$h->dari_jam?> - <?=$h->sampai_jam?></p></li>
								<li><p><span class="fa fa-map-marker"></span> <?=$h->lokasi?></p></li>
							</ul>
						</div>
					</div>
				</div>
				<?php }?>
				<div class="col-lg-12 col-sm-12 text-center mt-5 mb-5">
					<a href="<?=base_url()?>" class="btn btn-info ">Halaman Depan</a>
				</div>

				<dv class="mt-5 mb-5  " data-aos="zoom-in">
					<h2 class="my-4 text-center"><span class="fa fa-calendar text-danger"></span> Event Terbaru<br>
            		<small class="text-danger">____</small></h3>
					<div class="row" id="show_data_terbaru">
											
						

					</div>
				</div>
		</div>
		<!-- end event terbaru -->

		<div class="row mt-5" id="tentang"></div>
	
		<!-- /.row -->
	</div>
	<!-- /.container -->