<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Searchtoeic extends CI_Controller
{

    public function index()
    {
        $this->load->model('Search/Search_modeltoeic');
        $keyword = $this->input->get('keyword');
        $data = $this->Search_modeltoeic->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data
        );
        $this->load->view('search/searchscoretoeic', $data);
    }
}
