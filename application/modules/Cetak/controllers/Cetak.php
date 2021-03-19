<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_cetak']);
		$this->load->library('pdf');
	}

	public function render_surat($ID_KATEGORI, $ID_SURATK){
		if ($ID_KATEGORI == 2) {

			$data['surat']				= $this->M_cetak->get_surat($ID_SURATK);
			$data['controller']		= $this;

	    $this->load->view('surat_kelahiran', $data);
		}
	}

	public function cetak_surat($ID_KATEGORI, $ID_SURATK){
		if ($ID_KATEGORI == 2) {

			$data['surat']				= $this->M_cetak->get_surat($ID_SURATK);
			$data['controller']		= $this;

	    $html = $this->load->view('surat_kelahiran', $data, true);
	    $this->pdf->createPDF($html, 'Surat', false);
		}
	}
}
