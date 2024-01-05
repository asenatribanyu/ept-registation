<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Score extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('score/Score_model');
        $this->load->model('event/Event_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        if (!isset($this->session->userdata['username'])) {
            redirect('login');
        }
    }

    public function index()
    {
        if($this->session->userdata['role_id'] !== '1'){
            redirect('/admin/dashboard/laporan_EPT');
        }else{
        $this->load->library('pagination');
		$config['base_url'] = base_url('admin/score/score/index'); // URL to the pagination page
		$config['total_rows'] = $this->db->count_all('tbl_score'); // Total number of records
		$config['per_page'] = 10; // Number of records to show per page

		// Styling for the pagination links
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$page = $this->uri->segment(5);
		$data['records'] = $this->Score_model->get_records($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Import Excel';
        // $data['tbl_score'] = $this->db->get('tbl_score')->result();
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/score/view/viewscore', $data);
        $this->load->view('tampilan/footer');
        }
    }

    public function create()
    {
        $data['title'] = "Upload File Excel";
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/score/form/formscore', $data);
        $this->load->view('tampilan/footer');
    }

    public function filter($id){
        $this->input->post('tanggal_awal');
        if($id <= 6 ){
            $filter = 'fakultas';
            $data['tbl_score'] = $this->Score_model->filter($filter, $id)->result();
        }else{
            $filter = 'prodi';
            $data['tbl_score'] = $this->Score_model->filter($filter, $id)->result(); 
        }
        $data['id']=$id;
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/score/filter/tabelscore', $data);
        $this->load->view('tampilan/footer');
    }

    public function excel()
    {
        if (isset($_FILES["file"]["name"])) {
            // Upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();


                for ($row = 2; $row <= $highestRow; $row++) {
                    $tanggalValue = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $tanggalFormatted = $worksheet->getCellByColumnAndRow(3, $row)->getFormattedValue();
                    $tanggal = null;

                    if (PHPExcel_Shared_Date::isDateTime($worksheet->getCellByColumnAndRow(3, $row))) {
                        $tanggal = PHPExcel_Shared_Date::ExcelToPHP($tanggalValue);
                        $tanggal = date('Y-m-d', $tanggal);
                    } elseif (!empty($tanggalFormatted)) {
                        // Assuming the date format in Excel is 'YYYY-MM-DD'
                        $tanggal = date('Y-m-d', strtotime($tanggalFormatted));
                    }

                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $npm = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $sec1 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $sec2 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $sec3 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $score = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

                    $data[] = array(
                        'tanggal' => $tanggal,
                        'nama' => $nama,
                        'npm' => $npm,
                        'sec1' => $sec1,
                        'sec2' => $sec2,
                        'sec3' => $sec3,
                        'score' => $score,
                    );
                }
                // Array to store empty columns
                $emptyColumns = [];

                // Array to store empty rows
                $emptyRows = [];

                for ($row = 2; $row <= $highestRow; $row++) {
                    $rowData = [];

                    for ($col = 'A'; $col <= $highestColumn; $col++) {
                        $cellValue = $worksheet->getCell($col . $row)->getValue();

                        // Check if the cell is empty
                        if (empty($cellValue)) {
                            $emptyColumns[] = $col;
                            $emptyRows[] = $row;
                        }

                        $rowData[] = $cellValue;
                    }

                    // Skip the row if any of the columns are empty
                    if (!empty($emptyColumns)) {
                        $response = array(
                            'status' => 'empty',
                            'columns' => array_unique($emptyColumns),
                            'rows' => array_unique($emptyRows),
                            'redirect' => base_url('admin/score/score/create')
                        );
                        echo json_encode($response);
                        return;
                    }
                }
            }

            // Validate the format of the imported data
            $isValidFormat = $this->validateFormat($data);
            if (!$isValidFormat) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Impor Data tidak sesuai dengan format. Silakan unduh format yang benar.',
                    'redirect' => base_url('admin/score/score/create')
                );
                echo json_encode($response);
                return;
            }

            // Check for duplicate data
            $insertData = array(); // Data that will be inserted

            foreach ($data as $index => $row) {
                $query = $this->db->get_where('tbl_score', array('tanggal' => $row['tanggal'], 'npm' => $row['npm']));
                if ($query->num_rows() === 0) {
                    $insertData[] = $row; // Add the row to insertData
                }
            }

            if (!empty($insertData)) {
                // Insert the non-duplicate data
                $this->db->insert_batch('tbl_score', $insertData);

                // Success message
                $response = array(
                    'status' => 'success',
                    'redirect' => base_url('admin/score/score')
                );
                echo json_encode($response);
            } else {
                // No data to insert
                $response = array(
                    'status' => 'no_data',
                    'message' => 'All data already exists in the database.',
                    'redirect' => base_url('admin/score/score/create')
                );
                echo json_encode($response);
            }
        }
    }

    public function checkDuplicateRowsAndColumns($data)
    {
        $duplicateData = array();
        $insertData = array();

        foreach ($data as $index => $row) {
            $query = $this->db->get_where('tbl_score', array('tanggal' => $row['tanggal'], 'npm' => $row['npm']));
            if ($query->num_rows() > 0) {
                $duplicateData[] = array(
                    'row' => $index + 1,
                    'columns' => $row
                );
            } else {
                $insertData[] = $row;
            }
        }

        return array(
            'duplicate_data' => $duplicateData,
            'insert_data' => $insertData
        );
    }

    public function validateFormat($data)
    {
        // Check if the data is an array and has at least one row
        if (!is_array($data) || empty($data)) {
            return false;
        }

        $expectedColumns = array('nama', 'npm', 'sec1', 'sec2', 'sec3', 'score');

        // Check if the first row contains all expected columns
        $firstRow = $data[0];
        if (array_diff($expectedColumns, array_keys($firstRow))) {
            return false;
        }

        $invalidRows = array();

        foreach ($data as $rowIndex => $row) {
            // Check if the 'nama' column is a string
            if (!is_string($row['nama'])) {
                $invalidRows[] = $rowIndex;
                continue; // Skip further checks for this row
            }

            // Check if the 'npm' column is a valid integer
            if (!is_numeric($row['npm']) || intval($row['npm']) != $row['npm']) {
                $invalidRows[] = $rowIndex;
                continue; // Skip further checks for this row
            }

            // Check if numerical columns have valid numeric values
            foreach (array('sec1', 'sec2', 'sec3', 'score') as $column) {
                if (!is_numeric($row[$column])) {
                    $invalidRows[] = $rowIndex;
                    break; // No need to check further for this row
                }
            }
        }

        return empty($invalidRows);
    }







    public function delete($id)
    {
        $where = array('id_score' => $id);
        $this->Score_model->hapus_data($where, 'tbl_score');
        redirect('admin/score/score');
    }

    public function deletee()
    {
        $id_score = $_POST['id_score'];
        $this->Score_model->delete($id_score);
        redirect('admin/score/score');
    }

    public function export()
    {
        $data['tbl_score'] = $this->Score_model->getAll()->result();
        $data['tbl_event'] = $this->Event_model->getAll()->result();
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/score/export/exportscore', $data);
        $this->load->view('tampilan/footer');
    }

    public function filter_data(){

        $this->input->post('pengulangan');
        $this->input->post('nilai');
        $this->input->post('event');
        $this->input->post('startYear');
        $this->input->post('endYear');
        
        
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required', ['required' => 'Tanggal Test wajib diisi!']);
        $this->form_validation->set_rules('nama', 'nama', 'required', ['required' => 'Nama wajib diisi!']);
        $this->form_validation->set_rules('npm', 'npm', 'required', ['required' => 'NPM wajib diisi!']);
        $this->form_validation->set_rules('sec1', 'sec1', 'required', ['required' => 'Section 1 hp wajib diisi!']);
        $this->form_validation->set_rules('sec2', 'sec2', 'required', ['required' => 'Section 2 wajib diisi!']);
        $this->form_validation->set_rules('sec3', 'sec3', 'required', ['required' => 'Section 3 wajib diisi!']);
        $this->form_validation->set_rules('score', 'score', 'required', ['required' => 'Score wajib diisi!']);
    }

    public function update($id)
    {
        $where = array('id_score' => $id);
        $data['tbl_score'] = $this->Score_model->edit_data($where, 'tbl_score')->result();
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/score/edit/editscore', $data);
        $this->load->view('tampilan/footer');
    }

    public function update_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update(0);
        } else {
            $id = $this->input->post('id_score');
            $tanggal = $this->input->post('tanggal');
            $nama = $this->input->post('nama');
            $npm = $this->input->post('npm');
            $sec1 = $this->input->post('sec1');
            $sec2 = $this->input->post('sec2');
            $sec3 = $this->input->post('sec3');
            $score = $this->input->post('score');

            $data = array(
                'tanggal' => $tanggal,
                'nama' => $nama,
                'npm' => $npm,
                'sec1' => $sec1,
                'sec2' => $sec2,
                'sec3' => $sec3,
                'score' => $score
            );

            $where = array(
                'id_score' => $id
            );

            $this->Score_model->update_data($where, $data, 'tbl_score');
            redirect('admin/score/score');
        }
    }

    public function detail($id, $npm) {
        $data['peserta'] = $this->Score_model->cari_data($id)->result();
        $data['score'] = $this->Score_model->pengulangan($npm)->result();
        $data['pengulangan'] = count($data['score']);
        $this->load->view('tampilan/header');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/score/filter/detail',$data);
        $this->load->view('tampilan/footer');
    }
}
