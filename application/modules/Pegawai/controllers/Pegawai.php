<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_pegawai']);
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
		$data['pegawai'] 				= $this->M_pegawai->get_pegawai();

		$data['module'] 		= "Pegawai";
		$data['fileview'] 	= "pegawai";
		echo Modules::run('Template/Template_main', $data);
	}

	// BASE CUD Controller
	public function tambah(){
		$nama = $this->input->post('NAMA');
		if ($this->M_pegawai->tambah() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menambahkan data pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}else{
			$this->session->set_flashdata('error', "Gagal menambahkan data pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}
	}
	public function edit(){
		$nama = $this->input->post('NAMA');
		if ($this->M_pegawai->edit() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}else{
			$this->session->set_flashdata('error', "Tidak ada perubahan data pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}
	}
	public function hapus(){
		$nama = $this->input->post('NAMA');
		if ($this->M_pegawai->hapus() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}else{
			$this->session->set_flashdata('error', "Gagal menghapus data pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}
	}
	public function hak_akses(){
		$nama = $this->input->post('NAMA');
		if ($this->M_pegawai->atur_hak_akses() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengatur hak akses pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}elseif ($this->M_pegawai->atur_hak_akses() == 3){
			$this->session->set_flashdata('error', "Hak akses data pegawai, atas nama <b>".$nama."</b> telah ada.");
			redirect('Pegawai');
		}else{
			$this->session->set_flashdata('error', "Gagal mengatur hak akses data pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}
	}
	public function HapusHakAkses($ID_USER, $nama){
		if ($this->M_pegawai->hapushak_akses($ID_USER) == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus hak akses pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}else{
			$this->session->set_flashdata('error', "Gagal menghapus hak akses pegawai, atas nama <b>".$nama."</b>");
			redirect('Pegawai');
		}
	}

}
