-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 15, 2022 at 09:38 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ershad2`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadmic_advising`
--

CREATE TABLE `acadmic_advising` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `collage` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `sex` enum('famale','male') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `adviderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acadmic_advising_committee`
--

CREATE TABLE `acadmic_advising_committee` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` enum('female','male') NOT NULL,
  `collage` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `advising_file`
--

CREATE TABLE `advising_file` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_birth` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `psychiatric_disorders__syndromes` varchar(255) NOT NULL,
  `incurable_diseases` varchar(255) NOT NULL,
  `chronic_diseases` varchar(255) NOT NULL,
  `special_care` varchar(255) NOT NULL,
  `father_alive` varchar(255) NOT NULL,
  `mother_alive` varchar(255) NOT NULL,
  `number_brother_sister` varchar(255) NOT NULL,
  `order_student_on_family` varchar(255) NOT NULL,
  `Parents_status` varchar(255) NOT NULL,
  `Father_educational_level` varchar(255) NOT NULL,
  `Mother_educational_level` varchar(255) NOT NULL,
  `father_southern_border` varchar(255) NOT NULL,
  `injured_the_southern_border` varchar(255) NOT NULL,
  `southern_border` varchar(255) NOT NULL,
  `father_profession` varchar(255) NOT NULL,
  `mother_job` varchar(255) NOT NULL,
  `family_income` varchar(255) NOT NULL,
  `type_home` varchar(255) NOT NULL,
  `house_ownership` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id_complaint` int(10) UNSIGNED NOT NULL,
  `complaint_subject` varchar(255) NOT NULL,
  `complaint_text` text NOT NULL,
  `date` datetime NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(10) UNSIGNED NOT NULL,
  `duration` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `acadmic_advising_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notfication`
--

CREATE TABLE `notfication` (
  `id` int(10) UNSIGNED NOT NULL,
  `notification_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `acadimic_advising_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `metting_id` int(11) NOT NULL,
  `reserve_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `collage` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `sex` enum('male','female') NOT NULL,
  `studentid` int(11) NOT NULL,
  `gpa` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `plan_hours` varchar(255) DEFAULT NULL,
  `reamin_hours` varchar(255) DEFAULT NULL,
  `pass_hours` varchar(255) DEFAULT NULL,
  `register_hours` varchar(255) DEFAULT NULL,
  `adviser_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_plan`
--

CREATE TABLE `student_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `GPA` int(11) NOT NULL,
  `remain_courses` int(11) NOT NULL,
  `registered_courses` int(11) NOT NULL,
  `passed_courses` int(11) NOT NULL,
  `remain_hours` int(11) NOT NULL,
  `registered_hours` int(11) NOT NULL,
  `passed_hours` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acadmic_advising`
--
ALTER TABLE `acadmic_advising`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acadmic_advising_committee`
--
ALTER TABLE `acadmic_advising_committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advising_file`
--
ALTER TABLE `advising_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id_complaint`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notfication`
--
ALTER TABLE `notfication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`full_name`);

--
-- Indexes for table `student_plan`
--
ALTER TABLE `student_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acadmic_advising`
--
ALTER TABLE `acadmic_advising`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acadmic_advising_committee`
--
ALTER TABLE `acadmic_advising_committee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advising_file`
--
ALTER TABLE `advising_file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id_complaint` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notfication`
--
ALTER TABLE `notfication`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_plan`
--
ALTER TABLE `student_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_plan`
--
ALTER TABLE `student_plan`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
