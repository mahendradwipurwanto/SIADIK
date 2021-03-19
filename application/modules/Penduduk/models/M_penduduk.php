<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penduduk extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_penduduk(){
		$query = $this->db->query("SELECT * FROM TB_PENDUDUK");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	function get_penduduk_single($ID_PENDUDUK){
		$query = $this->db->query("SELECT * FROM TB_PENDUDUK WHERE ID_PENDUDUK = '$ID_PENDUDUK'");
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}


	// BASE CUD Modal
	public function tambah(){
		$KK			= $this->input->post('KK');
		$NIK				= $this->input->post('NIK');
		$NAMA			= $this->input->post('NAMA');
		$JK					= $this->input->post('JK');
		$TEMPAT_LAHIR			= $this->input->post('TEMPAT_LAHIR');
		$TGL_LAHIR		= $this->input->post('TGL_LAHIR');
		$UMUR		= $this->input->post('UMUR');
		$GOL_DARAH		= $this->input->post('GOL_DARAH');
		$AGAMA		= $this->input->post('AGAMA');
		$STATUS		= $this->input->post('STATUS');
		$HUBUNGAN	= $this->input->post('HUBUNGAN');
		$PENDIDIKAN		= $this->input->post('PENDIDIKAN');
		$PEKERJAAN	= $this->input->post('PEKERJAAN');
		$IBU		= $this->input->post('IBU');
		$AYAH		= $this->input->post('AYAH');


		$data = array(
			'KK' 		=> $KK,
			'NIK' 			=> $NIK,
			'NAMA' 		=> ucwords($NAMA),
			'JK' 				=> $JK,
			'TEMPAT_LAHIR' 			=> $TEMPAT_LAHIR,
			'TGL_LAHIR' 	=> $TGL_LAHIR,
			'UMUR' 				=> $UMUR,
			'GOL_DARAH' 				=> $GOL_DARAH,
			'AGAMA' 				=> $AGAMA,
			'STATUS' 				=> $STATUS,
			'HUBUNGAN' 				=> $HUBUNGAN,
			'PENDIDIKAN' 				=> $PENDIDIKAN,
			'PEKERJAAN' 				=> $PEKERJAAN,
			'IBU' 				=> $IBU,
			'AYAH' 				=> $AYAH,
		);


		$this->db->insert('TB_PENDUDUK', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function edit(){
		$ID_PENDUDUK		= $this->input->post('ID_PENDUDUK');

		$KK			= $this->input->post('KK');
		$NIK				= $this->input->post('NIK');
		$NAMA			= $this->input->post('NAMA');
		$JK					= $this->input->post('JK');
		$TEMPAT_LAHIR			= $this->input->post('TEMPAT_LAHIR');
		$TGL_LAHIR		= $this->input->post('TGL_LAHIR');
		$UMUR		= $this->input->post('UMUR');
		$GOL_DARAH		= $this->input->post('GOL_DARAH');
		$AGAMA		= $this->input->post('AGAMA');
		$STATUS		= $this->input->post('STATUS');
		$HUBUNGAN	= $this->input->post('HUBUNGAN');
		$PENDIDIKAN		= $this->input->post('PENDIDIKAN');
		$PEKERJAAN	= $this->input->post('PEKERJAAN');
		$IBU		= $this->input->post('IBU');
		$AYAH		= $this->input->post('AYAH');

		$data = array(
			'KK' 		=> $KK,
			'NIK' 			=> $NIK,
			'NAMA' 		=> $NAMA,
			'JK' 				=> $JK,
			'TEMPAT_LAHIR' 			=> ucwords($TEMPAT_LAHIR),
			'TGL_LAHIR' 	=> $TGL_LAHIR,
			'UMUR' 				=> $UMUR,
			'GOL_DARAH' 				=> $GOL_DARAH,
			'AGAMA' 				=> $AGAMA,
			'STATUS' 				=> $STATUS,
			'HUBUNGAN' 				=> $HUBUNGAN,
			'PENDIDIKAN' 				=> $PENDIDIKAN,
			'PEKERJAAN' 				=> $PEKERJAAN,
			'IBU' 				=> $IBU,
			'AYAH' 				=> $AYAH,
		);
		$this->db->where('ID_PENDUDUK', $ID_PENDUDUK);
		$this->db->update('TB_PENDUDUK', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus(){
		$ID_PENDUDUK				= $this->input->post('ID_PENDUDUK');

		$this->db->where('ID_PENDUDUK', $ID_PENDUDUK);
		$this->db->delete('TB_PENDUDUK');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

}
