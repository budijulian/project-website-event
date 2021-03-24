
<?php foreach($event as $e)?>
	
	<div class="fixed-bottom" style=" background-color:	rgb(220,220,220,0.8)">
		<div class="container">
			<div class="row border-0 mt-1 mb-1">
				<div class=" col-lg-8 col-sm-12 col-md-8 text-left">
					<h6 class="font-weight-bolder"> <span
							class="fa fa-calendar-check-o  fa-2x fa-sm auto w-auto h-auto fa-auto"
							style="color:rgb(200, 0, 0);"></span> <?=$e->nama_event?> </h6>
				</div>
				<div class=" col-lg-1 col-sm-12 col-md-4 mt-1 mb-1 text-right ">
					<h4 id="totalbayar" class="text-dark  font-weight-bold  h-auto w-auto">
                    </h4>
				</div>
				<div class="col-lg-3 col-sm-12 col-md-12 mt-1 mb-1 text-white text-center ">
					<a title="Pesan Tiket" onclick="pesan();" class="btn btn-xm btn-danger col-12 col-lg-8"
						style="background-color:rgb(200, 0, 0);">
						<strong><span class="fa fa-shopping-cart"></span>&nbsp;Pesan Tiket </strong></a>
				</div>
			</div>
		</div>
	</div>

	
	<header class="row border-0">
		<img id="header-img" src="<?=base_url()?>assets/img/plamplet/<?=$e->foto?>" class="embed-responsive" witdh="100%"
			height="350px" alt="">
	</header>
	<!-- Page Content -->
	<div class="container">
		<div class="row mb-3 ">
			<div class="col-lg-1"></div>
			<div id="header-body" class="card col-lg-10 mt-2 mb-5 shadow-lg animate__animated animate__slideInUp">
				<div class="card-body">
					<h4 class="text-dark text-center font-weight-bold"> <?=$e->nama_event?></h4>
					<hr class="mb-4 text-center border-danger">
					<div class="row">
						<div class="col-sm-6">
 						<a href="<?=base_url()?>assets/img/plamplet/<?=$e->foto?>" title=" <?=$e->nama_event?>" class="MagicZoom" rel="zoom-id:zoom;opacity-reverse:true; ">
							<img src="<?=base_url()?>assets/img/plamplet/<?=$e->foto?>" class="embed-responsive rounded"
								witdh="100%" height="350px" alt="">
						</a>
						</div>
						<div class="col-sm-6">
							<table style="font-size: 14px;">

								<tr >
									<td>
										<p class="mt-1 font-weight-bold">Diselenggarakan oleh</p>
									</td>
								<tr>
									<td> 
										<p><?=$e->penyelenggara?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p class="font-weight-bold">Tanggal & Waktu</p>
									</td>
								<tr>
									<td>
										<p><span class="fa fa-calendar"></span>
										<?php $bulan = array (1 =>   'Januari',
													'Februari',
													'Maret',
													'April',
													'Mei',
													'Juni',
													'Juli',
													'Agustus',
													'September',
													'Oktober',
													'November',
													'Desember'
												);
												$split = explode('-', $e->dari_tanggal);
												$dari_tanggal =  $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
												
												$split = explode('-', $e->sampai_tanggal);
												$sampai_tanggal =  $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
												
												echo $dari_tanggal." - ".$sampai_tanggal?></p>

										<p><span class="fa fa-clock-o"></span> <?=$e->dari_jam.' - '.$e->sampai_jam.' WIB';?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p class="font-weight-bold">Lokasi</p>
									</td>
								<tr>
									<td>
										<p><span class="fa fa-map-marker"></span>  <?=$e->lokasi?>
										</p>
									</td>
								</tr>
								<tr?>
									<td>
										<p class="font-weight-bold">Kategori
											<span class="badge badge-pill badge-primary"> <?=$e->kategori?></span>
											</p>
									</td>
								</tr>
								<tr>
									<td>
										<p class="font-weight-bold">Status
											
											<?php if($e->keterangan == "Selesai"){
												echo "<span id='status_event' class=' badge badge-pill badge-success'>Selesai</span>";
												}else if($e->keterangan == "Buka"){
												    echo "<span id='status_event' class=' badge badge-pill badge-primary'>Buka</span>";
												}
												else if($e->keterangan == "Segera"){
												    echo "<span id='status_event' class=' badge badge-pill badge-info'>Segera</span>";
												}
												?>
											</p>
									</td>
								</tr>
								
								<tr>
									<td>
										<p class="font-weight-bold">Kuota
												<?php if($this->session->userdata('status_slot') != null){
													echo $this->session->userdata('status_slot');
												}?>
											</p>
									</td>
								</tr>
								<tr>
									<td><p class="font-weight-bold">Share 
										<a class="font-weight-bold" target="n_blank" href="https://wa.me://send?text=<?=base_url().'e/'.$e->nama_event?>" style="color:black;"> 
										<span style="color:#067120;" class="fa fa-2x fa-whatsapp"></span>
											</a>	</p>
									</td>
								</tr>
							</table>

						</div>

						<div class="col-lg-12 mt-3">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs border-danger">
								<li class="nav-item ">
									<a class="nav-link active font-weight-bold text-dark" data-toggle="tab" href="#home">Deskripsi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link font-weight-bold text-dark" data-toggle="tab" href="#kategoritiket">Kategori Tiket</a>
								</li>
								<li class="nav-item">
									<a class="nav-link font-weight-bold text-dark " data-toggle="tab" href="#dokumentasi">Dokumentasi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link font-weight-bold text-dark " data-toggle="tab" href="#sertifikat">Sertifikat</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content animate__animated animate__fadeIn">
								<div id="home" class="container tab-pane active border "><br>
									<tabel style="font-size: 14px;">
										<tr>
											<!-- <td>
												<p class="font-weight-bold mt-2">Diskripsi</p>
											</td> -->
										</tr>
										<tr>
											<td> <?=$e->diskripsi?>
											</td>
										</tr>
										<tr>
											<td>
												<p class="font-weight-bold mt-3">Persyaratan & Ketentuan</p>
											</td>
										</tr>
										<tr>
											<td> <?=$e->ketentuan?>
												
									</tabel>
								</div>
								<div id="kategoritiket" class="container tab-pane fade border"><br>
									<div class="row">
										<?php if(count($tiket) =="0"){ 
											echo '<div class="col-12 col-lg-6 col-sm-6 col-md-12 w-auto mt-2 mb-2 ">';
											echo "<p  style='font-size: 14px;' class='text-dark animate__animated animate__zoomIn'>Tiket belum ada.</p>";
											echo "</div>";
										}else{
											foreach($tiket as $t){?>
												<div class="col-12 col-lg-6 col-sm-6 col-md-12 w-auto mt-2 mb-2 "  style="font-size: 14px;">
													<h5 style="font-size: 18px;" >Tiket <?=$t->jenis_tiket?>
													<?php if($t->status_slot_tiket == 'Penuh'){
																echo "<small><span  style='font-size: 12px;' class='badge badge-pill badge-danger'> Sold Out*</span></small>";
															}?>
													</h5>
													<small><?php
													if($t->jenis_tiket =='Reguler'){
														echo "Tiket reguler tersedia.";
													}elseif($t->jenis_tiket =='Mahasiswa'){
														echo "Tiket ini hanya tersedia untuk mahasiswa.";
													}elseif($t->jenis_tiket =='UNAS'){
														echo "Tiket ini hanya tersedia untuk mahasiswa UNAS.";
													}elseif($t->jenis_tiket =='Umum'){
														echo 'Tiket ini hanya tersedia untuk umum.';
													}elseif($t->jenis_tiket =='Gratis'){
														echo 'Tiket gratis tersedia.';
													}elseif($t->jenis_tiket =='OTS'){
														echo 'Tiket ini hanya tersedia di hari H acara.';
													}
													else{
														echo 'Tiket ini tersedia.';
													}?>
													</small>
												</div>
												<div class="col-4 col-lg-3 col-sm-3 col-md-6 mt-2 mb-2 ">
													<input type="radio" name="kategoritiket"  style="font-size: 14px;"
													<?php if($this->session->userdata('text_slot') == "Penuh")
													{
														echo "disabled= true";
													}
															else if($t->status_slot_tiket == 'Penuh'){
																echo "disabled = true";
															}
													else{}?> 
													id="radio_tiket" value="<?=$t->kd_tiket?>" 
													class="form-control-sm col-6">
												</div>
												<div class="col-8 col-lg-3 col-sm-3 col-md-6 w-auto mt-2 mb-2 text-right">
												<input  type="hidden" required name="jumlah" id="jumlah" value="<?=$t->jumlah?>">
													<h2 style="font-size: 22px;" class="font-weight-bold"><span
															class="border badge badge-pill badge-light">RP. <?=$t->jumlah?></span>
													</h2>
												</div>
												<hr>
										<?php }
										}?>
									</div>
								</div>
								<div id="dokumentasi" class="container tab-pane  fade border"><br>
									<div class="row" id="foto_dokumentasi" >
										
									</div>
								</div>
								<div id="sertifikat" class="container tab-pane fade border"><br>
									<div class="row">
										<div class="form-group col-12 col-lg-2 col-sm-12 col-md-12 mt-2 ">
											<label style="font-size:14px;" for="" >Email Terdaftar</label>
										</div>
										<div class="form-group col-12 col-lg-6 col-sm-12 col-md-12 mt-2">
											<input id="email_terdaftar" type="email" name="email" placeholder="Masukan email yang terdaftar"  class=" col-lg-12 input-group-text bg-transparent">
											
										</div>

										<div class="form-group col-12 col-lg-4 col-sm-12 col-md-12 mt-2 ">
											<input id="download-sertifikat" type="submit" value="Cari" class="btn btn-primary col-12 download-sertifikat">
										</div>
										<div class=" form-group col-12 col-lg-12 col-sm-12 col-md-12 mt-2 mb-1">
											<!-- <small >*Sertifikat akan hilang dalam waktu 30 hari setelah acara</small> -->
											<div style="overflow-x:auto;">
												<table class="table table-striped " style="font-size: 14px;">
													<thead>
													<tr>
														<th>Nomor</th>
														<th>Nama Peserta</th>
														<th>Link Sertifikat</th>
														</tr>
													</thead>
													<tbody id="data_sertifikat">
														<!-- data sertifikat peserta -->
													</tbody>
												</table>
											</div>
										</div>


									</div>
								</div>


							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
	
	<div class="modal fade bg-transparent" id="ModalDokumentasi" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="text-center">
		  <div class="modal-header text-center">
			<h5 id="judul-foto" class="modal-title text-white " >text</h5>
			<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">X</span>
			</button>
		  </div>
		  <div id="detail-data" class="modal-body">
			<img id="detail_foto" src="" class="embed-responsive rounded" witdh="100%" height="75%" alt="">	
										
		  </div>
		</div>
	  </div>
	</div>

<script>
	function pesan(){
			var kd_tiket =  $('input:radio[name=kategoritiket]:checked').val();
			var status_event = document.getElementById("status_event").innerText
			// console.log(status_event);
			var status_slot =  document.getElementById("status_slot").innerText;
			//console.log(status_slot);
			 if(status_event == "Selesai"){
					Swal.fire({
						icon: 'error',
						title: 'Event sudah selesai.',
						text: 'Anda tidak bisa memesan tiket!!',
						})
					
			}
			else if(status_event == "Segera"){
					Swal.fire({
						icon: 'error',
						title: 'Event akan segera dibuka.',
						text: 'Mohon tunggu beberapa saat!',
						showClass: {
							popup: 'animate__animated animate__fadeInDown'
						},
						hideClass: {
							popup: 'animate__animated animate__fadeOutUp'
						}
					})
			}
			else if(status_event == "Buka"){
			    if(status_slot != "Penuh"){
					if(kd_tiket != null){
						$.ajax({
						url	     : '<?=base_url()?>events/set_tiket',
						type     : 'POST',
						dataType : 'html',
						data     : 'kd_tiket='+kd_tiket,
						success  : function(respons){
							// redirect halaman
							window.location.href ="<?=base_url()?>e/pembayaran/page/1?&payment=true";
								
						}})
					}else{
						Swal.fire({
							icon: 'error',
							title: 'Anda belum memilih kategori tiket!!',
							showClass: {
								popup: 'animate__animated animate__fadeInDown'
							},
							hideClass: {
								popup: 'animate__animated animate__fadeOutUp'
							}
							})
						}
				}
				else {
					//slot peserta penuh
					Swal.fire({
						icon: 'error',
						title: 'Kuota Penuh!!',
						text: 'Anda tidak bisa memesan tiket!!',
						showClass: {
							popup: 'animate__animated animate__fadeInDown'
						},
						hideClass: {
							popup: 'animate__animated animate__fadeOutUp'
						}
						})
				}
			}
		}
		
</script>

