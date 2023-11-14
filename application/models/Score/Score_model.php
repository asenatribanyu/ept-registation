<?php

class Score_model extends CI_Model
{
    public function getAll(){
        return $this->db->query("
			SELECT * FROM tbl_score
			INNER JOIN tbl_peserta ON tbl_score.npm=tbl_peserta.npm
			INNER JOIN tbl_prodi ON tbl_peserta.id_prodi=tbl_prodi.id_prodi
            INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas=tbl_fakultas.id_fakultas
			ORDER BY id_peserta
            ");
    }

    public function filter($filter, $id){
        if($filter == 'fakultas'){
            $id = $id - 1;
            return $this->db->query("
			SELECT * FROM tbl_score
			INNER JOIN tbl_peserta ON tbl_score.npm=tbl_peserta.npm
			INNER JOIN tbl_prodi ON tbl_peserta.id_prodi=tbl_prodi.id_prodi
            INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas=tbl_fakultas.id_fakultas
			WHERE tbl_peserta.id_$filter = $id
			ORDER BY id_peserta
            ");
        }else{
            $id = $id - 6;
            return $this->db->query("
			SELECT * FROM tbl_score
			INNER JOIN tbl_peserta ON tbl_score.npm=tbl_peserta.npm
			INNER JOIN tbl_prodi ON tbl_peserta.id_prodi=tbl_prodi.id_prodi
            INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas=tbl_fakultas.id_fakultas
			WHERE tbl_peserta.id_$filter = $id
			ORDER BY id_peserta
            ");
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
