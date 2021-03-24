<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->model('m_events');
		if($this->session->userdata('status')){}
		else{
			redirect("admin/login"); 
		}
	}
	
	public function index()
	{
		$data['title'] = "Data Event";
		// hapus cookies kode_event
		delete_cookie('kode_event');
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/events');
		$this->load->view('admin/footer');

	}
	public function load_data_event(){
		// check kondisi data event
		$list = $this->m_events->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as  $value) {
			
	
            $tbody = array();
            $tbody[] = ++$no;
            $tbody[] = $value->nama_event;
			$tbody[] = $value->kategori;
            $tbody[] = date('d-M-y', strtotime($value->dari_tanggal));
			$tbody[] = $value->jenis_tiket;
			if($value->keterangan == "Selesai"){
				$ket ='<span id="status-event" class="badge badge-success">Selesai</span>'.' 
				'.'<a id="atur-event" href="javascript:void(0);" data-status="'.$value->keterangan.'" data-kode="'.$value->kd_event.'"><span class=" fa fa-refresh"></span></a>';
			}
			elseif($value->keterangan == "Buka"){
				$ket ='<span id="status-event" class="badge badge-primary">Buka</span>'.' 
				'.'<a id="atur-event" href="javascript:void(0);" data-status="'.$value->keterangan.'" data-kode="'.$value->kd_event.'"><span class=" fa fa-refresh"></span></a>';
			}
			else{
				$ket ='<span id="status-event" class="badge badge-info">Segera</span>'.' 
				'.'<a id="atur-event" href="javascript:void(0);" data-status="'.$value->keterangan.'" data-kode="'.$value->kd_event.'"><span class=" fa fa-refresh"></span></a>';
			}
			$tbody[] = $ket;
			$aksi= "<a class=' btn btn-sm btn-primary ubah-event'  href='events/edit?id=".base64_encode($value->kd_event)."' title='Edit Data' 
			data='".$value->kd_event."'><span class='  fa fa-pencil text-white'></span></a>"
			." ".
			"<a class='  btn btn-sm btn-info lihat-peserta' id='lihat-data-peserta' title='Lihat Peserta' 
			data-target='#ModalDataPeserta' href='peserta?id=".base64_encode($value->kd_event)."&all=false'  data='".$value->kd_event."'><span class='fa fa-user-alt text-white'></span></a>"
			." ".
			"<a class='  btn btn-sm btn-warning lihat-sertifikat' id='lihat-data-sertifikat' title='Lihat Sertifikat' 
			data-target='#ModalDataSertifikat' href='sertifikat?id=".base64_encode($value->kd_event)."&all=false'  data='".$value->kd_event."'><span class='fa fa-file text-white'></span></a>"
			." ".
			"<a class='  btn btn-sm btn-secondary dokumentasi' id='lihat-data-dokumentasi' title='Lihat Dokumentasi' 
			data-target='#ModalDataDokumentasi' href='dokumentasi?id=".base64_encode($value->kd_event)."&all=false'  data='".$value->kd_event."'><span class='fa fa-camera-retro text-white'></span></a>"
			." ".
			"<a class='  btn btn-sm  btn-success kehadiran' id='lihat-data-kehadiran' title='Lihat Kehadiran' 
			data-target='#ModalDataKehadiran' href='kehadiran?id=".base64_encode($value->kd_event)."&all=false'  data='".$value->kd_event."'><span class='fa fa-users text-white'></span></a>";
			
			$tbody[] = $aksi;
            $data[] = $tbody; 
		}
			$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_events->count_all(),
                        "recordsFiltered" => $this->m_events->count_filtered(),
                        "data" => $data,
                );
        if ($output) {
            echo json_encode($output);
        }else{
            echo json_encode(array('data'=>0));
        }
	}
	public function gantistatus(){
		$kd_event = $this->input->post('kd_event');
		$status = $this->input->post('status');
		$where = array(
			'kd_event' => $kd_event
		);
		$data = array(
			'keterangan' => $status
		);
		$this->m_events->gantistatus($where,$data);
	}
	public function tambah()
	{
		$data['title'] = "Tambah Event Baru";
		// hapus cookies kode_event (tambah data)
		delete_cookie('kode_event');
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/aksi/t_events',$data);
		$this->load->view('admin/footer');

	}
	// tab detail event 
	public function tambah_detail_events()
	{
		$check_kd_event = trim($this->input->post('kd_event'));
		$nama_event = trim($this->input->post('nama_event'));
		$penyelenggara = trim($this->input->post('penyelenggara'));
		$kategori = trim($this->input->post('kategori'));
		$jenis_tiket = trim($this->input->post('jenis_tiket'));
		$tampil = trim($this->input->post('tampil'));
		$url_name = trim($this->input->post('url_name'));
		
		$keterangan = trim($this->input->post('keterangan'));
		// dari tanggal 
		$dari_tanggal = trim($this->input->post('dari_tanggal'));
		$date = new DateTime($dari_tanggal);
		$dari_tanggal = $date->format('Y-m-d');
		// dari jam 
		$dari_tanggal = trim($this->input->post('dari_tanggal'));
		$date = new DateTime($dari_tanggal);
		$dari_jam = $date->format('H:i');
		// sampai tanggal 
		$sampai_tanggal = trim($this->input->post('sampai_tanggal'));
		$date = new DateTime($sampai_tanggal);
		$sampai_tanggal = $date->format('Y-m-d');
		// sampai jam
		$sampai_jam = trim($this->input->post('sampai_tanggal'));
		$date = new DateTime($sampai_jam);
		$sampai_jam = $date->format('H:i');

		$lokasi = trim($this->input->post('lokasi'));
		$file_foto = $_FILES['file-foto']['name'];
		$kd_event = "EVT".date('ymd').rand(0, 999);
		
		if($file_foto !=""){
			$config['upload_path'] = "./assets/img/plamplet";
			$config['allowed_types'] = "jpg|gif|jpeg|png";	
       		$config['encrypt_name'] = TRUE;	

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file-foto')){
				die();
			}else{
				$data = array('upload_data' => $this->upload->data());
				$gambar= $data['upload_data']['file_name'];
			}	
			// kondisi edit atau tambah data 
			if(base64_decode(get_cookie('kode_event'))!=""){
					$data = array(
					'nama_event' => $nama_event,
					'kategori' => $kategori,
					'dari_tanggal' => $dari_tanggal,
					'dari_jam' => $dari_jam,
					'foto' => $gambar,
					'sampai_tanggal' => $sampai_tanggal,
					'jenis_tiket'=> $jenis_tiket,
					'sampai_jam' => $sampai_jam,
					'keterangan' => $keterangan,
					'lokasi' => $lokasi,
					'tampil' => $tampil,
					'penyelenggara' => $penyelenggara
				);
				$data_url = array(
					'url_name' => $url_name
				);
				$where = array(
					'kd_event' => base64_decode(get_cookie('kode_event'))
				);
				 $check = $this->m_events->get_data_event($where);
                if($check->num_rows() > 0){
                    $row = $check->row_array();
                     // hapus file pada database 
                        $tmp = "./assets/img/plamplet/".$row['foto'];
                        unlink($tmp);
                }
				$this->m_events->ubah_detail_event($data, $where);
				$this->m_events->ubah_url_event($data_url, $where);
				
				// $result = $this->m_events->get_data_event($where)->result();
				// json_encode($result);
			}else{
					$data = array(
					'kd_event' => $kd_event,
					'nama_event' => $nama_event,
					'kategori' => $kategori,
					'dari_tanggal' => $dari_tanggal,
					'dari_jam' => $dari_jam,
					'foto' => $gambar,
					'keterangan' => $keterangan,
					'jenis_tiket'=> $jenis_tiket,
					'sampai_tanggal' => $sampai_tanggal,
					'sampai_jam' => $sampai_jam,
					'lokasi' => $lokasi,
					'tampil' => $tampil,
					'penyelenggara' => $penyelenggara
				);
				$data_url = array(
					'kd_event' => $kd_event,
					'url_name' => $url_name
				);
				$cookie = array(
					'name' => 'kode_event',
					'value' => base64_encode($kd_event),
					'expire' => 7200,
					'domain' => '',
					'path' => '/',
					'prefix' => '',
					'secure' => FALSE
				);
				set_cookie($cookie);
				$this->m_events->tambah_detail_event($data);
				$this->m_events->tambah_url_event($data_url);

				if($this->session->userdata('sebagai') != "Admin"){
					$data2 = array(
						'kd_event' => $kd_event,
						'kd_level' =>  "LVD".date('ymd').rand(0, 999),
						'kd_admin' => $this->session->userdata('kd_admin'),
						'status' => 'Aktif'
					); 
					$this->m_events->tambah_level_event($data2);
					
				}
			}
		}else{
			// kondisi edit atau tambah data 
			if(base64_decode(get_cookie('kode_event'))!=""){
				$data = array(
					'nama_event' => $nama_event,
					'kategori' => $kategori,
					'dari_tanggal' => $dari_tanggal,
					'dari_jam' => $dari_jam,
					'sampai_tanggal' => $sampai_tanggal,
					'sampai_jam' => $sampai_jam,
					'keterangan' => $keterangan,
					'jenis_tiket'=> $jenis_tiket,
					'lokasi' => $lokasi,
					'tampil' => $tampil,
					'penyelenggara' => $penyelenggara
				);
				$data_url = array(
					'url_name' =>$url_name
				);
				$where = array(
					'kd_event' => base64_decode(get_cookie('kode_event'))
				);
				$this->m_events->ubah_detail_event($data, $where);
				$this->m_events->ubah_url_event($data_url, $where);
				// $result = $this->m_events->get_data_event($where)->result();
				// json_encode($result);
			}else{
				$data = array(
					'kd_event' => $kd_event,
					'nama_event' => $nama_event,
					'kategori' => $kategori,
					'dari_tanggal' => $dari_tanggal,
					'dari_jam' => $dari_jam,
					'keterangan' => $keterangan,
					'jenis_tiket'=> $jenis_tiket,
					'sampai_tanggal' => $sampai_tanggal,
					'sampai_jam' => $sampai_jam,
					'lokasi' => $lokasi,
					'tampil' => $tampil,
					'penyelenggara' => $penyelenggara
				);
				$data_url = array(
					'kd_event' => $kd_event,
					'url_name' =>$url_name
				);
				$cookie = array(
					'name' => 'kode_event',
					'value' => base64_encode($kd_event),
					'expire' => 7200,
					'domain' => '',
					'path' => '/',
					'prefix' => '',
					'secure' => FALSE
				);
				set_cookie($cookie);
				$this->m_events->tambah_detail_event($data);
				$this->m_events->tambah_url_event($data_url);
				if($this->session->userdata('sebagai') != "Admin"){
					$data2 = array(
						'kd_event' => $kd_event,
						'kd_level' =>  "LVD".date('ymd').rand(0, 999),
						'kd_admin' => $this->session->userdata('kd_admin'),
						'status' => 'Aktif'
					); 
					$this->m_events->tambah_level_event($data2);
				}
			}
		}
		
	}
	
	public function get_konfirmasi()
	{
		$result = $this->m_events->get_data_konfirmasi(trim($this->input->post('kd_konfirmasi')))->result();
		echo json_encode($result);
	}
	// tab deskripsi event 
	public function tambah_deskripsi_events()
	{
		$data = array(
					'diskripsi' => $this->input->post('text_diskripsi'),
					'ketentuan' => $this->input->post('text_ketentuan')
		);
		$where = array(
					'kd_event' => base64_decode(get_cookie('kode_event'))
				);
		$this->m_events->ubah_detail_event($data, $where);
	}
	// tab kategori tiket event 
	public function tambah_kategori_tiket()
	{
		if(trim($this->input->post('kd_tiket') != "")){
			$where = array(
				'kd_tiket' => trim($this->input->post('kd_tiket'))
			);
			
			$data = array(
				'jumlah' => $this->input->post('harga'),
				'jenis_tiket' => trim($this->input->post('jenis_tiket')),
				'slot' => $this->input->post('slot')
			);
			$data2 = array(
				'slot' => $this->input->post('selisih')
			);
			$where2 = array('kd_event' => base64_decode(get_cookie('kode_event')));

			$this->m_events->ubah_kategori_tiket($data,$where);
			$this->m_events->ubah_detail_event($data2,$where2);
		}else{
			if(trim($this->input->post('harga') == 0) || trim($this->input->post('jenis_tiket') == "Gratis")){
			$keterangan = "Gratis";
			}else{$keterangan = "Berbayar";}

			$kd_tiket = "TKT".date('Ymd').rand(0, 999);
			$kd_konfirmasi = "KFK".date('Ymd').rand(0, 999);
			$data = array(
						'kd_tiket' => $kd_tiket,
						'kd_event' => base64_decode(get_cookie('kode_event')),
						'jumlah' => $this->input->post('harga'),
						'jenis_tiket' => trim($this->input->post('jenis_tiket')),
						'slot' => $this->input->post('slot'),
						'keterangan' => $keterangan,
						'diskon' => 'tidak'
			);
			$data2 = array(
				'slot' => $this->input->post('total')
			);
			$data3 = array(
				'kd_konfirmasi' => $kd_konfirmasi,
				'kd_event' => base64_decode(get_cookie('kode_event')),
				'kd_tiket' => $kd_tiket,
				'konfirmasi' => ""
			);
			$where = array('kd_event' => base64_decode(get_cookie('kode_event')));
			$this->m_events->tambah_kategori_tiket($data);
			$this->m_events->ubah_detail_event($data2,$where);
			$this->m_events->tambah_konfirmasi_tiket($data3);
		
		}
		
	}
	
	public function hapus_kategori_tiket()
	{	
		$where = array('kd_tiket'=> $this->input->post('kd_tiket'));
		$where2 = array('kd_event' => base64_decode(get_cookie('kode_event')));
		$selisih = $this->input->post('total') - $this->input->post('slot');
		$data2 = array('slot' => $selisih);
		$this->m_events->hapus_kategori_tiket($where);
		$this->m_events->ubah_detail_event($data2,$where2);

	}
	public function get_kategori_tiket_event()
	{
		 $result = $this->m_events->get_kategori_tiket($this->input->post('kd_event'))->result();
	 	echo json_encode($result);
	}
	public function get_kategori_tiket()
	{
		 $result = $this->m_events->get_kategori_tiket(base64_decode(get_cookie('kode_event')))->result();
	 	echo json_encode($result);
	}
	// tab konfirmasi event 
	public function tambah_konfirmasi_tiket()
	{
		$data = array(
					'konfirmasi' => $this->input->post('text')
		);
		$where = array(
					'kd_event' => base64_decode(get_cookie('kode_event'))
				);
		$this->m_events->edit_konfirmasi_tiket($data, $where);
	}
	public function edit_konfirmasi_tiket()
	{
		$data = array(
					'konfirmasi' => $this->input->post('text')
		);
		$where = array(
					'kd_konfirmasi' => $this->input->post('kd_konfirmasi')
				);
		$this->m_events->edit_konfirmasi_tiket($data, $where);
	}
	public function get_konfirmasi_tiket()
	{
		//  $result = $this->m_events->get_konfirmasi_tiket(base64_decode(get_cookie('kode_event')))->result();
		$result = $this->m_events->get_konfirmasi_tiket(base64_decode(get_cookie('kode_event')))->result();
	 	echo json_encode($result);
	}
	// konfigurasi disimpan 
	public function simpan_konfigurasi_event()
	{
		if(get_cookie('kode_event')){
			// hapus cookies kode_event (tambah data)
			delete_cookie('kode_event');
			redirect(base_url("admin/events?all=true")); 
		}else{
			redirect(base_url("admin/events?all=true"));
		}
		
	}
	public function batal_konfigurasi_event()
	{
		if(get_cookie('kode_event')){
			$where = array(
					'kd_event' => base64_decode(get_cookie('kode_event'))
				);
			$this->m_events->hapus_konfigurasi_event($where);
			// hapus cookies kode_event (tambah data)
			delete_cookie('kode_event');
			redirect(base_url("admin/events?all=true")); 
		}else{
			redirect(base_url("admin/events?all=true"));
		}
		
	}
	public function hapus_event()
	{
		if(get_cookie('kode_event')){
			$where = array(
					'kd_event' => base64_decode(get_cookie('kode_event'))
				);
			$this->m_events->hapus_event($where);
			// hapus cookies kode_event (tambah data)
			delete_cookie('kode_event');
			redirect(base_url("admin/events?all=true")); 
		}else{
			redirect(base_url("admin/events?all=true"));
		}
		
	}
	
	public function edit()
	{
		$data['title'] = "Ubah Event";
		$cookie = array(
				'name' => 'kode_event',
				'value' => $_GET['id'],
				'expire' => 7200,
				'domain' => '',
				'path' => '/',
				'prefix' => '',
				'secure' => FALSE
			);
		set_cookie($cookie);
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/aksi/u_events',$data);
		$this->load->view('admin/footer');

	}
	public function get_edit_data_event(){
		if(get_cookie('kode_event')){
			$result = $this->m_events->get_data_event(base64_decode(get_cookie('kode_event')))->result();
			echo json_encode($result);
		}else{
			redirect(base_url("admin/events?all=true"));
		}
	}
	public function get_edit_data_tiket(){
		if(get_cookie('kode_event')){
			
			$result = $this->m_events->get_kategori_tiket(base64_decode(get_cookie('kode_event')))->result();
			echo json_encode($result);	
		}else{
			redirect(base_url("admin/events?all=true"));
		}
	}
	public function get_edit_data_konfirmasi(){
		if(get_cookie('kode_event')){
			
			$result = $this->m_events->get_konfirmasi_tiket(base64_decode(get_cookie('kode_event')))->result();
			echo json_encode($result);	
		}else{
			redirect(base_url("admin/events?all=true"));
		}
	}

	

	public function auth_login(){

	}
	
	
}
