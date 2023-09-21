<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class ALUMNI extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model(
            array(
                'event/event_modelalumni',
                'fakultas_model',
                'prodi_model'
            )
        );
        $this->output->delete_cache();
    }

    public function infoalumni()
    {
        $this->load->view('info/infoalumni');
    }

    public function jadwalalumni()
    {
        $data['event'] = $this->event_modelalumni->get_list()->result();
        $this->load->view('jadwal/jadwalalumni', $data);
    }

    public function registeralumni($id_event_alumni = null)
    {
        $data['id_event_alumni'] = $id_event_alumni;
        $data['event'] = $this->event_modelalumni->get(array('id_event_alumni' => $id_event_alumni))->row();
        $data['fakultas'] = $this->fakultas_model->get()->result();
        // $data['prodi'] = $this->prodi_model->get()->result();
        $this->load->view('register/registeralumni', $data);
    }

    public function detailalumni($id_event_alumni = null)
    {
        $data['id_event_alumni'] = $id_event_alumni;
        $data['event'] = $this->event_modelalumni->get_peserta_perevent(array('tbl_event_alumni.id_event_alumni' => $id_event_alumni))->result();
        // $data['fakultas'] = $this->fakultas_model->get()->result();
        // $data['prodi'] = $this->prodi_model->get()->result();
        $this->load->view('detail/detailalumni', $data);
    }
}
