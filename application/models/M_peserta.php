<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_peserta extends CI_Model {
	
	private $table_name1 = "tbl_peserta";
	private $table_name2 = "tbl_calon_peserta";
	private $table_name3 = "tbl_tiket_peserta";
	private $table_name4 = "tbl_events";
	private $table_name5 = "tbl_level_admin";
	private $table_name6 = "tbl_tiket";
	private $table_name7 = "tbl_sertifikat_peserta";
	private $table_name8 = "tbl_absensi_peserta";
	
	var $column = array('email','nama_lengkap','instansi','nama_event');
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		    $this->search = '';

	}	
	// /khusus admin
	function get_datatables($kd_event,$table)
	{
		$this->_get_datatables_query($kd_event,$table);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($kd_event,$table)
	{
		$this->_get_datatables_query($kd_event,$table);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($kd_event,$table)
	{
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				$this->db->select($table.'.kd_peserta AS kd_peserta,'.$table.'.timestamp AS waktu_daftar,'.$table.'.email AS email,'.$table.'.nama_lengkap AS nama_lengkap,'.$table.'.instansi AS instansi, tbl_events.nama_event AS nama_event');
				$this->db->from($table);
				$this->db->join($this->table_name4, $table.'.kd_event = tbl_events.kd_event');
				$this->db->where($table.'.kd_event', $kd_event);
				$this->db->group_by($table.'.kd_peserta');
			}
			else{
				$this->db->select($table.'.kd_peserta AS kd_peserta,'.$table.'.timestamp AS waktu_daftar,'.$table.'.email AS email,'.$table.'.nama_lengkap AS nama_lengkap,'.$table.'.instansi AS instansi');
				$this->db->from($table);
				$this->db->join($this->table_name4, $table.'.kd_event = tbl_events.kd_event');
				$this->db->group_by($table.'.kd_peserta');
			}
		}
		//tidak sebagai super admin
		else{
			$kd_admin = $this->session->userdata('kd_admin');
			//  show all data 
			if($kd_event !=""){
				$this->db->select($table.'.kd_peserta AS kd_peserta,'.$table.'.timestamp AS waktu_daftar,'.$table.'.email AS email,'.$table.'.nama_lengkap AS nama_lengkap,'.$table.'.instansi AS instansi, tbl_events.nama_event AS nama_event');
				$this->db->from($table);
				$this->db->join($this->table_name4, $table.'.kd_event = tbl_events.kd_event');
				$this->db->join($this->table_name5, 'tbl_events.kd_event = tbl_level_admin.kd_event');
				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
				$this->db->where($table.'.kd_event', $kd_event);
				$this->db->group_by($table.'.kd_peserta');
			}
			else{
				$this->db->select($table.'.kd_peserta AS kd_peserta,'.$table.'.timestamp AS waktu_daftar,'.$table.'.email AS email,'.$table.'.nama_lengkap AS nama_lengkap,'.$table.'.instansi AS instansi, tbl_events.nama_event AS nama_event');
				$this->db->from($table);
				$this->db->join($this->table_name4, $table.'.kd_event = tbl_events.kd_event');
				$this->db->join($this->table_name5, 'tbl_events.kd_event = tbl_level_admin.kd_event');
				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
				$this->db->group_by($table.'.kd_peserta');
			}
		}
		return $this->db->count_all_results();
  }
  private function _get_datatables_query($kd_event,$table)
	{
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				$this->db->select($table.'.kd_peserta AS kd_peserta,'.$table.'.timestamp AS waktu_daftar,'.$table.'.email AS email,'.$table.'.nama_lengkap AS nama_lengkap,'.$table.'.instansi AS instansi, tbl_events.nama_event AS nama_event');
				$this->db->from($table);
				$this->db->join($this->table_name4, $table.'.kd_event = tbl_events.kd_event');
				$this->db->where($table.'.kd_event', $kd_event);
				$this->db->group_by($table.'.kd_peserta');
			}
			else{
				$this->db->select($table.'.kd_peserta AS kd_peserta,'.$table.'.timestamp AS waktu_daftar,'.$table.'.email AS email,'.$table.'.nama_lengkap AS nama_lengkap,'.$table.'.instansi AS instansi, tbl_events.nama_event AS nama_event');
				$this->db->from($table);
				$this->db->join($this->table_name4, $table.'.kd_event = tbl_events.kd_event');
				$this->db->group_by($table.'.kd_peserta');
			}
		}
		//tidak sebagai super admin
		else{
			$kd_admin = $this->session->userdata('kd_admin');
			//  show all data 
			if($kd_event !=""){
				$this->db->select($table.'.kd_peserta AS kd_peserta,'.$table.'.timestamp AS waktu_daftar,'.$table.'.email AS email,'.$table.'.nama_lengkap AS nama_lengkap,'.$table.'.instansi AS instansi, tbl_events.nama_event AS nama_event');
				$this->db->from($table);
				$this->db->join($this->table_name4, $table.'.kd_event = tbl_events.kd_event');
				$this->db->join($this->table_name5, 'tbl_events.kd_event = tbl_level_admin.kd_event');
				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
				$this->db->where($table.'.kd_event', $kd_event);
				$this->db->group_by($table.'.kd_peserta');
			}
			else{
				$this->db->select($table.'.kd_peserta AS kd_peserta,'.$table.'.timestamp AS waktu_daftar,'.$table.'.email AS email,'.$table.'.nama_lengkap AS nama_lengkap,'.$table.'.instansi AS instansi, tbl_events.nama_event AS nama_event');
				$this->db->from($table);
				$this->db->join($this->table_name4, $table.'.kd_event = tbl_events.kd_event');
				$this->db->join($this->table_name5, 'tbl_events.kd_event = tbl_level_admin.kd_event');
				$this->db->where('tbl_level_admin.kd_admin', $kd_admin);
				$this->db->group_by($table.'.kd_peserta');
			}
		}
		$order = array($table.'timestamp' => 'DESC');
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

	public function add_data_user1($data){
		$this->db->insert($this->table_name1,$data);
	}
	public function add_data_user2($data){
		$this->db->insert($this->table_name2,$data);
	} 
	public function check_slot_peserta($kd_event){
		return $this->db->query('SELECT 
		CASE
			WHEN COUNT(p.kd_peserta) >= e.`slot` THEN "Penuh"
			WHEN COUNT(p.kd_peserta) < e.`slot` THEN "Tersedia"
		END AS status_slot
		FROM `tbl_events` AS e 
		JOIN tbl_peserta AS p
		ON e.`kd_event`  = p.kd_event
		WHERE e.`kd_event` = "'.$kd_event.'"
		');
	}
	// copy data calon peserta ke tabel peserta 
	public function add_konfirmasi_data($kd_peserta){
		return $this->db->query('INSERT
		 INTO '.$this->table_name1.' SELECT * 
		 FROM '.$this->table_name2.'
		 WHERE kd_peserta = "'.$kd_peserta.'"
		 ');
	}
	//  hapus data calon peserta 			
	public function delete_data_user2($kd_peserta,$kd_tiket_peserta){
		$this->db->query('DELETE 
		FROM '.$this->table_name2.'
		WHERE kd_peserta = "'.$kd_peserta.'" 
		');
		$this->db->query('DELETE 
		FROM '.$this->table_name3.'
		WHERE kd_tiket_peserta = "'.$kd_tiket_peserta.'"
		');
	}
	public function tampil_data_peserta($kd_event){
		return $this->db->query('SELECT * 
		FROM '.$this->table_name1.'
		WHERE kd_event = "'.$kd_event.'"
		');
	}
	
	public function updatedataabsen($email,$kd_event,$kd_peserta){
		$where = array('email' => $email, 'kd_event' =>$kd_event);
		$data = array('kd_peserta' => $kd_peserta);
		$this->db->where($where);
		$this->db->update($this->table_name8, $data);
  }
	public function cari_event($katakunci){
		return $this->db->query('SELECT *
		FROM '.$this->table_name1.'
		WHERE nama_event LIKE "%'.$katakunci.'%" ORDER BY timestamp DESC
		');
	}
	//check peserta yang bayaar gratis
  public function check_email_peserta1($email,$event){
	  return $this->db->query('SELECT t.`kd_event`, p.`email` 
	  FROM '.$this->table_name1.' AS p
	  JOIN '.$this->table_name3.' AS t
	  ON t.kd_event = p.`kd_event`
	  WHERE p.email = "'.$email.'" AND t.kd_event = "'.$event.'"
	  GROUP BY p.email, t.kd_event
	  ');
  }
  //check peserta yang bayar
  public function check_email_peserta2($email,$event){
	  return $this->db->query('SELECT t.`kd_event`, cp.`email` 
	  FROM '.$this->table_name2.' AS cp
	  JOIN '.$this->table_name3.' AS t
	  ON t.kd_event = cp.`kd_event`
	  WHERE cp.email = "'.$email.'" AND t.kd_event = "'.$event.'"
	  GROUP BY p.email, t.kd_event
	  ');
  }

//  show data selected participant
 public function get_data_peserta($kd_peserta){
	return $this->db->query('SELECT p.kd_peserta AS kd_peserta, p.email AS email, p.nama_lengkap AS nama_lengkap, p.jalur AS jalur, p.nim AS nim,p.jurusan AS jurusan,p.instansi AS instansi, p.no_hp AS no_hp,
			  tp.timestamp AS waktu_daftar,tp.kd_tiket_peserta AS kd_tiket_peserta,tp.status AS statusP, tp.diskon AS diskon,tp.bukti_bayar AS bukti_bayar, tp.bayar AS bayar,t.jenis_tiket AS jenis_tiket, t.jumlah AS jumlah,
			 t.kd_tiket AS kd_tiket, e.kd_event AS kd_event, e.nama_event AS nama_event, e.dari_tanggal AS dari_tanggal, e.sampai_tanggal AS sampai_tanggal, e.dari_jam AS dari_jam, e.sampai_jam AS sampai_jam, e.lokasi AS lokasi, e.penyelenggara AS penyelenggara
			  FROM tbl_peserta AS p 
			  LEFT JOIN tbl_tiket t 
			  ON p.`kd_tiket` = t.kd_tiket 
			  LEFT JOIN tbl_tiket_peserta AS tp 
			  ON p.`kd_peserta` = tp.kd_peserta
			  LEFT JOIN tbl_events AS e 
			  ON tp.kd_event = e.kd_event 
			  WHERE p.kd_peserta = "'.$kd_peserta.'"
	  ');
 }
 
 //  show data selected participant
 public function get_data_calon_peserta($kd_peserta){
	return $this->db->query('SELECT p.kd_peserta AS kd_peserta, p.email AS email, p.nama_lengkap AS nama_lengkap, p.jalur AS jalur, p.nim AS nim,p.jurusan AS jurusan,p.instansi AS instansi, p.no_hp AS no_hp,
			 tp.timestamp AS waktu_daftar,tp.kd_tiket_peserta AS kd_tiket_peserta,tp.status AS statusP, tp.diskon AS diskon,tp.bukti_bayar AS bukti_bayar, tp.bayar AS bayar,t.jenis_tiket AS jenis_tiket, t.jumlah AS jumlah,
			  e.nama_event AS nama_event, e.dari_tanggal AS dari_tanggal, e.sampai_tanggal AS sampai_tanggal, e.dari_jam AS dari_jam, e.sampai_jam AS sampai_jam, e.lokasi AS lokasi, e.penyelenggara AS penyelenggara
			  FROM tbl_calon_peserta AS p 
			  LEFT JOIN tbl_tiket t 
			  ON p.`kd_tiket` = t.kd_tiket 
			  LEFT JOIN tbl_tiket_peserta AS tp 
			  ON p.`kd_peserta` = tp.kd_peserta
				LEFT JOIN tbl_events AS e 
			  ON tp.kd_event = e.kd_event 
			  WHERE p.kd_peserta = "'.$kd_peserta.'"
	  ');
 }
 public function set_verifikasipeserta($kd_peserta){
	//data tiket di update
	 $this->db->query('UPDATE tbl_tiket_peserta AS t
		SET t.status = "Belum Verifikasi"
		WHERE t.kd_peserta =  "'.$kd_peserta.'"
		');
	// data peserta dipindahkan ke tabel peserta
	 $this->db->query('INSERT INTO tbl_calon_peserta SELECT * FROM
		tbl_peserta WHERE kd_peserta =  "'.$kd_peserta.'"
		');
	// hapus data di tabel seblumnya 
	 $this->db->query('DELETE FROM `tbl_peserta`
	  WHERE kd_peserta =  "'.$kd_peserta.'"
		');
 }
  public function set_belumverifikasipeserta($kd_peserta){
 //data tiket di update
	 $this->db->query('UPDATE tbl_tiket_peserta AS t
		SET t.status = "Verifikasi"
		WHERE t.kd_peserta =  "'.$kd_peserta.'"
		');
	// data peserta dipindahkan ke tabel peserta
	 $this->db->query('INSERT INTO tbl_peserta SELECT * FROM
		tbl_calon_peserta WHERE kd_peserta =  "'.$kd_peserta.'"
		');
	// hapus data di tabel seblumnya 
	 $this->db->query('DELETE FROM `tbl_calon_peserta`
	  WHERE kd_peserta =  "'.$kd_peserta.'"
		');
		
 }
 
  public function edit_peserta($data,$where){
	$this->db->where($where);
	$this->db->update($this->table_name1, $data);
  }
  public function edit_calon_peserta($data,$where){
	$this->db->where($where);
	$this->db->update($this->table_name2, $data);
  }
  public function set_hapuspeserta($where,$table){
	// table data peserta
	$this->db->where($where);
    $this->db->delete($table);
	// table data tiket peserta
	$this->db->where($where);
    $this->db->delete($this->table_name3);
  }

 public function sertifikat_peserta_verifikasi($kd_event){	
 	if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				$query =  $this->db->query('SELECT "" AS nomor, "" AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, p.kd_event AS kd_event, p.email AS email, e.nama_event AS nama_event, "belum" AS status
				FROM '.$this->table_name1.' AS p
                JOIN '.$this->table_name4.' AS e
                ON p.kd_event = e.kd_event
				JOIN '.$this->table_name7.' AS sp
				WHERE p.kd_event = "'.$kd_event.'" AND p.kd_peserta NOT IN (SELECT kd_peserta FROM '.$this->table_name7.')
				GROUP BY  p.`kd_peserta`
            UNION
				SELECT  sp.nomor AS nomor, sp.link_sertifikat AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, p.kd_event AS kd_event, p.email AS email,  e.nama_event AS nama_event, "sudah" AS status
				FROM '.$this->table_name1.'  AS p
                JOIN '.$this->table_name4.' AS e
                ON p.kd_event = e.kd_event
				JOIN '.$this->table_name7.' AS sp
                ON p.kd_peserta = sp.kd_peserta
				WHERE p.kd_event = "'.$kd_event.'" 
				GROUP BY p.`kd_peserta`
				');
			}else{ // semua event dokumentasi
				$query =  $this->db->query('SELECT "" AS nomor, "" AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, p.kd_event AS kd_event, p.email AS email,  e.nama_event AS nama_event, "belum" AS status
				FROM '.$this->table_name1.' AS p
                JOIN '.$this->table_name4.' AS e
                ON p.kd_event = e.kd_event
				JOIN '.$this->table_name7.' AS sp
				WHERE  p.kd_peserta NOT IN (SELECT kd_peserta FROM '.$this->table_name7.')
				GROUP BY  p.`kd_peserta`
            UNION
				SELECT  sp.nomor AS nomor, sp.link_sertifikat AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, p.kd_event AS kd_event, p.email AS email,  e.nama_event AS nama_event, "sudah" AS status
				FROM '.$this->table_name1.'  AS p
                JOIN '.$this->table_name4.' AS e
                ON p.kd_event = e.kd_event
				JOIN '.$this->table_name7.' AS sp
                ON p.kd_peserta = sp.kd_peserta
				GROUP BY p.`kd_peserta`
				');
			}
		} 
		else{ // level bukan admin 
			$kd_admin = $this->session->userdata('kd_admin');
			if($kd_event != ""){
				$query =  $this->db->query('SELECT "" AS nomor, "" AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, p.kd_event AS kd_event,  p.email AS email,  e.nama_event AS nama_event, "belum" AS status
				FROM '.$this->table_name1.' AS p
                JOIN '.$this->table_name4.' AS e
                ON p.kd_event = e.kd_event
				JOIN '.$this->table_name7.' AS sp       
				INNER JOIN  '.$this->table_name5.' AS al 
				ON al.kd_event = e.kd_event
				WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_event = "'.$kd_event.'" AND p.kd_peserta NOT IN (SELECT kd_peserta FROM '.$this->table_name7.')
				GROUP BY  p.`kd_peserta`
            UNION
				SELECT  sp.nomor AS nomor, sp.link_sertifikat AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap,p.kd_event AS kd_event, p.email AS email,  e.nama_event AS nama_event, "sudah" AS status
				FROM '.$this->table_name1.'  AS p
                JOIN '.$this->table_name4.' AS e
                ON p.kd_event = e.kd_event
				JOIN '.$this->table_name7.' AS sp
                ON p.kd_peserta = sp.kd_peserta       
				INNER JOIN  '.$this->table_name5.' AS al 
				ON al.kd_event = e.kd_event
				WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_event = "'.$kd_event.'" 
				GROUP BY p.`kd_peserta`
				');
			}else{
				$query =  $this->db->query('SELECT "" AS nomor, "" AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap,  p.kd_event AS kd_event, p.email AS email,  e.nama_event AS nama_event, "belum" AS status
				FROM '.$this->table_name1.' AS p
                JOIN '.$this->table_name4.' AS e
                ON p.kd_event = e.kd_event
				JOIN '.$this->table_name7.' AS sp       
				INNER JOIN  '.$this->table_name5.' AS al 
				ON al.kd_event = e.kd_event
				WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_peserta NOT IN (SELECT kd_peserta FROM '.$this->table_name7.')
				GROUP BY  p.`kd_peserta`
            UNION
				SELECT  sp.nomor AS nomor, sp.link_sertifikat AS link, p.`kd_peserta`, p.nama_lengkap AS nama_lengkap, p.kd_event AS kd_event, p.email AS email,  e.nama_event AS nama_event, "sudah" AS status
				FROM '.$this->table_name1.'  AS p
                JOIN '.$this->table_name4.' AS e
                ON p.kd_event = e.kd_event
				JOIN '.$this->table_name7.' AS sp
                ON p.kd_peserta = sp.kd_peserta       
				INNER JOIN  '.$this->table_name5.' AS al 
				ON al.kd_event = e.kd_event
				WHERE al.kd_admin = "'.$kd_admin.'"  
				GROUP BY p.`kd_peserta`
				');
			}
		}
	 return $query->result();
	}
	public function exportDataPesertaList($kd_event,$table){
		if($this->session->userdata('sebagai') =="Admin"){
			if($kd_event != ""){
				$query =  $this->db->query('SELECT tp.timestamp AS waktu_daftar, tp.status AS status, p.email AS email, p.nama_lengkap AS nama_lengkap, p.nim AS nim, p.instansi AS instansi, p.jurusan AS jurusan,
					p.jalur AS jalur, p.no_hp AS no_hp, e.nama_event AS nama_event, t.jenis_tiket AS jenis_tiket, tp.bayar AS bayar
					FROM '.$table.' AS p
                	INNER JOIN '.$this->table_name4.' AS e
					ON e.kd_event = p.kd_event 
					INNER JOIN '.$this->table_name3.' AS tp
					ON p.kd_peserta = tp.kd_peserta
					INNER JOIN '.$this->table_name6.' AS t
					ON p.kd_tiket = t.kd_tiket
					WHERE p.kd_event = "'.$kd_event.'" 
					GROUP BY p.`kd_peserta`
				');
			}else{ // semua event dokumentasi
				$query =  $this->db->query('SELECT tp.timestamp AS waktu_daftar,tp.status AS status, p.email AS email, p.nama_lengkap AS nama_lengkap, p.nim AS nim, p.instansi AS instansi, p.jurusan AS jurusan,
					p.jalur AS jalur, p.no_hp AS no_hp, e.nama_event AS nama_event, t.jenis_tiket AS jenis_tiket, tp.bayar AS bayar
					FROM '.$table.' AS p
                	INNER JOIN '.$this->table_name4.' AS e
					ON e.kd_event = p.kd_event 
					INNER JOIN '.$this->table_name3.' AS tp
					ON p.kd_peserta = tp.kd_peserta
					INNER JOIN '.$this->table_name6.' AS t
					ON p.kd_tiket = t.kd_tiket
					GROUP BY p.`kd_peserta`
				');
			}
		} 
		else{ // level bukan admin 
			$kd_admin = $this->session->userdata('kd_admin');
			if($kd_event != ""){
				$query =  $this->db->query('SELECT tp.timestamp AS waktu_daftar, tp.status AS status, p.email AS email, p.nama_lengkap AS nama_lengkap, p.nim AS nim, p.instansi AS instansi, p.jurusan AS jurusan,
					p.jalur AS jalur, p.no_hp AS no_hp, e.nama_event AS nama_event, t.jenis_tiket AS jenis_tiket, tp.bayar AS bayar
					FROM '.$table.' AS p
                	INNER JOIN '.$this->table_name4.' AS e
					ON e.kd_event = p.kd_event 
					INNER JOIN '.$this->table_name3.' AS tp
					ON p.kd_peserta = tp.kd_peserta
					INNER JOIN '.$this->table_name6.' AS t
					ON p.kd_tiket = t.kd_tiket
					INNER JOIN  '.$this->table_name5.' AS al 
					ON al.kd_event = e.kd_event
					WHERE al.kd_admin = "'.$kd_admin.'" AND p.kd_event = "'.$kd_event.'" 
					GROUP BY p.`kd_peserta`
				');
			}else{
				$query =  $this->db->query('SELECT tp.timestamp AS waktu_daftar, tp.status AS status, p.email AS email, p.nama_lengkap AS nama_lengkap, p.nim AS nim, p.instansi AS instansi, p.jurusan AS jurusan,
					p.jalur AS jalur, p.no_hp AS no_hp, e.nama_event AS nama_event, t.jenis_tiket AS jenis_tiket, tp.bayar AS bayar
					FROM '.$table.' AS p
                	INNER JOIN '.$this->table_name4.' AS e
					ON e.kd_event = p.kd_event 
					INNER JOIN '.$this->table_name3.' AS tp
					ON p.kd_peserta = tp.kd_peserta
					INNER JOIN '.$this->table_name6.' AS t
					ON p.kd_tiket = t.kd_tiket
					INNER JOIN  '.$this->table_name5.' AS al 
					ON al.kd_event = e.kd_event
					WHERE al.kd_admin = "'.$kd_admin.'" 
					GROUP BY p.`kd_peserta`
				');
			}
		}
	 return $query->result();
	}
	
}
