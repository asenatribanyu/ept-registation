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
	public function certificate($id)
{
    $this->load->library('ciqrcode');

    $data = $this->db->get_where('tbl_score', array('id_score' => $id))->row();

    // Adjust the size parameter for the QR code
    $params['data'] = 'https://ept-lembagabahasa.widyatama.ac.id/registration/search';
    $params['level'] = 'H';
    $params['size'] = 4; // Adjust the size to 4
    $params['savename'] = 'assets/sertifikat/' . 'qr.png';
    $this->ciqrcode->generate($params);

    $qrPath = 'assets/sertifikat/qr.png';

    $templatePath = 'assets/sertifikat/TemplateCertificate.png';

    $certificateImage = imagecreatefrompng($templatePath);

    $black = imagecolorallocate($certificateImage, 0, 0, 0);

    $fontPath = FCPATH . 'assets/font/PlaypenSans-VariableFont_wght.ttf';

    $nama = $data->nama;

    $imageWidth = imagesx($certificateImage);

    // Set a maximum width for the text box
    $maxTextWidth = 0.8 * $imageWidth; // Adjust the scale factor as needed

    $fontSize = 90; // Set your initial font size
    $fontScale = 1.0;

    do {
        $fontSize *= $fontScale;
        $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $nama);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
        $fontScale = $maxTextWidth / $textWidth;
    } while ($textWidth > $maxTextWidth);

    // Calculate text position
    $x = ($imageWidth - $textWidth) / 2;
    $y = 707;

    imagettftext($certificateImage, $fontSize, 0, $x, $y, $black, $fontPath, $nama);

    // Load the QR code image
    $qrImage = imagecreatefrompng($qrPath);

    // Set the position to overlay the QR code (right bottom)
    $qrX = $imageWidth - imagesx($qrImage) - 50; // X-coordinate
    $qrY = imagesy($certificateImage) - imagesy($qrImage) - 50; // Y-coordinate

    // Copy the QR code image onto the certificate image
    imagecopy($certificateImage, $qrImage, $qrX, $qrY, 0, 0, imagesx($qrImage), imagesy($qrImage));

    // Output the resulting image
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="certificate.png"');
    imagepng($certificateImage);

    // Clean up resources
    imagedestroy($certificateImage);
    imagedestroy($qrImage);
}

	
}
