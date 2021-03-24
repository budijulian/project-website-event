<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_events extends CI_Model {
	
	private $table_name1 = "tbl_events";
	private $table_name2 = "tbl_tiket";
	private $table_name3 = "tbl_format_konfirmasi";
	private $table_name4 = "tbl_level_admin";
	private $table_name5 = "tbl_admin";
	private $table_name6 = "tbl_sub_events";
	private $table_name7 = "tbl_panitia";
	var $column = array('nama_event','kategori','dari_tanggal','jenis_tiket','keterangan','kd_event');
	var $order = array('dari_tanggal' => 'DESC');
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		    $this->search = '';

	}
	// /khusus admin
	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		if($this->session->userdata('sebagai') =="Admin"){
    	// custom query here
			$this->db->from($this->table_name1);
			$this->db->order_by("dari_tanggal","DESC");
		}
		else if($this->session->userdata('sebagai') !="Admin"){
			$this->db->from($this->table_name7);
			$this->db->join($this->table_name4, 'tbl_panitia.kd_admin = tbl_level_admin.kd_admin');
			$this->db->join($this->table_name1, 'tbl_events.kd_event = tbl_level_admin.kd_event');
			$this->db->where('tbl_level_admin.kd_admin', $this->session->userdata('kd_admin'));
			$this->db->order_by("dari_tanggal","DESC");
		}
		return $this->db->count_all_results();
  }
  private function _get_datatables_query()
	{
		if($this->session->userdata('sebagai') =="Admin"){
    	// custom query here
			$this->db->from($this->table_name1);
			$this->db->order_by("dari_tanggal","DESC");
		}
		else if($this->session->userdata('sebagai') !="Admin"){
			$this->db->from($this->table_name7);
			$this->db->join($this->table_name4, 'tbl_panitia.kd_admin = tbl_level_admin.kd_admin');
			$this->db->join($this->table_name1, 'tbl_events.kd_event = tbl_level_admin.kd_event');
			$this->db->where('tbl_level_admin.kd_admin', $this->session->userdata('kd_admin'));
			$this->db->order_by("dari_tanggal","DESC");
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

	public function tampil_event(){
		return $this->db->query('SELECT * 
		FROM '.$this->table_name1.'
		WHERE tampil ="Iya"
		');
	}
	public function cari_event($katakunci){
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.' AS e
		JOIN '.$this->table_name6.' AS u
		ON e.kd_event = u.kd_event
		WHERE tampil ="Iya" AND nama_event LIKE "%'.$katakunci.'%" OR
		kategori LIKE "%'.$katakunci.'%" OR
		jenis_tiket LIKE "%'.$katakunci.'%" 
		ORDER BY timestamp DESC
		');
	}
	public function get_event_terbaru(){
		$tanggal_now = date('Y-m-d');
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.' AS e
		JOIN '.$this->table_name6.' AS u
		ON e.kd_event = u.kd_event
		WHERE tampil ="Iya" AND dari_tanggal >= '.$tanggal_now.' ORDER BY dari_tanggal DESC LIMIT 3
		');
	}
	public function get_event($kategori,$jenis_tiket){
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.' AS e
		JOIN '.$this->table_name6.' AS u
		ON e.kd_event = u.kd_event
		WHERE tampil ="Iya" AND kategori LIKE "%'.$kategori.'%" AND jenis_tiket LIKE "%'.$jenis_tiket.'%" ORDER BY dari_tanggal DESC
		');
	}
	public function get_data_event($kd_event){
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.' AS e
		JOIN '.$this->table_name6.' AS u
		ON e.kd_event = u.kd_event
		WHERE e.kd_event = "'.$kd_event.'" 
		');
	}
	
	public function get_data_konfirmasi($kd_konfirmasi){
		return $this->db->query('SELECT *
		FROM '.$this->table_name2.' AS t
		INNER JOIN '.$this->table_name3.' AS k
		ON t.kd_tiket = k.kd_tiket
		WHERE k.kd_konfirmasi = "'.$kd_konfirmasi.'"
		');
	}
	public function get_konfirmasi($where){
		return $this->db->get_where($this->table_name3,$where);
	}
	public function get_data_tiket($where){
		return $this->db->get_where($this->table_name1,$where);
	}
	
	//   model u/ mengubah data
  public function gantistatus($where, $data){
	$this->db->where($where);
	$this->db->update($this->table_name1, $data);
  }
  public function ubah_url_event($data, $where){
	$this->db->where($where);
	$this->db->update($this->table_name6, $data);
  }
  public function ubah_detail_event($data, $where){
	$this->db->where($where);
	$this->db->update($this->table_name1, $data);
  }
  public function tambah_detail_event($data){
	$this->db->insert($this->table_name1, $data);
  }
  public function tambah_url_event($data){
	$this->db->insert($this->table_name6, $data);
  }
  public function tambah_level_event($data){
	$this->db->insert($this->table_name4, $data);
  }
   public function tambah_kategori_tiket($data){
	$this->db->insert($this->table_name2, $data);
  }
  
  public function ubah_kategori_tiket($data, $where){
	$this->db->where($where);
	$this->db->update($this->table_name2, $data);
  }
  public function hapus_kategori_tiket($where){
		$this->db->where($where);
        $this->db->delete($this->table_name2);
	}

  public function hapus_event($where){
		$this->db->where($where);
        $this->db->delete($this->table_name1);
	}
  
 	 public function get_kategori_tiket($kd_event){
		return $this->db->query('SELECT *
		FROM '.$this->table_name2.'
		WHERE kd_event = "'.$kd_event.'"
		ORDER BY timestamp ASC
		');
	}
	public function get_konfirmasi_tiket($kd_event){
		return $this->db->query('SELECT *
		FROM '.$this->table_name2.' AS t
		INNER JOIN '.$this->table_name3.' AS k
		ON t.kd_tiket = k.kd_tiket
		WHERE k.kd_event = "'.$kd_event.'"
		');
	}
	public function tambah_konfirmasi_tiket($data){
		$this->db->insert($this->table_name3, $data);
  }
	public function edit_konfirmasi_tiket($data, $where){
		$this->db->where($where);
		$this->db->update($this->table_name3, $data);
  	}
	  
  public function hapus_konfigurasi_event($where){
		$this->db->where($where);
        $this->db->delete($this->table_name1);
		$this->db->where($where);
        $this->db->delete($this->table_name2);
		$this->db->where($where);
        $this->db->delete($this->table_name3);
  	}
	public function get_url_name_event($url){
    	return $this->db->get_where($this->table_name6,array('url_name' => $url));
	}
	
	public function get_event_panitia($kd_admin){
		$query = $this->db->query('SELECT e.kd_event, e.nama_event, e.kategori, e.dari_tanggal, e.jenis_tiket, e.keterangan
		FROM '.$this->table_name7.' AS pt
		JOIN '.$this->table_name4.' AS l
		ON pt.kd_admin = l.kd_admin 
		JOIN '.$this->table_name1.' AS e
		ON e.kd_event = l.kd_event
		WHERE l.kd_admin = "'.$kd_admin.'" 
		');
		return $query;
	}

}
