<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_dokumentasi extends CI_Model {
	
	private $table_name1 = "tbl_dokumentasi";
	private $table_name2 = "tbl_events";
	private $table_name3 = "tbl_level_admin";

	public function get_dokumentasi($where){
		$this->db->order_by('timestamp', 'DESC');
		return $this->db->get_where($this->table_name1,$where);
	}
	// load data dokumentasi tergantung kondisi level admin
	public function load_data_dokumentasi($kd_event){
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				return $this->db->query('SELECT e.nama_event AS nama_event, e.kd_event AS kd_event, dp.kd_dokumentasi AS kd_dokumentasi, dp.timestamp AS waktu_upload, dp.judul AS judul, dp.status AS status
				FROM '.$this->table_name1.' AS dp  
				JOIN '.$this->table_name2.' AS e
				ON dp.kd_event = e.kd_event              
				WHERE dp.kd_event = "'.$kd_event.'"
				ORDER BY dp.timestamp DESC
				');
			}else{ // semua event dokumentasi
				return $this->db->query('SELECT e.nama_event AS nama_event, e.kd_event AS kd_event, dp.kd_dokumentasi AS kd_dokumentasi, dp.timestamp AS waktu_upload, dp.judul AS judul, dp.status AS status
				FROM '.$this->table_name1.' AS dp
				INNER JOIN '.$this->table_name2.' AS e
				ON dp.kd_event = e.kd_event
				ORDER BY dp.timestamp DESC 
				');
			}
		} 
		else{ 
			// level bukan admin 
			$kd_admin = $this->session->userdata('kd_admin');
			if($kd_event != ""){
				return $this->db->query('SELECT e.nama_event AS nama_event, e.kd_event AS kd_event, dp.kd_dokumentasi AS kd_dokumentasi, dp.timestamp AS waktu_upload, dp.judul AS judul, dp.status AS status
				FROM '.$this->table_name1.' AS dp
				INNER JOIN '.$this->table_name2.' AS e
				ON dp.kd_event = e.kd_event
				INNER JOIN '.$this->table_name3.' AS al
				ON e.kd_event = al.kd_event
				WHERE al.kd_admin = "'.$kd_admin.'" AND dp.kd_event = "'.$kd_event.'"
				ORDER BY dp.timestamp DESC
				');
			}else{
				return $this->db->query('SELECT e.nama_event AS nama_event, e.kd_event AS kd_event, dp.kd_dokumentasi AS kd_dokumentasi, dp.timestamp AS waktu_upload, dp.judul AS judul, dp.status AS status
				FROM '.$this->table_name1.' AS dp
				INNER JOIN '.$this->table_name2.' AS e
				ON dp.kd_event = e.kd_event
				INNER JOIN '.$this->table_name3.' AS al
				ON e.kd_event = al.kd_event
				WHERE al.kd_admin = "'.$kd_admin.'"
				ORDER BY dp.timestamp DESC
				');
			}
		}
	}
	public function tambah_dokumentasi($data)
	{
		$this->db->insert($this->table_name1,$data);
	}
	public function edit_dokumentasi($data, $where)
	{
		$this->db->where($where);
        $this->db->update($this->table_name1,$data);  
	}
	public function hapus_dokumentasi($where){
      $this->db->where($where);
      $this->db->delete($this->table_name1);
  }
	
}
