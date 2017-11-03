-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 07:34 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic_matters`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `phone`, `username`, `hashed_password`, `role`) VALUES
(5, 'Martin', 'Marcus', '08099321470', 'admin@gmail.com', '$2y$10$YmZlY2Y4ZDFmM2U3YjQ3NORDcvnUPXS46Tyz7FVdZIlMNz/t.MQ6i', '1');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `doctor_firstname` varchar(50) NOT NULL,
  `doctor_lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(50) NOT NULL,
  `doctor_dob` datetime NOT NULL,
  `doctor_address` varchar(255) NOT NULL,
  `doctor_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doctor_firstname`, `doctor_lastname`, `username`, `hashed_password`, `doctor_dob`, `doctor_address`, `doctor_phone`) VALUES
(3, 'Ken', 'Mbano', 'odenaja@doctor.com', 'kenfat', '1993-09-01 00:00:00', '45 Chevron drive lekki', '07034890935'),
(4, 'Murphy', 'Ray', 'murphyray@clinic.com', '$2y$10$MTRmMTY1NTY3YTVhMmIzN.zV3GP6Lrr0mY/ecWkWa.9', '1990-03-01 00:00:00', '34 Ambrose Ali Street', '2349083763299'),
(5, 'Ifedayo', 'Damilola Dee', 'ifed@yahoo.com', 'bolu', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_firstname` varchar(50) NOT NULL,
  `patient_lastname` varchar(50) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `marital_status` varchar(15) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `postal_code` varchar(15) NOT NULL,
  `date_admitted` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `illness` varchar(15) NOT NULL,
  `bill` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_firstname`, `patient_lastname`, `patient_age`, `marital_status`, `reg_no`, `gender`, `address`, `city`, `state`, `postal_code`, `date_admitted`, `email`, `illness`, `bill`) VALUES
(6, 'Misty', 'Kate', 29, 'Single', '102', 'Female', 'House 10 Kilimanjaro', 'New Jersey', 'Oakleans', '29001', '2016-04-12', 'mistyk@gmail.com', 'Typhoid', '25000.00'),
(10, 'Musty', 'Kalif', 32, 'Married', '103', 'Male', '345 Bill Clinton road', 'Georgia', 'Washington', '32901', '2016-04-29', 'mustykalif@gmail.com', 'Diabetes', '29000.00'),
(11, 'Laura', 'Lence', 30, 'Single', '104', 'Male', 'Starling road', 'Star', 'Massassuchetts', '29092', '2016-04-12', 'lauralence@hotmail.com', 'Heart Bumps', '14000.00'),
(14, 'John', 'Jonzz', 56, 'Married', '106', 'Male', '89 hunk street', 'Lagos', 'Lagos', '12003', '2016-04-30', 'johnjonzz@yahoo.com', 'Tumor', '34000.00'),
(16, 'Sam', 'Cat', 19, 'Single', '107', 'Female', 'Mountain top street', 'oakleans', 'phil', '08098', '2012-05-12', 'sam@gmail.com', 'Heart Tumor', '890000.00'),
(17, 'Carly', 'Repson', 29, 'Single', '108', 'Female', '89 june', 'May', 'Ukine', '89232', '2016-05-23', 'carly@sky.com', 'Ear disease', '41000.00'),
(23, 'Griffin', 'Grey', 22, 'Single', '105', 'Male', 'Mountain top street', 'oakleans', 'phil', '08098', '2016-04-23', 'sam@gmail.com', 'Cancer', '2000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `quest_id` int(11) NOT NULL,
  `quest_comment` varchar(255) NOT NULL,
  `written_by` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_date` date NOT NULL,
  `reported_by` varchar(100) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `statement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_date`, `reported_by`, `reg_no`, `statement`) VALUES
('0000-00-00', 'Nurse', 103, 'See the doctor'),
('2016-05-23', 'Secetary', 104, 'Use your drug');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_dob` datetime NOT NULL,
  `user_gender` varchar(15) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_state` varchar(50) NOT NULL,
  `user_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_email`, `user_dob`, `user_gender`, `user_password`, `user_type`, `user_address`, `user_state`, `user_phone`) VALUES
(2, 'Bose Sokoya', 'bosede@rocket.com', '1990-10-09 00:00:00', 'female', 'bose', 'Secetary', '9 Amoo street', 'Ojota Lagos ', '09091283811'),
(3, 'Damian', 'Dahrk@gmail.com', '1980-10-09 00:00:00', 'Male', '$2y$10$NzQ4NzlhZjQ4YzU1MWIxM.SraJNB6/XUMT8FwkEXFJO', 'Secetary', '90 Old School Street', 'Illionois', '44322292928'),
(4, 'Thea Knowles Queen', 'greenarrow@star.com', '0000-00-00 00:00:00', '', 'felicity', 'Secetary', '', '', ''),
(5, 'Samantha Charles', 'sammygirl@hotmail.com', '1990-02-23 00:00:00', 'Female', 'sammy', 'Nurse', 'Plot 5, Martins Magnus', 'Lagos', '08091827211'),
(6, 'ibbaba', 'ibbaba234@gmail.com', '1991-07-07 00:00:00', 'Male', 'assalafee', 'Nurse', 'akjcd', 'Lagos', '098378573589');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_email` (`username`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `patient_id` (`id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`quest_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_date`),
  ADD KEY `reg_no` (`reg_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
