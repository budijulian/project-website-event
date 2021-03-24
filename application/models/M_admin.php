<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin extends CI_Model {
	
	private $table_name1 = "tbl_admin";
	private $table_name2 = "tbl_level_admin";
	private $table_name3 = "tbl_panitia";

	public function set_login_admin($username,$pass){
		$where = array(
			'username' => $username,
			'pass' => $pass
		);
     return $this->db->get_where($this->table_name1,$where);
	}
	
	public function tambah_level_admin($data){
		$this->db->insert($this->table_name2,$data);
	}

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
