<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_suratmasuk extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_suratmasuk(){
		$query = $this->db->query("SELECT a.*, b.NAMA FROM SURAT_MASUK a LEFT JOIN TB_PEGAWAI b ON a.ID_USER = b.ID_USER ORDER BY a.TANGGAL DESC");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	function get_suratmasuk_single($ID_SURATM){
		$query = $this->db->query("SELECT a.*, b.NAMA FROM SURAT_MASUK a LEFT JOIN TB_PEGAWAI b ON a.ID_USER = b.ID_USER WHERE a.ID_SURATM = '$ID_SURATM'");
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}


	// BASE CUD Modal
	public function tambah($FILE){
		$ID_USER			= $this->session->userdata('id_user');
		$NOMOR				= $this->input->post('NOMOR');
		$TANGGAL			= $this->input->post('TANGGAL');
		$DARI					= $this->input->post('DARI');
		$TUJUAN				= $this->input->post('TUJUAN');
		$KEPERLUAN		= $this->input->post('KEPERLUAN');

		$data = array(
			'ID_USER' 		=> $ID_USER,
			'NOMOR' 			=> $NOMOR,
			'TANGGAL' 		=> $TANGGAL,
			'DARI' 				=> $DARI,
			'TUJUAN' 			=> ucwords($TUJUAN),
			'KEPERLUAN' 	=> $KEPERLUAN,
			'FILE' 				=> $FILE,
		);

		$this->db->insert('SURAT_MASUK', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function edit($FILE){
		$ID_SURATM		= $this->input->post('ID_SURATM');

		$ID_USER			= $this->session->userdata('id_user');
		$NOMOR				= $this->input->post('NOMOR');
		$TANGGAL			= $this->input->post('TANGGAL');
		$DARI					= $this->input->post('DARI');
		$TUJUAN				= $this->input->post('TUJUAN');
		$KEPERLUAN		= $this->input->post('KEPERLUAN');

		$data = array(
			'ID_USER' 		=> $ID_USER,
			'NOMOR' 			=> $NOMOR,
			'TANGGAL' 		=> $TANGGAL,
			'DARI' 				=> $DARI,
			'TUJUAN' 			=> ucwords($TUJUAN),
			'KEPERLUAN' 	=> $KEPERLUAN,
			'FILE' 				=> $FILE,
		);
		$this->db->where('ID_SURATM', $ID_SURATM);
		$this->db->update('SURAT_MASUK', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus(){
		$ID_SURATM				= $this->input->post('ID_SURATM');

		$this->db->where('ID_SURATM', $ID_SURATM);
		$this->db->delete('SURAT_MASUK');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

}
