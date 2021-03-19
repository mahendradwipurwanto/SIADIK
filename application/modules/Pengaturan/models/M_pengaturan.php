<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengaturan extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function get_kategori(){
		$query = $this->db->query("SELECT * FROM TB_KATEGORI ORDER BY ID_KATEGORI DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function kat_count($id){
		$query = $this->db->query("SELECT COUNT(*) as COUNTER FROM SURAT_KELUAR WHERE ID_KATEGORI = '$id'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->COUNTER;
		}else{
			return false;
		}
	}

	public function kategori_id($ID_KATEGORI){
		$query = $this->db->query("SELECT * FROM TB_KATEGORI WHERE ID_KATEGORI = '$ID_KATEGORI'");
		return $query->num_rows();

	}

	public function tambah_kategori(){

		$KODE     = $this->input->post('KODE');
		$NAMA     = $this->input->post('NAMA');
		$KETERANGAN   = $this->input->post('KETERANGAN');

		$data = array(
			'KODE' 				=> $KODE,
			'NAMA'    		=> $NAMA,
			'KETERANGAN'  => $KETERANGAN
		);

		$this->db->insert('TB_KATEGORI', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function ubah_kategori(){

		$ID_KATEGORI  = $this->input->post('ID_KATEGORI');
		$KODE     		= $this->input->post('KODE');
		$NAMA     		= $this->input->post('NAMA');
		$KETERANGAN   = $this->input->post('KETERANGAN');

		$data = array(
			'KODE'    		=> $KODE,
			'NAMA'    		=> $NAMA,
			'KETERANGAN'  => $KETERANGAN
		);

		$this->db->where('ID_KATEGORI', $ID_KATEGORI);
		$this->db->update('TB_KATEGORI', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus_kategori(){

		$ID_KATEGORI     = $this->input->post('ID_KATEGORI');

		$this->db->where('ID_KATEGORI', $ID_KATEGORI);
		$this->db->delete('TB_KATEGORI');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

}
