<?php

class Datapeserta_modeltoeic extends CI_Model
{
    public function get_records($limit, $offset) {
		$this->db->select('tbl_peserta_toeic.nama_peserta, tbl_peserta_toeic.id_peserta_toeic, tbl_prodi.nama_prodi, tbl_fakultas.nama_fakultas, tbl_peserta_toeic.status, tbl_peserta_toeic.npm, tbl_peserta_toeic.email, tbl_peserta_toeic.no_hp, tbl_peserta_toeic.id_fakultas, tbl_peserta_toeic.id_prodi, tbl_peserta_toeic.waktu_input');
		$this->db->from('tbl_peserta_toeic');
		$this->db->join('tbl_fakultas', 'tbl_peserta_toeic.id_fakultas = tbl_fakultas.id_fakultas');
		$this->db->join('tbl_prodi', 'tbl_peserta_toeic.id_prodi = tbl_prodi.id_prodi');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
	
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

    public function count_all() {
        // Query to count the total number of records in the table
        return $this->db->count_all('tbl_peserta_toeic');
    }
    public function getAll()
    {
        return $this->db->query("
        SELECT id_peserta_toeic,(tbl_peserta_toeic.status) as statuss,UPPER(tbl_peserta_toeic.nama_peserta) as nama,(tbl_peserta_toeic.npm) as npmm,(tbl_peserta_toeic.email) as emaill, (tbl_peserta_toeic.no_hp) as nohp,(tbl_fakultas.nama_fakultas) as fakultas,(tbl_prodi.nama_prodi) as prodi
        FROM tbl_peserta_toeic
        INNER JOIN tbl_fakultas ON tbl_peserta_toeic.id_fakultas=tbl_fakultas.id_fakultas
        INNER JOIN tbl_prodi ON tbl_peserta_toeic.id_prodi=tbl_prodi.id_prodi
		ORDER BY id_peserta_toeic
        ");
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function ambil_data($id)
    {
        $hasil = $this->db->where('id_peserta_toeic', $id)->get('tbl_peserta_toeic');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function delete($id_peserta_toeic)
    {
        $this->db->where_in('id_peserta_toeic', $id_peserta_toeic);
        $this->db->delete('tbl_peserta_toeic');
    }
}
