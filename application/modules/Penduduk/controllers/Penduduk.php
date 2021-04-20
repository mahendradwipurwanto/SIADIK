<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_penduduk']);
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

	function test(){
		$str = '432/  130   /35.07.18.2010/2020';
		print_r(filter_var($str, FILTER_SANITIZE_NUMBER_INT));
	}

	public function index(){
		$data['penduduk'] 				= $this->M_penduduk->get_penduduk();

		$data['module'] 		= "Penduduk";
		$data['fileview'] 	= "penduduk";
		echo Modules::run('Template/Template_main', $data);
	}

	function get_data_user(){
		$list = $this->M_penduduk->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$row = array();
			$no++;

			$row[] = '
			<input type="checkbox" name="msg[]" value="'.$field->ID_PENDUDUK.'">
			';
			$row[] = $no;

			$row[] = '
			<a href="'.site_url('Penduduk/Ubah-Penduduk/'.$field->ID_PENDUDUK).'" class="btn btn-datatable btn-icon btn-transparent-dark mr-1"><i class="text-info fa fa-edit" data-feather="edit"></i></a>
			<button class="btn btn-datatable btn-icon btn-transparent-dark mr-1" onclick="delete_person('."'".$field->ID_PENDUDUK."'".')"><i class="text-danger fa fa-trash" data-feather="trash-2"></i></button>
			<a href="'.site_url('Penduduk/Detail-Penduduk/'.$field->ID_PENDUDUK).'" target="_blank" class="btn btn-datatable btn-icon btn-transparent-dark" ><i class="text-warning fa fa-eye" data-feather="eye"></i></a>
			';

			$row[] = $field->NIK;
			$row[] = $field->NAMA;
			$row[] = $field->JK;
			$row[] = $field->TEMPAT_LAHIR." - ".date("d F Y", strtotime($field->TGL_LAHIR));

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_penduduk->count_all(),
			"recordsFiltered" => $this->M_penduduk->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function ajax_delete($id){
		$this->M_penduduk->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	function hapus_data_all(){

		$a =  count($this->input->post('msg', true));
		$this->M_penduduk->hapus_data_all();

		$this->session->set_flashdata('success', "berhasil menghapus ".$a." data penduduk");
		redirect('Penduduk');
	}

	public function detail_penduduk($NIK){
		if ($this->M_penduduk->get_penduduk_single($NIK) == TRUE) {
			$data['penduduk'] 				= $this->M_penduduk->get_penduduk_single($NIK);

			$data['module'] 		= "Penduduk";
			$data['fileview'] 	= "detail";
			echo Modules::run('Template/Template_main', $data);
		}else{
			$this->session->set_flashdata('error', "Gagal menampilkan data penduduk");
			redirect('Penduduk');
		}
	}

	public function edit_penduduk($NIK){
		if ($this->M_penduduk->get_penduduk_single($NIK) == TRUE) {
			$data['penduduk'] 				= $this->M_penduduk->get_penduduk_single($NIK);

			$data['module'] 		= "Penduduk";
			$data['fileview'] 	= "edit_penduduk";
			echo Modules::run('Template/Template_main', $data);
		}else{
			$this->session->set_flashdata('error', "Gagal menampilkan data penduduk");
			redirect('Penduduk');
		}
	}

	public function tambah_penduduk(){
		$data['penduduk'] 				= $this->M_penduduk->get_penduduk();

		$data['module'] 		= "Penduduk";
		$data['fileview'] 	= "tambah_penduduk";
		echo Modules::run('Template/Template_main', $data);
	}

	// BASE CUD Controller
	public function tambah(){
		$NAMA = $this->input->post('NAMA');

		if ($this->M_penduduk->tambah() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menambahkan data penduduk masuk, dengan nomor <b>".$NAMA."</b>");
			redirect('Penduduk');
		}else{
			$this->session->set_flashdata('error', "Gagal menambahkan data penduduk masuk, dengan nomor <b>".$NAMA."</b>");
			redirect('Penduduk/Tambah-Penduduk');
		}
	}

	public function edit(){
		$NAMA = $this->input->post('NAMA');
		$NIK = $this->input->post('NIK');

		if ($this->M_penduduk->edit() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data penduduk masuk, dengan nomor <b>".$NAMA."</b>");
			redirect('Penduduk');
		}else{
			$this->session->set_flashdata('error', "Gagal mengubah data penduduk masuk, dengan nomor <b>".$NAMA."</b>");
			redirect('Penduduk/Ubah-Penduduk/'.$NIK);
		}
	}

	public function hapus(){
		$NAMA = $this->input->post('NAMA');
		if ($this->M_penduduk->hapus() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data penduduk masuk, dengan nomor <b>".$NAMA."</b>");
			redirect('Penduduk');
		}else{
			$this->session->set_flashdata('error', "Gagal menghapus data penduduk masuk, dengan nomor <b>".$NAMA."</b>");
			redirect('Penduduk');
		}
	}

	function download($tgl, $file){
		force_download("{$file}", "berkas/penduduk/{$tgl}/{$file}");
	}

	function do_upload($file_name, $tgl){

		$folder = "berkas/penduduk/{$tgl}";

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
