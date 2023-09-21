<?php

class Pendaftar_modeljp extends CI_Model
{
    public function getAll()
    {
        return $this->db->query("
        SELECT id_registrant_jp,DATE_FORMAT(tbl_event_jp.tanggal_event, '%e-%M-%Y') as tanggal,(tbl_event_jp.type) as typee,(tbl_event_jp.time) as waktu,(tbl_event_jp.venue) as tempat,UPPER(tbl_peserta_jp.nama_peserta) as nama,(tbl_peserta_jp.status) as statuss,(tbl_peserta_jp.npm) as npmm,(tbl_peserta_jp.email) as emaill, (tbl_peserta_jp.no_hp) as nohp,(tbl_fakultas.nama_fakultas) as fakultas,(tbl_prodi.nama_prodi) as prodi
        FROM tbl_registrant_jp
        INNER JOIN tbl_event_jp ON tbl_registrant_jp.id_event_jp=tbl_event_jp.id_event_jp
        INNER JOIN tbl_peserta_jp ON tbl_registrant_jp.id_peserta_jp=tbl_peserta_jp.id_peserta_jp
        INNER JOIN tbl_fakultas ON tbl_peserta_jp.id_fakultas=tbl_fakultas.id_fakultas
        INNER JOIN tbl_prodi ON tbl_peserta_jp.id_prodi=tbl_prodi.id_prodi
		ORDER BY id_registrant_jp
        ");
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function delete($id_registrant_jp)
    {
        $this->db->where_in('id_registrant_jp', $id_registrant_jp);
        $this->db->delete('tbl_registrant_jp');
    }
}
