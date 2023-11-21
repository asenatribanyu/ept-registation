<?php

class Tanggal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tanggal/Tanggal_model');
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
		$data['tbl_event'] = $this->Tanggal_model->tampil_data()->result();
		$this->load->view('tampilan/header');
		$this->load->view('tampilan/navbar');
		$this->load->view('admin/tgltes/view/viewtgltes', $data);
		$this->load->view('tampilan/footer');
		}
	}

	public function input()
	{
		$this->load->view('tampilan/header');
		$this->load->view('tampilan/navbar');
		$this->load->view('admin/tgltes/tambah/tambahtgltes');
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
			$this->Tanggal_model->input_data($data, 'tbl_event');
			redirect('admin/tanggal/tanggal');
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
		$where = array('id_event' => $id);
		$data['tbl_event'] = $this->Tanggal_model->edit_data($where, 'tbl_event')->result();
		$this->load->view('tampilan/header');
		$this->load->view('tampilan/navbar');
		$this->load->view('admin/tgltes/edit/edittgltes', $data);
		$this->load->view('tampilan/footer');
	}

	public function update_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update(0);
		} else {
			$id = $this->input->post('id_event');
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
				'id_event' => $id
			);

			$this->Tanggal_model->update_data($where, $data, 'tbl_event');
			redirect('admin/tanggal/tanggal');
		}
	}


	public function delete($id)
	{
		$where = array('id_event' => $id);
		$this->Tanggal_model->hapus_data($where, 'tbl_event');
		redirect('admin/tanggal/tanggal');
	}

	public function detailadmin($id_event = null)
	{
		$data['id_event'] = $id_event;
		$data['event'] = $this->Tanggal_model->get_peserta_perevent(array('tbl_event.id_event' => $id_event))->result();
		// $data['fakultas'] = $this->fakultas_model->get()->result();
		// $data['prodi'] = $this->prodi_model->get()->result();
		$this->load->view('tampilan/header');
		$this->load->view('tampilan/navbar');
		$this->load->view('admin/tgltes/detail/detailadmin', $data);
		$this->load->view('tampilan/footer');
	}

	public function pertanggal()
	{
		$data['tbl_event'] = $this->Tanggal_model->tampil_data()->result();
		$this->load->view('tampilan/header');
		$this->load->view('tampilan/navbar');
		$this->load->view('admin/tgltes/pertanggal/pertanggal', $data);
		$this->load->view('tampilan/footer');
	}

	public function deletee()
	{
		$id_event = $_POST['id_event'];
		$this->Tanggal_model->delete($id_event);
	}
}
