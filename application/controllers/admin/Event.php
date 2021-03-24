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
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/pages/events');
		$this->load->view('admin/footer');

	}
	public function tp_tambah()
	{
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/pages/t_events');
		$this->load->view('admin/footer');

	}
	

	public function auth_login(){

	}
	
	
}
