<?php

class Pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar/Pendaftar_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        if (!isset($this->session->userdata['username'])) {
            redirect('login');
        }
    }

        public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('/admin/pendaftar/pendaftar/index'); // URL to the pagination page
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
		$data['records'] = $this->Pendaftar_model->get_records($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();

        // $data['tbl_registrant'] = $this->Pendaftar_model->getAll()->result();
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/view/viewpendaftar', $data);
        $this->load->view('tampilan/footer');
    }

    public function delete($id)
    {
        $where = array('id_registrant' => $id);
        $this->Pendaftar_model->hapus_data($where, 'tbl_registrant');
        redirect('admin/pendaftar/pendaftar');
    }

    public function deletee()
    {
        $id_registrant = $_POST['id_registrant'];
        $this->Pendaftar_model->delete($id_registrant);
        redirect('admin/pendaftar/pendaftar');
    }

    public function export()
    {
        $data['tbl_registrant'] = $this->Pendaftar_model->getAll()->result();
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/pendaftar/export/export', $data);
        $this->load->view('tampilan/footer');
    }
}
