<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_auto']);
	}

	public function index(){

	}

	public function error404(){
		$data['module'] 	= "Auto";
		$data['fileview'] 	= "error404";
		echo Modules::run('Template/Template_error', $data);
	}

}
