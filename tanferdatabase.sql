-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 01:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanferdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `eduofficeregistration`
--

CREATE TABLE `eduofficeregistration` (
  `id` int(11) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `sub_county` varchar(255) NOT NULL,
  `OfficeContact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eduofficeregistration`
--

INSERT INTO `eduofficeregistration` (`id`, `office_name`, `registration_number`, `county`, `sub_county`, `OfficeContact`, `email`, `password`) VALUES
(1, 'buuri', 'admin', 'Meru', 'Buuri', '', 'Maganaalex634@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `gofficeregistration`
--

CREATE TABLE `gofficeregistration` (
  `id` int(11) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `registrationNumber` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `sub_county` varchar(50) NOT NULL,
  `office_contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gofficeregistration`
--

INSERT INTO `gofficeregistration` (`id`, `office_name`, `registrationNumber`, `county`, `sub_county`, `office_contact`, `email`, `password`) VALUES
(1, '', '', 'Choose a county', 'chooseSubCounty', '', '', ''),
(2, 'Alex Magana', '3456ertyusdfgh', 'Lamu', 'Lamu East', '23456', 'Maganaalex634@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `schooladminresponses`
--

CREATE TABLE `schooladminresponses` (
  `id` int(11) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `response_type` varchar(255) NOT NULL,
  `response_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schoolreg`
--

CREATE TABLE `schoolreg` (
  `id` int(25) NOT NULL,
  `level_of_school` text NOT NULL,
  `school_name` text NOT NULL,
  `school_location` varchar(25) NOT NULL,
  `registration_number` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL DEFAULT '',
  `gender_accepted` text NOT NULL,
  `mode_of_schooling` text NOT NULL,
  `email_address` varchar(25) NOT NULL,
  `phone_number` varchar(25) DEFAULT NULL,
  `address` varchar(25) NOT NULL,
  `postal_code` varchar(25) NOT NULL,
  `school_fees` int(25) NOT NULL,
  `diet_type` text NOT NULL,
  `medical_facility` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolreg`
--

INSERT INTO `schoolreg` (`id`, `level_of_school`, `school_name`, `school_location`, `registration_number`, `password`, `gender_accepted`, `mode_of_schooling`, `email_address`, `phone_number`, `address`, `postal_code`, `school_fees`, `diet_type`, `medical_facility`) VALUES
(12, 'Secondary School', 'St Paul\'s University Limuru', 'limuru', '12345', '12345qwert', 'Boys', 'Boys', 'Maganaalex634@gmail.com', '0748027123', '1072', '60200', 12345678, 'Normal diet to all student', 'Available School Hospital'),
(13, 'Primary School', 'spu', 'limuru', 'lmr', '1234', 'Mixed', '', 'Maganaalex634@gmail.com', '0748027123', '1072', '60200', 1234567, 'Normal diet to all student', 'Available School Hospital'),
(14, '', '', '', '', '', '', '', '', '', '', '', 0, '', ''),
(15, 'Primary School', 'spu', 'limuru', 'bgre2345', '543trew', 'Mixed', 'Girls', 'Maganaalex634@gmail.com', '0748027123', '1072', '60200', 8765432, 'Normal diet to all student', 'Referral Hospital Near the School'),
(16, 'University/Collage', 'spu', 'limuru', 'admin', '1234', 'Mixed', 'Girls', 'Maganaalex634@gmail.com', '0748027123', '1072', '60200', 1234567, 'Student pays for the special diets', 'Available School Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `id` int(25) NOT NULL,
  `level_of_school` text NOT NULL,
  `name` text NOT NULL,
  `registration_number` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`id`, `level_of_school`, `name`, `registration_number`, `password`) VALUES
(17, 'University/College', 'alex', 'admin', '1234'),
(21, 'High School', 'John Doe', 'ABC123', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `studentregistration`
--

CREATE TABLE `studentregistration` (
  `id` int(11) NOT NULL,
  `level_of_school` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `registration_number` varchar(50) DEFAULT NULL,
  `currentSchool` varchar(255) DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `subCounty` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `studentContact` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentregistration`
--

INSERT INTO `studentregistration` (`id`, `level_of_school`, `name`, `registration_number`, `currentSchool`, `county`, `subCounty`, `gender`, `studentContact`, `email`, `password`, `ProfilePicture`) VALUES
(10, 'University/College', 'Alex Magana', 'admin', 'st pauls university', 'Kiambu', 'Limuru', 'Male', '0748027123', 'Maganaalex634@gmail.com', '1234', NULL),
(11, 'University/College', 'magana alex', 'admin2', '1234', 'Meru', 'Buuri', 'Male', '0797387302', 'Maganaalex634@gmail.com', '1234', 'magana-removebg.png'),
(12, 'Secondary School', 'magana alex', 'admin3', 'kibirichia boys', 'Kajiado', 'Kajiado Central', 'Male', '0710416739', 'Maganaalex634@gmail.com', '1234', 'admin3.jpg'),
(13, 'University/College', 'muriungi magana', 'admin4', 'st pauls university', 'Kiambu', 'Limuru', 'Choose opt', '0748027123', 'Maganaalex634@gmail.com', '1234', 'admin4.png'),
(14, 'University/College', 'Alex Magana', 'adminadmin', 'st pauls university', 'Kiambu', 'Limuru', 'Male', '0748027123', 'Maganaalex634@gmail.com', 'admin', 'adminadmin.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `studenttranfers`
--

CREATE TABLE `studenttranfers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `previous_school` text NOT NULL,
  `date_of_transfer` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studenttranfers`
--

INSERT INTO `studenttranfers` (`id`, `name`, `previous_school`, `date_of_transfer`, `status`) VALUES
(1, 'magana alex', 'kibirichia boys', '0000-00-00', 'tranferd'),
(2, 'denis', 'mucheene', '2023-06-05', 'tranferd'),
(3, 'denis', 'mucheene', '2023-06-05', 'tranferd'),
(4, 'denis', 'mucheene', '2023-06-05', 'tranferd'),
(5, 'denis', 'mucheene', '2023-06-05', 'tranferd'),
(6, 'denis', 'mucheene', '2023-06-05', 'tranferd'),
(7, 'denis', 'mucheene', '2023-06-05', 'tranferd'),
(9, 'alex', 'kibirichia', '2000-06-08', 'tranferd'),
(10, 'alex', 'kibirichia', '2000-06-08', 'tranferd'),
(11, 'alex', 'kibirichia', '2000-06-08', 'tranferd'),
(12, 'alex', 'kibirichia', '2000-06-08', 'tranferd'),
(13, 'alex', 'kibirichia', '2000-06-08', 'tranferd');

-- --------------------------------------------------------

--
-- Table structure for table `studenttransferregistration`
--

CREATE TABLE `studenttransferregistration` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `registration_number` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `previous_school_name` varchar(255) DEFAULT NULL,
  `county` varchar(255) DEFAULT NULL,
  `subcounty` varchar(255) DEFAULT NULL,
  `previous_school_phone_number` varchar(20) DEFAULT NULL,
  `previous_school_email` varchar(255) DEFAULT NULL,
  `intended_school_name` varchar(255) DEFAULT NULL,
  `intended_school_county` varchar(255) DEFAULT NULL,
  `intended_school_subcounty` varchar(255) DEFAULT NULL,
  `intended_school_phone_number` varchar(20) DEFAULT NULL,
  `intended_school_email` varchar(255) DEFAULT NULL,
  `transfer_reason` text DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `parent_phone_number` varchar(20) DEFAULT NULL,
  `parent_email` varchar(255) DEFAULT NULL,
  `parent_id_number` varchar(50) DEFAULT NULL,
  `parent_reason_for_transfer` text DEFAULT NULL,
  `parent_idpp` varchar(50) DEFAULT NULL,
  `parent_address` varchar(255) DEFAULT NULL,
  `parent_phone_number_p` varchar(20) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `ApplicationLetterPdf` varchar(255) DEFAULT NULL,
  `clearanceFormPDF` varchar(255) DEFAULT NULL,
  `TranferAprovalPDF` varchar(255) DEFAULT NULL,
  `identificationPDF` varchar(255) DEFAULT NULL,
  `IntededSchoolResponse` varchar(1000) DEFAULT NULL,
  `education_office_response` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studenttransferregistration`
--

INSERT INTO `studenttransferregistration` (`id`, `full_name`, `grade`, `phone_number`, `email`, `registration_number`, `date_of_birth`, `previous_school_name`, `county`, `subcounty`, `previous_school_phone_number`, `previous_school_email`, `intended_school_name`, `intended_school_county`, `intended_school_subcounty`, `intended_school_phone_number`, `intended_school_email`, `transfer_reason`, `parent_name`, `parent_phone_number`, `parent_email`, `parent_id_number`, `parent_reason_for_transfer`, `parent_idpp`, `parent_address`, `parent_phone_number_p`, `transfer_date`, `ApplicationLetterPdf`, `clearanceFormPDF`, `TranferAprovalPDF`, `identificationPDF`, `IntededSchoolResponse`, `education_office_response`) VALUES
(1, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'ABC121', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', ''),
(2, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'ABC122', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', ''),
(3, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'admin2', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(4, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'ABC124', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', ''),
(5, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'ABC125', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(6, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'admin2', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(7, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'admin3', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(8, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'admin', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(9, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'admin', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(10, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'ABC12334', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(11, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'ABC123789', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(12, 'magana alex', '10', '+1234567890', 'johndoe@example.com', 'admin2', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(13, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'ABC12455', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(14, 'John Doe', '10', '+1234567890', 'johndoe@example.com', 'ABC123', '2005-05-15', 'Previous School ABC', 'County A', 'Subcounty X', '+9876543210', 'previousschool@example.com', 'Intended School XYZ', 'County B', 'Subcounty Y', '+5555555555', 'intendedschool@example.com', 'Transfer Reason Details', 'Jane Doe', '+1111111111', 'janedoe@example.com', '123456789', 'Parent Reason for Transfer', '123ABC', '123 Main St, City, Country', '+9999999999', '2023-11-02', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf', '', NULL),
(18, 'Alex Magana', '4', '0748027123', 'Maganaalex634@gmail.com', 'admin4', '2000-09-09', 'St pauls university', 'Kericho', 'Ainamoi', '0797387302', 'bsclmr183021@spu.ac.ke', 'cisco networking acardemy', 'Kericho', 'Ainamoi', '0748027123', 'Maganaalex634@gmail.com', 'i want to father my studies', 'Alex Magana', '0748027123', 'Maganaalex634@gmail.com', 'he wanted to further his studies', '', '234567876', '1072', '0748027123', '2023-10-23', 'Threat Analysis.pdf', 'Assignment 1.pdf', 'CSC 3142 KNOWLEDGE MANAGEMENT CAT 1 - 12TH OCT 2023.pdf', 'Threat Analysis.pdf', 'you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved yo', 'hhjhbhbhjjbnv hj b viughguvyuhjnmvbh bv  bhjnbojbuigjbyuhvyugyigbyuhkjhohohuhuyh9iohu9hnuihuigilkugbiybuig7guig7g7ykhghgkhghgjkgv79v yyvhbgu9h8-yuhiugu'),
(19, 'magana alex', '4', '0748027123', 'Maganaalex634@gmail.com', 'admin5', '2000-09-09', 'St pauls university', 'Kakamega', 'Kakamega North', '0797387302', 'bsclmr183021@spu.ac.ke', 'cisco networking acardemy', 'Kakamega', 'Kakamega North', '0748027123', 'Maganaalex634@gmail.com', 'i want to father my studies', 'Alex Magana', '0748027123', 'Maganaalex634@gmail.com', 'he wanted to further his studies', '', '234567876', '1072', '0748027123', '2023-10-23', 'Threat Analysis.pdf', 'Assignment 1.pdf', 'CSC 3142 KNOWLEDGE MANAGEMENT CAT 1 - 12TH OCT 2023.pdf', 'Threat Analysis.pdf', 'you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved you have been approved ', '// File: MyTable.al table 50100 \"My Table\" {     DataClassification = ToBeClassified;      DataClassificationFields     {         const Integer = \"My Field1\";     }      fields     {         field(1; \"My Field1\"; Code[10])         {             DataClassification = ToBeClassified;         }                  field(2; \"My Field2\"; Text[100])         {             DataClassification = ToBeClassified;         }     }      keys     {         key(PK; \"My Field1\")         {             Clustered = true;         }     } }  // File: MyPage.al page 50100 \"My Page\" {     PageType = Card;     SourceTable = \"My Table\";     ApplicationArea = All;      layout     {         area(content)         {             repeater(Group)             {                 field(\"My Field1\"; \"My Field1\")                 {                 }                  field(\"My Field2\"; \"My Field2\")                 {                 }             }         }     } }'),
(28, 'Alex Magana', '4th year', '0748027123', 'Maganaalex634@gmail.com', 'adminadmin', '2000-09-09', 'kibirichia boys secondary school', 'Kiambu', 'Limuru', '0797387302', 'alexmagana987@gmail.com', 'St Pauls University', 'Kiambu', 'Limuru', '0748027123', 'bsclmr183021@spu.ac.ke', 'I have graduated from secondary school to university education ', 'Edward Muriungi', '0720793102', 'maganaalex99@outlook.com', 'he is proceeding with his education', '', '20664052', 'Kiambu Road', '0748027123', '2023-12-11', 'adminadmin_1700369771.pdf', 'adminadmin_1700369771.pdf', 'adminadmin_1700369771.pdf', 'adminadmin_1700369771.pdf', 'No ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo Response', 'No ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo ResponseNo Response');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_requests`
--

CREATE TABLE `transfer_requests` (
  `id` int(11) NOT NULL,
  `full_Name` varchar(255) DEFAULT NULL,
  `Year_of_Study` int(11) DEFAULT NULL,
  `student_phone` varchar(15) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `parent_phone` varchar(15) DEFAULT NULL,
  `parent_email` varchar(255) DEFAULT NULL,
  `prev_school_name` varchar(255) DEFAULT NULL,
  `prev_school_location` varchar(255) DEFAULT NULL,
  `prev_school_phone` varchar(15) DEFAULT NULL,
  `prev_school_email` varchar(255) DEFAULT NULL,
  `intended_school_name` varchar(255) DEFAULT NULL,
  `intended_school_location` varchar(255) DEFAULT NULL,
  `intended_school_phone` varchar(15) DEFAULT NULL,
  `intended_school_email` varchar(255) DEFAULT NULL,
  `transfer_reason` text DEFAULT NULL,
  `passport_pdf` varchar(255) DEFAULT NULL,
  `clearance_form_pdf` varchar(255) DEFAULT NULL,
  `transfer_approval_pdf` varchar(255) DEFAULT NULL,
  `identification_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfer_requests`
--

INSERT INTO `transfer_requests` (`id`, `full_Name`, `Year_of_Study`, `student_phone`, `student_email`, `parent_phone`, `parent_email`, `prev_school_name`, `prev_school_location`, `prev_school_phone`, `prev_school_email`, `intended_school_name`, `intended_school_location`, `intended_school_phone`, `intended_school_email`, `transfer_reason`, `passport_pdf`, `clearance_form_pdf`, `transfer_approval_pdf`, `identification_pdf`) VALUES
(1, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(2, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(3, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(4, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(5, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(6, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(7, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(8, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(9, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(10, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf'),
(11, 'John Doe', 3, '123-456-7890', 'john.doe@example.com', '987-654-3210', 'parent@example.com', 'Previous School', 'Previous School Location', '987-654-3210', 'previous.school@example.com', 'Intended School', 'Intended School Location', '123-456-7890', 'intended.school@example.com', 'Reason for Transfer', 'passport.pdf', 'clearance_form.pdf', 'transfer_approval.pdf', 'identification.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eduofficeregistration`
--
ALTER TABLE `eduofficeregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gofficeregistration`
--
ALTER TABLE `gofficeregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schooladminresponses`
--
ALTER TABLE `schooladminresponses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_response` (`registration_number`,`response_type`);

--
-- Indexes for table `schoolreg`
--
ALTER TABLE `schoolreg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Registration_code` (`registration_number`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`registration_number`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `studentregistration`
--
ALTER TABLE `studentregistration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- Indexes for table `studenttranfers`
--
ALTER TABLE `studenttranfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenttransferregistration`
--
ALTER TABLE `studenttransferregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_requests`
--
ALTER TABLE `transfer_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eduofficeregistration`
--
ALTER TABLE `eduofficeregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gofficeregistration`
--
ALTER TABLE `gofficeregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schooladminresponses`
--
ALTER TABLE `schooladminresponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolreg`
--
ALTER TABLE `schoolreg`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `studentregistration`
--
ALTER TABLE `studentregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `studenttranfers`
--
ALTER TABLE `studenttranfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `studenttransferregistration`
--
ALTER TABLE `studenttransferregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transfer_requests`
--
ALTER TABLE `transfer_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
