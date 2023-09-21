<?php

class Tanggal_modelalumni extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('tealumni.id_event_alumni, DATE_FORMAT(tealumni.tanggal_event, "%e %M %Y") AS tanggal_event, tealumni.type, tealumni.time, tealumni.venue, tealumni.kuota, tealumni.kuota - COUNT(tr.id_event_alumni) AS sisa_kuota, tealumni.aktif');
        $this->db->from('tbl_event_alumni AS tealumni');
        $this->db->join('tbl_registrant_alumni as tr', 'tealumni.id_event_alumni = tr.id_event_alumni', 'LEFT');
        $this->db->group_by('tealumni.id_event_alumni');
        $this->db->order_by('tealumni.tanggal_event');
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
        $hasil = $this->db->where('id_event_alumni', $id)->get('tbl_event_alumni');
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

    public function get_peserta_perevent($id_event_alumni = null)
    {
        $this->db->select('DATE_FORMAT(tbl_event_alumni.tanggal_event, "%e %M %Y") as tanggal, tbl_event_alumni.type as typee, tbl_event_alumni.time as waktu, tbl_event_alumni.venue as tempat, UPPER(tbl_peserta_alumni.nama_peserta) as nama,tbl_peserta_alumni.status as statuss,tbl_peserta_alumni.npm as npmm,tbl_peserta_alumni.email as emaill, tbl_peserta_alumni.no_hp as nohp,tbl_fakultas.nama_fakultas as fakultas,tbl_prodi.nama_prodi as prodi');
        $this->db->from('tbl_event_alumni');
        $this->db->join('tbl_registrant_alumni', 'tbl_event_alumni.id_event_alumni = tbl_registrant_alumni.id_event_alumni');
        $this->db->join('tbl_peserta_alumni', 'tbl_registrant_alumni.id_registrant_alumni = tbl_peserta_alumni.id_peserta_alumni');
        $this->db->join('tbl_fakultas', 'tbl_peserta_alumni.id_fakultas = tbl_fakultas.id_fakultas');
        $this->db->join('tbl_prodi', 'tbl_peserta_alumni.id_prodi = tbl_prodi.id_prodi');
        $this->db->where($id_event_alumni);
        $this->db->order_by('tbl_registrant_alumni.id_registrant_alumni');
        return $this->db->get();
    }

    public function delete($id_event_alumni)
    {
        $this->db->where_in('id_event_alumni', $id_event_alumni);
        $this->db->delete('tbl_event_alumni');
    }
}
