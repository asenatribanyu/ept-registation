<?php

class Pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar/Pendaftar_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        if (!isset($this->session->userdata['username'])) {
            redirect('login');
        }
    }

    public function index()
    {
        if($this->session->userdata['role_id'] !== '1'){
            redirect('/admin/dashboard/laporan_EPT');
        }else{
        $data['tbl_registrant'] = $this->Pendaftar_model->getAll()->result();
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/view/viewpendaftar', $data);
        $this->load->view('tampilan/footer');
        }
    }

    public function delete($id)
    {
        $where = array('id_registrant' => $id);
        $this->Pendaftar_model->hapus_data($where, 'tbl_registrant');
        redirect('admin/pendaftar/pendaftar');
    }

    public function deletee()
    {
        $id_registrant = $_POST['id_registrant'];
        $this->Pendaftar_model->delete($id_registrant);
        redirect('admin/pendaftar/pendaftar');
    }

    public function export()
    {
        $data['tbl_registrant'] = $this->Pendaftar_model->getAll()->result();
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/export/export', $data);
        $this->load->view('tampilan/footer');
    }

    public function filter($id){
        if($id <= 6 ){
            $filter = 'fakultas';
            $data['tbl_registrant'] = $this->Pendaftar_model->filter($filter, $id)->result();
        }else{
            $filter = 'prodi';
            $data['tbl_registrant'] = $this->Pendaftar_model->filter($filter, $id)->result(); 
        }
        
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/filter/tabel', $data);
        $this->load->view('tampilan/footer');
    }
}
