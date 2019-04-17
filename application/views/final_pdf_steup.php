<?php
//============================================================+
// File name   : example_049.php
// Begin       : 2009-04-03
// Last Update : 2014-12-10
//
// Description : Example 049 for TCPDF class
//               WriteHTML with TCPDF callback functions
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
 * @abstract TCPDF - Example: WriteHTML with TCPDF callback functions
 * @author Nicola Asuni
 * @since 2008-03-04
 */



 // Extend the TCPDF class to create custom Header and Footer
 class MYPDF extends TCPDF {

 	//Page header
 	public function Header() {
		$this->RoundedRect(05, 05, 200, 290, 0, '1000');
 		// Logo
 		// $image_file = K_PATH_IMAGES.'logo_example.jpg';
 		// $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
 		// // Set font
 		// $this->SetFont('helvetica', 'B', 20);
 		// // Title
 		// $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
 $pdf->SetAuthor('Nicola Asuni');
 $pdf->SetTitle('TCPDF Example 003');
 $pdf->SetSubject('TCPDF Tutorial');
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

// //page  start border
// $pdf->RoundedRect(05, 05, 200, 290, 6.50, '1000');
// //page end border


// add a page
$pdf->AddPage();
//page  start border
$pdf->RoundedRect(05, 05, 200, 290, 00, '1000', ' ', array(400, 400, 400));
//page end border

$html = '<br><br><br><br><br><br><br> <h1 style="text-align:center; font-family: times, serif; " > In the Name of Allah the Most Gracious, the most Merciful
ISLAMIC LAST Will and Testament</h1>
';

$pdf->Image('application\img\title.png', 10, 150, 190, 50, '', '', '', 72);

//$pdf->Image('application\img\logo.png', 50, 225, 100, 30, '', '', '', true, 52);
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);
// add a page
$pdf->AddPage();



/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
 foreach ($personal_data as $personal_data) {
 //	$pdf->Write(0, 'Image Clipping using geometric functions'.$data->full_name, '', 0, 'C', 1, 0, false, false, 0);
 //$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');

}



//page  start border
$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');
//page end border
$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');$pdf->RoundedRect(05, 05, 200, 290, 00, '1000');
$html ='<style>
							p{
								text-align: justify;
							}
				</style>
';

$html .= '<br><h1 style="text-align:center; font-family: times, serif;"> ISLAMIC LAST Will and Testament</h1>
<br><br>
<h2 style="text-align:center; font-family: times, serif;" >of........................................</h2>

<p style="font-size:12; font-family: times, serif; text-align: justify; ">I Miss/Mr./Mrs'.$personal_data->full_name.' a Muslim, presently resident of
'.$personal_data->address.', Age - ..........., Occupation – '.$personal_data->occupation.', having my
Aadhar No. '.$personal_data->aadhar_no.' being sound mind and memory declare that the following is my
Islamic last Will and Testament (wasiyyat).</p>

<p style="font-size:12; font-family: times, serif; text-align: justify; ">WHEREAS I do hereby make, publish and declare this is to be my last will and
testament revoking all wills and codicils and testamentary dispositions at any time heretofore made by me.</p>

<p style="font-size:12; font-family: times, serif;">AND WHEREAS I am maintaining good health and I am of sound mind. This will is made by me of my own independent
 decision, my free mind and volition and in sound health without any persuasion, influence or coercion and out of my independent decision only. </p>

<p style="font-size:12; font-family: times, serif;">AND WHEREAS I fully understand what is right and wrong, I wish to make necessary and proper arrangements in
respect of enjoyment
 and distribution of my assets and properties after my life time. So that unnecessary y misunderstanding and consequential wasteful
  litigation or unpleasantness between the members of my family may be avoided. </p>



<h2 style="text-align:center; font-family: times, serif;">A. PREAMBLE</h2>

<h2 style="text-align:center; font-family: times, serif;">THE SHAHDAH – TESTIMONY OF FAITH</h2>

<h2 style="text-align:center; font-family: times, serif;">Ash-hadu ann la ilaha illallahu, waash-hadu anna Muhammadan abduhu WaRasulullah</h2>

<p style="font-size:12; font-family: times, serif;">I bear witness that there is no deity but Allah, the One, the Merciful,
the Almighty Creator of the heavens and the earth and I put my trust entirely in Him. I beg for His Help
and His Forgiveness. I seek refuge in Allah from Shaitan and the evils of the world and the evils of my deeds. I ask Him
to Guide me, those whom Allah Guides no one can mislead, and those whom Allah leaves to stray, no one can guide. I testify
that there is no deity except Allah, He is one and has no partners, and I testify that Mohammad is Allah’s last Messenger
(Peace and Blessings of Allah be on him).  I bear witness that Allah’s promises are true and we will certainty meet with Him,
Paradise is true, the Day of Judgement is coming without any doubt, and Allah (exalted be He) will surely resurrect those in the graves. </p><br><br>

<h2 style="text-align:center; font-family: times, serif;" >B. REVOCATION</h2>
<p style="font-size:12; font-family: times, serif;">
	I do hereby revoke any and all former wills and codicils that I have previously made. I ask all my relatives,
	friends, and others, whether they be Muslims or non-Muslims, to honour my right to be a Muslim. I ask them to honour
	the spirit and letter of this document and not to try to obstruct or change it in any way. I ordain that under no circumstances
	should the contents of this will be changed voluntarily.
</p>

<p style="font-size:12; font-family: times, serif;">
	I request all of my immediate relatives and any others involved in the procedures surrounding my death and burial, whether they be
	Muslims or non-Muslims, to honor my human and Constitutional right and choice to be a Muslim. I ask them to also honor the spirit as well as
	letter of this document and to not obstruct or change it in any way. Let them see to it that I am buried as a Muslim, and my property divided and
 disperse as I ordered, according to the Sunni Muslim Islamic Law (hereafter referred to Shariah). Under no circumstances does anyone have the
 authority to change the contents of this Will.
</p>
<h2 style="text-align:center; font-family: times, serif;" >C.	FAMILY  DETAILS</h2>

<p style="font-size:12; font-family: times, serif;">
My family consists of:<br>';
foreach($family_data as $family_data ) {
    $html .= ' My '. $family_data->relationship . '&nbsp;&nbsp;&nbsp; (name) &nbsp;&nbsp;'.$family_data->family_person_name.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$family_data->family_person_dob.'<br>'

		;
}


$html .= '

</p>

<h2 style="text-align:center; font-family: times, serif;" >D. EXECUTOR </h2>';
$i = 0;
foreach($excutor_data as $excutor_data ) {
	$i++;
	if($i == 1){
		$html .= '<p style="font-size:12; font-family: times, serif;">
	1.	I '.$i.' hereby nominate and appoint, namely Miss/Mr./Mrs'.$excutor_data->executor_name.' presently residing
	at &nbsp;'.$excutor_data->executor_address.', age &nbsp;'.$excutor_data->executor_age.', to be the executor/s of my Last Will and Testament.
</p>';
	}
	elseif($i == 2){
		$html .= '
		<p style="font-size:12; font-family: times, serif;">
			2.	In the event that he/she will be unwilling or unable to act as executor, I nominate and appoint,
			namely Miss/Mr./Mrs &nbsp;'.$excutor_data->executor_name.'&nbsp; residing at &nbsp;'.$excutor_data->executor_address.'&nbsp;age &nbsp;'.$excutor_data->executor_age.',&nbsp;to be executor of this,
			 my Last Will and Testament. I direct no bond or surety for any bond be required for my executor in the performance of his/her duties.
		</p>
		';
	}
	//$html .= ' '
	//;
}

$html .= '



<p style="font-size:12; font-family: times, serif;"> a)	 I give my executor herein named power to settle any claim for or against my estate and power to sell any property, real, personal, or mixed,
 in which I have an interest, without court order and without bond. I direct no bond or surety for any bond be required for my executor in
  the performance of his/her duties.</p>

	<p style="font-size:12; font-family: times, serif;">b)	I hereby grant to the Executors of my Estate all such powers as allowed by Law, especially the power of assumption.
		</p>
		<p style="font-size:12; font-family: times, serif;">
c)	I hereby direct that the Executors and Administrators of my Estate proceed with the distribution of my Estate in the following order of priority
 as commanded by Islamic Law of Succession:
</p>

<p style="font-size:12; font-family: times, serif;">
	d)	I hereby direct that the Executors and Administrators of my Estate proceed with the distribution of my Estate in the following order of
	priority as commanded by Islamic Law of Succession:
</p>

<p style="font-size:12; font-family: times, serif;">
I.	Payment of my funeral expenses.<br>
II.	Payment of all my debts. <br>
III.	Payment of the Wasiyyah (Islamic Bequest).<br>
IV.	Distribution of the residue of my Estate to my Islamic heirs in accordance with the Islamic Law of Succession.<br>

</p>
<p style="font-size:12; font-family: times, serif;" >e)	The executor is to pay such religious taxes {like khums(Khums is paid on the surplus to annual expenses of a person, i.e.
	one has to pay one-fifth of what has remained from his income after subtracting his own expenses ) and kaffarah(religious donation of
	money or food made to help those in need)}  and other expenses for hiring people to do qaza prayers and fasts;</p>

<h1 style="text-align:center; font-family: times, serif;" >D.	FUNERAL AND BURIAL RIGHTS </h2>

<p style="font-size:12; font-family: times, serif;">I direct my executor surviving relatives and friends to ensure that i have a funeral strictly in accordance with Islamic law. That must include Ghusl
 (washing), Janaza (funeral prayer) and Dafn (burial). In particular i do not wish for an autopsy to be performed on my body and request that my body be
  released for burial immediately upon death or as soon as practical. </p>

	<p style="font-size:12; font-family: times, serif;">
		I ordain that absolutely no non-Islamic religious service or observance shall be conducted upon my death or on my body. I ordain that my grave
		shall be dug deep into the ground in complete accordance with the specifications of Islamic practice and that it face the direction of Qiblah
		(the Direction of the city of Mecca in the Arabian Peninsula, towards which Muslims face for prayer).
	</p>

	<h1 style="text-align:center; font-family: times, serif;" >F.  DEBTS AND EXPENSES	</h1>
	<p style="font-size:12; font-family: times, serif;">
		I direct that my executor apply first, the assets of my estate to the payment of all my legal debts - including such expenses incurred by my
		last illness and burial as well as the expenses of administrating my estate. I direct the said executor to pay any "obligations to Allah" (Huquq Allah) which are binding on me, such as unpaid Zakah, Kaffarat, or unperformed pilgrimage (Hajj).
	</p>

	<p style="font-size:12; font-family: times, serif;">
		 I direct that all inheritance, state, and succession taxes (including interest and other penalties thereon) payable by reason of my death shall be paid out of and be charged generally against the principal of my
		 residuary estate (Any portion of the testator &apos s estate that is not specifically devised to someone in the will), without reimbursement from any person; except that this provision shall not be construed as a waiver of any right which my executor has,
		  by law or otherwise, to claim reimbursement for any such taxes which become payable on account of property, if any, over which I have a power of appointment.
	</p>

	<h1 style="text-align:center; font-family: times, serif;" >G.	GUARDIANSHIP </h1>
	<p style="font-size:12; font-family: times, serif;">
	I appoint Miss/Mr./Mrs' . $family_data->guardian_name .'&nbsp;of&nbsp;' . $family_data->guardian_address .'&nbsp;to be the Guardian/s of my children who are under the age of eighteen (18) at the time of my
	death with the view to take care of their education, health, and fulfill their/his/her all other necessary requirements with the passage of time.
	<p>

	<p style="font-size:12; font-family: times, serif;">
		i) Therefore i appoint.........................................................., residing at.............................................., to be the guardian of my son– NAME OF SON,, until he son attains 18 years of age only,
		and if his mother, NAME OF MOTHER, cannot take care of NAME OF SON either on account of personal, health, financial, or other reasons, , so long as said guardian remains a Muslim of sound mind and judgment. In the event he shall
		be unwilling or unable to act as guardian. In the event he shall be unwilling or unable to act as guardian, I nominate and appoint ....................................................residing in ..................................
		......................, to be the guardian.
	</p>

	<p style="font-size:12; font-family: times, serif;">
		ii) 	Therefore i appoint and nominate.................................................., residing at Add .........................................
		.....,  to be the guardian of my daughter NAME OF DAUGHTER, until she attains 18 years of age only  if her mother, NAME OF MOTHER (can cannot take
		care of NAME OF DAUGHTER either on account of personal, health, financial, or other reasons, , so long as said guardian remains a Muslim of sound
		 mind and judgment. In the event has shall be unwilling or unable to act as guardian, I nominate and appoint .......................................
		 .............residing in ........................................................, to be the guardian.
	</p>

	<p style="font-size:12; font-family: times, serif;">
	In such case, I urge that all my minor children be raised to be practicing Sunni Muslims and not in any way be indoctrinated into any other
	 faith, religion, or sect of Islam. I direct that no bond be required of any personal guardian. Any property or other inheritance that this
	  Will gives to any of my minor children shall be administered by their guardian in their best interest.
	</p>
  	<p style="font-size:12; font-family: times, serif;"></p>
		<h1 style="text-align:center; font-family: times, serif;" > H.DESCRIPTION OF PROPERTY </h1>
  <h2 style="font-family: times, serif;" > 1 )	Real Estate </h2> ';

	foreach($real_estate as $real_estate ) {
	    $html .= ' '

			;
	}


	$html .= '


<h1 style="text-align:center; font-family: times, serif;" > My assets and properties – </h1>

<h1 style=" font-family: times, serif;" >A. 	Immovable Property -  </h1>
<p style="font-size:12; font-family: times, serif;" >
	Whereas I am the owner of '. $real_estate->estate_type .' no. '. $real_estate->house_no .' having property bearing C.S. no.'. $real_estate->survey_number .' measuring about '. $real_estate->measurment_area . $real_estate->measurment_unit .' of Second floor,
	located at '. $real_estate->estate_address .', '. $real_estate->estate_city .', State – '. $real_estate->estate_state .', Pin code - '. $real_estate->estate_pin .'&nbsp;'. $real_estate->estate_country .'.
</p>

<h1 style="font-family: times, serif;" > Bank Assets – </h1>

' ;

foreach($bank_assets as $bank_assets ) {
	if($bank_assets->assets_type == 'Savings A/c'){
		$html .= '<h1 style=" font-family: times, serif;" >1. Savings in Bank Accounts   </h1>
		<p style="font-size:12; font-family: times, serif;" >
			Bank balance of my savings A/c. No.'. $bank_assets->account_number .' with '. $bank_assets->bank_name .' , Branch – '. $bank_assets->branch_name .' State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'.
		</p>
';
	}
	elseif($bank_assets->assets_type == 'Current  A/C'){
		$html .= '
		<h1 style=" font-family: times, serif;" >Current Account - </h1>
		<p style="font-size:12; font-family: times, serif;" >
			Bank balance of my current A/c. No.'. $bank_assets->account_number .' with '. $bank_assets->bank_name .' , Branch - '. $bank_assets->branch_name .' State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'.
		</p>
		';
	}

	elseif($bank_assets->assets_type == 'Fixed Deposits'){
		$html .= '
		<h1 style=" font-family: times, serif;" >Fixed Deposits - </h1>
		<p style="font-size:12; font-family: times, serif;" >
			My bank fixed deposits with customer ID no. '. $bank_assets->account_number .' with '. $bank_assets->bank_name .' , Branch - '. $bank_assets->branch_name .' vide F.D. receipt no. '. $bank_assets->fd_recipt_No .' State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'.
		</p>
		';
	}

	elseif($bank_assets->assets_type == 'PPF'){
		$html .= '
		<h1 style=" font-family: times, serif;" >Public Provident Fund –</h1>
		<p style="font-size:12; font-family: times, serif;" >
			My PPF account having no. '. $bank_assets->account_number .' with '. $bank_assets->bank_name .' , located at --------------------------, Branch - '. $bank_assets->branch_name .' , State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'
		</p>
		';
	}

	elseif($bank_assets->assets_type == 'Bank Locker'){
		$html .= '
		<h1 style=" font-family: times, serif;" >Bank Locker – </h1>
		<p style="font-size:12; font-family: times, serif;" >
			The contents of bank locker no.'. $bank_assets->account_number .' with key no. '. $bank_assets->key_number .' with '. $bank_assets->bank_name .' , branch – '. $bank_assets->branch_name .' , State – '. $bank_assets->state .', Pin code - '. $bank_assets->pin_code .'
		</p>
		';
	}

	elseif($bank_assets->assets_type == 'Mutual Funds'){
		$html .= '
		<h1 style=" font-family: times, serif;" >Mutual Funds –  </h1>
		<p style="font-size:12; font-family: times, serif;" >
			My mutual fund investments with folio numbers '. $bank_assets->account_number .' with '. $bank_assets->bank_name .' .
		</p>
		';
	}

	elseif($bank_assets->assets_type == 'Stock Equities'){
		$html .= '
		<h1 style=" font-family: times, serif;" >Shares –  </h1>
		<p style="font-size:12; font-family: times, serif;" >
			My shares in '. $bank_assets->bank_name .' with account no. '. $bank_assets->account_number .' .
		</p>
		';
	}

	elseif($bank_assets->assets_type == 'Insurance Policy'){
		$html .= '
		<h1 style=" font-family: times, serif;" >Insurance policies -  </h1>
		<p style="font-size:12; font-family: times, serif;" >
			My insurance policy '. $bank_assets->account_number .' from '. $bank_assets->bank_name .'  branch – '. $bank_assets->branch_name .'  for sum assurance of Rs. '. $bank_assets->i_rs .'/-.
		</p>
		';
	}

}


$html .= '


<h1 style=" font-family: times, serif;" >Vehicles –  </h1>';

foreach($vehicle as $vehicle ) {
		$html .= '
		<p style="font-size:12; font-family: times, serif;" >
			My vehicle with registration no '. $vehicle->registration_number .'. make year '. $vehicle->vehicle_make_year .', vehicle company '. $vehicle->vehicle_company .' and model name '. $vehicle->vehicle_model .' .
		</p>'

		;
}


$html .= '

<h1 style="text-align:center; font-family: times, serif;" >Others gift -  </h1>';

foreach($other_gift as $other_gift ) {
	if($other_gift->gift_type == 'Jewellery and Valuables'){
		$html .= '<h1 style=" font-family: times, serif;" >Jewelry and Ornaments –  </h1>
		<p style="font-size:12; font-family: times, serif;" >
			All the jewelry and ornaments '. $other_gift->gift_description .' .
		</p>
		';
	}
	elseif($other_gift->gift_type == 'Remained Assets'){
		$html .= '
		<h1 style=" font-family: times, serif;" >Remained assets -  </h1>
		<p style="font-size:12; font-family: times, serif;" >
		'. $other_gift->gift_description .'
		</p>
		';
	}

}

$html .= '

';

if($personal_data->marital_status == 0){
	$html .= '<h1 style="text-align:center; font-family: times, serif;" > I. DISTRIBUTION OF THE REMINDER OF MY ESTATE</h1>
	<p style="font-size:12; font-family: times, serif;" > a.	I direct, devise and bequest all the residue and remainder of my estate after making provision for payment of
	my obligations and distributions provided above to only my Muslim heirs whose relation to me, whether ascending or descending,
	has occurred through Islamic or lawful marriage at each and every point. The distribution of the residue and remainder of my estate shall
	be made strictly in accordance with.</p>
	';
}



$html .= '
<h1 style="text-align:center; font-family: times, serif;" > SCHEDULE A – MAWARITH (INHERITANCE) </h1>



<p style="font-size:12; font-family: times, serif;" >This schedule A is signed by me as a part of this Last Will and Testament.</p>
<p>b.	I direct that no part of the residue and remainder of my estate shall be inherited by any non-Muslim relative,
whether he/she is a kin or an in-law, spouse, parent or child. I further direct or ordain that any non-Muslim relative be disregarded and
 disqualified in the application of the named schedule.</p>

 <p style="font-size:12; font-family: times, serif;">
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

<h2 style="text-align:center; font-family: times, serif;" >
	* Schedule A has been prepared by .............................. and made a ---------------- by him for the service of Muslims in India,
	may Allah shower his soul with mercy and forgiveness.
</h2>


<p style="font-size:12; font-family: times, serif;" >
	e.	I direct and devise that any foetus, conceived before my death, whose relationship to me qualifies it to be an heir according to this Article,
	shall be considered as an heir if the following condition is fulfilled, the foetus should be born alive within 365 days of my death. I further direct
	and devise that whatever there exists a foetus who may become an heir according to this section, the whole distribution of the residue and remainder
  of my estate after the execution of above (debts and expenses and charitable contributions) be delayed until after the birth of the foetus, or
	that the largest potential share of the foetus be set aside until its birth alive. Should the foetus be born alive, but quality for a lesser
		share, or should it not be born alive within the 365 days, any surplus of the set aside amount must be returned to the estate and distributed
			according to Schedule A.
</p>
<p style="font-size:12; font-family: times, serif;">
	f.	I direct, devise, and bequest all the residue and remainder of my estate of every nature and kind and whenever situated after making provisions for payments
	 of my obligations and distribution of my estate as provided in above para no. D and E. I further direct, devise and ordain that any portion of my estate disclaimed
	  of refused to be received by any of the legatees named or referred to in this Last will and Testament, or the remainder of my estate in the event of non-existence
		of my Islamic heirs, shall be given to the Islamic society of India, as a contribution for establishing Islamic schools, centres, mosques and other activities in India.
</p>
<h1 style="text-align:center; font-family: times, serif;" >J. Announcement</h1>
<p style="font-size:12; font-family: times, serif;">1. If I die as a result of murder, I direct that the adjured murderer, principal or accessory in the murder shall be disqualified to receive any part of my estate. </p>
<p style="font-size:12; font-family: times, serif;" >2. I direct that no part of my estate shall be given to relatives whose relationship to me, ascending or descending, has occurred through non-Islamic and unlawful marriage, or through adoption</p>
<p style="font-size:12; font-family: times, serif;" >3. I direct that no part of the residue and remainder of my estate shall be inherited by any non-Muslim relative, whether he/she is a kin or in-law, spouse, parent or child. I further direct and ordain
 that a non-Muslim relative be disregarded and disqualified.</p>
 <p style="font-size:12; font-family: times, serif;" >4. I direct that no part of my estate shall be given to relatives whose relationship to me, ascending or descending, has occurred through non-Islamic and unlawful marriage, or through adoption.</p>

 <h1 style="text-align:center; font-family: times, serif;" >K. SEPARABILITY</h1>

 <p style="font-size:12; font-family: times, serif;">In case  one or more of the provisions contained in this/ any part of this Last Will and Testament is determined invalid by a court of competent jurisdiction I direct and ordain that other remaining provisions
 shall remain valid and enforceable and effective.</p>
 <p style="font-size:12; font-family: times, serif;" >
 I subscribe my name to this Will this day ______ of ____________, 201-- at ________ am/pm and do hereby declare that I sign and execute this instrument as my last Will and that I sign it willingly, that I execute it as my
  free and voluntary act for the purposes therein expressed, and that I am of age or otherwise legally empowered to make a Will, under no constraint or undue influence
 </p>
 <p style="font-size:12; font-family: times, serif;" >This is my last and final will, which I have laid out.</p>
 <ul>


 	<li>PLACE: ____________</li><br>
	<li>Dated:____________</li>
 </ul>
 <p style="font-size:12; font-family: times, serif;" >L.  TESTATOR’S SIGNATURE </p>
 <p style="font-size:12; font-family: times, serif;" >
 	In witness whereof, I have hereunto set my hand and seal on this: _________ day of _______, 2___.
 </p>
 <p >______________________
Signature
</p>


<h1 style="text-align:center; font-family: times, serif;" >K. SEPARABILITY</h1>

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
<h1 style="text-align:center; font-family: times, serif;">L.  TESTATOR’S SIGNATURE </h1>
<p style="font-family: times, serif;">
 In witness whereof, I have hereunto set my hand and seal on this: _________ day of _______, 2___.
</p>
<p>______________________
Signature
</p>

<h1 style="text-align:center; font-family: times, serif;" >M.  WITNESSES</h1>
<p style="font-family: times, serif;" >
 We hereby certify that the foregoing instrument was on the date thereof, signed, Published, and declared by
 the Testator '.$personal_data->full_name.', as and for His/her Last Will and Testament, in our presence, who at
 his/her request and in his/her Presence, and in the presence of each other, have hereunto subscribed our names as
 Witnesses thereto, believing said Testator at the time of the signing to be of sound mind and memory.

</p>';
$i=0 ;
foreach($witness as $witness ) {
	$i++;
	//if($i == 1){
		$html .= '

		 '.$i.'. &nbsp;'.$witness->witness_name.' of '.$witness->witness_address.'<br>

		 ';

}


// reset pointer to the last page
$pdf->lastPage();
// -- set new background ---


// ---------------------------------------------------------
// $pdf->AddPage();
// //page  start border
// $pdf->RoundedRect(05, 05, 200, 290, 00, '1000');
// //page end border
//
// $html = '';



// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

//$pdf->Image('application\img\logo.png', 90, 100, 60, 60, '', '', '', true, 72);
//Close and output PDF document
$pdf->Output('example_049.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+