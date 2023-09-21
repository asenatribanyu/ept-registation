<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peserta_modelalumni extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function insert($data, $data_event)
    {
        $this->db->insert('tbl_peserta_alumni', $data);
        $id = $this->db->insert_id();

        $registrant = array(
            'id_event_alumni' => $data_event,
            'id_peserta_alumni' => $id
        );
        $this->db->insert('tbl_registrant_alumni', $registrant);
        return $id;
    }
}
