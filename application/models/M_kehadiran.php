<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kehadiran extends CI_Model {
	
	private $table_name1 = "tbl_events";
	private $table_name2 = "tbl_tiket";
	private $table_name3 = "tbl_format_konfirmasi";
	private $table_name4 = "tbl_level_admin";
	private $table_name5 = "tbl_admin";
	private $table_name6 = "tbl_absensi_peserta";
	private $table_name7 = "tbl_peserta";
	private $table_name8 = "tbl_tiket_peserta";
	private $table_name9 = "tbl_panitia";
	var $column = array('tbl_events.nama_event','tbl_peserta.email','tbl_peserta.nama_lengkap','tbl_peserta.instansi');
    var $order = array('tbl_peserta.timestamp' => 'desc');
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->search = '';
	}

//   data hadir 
 function get_datatables($kd_event)
	{
		$this->_get_datatables_query($kd_event);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
//  data  hadir 
	function count_filtered($kd_event)
	{
		$this->_get_datatables_query($kd_event);
		$query = $this->db->get();
		return $query->num_rows();
	}
//  data  hadir  
	public function count_all($kd_event)
	{
		// custom query here
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				$this->db->select('tbl_events.nama_event AS nama_event,tbl_absensi_peserta.timestamp AS timestamp, tbl_absensi_peserta.email AS email,tbl_absensi_peserta.nama_lengkap AS nama_lengkap, tbl_absensi_peserta.instansi AS instansi,tbl_absensi_peserta.kd_peserta AS kd_peserta');
				$this->db->from($this->table_name6);
				$this->db->join($this->table_name7, 'tbl_absensi_peserta.kd_peserta = tbl_peserta.kd_peserta','left');
				$this->db->join($this->table_name1, 'tbl_peserta.kd_event = tbl_events.kd_event');
				$this->db->where('tbl_peserta.kd_event',$kd_event);
				$this->db->group_by("tbl_peserta.kd_peserta");

			}else{ // semua event kehadiran
				$this->db->select('tbl_events.nama_event AS nama_event,tbl_absensi_peserta.timestamp AS timestamp, tbl_absensi_peserta.email AS email,tbl_absensi_peserta.nama_lengkap AS nama_lengkap, tbl_absensi_peserta.instansi AS instansi,tbl_absensi_peserta.kd_peserta AS kd_peserta');
				$this->db->from($this->table_name6);
				$this->db->join($this->table_name7, 'tbl_absensi_peserta.kd_peserta = tbl_peserta.kd_peserta','left');
				$this->db->join($this->table_name1, 'tbl_peserta.kd_event = tbl_events.kd_event');
				$this->db->group_by("tbl_peserta.kd_peserta");
			}
		} 
		else{ // level bukan admin 
			$kd_admin = $this->session->userdata('kd_admin');
			if($kd_event != ""){
				$this->db->select('tbl_events.nama_event AS nama_event,tbl_absensi_peserta.timestamp AS timestamp, tbl_absensi_peserta.email AS email,tbl_absensi_peserta.nama_lengkap AS nama_lengkap, tbl_absensi_peserta.instansi AS instansi,tbl_absensi_peserta.kd_peserta AS kd_peserta');
				$this->db->from($this->table_name6);
				$this->db->join($this->table_name7, 'tbl_absensi_peserta.kd_peserta = tbl_peserta.kd_peserta','left');
				$this->db->join($this->table_name1, 'tbl_peserta.kd_event = tbl_events.kd_event');
				$this->db->join($this->table_name4, 'tbl_level_admin.kd_event = tbl_events.kd_event');
				$this->db->where('tbl_peserta.kd_event',$kd_event);
				$this->db->where('tbl_level_admin.kd_admin',$kd_admin);
				$this->db->group_by("tbl_peserta.kd_peserta");

			}else{
				$this->db->select('tbl_events.nama_event AS nama_event,tbl_absensi_peserta.timestamp AS timestamp, tbl_absensi_peserta.email AS email,tbl_absensi_peserta.nama_lengkap AS nama_lengkap, tbl_absensi_peserta.instansi AS instansi,tbl_absensi_peserta.kd_peserta AS kd_peserta');
				$this->db->from($this->table_name6);
				$this->db->join($this->table_name7, 'tbl_absensi_peserta.kd_peserta = tbl_peserta.kd_peserta','left');
				$this->db->join($this->table_name1, 'tbl_peserta.kd_event = tbl_events.kd_event');
				$this->db->join($this->table_name4, 'tbl_level_admin.kd_event = tbl_events.kd_event');
				$this->db->where('tbl_level_admin.kd_admin',$kd_admin);
				$this->db->group_by("tbl_peserta.kd_peserta");
			}
		}	
		return $this->db->count_all_results();
  }
  // data  data  hadir 
  private function _get_datatables_query($kd_event)
	{
    	// custom query here
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				$this->db->select('tbl_events.nama_event AS nama_event,tbl_absensi_peserta.timestamp AS timestamp, tbl_absensi_peserta.email AS email,tbl_absensi_peserta.nama_lengkap AS nama_lengkap, tbl_absensi_peserta.instansi AS instansi,tbl_absensi_peserta.kd_peserta AS kd_peserta');
				$this->db->from($this->table_name6);
				$this->db->join($this->table_name7, 'tbl_absensi_peserta.kd_peserta = tbl_peserta.kd_peserta','left');
				$this->db->join($this->table_name1, 'tbl_peserta.kd_event = tbl_events.kd_event');
				$this->db->where('tbl_peserta.kd_event',$kd_event);
				$this->db->group_by("tbl_peserta.kd_peserta");

			}else{ // semua event kehadiran
				$this->db->select('tbl_events.nama_event AS nama_event,tbl_absensi_peserta.timestamp AS timestamp, tbl_absensi_peserta.email AS email,tbl_absensi_peserta.nama_lengkap AS nama_lengkap, tbl_absensi_peserta.instansi AS instansi,tbl_absensi_peserta.kd_peserta AS kd_peserta');
				$this->db->from($this->table_name6);
				$this->db->join($this->table_name7, 'tbl_absensi_peserta.kd_peserta = tbl_peserta.kd_peserta','left');
				$this->db->join($this->table_name1, 'tbl_peserta.kd_event = tbl_events.kd_event');
				$this->db->group_by("tbl_peserta.kd_peserta");
			}
		} 
		else{ // level bukan admin 
			$kd_admin = $this->session->userdata('kd_admin');
			if($kd_event != ""){
				$this->db->select('tbl_events.nama_event AS nama_event,tbl_absensi_peserta.timestamp AS timestamp, tbl_absensi_peserta.email AS email,tbl_absensi_peserta.nama_lengkap AS nama_lengkap, tbl_absensi_peserta.instansi AS instansi,tbl_absensi_peserta.kd_peserta AS kd_peserta');
				$this->db->from($this->table_name6);
				$this->db->join($this->table_name7, 'tbl_absensi_peserta.kd_peserta = tbl_peserta.kd_peserta','left');
				$this->db->join($this->table_name1, 'tbl_peserta.kd_event = tbl_events.kd_event');
				$this->db->join($this->table_name4, 'tbl_level_admin.kd_event = tbl_events.kd_event');
				$this->db->where('tbl_peserta.kd_event',$kd_event);
				$this->db->where('tbl_level_admin.kd_admin',$kd_admin);
				$this->db->group_by("tbl_peserta.kd_peserta");

			}else{
				$this->db->select('tbl_events.nama_event AS nama_event,tbl_absensi_peserta.timestamp AS timestamp, tbl_absensi_peserta.email AS email,tbl_absensi_peserta.nama_lengkap AS nama_lengkap, tbl_absensi_peserta.instansi AS instansi,tbl_absensi_peserta.kd_peserta AS kd_peserta');
				$this->db->from($this->table_name6);
				$this->db->join($this->table_name7, 'tbl_absensi_peserta.kd_peserta = tbl_peserta.kd_peserta','left');
				$this->db->join($this->table_name1, 'tbl_peserta.kd_event = tbl_events.kd_event');
				$this->db->join($this->table_name4, 'tbl_level_admin.kd_event = tbl_events.kd_event');
				$this->db->where('tbl_level_admin.kd_admin',$kd_admin);
				$this->db->group_by("tbl_peserta.kd_peserta");
			}
		}

		$i = 0;
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
  }

	public function load_nama_event(){
		return $this->db->query('SELECT nama_event
		FROM '.$this->table_name1.'
		ORDER BY timestamp ASC
		');
	}
	public function get_kehadiran_peserta_event($kd_peserta){
	return $this->db->query('SELECT t.kd_tiket, e.kd_event, p.kd_peserta, e.nama_event, tp.kd_tiket_peserta,tp.timestamp,tp.status,t.jenis_tiket,p.nama_lengkap, p.jurusan,p.instansi,p.email
		FROM '.$this->table_name7.' AS p
		JOIN '.$this->table_name1.' AS e
		ON p.kd_event = e.kd_event
		JOIN '.$this->table_name8.' AS tp
		ON p.kd_peserta = tp.kd_peserta
		JOIN '.$this->table_name2.' AS t
		ON tp.kd_tiket = t.kd_tiket
		WHERE p.kd_peserta ="'.$kd_peserta.'"
		');
	}
	public function get_event_terbaru($tanggal_now){
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.'
		WHERE dari_tanggal >= '.$tanggal_now.' ORDER BY dari_tanggal DESC LIMIT 3
		');
	}
	public function get_event($kategori,$jenis_tiket){
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.'
		WHERE kategori LIKE "%'.$kategori.'%" AND jenis_tiket LIKE "%'.$jenis_tiket.'%" ORDER BY dari_tanggal DESC
		');
	}
	public function set_data_kehadiran($data){
		return $this->db->insert($this->table_name6,$data);
	}
	public function get_data_kehadiran($where){
		return $this->db->get_where($this->table_name6,$where);
	}
	public function get_data_peserta_absen($email,$kd_event){
			$query = $this->db->query('SELECT *
			FROM '.$this->table_name7.'
			WHERE email LIKE "%'.$email.'%" AND kd_event = "'.$kd_event.'"
			LIMIT 1');
			return $query;
	}

//khusus admin
	public function get_event_all(){
		$this->db->select('*');
        $this->db->from($this->table_name1);
		$query = $this->db->get();
		
		return $query->result_array();
		
	}
	public function get_kehadiran($kd_event){
		$query =  $this->db->query('SELECT *
		FROM '.$this->table_name6.' AS a
		WHERE a.kd_event = "'.$kd_event.'" 
		');
		
		return $query->result_array();
		
	}
	public function checkKehadiran($where){
		return $this->db->get_where($this->table_name6,$where);
	}
	public function get_data_peserta($kd_tiket_peserta){
	return $this->db->query('SELECT p.kd_peserta AS kd_peserta, p.kd_event AS kd_event, p.email AS email, p.nama_lengkap AS nama_lengkap, p.jalur AS jalur, p.nim AS nim,p.jurusan AS jurusan,p.instansi AS instansi, p.no_hp AS no_hp,
			  tp.timestamp AS waktu_daftar,tp.kd_tiket_peserta AS kd_tiket_peserta,tp.status AS statusP, tp.diskon AS diskon,tp.bukti_bayar AS bukti_bayar, tp.bayar AS bayar,t.jenis_tiket AS jenis_tiket, t.jumlah AS jumlah,
			  e.nama_event AS nama_event, e.dari_tanggal AS dari_tanggal, e.sampai_tanggal AS sampai_tanggal, e.dari_jam AS dari_jam, e.sampai_jam AS sampai_jam, e.lokasi AS lokasi, e.penyelenggara AS penyelenggara
			  FROM tbl_peserta AS p 
			  LEFT JOIN tbl_tiket t  
			  ON p.`kd_tiket` = t.kd_tiket 
			  LEFT JOIN tbl_tiket_peserta AS tp 
			  ON p.`kd_peserta` = tp.kd_peserta
			  LEFT JOIN tbl_events AS e 
			  ON tp.kd_event = e.kd_event 
			  WHERE tp.kd_tiket_peserta = "'.$kd_tiket_peserta.'"
	  ');
 }
public function exportDataKehadiranList($kd_event){
	if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				$query =  $this->db->query('SELECT p.timestamp AS timestamp, p.ket_kehadiran AS status, p.email AS email, p.nama_lengkap AS nama_lengkap, p.instansi AS instansi,
					e.nama_event AS nama_event
					FROM '.$this->table_name6.' AS p
                	INNER JOIN '.$this->table_name1.' AS e
					ON e.kd_event = p.kd_event 
					WHERE p.kd_event = "'.$kd_event.'" 
					GROUP BY p.`kd_peserta`
				');
			}else{ // semua event dokumentasi
				$query =  $this->db->query('SELECT p.timestamp AS timestamp, p.ket_kehadiran AS status, p.email AS email, p.nama_lengkap AS nama_lengkap, p.instansi AS instansi,
					e.nama_event AS nama_event
					FROM '.$this->table_name6.' AS p
                	INNER JOIN '.$this->table_name1.' AS e
					ON e.kd_event = p.kd_event 
					GROUP BY p.`kd_peserta`
				');
			}
		} 
		else{ // level bukan admin 
			$kd_admin = $this->session->userdata('kd_admin');
			if($kd_event != ""){
				$query =  $this->db->query('SELECT p.timestamp AS timestamp, p.ket_kehadiran AS status, p.email AS email, p.nama_lengkap AS nama_lengkap, p.instansi AS instansi,
					e.nama_event AS nama_event
					FROM '.$this->table_name6.' AS p
                	INNER JOIN '.$this->table_name1.' AS e
					ON e.kd_event = p.kd_event
					INNER JOIN  '.$this->table_name4.' AS al 
					ON al.kd_event = e.kd_event
					WHERE p.kd_event = "'.$kd_event.'" AND  al.kd_admin = "'.$kd_admin.'" 
					GROUP BY p.`kd_peserta`
				');
			}else{
				$query =  $this->db->query('SELECT p.timestamp AS timestamp, p.ket_kehadiran AS status, p.email AS email, p.nama_lengkap AS nama_lengkap, p.instansi AS instansi,
					e.nama_event AS nama_event
					FROM '.$this->table_name6.' AS p
                	INNER JOIN '.$this->table_name1.' AS e
					ON e.kd_event = p.kd_event
					INNER JOIN  '.$this->table_name4.' AS al 
					ON al.kd_event = e.kd_event
					WHERE al.kd_admin = "'.$kd_admin.'" 
					GROUP BY p.`kd_peserta`
				');
			}
		}
	 return $query->result();
}
 public function set_hapuspeserta($where){
	// table data kehadiran peserta
	$this->db->where($where);
    $this->db->delete($this->table_name6);
  }
}
