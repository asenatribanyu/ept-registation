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

	public function upload_template()
	{
		$config['upload_path']   = 'assets/sertifikat/';
		$config['allowed_types'] = 'png';
		$config['file_name']     = 'TemplateCertificate.png';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('datafile'))
                {
                        $error = array('error' => $this->upload->display_errors());
						$this->load->view('tampilan/header');
						$this->load->view('tampilan/navbar');
						$this->load->view('admin/certificate/viewcertificate', $error); 
						$this->load->view('tampilan/footer');
				}
                else
                {
                        $data = array('upload_data' => $this->upload->data());
						unlink('assets/sertifikat/TemplateCertificate.png');
						$this->load->view('tampilan/header');
						$this->load->view('tampilan/navbar');
						$this->load->view('admin/certificate/viewcertificate',$data); 
						$this->load->view('tampilan/footer');
                }
	}
}