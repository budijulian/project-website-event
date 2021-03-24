<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pesan extends CI_Model {
	
	private $table_name1 = "tbl_events";
	

	public function tampil_event(){
		return $this->db->query('SELECT * 
		FROM '.$this->table_name1.'
		');
	}
	public function cari_event($katakunci){
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.'
		WHERE nama_event LIKE "%'.$katakunci.'%" ORDER BY timestamp DESC
		');
	}
	public function edit_data($npm){
     $where = array('npm_kd' => $npm);
     return $this->db->get_where($this->table_name,$where);
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
