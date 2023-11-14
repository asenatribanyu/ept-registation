<?php

class Pendaftartoeic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar/Pendaftar_modeltoeic');
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
        $data['tbl_registrant_toeic'] = $this->Pendaftar_modeltoeic->getAll()->result();
        $this->load->view('tampilan/headertoeic');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/view/viewpendaftartoeic', $data);
        $this->load->view('tampilan/footer');
        }
    }

    public function delete($id)
    {
        $where = array('id_registrant_toeic' => $id);
        $this->Pendaftar_modeltoeic->hapus_data($where, 'tbl_registrant_toeic');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Pendaftar Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pendaftar/pendaftartoeic');
    }

    public function deletee()
    {
        $id_registrant_toeic = $_POST['id_registrant_toeic'];
        $this->Pendaftar_modeltoeic->delete($id_registrant_toeic);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Pendaftar Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pendaftar/pendaftartoeic');
    }

    public function export()
    {
        $data['tbl_registrant_toeic'] = $this->Pendaftar_modeltoeic->getAll()->result();
        $this->load->view('tampilan/headertoeic');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/export/exporttoeic', $data);
        $this->load->view('tampilan/footer');
    }
}
