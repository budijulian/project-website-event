<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_dashboard extends CI_Model {
	
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
	
	public function count_pengunjung_perbulan(){
		return $this->db->query('SELECT COUNT(l.`ip`) AS c_pengunjung, MONTH(l.`aktif_terakhir`) AS bulan,  YEAR(l.`aktif_terakhir`) AS tahun
			FROM `log_ip` AS l
            WHERE l.`aktif_terakhir` BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL "11" MONTH)  AND CURRENT_DATE()
			GROUP BY MONTH(l.`aktif_terakhir`)
			ORDER BY l.`aktif_terakhir` ASC
			');
  }
  public function count_peserta_perbulan(){
		return $this->db->query('SELECT COUNT(p.timestamp) AS c_peserta, MONTH(p.timestamp) AS bulan, YEAR(p.timestamp) AS tahun
				FROM tbl_peserta AS p
				WHERE p.timestamp BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL "11" MONTH)  AND CURRENT_DATE()
				GROUP BY  MONTH(p.timestamp)
				ORDER BY p.timestamp ASC
			');
  }

}
