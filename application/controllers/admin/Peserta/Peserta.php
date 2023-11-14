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
		$data['tbl_peserta'] = $this->Datapeserta_model->getAll()->result();
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

	public function filter($id){
        if($id <= 6 ){
            $filter = 'fakultas';
            $data['tbl_peserta'] = $this->Datapeserta_model->filter($filter, $id)->result();
        }else{
            $filter = 'prodi';
            $data['tbl_peserta'] = $this->Datapeserta_model->filter($filter, $id)->result(); 
        }
        
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/peserta/filter/tabelpeserta', $data);
        $this->load->view('tampilan/footer');
    }
}
