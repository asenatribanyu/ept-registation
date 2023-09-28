<?php

class Peserta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datapeserta/Datapeserta_model');
		$this->load->library('form_validation');
		$this->load->helper('url', 'form');
		if (!isset($this->session->userdata['username'])) {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/peserta/peserta/index'); // URL to the pagination page
		$config['total_rows'] = $this->db->count_all('tbl_peserta'); // Total number of records
		$config['per_page'] = 10; // Number of records to show per page

		// Styling for the pagination links
		$config['full_tag_open'] = '<nav><ul class="pagination pagination-lg">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link bg-light border-dark" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		$page = $this->uri->segment(5);
		$data['records'] = $this->Datapeserta_model->get_records($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();

		// $data['tbl_peserta'] = $this->Datapeserta_model->getAll()->result();
		$this->load->view('tampilan/header');
		$this->load->view('tampilan/navbar');
		$this->load->view('admin/peserta/view/viewpeserta', $data);
		$this->load->view('tampilan/footer');
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
		$where = array('id_peserta' => $id);
		$data['tbl_peserta'] = $this->Datapeserta_model->edit_data($where, 'tbl_peserta')->result();
		$this->load->view('tampilan/header');
		$this->load->view('tampilan/navbar');
		$this->load->view('admin/peserta/edit/editpeserta', $data);
		$this->load->view('tampilan/footer');
	}

	public function update_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update(0);
		} else {
			$id = $this->input->post('id_peserta');
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
				'id_peserta' => $id
			);

			$this->Datapeserta_model->update_data($where, $data, 'tbl_peserta');
			$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible text-white font-weight-bold fade show" role="alert">
			Data Peserta Berhasil Diupdate!
			<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/peserta/peserta');
		}
	}


	public function delete($id)
	{
		$where = array('id_peserta' => $id);
		$this->Datapeserta_model->hapus_data($where, 'tbl_peserta');

		redirect('admin/peserta/peserta');
	}

	public function deletee()
	{
		$id_peserta = $_POST['id_peserta'];
		$this->Datapeserta_model->delete($id_peserta);

		redirect('admin/peserta/peserta');
	}

	public function export()
	{
		$data['tbl_peserta'] = $this->Datapeserta_model->getAll()->result();
		$this->load->view('tampilan/header');
		$this->load->view('tampilan/navbar');
		$this->load->view('admin/peserta/export/exportpeserta', $data);
		$this->load->view('tampilan/footer');
	}
}
