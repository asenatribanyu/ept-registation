<?php

class Pendaftarjp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar/Pendaftar_modeljp');
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
        $data['tbl_registrant_jp'] = $this->Pendaftar_modeljp->getAll()->result();
        $this->load->view('tampilan/headerjp');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/view/viewpendaftarjp', $data);
        $this->load->view('tampilan/footer');
        }
    }

    public function delete($id)
    {
        $where = array('id_registrant_jp' => $id);
        $this->Pendaftar_modeljp->hapus_data($where, 'tbl_registrant_jp');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Pendaftar Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pendaftar/pendaftarjp');
    }

    public function deletee()
    {
        $id_registrant_jp = $_POST['id_registrant_jp'];
        $this->Pendaftar_modeljp->delete($id_registrant_jp);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Pendaftar Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pendaftar/pendaftarjp');
    }

    public function export()
    {
        $data['tbl_registrant_jp'] = $this->Pendaftar_modeljp->getAll()->result();
        $this->load->view('tampilan/headerjp');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/export/exportjp', $data);
        $this->load->view('tampilan/footer');
    }
}
