<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_smtp extends CI_Model {
	
	private $table_name1 = "tbl_smtp_server";

	public function load_data_smtp(){
		return $this->db->query('SELECT * 
		FROM '.$this->table_name1.'
		');
	}
	public function tambah_smtp($data)
	{
		$this->db->insert($this->table_name1,$data);
	}
	public function edit_smtp($data, $where)
	{
		$this->db->where($where);
        $this->db->update($this->table_name1,$data);  
	}
	public function hapus_smtp($where){
      $this->db->where($where);
      $this->db->delete($this->table_name1);
  }
	public function get_smtp($where){
    return $this->db->get_where($this->table_name1,$where);
	}
	
}
