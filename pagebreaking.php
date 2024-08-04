<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
    protected $col = 0;

    function SetCol($col)
    {
        // Move position to a column
        $this->col = $col;
        $x = 10 + $col*65;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function AcceptPageBreak()
    {
        if($this->col<0)
        {
            // Go to next column
            $this->Text(10, 10, 'Hello World');
            return false;
        }
        else
        {
            // Go back to first column and issue page break
            $this->Text(10, 10, 'Hello World');
            $this->SetCol(0);
           
            return true;
        }
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
for($i=1;$i<=300;$i++)
    $pdf->Cell(0, 5, "Line $i", 0, 1);
$pdf->Output();
?>