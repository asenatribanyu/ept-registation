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
    $data['score'] = $this->db->query( "
    SELECT * FROM tbl_score
    
    WHERE tbl_score.id_score = $id
    LIMIT 1")->result();
    $data['nama'] = $this->db->query( "
    SELECT * FROM tbl_score
    LEFT JOIN tbl_peserta ON tbl_score.npm = tbl_peserta.npm
    LEFT JOIN tbl_prodi ON tbl_peserta.id_prodi = tbl_prodi.id_prodi
    LEFT JOIN tbl_fakultas ON tbl_peserta.id_fakultas = tbl_fakultas.id_fakultas
    WHERE tbl_score.id_score = $id
    LIMIT 1")->result();
    $data['chart'] = $this->db->query( "
    SELECT * FROM tbl_score
    LEFT JOIN tbl_peserta ON tbl_score.npm = tbl_peserta.npm
    LEFT JOIN tbl_prodi ON tbl_peserta.id_prodi = tbl_prodi.id_prodi
    LEFT JOIN tbl_fakultas ON tbl_peserta.id_fakultas = tbl_fakultas.id_fakultas
    WHERE tbl_score.id_score = $id
    LIMIT 1")->result();
    $this->load->view('scanner/scan',$data);
    }
}
