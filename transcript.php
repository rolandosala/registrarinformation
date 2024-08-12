<?php
require ('fpdf/fpdf.php');

$db = new PDO("mysql:host=localhost;dbname=studentrecord_db", "root", "");
global $personal_info_data;



//Get Personal Background
class PDF extends FPDF
{
	// Page header
	function Header()
	{
		// Logo
		$this->Image('img/logo.png', 10, 6, 30);
		// Arial bold 15
		$this->SetFont('cambria', '', 11);
		// Move to the right
		$this->Cell(35);
		// Title
		$this->Cell(0, 0, 'Republic of the Philippines', 0, 0, 'L');

		$this->Ln(6);
		$this->SetFont('cambria', 'B', 15);
		$this->Cell(35);
		$this->Cell(0, 0, 'SOUTHERN LEYTE STATE UNIVERSITY', 0, 0, 'L');

		$this->Ln(6);
		$this->SetFont('cambria', 'B', 10);
		$this->Cell(35);
		$this->Cell(0, 0, 'Tomas Oppus Campus, San Isidro, Tomas Oppus, Southern Leyte 6605', 0, 0, 'L');

		$this->Ln(6);
		$this->SetFont('cambria', 'B', 11);
		$this->Cell(35);
		$this->Cell(0, 0, 'Office of the Registrar', 0, 0, 'L');

		$this->Ln(6);
		$this->SetFont('cambria', 'B', 9);
		$this->Cell(35);
		$this->Cell(13, 0, 'Website', 0, 0, 'L');
		$this->Cell(2, 0, ':', 0, 0, 'L');
		$this->Cell(95, 0, 'www.southernleytestateu.edu.ph', 0, 0, 'L');
		$this->Cell(20, 0, 'Contact', 0, 0, 'L');
		$this->Cell(3, 0, ':', 0, 0, 'L');
		$this->Cell(0, 0, '+639472921270', 0, 0, 'L');

		$this->Ln(6);
		$this->SetFont('cambria', 'B', 9);
		$this->Cell(35);
		$this->Cell(13, 0, 'Email', 0, 0, 'L');
		$this->Cell(2, 0, ':', 0, 0, 'L');
		$this->Cell(95, 0, 'registrar_to@southernleytestateu.edu.ph', 0, 0, 'L');
		$this->Cell(20, 0, 'School Code', 0, 0, 'L');
		$this->Cell(3, 0, ':', 0, 0, 'L');
		$this->Cell(0, 0, '00008056', 0, 0, 'L');

		$this->Ln(6);
		$this->SetFont('cambria', 'B', 14);
		$this->Cell(1);
		$this->SetFillColor(0, 58, 117);
		$this->SetTextColor(255, 255, 255);
		$this->Cell(0, 7, 'OFFICIAL TRANSCRIPT OF RECORDS', 0, 0, 'C', true);

		$this->SetTextColor(0, 0, 0);
		// Line break
		$db = new PDO("mysql:host=localhost;dbname=studentrecord_db", "root", "");
		$student_id = $_GET['id'];
		$sql_query = $db->prepare('SELECT studentid, lastname, firstname, middlename, photo FROM personalbackground_tbl WHERE studentid="13-10328"');
		$sql_query->execute();
		while ($row = $sql_query->fetch()) {
			$personal_info_data[] = array($row['studentid'], $row['lastname'], $row['firstname'], $row['middlename'], $row['photo']);
		}


		$subjects_header = array('COURSE NO', 'DESCRIPTIVE TITLE', 'FINAL GRADE', 'RE-EX', 'CREDIT');
		$w = array(40, 90, 30, 15, 20);

		if ($this->PageNo() == 1) {
			$this->Ln(10);
		} else if ($this->PageNo() > 3) {
			$this->Ln();
			$this->Header1($personal_info_data);
			$this->Ln(8);
		} else {
			$this->Ln();
			$this->Header1($personal_info_data);


			$this->Ln();
			$this->Cell(1);
			$this->SetFont('cambria', 'B', 11);
			for ($i = 0; $i < count($subjects_header); $i++)
				$this->Cell($w[$i], 7, $subjects_header[$i], 'B', 0, 'L');

			$this->Ln(8);

		}
	}


	// Page footer
	function Footer()
	{
		$db = new PDO("mysql:host=localhost;dbname=studentrecord_db", "root", "");
		$student_id = $_GET['id'];
		$sql_query = $db->prepare('SELECT COUNT(*) FROM subjectstaken_tbl WHERE studentid="13-10328"');
		$sql_query->execute();
		$attached_docstamp_onpage = 3;
		if ($this->PageNo() == $attached_docstamp_onpage) {
			$this->SetY(-70);
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(0, 0, 'Not Valid Without University Seal', 0, 0, 'L');
			$this->Ln(7);
			$this->Cell(10);
			$this->SetFont('times', '', 10);
			$docstamp = '9606023';
			$datepaid = '08/06/2024';
			$txt = 'DOC. STAMP PAID 
under OR No.: ' . $docstamp . '
Date Paid: ' . $datepaid;
			$this->MultiCell(40, 5, $txt, 1, 'C');
		} else {
			// Position at 1.5 cm from bottom
			$this->SetY(-50);
			/* $this->Ln(-10);
							  $this->Cell(0,10,'xxxx',0,0,'L');
							  $this->Ln(); */
			// Arial italic 8
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(0, 0, 'Not Valid Without University Seal', 0, 0, 'L');
			$this->Ln(5);
		}


		$this->Cell(100);
		$this->SetFont('cambria', 'B', 11);
		$this->Cell(0, 0, 'RENATO M. TINDUGAN, MAEd', 0, 0, 'C');

		$this->Ln(8);
		// Page number
		$or_datepaid = '08/06/2024';
		$or_number = '5853543';
		$this->SetFont('Times', '', 11);
		$this->Cell(100, 0, 'OR No.: ' . $or_number . ' Date: ' . $or_datepaid, 0, 0, 'L');
		$this->SetFont('Times', '', 11);
		$this->Cell(0, -5, 'Registrar III', 0, 0, 'C');

		$this->Ln(1);
		$this->Cell(0, 10, 'Page ' . $this->PageNo() . ' of pagenumber pages', 0, 0, 'L');

		$this->Ln(8);
		$this->SetFillColor(0, 0, 0);
		$this->Cell(0, .2, '', 0, 0, 'C', true);

		$this->Ln(8);
		$this->SetFont('Times', '', 9);
		$this->Cell(100, 0, 'Doc. Code: SLSU-QF-RO18', 0, 0, 'L');
		$this->Ln(5);
		$this->SetFont('Times', '', 9);
		$this->Cell(100, 0, 'Revision: 03', 0, 0, 'L');
		$this->Ln(5);
		$this->SetFont('Times', '', 9);
		$this->Cell(100, 0, 'Date: 04 May 2023', 0, 0, 'L');

		$this->Image('img/iso.png', 170, 332, 35);
		$this->Image('img/rating.png', 110, 330, 60);

	}

	function Loadsubjects_taken_data($file)
	{
		// Read file lines
		$lines = file($file);
		$subjects_taken_data = array();
		foreach ($lines as $line)
			$subjects_taken_data[] = explode(';', trim($line));
		return $subjects_taken_data;
	}

	// Page 1 Content
	function Page1($header, $subjects_taken_data, $personal_info_data, $educational_background_data)
	{


		$this->SetFont('cambria', 'B', 11);
		$this->Cell(60, 5, 'PERSONAL BACKGROUND', 0, 0, 'L');

		foreach ($personal_info_data as $row) {
			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'STUDENT NUMBER', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[0], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'STUDENT NAME', 0, 0, 'L');
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(0, 8, ' : ' . $row[1] . ', ' . $row[2] . ' ' . $row[3], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'BIRTH DATE', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[4], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'BIRTH PLACE', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[5], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'SEX', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[6], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'CITIZENSHIP', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[7], 0, 0, 'L');

			/* $this->Image('img/'.$row[13],160,80,45); */
			$this->Image('img/photo.jpg', 160, 70, 45);

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'RELIGION', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[8], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'PARENT/GUARDIAN', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[9], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'PERMANENT ADDRESS', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[10], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'DATE OF ADMISSION', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[11], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'ENTRANCE CREDENTIAL', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[12], 0, 0, 'L');
		}

		$this->Ln(8);
		$this->SetFillColor(0, 0, 0);
		$this->Cell(0, .5, '', 0, 0, 'C', true);

		$this->Ln();
		$this->SetFont('cambria', 'B', 11);
		$this->Cell(60, 8, 'EDUCATIONAL BACKGROUND', 0, 0, 'L');
		$this->Cell(0, 8, 'SCHOOL LAST ATTENDED', 0, 0, 'C');

		foreach ($educational_background_data as $row) {
			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'ELEMENTARY', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(110, 8, ' : ' . $row[0], 0, 0, 'L');
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10, 8, 'YEAR', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[2], 0, 0, 'L');

			$this->Ln(5);
			$this->Cell(60);
			$this->Cell(80, 8, '   ' . $row[1], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'SECONDARY', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(110, 8, ' : ' . $row[3], 0, 0, 'L');
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10, 8, 'YEAR', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[5], 0, 0, 'L');

			$this->Ln(5);
			$this->Cell(60);
			$this->Cell(80, 8, '   ' . $row[4], 0, 0, 'L');

			$this->Ln();
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10);
			$this->Cell(50, 8, 'TERTIARY', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(110, 8, ' : ' . $row[6], 0, 0, 'L');
			$this->SetFont('cambria', 'B', 11);
			$this->Cell(10, 8, 'YEAR', 0, 0, 'L');
			$this->SetFont('times', '', 11);
			$this->Cell(0, 8, ' : ' . $row[8], 0, 0, 'L');

			$this->Ln(5);
			$this->Cell(60);
			$this->Cell(80, 8, '   ' . $row[7], 0, 0, 'L');
		}


		$this->Ln(8);
		$this->SetFillColor(0, 0, 0);
		$this->Cell(0, .5, '', 0, 0, 'C', true);

		$this->Ln();
		$this->SetFont('cambria', 'B', 11);
		$this->Cell(60, 8, 'GRADING SYSTEM', 0, 0, 'L');

		// Column widths

		$w = array(30, 30, 30, 30, 30, 30);
		// Header
		$this->Ln();
		$this->Cell(10);
		$this->SetFont('cambria', 'B', 11);
		for ($i = 0; $i < count($header); $i++)
			$this->Cell($w[$i], 7, $header[$i], 0, 0, 'C');
		$this->Ln();
		$this->Cell(10);
		$this->SetFont('times', '', 11);
		// subjects_taken_data
		foreach ($subjects_taken_data as $row) {

			$this->Cell($w[0], 6, $row[0], 0, 0, 'C');
			$this->Cell($w[1], 6, $row[1], 0, 0, 'C');
			$this->Cell($w[2], 6, $row[2], 0, 0, 'C');
			$this->Cell($w[3], 6, $row[3], 0, 0, 'C');
			$this->Cell($w[4], 6, $row[4], 0, 0, 'C');
			$this->Cell($w[5], 6, $row[5], 0, 0, 'C');
			$this->Ln();
			$this->Cell(10);
		}

		$this->Ln();
		$this->SetFont('times', '', 11);
		$this->MultiCell(0, 5, 'One collegiate unit of credit is one hour lecture each week or a total of 18 hours in a semester. Three hours of laboratory work, drafting, or shop work each week or a total of 54 hours a semester has an equivalent credit unit as prescribed in the Policies, Standards and Guidelines (PSGs) of the program.');
		$this->MultiCell(0, 5, 'The semestral grade point average (GPA) is computed by multiplying each grade by the corresponding unit per grade and dividing the sum of these products by the total number of units enrolled in the semester.');

	}
	function Header1($subjects_taken_data)
	{
		$this->SetFont('cambria', 'B', 14);
		foreach ($subjects_taken_data as $rows) {
			$this->Cell(40, 8, $rows[0], 'B', 0, 'C');
			$this->Cell(100, 8, $rows[1] . ', ' . $rows[2] . ' ' . $rows[3], 'B', 0, 'C');
			$this->Cell(0, 8, '', 'B', 0, 'C');

		}

	}

	// Page 2 Content
	function Page2($subjects_taken_data, $course)
	{

		$w = array(30, 90, 30, 20, 25);
		$width = array(20, 40, 30, 0);
		$this->Ln();

		$sem = '';
		foreach ($course as $row) {
			if ($row[0] == 1) {
				$sem = '1st Sem';
			} else if ($row[0] == 2) {
				$sem = '2nd Sem';
			} else {
				$sem = 'Summer';
			}
			$this->Cell(5);
			$this->SetFont('cambria', 'B', 11);
			$this->Cell($width[0], 6, $sem, 0, 0, 'L');
			$this->Cell($width[1], 6, $row[1], 0, 0, 'L');
			$this->Cell($width[2], 6, $row[2], 0, 0, 'L');
			$this->Cell($width[3], 6, $row[3], 0, 0, 'L');
			$this->Ln();
			foreach ($subjects_taken_data as $rows) {
				if ($row[0] == $rows[5] && $row[1] == $rows[6]) {
					$this->Cell(10);
					$this->SetFont('times', '', 11);
					$this->Cell($w[0], 5, $rows[0], 0, 0, 'L');
					$this->Cell($w[1], 5, $rows[1], 0, 0, 'L');
					$this->Cell($w[2], 5, $rows[2], 0, 0, 'C');
					$this->Cell($w[3] - 5, 5, $rows[3], 0, 0, 'C');
					$this->Cell($w[4] - 5, 5, $rows[4] . '.0', 0, 0, 'C');
					$this->Ln();
				}

			}
		}
		$this->Ln();
		$this->Cell(107);
		$this->SetFont('cambria', 'B', 11);
		$this->calculateAverage();
		$this->Ln(5);
		$this->SetFont('cambria', 'B', 10);
		$this->Cell(0, 10, '---------------------------------------------------------------------------------------------------------------------------------ENTRIES CLOSED-----------', 0, 0, 'R');

		$this->Ln();
		$this->SetFont('cambria', 'B', 12);
		$note = 'GRADUATED WITH THE DEGREE OF  BACHELOR OF SECONDARY EDUCATION MAJOR IN BIOLOGICAL SCIENCE ON MARCH 30, 2016 PER BOARD OF TRUSTEES RESOLUTION NO. 04, SERIES OF 2016';
		$this->MultiCell(0, 7, $note, 0, 'C');

		$this->Ln();
		$this->SetFont('cambria', 'B', 11);
		$this->Cell(25, 7, 'Remarks', 0);
		$this->SetFont('cambria', 'B', 11);
		$this->Cell(5, 7, ':', 0, 0, 'C');
		$this->SetFont('times', '', 11);
		$this->Cell(0, 7, 'FOR LOCAL EMPLOYMENT PURPOSE ONLY', 0);

		$this->Ln();
		$this->SetFont('cambria', 'B', 11);
		$this->Cell(25, 7, 'Date Issued', 0);
		$this->SetFont('cambria', 'B', 11);
		$this->Cell(5, 7, ':', 0, 0, 'C');
		$this->SetFont('times', '', 11);
		$this->Cell(0, 7, 'August 06, 2024', 0);

	}

	function attachedTransferTOR()
	{
		$files = array('TOR PAGE 1', 'TOR PAGE 2', 'TOR PAGE 3');
		for ($i = 0; $i < count($files); $i++) {
			$this->AddPage();
			$this->Image('img/' . $files[$i] . '.jpg', 10 * 4, 65, 30 * 4.6);
		}

	}

	function calculateAverage()
	{
		$db = new PDO("mysql:host=localhost;dbname=studentrecord_db", "root", "");
		$student_id = $_GET['id'];
		$sql_query = $db->prepare('SELECT SUM(finalgrade * credit) AS weighted,SUM(reex * credit) as re_ex, SUM(credit) AS totalcredits FROM `subjectstaken_tbl` WHERE studentid="13-10328"');
		$sql_query->execute();
		while ($row = $sql_query->fetch()) {
			$average[] = array($row['weighted'], $row['totalcredits'], $row['re_ex']);
		}

		foreach ($average as $rows) {
			$this->Cell(0, 10, 'General Average: ' . round(($rows[0] + $rows[2]) / $rows[1], 3), 0, 0, 'L');
		}
	}

}

// subjects_taken_database connection
$student_id = $_GET['id'];
if (isset($student_id)) {
	$sql_query = $db->prepare('SELECT semester, academicyear, course, major FROM subjectstaken_tbl WHERE studentid="13-10328" GROUP BY academicyear, semester ORDER BY academicyear ASC');
	$sql_query->execute();
	while ($row = $sql_query->fetch()) {
		$table_header[] = array(
			$row['semester'],
			$row['academicyear'],
			$row['course'],
			$row['major']
		);
	}

	//Get Subjects Taken
	$sql_query = $db->prepare('SELECT * FROM subjectstaken_tbl WHERE studentid="13-10328" ORDER BY academicyear ASC');
	$sql_query->execute();
	while ($row = $sql_query->fetch()) {
		$subjects_taken_data[] = array(
			$row['coursenumber'],
			$row['descriptivetitle'],
			$row['finalgrade'],
			$row['reex'],
			$row['credit'],
			$row['semester'],
			$row['academicyear']
		);
	}

	$sql_query = $db->prepare('SELECT * FROM personalbackground_tbl WHERE studentid="13-10328"');
	$sql_query->execute();
	while ($row = $sql_query->fetch()) {
		$personal_info_data[] = array(
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



	$sql_query = $db->prepare('SELECT * FROM educationalbackground_tbl WHERE studentid="13-10328"');
	$sql_query->execute();
	while ($row = $sql_query->fetch()) {
		$educational_background_data[] = array(
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

}



$sql_query = null;

$pdf = new PDF('P', 'mm', 'Legal');
$pdf->AliasNbPages('pagenumber');


$grading_header = array('GRADE', 'EQUIVALENT', 'GRADE', 'EQUIVALENT', 'GRADE', 'EQUIVALENT');

/* $table_header = array('1st Sem', '2013-2014', 'BSED', 'BIOLOGICAL SCIENCES'); */
$grading_subjects_taken_data = $pdf->Loadsubjects_taken_data('gradingsystem.txt');

$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 55);
$pdf->Page1($grading_header, $grading_subjects_taken_data, $personal_info_data, $educational_background_data);
$pdf->Page2($subjects_taken_data, $table_header);

foreach ($personal_info_data as $rows) {
	if ($rows[13] == false) {
		$pdf->attachedTransferTOR();
	}
}

$pdf->Output();
?>