<?php
require('../fpdf.php');

/* $pdf = new FPDF('P', 'mm', 'Legal');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello!');
$pdf->Output(); */

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('cambria','',11);
$pdf->Cell(40,10,'Cambria',1);
$pdf->AddPage();
$pdf->Cell(60,10,'Powered by FPDF.',1,3,'C');
$pdf->Output();
?>
