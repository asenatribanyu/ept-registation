<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Restore_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        if (!isset($this->session->userdata['username'])) {
            redirect('login');
        }
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if($this->session->userdata['role_id'] !== '1'){
            redirect('/admin/dashboard/laporan_EPT');
        }else{
        $this->load->view('tampilan/headerbackup');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/backup/viewbackup');
        $this->load->view('tampilan/footer');
        }
    }

    public function backup()
    {
        $this->load->dbutil();
        $tanggal  = date('d-M-Y');
        $config = array(
            'format'      => 'zip',
            'filename'    => 'ept_registration_' . $tanggal . '.sql',
            'add_drop'    => TRUE,
            'add_insert'  => TRUE,
            'newline'     => "\n",
            'foreign_key_checks'  => FALSE
        );

        $backup = &$this->dbutil->backup($config);
        $nama_file = 'ept_registration_' . $tanggal . '.zip';
        $this->load->helper('download');
        force_download($nama_file, $backup);
    }

    public function restore()
    {
        $this->Restore_model->droptabel();
        $fileinput = $_FILES['datafile'];
        $nama = $_FILES['datafile']['name'];

        if (isset($fileinput)) {
            $lokasi_file = $fileinput['tmp_name'];
            $direktori = "backupdb/$nama";
            move_uploaded_file($lokasi_file, "$direktori");
        }

        $isi_file = file_get_contents($direktori);
        $string_query = rtrim($isi_file, "\n;");
        $array_query = explode(";", $string_query);

        foreach ($array_query as $query) {
            $this->db->query($query);
        }

        unlink($direktori);

        $this->session->set_flashdata('pesan', 'Database Berhasil di Restore!');
        $this->session->set_flashdata('sweet_alert', true);
        $this->session->set_flashdata('sweet_title', 'Success');
        $this->session->set_flashdata('sweet_text', 'Database Berhasil di Restore!');
        $this->session->set_flashdata('sweet_icon', 'success');
        redirect('admin/backup', 'refresh');
    }
}
