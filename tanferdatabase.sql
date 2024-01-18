

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



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

-- --------------------------------------------------------

--
-- Table structure for table `schoolreg`
--

CREATE TABLE `schoolreg` (
  `id` int(11) NOT NULL,
  `level_of_school` varchar(255) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `Gcounty` varchar(255) DEFAULT NULL,
  `Gsubcounty` varchar(255) DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender_accepted` varchar(255) DEFAULT NULL,
  `mode_of_schooling` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `school_fees` int(11) DEFAULT NULL,
  `diet_type` varchar(255) DEFAULT NULL,
  `medical_facility` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `education_office_response` varchar(1000) DEFAULT NULL,
  `education_office_response_doc` varchar(1000) DEFAULT NULL,
  `schoolResponse` varchar(255) DEFAULT NULL,
  `schoolResponse_doc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eduofficeregistration`
--
ALTER TABLE `eduofficeregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolreg`
--
ALTER TABLE `schoolreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentregistration`
--
ALTER TABLE `studentregistration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- Indexes for table `studenttransferregistration`
--
ALTER TABLE `studenttransferregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eduofficeregistration`
--
ALTER TABLE `eduofficeregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schoolreg`
--
ALTER TABLE `schoolreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2244;

--
-- AUTO_INCREMENT for table `studentregistration`
--
ALTER TABLE `studentregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `studenttransferregistration`
--
ALTER TABLE `studenttransferregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;


