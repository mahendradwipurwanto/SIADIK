<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_pengaturan']);
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

	public function test(){

		$a = array();

		for ($i=1; $i <= 10 ; $i++) {
			$a[$i] = $i+10;
		}
		$b = json_encode($a);
		$c = json_decode($b);
		echo $c->{'a'};
		// $json = json_encode($a);
		//
		// $obj = json_decode($json);
		// echo $obj->{'a'};
		// Nama Bapak
		// Nama Ibuk
		// Alamat
		// Pada Hari
		// Tanggal
		// Jam
		// Di
		// jenis kelamin
		// Anak ke
		// diberi nama

	}

	public function index(){

		$data['module'] 		= "Pengaturan";
		$data['fileview'] 	= "pengaturan";
		echo Modules::run('Template/Template_main', $data);
	}

	public function Kategori(){

		$data['kategori']		= $this->M_pengaturan->get_kategori();
		$data['controller']	= $this;

		$data['module'] 		= "Pengaturan";
		$data['fileview'] 	= "kategori";
		echo Modules::run('Template/Template_main', $data);
	}

	public function tambah_kategori(){
		$NAMA = $this->input->post('NAMA');
		if ($this->M_pengaturan->tambah_kategori() == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil menambahkan data kategori <b>'.$NAMA.'</b> !!');
			header('location:' . site_url('Pengaturan/Kategori'));
		}else{
			$this->session->set_flashdata('alert', 'Terjadi kesalahan saat menambahkan data kategori <b>'.$NAMA.'</b> !!');
			header('location:' . site_url('Pengaturan/Kategori'));
		}
	}

	public function ubah_kategori(){
		$NAMA = $this->input->post('NAMA');
		if ($this->M_pengaturan->ubah_kategori() == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil mengubah data kategori <b>'.$NAMA.'</b> !!');
			header('location:' . site_url('Pengaturan/Kategori'));
		}else{
			$this->session->set_flashdata('alert', 'Terjadi kesalahan saat mengubah data kategori <b>'.$NAMA.'</b> !!');
			header('location:' . site_url('Pengaturan/Kategori'));
		}
	}

	public function hapus_kategori(){
		$NAMA = $this->input->post('NAMA');
		if ($this->M_pengaturan->hapus_kategori() == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil menghapus data kategori <b>'.$NAMA.'</b> !!');
			header('location:' . site_url('Pengaturan/Kategori'));
		}else{
			$this->session->set_flashdata('alert', 'Terjadi kesalahan saat menghapus data kategori <b>'.$NAMA.'</b> !!');
			header('location:' . site_url('Pengaturan/Kategori'));
		}
	}

}
