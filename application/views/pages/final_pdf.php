<?php
 // Extend the TCPDF class to create custom Header and Footer
 class MYPDF extends TCPDF {
 	//Page header
 	public function Header() {
    $this->SetY(-20);
    $this->SetFont('helvetica', 'I', 8);
    // Page number
    $this->Cell(20, 0, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    // Set font
    $this->SetFont('helvetica', 'I', 12);
    $this->Cell(245, 20, ' Signature.................. ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
 	}

 	// Page footer
 	public function Footer() {
    $this->SetLineStyle( array( 'width' => 0.80, 'color' => array(0, 0, 0)));
    $this->Line(10, 10, $this->getPageWidth()-10, 10);
    $this->Line($this->getPageWidth()-10, 10, $this->getPageWidth()-10,  $this->getPageHeight()-10);
    $this->Line(10, $this->getPageHeight()-10, $this->getPageWidth()-10, $this->getPageHeight()-10);
    $this->Line(10, 10, 10, $this->getPageHeight()-10);
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
 $pdf->SetMargins(25, 25, 25);
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

// //page  start border
// $pdf->RoundedRect(05, 05, 200, 290, 6.50, '1000');
// //page end border

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// add a page
$pdf->AddPage();
//page  start border
//$pdf->RoundedRect(10, 05, 200, 290, 00, '1000', ' ', array(400, 400, 400));
//page end border

$html = '<br><br><br>
<br><br> <h1 style="text-align:center; font-family: times, serif; font-size:20px; ">
In The Name Of Allah the Most Gracious, the Most Merciful <br><br><br><br><br></h1>
<h1 style="text-align:center; font-family: times, serif; font-size:26px;" >Islamic Last Will and Testament</h1>

';

$pdf->Image(base_url().'assets/images/title.png', 20, 170, 170, 45, '', '', '', 72);

//$pdf->Image('application\img\logo.png', 50, 225, 100, 30, '', '', '', true, 52);
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

$pdf->SetPrintHeader(true);
$pdf->SetPrintFooter(true);
// add a page
$pdf->AddPage();

foreach ($will_data as $will_data) {
}

foreach ($personal_data as $personal_data) {
}

$heading = 'A';

//page  start border
//$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');
//page end border
//$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');
$html ='<style>
							p{
								text-align: justify;
							}
				</style>
';

$html .= '<br><h1 style="text-align:center; font-family: times, serif; line-height:0px;"> Islamic Last Will and Testament</h1>

<h2 style="text-align:center; font-family: times, serif;" >of <br>'.$personal_data->name_title.' '.$personal_data->full_name.'</h2>

<p style="font-size:12; font-family: times, serif; text-align: center; ">This Islamic Last Will and Testament is made, entered and executed  <br>at '.$will_data->will_place.'</p>
<p style="font-size:12; text-indent:40px; font-family: times, serif; text-align: justify; ">I <span style="font-weight:bold;">'.$personal_data->name_title.' '.$personal_data->full_name.'</span> Age- '.$personal_data->age.', Occupation – '.$personal_data->occupation.', a Muslim, presently resident of
'.$personal_data->address.', '.$personal_data->city.',  '.$personal_data->state.'- '.$personal_data->pin_code.', '.$personal_data->country.' having my
Aadhar No. '.$personal_data->aadhar_no;
if($personal_data->pan_no){
$html .= ' and having my PAN No. '.$personal_data->pan_no;
}
$html .= ' being sound mind and memory declare that the following is my
Islamic last Will and Testament (wasiyyat).</p>

<p style="font-size:12; text-indent:40px; font-family: times, serif; text-align: justify; ">WHEREAS I do hereby make, publish and declare this is to be my
Islamic Last Will and Testament revoking all wills and codicils and testamentary dispositions at any time heretofore made by me.</p>

<p style="font-size:12; text-indent:40px; font-family: times, serif;">AND WHEREAS I am maintaining good health and I am of sound mind. This will is made by me of my own independent
 decision, my free mind and volition and in sound health without any persuasion, influence or coercion and out of my independent decision only. </p>

<p style="font-size:12; text-indent:40px; font-family: times, serif;">AND WHEREAS I fully understand what is right and wrong, I wish to make necessary and proper arrangements in
respect of enjoyment
 and distribution of my assets and properties after my life time. So that unnecessary misunderstanding and consequential wasteful
  litigation or unpleasantness between the members of my family may be avoided.<br><br></p>



<h2 style="text-align:center; font-family: times, serif;">'.$heading++.'. PREAMBLE</h2>

<h2 style="text-align:center; font-family: times, serif;">THE SHAHDAH – TESTIMONY OF FAITH</h2>

<h2 style="text-align:center; font-family: times, serif;">Ash-hadu ann la ilaha illallahu, waash-hadu anna Muhammadan abduhu Wa-Rasulullah</h2>

<p style="font-size:12; text-indent:40px; font-family: times, serif;">I bear witness that there is no deity but Allah, the One, the Merciful,
the Almighty Creator of the heavens and the earth and I put my trust entirely upon Him. I beg for His Help
and His Forgiveness. I seek refuge in Allah from Shaitan and the evils of the world and the evils of my deeds. I ask Him
to Guide me, those whom Allah Guides no one can mislead, and those whom Allah leaves to stray, no one can guide. I testify
that there is no deity except Allah, He is one and has no partners, and I testify that Mohammad is Allah’s last Messenger
(Peace and Blessings of Allah be on him).  I bear witness that Allah’s promises are true and we will certainty meet with Him,
Paradise is true, the Day of Judgement is coming without any doubt, and Allah (exalted be He) will surely resurrect those in the graves.<br><br><br><br> </p>

<h2 style="text-align:center; font-family: times, serif;" >'.$heading++.'. REVOCATION</h2>
<p style="font-size:12; text-indent:40px; font-family: times, serif;">
	I do hereby revoke any and all former wills and codicils that I have previously made. I ask all my relatives,
	friends, and others, whether they be Muslims or non-Muslims, to honour my right to be a Muslim. I ask them to honour
	the spirit and letter of this document and not to try to obstruct or change it in any way. I ordain that under no circumstances
	should the contents of this will be changed voluntarily.
</p>

<p style="font-size:12;text-indent:40px;  font-family: times, serif;">
	I request all of my immediate relatives and any others involved in the procedures surrounding my death and burial, whether they be Muslims or non-Muslims,
  to honour my human and Constitutional right and choice to be a Muslim. Let them see to it that I am buried as a Muslim, and my property divided and disperse
   as I ordered, according to the Sunni Muslim Islamic Law (hereafter referred to Shari’ah). <br><br>
</p>
<h2 style="text-align:center; font-family: times, serif;" >'.$heading++.'.	FAMILY  DETAILS</h2>

<p style="font-size:12; font-family: times, serif;">
<span style="font-size:14; font-family: times, serif;" ><b>My family consists of:</b><br><br></span>';
$Son_num = 0;
$Son_num1 = 0;
$Daughter_num = 0;
$Daughter_num1 = 0;
$Brother_num1 = 0;
$Brother_num = 0;
$Sister_num = 0;
$Sister_num1 = 0;
$Spouse_num = 0;
$Spouse_num1 = 0;
foreach($family_data as $family_data2 ) {
  if ($family_data2->relationship === 'Brother') {
    $Brother_num1++;
  }
  if($Brother_num1 > 1){$bro_title = 'Brothers';}
  else{ $bro_title = 'Brother'; }

  if ($family_data2->relationship === 'Sister') {
    $Sister_num1++;
  }
  if($Sister_num1 > 1){$sis_title = 'Sisters';}
  else{ $sis_title = 'Sister'; }

  if ($family_data2->relationship === 'Son') {
    $Son_num1++;
  }
  if($Son_num1 > 1){$son_title = 'Sons';}
  else{ $son_title = 'Son'; }

  if ($family_data2->relationship === 'Daughter') {
    $Daughter_num1++;
  }
  if($Daughter_num1 > 1){$dau_title = 'Daughters';}
  else{ $dau_title = 'Daughter'; }

  if ($family_data2->relationship === 'Spouse') {
    $Spouse_num1++;
  }
  if($Spouse_num1 > 1){$spo_title = 'Spouses';}
  else{ $spo_title = 'Spouse'; }
}
foreach($family_data as $family_data ) {
  if($family_data->relationship == 'Father'){
    $html .= '<br><span style="font-size:14; font-family: times, serif;" ><b>My Father</b></span><br><br>';
    $html .= ''.$family_data->family_person_name.',&nbsp;Age: '.$family_data->family_person_age.'<br>';
  }

  if($family_data->relationship == 'Mother'){
    $html .= '<br><br><span style="font-size:14; font-family: times, serif;" ><b>My Mother</b></span><br><br>';
    $html .= '<span style="font-size:12; font-family: times, serif;" >'.$family_data->family_person_name.',&nbsp;Age: '.$family_data->family_person_age.'</span><br>';
  }

  if($family_data->relationship == 'Brother'){
    $Brother_num++;
    if($Brother_num == 1){
      $html .= '<br><br><span style="font-size:14; font-family: times, serif;" ><b>My '.$bro_title.'</b></span><br><br>';
    }
    $html .= $Brother_num.'.&nbsp;'.$family_data->family_person_name.',&nbsp;Age: '.$family_data->family_person_age.'<br>';
  }

  if($family_data->relationship == 'Sister'){
    $Sister_num++;
    if($Sister_num == 1){
      $html .= '<br><br><span style="font-size:14; font-family: times, serif;" ><b>My '.$sis_title.'</b></span><br><br>';
    }
    $html .= $Sister_num.'.&nbsp;'.$family_data->family_person_name.',&nbsp;Age: '.$family_data->family_person_age.'<br>';
  }

  if($family_data->relationship == 'Spouse'){
    $Spouse_num++;
    if($Spouse_num == 1){
      $html .= '<br><br><span style="font-size:14; font-family: times, serif;" ><b>My Spouse</b></span><br><br>';
    }
    $html .= $Spouse_num.'. '.$family_data->family_person_name.',&nbsp;Age: '.$family_data->family_person_age.'<br>';
  }

  if($family_data->relationship == 'Son'){
    $Son_num++;
    if($Son_num == 1){
      $html .= '<br><br><span style="font-size:14; font-family: times, serif;" ><b>My '.$son_title.'</b></span><br><br>';
    }
    // $pdf->setCellPaddings( $left = '', $top = '0', $right = '', $bottom = '');
    $html .= $Son_num.'.&nbsp;'.$family_data->family_person_name.',&nbsp;Age: '.$family_data->family_person_age.'<br>';
  }

  if($family_data->relationship == 'Daughter'){
    $Daughter_num++;
    if($Daughter_num == 1){
      $html .= '<br><br><span style="font-size:14; font-family: times, serif;" ><b>My '.$dau_title.'</b></span><br><br>';
    }
    $html .= $Daughter_num.'.&nbsp;'.$family_data->family_person_name.',&nbsp;Age: '.$family_data->family_person_age.'<br>';
  }

  if($family_data->relationship == 'Grandfather'){
    $html .= '<br><br><span style="font-size:14; font-family: times, serif;" ><b>My Grandfather</b></span><br><br>';
    $html .= ''.$family_data->family_person_name.',&nbsp;Age: '.$family_data->family_person_age.'<br>';
  }

  if($family_data->relationship == 'Grandmother'){
    $html .= '<br><br><span style="font-size:14; font-family: times, serif;" ><b>My Grandmother</b></span><br><br>';
    $html .= ''.$family_data->family_person_name.',&nbsp;Age: '.$family_data->family_person_age.'<br>';
  }

}

$exec_count = 0;
foreach($excutor_data as $excutor_data2 ) {
  $exec_count++;
  if($exec_count > 1){$exec_title_sm = 'executors'; $exec_title_lg = 'EXECUTORS'; }
  else{ $exec_title_sm = 'executor'; $exec_title_lg = 'EXECUTOR'; }
}

$html .= '<br></p>
<h2 style="text-align:center; font-family: times, serif;" >'.$heading++.'. '.$exec_title_lg.' </h2>';
$i = 0;
$key_1='**';
$key_2='**';
foreach($excutor_data as $excutor_data ) {
	$i++;
  $gender=$excutor_data->executor_gender;
  if($gender=='Male'){
    $key_1='he';
    $key_2='his';
  }else{
    $key_1='she';
    $key_2='her';
  }

	if($i == 1){
    $frist_executor=$key_1;
		$html .= '
      <p style="font-size:12; font-family: times, serif;">
      	1. &nbsp;&nbsp;&nbsp;&nbsp;I  hereby nominate and appoint, namely '.$excutor_data->e_name_title.' '.$excutor_data->executor_name.' Age - &nbsp;'.$excutor_data->executor_age.', presently Residing
      	at &nbsp;'.$excutor_data->executor_address.',  to be the executor of my Islamic Last Will and Testament.
      </p>
    ';
	}
	elseif($i == 2){
		$html .= '
  		<p style="font-size:12; font-family: times, serif;">
  			2. &nbsp;&nbsp;&nbsp;&nbsp;In the event that '.$frist_executor.' will be unwilling or unable to act as executor, I nominate and appoint,
  			namely '.$excutor_data->e_name_title.' '.$excutor_data->executor_name.'&nbsp;Age - &nbsp;'.$excutor_data->executor_age.', presently Residing  at &nbsp;'.$excutor_data->executor_address.'&nbsp;&nbsp;to be executor of this
  			 my Islamic Last Will and Testament. I direct no bond or surety for any bond be required for my executor in the performance of '.$key_2.' duties.
  		</p>
    ';
	}
}

$html .= '
  <p style="font-size:12; text-indent:20px; text-align:justify; font-family: times, serif;">
    a)  I give my '.$exec_title_sm.' herein named power to settle any claim for or against my estate and power to sell any property,
    real, personal, or mixed, in which I have an interest, without court order and without bond.
  </p>

	<p style="font-size:12; text-indent:20px; text-align:justify; font-family: times, serif;">
    b) I hereby grant to the '.$exec_title_sm.' of my Estate all such powers as allowed by Law, especially the power of assumption.
	</p>

	<p style="font-size:12; text-indent:20px; text-align:justify; font-family: times, serif;">
    c) I hereby direct that the '.$exec_title_sm.' of my Estate proceed with the distribution of my Estate in the following order of priority
    as commanded by Islamic Law of Succession:
  </p>

  <p style="font-size:12; text-indent:20px; text-align:justify; font-family: times, serif;">
    I.	Payment of my funeral expenses.<br>
    II.	Payment of all my debts. <br>
    III.	Payment of the Wasiyyah (Islamic Bequest).<br>
    IV.	Distribution of the residue of my Estate to my Islamic heirs in accordance with the Islamic Law of Succession.
  </p>

  <p  style="font-size:12; text-indent:20px; text-align:justify; font-family: times, serif;">
    d) The executor is to pay such religious taxes {like khums(Khums is paid on the surplus to annual expenses of a person, i.e.
  	one has to pay one-fifth of what has remained from '.$key_2.' income after subtracting '.$key_2.' own expenses ) and kaffarah(religious donation of
  	money or food made to help those in need)}  and other expenses for hiring people to do qaza prayers and fasts.
  <br><br></p>

<h1 style="text-align:center; font-family: times, serif;" >'.$heading++.'.	FUNERAL AND BURIAL RIGHTS </h2>

<p style="font-size:12; text-indent:40px; font-family: times, serif;">I direct my '.$exec_title_sm.' surviving relatives and friends to ensure that i have a funeral strictly in accordance with Islamic law. That must include Ghusl
 (washing), Janaza (funeral prayer) and Dafn (burial). In particular I do not wish for an autopsy to be performed on my body and request that my body be
  released for burial immediately upon death or as soon as practical. </p>

	<p style="font-size:12; text-indent:40px; font-family: times, serif;">
		I ordain that absolutely no non-Islamic religious service or observance shall be conducted upon my death or on my body. I ordain that my grave
		shall be dug deep into the ground in complete accordance with the specifications of Islamic practice and that it face the direction of Qiblah
		(the Direction of the city of Mecca in the Arabian Peninsula, towards which Muslims face for prayer).
	<br><br></p>

	<h1 style="text-align:center; font-family: times, serif;" >'.$heading++.'.  DEBTS AND EXPENSES	</h1>
	<p style="font-size:12; text-indent:40px; font-family: times, serif;">
		I direct that my '.$exec_title_sm.' apply first, the assets of my estate to the payment of all my legal debts - including such expenses incurred by my
		last illness and burial as well as the expenses of administrating my estate. I direct the said '.$exec_title_sm.' to pay any "obligations to Allah" (Huquq Allah) which are binding on me, such as unpaid Zakaat, Kaffarat, or unperformed pilgrimage (Hajj).
	</p>
	<p style="font-size:12; text-indent:40px; font-family: times, serif;">
	';
	

	$html .= "
		 I direct that all inheritance, state, and succession taxes (including interest and other penalties thereon) payable by reason of my death shall be paid out of and be charged generally against the principal of my
		 residuary estate (Any portion of the testator's estate that is not specifically devised to someone in the will), without reimbursement from any person; except that this provision shall not be construed as a waiver of any right which my ".$exec_title_sm." has,
		  by law or otherwise, to claim reimbursement for any such taxes which become payable on account of property, if any, over which I have a power of appointment.
	<br><br></p>";



  if($will_data->is_have_minar_child == 1) {


$html .= '<h1 style="text-align:center; font-family: times, serif;" >'.$heading++.'.	GUARDIANSHIP </h1>
	';
  $i = 1;
  foreach($family_data3 as $family_data3 ) {
    if($family_data3->is_minar == 1){
    $html .= '
  	<p style="font-size:12; text-indent:40px; font-family: times, serif;">
  		'.$i++.') I appoint and nominate  '.$family_data3->guardian_name_title.' '.$family_data3->guardian_name.', Age - '.$family_data3->guardian_age.', presently Residing at '.$family_data3->guardian_address.', to be the guardian of my '.$family_data3->relationship.' – '.$family_data3->family_person_name.', until he attains 18 years of age only.';
      if($family_data3->opt_guardian_name != ''){
          $html .= ' If his mother '.$family_data3->mother_of_minar.', cannot take care of '.$family_data3->family_person_name.' either on account of personal, health, financial, or other reasons, so long as said guardian remains a Muslim of sound mind and judgment. In the event he shall be unwilling or unable to act as guardian. In the event he shall be unwilling or unable to act as guardian, I nominate and appoint '.$family_data3->opt_guardian_name.' residing in
  		    '.$family_data3->opt_guardian_address.', to be the guardian.';
          $guardian_con = 'persons who are guardians';
      }
      else{
        $guardian_con = 'person who is guardian';
      }
  	  $html .= '</p>';
    }
  }

	$html .= '<p style="font-size:12; text-indent:40px; font-family: times, serif;">
	In such case, I urge that all my minor children be raised to be practicing Sunni Muslims and not in any way be indoctrinated into any other
	 faith, religion, or sect of Islam. I direct that no bond be required of any personal guardian. Any property or other inheritance that this
	  Will gives to any of my minor children shall be administered by their guardian in their best interest.
    <br><br> The '.$guardian_con.' named herein, only if the mother of my siblings is unable or unwilling to keep my siblings, will receive and is free to spend all funds due to my siblings on my siblings and whatever is left from their share, should be deposited into a bank for the siblings as and when they reach 18 years of age. It is my express desire, that any such funds deposited in the bank for my siblings should be spent for either education or investment purposes and not for day-to-day expenses.
	<br><br></p>
  ';
}
$html .= '<p style="font-size:12; font-family: times, serif;"></p>
		<h1 style="text-align:center; font-family: times, serif;" > '.$heading++.'. DESCRIPTION OF PROPERTY / ASSETS </h1>';

//$html .= '<h1 style="text-align:center; font-family: times, serif;" > My assets and properties – </h1>';
$assets_title = '1';
if($real_estate){
  $html .= '<h1 style=" font-family: times, serif;" >'.$assets_title++.'. &nbsp;&nbsp;&nbsp;&nbsp;Real Estate  -  </h1>';

  $html .= '<p style="font-size:12; text-indent:40px; font-family: times, serif;" >I own and possess and I am absolutely entitled to the following immovable property/properties</p>';
}
$assets_real_title = 'a';
foreach($real_estate as $real_estate ) {

    $html .= '<p style="font-size:12; font-family: times, serif;" > '.$assets_real_title.'. &nbsp;&nbsp;&nbsp;&nbsp;Whereas I am the owner of '. $real_estate->estate_type .' no. '. $real_estate->house_no .' having property bearing '. $real_estate->survey_number_type.' '. $real_estate->survey_number.' measuring about '.$real_estate->measurment_area.' '.$real_estate->measurment_unit .'
    	located at '. $real_estate->estate_address .', '. $real_estate->estate_city .', State – '. $real_estate->estate_state .', Pin code - '. $real_estate->estate_pin .'&nbsp;'. $real_estate->estate_country .'.
    <br></p>';
    $assets_real_title++;
}

if($bank_assets){$html .= '<p><br></p><h1 style="font-family: times, serif;" >'.$assets_title++.'. &nbsp;&nbsp;&nbsp;&nbsp;Bank Assets – </h1>';}
$savings = 0;
$current = 0;
$Fixed = 0;
$PPF = 0;
$Locker = 0;
$Mutual_Funds = 0;
$Stock = 0;
$Insurance = 0;
$account_type_list='a';
foreach($bank_assets as $bank_assets ) {
	if($bank_assets->assets_type == 'Savings A/c'){
    $savings++;
    if($savings == 1){
      $html .= '<span style="font-size:14; font-family: times, serif;" ><b>'.$account_type_list.'. &nbsp;&nbsp;&nbsp;&nbsp;Saving Accounts &nbsp;– </b></span>';
      $account_type_list++;
    }
		$html .= '<p style="font-size:12; font-family: times, serif; ">'.$savings.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bank balance of my savings A/c. No.'. $bank_assets->account_number .' with '. $bank_assets->bank_name .' , Branch – '. $bank_assets->branch_name .' State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'.</p>';
	}
	elseif($bank_assets->assets_type == 'Current A/C'){
    $current++;
    if($current == 1){
      $html .= '<span style="font-size:14; font-family: times, serif; " ><b>'.$account_type_list.'. &nbsp;&nbsp;&nbsp;&nbsp;Current Account &nbsp;– </b></span>';
      $account_type_list++;
    }
		$html .= '<p style="font-size:12;  font-family: times, serif;" >'.$current.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bank balance of my current A/c. No.'. $bank_assets->account_number .' with '. $bank_assets->bank_name .' , Branch - '. $bank_assets->branch_name .' State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'.<br><br></p>';
	}
	elseif($bank_assets->assets_type == 'Fixed Deposits'){
    $Fixed++;
    if($Fixed == 1){
      $html .= '<span style="font-size:14; font-family: times, serif;" ><b>'.$account_type_list.'. &nbsp;&nbsp;&nbsp;&nbsp;Fixed Deposits &nbsp;–</b></span>';
      $account_type_list++;
    }
		$html .= '
		<p style="font-size:12;  font-family: times, serif;" >'.$Fixed.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My bank fixed deposits with customer ID no. '. $bank_assets->account_number .' with '. $bank_assets->bank_name .' , Branch - '. $bank_assets->branch_name .' vide F.D. receipt no. '. $bank_assets->fd_recipt_No .'  State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'.<br></p>
    ';
	}

	elseif($bank_assets->assets_type == 'PPF'){
    $PPF++;
    if($PPF == 1){
      $html .= '<span style="font-size:14; font-family: times, serif;" ><b> '.$account_type_list.'. &nbsp;&nbsp;&nbsp;&nbsp;Public Provident Fund &nbsp;– </b></span>';
      $account_type_list++;
    }
		$html .= '<p style="font-size:12;  font-family: times, serif;" >'.$PPF.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My PPF account having no. '. $bank_assets->account_number .' with '. $bank_assets->bank_name .' , Branch - '. $bank_assets->branch_name . ' State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'<br></p>
    ';
	}

	elseif($bank_assets->assets_type == 'Bank Locker'){
    $Locker++;
    if($Locker == 1){
      $html .= '<span style="font-size:14; font-family: times, serif;" ><b>'.$account_type_list.'. &nbsp;&nbsp;&nbsp;&nbsp;Bank Locker &nbsp;–</b></span>';
      $account_type_list++;
    }
		$html .= '<p style="font-size:12;  font-family: times, serif;" >'.$Locker.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The contents of bank locker no.'. $bank_assets->account_number .' with key no. '. $bank_assets->key_number .' with '. $bank_assets->bank_name .' , branch – '. $bank_assets->branch_name .' ,  State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'<br></p>
    ';
	}

	elseif($bank_assets->assets_type == 'Mutual Funds'){
    $Mutual_Funds++;
    if($Mutual_Funds){
      $html .= '<span style="font-size:14; font-family: times, serif;" ><b>'.$account_type_list.'. &nbsp;&nbsp;&nbsp;&nbsp;Mutual Funds &nbsp;–</b></span>';
      $account_type_list++;
    }
		$html .= '<p style="font-size:12;  font-family: times, serif;" >'.$Mutual_Funds.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My mutual fund investments with folio numbers '. $bank_assets->account_number .' with '. $bank_assets->bank_name .'<br></p>
    ';
	}

	elseif($bank_assets->assets_type == 'Stock Equities'){
    $Stock++;
    if($Stock == 1){
      $html .= '<span style="font-size:14; font-family: times, serif;" ><b>'.$account_type_list.'. &nbsp;&nbsp;&nbsp;&nbsp;Shares &nbsp;–</b></span>';
      $account_type_list++;
    }
		$html .= '<p style="font-size:12;  font-family: times, serif;" >'.$Stock.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My shares in '. $bank_assets->bank_name .' with account no. '. $bank_assets->account_number .'<br></p>
    ';
	}

	elseif($bank_assets->assets_type == 'Insurance Policy'){
    $Insurance++;
    if($Insurance == 1){
      $html .= '<span style="font-size:14; font-family: times, serif;" ><b>'.$account_type_list.'. &nbsp;&nbsp;&nbsp;&nbsp;Insurance policies &nbsp;– </span>';
      $account_type_list++;
    }
		$html .= '<p style="font-size:12;  font-family: times, serif;" >'.$Insurance.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My insurance policy '. $bank_assets->account_number .' from '. $bank_assets->bank_name .'  branch – '. $bank_assets->branch_name .'  for sum assurance of Rs. '. $bank_assets->assurance_amount .'/-.
		<br></p>';
	}
}

$j = 'a';
foreach($vehicle as $vehicle ){
  if($j == 'a'){
    $html .= '<h1 style=" font-family: times, serif;" >'.$assets_title++.'. &nbsp;&nbsp;&nbsp;&nbsp;Vehicles</h1>';
  }
		$html .= '<p style="font-size:12; font-family: times, serif;" >'.$j.'. &nbsp;&nbsp;&nbsp;&nbsp;My vehicle with registration no '. $vehicle->registration_number .'. make year '. $vehicle->vehicle_make_year .', vehicle company '. $vehicle->vehicle_company .' and model name '. $vehicle->vehicle_model .' .
		<br></p>';
  $j++;
}

$k = 0;
$Jewellery = 0;
$Remained_Assets = 0;
foreach($other_gift as $other_gift ) {
  $k++;
  if($k == 1){
    $html .= '<p><br></p><h1 style="font-family: times, serif;" >'.$assets_title++.'. &nbsp;&nbsp;&nbsp;&nbsp;Other gifts - </h1>';
  }
	if($other_gift->gift_type == 'Jewellery and Valuables'){
    $Jewellery++;
    if($Jewellery == 1){
      $html .= '<span style="font-size:14; font-family: times, serif;" ><b> &nbsp;&nbsp;&nbsp;&nbsp;Jewelry and Ornaments</span><br><br>';
    }
		$html .= '<span style="font-size:12; font-family: times, serif;" >'.$Jewellery.'. &nbsp;&nbsp;&nbsp;&nbsp;All the jewelry and ornaments '. $other_gift->gift_description .' .
		</span>';
	}
	elseif($other_gift->gift_type == 'Remained Assets'){
    $Remained_Assets++;
    if($Remained_Assets == 1){
      $html .= '<h1 style="font-size:14; font-family: times, serif;" > &nbsp;&nbsp;&nbsp;&nbsp;Remained assets - </h1>';
    }
		$html .= '<p style="font-size:12; font-family: times, serif;" >'.$Remained_Assets.'. &nbsp;&nbsp;&nbsp;&nbsp;'. $other_gift->gift_description .'
		</p>
		';
	}
}

if($personal_data->marital_status == 0){
	$html .= '
  <p><br><br></p>
  <h1 style="text-align:center; font-family: times, serif;" >'.$heading++.'. DISTRIBUTION OF THE REMINDER OF MY ESTATE</h1>
  	<p style="font-size:12;  font-family: times, serif;" >
      a. &nbsp;&nbsp;&nbsp;&nbsp;I direct, devise and bequest all the residue and remainder of my estate after making provision for payment of
    	my obligations and distributions provided above to only my Muslim heirs whose relation to me, whether ascending or descending,
    	has occurred through Islamic or lawful marriage at each and every point. The distribution of the residue and remainder of my estate shall
    	be made strictly in accordance with.<br><br>
    </p>
	';
}

$html .= '
  <style>
    table {
      border-collapse: collapse;
    }
    table, td, th {
      border: 1px solid black;
      text-align:center;

    }
</style>
    <table>
    <tr>
    <td>
    
    <span style="text-align:center; font-family: times, serif; font-size:16;"><br><b>SCHEDULE A – MAWARITH (INHERITANCE)</b></span><br>
    <span style="text-align:center; font-family: times, serif; font-size:12;">This schedule A is signed by me as a part of this Islamic Last Will and Testament.</span><br>

    </td>
    </tr>
    </table>
    
  <p style="font-size:12;  font-family: times, serif;" >
    b. &nbsp;&nbsp;&nbsp;&nbsp;I direct that no part of the residue and remainder of my estate shall be inherited by any non-Muslim relative,
    whether he/she is a kin or an in-law, spouse, parent or child. I further direct or ordain that any non-Muslim relative be disregarded and
     disqualified in the application of the named schedule.
  </p>

 <p style="font-size:12; font-family: times, serif;">
    c. &nbsp;&nbsp;&nbsp;&nbsp;I direct that no part of my estate shall be given to relatives whose relationship to me, ascending or descending has
	   occurred through non-Islamic and unlawful marriage or through adoption.
 </p>

 <h1 style="font-size:14; text-align:left; font-family: times, serif; " >d. Distribution of 1/3 Share</h1>
 <h1 style="font-size:14; text-align:left; font-family: times, serif; line-height:14px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- According to Mohammedan law</h1>
 <h1 style="font-size:14; text-align:left; font-family: times, serif; line-height:14px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-	The 1/3 rule Hadith: Sa`ad ibn Abi Waqqas said:</h1>
 <p style="font-size:12; text-indent:40px; font-family: times, serif;"> The Prophet came to visit me in my sickness I said to the Prophet, “O Prophet! I am wealthy and my only heir is my daughter.
 Permit me that I make a will of my entire property.” He said, “No”. I said, “Should I make a will of two-thirds of my property?”
 He said, “No”. I said, “Permit me for a third.” The Prophet replied, “You may make a will of a third, although this is also too
 much. To leave after you your heirs well to do is better than you leave them poor and in want whilst others meet their needs.”</p>

 <p style="font-size:12; text-indent:40px; font-family: times, serif;">Accordingly I ordain that my '.$exec_title_sm.' shall asses all assets and out of which he/she shall pass my 1/3 assets share of remained estate shall go strictly to the person mentioned herein.<br><br>
I would give my 1/3 share to - <br><br>';
$share_number=0;
foreach($share as $share2 ) {
  $share_number++;
  if($share_number > 1){ $share_number3 = 'multi'; }
  else{ $share_number3 = 'single';}
}
$share_number2 = 1;
foreach($share as $share ) {
  if( $share_number3 == 'multi'){ $sh_num = $share_number2++.'. '; }
  else{ $sh_num = '';}
  $relation = $share->share_relation;
  if($relation == 'Organization'){
    $html .=''.$sh_num.''.$share->share_relation.' '.$share->share_name.', Address: '.$share->share_address.' - percentage of share '.$share->share_percentage.'% <br><br>';
  }
  elseif ($relation == 'Other') {
    $html .=''.$sh_num.''.$share->share_name.', age '.$share->share_age.' presently Residing at '.$share->share_address.' - percentage of share '.$share->share_percentage.'% <br><br>';
  }
  else{
    $html .=''.$sh_num.'My '.$share->share_relation.' '.$share->share_name.' age '.$share->share_age.' presently Residing at '.$share->share_address.' - percentage of share '.$share->share_percentage.'% <br><br>';
  }
}
$html .='Also it is my wish that all my legal heirs/legatees should support to the '.$exec_title_sm.' for execution of this Will with their full co-operation without any hindrance.
<br><br></p>

<h1 style="text-align:center; font-family: times, serif;" >'.$heading++.'. Announcement</h1>
<p style="font-size:12; font-family: times, serif;">a. If I die as a result of murder, I direct that the adjured murderer, principal or accessory in the murder shall be disqualified to receive any part of my estate. </p>
<p style="font-size:12; font-family: times, serif;" >b. I direct that no part of my estate shall be given to relatives whose relationship to me, ascending or descending, has occurred through non-Islamic and unlawful marriage, or through adoption</p>
<p style="font-size:12; font-family: times, serif;" >c. I direct that no part of the residue and remainder of my estate shall be inherited by any non-Muslim relative, whether he/she is a kin or in-law, spouse, parent or child. I further direct and ordain
 that a non-Muslim relative be disregarded and disqualified.</p>
 <p style="font-size:12; font-family: times, serif;" >d. I direct that no part of my estate shall be given to relatives whose relationship to me, ascending or descending, has occurred through non-Islamic and unlawful marriage, or through adoption.<br><br></p>

 <h1 style="text-align:center; font-family: times, serif;" >'.$heading++.'. SEPARABILITY</h1>';
$will_date = $will_data->will_date;
$day = date('d', strtotime($will_date));
$month = date('F', strtotime($will_date));
$year = date('Y', strtotime($will_date));

 $html .= '
 <p style="font-size:12; text-indent:40px; font-family: times, serif;">
    In case  one or more of the provisions contained in this/ any part of this Last and Final Will and Testament is determined invalid by a court of competent jurisdiction I direct and ordain that other remaining provisions
    shall remain valid and enforceable and effective.
 </p>
 <p style="font-size:12; text-indent:40px; font-family: times, serif;" >
    I subscribe my name to this Will this day '.$day.' of '.$month.', '.$year.' and do hereby declare that I sign and execute this instrument as my last Will and that I sign it willingly, that I execute it as my
    free and voluntary act for the purposes therein expressed, and that I am of age or otherwise legally empowered to make a Will, under no constraint or undue influence
 </p>
 <p style="font-size:12; font-family: times, serif;">This is my last and final will and Testament,, which I have laid out.</p>';

 $html .= '
 <p style="font-size:12; font-family: times, serif;">PLACE: '.$will_data->will_place.'</p>
 <p style="font-size:12; font-family: times, serif;">Dated: '.$will_data->date.' <br><br></p>
 <h1 style="text-align:center; font-family: times, serif;" >'.$heading++.'.  TESTATOR’S SIGNATURE </h1>
 <p style="font-size:12; font-family: times, serif;" >
 	In witness whereof, I have hereunto set my hand and seal on this '.$day.' day of '.$month.', '.$year.'.
 </p>

 <p style=" font-size:12; text-align:right; font-family: times, serif; line-height:25px;" >
 ______________________ <br>
 Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><br></p>';

$testator_gender = $personal_data->gender;
if($testator_gender == 'Male')
{ $his_her = 'his'; $he_she = 'he'; $him_her = 'him'; }
else{ $his_her = 'her';  $he_she = 'she'; $him_her = 'her'; }
$html .= '<h1 style="text-align:center; font-family: times, serif;" >'.$heading++.'.  WITNESSES</h1>
<p style="font-size:12; font-family: times, serif;" >
 We hereby certify that the foregoing instrument was on the date thereof, signed, Published, and declared by
 the Testator '.$personal_data->name_title.' '.$personal_data->full_name.', as and for '.$his_her.' Islamic Last Will and Testament, in our presence, who at
 '.$his_her.' request and in '.$his_her.' Presence, and in the presence of each other, have hereunto subscribed our names as
 Witnesses thereto, believing said Testator at the time of the signing to be of sound mind and memory.

</p>
<h1 style="text-align:left; font-family: times, serif;" >  Witnesses: </h1>
';
$i=0 ;
foreach($witness as $witness ) {
	$i++;
		$html .= '<p style="font-size:12; font-family: times, serif; margin-left:40px;">'.$i.'. &nbsp; Sign________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name: &nbsp;' .$witness->witness_name.'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address:&nbsp; '.$witness->witness_address.'<br></p>';
}

// $pdf->lastPage();

$pdf->writeHTML($html, true, 0, true, 0);

//Checklist...
$pdf->addPage();
$html2 = '<h1 style="text-align:center; font-family: times, serif;" ><u>Checklist</u></h1>';

$html2 .= '<!--p style="font-size:12; text-align:left; font-family: times, serif;" ><u><b>After downloading of will-</b></u></p-->';
$html2 .= '<p style="font-size:12; text-align:left; font-family: times, serif;" >
  - Register/Notarize the document. (Not Mandatory)<br><br>
  - Get your Document signed by two mentioned witnesses and get Doctors Certificate of Fitness. (Testator)<br><br>
  - Two Photographs. (For notary)<br><br>
  - Aadhar card of Testator.<br>
</p>';
$pdf->writeHTML($html2, true, 0, true, 0);

//Checklist...
$pdf->addPage();
$html3 = '<h1 style="text-align:center; font-family: times, serif;" ><u>Fitness Certificate</u></h1>';

$html3 .= '<p style="font-size:12; text-indent:40px; text-align:left; font-family: times, serif;" >
  This is to certify that I have examined within signed Name
  '.$personal_data->name_title.' '.$personal_data->full_name.' on the date of this will and is found to be conscious, well
  oriented in time and space also '.$he_she.' is absolutely normal as regards
  cognition, emotions and intellect. I found '.$him_her.' in normal position of
  '.$his_her.' mental faculties at the time of examination.
</p>';
$html3 .= '<p style="font-size:12; text-align:left; font-family: times, serif;" >
  Date -  &nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;/<br>
  Place - <br>
</p>
<p style="font-size:12; text-align:right; font-family: times, serif;" >
  Signature and stamp
</p>
';
$pdf->writeHTML($html3, true, 0, true, 0);
//$pdf->Image('application\img\logo.png', 90, 100, 60, 60, '', '', '', true, 72);
//Close and output PDF document
$pdf->Output('Islamic_will.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
