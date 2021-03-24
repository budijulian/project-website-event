<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_tiket extends CI_Model {
	
	private $table_name1 = "tbl_tiket";
	private $table_name2 = "tbl_tiket_peserta";
	private $table_name3 = "tbl_peserta";
	private $table_name4 = "tbl_events";
	private $table_name5 = "tbl_level_admin";
	private $table_name6 = "tbl_panitia";
	var $column = array('tbl_tiket_peserta.kd_tiket_peserta','tbl_peserta.nama_lengkap','tbl_peserta.email');
	var $order = array('tbl_tiket_peserta.timestamp' => 'DESC');
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		    $this->search = '';

	}
	
	function get_datatables($kd_event)
	{
		$this->_get_datatables_query($kd_event);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($kd_event)
	{
		$this->_get_datatables_query($kd_event);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($kd_event)
	{
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				$this->db->select('tbl_tiket_peserta.timestamp AS waktu_daftar, tbl_tiket_peserta.kd_tiket_peserta AS kd_tiket_peserta,tbl_peserta.kd_peserta AS kd_peserta,tbl_peserta.email AS email,tbl_peserta.nama_lengkap AS nama_lengkap,tbl_peserta.instansi AS instansi');
				$this->db->from($this->table_name3);
				$this->db->join($this->table_name2,'tbl_tiket_peserta.kd_peserta = tbl_peserta.kd_peserta');
				$this->db->where('tbl_tiket_peserta.kd_event', $kd_event);
				$this->db->group_by('tbl_tiket_peserta.kd_event');
			}
			else{
				$this->db->select('tbl_tiket_peserta.timestamp AS waktu_daftar, tbl_tiket_peserta.kd_tiket_peserta AS kd_tiket_peserta,tbl_peserta.kd_peserta AS kd_peserta,tbl_peserta.email AS email,tbl_peserta.nama_lengkap AS nama_lengkap,tbl_peserta.instansi AS instansi');
				$this->db->from($this->table_name3);
				$this->db->join($this->table_name2,'tbl_tiket_peserta.kd_peserta = tbl_peserta.kd_peserta');
				$this->db->group_by('tbl_tiket_peserta.kd_event');
			}
		}
		//tidak sebagai super admin
		else{
			$kd_admin = $this->session->userdata('kd_admin');
			//  show all data 
			if($kd_event !=""){
				$this->db->select('tbl_tiket_peserta.timestamp AS waktu_daftar, tbl_tiket_peserta.kd_tiket_peserta AS kd_tiket_peserta,tbl_peserta.kd_peserta AS kd_peserta,tbl_peserta.email AS email,tbl_peserta.nama_lengkap AS nama_lengkap,tbl_peserta.instansi AS instansi');
				$this->db->from($this->table_name3);
				$this->db->join($this->table_name2,'tbl_tiket_peserta.kd_peserta = tbl_peserta.kd_peserta');
				$this->db->join($this->table_name5, 'tbl_peserta.kd_event = tbl_level_admin.kd_admin');
				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
				$this->db->where('tbl_tiket_peserta.kd_event', $kd_event);
				$this->db->group_by('tbl_tiket_peserta.kd_event');
			}
			else{
				$this->db->select('tbl_tiket_peserta.timestamp AS waktu_daftar, tbl_tiket_peserta.kd_tiket_peserta AS kd_tiket_peserta,tbl_peserta.kd_peserta AS kd_peserta,tbl_peserta.email AS email,tbl_peserta.nama_lengkap AS nama_lengkap,tbl_peserta.instansi AS instansi');
				$this->db->from($this->table_name3);
				$this->db->join($this->table_name2,'tbl_tiket_peserta.kd_peserta = tbl_peserta.kd_peserta');
				$this->db->join($this->table_name5, 'tbl_peserta.kd_event = tbl_level_admin.kd_event');
				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
				$this->db->group_by('tbl_tiket_peserta.kd_event');
			}
		}
		return $this->db->count_all_results();
  }
  private function _get_datatables_query($kd_event)
	{
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				$this->db->select('tbl_tiket_peserta.timestamp AS waktu_daftar, tbl_tiket_peserta.kd_tiket_peserta AS kd_tiket_peserta,tbl_peserta.kd_peserta AS kd_peserta,tbl_peserta.email AS email,tbl_peserta.nama_lengkap AS nama_lengkap,tbl_peserta.instansi AS instansi');
				$this->db->from($this->table_name3);
				$this->db->join($this->table_name2,'tbl_tiket_peserta.kd_peserta = tbl_peserta.kd_peserta');
				$this->db->where('tbl_tiket_peserta.kd_event', $kd_event);
				$this->db->group_by('tbl_tiket_peserta.kd_peserta');
			}
			else{
				$this->db->select('tbl_tiket_peserta.timestamp AS waktu_daftar, tbl_tiket_peserta.kd_tiket_peserta AS kd_tiket_peserta,tbl_peserta.kd_peserta AS kd_peserta,tbl_peserta.email AS email,tbl_peserta.nama_lengkap AS nama_lengkap,tbl_peserta.instansi AS instansi');
				$this->db->from($this->table_name3);
				$this->db->join($this->table_name2,'tbl_tiket_peserta.kd_peserta = tbl_peserta.kd_peserta');
				$this->db->group_by('tbl_tiket_peserta.kd_peserta');
			}
		}
		//tidak sebagai super admin
		else{
			$kd_admin = $this->session->userdata('kd_admin');
			//  show all data 
			if($kd_event !=""){
				$this->db->select('tbl_tiket_peserta.timestamp AS waktu_daftar, tbl_tiket_peserta.kd_tiket_peserta AS kd_tiket_peserta,tbl_peserta.kd_peserta AS kd_peserta,tbl_peserta.email AS email,tbl_peserta.nama_lengkap AS nama_lengkap,tbl_peserta.instansi AS instansi');
				$this->db->from($this->table_name3);
				$this->db->join($this->table_name2,'tbl_tiket_peserta.kd_peserta = tbl_peserta.kd_peserta');
				$this->db->join($this->table_name5, 'tbl_peserta.kd_event = tbl_level_admin.kd_event');
				$this->db->where('tbl_tiket_peserta.kd_event', $kd_event);
				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
				$this->db->group_by('tbl_tiket_peserta.kd_peserta');
			}
			else{
				$this->db->select('tbl_tiket_peserta.timestamp AS waktu_daftar, tbl_tiket_peserta.kd_tiket_peserta AS kd_tiket_peserta,tbl_peserta.kd_peserta AS kd_peserta,tbl_peserta.email AS email,tbl_peserta.nama_lengkap AS nama_lengkap,tbl_peserta.instansi AS instansi');
				$this->db->from($this->table_name3);
				$this->db->join($this->table_name2,'tbl_tiket_peserta.kd_peserta = tbl_peserta.kd_peserta');
				$this->db->join($this->table_name5, 'tbl_peserta.kd_event = tbl_level_admin.kd_event');
				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
				$this->db->group_by('tbl_tiket_peserta.kd_peserta');
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
	
	// menampilkan data tiket dan kondisinya
	public function get_slot_tiket($kd_event){
		return $this->db->query('SELECT *, (SELECT 
           CASE 
               WHEN COUNT(p.kd_peserta) >= e.`slot` THEN "Penuh" 
               WHEN COUNT(p.kd_peserta) <= e.`slot` THEN "Tersedia" 
           END AS status_slot_tiket 
           FROM `tbl_peserta` AS p 
           WHERE p.`kd_event` =  "'.$kd_event.'"
           AND p.`kd_tiket` = e.kd_tiket) AS status_slot_tiket
		FROM tbl_tiket AS e 
		WHERE e.`kd_event` =  "'.$kd_event.'"
		');
	}
	public function get_tiket($data){
		return $this->db->get_where($this->table_name1,$data);
	}
	public function add_data_tiket($data){
		$this->db->insert($this->table_name2,$data);
	}
	public function check_slot_tiket($kd_event){
		return $this->db->query('SELECT 
		CASE
			WHEN COUNT(p.kd_peserta) >= e.`slot` THEN "Penuh"
			WHEN COUNT(p.kd_peserta) < e.`slot` THEN "Tersedia"
		END AS status_slot_tiket
		FROM `tbl_tiket` AS e 
		JOIN tbl_peserta AS p
		ON e.`kd_tiket`  = p.kd_tiket
		WHERE e.`kd_event` = "'.$kd_event.'"
		');
	}
	
	public function kirim_invoice_tiket($kd_tiket_peserta){
	  return $this->db->query('SELECT tp.timestamp AS waktu_daftar, e.jenis_tiket AS jenis_tiket, e.nama_event AS nama_event, e.ketentuan AS ketentuan, e.dari_tanggal AS dari_tanggal, e.sampai_tanggal AS sampai_tanggal,e.lokasi AS lokasi, e.dari_jam AS dari_jam, e.sampai_jam AS sampai_jam,e.kategori AS kategori,
	  t.jenis_tiket AS jenis_tiket,t.jumlah AS jumlah, t.keterangan AS keterangan,
	  tp.kd_tiket_peserta AS kd_tiket_peserta, tp.status AS status_tiket
	  FROM '.$this->table_name2.' AS tp
	  JOIN '.$this->table_name1.' AS t
	  ON tp.kd_tiket = t.kd_tiket
	  JOIN '.$this->table_name4.' AS e
	  ON t.kd_event = e.kd_event
	  WHERE tp.kd_tiket_peserta = "'.$kd_tiket_peserta.'"
	  LIMIT 1
	  ');
  }
  public function get_tiket_peserta($where){
    return $this->db->get_where($this->table_name2,$where);
	}
// 	public function hapus_data($npm){
//       // menangkap parameter npm dari controler
//       $where = array('npm_kd'=> $npm);
//       $this->db->where($where);
//       $this->db->delete($this->table_name);
//   }


//   public function edit_data($npm){
//      $where = array('npm_kd' => $npm);
//      return $this->db->get_where($this->table_name,$where);
      
//   }
   
// //   model u/ mengubah data
//   public function update_data($where,$data,$table){
//       $this->db->where($where);
//       $this->db->update($table,$data);
//   }
}
