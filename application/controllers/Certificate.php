<?php

class Certificate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('score/Score_model');
        $this->load->model('event/Event_model');
    }

    public function certificate($id){
        $data = $this->db->get_where('tbl_score', array('id_score' => $id))->row();
        $dataTanggal = DateTime::createFromFormat('d F Y', $data->tanggal);
    $currentDate = new DateTime();

    // Calculate the difference in years
    $interval = $currentDate->diff($dataTanggal);
    $yearsDifference = $interval->y;

    // Check if it's more than 2 years
    if ($yearsDifference >= 2) {
        // Display "Sudah Expire" with the expired date
        $expiredDate = $dataTanggal->format('d F Y');
        echo "Sudah Expire pada tanggal $expiredDate";
    } else {
        echo "Belum expire";
    }
    }
}
