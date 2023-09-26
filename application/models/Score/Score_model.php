<?php

class Score_model extends CI_Model
{
    public function get_records($limit, $offset) {
		$this->db->from('tbl_score');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
	
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}
	public function hapus_data($where, $table)
	{
		$this->db->where($where);
        $this->db->delete($table);
	}

	public function delete($id_score)
    {
        $this->db->where_in('id_score', $id_score);
        $this->db->delete('tbl_score');
    }
}
