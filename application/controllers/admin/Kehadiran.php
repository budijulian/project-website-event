<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->model('m_kehadiran');
		$this->load->model('m_events');
		$this->load->model('m_peserta');
		$this->load->model('m_tiket');
		
		if($this->session->userdata('status')){}
		else{
			redirect("admin/login"); 
		}
	}
	
	public function index()
	{
		
		if(isset($_GET['all'])){
			if($_GET['all'] =="true"){
				// create session data participant
				$status_peserta = array('kd_event_status' => '');
				$data['event'] = $this->m_events->get_data_event("")->result();
			}
			if($_GET['all'] =="false"){
				// create session data participant
				$status_peserta = array('kd_event_status' => trim(base64_decode($_GET['id'])));
				$data['event'] = $this->m_events->get_data_event(trim(base64_decode($_GET['id'])))->result();
		
			}
		}
		$this->session->set_userdata($status_peserta);
		//halaman utama admin
		$data['title'] = "Data Kehadiran";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/kehadiran', $data);
		$this->load->view('admin/footer');

	}
	
	public function load_data_hadir(){
		$list = $this->m_kehadiran->get_datatables($this->session->userdata('kd_event_status'));
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kehadiran) {
			$no++;
            $row = array();
			$aksi= "<a class='btn btn-sm btn-info tampil-data' id='tampil-data2' title='Lihat Peserta' 
			data-target='#ModalDetailPeserta' href='javascript:void(0);' data-toggle='modal' data-kode='".$kehadiran->kd_peserta."'><span class='fa fa-eye text-white'></span></a>";
			$row[] = $aksi;
            $row[] = $no;
            $row[] = $kehadiran->timestamp;
            $row[] = $kehadiran->nama_event;
            $row[] = $kehadiran->email;
            $row[] = $kehadiran->nama_lengkap;
            $row[] = $kehadiran->instansi;
            $row[] = "Hadir";

            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_kehadiran->count_all($this->session->userdata('kd_event_status')),
                        "recordsFiltered" => $this->m_kehadiran->count_filtered($this->session->userdata('kd_event_status')),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
  public function load_data_peserta_event(){
		$list = $this->m_tiket->get_datatables($this->session->userdata('kd_event_status'),"tbl_peserta");
        $data = array();
		$no = $_POST['start'];
        foreach ($list as  $value) {
			$tbody = array();
            $tbody[] = ++$no;
            $tbody[] = $value->waktu_daftar;
            $tbody[] = $value->kd_tiket_peserta;
            $tbody[] = $value->nama_lengkap;
            $tbody[] = $value->email;
			// $pecah = substr($value->nama_event,0,15);
            // $tbody[] = $pecah."...";
			$aksi= "<a class='  btn btn-sm btn-info tampil-data' id='tampil-data' title='Lihat Peserta' 
			data-target='#ModalDataPeserta' href='javascript:void(0);' data-toggle='modal' data-kode='".$value->kd_peserta."'><span class='fa fa-eye text-white'></span></a>";
			$tbody[] = $aksi;
            $data[] = $tbody; 
        }
			$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_tiket->count_all($this->session->userdata('kd_event_status'),"tbl_peserta"),
                        "recordsFiltered" => $this->m_tiket->count_filtered($this->session->userdata('kd_event_status'),"tbl_peserta"),
                        "data" => $data,
                );
        if ($output) {
            echo json_encode($output);
        }else{
            echo json_encode(array('data'=>0));
        }
	}
	
	
	public function set_hapuspeserta(){
		$this->m_kehadiran->set_hapuspeserta(array('kd_peserta' => trim($this->input->post('kd_peserta'))));
	}
	public function get_kehadiran_peserta_event(){
		$result = $this->m_kehadiran->get_kehadiran_peserta_event(trim($this->input->post('kd_peserta')))->result();
        if ($result) {
            echo json_encode($result);
        }
	}
	public function kirimKehadiran(){
				$kd_peserta = $this->input->post('kd_peserta');
				$where = array(
						'kd_peserta' => $kd_peserta
					);
				$hasil = $this->m_kehadiran->checkKehadiran($where);
				 if($hasil->num_rows() == 0){
						$kd_event = $this->input->post('kd_event');
						$email = $this->input->post('email');
						$nama_lengkap = $this->input->post('nama_lengkap'); 
						$instansi = $this->input->post('instansi'); 
						$ket = "Hadir";
						$kd_absensi_peserta = "ABS".date('Ymd').rand(0, 999).rand(0, 99);
						$this->db->query('INSERT INTO `tbl_absensi_peserta`
						(`kd_absensi_peserta`,`kd_peserta`, `kd_event`, `email`, `nama_lengkap`, `instansi`, `ket_kehadiran`) 
						VALUES ("'.$kd_absensi_peserta.'","'.$kd_peserta.'","'.$kd_event.'","'.$email.'","'.$nama_lengkap.'","'.$instansi.'","'.$ket.'")');
						echo json_encode($hasil->result());
					}
				else{
						echo json_encode($hasil->result());
					}
	}
	
	public function checkKehadiran(){
		$hasil = $this->m_kehadiran->get_data_peserta($this->input->post('kd_tiket_peserta'));
		echo json_encode($hasil->result());
	}
	public function tp_tambah()
	{
		$data['title'] = "Tambah Kehadiran";
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/t_kehadiran',$data);
		$this->load->view('admin/footer');

	}
	public function updatedatapeserta($kd_event)
	{
		// tampilkan peserta seluruh event 
		 $data = $this->m_peserta->tampil_data_peserta($kd_event)->result();
		// update data pada absensi yang sama
		$no = 1;
		foreach ($data as $value) {
			$this->m_peserta->updatedataabsen($value->email,$kd_event,$value->kd_peserta);
			$no++;
		}
		echo "berhasil : ".$no;
	}
	public function u_ubah()
	{
		$data['title'] = "Ubah Kehadiran Baru";
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/u_kehadiran',$data);
		$this->load->view('admin/footer');

	}
	
	public function exportDataKehadiran(){	
		$kehadiran = $this->m_kehadiran->exportDataKehadiranList($this->session->userdata('kd_event_status'));
		if ($kehadiran) {
            echo json_encode($kehadiran);
        }else{
            echo json_encode(array('kehadiran'=>0));
        }
	}
}
