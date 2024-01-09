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
    $params['data'] = 'localhost:8000/certificate/certificate/' . $data->id_score;
    $params['level'] = 'H';
    $params['size'] = 4; // Adjust the size to 4
    $params['savename'] = 'assets/sertifikat/' . 'qr.png';
    $this->ciqrcode->generate($params);

    $qrPath = 'assets/sertifikat/qr.png';

    $templatePath = 'assets/sertifikat/TemplateCertificate.png';

    $certificateImage = imagecreatefrompng($templatePath);

    $black = imagecolorallocate($certificateImage, 0, 0, 0);

    $fontPath = FCPATH . 'assets/sertifikat/font/TemplateFont.ttf';

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
    $originalDate = DateTime::createFromFormat('d F Y', $data->tanggal);

    // Add 2 years to the original date
    $newDate = $originalDate->add(new DateInterval('P2Y'))->format('d F Y');

    // Concatenate the new date with the text
    $text1 = "THIS IS TO CERTIFY THAT";
    $text2 = $nama;
    $text3 ="Student ID No. : " . $data->npm ;
    $text4 ="has taken the EPT - Utama on";
    $text5 = $data->tanggal;
    $text6 = "With the following result:";
    $text7 = "Listening : " . $data->sec1 ;
    $text8 = "Structure : " . $data->sec2 ;
    $text9 = "Reading : " . $data->sec3 ;
    $text10 = "OVERALL : " . $data->score ;
    $text11 = "Valid until : " . $newDate;
    $text12 = "Ida Zuraida, Hj., S.S., M.Pd.";
    $text13 = "Head of Lembaga Bahasa";

    $fontSize1 = 20;
    $fontSize2 = 40;
    

    // Calculate the position for the first line of text
    $textWidth1 = imagettfbbox($fontSize1, 0, $fontPath, $text1)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text1)['0'];
    $x1 = (imagesx($certificateImage) - $textWidth1) / 2;

    // Calculate the position for the second line of text
    $textWidth2 = imagettfbbox($fontSize2, 0, $fontPath, $text2)['2'] - imagettfbbox($fontSize2, 0, $fontPath, $text2)['0'];
    $x2 = (imagesx($certificateImage) - $textWidth2) / 2;

    $textWidth3 = imagettfbbox($fontSize1, 0, $fontPath, $text3)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text3)['0'];
    $x3 = (imagesx($certificateImage) - $textWidth3) / 2;

    $textWidth4 = imagettfbbox($fontSize1, 0, $fontPath, $text4)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text4)['0'];
    $x4 = (imagesx($certificateImage) - $textWidth4) / 2;

    $textWidth5 = imagettfbbox($fontSize1, 0, $fontPath, $text5)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text5)['0'];
    $x5 = (imagesx($certificateImage) - $textWidth5) / 2;

    $textWidth6 = imagettfbbox($fontSize1, 0, $fontPath, $text6)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text6)['0'];
    $x6 = (imagesx($certificateImage) - $textWidth6) / 2;

    $textWidth7 = imagettfbbox($fontSize1, 0, $fontPath, $text7)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text7)['0'];
    $x7 = (imagesx($certificateImage) - $textWidth7) / 2;

    $textWidth8 = imagettfbbox($fontSize1, 0, $fontPath, $text8)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text8)['0'];
    $x8 = (imagesx($certificateImage) - $textWidth8) / 2;

    $textWidth9 = imagettfbbox($fontSize1, 0, $fontPath, $text9)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text9)['0'];
    $x9 = (imagesx($certificateImage) - $textWidth9) / 2;

    $textWidth10 = imagettfbbox($fontSize1, 0, $fontPath, $text10)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text10)['0'];
    $x10 = (imagesx($certificateImage) - $textWidth10) / 2;

    $textWidth12 = imagettfbbox($fontSize1, 0, $fontPath, $text12)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text12)['0'];


    // Draw the text on the image
    imagettftext($certificateImage, $fontSize1, 0, $x1, 325, $black, $fontPath, $text1);
    imagettftext($certificateImage, $fontSize2, 0, $x2, 400, $black, $fontPath, $text2);
    imagettftext($certificateImage, $fontSize1, 0, $x3, 475, $black, $fontPath, $text3);
    imagettftext($certificateImage, $fontSize1, 0, $x4, 525, $black, $fontPath, $text4);
    imagettftext($certificateImage, $fontSize1, 0, $x5, 575, $black, $fontPath, $text5);
    imagettftext($certificateImage, $fontSize1, 0, $x6, 625, $black, $fontPath, $text6);
    imagettftext($certificateImage, $fontSize1, 0, $x7, 675, $black, $fontPath, $text7);
    imagettftext($certificateImage, $fontSize1, 0, $x8, 725, $black, $fontPath, $text8);
    imagettftext($certificateImage, $fontSize1, 0, $x9, 775, $black, $fontPath, $text9);
    imagettftext($certificateImage, $fontSize1, 0, $x10, 825, $black, $fontPath, $text10);
    imagettftext($certificateImage, $fontSize1, 0, 100, 875, $black, $fontPath, $text11);
    imagettftext($certificateImage, $fontSize1, 0, 1500, 1155, $black, $fontPath, $text12);
    imagettftext($certificateImage, $fontSize1, 0, 1510, 1195, $black, $fontPath, $text13);
    imageline($certificateImage, 1500, 1165, (1500 + $textWidth12) ,1165, $black );

    // Load the QR code image
    $qrImage = imagecreatefrompng($qrPath);

    // Set the position to overlay the QR code (right bottom)
    $qrX = ($imageWidth - imagesx($qrImage))/2; // X-coordinate
    $qrY = imagesy($certificateImage) - imagesy($qrImage) - 125; // Y-coordinate

    // Copy the QR code image onto the certificate image
    imagecopy($certificateImage, $qrImage, $qrX, $qrY, 0, 0, imagesx($qrImage), imagesy($qrImage));

    // Output the resulting image
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="certificate.png"');
    imagepng($certificateImage);

    // Clean up resources
    imagedestroy($certificateImage);
    imagedestroy($qrImage);
    unlink('assets/sertifikat/qr.png');
}

	
}
