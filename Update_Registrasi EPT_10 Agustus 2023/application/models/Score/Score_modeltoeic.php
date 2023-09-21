<?php

class Score_modeltoeic extends CI_Model
{
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function delete($id_score_toeic)
    {
        $this->db->where_in('id_score_toeic', $id_score_toeic);
        $this->db->delete('tbl_score_toeic');
    }
}
