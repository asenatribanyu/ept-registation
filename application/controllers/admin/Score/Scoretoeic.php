<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scoretoeic extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Score/Score_modeltoeic');
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
        $data['title'] = 'Import Excel';
        $data['tbl_score_toeic'] = $this->db->get('tbl_score_toeic')->result();
        $this->load->view('tampilan/headertoeic');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/score/view/viewscoretoeic', $data);
        $this->load->view('tampilan/footer');
        }
    }

    public function create()
    {
        $data['title'] = "Upload File Excel";
        $this->load->view('tampilan/headertoeic');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/score/form/formscoretoeic', $data);
        $this->load->view('tampilan/footer');
    }

    public function excel()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for ($row = 2; $row <= $highestRow; $row++) {
                    $tanggal = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $npm = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $sec1 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $sec2 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $sec3 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $score = $worksheet->getCellByColumnAndRow(8, $row)->getValue();

                    $data[] = array(
                        'tanggal'          => $tanggal,
                        'nama'          => $nama,
                        'npm'          => $npm,
                        'sec1'         => $sec1,
                        'sec2'         => $sec2,
                        'sec3'         => $sec3,
                        'score'         => $score,
                    );
                }
            }

            $this->db->insert_batch('tbl_score_toeic', $data);

            $message = array(
                'message' => '<div class="alert alert-success alert-dismissible text-white font-weight-bold fade show" role="alert">
                    Import File Excel Berhasil Ditambahkan!
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>',
            );

            $this->session->set_flashdata($message);
            redirect('admin/scoretoeic');
        } else {
            $message = array(
                'message' => '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
                    Import File Gagal, Coba Lagi!
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>',
            );

            $this->session->set_flashdata($message);
            redirect('admin/scoretoeic');
        }
    }

    public function delete($id)
    {
        $where = array('id_score_toeic' => $id);
        $this->Score_modeltoeic->hapus_data($where, 'tbl_score_toeic');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Score Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/scoretoeic');
    }

    public function deletee()
    {
        $id_score_toeic = $_POST['id_score_toeic'];
        $this->Score_modeltoeic->delete($id_score_toeic);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-white font-weight-bold fade show" role="alert">
		Data Score Berhasil Dihapus!
		<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/scoretoeic');
    }

    public function export()
    {
        $data['tbl_score_toeic'] = $this->db->get('tbl_score_toeic')->result();
        $this->load->view('tampilan/headertoeic');
        $this->load->view('tampilan/navbar');
        $this->load->view('admin/score/export/exportscoretoeic', $data);
        $this->load->view('tampilan/footer');
    }
}
