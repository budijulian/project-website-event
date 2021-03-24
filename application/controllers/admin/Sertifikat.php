<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_sertifikat');
		$this->load->model('m_peserta');
		$this->load->model('m_events');
		$this->load->library('excel');
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
				$status_sertifikat = array('kd_event_status' => '');
			}
			if($_GET['all'] =="false"){
				// create session data participant
				$status_sertifikat = array('kd_event_status' => trim(base64_decode($_GET['id'])));
			}
			$this->session->set_userdata($status_sertifikat);
		}
		//generate sertifikat 
		if(isset($_GET['generate'])){
				if($_GET['generate'] =="true"){
					$kd_event = $_GET['id'];
					$data['no'] = $_GET['no'];
					$data['generate'] = $this->m_sertifikat->generate_sertifikat($kd_event)->result();
				}else{$data = array();}
				
				$data['title'] = "Data Generate Sertifikat";
				//halaman utama admin
				$this->load->view('admin/header');
				$this->load->view('admin/sidebar',$data);
				$this->load->view('admin/pages/aksi/generate',$data);
				$this->load->view('admin/footer');
		}else{
		$data['title'] = "Data Sertifikat";
		$data['event'] = $this->m_sertifikat->get_data_event()->result();
				//halaman utama admin
				$this->load->view('admin/header');
				$this->load->view('admin/sidebar',$data);
				$this->load->view('admin/pages/sertifikat',$data);
				$this->load->view('admin/footer');
		}
	}
	// data dari tabel peserta 
	public function load_data_peserta(){
		$peserta = $this->m_peserta->sertifikat_peserta_verifikasi($this->session->userdata('kd_event_status'));
		 if ($peserta) {
            echo json_encode($peserta);
        }else{
            echo json_encode(array('peserta'=>0));
        }
	}
	// data penerima sertifikat dari tabel peserta 
	public function load_data_sertifikat(){
		// check kondisi data sertifikat
			$sertifikat = $this->m_sertifikat->load_data_sertifikat($this->session->userdata('kd_event_status'))->result();
		if ($sertifikat) {
            echo json_encode($sertifikat);
        }else{
            echo json_encode(array('sertifikat'=>0));
        }
        
	}
	public function load_data_generate(){
		$generate = $this->m_sertifikat->load_data_generate($this->session->userdata('kd_event_status'))->result();
	
        if ($generate) {
            echo json_encode($generate);
        }else{
            echo json_encode(array('generate'=>0));
        }
	}
	public function gantistatus()
	{
		$kd_sertifikat =trim($this->input->post('kd_sertifikat'));
		$status = trim($this->input->post('status'));
		$data = array(
			'status' => $status
		);
		$where = array(
			'kd_sertifikat' => $kd_sertifikat
		);
		$this->m_sertifikat->gantistatus($data,$where);

	}
	public function tambah_sertifikat()
	{
		$data = array(
			'kd_event' =>  trim($this->input->post('kd_event')),
			'email' =>  trim($this->input->post('email')),
			'link_sertifikat' => trim($this->input->post('link')),
			'kd_peserta' =>  trim($this->input->post('kd_peserta')),
			'nomor' =>  trim($this->input->post('nomor')),
			'status' =>  trim($this->input->post('status'))
		);
		$data2 = array(
			'link_sertifikat' => trim($this->input->post('link')),
			'nomor' =>  trim($this->input->post('nomor')),
			'status' =>  trim($this->input->post('status'))
		);
		$where = array('kd_peserta' => trim($this->input->post('kd_peserta')));
		$hasil = $this->m_sertifikat->checkSertifikat($where);
		if($hasil->num_rows() == 0){
			$this->m_sertifikat->tambah_sertifikat($data);
		}else{
			$this->m_sertifikat->ubah_sertifikat($data2,$where);		
		}
	}
	function load_data_peserta2(){
		$kd_event = $this->session->userdata('kd_event');
		$kd_admin = $this->session->userdata('kd_admin');
		$level_status = $this->session->userdata('level_status');
        $list = $this->m_peserta->get_datatables($kd_admin, $kd_event, $level_status);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $peserta) {
            $no++;
			$check = $peserta->status;
			$span;
			$btn;
			if($check =="sudah"){
               $btn ="btn-success";
               $span =" <span class='badge badge-success'>Sudah</span>";
            }else{
               $btn = "btn-danger";
                $span =" <span class='badge badge-danger'>Belum</span>";
            }
            $row = array();
            $row[] = $no;
            $row[] = $peserta->nama_lengkap;
            $row[] = $span;
			// action row 
            $row[] = '<a id="ambil-data" class="btn btn-sm '.$btn.'" data-nomor="'.$peserta->nomor.'"  data-link="'.$peserta->link.'" data-kode ="'.$peserta->kd_peserta.'" data-namap="'.$peserta->nama_lengkap.'" data-event ="'.$peserta->kd_event.'" data-nama ="'.$peserta->nama_event.'"
                	title="Tambah Sertifikat"><span class=" text-white fa fa-hand-paper"></span></a>';
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_peserta->count_all(),
                        "recordsFiltered" => $this->m_peserta->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	function import_data_sertifikat(){
	 if(isset($_FILES["import_file"]["name"])){
		 $path = $_FILES["import_file"]["tmp_name"];
		 $object = PHPExcel_IOFactory::load($path);
		 foreach($object->getWorksheetIterator() as $worksheet){
			$highestRow = $worksheet->getHighestRow();
			$highestColumn = $worksheet->getHighestColumn();
			for($row=2; $row<=$highestRow; $row++){
				$kd_sertifikat = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$kd_event = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$kd_peserta = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$nomor = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$email = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
				$status = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
				$link = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
				$data[] = array(
					'kd_peserta'   => $kd_peserta,
					'kd_event'  => $kd_event,
					'nomor'  => $nomor,
					'email'   => $email,
					'status'   => $status,
					'link_sertifikat'   => $link
					);
			 }
		}
		// echo json_encode($data);
		$this->m_sertifikat->insert_import($data);
	}
	
  }



}
