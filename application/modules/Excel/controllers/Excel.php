<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
			for($i = 2;$i < count($sheetData);$i++)
			{
				$data = array(
					'NIK' => $sheetData[$i]['1'],
					'NAMA' => $sheetData[$i]['2'],
					'JK' => $sheetData[$i]['3'],
					'TEMPAT_LAHIR' => $sheetData[$i]['4'],
					'TGL_LAHIR' => $sheetData[$i]['5'],
					'UMUR' => $sheetData[$i]['6'],
					'GOL_DARAH' => $sheetData[$i]['7'],
					'AGAMA' => $sheetData[$i]['8'],
					'STATUS' => $sheetData[$i]['9'],
					'HUBUNGAN' => $sheetData[$i]['10'],
					'PENDIDIKAN' => $sheetData[$i]['11'],
					'PEKERJAAN' => $sheetData[$i]['12'],
					'IBU' => $sheetData[$i]['13'],
					'AYAH' => $sheetData[$i]['14'],
				);

				$this->db->insert("TB_PENDUDUK", $data);
				$count++;
			}

				$this->session->set_flashdata('success', "Berhasil meng-impor data penduduk, sebanyak <b>".$count."</b>");
				redirect('Penduduk');
		}
	}

}
