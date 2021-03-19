<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_suratmasuk']);
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
		$data['suratmasuk'] 				= $this->M_suratmasuk->get_suratmasuk();

		$data['module'] 		= "Suratmasuk";
		$data['fileview'] 	= "surat";
		echo Modules::run('Template/Template_main', $data);
	}

	function test(){
		// $str = '432/  130   /35.07.18.2010/2020';
		// print_r(filter_var($str, FILTER_SANITIZE_NUMBER_INT));

		echo filesize("http://mangliawan.hivilab.org/berkas/surat-masuk/2021-03-02/212006_20210302_43214535071820102020.pdf");
	}

	public function tambah_surat(){
		$data['suratmasuk'] 				= $this->M_suratmasuk->get_suratmasuk();

		$data['module'] 		= "Suratmasuk";
		$data['fileview'] 	= "tambah_surat";
		echo Modules::run('Template/Template_main', $data);
	}

	public function edit_surat($ID_SURATM){
		if ($this->M_suratmasuk->get_suratmasuk_single($ID_SURATM) == TRUE) {
			$data['suratmasuk'] 				= $this->M_suratmasuk->get_suratmasuk_single($ID_SURATM);

			$data['module'] 		= "Suratmasuk";
			$data['fileview'] 	= "edit_surat";
			echo Modules::run('Template/Template_main', $data);
		}else{
			$this->session->set_flashdata('error', "Gagal menampilkan data surat masuk");
			redirect('Surat-Masuk');
		}
	}

	// BASE CUD Controller
	public function tambah(){
		$nomor = filter_var($this->input->post('NOMOR'), FILTER_SANITIZE_NUMBER_INT);
		$tgl	 = $this->input->post('TANGGAL');
		$date					= str_replace("-", "", $tgl);
		$waktu 				= date("His");

		$ext 					= strtolower(pathinfo($_FILES['FILE']['name'], PATHINFO_EXTENSION));

		// gif|jpg|png|jpeg|pdf|doc|docx
		if ($ext == "gif" || $ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "pdf" || $ext == "doc" || $ext == "docx") {

			$file_name    = "{$waktu}_{$date}_{$nomor}.{$ext}";

			if ($this->do_upload($file_name, $tgl) == TRUE) {
				if ($this->M_suratmasuk->tambah($file_name) == TRUE) {
					$this->session->set_flashdata('success', "Berhasil menambahkan data surat masuk, dengan nomor <b>".$this->input->post('NOMOR')."</b>");
					redirect('Surat-Masuk');
				}else{
					$this->session->set_flashdata('error', "Gagal menambahkan data surat masuk, dengan nomor <b>".$this->input->post('NOMOR')."</b>");
					redirect('Surat-Masuk');
				}
			}else{
				$this->session->set_flashdata('error', "Terjadi kesalahan saat mengupload file surat masuk, dengan nomor <b>".$this->input->post('NOMOR')."</b>. Harap cek kembali ukuran file anda.");
				redirect('Surat-Masuk');
			}

		}else {
			$this->session->set_flashdata('error', "Tipe file yang anda upload salah, harap upload file dengan tipe gif, jpg, png, jpeg, pdf, doc atau docx.");
			redirect('Surat-Masuk');
		}
	}

	public function edit(){
		$FILE	 				= $this->input->post('OLD_FILE');
		$ID_SURATM	 	= $this->input->post('ID_SURATM');
		$nomor 				= filter_var($this->input->post('NOMOR'), FILTER_SANITIZE_NUMBER_INT);
		$tgl	 				= $this->input->post('TANGGAL');
		$date					= str_replace("-", "", $tgl);
		$waktu 				= date("His");

		$ext 					= strtolower(pathinfo($_FILES['FILE']['name'], PATHINFO_EXTENSION));

		// gif|jpg|png|jpeg|pdf|doc|docx
		if ($ext == "gif" || $ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "pdf" || $ext == "doc" || $ext == "docx") {

			$file_name    = "{$waktu}_{$date}_{$nomor}.{$ext}";

			if (unlink($FILE)){

				if ($this->do_upload($file_name, $tgl) == TRUE) {
					if ($this->M_suratmasuk->edit($file_name) == TRUE) {
						$this->session->set_flashdata('success', "Berhasil mengubah data surat masuk, dengan nomor <b>".$this->input->post('NOMOR')."</b>");
						redirect('Surat-Masuk');
					}else{
						$this->session->set_flashdata('error', "Tidak ada perubahan data surat masuk, dengan nomor <b>".$this->input->post('NOMOR')."</b>");
						redirect('Surat-Masuk/Ubah-Masuk/'.$ID_SURATM);
					}
				}else{
					$this->session->set_flashdata('error', "Gagal menambahkan data surat masuk, dengan nomor <b>".$this->input->post('NOMOR')."</b>");
					redirect('Surat-Masuk/Ubah-Masuk/'.$ID_SURATM);
				}
			}else {
				$this->session->set_flashdata('error', "Terjadi kesalahan terhadap surat masuk, dengan nomor <b>".$this->input->post('NOMOR')."</b>");
				redirect('Surat-Masuk/Ubah-Masuk/'.$ID_SURATM);
			}
		}else {
			$this->session->set_flashdata('error', "Tipe file yang anda upload salah, harap upload file dengan tipe gif, jpg, png, jpeg, pdf, doc atau docx.");
			redirect('Surat-Masuk/Ubah-Masuk/'.$ID_SURATM);
		}
	}

	public function hapus(){
		$nomor = filter_var($this->input->post('NOMOR'), FILTER_SANITIZE_NUMBER_INT);
		if ($this->M_suratmasuk->hapus() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data surat masuk, dengan nomor <b>".$this->input->post('NOMOR')."</b>");
			redirect('Surat-Masuk');
		}else{
			$this->session->set_flashdata('error', "Gagal menghapus data surat masuk, dengan nomor <b>".$this->input->post('NOMOR')."</b>");
			redirect('Surat-Masuk');
		}
	}

	function download($tgl, $file){
		force_download("{$file}", "berkas/surat-masuk/{$tgl}/{$file}");
	}

	function do_upload($file_name, $tgl){

		$folder = "berkas/surat-masuk/{$tgl}";

		if (!is_dir($folder)) {
			mkdir($folder, 0755, true);
		}

		$config['upload_path']          = $folder;
		$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|doc|docx';
		$config['max_size']             = 8192;
		$config['overwrite'] 						= true;
		$config['file_ext_tolower'] 	  = true;
		$config['file_name'] 	  				= $file_name;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('FILE')){
			// $error = array('error' => $this->upload->display_errors());
			// print_r($error);
			return FALSE;
		}else{
			// $data = array('upload_data' => $this->upload->data());
			return TRUE;
		}
	}

}
