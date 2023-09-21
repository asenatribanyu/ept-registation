<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peserta_modeltoeic extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function insert($data, $data_event)
    {
        $this->db->insert('tbl_peserta_toeic', $data);
        $id = $this->db->insert_id();

        $registrant = array(
            'id_event_toeic' => $data_event,
            'id_peserta_toeic' => $id
        );
        $this->db->insert('tbl_registrant_toeic', $registrant);
        return $id;
    }
}
