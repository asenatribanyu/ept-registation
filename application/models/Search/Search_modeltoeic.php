<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_modeltoeic extends CI_Model
{

    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_score_toeic');
        if (!empty($keyword)) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('npm', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
