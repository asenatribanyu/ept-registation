<?php

class Filterscore extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Score/Score_model');
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
        $this->load->view('admin/score/filter/fscore');
        $this->load->view('tampilan/footer');
    }


}