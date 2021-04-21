<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_pegawai(){
		$query = $this->db->query("SELECT a.*, b.USERNAME, b.ID_USER as USER FROM TB_PEGAWAI a LEFT JOIN TB_AUTH b ON a.ID_USER = b.ID_USER ORDER BY a.NO_PEGAWAI ASC");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	function hak_akses($ID_USER){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE ID_USER = '$ID_USER'");
		if($query->num_rows() == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function cek_id($ID_USER){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE ID_USER = '$ID_USER'");
		if($query->num_rows() > 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	// BASE CUD Modal
	public function tambah(){
		$NAMA						= $this->input->post('NAMA');
		$NO_PEGAWAI			= $this->input->post('NO_PEGAWAI');
		$HP							= $this->input->post('HP');
		$JABATAN				= $this->input->post('JABATAN');

		$data = array(
			'NAMA' 				=> $NAMA,
			'NO_PEGAWAI' 	=> $NO_PEGAWAI,
			'HP' 					=> $HP,
			'JABATAN' 		=> $JABATAN,
		);

		$this->db->insert('TB_PEGAWAI', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function edit(){
		$ID_USER				= $this->input->post('ID_USER');

		$NAMA						= $this->input->post('NAMA');
		$NO_PEGAWAI			= $this->input->post('NO_PEGAWAI');
		$HP							= $this->input->post('HP');
		$JABATAN				= $this->input->post('JABATAN');

		$data = array(
			'NAMA' 				=> $NAMA,
			'NO_PEGAWAI' 	=> $NO_PEGAWAI,
			'HP'		 			=> $HP,
			'JABATAN' 		=> $JABATAN,
		);
		$this->db->where('ID_USER', $ID_USER);
		$this->db->update('TB_PEGAWAI', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus(){
		$ID_USER				= $this->input->post('ID_USER');

		$this->db->where('ID_USER', $ID_USER);
		$this->db->delete('TB_PEGAWAI');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function atur_hak_akses(){
		$ID_USER				= $this->input->post('ID_USER');

		$USERNAME				= $this->input->post('USERNAME');
		$PASSWORD				= $this->input->post('PASSWORD');

		if ($this->cek_id($ID_USER) == TRUE) {
			return 3;
		}else{
			if ($this->hak_akses($ID_USER) == TRUE) {
				$data = array(
					'USERNAME' 	=> $USERNAME,
					'PASSWORD' 	=> password_hash($PASSWORD, PASSWORD_DEFAULT),
				);

				$this->db->where('ID_USER', $ID_USER);
				$this->db->update('TB_AUTH', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
			}else {
				$data = array(
					'ID_USER' 	=> $ID_USER,
					'USERNAME' 	=> $USERNAME,
					'PASSWORD' 	=> password_hash($PASSWORD, PASSWORD_DEFAULT),
				);

				$this->db->insert('TB_AUTH', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
			}
		}
	}

	public function hapushak_akses($ID_USER){
		$this->db->where('ID_USER', $ID_USER);
		$this->db->delete('TB_AUTH');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

}
