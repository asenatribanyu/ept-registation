<?php

class Tanggal_ALUMNI extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tanggal/Tanggal_modelalumni');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        if (!isset($this->session->userdata['username'])) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['tbl_event_alumni'] = $this->Tanggal_modelalumni->tampil_data()->result();
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/view/viewtgltesalumni', $data);
        $this->load->view('tampilan/footer');
    }

    public function input()
    {
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/tambah/tambahtgltesalumni');
        $this->load->view('tampilan/footer');
    }

    public function simpandata()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->input();
        } else {
            $tanggal_event = $this->input->post('tanggal_event');
            $type = $this->input->post('type');
            $time = $this->input->post('time');
            $venue = $this->input->post('venue');
            $kuota = $this->input->post('kuota');
            $aktif = $this->input->post('aktif');


            $data = array(
                'tanggal_event' => $tanggal_event,
                'type' => $type,
                'time' => $time,
                'venue' => $venue,
                'kuota' => $kuota,
                'aktif' => $aktif

            );
            $this->Tanggal_modelalumni->input_data($data, 'tbl_event_alumni');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-white font-weight-bold fade show" role="alert">
			Data Tanggal Berhasil Ditambahkan!
			<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/tanggal/Tanggal_ALUMNI');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tanggal_event', 'tanggal_event', 'required', ['required' => 'Tanggal Tes wajib diisi!']);
        $this->form_validation->set_rules('type', 'type', 'required', ['required' => 'Status wajib diisi!']);
        $this->form_validation->set_rules('time', 'time', 'required', ['required' => 'Waktu wajib diisi!']);
        $this->form_validation->set_rules('venue', 'venue', 'required', ['required' => 'Venue wajib diisi!']);
        $this->form_validation->set_rules('kuota', 'kuota', 'required', ['required' => 'Kuota wajib diisi!']);
        $this->form_validation->set_rules('aktif', 'aktif', 'required', ['required' => 'Aktif wajib diisi!']);
    }

    public function update($id)
    {
        $where = array('id_event_alumni' => $id);
        $data['tbl_event_alumni'] = $this->Tanggal_modelalumni->edit_data($where, 'tbl_event_alumni')->result();
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/edit/edittgltesalumni', $data);
        $this->load->view('tampilan/footer');
    }

    public function update_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update(0);
        } else {
            $id = $this->input->post('id_event_alumni');
            $tanggal_event = $this->input->post('tanggal_event');
            $type = $this->input->post('type');
            $time = $this->input->post('time');
            $venue = $this->input->post('venue');
            $kuota = $this->input->post('kuota');
            $aktif = $this->input->post('aktif');


            $data = array(
                'tanggal_event' => $tanggal_event,
                'type' => $type,
                'time' => $time,
                'venue' => $venue,
                'kuota' => $kuota,
                'aktif' => $aktif

            );

            $where = array(
                'id_event_alumni' => $id
            );

            $this->Tanggal_modelalumni->update_data($where, $data, 'tbl_event_alumni');
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible text-white font-weight-bold fade show" role="alert">
			Data Tanggal Berhasil Diupdate!
			<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/tanggal/Tanggal_ALUMNI');
        }
    }


    public function delete($id)
    {
        $where = array('id_event_alumni' => $id);
        $this->Tanggal_modelalumni->hapus_data($where, 'tbl_event_alumni');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Tanggal Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/tanggal/Tanggal_ALUMNI');
    }

    public function detailadmin($id_event_alumni = null)
    {
        $data['id_event_alumni'] = $id_event_alumni;
        $data['event'] = $this->Tanggal_modelalumni->get_peserta_perevent(array('tbl_event_alumni.id_event_alumni' => $id_event_alumni))->result();
        // $data['fakultas'] = $this->fakultas_model->get()->result();
        // $data['prodi'] = $this->prodi_model->get()->result();
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/detail/detailadminalumni', $data);
        $this->load->view('tampilan/footer');
    }

    public function pertanggal()
    {
        $data['tbl_event_alumni'] = $this->Tanggal_modelalumni->tampil_data()->result();
        $this->load->view('tampilan/headeralumni');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/pertanggal/pertanggalalumni', $data);
        $this->load->view('tampilan/footer');
    }

    public function deletee()
    {
        $id_event_alumni = $_POST['id_event_alumni'];
        $this->Tanggal_modelalumni->delete($id_event_alumni);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Tanggal Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/tanggal/Tanggal_ALUMNI');
    }
}
