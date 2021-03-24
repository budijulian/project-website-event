<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_dashboard');
		$this->load->model('m_admin');
		$this->load->model('m_user');
		$this->load->model('m_panitia');
		// mengatur zona waktu wilayah 
		date_default_timezone_set('Asia/Jakarta');
		
	}
	
	public function index()
	{
		if($this->session->userdata('status') == true){
			
			$data['title'] = "Dashboard";
			//halaman utama admin
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/dashboard',$data);
			$this->load->view('admin/footer');
			
		}else{
			redirect("admin/login");
		}
	}
	public function count_dashboard(){
		$data = array(
			't_events' => $this->m_user->t_events()->result(),
			't_ip' => $this->m_user->t_ip()->result(),
			't_peserta' => $this->m_user->t_peserta()->result()
		);
		echo json_encode($data);
	}
	public function logout(){
		$this->session->sess_destroy();
		
		redirect(base_url("admin"));
	}
	public function set_login(){
		$username = trim($this->input->post('username'));
		$pass = trim($this->input->post('pass'));
		$pass = base64_encode($pass);
		$sebagai = trim($this->input->post('sebagai'));
		if($sebagai == "Admin"){
			$hasil = $this->m_admin->set_login_admin($username,$pass);
			if($hasil->num_rows() > 0){
				$row  = $hasil->row_array();
				$session_data = array(
					'kd_admin' => $row['kd_admin'],
					'username'=> $row['username'],
					'status' => $row['status'],
					'level' => $row['level'],
					'sebagai' => $row['sebagai']
				);
				$this->session->set_userdata($session_data);
				echo json_encode($hasil->result());
			}else{
				echo json_encode($hasil->result());
			}		
		}else{
			$hasil2 = $this->m_panitia->set_login_panitia($username,$pass);
			if($hasil2->num_rows() > 0){
				$row2  = $hasil2->row_array();
				$session_data = array(
					'kd_admin' => $row2['kd_admin'],
					'username'=> $row2['username'],
					'status' => $row2['status'],
					'level' => $row2['level'],
					'sebagai' => $row2['sebagai']
				);
				$this->session->set_userdata($session_data);
				echo json_encode($hasil2->result());
			}else{
				echo json_encode($hasil2->result());
			}
		}
	}
	public function auth_login(){
		$this->load->view('admin/auth_login');
	}
	public function count_pengunjung_perbulan(){
		$result = $this->m_dashboard->count_pengunjung_perbulan()->result();
		echo json_encode($result);
	}
	public function count_peserta_perbulan(){
		$result = $this->m_dashboard->count_peserta_perbulan()->result();
		echo json_encode($result);
	}
	
}
