<?php

class Pendaftar_model extends CI_Model
{
    public function get_records($limit, $offset) {
        $this->db->from('tbl_registrant');
        $this->db->join('tbl_event', 'tbl_registrant.id_event = tbl_event.id_event');
        $this->db->join('tbl_peserta', 'tbl_registrant.id_peserta = tbl_peserta.id_peserta');
        $this->db->join('tbl_fakultas', 'tbl_peserta.id_fakultas = tbl_fakultas.id_fakultas');
		$this->db->join('tbl_prodi', 'tbl_peserta.id_prodi = tbl_prodi.id_prodi');
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
        SELECT id_registrant,DATE_FORMAT(tbl_event.tanggal_event, '%e-%M-%Y') as tanggal,(tbl_event.type) as typee,(tbl_event.time) as waktu,(tbl_event.venue) as tempat,UPPER(tbl_peserta.nama_peserta) as nama,(tbl_peserta.status) as statuss,(tbl_peserta.npm) as npmm,(tbl_peserta.email) as emaill, (tbl_peserta.no_hp) as nohp,(tbl_fakultas.nama_fakultas) as fakultas,(tbl_prodi.nama_prodi) as prodi
        FROM tbl_registrant
        INNER JOIN tbl_event ON tbl_registrant.id_event=tbl_event.id_event
        INNER JOIN tbl_peserta ON tbl_registrant.id_peserta=tbl_peserta.id_peserta
        INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas=tbl_fakultas.id_fakultas
        INNER JOIN tbl_prodi ON tbl_peserta.id_prodi=tbl_prodi.id_prodi
		ORDER BY id_registrant
        ");
    }
    public function filter($filter, $id){
        if($filter == 'fakultas'){
            $id = $id - 1;
            return $this->db->query("
            SELECT id_registrant, DATE_FORMAT(tbl_event.tanggal_event, '%e-%M-%Y') as tanggal, (tbl_event.type) as typee, (tbl_event.time) as waktu, (tbl_event.venue) as tempat, UPPER(tbl_peserta.nama_peserta) as nama, (tbl_peserta.status) as statuss, (tbl_peserta.npm) as npmm, (tbl_peserta.email) as emaill, (tbl_peserta.no_hp) as nohp, (tbl_fakultas.nama_fakultas) as fakultas, (tbl_prodi.nama_prodi) as prodi
            FROM tbl_registrant
            INNER JOIN tbl_event ON tbl_registrant.id_event = tbl_event.id_event
            INNER JOIN tbl_peserta ON tbl_registrant.id_peserta = tbl_peserta.id_peserta
            INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas = tbl_fakultas.id_fakultas
            INNER JOIN tbl_prodi ON tbl_peserta.id_prodi = tbl_prodi.id_prodi
            WHERE tbl_peserta.id_$filter = $id
            ORDER BY id_registrant
            ");
        }else{
            $id = $id - 6;
            return $this->db->query("
            SELECT id_registrant, DATE_FORMAT(tbl_event.tanggal_event, '%e-%M-%Y') as tanggal, (tbl_event.type) as typee, (tbl_event.time) as waktu, (tbl_event.venue) as tempat, UPPER(tbl_peserta.nama_peserta) as nama, (tbl_peserta.status) as statuss, (tbl_peserta.npm) as npmm, (tbl_peserta.email) as emaill, (tbl_peserta.no_hp) as nohp, (tbl_fakultas.nama_fakultas) as fakultas, (tbl_prodi.nama_prodi) as prodi
            FROM tbl_registrant
            INNER JOIN tbl_event ON tbl_registrant.id_event = tbl_event.id_event
            INNER JOIN tbl_peserta ON tbl_registrant.id_peserta = tbl_peserta.id_peserta
            INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas = tbl_fakultas.id_fakultas
            INNER JOIN tbl_prodi ON tbl_peserta.id_prodi = tbl_prodi.id_prodi
            WHERE tbl_peserta.id_$filter = $id
            ORDER BY id_registrant
            ");
        }
       
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function delete($id_registrant)
    {
        $this->db->where_in('id_registrant', $id_registrant);
        $this->db->delete('tbl_registrant');
    }
}
