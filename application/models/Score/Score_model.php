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

    public function filter($filter, $id, $tanggalAwal = null, $tanggalAkhir = null, $skorAwal = null, $skorAkhir = null) {
		$idOffset = ($filter == 'fakultas') ? 1 : 6;
	
		$query = "
			SELECT * FROM tbl_score
			Inner JOIN tbl_peserta ON tbl_score.npm = tbl_peserta.npm
			Inner JOIN tbl_prodi ON tbl_peserta.id_prodi = tbl_prodi.id_prodi
			Inner JOIN tbl_fakultas ON tbl_peserta.id_fakultas = tbl_fakultas.id_fakultas
			WHERE tbl_peserta.id_$filter = ($id - $idOffset)
		";
	
		if ($tanggalAwal !== null && $tanggalAkhir !== null) {
			$query .= " AND (STR_TO_DATE(tbl_score.tanggal, '%d %M %Y') BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
                OR STR_TO_DATE(tbl_score.tanggal, '%Y-%m-%d') BETWEEN '$tanggalAwal' AND '$tanggalAkhir')";
		}
		if ($skorAwal !== null && $skorAkhir !== null) {
			$query .= " AND tbl_score.score BETWEEN '$skorAwal' AND '$skorAkhir'";
		}
	
		$query .= " GROUP by id_score
					ORDER BY tanggal";
		return array('query' => $query);
	}

	public function export_filter($jumlahData, $startYear, $endYear)
	{
		$limitClause = $jumlahData >=1 ? "LIMIT $jumlahData" : "";
		
		return $this->db->query("
			SELECT * FROM tbl_score
			INNER JOIN tbl_peserta ON tbl_score.npm=tbl_peserta.npm
			INNER JOIN tbl_prodi ON tbl_peserta.id_prodi=tbl_prodi.id_prodi
            INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas=tbl_fakultas.id_fakultas
			WHERE YEAR(STR_TO_DATE(tbl_score.tanggal, '%e %M %Y')) BETWEEN '$startYear' AND '$endYear'
			ORDER BY id_peserta 
			$limitClause
            ");
	}

    public function get_records($limit, $offset, $search) {
		$this->db->from('tbl_score');

		if (!empty($search)) {
			// Add a WHERE clause to filter results by name or npm
			$this->db->like('tbl_score.nama', $search);
			$this->db->or_like('tbl_score.npm', $search);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
	
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
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

	public function cari_data($id){

		$query = "
        SELECT * FROM tbl_score
        INNER JOIN tbl_peserta ON tbl_score.npm = tbl_peserta.npm
        INNER JOIN tbl_prodi ON tbl_peserta.id_prodi = tbl_prodi.id_prodi
        INNER JOIN tbl_fakultas ON tbl_peserta.id_fakultas = tbl_fakultas.id_fakultas
        WHERE tbl_score.id_score = ?
        LIMIT 1";

    return $this->db->query($query, array($id));

	}

	public function pengulangan($npm){
		return $this->db->query("
		SELECT * FROM tbl_score
        WHERE tbl_score.npm = $npm
		ORDER BY STR_TO_DATE(tanggal, '%d %M %Y')
            ");

	}
}
