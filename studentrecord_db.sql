-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 01:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentrecord_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_tbl`
--

CREATE TABLE `admission_tbl` (
  `student_id` varchar(10) NOT NULL,
  `admission_date` date NOT NULL,
  `entrance_credential` varchar(20) NOT NULL,
  `course` varchar(10) NOT NULL,
  `major` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educationalbackground_tbl`
--

CREATE TABLE `educationalbackground_tbl` (
  `studentid` varchar(50) NOT NULL,
  `elementaryschool` varchar(50) NOT NULL,
  `elementaryaddress` varchar(50) NOT NULL,
  `elementaryyeargraduated` varchar(10) NOT NULL,
  `secondaryschool` varchar(50) NOT NULL,
  `secondaryaddress` varchar(50) NOT NULL,
  `secondaryyeargraduated` varchar(10) NOT NULL,
  `tertiaryschool` varchar(50) NOT NULL,
  `tertiaryaddress` varchar(50) NOT NULL,
  `tertiaryyeargraduated` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educationalbackground_tbl`
--

INSERT INTO `educationalbackground_tbl` (`studentid`, `elementaryschool`, `elementaryaddress`, `elementaryyeargraduated`, `secondaryschool`, `secondaryaddress`, `secondaryyeargraduated`, `tertiaryschool`, `tertiaryaddress`, `tertiaryyeargraduated`) VALUES
('13-10328 ', 'Malitbog Central School', 'Malitbog, Southern Leyt', '2000', 'Santo Ni?o Academy', 'Sogod, Southern Leyte', '2004', 'Southern Leyte State University-Tomas Oppus', 'Tomas Oppus, Southern Leyte', '2016'),
('97-10291', 'Padre Burgos Elementary School', 'Padre Burgos, Southern Leyte\n', '1990', 'St. Scholastica\'s Academy', 'Talisay, Cebu City', '1994', 'Southern Leyte State University-Tomas Oppus', 'San Isidro, Tomas Oppus, Southern Leyte', '2002'),
('06-10007', 'Lo-okElementary School', 'Lapu-Lapu City', '2002', 'Rath Memorial Institute', 'Tomas Oppus, Southern Leyte', '2006', 'Southern Leyte State University-Tomas Oppus', 'San Isidro, Tomas Oppus, Southern Leyte', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `personalbackground_tbl`
--

CREATE TABLE `personalbackground_tbl` (
  `id` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `parentguardian` varchar(50) NOT NULL,
  `permanentaddress` varchar(100) NOT NULL,
  `dateofadmission` date NOT NULL,
  `entrancecredential` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personalbackground_tbl`
--

INSERT INTO `personalbackground_tbl` (`id`, `studentid`, `lastname`, `firstname`, `middlename`, `birthdate`, `birthplace`, `sex`, `citizenship`, `religion`, `parentguardian`, `permanentaddress`, `dateofadmission`, `entrancecredential`, `photo`) VALUES
(1, '13-10328', 'ESCABAL', 'JESSA', 'RAGAS', '0000-00-00', 'Surigao City, Surigao Del Norte', 'Female', 'Filipino', 'Roman Catholic', 'Juan Dela Cruz', 'Malitbog, Southern Leyte', '0000-00-00', 'Transfer Credential, TOR, Good Moral and Birth Certificate\n?\n', 'Rolando.jpg'),
(2, '97-10291', 'LERCANA', 'ZENY', 'TACLE', '0000-00-00', 'Padre Burgos, Southern Leyte', 'Female', 'Filipino', 'Roman Catholic', 'Leoncio Lercana', 'Lungsodaan, Padre Burgos, Southern Leyte', '0000-00-00', 'TOR, Transfer Credential, Good Moral and Birth Certificate\n', 'mata.jpg'),
(3, '06-10007 ', 'MATA', 'DIONIEMELL', 'ABINA', '0000-00-00', 'Lapu-Lapu City', 'Female', 'Filipino', 'Roman Catholic', 'Juan Dela Cruz', 'Malitbog, Southern Leyte', '0000-00-00', 'Form 138A, GMC, Birth Cert. & Marriage Cert.?', 'manaug.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subjectstaken_tbl`
--

CREATE TABLE `subjectstaken_tbl` (
  `studentid` varchar(10) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `academicyear` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `major` varchar(30) NOT NULL,
  `coursenumber` varchar(20) NOT NULL,
  `descriptivetitle` varchar(50) NOT NULL,
  `finalgrade` varchar(10) NOT NULL,
  `reex` varchar(10) NOT NULL,
  `credit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjectstaken_tbl`
--

INSERT INTO `subjectstaken_tbl` (`studentid`, `semester`, `academicyear`, `course`, `major`, `coursenumber`, `descriptivetitle`, `finalgrade`, `reex`, `credit`) VALUES
('13-10328', '1', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 101-4', 'Developmental Reading I', '1.8', '', '3'),
('13-10328', '1', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'FILI 101', 'Komunikasyon sa Akademikong Filipino', '1.6', '', '3'),
('13-10328', '1', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'HUMAN 101', 'Art Appreciation', '1.7', '', '3'),
('13-10328', '1', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'MATH 101', 'Fundamentals of Mathematics', '2', '', '3'),
('13-10328', '1', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCI 203', 'Statistics for Biology', '2.8', '', '3'),
('13-10328', '1', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 202-3F', 'Principles of Teaching I', '1.2', '', '3'),
('13-10328', '1', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCI 201', 'Biological Science I (Zoology)', '2.5', '', '5'),
('13-10328', '1', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'ENGLI 203', 'Philippine Literature', '2.3', '', '3'),
('13-10328', '2', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'SCIE 102-F', 'Biological Science ', '2.2', '', '3.0'),
('13-10328', '2', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCI 206', 'Physics for Health Sciences I', '2.2', '', '3.0'),
('13-10328', '2', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 203-S', 'Educational Technology I (Visual Aids)', '1.5', '', '3.0'),
('13-10328', '2', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'ENGL 202', 'Literature of the World', '2.0', '', '3.0'),
('13-10328', '2', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCI 202', 'Biological Science II (Botany)', '1.8', '', '5.0'),
('13-10328', '2', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCI 204', 'Cell Biology', '2.4', '', '3.0'),
('13-10328', '2', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'SSCIE 201-S3', 'Society and Culture with Family Planning', '2.2', '', '3.0'),
('13-10328', '2', '2013-2014 ', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 302-F', 'The Teaching Profession', '1.2', '', '3.0'),
('13-10328', '1', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'NSCI 101', 'Earth Science', '1.8', '', '3.0'),
('13-10328', '1', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'SCIE 201-1S', 'Inorganic Chemistry', '2.6', '', '5.0'),
('13-10328', '1', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 301-S', 'Field Study I', '1.6', '', '3.0'),
('13-10328', '1', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'SCIE 303', 'Science Research', '2.2', '', '3.0'),
('13-10328', '1', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 307-2S', 'Educational Technology II', '2.1', '', '3.0'),
('13-10328', '1', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'SCIE 301', 'Organic Chemistry', '2.6', '', '5.0'),
('13-10328', '1', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCIE 303', 'Physics for Health Sciences II', '1.9', '', '5.0'),
('13-10328', '1', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 305', 'Assessment of Student Learning I', '1.5', '', '3.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'NSCI 102', 'Earth and Environmental Science', '2.1', '', '3.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'NSCI 102', 'Earth and Environmental Science', '2.1', '', '2.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 208-3S', 'Social Dimensions in Education', '1.8', '', '3.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCIE 302', 'BioChemistry', '2.7', '', '3.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCIE 302', 'BioChemistry', '2.7', '', '2.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'SCIE 302', 'Analytical Chemistry', '2.7', '', '3.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'SCIE 302', 'Analytical Chemistry', '2.7', '', '2.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 308-4F', 'Curriculum Development', '1.7', '', '3.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 304', 'Assessment of Student Learning II', '1.5', '', '3.0'),
('13-10328', '2', '2014-2015', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 306', 'Special Topic', '1.2', '', '3.0'),
('13-10328', 'sum', '2015', 'BSED', 'BIOLOGICAL SCIENCES', 'ED 201 ( R )', 'Facilitating Human Learning', '1.6', '', '3.0'),
('13-10328', 'sum', '2015', 'BSED', 'BIOLOGICAL SCIENCES', 'ED 202 ( R )', 'Principles of Teaching', '1.3', '', '3.0'),
('13-10328', '1', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 401', 'Field Study II', '1.3', '', '3.0'),
('13-10328', '1', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 205-S4F', 'Child and Adolescent Development', '1.8', '', '3.0'),
('13-10328', '1', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'SCIE 403', 'Ecology', '2.1', '', '3.0'),
('13-10328', '1', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'SCIE 403', 'Ecology', '2.1', '', '2.0'),
('13-10328', '1', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCI 401', 'Genetics', '2.0', '', '3.0'),
('13-10328', '1', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCI 401', 'Genetics', '2.0', '', '1.0'),
('13-10328', '1', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCI 403', 'Biotechniques', '1.4', '', '2.0'),
('13-10328', '1', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'BIOSCI 403', 'Biotechniques', '1.4', '', '1.0'),
('13-10328', '2', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 402', 'Student Teaching', '1.1', '', '6.0'),
('13-10328', '2', '2015-2016', 'BSED', 'BIOLOGICAL SCIENCES', 'EDUC 404', 'Seminar in Education', '2.3', '', '(3.0)'),
('97-10291', '1', '1997-1998 ', 'BEED', 'MATHEMATICS', 'Math 1', 'Basic Mathematics I', '1.6', '', '3'),
('97-10291', '1', '1997-1998 ', 'BEED', 'MATHEMATICS', 'Fili 1', 'Gamiting Filipino, Komposisyon at Pagbasa', '2', '', '3'),
('97-10291', '1', '1997-1998 ', 'BEED', 'MATHEMATICS', 'Eng 3', 'Developmental Reading', '1.5', '', '3'),
('97-10291', '1', '1997-1998 ', 'BEED', 'MATHEMATICS', 'Human 1', 'Art Education', '1.4', '', '3'),
('97-10291', '1', '1997-1998 ', 'BEED', 'MATHEMATICS', 'ProfEd 1', 'Human Growth Learning and Development', '2.2', '', '3'),
('97-10291', '1', '1997-1998 ', 'BEED', 'MATHEMATICS', 'ProfEd 2', 'Sociological, Psychological, Anthropological Found', '2.3', '', '3'),
('97-10291', '2', '1997-1998 ', 'BEED', 'MATHEMATICS', 'Human 2', 'Fundamentals of Music', '2.1', '', '3'),
('97-10291', '2', '1997-1998 ', 'BEED', 'MATHEMATICS', 'Math 6', 'Plane and Solid Geometry', '3', '', '3'),
('97-10291', '2', '1997-1998 ', 'BEED', 'MATHEMATICS', 'Fili 4', 'Filipino sa Tanging Gamit', '2.5', '', '3'),
('97-10291', '2', '1997-1998 ', 'BEED', 'MATHEMATICS', 'ProfEd 3', 'Historical, Philosophical, and Legal Foundation', '2', '', '3'),
('97-10291', '2', '1997-1998 ', 'BEED', 'MATHEMATICS', 'SocSci 6', 'Health Education - Personal and Community Hygiene', '1.8', '', '3'),
('97-10291', '2', '1997-1998 ', 'BEED', 'MATHEMATICS', 'Fili 2', 'Kasanayan/Sining ng Pakikipagtalastasan', '1.9', '', '3'),
('97-10291', '2', '1997-1998 ', 'BEED', 'MATHEMATICS', 'Math 2', 'Basic Mathematics II', '2.4', '', '3'),
('97-10291', '1', '1998-1999', 'BEED', 'MATHEMATICS', 'Math 9', 'Introduction to Computers', '1.8', '', '3'),
('97-10291', '1', '1998-1999', 'BEED', 'MATHEMATICS', 'Math 8', 'Fundamental Concepts of Mathematics', '2.6', '', '3'),
('97-10291', '1', '1998-1999', 'BEED', 'MATHEMATICS', 'ProfEd 5A', 'Teaching Strategies I for BEED/DET', 'INC', '2.3', '3'),
('97-10291', '1', '1998-1999', 'BEED', 'MATHEMATICS', 'PrArts 1', 'Home Economics and Livelihood Education I', 'INC', '2.2', '3'),
('97-10291', '1', '1998-1999', 'BEED', 'MATHEMATICS', 'Eng 12', 'Teaching Children\'s Literature', '1.9', '', '3'),
('97-10291', '1', '1998-1999', 'BEED', 'MATHEMATICS', 'Math 4', 'Plane and Spherical Trigonometry', '2.9', '', '3'),
('97-10291', '1', '1998-1999', 'BEED', 'MATHEMATICS', 'Human 3', 'Phil. Music incl. Material and Method of Music Ins', '1.9', '', '3'),
('97-10291', '1', '1998-1999', 'BEED', 'MATHEMATICS', 'ProfEd 6', 'Guidance and Counseling incl. SPED', '1.8', '', '3'),
('97-10291', '2', '1998-1999 ', 'BEED', 'MATHEMATICS', 'ProfEd 5B', 'Teaching Strategies II for BEED/DET', 'INC', '2.4', '3'),
('97-10291', '2', '1998-1999 ', 'BEED', 'MATHEMATICS', 'ProfEd 5C', 'Teaching Strategies III for BEED/DET', 'INC', '2.5', '3'),
('97-10291', '2', '1998-1999 ', 'BEED', 'MATHEMATICS', 'ProfEd 4', 'Principles of Teaching and Educational Technology', '1.9', '', '3'),
('97-10291', '2', '1998-1999 ', 'BEED', 'MATHEMATICS', 'Math 10', 'Probability and Statistics', '2.9', '', '3'),
('97-10291', '2', '1998-1999 ', 'BEED', 'MATHEMATICS', 'Eng 8(O)', 'Effective Writing including Business Correspondenc', 'INC', '2.8', '3'),
('97-10291', '2', '1998-1999 ', 'BEED', 'MATHEMATICS', 'ProfEd 7', 'Measurement and Evaluation incl. Research', '2.7', '', '3'),
('97-10291', '2', '1998-1999 ', 'BEED', 'MATHEMATICS', 'PrArts 2', 'Home Economics and Livelihood Education II', 'INC', '2.2', '3'),
('97-10291', '2', '1998-1999 ', 'BEED', 'MATHEMATICS', 'SocPhil 2', 'Institution and Ideologies', '2.3', '', '3'),
('97-10291', '1', '2000-2001', 'BEED', 'MATHEMATICS', 'ProfEd 9', 'NFE and Community Organization', '2.1', '', '3'),
('97-10291', '1', '2000-2001', 'BEED', 'MATHEMATICS', 'SocSci 11', 'Logic', '2.3', '', '3'),
('97-10291', '1', '2000-2001', 'BEED', 'MATHEMATICS', 'Eng 2', 'Communication Arts II', '2.3', '', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personalbackground_tbl`
--
ALTER TABLE `personalbackground_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personalbackground_tbl`
--
ALTER TABLE `personalbackground_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
