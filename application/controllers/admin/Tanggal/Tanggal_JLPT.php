<?php

class Tanggal_JLPT extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tanggal/Tanggal_modeljp');
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
        $data['tbl_event_jp'] = $this->Tanggal_modeljp->tampil_data()->result();
        $this->load->view('tampilan/headerjp');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/view/viewtgltesjp', $data);
        $this->load->view('tampilan/footer');
        }
    }

    public function input()
    {
        $this->load->view('tampilan/headerjp');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/tambah/tambahtgltesjp');
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
            $this->Tanggal_modeljp->input_data($data, 'tbl_event_jp');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-white font-weight-bold fade show" role="alert">
			Data Tanggal Berhasil Ditambahkan!
			<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/tanggal/Tanggal_JLPT');
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
        $where = array('id_event_jp' => $id);
        $data['tbl_event_jp'] = $this->Tanggal_modeljp->edit_data($where, 'tbl_event_jp')->result();
        $this->load->view('tampilan/headerjp');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/edit/edittgltesjp', $data);
        $this->load->view('tampilan/footer');
    }

    public function update_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update(0);
        } else {
            $id = $this->input->post('id_event_jp');
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
                'id_event_jp' => $id
            );

            $this->Tanggal_modeljp->update_data($where, $data, 'tbl_event_jp');
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible text-white font-weight-bold fade show" role="alert">
			Data Tanggal Berhasil Diupdate!
			<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/tanggal/Tanggal_JLPT');
        }
    }


    public function delete($id)
    {
        $where = array('id_event_jp' => $id);
        $this->Tanggal_modeljp->hapus_data($where, 'tbl_event_jp');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Tanggal Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/tanggal/Tanggal_JLPT');
    }

    public function detailadmin($id_event_jp = null)
    {
        $data['id_event_jp'] = $id_event_jp;
        $data['event'] = $this->Tanggal_modeljp->get_peserta_perevent(array('tbl_event_jp.id_event_jp' => $id_event_jp))->result();
        // $data['fakultas'] = $this->fakultas_model->get()->result();
        // $data['prodi'] = $this->prodi_model->get()->result();
        $this->load->view('tampilan/headerjp');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/detail/detailadminjp', $data);
        $this->load->view('tampilan/footer');
    }

    public function pertanggal()
    {
        $data['tbl_event_jp'] = $this->Tanggal_modeljp->tampil_data()->result();
        $this->load->view('tampilan/headerjp');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/tgltes/pertanggal/pertanggaljp', $data);
        $this->load->view('tampilan/footer');
    }

    public function deletee()
    {
        $id_event_jp = $_POST['id_event_jp'];
        $this->Tanggal_modeljp->delete($id_event_jp);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Tanggal Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/tanggal/Tanggal_JLPT');
    }
}
