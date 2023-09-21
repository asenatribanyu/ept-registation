<?php

class Tanggal_modeljp extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('tejp.id_event_jp, DATE_FORMAT(tejp.tanggal_event, "%e %M %Y") AS tanggal_event, tejp.type, tejp.time, tejp.venue, tejp.kuota, tejp.kuota - COUNT(tr.id_event_jp) AS sisa_kuota, tejp.aktif');
        $this->db->from('tbl_event_jp AS tejp');
        $this->db->join('tbl_registrant_jp as tr', 'tejp.id_event_jp = tr.id_event_jp', 'LEFT');
        $this->db->group_by('tejp.id_event_jp');
        $this->db->order_by('tejp.tanggal_event');
        return $this->db->get();
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function ambil_data($id)
    {
        $hasil = $this->db->where('id_event_jp', $id)->get('tbl_event_jp');
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

    public function get_peserta_perevent($id_event_jp = null)
    {
        $this->db->select('DATE_FORMAT(tbl_event_jp.tanggal_event, "%e %M %Y") as tanggal, tbl_event_jp.type as typee, tbl_event_jp.time as waktu, tbl_event_jp.venue as tempat, UPPER(tbl_peserta_jp.nama_peserta) as nama,tbl_peserta_jp.status as statuss,tbl_peserta_jp.npm as npmm,tbl_peserta_jp.email as emaill, tbl_peserta_jp.no_hp as nohp,tbl_fakultas.nama_fakultas as fakultas,tbl_prodi.nama_prodi as prodi');
        $this->db->from('tbl_event_jp');
        $this->db->join('tbl_registrant_jp', 'tbl_event_jp.id_event_jp = tbl_registrant_jp.id_event_jp');
        $this->db->join('tbl_peserta_jp', 'tbl_registrant_jp.id_registrant_jp = tbl_peserta_jp.id_peserta_jp');
        $this->db->join('tbl_fakultas', 'tbl_peserta_jp.id_fakultas = tbl_fakultas.id_fakultas');
        $this->db->join('tbl_prodi', 'tbl_peserta_jp.id_prodi = tbl_prodi.id_prodi');
        $this->db->where($id_event_jp);
        $this->db->order_by('tbl_registrant_jp.id_registrant_jp');
        return $this->db->get();
    }

    public function delete($id_event_jp)
    {
        $this->db->where_in('id_event_jp', $id_event_jp);
        $this->db->delete('tbl_event_jp');
    }
}
