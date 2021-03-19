<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_suratkeluar extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function search_auto($NAMA){
		$this->db->like('NAMA', $NAMA);
		$this->db->limit(10);
		return $this->db->get('TB_PENDUDUK')->result();
	}

	public function get_kategori(){
		$query = $this->db->query("SELECT * FROM TB_KATEGORI ORDER BY ID_KATEGORI DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function get_kategori_single($ID_KATEGORI){
		$query = $this->db->query("SELECT a.*, (SELECT COUNT(*) FROM SURAT_KELUAR WHERE ID_KATEGORI = '$ID_KATEGORI')+1 AS COUNT FROM TB_KATEGORI a WHERE a.ID_KATEGORI = '$ID_KATEGORI'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function cek_surat($ID_KATEGORI){
		$query = $this->db->query("SELECT * FROM SURAT_KELUAR WHERE ID_KATEGORI = '$ID_KATEGORI'");
		return $query->num_rows();
	}

	function get_suratkeluar(){
		$query = $this->db->query("SELECT a.*, b.NAMA, c.NAMA as KATEGORI FROM SURAT_KELUAR a LEFT JOIN TB_PEGAWAI b ON a.ID_USER = b.ID_USER LEFT JOIN TB_KATEGORI c ON a.ID_KATEGORI = c.ID_KATEGORI ORDER BY a.TANGGAL DESC");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	function get_suratkeluar_single($ID_SURATK){
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

	public function get_data_id($ID_SURATK, $IDENTIFIER){
		$query = $this->db->query("SELECT * FROM DATA_SURAT WHERE ID_SURATK = '$ID_SURATK' AND IDENTIFIER = '$IDENTIFIER'");
			return $query->row()->ID_DATA;
	}


	// BASE CUD Modal
	public function tambah(){

		$query = $this->db->query("SELECT * FROM SURAT_KELUAR");

		$ID_SURATK = $query->num_rows()+1;

		$ID_USER			= $this->session->userdata('id_user');
		$ID_KATEGORI	= $this->input->post('ID_KATEGORI');
		$NOMOR				= $this->input->post('NOMOR');
		$TANGGAL			= date("d-m-Y");

		$data = array(
			'ID_SURATK' 	=> $ID_SURATK,
			'ID_USER' 		=> $ID_USER,
			'ID_KATEGORI' => $ID_KATEGORI,
			'NOMOR' 			=> $NOMOR,
			'TANGGAL' 		=> $TANGGAL,
		);

		$this->db->insert('SURAT_KELUAR', $data);

		$ID 			= $this->input->post('ID', true);
		$VALUE 		= $this->input->post('VALUE', true);

			foreach ($ID as $i => $a) {
				$datas = array(
					'ID_SURATK' 	=> $ID_SURATK,
					'IDENTIFIER' 	=> isset($ID[$i]) ? $ID[$i] : '',
					'VALUE'				=> isset($VALUE[$i]) ? $VALUE[$i] : ''
				);
				$this->db->insert('DATA_SURAT', $datas);
			}
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function edit(){

		$ID_SURATK		= $this->input->post('ID_SURATK');

		$ID_USER			= $this->session->userdata('id_user');
		$ID_KATEGORI	= $this->input->post('ID_KATEGORI');
		$NOMOR				= $this->input->post('NOMOR');
		$TANGGAL			= date("d-m-Y");

		$data = array(
			'ID_SURATK' 	=> $ID_SURATK,
			'ID_USER' 		=> $ID_USER,
			'ID_KATEGORI' => $ID_KATEGORI,
			'NOMOR' 			=> $NOMOR,
			'TANGGAL' 		=> $TANGGAL,
		);

		$this->db->where('ID_SURATK', $ID_SURATK);
		$this->db->update('SURAT_KELUAR', $data);

		$ID 			= $this->input->post('ID', true);
		$VALUE 		= $this->input->post('VALUE', true);

			foreach ($ID as $i => $a) {
				$datas = array(
					'VALUE'				=> isset($VALUE[$i]) ? $VALUE[$i] : ''
				);
				$this->db->where('ID_DATA', $ID[$i]);
				$this->db->update('DATA_SURAT', $datas);
			}
		return true;
	}

	public function hapus(){
		$ID_SURATK				= $this->input->post('ID_SURATK');


		$this->db->where('ID_SURATK', $ID_SURATK);
		$this->db->delete('DATA_SURAT');

		$this->db->where('ID_SURATK', $ID_SURATK);
		$this->db->delete('SURAT_KELUAR');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

}
