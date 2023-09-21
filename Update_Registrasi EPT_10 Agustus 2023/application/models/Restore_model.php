<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restore_model extends CI_Model
{
    function droptabel()
    {
        $cek = $this->db->query("SHOW TABLES");
        if($cek->num_rows()>0){
            $query = $this->db->query('DROP TABLE tbl_event, tbl_fakultas, tbl_peserta, tbl_prodi, tbl_registrant, tbl_score, tbl_user');
            return $query;
        }else{
            return true;
        }
    }
}
