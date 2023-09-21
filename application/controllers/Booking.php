<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Booking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model(
			array(
				'event/event_model',
				'fakultas_model',
				'prodi_model'
			)
		);
		$this->output->delete_cache();
	}
	public function index()
	{
		$this->load->view('booking');
	}

	public function jadwal()
	{
		$data['event'] = $this->event_model->get_list()->result();
		$this->load->view('jadwal/jadwal', $data);
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function info()
	{
		$this->load->view('info/info');
	}

	public function choice()
	{
		$this->load->view('choice');
	}

	public function page()
	{
		$this->load->view('page');
	}

	public function course()
	{
		$this->load->view('course');
	}

	public function test()
	{
		$this->load->view('test');
	}

	public function download()
	{
		$this->load->view('download');
	}

	public function register($encodedIdEvent = null)
	{
		// Decode the encoded event ID
		$id_event = base64_decode($encodedIdEvent);

		// Fetch event details based on the decoded event ID
		$data['id_event'] = $id_event;
		$data['event'] = $this->event_model->get(array('id_event' => $id_event))->row();
		$data['fakultas'] = $this->fakultas_model->get()->result();
		// $data['prodi'] = $this->prodi_model->get()->result();

		$this->load->view('register/register', $data);
	}


	public function detail($id_event = null)
	{
		$data['id_event'] = $id_event;
		$data['event'] = $this->event_model->get_peserta_perevent(array('tbl_event.id_event' => $id_event))->result();
		// $data['fakultas'] = $this->fakultas_model->get()->result();
		// $data['prodi'] = $this->prodi_model->get()->result();
		$this->load->view('detail/detail', $data);
	}
}
