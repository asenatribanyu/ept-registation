<?php

class Pendaftar_modeltoeic extends CI_Model
{
    public function get_records($limit, $offset) {
        $this->db->from('tbl_registrant_toeic');
        $this->db->join('tbl_event_toeic', 'tbl_registrant_toeic.id_event_toeic = tbl_event_toeic.id_event_toeic');
        $this->db->join('tbl_peserta_toeic', 'tbl_registrant_toeic.id_peserta_toeic = tbl_peserta_toeic.id_peserta_toeic');
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

    public function getAll()
    {
        return $this->db->query("
        SELECT id_registrant_toeic,DATE_FORMAT(tbl_event_toeic.tanggal_event, '%e-%M-%Y') as tanggal,(tbl_event_toeic.type) as typee,(tbl_event_toeic.time) as waktu,(tbl_event_toeic.venue) as tempat,UPPER(tbl_peserta_toeic.nama_peserta) as nama,(tbl_peserta_toeic.status) as statuss,(tbl_peserta_toeic.npm) as npmm,(tbl_peserta_toeic.email) as emaill, (tbl_peserta_toeic.no_hp) as nohp,(tbl_fakultas.nama_fakultas) as fakultas,(tbl_prodi.nama_prodi) as prodi
        FROM tbl_registrant_toeic
        INNER JOIN tbl_event_toeic ON tbl_registrant_toeic.id_event_toeic=tbl_event_toeic.id_event_toeic
        INNER JOIN tbl_peserta_toeic ON tbl_registrant_toeic.id_peserta_toeic=tbl_peserta_toeic.id_peserta_toeic
        INNER JOIN tbl_fakultas ON tbl_peserta_toeic.id_fakultas=tbl_fakultas.id_fakultas
        INNER JOIN tbl_prodi ON tbl_peserta_toeic.id_prodi=tbl_prodi.id_prodi
		ORDER BY id_registrant_toeic
        ");
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function delete($id_registrant_toeic)
    {
        $this->db->where_in('id_registrant_toeic', $id_registrant_toeic);
        $this->db->delete('tbl_registrant_toeic');
    }
}
