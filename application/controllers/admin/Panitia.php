<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_panitia');
		$this->load->model('m_admin');
		$this->load->model('m_sertifikat');
		if($this->session->userdata('status')){}
		else{
			redirect("admin/login"); 
		}

	}
	
		public function index()
	{
		
		$data['title'] = "Data Panitia";
		$data['event'] = $this->m_sertifikat->get_data_event()->result();
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/panitia');
		$this->load->view('admin/footer');

	}
	public function load_data_panitia(){
		// check kondisi data panitia
		$list = $this->m_panitia->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as  $value) {
			
            if($value->status == "Aktif")
            {   $span = '<span class="badge badge-info">Aktif</span>'; }
            else {  $span = '<span class="badge badge-danger">Tidak Aktif</span>'; }
            $tbody = array();
            $tbody[] = ++$no;
            $tbody[] = $value->level;
			$tbody[] = $value->sebagai;
			$tbody[] = $span;
			$aksi = '<a class=" btn btn-sm btn-primary detail-panitia" id="detail-panitia" data-target="#ModalDataPanitia" href="javascript:void(0);" data-toggle="modal" title="Lihat Data" data-kode="'.$value->kd_admin.'" data-event="'.$value->kd_event.'" data-level="'.$value->level.'" data-sebagai="'.$value->sebagai.'" data-user="'.$value->username.'" data-pass="'. base64_decode($value->pass).'" data-status="'.$value->status.'" ><span class="fa fa-user-edit text-white"></span></a>'
			.' '.'<a class="btn btn-sm btn-info hapus-panitia" id="hapus-panitia" data-target="#ModalHapusData" href="javascript:void(0);" data-toggle="modal" title="Hapus Panitia" data-kode="'.$value->kd_admin.'" data-level="'.$value->level.'"><span class="fa fa-trash-o text-white"></span></a>';
			
			$tbody[] = $aksi;
            $data[] = $tbody; 
		}
			$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_panitia->count_all(),
                        "recordsFiltered" => $this->m_panitia->count_filtered(),
                        "data" => $data,
                );
        if ($output) {
            echo json_encode($output);
        }else{
            echo json_encode(array('data'=>0));
        }

	}
	


	public function get_panitia(){
		$kd_admin = $this->input->post('kd_admin');
		$data = array(
			'kd_admin' => $kd_admin
		);
		$hasil = $this->m_panitia->get_panitia($data)->result();
		
        if ($hasil) {
            echo json_encode($hasil);
        }else{
            echo json_encode(array('hasil'=>0));
        }
	}
	public function edit_panitia(){
		$kd_admin = $this->input->post('kd_admin');
		$level = $this->input->post('level');
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$status = $this->input->post('status');
		$pass = base64_encode($pass);

		$where = array(
			'kd_admin' => $kd_admin
		);
		$data = array(
			'level' => $level,
			'username' => $username,
			'pass' => $pass,
			'status' => $status
		);
		$data2 = array(
			'kd_event' => $this->input->post('kd_event')
		);
		$this->m_panitia->edit_panitia($data,$where);
		$this->m_panitia->edit_level_panitia($data2,$where);
	}
	public function hapus_panitia(){
		$kd_admin = $this->input->post('kd_admin');
		$where = array(
			'kd_admin' => $kd_admin
		);
		$this->m_panitia->hapus_panitia($where);
	}
	public function tambah_panitia()
	{
		$level = $this->input->post('level');
		$sebagai = $this->input->post('sebagai');
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$status = $this->input->post('status');
		$kd_event = $this->input->post('kd_event');
		$kd_admin = "PST".date('ymd').rand(0, 999);
		$kd_level = "LVD".date('ymd').rand(0, 999);
		$pass = base64_encode($pass);
		$data1 = array(
			'kd_admin' => $kd_admin,
			'sebagai' => $sebagai,
			'level' => $level,
			'username' => $username,
			'pass' => $pass,
			'status' => $status
		);
		$data2 = array(
			'kd_level'=> $kd_level,
			'kd_admin'=> $kd_admin,
			'kd_event' => $kd_event,
			'status' => 'Aktif'
		);
		if($kd_event !=""){
			$this->m_panitia->tambah_panitia($data1);
			$this->m_admin->tambah_level_admin($data2);
		}else{
			$this->m_panitia->tambah_panitia($data1);
		}
		
		
	}
	
	
	
}
