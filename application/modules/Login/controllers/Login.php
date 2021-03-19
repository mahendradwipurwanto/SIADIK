<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_login']);
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->session->set_flashdata('alert', 'Hai, anda sudah login');
			header('location:' . site_url('Dashboard'));
		}
	}

	public function hash(){
		$hash = "technoSTIKI!@#$";
		echo password_hash($hash, PASSWORD_DEFAULT);

	}

	public function index(){
		$data['module'] 	= "Login";
		$data['fileview'] 	= "login";
		echo Modules::run('Template/Template_login', $data);
	}

	function auth(){
		$username   = htmlspecialchars($this->input->post('username', true));
		$pin        = htmlspecialchars($this->input->post('pin'), true);


		if ($this->M_login->get_auth($username) == FALSE) {
			$this->session->set_flashdata('error', 'Pegawai tidak memiliki hak akses !!');
			header('location:' . base_url() . 'Login');
		}else{
			$pegawai	= $this->M_login->get_auth($username);

			if(password_verify($pin, $pegawai->PASSWORD)){
				$nama = $pegawai->NAMA;
				$sessiondata = array(
					'id_user'           => $pegawai->ID_USER,
					'username'	    		=> $pegawai->USERNAME,
					'nama' 							=> $nama,
					'role' 							=> $pegawai->ROLE,
					'logged_in' 				=> TRUE
				);

				$this->session->set_userdata($sessiondata);

				// ROLE
				// 0 = Administrasi/Staff
				// 1 = Lurah/Sekdes

				if ($this->session->userdata('redirect')) {
					$this->session->set_flashdata('success', 'Hai, '.$nama.' anda telah login. Silahkan melanjutkan aktivitas anda !!');
					redirect($this->session->userdata('redirect'));
				} else {
					$this->session->set_flashdata('success', 'Selamat Datang, '.$nama);
					header('location:' . site_url('Dashboard'));
				}

			}else{
				$this->session->set_flashdata('error', 'Pin yang anda masukkan SALAH !!');
				header('location:' . site_url('Login'));
			}
		}
	}

	public function lupapin(){
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success','Berhasil keluar!');
		header('location:' . base_url());
	}

}
