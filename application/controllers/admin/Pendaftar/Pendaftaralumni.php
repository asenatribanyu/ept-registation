<?php

class Pendaftaralumni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar/Pendaftar_modelalumni');
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
        $data['tbl_registrant_alumni'] = $this->Pendaftar_modelalumni->getAll()->result();
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/view/viewpendaftaralumni', $data);
        $this->load->view('tampilan/footer');
        }
    }

    public function delete($id)
    {
        $where = array('id_registrant_alumni' => $id);
        $this->Pendaftar_modelalumni->hapus_data($where, 'tbl_registrant_alumni');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Pendaftar Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pendaftar/pendaftaralumni');
    }

    public function deletee()
    {
        $id_registrant_alumni = $_POST['id_registrant_alumni'];
        $this->Pendaftar_modelalumni->delete($id_registrant_alumni);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Pendaftar Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pendaftar/pendaftaralumni');
    }

    public function export()
    {
        $data['tbl_registrant_alumni'] = $this->Pendaftar_modelalumni->getAll()->result();
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/export/exportalumni', $data);
        $this->load->view('tampilan/footer');
    }
}
