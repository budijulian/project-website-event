<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_informasi extends CI_Model {
	
	private $table_name1 = "tbl_informasi";

	public function load_data_informasi(){
		return $this->db->query('SELECT * 
		FROM '.$this->table_name1.'
		');
	}
	public function tambah_informasi($data)
	{
		$this->db->insert($this->table_name1,$data);
	}
	public function edit_informasi($data, $where)
	{
		$this->db->where($where);
        $this->db->update($this->table_name1,$data);  
	}
	public function hapus_informasi($where){
      $this->db->where($where);
      $this->db->delete($this->table_name1);
  }
	public function get_informasi($where){
    return $this->db->get_where($this->table_name1,$where);
	}
	
}
