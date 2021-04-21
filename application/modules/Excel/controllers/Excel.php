<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '360');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Excel extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_excel']);
	}

	public function impor_penduduk(){
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if(isset($_FILES['FILE_EXCEL']['name']) && in_array($_FILES['FILE_EXCEL']['type'], $file_mimes)) {

			if ($_FILES['FILE_EXCEL']['size'] < 5242880) {

				$arr_file = explode('.', $_FILES['FILE_EXCEL']['name']);
				$extension = end($arr_file);

				if('csv' == $extension) {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				}

				$spreadsheet = $reader->load($_FILES['FILE_EXCEL']['tmp_name']);

				$sheetData = $spreadsheet->getActiveSheet()->toArray();
				$count = 0;
				for($i = 1;$i < count($sheetData);$i++)
				{
					$data = array(
						'NIK' 					=> $sheetData[$i]['0'],
						'NAMA' 					=> $sheetData[$i]['1'],
						'JK' 						=> $sheetData[$i]['2'],
						'TEMPAT_LAHIR' 	=> $sheetData[$i]['3'],
						'TGL_LAHIR' 		=> $sheetData[$i]['4'],
						'UMUR' 					=> $sheetData[$i]['5'],
						'GOL_DARAH' 		=> $sheetData[$i]['6'],
						'AGAMA' 				=> $sheetData[$i]['7'],
						'STATUS' 				=> $sheetData[$i]['8'],
						'HUBUNGAN' 			=> $sheetData[$i]['9'],
						'PENDIDIKAN' 		=> $sheetData[$i]['10'],
						'PEKERJAAN' 		=> $sheetData[$i]['11'],
						'IBU' 					=> $sheetData[$i]['12'],
						'AYAH' 					=> $sheetData[$i]['13']
					);

					$this->db->insert("TB_PENDUDUK", $data);
					++$count;
				}

				// return($this->session->set_flashdata('success', "Berhasil meng-impor data penduduk, sebanyak <b>".$count."</b>"));

				$this->session->set_flashdata('success', "Berhasil meng-impor data penduduk, sebanyak <b>".$count."</b>");
				// redirect('Penduduk');

			}else{
				$this->session->set_flashdata('error', "Ukuran file lebih dari 5MB");
				// redirect('Penduduk');
				// return(false);
			}
		}
	}

}
