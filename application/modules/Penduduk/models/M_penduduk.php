<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penduduk extends CI_Model {
	var $table = 'TB_PENDUDUK'; //nama tabel dari database
	var $column_order = array(
		'KK',
		'NIK',
		'NAMA',
		'JK',
		'TEMPAT_LAHIR',
		'TGL_LAHIR',
		'UMUR',
		'GOL_DARAH',
		'AGAMA',
		'STATUS',
		'HUBUNGAN',
		'PENDIDIKAN',
		'PEKERJAAN',
		'IBU',
		'AYAH',
	);
	var $column_search = array(
		'KK',
		'NIK',
		'NAMA',
		'JK',
		'TEMPAT_LAHIR',
		'TGL_LAHIR',
		'UMUR',
		'GOL_DARAH',
		'AGAMA',
		'STATUS',
		'HUBUNGAN',
		'PENDIDIKAN',
		'PEKERJAAN',
		'IBU',
		'AYAH',
	); //field yang diizin untuk pencarian
	var $order = array('ID_PENDUDUK' => 'asc'); // default order

	function __construct(){
		parent::__construct();
	}

	//SERVER SIDE-PIPELINE

	private function _get_datatables_query(){

		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) // looping awal
		{
			if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{

				if($i===0) // looping awal
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
				$this->db->group_end();
			}
			$i++;
		}

		if(isset($_POST['order'])){
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables(){
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
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

	public function delete_by_id($id){
		$this->db->where('ID_PENDUDUK', $id);
		$this->db->delete($this->table);
	}

	function hapus_data_all() {
		$delete = $this->input->post('msg');
		for ($i=0; $i < count($delete) ; $i++) {
			$this->db->where('ID_PENDUDUK', $delete[$i]);
			$this->db->delete($this->table);
		}
	}

	function delete_all() {
		$this->db->query("DELETE FROM TB_PENDUDUK");
		return ($this->db->affected_rows() != 1) ? false : true;
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
