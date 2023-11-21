<?php

class Datapeserta_model extends CI_Model
{
	public function get_records($limit, $offset, $search) {
		$this->db->select('tbl_peserta.nama_peserta, tbl_peserta.id_peserta, tbl_prodi.nama_prodi, tbl_fakultas.nama_fakultas, tbl_peserta.status, tbl_peserta.npm, tbl_peserta.email, tbl_peserta.no_hp, tbl_peserta.id_fakultas, tbl_peserta.id_prodi, tbl_peserta.waktu_input');
		$this->db->from('tbl_peserta');
		$this->db->join('tbl_fakultas', 'tbl_peserta.id_fakultas = tbl_fakultas.id_fakultas');
		$this->db->join('tbl_prodi', 'tbl_peserta.id_prodi = tbl_prodi.id_prodi');
		
		if (!empty($search)) {
			// Add a WHERE clause to filter results by name or npm
			$this->db->like('tbl_peserta.nama_peserta', $search);
			$this->db->or_like('tbl_peserta.npm', $search);
		}
	
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
        SELECT id_peserta,(tbl_peserta.status) as statuss,UPPER(tbl_peserta.nama_peserta) as nama,(tbl_peserta.npm) as npmm,(tbl_peserta.email) as emaill, (tbl_peserta.no_hp) as nohp,(tbl_fakultas.nama_fakultas) as fakultas,(tbl_prodi.nama_prodi) as prodi, (tbl_peserta.waktu_input) as waktu_input
        FROM tbl_peserta
        INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas=tbl_fakultas.id_fakultas
        INNER JOIN tbl_prodi ON tbl_peserta.id_prodi=tbl_prodi.id_prodi
		ORDER BY id_peserta
        ");
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
