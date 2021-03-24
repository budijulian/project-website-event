<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model {
	
	private $table_name1 = "log_ip";
	private $table_name2 = "tbl_events";
	private $table_name3 = "tbl_merchandise";
	private $table_name4 = "tbl_peserta";

	public function check_ip($ip){
		$data = array(
			'ip' => $ip,
			'aktif_terakhir' => date('Y-m-d')
		);
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.'
		WHERE aktif_terakhir LIKE "%'.date('Y-m-d').'%" AND ip = "'.$ip.'"
		');
	}
	public function add_ip_user($data){
		return $this->db->insert($this->table_name1,$data);
	}
	public function update_data($where,$data){
      $this->db->where($where);
      $this->db->update($this->table_name1,$data);
    }
	public function t_events(){
		return $this->db->query('SELECT 
		COUNT(e.kd_event) AS t_event 
		FROM '.$this->table_name2.' AS e
		WHERE e.tampil ="Iya"');
	}
	public function t_merchandise(){
		return $this->db->query('SELECT 
		COUNT(m.kd_merchandise) AS t_merc
		FROM '.$this->table_name3.' AS m');
	}
	public function t_ip(){
		return $this->db->query('SELECT 
		COUNT(ip.NO) AS t_ip
		FROM '.$this->table_name1.' AS ip');
	}
	public function t_peserta(){
		return $this->db->query('SELECT 
		 COUNT(p.kd_peserta) AS t_p
		FROM '.$this->table_name4.' AS p');
	}
}
