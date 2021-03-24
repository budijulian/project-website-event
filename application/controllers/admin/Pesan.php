<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_pesan');
		$this->load->model('m_smtp');
		if($this->session->userdata('status')){}
		else{
			redirect("admin/login"); 
		}

	}
	
		public function index()
	{
		$data['title'] = "Kirim Pesan";
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/pesan');
		$this->load->view('admin/footer');

	}
	public function tp_tambah()
	{

		
		$data['title'] = "Kirim Pesan";
		//halaman utama admin
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/pages/t_pesan');
		$this->load->view('admin/footer');

	}
	public function set_pesan(){
		$smtp = $this->m_smtp->get_smtp(array('status' => 'aktif'));  
		$new_smtp =  $smtp->row_array();         
		// simpen data pesan
		$data = array(
			'email' => $_POST['email_pesan'],
			'pesan' => $_POST['text_pesan'],
			'subjek' => $_POST['subjek_pesan']
		);
        	$config = [
            'protocol'  => 'smtp',
            'smtp_pass' => $new_smtp['pass_server'],
            'smtp_user' => $new_smtp['user_server'],
            'smtp_host' => $new_smtp['host_server'],
            'smtp_port' => $new_smtp['port_server'],
            // 'smtp_crypto' => 'ssl',
            'smtp_timeout' => 30,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
		];
		//kontanta email admin
		//$email_admin = "budijulian96@gmail.com";
		$email_admin = "himasi@student.unas.ac.id";

        $this->email->initialize($config);
        $this->email->from($email_admin, "PANITIA HIMASI UNAS" );
        $this->email->to($data['email']);
        // $this->email->attach('');
        $this->email->subject($data['subjek']);
		$this->email->message($data['pesan']);


        if ($this->email->send()) {
			# code...
          //echo 'Berhasil';
        } else {
            //echo 'Gagal';
            die;
        }
	}
	
	
}
