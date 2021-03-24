<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_events');
		$this->load->model('m_user');
		$this->load->model('m_tiket');
		$this->load->model('m_peserta');
		$this->load->model('m_merchandise');
		$this->load->model('m_kehadiran');
		$this->load->model('m_dashboard');
		// mengatur zona waktu wilayah 
		date_default_timezone_set('Asia/Jakarta');
		//check user ip
		$this->check_data_user();
	}
	public function index()
	{
		$data['status'] = "Himasi Event";
		$tanggal_now = date('Y-m-d');
		$data['event_terbaru'] = $this->m_events->get_event_terbaru($tanggal_now)->result();
		//check data homepage
		$data['t_events'] = $this->m_user->t_events()->result();
		$data['t_merchandise'] = $this->m_user->t_merchandise()->result();
		$data['t_ip'] = $this->m_user->t_ip()->result();
		$data['t_peserta'] = $this->m_user->t_peserta()->result();
		//halaman utama user
		
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer');
	}
	public function e($url_name)
	{	
		$check = $this->m_events->get_url_name_event($url_name);
		if($check->num_rows() == 0){
			$data['title'] = "Halaman Tidak Ditemukan.";
			$this->load->view('header2',$data);
			$this->load->view('errors/html/error_404',$data);
			$this->load->view('footer');
		}
		else{
			// get data url event 
			$row = $check->row_array();
			// set cookie
			$cookie=array(
				'name' => 'kode_event',
				'value' => base64_encode($row['kd_event']),
				'expire' => 3600,
				'domain' => '',
				'path' => '/',
				'prefix' => '',
				'secure' => FALSE
			);
			set_cookie($cookie);
			$result = $this->m_events->get_data_event($row['kd_event']);
			$e = $result->row_array();
			$data['title'] = $e['nama_event']." | HIMASI EVENT";
			$data['event'] = $result->result();
			$data['tiket'] = $this->m_tiket->get_slot_tiket($row['kd_event'])->result();
			//check slot event
			$slot = $this->m_peserta->check_slot_peserta($row['kd_event']);
			$row  = $slot->row_array();
			$status = $row['status_slot'];
			if($status =="Penuh"){                   
				$this->session->set_userdata("text_slot",
				"Penuh");
				$this->session->set_userdata("status_slot",
				"<span id='status_slot' class=' badge badge-pill badge-danger'>Penuh</span>");
			}else{
				$this->session->set_userdata("text_slot",
				"Tersedia");
				$this->session->set_userdata("status_slot",
				"<span id='status_slot' class=' badge badge-pill badge-success'>Tersedia</span>");
			}
		//halaman utama user
		$this->load->view('header2',$data);
		$this->load->view('pages/event',$data);
		$this->load->view('footer');
		}	
		
	}
	public function absensi($url_name,$param)
	{
		$check = $this->m_events->get_url_name_event($url_name);
		if(($check->num_rows() > 0) AND ($param == "absensi")){
			// get data url event 
			$row = $check->row_array();
			// set cookie
			$cookie=array(
				'name' => 'kd_event',
				'value' => base64_encode($row['kd_event']),
				'expire' => 3600,
				'domain' => '',
				'path' => '/',
				'prefix' => '',
				'secure' => FALSE
			);
			set_cookie($cookie);
			$data['event'] = $this->m_events->get_data_event($row['kd_event'])->result();
			$data['title'] = "Form Kehadiran Peserta";
			$this->load->view('pages/absensi_event',$data);
			$this->load->view('footer');
		}else{
			$data['title'] = "Halaman Tidak Ditemukan.";
			$this->load->view('header2',$data);
			$this->load->view('errors/html/error_404',$data);
			$this->load->view('footer');
		}
	}
	
	public function count_dashboard_user(){
		$tanggal_now = date('Y-m-d');
		$data = array(
			't_events' => $this->m_user->t_events()->result(),
			't_ip' => $this->m_user->t_ip()->result(),
			't_peserta' => $this->m_user->t_peserta()->result(),
			't_merchandise' =>$this->m_user->t_merchandise()->result(),
			't_new_event' => $this->m_events->get_event_terbaru($tanggal_now)->result()
		);
		echo json_encode($data);
	}
	public function get_merchandise(){
		$hasil = $this->m_merchandise->get_merchandise()->result();
		// echo json_encode($merchandise);
		if ($hasil) {
            echo json_encode($hasil);
        }else{
            echo json_encode(array('hasil'=>0));
        }
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
	
}
