<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_panitia extends CI_Model {
	
	private $table_name1 = "tbl_panitia";
	private $table_name2 = "tbl_events";
	private $table_name3 = "tbl_level_admin";
	var $column = array('level','sebagai','status');
	var $order = array('level' => 'DESC');
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		    $this->search = '';

	}
	public function set_login_panitia($username,$pass){
		$where = array(
			'username' => $username,
			'pass' => $pass
		);
     return $this->db->get_where($this->table_name1,$where);
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
			$this->db->select("*");
			$this->db->from($this->table_name1);
			$this->db->join($this->table_name3, 'tbl_panitia.kd_admin = tbl_level_admin.kd_admin');
			$this->db->join($this->table_name2, 'tbl_events.kd_event = tbl_level_admin.kd_event');
		}
		else{}
		return $this->db->count_all_results();
  }
  private function _get_datatables_query()
	{
		if($this->session->userdata('sebagai') =="Admin"){
    	// custom query here
			$this->db->select("*");
			$this->db->from($this->table_name1);
			$this->db->join($this->table_name3, 'tbl_panitia.kd_admin = tbl_level_admin.kd_admin');
			$this->db->join($this->table_name2, 'tbl_events.kd_event = tbl_level_admin.kd_event');
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

	public function tambah_panitia($data)
	{
		$this->db->insert($this->table_name1,$data);
	}
	public function edit_panitia($data, $where)
	{
		$this->db->where($where);
        $this->db->update($this->table_name1,$data);  
	}
	public function edit_level_panitia($data, $where)
	{
		$this->db->where($where);
        $this->db->update($this->table_name3,$data);  
	}
	
	public function hapus_panitia($where){
      $this->db->where($where);
      $this->db->delete($this->table_name1);
  }
	public function get_panitia($where){
    return $this->db->get_where($this->table_name1,$where);
	}
	
}
