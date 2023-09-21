<?php

class Score_modeljp extends CI_Model
{
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function delete($id_score_jp)
    {
        $this->db->where_in('id_score_jp', $id_score_jp);
        $this->db->delete('tbl_score_jp');
    }
}
