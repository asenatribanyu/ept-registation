<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{

	public function index()
	{
		$this->load->model('Search/Search_model');
		$keyword = $this->input->get('keyword');

		if (empty($keyword)) {
			// No keyword provided, show the search form without any data
			$dataResults = array();
			$dataFound = null; // No dataFound flag needed when no keyword is provided
		} else {
			// Keyword provided, fetch data based on the keyword
			$dataResults = $this->Search_model->ambil_data($keyword);
			$dataFound = (count($dataResults) > 0); // Set dataFound flag based on whether data is found or not
		}

		$this->load->view('search/searchscore', array(
			'keyword' => $keyword,
			'dataResults' => $dataResults,
			'dataFound' => $dataFound
		));
	}
}
