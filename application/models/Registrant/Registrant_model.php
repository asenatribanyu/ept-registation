<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Registrant_Model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert('tbl_registrant', $data);
    }
}
