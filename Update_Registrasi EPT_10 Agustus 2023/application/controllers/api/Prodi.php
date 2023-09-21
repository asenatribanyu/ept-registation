<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
require APPPATH . 'libraries/RestController.php';
require APPPATH.'libraries/Format.php';

class Prodi extends RestController {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array(
			'prodi_model'
			)
		);
		$this->output->delete_cache();
	}

	public function getprodi_post($id_fakultas=null){
        $id_fakultas = $_POST['id_fakultas'];
		$data['prodi'] = $this->prodi_model->get(array('id_fakultas'=>$id_fakultas))->result();
	//tampilkan response
		$this->response($data);
	}
}
