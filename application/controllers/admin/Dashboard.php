<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        if (!isset($this->session->userdata['username'])) {
            redirect('login');
        }
    }

    public function index()
    {
        if($this->session->userdata['role_id'] !== '1'){
            redirect('/admin/dashboard/laporan_EPT');
        }else{
            $this->load->view('tampilan/header');
            $this->load->view('tampilan/navbar');
            $this->load->view('admin/dashboard/viewdashboard');
            $this->load->view('tampilan/footer');
        }
        
    }

    public function laporan_EPT()
    {
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/dashboard/laporan/laporan_EPT');
        $this->load->view('tampilan/footer');
    }

    public function laporan_JLPT()
    {
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/dashboard/laporan/laporan_JLPT');
        $this->load->view('tampilan/footer');
    }

    public function laporan_TOEIC()
    {
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/dashboard/laporan/laporan_TOEIC');
        $this->load->view('tampilan/footer');
    }

    public function laporan_ALUMNI()
    {
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/dashboard/laporan/laporan_ALUMNI');
        $this->load->view('tampilan/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        session_destroy();
        redirect('login');
    }
}
