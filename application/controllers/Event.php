<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_events');
		$this->load->model('m_tiket');
		$this->load->model('m_peserta');
		$this->load->model('m_dokumentasi');
		$this->load->model('m_sertifikat');
		$this->load->model('m_kehadiran');
		$this->load->model('m_user');
		// mengatur zona waktu wilayah 
		date_default_timezone_set('Asia/Jakarta');
		
		//check user ip
		$this->check_data_user();
	}
	public function konfirmasi_email2(){
		$this->load->view('pages/konfirmasi_email2');
	}
	
	//  check ip users 
	public function check_data_user(){
		//$sekarang = date('d-m-Y');
		$ip = $this->input->ip_address();
		$result = $this->m_user->check_ip($ip);
		$this->load->library('user_agent');
		if($result->num_rows() == 0){
			$data =array(
			'ip' => $this->input->ip_address(),
			'os' => $this->agent->platform(),
			'browser' => $this->agent->browser(),
			'aktif_terakhir'=> date('Y-m-d H:i:s')
			);
			$this->m_user->add_ip_user($data);
		}else{
			$where = array(
				'ip'=> $this->input->ip_address()
			);
			$data =array(
			'os' => $this->agent->platform(),
			'browser' => $this->agent->browser()
			);
			$this->m_user->update_data($where,$data);
		}		
	}
	
	public function set_absensi(){
		if(get_cookie('kd_event')){
			$kd_event = base64_decode(get_cookie('kd_event'));
			$email = trim($this->input->post('email'));
			$nama = trim($this->input->post('nama'));
			$instansi = trim($this->input->post('instansi'));
			$kd_peserta = trim($this->input->post('kd_peserta'));
			$kd_absensi = "ABS".date('Ymd').rand(0, 999).rand(0, 99);
			if (($kd_event != "") && ($email != "") && ($nama != "") && ($instansi != "")){
				$data = array('kd_absensi_peserta' =>  $kd_absensi,
							'kd_peserta' => $kd_peserta,
							'kd_event' => $kd_event,
							'nama_lengkap' => $nama,
							'email' => $email,
							'instansi' => $instansi,
							'ket_kehadiran' => 'Hadir');
				$where = array('email' => $email, 'kd_event' => $kd_event);
				$check = $this->m_kehadiran->get_data_kehadiran($where);
				if($kd_peserta == ""){
						$this->m_kehadiran->set_data_kehadiran($data);
						echo json_encode(array('length' => 2));
				}else{
						if($check->num_rows() == 0){
							$this->m_kehadiran->set_data_kehadiran($data);
							echo json_encode($check->result());
						}else{
							echo json_encode($check->result());
						}
				}
				
			}else{
				// back to home 
				redirect(base_url());
			}								
		}
	}
	public function get_data_peserta(){
		
		$data = $this->m_kehadiran->get_data_peserta_absen(trim($this->input->post('email')),base64_decode(get_cookie('kd_event')))->result();
		echo json_encode($data);
	}
	public function kembali(){
		
			$this->session->sess_destroy();
			delete_cookie('kode_event');
			delete_cookie('kd_event');
			delete_cookie('kode_tiket');
		redirect(base_url());
	}

	public function check_email_peserta1(){
		if(isset($_POST['email'])){
			$email = $_POST['email'];
			$event = get_cookie('kode_event');
			$event = base64_decode($event);
			$hasil = $this->m_peserta->check_email_peserta1($email,$event)->result();
			echo json_encode($hasil);
		}
		else{}
	}
	public function check_email_peserta2(){
		if(isset($_POST['email'])){
			$email = $_POST['email'];
			$event = get_cookie('kode_event');
			$event = base64_decode($event);
			$hasil = $this->m_peserta->check_email_peserta2($email,$event)->result();
			echo json_encode($hasil);
		}
		else{}
	}


	public function set_tiket(){
		if(isset($_POST['kd_tiket'])){
			$kode = $this->input->post('kd_tiket');
			$cookie=array(
			'name' => 'kode_tiket',
			'value' => base64_encode($kode),
			'expire' => 7200,
			'domain' => '',
			'path' => '/',
			'prefix' => '',
			'secure' => FALSE
			);
			set_cookie($cookie);
		}
		
	}
	public function set_datadiri(){
		if(get_cookie('kode_tiket')){
				$email = trim($this->input->post('email'));
				$nim = trim($this->input->post('nim'));
				$nama = trim($this->input->post('nama'));
				$nohp = trim($this->input->post('nohp'));
				$instansi = trim($this->input->post('instansi'));
				$jurusan = trim($this->input->post('jurusan'));
				$jalur = trim($this->input->post('jalur'));
			//membuat session
				$data = array(
				'email' => base64_encode($email),
				'nim' => base64_encode($nim),
				'nama' => base64_encode($nama),
				'nohp' => base64_encode($nohp),
				'jalur'=> base64_encode($jalur),
				'instansi' => base64_encode($instansi),
				'jurusan' => base64_encode($jurusan),
				'kd_event' => get_cookie('kode_event'),
				'kd_tiket' =>  get_cookie('kode_tiket')
			);
			//membuat session
			$this->session->set_userdata($data);
		}
	}
	// pembayaran tanpa bukti transfer
	public function set_pembayaran1(){
		// inisialisasi data
		if(get_cookie('kode_tiket')){
			$no_peserta = "PST".date('Ymd').rand(0, 999);
			$kd_tiket_peserta = "TKP".date('Ymd').rand(0, 999);
			$data_tiket_peserta = array(
				'kd_tiket_peserta' => $kd_tiket_peserta,
				'kd_event' => base64_decode($this->session->userdata('kd_event')),
				'kd_peserta' => $no_peserta,
				'kd_tiket' => base64_decode($this->session->userdata('kd_tiket')),
				'bayar' => 0,
				'diskon' => 0,
				'status' => 'Verifikasi',
				'bukti_bayar' => 'default.jpeg',
				'keterangan' => 'Berhasil'
			);

			$data = array(
				'kd_peserta' => $no_peserta,
				'kd_tiket' => base64_decode($this->session->userdata('kd_tiket')),
				'kd_event' => base64_decode($this->session->userdata('kd_event')),
				'nim' => base64_decode($this->session->userdata('nim')),
				'jalur' => base64_decode($this->session->userdata('jalur')),
				'nama_lengkap' => base64_decode($this->session->userdata('nama')),
				'email' => base64_decode($this->session->userdata('email')),
				'no_hp' => base64_decode($this->session->userdata('nohp')),
				'jurusan' => base64_decode($this->session->userdata('jurusan')),
				'instansi' => base64_decode($this->session->userdata('instansi'))
			);
			//membuat cookie pada nomor tiket
			$session_data = array(
				'kd_tiket_peserta' => $kd_tiket_peserta,
				'harga_tiket' => 0,
				'diskon' => 0,
				'status' => 'Verifikasi',
				'waktu_pemesanan' => date('d-m-Y H:i:s'),
				'status' => 'Berhasil'
			);
			$this->session->set_userdata($session_data);
			// menambah data tiket peserta
			$this->m_tiket->add_data_tiket($data_tiket_peserta);
			// menambah data peserta
			$this->m_peserta->add_data_user1($data);
		}
	}
	// pembayaran dengan bukti transfer
	public function set_pembayaran2(){
		if(get_cookie('kode_tiket')){
			// inisialisasi data
			$target_dir = "./assets/img/pembayaran/";
			$name_img = $_FILES["file"]["name"];
			$no_peserta = "PST".date('Ymd').rand(0, 999);
			$kd_tiket_peserta = "TKP".date('Ymd').rand(0, 999);
			//mengambil kata awal dari nama peserta
			$data_tiket_peserta = array(
				'kd_tiket_peserta' => $kd_tiket_peserta,
				'kd_event' => base64_decode($this->session->userdata('kd_event')),
				'kd_peserta' => $no_peserta,
				'kd_tiket' => base64_decode($this->session->userdata('kd_tiket')),
				'bayar' => $this->session->userdata('harga_tiket'),
				'diskon' => 0,
				'status' => 'Terverifikasi',
				'bukti_bayar' => $name_img,
				'keterangan' => 'Berhasil'
			);

			$data_peserta = array(
				'kd_peserta' => $no_peserta,
				'kd_event' => base64_decode($this->session->userdata('kd_event')),
				'kd_tiket' => base64_decode($this->session->userdata('kd_tiket')),
				'nama_lengkap' => base64_decode($this->session->userdata('nama')),
				'email' => base64_decode($this->session->userdata('email')),
				'nim' => base64_decode($this->session->userdata('nim')),
				'jalur' => base64_decode($this->session->userdata('jalur')),
				'no_hp' => base64_decode($this->session->userdata('nohp')),
				'jurusan' => base64_decode($this->session->userdata('jurusan')),
				'instansi' => base64_decode($this->session->userdata('instansi'))
			);
			$request = 1;
			if(isset($_POST['request'])){
				$request = $_POST['request'];
			}
			// Upload file
			if($request == 1){
				$target_file = $target_dir . basename($_FILES["file"]["name"]);
				//membuat cookie pada nomor tiket
				$session_data = array(
				'kd_tiket_peserta' => $kd_tiket_peserta,
				'kd_peserta' => $no_peserta,
				'status' => 'Belum Terverifikasi',
				'waktu_pemesanan' => date('d-M-Y H:i:s')
				);
				$this->session->set_userdata($session_data);
				// menambah data tiket peserta
				$this->m_tiket->add_data_tiket($data_tiket_peserta);
				// menambah data peserta
				$this->m_peserta->add_data_user2($data_peserta);
				$msg = "";
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
					
					$msg = "Successfully uploaded";
				}else{
					$msg = "Error while uploading";
				}
				echo $msg;
			}

			// Remove file
			if($request == 2){
				// hapus data gambar dan data peserta
				$filename = $target_dir.$_POST['name']; 
				$img_name =  $_POST['name'];
				$this->m_peserta->delete_data_user2($this->session->userdata('kd_peserta'),$this->session->userdata('kd_tiket_peserta'));
				unlink($filename); exit;
			}
		}
	}
	public function pencarian()
	{
		//kata kunci pencarian
		if(isset($_POST['cari'])){
			$katakunci = $this->input->post('cari');
			$data['hasil'] = $this->m_events->cari_event($katakunci)->result();
			$data['title'] = "Pencarian Event";
			//halaman utama user
			
			$this->load->view('header2',$data);
			$this->load->view('pages/pencarian',$data);
			$this->load->view('footer');
		}else{
			redirect(base_url());
		}
	}
	public function get_sertifikat(){
		//menampilkan dokumentasi events
		$kd_event = get_cookie('kode_event');
		$kd_event = base64_decode($kd_event);
		$email = $_POST['email_peserta'];

		$hasil = $this->m_sertifikat->get_sertifikat($email,$kd_event)->result();
		echo json_encode($hasil);
	}
	public function get_dokumentasi(){
		//menampilkan dokumentasi events
		$kd_event = get_cookie('kode_event');
		$where = array(
			'kd_event' => base64_decode($kd_event),
			'status' => 'Aktif'
		);
		$hasil = $this->m_dokumentasi->get_dokumentasi($where)->result();
		echo json_encode($hasil);
	}
	public function get_data_dokumentasi(){
		$kd_dokumentasi = trim($_POST['kode']);
		$kd_event = get_cookie('kode_event');
		$data = array(
			'kd_event' => base64_decode($kd_event),
			'kd_dokumentasi' => $kd_dokumentasi,
			'status' => 'Aktif'
		);
		$hasil = $this->m_dokumentasi->get_dokumentasi($data)->result();
		echo json_encode($hasil);
	}
	public function get_event(){
		// menampilkan data seluruh daftar event
		
		$kategori = $_POST['kategori'];
		$jenis_tiket= $_POST['jenis_tiket'];

		$hasil = $this->m_events->get_event($kategori,$jenis_tiket)->result();
		echo json_encode($hasil);
	}
	public function all_events(){
		// menampilkan data seluruh daftar event
		$hasil = $this->m_events->tampil_event()->result();
		echo json_encode($hasil);
	}
	public function get_event_terbaru(){
		// menampilkan data seluruh daftar event terbaru
		$hasil = $this->m_events->get_event_terbaru()->result();
		echo json_encode($hasil);
	}
	
	
	public function invoicetiket(){
		$this->load->view('pages/invoice_tiket');
	}
}
