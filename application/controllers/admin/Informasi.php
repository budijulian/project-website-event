<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_informasi');
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
			
			$data['title'] = "Informasi";
			//halaman utama informasi
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/pages/informasi',$data);
			$this->load->view('admin/footer');
			
		}else{
			redirect("admin/login");
		}
	}
	 public function load_data_informasi(){
		 $result = $this->m_informasi->load_data_informasi()->result();
		 echo json_encode($result);
	 }
	 public function edit_informasi(){
		$text = $this->input->post('text');
		$status = $this->input->post('status');
		$where = array(
			'kd_informasi' => $this->input->post('kd_informasi')
		);
		$data = array(
			'text' => $text,
			'status' => $status
		);
		$this->m_informasi->edit_informasi($data,$where);
	}
	public function hapus_informasi(){
		$kd_informasi = $this->input->post('kd_informasi');
		$where = array(
			'kd_informasi' => $kd_informasi
		);
		$this->m_informasi->hapus_informasi($where);
	}
	public function tambah_informasi()
	{
		$text = $this->input->post('text');
		$status = $this->input->post('status');
		$data = array(
			'text' => $text,
			'status' => $status
		);
		$this->m_informasi->tambah_informasi($data);
	}
	
	
}
