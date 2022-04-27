-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2022 at 10:02 AM
-- Server version: 5.7.38
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haightk1_hbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `approved` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `user_id`, `balance`, `approved`) VALUES
(1, 1, 9610.88, 1),
(83, 114, 1.01, 1),
(78, 113, 0, 0),
(77, 112, 0, 0),
(76, 111, 0, 0),
(75, 110, 0, 0),
(74, 109, 0, 0),
(73, 108, 0, 0),
(82, 114, 18.49, 1),
(84, 1, 0, 0),
(70, 107, 0, 1),
(69, 107, 0, 1),
(68, 107, 0, 1),
(67, 107, 0, 1),
(56, 105, 0, 1),
(57, 106, 0, 1),
(2, 1, 58.67, 1),
(58, 1, 150, 1),
(59, 1, 50, 1),
(60, 1, 10000, 1),
(61, 1, 401.12, 1),
(62, 1, 0, 1),
(63, 1, 10400, 1),
(66, 104, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_transactions`
--

CREATE TABLE `account_transactions` (
  `transaction_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `time_made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `updated_balance` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_transactions`
--

INSERT INTO `account_transactions` (`transaction_id`, `account_id`, `time_made`, `description`, `amount`, `updated_balance`) VALUES
(1, 1, '2022-04-04 13:48:29', 'Withdrawal of $50', 50, 654),
(2, 1, '2022-04-03 20:43:16', 'You withdrawed $50', 50, 604),
(3, 1, '2022-04-03 20:44:36', 'You withdrawed $100', 100, 504),
(4, 1, '2022-04-03 20:54:57', 'You withdrawed $50', 50, 454),
(5, 1, '2022-04-03 21:08:08', 'You withdrawed $200', 200, 254),
(6, 1, '2022-04-03 21:09:41', 'You deposited $50', 50, 304),
(7, 1, '2022-04-03 21:09:44', 'You deposited $50', 50, 354),
(10, 1, '2022-04-03 18:10:50', 'You transfered $500 to 2', 500, 580),
(11, 2, '2022-04-03 18:11:22', '1 gave you $500', 500, 10920),
(12, 1, '2022-04-03 22:24:17', 'You transfered $10 to 2', 10, 80),
(13, 1, '2022-04-03 22:24:19', 'You transfered $10 to 2', 10, 70),
(14, 1, '2022-04-04 02:37:21', 'You deposited $50', 50, 110),
(15, 1, '2022-04-04 04:44:26', 'You deposited $20', 20, 130),
(16, 1, '2022-04-04 04:44:30', 'You deposited $10', 10, 140),
(17, 1, '2022-04-04 04:44:38', 'You withdrawed $10', 10, 130),
(18, 1, '2022-04-04 00:44:46', 'You transfered $10 to 2', 10, 130),
(19, 1, '2022-04-04 00:44:57', 'You transfered $2 to 2', 2, 120),
(20, 1, '2022-04-04 04:54:43', 'You deposited $50', 50, 168),
(21, 1, '2022-04-04 04:54:46', 'You deposited $50', 50, 218),
(22, 22, '2022-04-04 05:00:33', 'You deposited $600', 600, 600),
(23, 22, '2022-04-04 05:03:07', 'You withdrawed $600', 600, 0),
(24, 1, '2022-04-04 22:33:21', 'Deposit of $100', 100, 318),
(25, 1, '2022-04-04 22:40:21', 'Deposit of $21', 21, 339),
(26, 1, '2022-04-04 22:42:47', 'Deposit of $01', 1, 340),
(27, 1, '2022-04-04 22:42:53', 'Deposit of $10', 10, 350),
(28, 23, '2022-04-04 22:49:31', 'Deposit of $10', 10, 10),
(29, 1, '2022-04-04 22:52:23', 'Withdrawl of $232', 232, 118),
(30, 1, '2022-04-04 22:52:26', 'Withdrawl of $100', 100, 18),
(31, 1, '2022-04-04 19:15:51', 'You transfered $2 to 74', 2, 18),
(32, 1, '2022-04-04 19:17:21', 'You transfered $2 to 74', 2, 16),
(33, 1, '2022-04-04 23:34:38', 'Deposit of $50', 50, 64),
(34, 1, '2022-04-04 23:34:51', 'Deposit of $10', 10, 74),
(35, 18, '2022-04-04 23:39:09', 'Deposit of $1000', 1000, 1000),
(36, 18, '2022-04-04 19:39:55', 'You transfered $1000 to 1', 1000, 1000),
(37, 1, '2022-04-04 19:39:55', '18 gave you $1000', 1000, 74),
(38, 1, '2022-04-05 02:39:55', 'Deposit of $10', 10, 1084),
(39, 1, '2022-04-05 02:40:01', 'Withdrawl of $20', 20, 1064),
(40, 18, '2022-04-05 06:19:12', 'Deposit of $1.39', 1.39, 1.39),
(41, 1, '2022-04-05 12:29:48', 'Deposit of $100', 100, 1164),
(42, 1, '2022-04-05 18:38:44', 'Withdrawl of $1000', -1000, 164),
(43, 1, '2022-04-06 20:32:59', 'Deposit of $9', 9, 173),
(44, 1, '2022-04-06 20:33:07', 'Deposit of $.50', 0.5, 173.5),
(45, 1, '2022-04-06 20:33:12', 'Deposit of $.01', 0.01, 173.51),
(46, 1, '2022-04-06 20:40:55', 'Deposit of $10', 10, 183.51),
(47, 1, '2022-04-06 20:41:03', 'Deposit of $10', 10, 193.51),
(48, 1, '2022-04-06 20:41:56', 'Deposit of $10', 10, 203.51),
(49, 1, '2022-04-06 20:42:35', 'Deposit of $10', 10, 213.51),
(50, 1, '2022-04-06 20:42:37', 'Deposit of $10', 10, 223.51),
(51, 1, '2022-04-06 20:43:13', 'Deposit of $1', 1, 224.51),
(52, 1, '2022-04-06 20:43:31', 'Deposit of $1', 1, 225.51),
(53, 1, '2022-04-06 20:43:40', 'Deposit of $1', 1, 226.51),
(54, 1, '2022-04-06 20:47:20', 'Deposit of $8902', 8902, 9128.51),
(55, 1, '2022-04-06 20:47:22', 'Deposit of $358239032', 358239032, 358248160.51),
(56, 1, '2022-04-06 20:47:28', 'Deposit of $903482390', 903482390, 1261730550.51),
(57, 1, '2022-04-06 20:49:38', 'Deposit of $1.23', 1.23, 1261730551.74),
(58, 1, '2022-04-06 20:49:41', 'Deposit of $0.1234', 0.1234, 1261730551.8634),
(59, 1, '2022-04-06 21:48:48', 'Deposit of $1.03', 1.03, 1261730552.8934),
(60, 1, '2022-04-06 21:48:50', 'Deposit of $1.23', 1.23, 1261730554.1234),
(61, 1, '2022-04-06 21:54:08', 'Deposit of $1', 1, 1261730555.1234),
(62, 1, '2022-04-06 21:54:13', 'Withdrawl of $0.1234', 0.1234, 1261730555),
(63, 1, '2022-04-06 21:54:45', 'Deposit of $10', 10, 1261730565),
(64, 1, '2022-04-06 21:54:58', 'Deposit of $12.131', 12.131, 1261730577.131),
(65, 1, '2022-04-06 21:57:12', 'Deposit of $1.23', 1.23, 1261730578.361),
(66, 1, '2022-04-06 21:57:22', 'Withdrawl of $0.361', 0.361, 1261730578),
(67, 1, '2022-04-06 21:57:24', 'Withdrawl of $10000', 10000, 1261720578),
(68, 1, '2022-04-06 21:57:27', 'Withdrawl of $10000000', 10000000, 1251720578),
(69, 1, '2022-04-06 21:57:30', 'Withdrawl of $1000000', 1000000, 1250720578),
(70, 1, '2022-04-06 21:57:35', 'Withdrawl of $1000000000', 1000000000, 250720578),
(71, 1, '2022-04-06 21:57:40', 'Withdrawl of $250000000', 250000000, 720578),
(72, 1, '2022-04-06 21:57:47', 'Withdrawl of $72000', 72000, 648578),
(73, 1, '2022-04-06 21:57:54', 'Withdrawl of $310', 310, 648268),
(74, 1, '2022-04-06 21:58:48', 'Deposit of $3', 3, 648271),
(75, 1, '2022-04-06 21:59:12', 'Withdrawl of $123.21', 123.21, 648147.79),
(76, 1, '2022-04-06 22:07:38', 'Withdrawl of $301', 301, 647846.79),
(77, 1, '2022-04-06 22:07:41', 'Withdrawl of $301', 301, 647545.79),
(78, 1, '2022-04-06 22:08:22', 'Withdrawl of $1000', 1000, 646545.79),
(79, 1, '2022-04-06 22:08:24', 'Withdrawl of $200', 200, 646345.79),
(80, 1, '2022-04-06 22:08:29', 'Withdrawl of $2000', 2000, 644345.79),
(81, 1, '2022-04-06 22:08:32', 'Withdrawl of $20000', 20000, 624345.79),
(82, 1, '2022-04-06 22:08:33', 'Withdrawl of $20000', 20000, 604345.79),
(83, 1, '2022-04-06 22:08:38', 'Withdrawl of $20000', 20000, 584345.79),
(84, 1, '2022-04-06 22:08:40', 'Withdrawl of $200000', 200000, 384345.79),
(85, 1, '2022-04-06 22:08:44', 'Withdrawl of $380000', 380000, 4345.79),
(86, 1, '2022-04-06 22:09:12', 'Deposit of $1', 1, 4346.79),
(87, 1, '2022-04-06 22:29:55', 'Withdrawl of $491', 491, 3855.79),
(88, 1, '2022-04-06 22:29:59', 'Withdrawl of $20', 20, 3835.79),
(89, 1, '2022-04-06 22:37:29', 'Deposit of $1', 1, 3836.79),
(90, 1, '2022-04-06 22:40:01', 'Withdrawl of $1', 1, 3835.79),
(91, 1, '2022-04-06 22:40:11', 'Deposit of $1', 1, 3836.79),
(92, 1, '2022-04-06 22:41:00', 'Withdrawal of $1', 1, 3835.79),
(93, 1, '2022-04-06 22:50:58', 'Deposit of $293291', 293291, 297126.79),
(94, 1, '2022-04-06 22:51:22', 'Deposit of $293291', 293291, 590417.79),
(95, 1, '2022-04-06 22:51:33', 'Deposit of $293291', 293291, 883708.79),
(96, 1, '2022-04-06 22:51:46', 'Deposit of $293291', 293291, 1176999.79),
(97, 1, '2022-04-06 22:52:11', 'Deposit of $293291', 293291, 1470290.79),
(98, 1, '2022-04-06 22:52:25', 'Deposit of $293291', 293291, 1763581.79),
(99, 1, '2022-04-06 22:52:31', 'Deposit of $293291', 293291, 2056872.79),
(100, 1, '2022-04-06 22:58:48', 'Deposit of $2312', 2312, 2059184.79),
(101, 1, '2022-04-06 22:58:56', 'Deposit of $209999999999', 209999999999, 210002059183.79),
(102, 1, '2022-04-06 22:59:14', 'Withdrawal of $209999999999', 209999999999, 2059184.7900085),
(103, 1, '2022-04-06 22:59:37', 'Withdrawal of $209999', 209999, 1849185.7900085),
(104, 1, '2022-04-06 23:00:27', 'Deposit of $10', 10, 205.12),
(105, 1, '2022-04-06 23:06:16', 'Withdrawal of $0.12', 0.12, 205),
(107, 1, '2022-04-06 23:31:43', 'Deposit of $$0.00', 10, 215),
(108, 1, '2022-04-06 23:32:02', 'Deposit of $10.00', 10, 225),
(109, 37, '2022-04-07 01:18:53', 'Deposit of $1.00', 1, 1),
(110, 1, '2022-04-06 22:11:13', 'Transfer of $1 to 10', 1, 447),
(111, 10, '2022-04-06 22:11:13', '1 gave you $1', 1, 0),
(112, 1, '2022-04-06 22:11:31', 'Transfer of $10 to 0', 10, 446),
(113, 1, '2022-04-07 02:19:31', 'Transfer of $200 to 1', 200, 436),
(114, 1, '2022-04-07 02:19:31', '1 gave you $200', 200, 236),
(121, 38, '2022-04-07 02:35:24', 'Deposit of $100.00', 100, 100),
(122, 39, '2022-04-07 02:35:29', 'Deposit of $100.00', 100, 100),
(123, 38, '2022-04-07 02:35:42', 'Transfer of $50.00 sent to 39', 50, 100),
(124, 39, '2022-04-07 02:35:42', 'Transfer of $50.00 received from 38', 50, 100),
(125, 1, '2022-04-07 02:38:51', 'Transfer of $10.00 sent to -1', 10, 436),
(126, 1, '2022-04-07 04:24:02', 'Deposit of $10.00', 10, 416),
(127, 1, '2022-04-07 04:25:08', 'Withdrawal of $10', 10, 396),
(128, 1, '2022-04-07 04:26:06', 'Withdrawal of $10.23', 10.23, 385.77),
(129, 1, '2022-04-07 06:16:12', 'Deposit of $101,020.00', 101020, 101405.77),
(130, 1, '2022-04-07 06:16:19', 'Withdrawal of $101,000.77', 101000.77, 405),
(131, 18, '2022-04-07 06:28:35', 'Withdrawal of $1.00', -1, 0.39),
(132, 18, '2022-04-07 06:30:49', 'Withdrawal of $0.20', -0.2, 0.19),
(133, 18, '2022-04-07 06:31:19', 'Withdrawal of $0.12', -0.12, 0.07),
(134, 18, '2022-04-07 06:35:35', 'Transfer of $0.05 sent to 69', -0.05, 0.07),
(135, 1, '2022-04-07 06:37:15', 'Withdrawal of $200.00', -200, 205),
(136, 1, '2022-04-07 07:01:23', 'Deposit of $231.00', 231, 436),
(137, 45, '2022-04-07 08:33:36', 'Deposit of $10.00', 10, 10),
(138, 1, '2022-04-07 09:41:44', 'Deposit of $121.00', 121, 557),
(139, 1, '2022-04-07 10:19:43', 'Deposit of $1,291,291.00', 1291291, 1291848),
(140, 1, '2022-04-07 10:33:47', 'Deposit of $21,390,390,123,982,188,544.00', 2.1390390123982e19, 2.1390390123983e19),
(141, 1, '2022-04-07 10:33:55', 'Withdrawal of $9,180,921,389,018,390,528.00', -9.1809213890184e18, 1.2209468734965e19),
(142, 1, '2022-04-07 10:34:03', 'Withdrawal of $49,803,924,890,348.00', -49803924890348, 1.220941893104e19),
(143, 1, '2022-04-07 10:34:05', 'Withdrawal of $9,384,903,284,902,348,800.00', -9.3849032849023e18, 2.8245156461377e18),
(144, 1, '2022-04-07 10:34:06', 'Withdrawal of $40,934,890,324,890,320.00', -4.093489032489e16, 2.7835807558128e18),
(145, 1, '2022-04-07 10:34:09', 'Withdrawal of $403,984,902,849,032.00', -403984902849030, 2.78317677091e18),
(146, 1, '2022-04-07 10:34:11', 'Withdrawal of $4,329,048,390.00', -4329048390, 2.783176766581e18),
(147, 1, '2022-04-07 10:34:12', 'Withdrawal of $804,324,902,348,902,528.00', -8.043249023489e17, 1.9788518642321e18),
(148, 1, '2022-04-07 10:34:18', 'Withdrawal of $40,923,489,024,823,904.00', -4.0923489024824e16, 1.9379283752073e18),
(149, 1, '2022-04-07 10:34:19', 'Withdrawal of $849,230,489,023,490.00', -849230489023490, 1.9370791447183e18),
(150, 1, '2022-04-07 10:34:20', 'Withdrawal of $3,489,092,034,890,234.00', -3.4890920348902e15, 1.9335900526834e18),
(151, 1, '2022-04-07 10:34:21', 'Withdrawal of $8,409,234,903,242,908.00', -8.4092349032429e15, 1.9251808177802e18),
(152, 1, '2022-04-07 10:34:22', 'Withdrawal of $4,390,829,084,239,802.00', -4.3908290842398e15, 1.920789988696e18),
(153, 1, '2022-04-07 10:34:50', 'Withdrawal of $78,998,869,600.00', -78998869600, 1.9207899096971e18),
(154, 1, '2022-04-07 10:34:51', 'Withdrawal of $78,998,869,600.00', -78998869600, 1.9207898306982e18),
(155, 1, '2022-04-07 10:34:54', 'Withdrawal of $78,998,869,600.00', -78998869600, 1.9207897516993e18),
(156, 1, '2022-04-07 10:34:58', 'Withdrawal of $78,998,869,600,000.00', -78998869600000, 1.9207107528297e18),
(157, 1, '2022-04-07 10:35:04', 'Withdrawal of $78,998,869,600,000,000.00', -7.89988696e16, 1.8417118832297e18),
(158, 1, '2022-04-07 10:35:10', 'Withdrawal of $789,988,696,000,000,000.00', -7.89988696e17, 1.0517231872297e18),
(159, 1, '2022-04-07 10:35:11', 'Withdrawal of $789,988,696,000,000,000.00', -7.89988696e17, 2.617344912297e17),
(160, 1, '2022-04-07 10:35:16', 'Withdrawal of $78,998,869,600,000,000.00', -7.89988696e16, 1.827356216297e17),
(161, 1, '2022-04-07 10:35:26', 'Withdrawal of $18,998,869,600,000,000.00', -1.89988696e16, 1.637367520297e17),
(162, 1, '2022-04-07 10:45:50', 'Transfer of $100.00 sent to 1', -100, 100),
(163, 1, '2022-04-07 10:45:50', 'Transfer of $100.00 received from 1', 100, 0),
(164, 39, '2022-04-07 11:01:31', 'Transfer of $100.00 sent to 38', -100, 150),
(165, 38, '2022-04-07 11:01:31', 'Transfer of $100.00 received from 39', 100, 50),
(166, 1, '2022-04-07 11:04:54', 'Transfer of $10.00 sent to 1', -10, 100),
(167, 1, '2022-04-07 11:04:54', 'Transfer of $10.00 received from 1', 10, 90),
(168, 1, '2022-04-07 11:15:30', 'Deposit of $1,010,101,010,101,010.00', 1.010101010101e15, 1.0101010101011e15),
(169, 1, '2022-04-07 11:15:37', 'Withdrawal of $1,010,101,010,101,010.00', -1.010101010101e15, 90),
(170, 1, '2022-04-07 11:24:02', 'Deposit of $10.00', 10, 100),
(171, 1, '2022-04-07 11:27:38', 'Deposit of $10.00', 10, 110),
(172, 1, '2022-04-07 11:28:31', 'Withdrawal of $5.43', -5.43, 104.57),
(173, 1, '2022-04-07 11:28:59', 'Withdrawal of $5.43', -5.43, 99.14),
(174, 1, '2022-04-07 11:29:05', 'Withdrawal of $10.00', -10, 89.14),
(175, 1, '2022-04-07 11:30:21', 'Transfer of $31.00 sent to 31', -31, 89.14),
(176, 31, '2022-04-07 11:30:21', 'Transfer of $31.00 received from 1', 31, 0),
(177, 1, '2022-04-07 11:30:32', 'Transfer of $31.00 sent to 31', -31, 58.14),
(178, 31, '2022-04-07 11:30:32', 'Transfer of $31.00 received from 1', 31, 31),
(179, 1, '2022-04-07 11:30:39', 'Transfer of $5.00 sent to 32', -5, 27.14),
(180, 32, '2022-04-07 11:30:39', 'Transfer of $5.00 received from 1', 5, 0),
(181, 1, '2022-04-07 11:45:19', 'Deposit of $10.00', 10, 32.14),
(182, 18, '2022-04-07 11:48:04', 'Withdrawal of $0.02', -0.02, 0),
(188, 1, '2022-04-07 17:40:46', 'Transfer of $10.00 sent to 48', -10, 32.14),
(189, 48, '2022-04-07 17:40:46', 'Transfer of $10.00 received from 1', 10, 20),
(190, 48, '2022-04-07 17:41:14', 'Transfer of $10.00 sent to 1', -10, 20),
(191, 1, '2022-04-07 17:41:14', 'Transfer of $10.00 received from 48', 10, 32.14),
(192, 48, '2022-04-07 17:42:42', 'Transfer of $5.00 sent to 1', -5, 5),
(193, 1, '2022-04-07 17:42:42', 'Transfer of $5.00 received from 48', 5, 37.14),
(194, 49, '2022-04-07 17:46:31', 'Deposit of $10.00', 10, 10),
(195, 50, '2022-04-07 17:46:34', 'Deposit of $10.00', 10, 10),
(196, 49, '2022-04-07 17:46:46', 'Transfer of $5.00 sent to 50', -5, 5),
(197, 50, '2022-04-07 17:46:46', 'Transfer of $5.00 received from 49', 5, 15),
(198, 50, '2022-04-07 17:47:04', 'Transfer of $2.50 sent to 49', -2.5, 12.5),
(199, 49, '2022-04-07 17:47:04', 'Transfer of $2.50 received from 50', 2.5, 7.5),
(200, 51, '2022-04-07 21:39:34', 'Deposit of $20.00', 20, 20),
(201, 51, '2022-04-07 21:42:26', 'Withdrawal of $5.45', -5.45, 14.55),
(202, 1, '2022-04-07 21:44:52', 'Deposit of $12.34', 12.34, 49.48),
(203, 1, '2022-04-07 21:47:42', 'Transfer of $10.00 sent to 48', -10, 39.48),
(204, 48, '2022-04-07 21:47:42', 'Transfer of $10.00 received from 1', 10, 15),
(205, 55, '2022-04-07 22:40:24', 'Deposit of $100.00', 100, 100),
(206, 55, '2022-04-07 22:40:57', 'Withdrawal of $50.00', -50, 50),
(207, 55, '2022-04-07 22:41:30', 'Transfer of $50.00 sent to 1', -50, 0),
(208, 1, '2022-04-07 22:41:30', 'Transfer of $50.00 received from 55', 50, 89.48),
(209, 48, '2022-04-09 23:00:33', 'Deposit of $20.32', 20.32, 35.32),
(210, 48, '2022-04-11 23:28:48', 'Deposit of $1.00', 1, 36.32),
(211, 48, '2022-04-11 23:28:55', 'Deposit of $1.00', 1, 37.32),
(212, 48, '2022-04-12 04:57:04', 'Deposit of $10,001.00', 10001, 10038.32),
(213, 1, '2022-04-12 06:47:45', 'Deposit of $50.00', 50, 139.48),
(214, 1, '2022-04-12 06:47:50', 'Deposit of $50.00', 50, 189.48),
(215, 1, '2022-04-12 07:20:08', 'Deposit of $50.00', 50, 239.48),
(216, 1, '2022-04-12 17:56:03', 'Deposit of $210,102,310,102.00', 210102310102, 210102310341.48),
(217, 1, '2022-04-14 20:01:21', 'Withdrawal of $50.00', -50, 210102310291.48),
(218, 1, '2022-04-14 20:03:22', 'Withdrawal of $50.00', -50, 210102310241.48),
(219, 59, '2022-04-14 20:04:42', 'Deposit of $50.00', 50, 50),
(220, 58, '2022-04-14 20:05:06', 'Deposit of $50.00', 50, 50),
(221, 58, '2022-04-14 20:05:15', 'Withdrawal of $50.00', -50, 0),
(222, 58, '2022-04-14 20:06:07', 'Deposit of $50.00', 50, 50),
(223, 1, '2022-04-14 22:28:07', 'Deposit of $10,000.00', 10000, 210102320241.48),
(224, 2, '2022-04-14 22:32:28', 'Deposit of $58.67', 58.67, 58.67),
(225, 1, '2022-04-14 23:28:00', 'Withdrawal of $210,102,320,240.00', -210102320240, 1.4800109863281),
(226, 1, '2022-04-19 07:50:02', 'Deposit of $10.00', 10, 1010),
(227, 1, '2022-04-19 07:51:16', 'Deposit of $10.00', 10, 1020),
(228, 1, '2022-04-21 22:33:41', 'Withdrawal of $10.00', -10, 1010),
(229, 1, '2022-04-21 22:33:47', 'Withdrawal of $10.00', -10, 1000),
(230, 1, '2022-04-21 22:57:21', 'Transfer of $100.00 sent to 58', -100, 900),
(231, 58, '2022-04-21 22:57:21', 'Transfer of $100.00 received from 1', 100, 150),
(232, 1, '2022-04-21 22:57:33', 'Transfer of $200.56 sent to 61', -200.56, 699.44),
(233, 61, '2022-04-21 22:57:33', 'Transfer of $200.56 received from 1', 200.56, 200.56),
(234, 1, '2022-04-21 22:58:23', 'Transfer of $200.56 sent to account #:61', -200.56, 498.88),
(235, 61, '2022-04-21 22:58:23', 'Transfer of $200.56 received from account #:1', 200.56, 401.12),
(236, 1, '2022-04-21 22:59:05', 'Transfer of $400.00 sent to account #63', -400, 98.88),
(237, 63, '2022-04-21 22:59:05', 'Transfer of $400.00 received from account #1', 400, 400),
(238, 1, '2022-04-21 23:34:34', 'Deposit of $10,000.00', 10000, 10098.88),
(239, 60, '2022-04-21 23:34:38', 'Deposit of $10,000.00', 10000, 10000),
(240, 63, '2022-04-21 23:34:42', 'Deposit of $10,000.00', 10000, 10400),
(241, 1, '2022-04-21 23:35:00', 'Withdrawal of $500.00', -500, 9598.88),
(242, 1, '2022-04-25 19:07:04', 'Deposit of $11.00', 11, 9609.88),
(243, 1, '2022-04-26 18:08:19', 'Withdrawal of $1.00', -1, 9608.88),
(244, 1, '2022-04-26 15:42:01', 'Deposit of $2.00', 2, 9610.88),
(245, 82, '2022-04-26 15:44:42', 'Deposit of $1.00', 1, 1),
(246, 82, '2022-04-26 15:44:46', 'Deposit of $2.00', 2, 3),
(247, 82, '2022-04-26 15:44:50', 'Deposit of $4.00', 4, 7),
(248, 82, '2022-04-26 16:03:50', 'Deposit of $2.00', 2, 9),
(249, 82, '2022-04-26 20:03:54', 'Withdrawal of $8.00', -8, 1),
(250, 82, '2022-04-26 20:05:00', 'Withdrawal of $0.50', -0.5, 0.5),
(251, 82, '2022-04-26 21:46:15', 'Transfer of $0.25 sent to account #83', -0.25, 0.25),
(252, 83, '2022-04-26 21:46:15', 'Transfer of $0.25 received from account #82', 0.25, 0.25),
(253, 83, '2022-04-26 22:59:41', 'Transfer of $0.25 sent to account #82', -0.25, 0),
(254, 82, '2022-04-26 22:59:41', 'Transfer of $0.25 received from account #83', 0.25, 0.5),
(255, 82, '2022-04-26 23:10:53', 'Transfer of $0.01 sent to account #83', -0.01, 0.49),
(256, 83, '2022-04-26 23:10:53', 'Transfer of $0.01 received from account #82', 0.01, 0.01),
(257, 82, '2022-04-26 21:01:55', 'Deposit of $10.00', 10, 10.49),
(258, 82, '2022-04-26 21:06:22', 'Withdrawal of $1.00', -1, 9.49),
(259, 82, '2022-04-26 21:08:29', 'Transfer of $1.00 sent to account #83', -1, 8.49),
(260, 83, '2022-04-26 21:08:29', 'Transfer of $1.00 received from account #82', 1, 1.01),
(261, 82, '2022-04-27 02:49:33', 'Deposit of $10.00', 10, 18.49);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `password`) VALUES
(12345, 'baraa', '$2y$10$59mXG0TOe.bxEHEyclk65OHKLpkWr5Wc1t8i093TOCaj1fENCvyMq');

-- --------------------------------------------------------

--
-- Table structure for table `staff_log`
--

CREATE TABLE `staff_log` (
  `log_ID` int(11) NOT NULL,
  `staff_ID` int(11) NOT NULL,
  `logDesc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_log`
--

INSERT INTO `staff_log` (`log_ID`, `staff_ID`, `logDesc`) VALUES
(1, 1, 'Test description'),
(2, 1, 'Test description');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_address`, `phone_number`, `username`, `password`) VALUES
(1, 'Ken', 'Haight', 'kenhaight22@gmail.com', '555 555 5555', 'haightk1', '$2y$10$rGdsBkT5H9swK1j/F492w.SWv7BvjmcxZ6pdFPuddT3Y1kx3FCCmi'),
(111, 'First', 'Last', 'abc@1234.com', '(111) 111-1119', 'Demo1234', '$2y$10$xBi7rQ.sw1BwB3hhDXC5rOqLO1rGi3Xmu2ngDBafWLjKi/B2Ldb5C'),
(113, 'John', 'Carmel', 'jc@gmail.com', '(123) 012-314', 'jc', '$2y$10$cO32ejCZsNevOP5VaS4LRuFfuSY.7y.597UZPoG56buLHhWAPwQf.'),
(112, 'Leeroy', 'Jenkins', 'LeeJen123@gmail.com', '(666) 666-6666', 'Leejen', '$2y$10$EXKyQep6X4hw/cghNY4qa.NzbcdLXN9qZxrIKfKWi4a/JmvLUpGWC'),
(114, 'a', 'a', 'a@ab.com', '(332) 909-0290', 'a', '$2y$10$25w7hkt8fj1FoFcEVMP38uwYFPYDR16roV7NKns9QqyPRBHtqhz3W'),
(107, 'First', 'Last', 'abc@123.com', '(201) 999-999', 'Demo', '$2y$10$f6L5DJUpoJxmx9CX0FQfTOLR3fs67YbPbkHv3uySTJmyq5J0Bs1SS'),
(108, 'Demo', 'Demo', '123@abc.com', '(111) 111-1111', 'Demo1', '$2y$10$R7i.w4aJuO9t0BER6qak5.yzaXaDlSjxLyXJu0mKDBcjbqrx0MiFu'),
(109, 'Mumin', 'Ahmed', 'Nemo1234@gmail.com', '(444) 444-444', 'Mahmed123', '$2y$10$FqsuFIFXsrMM.SeM5sLFweErouuzYSPlCZD3D4bFM8jonZm2TliW6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_log`
--
ALTER TABLE `staff_log`
  ADD PRIMARY KEY (`log_ID`),
  ADD KEY `staff_ID` (`staff_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `account_transactions`
--
ALTER TABLE `account_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT for table `staff_log`
--
ALTER TABLE `staff_log`
  MODIFY `log_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
