<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_events');
		$this->load->model('m_tiket');
		$this->load->model('m_email');
		$this->load->model('m_user');
		$this->load->model('m_smtp');
		$this->load->model('m_informasi');
		// $this->load->library('email');
		// mengatur zona waktu wilayah 
		date_default_timezone_set('Asia/Jakarta');
		
		//check user ip
		$this->check_data_user();
		
		//define('EMAIL_ADMIN', 'himasiunas@gmail.com');
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
			'aktif_terakhir' => date('Y-m-d H:i:s')
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
	public function get_informasi(){
		$where = array(
			'status' => 'aktif'
		);
		$result = $this->m_informasi->get_informasi($where)->result();
		echo json_encode($result);
	}

		//public $email_admin = "himasiunas@gmail.com";
	
	public function cari_event(){

		$katakunci = $this->input->post('katakunci');
		$data = $this->m_event->cari_event($katakunci)->result();
		echo json_encode($data);
	}
	public function tampil_event(){
		$data = $this->m_event->tampil_event()->result();
		echo json_encode($data);
	}
	public function datadiri(){
		$kode_tiket = get_cookie('kode_tiket');
		$kode_event = get_cookie('kode_event');
		$data_tiket = array(
			'kd_tiket' => base64_decode($kode_tiket)
		);
		if(($kode_event != null) AND ($kode_tiket != null)){
			$data['tiket'] = $this->m_tiket->get_tiket($data_tiket)->result();
			$data['event'] = $this->m_events->get_data_event( base64_decode($kode_event))->result();
			
			$this->load->view('pages/datadiri',$data);
		}
		else{
			redirect(base_url());
		}
	}
	public function pembayaran(){
		
		if((get_cookie('kode_tiket') != null ) AND (get_cookie('kode_event') != null )){	
			$data_tiket = array(
				'kd_tiket' => base64_decode(get_cookie('kode_tiket'))
			);
			$result = $this->m_tiket->get_tiket($data_tiket);
			$row = $result->row_array();
			$session_tiket = array('harga_tiket' => $row['jumlah']);
			$this->session->set_userdata($session_tiket);

			$data['tiket'] = $result->result();
			$data['event'] = $this->m_events->get_data_event(base64_decode(get_cookie('kode_event')))->result();
			$this->load->view('pages/pembayaran',$data);
		}
		else{
		redirect(base_url());
		}
	}
	
	public function kirim_konfirmasi($data)
	{
        $smtp = $this->m_smtp->get_smtp(array('status' => 'aktif'));  
		$new_smtp =  $smtp->row_array(); 
		// pecah data array
		$data_tiket = array(
			'kd_tiket' => $data['kd_tiket']
		);
		$data['tiket_peserta'] = $this->m_tiket->kirim_invoice_tiket($this->session->userdata('kd_tiket_peserta'))->result();
		$event = $this->m_events->get_data_event($data['kd_event']);
		$row  = $event->row_array();
		// $kd_tiket = base64_decode($this->session->userdata('kd_tiket'));
		// $kd_event =  base64_decode($this->session->userdata('kd_event'));
		$data['event'] = $event->result();
		$data['konfirmasi'] = $this->m_events->get_konfirmasi($data_tiket)->result();
		$data['tiket'] = $this->m_tiket->get_tiket($data_tiket)->result();
		
		$nama_event = $row['nama_event'];
		$dari_tanggal = $row['dari_tanggal'];
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
		$kode_tiket = $this->session->userdata('kd_tiket_peserta');
        $image_name = $kode_tiket.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $kode_tiket; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 20;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		
		$data['name_qrcode'] = $image_name;
		//kontanta email admin
		$email_admin = "himasi@student.unas.ac.id";

        $this->email->initialize($config);
        $this->email->from($email_admin, 'Panitia HIMASI');
        $this->email->to($data['email']);
        // $this->email->attach('');
        $this->email->subject('[KONFIRMASI EVENT]'." ".$nama_event."-".$dari_tanggal);
        $this->email->message($this->load->view('pages/konfirmasi_email',$data, true));

        if ($this->email->send()) {
			# code...
			$data2 = array(
				'email_pengirim' => $data['email'],
				'kd_tiket' => $data['kd_tiket'],
				'kd_event' => $data['kd_event'],
				'log_status' =>'Berhasil'
			);
			$this->m_email->log_email($data2);
        } else {
			echo $this->email->print_debugger();
			$data2 = array(
				'email_pengirim' => $data['email'],
				'kd_tiket' =>$data['kd_tiket'],
				'kd_event' => $data['kd_event'],
				'log_status' =>'Gagal'
			);
			$this->m_email->log_email($data2);
            die;
        }
	}
	
	public function konfirmasi(){
		if(get_cookie('kode_tiket')){
			$data_konfirmasi_tiket = array(
				'kd_event' =>  base64_decode($this->session->userdata('kd_event')),
				'kd_tiket' =>  base64_decode($this->session->userdata('kd_tiket'))
				// 'harga' => $this->session->userdata('harga_tiket'),
				// 'nama' => base64_decode($this->session->userdata('nama')),
				// 'instansi' => base64_decode($this->session->userdata('instansi')),
				// 'jurusan' => base64_decode($this->session->userdata('jurusan')),
				// 'email' => base64_decode($this->session->userdata('email'))
			);
			if($this->session->userdata('kd_tiket_peserta') != null){
				//mengirim nilai ke library email
				$this->kirim_konfirmasi($data_konfirmasi_tiket);
			}
			$data['event'] = $this->m_events->get_data_event(base64_decode($this->session->userdata('kd_event')))->result();
			// $data['event'] = array();
			$this->load->view('pages/konfirmasi',$data);
		}
		else{
			redirect(base_url());
		}
		
	}
	
	public function cetak_tiket(){
		if($this->session->userdata('kd_tiket_peserta') != null){
				//mengirim nilai ke cetak tiket
				// $result['tiket_peserta'] = $this->m_tiket->kirim_invoice_tiket("TKP20210216651")->result();
				$result['tiket_peserta'] = $this->m_tiket->kirim_invoice_tiket($this->session->userdata('kd_tiket_peserta'))->result();
				$this->load->view('pages/invoice_tiket',$result);
		}
	}
	public function cetakinvoicetiket(){
		if((isset($_GET['status'])) && (isset($_GET['id']))){
			if($_GET['status'] == "true"){
				$kd_tiket_peserta = base64_decode($_GET['id']);
				// $kd_tiket_peserta = "TKP20210227529";
				//mengirim nilai ke cetak tiket
				$result['tiket_peserta'] = $this->m_tiket->kirim_invoice_tiket($kd_tiket_peserta)->result();
				$this->load->view('pages/invoice_tiket',$result);
			}
		}
		
	}
	
}
