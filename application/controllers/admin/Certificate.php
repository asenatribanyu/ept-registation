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

	public function upload_template(){
	if (!empty($_FILES['datafile']['name'])) {
		// Configuration for certificate background image upload
		$config_certificate['upload_path']   = 'assets/sertifikat/';
		$config_certificate['allowed_types'] = 'png';
		$config_certificate['file_name']     = 'TemplateCertificate';
		$config_certificate['overwrite']     = true;
		$this->load->library('upload', $config_certificate);

		// Perform certificate background image upload
		if (!$this->upload->do_upload('datafile')) {
			$error['certificate_error'] = $this->upload->display_errors();
		} else {
			$data['certificate_upload_data'] = $this->upload->data();
		}
	}

	if (!empty($_FILES['fontfile']['name'])) {
		// Configuration for font file upload
		$config_font['upload_path']   = 'assets/sertifikat/font/';
		$config_font['allowed_types'] = 'ttf';
		$config_font['file_name']     = 'TemplateFont';
		$config_font['overwrite']     = true;
		$this->load->library('upload', $config_font);

		// Perform font file upload
		if (!$this->upload->do_upload('fontfile')) {
			$error['font_error'] = $this->upload->display_errors();
		} else {
			unlink('assets/sertifikat/font/TemplateFont.ttf');
			$data['font_upload_data'] = $this->upload->data();
		}
	}

		// Load views based on upload success or failure
		$this->load->view('tampilan/header');
		$this->load->view('tampilan/navbar');
		if (isset($error)) {
			$this->load->view('admin/certificate/viewcertificate', $error);
		} else {
			$this->load->view('admin/certificate/viewcertificate', $data);
		}
		$this->load->view('tampilan/footer');
	}

}