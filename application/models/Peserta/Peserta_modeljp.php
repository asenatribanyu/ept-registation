<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peserta_modeljp extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function insert($data, $data_event)
    {
        $this->db->insert('tbl_peserta_jp', $data);
        $id = $this->db->insert_id();

        $registrant = array(
            'id_event_jp' => $data_event,
            'id_peserta_jp' => $id
        );
        $this->db->insert('tbl_registrant_jp', $registrant);
        return $id;
    }
}
