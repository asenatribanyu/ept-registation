<?php

class Certificate extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Datapeserta/Datapeserta_model');
		$this->load->library('form_validation');
		$this->load->helper('url', 'form');
		if (!isset($this->session->userdata['username'])) {
			redirect('login');
		}
	}

    public function index()
    {
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/certificate/viewcertificate'); 
        $this->load->view('tampilan/footer');
    }
}