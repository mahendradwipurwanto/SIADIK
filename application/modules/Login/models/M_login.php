<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function get_auth($username){
		$query = $this->db->query("SELECT * FROM TB_AUTH a INNER JOIN TB_PEGAWAI b ON a.ID_USER = b.id_user WHERE a.USERNAME = '$username' || b.NO_PEGAWAI = '$username'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

}
