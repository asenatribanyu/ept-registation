<?php

class Datapeserta_model extends CI_Model
{
	public function getAll()
	{
		return $this->db->query("
        SELECT id_peserta,(tbl_peserta.status) as statuss,UPPER(tbl_peserta.nama_peserta) as nama,(tbl_peserta.npm) as npmm,(tbl_peserta.email) as emaill, (tbl_peserta.no_hp) as nohp,(tbl_fakultas.nama_fakultas) as fakultas,(tbl_prodi.nama_prodi) as prodi, (tbl_peserta.waktu_input) as waktu_input
        FROM tbl_peserta
        INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas=tbl_fakultas.id_fakultas
        INNER JOIN tbl_prodi ON tbl_peserta.id_prodi=tbl_prodi.id_prodi
		ORDER BY id_peserta
        ");
	}

	public function filter($filter, $id){
        if($filter == 'fakultas'){
            $id = $id - 1;
            return $this->db->query("
			SELECT id_peserta,(tbl_peserta.status) as statuss,UPPER(tbl_peserta.nama_peserta) as nama,(tbl_peserta.npm) as npmm,(tbl_peserta.email) as emaill, (tbl_peserta.no_hp) as nohp,(tbl_fakultas.nama_fakultas) as fakultas,(tbl_prodi.nama_prodi) as prodi, (tbl_peserta.waktu_input) as waktu_input
			FROM tbl_peserta
			INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas=tbl_fakultas.id_fakultas
			INNER JOIN tbl_prodi ON tbl_peserta.id_prodi=tbl_prodi.id_prodi
			WHERE tbl_peserta.id_$filter = $id
			ORDER BY id_peserta
            ");
        }else{
            $id = $id - 6;
            return $this->db->query("
			SELECT id_peserta,(tbl_peserta.status) as statuss,UPPER(tbl_peserta.nama_peserta) as nama,(tbl_peserta.npm) as npmm,(tbl_peserta.email) as emaill, (tbl_peserta.no_hp) as nohp,(tbl_fakultas.nama_fakultas) as fakultas,(tbl_prodi.nama_prodi) as prodi, (tbl_peserta.waktu_input) as waktu_input
			FROM tbl_peserta
			INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas=tbl_fakultas.id_fakultas
			INNER JOIN tbl_prodi ON tbl_peserta.id_prodi=tbl_prodi.id_prodi
			WHERE tbl_peserta.id_$filter = $id
			ORDER BY id_peserta
            ");
        }
    }

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function ambil_data($id)
	{
		$hasil = $this->db->where('id_peserta', $id)->get('tbl_peserta');
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

	public function delete($id_peserta)
	{
		$this->db->where_in('id_peserta', $id_peserta);
		$this->db->delete('tbl_peserta');
	}
}
