<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_email extends CI_Model {
	
	private $table_name1 = "tbl_log_email";


	public function log_email($data){
		return $this->db->insert($this->table_name1,$data);
	}
	
}
