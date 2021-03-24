<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class smtp extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_smtp');
		$this->load->model('m_user');
		
		// mengatur zona waktu wilayah 
		date_default_timezone_set('Asia/Jakarta');
		
	}
	
	public function index()
	{
		if($this->session->userdata('status') == true){
			// $data['t_events'] = $this->m_user->t_events()->result();
			// $data['t_ip'] = $this->m_user->t_ip()->result();
			// $data['t_peserta'] = $this->m_user->t_peserta()->result();
			
			$data['title'] = "SMTP Server";
			//halaman utama smtp
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/pages/smtp',$data);
			$this->load->view('admin/footer');
			
		}else{
			redirect("admin/login");
		}
	}
	 public function load_data_smtp(){
		 $result = $this->m_smtp->load_data_smtp()->result();
		 echo json_encode($result);
	 }
	 public function edit_smtp(){
		$user = $this->input->post('user');
		$host = $this->input->post('host');
		$pass = $this->input->post('pass');
		$port = $this->input->post('port');
		$status = $this->input->post('status');
		$where = array(
			'kd_smtp' => $this->input->post('kd_smtp')
		);
		$data = array(
			'host_server' => $host,
			'user_server' => $user,
			'pass_server' => $pass,
			'port_server' => $port,
			'status' => $status
		);
		$this->m_smtp->edit_smtp($data,$where);
	}
	public function hapus_smtp(){
		$kd_smtp = $this->input->post('kd_smtp');
		$where = array(
			'kd_smtp' => $kd_smtp
		);
		$this->m_smtp->hapus_smtp($where);
	}
	public function tambah_smtp()
	{
		$user = $this->input->post('user');
		$host = $this->input->post('host');
		$pass = $this->input->post('pass');
		$port = $this->input->post('port');
		$status = $this->input->post('status');
		$data = array(
			'host_server' => $host,
			'user_server' => $user,
			'pass_server' => $pass,
			'port_server' => $port,
			'status' => $status
		);
		$this->m_smtp->tambah_smtp($data);
	}
	
	
}
