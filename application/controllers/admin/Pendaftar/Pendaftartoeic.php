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
        $this->load->library('pagination');
		$config['base_url'] = base_url('/admin/pendaftar/pendaftartoeic/index'); // URL to the pagination page
		$config['total_rows'] = $this->db->count_all('tbl_registrant'); // Total number of records
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
		$data['records'] = $this->Pendaftar_modeltoeic->get_records($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();

        // $data['tbl_registrant_toeic'] = $this->Pendaftar_modeltoeic->getAll()->result();
        $this->load->view('tampilan/headertoeic');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/view/viewpendaftartoeic', $data);
        $this->load->view('tampilan/footer');
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
