<?php
 // Extend the TCPDF class to create custom Header and Footer
 class MYPDF extends TCPDF {
  //Page header
  public function Header() {
 	 $this->RoundedRect(05, 05, 200, 290, 0, '1000');
  }
  // Page footer
  public function Footer() {
 	 // Position at 15 mm from bottom
 	 $this->SetY(-15);
 	 $this->SetFont('helvetica', 'I', 8);
 	 // Page number
 	 $this->Cell(10, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
 	 // Set font
 	 $this->SetFont('helvetica', 'I', 12);
 	 $this->Cell(295, 15, ' Signature.................. ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
  }
}

 // create new PDF document
 $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 // set document information
 $pdf->SetCreator(PDF_CREATOR);
 $pdf->SetAuthor(' ');
 $pdf->SetTitle('Islamic_Will');
 $pdf->SetSubject(' ');
 $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 // set default header data
 $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
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
 // set some language-dependent strings (optional)
 if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  require_once(dirname(__FILE__).'/lang/eng.php');
  $pdf->setLanguageArray($l);
 }
 // ---------------------------------------------------------
// set font
$pdf->SetFont('helvetica', '', 10);
// add a page
$pdf->AddPage();

$html = '<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br> <h1 style="text-align:center; font-family: times, serif; font-size:20px; ">
In The Name Of Allah the Most Gracious, the Most Merciful <br>
Islamic Last Will and Testament
 </h1>
';
$pdf->Image(base_url().'assets/images/title.png', 10, 150, 190, 50, '', '', '', 72);
$pdf->Image(base_url().'assets/images/logo.png', 50, 225, 100, 30, '', '', '', true, 52);
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// add a page
$pdf->AddPage();
foreach ($will_data as $will_data) {
}
foreach ($personal_data as $personal_data) {
}
//page  start border
$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');
//page end border
$html ='<style>
	p{
		text-align: justify;
	}
</style>';

$html .= '<br><h1 style="text-align:center; font-family: times, serif; line-height:0px;"> Islamic Last Will and Testament</h1>
<h2 style="text-align:center; font-family: times, serif;" >of <br>'.$personal_data->name_title.' '.$personal_data->full_name.'</h2>
<p style="font-size:12; font-family: times, serif; text-align: center; ">This Islamic Last Will and Testament is made, entered and executed  <br>at '.$personal_data->address.'</p>
<p style="font-size:12; text-indent:40px; font-family: times, serif; text-align: justify; ">I <span style=" font-weight:bold;">'.$personal_data->name_title.' '.$personal_data->full_name.'</span> Age- '.$personal_data->age.', Occupation – '.$personal_data->occupation.', a Muslim, presently resident of
'.$personal_data->address.',   having my
Aadhar No. '.$personal_data->aadhar_no.' being sound mind and memory declare that the following is my
Islamic last Will and Testament (wasiyyat).</p>

<p style="font-size:12; text-indent:40px; font-family: times, serif; text-align: justify; ">WHEREAS I do hereby make, publish and declare this is to be my
Islamic Last Will and Testament revoking all wills and codicils and testamentary dispositions at any time heretofore made by me.</p>

<p style="font-size:12; text-indent:40px; font-family: times, serif;">AND WHEREAS I am maintaining good health and I am of sound mind. This will is made by me of my own independent
 decision, my free mind and volition and in sound health without any persuasion, influence or coercion and out of my independent decision only. </p>

<p style="font-size:12; text-indent:40px; font-family: times, serif;">AND WHEREAS I fully understand what is right and wrong, I wish to make necessary and proper arrangements in
respect of enjoyment
 and distribution of my assets and properties after my life time. So that unnecessary misunderstanding and consequential wasteful
  litigation or unpleasantness between the members of my family may be avoided.<br><br></p>

<h2 style="text-align:center; font-family: times, serif;">A. PREAMBLE</h2>

<h2 style="text-align:center; font-family: times, serif;">THE SHAHDAH – TESTIMONY OF FAITH</h2>

<h2 style="text-align:center; font-family: times, serif;">Ash-hadu ann la ilaha illallahu, waash-hadu anna Muhammadan abduhu Wa-Rasulullah</h2>

<p style="font-size:12; text-indent:40px; font-family: times, serif;">I bear witness that there is no deity but Allah, the One, the Merciful,
the Almighty Creator of the heavens and the earth and I put my trust entirely upon Him. I beg for His Help
and His Forgiveness. I seek refuge in Allah from Shaitan and the evils of the world and the evils of my deeds. I ask Him
to Guide me, those whom Allah Guides no one can mislead, and those whom Allah leaves to stray, no one can guide. I testify
that there is no deity except Allah, He is one and has no partners, and I testify that Mohammad is Allah’s last Messenger
(Peace and Blessings of Allah be on him).  I bear witness that Allah’s promises are true and we will certainty meet with Him,
Paradise is true, the Day of Judgement is coming without any doubt, and Allah (exalted be He) will surely resurrect those in the graves.<br><br><br><br> </p>
';

// draw jpeg image
$pdf->Image(base_url().'assets/images/logo.png', 50, 25, 100, 30, '', '', '', true, 52);
$pdf->Image(base_url().'assets/images/logo.png', 50, 125, 100, 30, '', '', '', true, 52);
$pdf->Image(base_url().'assets/images/logo.png', 50, 225, 100, 30, '', '', '', true, 52);
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
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/3.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

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
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/3.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

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
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/3.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

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
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/3.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

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
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/3.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

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
$img_file = K_PATH_IMAGES.'3.gif';
$pdf->Image(base_url().'assets/images/.gif', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();


//page  start border

$html = '<h1 style="text-align:center; font-family: times, serif;" >K. SEPARABILITY</h1>';
$will_date = $will_data->will_date;
$day = date('d', strtotime($will_date));
$month = date('F', strtotime($will_date));
$year = date('Y', strtotime($will_date));

$html .= '<p style="font-size:12; font-family: times, serif;">In case  one or more of the provisions contained in this/ any part of this Last Will and Testament is determined invalid by a court of competent jurisdiction I direct and ordain that other remaining provisions
shall remain valid and enforceable and effective.</p>
<p style="font-size:12; font-family: times, serif;" >
I subscribe my name to this Will this day '.$day.' of '.$month.', '.$year.' at '.$will_data->will_time.' am/pm and do hereby declare that I sign and execute this instrument as my last Will and that I sign it willingly, that I execute it as my
 free and voluntary act for the purposes therein expressed, and that I am of age or otherwise legally empowered to make a Will, under no constraint or undue influence
</p>
<p style="font-size:12; font-family: times, serif;" >This is my last and final will, which I have laid out.</p>';

$html .= '
<p>PLACE: '.$will_data->will_place.'</p>
<p>Dated: '.$will_data->date.' <br><br></p>
<h1 style="text-align:center; font-family: times, serif;" >L.  TESTATOR’S SIGNATURE </h1>
<p style="font-size:12; font-family: times, serif;" >
 In witness whereof, I have hereunto set my hand and seal on this: '.$day.' day of '.$month.', '.$year.'.
</p>

<p style=" font-size:12; text-align:right; font-family: times, serif; line-height:25px;" >
______________________ <br>
Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><br></p>


<h1 style="text-align:center; font-family: times, serif;" >M.  WITNESSES</h1>
<p style="font-family: times, serif;" >
We hereby certify that the foregoing instrument was on the date thereof, signed, Published, and declared by
the Testator '.$personal_data->full_name.', as and for His/her Last Will and Testament, in our presence, who at
his/her request and in his/her Presence, and in the presence of each other, have hereunto subscribed our names as
Witnesses thereto, believing said Testator at the time of the signing to be of sound mind and memory.

</p>
<h1 style="text-align:left; font-family: times, serif;" >  Witnesses: </h1>
';
$i=0 ;
foreach($witness as $witness ) {
 $i++;
   $html .= '<p style="font-size:12; font-family: times, serif; margin-left:40px;">'.$i.'. &nbsp; Sign-------------------<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name &nbsp;' .$witness->witness_name.'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;&nbsp;&nbsp; '.$witness->witness_address.'<br></p>';
}
$pdf->Image(base_url().'assets/images/logo.png', 60, 25, 100, 30, '', '', '', true, 72);
$pdf->Image(base_url().'assets/images/logo.png', 60, 125, 100, 30, '', '', '', true, 72);
$pdf->Image(base_url().'assets/images/logo.png', 60, 225, 100, 30, '', '', '', true, 72);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

//Close and output PDF document
$pdf->Output('ISLAMIC_WILL_Demo.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+
