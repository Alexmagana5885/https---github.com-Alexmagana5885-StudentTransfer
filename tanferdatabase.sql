-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 11:25 AM
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
-- Table structure for table `schoolreg`
--

CREATE TABLE `schoolreg` (
  `id` int(25) NOT NULL,
  `level_of_school` text NOT NULL,
  `school_name` text NOT NULL,
  `school_location` varchar(25) NOT NULL,
  `registration_code` varchar(25) NOT NULL,
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

INSERT INTO `schoolreg` (`id`, `level_of_school`, `school_name`, `school_location`, `registration_code`, `password`, `gender_accepted`, `mode_of_schooling`, `email_address`, `phone_number`, `address`, `postal_code`, `school_fees`, `diet_type`, `medical_facility`) VALUES
(12, 'Secondary School', 'St Paul\'s University Limuru', 'limuru', '12345', '12345qwert', 'Boys', 'Boys', 'Maganaalex634@gmail.com', '0748027123', '1072', '60200', 12345678, 'Normal diet to all student', 'Available School Hospital'),
(13, 'Primary School', 'spu', 'limuru', '23456', '12345qwerty', 'Mixed', '', 'Maganaalex634@gmail.com', '0748027123', '1072', '60200', 1234567, 'Normal diet to all student', 'Available School Hospital');

-- --------------------------------------------------------


-- Table structure for table `studentdetails`


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
(1, 'University/College', 'Alex', 'eusjxknsty', '$2y$10$4KpitrYi27FtxwyxQz'),
(2, 'University/College', 'Alex', 'eusjxknsty5', '$2y$10$/8g4QHs8pzLwkigp9S'),
(3, 'option1', 'rtyus', 'sdarrw', '$2y$10$odoGuRaNyOXI4ThBjm'),
(4, 'University/College', 'alex', '123m', '$2y$10$kuojvfjJwoHJlK7jpn'),
(5, 'option1', 'Alex', 'eusjxknsr', '$2y$10$mvfdouSwL6Uyu5yAJF'),
(6, 'University/College', 'Alex', 'alexmagana', '$2y$10$k/2xDWjL7CVQ3dQsPI');

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
-- Indexes for table `schoolreg`
--
ALTER TABLE `schoolreg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Registration_code` (`registration_code`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`registration_number`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `studenttranfers`
--
ALTER TABLE `studenttranfers`
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
-- AUTO_INCREMENT for table `schoolreg`
--
ALTER TABLE `schoolreg`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studenttranfers`
--
ALTER TABLE `studenttranfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transfer_requests`
--
ALTER TABLE `transfer_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




CREATE TABLE student_transfer (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255),
    Grade INT,
    student_phone VARCHAR(20),
    student_email VARCHAR(255),
    RegistrationNumber VARCHAR(20),
    DateOfBirth VARCHAR(255),
    school_name VARCHAR(255),
    county VARCHAR(255),
    school_phone VARCHAR(20),
    school_email VARCHAR(255),
    intended_school_name VARCHAR(255),
    intended_school_location VARCHAR(255),
    intended_school_contact VARCHAR(20),
    intended_school_email VARCHAR(255),
    transfer_reason TEXT,
    parent_name VARCHAR(255),
    parent_phone_number VARCHAR(20),
    parent_id VARCHAR(255),
    parent_pid VARCHAR(255),
    parent_reason_for_leaving TEXT,
    passport_photo VARCHAR(255),
    clearance_form VARCHAR(255),
    transfer_approval VARCHAR(255),
    identification_doc VARCHAR(255),
    namePP VARCHAR(255),
    addressP TEXT,
    phoneNumberP VARCHAR(20),
    Date VARCHAR(255)
);
