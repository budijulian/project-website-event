
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/events?all=true">Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Event</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary ">Tambah Event Baru</h6>
                           </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs border-danger">
								<li class="nav-item ">
									<a id="tabhome1" class="nav-link active font-weight-bold text-dark" data-toggle="tab" href="#tabhome"> <span id="spanhome" class="fa fa-ban text-danger"></span> Event Baru</a>
								</li>
								<li class="nav-item">
									<a id="tabdeskripsi1" class="nav-link font-weight-bold text-dark" data-toggle="tab" href="#tabdeskripsi"> <span id="spandeskripsi" class="fa fa-ban text-danger"></span> Deskripsi Event</a>
								</li>
								<li class="nav-item">
									<a id="tabkategoritiket1" class="nav-link font-weight-bold text-dark" data-toggle="tab" href="#tabkategoritiket"> <span id="spankategoritiket"  class="fa fa-ban text-danger"></span> Kategori Tiket</a>
								</li>
                                <li class="nav-item">
									<a id="tabkonfirmasi1" class="nav-link font-weight-bold text-dark" data-toggle="tab" href="#tabkonfirmasi"> <span id="spankonfirmasi"  class="fa fa-ban text-danger" ></span>  Konfirmasi Tiket</a>
								</li>
                                 <li class="nav-item">
									<a id="tabsimpan1" class="nav-link font-weight-bold text-dark" data-toggle="tab" href="#tabsimpan"> <span id="spansimpan"  class="fa fa-ban text-danger"></span> Simpan</a>
								</li>
							</ul>
                            <!-- Tab panes -->
							<div class="tab-content animate__animated animate__fadeIn">
								<div id="tabhome" class="container tab-pane active border "><br>
									Detail Event
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                            <div class="container">
                                                <form id="form-detail">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-6 col-sm-12 col-md-12 w-auto text-left">
                                                                        <div class="form-group row mt-2">
                                                                    <small style="font-size:14px;" class="col-lg-4 " for="">Nama Event</small>
                                                                    <input type="hidden" name="kd_event" id="kd_event">
                                                                    <input type="hidden" name="keterangan" id="keterangan" value="Segera">
                                                                   <input type="hidden" name="tampil" id="tampil" value="Tidak">
                                                                   <input id="nama_event" type="text" value="" onkeyup="myFunction()"
                                                                    required name="nama_event" placeholder="Input Nama Event" 
                                                                    class="border-danger col-lg-8   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                                                                    <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                                </div>
                                                            <div class="form-group row mt-2">
                                                                <small style="font-size:14px;" class="col-lg-4 " for="">Penyelenggara </small>
                                                                <input id="penyelenggara" type="text" value=""
                                                                required name="penyelenggara" placeholder="Input Nama Penyelenggara" 
                                                                class="border-danger col-lg-8   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                                                                <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                            </div>
                                                            <div class="form-group row mt-2">
                                                                <small style="font-size:14px;" class="col-lg-4 " for="">Kategori Event</small>
                                                                <select required class="border-danger col-lg-8   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent"
                                                                name="kategori" id="kategori">
                                                                    <option  value="-">--Pilih Kategori--</option>
                                                                    <option value="Workshop">Workshop</option>
                                                                    <option value="Seminar">Seminar</option>
                                                                    <option value="Talkshow">Talkshow</option>
                                                                    <option value="Pelatihan">Pelatihan</option>
                                                                    <option value="E-Sports">E-Sports</option>
                                                                    <option value="Karyawan">Forum</option>
                                                                    <option value="Lainnya">Lainnya</option>
                                                                </select>
                                                                <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                            </div>
                                                            <div class="form-group row mt-2">
                                                                <small style="font-size:14px;" class="col-lg-4 " for="">Jenis Tiket</small>
                                                                <select required class="border-danger col-lg-8   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent"
                                                                name="jenis_tiket" id="jenis_tiket">
                                                                    <option  value="">--Pilih Kategori--</option>
                                                                    <option value="Berbayar">Bayar</option>
                                                                    <option value="Gratis">Gratis</option>
                                                                    <option value="">Lainnya</option>
                                                                </select>
                                                                <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                            </div>
                                                            <div class="form-group row mt-2">
                                                                <small style="font-size:14px;" class="col-lg-4 " for="">Waktu</small>
                                                            <input required class="border-danger col-lg-8  border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent"
                                                                            type="datetime-local" name="dari_tanggal" id="dari_tanggal">
                                                                            
                                                                <small class="col-lg-12 text-right text-dark">sampai.</small> 
                                                            <small class="col-lg-4 text-right text-dark"></small> 
                                                            <input required class="border-danger col-lg-8  border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent"
                                                                            type="datetime-local" name="sampai_tanggal" id="sampai_tanggal">
                                                                <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                            </div>
                                                            <div class="form-group row mt-2">
                                                                <small style="font-size:14px;" class="col-lg-4 " for="">Lokasi Event</small>
                                                                <textarea required class="border-danger col-lg-8  border-top-0 border-left-0 border-right-0  form-control bg-transparent"
                                                                placeholder="Input Lokasi Penyelenggara" name="lokasi" id="lokasi" cols="10" rows="5"></textarea>
                                                                <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                            </div>

                                                            </div>
                                                            <div class="col-12 col-lg-6 col-sm-12 col-md-12 w-auto text-left"> 
                                                            <small style="font-size:14px;" class="col-lg-4 " for="">Foto Plamplet</small>
                                                                    <table class="table table-borderless text-black text-center">
                                                                        <tr>
                                                                            <td><small style="font-size:14px;" class="col-lg-12 " for="">Rekomendasi Ukuran 720 x 1280</small><br>
                                                                            <img id="foto_plamplet" height="200px" witdh="200px" src="<?=base_url()?>assets/img/plamplet/coming-soon.png" alt="Plamplet"><br>
                                                                            <!-- <button class="col-lg-2 mt-2 btn btn-info">Lihat</button>  -->
                                                                            </td>
                                                                        
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input id="file-foto"  type="file" value="" name="file-foto" placeholder="Tidak Ada Data!"  class=" col-12 text-right border-0 form-control-xm bg-transparent">
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                     <div class="form-group row mt-2">
                                                                        <small style="font-size:14px;" class="col-lg-3 " for="">Link Event</small>
                                                                        <input disabled class="border-danger col-lg-5  border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent"
                                                                           value="<?=base_url()?>e" type="text" name="base_url" id="base_url"> 
                                                                           <label class="col-lg-1">/</label>
                                                                        <input class="border-danger col-lg-3  border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent"
                                                                            type="text" name="url_name" id="url_name"> 
                                                                            <small class="col-lg-12 text-right text-danger">*huruf kecil dan "-" untuk spasi</small>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    
                                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-right mt-2 mb-2">
                                                        <button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button>
                                                        <!-- <button class="btn btn-primary float-left">Lanjut</button> -->
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
								</div>
                                <div id="tabdeskripsi" class="container tab-pane border "><br>
									Deskripsi Event
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                            <div class="container">
                                                <form id="form-deskripsi">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left"> 
                                                                    <div class="form-group row mt-2">
                                                                        <small style="font-size:14px;" class="col-lg-4 text-left" for="">Deskripsi Event</small>
                                                                        <textarea class="border-danger col-lg-8  border-top-0 border-left-0 border-right-0  form-control bg-transparent"
                                                                         name="diskripsi" id="diskripsi" cols="10" rows="5"></textarea>
                                                                        <small class="col-lg-12 text-right text-danger">(optional).</small> 
                                                                    </div>
                                                                    <div class="form-group row mt-2">
                                                                        <small style="font-size:14px;" class="col-lg-4 text-left" for="">Ketentuan Event</small>
                                                                        <textarea class="border-danger col-lg-8  border-top-0 border-left-0 border-right-0  form-control bg-transparent"
                                                                         name="ketentuan" id="ketentuan" cols="10" rows="5"></textarea>
                                                                        <small class="col-lg-12 text-right text-danger">(optional).</small> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-right mt-2 mb-2">
                                                        <button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button>
                                                        <!-- <button class="btn btn-primary float-left">Lanjut</button> -->
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div id="tabkategoritiket" class="container tab-pane fade border"><br>
									Kategori Tiket
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                            <div class="container">
                                                <form id="form-kategoritiket">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-6 col-sm-12 col-md-12 w-auto text-left">
                                                                    <div class="form-group row mt-2">
                                                                            <small style="font-size:14px;" class="col-lg-4 " for="">Jenis Tiket</small>
                                                                        <select class="border-danger col-lg-4   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent"
                                                                        name="jenis_tiket_kt" id="jenis_tiket_kt">
                                                                            <option  value="">--Jenis Tiket--</option>
                                                                            <option value="Reguler">Reguler</option>
                                                                            <option value="Umum">Umum</option>
                                                                            <option value="Mahasiswa">Mahasiswa</option>
                                                                            <option value="UNAS">UNAS</option>
                                                                            <option value="OTS">OTS</option>
                                                                            <option value="Gratis">Gratis</option>
                                                                            <option value="Lainnya">PUBG Mobile</option>
                                                                            <option value="Mobile Legend">Mobile Legend</option>
                                                                        </select>
                                                                        <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                                    </div>
                                                                    <div class="form-group row mt-2">
                                                                            <small style="font-size:14px;" class="col-lg-4 " for="">Harga Tiket</small>
                                                                            <input id="harga_tiket" type="text" value=""
                                                                        required name="harga_tiket" placeholder="Input Harga Tiket" 
                                                                        class="border-danger col-lg-4   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                                                                        <small class="col-lg-4 text-left text-dark">/Tiket.</small> 
                                                                        <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                                    </div>
                                                                    <div class="form-group row mt-2">
                                                                            <small style="font-size:14px;" class="col-lg-4 " for="">Slot Tiket</small>
                                                                            <input id="slot_tiket" type="text" value=""
                                                                        required name="slot_tiket" placeholder="Max Slot" 
                                                                        class="border-danger col-lg-4   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                                                                        <small class="col-lg-4 text-left text-dark">Tiket.</small> 
                                                                        <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                                    </div>
                                                                    <!-- <div class="form-group row mt-2">
                                                                            <small style="font-size:14px;" class="col-lg-4 " for="">Token Diskon</small>
                                                                        <select class="border-danger col-lg-4   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent"
                                                                        name="token" id="token">
                                                                            <option  value="-">--Pilih Token--</option>
                                                                            <option value="iya">Iya</option>
                                                                            <option selected value="tidak">Tidak (default)</option>
                                                                        </select>
                                                                        <small class="col-lg-4 text-right text-danger">*wajib diisi.</small> 
                                                                        <small class="col-lg-4 text-right text-danger"></small> 
                                                                        <input id="max_token" type="text" value=""
                                                                        required name="max_token" placeholder="Max Token" 
                                                                        class="border-danger col-lg-4   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                                                                        <input id="harga_diskon" type="text" value=""
                                                                        required name="harga_diskon" placeholder="Harga Diskon" 
                                                                        class="border-danger col-lg-4   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                                                                        <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                                    </div> -->
                                                                    <div class="form-group text-right mt-2">
                                                                            <a href="javascript:void(0);" onclick="resetformTiket();" title="Reset" class="btn btn-primary "><span class="fa fa-refresh"></span> </a>
                                                                            <button type="submit" name="submit" class="btn btn-info "><span class="fa fa-plus"></span> </button>
                                                                    </div>
                                                                    
                                                            </div>
                                                            <div class="col-12 col-lg-6 col-sm-12 col-md-12 w-auto text-left"> 
                                                            <small style="font-size:14px;" class="col-lg-4 " for="">Daftar Tiket</small>
                                                                   <div class="table-responsive">
                                                                    <table class="table table-borderless text-black text-center">
                                                                    <hr>
                                                                        <thead>
                                                                            <th>NO</th>
                                                                            <th>Kategori Tiket</th>
                                                                            <th>Harga</th>
                                                                            <th>Jumlah Slot</th>
                                                                            <th>#</th>
                                                                        </thead>
                                                                        <tbody id="load_data_tiket">
                                                                            
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <th>Total</th>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <th><strong id="totaltiket">0</strong> Slot</th>
                                                                            <td></td>
                                                                        </tfoot>
                                                                        
                                                                    </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            

                                                        </div>
                                                    
                                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-right mt-2 mb-2">
                                                        <!-- <a id="lanjut_tab_konfirmasi"  class="btn btn-primary float-right text-white">Lanjut</a> -->
                                                        <!-- <button class="btn btn-primary float-left">Lanjut</button> -->
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div id="tabkonfirmasi" class="container tab-pane fade border"><br>
									Konfirmasi Tiket
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                            <div class="container">
                                                <form id="form-konfirmasi">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-6 col-sm-12 col-md-12 w-auto text-left">
                                                                <div class="form-group row mt-2">
                                                                            <small style="font-size:14px;" class="col-lg-4 " for="">Jenis Konfirmasi</small>
                                                                        <select class="border-danger col-lg-8   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent"
                                                                        name="jenis_konfirmasi" id="jenis_konfirmasi">
                                                                            <option  value="default">--Jenis Konfirmasi--</option>
                                                                            <option value="default">Semua Sama</option>
                                                                            <option value="-">Berbeda</option>
                                                                        </select>
                                                                        <small class="col-lg-12 text-right text-danger">*wajib diisi.</small> 
                                                                    </div>
                                                                    <div class="form-group row mt-2">
                                                                            <small style="font-size:14px;" class="col-lg-4 " for="">Jenis Tiket</small>
                                                                            <input type="hidden" name="kd_konfirmasi_K" id="kd_konfirmasi_K">
                                                                            <input disabled id="jenis_tiket_K" type="text" value=""
                                                                         name="jenis_tiket_K" placeholder="" 
                                                                        class="border-danger col-lg-4   border-top-0 border-left-0 border-right-0  form-control-sm bg-transparent">
                                                                        <small class="col-lg-4 text-left text-dark">(tidak diisi).</small>  
                                                                    </div>
                                                                    <div class="form-group row mt-2">
                                                                        <small style="font-size:14px;" class="col-lg-4 " for="">Text Konformasi</small>
                                                                        <textarea class="border-danger col-lg-8  border-top-0 border-left-0 border-right-0  form-control bg-transparent"
                                                                        placeholder="Input Lokasi Penyelenggara" name="text_konfirmasi" id="text_konfirmasi" cols="10" rows="5"></textarea>
                                                                        <small class="col-lg-12 text-right text-danger">(optional).</small> 
                                                                    </div>
                                                                    <div class="form-group text-right mt-2">
                                                                            <button type="submit" name="submit" class="btn btn-info "><span class="fa fa-pencil"></span> </button>
                                                                    </div>
                                                                    
                                                            </div>
                                                            <div class="col-12 col-lg-6 col-sm-12 col-md-12 w-auto text-left"> 
                                                            <small style="font-size:14px;" class="col-lg-4 " for="">Daftar Tiket</small>
                                                                    <div class="table-responsive">
                                                                   <table class="table table-borderless text-black text-center">
                                                                    <hr>
                                                                        <thead>
                                                                            <th>NO</th>
                                                                            <th>Kategori Tiket</th>
                                                                            <th>Text</th>
                                                                            <th>#</th>
                                                                        </thead>
                                                                        <tbody id="load_konfirmasi_tiket">

                                                                        </tbody>
                                                                        
                                                                    </table>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                            

                                                        </div>
                                                    
                                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-right mt-2 mb-2">
                                                        <!-- <a id="lanjut_tab_simpan" class="btn btn-primary float-right  text-white">Lanjut</a> -->
                                                        <!-- <button class="btn btn-primary float-left">Lanjut</button> -->
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

								</div>
                                <div id="tabsimpan" class="container tab-pane fade border"><br>
									Simpan Event!
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-left">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-6 col-sm-12 col-md-12 w-auto text-left">
                                                                    <label for=""> Apakah Kamu yakin Menambahkan Event ini?</label> 
                                                            </div>
                                                         </div>
                                                    </div>
                                                   
                                                    <div class="col-12 col-lg-12 col-sm-12 col-md-12 w-auto text-right mt-2 mb-2">
                                                    <button id="batal_simpan_event" class="btn btn-danger float-right ml-2">Tidak</button>
                                                      <button id="simpan_event" class="btn btn-primary float-right ml-2">Simpan</button>
                                                       <!-- <button class="btn btn-primary float-left">Lanjut</button> -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
                            

							</div>
                            <!-- close div tab  -->
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->
<!-- ckeditor  -->
 <script>
 
   CKEDITOR.replace( 'diskripsi' , {
       
      uiColor: '#CCEAEE',
      width: '100%',
      height: 300
    });
    CKEDITOR.replace( 'text_konfirmasi' , {
       
      uiColor: '#CCEAEE',
      width: '100%',
      height: 200
    });
     CKEDITOR.replace( 'ketentuan' , {
       
      uiColor: '#CCEAEE',
      width: '100%',
      height: 300
    });
   
</script>

<script>

function resetformTiket(){
            $('#kd_tiket').val("");
            $('#jenis_tiket_kt').val("");
            $('#harga_tiket').val("");
            $('#slot_tiket ').val("");
}
function myFunction(){
    //  membersihkan string  
    var str = $('#nama_event').val(); 
    str = str.toLowerCase();
    var str2 = str.replace(/[^a-zA-Z ]/g, "");
    var new_str = str2.replace(/\s+/g, "-"); 
    $('#url_name').val(new_str);
}
$('#form-detail').submit(function(e){
            e.preventDefault();
            $.ajax({
                    url: '<?=base_url()?>admin/events/tambah_detail_events',
                    type:"POST",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data diperbaruhi',
                            showConfirmButton: false,
                            timer: 1500})
                            
                            // let file_foto = $('#file_foto').val(data[i].kd_event); 
                           
                            var btn = document.getElementById("spanhome");
                            btn.setAttribute('class','fa fa-check text-success');
                        }    
                    })
    });
    $('#form-deskripsi').submit(function(e){
            e.preventDefault();
            var text_diskripsi  = CKEDITOR.instances['diskripsi'].getData();
            var text_ketentuan  = CKEDITOR.instances['ketentuan'].getData();
            $.ajax({
                    url: '<?=base_url()?>admin/events/tambah_deskripsi_events',
                    type  : "ajax",
                    method : "POST",
                    data     : {
                            text_diskripsi : text_diskripsi, text_ketentuan : text_ketentuan
                        },
                    success: function(data){
                       Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data diperbaruhi',
                            showConfirmButton: false,
                            timer: 1500})
                            
                            // let file_foto = $('#file_foto').val(data[i].kd_event);
                            var btn = document.getElementById("spandeskripsi");
                            btn.setAttribute('class','fa fa-check text-success');
                        }    
                    })
    });
      




 
$(document).ready(function(){
      konfirmasi_text(); // call function konfirmasi text
      load_kategori_tiket();
    var ketentuan = '<ol><li>Peserta hanya dapat memesan satu event dengan satu akun email yang terdaftar</li><li>Peserta disarankan datang tepat waktu di hari H.</li><li>Untuk tiket berbayar peserta harus menunggu validasi pembayaran tiket oleh panitia.</li></ol>';
     CKEDITOR.instances['ketentuan'].setData(ketentuan);   
        function load_kategori_tiket(){
            // get data kategori tiket 
            $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/events/get_kategori_tiket',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    // setting a timeout loading data
                },
                success : function(data){
                    var html = "";
                    var total = 0;
                    var t = document.getElementById("totaltiket");
                    if(data <= 0){
                           html += '<td colspan="4">Belum ada Tiket.</td>';
                        t.innerHTML = 0;
                        }
                    for(var i=0; i < data.length; i++){
                        
                        html += '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+data[i].jenis_tiket+'</td>'+
                                    '<td>Rp.'+data[i].jumlah+',-</td>'+
                                    '<td>'+data[i].slot+'</td>'+
                                    '<td><a href="javascript:void(0);" id="hapus_tiket" data-kode="'+data[i].kd_tiket+'" data-slot="'+data[i].slot+'" class="badge badge-danger text-white"><span class="fa fa-trash-o"></span> </a></td>'+
                                '</tr>';
                        total+= parseInt(data[i].slot);
                        t.innerHTML = total;
                        
                    }
                    $('#load_data_tiket').html(html);
                    // $(".spinner").css("display","none");
                }
            });
        }
        $('#form-kategoritiket').submit(function(e){
              e.preventDefault();
            var slot = $('#slot_tiket').val();
                slot = parseInt(slot);
            var harga = $('#harga_tiket').val();
                harga = parseInt(harga);
            var jenis_tiket = $('#jenis_tiket_kt').val();
            var total = document.getElementById("totaltiket").innerText;
                total = parseInt(total) + slot;
            $.ajax({
                    url: '<?=base_url()?>admin/events/tambah_kategori_tiket',
                    type  : "ajax",
                    method : "POST",
                    data     : {
                            slot : slot, harga : harga, jenis_tiket : jenis_tiket, total: total
                        },
                    success: function(data){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data diperbaruhi',
                            showConfirmButton: false,
                            timer: 1500})
                            load_kategori_tiket();
                            konfirmasi_text();
                            $('#harga_tiket').val("");
                            $('#slot_tiket').val("");
                            $('#jenis_tiket_kt').val("");
                            var btn = document.getElementById("spankategoritiket");
                            btn.setAttribute('class','fa fa-check text-success');
                        }    
                    })
        });
        // hapus data tiket 
        $('#load_data_tiket').on('click','#hapus_tiket',function(){
            var kd_tiket = $(this).attr('data-kode');
             var slot = $(this).attr('data-slot');
                slot = parseInt(slot);
            var total = document.getElementById("totaltiket").innerText;
                total = parseInt(total);
                        $.ajax({
                    url: '<?=base_url()?>admin/events/hapus_kategori_tiket',
                    type  : "ajax",
                    method : "POST",
                    data     : {
                            kd_tiket : kd_tiket, slot : slot, total : total
                        },
                    success: function(data){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data diperbaruhi',
                            showConfirmButton: false,
                            timer: 1500})

                        load_kategori_tiket();
                        konfirmasi_text();
                        }    
                    })    
        });  
         // konfirmasi text 
            function konfirmasi_text(){
                    $.ajax({
                    type  : 'ajax',
                    url   : '<?=base_url()?>admin/events/get_konfirmasi_tiket',
                    async : false,
                    dataType : 'json',
                    beforeSend: function() {
                        // setting a timeout loading data
                    },
                    success : function(data){
                        console.log(data);
                        var html = "";
                        if(data <= 0){
                            html += '<td colspan="3">Belum ada konfirmasi.</td>';
                            }
                        for(var i=0; i < data.length; i++){
                            var str = data[i].konfirmasi;
                            html += '<tr>'+
                                        '<td>'+(i+1)+'</td>'+
                                        '<td>'+data[i].jenis_tiket+'</td>'+
                                        '<td>'+ str.substr(0,14)+'...</td>'+
                                        '<td><a href="javascript:void(0);" id="get_konfirmasi" data-jenis="'+data[i].jenis_tiket+'" data-konfirmasi="'+data[i].konfirmasi+'" data-kode="'+data[i].kd_konfirmasi+'" class="badge badge-primary text-white"><span class="fa fa-pencil"></span> </a></td>'+
                                    '</tr>';
                            
                        }
                        $('#load_konfirmasi_tiket').html(html);
                        // $(".spinner").css("display","none");
                    }
                });
            }
            
        $('#load_konfirmasi_tiket').on('click','#get_konfirmasi',function(){
                var kd_konfirmasi = $(this).attr('data-kode');
                var jenis_tiket = $(this).attr('data-jenis');
                var data = $(this).attr('data-konfirmasi');
                $('#kd_konfirmasi_K').val(kd_konfirmasi);
                $('#jenis_tiket_K').val(jenis_tiket);
                CKEDITOR.instances['text_konfirmasi'].setData(data);
        });
        $('#form-konfirmasi').submit(function(e){
              e.preventDefault();
            var kondisi = $('#jenis_konfirmasi').val();
            var kd_konfirmasi = $('#kd_konfirmasi_K').val();
            var text = CKEDITOR.instances['text_konfirmasi'].getData();
            var url;
            if(kondisi == "default"){
               url = "<?=base_url()?>admin/events/tambah_konfirmasi_tiket";
               kd_konfirmasi ="";
            }else{
                url = "<?=base_url()?>admin/events/edit_konfirmasi_tiket";
            }
            $.ajax({
                    url: url,
                    type  : "ajax",
                    method : "POST",
                    data     : {
                            kd_konfirmasi : kd_konfirmasi, text : text
                        },
                    success: function(data){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data diperbaruhi',
                            showConfirmButton: false,
                            timer: 1500})

                        konfirmasi_text();
                            var btn = document.getElementById("spankonfirmasi");
                            btn.setAttribute('class','fa fa-check text-success');
                        }    
                    })
     });
     $('#tabsimpan').on('click','#simpan_event',function(){
         Swal.fire({
            title: 'Simpan Event?',
            text: "Apakah kamu yakin menambah event ini?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Tersimpan!',
                'Data berhasil tersimpan.',
                'success'
                )
                var btn = document.getElementById("spansimpan");
                            btn.setAttribute('class','fa fa-check text-success');
                window.location = '<?=base_url("admin/events/simpan_konfigurasi_event")?>';
            }
            })
         
     });

     $('#tabsimpan').on('click','#batal_simpan_event',function(){
         Swal.fire({
            title: 'Batal Simpan?',
            text: "Apakah kamu yakin membatalkan event ini?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Batal!',
                'Data berhasil dibatalkan.',
                'success'
                )
                window.location = '<?=base_url("admin/events/batal_konfigurasi_event")?>';
            }
            })
     });
        
    });
    
</script>
