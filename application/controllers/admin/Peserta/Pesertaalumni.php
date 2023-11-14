<?php

class Pesertaalumni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datapeserta/Datapeserta_modelalumni');
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
        $data['tbl_peserta_alumni'] = $this->Datapeserta_modelalumni->getAll()->result();
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/peserta/view/viewpesertaalumni', $data);
        $this->load->view('tampilan/footer');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_peserta', 'nama_peserta', 'required', ['required' => 'Nama wajib diisi!']);
        $this->form_validation->set_rules('npm', 'npm', 'required', ['required' => 'npm wajib diisi!']);
        $this->form_validation->set_rules('email', 'email', 'required', ['required' => 'email wajib diisi!']);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required', ['required' => 'no hp wajib diisi!']);
    }

    public function update($id)
    {
        $where = array('id_peserta_alumni' => $id);
        $data['tbl_peserta_alumni'] = $this->Datapeserta_modelalumni->edit_data($where, 'tbl_peserta_alumni')->result();
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/peserta/edit/editpesertaalumni', $data);
        $this->load->view('tampilan/footer');
    }

    public function update_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update(0);
        } else {
            $id = $this->input->post('id_peserta_alumni');
            $nama_peserta = $this->input->post('nama_peserta');
            $npm = $this->input->post('npm');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');

            $data = array(
                'nama_peserta' => $nama_peserta,
                'npm' => $npm,
                'email' => $email,
                'no_hp' => $no_hp
            );

            $where = array(
                'id_peserta_alumni' => $id
            );

            $this->Datapeserta_modelalumni->update_data($where, $data, 'tbl_peserta_alumni');
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible text-white font-weight-bold fade show" role="alert">
			Data Peserta Berhasil Diupdate!
			<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/peserta/pesertaalumni');
        }
    }

    public function delete($id)
    {
        $where = array('id_peserta_alumni' => $id);
        $this->Datapeserta_modelalumni->hapus_data($where, 'tbl_peserta_alumni');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Peserta Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/peserta/pesertaalumni');
    }

    public function deletee()
    {
        $id_peserta_alumni = $_POST['id_peserta_alumni'];
        $this->Datapeserta_modelalumni->delete($id_peserta_alumni);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Peserta Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/peserta/pesertaalumni');
    }

    public function export()
    {
        $data['tbl_peserta_alumni'] = $this->Datapeserta_modelalumni->getAll()->result();
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/peserta/export/exportpesertaalumni', $data);
        $this->load->view('tampilan/footer');
    }
}
