<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class JLPT extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model(
            array(
                'event/event_modeljp',
                'fakultas_model',
                'prodi_model'
            )
        );
        $this->output->delete_cache();
    }

    public function infojp()
    {
        $this->load->view('info/infojp');
    }

    public function jadwaljp()
    {
        $data['event'] = $this->event_modeljp->get_list()->result();
        $this->load->view('jadwal/jadwaljp', $data);
    }

    public function registerjp($id_event_jp = null)
    {
        $data['id_event_jp'] = $id_event_jp;
        $data['event'] = $this->event_modeljp->get(array('id_event_jp' => $id_event_jp))->row();
        $data['fakultas'] = $this->fakultas_model->get()->result();
        // $data['prodi'] = $this->prodi_model->get()->result();
        $this->load->view('register/registerjp', $data);
    }

    public function detailjp($id_event_jp = null)
    {
        $data['id_event_jp'] = $id_event_jp;
        $data['event'] = $this->event_modeljp->get_peserta_perevent(array('tbl_event_jp.id_event_jp' => $id_event_jp))->result();
        // $data['fakultas'] = $this->fakultas_model->get()->result();
        // $data['prodi'] = $this->prodi_model->get()->result();
        $this->load->view('detail/detailjp', $data);
    }
}
