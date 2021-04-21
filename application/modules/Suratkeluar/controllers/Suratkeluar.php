<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_suratkeluar']);
		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('Login');
		}
	}

	public function index(){
		$data['suratkeluar'] 				= $this->M_suratkeluar->get_suratkeluar();

		$data['module'] 		= "Suratkeluar";
		$data['fileview'] 	= "surat";
		echo Modules::run('Template/Template_main', $data);
	}

	function cari_penduduk($keyword){
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('TB_PENDUDUK')->like('NAMA',$keyword)->get();

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'id'	=>$row->ID_PENDUDUK,
				'nik'	=>$row->NIK,
				'nama'	=>$row->NAMA

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}

	public function userList(){
    // POST data
    $postData = $this->input->post();

    // Get data
    $data = $this->M_suratkeluar->getPenduduks($postData);

		foreach($data as $row ){
          $response[] = array(
						"id" 		=> $row->ID_PENDUDUK,
						"nik" 	=> $row->NIK,
						"value" => $row->NAMA,
						"nama" 	=> $row->NAMA
					);
       }

    echo json_encode($response);
  }

	public function tambah_1(){
		$data['kategori'] 	= $this->M_suratkeluar->get_kategori();
		$data['controller']	= $this;

		$data['module'] 		= "Suratkeluar";
		$data['fileview'] 	= "kategori";
		echo Modules::run('Template/Template_main', $data);
	}

	public function tambah_2($ID_KATEGORI){
		if ($this->M_suratkeluar->get_kategori_single($ID_KATEGORI) == FALSE) {
			$this->session->set_flashdata('error', "Tidak dapat menemukan data dari kategori tersebut!");
			redirect('Surat-Keluar/Tambah-Surat-Keluar');
		}else {
			$data['kategori'] 	= $this->M_suratkeluar->get_kategori_single($ID_KATEGORI);
			$data['controller']	= $this;

			$data['module'] 		= "Suratkeluar";

			if ($ID_KATEGORI == 2) {
				$data['fileview'] 	= "tambah_surat/surat_kelahiran";
			}elseif ($ID_KATEGORI == 3) {
				$data['fileview'] 	= "tambah_surat/";
			}else {
				$this->session->set_flashdata('error', "Kategori surat belum memiliki form untuk diisi, harap hubungi dev untuk menambahkan form.");
				redirect('Surat-Keluar/Tambah-Surat-Keluar');
			}

			echo Modules::run('Template/Template_main', $data);
		}
	}

	function test(){
		$str = '432/  130   /35.07.18.2010/2020';
		print_r(filter_var($str, FILTER_SANITIZE_NUMBER_INT));
	}

	public function tambah_surat(){
		$data['suratkeluar'] 				= $this->M_suratkeluar->get_suratkeluar();

		$data['module'] 		= "Suratkeluar";
		$data['fileview'] 	= "tambah_surat";
		echo Modules::run('Template/Template_main', $data);
	}

	public function edit_surat($ID_KATEGORI, $ID_SURATK){
		if ($this->M_suratkeluar->get_kategori_single($ID_KATEGORI) == FALSE) {
			$this->session->set_flashdata('error', "Tidak dapat menemukan data dari kategori tersebut!");
			redirect('Surat-Keluar/Tambah-Surat-Keluar');
		}else {
			$data['kategori'] 	= $this->M_suratkeluar->get_kategori_single($ID_KATEGORI);
			$data['suratkeluar'] 				= $this->M_suratkeluar->get_suratkeluar_single($ID_SURATK);
			$data['controller']	= $this;

			$data['module'] 		= "Suratkeluar";

			if ($ID_KATEGORI == 2) {
				$data['fileview'] 	= "edit_surat/surat_kelahiran";
			}elseif ($ID_KATEGORI == 3) {
				$data['fileview'] 	= "surat/";
			}else {
				$this->session->set_flashdata('error', "Kategori surat belum memiliki form untuk diisi, harap hubungi dev untuk menambahkan form.");
				redirect('Surat-Keluar/Tambah-Surat-Keluar');
			}

			echo Modules::run('Template/Template_main', $data);
		}
	}

	public function detail_surat($ID_KATEGORI, $ID_SURATK){
		if ($this->M_suratkeluar->get_kategori_single($ID_KATEGORI) == FALSE) {
			$this->session->set_flashdata('error', "Tidak dapat menemukan data dari kategori tersebut!");
			redirect('Surat-Keluar/Tambah-Surat-Keluar');
		}else {
			$data['kategori'] 	= $this->M_suratkeluar->get_kategori_single($ID_KATEGORI);
			$data['suratkeluar'] 				= $this->M_suratkeluar->get_suratkeluar_single($ID_SURATK);
			$data['controller']	= $this;

			$data['module'] 		= "Suratkeluar";

			if ($ID_KATEGORI == 2) {
				$data['fileview'] 	= "detail_surat/surat_kelahiran";
			}elseif ($ID_KATEGORI == 3) {
				$data['fileview'] 	= "surat/";
			}else {
				$this->session->set_flashdata('error', "Kategori surat belum memiliki form untuk diisi, harap hubungi dev untuk menambahkan form.");
				redirect('Surat-Keluar/Tambah-Surat-Keluar');
			}

			echo Modules::run('Template/Template_main', $data);
		}
	}

	// BASE CUD Controller
	public function tambah(){
		$nomor = $this->input->post('NOMOR');
		if ($this->M_suratkeluar->tambah() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menambahkan data surat keluar, dengan nomor <b>".$nomor."</b>");
			redirect('Surat-Keluar');
		}else{
			$this->session->set_flashdata('error', "Gagal menambahkan data surat keluar, dengan nomor <b>".$nomor."</b>");
			redirect('Surat-Keluar/Tambah-Surat-Keluar');
		}
	}

	public function edit(){
		$nomor 				= $this->input->post('NOMOR');
		$ID_SURATK 		= $this->input->post('ID_SURATK');
		$ID_KATEGORI  = $this->input->post('ID_KATEGORI');
		if ($this->M_suratkeluar->edit() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data surat keluar, dengan nomor <b>".$nomor."</b>");
			redirect('Surat-Keluar');
		}else{
			$this->session->set_flashdata('error', "Tidak ada perubahan data surat keluar, dengan nomor <b>".$nomor."</b>");
			redirect('Surat-Keluar/Ubah-Surat/'.$ID_KATEGORI.'/'.$ID_SURATK);
		}
	}

	public function hapus(){
		$nomor = filter_var($this->input->post('NOMOR'), FILTER_SANITIZE_NUMBER_INT);
		if ($this->M_suratkeluar->hapus() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data surat keluar, dengan nomor <b>".$nomor."</b>");
			redirect('Surat-Keluar');
		}else{
			$this->session->set_flashdata('error', "Gagal menghapus data surat keluar, dengan nomor <b>".$nomor."</b>");
			redirect('Surat-Keluar');
		}
	}

}
