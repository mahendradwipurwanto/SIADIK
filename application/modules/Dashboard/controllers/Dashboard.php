<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_dashboard']);
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
		$data['pegawai'] 				= $this->M_dashboard->c_pegawai();
		$data['penduduk'] 			= $this->M_dashboard->c_penduduk();
		$data['surat_masuk'] 		= $this->M_dashboard->c_smasuk();
		$data['surat_keluar'] 	= $this->M_dashboard->c_skeluar();

		$data['module'] 	= "Dashboard";

		if($this->session->userdata('role') == 0){
			$data['fileview'] 	= "dashboard_main";
		}elseif($this->session->userdata('role') == 1){
			$data['fileview'] 	= "dashboard_lurah";
		}else{
			$this->session->set_flashdata('error', 'Hak akses tidak diketahui');
			header('location:' . site_url('Login'));
		}
		echo Modules::run('Template/Template_main', $data);
	}

	public function statistik(){
		$data['pegawai'] 				= $this->M_dashboard->c_pegawai();
		$data['penduduk'] 			= $this->M_dashboard->c_penduduk();
		$data['surat_masuk'] 		= $this->M_dashboard->c_smasuk();
		$data['surat_keluar'] 	= $this->M_dashboard->c_skeluar();

		$data['module'] 		= "Dashboard";
		$data['fileview'] 	= "statistik";
		echo Modules::run('Template/Template_main', $data);
	}

	// public function Browser(){
	// 	define('FM_EMBED', true);
	// 	define('FM_SELF_URL', $_SERVER['PHP_SELF']);
	// 	require 'file_manager/tinyfilemanager.php';
	// }

	public function changelog(){

		$data['module'] 		= "Dashboard";
		$data['fileview'] 	= "changelog";
		echo Modules::run('Template/Template_main', $data);
	}

}
