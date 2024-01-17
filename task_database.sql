-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 07:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `fault_check`
--

DROP TABLE IF EXISTS `fault_check`;
CREATE TABLE `fault_check` (
  `ID` varchar(20) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `task` varchar(20) NOT NULL,
  `vidName` varchar(50) NOT NULL,
  `reportTime` float NOT NULL,
  `responseTime` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fault_check`
--

INSERT INTO `fault_check` (`ID`, `datetime`, `task`, `vidName`, `reportTime`, `responseTime`, `status`) VALUES
('0', '2022-07-14 21:30:49', '', '', 51.7349, 1.73488, 'true'),
('0', '2022-07-14 21:30:55', '', '', 34.4018, 0.401819, 'true'),
('0', '2022-07-14 21:32:19', '', '', 49.2802, 2.28016, 'true'),
('0', '2022-07-14 21:32:30', '', '', 64.4129, 4.41291, 'true'),
('0', '2022-07-14 21:32:45', '', '', 92.6676, 0.667639, 'true'),
('0', '2022-07-14 21:32:48', '', '', 100.425, 2.42485, 'true'),
('0', '2022-07-14 21:32:51', '', '', 127.283, 3.2833, 'true'),
('0', '2022-07-14 21:52:08', '', '', 117.155, 5.15481, 'true'),
('0', '2022-07-14 21:52:21', '', '', 167.602, 3.60189, 'true'),
('0', '2022-07-14 21:53:28', '', '', 173.925, 21.9248, 'true'),
('0', '2022-07-14 21:53:30', '', '', 185.922, 3.92216, 'true'),
('0', '2022-07-14 21:58:17', '', 'two.mp4', 204.17, 0, 'false'),
('0', '2022-07-14 21:58:19', '', 'four.mp4', 229.018, 17.0175, 'true'),
('0', '2022-07-14 23:01:05', '', 'two.mp4', 6.76554, 0, 'false'),
('0', '2022-07-14 23:01:07', '', 'one.mp4', 11.7403, 0, 'false'),
('0', '2022-07-14 23:01:09', '', 'four.mp4', 33.4742, 0, 'false'),
('0', '2022-07-14 23:04:18', '', 'one.mp4', 7.04864, 0, 'false'),
('0', '2022-07-14 23:04:20', '', 'two.mp4', 6.10208, 0, 'false'),
('0', '2022-07-14 23:04:22', '', 'three.mp4', 5.35097, 0, 'false'),
('0', '2022-07-14 23:04:23', '', 'four.mp4', 31.1083, 0, 'false'),
('0', '2022-07-14 23:05:43', '', 'one.mp4', 8.60044, 0, 'false'),
('0', '2022-07-14 23:05:45', '', 'two.mp4', 7.16553, 0, 'false'),
('0', '2022-07-14 23:05:46', '', 'four.mp4', 31.0616, 0, 'false'),
('0', '2022-07-14 23:05:46', '', 'one.mp4', 11.1281, 0, 'false'),
('0', '2022-07-14 23:05:48', '', 'three.mp4', 7.44921, 0, 'false'),
('0', '2022-07-14 13:40:57', '', 'two.mp4', 9.9886, 0, 'false'),
('0', '2022-07-14 13:40:59', '', 'one.mp4', 14.3059, 0, 'false'),
('0', '2022-07-14 13:41:01', '', 'three.mp4', 11.4406, 0, 'false'),
('0', '2022-07-14 13:41:04', '', 'two.mp4', 16.4968, 0, 'false'),
('0', '2022-07-14 13:43:21', '', 'one.mp4', 6.28758, 0, 'false'),
('0', '2022-07-14 13:43:22', '', 'two.mp4', 4.62441, 0, 'false'),
('0', '2022-07-14 13:46:19', 'task2', 'one.mp4', 6.02415, 0, 'false'),
('0', '2022-07-14 13:46:21', 'task2', 'two.mp4', 4.40103, 0, 'false'),
('0', '2022-07-14 13:46:26', 'task2', 'three.mp4', 7.09383, 0, 'false'),
('0', '2022-07-14 13:46:48', 'task1', 'four.mp4', 26.2436, 0, 'false'),
('0', '2022-07-14 13:48:24', 'task1', 'two.mp4', 99.1316, 7.1316, 'true'),
('test', '2022-07-14 13:50:24', 'task1', 'one.mp4', 103.177, 0, 'false'),
('test', '2022-07-19 15:33:07', 'task1', 'one.mp4', 68.4288, 8.42879, 'true'),
('test', '2022-07-19 15:33:09', 'task1', 'three.mp4', 64.9838, 17.9838, 'true'),
('test', '2022-07-19 15:33:13', 'task1', 'two.mp4', 70.8439, 0, 'false'),
('test', '2022-07-20 13:22:13', 'task1', 'two.mp4', 4.56082, 0, 'false'),
('test', '2022-07-20 13:22:19', 'task1', 'three.mp4', 8.52997, 0, 'false'),
('test', '2022-07-20 13:23:02', 'task1', 'one.mp4', 63.8465, 3.84655, 'true'),
('test', '2022-07-20 13:23:10', 'task1', 'four.mp4', 51.998, 1.99803, 'true'),
('test', '2022-07-20 13:23:13', 'task1', 'two.mp4', 31.9613, 0, 'false'),
('test', '2022-07-20 13:23:17', 'task1', 'one.mp4', 92.5521, 0, 'false'),
('test', '2022-07-20 13:23:33', 'task1', 'two.mp4', 44.1605, 10.1605, 'true'),
('test', '2022-07-20 13:27:05', 'task1', 'four.mp4', 31.6055, 0, 'false'),
('test', '2022-07-20 13:27:25', 'task1', 'four.mp4', 55.0731, 5.07312, 'true'),
('test', '2022-07-20 13:27:38', 'task1', 'two.mp4', 37.3209, 3.32091, 'true'),
('test', '2022-07-20 14:06:17', 'task1', 'two.mp4', 3.35913, 0, 'false'),
('test', '2022-07-20 14:06:41', 'task1', 'one.mp4', 22.0951, 0, 'false'),
('test', '2022-07-20 14:06:55', 'task1', 'two.mp4', 42.062, 8.06198, 'true'),
('test', '2022-07-20 14:06:58', 'task1', 'four.mp4', 50.5125, 0.512493, 'true'),
('test', '2022-07-20 14:07:00', 'task1', 'one.mp4', 68.2265, 8.22655, 'true'),
('test', '2022-07-20 14:07:14', 'task1', 'two.mp4', 39.4907, 5.49073, 'true'),
('test', '2022-07-20 14:07:27', 'task1', 'three.mp4', 50.5522, 3.5522, 'true'),
('test', '2022-07-20 14:07:44', 'task1', 'one.mp4', 98.0567, 0, 'false'),
('test', '2022-07-20 14:07:48', 'task1', 'three.mp4', 52.8642, 5.86417, 'true'),
('test', '2022-07-20 14:08:05', 'task1', 'one.mp4', 64.3353, 4.33531, 'true'),
('test', '2022-07-20 14:08:09', 'task1', 'one.mp4', 80.7425, 0, 'false'),
('test', '2022-07-20 14:15:29', 'task1', 'one.mp4', 63.4679, 3.46791, 'true'),
('test', '2022-07-20 14:15:45', 'task1', 'two.mp4', 37.9506, 3.95055, 'true'),
('test', '2022-07-20 14:15:47', 'task1', 'four.mp4', 52.5644, 2.56442, 'true'),
('test', '2022-07-20 14:16:00', 'task1', 'one.mp4', 93.6635, 0, 'false'),
('test', '2022-07-20 14:16:06', 'task1', 'four.mp4', 86.8289, 0, 'false'),
('test', '2022-07-20 14:16:08', 'task1', 'two.mp4', 45.9307, 11.9307, 'true'),
('test', '2022-07-20 14:16:23', 'task1', 'one.mp4', 109.014, 0, 'false'),
('test', '2022-07-20 14:16:26', 'task1', 'two.mp4', 61.6912, 0, 'false'),
('test', '2022-07-20 14:16:27', 'task1', 'four.mp4', 59.2897, 9.28967, 'true'),
('test', '2022-07-20 14:16:37', 'task1', 'four.mp4', 78.6608, 0, 'false'),
('test', '2022-07-20 14:16:39', 'task1', 'one.mp4', 117.553, 5.55329, 'true'),
('test', '2022-07-20 14:18:38', 'task1', 'four.mp4', 40.6276, 0, 'false'),
('test', '2022-07-20 14:18:40', 'task1', 'two.mp4', 38.0576, 4.05763, 'true'),
('test', '2022-07-20 14:21:24', 'task1', 'two.mp4', 3.68605, 0, 'false'),
('test', '2022-07-20 14:21:46', 'task1', 'two.mp4', 36.6433, 2.6433, 'true'),
('test', '2022-07-20 14:21:49', 'task1', 'four.mp4', 43.5065, 0, 'false'),
('test', '2022-07-20 14:22:02', 'task1', 'four.mp4', 47.5241, 0, 'false'),
('test', '2022-07-20 14:49:24', 'task1', 'one.mp4', 62.9862, 2.98622, 'true'),
('test', '2022-07-20 14:49:37', 'task1', 'three.mp4', 50.009, 3.00895, 'true'),
('test', '2022-07-20 14:49:52', 'task1', 'three.mp4', 49.0751, 2.07511, 'true'),
('test', '2022-07-20 14:49:55', 'task1', 'four.mp4', 50.7072, 0.707227, 'true'),
('test', '2022-07-20 15:22:46', 'task1', 'three.mp4', 49.7952, 2.79523, 'true'),
('test', '2022-07-20 15:22:58', 'task1', 'two.mp4', 37.5596, 3.55962, 'true'),
('test', '2022-07-20 15:24:29', 'task1', 'two.mp4', 4.22971, 0, 'false'),
('test', '2022-07-20 15:24:56', 'task1', 'four.mp4', 45.574, 0, 'false'),
('test', '2022-07-20 17:22:40', 'task1', 'one.mp4', 5.587, 0, 'false'),
('test', '2022-07-20 17:23:06', 'task1', 'one.mp4', 8.69035, 0, 'false'),
('test', '2022-07-20 17:23:09', 'task1', 'one.mp4', 9.59617, 0, 'false'),
('test', '2022-07-20 17:23:14', 'task1', 'one.mp4', 13.4174, 0, 'false'),
('test', '2022-07-20 17:26:52', 'task1', 'four.mp4', 59.7356, 9.73562, 'true'),
('test', '2022-07-20 17:26:58', 'task1', 'four.mp4', 79.022, 0, 'false'),
('test', '2022-07-20 17:27:02', 'task1', 'two.mp4', 21.185, 0, 'false'),
('test', '2022-07-20 17:39:15', 'task1', 'four.mp4', 33.1301, 0, 'false'),
('test', '2022-07-20 17:39:29', 'task1', 'three.mp4', 49.2814, 2.28136, 'true'),
('test', '2022-07-20 17:45:38', 'task1', 'one.mp4', 6.54201, 0, 'false'),
('test', '2022-07-20 17:45:43', 'task1', 'one.mp4', 7.87032, 0, 'false'),
('test', '2022-07-20 17:46:55', 'task1', 'two.mp4', 3.64491, 0, 'false'),
('test', '2022-07-20 17:47:15', 'task1', 'two.mp4', 4.3434, 0, 'false'),
('test', '2022-07-20 17:48:20', 'task1', 'two.mp4', 5.24178, 0, 'false'),
('test', '2022-07-20 17:48:31', 'task1', 'one.mp4', 5.90857, 0, 'false'),
('test', '2022-07-20 17:48:38', 'task1', 'one.mp4', 7.77353, 0, 'false'),
('test', '2022-07-20 17:48:55', 'task1', 'two.mp4', 9.41129, 0, 'false'),
('test', '2022-07-20 17:49:02', 'task1', 'three.mp4', 53.1133, 6.11327, 'true'),
('test', '2022-07-20 17:49:24', 'task1', 'one.mp4', 62.1208, 2.12081, 'true'),
('test', '2022-07-20 17:49:29', 'task1', 'three.mp4', 78.1213, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `newvidtable`
--

DROP TABLE IF EXISTS `newvidtable`;
CREATE TABLE `newvidtable` (
  `VID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `faultTimeArray` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newvidtable`
--

INSERT INTO `newvidtable` (`VID`, `fname`, `faultTimeArray`) VALUES
(1, 'one.mp4', '60,78,112,132,152,182,230,256,292,311'),
(2, 'two.mp4', '34,51,92,118,182,203,234,256,317,342'),
(3, 'three.mp4', '47,73,98,133,164,196,276,301'),
(4, 'four.mp4', '50,75,124,163,212,244,296,332');

-- --------------------------------------------------------

--
-- Table structure for table `post_responses`
--

DROP TABLE IF EXISTS `post_responses`;
CREATE TABLE `post_responses` (
  `ID` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Q1` int(10) NOT NULL,
  `Q2` int(10) NOT NULL,
  `Q3` int(10) NOT NULL,
  `Q4` int(11) NOT NULL,
  `Q5` int(11) NOT NULL,
  `Q6` int(11) NOT NULL,
  `Q7` int(11) NOT NULL,
  `Q8` int(11) NOT NULL,
  `Q9` int(11) NOT NULL,
  `Q10` text CHARACTER SET utf8mb4 NOT NULL,
  `datetime` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_responses`
--

INSERT INTO `post_responses` (`ID`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `datetime`) VALUES
('test', 20, 20, 20, 3, 3, 3, 20, 18, 8, '', '2022-02-17 03:31:44 PM'),
('test', 10, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-02-17 03:31:56 PM'),
('test', 1, 5, 3, 3, 3, 3, 3, 3, 3, '', '2022-02-17 03:34:19 PM'),
('test', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-02-17 03:34:49 PM'),
('', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-02-17 03:56:40 PM'),
('', 3, 3, 3, 3, 3, 3, 3, 3, 3, 'aasdfgchbj', '2022-02-17 03:56:45 PM'),
('test', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-02-17 07:40:20 PM'),
('test', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-02-19 09:30:15 PM'),
('test', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-06-14 04:08:04 AM'),
('test', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-06-14 10:26:36 PM'),
('test', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-06-17 12:28:39 AM'),
('test', 1, 5, 2, 3, 3, 3, 3, 3, 3, '', '2022-06-23 04:36:10 AM'),
('ab1', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'This one', '2022-06-23 04:47:52 AM'),
('test', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-06-23 04:57:54 AM'),
('test1', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-06-24 10:24:42 PM'),
('test2', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-06-24 10:31:33 PM'),
('test', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-06-30 02:56:23 AM'),
('', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-07-05 12:28:00 AM'),
('Yifan', 3, 3, 3, 3, 3, 3, 3, 3, 3, 'Correction task is as stressful as the monitoring task. Message task is better than the other two. Maybe because the message is pre-written. Monitoring definitely requires the most tension and mental processing. ', '2022-07-05 12:55:28 AM'),
('test', 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2022-07-08 12:46:04 AM'),
('stephen', 2, 2, 4, 1, 2, 4, 4, 4, 2, 'I did not find that there was much difference.', '2022-07-08 10:51:27 PM');

-- --------------------------------------------------------

--
-- Table structure for table `task1_questions`
--

DROP TABLE IF EXISTS `task1_questions`;
CREATE TABLE `task1_questions` (
  `ID` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task1_questions`
--

INSERT INTO `task1_questions` (`ID`, `question`, `a`, `b`, `c`, `d`) VALUES
(1, 'Select the type of fault that the robot is showing', 'The robot has stopped moving.', 'The robot is turning in circles.', 'The robot is moving back and forth repeatedly.', 'The robot is working fine. There is no fault.'),
(2, 'Is there anything blocking robot\'s path forward?', 'Yes', 'No', 'Not sure', ''),
(3, 'What\'s the best way to fix this fault?', 'Just start moving straight.', 'Turn to left or right and then try to find a way forward.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `task1_responses`
--

DROP TABLE IF EXISTS `task1_responses`;
CREATE TABLE `task1_responses` (
  `ID` varchar(50) NOT NULL,
  `QID` int(11) NOT NULL,
  `total_efforts` int(11) NOT NULL,
  `time_spent` float NOT NULL,
  `notificationClickDelay` float NOT NULL COMMENT 'time between notification appearance and clicking it',
  `datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task1_responses`
--

INSERT INTO `task1_responses` (`ID`, `QID`, `total_efforts`, `time_spent`, `notificationClickDelay`, `datetime`) VALUES
('test', 4, 2, 43, 0, '2022-02-17 07:38:01 PM'),
('test', 4, 1, 44, 0, '2022-02-17 07:38:02 PM'),
('test', 4, 2, 76, 0, '2022-02-19 09:29:18 PM'),
('test', 3, 1, 18, 0, '2022-06-14 09:05:22 PM'),
('test', 4, 2, 15, 0, '2022-06-14 09:06:08 PM'),
('test', 3, 1, 7, 0, '2022-06-14 09:20:01 PM'),
('test', 2, 1, 8, 0, '2022-06-14 10:07:13 PM'),
('test', 1, 1, 19, 0, '2022-06-14 10:07:46 PM'),
('test', 2, 1, 16, 0, '2022-06-14 10:08:19 PM'),
('test', 4, 2, 17, 0, '2022-06-14 10:08:47 PM'),
('test', 2, 1, 6, 0, '2022-06-14 10:09:05 PM'),
('test', 3, 1, 7, 0, '2022-06-14 10:10:23 PM'),
('test', 4, 1, 6, 0, '2022-06-14 10:10:41 PM'),
('test', 2, 1, 6, 0, '2022-06-14 10:11:06 PM'),
('test', 1, 1, 6, 0, '2022-06-14 10:19:58 PM'),
('test', 4, 1, 6, 0, '2022-06-14 10:27:10 PM'),
('test', 4, 1, 6, 0, '2022-06-14 10:27:29 PM'),
('test', 4, 1, 217, 0, '2022-06-17 12:21:45 AM'),
('test', 4, 1, 14, 0, '2022-06-22 10:35:16 PM'),
('test', 4, 1, 6, 0, '2022-06-23 03:09:38 AM'),
('test', 3, 1, 47, 0, '2022-06-23 03:10:45 AM'),
('test', 3, 1, 67, 0, '2022-06-23 03:12:39 AM'),
('test', 1, 12, 8, 0, '2022-06-23 04:07:25 AM'),
('test', 3, 3, 13, 0, '2022-06-23 04:20:40 AM'),
('ab1', 4, 1, 5, 0, '2022-06-23 04:45:47 AM'),
('test', 3, 1, 6, 0, '2022-06-23 04:56:04 AM'),
('test', 2, 1, 7, 0, '2022-06-23 04:59:53 AM'),
('test', 3, 1, 6, 0, '2022-06-23 05:19:13 AM'),
('test', 2, 1, 5, 0, '2022-06-24 12:32:22 AM'),
('test', 2, 3, 239, 0, '2022-06-24 12:40:34 AM'),
('test', 2, 1, 106, 0, '2022-06-24 12:43:01 AM'),
('test1', 6, 1, 12, 0, '2022-06-24 10:10:14 PM'),
('test1', 6, 1, 11, 0, '2022-06-24 10:10:47 PM'),
('test1', 5, 1, 12, 0, '2022-06-24 10:11:11 PM'),
('test', 5, 1, 27, 0, '2022-06-29 05:13:54 PM'),
('test', 5, 1, 9, 0, '2022-06-29 05:14:33 PM'),
('test', 4, 1, 9, 0, '2022-06-29 05:15:02 PM'),
('test', 5, 1, 6, 0, '2022-06-29 05:15:26 PM'),
('test', 5, 1, 8, 0, '2022-06-29 05:16:00 PM'),
('test', 3, 1, 9, 0, '2022-06-29 05:16:23 PM'),
('test', 4, 1, 7, 0, '2022-06-29 05:16:51 PM'),
('test', 2, 1, 8, 0, '2022-06-29 05:17:15 PM'),
('test', 1, 1, 8, 0, '2022-06-29 05:17:43 PM'),
('Yifan', 5, 1, 24, 0, '2022-07-04 03:14:26 PM'),
('Yifan', 5, 1, 18, 0, '2022-07-04 03:15:08 PM'),
('Yifan', 3, 1, 14, 0, '2022-07-04 03:15:42 PM'),
('Yifan', 1, 1, 16, 0, '2022-07-04 03:16:21 PM'),
('test', 4, 2, 18, 0, '2022-07-06 01:36:54 PM'),
('test', 5, 1, 8, 0, '2022-07-06 01:56:50 PM'),
('test', 4, 1, 10, 0, '2022-07-06 02:20:05 PM'),
('test', 5, 1, 8, 0, '2022-07-06 02:35:02 PM'),
('test', 2, 1, 10, 0, '2022-07-07 02:08:12 PM'),
('test', 12, 1, 111, 0, '2022-07-07 02:10:26 PM'),
('test', 2, 2, 26, 0, '2022-07-07 03:07:11 PM'),
('test', 4, 1, 10, 0, '2022-07-07 03:08:05 PM'),
('stephen', 1, 1, 19, 0, '2022-07-08 01:10:20 PM'),
('stephen', 11, 1, 32, 0, '2022-07-08 01:11:22 PM'),
('abhi', 3, 1, 12, 0, '2022-07-14 12:00:37 PM'),
('abhi', 12, 1, 66, 0, '2022-07-14 12:02:04 PM'),
('abhi', 14, 1, 1137, 0, '2022-07-14 12:21:54 PM'),
('abhi', 2, 1, 6, 0, '2022-07-14 12:22:31 PM'),
('test', 13, 3, 32, 0, '2022-07-20 01:22:57 PM'),
('test', 9, 1, 6, 0, '2022-07-20 01:23:25 PM'),
('test', 6, 1, 9, 0, '2022-07-20 01:27:20 PM'),
('test', 5, 1, 6, 0, '2022-07-20 01:27:35 PM'),
('test', 5, 1, 9, 0, '2022-07-20 02:06:38 PM'),
('test', 3, 1, 8, 0, '2022-07-20 02:06:51 PM'),
('test', 6, 1, 7, 0, '2022-07-20 02:07:08 PM'),
('test', 5, 1, 7, 0, '2022-07-20 02:07:23 PM'),
('test', 14, 1, 8, 0, '2022-07-20 02:07:41 PM'),
('test', 6, 1, 8, 0, '2022-07-20 02:08:01 PM'),
('test', 5, 1, 28, 0, '2022-07-20 02:15:25 PM'),
('test', 3, 1, 7, 0, '2022-07-20 02:15:40 PM'),
('test', 1, 1, 6, 0, '2022-07-20 02:15:55 PM'),
('test', 2, 1, 6, 0, '2022-07-20 02:16:16 PM'),
('test', 2, 1, 6, 0, '2022-07-20 02:16:33 PM'),
('test', 6, 1, 7, 0, '2022-07-20 02:18:35 PM'),
('test', 5, 1, 6, 0, '2022-07-20 02:18:47 PM'),
('test', 7, 1, 8, 0, '2022-07-20 02:21:43 PM'),
('test', 14, 1, 8, 0, '2022-07-20 02:21:59 PM'),
('test', 2, 1, 8, 0, '2022-07-20 02:49:20 PM'),
('test', 14, 1, 8, 0, '2022-07-20 02:49:33 PM'),
('test', 5, 1, 12, 0, '2022-07-20 02:49:50 PM'),
('test', 14, 1, 9, 0, '2022-07-20 03:22:43 PM'),
('test', 12, 1, 6, 0, '2022-07-20 03:22:54 PM'),
('test', 10, 1, 8, 0, '2022-07-20 03:24:49 PM'),
('test5', 2, 1, 7, -12521, '2022-07-20 05:21:05 PM'),
('test', 3, 1, 9, -6557, '2022-07-20 05:23:32 PM'),
('test', 14, 1, 8, 3.095, '2022-07-20 05:26:40 PM'),
('test', 14, 1, 6, 2.76, '2022-07-20 05:39:06 PM'),
('test', 4, 1, 7, -5.375, '2022-07-20 05:39:24 PM'),
('test', 13, 1, 9, 2.226, '2022-07-20 05:42:19 PM'),
('test', 2, 1, 5, 2.276, '2022-07-20 05:48:46 PM'),
('test', 5, 1, 7, 4.577, '2022-07-20 05:49:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `task1_tries_counter`
--

DROP TABLE IF EXISTS `task1_tries_counter`;
CREATE TABLE `task1_tries_counter` (
  `ID` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='it is only used to count the numbers of error. Final count is stored in the task1_responses table.';

--
-- Dumping data for table `task1_tries_counter`
--

INSERT INTO `task1_tries_counter` (`ID`, `counter`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task1_video_info`
--

DROP TABLE IF EXISTS `task1_video_info`;
CREATE TABLE `task1_video_info` (
  `videoID` int(50) NOT NULL,
  `fileName` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `ans1` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `ans2` varchar(50) NOT NULL,
  `ans3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table to store videos to play during interruption Type-1';

--
-- Dumping data for table `task1_video_info`
--

INSERT INTO `task1_video_info` (`videoID`, `fileName`, `ans1`, `ans2`, `ans3`) VALUES
(1, '1_312', '3', '1', '2'),
(2, '2_421', '4', '2', '1'),
(3, '3_312', '3', '1', '2'),
(4, '4_112', '1', '1', '2'),
(5, '3_321', '3', '2', '1'),
(6, '6_312', '3', '1', '2'),
(7, '7_121', '1', '2', '1'),
(8, '8_222', '2', '2', '2'),
(9, '9_312', '3', '1', '2'),
(10, '10_312', '3', '1', '2'),
(11, '11_112', '1', '1', '2'),
(12, '12_312', '3', '1', '2'),
(13, '13_421', '4', '2', '1'),
(14, '14_421', '4', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `task2_responses`
--

DROP TABLE IF EXISTS `task2_responses`;
CREATE TABLE `task2_responses` (
  `ID` varchar(50) NOT NULL,
  `msgID` int(11) NOT NULL,
  `time_spent` float NOT NULL,
  `notificationClickDelay` float NOT NULL,
  `typedMessage` text NOT NULL,
  `datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task2_responses`
--

INSERT INTO `task2_responses` (`ID`, `msgID`, `time_spent`, `notificationClickDelay`, `typedMessage`, `datetime`) VALUES
('test1', 2, 0, 0, 'Mr. Lou Pole,\r\n\r\nAfter ....', '2022-07-14 07:17:10 PM'),
('test2', 1, -7, 0, 'dfgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2022-07-14 07:21:55 PM'),
('test2', 3, 4, 0, 'dfsfsdfsdfsfdff', '2022-07-14 07:23:06 PM'),
('test2', 3, 2, 0, 'dfgggggggggg', '2022-07-14 07:23:33 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tlx1_responses`
--

DROP TABLE IF EXISTS `tlx1_responses`;
CREATE TABLE `tlx1_responses` (
  `ID` varchar(50) CHARACTER SET utf8 NOT NULL,
  `qID` varchar(50) NOT NULL COMMENT 'Tells if it is for type1 or type2 condition. ',
  `mental` int(50) NOT NULL,
  `physical` int(50) NOT NULL,
  `temporal` int(50) NOT NULL,
  `performance` int(50) NOT NULL,
  `effort` int(50) NOT NULL,
  `frustration` int(50) NOT NULL,
  `datetime` varchar(30) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table to store user responses to first TLX questionnaire';

--
-- Dumping data for table `tlx1_responses`
--

INSERT INTO `tlx1_responses` (`ID`, `qID`, `mental`, `physical`, `temporal`, `performance`, `effort`, `frustration`, `datetime`) VALUES
('1', '1', 2, 2, 2, 2, 2, 2, ''),
('1', '0', 13, 14, 14, 14, 7, 5, '2022-02-16 06:33:10 PM'),
('1', '0', 8, 10, 10, 10, 10, 10, '2022-02-16 06:34:01 PM'),
('1', '0', 10, 10, 10, 10, 10, 10, '2022-02-16 06:35:45 PM'),
('1', '1', 10, 10, 10, 10, 10, 10, '2022-02-16 06:37:07 PM'),
('1', '1', 14, 10, 10, 10, 10, 10, '2022-02-16 06:37:10 PM'),
('2', '1', 12, 12, 12, 12, 12, 12, '2022-02-16 06:42:13 PM'),
('2', '2', 10, 10, 10, 10, 10, 10, '2022-02-16 06:44:11 PM'),
('2', '2', 15, 7, 9, 8, 10, 10, '2022-02-16 06:50:24 PM'),
('1', '1', 13, 7, 8, 12, 12, 10, '2022-02-16 06:58:02 PM'),
('1', '2', 10, 10, 10, 10, 10, 10, '2022-02-16 06:58:45 PM'),
('0', '0', 10, 10, 10, 10, 10, 10, '2022-02-16 07:00:04 PM'),
('3', '1', 14, 10, 10, 10, 10, 10, '2022-02-17 09:45:58 AM'),
('3', '2', 10, 12, 8, 10, 10, 10, '2022-02-17 09:46:44 AM'),
('1', '1', 10, 10, 10, 10, 10, 10, '2022-02-17 11:49:51 AM'),
('1', '1', 10, 10, 10, 10, 10, 10, '2022-02-17 01:22:47 PM'),
('test', 'task1', 10, 10, 16, 10, 10, 10, '2022-02-17 03:27:08 PM'),
('test', 'task2', 13, 13, 13, 12, 12, 12, '2022-02-17 03:31:27 PM'),
('test', 'task1', 13, 14, 10, 10, 10, 10, '2022-02-17 07:38:31 PM'),
('test', 'task2', 10, 10, 10, 10, 10, 10, '2022-02-17 07:39:13 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-02-19 09:29:41 PM'),
('test', 'task2', 10, 10, 10, 10, 10, 10, '2022-02-19 09:30:10 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 04:07:57 AM'),
('test', 'task2', 10, 10, 10, 10, 10, 10, '2022-06-14 04:08:01 AM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 04:09:49 AM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 09:14:53 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 10:03:49 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 10:19:34 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 10:20:56 PM'),
('test', 'task2', 10, 10, 10, 10, 10, 10, '2022-06-14 10:26:33 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 10:41:55 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 10:42:36 PM'),
('test', 'task2', 10, 10, 10, 10, 10, 10, '2022-06-14 10:53:06 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 11:24:54 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 11:27:04 PM'),
('test', 'task2', 10, 10, 10, 10, 10, 10, '2022-06-14 11:27:39 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 11:29:31 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-14 11:55:30 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-15 12:00:22 AM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-15 12:04:07 AM'),
('test', 'task1', 10, 15, 10, 10, 10, 10, '2022-06-15 12:45:53 AM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-15 12:46:32 AM'),
('test', 'task2', 10, 10, 10, 10, 10, 10, '2022-06-15 12:46:49 AM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-16 01:51:40 AM'),
('test', 'task1', 11, 6, 14, 13, 15, 7, '2022-06-17 12:25:02 AM'),
('test', 'task2', 3, 3, 5, 5, 5, 7, '2022-06-17 12:27:25 AM'),
('test', 'task1', 20, 10, 10, 10, 20, 10, '2022-06-23 04:25:41 AM'),
('test', 'task2', 1, 8, 10, 10, 10, 10, '2022-06-23 04:36:02 AM'),
('ab1', 'task1', 3, 3, 3, 3, 3, 3, '2022-06-23 04:46:47 AM'),
('ab1', 'task2', 17, 17, 17, 17, 17, 17, '2022-06-23 04:47:39 AM'),
('test', 'task1', 8, 8, 8, 10, 10, 10, '2022-06-23 04:57:05 AM'),
('test', 'task2', 10, 10, 10, 10, 10, 10, '2022-06-23 04:57:51 AM'),
('test', 'task1', 5, 10, 10, 10, 10, 10, '2022-06-24 12:49:56 AM'),
('test1', 'task1', 5, 4, 2, 14, 4, 4, '2022-06-24 10:11:27 PM'),
('test1', 'task2', 10, 10, 10, 10, 10, 10, '2022-06-24 10:24:40 PM'),
('test2', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-24 10:26:18 PM'),
('test2', 'task2', 10, 10, 10, 10, 10, 10, '2022-06-24 10:31:30 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-28 09:55:00 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-06-28 11:56:16 PM'),
('test', 'task1', 14, 11, 16, 19, 12, 4, '2022-06-30 02:49:10 AM'),
('test', 'task2', 10, 10, 10, 10, 10, 10, '2022-06-30 02:56:21 AM'),
('', '', 10, 10, 10, 10, 10, 10, '2022-07-05 12:27:56 AM'),
('Yifan', 'task1', 15, 5, 12, 15, 12, 15, '2022-07-05 12:47:54 AM'),
('Yifan', 'task2', 13, 3, 10, 18, 15, 12, '2022-07-05 12:53:04 AM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-07-06 11:01:17 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-07-06 11:03:58 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-07-06 11:07:19 PM'),
('test', 'task1', 10, 10, 10, 10, 10, 10, '2022-07-06 11:17:11 PM'),
('test', 'task1', 13, 10, 10, 10, 10, 10, '2022-07-08 12:39:59 AM'),
('test', 'task2', 13, 10, 7, 10, 10, 10, '2022-07-08 12:46:02 AM'),
('stephen', 'task1', 16, 1, 11, 12, 11, 1, '2022-07-08 10:42:26 PM'),
('stephen', 'task2', 14, 2, 12, 15, 11, 2, '2022-07-08 10:49:29 PM'),
('abhi', 'task1', 10, 10, 10, 10, 10, 10, '2022-07-14 09:53:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` varchar(50) NOT NULL,
  `age` varchar(20) NOT NULL,
  `area` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `genderBox` varchar(20) NOT NULL,
  `familiar` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `age`, `area`, `gender`, `genderBox`, `familiar`, `datetime`) VALUES
('abhi', '77', '', 'preferNO', '', '', '2022-07-14 12:00:10 PM'),
('stephen', '', '', '', '', '', '2022-07-08 01:08:47 PM'),
('test', '25', 'ECE', 'Male', '', '', ''),
('test1', '', '', '', '', '', '2022-07-14 01:16:41 PM'),
('test2', '', '', '', '', '', '2022-07-14 01:21:34 PM'),
('test3', '', '', '', '', '', '2022-07-14 01:30:14 PM'),
('test4', '', '', '', '', '', '2022-07-14 01:31:38 PM'),
('test5', '', '', '', '', '', '2022-07-20 05:20:44 PM'),
('Yifan', '26', 'ECE', 'female', '', '', '2022-07-04 03:13:33 PM');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `VID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `f1start` float NOT NULL,
  `f1end` float NOT NULL,
  `f2start` float NOT NULL,
  `f2end` float NOT NULL,
  `f3start` int(11) NOT NULL,
  `f3end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='fost is fault one start time';

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`VID`, `fname`, `f1start`, `f1end`, `f2start`, `f2end`, `f3start`, `f3end`) VALUES
(1, 'one.mp4', 30, 42, 85, 118, 168, 196),
(2, 'two.mp4', 22, 30, 71, 92, 120, 162),
(3, 'three.mp4', 50, 78, 140, 170, 210, 219),
(4, 'four.mp4', 50, 78, 140, 170, 210, 219);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newvidtable`
--
ALTER TABLE `newvidtable`
  ADD PRIMARY KEY (`VID`);

--
-- Indexes for table `task1_questions`
--
ALTER TABLE `task1_questions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `task1_video_info`
--
ALTER TABLE `task1_video_info`
  ADD PRIMARY KEY (`videoID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`VID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newvidtable`
--
ALTER TABLE `newvidtable`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task1_questions`
--
ALTER TABLE `task1_questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task1_video_info`
--
ALTER TABLE `task1_video_info`
  MODIFY `videoID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
