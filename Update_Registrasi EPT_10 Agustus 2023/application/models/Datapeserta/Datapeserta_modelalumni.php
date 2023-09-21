<?php

class Datapeserta_modelalumni extends CI_Model
{
    public function getAll()
    {
        return $this->db->query("
        SELECT id_peserta_alumni,(tbl_peserta_alumni.status) as statuss,UPPER(tbl_peserta_alumni.nama_peserta) as nama,(tbl_peserta_alumni.npm) as npmm,(tbl_peserta_alumni.email) as emaill, (tbl_peserta_alumni.no_hp) as nohp,(tbl_fakultas.nama_fakultas) as fakultas,(tbl_prodi.nama_prodi) as prodi
        FROM tbl_peserta_alumni
        INNER JOIN tbl_fakultas ON tbl_peserta_alumni.id_fakultas=tbl_fakultas.id_fakultas
        INNER JOIN tbl_prodi ON tbl_peserta_alumni.id_prodi=tbl_prodi.id_prodi
		ORDER BY id_peserta_alumni
        ");
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function ambil_data($id)
    {
        $hasil = $this->db->where('id_peserta_alumni', $id)->get('tbl_peserta_alumni');
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

    public function delete($id_peserta_alumni)
    {
        $this->db->where_in('id_peserta_alumni', $id_peserta_alumni);
        $this->db->delete('tbl_peserta_alumni');
    }
}
