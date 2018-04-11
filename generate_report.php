<?php

require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'S6 CSE Attendance Report',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
function Footer()
{
    // Page footer
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	parent::Footer();
}
}

//Connect to database
mysql_connect('localhost','root','');
mysql_select_db('mini');

$pdf=new PDF();
// $pdf->AddPage();
// //First table: put all columns automatically
// $pdf->Table('select * from users order by username');
$pdf->AddPage();
//Second table: specify 3 columns
$pdf->AddCol('roll_no',20,'Roll no','C');
$pdf->AddCol('name',50,'Name of student','L');
$pdf->AddCol('attend',35,'Hours present','C');//C-center,R-right,L-left
$pdf->AddCol('per',30,'Percentage','C');
$pdf->AddCol('remark',45,'Remarks','C');

$pdf->Table('select * from temp order by roll_no');
$pdf->SetXY(50,60);
//$pdf->Cell(40,10,'',1,0,'C',true);
//$pdf->Cell(40,10,'',1,0,'C',true);
$pdf->Output();


$date=date("D-d-M-y");

$temp="./uploads/Attendance-".$date.".pdf";
$pdf->Output('F',$temp);
header("location: $temp");
?>