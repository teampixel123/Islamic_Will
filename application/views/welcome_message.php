<?php
//============================================================+
<<<<<<< HEAD
// File name   : example_027.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 027 for TCPDF class
//               1D Barcodes
=======
// File name   : example_049.php
// Begin       : 2009-04-03
// Last Update : 2014-12-10
//
// Description : Example 049 for TCPDF class
//               WriteHTML with TCPDF callback functions
>>>>>>> 96200cbf3f48cc97715e2d95c2f8835e510d73e4
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
<<<<<<< HEAD
 * @abstract TCPDF - Example: 1D Barcodes.
=======
 * @abstract TCPDF - Example: WriteHTML with TCPDF callback functions
>>>>>>> 96200cbf3f48cc97715e2d95c2f8835e510d73e4
 * @author Nicola Asuni
 * @since 2008-03-04
 */

<<<<<<< HEAD
// Include the main TCPDF library (search for installation path).
=======




// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');
// Extend the TCPDF class to create custom Header and Footer
// class MYPDF extends TCPDF {
// 	//Page header
// 	public function Header() {
// 		// get the current page break margin
// 		$bMargin = $this->getBreakMargin();
// 		// get current auto-page-break mode
// 		$auto_page_break = $this->AutoPageBreak;
// 		// disable auto-page-break
// 		$this->SetAutoPageBreak(false, 0);
// 		// set bacground image
// 		$img_file = K_PATH_IMAGES.'image_demo.jpg';
// 		$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// 		// restore auto-page-break status
// 		$this->SetAutoPageBreak($auto_page_break, $bMargin);
// 		// set the starting point for the page content
// 		$this->setPageMark();
// 	}
// }
//

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	// //Page header
	// public function Header() {
	// 	// Logo
	// 	$image_file = K_PATH_IMAGES.'logo_example.jpg';
	// 	$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	// 	// Set font
	// 	$this->SetFont('helvetica', 'B', 20);
	// 	// Title
	// 	$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	// }

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}


>>>>>>> 96200cbf3f48cc97715e2d95c2f8835e510d73e4


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
<<<<<<< HEAD
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 027');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 027', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
=======
$pdf->SetAuthor(' ');
$pdf->SetTitle('ISLAMIC_WILL');
$pdf->SetSubject(' ');
$pdf->SetKeywords('');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 049', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
>>>>>>> 96200cbf3f48cc97715e2d95c2f8835e510d73e4

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

<<<<<<< HEAD
// set a barcode on the page footer
$pdf->setBarcode(date('Y-m-d H:i:s'));

// set font
$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage();

// print a message
$txt = "You can also export 1D barcodes in other formats (PNG, SVG, HTML). Check the examples inside the barcodes directory.\n";
$pdf->MultiCell(70, 50, $txt, 0, 'J', false, 1, 125, 30, true, 0, false, true, 0, 'T', false);
$pdf->SetY(30);

// -----------------------------------------------------------------------------

$pdf->SetFont('helvetica', '', 10);

// define barcode style
$style = array(
	'position' => '',
	'align' => 'C',
	'stretch' => false,
	'fitwidth' => true,
	'cellfitalign' => '',
	'border' => true,
	'hpadding' => 'auto',
	'vpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255),
	'text' => true,
	'font' => 'helvetica',
	'fontsize' => 8,
	'stretchtext' => 4
);

// PRINT VARIOUS 1D BARCODES

// CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
$pdf->Cell(0, 0, 'CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9', 0, 1);
$pdf->write1DBarcode('CODE 39', 'C39', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 39 + CHECKSUM
$pdf->Cell(0, 0, 'CODE 39 + CHECKSUM', 0, 1);
$pdf->write1DBarcode('CODE 39 +', 'C39+', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 39 EXTENDED
$pdf->Cell(0, 0, 'CODE 39 EXTENDED', 0, 1);
$pdf->write1DBarcode('CODE 39 E', 'C39E', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 39 EXTENDED + CHECKSUM
$pdf->Cell(0, 0, 'CODE 39 EXTENDED + CHECKSUM', 0, 1);
$pdf->write1DBarcode('CODE 39 E+', 'C39E+', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 93 - USS-93
$pdf->Cell(0, 0, 'CODE 93 - USS-93', 0, 1);
$pdf->write1DBarcode('TEST93', 'C93', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// Standard 2 of 5
$pdf->Cell(0, 0, 'Standard 2 of 5', 0, 1);
$pdf->write1DBarcode('1234567', 'S25', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// Standard 2 of 5 + CHECKSUM
$pdf->Cell(0, 0, 'Standard 2 of 5 + CHECKSUM', 0, 1);
$pdf->write1DBarcode('1234567', 'S25+', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// Interleaved 2 of 5
$pdf->Cell(0, 0, 'Interleaved 2 of 5', 0, 1);
$pdf->write1DBarcode('1234567', 'I25', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// Interleaved 2 of 5 + CHECKSUM
$pdf->Cell(0, 0, 'Interleaved 2 of 5 + CHECKSUM', 0, 1);
$pdf->write1DBarcode('1234567', 'I25+', '', '', '', 18, 0.4, $style, 'N');


// add a page ----------
$pdf->AddPage();

// CODE 128 AUTO
$pdf->Cell(0, 0, 'CODE 128 AUTO', 0, 1);
$pdf->write1DBarcode('CODE 128 AUTO', 'C128', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 128 A
$pdf->Cell(0, 0, 'CODE 128 A', 0, 1);
$pdf->write1DBarcode('CODE 128 A', 'C128A', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 128 B
$pdf->Cell(0, 0, 'CODE 128 B', 0, 1);
$pdf->write1DBarcode('CODE 128 B', 'C128B', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 128 C
$pdf->Cell(0, 0, 'CODE 128 C', 0, 1);
$pdf->write1DBarcode('0123456789', 'C128C', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// EAN 8
$pdf->Cell(0, 0, 'EAN 8', 0, 1);
$pdf->write1DBarcode('1234567', 'EAN8', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// EAN 13
$pdf->Cell(0, 0, 'EAN 13', 0, 1);
$pdf->write1DBarcode('1234567890128', 'EAN13', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// UPC-A
$pdf->Cell(0, 0, 'UPC-A', 0, 1);
$pdf->write1DBarcode('12345678901', 'UPCA', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// UPC-E
$pdf->Cell(0, 0, 'UPC-E', 0, 1);
$pdf->write1DBarcode('04210000526', 'UPCE', '', '', '', 18, 0.4, $style, 'N');

// add a page ----------
$pdf->AddPage();

// 5-Digits UPC-Based Extension
$pdf->Cell(0, 0, '5-Digits UPC-Based Extension', 0, 1);
$pdf->write1DBarcode('51234', 'EAN5', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// 2-Digits UPC-Based Extension
$pdf->Cell(0, 0, '2-Digits UPC-Based Extension', 0, 1);
$pdf->write1DBarcode('34', 'EAN2', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// MSI
$pdf->Cell(0, 0, 'MSI', 0, 1);
$pdf->write1DBarcode('80523', 'MSI', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// MSI + CHECKSUM (module 11)
$pdf->Cell(0, 0, 'MSI + CHECKSUM (module 11)', 0, 1);
$pdf->write1DBarcode('80523', 'MSI+', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODABAR
$pdf->Cell(0, 0, 'CODABAR', 0, 1);
$pdf->write1DBarcode('123456789', 'CODABAR', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 11
$pdf->Cell(0, 0, 'CODE 11', 0, 1);
$pdf->write1DBarcode('123-456-789', 'CODE11', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// PHARMACODE
$pdf->Cell(0, 0, 'PHARMACODE', 0, 1);
$pdf->write1DBarcode('789', 'PHARMA', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// PHARMACODE TWO-TRACKS
$pdf->Cell(0, 0, 'PHARMACODE TWO-TRACKS', 0, 1);
$pdf->write1DBarcode('105', 'PHARMA2T', '', '', '', 18, 2, $style, 'N');

// add a page ----------
$pdf->AddPage();

// IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200
$pdf->Cell(0, 0, 'IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200', 0, 1);
$pdf->write1DBarcode('01234567094987654321-01234567891', 'IMB', '', '', '', 15, 0.6, $style, 'N');

$pdf->Ln();

// POSTNET
$pdf->Cell(0, 0, 'POSTNET', 0, 1);
$pdf->write1DBarcode('98000', 'POSTNET', '', '', '', 15, 0.6, $style, 'N');

$pdf->Ln();

// PLANET
$pdf->Cell(0, 0, 'PLANET', 0, 1);
$pdf->write1DBarcode('98000', 'PLANET', '', '', '', 15, 0.6, $style, 'N');

$pdf->Ln();

// RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)
$pdf->Cell(0, 0, 'RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)', 0, 1);
$pdf->write1DBarcode('SN34RD1A', 'RMS4CC', '', '', '', 15, 0.6, $style, 'N');

$pdf->Ln();

// KIX (Klant index - Customer index)
$pdf->Cell(0, 0, 'KIX (Klant index - Customer index)', 0, 1);
$pdf->write1DBarcode('SN34RDX1A', 'KIX', '', '', '', 15, 0.6, $style, 'N');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// TEST BARCODE ALIGNMENTS

// add a page
$pdf->AddPage();

// set a background color
$style['bgcolor'] = array(255,255,240);
$style['fgcolor'] = array(127,0,0);

// Left position
$style['position'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center position
$style['position'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right position
$style['position'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);
// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

$style['fgcolor'] = array(0,127,0);
$style['position'] = '';
$style['stretch'] = false; // disable stretch
$style['fitwidth'] = false; // disable fitwidth

// Left alignment
$style['align'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center alignment
$style['align'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right alignment
$style['align'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);
// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

$style['fgcolor'] = array(0,64,127);
$style['position'] = '';
$style['stretch'] = false; // disable stretch
$style['fitwidth'] = true; // disable fitwidth

// Left alignment
$style['cellfitalign'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', 105, '', 90, 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center alignment
$style['cellfitalign'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', 105, '', 90, 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right alignment
$style['cellfitalign'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', 105, '', 90, 15, 0.4, $style, 'N');

$pdf->Ln(2);
// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

$style['fgcolor'] = array(127,0,127);

// Left alignment
$style['position'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center alignment
$style['position'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right alignment
$style['position'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// TEST BARCODE STYLE

// define barcode style
$style = array(
	'position' => '',
	'align' => '',
	'stretch' => true,
	'fitwidth' => false,
	'cellfitalign' => '',
	'border' => true,
	'hpadding' => 'auto',
	'vpadding' => 'auto',
	'fgcolor' => array(0,0,128),
	'bgcolor' => array(255,255,128),
	'text' => true,
	'label' => 'CUSTOM LABEL',
	'font' => 'helvetica',
	'fontsize' => 8,
	'stretchtext' => 4
);

// CODE 39 EXTENDED + CHECKSUM
$pdf->Cell(0, 0, 'CODE 39 EXTENDED + CHECKSUM', 0, 1);
$pdf->SetLineStyle(array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0)));
$pdf->write1DBarcode('CODE 39 E+', 'C39E+', '', '', 120, 25, 0.4, $style, 'N');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_027.pdf', 'I');
=======




// set font
$pdf->SetFont('helvetica', '', 10);

// // add a page
// $pdf->AddPage();
$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));
$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(255, 0, 0));
$style4 = array('L' => 0,
                'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
                'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
                'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 64, 128));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));
//
// //page  start border
// $pdf->RoundedRect(05, 05, 200, 290, 6.50, '1000');
// //page end border


// add a page
$pdf->AddPage();
//page  start border
$pdf->RoundedRect(05, 05, 200, 290, 00, '1000', ' ', $style, array(400, 400, 400));
//page end border

$html = '<br><br><br><br><br><br><br> <h1 style="text-align:center; font-family: times, serif; " > In the Name of Allah the Most Gracious, the most Merciful
ISLAMIC LAST Will and Testament</h1>
';

$pdf->Image('application\img\title.png', 10, 150, 190, 50, '', '', '', 72);

$pdf->Image('application\img\logo.png', 50, 225, 100, 30, '', '', '', true, 52);
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);


// add a page
$pdf->AddPage();



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

IMPORTANT:
If you are printing user-generated content, tcpdf tag can be unsafe.
You can disable this tag by setting to false the K_TCPDF_CALLS_IN_HTML
constant on TCPDF configuration file.

For security reasons, the parameters for the 'params' attribute of TCPDF
tag must be prepared as an array and encoded with the
serializeTCPDFtagParameters() method (see the example below).

 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
 foreach ($data as $data) {
 //	$pdf->Write(0, 'Image Clipping using geometric functions'.$data->full_name, '', 0, 'C', 1, 0, false, false, 0);
}

//page  start border
$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');
//page end border

$html = '<h1 style="text-align:center; font-family: times, serif;"> ISLAMIC LAST Will and Testament</h1>
<h2 style="text-align:center; font-family: times, serif;" >of........................................</h2>

<p style="font-size:14px; font-family:Candara; ">I Miss/Mr./Mrs    '.$data->full_name.'    a Muslim, presently resident of
	        '.$data->address.'       , Age - ..........., Occupation –     '.$data->occupation.'      , having my
Aadhar No.       '.$data->aadhar_no.'        being sound mind and memory declare that the following is my
Islamic last Will and Testament (wasiyyat).</p>

<p style="font-size:14px;">WHEREAS I do hereby make, publish and declare this is to be my last will and
testament revoking all wills and codicils and testamentary dispositions at any time heretofore made by me.</p>

<p style="font-size:14px;">AND WHEREAS I am maintaining good health and I am of sound mind. This will is made by me of my own independent
 decision, my free mind and volition and in sound health without any persuasion, influence or coercion and out of my independent decision only. </p>

<p style="font-size:14px;">AND WHEREAS I fully understand what is right and wrong, I wish to make necessary and proper arrangements in
respect of enjoyment
 and distribution of my assets and properties after my life time. So that unnecessary y misunderstanding and consequential wasteful
  litigation or unpleasantness between the members of my family may be avoided. </p>



<h2 style="text-align:center; font-family: times, serif;">A. PREAMBLE</h2>

<h2 style="text-align:center; font-family: times, serif;">THE SHAHDAH – TESTIMONY OF FAITH</h2>

<h2 style="text-align:center; font-family: times, serif;">Ash-hadu ann la ilaha illallahu, waash-hadu anna Muhammadan abduhu WaRasulullah</h2>

<p style="font-size:14px;">I bear witness that there is no deity but Allah, the One, the Merciful,
the Almighty Creator of the heavens and the earth and I put my trust entirely in Him. I beg for His Help
and His Forgiveness. I seek refuge in Allah from Shaitan and the evils of the world and the evils of my deeds. I ask Him
to Guide me, those whom Allah Guides no one can mislead, and those whom Allah leaves to stray, no one can guide. I testify
that there is no deity except Allah, He is one and has no partners, and I testify that Mohammad is Allah’s last Messenger
(Peace and Blessings of Allah be on him).  I bear witness that Allah’s promises are true and we will certainty meet with Him,
Paradise is true, the Day of Judgement is coming without any doubt, and Allah (exalted be He) will surely resurrect those in the graves. </p><br><br>

';

// add a page
//$pdf->AddPage();

// Print a text
//$html = '<span style="color:white;text-align:center;font-weight:bold;font-size:80pt;">PAGE 3</span>';
//$pdf->writeHTML($html, true, false, true, false, '');



//data of pdf
/*
<h2>B. REVOCATION</h2>
<p style="font-size:14px;">
	I do hereby revoke any and all former wills and codicils that I have previously made. I ask all my relatives,
	friends, and others, whether they be Muslims or non-Muslims, to honour my right to be a Muslim. I ask them to honour
	the spirit and letter of this document and not to try to obstruct or change it in any way. I ordain that under no circumstances
	should the contents of this will be changed voluntarily.
</p>

<p style="font-size:14px;">
	I request all of my immediate relatives and any others involved in the procedures surrounding my death and burial, whether they be
	Muslims or non-Muslims, to honor my human and Constitutional right and choice to be a Muslim. I ask them to also honor the spirit as well as
	letter of this document and to not obstruct or change it in any way. Let them see to it that I am buried as a Muslim, and my property divided and
 disperse as I ordered, according to the Sunni Muslim Islamic Law (hereafter referred to Shariah). Under no circumstances does anyone have the
 authority to change the contents of this Will.
</p>
<h2>C.	FAMILY  DETAILS</h2>

<p style="font-size:14px;">
My family consists of:<br>
My father (name) &nbsp;&nbsp;&nbsp; '.$data->full_name.' …………………………………<br>
My mother (name) &nbsp;&nbsp;&nbsp; '.$data->full_name.'…………………………………<br>
My siblings<br>
My brother/s<br>
1 &nbsp;&nbsp;&nbsp;'.$data->full_name.'……………………..<br>
2 &nbsp;&nbsp;&nbsp;'.$data->full_name.'……………………<br>
My sister/s<br>
1 &nbsp;&nbsp;&nbsp; '.$data->full_name.'…………………….<br>
2 &nbsp;&nbsp;&nbsp; '.$data->full_name.'……………………<br>
My grandfather namely &nbsp;&nbsp;&nbsp; '.$data->full_name.'…………………….<br>
My grandmother namely &nbsp;&nbsp;&nbsp; '.$data->full_name.'……………………<br>


</p>

<h2>D. EXECUTOR </h2>

<p style="font-size:14px;">
	1.	I hereby nominate and appoint, namely Miss/Mr./Mrs '.$data->full_name.' ---------------------------presently residing
	at '.$data->full_name.'_____________, age'.$data->full_name.' ________, to be the executor/s of my Last Will and Testament.
</p>
<p style="font-size:14px;">
	2.	In the event that he/she will be unwilling or unable to act as executor, I nominate and appoint,
	namely Miss/Mr./Mrs'.$data->full_name.'________________residing at'.$data->full_name.'---------------------------------age'.$data->full_name.'-----------------, to be executor of this,
	 my Last Will and Testament. I direct no bond or surety for any bond be required for my executor in the performance of his/her duties.
</p>

<p style="font-size:14px;"> a)	 I give my executor herein named power to settle any claim for or against my estate and power to sell any property, real, personal, or mixed,
 in which I have an interest, without court order and without bond. I direct no bond or surety for any bond be required for my executor in
  the performance of his/her duties.</p>

	<p style="font-size:14px;">b)	I hereby grant to the Executors of my Estate all such powers as allowed by Law, especially the power of assumption.
		</p>
		<p style="font-size:14px;">
c)	I hereby direct that the Executors and Administrators of my Estate proceed with the distribution of my Estate in the following order of priority
 as commanded by Islamic Law of Succession:
</p>

<p style="font-size:14px;">
	d)	I hereby direct that the Executors and Administrators of my Estate proceed with the distribution of my Estate in the following order of
	priority as commanded by Islamic Law of Succession:
</p>

<p style="font-size:14px;">
I.	Payment of my funeral expenses.<br>
II.	Payment of all my debts. <br>
III.	Payment of the Wasiyyah (Islamic Bequest).<br>
IV.	Distribution of the residue of my Estate to my Islamic heirs in accordance with the Islamic Law of Succession.<br>

</p>
<p style="font-size:14px;" >e)	The executor is to pay such religious taxes {like khums(Khums is paid on the surplus to annual expenses of a person, i.e.
	one has to pay one-fifth of what has remained from his income after subtracting his own expenses ) and kaffarah(religious donation of
	money or food made to help those in need)}  and other expenses for hiring people to do qaza prayers and fasts;</p>

<h1>D.	FUNERAL AND BURIAL RIGHTS </h2>

<p style="font-size:14px;">I direct my executor surviving relatives and friends to ensure that i have a funeral strictly in accordance with Islamic law. That must include Ghusl
 (washing), Janaza (funeral prayer) and Dafn (burial). In particular i do not wish for an autopsy to be performed on my body and request that my body be
  released for burial immediately upon death or as soon as practical. </p>

	<p style="font-size:14px;">
		I ordain that absolutely no non-Islamic religious service or observance shall be conducted upon my death or on my body. I ordain that my grave
		shall be dug deep into the ground in complete accordance with the specifications of Islamic practice and that it face the direction of Qiblah
		(the Direction of the city of Mecca in the Arabian Peninsula, towards which Muslims face for prayer).
	</p>

	<h1>F.  DEBTS AND EXPENSES	</h1>
	<p style="font-size:14px;">
		I direct that my executor apply first, the assets of my estate to the payment of all my legal debts - including such expenses incurred by my
		last illness and burial as well as the expenses of administrating my estate. I direct the said executor to pay any "obligations to Allah" (Huquq Allah) which are binding on me, such as unpaid Zakah, Kaffarat, or unperformed pilgrimage (Hajj).
	</p>

	<p style="font-size:14px;">
		 I direct that all inheritance, state, and succession taxes (including interest and other penalties thereon) payable by reason of my death shall be paid out of and be charged generally against the principal of my
		 residuary estate (Any portion of the testator &apos s estate that is not specifically devised to someone in the will), without reimbursement from any person; except that this provision shall not be construed as a waiver of any right which my executor has,
		  by law or otherwise, to claim reimbursement for any such taxes which become payable on account of property, if any, over which I have a power of appointment.
	</p>

	<h1>G.	GUARDIANSHIP </h1>
	<p style="font-size:14px;">
	I appoint __________ and_________of___________to be the Guardian/s of my children who are under the age of eighteen (18) at the time of my
	death with the view to take care of their education, health, and fulfill their/his/her all other necessary requirements with the passage of time.
	<p>

	<p style="font-size:14px;">
		i) Therefore i appoint.........................................................., residing at.............................................., to be the guardian of my son– NAME OF SON,, until he son attains 18 years of age only,
		and if his mother, NAME OF MOTHER, cannot take care of NAME OF SON either on account of personal, health, financial, or other reasons, , so long as said guardian remains a Muslim of sound mind and judgment. In the event he shall
		be unwilling or unable to act as guardian. In the event he shall be unwilling or unable to act as guardian, I nominate and appoint ....................................................residing in ..................................
		......................, to be the guardian.
	</p>

	<p style="font-size:12px;">
		ii) 	Therefore i appoint and nominate.................................................., residing at Add .........................................
		.....,  to be the guardian of my daughter NAME OF DAUGHTER, until she attains 18 years of age only  if her mother, NAME OF MOTHER (can cannot take
		care of NAME OF DAUGHTER either on account of personal, health, financial, or other reasons, , so long as said guardian remains a Muslim of sound
		 mind and judgment. In the event has shall be unwilling or unable to act as guardian, I nominate and appoint .......................................
		 .............residing in ........................................................, to be the guardian.
	</p>

	<p style="font-size:14px;>
	In such case, I urge that all my minor children be raised to be practicing Sunni Muslims and not in any way be indoctrinated into any other
	 faith, religion, or sect of Islam. I direct that no bond be required of any personal guardian. Any property or other inheritance that this
	  Will gives to any of my minor children shall be administered by their guardian in their best interest.
	</p>
  	<p style="font-size:14px;></p>
		<h1> H.DESCRIPTION OF PROPERTY </h1>
  <h2> 1 )	Real Estate </h2>
	<ul>
		<li>a)	Flats</li>
		<li>b)	Shops</li>
		<li>c)	land</li>
		<li>d)	plot</li>
		<li>e)	Commercial shop unit</li>
		<li>f)	commercial office unit</li>
	</ul>

	<h2> 2 )	Property Number and address – </h2>
	<ul>
		<li>a)	city survey no</li>
		<li>b)	revision  survey no</li>
		<li>c)	 Area</li>
		<li>d)	Measurement</li>
	</ul>

	<h2>  3.	State – </h2>
	<h2> 	4.	City – </h2>
	<h2> 	5.	pin code – </h2>

 	<h2> 6.	Bank assets – </h2>
	<ul>
		<li> a)	Saving account</li>
		<li> b)	Current account</li>
	  <li> c)	Fixed deposits </li>
    <li> d)	Public provident fund </li>
		<li> e)	Bank locker </li>
	</ul>

	<h2> 7.	Vehicle details </h2>
	<ul>
	<li> a)	Registration no </li>
	<li> b)	Year</li>
	<li>c)	Model no</li>
	</ul>

	<h2>8.	Other gifts </h2>
	<ul>
	<li>a)	Jewellery and valuables</li>
	<li>b)	Mutual funds</li>
	<li>c)	Insurance policy/ies</li>
	<li>d)	Stock/equities</li>
	<li>e)	Remained assets</li>
</ul>

<h1>* I. DISTRIBUTION OF THE REMINDER OF MY ESTATE</h1>

<p style="font-family: times, serif;" > a.	I direct, devise and bequest all the residue and remainder of my estate after making provision for payment of
my obligations and distributions provided above to only my Muslim heirs whose relation to me, whether ascending or descending,
has occurred through Islamic or lawful marriage at each and every point. The distribution of the residue and remainder of my estate shall
be made strictly in accordance with.</p>

<h1> SCHEDULE A – MAWARITH (INHERITANCE) </h1>

<h3> SCHEDULE A – MAWARITH (INHERITANCE) </h3>

<p style="font-family: times, serif;" >This schedule A is signed by me as a part of this Last Will and Testament.</p>
<p>b.	I direct that no part of the residue and remainder of my estate shall be inherited by any non-Muslim relative,
whether he/she is a kin or an in-law, spouse, parent or child. I further direct or ordain that any non-Muslim relative be disregarded and
 disqualified in the application of the named schedule.</p>

 <p style="font-family: times, serif;">
 	d.	I direct that no part of my estate shall be given to relatives whose relationship to me, ascending or descending has
	occurred through non-Islamic and unlawful marriage or through adoption, at each and every point, except the following.
 </p>
 <ul>
 <li>
 1.	Legatees specifically named in Charitable Contributions and testamentary transfer.
 </li>
 <li>
 		2.	A relative who is related to me through his/her biological mother.
 </li>
</ul>

<p style="font-family: times, serif;" >
	* Schedule A has been prepared by .............................. and made a ---------------- by him for the service of Muslims in India,
	may Allah shower his soul with mercy and forgiveness.
</p>

<p style="font-family: times, serif;" >
	e.	I direct and devise that any foetus, conceived before my death, whose relationship to me qualifies it to be an heir according to this Article,
	shall be considered as an heir if the following condition is fulfilled, the foetus should be born alive within 365 days of my death. I further direct
	and devise that whatever there exists a foetus who may become an heir according to this section, the whole distribution of the residue and remainder
  of my estate after the execution of above (debts and expenses and charitable contributions) be delayed until after the birth of the foetus, or
	that the largest potential share of the foetus be set aside until its birth alive. Should the foetus be born alive, but quality for a lesser
		share, or should it not be born alive within the 365 days, any surplus of the set aside amount must be returned to the estate and distributed
			according to Schedule A.
</p>
<p style="font-family: times, serif;">
	f.	I direct, devise, and bequest all the residue and remainder of my estate of every nature and kind and whenever situated after making provisions for payments
	 of my obligations and distribution of my estate as provided in above para no. D and E. I further direct, devise and ordain that any portion of my estate disclaimed
	  of refused to be received by any of the legatees named or referred to in this Last will and Testament, or the remainder of my estate in the event of non-existence
		of my Islamic heirs, shall be given to the Islamic society of India, as a contribution for establishing Islamic schools, centres, mosques and other activities in India.
</p>
<h1>J. Announcement</h1>
<p>1. If I die as a result of murder, I direct that the adjured murderer, principal or accessory in the murder shall be disqualified to receive any part of my estate. </p>
<p>2. I direct that no part of my estate shall be given to relatives whose relationship to me, ascending or descending, has occurred through non-Islamic and unlawful marriage, or through adoption</p>
<p>3. I direct that no part of the residue and remainder of my estate shall be inherited by any non-Muslim relative, whether he/she is a kin or in-law, spouse, parent or child. I further direct and ordain
 that a non-Muslim relative be disregarded and disqualified.</p>
 <p>4. I direct that no part of my estate shall be given to relatives whose relationship to me, ascending or descending, has occurred through non-Islamic and unlawful marriage, or through adoption.</p>

 <h1>K. SEPARABILITY</h1>

 <p style="font-family: times, serif;">In case  one or more of the provisions contained in this/ any part of this Last Will and Testament is determined invalid by a court of competent jurisdiction I direct and ordain that other remaining provisions
 shall remain valid and enforceable and effective.</p>
 <p style="font-family: times, serif;" >
 I subscribe my name to this Will this day ______ of ____________, 201-- at ________ am/pm and do hereby declare that I sign and execute this instrument as my last Will and that I sign it willingly, that I execute it as my
  free and voluntary act for the purposes therein expressed, and that I am of age or otherwise legally empowered to make a Will, under no constraint or undue influence
 </p>
 <p>This is my last and final will, which I have laid out.</p>
 <ul>


 	<li>PLACE: ____________</li><br>
	<li>Dated:____________</li>
 </ul>
 <p style="font-family: times, serif;">L.  TESTATOR’S SIGNATURE </p>
 <p style="font-family: times, serif;">
 	In witness whereof, I have hereunto set my hand and seal on this: _________ day of _______, 2___.
 </p>
 <p>______________________
Signature
</p>

<h1 >M.  WITNESSES</h1>
<p style="font-family: times, serif; color: #52565940;  " >
	We hereby certify that the foregoing instrument was on the date thereof, signed, Published, and declared by
	the Testator _______________ ______________, as and for His/her Last Will and Testament, in our presence, who at
	his/her request and in his/her Presence, and in the presence of each other, have hereunto subscribed our names as
	Witnesses thereto, believing said Testator at the time of the signing to be of sound mind and memory.
</p>
<ul>
	<li>
	1. _________________________ of ___________________________</li>
<li>  2. _________________________ of ___________________________</li>


</ul>

*/
//data end of pdf

// watermark
//$pdf->SetLineWidth(2);

// // draw opaque red square
// $pdf->SetFillColor(255, 0, 0);
// $pdf->SetDrawColor(127, 0, 0);
// $pdf->Rect(30, 40, 60, 60, 'DF');
//
// // set alpha to semi-transparency
// $pdf->SetAlpha(0.5);
// //
// // // draw green square
// // $pdf->SetFillColor(0, 255, 0);
// // $pdf->SetDrawColor(0, 127, 0);
// // $pdf->Rect(50, 60, 60, 60, 'DF');
//
// // draw blue square
// $pdf->SetFillColor(0, 0, 255);
// $pdf->SetDrawColor(0, 0, 127);
// $pdf->Rect(70, 80, 60, 60, 'DF');

// draw jpeg image
$pdf->Image('application\img\logo.png', 50, 25, 100, 30, '', '', '', true, 52);

$pdf->Image('application\img\logo.png', 50, 125, 100, 30, '', '', '', true, 52);

$pdf->Image('application\img\logo.png', 50, 225, 100, 30, '', '', '', true, 52);

// restore full opacity
//$pdf->SetAlpha(1);


// end  watermark




// reset pointer to the last page
$pdf->lastPage();
// -- set new background ---
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

//page 1
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'image_demo.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// ---------------------------------------------------------

//page 2
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'image_demo.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// ---------------------------------------------------------
//page 3
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'image_demo.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// ---------------------------------------------------------
//page 4
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'image_demo.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// ---------------------------------------------------------
//page 5
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'image_demo.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// ---------------------------------------------------------
//page 6
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'image_demo.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// ---------------------------------------------------------
//page 7
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'image_demo.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// ---------------------------------------------------------
$pdf->AddPage();
//page  start border
$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');
//page end border

$html = '<h1>K. SEPARABILITY</h1>

<p style="font-family: times, serif;">In case  one or more of the provisions contained in this/ any part of this Last Will and Testament is determined invalid by a court of competent jurisdiction I direct and ordain that other remaining provisions
shall remain valid and enforceable and effective.</p>
<p style="font-family: times, serif;" >
I subscribe my name to this Will this day ______ of ____________, 201-- at ________ am/pm and do hereby declare that I sign and execute this instrument as my last Will and that I sign it willingly, that I execute it as my
 free and voluntary act for the purposes therein expressed, and that I am of age or otherwise legally empowered to make a Will, under no constraint or undue influence
</p>
<p>This is my last and final will, which I have laid out.</p>
<ul>


 <li>PLACE: ____________</li><br>
 <li>Dated:____________</li>
</ul>
<p style="font-family: times, serif;">L.  TESTATOR’S SIGNATURE </p>
<p style="font-family: times, serif;">
 In witness whereof, I have hereunto set my hand and seal on this: _________ day of _______, 2___.
</p>
<p>______________________
Signature
</p>

<h1 >M.  WITNESSES</h1>
<p style="font-family: times, serif; color: #52565940;  " >
 We hereby certify that the foregoing instrument was on the date thereof, signed, Published, and declared by
 the Testator _______________ ______________, as and for His/her Last Will and Testament, in our presence, who at
 his/her request and in his/her Presence, and in the presence of each other, have hereunto subscribed our names as
 Witnesses thereto, believing said Testator at the time of the signing to be of sound mind and memory.
</p>
<ul>
 <li>
 1. _________________________ of ___________________________</li>
<li>  2. _________________________ of ___________________________</li>


</ul>';

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

$pdf->Image('application\img\logo.png', 90, 100, 60, 60, '', '', '', true, 72);
//Close and output PDF document
$pdf->Output('example_049.pdf', 'I');
>>>>>>> 96200cbf3f48cc97715e2d95c2f8835e510d73e4

//============================================================+
// END OF FILE
//============================================================+
