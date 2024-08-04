<?php
require('fpdf/fpdf.php');
$db = new PDO("mysql:host=localhost;dbname=studentrecord_db", "root", "");

//Get Personal Background
class PDF extends FPDF
{
// Page header
	function Header()
	{
		// Logo
		$this->Image('fpdf/tutorial/logo.png',10,6,35);
		// Arial bold 15
		$this->SetFont('cambria','',11);
		// Move to the right
		$this->Cell(35);
		// Title
		$this->Cell(0,0,'Republic of the Philippines',0,0,'L');
	
		$this->Ln(6);
		$this->SetFont('cambria','B',15);
		$this->Cell(35);
		$this->Cell(0,0,'SOUTHERN LEYTE STATE UNIVERSITY',0,0,'L');

		$this->Ln(6);
		$this->SetFont('cambria','B',10);
		$this->Cell(35);
		$this->Cell(0,0,'Tomas Oppus Campus, San Isidro, Tomas Oppus, Southern Leyte 6605',0,0,'L');

		$this->Ln(6);
		$this->SetFont('cambria','B',11);
		$this->Cell(35);
		$this->Cell(0,0,'Office of the Registrar',0,0,'L');

		$this->Ln(6);
		$this->SetFont('cambria','B',9);
		$this->Cell(35);
		$this->Cell(110,0,'Website : www.southernleytestateu.edu.ph',0,0,'L');
		$this->Cell(0,0,'Contact : +639472921270',0,0,'L');

		$this->Ln(6);
		$this->SetFont('cambria','B',9);
		$this->Cell(35);
		$this->Cell(110,0,'Email : registrar_to@southernleytestateu.edu.ph',0,0,'L');
		$this->Cell(0,0,'School Code : 00008056',0,0,'L');

		$this->Ln(6);
		$this->SetFont('cambria','B',11);
		
		$this->Cell(1);
		$this->SetFillColor(42,44,204);
		$this->SetTextColor(255,255,255);
		$this->Cell(0,7,'OFFICIAL TRANSCRIPT OF RECORDS',0,0,'C', true);
		// Line break
		$this->Ln(10);
	}

// Page footer
	function Footer() 
	{

		

		// Position at 1.5 cm from bottom
		$this->SetY(-50);
		$this->GetY();
		// Arial italic 8
		$this->SetFont('cambria','B',11);
		$this->Cell(0,0,'Not Valid Without University Seal',0,0,'L');

		$this->Ln(5);
		$this->Cell(100);
		$this->SetFont('cambria','B',11);
		$this->Cell(0,0,'RENATO M. TINDUGAN, MAEd',0,0,'C');

		$this->Ln(8);
		// Page number
		$this->SetFont('Times','',11);
		$this->Cell(100,0,'OR No.: 000000 Date: 00/00/0000',0,0,'L');
		$this->SetFont('Times','',11);
		$this->Cell(0,-5,'Registrar III',0,0,'C');

		$this->Ln(1);
		$this->Cell(0,10,'Page '.$this->PageNo().' of {nb} pages',0,0,'L');

		$this->Ln(8);
		$this->SetFillColor(0,0,0);
		$this->Cell(0,.2,'',0,0,'C', true);

		$this->Ln(8);
		$this->SetFont('Times','',9);
		$this->Cell(100,0,'Doc. Code: SLSU-QF-RO18',0,0,'L');
		$this->Ln(5);
		$this->SetFont('Times','',9);
		$this->Cell(100,0,'Revision: 03',0,0,'L');
		$this->Ln(5);
		$this->SetFont('Times','',9);
		$this->Cell(100,0,'Date: 04 May 2023',0,0,'L');

		$this->Image('img/iso.png',170,332,35);
		$this->Image('img/rating.png',110,330,60);
		
	}

	function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

// Page 1 Content
	function Page1($header, $data, $personaldata, $education) 
	{
		

		$this->SetFont('cambria','B',11);
		$this->Cell(60,5,'PERSONAL BACKGROUND',0,0,'L');

		foreach($personaldata as $row)
		{
			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'STUDENT NUMBER',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[0],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'STUDENT NAME',0,0,'L');
			$this->SetFont('cambria','B',11);
			$this->Cell(0,8,' : '.$row[1].', '.$row[2].' '.$row[3],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'BIRTH DATE',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[4],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'BIRTH PLACE',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[5],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'SEX',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[6],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'CITIZENSHIP',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[7],0,0,'L');

			$this->Image('img/'.$row[13],160,80,45);

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'RELIGION',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[8],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'PARENT/GUARDIAN',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[9],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'PERMANENT ADDRESS',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[10],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'DATE OF ADMISSION',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[11],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'ENTRANCE CREDENTIAL',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[12],0,0,'L');
		}

		$this->Ln(8);
		$this->SetFillColor(0,0,0);
		$this->Cell(0,.5,'',0,0,'C', true);

		$this->Ln();
		$this->SetFont('cambria','B',11);
		$this->Cell(60,8,'EDUCATIONAL BACKGROUND',0,0,'L');
		$this->Cell(0,8,'SCHOOL LAST ATTENDED',0,0,'C');

		foreach($education as $row)
		{
			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'ELEMENTARY',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(110,8,' : '.$row[0],0,0,'L');
			$this->SetFont('cambria','B',11);
			$this->Cell(10,8,'YEAR',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[2],0,0,'L');

			$this->Ln(5);
			$this->Cell(60);
			$this->Cell(80,8,'   '.$row[1],0,0,'L');

			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'SECONDARY',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(110,8,' : '.$row[3],0,0,'L');
			$this->SetFont('cambria','B',11);
			$this->Cell(10,8,'YEAR',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[5],0,0,'L');

			$this->Ln(5);
			$this->Cell(60);
			$this->Cell(80,8,'   '.$row[4],0,0,'L');
			
			$this->Ln();
			$this->SetFont('cambria','B',11);
			$this->Cell(10);
			$this->Cell(50,8,'TERTIARY',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(110,8,' : '.$row[6],0,0,'L');
			$this->SetFont('cambria','B',11);
			$this->Cell(10,8,'YEAR',0,0,'L');
			$this->SetFont('times','',11);
			$this->Cell(0,8,' : '.$row[8],0,0,'L');

			$this->Ln(5);
			$this->Cell(60);
			$this->Cell(80,8,'   '.$row[7],0,0,'L');
		}

		
		$this->Ln(8);
		$this->SetFillColor(0,0,0);
		$this->Cell(0,.5,'',0,0,'C', true);

		$this->Ln();
		$this->SetFont('cambria','B',11);
		$this->Cell(60,8,'GRADING SYSTEM',0,0,'L');

		// Column widths
		
        $w = array(30, 30, 30, 30, 30, 30);
        // Header
		$this->Ln();
		$this->Cell(10);
		$this->SetFont('cambria','B',11);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],0,0,'C');
        $this->Ln();
		$this->Cell(10);
		$this->SetFont('times','',11);
        // Data
        foreach($data as $row)
        {
			
            $this->Cell($w[0],6,$row[0],0,0,'C');
            $this->Cell($w[1],6,$row[1],0,0,'C');
            $this->Cell($w[2],6,$row[2],0,0,'C');
            $this->Cell($w[3],6,$row[3],0,0,'C');
            $this->Cell($w[4],6,$row[4],0,0,'C');
            $this->Cell($w[5],6,$row[5],0,0,'C');
            $this->Ln();
			$this->Cell(10);
        }
        
		$this->Ln();
		$this->SetFont('times','',11);
		$this->MultiCell(0,5,'One collegiate unit of credit is one hour lecture each week or a total of 18 hours in a semester. Three hours of laboratory work, drafting, or shop work each week or a total of 54 hours a semester has an equivalent credit unit as prescribed in the Policies, Standards and Guidelines (PSGs) of the program.');
		$this->MultiCell(0,5,'The semestral grade point average (GPA) is computed by multiplying each grade by the corresponding unit per grade and dividing the sum of these products by the total number of units enrolled in the semester.');

	}
	function Header1($personaldata, $header) 
	{
		$w = array(40, 90, 30, 15, 25);
		
		

		$this->Ln();
		$this->Cell(1);
		$this->SetFont('cambria','B',11);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],10,$header[$i],'TB',0,'L');
	}

// Page 2 Content
	function Page2($header, $data, $course)
	{	
		
		$w = array(30, 90, 30, 20, 25);
		$width = array(20, 40, 30, 0);
		$this->Ln();
		
		$sem = '';
		foreach($course as $row)
        {
			if($row[0] == 1){
				$sem = '1st Sem';
			} else if($row[0] == 2){
				$sem = '2nd Sem';
			} else {
				$sem = 'Summer';
			}
			$this->Cell(5);
			$this->SetFont('cambria','B',11);
            $this->Cell($width[0],7,$sem,0,0,'L');
            $this->Cell($width[1],7,$row[1],0,0,'L');
            $this->Cell($width[2],7,$row[2],0,0,'L');
            $this->Cell($width[3],7,$row[3],0,0,'L');
            $this->Ln();
			foreach($data as $rows)
			{
				if($row[0] == $rows[5] && $row[1] == $rows[6]){
					$this->Cell(10);
					$this->SetFont('times','',11);
					$this->Cell($w[0],4.5,$rows[0],0,0,'L');
					$this->Cell($w[1],4.5,$rows[1],0,0,'L');
					$this->Cell($w[2],4.5,$rows[2],0,0,'C');
					$this->Cell($w[3]-5,4.5,$rows[3],0,0,'C');
					$this->Cell($w[4]-5,4.5,$rows[4],0,0,'C');
					$this->Ln();
				}
				
			}
        }
        /* for($i=0;$i<count($course);$i++)
            $this->Cell($width[$i],7,$course[$i],0,0,'L'); */

        $this->Ln();
		$this->SetFont('times','',11);
        // Data
		
        
		
	}

}

// database connection




$statement = $db->prepare('SELECT semester, academicyear, course, major FROM subjectstaken_tbl WHERE studentid="13-10328" GROUP BY academicyear, semester');
$statement->execute(); 
while($row = $statement->fetch()){
    $semester_header[] = array($row['semester'], $row['academicyear'], $row['course'], $row['major']);
}

//Get Subjects Taken
$statement = $db->prepare('SELECT * FROM subjectstaken_tbl WHERE studentid="13-10328"');
$statement->execute(); 
while($row = $statement->fetch()){
    $data[] = array($row['coursenumber'], $row['descriptivetitle'], $row['finalgrade'], $row['reex'], $row['credit'], $row['semester'], $row['academicyear']);
}

$statement = $db->prepare('SELECT * FROM personalbackground_tbl WHERE studentid="13-10328"');
$statement->execute();
while($row = $statement->fetch()){
	$personaldata[] = array(
		$row['studentid'], 
		$row['lastname'], 
		$row['firstname'], 
		$row['middlename'],
		$row['birthdate'],
		$row['birthplace'],
		$row['sex'],
		$row['citizenship'],
		$row['religion'],
		$row['parentguardian'],
		$row['permanentaddress'],
		$row['dateofadmission'],
		$row['entrancecredential'],
		$row['photo'],
	);
}



$statement = $db->prepare('SELECT * FROM educationalbackground_tbl WHERE studentid="13-10328"');
$statement->execute();
while($row = $statement->fetch()){
	$education[] = array(
		$row['elementaryschool'], 
		$row['elementaryaddress'], 
		$row['elementaryyeargraduated'], 
		$row['secondaryschool'],
		$row['secondaryaddress'],
		$row['secondaryyeargraduated'],
		$row['tertiaryschool'],
		$row['tertiaryaddress'],
		$row['tertiaryyeargraduated'],
	);
}

$statement = null;

// Instanciation of inherited class

$pdf = new PDF('P','mm','Legal');
$pdf->AliasNbPages();

$grading_header = array('GRADE', 'EQUIVALENT', 'GRADE', 'EQUIVALENT', 'GRADE', 'EQUIVALENT');
$subjects_header = array('COURSE NO', 'DESCRIPTIVE TITLE', 'FINAL GRADE', 'RE-EX', 'CREDIT');
/* $semester_header = array('1st Sem', '2013-2014', 'BSED', 'BIOLOGICAL SCIENCES'); */
$grading_data = $pdf->LoadData('gradingsystem.txt');
$subjects_data = $pdf->LoadData('subjectstaken.txt');

$pdf->AddPage();
$pdf->Page1($grading_header, $grading_data, $personaldata, $education);
$pdf->SetAutoPageBreak(true, 55);
if($pdf->AliasNbPages() == 3){
	$pdf->Header1($personaldata, $subjects_header);
}
$pdf->Page2($subjects_header, $data, $semester_header);

$pdf->Output();
?>
