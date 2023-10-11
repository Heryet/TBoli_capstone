-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 03:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbolidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `account_id` int(11) NOT NULL,
  `email` varchar(244) NOT NULL,
  `password` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`account_id`, `email`, `password`) VALUES
(1, 'teacher@gmail.com', '$2y$10$gBvl4ghCkj1DBckxgEA3ee22EXQvCmhBUDu6Tivr1ZpIQMr6d451G'),
(2, 'admin@gmail.com', '$2y$10$8i9MsQFQ21lGAZCZ2ETqlecPm0LEE9IMLgBlDkpMspmMYIFXu8n12'),
(3, 'awd@gmail.com', '$2y$10$c6evQyXQtPAgHmFnCOEVhO0h6hBL93aXzAgOTpR5hGAjJp0Wr2Ssi'),
(4, 'admin2@gmail.com', '$2y$10$2j5n2GdtSeGx/j.x.UIaKOVwR.uzTNuDFeQtq7fxAb/bvjWc82pAm'),
(5, 'rinan@gmail.com', '$2y$10$KEj/XDMV0nd/YIbg.KMoKuODp7zeGQ20Rm35t.rDNyPvz.O7/NKkK'),
(6, 'qwe@gmail.com', '$2y$10$PZfAohLXX9kKsILHFT3zW./Mz9uKEu.hx6CmlTkSjOCIA/O8WXCS.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `address_id` int(11) NOT NULL,
  `address` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`address_id`, `address`) VALUES
(1, 'ttrttrttr'),
(2, 'wkjlhasdgasdw'),
(3, 'bb, lagao, gensan'),
(4, 'ttrttrttr'),
(5, 'awd,awdaw'),
(6, 'general santos city');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credentials_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `user_id`, `credentials_id`, `address_id`, `level_id`, `status_id`, `account_id`) VALUES
(1, 2, 2, 2, 2, 2, 2),
(2, 4, 3, 4, 4, 4, 4),
(3, 5, 4, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `content_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`content_id`, `lesson_id`, `module_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_learner`
--

CREATE TABLE `tbl_learner` (
  `learner_id` int(11) NOT NULL,
  `lrn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guardian_info_id` int(11) NOT NULL,
  `guardian_contact_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_learner`
--

INSERT INTO `tbl_learner` (`learner_id`, `lrn`, `user_id`, `guardian_info_id`, `guardian_contact_id`, `address_id`, `level_id`, `status_id`, `account_id`) VALUES
(1, 1, 3, 1, 1, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_learner_guardian_contact`
--

CREATE TABLE `tbl_learner_guardian_contact` (
  `guardian_contact_id` int(11) NOT NULL,
  `contact_num` int(11) NOT NULL,
  `email` varchar(244) NOT NULL,
  `address` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_learner_guardian_contact`
--

INSERT INTO `tbl_learner_guardian_contact` (`guardian_contact_id`, `contact_num`, `email`, `address`) VALUES
(1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_learner_guardian_info`
--

CREATE TABLE `tbl_learner_guardian_info` (
  `guardian_info_id` int(11) NOT NULL,
  `firstname` varchar(244) NOT NULL,
  `middlename` varchar(244) NOT NULL,
  `lastname` varchar(244) NOT NULL,
  `birthday` varchar(244) NOT NULL,
  `gender` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_learner_guardian_info`
--

INSERT INTO `tbl_learner_guardian_info` (`guardian_info_id`, `firstname`, `middlename`, `lastname`, `birthday`, `gender`) VALUES
(1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_learner_id`
--

CREATE TABLE `tbl_learner_id` (
  `learner_id` int(11) NOT NULL,
  `lrn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_learner_id`
--

INSERT INTO `tbl_learner_id` (`learner_id`, `lrn`) VALUES
(1, 123121);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lesson`
--

CREATE TABLE `tbl_lesson` (
  `lesson_id` int(11) NOT NULL,
  `name` varchar(244) NOT NULL,
  `objective` text NOT NULL,
  `type` varchar(244) NOT NULL,
  `lesson_files_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lesson`
--

INSERT INTO `tbl_lesson` (`lesson_id`, `name`, `objective`, `type`, `lesson_files_id`, `added_by`) VALUES
(1, 'awdaw', 'awd', 'Literacy', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lesson_files`
--

CREATE TABLE `tbl_lesson_files` (
  `lesson_files_id` int(11) NOT NULL,
  `lesson` text NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lesson_files`
--

INSERT INTO `tbl_lesson_files` (`lesson_files_id`, `lesson`, `added_by`, `status`) VALUES
(1, '751.pdf', 1, 1),
(2, 'Agusty_2021_J._Phys.__Conf._Ser._2110_012016.pdf', 1, 1),
(3, 'Abad-Varquez_GenMathPT1_4thQ.pdf', 1, 2),
(4, 'TheKnowledgeandBehaviorLevelsoftheStudentsTakingDisasterAwarenessTrainingTheExampleofTekirdaProvinceTurkey.pdf', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE `tbl_module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(244) NOT NULL,
  `module_description` text NOT NULL,
  `category` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`module_id`, `module_name`, `module_description`, `category`) VALUES
(1, ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz`
--

CREATE TABLE `tbl_quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_overview_id` int(11) NOT NULL,
  `quiz_options_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_options`
--

CREATE TABLE `tbl_quiz_options` (
  `quiz_options_id` int(11) NOT NULL,
  `release_grade` varchar(244) NOT NULL,
  `timed` tinyint(1) NOT NULL,
  `instant_feedback` tinyint(1) NOT NULL,
  `randomize` tinyint(1) NOT NULL,
  `allow_review` tinyint(1) NOT NULL,
  `grading_option` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_overview`
--

CREATE TABLE `tbl_quiz_overview` (
  `quiz_overview_id` int(11) NOT NULL,
  `title` varchar(244) NOT NULL,
  `max_score` int(11) NOT NULL,
  `category` varchar(244) NOT NULL,
  `start` datetime NOT NULL,
  `module` varchar(244) NOT NULL,
  `allow_late` tinyint(1) NOT NULL,
  `grading` varchar(244) NOT NULL,
  `due` datetime NOT NULL,
  `grading_score` varchar(244) NOT NULL,
  `instructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers`
--

CREATE TABLE `tbl_teachers` (
  `teacher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credentials_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `valid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_teachers`
--

INSERT INTO `tbl_teachers` (`teacher_id`, `user_id`, `credentials_id`, `address_id`, `level_id`, `status_id`, `account_id`, `valid_id`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1),
(2, 6, 5, 6, 6, 6, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_valid`
--

CREATE TABLE `tbl_teacher_valid` (
  `valid_id` int(11) NOT NULL,
  `id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_teacher_valid`
--

INSERT INTO `tbl_teacher_valid` (`valid_id`, `id`) VALUES
(1, '64a7b4da409ec_Image_20230704_125627_922.jpeg'),
(2, '64a8b8538fbb4_giphy.gif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usercredentials`
--

CREATE TABLE `tbl_usercredentials` (
  `usercredentials_id` int(11) NOT NULL,
  `email` varchar(244) NOT NULL,
  `contact` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usercredentials`
--

INSERT INTO `tbl_usercredentials` (`usercredentials_id`, `email`, `contact`) VALUES
(1, 'awd@gmail.com', 1231231),
(2, 'admin@gmail.com', 9088123812),
(3, 'admin2@gmail.com', 12312),
(4, 'awd@gmail.com', 12312),
(5, 'qwe@gmail.com', 12311221);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userinfo`
--

CREATE TABLE `tbl_userinfo` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(244) NOT NULL,
  `middlename` varchar(244) NOT NULL,
  `lastname` varchar(244) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userinfo`
--

INSERT INTO `tbl_userinfo` (`user_id`, `firstname`, `middlename`, `lastname`, `birthday`, `gender`) VALUES
(1, 'teacher', 'XD', 'student', '2023-07-07', 'female'),
(2, 'ryan', 'Watapampa', 'xd', '2023-07-08', 'male'),
(3, 'Ryan', 'XD', 'watampa', '2023-07-07', 'male'),
(4, 'Ryan', 'awd', 'student', '2023-07-07', 'male'),
(5, 'rinan', 'awd', 'pakyu', '2023-07-07', 'male'),
(6, 'awd', 'awd', 'lastname', '2023-07-08', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `level_id` int(11) NOT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`level_id`, `level`) VALUES
(1, 'TEACHER'),
(2, 'ADMIN'),
(3, 'LEARNER'),
(4, 'ADMIN'),
(5, 'ADMIN'),
(6, 'TEACHER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_status`
--

CREATE TABLE `tbl_user_status` (
  `status_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_status`
--

INSERT INTO `tbl_user_status` (`status_id`, `status`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `credentials_id` (`credentials_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `tbl_learner`
--
ALTER TABLE `tbl_learner`
  ADD PRIMARY KEY (`learner_id`),
  ADD KEY `learners_id` (`lrn`),
  ADD KEY `guardian_info_id` (`guardian_info_id`),
  ADD KEY `guardian_contact_id` (`guardian_contact_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `tbl_learner_guardian_contact`
--
ALTER TABLE `tbl_learner_guardian_contact`
  ADD PRIMARY KEY (`guardian_contact_id`);

--
-- Indexes for table `tbl_learner_guardian_info`
--
ALTER TABLE `tbl_learner_guardian_info`
  ADD PRIMARY KEY (`guardian_info_id`);

--
-- Indexes for table `tbl_learner_id`
--
ALTER TABLE `tbl_learner_id`
  ADD PRIMARY KEY (`learner_id`);

--
-- Indexes for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `lesson_files_id` (`lesson_files_id`);

--
-- Indexes for table `tbl_lesson_files`
--
ALTER TABLE `tbl_lesson_files`
  ADD PRIMARY KEY (`lesson_files_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `quiz_overview_id` (`quiz_overview_id`),
  ADD KEY `quiz_options_id` (`quiz_options_id`);

--
-- Indexes for table `tbl_quiz_options`
--
ALTER TABLE `tbl_quiz_options`
  ADD PRIMARY KEY (`quiz_options_id`);

--
-- Indexes for table `tbl_quiz_overview`
--
ALTER TABLE `tbl_quiz_overview`
  ADD PRIMARY KEY (`quiz_overview_id`);

--
-- Indexes for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `credentials_id` (`credentials_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `valid_id` (`valid_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `tbl_teacher_valid`
--
ALTER TABLE `tbl_teacher_valid`
  ADD PRIMARY KEY (`valid_id`);

--
-- Indexes for table `tbl_usercredentials`
--
ALTER TABLE `tbl_usercredentials`
  ADD PRIMARY KEY (`usercredentials_id`);

--
-- Indexes for table `tbl_userinfo`
--
ALTER TABLE `tbl_userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `tbl_user_status`
--
ALTER TABLE `tbl_user_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_learner`
--
ALTER TABLE `tbl_learner`
  MODIFY `learner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_learner_guardian_contact`
--
ALTER TABLE `tbl_learner_guardian_contact`
  MODIFY `guardian_contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_learner_guardian_info`
--
ALTER TABLE `tbl_learner_guardian_info`
  MODIFY `guardian_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_learner_id`
--
ALTER TABLE `tbl_learner_id`
  MODIFY `learner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lesson_files`
--
ALTER TABLE `tbl_lesson_files`
  MODIFY `lesson_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_module`
--
ALTER TABLE `tbl_module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quiz_options`
--
ALTER TABLE `tbl_quiz_options`
  MODIFY `quiz_options_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quiz_overview`
--
ALTER TABLE `tbl_quiz_overview`
  MODIFY `quiz_overview_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_teacher_valid`
--
ALTER TABLE `tbl_teacher_valid`
  MODIFY `valid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_usercredentials`
--
ALTER TABLE `tbl_usercredentials`
  MODIFY `usercredentials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_userinfo`
--
ALTER TABLE `tbl_userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_status`
--
ALTER TABLE `tbl_user_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_admin_ibfk_2` FOREIGN KEY (`credentials_id`) REFERENCES `tbl_usercredentials` (`usercredentials_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_admin_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `tbl_address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_admin_ibfk_4` FOREIGN KEY (`level_id`) REFERENCES `tbl_user_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_admin_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `tbl_user_status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_admin_ibfk_6` FOREIGN KEY (`account_id`) REFERENCES `tbl_accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD CONSTRAINT `tbl_content_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `tbl_lesson` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_content_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `tbl_module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_learner`
--
ALTER TABLE `tbl_learner`
  ADD CONSTRAINT `tbl_learner_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `tbl_learner_id` (`learner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_learner_ibfk_2` FOREIGN KEY (`guardian_info_id`) REFERENCES `tbl_learner_guardian_info` (`guardian_info_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_learner_ibfk_3` FOREIGN KEY (`guardian_contact_id`) REFERENCES `tbl_learner_guardian_contact` (`guardian_contact_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_learner_ibfk_4` FOREIGN KEY (`address_id`) REFERENCES `tbl_address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_learner_ibfk_5` FOREIGN KEY (`level_id`) REFERENCES `tbl_user_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_learner_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `tbl_userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_learner_ibfk_7` FOREIGN KEY (`status_id`) REFERENCES `tbl_user_status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_learner_ibfk_8` FOREIGN KEY (`account_id`) REFERENCES `tbl_accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD CONSTRAINT `tbl_lesson_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lesson_ibfk_2` FOREIGN KEY (`lesson_files_id`) REFERENCES `tbl_lesson_files` (`lesson_files_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lesson_files`
--
ALTER TABLE `tbl_lesson_files`
  ADD CONSTRAINT `tbl_lesson_files_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  ADD CONSTRAINT `tbl_quiz_ibfk_1` FOREIGN KEY (`quiz_overview_id`) REFERENCES `tbl_quiz_overview` (`quiz_overview_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_quiz_ibfk_2` FOREIGN KEY (`quiz_options_id`) REFERENCES `tbl_quiz_options` (`quiz_options_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD CONSTRAINT `tbl_teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teachers_ibfk_2` FOREIGN KEY (`credentials_id`) REFERENCES `tbl_usercredentials` (`usercredentials_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teachers_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `tbl_address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teachers_ibfk_4` FOREIGN KEY (`level_id`) REFERENCES `tbl_user_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teachers_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `tbl_user_status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teachers_ibfk_6` FOREIGN KEY (`valid_id`) REFERENCES `tbl_teacher_valid` (`valid_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teachers_ibfk_7` FOREIGN KEY (`account_id`) REFERENCES `tbl_accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
