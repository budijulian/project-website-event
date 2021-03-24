<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class developer extends CI_Controller {
	function __construct(){
		parent::__construct();
		// mengatur zona waktu wilayah 
		date_default_timezone_set('Asia/Jakarta');
		
	}
	
	public function index()
	{
		if($this->session->userdata('status') == true){
			// $data['t_events'] = $this->m_user->t_events()->result();
			// $data['t_ip'] = $this->m_user->t_ip()->result();
			// $data['t_peserta'] = $this->m_user->t_peserta()->result();
			
			$data['title'] = "Developer";
			//halaman utama smtp
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/pages/developer',$data);
			$this->load->view('admin/footer');
			
		}else{
			redirect("admin/login");
		}
	}
	
}
