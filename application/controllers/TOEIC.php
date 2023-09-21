<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class TOEIC extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model(
            array(
                'event/event_modeltoeic',
                'fakultas_model',
                'prodi_model'
            )
        );
        $this->output->delete_cache();
    }

    public function infotoeic()
    {
        $this->load->view('info/infotoeic');
    }

    public function jadwaltoeic()
    {
        $data['event'] = $this->event_modeltoeic->get_list()->result();
        $this->load->view('jadwal/jadwaltoeic', $data);
    }

    public function registertoeic($id_event_toeic = null)
    {
        $data['id_event_toeic'] = $id_event_toeic;
        $data['event'] = $this->event_modeltoeic->get(array('id_event_toeic' => $id_event_toeic))->row();
        $data['fakultas'] = $this->fakultas_model->get()->result();
        // $data['prodi'] = $this->prodi_model->get()->result();
        $this->load->view('register/registertoeic', $data);
    }

    public function detailtoeic($id_event_toeic = null)
    {
        $data['id_event_toeic'] = $id_event_toeic;
        $data['event'] = $this->event_modeltoeic->get_peserta_perevent(array('tbl_event_toeic.id_event_toeic' => $id_event_toeic))->result();
        // $data['fakultas'] = $this->fakultas_model->get()->result();
        // $data['prodi'] = $this->prodi_model->get()->result();
        $this->load->view('detail/detailtoeic', $data);
    }
}
