<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model
{

	public function ambil_data($keyword = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_score');

		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('nama', $keyword);
			$this->db->or_like('npm', $keyword);
			$this->db->group_end();
		}

		$data = $this->db->get()->result_array();
		return is_array($data) ? $data : array();
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_score');
		return $this->db->get()->result_array();
	}
}
