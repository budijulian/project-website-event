<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_merchandise extends CI_Model {
	
	private $table_name1 = "tbl_merchandise";

	public function get_merchandise(){
		return $this->db->query('SELECT * 
		FROM '.$this->table_name1.'
		ORDER BY timestamp ASC 
		');
	}
	public function get_data_merchandise($kd_merchandise){
     $where = array('kd_merchandise' => $kd_merchandise);
     return $this->db->get_where($this->table_name1,$where);
  }
	public function cari_event($katakunci){
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.'
		WHERE nama_event LIKE "%'.$katakunci.'%" ORDER BY timestamp DESC
		');
	}
	public function tambah_merchandise($data)
	{
		$this->db->insert($this->table_name1,$data);
	}
	public function edit_merchandise($data, $where)
	{
		$this->db->where($where);
        $this->db->update($this->table_name1,$data);  
	}
	public function hapus_merchandise($where){
      $this->db->where($where);
      $this->db->delete($this->table_name1);
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
