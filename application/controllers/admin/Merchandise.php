<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_merchandise');
		if($this->session->userdata('status')){}
		else{
			redirect("admin/login"); 
		}

	}
	
	public function index()
	{
		$data['title'] = "Data Merchandise";
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/merchandise');
		$this->load->view('admin/footer');

	}
	
	public function get_data_merchandise(){
		$kd_merchandise = $this->input->post('kd_merchandise');
		$get_hasil = $this->m_merchandise->get_data_merchandise($kd_merchandise)->result();
		if ($get_hasil) {
            echo json_encode($get_hasil);
        }else{
            echo json_encode(array('get_hasil'=>0));
        }
	}
	public function load_data_merchandise(){
		$merchandise = $this->m_merchandise->get_merchandise()->result();
		// echo json_encode($merchandise);
		if ($merchandise) {
            echo json_encode($merchandise);
        }else{
            echo json_encode(array('merchandise'=>0));
        }
	}
	
	public function edit_merchandise(){
		$kd_merchandise = $this->input->post('kd_merchandise');
		$nama_merchandise = $this->input->post('nama_merchandise');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$kontak = $this->input->post('kontak');
		$keterangan = $this->input->post('keterangan');
		$diskripsi = $this->input->post('diskripsi');
		$file_foto = $_FILES['file-foto']['name'];
		$where = array(
			'kd_merchandise' => $kd_merchandise
		);
		if($file_foto !=""){
			$config['upload_path'] = "./assets/img/merchandise";
			$config['allowed_types'] = "jpg|gif|jpeg|png";	
       		$config['encrypt_name'] = TRUE;	

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file-foto')){
				die();
			}else{
				$data = array('upload_data' => $this->upload->data());
				$gambar= $data['upload_data']['file_name'];
			}	
			$data = array(
			'nama' => $nama_merchandise,
			'kategori' => $kategori,
			'harga' => $harga,
			'foto' => $gambar,
			'kontak' => $kontak,
			'keterangan' => $keterangan,
			'diskripsi' => $diskripsi
		);
		}else{
			$data = array(
			'nama' => $nama_merchandise,
			'kategori' => $kategori,
			'harga' => $harga,
			'kontak' => $kontak,
			'keterangan' => $keterangan,
			'diskripsi' => $diskripsi
		);
		}
		$this->m_merchandise->edit_merchandise($data,$where);
	}
	public function hapus_merchandise(){
		$kd_merchandise = $this->input->post('kd_merchandise');
		$where = array(
			'kd_merchandise' => $kd_merchandise
		);
		$this->m_merchandise->hapus_merchandise($where);
	}
	public function tambah_merchandise()
	{
		$nama_merchandise = $this->input->post('nama_merchandise2');
		$kategori = $this->input->post('kategori2');
		$harga = $this->input->post('harga2');
		$kontak = $this->input->post('kontak2');
		$keterangan = $this->input->post('keterangan2');
		$diskripsi = $this->input->post('diskripsi2');
		$file_foto = $_FILES['file-foto2']['name'];
		$kd_merchandise = "MRC".date('ymd').rand(0, 999);
		
		if($file_foto !=""){
			$config['upload_path'] = "./assets/img/merchandise";
			$config['allowed_types'] = "jpg|gif|jpeg|png";	
       		$config['encrypt_name'] = TRUE;	

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('file-foto2')){
				die();
			}else{
				$data = array('upload_data' => $this->upload->data());
				$gambar= $data['upload_data']['file_name'];
			}	
		}else{}

		$data = array(
			
			'kd_merchandise' => $kd_merchandise,
			'nama' => $nama_merchandise,
			'kategori' => $kategori,
			'harga' => $harga,
			'foto' => $gambar,
			'kontak' => $kontak,
			'keterangan' => $keterangan,
			'diskripsi' => $diskripsi
		);
		$this->m_merchandise->tambah_merchandise($data);
	}
	
	
}
