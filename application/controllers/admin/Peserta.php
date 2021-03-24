<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_peserta');
		$this->load->model('m_events');
		$this->load->model('m_tiket');
		$this->load->model('m_smtp');
		if($this->session->userdata('status')){}
		else{
			redirect("admin/login"); 
		}

	}
	public function index()
	{
		if($this->session->userdata('sebagai') == "Admin"){
			
			if(isset($_GET['all'])){
				if($_GET['all'] =="true"){
					// create array data peserta
					$status_peserta = array('kd_event_status' => '');
					$data['event'] = array();
					$data['event_pilihan'] = $this->m_events->tampil_event()->result();
				}
				if($_GET['all'] =="false"){
					// create array data peserta
					$status_peserta = array('kd_event_status' => trim(base64_decode($_GET['id'])));
					$data['event'] = $this->m_events->get_data_event(trim(base64_decode($_GET['id'])))->result();
					$data['event_pilihan'] = $data['event'];
				}
			$this->session->set_userdata($status_peserta);
			}
		}
		else{ //bukan admin  atau sebagai panitia
			$kd_admin = $this->session->userdata('kd_admin');
			if(isset($_GET['all'])){
				if($_GET['all'] =="true"){
					// create array data peserta
					$status_peserta = array('kd_event_status' => '');
					$data['event'] = array();
					$data['event_pilihan'] = $this->m_events->get_event_panitia($kd_admin)->result();
				}
				if($_GET['all'] =="false"){
					// create array data peserta
					$status_peserta = array('kd_event_status' => trim(base64_decode($_GET['id'])));
					$data['event'] = $this->m_events->get_event_panitia($kd_admin)->result();
					$data['event_pilihan'] = $data['event'];
				}
			$this->session->set_userdata($status_peserta);			
			}
		}
		
		$data['title'] = "Data Peserta";
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/peserta',$data);
		$this->load->view('admin/footer');
	}
	public function load_data_peserta(){
		
		$list = $this->m_peserta->get_datatables($this->session->userdata('kd_event_status'),"tbl_peserta");
        $data = array();
		$no = $_POST['start'];
        foreach ($list as  $value) {
			$tbody = array();
			$aksi= "<a class='  btn btn-sm btn-info tampil-data' id='tampil-data' title='Lihat Peserta' 
			data-target='#ModalDataPeserta' href='javascript:void(0);' data-toggle='modal' data-status='verifikasi' data-kode='".$value->kd_peserta."'><span class='fa fa-eye text-white'></span></a>";
			
			$tbody[] = $aksi;
            $tbody[] = ++$no;
            $tbody[] = $value->waktu_daftar;
            $tbody[] = $value->email;
            $tbody[] = $value->nama_lengkap;
			$tbody[] = $value->instansi;
			$pecah = substr($value->nama_event,0,15);
            $tbody[] = $pecah."...";
			$tbody[] = '<span class="badge badge-success">Terverifikasi</span>';
			
            $data[] = $tbody; 
        }
			$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_peserta->count_all($this->session->userdata('kd_event_status'),"tbl_peserta"),
                        "recordsFiltered" => $this->m_peserta->count_filtered($this->session->userdata('kd_event_status'),"tbl_peserta"),
                        "data" => $data,
                );
        if ($output) {
            echo json_encode($output);
        }else{
            echo json_encode(array('data'=>0));
        }
	}
	public function load_data_calon_peserta(){
		$list = $this->m_peserta->get_datatables($this->session->userdata('kd_event_status'),"tbl_calon_peserta");
        $data = array();
		$no = $_POST['start'];
        foreach ($list as  $value) {
			$tbody = array();
			$aksi= "<a class='  btn btn-sm btn-info tampil-data' id='tampil-data2' title='Lihat Peserta' 
			data-target='#ModalDataPeserta' href='javascript:void(0);' data-toggle='modal' data-status2='belum verifikasi' data-kode='".$value->kd_peserta."'><span class='fa fa-eye text-white'></span></a>";
			
			$tbody[] = $aksi;
            $tbody[] = ++$no;
            $tbody[] = $value->waktu_daftar;
            $tbody[] = $value->email;
            $tbody[] = $value->nama_lengkap;
			$tbody[] = $value->instansi;
			$pecah = substr($value->nama_event,0,15);
            $tbody[] = $pecah."...";
			$tbody[] = '<span class="badge badge-danger">Belum Terverifikasi</span>';
			
            $data[] = $tbody; 
        }
			$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_peserta->count_all($this->session->userdata('kd_event_status'),"tbl_calon_peserta"),
                        "recordsFiltered" => $this->m_peserta->count_filtered($this->session->userdata('kd_event_status'),"tbl_calon_peserta"),
                        "data" => $data,
                );
        if ($output) {
            echo json_encode($output);
        }else{
            echo json_encode(array('data'=>0));
        }
	}
	public function get_data_peserta(){
		$kd_peserta = $this->input->post('kd_peserta');
		$hasil = $this->m_peserta->get_data_peserta($kd_peserta)->result();
		echo json_encode($hasil);
	}
	public function get_data_calon_peserta(){
		$kd_peserta = $this->input->post('kd_peserta');
		$hasil = $this->m_peserta->get_data_calon_peserta($kd_peserta)->result();
		//echo $hasil;
		echo json_encode($hasil);
	}
	public function set_verifikasipeserta(){
		
		$kd_peserta = $this->input->post('kd_peserta');
		$this->m_peserta->set_verifikasipeserta($kd_peserta);
	}
	
	public function set_hapuspeserta(){
		$this->m_peserta->set_hapuspeserta(array('kd_peserta' => trim($this->input->post('kd_peserta'))),trim($this->input->post('table_name')));
	}
	public function set_belumverifikasipeserta(){
		
		$kd_peserta = $this->input->post('kd_peserta');
		$this->m_peserta->set_belumverifikasipeserta($kd_peserta);
		// kirim konfirmasi data ke email 
		$this->kirim_konfirmasi_verifikasi($kd_peserta);
	}
	public function konfirmasi_verifikasi(){
		
		$kd_peserta = "PST20210228954";
		// kirim konfirmasi data ke email 
		$this->kirim_konfirmasi_verifikasi($kd_peserta);
	}
	
	public function send_konfirmasi_verifikasi(){
		
		$kd_peserta = "PST20210228954";
		$kd_tiket_peserta =  "TKP20210228915";
		// kirim konfirmasi data ke email 
		$this->kirim_konfirmasi_add($kd_tiket_peserta,$kd_peserta);
	}
	public function edit_calon_peserta(){
		$where = array(
			'kd_peserta' => $this->input->post('kd_peserta')
		);
		$data = array(
			'nama_lengkap' => $this->input->post('nama'),
			'nim' => $this->input->post('nim'),
			'jurusan' => $this->input->post('jurusan'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
			'instansi' => $this->input->post('instansi')
		);
		$this->m_peserta->edit_calon_peserta($data,$where);
	}
	public function edit_peserta(){
		$where = array(
			'kd_peserta' => $this->input->post('kd_peserta')
		);
		$data = array(
			'nama_lengkap' => $this->input->post('nama'),
			'nim' => $this->input->post('nim'),
			'jurusan' => $this->input->post('jurusan'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
			'instansi' => $this->input->post('instansi')
		);
		$this->m_peserta->edit_peserta($data,$where);
	}
	public function check_data_peserta_event()
	{	
		$kd_event = trim($this->input->post('kd_event_t'));
		$email = strtolower(trim($this->input->post('email_t')));
		$result = $this->m_peserta->check_email_peserta1($email,$kd_event);
		if ($result->num_rows() > 0){
			echo json_encode($result->result());
		}else{
			echo json_encode($result->result());
		}
	}
	public function set_data_peserta_event()
	{
		$file_foto = $_FILES['file-foto']['name'];
		$kd_tiket_peserta = "TKP".date('Ymd').rand(0, 999);
		$kd_peserta = "PST".date('Ymd').rand(0, 999);
		$kd_tiket = trim($this->input->post('kd_tiket_t'));
		$kd_event = trim($this->input->post('kd_event_t'));
			// tambah data peserta event 
			$data_peserta = array(
				'kd_peserta' =>  $kd_peserta,
				'kd_event' => $kd_event,
				'kd_tiket' =>  $kd_tiket,
				'nama_lengkap' =>  trim($this->input->post('nama_lengkap_t')),
				'nim' =>  trim($this->input->post('nomor_induk_t')),
				'instansi' =>  trim($this->input->post('instansi_t')),
				'jurusan' =>  trim($this->input->post('jurusan_t')),
				'jalur' => trim($this->input->post('jalur_t')),
				'email' =>  strtolower(trim($this->input->post('email_t'))),
				'no_hp' =>  trim($this->input->post('nohp_t'))
			);
			if($file_foto !=""){
					$config['upload_path'] = "./assets/img/pembayaran";
					$config['allowed_types'] = "jpg|gif|jpeg|png";	
					$config['encrypt_name'] = TRUE;	

					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('file-foto')){
						die();
					}else{
						$data = array('upload_data' => $this->upload->data());
						$bukti_bayar = $data['upload_data']['file_name'];
					}	
					$result = $this->m_tiket->get_tiket(array('kd_tiket' => $kd_tiket));
					$row = $result->row_array();
					$data_tiket_peserta = array(
						'kd_tiket_peserta' => $kd_tiket_peserta,
						'kd_peserta' =>  $kd_peserta,
						'kd_event' =>  $kd_event,
						'kd_tiket' =>  $kd_tiket,
						'bayar' =>  $row['jumlah'],
						'diskon' =>  0,
						'status' =>  'Verifikasi',
						'bukti_bayar' => $bukti_bayar,
						'keterangan' => 'Berhasil'
					);
				
			}else{
				$result = $this->m_tiket->get_tiket(array('kd_tiket' => $kd_tiket));
				$row = $result->row_array();
					$data_tiket_peserta = array(
						'kd_tiket_peserta' => $kd_tiket_peserta,
						'kd_peserta' =>  $kd_peserta,
						'kd_event' =>  $kd_event,
						'kd_tiket' =>  $kd_tiket,
						'bayar' =>  $row['jumlah'],
						'diskon' =>  0,
						'status' =>  'Verifikasi',
						'bukti_bayar' =>  '',
						'keterangan' => 'Berhasil'
					);
			}

		$this->m_peserta->add_data_user1($data_peserta);
		$this->m_tiket->add_data_tiket($data_tiket_peserta);
		// kirim konfirmasi data ke email 
		$this->kirim_konfirmasi_add($kd_peserta);
	}

	public function exportDataPeserta(){	
		$peserta = $this->m_peserta->exportDataPesertaList($this->session->userdata('kd_event_status'),"tbl_peserta");
		if ($peserta) {
            echo json_encode($peserta);
        }else{
            echo json_encode(array('peserta'=>0));
        }
	}
	public function exportDataCalonPeserta(){	
		$calon_peserta = $this->m_peserta->exportDataPesertaList($this->session->userdata('kd_event_status'),"tbl_calon_peserta");
		if ($calon_peserta) {
            echo json_encode($calon_peserta);
        }else{
            echo json_encode(array('calon_peserta'=>0));
        }
	}
	public function kirim_konfirmasi_add($kd_peserta)
	{	
		$peserta = $this->m_peserta->get_data_peserta($kd_peserta);
		$row3 = $peserta->row_array();
		$data = array(
			'nama' => $row3['nama_lengkap'],
			'instansi'  => $row3['instansi'],
			'jurusan'  => $row3['jurusan'],
			'email' => $row3['email']
		);
		$result = $this->m_tiket->get_tiket_peserta(array('kd_peserta' => $kd_peserta));
		$row4 = $result->row_array();
		$tiket_peserta = $this->m_tiket->kirim_invoice_tiket($row4['kd_tiket_peserta']);
		$row = $tiket_peserta->row_array();
        $smtp = $this->m_smtp->get_smtp(array('status' => 'aktif'));  
		$new_smtp =  $smtp->row_array(); 
		// pecah data array
		$data_tiket = array(
			'kd_tiket' => $row3['kd_tiket']
		);
		$event =$this->m_events->get_data_event($row3['kd_event']);
		$row2  = $event->row_array();
		// $kd_tiket = base64_decode($this->session->userdata('kd_tiket'));
		// $kd_event =  base64_decode($this->session->userdata('kd_event'));
		$data['event'] = $event->result();
		$data['tiket_peserta'] = $tiket_peserta->result();
		$data['konfirmasi'] = $this->m_events->get_konfirmasi($data_tiket)->result();
		$data['tiket'] = $this->m_tiket->get_tiket($data_tiket)->result();
		
		$nama_event = $row2['nama_event'];
		$dari_tanggal = $row2['dari_tanggal'];
		//menggunakan smtp sendinblue.com
        	$config = [
            'protocol'  => 'smtp',
            'smtp_pass' => $new_smtp['pass_server'],
            'smtp_user' => $new_smtp['user_server'],
            'smtp_host' => $new_smtp['host_server'],
            'smtp_port' => $new_smtp['port_server'],
            //'smtp_crypto' => 'ssl',
            'smtp_timeout' => 30,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
		];

		//generate QRCODE dari kode tiket peserta
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/img/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $kd_tiket_peserta.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $kd_tiket_peserta; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 20;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		
		$data['name_qrcode'] = $image_name;
		//kontanta email admin
		$email_admin = "himasi@student.unas.ac.id";

        $this->email->initialize($config);
        $this->email->from($email_admin, 'Panitia HIMASI');
        $this->email->to($row3['email']);
        // $this->email->attach('');
        $this->email->subject('[KONFIRMASI EVENT]'." ".$nama_event."-".$dari_tanggal);
        $this->email->message($this->load->view('pages/konfirmasi_email',$data, true));

        if ($this->email->send()) {
        } else {
			echo $this->email->print_debugger();
            die;
        }
	}
	public function kirim_konfirmasi_verifikasi($kd_peserta)
	{	
		$peserta = $this->m_peserta->get_data_peserta($kd_peserta);
		$row3 = $peserta->row_array();
		$data = array(
			'nama' => $row3['nama_lengkap'],
			'instansi'  => $row3['instansi'],
			'jurusan'  => $row3['jurusan'],
			'email' => $row3['email']
		);
		
		$result = $this->m_tiket->get_tiket_peserta(array('kd_peserta' => $kd_peserta));
		$row4 = $result->row_array();
		$tiket_peserta = $this->m_tiket->kirim_invoice_tiket($row4['kd_tiket_peserta']);
        $smtp = $this->m_smtp->get_smtp(array('status' => 'aktif'));  
		$new_smtp =  $smtp->row_array(); 
		// pecah data array
		$data_tiket = array('kd_tiket' => $row3['kd_tiket']);
		$event =$this->m_events->get_data_event($row3['kd_event']);
		$row2  = $event->row_array();

		$data['event'] = $event->result();
		$data['tiket_peserta'] = $tiket_peserta->result();
		$data['konfirmasi'] = $this->m_events->get_konfirmasi($data_tiket)->result();
		$data['tiket'] = $this->m_tiket->get_tiket($data_tiket)->result();
		
		$nama_event = $row2['nama_event'];
		$dari_tanggal = $row2['dari_tanggal'];
		//menggunakan smtp sendinblue.com
        	$config = [
            'protocol'  => 'smtp',
            'smtp_pass' => $new_smtp['pass_server'],
            'smtp_user' => $new_smtp['user_server'],
            'smtp_host' => $new_smtp['host_server'],
            'smtp_port' => $new_smtp['port_server'],
            //'smtp_crypto' => 'ssl',
            'smtp_timeout' => 30,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
		];
		//kontanta email admin
		$email_admin = "himasi@student.unas.ac.id";
		$data['name_qrcode'] = $row4['kd_tiket_peserta'].".png";
        $this->email->initialize($config);
        $this->email->from($email_admin, 'Panitia HIMASI');
        $this->email->to($row3['email']);
        // $this->email->attach('');
        $this->email->subject('[KONFIRMASI EVENT]'." ".$nama_event."-".$dari_tanggal);
        $this->email->message($this->load->view('pages/konfirmasi_email',$data, true));

        if ($this->email->send()) {
        } else {
			echo $this->email->print_debugger();
            die;
        }
	}
	
}
