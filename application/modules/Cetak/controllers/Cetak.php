<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_cetak']);
		$this->load->library('pdf');
	}

	public function encode_img_base64( $img_path = false, $img_type = 'png' ){
    if( $img_path ){
        //convert image into Binary data
        $img_data = fopen ( $img_path, 'rb' );
        $img_size = filesize ( $img_path );
        $binary_image = fread ( $img_data, $img_size );
        fclose ( $img_data );

        //Build the src string to place inside your img tag
        $img_src = "data:image/".$img_type.";base64,".str_replace ("\n", "", base64_encode($binary_image));

        return $img_src;
    }

    return false;
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
