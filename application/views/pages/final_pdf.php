<?php
 require('application\views\pages\fpdf\fpdf.php');
//
 $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16,'center');
// $pdf->Cell(40,10,'Islamic_Will'  );
// $pdf->SetFont("Arial","","14");
// //$pdf->Cell(60,10," Full Name :-  $Full_name",0,1,"L");
//
// while($rows= (mysqli_fetch_array($result,MYSQLI_ASSOC)))
// {
//     $full_name = $rows['full_name'];
//     // $address = $rows['Address'];
//     // $class = $rows['Designation'];
//     // $phone = $rows['Text'];
//
//     $pdf->SetXY (20,60);
//     $pdf->SetFontSize(12);
//     $pdf->SetTextColor(0,0,0);
//     $pdf->Write(7,$full_name);
//     $pdf->SetXY (20,65);
//     // $pdf->Write(7,$address);
//     // $pdf->SetXY (20,70);
//     // $pdf->Write(7,$class);
//     // $pdf->SetXY (20,90);
//     // $pdf->Write(7,$phone);
//     // $pdf->Ln();
// }
// $pdf->Output();


class printview extends FPDF
{
  function Header()
  {
    $this->SetFont('Arial','B',15);
    $this->Cell(276,5,"VendorDetails",0,0,'C');
    $this->ln(15);
    $this->SetFont('Arial','B',10);
    $this->Cell(55,10,"Name",1,0,'C');
    $this->Cell(90,10,"Address",1,0,'C');
    // $this->Cell(50,10,"Telephone",1,0,'C');
    // $this->Cell(70,10,"Email",1,0,'C');
    // $this->ln();
  }
function Footer(){
$this->SetY(-15);
$this->SetFont('Arial','I',8);
 $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}


function viewdata(){
if(isset($result)){
  foreach($result as $result){
  $this->SetFont('Arial','',10);
  $this->Cell(55,10,$result->full_name,1,0,'L');
  $this->Cell(90,10,$result->address,1,0,'L');
  // $this->Cell(50,10,$values['vndr_telephone'].','.$values['vndr_mobile'],1,0,'L');
  // $this->Cell(70,10,$values['vndr_mailid'],1,0,'L');
  $this->ln();
}
}
}

}

$this->pdf = new Printview();
$this->pdf->SetMargins(15, 10, 20);
$this->pdf->AliasNbPages();
$this->pdf->AddPage('L','A4',0);
$this->pdf->viewdata();
$this->pdf->Output();


?>
