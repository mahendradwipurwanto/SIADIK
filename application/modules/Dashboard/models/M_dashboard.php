<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function c_pegawai(){
		$query = $this->db->query("SELECT * FROM TB_PEGAWAI");
		return $query->num_rows();
	}

	function c_penduduk(){
		$query = $this->db->query("SELECT * FROM TB_PENDUDUK");
		return $query->num_rows();
	}

	function c_smasuk(){
		$query = $this->db->query("SELECT * FROM SURAT_MASUK");
		return $query->num_rows();
	}

	function c_skeluar(){
		$query = $this->db->query("SELECT * FROM SURAT_KELUAR");
		return $query->num_rows();
	}

}
