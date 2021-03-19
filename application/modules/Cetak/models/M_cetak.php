<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cetak extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_surat($ID_SURATK){
		$query = $this->db->query("SELECT a.*, b.NAMA FROM SURAT_KELUAR a LEFT JOIN TB_PEGAWAI b ON a.ID_USER = b.ID_USER WHERE a.ID_SURATK = '$ID_SURATK'");
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function get_data($ID_SURATK, $IDENTIFIER){
		$query = $this->db->query("SELECT * FROM DATA_SURAT WHERE ID_SURATK = '$ID_SURATK' AND IDENTIFIER = '$IDENTIFIER'");
			return $query->row()->VALUE;
	}

}
