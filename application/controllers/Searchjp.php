<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Searchjp extends CI_Controller
{

    public function index()
    {
        $this->load->model('Search/Search_modeljp');
        $keyword = $this->input->get('keyword');
        $data = $this->Search_modeljp->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data
        );
        $this->load->view('search/searchscorejp', $data);
    }
}
