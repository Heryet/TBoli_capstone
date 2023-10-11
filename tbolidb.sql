-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 04:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `quiz_id` int(30) NOT NULL,
  `question_id` int(30) NOT NULL,
  `option_id` int(30) NOT NULL,
  `is_right` tinyint(1) NOT NULL COMMENT ' 1 = right, 0 = wrong',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `quiz_id`, `question_id`, `option_id`, `is_right`, `date_updated`) VALUES
(5, 12, 2, 4, 32, 1, '2020-09-07 16:59:14'),
(6, 12, 2, 5, 38, 1, '2020-09-07 16:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `user_id`, `subject`, `date_updated`) VALUES
(2, 6, 'Math', '2020-09-07 12:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(30) NOT NULL,
  `quiz_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `score` int(5) NOT NULL,
  `total_score` int(5) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `quiz_id`, `user_id`, `score`, `total_score`, `date_updated`) VALUES
(3, 2, 12, 4, 4, '2020-09-07 16:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `lesson_name` varchar(255) NOT NULL,
  `lesson_objectives` text NOT NULL,
  `lesson_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `mergeddata`
-- (See below for the actual view)
--
CREATE TABLE `mergeddata` (
`lesson_id` int(11)
,`title` varchar(244)
,`lesson` text
);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(30) NOT NULL,
  `question` text NOT NULL,
  `qid` int(30) NOT NULL,
  `order_by` int(11) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `qid`, `order_by`, `date_updated`) VALUES
(4, 'asdasd ads ads f ddfg dfgg', 2, 0, '2020-09-07 14:32:18'),
(5, 'Sample Question', 2, 0, '2020-09-07 14:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `question_opt`
--

CREATE TABLE `question_opt` (
  `id` int(30) NOT NULL,
  `option_txt` text NOT NULL,
  `question_id` int(30) NOT NULL,
  `is_right` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1= right answer',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_opt`
--

INSERT INTO `question_opt` (`id`, `option_txt`, `question_id`, `is_right`, `date_updated`) VALUES
(29, 'dsfsf sdf', 4, 0, '2020-09-07 14:40:57'),
(30, 'dfdf', 4, 0, '2020-09-07 14:40:57'),
(31, ' dfd', 4, 0, '2020-09-07 14:40:57'),
(32, 'dsfsd', 4, 1, '2020-09-07 14:40:57'),
(37, 'Wrong', 5, 0, '2020-09-07 14:41:32'),
(38, 'Right', 5, 1, '2020-09-07 14:41:32'),
(39, 'Wrong', 5, 0, '2020-09-07 14:41:32'),
(40, 'Wrong', 5, 0, '2020-09-07 14:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `questions` int(11) NOT NULL,
  `points_per_item` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_list`
--

CREATE TABLE `quiz_list` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `qpoints` int(11) NOT NULL DEFAULT 1,
  `user_id` int(20) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_list`
--

INSERT INTO `quiz_list` (`id`, `title`, `qpoints`, `user_id`, `date_updated`) VALUES
(2, 'Pre-Test (Math)', 2, 6, '2020-09-07 13:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_student_list`
--

CREATE TABLE `quiz_student_list` (
  `id` int(30) NOT NULL,
  `quiz_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_student_list`
--

INSERT INTO `quiz_student_list` (`id`, `quiz_id`, `user_id`, `date_updated`) VALUES
(5, 2, 12, '2020-09-07 15:05:58'),
(6, 2, 13, '2020-09-07 15:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `level_section` varchar(100) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `level_section`, `date_updated`) VALUES
(3, 12, '2-C', '2020-09-07 14:51:25'),
(4, 13, '2-C', '2020-09-07 14:54:28');

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
(5, 'rinan@gmail.com', '$2y$10$zJIRJe8ARwa9Gx2wCgAS.uyqm3aqqkohEdca1mnGb5qIEhIbkQsqW'),
(6, 'qwe@gmail.com', '$2y$10$PZfAohLXX9kKsILHFT3zW./Mz9uKEu.hx6CmlTkSjOCIA/O8WXCS.'),
(7, 'jdm@gmail.com', '$2y$10$ZqoZ49CmLBCvqN9QIpGfW.tyDf/tU5cgUH4vKQuKa0qPVfiEJpidm'),
(8, 'student21@gmail.com', '$2y$10$yRZUXefn6yG7DMO4JQNroep7tL6zWlrT3eir52yWzI9eZI.nkk0ju'),
(9, 'teacherz@gmail.com', '$2y$10$Es/LvcKYFBSRp8ROn6x/Tufg8AQGdJZt0t1RJeZTJQbliM1DrcEjG'),
(10, 'teachera@gmail.com', '$2y$10$RnY5g14YLzaIcDId/axOKeEnCPchTxFXNOsWjAdaZiD2pOWYptk7q'),
(11, 'teacherc@gmail.com', '$2y$10$5Bozi9lCz8iQwLfyFqoQuuoCBbfropaW8JnTBZqX0eau0dOp/tvDi'),
(12, 'teacherb@gmail.com', '$2y$10$1ehPpACQ9rwml0y4y1DaIOaAlIngW08oWTNgbKc/rUFjYp/VXHMJi'),
(13, 'an@gmail.com', '$2y$10$ZDFg106pydngZZd2mWsZjOc40AUxsX5nTw0B1WJY4XkRCMrx/bvp2'),
(14, '2231', '$2y$10$ED5.yCWhLG8sSaVrOBvyU.aGOy6.2gujB2MHN/ISZ7mwEMJglE58C'),
(15, '2222', '$2y$10$9UoUNZw.hFfxTgUDv/V21.gXWF0TxeUBjM.Pqnkk96vfsMIn7p/PS'),
(16, '1111', '$2y$10$l5R1njg/4C4kCUnvXBlgU.1ZxNQYNIzlDfSJDLSkZ5vt2o6bYIDS.'),
(17, 'mynftacc269@gmail.com', '$2y$10$vrZZ43PS2GWs3D6TZl.pDerUPitSa2wTZSqTwE0mjZkgW3CtGQ.Ym'),
(26, 'pink@gmail.com', '$2y$10$YesJ5ps5u2h6HMy9LBYYO.OkBFrsFtWLPZwWThwB4sT/G0Gta5AGK'),
(27, '09352034159', '$2y$10$OYiCQVM4k.jXEdAWNGGHhubd5Jbt9ydPAvAIrT3QA3glxm0kggR4G'),
(28, 'pink@gmail.com', '$2y$10$SCAQ187xpAtARNjp23.9E.sEu5ZtAyG7BF8hPV0xBIPdR9To0mdoy'),
(29, 'pink@gmail.com', '$2y$10$B4mRrZdcvqEmhJRH4Ey5Tu57s064xccUcJ4Ep.Mwmggx70aP3m9u6'),
(30, 'lawyerpink@gmail.com', '$2y$10$lgx7tIxlHhMwjluk/J8C5.kXqz0adahgKVoxmJqCUYnvdAN6vAiq6'),
(31, 'pink@gmail.com', '$2y$10$8r.IbFRxZ/jYsGr9twPLLeDScttDHThuVSH1vd7Yjd6q7KV/C3W.O'),
(32, '', '$2y$10$zGVN/Jtq81oJOb0.qLpYLu6e4O2sRxgIHDUx14l7OkB.YFELUd9Dq'),
(33, 'red@gmail.com', '$2y$10$1o/ox1Hsts3iaFt.zPDEH.MLDsXe5JqCMyRA/VGKj7ZMNpTboyqU.'),
(34, 'hakdog@gmail.com', '$2y$10$DOiDuzd67yuAxBURrVPKg.bnW9hnnhMtBwJqJEcJTze5.WpU5EggC'),
(35, 'hakdog@gmail.com', '$2y$10$SErg0z1YMqEQNflvIZ9Msu6zXzF7pydfaeA.m0X6AZP6RhG0BNSP2'),
(36, 'pink@gmail.com', '$2y$10$nmmVk0Z93oj6ZDiyXRudLuB2V5nU9QGbfGy2tswN9BZnb7I/2iPs6'),
(37, 'angel@gmail.com', '$2y$10$dI.uYsh.NSYVEMdpYZjXPesFm2n9JAlMPFiKqUc.QgzyhNyBonBiS'),
(38, '', '$2y$10$52fZbJ9rn7umWEf1mR/0Cuh.HLz/T9UyyDM6RuXvO8iFp0RZF86j2'),
(39, '', ''),
(40, '', ''),
(41, '', '$2y$10$Rw8LpJwALeyLYwjO1MBmq.u8A.RGUe3iW..TNdFjTOysrz0W43KBu'),
(42, '', '$2y$10$5et.ZXmQpKv2CkdPWB119elIZSqvfVO8mvcgyFEC9ajSxUxaSo2Rq');

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
(6, 'general santos city'),
(7, 'wkjlhasdgasdw'),
(8, 'awdaw'),
(9, 'general santos city'),
(10, 'general santos city'),
(11, 'general santos city'),
(12, 'general santos city'),
(13, 'general santos city'),
(14, 'general santos city'),
(15, 'general santos city'),
(16, 'general santos city'),
(17, 'general santos city'),
(18, 'seoul'),
(19, 'seoul'),
(20, 'seoul'),
(21, 'seoul'),
(22, 'seoul'),
(23, 'seoul'),
(24, 'seoul'),
(25, 'seoul'),
(26, 'Hakdog'),
(27, 'Hakdog'),
(28, 'seoul'),
(29, 'seoul'),
(30, 'seoul'),
(31, 'seoul'),
(32, 'seoul'),
(33, 'seoul'),
(34, 'seoul'),
(35, 'seoul'),
(36, ''),
(37, 'saway hakdog'),
(38, 'Dragon'),
(39, 'Dragon'),
(40, 'seoul'),
(41, 'Baranggay Mabuhay kalabasa st. 344'),
(42, 'Baranggay Labangal apple st. 344'),
(43, ''),
(44, ''),
(45, 'Saway'),
(46, 'Saway');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_auto_id` varchar(99) NOT NULL,
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

INSERT INTO `tbl_admin` (`admin_id`, `admin_auto_id`, `user_id`, `credentials_id`, `address_id`, `level_id`, `status_id`, `account_id`) VALUES
(1, '', 2, 2, 2, 2, 2, 2),
(2, '', 4, 3, 4, 4, 4, 4),
(3, '', 5, 4, 5, 5, 5, 5),
(18, 'ad001', 41, 40, 41, 41, 41, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `area_id` int(11) NOT NULL,
  `area` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `area`) VALUES
(1, 'Red'),
(2, 'Red'),
(3, 'Blue'),
(4, 'Deer'),
(5, 'maasim'),
(6, '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignment`
--

CREATE TABLE `tbl_assignment` (
  `assignment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auto_id`
--

CREATE TABLE `tbl_auto_id` (
  `id` int(11) NOT NULL,
  `auto_admin_id` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `content_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `lesson_files_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`content_id`, `lesson_id`, `lesson_files_id`) VALUES
(7, 7, 7),
(8, 7, 8),
(9, 8, 9),
(10, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_learner`
--

CREATE TABLE `tbl_learner` (
  `learner_id` int(11) NOT NULL,
  `learner_auto_id` varchar(99) NOT NULL,
  `lrn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guardian_info_id` int(11) NOT NULL,
  `guardian_contact_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `usercredentials_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_learner`
--

INSERT INTO `tbl_learner` (`learner_id`, `learner_auto_id`, `lrn`, `user_id`, `guardian_info_id`, `guardian_contact_id`, `address_id`, `level_id`, `status_id`, `account_id`, `usercredentials_id`) VALUES
(1, '', 2, 8, 2, 2, 8, 8, 8, 8, 7),
(2, '', 3, 17, 3, 3, 17, 17, 17, 17, 16),
(5, '', 6, 40, 6, 6, 40, 40, 40, 36, 39);

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
(1, 0, '', ''),
(2, 2147483647, 'student@gmail.com', 'student2122student2122'),
(3, 2147483647, 'student@gmail.com', 'student2122student2122'),
(4, 2147483647, 'pink@gmail.com', 'seoul'),
(5, 2147483647, 'lawyerpink@gmail.com', 'seoul'),
(6, 2147483647, 'pink@gmail.com', 'seoul'),
(7, 0, '', ''),
(8, 0, '', '');

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
(1, '', '', '', '', ''),
(2, 'ga', 'test', 'awda', '2023-07-20', 'female'),
(3, 'student', 'student', 'student', '2221-02-22', 'Male'),
(4, 'black', 'r', 'pink', '2023-07-31', 'female'),
(5, 'black lawyer', 'r', 'pink', '2023-07-31', 'male'),
(6, 'black', 'r', 'pink', '2023-08-10', 'female'),
(7, '', '', '', '', ''),
(8, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_learner_id`
--

CREATE TABLE `tbl_learner_id` (
  `learner_id` int(11) NOT NULL,
  `learner_auto_id` varchar(99) NOT NULL,
  `lrn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_learner_id`
--

INSERT INTO `tbl_learner_id` (`learner_id`, `learner_auto_id`, `lrn`) VALUES
(1, '', 123121),
(2, '', 1),
(3, '', 222221),
(4, '', 2147483647),
(5, '', 2147483647),
(6, '', 2147483647),
(7, 'lrn001', 0),
(8, 'lrn001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lesson`
--

CREATE TABLE `tbl_lesson` (
  `lesson_id` int(11) NOT NULL,
  `name` varchar(244) NOT NULL,
  `objective` text NOT NULL,
  `level` varchar(244) NOT NULL,
  `type` varchar(244) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lesson`
--

INSERT INTO `tbl_lesson` (`lesson_id`, `name`, `objective`, `level`, `type`, `added_by`) VALUES
(7, 'multi', 'test', 'Advance', 'Literacy', 11),
(8, 'Blackpink', 'Hakdog', 'Advance', 'Numeracy', 1),
(9, 'Secrer', 'Wala', 'Literacy', 'Numeracy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lesson_files`
--

CREATE TABLE `tbl_lesson_files` (
  `lesson_files_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `lesson` text NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lesson_files`
--

INSERT INTO `tbl_lesson_files` (`lesson_files_id`, `lesson_id`, `lesson`, `added_by`, `status`) VALUES
(7, 7, 'cred.png', 11, 1),
(8, 7, 'spicyuuu1.jpg', 11, 1),
(9, 8, 'barcode.png', 1, 1),
(10, 9, '01_Assignment_1(4).docx', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_multiple_choice`
--

CREATE TABLE `tbl_quiz_multiple_choice` (
  `multiple_choice_id` int(11) NOT NULL,
  `quiz_options_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choiceA` varchar(244) NOT NULL,
  `choiceB` varchar(244) NOT NULL,
  `choiceC` varchar(244) NOT NULL,
  `choiceD` varchar(244) NOT NULL,
  `correct_answer` varchar(99) NOT NULL COMMENT '1 = right, 0 = wrong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_quiz_multiple_choice`
--

INSERT INTO `tbl_quiz_multiple_choice` (`multiple_choice_id`, `quiz_options_id`, `question`, `choiceA`, `choiceB`, `choiceC`, `choiceD`, `correct_answer`) VALUES
(12, 6, 'Youngest', 'Jennie', 'Lisa', 'Rose', 'Jisoo', '0'),
(13, 6, 'Oldest', 'Jisoo', 'Jennie', 'Lisa', 'Rose', '0'),
(14, 7, 'Sana', 'Japanese', 'Koean', 'Philippines', 'USA', '0'),
(15, 7, 'Jihyo', 'Japanese', 'Vietnam', 'Korea', 'Philippines', '0'),
(16, 8, 'Mina', 'Japanese', 'Koean', 'Philippines', 'USA', ''),
(17, 8, 'Dahyun', 'Japanese', 'Vietnam', 'Korea', 'Philippines', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_options`
--

CREATE TABLE `tbl_quiz_options` (
  `quiz_options_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `title` varchar(244) NOT NULL,
  `lesson` int(11) NOT NULL,
  `max_score` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `allow_late` tinyint(1) NOT NULL,
  `grading` varchar(244) NOT NULL,
  `due` date NOT NULL,
  `grading_score` varchar(244) NOT NULL,
  `attempts` int(11) NOT NULL,
  `instructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_quiz_options`
--

INSERT INTO `tbl_quiz_options` (`quiz_options_id`, `added_by`, `title`, `lesson`, `max_score`, `date_start`, `allow_late`, `grading`, `due`, `grading_score`, `attempts`, `instructions`) VALUES
(6, 1, 'Blackpink', 8, 2, '2023-09-14', 0, 'Latest Grade', '2023-09-14', 'best score', 1, ' BP QUIZ '),
(7, 1, 'Tewice', 8, 2, '2023-09-14', 0, 'Latest Grade', '2023-09-22', 'best score', 1, ' Twice QUIZ '),
(8, 1, 'Quiz', 8, 2, '2023-09-15', 0, 'Latest Grade', '2023-09-16', 'best score', 1, ' Quiz ni ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_true_or_false`
--

CREATE TABLE `tbl_quiz_true_or_false` (
  `true_or_false_id` int(11) NOT NULL,
  `quiz_options_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `correct_choice` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(11) NOT NULL,
  `section` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`section_id`, `section`) VALUES
(1, 'Grade 1'),
(2, 'Grade 5'),
(3, 'Grade 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers`
--

CREATE TABLE `tbl_teachers` (
  `teacher_id` bigint(11) NOT NULL,
  `teacher_auto_id` varchar(55) NOT NULL,
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

INSERT INTO `tbl_teachers` (`teacher_id`, `teacher_auto_id`, `user_id`, `credentials_id`, `address_id`, `level_id`, `status_id`, `account_id`, `valid_id`) VALUES
(0, '', 1, 1, 1, 1, 1, 1, 1),
(0, '', 6, 5, 6, 6, 6, 6, 2),
(0, '', 9, 8, 9, 9, 9, 9, 3),
(1, '', 10, 9, 10, 10, 10, 10, 4),
(176211231, '', 11, 10, 11, 11, 11, 11, 5),
(2222, '', 12, 11, 12, 12, 12, 12, 6),
(2231, '', 14, 13, 14, 14, 14, 14, 8),
(9352034159, '', 31, 30, 31, 31, 31, 27, 12),
(0, 'tch001', 42, 41, 42, 42, 42, 38, 13),
(0, 'tch002', 45, 44, 45, 45, 45, 41, 14),
(0, 'tch003', 46, 45, 46, 46, 46, 42, 15);

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
(2, '64a8b8538fbb4_giphy.gif'),
(3, ''),
(4, ''),
(5, '64b805936ce0d_nm.jpg'),
(6, 'puta.png'),
(7, 'asdw.jpg'),
(8, 'Untitled.png'),
(9, 'cred.png'),
(10, 'spicyuuu1.jpg'),
(11, 'key.png'),
(12, 'bg-auth.jpg'),
(13, 'anime-student-school-girl-uhdpaper.com-4K-8_edited.jpg'),
(14, '01_Handout_1.docx'),
(15, '12.png');

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
(4, 'rinan@gmail.com', 12312),
(5, 'qwe@gmail.com', 12311221),
(6, 'jdm@gmail.com', 9088123812),
(7, 'student21@gmail.com', 9088123812),
(8, 'teacherz@gmail.com', 123123),
(9, 'teachera@gmail.com', 2222),
(10, 'teacherc@gmail.com', 2311111),
(11, 'teacherb@gmail.com', 231111),
(12, 'an@gmail.com', 23211123),
(13, 'mynftacc269@gmail.com', 231121),
(14, 'awdawd@gmail.com', 12312321),
(15, 'zas@gmail.com', 2311),
(16, 'mynftacc269@gmail.com', 9088123812),
(17, 'pink@gmail.com', 9583545376),
(18, 'pink@gmail.com', 9583545376),
(19, 'lawyerpink@gmail.com', 9583545376),
(20, 'pink123@gmail.com', 9583545376),
(21, 'bluepink@gmail.com', 9583545376),
(22, 'bluepink@gmail.com', 9583545376),
(23, 'pink@gmail.com', 9583545376),
(24, 'pink@gmail.com', 9583545376),
(25, 'blue@gmail.com', 94567216341),
(26, 'blue@gmail.com', 94567216341),
(27, 'pink@gmail.com', 9583545376),
(28, 'pink@gmail.com', 9583545376),
(29, 'pink@gmail.com', 9583545376),
(30, 'pink@gmail.com', 9583545376),
(31, 'pink@gmail.com', 9583545376),
(32, 'pink@gmail.com', 9583545376),
(33, 'lawyerpink@gmail.com', 9583545376),
(34, 'pink@gmail.com', 9583545376),
(35, '', 9583545376),
(36, 'red@gmail.com', 32342314546333),
(37, 'hakdog@gmail.com', 6742364873248),
(38, 'hakdog@gmail.com', 6742364873248),
(39, 'pink@gmail.com', 9583545376),
(40, 'angel@gmail.com', 93238328273),
(41, 'bang@gmail.com', 1234),
(42, '', 0),
(43, '', 0),
(44, 'mico@gmail.com', 13224554),
(45, 'mico@gmail.com', 13224554);

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
(6, 'awd', 'awd', 'lastname', '2023-07-08', 'male'),
(8, 'firstname', 'd', 'lastname', '2023-07-20', 'male'),
(9, 'teacherz', 'teacherz', 'teacherz', '2023-07-20', 'female'),
(10, 'teachera', 'teachera', 'teachera', '2023-07-20', 'female'),
(11, 'teacherc', 'teacherc', 'teacherc', '2023-07-20', 'male'),
(12, 'teacherb', 'teacherb', 'teacherb', '2023-07-20', 'male'),
(14, 'ayjoke', 'lang', 'ayjoke', '2023-07-20', 'female'),
(17, 'awd', 'd', 'zas', '2222-02-22', 'Male'),
(18, 'Lalisa', 'G', 'Manoban', '2023-07-30', 'female'),
(19, 'black', 'r', 'pink', '2023-07-31', 'male'),
(31, 'black', 'r', 'pink', '2023-08-03', 'male'),
(32, 'black', 'r', 'pink', '2023-08-03', 'female'),
(40, 'black', 'r', 'pink', '2023-08-10', 'female'),
(41, 'Angel', 'K', 'Tabs', '2023-09-10', 'female'),
(42, 'Esabel', 'F', 'Sombong', '2023-09-10', 'female'),
(45, 'Jennie', 'F', 'Kim', '2023-10-02', 'female'),
(46, 'Mico', 'E', 'Kim', '2023-10-08', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `teacher_auto_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(6, 'TEACHER'),
(7, 'ADMIN'),
(8, 'LEARNER'),
(9, 'TEACHER'),
(10, 'TEACHER'),
(11, 'TEACHER'),
(12, 'TEACHER'),
(13, 'TEACHER'),
(14, 'TEACHER'),
(15, 'TEACHER'),
(16, 'TEACHER'),
(17, 'LEARNER'),
(18, 'TEACHER'),
(19, 'LEARNER'),
(20, 'LEARNER'),
(21, 'ADMIN'),
(22, 'ADMIN'),
(23, 'ADMIN'),
(24, 'ADMIN'),
(25, 'ADMIN'),
(26, 'ADMIN'),
(27, 'ADMIN'),
(28, 'ADMIN'),
(29, 'ADMIN'),
(30, 'ADMIN'),
(31, 'TEACHER'),
(32, 'ADMIN'),
(33, 'ADMIN'),
(34, 'ADMIN'),
(35, 'ADMIN'),
(36, 'ADMIN'),
(37, 'ADMIN'),
(38, 'ADMIN'),
(39, 'ADMIN'),
(40, 'LEARNER'),
(41, 'ADMIN'),
(42, 'TEACHER'),
(43, 'LEARNER'),
(44, 'LEARNER'),
(45, 'TEACHER'),
(46, 'TEACHER');

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
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(150) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = admin, 2= faculty , 3 = student',
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 0 = incative , 1 = active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `username`, `password`, `status`, `date_updated`) VALUES
(1, 'Administrator', 1, 'admin', 'admin123', 1, '2020-09-07 09:10:49'),
(6, 'John Smith', 2, 'jsmith', 'admin123', 1, '2020-09-07 10:23:30'),
(12, 'Sample Student', 3, 'sstudent', 'admin123', 1, '2020-09-07 14:51:25'),
(13, 'Claire Blake', 3, 'cblake', 'admin123', 1, '2020-09-07 14:54:28');

-- --------------------------------------------------------

--
-- Structure for view `mergeddata`
--
DROP TABLE IF EXISTS `mergeddata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mergeddata`  AS SELECT DISTINCT `tbl_lesson`.`lesson_id` AS `lesson_id`, `tbl_quiz_options`.`title` AS `title`, `tbl_lesson_files`.`lesson` AS `lesson` FROM ((`tbl_lesson` left join `tbl_quiz_options` on(`tbl_lesson`.`lesson_id` = `tbl_quiz_options`.`lesson`)) left join `tbl_lesson_files` on(`tbl_lesson`.`lesson_id` = `tbl_lesson_files`.`lesson_id`)) WHERE `tbl_lesson_files`.`status` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_opt`
--
ALTER TABLE `question_opt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `quiz_list`
--
ALTER TABLE `quiz_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_student_list`
--
ALTER TABLE `quiz_student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `tbl_admin_ibfk_6` (`account_id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `tbl_auto_id`
--
ALTER TABLE `tbl_auto_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `lesson_files_id` (`lesson_files_id`);

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
  ADD KEY `account_id` (`account_id`),
  ADD KEY `usercredentials_id` (`usercredentials_id`);

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
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_lesson_files`
--
ALTER TABLE `tbl_lesson_files`
  ADD PRIMARY KEY (`lesson_files_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `tbl_quiz_multiple_choice`
--
ALTER TABLE `tbl_quiz_multiple_choice`
  ADD PRIMARY KEY (`multiple_choice_id`),
  ADD KEY `quiz_options_id` (`quiz_options_id`);

--
-- Indexes for table `tbl_quiz_options`
--
ALTER TABLE `tbl_quiz_options`
  ADD PRIMARY KEY (`quiz_options_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `lesson` (`lesson`);

--
-- Indexes for table `tbl_quiz_true_or_false`
--
ALTER TABLE `tbl_quiz_true_or_false`
  ADD PRIMARY KEY (`true_or_false_id`),
  ADD KEY `quiz_options_id` (`quiz_options_id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
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
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`teacher_auto_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_opt`
--
ALTER TABLE `question_opt`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_list`
--
ALTER TABLE `quiz_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_student_list`
--
ALTER TABLE `quiz_student_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_auto_id`
--
ALTER TABLE `tbl_auto_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_learner`
--
ALTER TABLE `tbl_learner`
  MODIFY `learner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_learner_guardian_contact`
--
ALTER TABLE `tbl_learner_guardian_contact`
  MODIFY `guardian_contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_learner_guardian_info`
--
ALTER TABLE `tbl_learner_guardian_info`
  MODIFY `guardian_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_learner_id`
--
ALTER TABLE `tbl_learner_id`
  MODIFY `learner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_lesson_files`
--
ALTER TABLE `tbl_lesson_files`
  MODIFY `lesson_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_quiz_multiple_choice`
--
ALTER TABLE `tbl_quiz_multiple_choice`
  MODIFY `multiple_choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_quiz_options`
--
ALTER TABLE `tbl_quiz_options`
  MODIFY `quiz_options_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_quiz_true_or_false`
--
ALTER TABLE `tbl_quiz_true_or_false`
  MODIFY `true_or_false_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_teacher_valid`
--
ALTER TABLE `tbl_teacher_valid`
  MODIFY `valid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_usercredentials`
--
ALTER TABLE `tbl_usercredentials`
  MODIFY `usercredentials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_userinfo`
--
ALTER TABLE `tbl_userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `teacher_auto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_user_status`
--
ALTER TABLE `tbl_user_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `tbl_lesson` (`lesson_id`);

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
  ADD CONSTRAINT `tbl_content_ibfk_2` FOREIGN KEY (`lesson_files_id`) REFERENCES `tbl_lesson_files` (`lesson_files_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tbl_learner_ibfk_8` FOREIGN KEY (`account_id`) REFERENCES `tbl_accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_learner_ibfk_9` FOREIGN KEY (`usercredentials_id`) REFERENCES `tbl_usercredentials` (`usercredentials_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD CONSTRAINT `tbl_lesson_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lesson_files`
--
ALTER TABLE `tbl_lesson_files`
  ADD CONSTRAINT `tbl_lesson_files_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lesson_files_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `tbl_lesson` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_quiz_multiple_choice`
--
ALTER TABLE `tbl_quiz_multiple_choice`
  ADD CONSTRAINT `tbl_quiz_multiple_choice_ibfk_1` FOREIGN KEY (`quiz_options_id`) REFERENCES `tbl_quiz_options` (`quiz_options_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_quiz_options`
--
ALTER TABLE `tbl_quiz_options`
  ADD CONSTRAINT `tbl_quiz_options_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_quiz_options_ibfk_2` FOREIGN KEY (`lesson`) REFERENCES `tbl_lesson` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_quiz_true_or_false`
--
ALTER TABLE `tbl_quiz_true_or_false`
  ADD CONSTRAINT `tbl_quiz_true_or_false_ibfk_1` FOREIGN KEY (`quiz_options_id`) REFERENCES `tbl_quiz_options` (`quiz_options_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
