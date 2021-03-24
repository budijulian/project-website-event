<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_dokumentasi');
		$this->load->model('m_events');
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
					$data['event_pilihan'] = $this->m_events->tampil_event()->result();
				}
				if($_GET['all'] =="false"){
					// create array data peserta
					$status_peserta = array('kd_event_status' => trim(base64_decode($_GET['id'])));
					$data['event_pilihan'] =  $this->m_events->get_data_event(trim(base64_decode($_GET['id'])))->result();
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
					$data['event_pilihan'] = $this->m_events->get_event_panitia($kd_admin)->result();
				}
				if($_GET['all'] =="false"){
					// create array data peserta
					$status_peserta = array('kd_event_status' => trim(base64_decode($_GET['id'])));
					$data['event_pilihan'] = $this->m_events->get_event_panitia($kd_admin)->result();
				}
			$this->session->set_userdata($status_peserta);			
			}
		}
		
		$data['title'] = "Data Dokumentasi";
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/dokumentasi',$data);
		$this->load->view('admin/footer');

	}
	public function load_data_dokumentasi(){
		// check kondisi data dokumentasi
       if($this->session->userdata('sebagai') =="Admin"){
			$dokumentasi = $this->m_dokumentasi->load_data_dokumentasi($this->session->userdata('kd_event_status'))->result();
			
	   }else {
			$dokumentasi = $this->m_dokumentasi->load_data_dokumentasi($this->session->userdata('kd_event_status'))->result();
		}
        if ($dokumentasi) {
            echo json_encode($dokumentasi);
        }else{
            echo json_encode(array('dokumentasi'=>0));
        }
        
	}
	public function get_dokumentasi(){
		$kd_dokumentasi = $this->input->post('kd_dokumentasi');
		$data = array(
			'kd_dokumentasi' => $kd_dokumentasi
		);
		$hasil = $this->m_dokumentasi->get_dokumentasi($data)->result();
		
        if ($hasil) {
            echo json_encode($hasil);
        }else{
            echo json_encode(array('hasil'=>0));
        }
	}
	public function edit_dokumentasi(){
		$kd_dokumentasi = $this->input->post('kd_dokumentasi');
		$judul = $this->input->post('judul');
		$status = $this->input->post('status');
		$file_foto = $this->input->post('file-foto');
		if($file_foto !=""){
			$config['upload_path'] = "./assets/img/dokumentasi";
			$config['allowed_types'] = "jpg|gif|jpeg|png";	
       		$config['encrypt_name'] = TRUE;	

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file-foto')){
				die();
			}else{
				$data = array('upload_data' => $this->upload->data());
				$gambar = $data['upload_data']['file_name'];
			}
			$data = array(
			'judul' => $judul,
			'status' => $status,
			'foto' => $gambar
			);	
		}else{
			$data = array(
			'judul' => $judul,
			'status' => $status
			);
		}
		$where = array(
			'kd_dokumentasi' => $kd_dokumentasi
		);
		$this->m_dokumentasi->edit_dokumentasi($data,$where);
	}
	public function hapus_dokumentasi(){
		$kd_dokumentasi = $this->input->post('kd_dokumentasi');
		$where = array(
			'kd_dokumentasi' => $kd_dokumentasi
		);
		$this->m_dokumentasi->hapus_dokumentasi($where);
	}
	public function tambah_dokumentasi()
	{
		$kd_event = $this->input->post('kd_event2');
		$judul = $this->input->post('judul2');
		$status = $this->input->post('status2');
		$file_foto = $_FILES['file_foto2']['name'];
		$kd_dokumentasi = "DKM".date('ymd').rand(0, 999);

		if($file_foto != ""){
			$config['upload_path'] = "./assets/img/dokumentasi";
			$config['allowed_types'] = "jpg|gif|jpeg|png";	
       		$config['encrypt_name'] = TRUE;	

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file_foto2')){
				die();
			}else{
				$data = array('upload_data' => $this->upload->data());
				$gambar = $data['upload_data']['file_name'];
				$data = array(
							'kd_dokumentasi' => $kd_dokumentasi,
							'kd_event' => $kd_event,
							'judul' => $judul,
							'foto' => $gambar,
							'status' => $status
						);
			}	
		}else{}
		$this->m_dokumentasi->tambah_dokumentasi($data);
	}
	
	
	
}
