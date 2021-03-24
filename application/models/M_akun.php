<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_akun extends CI_Model {
	
	private $table_name1 = "tbl_admin";
	var $column = array('level','sebagai','status');
	var $order = array('level' => 'DESC');
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
			$this->db->order_by("level","DESC");
		}
		else{}
		return $this->db->count_all_results();
  }
  private function _get_datatables_query()
	{
		if($this->session->userdata('sebagai') =="Admin"){
    	// custom query here
			$this->db->from($this->table_name1);
			$this->db->order_by("level","DESC");
		}
		else{}
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

	public function tambah_akun($data)
	{
		$this->db->insert($this->table_name1,$data);
	}
	public function edit_akun($data, $where)
	{
		$this->db->where($where);
        $this->db->update($this->table_name1,$data);  
	}
	public function hapus_akun($where){
      $this->db->where($where);
      $this->db->delete($this->table_name1);
  }
	public function get_akun($where){
    return $this->db->get_where($this->table_name1,$where);
	}
	
}
