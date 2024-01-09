<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scan extends CI_Controller
{

    public function index()
    {
        $this->load->view('scanner/scan');
    }

}