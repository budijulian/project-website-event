<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_sertifikat extends CI_Model {
	
	private $table_name1 = "tbl_sertifikat_peserta";
	private $table_name2 = "tbl_peserta";
	private $table_name3 = "tbl_events";
	private $table_name4 = "tbl_level_admin";
  
	public function get_sertifikat($email,$kd_event){
		return $this->db->query('SELECT sp.nomor, p.nama_lengkap, sp.link_sertifikat
		FROM '.$this->table_name1.' AS sp
		JOIN '.$this->table_name2.' AS p
		ON sp.kd_peserta = p.`kd_peserta`
		WHERE sp.email = "'.$email.'" AND sp.kd_event = "'.$kd_event.'" AND sp.status = "Aktif"
		');
	}
	
	// load data dokumentasi tergantung kondisi level admin
	public function load_data_sertifikat($kd_event){
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				return $this->db->query('SELECT sp.kd_sertifikat AS kd_sertifikat, sp.nomor AS nomor, sp.link_sertifikat AS link, sp.status AS status,p.nama_lengkap AS nama_lengkap, p.email AS email, e.nama_event AS nama_event
				FROM '.$this->table_name1.' AS sp  
				INNER JOIN '.$this->table_name2.' AS p
				ON sp.kd_peserta = p.kd_peserta      
				INNER JOIN  '.$this->table_name3.' AS e 
				ON p.kd_event = e.kd_event       
				WHERE p.kd_event = "'.$kd_event.'"
				ORDER BY sp.timestamp DESC
				');
			}else{ // semua event dokumentasi
				return $this->db->query('SELECT sp.kd_sertifikat AS kd_sertifikat, sp.nomor AS nomor, sp.link_sertifikat AS link, sp.status AS status,p.nama_lengkap AS nama_lengkap, p.email AS email, e.nama_event AS nama_event
				FROM '.$this->table_name1.' AS sp  
				INNER JOIN '.$this->table_name2.' AS p
				ON sp.kd_peserta = p.kd_peserta      
				INNER JOIN  '.$this->table_name3.' AS e 
				ON p.kd_event = e.kd_event       
				ORDER BY p.timestamp DESC
				');
			}
		} 
		else{ // level bukan admin 
			$kd_admin = $this->session->userdata('kd_admin');
			if($kd_event != ""){
				return $this->db->query('SELECT sp.kd_sertifikat AS kd_sertifikat,
				sp.nomor AS nomor, sp.link_sertifikat AS link, sp.status AS status, p.nama_lengkap AS nama_lengkap, p.email AS email, e.nama_event AS nama_event
				FROM '.$this->table_name1.' AS sp  
				INNER JOIN '.$this->table_name2.' AS p
				ON sp.kd_peserta = p.kd_peserta      
				INNER JOIN  '.$this->table_name3.' AS e 
				ON p.kd_event = e.kd_event       
				INNER JOIN  '.$this->table_name4.' AS al 
				ON al.kd_event = e.kd_event       
				WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_event = "'.$kd_event.'"
				ORDER BY sp.timestamp DESC
				');
			}else{
				return $this->db->query('SELECT sp.kd_sertifikat AS kd_sertifikat, sp.nomor AS nomor, sp.link_sertifikat AS link, sp.status AS status,p.nama_lengkap AS nama_lengkap, p.email AS email, e.nama_event AS nama_event
				FROM '.$this->table_name1.' AS sp  
				INNER JOIN '.$this->table_name2.' AS p
				ON sp.kd_peserta = p.kd_peserta      
				INNER JOIN  '.$this->table_name3.' AS e 
				ON p.kd_event = e.kd_event       
				INNER JOIN  '.$this->table_name4.' AS al 
				ON al.kd_event = e.kd_event
				WHERE al.kd_admin = "'.$kd_admin.'"     
				ORDER BY sp.timestamp DESC
				');
			}
		}
	}
	
	public function checkSertifikat($where){
    	return $this->db->get_where($this->table_name1,$where);
	}
	public function ubah_sertifikat($data, $where)
	{
		$this->db->where($where);
        $this->db->update($this->table_name1,$data);  
	}
	public function gantistatus($data, $where)
	{
		$this->db->where($where);
        $this->db->update($this->table_name1,$data);  
	}
	public function tambah_sertifikat($data)
	{
		$this->db->insert($this->table_name1,$data);
	}
	public function get_data_event(){
		if($this->session->userdata('sebagai') =="Admin"){
			return $this->db->query('SELECT e.kd_event AS kd_event, e.nama_event AS nama_event
					FROM '.$this->table_name3.' AS e
					');
		}else{
			$kd_admin = $this->session->userdata('kd_admin');
			return $this->db->query('SELECT e.kd_event AS kd_event, e.nama_event AS nama_event
					FROM '.$this->table_name3.' AS e
					JOIN '.$this->table_name4.' AS l
					ON l.kd_event = e.kd_event
					WHERE l.kd_admin =  "'.$kd_admin.'"
					');
		}
	}
	function generate_sertifikat($kd_event){
		return $this->db->query('SELECT p.kd_peserta AS kd_peserta, p.kd_event AS kd_event, p.email AS email, p.email AS email
				FROM '.$this->table_name2.' AS p
				WHERE p.kd_event = "'.$kd_event.'"
				ORDER BY p.timestamp ASC
				');
	}
	public function load_data_generate($kd_event){
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				return $this->db->query('SELECT p.kd_peserta AS kd_peserta, p.kd_event AS kd_event, p.email AS email, sp.link_sertifikat 
				FROM '.$this->table_name1.' AS sp 
				RIGHT JOIN '.$this->table_name2.' AS p 
				ON sp.kd_peserta = p.kd_peserta 
				WHERE p.kd_event = "'.$kd_event.'"
				ORDER BY sp.timestamp ASC
				');
			}else{ // semua event dokumentasi
				return $this->db->query('SELECT p.kd_peserta AS kd_peserta, p.kd_event AS kd_event, p.email AS email, sp.link_sertifikat 
				FROM '.$this->table_name1.' AS sp 
				RIGHT JOIN '.$this->table_name2.' AS p 
				ON sp.kd_peserta = p.kd_peserta 
				ORDER BY sp.timestamp ASC
				');
			}
		} 
		else{ // level bukan admin 
			$kd_admin = $this->session->userdata('kd_admin');
			if($kd_event != ""){
				return $this->db->query('SELECT p.kd_peserta AS kd_peserta, p.kd_event AS kd_event, p.email AS email, sp.link_sertifikat 
				FROM '.$this->table_name1.' AS sp 
				RIGHT JOIN '.$this->table_name2.' AS p 
				ON sp.kd_peserta = p.kd_peserta        
				INNER JOIN  '.$this->table_name4.' AS al 
				ON al.kd_event = p.kd_event       
				WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_event = "'.$kd_event.'"
				ORDER BY sp.timestamp DESC
				');
			}else{
				return $this->db->query('SELECT p.kd_peserta AS kd_peserta, p.kd_event AS kd_event, p.email AS email, sp.link_sertifikat 
				FROM '.$this->table_name1.' AS sp 
				RIGHT JOIN '.$this->table_name2.' AS p 
				ON sp.kd_peserta = p.kd_peserta        
				INNER JOIN  '.$this->table_name4.' AS al 
				ON al.kd_event = p.kd_event 
				WHERE al.kd_admin = "'.$kd_admin.'"    
				ORDER BY sp.timestamp ASC
				');
			}
		}


	}
	function insert_import($data){
		$this->db->insert_batch($this->table_name1, $data);
	}
	




	// var $column = array('nama_lengkap','status','kd_mahasiswa');
    // var $order = array('tbl_peserta.timestamp' => 'desc');
	// 	public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->database();
	// 	$this->search = '';
	// }
	 // data pendaftar aktif 
//  	function get_datatables($kd_admin, $kd_event, $level_status)
// 	{
// 		$this->_get_datatables_query($kd_admin, $kd_event, $level_status);
// 		if($_POST['length'] != -1)
// 		$this->db->limit($_POST['length'], $_POST['start']);
// 		$query = $this->db->get();
// 		return $query->result();
//   }
//   	// data pendaftar aktif 
// 	function count_filtered()
// 	{
// 		$this->_get_datatables_query();
// 		$query = $this->db->get();
// 		return $query->num_rows();
// 	}
// // data pendaftar aktif 
// 	public function count_all()
// 	{
//     $this->db->from($this->table_name1);
//     // $this->db->where('status','aktif');
// 		return $this->db->count_all_results();
//   }
//   // data pendaftar aktif 
//   private function _get_datatables_query($kd_admin, $kd_event, $level_status)
// 	{
//     // custom query here
// 		if($level_status == "Admin"){
// 			 //kondisi event
// 			if($kd_event !=""){
// 				$this->db->select(' "" AS nomor, "" AS link, tbl_peserta.`kd_peserta`, tbl_peserta.nama_lengkap AS nama_lengkap, tbl_events.nama_event AS nama_event, "belum" AS status');
// 				$this->db->from($this->table_name1);
// 				$this->db->join($this->table_name4, 'tbl_peserta.kd_event = tbl_events.kd_event');
// 				$this->db->join($this->table_name7, 'tbl_peserta.kd_peserta = tbl_sertifikat_peserta.kd_peserta');
// 				$this->db->where('tbl_peserta.kd_event', $kd_event);
// 				// $names = $this->db->query('SELECT kd_peserta FROM '.$this->table_name7);
// 				$this->db->where_not_in('tbl_peserta.kd_peserta', 'SELECT kd_peserta FROM '.$this->table_name7);
// 				$this->db->where('tbl_peserta.kd_event', $kd_event);
// 				$this->db->group_by('tbl_peserta.kd_peserta');
// 				$query1 = $this->db->get_compiled_select();

// 				$this->db->select(' tbl_sertifikat_peserta.nomor AS nomor, tbl_sertifikat_peserta.link_sertifikat AS link, tbl_peserta.`kd_peserta`, tbl_peserta.nama_lengkap AS nama_lengkap, tbl_events.nama_event AS nama_event, "sudah" AS status');
// 				$this->db->from($this->table_name1);
// 				$this->db->join($this->table_name4, 'tbl_peserta.kd_event = tbl_events.kd_event');
// 				$this->db->join($this->table_name7, 'tbl_peserta.kd_peserta = tbl_sertifikat_peserta.kd_peserta');
// 				$this->db->where('tbl_peserta.kd_event', $kd_event);
// 				$this->db->group_by('tbl_peserta.kd_peserta');
// 				$query2 = $this->db->get_compiled_select();

// 				$this->db->query($query1." UNION ".$query2);
// 				$this->db->get();
				
// 			}else{ // semua event dokumentasi
// 				$this->db->select(' "" AS nomor, "" AS link, tbl_peserta.`kd_peserta`, tbl_peserta.nama_lengkap AS nama_lengkap, tbl_events.nama_event AS nama_event, "belum" AS status');
// 				$this->db->from($this->table_name1);
// 				$this->db->join($this->table_name4, 'tbl_peserta.kd_event = tbl_events.kd_event');
// 				$this->db->join($this->table_name7, 'tbl_peserta.kd_peserta = tbl_sertifikat_peserta.kd_peserta');
// 				$this->db->where('tbl_peserta.kd_event', $kd_event);
// 				// $names = $this->db->query('SELECT kd_peserta FROM '.$this->table_name7);
// 				$this->db->where_not_in('tbl_peserta.kd_peserta', 'SELECT kd_peserta FROM '.$this->table_name7);
// 				$this->db->group_by("tbl_peserta.kd_peserta");
// 				$query1 = $this->db->get_compiled_select();

// 				$this->db->select(' tbl_sertifikat_peserta.nomor AS nomor, tbl_sertifikat_peserta.link_sertifikat AS link, tbl_peserta.`kd_peserta`, tbl_peserta.nama_lengkap AS nama_lengkap, tbl_events.nama_event AS nama_event, "sudah" AS status');
// 				$this->db->from($this->table_name1);
// 				$this->db->join($this->table_name4, 'tbl_peserta.kd_event = tbl_events.kd_event');
// 				$this->db->join($this->table_name7, 'tbl_peserta.kd_peserta = tbl_sertifikat_peserta.kd_peserta');
// 				$this->db->group_by("tbl_peserta.kd_peserta");
// 				$query2 = $this->db->get_compiled_select();

// 				$this->db->query($query1." UNION ".$query2);
// 			}
// 		} 
// 		else{ // level bukan admin 
// 			if($kd_event != ""){
// 				$this->db->select(' "" AS nomor, "" AS link, tbl_peserta.`kd_peserta`, tbl_peserta.nama_lengkap AS nama_lengkap, tbl_events.nama_event AS nama_event, "belum" AS status');
// 				$this->db->from($this->table_name1);
// 				$this->db->join($this->table_name4, 'tbl_peserta.kd_event = tbl_events.kd_event');
// 				$this->db->join($this->table_name7, 'tbl_peserta.kd_peserta = tbl_sertifikat_peserta.kd_peserta');
// 				$this->db->join($this->table_name5, 'tbl_level_admin.kd_event = tbl_events.kd_event');
// 				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
// 				$names = $this->db->query('SELECT kd_peserta FROM '.$this->table_name7);
// 				$this->db->where_not_in('tbl_peserta.kd_peserta', $names);
// 				$this->db->where('tbl_peserta.kd_event', $kd_event);
// 				$this->db->group_by("tbl_peserta.kd_peserta");
// 				$query1 = $this->db->get_compiled_select();

// 				$this->db->select(' tbl_sertifikat_peserta.nomor AS nomor, tbl_sertifikat_peserta.link AS link_sertifikat, tbl_peserta.`kd_peserta`, tbl_peserta.nama_lengkap AS nama_lengkap, tbl_events.nama_event AS nama_event, "sudah" AS status');
// 				$this->db->from($this->table_name1);
// 				$this->db->join($this->table_name4, 'tbl_peserta.kd_event = tbl_events.kd_event');
// 				$this->db->join($this->table_name7, 'tbl_peserta.kd_peserta = tbl_sertifikat_peserta.kd_peserta');
// 				$this->db->join($this->table_name5, 'tbl_level_admin.kd_event = tbl_events.kd_event');
// 				$this->db->where('tbl_peserta.kd_event', $kd_event);
// 				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
// 				$this->db->group_by("tbl_peserta.kd_peserta");
// 				$query2 = $this->db->get_compiled_select();

// 				$this->db->query($query1." UNION ".$query2);
				
				
// 			}else{
// 				$this->db->query('SELECT "" AS nomor, "" AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "belum" AS status
// 				FROM '.$this->table_name1.' AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp       
// 				INNER JOIN  '.$this->table_name5.' AS al 
// 				ON al.kd_event = e.kd_event
// 				WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_peserta NOT IN (SELECT kd_peserta FROM '.$this->table_name7.')
// 				GROUP BY  p.`kd_peserta`
//             UNION
// 				SELECT  sp.nomor AS nomor, sp.link_sertifikat AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "sudah" AS status
// 				FROM '.$this->table_name1.'  AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp
//                 ON p.kd_peserta = sp.kd_peserta       
// 				INNER JOIN  '.$this->table_name5.' AS al 
// 				ON al.kd_event = e.kd_event
// 				WHERE al.kd_admin = "'.$kd_admin.'"  
// 				GROUP BY p.`kd_peserta`
// 				');
// 			}
// 		}


// 		// $this->db->join($this->table_name2, 'tbl_data_mahasiswa.kd_periode = tbl_data_periode.kd_periode');
// 		// $this->db->where('status','aktif');
// 		$i = 0;
		
// 		foreach ($this->column as $item) 
// 		{
// 			if($_POST['search']['value'])
// 				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
// 			$column[$i] = $item;
// 			$i++;
// 		}
		
// 		if(isset($_POST['order']))
// 		{
// 			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
// 		} 
// 		else if(isset($this->order))
// 		{	
// 			$order = $this->order;
// 			$this->db->order_by(key($order), $order[key($order)]);
// 		}
//   }
//   // data pendaftar aktif 
//   private function _get_datatables_query($kd_admin, $kd_event, $level_status)
// 	{
//     // custom query here
// 		if($level_status == "Admin"){
// 			 //kondisi event
// 			if($kd_event !=""){
// 				$this->db->select(' "" AS nomor, "" AS link, tbl_peserta.`kd_peserta`, tbl_peserta.nama_lengkap AS nama_lengkap, tbl_events.nama_event AS nama_event, "belum" AS status');
// 				$this->db->from($this->table_name1);
// 				$this->db->join($this->table_name4, 'tbl_peserta.kd_event = tbl_events.kd_event');
// 				$this->db->join($this->table_name7, 'tbl_peserta.kd_peserta = tbl_sertifikat_peserta.kd_peserta');
// 				$this->db->where('tbl_peserta.kd_event', $kd_event);
// 				$names = $this->db->query('SELECT kd_peserta FROM '.$this->table_name7);
// 				$this->db->where_not_in('tbl_peserta.kd_peserta', $names);
// 				$this->db->where('tbl_peserta.kd_event', $kd_event);
// 				$this->db->group_by("tbl_peserta.kd_peserta");
// 				$query1 = $this->db->get_compiled_select();

// 				$this->db->select(' tbl_sertifikat_peserta.nomor AS nomor, tbl_sertifikat_peserta.link AS link, tbl_peserta.`kd_peserta`, tbl_peserta.nama_lengkap AS nama_lengkap, tbl_events.nama_event AS nama_event, "sudah" AS status');
// 				$this->db->from($this->table_name1);
// 				$this->db->join($this->table_name4, 'tbl_peserta.kd_event = tbl_events.kd_event');
// 				$this->db->join($this->table_name7, 'tbl_peserta.kd_peserta = tbl_sertifikat_peserta.kd_peserta');
// 				$this->db->where('tbl_peserta.kd_event', $kd_event);
// 				$this->db->group_by("tbl_peserta.kd_peserta");
// 				$query2 = $this->db->get_compiled_select();

// 				$this->db->query($query1." UNION ".$query2);
// 				$this->db->query('SELECT "" AS nomor, "" AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "belum" AS status
// 				FROM '.$this->table_name1.' AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp
// 				WHERE p.kd_event = "'.$kd_event.'" AND p.kd_peserta NOT IN (SELECT kd_peserta FROM '.$this->table_name7.')
// 				GROUP BY  p.`kd_peserta`
//             UNION
// 				SELECT  sp.nomor AS nomor, sp.link_sertifikat AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "sudah" AS status
// 				FROM '.$this->table_name1.'  AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp
//                 ON p.kd_peserta = sp.kd_peserta
// 				WHERE p.kd_event = "'.$kd_event.'" 
// 				GROUP BY p.`kd_peserta`
// 				');
// 			}else{ // semua event dokumentasi
				
// 				$names = array('Frank', 'Todd', 'James');
// 				$this->db->or_where_not_in('username', $names);
				
// 				$this->db->query('SELECT "" AS nomor, "" AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "belum" AS status
// 				FROM '.$this->table_name1.' AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp
// 				WHERE  p.kd_peserta NOT IN (SELECT kd_peserta FROM '.$this->table_name7.')
// 				GROUP BY  p.`kd_peserta`
//             UNION
// 				SELECT  sp.nomor AS nomor, sp.link_sertifikat AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "sudah" AS status
// 				FROM '.$this->table_name1.'  AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp
//                 ON p.kd_peserta = sp.kd_peserta
// 				GROUP BY p.`kd_peserta`
// 				');
// 			}
// 		} 
// 		else{ // level bukan admin 
// 			if($kd_event != ""){
// 				$this->db->query('SELECT "" AS nomor, "" AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "belum" AS status
// 				FROM '.$this->table_name1.' AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp       
// 				INNER JOIN  '.$this->table_name5.' AS al 
// 				ON al.kd_event = e.kd_event
// 				WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_event = "'.$kd_event.'" AND p.kd_peserta NOT IN (SELECT kd_peserta FROM '.$this->table_name7.')
// 				GROUP BY  p.`kd_peserta`
//             UNION
// 				SELECT  sp.nomor AS nomor, sp.link_sertifikat AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "sudah" AS status
// 				FROM '.$this->table_name1.'  AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp
//                 ON p.kd_peserta = sp.kd_peserta       
// 				INNER JOIN  '.$this->table_name5.' AS al 
// 				ON al.kd_event = e.kd_event
// 				WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_event = "'.$kd_event.'" 
// 				GROUP BY p.`kd_peserta`
// 				');
// 			}else{
// 				$this->db->query('SELECT "" AS nomor, "" AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "belum" AS status
// 				FROM '.$this->table_name1.' AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp       
// 				INNER JOIN  '.$this->table_name5.' AS al 
// 				ON al.kd_event = e.kd_event
// 				WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_peserta NOT IN (SELECT kd_peserta FROM '.$this->table_name7.')
// 				GROUP BY  p.`kd_peserta`
//             UNION
// 				SELECT  sp.nomor AS nomor, sp.link_sertifikat AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, e.nama_event AS nama_event, "sudah" AS status
// 				FROM '.$this->table_name1.'  AS p
//                 JOIN '.$this->table_name4.' AS e
//                 ON p.kd_event = e.kd_event
// 				JOIN '.$this->table_name7.' AS sp
//                 ON p.kd_peserta = sp.kd_peserta       
// 				INNER JOIN  '.$this->table_name5.' AS al 
// 				ON al.kd_event = e.kd_event
// 				WHERE al.kd_admin = "'.$kd_admin.'"  
// 				GROUP BY p.`kd_peserta`
// 				');
// 			}
// 		}



// 		// $this->db->select('*');
// 		// $this->db->from($this->table_name);
// 		// $this->db->join($this->table_name2, 'tbl_data_mahasiswa.kd_periode = tbl_data_periode.kd_periode');
// 		// $this->db->where('status','aktif');
// 		$i = 0;
	
// 		foreach ($this->column as $item) 
// 		{
// 			if($_POST['search']['value'])
// 				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
// 			$column[$i] = $item;
// 			$i++;
// 		}
		
// 		if(isset($_POST['order']))
// 		{
// 			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
// 		} 
// 		else if(isset($this->order))
// 		{
// 			$order = $this->order;
// 			$this->db->order_by(key($order), $order[key($order)]);
// 		}
//   }
}
