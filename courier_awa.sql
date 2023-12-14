-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2023 at 09:07 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier_awa`
--

-- --------------------------------------------------------

--
-- Table structure for table `courier_billings`
--

DROP TABLE IF EXISTS `courier_billings`;
CREATE TABLE IF NOT EXISTS `courier_billings` (
  `bill_id` int(100) NOT NULL AUTO_INCREMENT,
  `bill_parcel_code` varchar(225) NOT NULL,
  `bill_amount` varchar(225) NOT NULL,
  `bill_type` varchar(225) NOT NULL,
  `bill_clear` int(2) NOT NULL DEFAULT '0',
  `bill_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_billings`
--

INSERT INTO `courier_billings` (`bill_id`, `bill_parcel_code`, `bill_amount`, `bill_type`, `bill_clear`, `bill_date`) VALUES
(7, 'KS1676805783TL', '400', 'OVERDUE', 1, '2023-02-19 14:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `courier_branches`
--

DROP TABLE IF EXISTS `courier_branches`;
CREATE TABLE IF NOT EXISTS `courier_branches` (
  `branch_id` int(100) NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(225) NOT NULL,
  `prefix` varchar(5) NOT NULL,
  `branch_name` varchar(225) NOT NULL,
  `branch_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `branch_added_by` varchar(225) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_branches`
--

INSERT INTO `courier_branches` (`branch_id`, `branch_code`, `prefix`, `branch_name`, `branch_date_added`, `branch_added_by`) VALUES
(1, 'TL1350', 'TL', 'TAMALE INT. AIRPORT', '2022-12-14 02:35:29', ''),
(2, 'AC1750', 'AC', 'ACCRA INT. AIRPORT', '2022-12-14 02:35:29', ''),
(3, 'TK8898', 'TK', 'TAKORADI AIRPORT', '2022-12-17 13:00:39', 'mubasir18@gmail.com'),
(5, 'KS6889', 'KS', 'KUMASI INT. AIRPORT', '2023-01-06 02:18:58', 'bash228');

-- --------------------------------------------------------

--
-- Table structure for table `courier_constants`
--

DROP TABLE IF EXISTS `courier_constants`;
CREATE TABLE IF NOT EXISTS `courier_constants` (
  `constant_id` int(100) NOT NULL AUTO_INCREMENT,
  `rate_constant` varchar(100) NOT NULL,
  `return_rate` varchar(100) NOT NULL,
  PRIMARY KEY (`constant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_constants`
--

INSERT INTO `courier_constants` (`constant_id`, `rate_constant`, `return_rate`) VALUES
(1, '34', '350');

-- --------------------------------------------------------

--
-- Table structure for table `courier_customer`
--

DROP TABLE IF EXISTS `courier_customer`;
CREATE TABLE IF NOT EXISTS `courier_customer` (
  `cust_id` int(100) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(225) NOT NULL,
  `customer_address` varchar(225) NOT NULL,
  `customer_phone` varchar(225) NOT NULL,
  `customer_added_by` varchar(225) NOT NULL,
  `customer_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_customer`
--

INSERT INTO `courier_customer` (`cust_id`, `customer_name`, `customer_address`, `customer_phone`, `customer_added_by`, `customer_date_added`) VALUES
(3, 'DHL', 'DHL TAMALE', '0547895423', 'bash228', '2023-01-06 01:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `courier_error_log`
--

DROP TABLE IF EXISTS `courier_error_log`;
CREATE TABLE IF NOT EXISTS `courier_error_log` (
  `error_code` int(11) NOT NULL AUTO_INCREMENT,
  `error` varchar(5000) NOT NULL,
  `error_user` varchar(100) NOT NULL,
  `error_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`error_code`)
) ENGINE=MyISAM AUTO_INCREMENT=607 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_error_log`
--

INSERT INTO `courier_error_log` (`error_code`, `error`, `error_user`, `error_date`) VALUES
(603, '3.00158.001|TL1676822546AC', 'bash228', '2023-02-19 16:02:26'),
(604, '3.00158.001|TL1676822680AC', 'bash228', '2023-02-19 16:04:40'),
(605, '4.001|TL1676824134TK', 'bash228', '2023-02-19 16:28:55'),
(606, '4.00TLTK1|1676824270', 'bash228', '2023-02-19 16:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `courier_flight`
--

DROP TABLE IF EXISTS `courier_flight`;
CREATE TABLE IF NOT EXISTS `courier_flight` (
  `flight_id` int(100) NOT NULL AUTO_INCREMENT,
  `flight_code` varchar(225) NOT NULL,
  `flight_name` varchar(225) NOT NULL,
  `flight_descr` varchar(225) NOT NULL,
  `flight_added_by` varchar(225) NOT NULL,
  `alight_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`flight_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_flight`
--

INSERT INTO `courier_flight` (`flight_id`, `flight_code`, `flight_name`, `flight_descr`, `flight_added_by`, `alight_date_added`) VALUES
(1, 'AWA587', 'AWA 232', 'ASFE', 'mubasir18@gmail.com', '2022-12-17 12:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `courier_group`
--

DROP TABLE IF EXISTS `courier_group`;
CREATE TABLE IF NOT EXISTS `courier_group` (
  `group_id` int(100) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` varchar(225) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_group`
--

INSERT INTO `courier_group` (`group_id`, `group_name`, `date_added`, `added_by`) VALUES
(3, 'SUPER ADMIN', '2023-01-05 01:02:14', 'mubasir18@gmail.com'),
(4, 'ADMIN', '2023-01-05 04:04:30', 'bash228'),
(5, 'REGISTRY', '2023-01-05 04:04:56', 'bash228'),
(6, 'PROCESSING', '2023-01-05 04:05:00', 'bash228'),
(7, 'DELIVERY', '2023-01-05 04:05:14', 'bash228'),
(8, 'FINANCE', '2023-01-05 04:05:26', 'bash228');

-- --------------------------------------------------------

--
-- Table structure for table `courier_login`
--

DROP TABLE IF EXISTS `courier_login`;
CREATE TABLE IF NOT EXISTS `courier_login` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `branch_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_group` varchar(100) DEFAULT NULL,
  `last_login` varchar(225) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` varchar(100) DEFAULT NULL,
  `modifed_by` varchar(100) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `log_status` int(1) NOT NULL DEFAULT '0',
  `token` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_login`
--

INSERT INTO `courier_login` (`id`, `email`, `branch_id`, `firstname`, `lastname`, `password`, `access_group`, `last_login`, `created_by`, `date_created`, `date_modified`, `modifed_by`, `image`, `log_status`, `token`) VALUES
(14, 'bash228', 'TL1350', 'Issah', 'Mubasir', 'd574d4bb40c84861791a694a999cce69', '3', '05-Nov-2023 14:16:27', NULL, '2023-01-05 01:01:10', NULL, NULL, '../uploads/6439_yk.jpg', 1, ''),
(15, 'john', 'KS6889', 'John', 'Doe', '202cb962ac59075b964b07152d234b70', '3', '19-Feb-2023 11:13:08', NULL, '2023-01-05 03:01:13', NULL, NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `courier_login_token`
--

DROP TABLE IF EXISTS `courier_login_token`;
CREATE TABLE IF NOT EXISTS `courier_login_token` (
  `tok_id` int(100) NOT NULL AUTO_INCREMENT,
  `l_token` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`tok_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_login_token`
--

INSERT INTO `courier_login_token` (`tok_id`, `l_token`, `username`) VALUES
(6, 'Z2795a1cBU', 'bash228'),
(7, '5ki1Uc8dtr', 'john');

-- --------------------------------------------------------

--
-- Table structure for table `courier_logs`
--

DROP TABLE IF EXISTS `courier_logs`;
CREATE TABLE IF NOT EXISTS `courier_logs` (
  `iss_logid` int(225) NOT NULL AUTO_INCREMENT,
  `log_activity` varchar(1000) NOT NULL,
  `log_user` varchar(225) NOT NULL,
  `log_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_branch` varchar(100) NOT NULL,
  PRIMARY KEY (`iss_logid`)
) ENGINE=MyISAM AUTO_INCREMENT=927 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_logs`
--

INSERT INTO `courier_logs` (`iss_logid`, `log_activity`, `log_user`, `log_date_added`, `log_branch`) VALUES
(454, 'Access Created: Group: 3 Page: 26', 'bash228', '2023-01-05 18:02:08', 'TL1350'),
(453, 'Access Created: Group: 3 Page: 25', 'bash228', '2023-01-05 18:02:08', 'TL1350'),
(452, 'Access Created: Group: 3 Page: 24', 'bash228', '2023-01-05 18:02:08', 'TL1350'),
(451, 'Access Created: Group: 3 Page: 11', 'bash228', '2023-01-05 17:38:18', 'TL1350'),
(450, 'Access Created: Group: 3 Page: 4', 'bash228', '2023-01-05 17:38:18', 'TL1350'),
(449, 'Access Created: Group: 3 Page: 3', 'bash228', '2023-01-05 17:38:18', 'TL1350'),
(448, 'Access Created: Group: 3 Page: 1', 'bash228', '2023-01-05 17:38:18', 'TL1350'),
(447, 'Access Created: Group: 3 Page: 2', 'bash228', '2023-01-05 17:38:18', 'TL1350'),
(446, 'Access Created: Group: 3 Page: 26', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(445, 'Access Created: Group: 3 Page: 25', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(444, 'Access Created: Group: 3 Page: 24', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(443, 'Access Created: Group: 3 Page: 23', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(442, 'Access Created: Group: 3 Page: 22', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(441, 'Access Created: Group: 3 Page: 21', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(440, 'Access Created: Group: 3 Page: 20', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(439, 'Access Created: Group: 3 Page: 18', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(438, 'Access Created: Group: 3 Page: 19', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(437, 'Access Created: Group: 3 Page: 17', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(436, 'Access Created: Group: 3 Page: 16', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(435, 'Access Created: Group: 3 Page: 15', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(434, 'Access Created: Group: 3 Page: 14', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(433, 'Access Created: Group: 3 Page: 13', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(432, 'Access Created: Group: 3 Page: 12', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(431, 'Access Created: Group: 3 Page: 10', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(430, 'Access Created: Group: 3 Page: 9', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(429, 'Access Created: Group: 3 Page: 8', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(428, 'Access Created: Group: 3 Page: 7', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(427, 'Access Created: Group: 3 Page: 6', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(426, 'Access Created: Group: 3 Page: 11', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(425, 'Access Created: Group: 3 Page: 4', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(424, 'Access Created: Group: 3 Page: 3', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(423, 'Access Created: Group: 3 Page: 2', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(422, 'Access Created: Group: 3 Page: 1', 'bash228', '2023-01-05 17:38:05', 'TL1350'),
(421, 'Access Created: Group: 3 Page: 26', 'bash228', '2023-01-05 17:36:33', 'TL1350'),
(420, 'Access Created: Group: 3 Page: 25', 'bash228', '2023-01-05 17:36:33', 'TL1350'),
(419, 'Access Created: Group: 3 Page: 23', 'bash228', '2023-01-05 17:36:33', 'TL1350'),
(418, 'Access Created: Group: 3 Page: 24', 'bash228', '2023-01-05 17:36:33', 'TL1350'),
(417, 'Access Created: Group: 3 Page: 22', 'bash228', '2023-01-05 17:36:33', 'TL1350'),
(416, 'Access Created: Group: 3 Page: 21', 'bash228', '2023-01-05 17:36:33', 'TL1350'),
(415, 'Access Created: Group: 3 Page: 20', 'bash228', '2023-01-05 17:36:33', 'TL1350'),
(414, 'Access Created: Group: 3 Page: 19', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(413, 'Access Created: Group: 3 Page: 18', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(412, 'Access Created: Group: 3 Page: 17', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(411, 'Access Created: Group: 3 Page: 16', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(410, 'Access Created: Group: 3 Page: 15', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(409, 'Access Created: Group: 3 Page: 14', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(408, 'Access Created: Group: 3 Page: 13', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(407, 'Access Created: Group: 3 Page: 9', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(406, 'Access Created: Group: 3 Page: 12', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(405, 'Access Created: Group: 3 Page: 10', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(404, 'Access Created: Group: 3 Page: 8', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(403, 'Access Created: Group: 3 Page: 7', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(402, 'Access Created: Group: 3 Page: 6', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(401, 'Access Created: Group: 3 Page: 11', 'bash228', '2023-01-05 17:36:32', 'TL1350'),
(400, 'Access Created: Group: 3 Page: 3', 'bash228', '2023-01-05 17:33:38', 'TL1350'),
(399, 'Access Created: Group: 3 Page: 4', 'bash228', '2023-01-05 17:33:38', 'TL1350'),
(398, 'Access Created: Group: 3 Page: 2', 'bash228', '2023-01-05 17:33:38', 'TL1350'),
(397, 'Access Created: Group: 3 Page: 1', 'bash228', '2023-01-05 17:33:38', 'TL1350'),
(396, 'Access Created: Group: 3 Page: 26', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(395, 'Access Created: Group: 3 Page: 25', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(394, 'Access Created: Group: 3 Page: 24', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(393, 'Access Created: Group: 3 Page: 23', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(392, 'Access Created: Group: 3 Page: 22', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(391, 'Access Created: Group: 3 Page: 21', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(390, 'Access Created: Group: 3 Page: 20', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(389, 'Access Created: Group: 3 Page: 19', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(388, 'Access Created: Group: 3 Page: 18', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(387, 'Access Created: Group: 3 Page: 17', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(386, 'Access Created: Group: 3 Page: 16', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(385, 'Access Created: Group: 3 Page: 15', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(384, 'Access Created: Group: 3 Page: 14', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(383, 'Access Created: Group: 3 Page: 13', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(382, 'Access Created: Group: 3 Page: 12', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(381, 'Access Created: Group: 3 Page: 10', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(380, 'Access Created: Group: 3 Page: 9', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(379, 'Access Created: Group: 3 Page: 8', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(378, 'Access Created: Group: 3 Page: 7', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(377, 'Access Created: Group: 3 Page: 6', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(376, 'Access Created: Group: 3 Page: 11', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(375, 'Access Created: Group: 3 Page: 4', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(374, 'Access Created: Group: 3 Page: 3', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(373, 'Access Created: Group: 3 Page: 2', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(372, 'Access Created: Group: 3 Page: 1', 'bash228', '2023-01-05 17:23:31', 'TL1350'),
(371, 'Access Created: Group: 4 Page: 4', 'bash228', '2023-01-05 17:19:40', 'TL1350'),
(370, 'Access Created: Group: 4 Page: 8', 'bash228', '2023-01-05 17:19:40', 'TL1350'),
(369, 'Access Created: Group: 4 Page: 8', 'bash228', '2023-01-05 17:19:40', 'TL1350'),
(368, 'Access Created: Group: 4 Page: 6', 'bash228', '2023-01-05 17:19:40', 'TL1350'),
(367, 'Access Created: Group: 4 Page: 4', 'bash228', '2023-01-05 17:19:40', 'TL1350'),
(366, 'Access Created: Group: 4 Page: 2', 'bash228', '2023-01-05 17:19:40', 'TL1350'),
(365, 'Access Created: Group: 4 Page: 7', 'bash228', '2023-01-05 17:19:40', 'TL1350'),
(364, 'Access Created: Group: 4 Page: 3', 'bash228', '2023-01-05 17:19:40', 'TL1350'),
(363, 'Access Created: Group: 4 Page: 1', 'bash228', '2023-01-05 17:19:40', 'TL1350'),
(362, 'Access Created: Group: 5 Page: 8', 'bash228', '2023-01-05 17:13:54', 'TL1350'),
(361, 'Access Created: Group: 5 Page: 8', 'bash228', '2023-01-05 17:13:54', 'TL1350'),
(360, 'Access Created: Group: 5 Page: 7', 'bash228', '2023-01-05 17:13:54', 'TL1350'),
(359, 'Access Created: Group: 5 Page: 6', 'bash228', '2023-01-05 17:13:54', 'TL1350'),
(358, 'Access Created: Group: 5 Page: 4', 'bash228', '2023-01-05 17:13:54', 'TL1350'),
(357, 'Access Created: Group: 5 Page: 4', 'bash228', '2023-01-05 17:13:54', 'TL1350'),
(356, 'Access Created: Group: 5 Page: 3', 'bash228', '2023-01-05 17:13:54', 'TL1350'),
(355, 'Access Created: Group: 5 Page: 2', 'bash228', '2023-01-05 17:13:54', 'TL1350'),
(354, 'Access Created: Group: 5 Page: 1', 'bash228', '2023-01-05 17:13:54', 'TL1350'),
(353, 'Access Created: Group: 5 Page: 8', 'bash228', '2023-01-05 17:13:24', 'TL1350'),
(352, 'Access Created: Group: 5 Page: 8', 'bash228', '2023-01-05 17:13:24', 'TL1350'),
(351, 'Access Created: Group: 5 Page: 7', 'bash228', '2023-01-05 17:13:24', 'TL1350'),
(350, 'Access Created: Group: 5 Page: 4', 'bash228', '2023-01-05 17:13:24', 'TL1350'),
(349, 'Access Created: Group: 5 Page: 4', 'bash228', '2023-01-05 17:13:24', 'TL1350'),
(348, 'Access Created: Group: 5 Page: 6', 'bash228', '2023-01-05 17:13:24', 'TL1350'),
(347, 'Access Created: Group: 5 Page: 3', 'bash228', '2023-01-05 17:13:24', 'TL1350'),
(346, 'Access Created: Group: 5 Page: 2', 'bash228', '2023-01-05 17:13:24', 'TL1350'),
(345, 'Access Created: Group: 5 Page: 1', 'bash228', '2023-01-05 17:13:24', 'TL1350'),
(344, 'Access Created: Group: 5 Page: 8', 'bash228', '2023-01-05 17:10:56', 'TL1350'),
(343, 'Access Created: Group: 5 Page: 8', 'bash228', '2023-01-05 17:10:56', 'TL1350'),
(342, 'Access Created: Group: 5 Page: 7', 'bash228', '2023-01-05 17:10:56', 'TL1350'),
(341, 'Access Created: Group: 5 Page: 3', 'bash228', '2023-01-05 17:10:56', 'TL1350'),
(340, 'Access Created: Group: 5 Page: 6', 'bash228', '2023-01-05 17:10:56', 'TL1350'),
(339, 'Access Created: Group: 5 Page: 4', 'bash228', '2023-01-05 17:10:56', 'TL1350'),
(338, 'Access Created: Group: 5 Page: 4', 'bash228', '2023-01-05 17:10:56', 'TL1350'),
(337, 'Access Created: Group: 5 Page: 2', 'bash228', '2023-01-05 17:10:56', 'TL1350'),
(336, 'Access Created: Group: 5 Page: 1', 'bash228', '2023-01-05 17:10:56', 'TL1350'),
(335, 'Access Created: Group: 5 Page: 2', 'bash228', '2023-01-05 16:55:27', 'TL1350'),
(334, 'Access Created: Group: 5 Page: 3', 'bash228', '2023-01-05 16:55:27', 'TL1350'),
(333, 'Access Created: Group: 5 Page: 4', 'bash228', '2023-01-05 16:55:27', 'TL1350'),
(332, 'Access Created: Group: 5 Page: 1', 'bash228', '2023-01-05 16:55:27', 'TL1350'),
(331, 'Access Created: Group: 5 Page: 2', 'bash228', '2023-01-05 16:55:24', 'TL1350'),
(330, 'Access Created: Group: 5 Page: 4', 'bash228', '2023-01-05 16:55:24', 'TL1350'),
(329, 'Access Created: Group: 5 Page: 3', 'bash228', '2023-01-05 16:55:24', 'TL1350'),
(328, 'Access Created: Group: 5 Page: 1', 'bash228', '2023-01-05 16:55:24', 'TL1350'),
(327, 'Access Created: Group: 3 Page: 26', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(326, 'Access Created: Group: 3 Page: 25', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(325, 'Access Created: Group: 3 Page: 24', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(324, 'Access Created: Group: 3 Page: 20', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(323, 'Access Created: Group: 3 Page: 22', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(322, 'Access Created: Group: 3 Page: 21', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(321, 'Access Created: Group: 3 Page: 23', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(320, 'Access Created: Group: 3 Page: 19', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(319, 'Access Created: Group: 3 Page: 18', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(318, 'Access Created: Group: 3 Page: 17', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(317, 'Access Created: Group: 3 Page: 16', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(316, 'Access Created: Group: 3 Page: 15', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(315, 'Access Created: Group: 3 Page: 9', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(314, 'Access Created: Group: 3 Page: 8', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(313, 'Access Created: Group: 3 Page: 10', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(312, 'Access Created: Group: 3 Page: 14', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(311, 'Access Created: Group: 3 Page: 13', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(310, 'Access Created: Group: 3 Page: 12', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(309, 'Access Created: Group: 3 Page: 7', 'bash228', '2023-01-05 16:54:05', 'TL1350'),
(308, 'Access Created: Group: 3 Page: 6', 'bash228', '2023-01-05 16:54:04', 'TL1350'),
(307, 'Access Created: Group: 3 Page: 11', 'bash228', '2023-01-05 16:54:04', 'TL1350'),
(305, 'Access Created: Group: 3 Page: 3', 'bash228', '2023-01-05 16:54:04', 'TL1350'),
(306, 'Access Created: Group: 3 Page: 4', 'bash228', '2023-01-05 16:54:04', 'TL1350'),
(304, 'Access Created: Group: 3 Page: 2', 'bash228', '2023-01-05 16:54:04', 'TL1350'),
(303, 'Access Created: Group: 3 Page: 1', 'bash228', '2023-01-05 16:54:04', 'TL1350'),
(302, 'Access Created: Group:  Page: 26', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(301, 'Access Created: Group:  Page: 25', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(300, 'Access Created: Group:  Page: 24', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(299, 'Access Created: Group:  Page: 23', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(298, 'Access Created: Group:  Page: 22', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(297, 'Access Created: Group:  Page: 21', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(296, 'Access Created: Group:  Page: 20', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(295, 'Access Created: Group:  Page: 19', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(294, 'Access Created: Group:  Page: 18', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(293, 'Access Created: Group:  Page: 17', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(292, 'Access Created: Group:  Page: 16', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(291, 'Access Created: Group:  Page: 15', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(290, 'Access Created: Group:  Page: 14', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(289, 'Access Created: Group:  Page: 13', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(288, 'Access Created: Group:  Page: 10', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(287, 'Access Created: Group:  Page: 12', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(286, 'Access Created: Group:  Page: 9', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(285, 'Access Created: Group:  Page: 8', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(284, 'Access Created: Group:  Page: 7', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(283, 'Access Created: Group:  Page: 6', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(282, 'Access Created: Group:  Page: 11', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(281, 'Access Created: Group:  Page: 4', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(280, 'Access Created: Group:  Page: 3', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(279, 'Access Created: Group:  Page: 2', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(278, 'Access Created: Group:  Page: 1', 'bash228', '2023-01-05 15:11:18', 'TL1350'),
(277, 'New Page Created. Page Name: LOG', 'bash228', '2023-01-05 05:32:35', 'TL1350'),
(276, 'New Page Created. Page Name: RATES', 'bash228', '2023-01-05 05:32:28', 'TL1350'),
(275, 'New Page Created. Page Name: FLIGHTS', 'bash228', '2023-01-05 05:32:21', 'TL1350'),
(274, 'New Page Created. Page Name: BRANCHES', 'bash228', '2023-01-05 05:32:13', 'TL1350'),
(273, 'New Page Created. Page Name: CUSTOMERS', 'bash228', '2023-01-05 05:32:03', 'TL1350'),
(272, 'New Page Created. Page Name: USER GROUPINGS', 'bash228', '2023-01-05 05:31:56', 'TL1350'),
(271, 'New Page Created. Page Name: USERS', 'bash228', '2023-01-05 05:31:44', 'TL1350'),
(270, 'New Page Created. Page Name: COMPANY PARCEL SENT', 'bash228', '2023-01-05 05:31:29', 'TL1350'),
(269, 'New Page Created. Page Name: LOCAL PARCEL SENT', 'bash228', '2023-01-05 05:31:19', 'TL1350'),
(268, 'New Page Created. Page Name: DASHBOARD', 'bash228', '2023-01-05 04:19:51', 'TL1350'),
(267, 'New Page Created. Page Name: DELIVERY', 'bash228', '2023-01-05 04:18:57', 'TL1350'),
(266, 'New Page Created. Page Name: RECEIVE MANIFEST', 'bash228', '2023-01-05 04:18:42', 'TL1350'),
(265, 'New Page Created. Page Name: VIEW MANIFEST', 'bash228', '2023-01-05 04:17:43', 'TL1350'),
(264, 'New Page Created. Page Name: DISPATCH CONSIGNMENT', 'bash228', '2023-01-05 04:17:15', 'TL1350'),
(263, 'New Page Created. Page Name: ASSIGN MANIFEST', 'bash228', '2023-01-05 04:16:55', 'TL1350'),
(262, 'New Page Created. Page Name: VIEW MANIFEST', 'bash228', '2023-01-05 04:16:46', 'TL1350'),
(261, 'New Page Created. Page Name: CREATE MANIFEST', 'bash228', '2023-01-05 04:16:15', 'TL1350'),
(260, 'New Page Created. Page Name: DASHBOARD', 'bash228', '2023-01-05 04:16:05', 'TL1350'),
(259, 'New Page Created. Page Name: PARCEL TRACKING', 'bash228', '2023-01-05 04:15:48', 'TL1350'),
(258, 'New Page Created. Page Name: VIEW PAYMENT', 'bash228', '2023-01-05 04:15:41', 'TL1350'),
(257, 'New Page Created. Page Name: ADD PAYMENT', 'bash228', '2023-01-05 04:15:22', 'TL1350'),
(256, 'New Page Created. Page Name: ', 'bash228', '2023-01-05 04:14:34', 'TL1350'),
(255, 'New Group Created. Group Name: FINANCE', 'bash228', '2023-01-05 04:05:26', 'TL1350'),
(254, 'New Group Created. Group Name: DELIVERY', 'bash228', '2023-01-05 04:05:14', 'TL1350'),
(253, 'New Group Created. Group Name: PROCESSING', 'bash228', '2023-01-05 04:05:00', 'TL1350'),
(252, 'New Group Created. Group Name: REGISTRY', 'bash228', '2023-01-05 04:04:56', 'TL1350'),
(251, 'New Group Created. Group Name: ADMIN', 'bash228', '2023-01-05 04:04:30', 'TL1350'),
(250, 'Parcel - 1672880762 Issued at : AC1750', 'john', '2023-01-05 03:19:42', 'AC1750'),
(249, 'Parcel - 1672880762 Received at : AC1750', 'john', '2023-01-05 03:09:26', 'AC1750'),
(248, 'New Account Created. User: john', 'bash228', '2023-01-05 03:01:13', 'TL1350'),
(247, 'MANIFEST DISPATCHED - TL51508435', 'bash228', '2023-01-05 02:59:50', 'TL1350'),
(246, 'Parcel - 1672880762 Assigned to : TL51508435', 'bash228', '2023-01-05 02:30:56', 'TL1350'),
(245, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-05 02:30:44', 'TL1350'),
(244, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-05 02:29:41', 'TL1350'),
(243, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-05 02:27:18', 'TL1350'),
(242, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-05 02:19:23', 'TL1350'),
(241, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-05 02:16:58', 'TL1350'),
(240, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-05 02:15:34', 'TL1350'),
(239, 'Payment Confirmed. Parcel Code: 1672880762', 'bash228', '2023-01-05 01:56:38', 'TL1350'),
(238, 'New Consignment Created. Parcel Code: 1672880762', 'bash228', '2023-01-05 01:06:02', 'TL1350'),
(237, 'New Group Created. Group Name: Super Admin', 'mubasir18@gmail.com', '2023-01-05 01:02:14', 'TL1350'),
(455, 'Access Created: Group: 3 Page: 1', 'bash228', '2023-01-05 18:02:42', 'TL1350'),
(456, 'Access Created: Group: 3 Page: 2', 'bash228', '2023-01-05 18:02:42', 'TL1350'),
(457, 'Access Created: Group: 3 Page: 3', 'bash228', '2023-01-05 18:02:42', 'TL1350'),
(458, 'Access Created: Group: 3 Page: 4', 'bash228', '2023-01-05 18:02:42', 'TL1350'),
(459, 'Access Created: Group: 3 Page: 11', 'bash228', '2023-01-05 18:02:42', 'TL1350'),
(460, 'Access Created: Group: 3 Page: 24', 'bash228', '2023-01-05 18:02:42', 'TL1350'),
(461, 'Access Created: Group: 3 Page: 25', 'bash228', '2023-01-05 18:02:42', 'TL1350'),
(462, 'Access Created: Group: 3 Page: 26', 'bash228', '2023-01-05 18:02:42', 'TL1350'),
(463, 'Access Created: Group: 4 Page: 1', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(464, 'Access Created: Group: 4 Page: 2', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(465, 'Access Created: Group: 4 Page: 4', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(466, 'Access Created: Group: 4 Page: 3', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(467, 'Access Created: Group: 4 Page: 6', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(468, 'Access Created: Group: 4 Page: 11', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(469, 'Access Created: Group: 4 Page: 7', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(470, 'Access Created: Group: 4 Page: 8', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(471, 'Access Created: Group: 4 Page: 9', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(472, 'Access Created: Group: 4 Page: 10', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(473, 'Access Created: Group: 4 Page: 12', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(474, 'Access Created: Group: 4 Page: 13', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(475, 'Access Created: Group: 4 Page: 14', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(476, 'Access Created: Group: 4 Page: 15', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(477, 'Access Created: Group: 4 Page: 16', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(478, 'Access Created: Group: 4 Page: 17', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(479, 'Access Created: Group: 4 Page: 18', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(480, 'Access Created: Group: 4 Page: 19', 'bash228', '2023-01-05 18:03:26', 'TL1350'),
(481, 'Access Created: Group: 5 Page: 1', 'bash228', '2023-01-05 18:03:51', 'TL1350'),
(482, 'Access Created: Group: 5 Page: 2', 'bash228', '2023-01-05 18:03:51', 'TL1350'),
(483, 'Access Created: Group: 5 Page: 3', 'bash228', '2023-01-05 18:03:51', 'TL1350'),
(484, 'Access Created: Group: 5 Page: 8', 'bash228', '2023-01-05 18:03:51', 'TL1350'),
(485, 'Access Created: Group: 5 Page: 4', 'bash228', '2023-01-05 18:03:51', 'TL1350'),
(486, 'Access Created: Group: 5 Page: 6', 'bash228', '2023-01-05 18:03:51', 'TL1350'),
(487, 'Access Created: Group: 5 Page: 7', 'bash228', '2023-01-05 18:03:51', 'TL1350'),
(488, 'Access Created: Group: 6 Page: 11', 'bash228', '2023-01-05 18:04:06', 'TL1350'),
(489, 'Access Created: Group: 6 Page: 9', 'bash228', '2023-01-05 18:04:06', 'TL1350'),
(490, 'Access Created: Group: 6 Page: 10', 'bash228', '2023-01-05 18:04:06', 'TL1350'),
(491, 'Access Created: Group: 6 Page: 12', 'bash228', '2023-01-05 18:04:06', 'TL1350'),
(492, 'Access Created: Group: 6 Page: 13', 'bash228', '2023-01-05 18:04:06', 'TL1350'),
(493, 'Access Created: Group: 7 Page: 1', 'bash228', '2023-01-05 18:04:20', 'TL1350'),
(494, 'Access Created: Group: 7 Page: 14', 'bash228', '2023-01-05 18:04:20', 'TL1350'),
(495, 'Access Created: Group: 7 Page: 15', 'bash228', '2023-01-05 18:04:20', 'TL1350'),
(496, 'Access Created: Group: 7 Page: 16', 'bash228', '2023-01-05 18:04:20', 'TL1350'),
(497, 'Access Created: Group: 6 Page: 1', 'bash228', '2023-01-05 18:04:28', 'TL1350'),
(498, 'Access Created: Group: 8 Page: 17', 'bash228', '2023-01-05 18:04:41', 'TL1350'),
(499, 'Access Created: Group: 8 Page: 18', 'bash228', '2023-01-05 18:04:41', 'TL1350'),
(500, 'Access Created: Group: 8 Page: 19', 'bash228', '2023-01-05 18:04:41', 'TL1350'),
(501, 'User Account Updated. User: bash228', 'bash228', '2023-01-05 18:34:13', 'TL1350'),
(502, 'User Account Updated. User: bash228', 'bash228', '2023-01-05 18:38:19', 'TL1350'),
(503, 'User Account Updated. User: john', 'bash228', '2023-01-05 21:07:59', 'TL1350'),
(504, 'New Customer Created. Name: dhl', 'bash228', '2023-01-05 23:13:17', 'TL1350'),
(505, 'Customer Updated. ID: 2', 'bash228', '2023-01-06 01:48:33', 'TL1350'),
(506, 'Customer Deleted. ID: 2', 'bash228', '2023-01-06 01:48:39', 'TL1350'),
(507, 'New Customer Created. Name: DHL', 'bash228', '2023-01-06 01:48:51', 'TL1350'),
(508, 'Branch Updated. Branch Name: TAMALEs', 'bash228', '2023-01-06 02:13:44', 'TL1350'),
(509, 'Branch Updated. Branch Name: TAMALE', 'bash228', '2023-01-06 02:14:32', 'TL1350'),
(510, 'New Branch Created. Branch Name: ks4064', 'bash228', '2023-01-06 02:18:18', 'TL1350'),
(511, 'Branch Deleted. Branch Code: ks4064', 'bash228', '2023-01-06 02:18:50', 'TL1350'),
(512, 'New Branch Created. Branch Name: KS6889', 'bash228', '2023-01-06 02:18:58', 'TL1350'),
(513, 'Branch Updated. Branch Name: TAKORADI', 'bash228', '2023-01-06 02:19:04', 'TL1350'),
(514, 'Branch Updated. Branch Name: ACCRA', 'bash228', '2023-01-06 02:19:07', 'TL1350'),
(515, 'Flight Updated. Flight Name: ', 'bash228', '2023-01-06 02:51:24', 'TL1350'),
(516, 'Flight Updated. Flight Name: ', 'bash228', '2023-01-06 02:52:13', 'TL1350'),
(517, 'Flight Updated. Flight Name: AWA 232', 'bash228', '2023-01-06 02:52:50', 'TL1350'),
(518, 'New Flight Created. Flight Name: aba 223', 'bash228', '2023-01-06 02:56:02', 'TL1350'),
(519, 'Flight Deleted. Flight ID: AWA576', 'bash228', '2023-01-06 02:56:30', 'TL1350'),
(520, 'New Rate Created. Weight: 1 - 2 Orig.  Dest.  Price 5', 'bash228', '2023-01-06 02:58:40', 'TL1350'),
(521, 'New Rate Created. Weight: 0.1 - 0.7. Price 22', 'bash228', '2023-01-06 02:59:35', 'TL1350'),
(522, 'Rate Updated. Weight: 1 - 4. Price 5', 'bash228', '2023-01-06 03:24:23', 'TL1350'),
(523, 'Rate Updated. Weight: 1 - 4. Price 5', 'bash228', '2023-01-06 03:24:36', 'TL1350'),
(524, 'Rate Updated. Weight: 1 - 4. Price 5', 'bash228', '2023-01-06 03:25:33', 'TL1350'),
(525, 'Rate Updated. Weight: 1 - 4. Price 4', 'bash228', '2023-01-06 03:25:39', 'TL1350'),
(526, 'Rate Deleted. Rate ID: 3', 'bash228', '2023-01-06 03:27:40', 'TL1350'),
(527, 'Rate Updated. Weight: 2 - 4. Price 4', 'bash228', '2023-01-06 13:48:35', 'TL1350'),
(528, 'New Consignment Created. Parcel Code: 1673060892', 'bash228', '2023-01-07 03:08:12', 'TL1350'),
(529, 'New Consignment Created. Parcel Code: 1673062272', 'bash228', '2023-01-07 03:31:12', 'TL1350'),
(530, 'New Consignment Created. Parcel Code: 1673098377', 'bash228', '2023-01-07 13:32:57', 'TL1350'),
(531, 'New Consignment Created. Parcel Code: 1673224771', 'bash228', '2023-01-09 00:39:31', 'TL1350'),
(532, 'Payment Confirmed. Parcel Code: 1673224771', 'bash228', '2023-01-09 00:51:19', 'TL1350'),
(533, 'Rate Updated. Weight: 0.00 - 4. Price 120', 'bash228', '2023-01-09 18:13:30', 'TL1350'),
(534, 'Rate Updated. Weight: 0.00 - 4.00. Price 120', 'bash228', '2023-01-09 18:13:38', 'TL1350'),
(535, 'Login Successful', 'bash228', '2023-01-10 15:25:27', 'TL1350'),
(536, 'Login Successful', 'bash228', '2023-01-10 16:13:26', 'TL1350'),
(537, 'Login Successful', 'bash228', '2023-01-10 16:18:29', 'TL1350'),
(538, 'Login Successful', 'bash228', '2023-01-10 16:28:51', 'TL1350'),
(539, 'Login Successful', 'bash228', '2023-01-11 08:31:25', 'TL1350'),
(540, 'Login Successful', 'bash228', '2023-01-11 08:38:51', 'TL1350'),
(541, 'Login Successful', 'bash228', '2023-01-11 08:39:44', 'TL1350'),
(542, 'Login Successful', 'bash228', '2023-01-11 09:03:28', 'TL1350'),
(543, 'Login Successful', 'bash228', '2023-01-12 09:50:07', 'TL1350'),
(544, 'Login Successful', 'bash228', '2023-01-12 09:50:07', 'TL1350'),
(545, 'Login Successful', 'bash228', '2023-01-12 09:50:07', 'TL1350'),
(546, 'Login Successful', 'bash228', '2023-01-12 09:50:07', 'TL1350'),
(547, 'Login Successful', 'bash228', '2023-01-12 09:50:07', 'TL1350'),
(548, 'Login Successful', 'bash228', '2023-01-12 09:50:08', 'TL1350'),
(549, 'Login Successful', 'bash228', '2023-01-12 09:50:08', 'TL1350'),
(550, 'New Rate Created. Weight: 4 - 8. Price 200', 'bash228', '2023-01-12 09:51:13', 'TL1350'),
(551, 'Login Successful', 'bash228', '2023-01-12 11:08:19', 'TL1350'),
(552, 'Login Successful', 'bash228', '2023-01-12 12:44:32', 'TL1350'),
(553, 'Login Successful', 'bash228', '2023-01-12 12:45:49', 'TL1350'),
(554, 'Login Successful', 'bash228', '2023-01-12 15:42:09', 'TL1350'),
(555, 'Login Successful', 'bash228', '2023-01-13 09:20:01', 'TL1350'),
(556, 'New Consignment Created. Parcel Code: 1673611252', 'bash228', '2023-01-13 12:00:52', 'TL1350'),
(557, 'Consignment Updated. Parcel Code: 1673611252', 'bash228', '2023-01-13 12:24:35', 'TL1350'),
(558, 'Consignment Updated. Parcel Code: 1672880762', 'bash228', '2023-01-13 12:26:09', 'TL1350'),
(559, 'Consignment Updated. Parcel Code: 1672880762', 'bash228', '2023-01-13 15:45:02', 'TL1350'),
(560, 'Consignment Updated. Parcel Code: 1672880762', 'bash228', '2023-01-13 15:52:47', 'TL1350'),
(561, 'Consignment Updated. Parcel Code: 1672880762', 'bash228', '2023-01-13 15:59:32', 'TL1350'),
(562, 'Login Successful', 'bash228', '2023-01-14 17:07:04', 'TL1350'),
(563, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-01-15 03:23:08', 'TL1350'),
(564, 'New Manifest Created. From : TL1350 To: KS6889', 'bash228', '2023-01-15 03:25:23', 'TL1350'),
(565, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-15 04:15:26', 'TL1350'),
(566, 'Parcel - 1673224771 Assigned to : TL71754441', 'bash228', '2023-01-15 04:15:37', 'TL1350'),
(567, 'Parcel - 1673062272 Removed from : TL71754441', 'bash228', '2023-01-15 04:15:37', 'TL1350'),
(568, 'Login Successful', 'bash228', '2023-01-15 10:01:40', 'TL1350'),
(569, 'Branch Updated. Branch Name: TAMALE INTERNATIONAL AIRPORT', 'bash228', '2023-01-15 10:02:37', 'TL1350'),
(570, 'Branch Updated. Branch Name: ACCRA INTERNATIONAL AIRPORT', 'bash228', '2023-01-15 10:07:14', 'TL1350'),
(571, 'Branch Updated. Branch Name: TAKORADI AIRPORT', 'bash228', '2023-01-15 10:07:24', 'TL1350'),
(572, 'Branch Updated. Branch Name: KUMASI INTERNATIONAL AIRPORT', 'bash228', '2023-01-15 10:07:35', 'TL1350'),
(573, 'New Consignment Created. Parcel Code: 1673777867', 'bash228', '2023-01-15 10:17:47', 'TL1350'),
(574, 'New Manifest Created. From : TL1350 To: ', 'bash228', '2023-01-15 10:25:03', 'TL1350'),
(575, 'New Manifest Created. From : TL1350 To: ', 'bash228', '2023-01-15 10:25:13', 'TL1350'),
(576, 'New Manifest Created. From : TL1350 To: ', 'bash228', '2023-01-15 10:25:25', 'TL1350'),
(577, 'Manifest Deleted. Manifest Code: TL84408004', 'bash228', '2023-01-15 10:50:07', 'TL1350'),
(578, 'Manifest Deleted. Manifest Code: TL71754441', 'bash228', '2023-01-15 10:53:21', 'TL1350'),
(579, 'Manifest Deleted. Manifest Code: TL80837734', 'bash228', '2023-01-15 10:54:17', 'TL1350'),
(580, 'Manifest Deleted. Manifest Code: TL64783907', 'bash228', '2023-01-15 10:55:15', 'TL1350'),
(581, 'Manifest Deleted. Manifest Code: TL64783907', 'bash228', '2023-01-15 10:55:27', 'TL1350'),
(582, 'Manifest Deleted. Manifest Code: TL13040506', 'bash228', '2023-01-15 10:56:34', 'TL1350'),
(583, 'Manifest Deleted. Manifest Code: TL29151521', 'bash228', '2023-01-15 10:59:56', 'TL1350'),
(584, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-01-15 11:05:06', 'TL1350'),
(585, 'Parcel - 1673062272 Assigned to : TL57860457', 'bash228', '2023-01-15 11:05:11', 'TL1350'),
(586, 'Manifest Deleted. Manifest Code: TL57860457', 'bash228', '2023-01-15 11:05:37', 'TL1350'),
(587, 'New Manifest Created. From : TL1350 To: KS6889', 'bash228', '2023-01-15 11:10:11', 'TL1350'),
(588, 'New Consignment Created. Parcel Code: 1673781752', 'bash228', '2023-01-15 11:22:32', 'TL1350'),
(589, 'Payment Confirmed. Parcel Code: 1673781752', 'bash228', '2023-01-15 11:24:03', 'TL1350'),
(590, 'Manifest Deleted. Manifest Code: TL90705040', 'bash228', '2023-01-15 11:24:32', 'TL1350'),
(591, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-15 11:25:44', 'TL1350'),
(592, 'Manifest Deleted. Manifest Code: TL93664057', 'bash228', '2023-01-15 11:26:38', 'TL1350'),
(593, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-01-15 11:28:38', 'TL1350'),
(594, 'Parcel - 1673781752 Assigned to : TL93002343', 'bash228', '2023-01-15 11:28:41', 'TL1350'),
(595, 'Manifest Deleted. Manifest Code: TL93002343', 'bash228', '2023-01-15 11:28:52', 'TL1350'),
(596, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-15 11:30:17', 'TL1350'),
(597, 'Parcel - 1673781752 Assigned to : TL91506910', 'bash228', '2023-01-15 11:30:21', 'TL1350'),
(598, 'Parcel - 1673781752 Removed from : TL91506910', 'bash228', '2023-01-15 11:30:57', 'TL1350'),
(599, 'Manifest Deleted. Manifest Code: TL91506910', 'bash228', '2023-01-15 11:31:21', 'TL1350'),
(600, 'New Consignment Created. Parcel Code: 1673783087', 'bash228', '2023-01-15 11:44:47', 'TL1350'),
(601, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-15 11:48:55', 'TL1350'),
(602, 'Payment Confirmed. Parcel Code: 1673783087', 'bash228', '2023-01-15 11:49:18', 'TL1350'),
(603, 'New Consignment Created. Parcel Code: 1673783721', 'bash228', '2023-01-15 11:55:21', 'TL1350'),
(604, 'Payment Confirmed. Parcel Code: 1673783721', 'bash228', '2023-01-15 11:55:37', 'TL1350'),
(605, 'Payment Confirmed. Parcel Code: 1673783724', 'bash228', '2023-01-15 11:56:26', 'TL1350'),
(606, 'Parcel - 1673783721 Removed from : TL92166903', 'bash228', '2023-01-15 11:58:09', 'TL1350'),
(607, 'Rate Updated. Weight: 4.01 - 8. Price 200', 'bash228', '2023-01-15 12:16:42', 'TL1350'),
(608, 'Login Successful', 'bash228', '2023-01-16 05:28:35', 'TL1350'),
(609, 'Login Successful', 'bash228', '2023-01-16 12:53:06', 'TL1350'),
(610, 'Login Successful', 'bash228', '2023-01-17 11:22:10', 'TL1350'),
(611, 'Login Successful', 'bash228', '2023-01-18 00:15:26', 'TL1350'),
(612, 'Branch Updated. Branch Name: TAMALE INT. AIRPORT', 'bash228', '2023-01-18 00:17:28', 'TL1350'),
(613, 'Branch Updated. Branch Name: ACCRA INT. AIRPORT', 'bash228', '2023-01-18 00:17:53', 'TL1350'),
(614, 'Branch Updated. Branch Name: KUMASI INT. AIRPORT', 'bash228', '2023-01-18 00:18:06', 'TL1350'),
(615, 'Payment Confirmed. Parcel Code: 1673224771', 'bash228', '2023-01-18 00:35:55', 'TL1350'),
(616, 'Login Successful', 'bash228', '2023-01-18 09:33:55', 'TL1350'),
(617, 'Login Successful', 'bash228', '2023-01-18 10:40:53', 'TL1350'),
(618, 'Login Successful', 'bash228', '2023-01-18 10:41:13', 'TL1350'),
(619, 'Login Successful', 'bash228', '2023-01-18 10:55:13', 'TL1350'),
(620, 'Login Successful', 'bash228', '2023-01-18 10:57:49', 'TL1350'),
(621, 'Login Successful', 'bash228', '2023-01-18 10:58:38', 'TL1350'),
(622, 'Login Successful', 'bash228', '2023-01-18 11:08:25', 'TL1350'),
(623, 'Login Successful', 'bash228', '2023-01-18 11:10:42', 'TL1350'),
(624, 'Login Successful', 'bash228', '2023-01-18 11:23:21', 'TL1350'),
(625, 'Login Successful', 'bash228', '2023-01-18 11:23:56', 'TL1350'),
(626, 'Login Successful', 'bash228', '2023-01-18 12:03:26', 'TL1350'),
(627, 'Login Successful', 'bash228', '2023-01-18 16:37:49', 'TL1350'),
(628, 'Login Successful', 'bash228', '2023-01-19 09:24:25', 'TL1350'),
(629, 'Login Successful', 'bash228', '2023-01-19 09:48:24', 'TL1350'),
(630, 'Login Successful', 'bash228', '2023-01-19 09:49:24', 'TL1350'),
(631, 'Login Successful', 'bash228', '2023-01-19 09:52:13', 'TL1350'),
(632, 'Login Successful', 'bash228', '2023-01-19 09:53:54', 'TL1350'),
(633, 'Login Successful', 'bash228', '2023-01-19 09:55:05', 'TL1350'),
(634, 'Login Successful', 'bash228', '2023-01-19 10:00:20', 'TL1350'),
(635, 'Login Successful', 'bash228', '2023-01-19 10:00:56', 'TL1350'),
(636, 'Login Successful', 'bash228', '2023-01-19 10:02:40', 'TL1350'),
(637, 'Login Successful', 'bash228', '2023-01-19 10:02:57', 'TL1350'),
(638, 'Login Successful', 'bash228', '2023-01-19 10:03:06', 'TL1350'),
(639, 'Login Successful', 'bash228', '2023-01-19 11:27:12', 'TL1350'),
(640, 'Login Successful', 'bash228', '2023-01-19 11:28:38', 'TL1350'),
(641, 'Login Successful', 'bash228', '2023-01-19 11:28:46', 'TL1350'),
(642, 'Login Successful', 'bash228', '2023-01-19 11:28:55', 'TL1350'),
(643, 'Login Successful', 'bash228', '2023-01-19 11:29:06', 'TL1350'),
(644, 'Login Successful', 'bash228', '2023-01-19 15:07:05', 'TL1350'),
(645, 'New Consignment Created. Parcel Code: 1674143392', 'bash228', '2023-01-19 15:49:52', 'TL1350'),
(646, 'Login Successful', 'bash228', '2023-01-21 20:16:49', 'TL1350'),
(647, 'Login Successful', 'bash228', '2023-01-21 20:17:01', 'TL1350'),
(648, 'Login Successful', 'bash228', '2023-01-21 20:17:14', 'TL1350'),
(649, 'Login Successful', 'bash228', '2023-01-21 20:18:14', 'TL1350'),
(650, 'Login Successful', 'bash228', '2023-01-21 20:19:38', 'TL1350'),
(651, 'Manifest Dispatched - TL92166903', 'bash228', '2023-01-21 20:20:20', 'TL1350'),
(652, 'Login Successful', 'john', '2023-01-21 20:20:37', 'AC1750'),
(653, 'Parcel - 1673783724 Received at : AC1750', 'john', '2023-01-21 20:22:10', 'AC1750'),
(654, 'Login Successful', 'bash228', '2023-01-21 20:23:04', 'TL1350'),
(655, 'Login Successful', 'bash228', '2023-01-21 20:23:13', 'TL1350'),
(656, 'New Page Created. Page Name: ADD REGIONAL PARCEL', 'bash228', '2023-01-21 20:52:10', 'TL1350'),
(657, 'Access Created: Group: 3 Page: 27', 'bash228', '2023-01-21 20:54:50', 'TL1350'),
(658, 'Login Successful', 'bash228', '2023-01-23 08:37:25', 'TL1350'),
(659, 'Login Successful', 'john', '2023-01-23 08:45:21', 'AC1750'),
(660, 'Login Successful', 'bash228', '2023-01-23 08:47:26', 'TL1350'),
(661, 'New Regional Station Created. Branch Name: GH3722', 'bash228', '2023-01-23 09:31:05', 'TL1350'),
(662, 'New Regional Station Created. Branch Name: NIG2358', 'bash228', '2023-01-23 09:32:04', 'TL1350'),
(663, 'New Regional Station Created. Branch Name: SA5568', 'bash228', '2023-01-23 09:32:17', 'TL1350'),
(664, 'New Regional Station Created. Branch Name: LN1701', 'bash228', '2023-01-23 09:46:35', 'TL1350'),
(665, 'Branch Updated. Branch Name: LONDON', 'bash228', '2023-01-23 09:47:16', 'TL1350'),
(666, 'Station Deleted. Branch Code: LN1701', 'bash228', '2023-01-23 09:49:21', 'TL1350'),
(667, 'New Consignment Created. Parcel Code: 1674480393', 'bash228', '2023-01-23 13:26:33', 'TL1350'),
(668, 'New Consignment Created. Parcel Code: 1674480458', 'bash228', '2023-01-23 13:27:38', 'TL1350'),
(669, 'Payment Confirmed. Parcel Code: 1674480393', 'bash228', '2023-01-23 13:30:39', 'TL1350'),
(670, 'Payment Confirmed. Parcel Code: 1674480458', 'bash228', '2023-01-23 13:31:04', 'TL1350'),
(671, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-23 13:31:19', 'TL1350'),
(672, 'Parcel - 1674480458 Assigned to : TL22656772', 'bash228', '2023-01-23 13:32:06', 'TL1350'),
(673, 'Parcel - 1674143392 Removed from : TL22656772', 'bash228', '2023-01-23 13:32:06', 'TL1350'),
(674, 'Parcel - 1674480393 Assigned to : TL22656772', 'bash228', '2023-01-23 13:32:06', 'TL1350'),
(675, 'Manifest Dispatched - TL22656772', 'bash228', '2023-01-23 13:33:30', 'TL1350'),
(676, 'Login Successful', 'bash228', '2023-01-23 13:41:23', 'TL1350'),
(677, 'Login Successful', 'bash228', '2023-01-23 13:45:39', 'TL1350'),
(678, 'Login Successful', 'john', '2023-01-23 13:48:16', 'AC1750'),
(679, 'Login Successful', 'bash228', '2023-01-23 14:20:44', 'TL1350'),
(680, 'Consignment Updated. Parcel Code: 1673224771', 'bash228', '2023-01-23 15:32:44', 'TL1350'),
(681, 'Consignment Updated. Parcel Code: 1673224771', 'bash228', '2023-01-23 15:34:07', 'TL1350'),
(682, 'Login Successful', 'bash228', '2023-01-24 08:50:37', 'TL1350'),
(683, 'Consignment Updated. Parcel Code: 1673224771', 'bash228', '2023-01-24 12:34:09', 'TL1350'),
(684, 'New Type Created. Type: AOG. Descr: AIRCRAFT ON GROUND', 'bash228', '2023-01-24 13:00:54', 'TL1350'),
(685, 'Type Updated. Code: . Descr: ', 'bash228', '2023-01-24 13:05:56', 'TL1350'),
(686, 'Type Updated. Code: . Descr: ', 'bash228', '2023-01-24 13:06:36', 'TL1350'),
(687, 'Type Updated. Code: ACT. Descr: ACTIVE TEMPERATURE CONTROLLED SYSTEM', 'bash228', '2023-01-24 13:08:10', 'TL1350'),
(688, 'Type Updated. Code: ACT. Descr: ACTIVE TEMPERATURE CONTROLLED SYSTEMS', 'bash228', '2023-01-24 13:08:46', 'TL1350'),
(689, 'Type Deleted. Type ID: 2', 'bash228', '2023-01-24 13:09:57', 'TL1350'),
(690, 'Type Updated. Code: ACT. Descr: ACTIVE TEMPERATURE CONTROLLED SYSTEM', 'bash228', '2023-01-24 13:11:09', 'TL1350'),
(691, 'New Type Created. Type: AOG. Descr: AIRCRAFT ON GROUND', 'bash228', '2023-01-24 13:12:10', 'TL1350'),
(692, 'New Type Created. Type: ATT. Descr: GOODS ATTACHED TO AIR WAYBILL', 'bash228', '2023-01-24 13:12:33', 'TL1350'),
(693, 'New Type Created. Type: AVI. Descr: LIVE ANIMAL', 'bash228', '2023-01-24 13:12:44', 'TL1350'),
(694, 'New Type Created. Type: BIG. Descr: OUTSIZED', 'bash228', '2023-01-24 13:12:57', 'TL1350'),
(695, 'New Type Created. Type: BUP. Descr: BULK UNITIZATION PROGRAMME, SHIPPER/CONSIGNEE HANDLED UNIT', 'bash228', '2023-01-24 13:13:26', 'TL1350'),
(696, 'New Consignment Created. Parcel Code: 1674569715', 'bash228', '2023-01-24 14:15:15', 'TL1350'),
(697, 'Payment Confirmed. Parcel Code: 1674569715', 'bash228', '2023-01-24 14:26:17', 'TL1350'),
(698, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-24 14:26:32', 'TL1350'),
(699, 'Parcel - 1674143392 Assigned to : TL29199117', 'bash228', '2023-01-24 14:26:39', 'TL1350'),
(700, 'Parcel - 1674569715 Assigned to : TL29199117', 'bash228', '2023-01-24 14:26:39', 'TL1350'),
(701, 'Manifest Dispatched - TL29199117', 'bash228', '2023-01-24 14:27:15', 'TL1350'),
(702, 'Login Successful', 'bash228', '2023-01-25 08:32:06', 'TL1350'),
(703, 'Login Successful', 'bash228', '2023-01-26 08:49:39', 'TL1350'),
(704, 'Login Successful', 'bash228', '2023-01-26 08:49:47', 'TL1350'),
(705, 'Login Successful', 'john', '2023-01-26 08:49:55', 'AC1750'),
(706, 'Login Successful', 'bash228', '2023-01-26 10:48:34', 'TL1350'),
(707, 'Login Successful', 'john', '2023-01-26 10:48:44', 'AC1750'),
(708, 'Parcel - 1673783724 Returned from : AC1750', 'john', '2023-01-26 12:55:01', 'AC1750'),
(709, 'Login Successful', 'bash228', '2023-01-26 12:56:28', 'TL1350'),
(710, 'User Account Updated. User: john', 'bash228', '2023-01-26 12:57:26', 'TL1350'),
(711, 'Login Successful', 'john', '2023-01-26 12:57:40', 'AC1750'),
(712, 'New Manifest Created. From : AC1750 To: TL1350', 'john', '2023-01-26 12:57:59', 'AC1750'),
(713, 'Login Successful', 'bash228', '2023-01-26 13:02:36', 'TL1350'),
(714, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-01-26 13:02:58', 'TL1350'),
(715, 'User Account Updated. User: john', 'john', '2023-01-26 13:06:48', 'AC1750'),
(716, 'Login Successful', 'john', '2023-01-26 13:07:10', 'TK8898'),
(717, 'New Manifest Created. From : TK8898 To: TL1350', 'john', '2023-01-26 13:07:28', 'TK8898'),
(718, 'Parcel - 1673783724 Removed from : TK65506731', 'john', '2023-01-26 16:25:38', 'TK8898'),
(719, 'Parcel - 1673783724 Removed from : TK65506731', 'john', '2023-01-26 17:04:11', 'TK8898'),
(720, 'Manifest Dispatched - TK65506731', 'john', '2023-01-26 17:13:47', 'TK8898'),
(721, 'Manifest Received - TK65506731 AT TL1350', 'bash228', '2023-01-26 17:14:12', 'TL1350'),
(722, 'Parcel - 1673783724 Received at : TL1350', 'bash228', '2023-01-26 17:33:09', 'TL1350'),
(723, 'Returned Parcel - 1673783724 Issued at : TL1350', 'bash228', '2023-01-26 17:46:44', 'TL1350'),
(724, 'Returned Parcel - 1673783724 Issued at : TL1350', 'bash228', '2023-01-26 17:46:50', 'TL1350'),
(725, 'Returned Parcel - 1673783724 Issued at : TL1350', 'bash228', '2023-01-26 17:46:52', 'TL1350'),
(726, 'Returned Parcel - 1673783724 Issued at : TL1350', 'bash228', '2023-01-26 17:46:53', 'TL1350'),
(727, 'Returned Parcel - 1673783724 Issued at : TL1350', 'bash228', '2023-01-26 17:46:53', 'TL1350'),
(728, 'Returned Parcel - 1673783724 Issued at : TL1350', 'bash228', '2023-01-26 17:46:53', 'TL1350'),
(729, 'Login Successful', 'bash228', '2023-01-30 22:27:03', 'TL1350'),
(730, 'New Consignment Created. Parcel Code: TL1675117692AC', 'bash228', '2023-01-30 22:28:13', 'TL1350'),
(731, 'New Consignment Created. Parcel Code: TL1675117730AC', 'bash228', '2023-01-30 22:28:50', 'TL1350'),
(732, 'Parcel - 1673783724 Returned from : TL1350', 'bash228', '2023-01-30 22:46:18', 'TL1350'),
(733, 'Parcel - 1673783724 Removed from : TL51246679', 'bash228', '2023-01-30 22:50:51', 'TL1350'),
(734, 'Parcel - TL1675117692AC Removed from : TL51246679', 'bash228', '2023-01-30 22:50:51', 'TL1350'),
(735, 'Parcel - TL1675117730AC Removed from : TL51246679', 'bash228', '2023-01-30 22:50:51', 'TL1350'),
(736, 'Parcel - TL1675117730AC Removed from : TL51246679', 'bash228', '2023-01-30 22:51:00', 'TL1350'),
(737, 'Parcel - TL1675117692AC Removed from : TL51246679', 'bash228', '2023-01-30 22:51:00', 'TL1350'),
(738, 'Parcel - 1673783724 Removed from : TL51246679', 'bash228', '2023-01-30 22:51:12', 'TL1350'),
(739, 'Parcel - TL1675117692AC Removed from : TL51246679', 'bash228', '2023-01-30 22:51:13', 'TL1350'),
(740, 'Parcel - TL1675117730AC Removed from : TL51246679', 'bash228', '2023-01-30 22:51:13', 'TL1350'),
(741, 'Payment Confirmed. Parcel Code: TL1675117730AC', 'bash228', '2023-01-30 22:53:43', 'TL1350'),
(742, 'Parcel - TL1675117730AC Removed from : TL51246679', 'bash228', '2023-01-30 22:53:59', 'TL1350'),
(743, 'Login Successful', 'john', '2023-01-30 22:55:17', 'TK8898'),
(744, 'Login Successful', 'bash228', '2023-01-30 22:56:05', 'TL1350'),
(745, 'Login Successful', 'john', '2023-01-30 22:58:02', 'TK8898'),
(746, 'Login Successful', 'bash228', '2023-01-30 22:58:12', 'TL1350'),
(747, 'New Consignment Created. Parcel Code: TL1675119950TK', 'bash228', '2023-01-30 23:05:50', 'TL1350'),
(748, 'Payment Confirmed. Parcel Code: TL1675119950TK', 'bash228', '2023-01-30 23:06:14', 'TL1350'),
(749, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-01-30 23:07:11', 'TL1350'),
(750, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-01-30 23:12:53', 'TL1350'),
(751, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-01-30 23:13:26', 'TL1350'),
(752, 'Parcel - TL1675119950TK Assigned to : TL90861663', 'bash228', '2023-01-30 23:13:33', 'TL1350'),
(753, 'Manifest Dispatched - TL90861663', 'bash228', '2023-01-30 23:20:01', 'TL1350'),
(754, 'Manifest Received - TL90861663 AT TK8898', 'john', '2023-01-30 23:21:04', 'TK8898'),
(755, 'Parcel - TL1675119950TK Received at : TK8898', 'john', '2023-01-30 23:22:54', 'TK8898'),
(756, 'Parcel - TL1675119950TK Returned from : TK8898', 'john', '2023-01-30 23:24:25', 'TK8898'),
(757, 'Parcel - TL1675119950TK Returned from : TK8898', 'john', '2023-01-30 23:29:56', 'TK8898'),
(758, 'New Manifest Created. From : TL1350 To: KS6889', 'bash228', '2023-01-30 23:34:07', 'TL1350'),
(759, 'New Manifest Created. From : TK8898 To: TL1350', 'john', '2023-01-30 23:34:20', 'TK8898'),
(760, 'Parcel - TL1675119950TK Assigned to : TK79929293', 'john', '2023-01-30 23:34:27', 'TK8898'),
(761, 'Manifest Dispatched - TK79929293', 'john', '2023-01-30 23:36:08', 'TK8898'),
(762, 'Manifest Received - TK79929293 AT TL1350', 'bash228', '2023-01-30 23:36:18', 'TL1350'),
(763, 'Parcel - TL1675119950TK Received at : TL1350', 'bash228', '2023-01-30 23:36:32', 'TL1350'),
(764, 'Returned Parcel - TL1675119950TK Issued at : TL1350', 'bash228', '2023-01-30 23:41:11', 'TL1350'),
(765, 'Login Successful', 'bash228', '2023-01-31 10:18:24', 'TL1350'),
(766, 'Consignment Updated. Parcel Code: TL1675119950TK', 'bash228', '2023-01-31 10:37:19', 'TL1350'),
(767, 'Consignment Updated. Parcel Code: TL1675119950TK', 'bash228', '2023-01-31 10:38:15', 'TL1350'),
(768, 'Consignment Updated. Parcel Code: TL1675119950TK', 'bash228', '2023-01-31 10:39:12', 'TL1350'),
(769, 'New Manifest Created. From : TL1350 To: AC1750', 'bash228', '2023-01-31 16:23:52', 'TL1350'),
(770, 'Login Successful', 'bash228', '2023-02-05 16:26:53', 'TL1350'),
(771, 'Rate Updated. Weight: 0.01 - 4.00. Price 140', 'bash228', '2023-02-05 17:32:24', 'TL1350'),
(772, 'Rate Deleted. Rate ID: 4', 'bash228', '2023-02-05 17:35:30', 'TL1350'),
(773, 'New Consignment Created. Parcel Code: TL1675619942TK', 'bash228', '2023-02-05 17:59:02', 'TL1350'),
(774, 'Payment Confirmed. Parcel Code: TL1675619942TK', 'bash228', '2023-02-05 17:59:17', 'TL1350'),
(775, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-02-05 17:59:26', 'TL1350'),
(776, 'Parcel - TL1675619942TK Assigned to : TL71566553TK', 'bash228', '2023-02-05 17:59:31', 'TL1350'),
(777, 'Manifest Dispatched - TL71566553TK', 'bash228', '2023-02-05 17:59:48', 'TL1350'),
(778, 'Login Successful', 'john', '2023-02-05 18:00:04', 'TK8898'),
(779, 'Manifest Received - TL71566553TK AT TK8898', 'john', '2023-02-05 18:00:21', 'TK8898'),
(780, 'Parcel - TL1675619942TK Received at : TK8898', 'john', '2023-02-05 18:00:30', 'TK8898'),
(781, 'New Manifest Created. From : TK8898 To: TL1350', 'john', '2023-02-05 18:04:38', 'TK8898'),
(782, 'Parcel - TL1675619942TK Returned from : TK8898', 'john', '2023-02-05 18:04:55', 'TK8898'),
(783, 'Login Successful', 'bash228', '2023-02-05 18:26:37', 'TL1350'),
(784, 'Login Successful', 'bash228', '2023-02-07 09:39:42', 'TL1350'),
(785, 'Consignment Updated. Parcel Code: TL1675119950TK', 'bash228', '2023-02-07 10:04:36', 'TL1350'),
(786, 'Consignment Updated. Parcel Code: TL1675119950TK', 'bash228', '2023-02-07 10:25:42', 'TL1350'),
(787, 'Consignment Updated. Parcel Code: TL1675119950TK', 'bash228', '2023-02-07 10:27:15', 'TL1350'),
(788, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-02-07 11:51:34', 'TL1350'),
(789, 'Payment Confirmed. Parcel Code: TL1675119950TK', 'bash228', '2023-02-07 13:50:55', 'TL1350'),
(790, 'Login Successful', 'bash228', '2023-02-08 09:21:13', 'TL1350'),
(791, 'New Consignment Created. Parcel Code: TL1675848451TK', 'bash228', '2023-02-08 09:27:31', 'TL1350'),
(792, 'Payment Confirmed. Parcel Code: TL1675848451TK', 'bash228', '2023-02-08 10:47:33', 'TL1350'),
(793, 'Payment Confirmed. Parcel Code: TL1675848451TK', 'bash228', '2023-02-08 12:25:00', 'TL1350'),
(794, 'Login Successful', 'bash228', '2023-02-09 09:05:54', 'TL1350'),
(795, 'Login Successful', 'bash228', '2023-02-09 18:04:13', 'TL1350'),
(796, 'Login Successful', 'bash228', '2023-02-11 16:43:27', 'TL1350'),
(797, 'Login Successful', 'bash228', '2023-02-11 16:47:18', 'TL1350'),
(798, 'Login Successful', 'bash228', '2023-02-11 18:45:08', 'TL1350'),
(799, 'Login Successful', 'bash228', '2023-02-12 14:51:30', 'TL1350'),
(800, 'Login Successful', 'bash228', '2023-02-12 15:10:18', 'TL1350'),
(801, 'Login Successful', 'bash228', '2023-02-12 15:14:32', 'TL1350'),
(802, 'Login Successful', 'bash228', '2023-02-12 15:16:41', 'TL1350'),
(803, 'Login Successful', 'bash228', '2023-02-13 08:14:31', 'TL1350'),
(804, 'Login Successful', 'bash228', '2023-02-13 08:32:11', 'TL1350'),
(805, 'Login Successful', 'bash228', '2023-02-13 08:32:41', 'TL1350'),
(806, 'Login Successful', 'bash228', '2023-02-15 10:28:35', 'TL1350'),
(807, 'Login Successful', 'bash228', '2023-02-15 18:09:10', 'TL1350'),
(808, 'New Consignment Created. Parcel Code: TL1676484740TK', 'bash228', '2023-02-15 18:12:20', 'TL1350'),
(809, 'New Consignment Created. Parcel Code: TL1676486465TK', 'bash228', '2023-02-15 18:41:05', 'TL1350');
INSERT INTO `courier_logs` (`iss_logid`, `log_activity`, `log_user`, `log_date_added`, `log_branch`) VALUES
(810, 'New Consignment Created. Parcel Code: TL1676487169TK', 'bash228', '2023-02-15 18:52:49', 'TL1350'),
(811, 'New Consignment Created. Parcel Code: TL1676487500TK', 'bash228', '2023-02-15 18:58:20', 'TL1350'),
(812, 'New Consignment Created. Parcel Code: TL1676489220TK', 'bash228', '2023-02-15 19:27:01', 'TL1350'),
(813, 'Payment Confirmed. Parcel Code: TL1676489220TK', 'bash228', '2023-02-15 19:30:05', 'TL1350'),
(814, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-02-15 20:07:21', 'TL1350'),
(815, 'Parcel - TL1676489220TK Assigned to : TL24740077TK', 'bash228', '2023-02-15 20:07:25', 'TL1350'),
(816, 'Customer Updated. ID: 3', 'bash228', '2023-02-15 21:26:09', 'TL1350'),
(817, 'Overdue Payment Confirmed. Parcel Code: TL1676489220TK', 'bash228', '2023-02-15 21:40:23', 'TL1350'),
(818, 'Login Successful', 'bash228', '2023-02-16 12:51:01', 'TL1350'),
(819, 'Login Successful', 'bash228', '2023-02-16 15:19:12', 'TL1350'),
(820, 'Login Successful', 'bash228', '2023-02-16 15:19:22', 'TL1350'),
(821, 'Login Successful', 'bash228', '2023-02-16 15:19:53', 'TL1350'),
(822, 'Login Successful', 'bash228', '2023-02-16 15:21:12', 'TL1350'),
(823, 'Login Successful', 'bash228', '2023-02-16 15:23:41', 'TL1350'),
(824, 'Login Successful', 'bash228', '2023-02-16 15:24:16', 'TL1350'),
(825, 'New Overdue Amount Created. Range: 4 - 5 Amount: 500', 'bash228', '2023-02-16 18:03:29', 'TL1350'),
(826, 'Login Successful', 'bash228', '2023-02-17 03:04:57', 'TL1350'),
(827, 'New Overdue Amount Created. Range: 1 - 2 Amount: 50.00', 'bash228', '2023-02-17 04:11:38', 'TL1350'),
(828, 'Payment Confirmed. Parcel Code: TL1676489220TK', 'bash228', '2023-02-17 04:28:08', 'TL1350'),
(829, 'Manifest Dispatched - TL24740077TK', 'bash228', '2023-02-17 04:47:52', 'TL1350'),
(830, 'Login Successful', 'john', '2023-02-17 04:48:07', 'TK8898'),
(831, 'Manifest Received - TL24740077TK AT TK8898', 'john', '2023-02-17 04:48:16', 'TK8898'),
(832, 'Parcel - TL1676489220TK Received at : TK8898', 'john', '2023-02-17 04:48:58', 'TK8898'),
(833, 'Login Successful', 'bash228', '2023-02-17 09:40:39', 'TL1350'),
(834, 'Login Successful', 'bash228', '2023-02-17 09:40:40', 'TL1350'),
(835, 'New Overdue Amount Created. Range: 1 - 3 Amount: 200', 'bash228', '2023-02-17 10:01:25', 'TL1350'),
(836, 'Login Successful', 'bash228', '2023-02-18 19:45:37', 'TL1350'),
(837, 'New Consignment Created. Parcel Code: TL1676749698KS', 'bash228', '2023-02-18 19:48:18', 'TL1350'),
(838, 'New Manifest Created. From : TL1350 To: KS6889', 'bash228', '2023-02-18 20:02:23', 'TL1350'),
(839, 'Payment Confirmed. Parcel Code: TL1676749698KS', 'bash228', '2023-02-18 20:17:19', 'TL1350'),
(840, 'User Account Updated. User: bash228', 'bash228', '2023-02-18 21:05:22', 'TL1350'),
(841, 'Manifest Dispatched - TL87735442KS', 'bash228', '2023-02-18 21:06:12', 'TL1350'),
(842, 'Login Successful', 'john', '2023-02-18 21:15:46', 'TK8898'),
(843, 'User Account Updated. User: john', 'bash228', '2023-02-18 21:22:28', 'TL1350'),
(844, 'Login Successful', 'john', '2023-02-18 21:22:38', 'KS6889'),
(845, 'Manifest Received - TL87735442KS AT KS6889', 'john', '2023-02-18 21:22:48', 'KS6889'),
(846, 'Parcel - TL1676749698KS Received at : KS6889', 'john', '2023-02-18 21:23:12', 'KS6889'),
(847, 'Parcel - TL1676749698KS Issued at : KS6889', 'john', '2023-02-18 21:31:02', 'KS6889'),
(848, 'Login Successful', 'bash228', '2023-02-18 22:07:33', 'TL1350'),
(849, 'New Overdue Amount Created. Range: 4 - 7 Amount: 300', 'bash228', '2023-02-18 22:17:58', 'TL1350'),
(850, 'New Overdue Amount Created. Range: 8 - 11 Amount: 400', 'bash228', '2023-02-18 22:18:07', 'TL1350'),
(851, 'Overdue Updated. Range: 4 - 6 Amount: 300', 'bash228', '2023-02-18 22:20:00', 'TL1350'),
(852, 'Overdue Updated. Range: 7 - 11 Amount: 400', 'bash228', '2023-02-18 22:20:07', 'TL1350'),
(853, 'Parcel - TL1676749698KS Returned from : KS6889', 'john', '2023-02-19 01:39:15', 'KS6889'),
(854, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 01:39:48', 'KS6889'),
(855, 'Manifest Deleted. Manifest Code: KS27569052TL', 'john', '2023-02-19 01:54:28', 'KS6889'),
(856, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 01:54:35', 'KS6889'),
(857, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 01:54:54', 'KS6889'),
(858, 'Manifest Deleted. Manifest Code: KS27030242TL', 'john', '2023-02-19 01:56:25', 'KS6889'),
(859, 'Manifest Deleted. Manifest Code: KS41638345TL', 'john', '2023-02-19 01:56:27', 'KS6889'),
(860, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 01:56:33', 'KS6889'),
(861, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 01:58:27', 'KS6889'),
(862, 'Manifest Deleted. Manifest Code: KS27341573TL', 'john', '2023-02-19 02:03:10', 'KS6889'),
(863, 'Manifest Deleted. Manifest Code: KS29534277TL', 'john', '2023-02-19 02:03:13', 'KS6889'),
(864, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 02:03:19', 'KS6889'),
(865, 'Manifest Deleted. Manifest Code: KS36293823TL', 'john', '2023-02-19 02:05:32', 'KS6889'),
(866, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 02:05:41', 'KS6889'),
(867, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-02-19 02:20:12', 'TL1350'),
(868, 'Manifest Deleted. Manifest Code: KS86523646TL', 'john', '2023-02-19 02:34:43', 'KS6889'),
(869, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 02:34:52', 'KS6889'),
(870, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 02:36:35', 'KS6889'),
(871, 'New Manifest Created. From : TL1350 To: KS6889', 'bash228', '2023-02-19 02:36:56', 'TL1350'),
(872, 'Payment Confirmed. Parcel Code: TL1676489220TK', 'bash228', '2023-02-19 02:37:34', 'TL1350'),
(873, 'Manifest Deleted. Manifest Code: TL72695479TK', 'bash228', '2023-02-19 02:37:58', 'TL1350'),
(874, 'Manifest Deleted. Manifest Code: TL29027732KS', 'bash228', '2023-02-19 02:38:01', 'TL1350'),
(875, 'New Manifest Created. From : TL1350 To: TK8898', 'bash228', '2023-02-19 02:38:09', 'TL1350'),
(876, 'Manifest Deleted. Manifest Code: KS59817530TL', 'john', '2023-02-19 02:43:56', 'KS6889'),
(877, 'Manifest Deleted. Manifest Code: KS39130876TL', 'john', '2023-02-19 02:44:01', 'KS6889'),
(878, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 02:44:10', 'KS6889'),
(879, 'Manifest Deleted. Manifest Code: KS65695787TL', 'john', '2023-02-19 02:45:57', 'KS6889'),
(880, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 02:46:06', 'KS6889'),
(881, 'Manifest Deleted. Manifest Code: KS32503783TL', 'john', '2023-02-19 02:47:31', 'KS6889'),
(882, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 02:47:42', 'KS6889'),
(883, 'Parcel - TL1676749698KS Assigned to : KS10518451TL', 'john', '2023-02-19 02:47:48', 'KS6889'),
(884, 'Parcel - TL1676749698KS Removed from : KS10518451TL', 'john', '2023-02-19 02:52:58', 'KS6889'),
(885, 'Manifest Dispatched - KS10518451TL', 'john', '2023-02-19 03:27:42', 'KS6889'),
(886, 'Manifest Received - KS10518451TL AT TL1350', 'bash228', '2023-02-19 03:28:00', 'TL1350'),
(887, 'Parcel - TL1676749698KS Received at : TL1350', 'bash228', '2023-02-19 03:28:33', 'TL1350'),
(888, 'Payment Confirmed. Parcel Code: TL1676749698KS', 'bash228', '2023-02-19 03:57:52', 'TL1350'),
(889, 'Payment Confirmed. Parcel Code: TL1676749698KS', 'bash228', '2023-02-19 04:06:42', 'TL1350'),
(890, 'Payment Confirmed. Parcel Code: TL1676749698KS', 'bash228', '2023-02-19 04:06:47', 'TL1350'),
(891, 'Payment Confirmed. Parcel Code: TL1676749698KS', 'bash228', '2023-02-19 04:07:48', 'TL1350'),
(892, 'Payment Confirmed. Parcel Code: TL1676749698KS', 'bash228', '2023-02-19 04:09:20', 'TL1350'),
(893, 'Payment Confirmed. Parcel Code: TL1676749698KS', 'bash228', '2023-02-19 04:09:48', 'TL1350'),
(894, 'Parcel - TL1676749698KS Issued at : TL1350', 'bash228', '2023-02-19 04:10:34', 'TL1350'),
(895, 'Login Successful', 'bash228', '2023-02-19 10:52:31', 'TL1350'),
(896, 'Login Successful', 'john', '2023-02-19 11:13:08', 'KS6889'),
(897, 'New Consignment Created. Parcel Code: KS1676805783TL', 'john', '2023-02-19 11:23:03', 'KS6889'),
(898, 'Payment Confirmed. Parcel Code: KS1676805783TL', 'john', '2023-02-19 14:48:33', 'KS6889'),
(899, 'New Manifest Created. From : KS6889 To: TL1350', 'john', '2023-02-19 14:51:10', 'KS6889'),
(900, 'Parcel - KS1676805783TL Assigned to : KS16441136TL', 'john', '2023-02-19 14:51:15', 'KS6889'),
(901, 'Manifest Dispatched - KS16441136TL', 'john', '2023-02-19 14:51:40', 'KS6889'),
(902, 'Login Successful', 'bash228', '2023-02-19 14:52:00', 'TL1350'),
(903, 'Manifest Received - KS16441136TL AT TL1350', 'bash228', '2023-02-19 14:52:12', 'TL1350'),
(904, 'Parcel - KS1676805783TL Received at : TL1350', 'bash228', '2023-02-19 14:52:19', 'TL1350'),
(905, 'Payment Confirmed. Parcel Code: KS1676805783TL', 'bash228', '2023-02-19 15:04:20', 'TL1350'),
(906, 'Parcel - KS1676805783TL Issued at : TL1350', 'bash228', '2023-02-19 15:05:26', 'TL1350'),
(907, 'Parcel - KS1676805783TL Issued at : TL1350', 'bash228', '2023-02-19 15:05:33', 'TL1350'),
(908, 'New Consignment Created. Parcel Code: TL1676819434AC', 'bash228', '2023-02-19 15:10:34', 'TL1350'),
(909, 'New Consignment Created. Parcel Code: TL1676820891AC', 'bash228', '2023-02-19 15:34:51', 'TL1350'),
(910, 'New Consignment Created. Parcel Code: TL1676821267AC', 'bash228', '2023-02-19 15:41:07', 'TL1350'),
(911, 'New Consignment Created. Parcel Code: TL1676821462AC', 'bash228', '2023-02-19 15:44:22', 'TL1350'),
(912, 'New Consignment Created. Parcel Code: TL1676821542AC', 'bash228', '2023-02-19 15:45:42', 'TL1350'),
(913, 'New Consignment Created. Parcel Code: TL1676821829AC', 'bash228', '2023-02-19 15:50:29', 'TL1350'),
(914, 'New Consignment Created. Parcel Code: TL1676821855AC', 'bash228', '2023-02-19 15:50:55', 'TL1350'),
(915, 'New Consignment Created. Parcel Code: TL1676822087AC', 'bash228', '2023-02-19 15:54:47', 'TL1350'),
(916, 'New Consignment Created. Parcel Code: TL1676822142AC', 'bash228', '2023-02-19 15:55:42', 'TL1350'),
(917, 'New Consignment Created. Parcel Code: TL1676822546AC', 'bash228', '2023-02-19 16:02:26', 'TL1350'),
(918, 'New Consignment Created. Parcel Code: TL1676822680AC', 'bash228', '2023-02-19 16:04:40', 'TL1350'),
(919, 'New Consignment Created. Parcel Code: TL1676822820AC', 'bash228', '2023-02-19 16:07:00', 'TL1350'),
(920, 'New Consignment Created. Parcel Code: TL1676824134TK', 'bash228', '2023-02-19 16:28:54', 'TL1350'),
(921, 'New Consignment Created. Parcel Code: 1676824270', 'bash228', '2023-02-19 16:31:10', 'TL1350'),
(922, 'Payment Confirmed. Parcel Code: TL1676819434AC', 'bash228', '2023-02-19 17:16:00', 'TL1350'),
(923, 'Payment Confirmed. Parcel Code: TL1676819434AC', 'bash228', '2023-02-19 17:17:26', 'TL1350'),
(924, 'Payment Confirmed. Parcel Code: TL1676819434AC', 'bash228', '2023-02-19 17:18:47', 'TL1350'),
(925, 'Payment Confirmed. Parcel Code: TL1676819434AC', 'bash228', '2023-02-19 17:21:47', 'TL1350'),
(926, 'Login Successful', 'bash228', '2023-11-05 14:16:27', 'TL1350');

-- --------------------------------------------------------

--
-- Table structure for table `courier_manifests`
--

DROP TABLE IF EXISTS `courier_manifests`;
CREATE TABLE IF NOT EXISTS `courier_manifests` (
  `manifest_id` int(100) NOT NULL AUTO_INCREMENT,
  `manifest_code` varchar(225) NOT NULL,
  `manifest_origin` varchar(100) NOT NULL,
  `manifest_destination` varchar(225) NOT NULL,
  `manifest_dispatcher` varchar(225) NOT NULL,
  `manifest_flight` varchar(225) NOT NULL,
  `manifest_instr` varchar(225) DEFAULT NULL,
  `manifest_dispatch_status` int(1) NOT NULL DEFAULT '0' COMMENT '0=Not Dispatched\r\n1=Dispatched\r\n2=Received',
  `manifest_added_by` varchar(255) NOT NULL,
  `manifest_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `manifest_date_dispatched` varchar(100) DEFAULT '-',
  `manifest_date_received` varchar(100) DEFAULT '-',
  `user_branch` varchar(100) NOT NULL,
  PRIMARY KEY (`manifest_id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_manifests`
--

INSERT INTO `courier_manifests` (`manifest_id`, `manifest_code`, `manifest_origin`, `manifest_destination`, `manifest_dispatcher`, `manifest_flight`, `manifest_instr`, `manifest_dispatch_status`, `manifest_added_by`, `manifest_date_added`, `manifest_date_dispatched`, `manifest_date_received`, `user_branch`) VALUES
(74, 'KS16441136TL', 'KS6889', 'TL1350', 'john', 'AWA587', '', 2, 'john', '2023-02-19 14:51:10', '2023-02-19 02:51:40', '2023-02-19 02:52:12', 'KS6889');

-- --------------------------------------------------------

--
-- Table structure for table `courier_overdue_amounts`
--

DROP TABLE IF EXISTS `courier_overdue_amounts`;
CREATE TABLE IF NOT EXISTS `courier_overdue_amounts` (
  `over_id` int(100) NOT NULL AUTO_INCREMENT,
  `over_from` varchar(225) NOT NULL,
  `over_to` varchar(225) NOT NULL,
  `over_amount` varchar(225) NOT NULL,
  `over_added_by` varchar(225) NOT NULL,
  PRIMARY KEY (`over_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_overdue_amounts`
--

INSERT INTO `courier_overdue_amounts` (`over_id`, `over_from`, `over_to`, `over_amount`, `over_added_by`) VALUES
(4, '4', '6', '300', 'bash228'),
(3, '1', '3', '200', 'bash228'),
(5, '7', '11', '400', 'bash228');

-- --------------------------------------------------------

--
-- Table structure for table `courier_pages`
--

DROP TABLE IF EXISTS `courier_pages`;
CREATE TABLE IF NOT EXISTS `courier_pages` (
  `page_id` int(100) NOT NULL AUTO_INCREMENT,
  `page` varchar(225) NOT NULL,
  `page_cat` varchar(100) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_pages`
--

INSERT INTO `courier_pages` (`page_id`, `page`, `page_cat`) VALUES
(1, 'Dashboard', 'Dashboard'),
(2, 'Add Parcel', 'Parcel'),
(3, 'View Parcel Details', 'Parcel'),
(4, 'Search Parcel', 'Parcel'),
(11, 'VIEW MANIFEST', 'PROCESSING'),
(6, 'ADD PAYMENT', 'PARCEL'),
(7, 'VIEW PAYMENT', 'PARCEL'),
(8, 'PARCEL TRACKING', 'PARCEL'),
(9, 'DASHBOARD', 'PROCESSING'),
(10, 'CREATE MANIFEST', 'PROCESSING'),
(12, 'ASSIGN MANIFEST', 'PROCESSING'),
(13, 'DISPATCH CONSIGNMENT', 'PROCESSING'),
(14, 'VIEW MANIFEST', 'RECEIVING'),
(15, 'RECEIVE MANIFEST', 'RECEIVING'),
(16, 'DELIVERY', 'RECEIVING'),
(17, 'DASHBOARD', 'FINANCE'),
(18, 'LOCAL PARCEL SENT', 'FINANCE'),
(19, 'COMPANY PARCEL SENT', 'FINANCE'),
(20, 'USERS', 'SETTINGS'),
(21, 'USER GROUPINGS', 'SETTINGS'),
(22, 'CUSTOMERS', 'SETTINGS'),
(23, 'BRANCHES', 'SETTINGS'),
(24, 'FLIGHTS', 'SETTINGS'),
(25, 'RATES', 'SETTINGS'),
(26, 'LOG', 'SETTINGS'),
(27, 'ADD REGIONAL PARCEL', 'PARCEL');

-- --------------------------------------------------------

--
-- Table structure for table `courier_page_access`
--

DROP TABLE IF EXISTS `courier_page_access`;
CREATE TABLE IF NOT EXISTS `courier_page_access` (
  `access_id` int(100) NOT NULL AUTO_INCREMENT,
  `group_id_fk` varchar(225) NOT NULL,
  `group_page_fk` varchar(225) NOT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=MyISAM AUTO_INCREMENT=184 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_page_access`
--

INSERT INTO `courier_page_access` (`access_id`, `group_id_fk`, `group_page_fk`) VALUES
(145, '4', '1'),
(146, '4', '2'),
(147, '4', '4'),
(148, '4', '3'),
(149, '4', '6'),
(150, '4', '11'),
(151, '4', '7'),
(152, '4', '8'),
(144, '3', '26'),
(137, '3', '1'),
(138, '3', '2'),
(139, '3', '3'),
(133, '3', '23'),
(132, '3', '22'),
(131, '3', '21'),
(129, '3', '18'),
(130, '3', '20'),
(128, '3', '19'),
(127, '3', '17'),
(126, '3', '16'),
(125, '3', '15'),
(124, '3', '14'),
(123, '3', '13'),
(122, '3', '12'),
(121, '3', '10'),
(120, '3', '9'),
(119, '3', '8'),
(118, '3', '7'),
(117, '3', '6'),
(143, '3', '25'),
(142, '3', '24'),
(141, '3', '11'),
(140, '3', '4'),
(153, '4', '9'),
(154, '4', '10'),
(155, '4', '12'),
(156, '4', '13'),
(157, '4', '14'),
(158, '4', '15'),
(159, '4', '16'),
(160, '4', '17'),
(161, '4', '18'),
(162, '4', '19'),
(163, '5', '1'),
(164, '5', '2'),
(165, '5', '3'),
(166, '5', '8'),
(167, '5', '4'),
(168, '5', '6'),
(169, '5', '7'),
(170, '6', '11'),
(171, '6', '9'),
(172, '6', '10'),
(173, '6', '12'),
(174, '6', '13'),
(175, '7', '1'),
(176, '7', '14'),
(177, '7', '15'),
(178, '7', '16'),
(179, '6', '1'),
(180, '8', '17'),
(181, '8', '18'),
(182, '8', '19'),
(183, '3', '27');

-- --------------------------------------------------------

--
-- Table structure for table `courier_parcel`
--

DROP TABLE IF EXISTS `courier_parcel`;
CREATE TABLE IF NOT EXISTS `courier_parcel` (
  `parcel_id` int(100) NOT NULL AUTO_INCREMENT,
  `parcel_code` varchar(225) NOT NULL,
  `parcel_group` int(2) NOT NULL DEFAULT '0',
  `manifest_code` varchar(225) NOT NULL DEFAULT '0',
  `sender_type` varchar(100) NOT NULL,
  `sender_name` varchar(225) NOT NULL,
  `sender_address` varchar(225) NOT NULL,
  `sender_email` varchar(100) DEFAULT NULL,
  `sender_location` varchar(225) NOT NULL,
  `sender_telephone` varchar(225) NOT NULL,
  `sender_origin` varchar(225) NOT NULL,
  `recipient_name` varchar(225) NOT NULL,
  `recipient_address` varchar(225) NOT NULL,
  `recipient_email` varchar(100) DEFAULT NULL,
  `recipient_location` varchar(225) NOT NULL,
  `recipient_telephone` varchar(225) NOT NULL,
  `recipient_destination` varchar(225) NOT NULL,
  `flight` varchar(100) NOT NULL,
  `service_type` varchar(225) NOT NULL,
  `parcel_type` varchar(225) NOT NULL,
  `no_items` varchar(225) NOT NULL,
  `weight` varchar(225) NOT NULL,
  `volume` varchar(225) NOT NULL,
  `amount` varchar(225) NOT NULL,
  `content_descr` varchar(225) DEFAULT NULL,
  `insurance` varchar(225) NOT NULL,
  `value_of_item` varchar(225) DEFAULT NULL,
  `assign_status` int(1) NOT NULL DEFAULT '0' COMMENT '0=Not Assigned\r\n1=Assigned\r\n2=Received\r\n3=Delivered\r\n4=Return Item\r\n5=Return Item assiged to manifest\r\n6= Return Item Received\r\n7= Return Item Delivered',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_received` varchar(100) DEFAULT '-',
  `created_by` varchar(225) NOT NULL,
  `date_modified` varchar(225) DEFAULT NULL,
  `modified_by` varchar(225) DEFAULT NULL,
  `user_branch` varchar(100) NOT NULL,
  PRIMARY KEY (`parcel_id`),
  UNIQUE KEY `parcel_code` (`parcel_code`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_parcel`
--

INSERT INTO `courier_parcel` (`parcel_id`, `parcel_code`, `parcel_group`, `manifest_code`, `sender_type`, `sender_name`, `sender_address`, `sender_email`, `sender_location`, `sender_telephone`, `sender_origin`, `recipient_name`, `recipient_address`, `recipient_email`, `recipient_location`, `recipient_telephone`, `recipient_destination`, `flight`, `service_type`, `parcel_type`, `no_items`, `weight`, `volume`, `amount`, `content_descr`, `insurance`, `value_of_item`, `assign_status`, `date_created`, `date_received`, `created_by`, `date_modified`, `modified_by`, `user_branch`) VALUES
(103, 'TL1676819434AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 15:10:34', '-', 'bash228', NULL, NULL, 'TL1350'),
(104, 'TL1676820891AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 15:34:51', '-', 'bash228', NULL, NULL, 'TL1350'),
(102, 'KS1676805783TL', 0, 'KS16441136TL', 'LOCAL', 'ISSAH MUASIR', 'GHA-98946613161', 'MUBASIR18@GMAIL.COM', ' SSNIT', '0541506302', 'KS6889', 'ISSAH SAJIDA', 'GHA-21656465165', 'SAJIDA@GMAIL.COM', 'WA', '0302656516', 'TL1350', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '3.00', '0', '140.00', 'SHOES', 'NO', '', 3, '2023-02-19 11:23:03', '2023-02-12 02:52:19', 'john', NULL, NULL, 'KS6889'),
(105, 'TL1676821267AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 15:41:07', '-', 'bash228', NULL, NULL, 'TL1350'),
(106, 'TL1676821462AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 15:44:22', '-', 'bash228', NULL, NULL, 'TL1350'),
(107, 'TL1676821542AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 15:45:42', '-', 'bash228', NULL, NULL, 'TL1350'),
(108, 'TL1676821829AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 15:50:29', '-', 'bash228', NULL, NULL, 'TL1350'),
(109, 'TL1676821855AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 15:50:55', '-', 'bash228', NULL, NULL, 'TL1350'),
(110, 'TL1676822087AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 15:54:47', '-', 'bash228', NULL, NULL, 'TL1350'),
(111, 'TL1676822142AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '2.5', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 15:55:42', '-', 'bash228', NULL, NULL, 'TL1350'),
(112, 'TL1676822546AC', 0, '0', 'LOCAL', 'ISSAH ', 'GHA-98798546513', 'ISS@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'BAH', 'GHA-13565496861', 'BASH@GMAL.COM', 'WA', '0202323323', 'AC1750', 'AWA587', 'AIRPORT-AIRPORT', 'ACT', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 16:02:26', '-', 'bash228', NULL, NULL, 'TL1350'),
(113, 'TL1676822680AC', 0, '0', 'LOCAL', 'ISSAH', 'GHA-98615615613', 'ISS@GMAIL.COM', 'SSNIT', '0249885616', 'TL1350', 'BASH', 'GHA-32561535216', 'BAS@GMAIL.COM', 'WA', '0543561616', 'AC1750', 'SELECT FLIGHT', 'AIRPORT-AIRPORT', 'AOG', '1', '4', '4.5', '6', 'SHOES', 'NO', '', 0, '2023-02-19 16:04:40', '-', 'bash228', NULL, NULL, 'TL1350'),
(114, 'TL1676822820AC', 0, '0', 'LOCAL', 'ISSAH', 'GHA-98615615613', 'ISS@GMAIL.COM', 'SSNIT', '0249885616', 'TL1350', 'BASH', 'GHA-32561535216', 'BAS@GMAIL.COM', 'WA', '0543561616', 'AC1750', 'SELECT FLIGHT', 'AIRPORT-AIRPORT', 'AOG', '1', '3.00', '4.5', '158.00', 'SHOES', 'NO', '', 0, '2023-02-19 16:07:00', '-', 'bash228', NULL, NULL, 'TL1350'),
(115, 'TL1676824134TK', 0, '0', 'COMPANY', 'DHL', 'GHA-', '', 'DHL TAMALE', '0547895423', 'TL1350', 'DHL', 'GHA-', '', 'DHL TAMALE', '0547895423', 'TK8898', 'SELECT FLIGHT', 'AIRPORT-AIRPORT', 'ACT', '1', '', '0', '0.00', 'R', 'NO', '', 0, '2023-02-19 16:28:54', '-', 'bash228', NULL, NULL, 'TL1350'),
(116, '1676824270', 0, '0', 'COMPANY', 'DHL', 'GHA-', '', 'DHL TAMALE', '0547895423', 'TL1350', 'DHL', 'GHA-', '', 'DHL TAMALE', '0547895423', 'TK8898', 'SELECT FLIGHT', 'AIRPORT-AIRPORT', 'ACT', '1', '', '0', '0.00', 'R', 'NO', '', 0, '2023-02-19 16:31:10', '-', 'bash228', NULL, NULL, 'TL1350');

-- --------------------------------------------------------

--
-- Table structure for table `courier_parceltype`
--

DROP TABLE IF EXISTS `courier_parceltype`;
CREATE TABLE IF NOT EXISTS `courier_parceltype` (
  `parcelType_id` int(100) NOT NULL AUTO_INCREMENT,
  `parcelType_code` varchar(225) NOT NULL,
  `parcelType_descr` varchar(225) NOT NULL,
  PRIMARY KEY (`parcelType_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_parceltype`
--

INSERT INTO `courier_parceltype` (`parcelType_id`, `parcelType_code`, `parcelType_descr`) VALUES
(1, 'ACT', 'ACTIVE TEMPERATURE CONTROLLED SYSTEM'),
(3, 'AOG', 'AIRCRAFT ON GROUND'),
(4, 'ATT', 'GOODS ATTACHED TO AIR WAYBILL'),
(5, 'AVI', 'LIVE ANIMAL'),
(6, 'BIG', 'OUTSIZED'),
(7, 'BUP', 'BULK UNITIZATION PROGRAMME, SHIPPER/CONSIGNEE HANDLED UNIT');

-- --------------------------------------------------------

--
-- Table structure for table `courier_payments`
--

DROP TABLE IF EXISTS `courier_payments`;
CREATE TABLE IF NOT EXISTS `courier_payments` (
  `pay_id` int(100) NOT NULL AUTO_INCREMENT,
  `parcel_code_fk` varchar(225) NOT NULL,
  `pay_type` varchar(100) NOT NULL,
  `pay_method` varchar(100) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `received_by` varchar(225) NOT NULL,
  `payment_branch` varchar(225) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_payments`
--

INSERT INTO `courier_payments` (`pay_id`, `parcel_code_fk`, `pay_type`, `pay_method`, `payment_date`, `received_by`, `payment_branch`) VALUES
(47, 'TL1676819434AC', 'NEW', 'cash', '2023-02-19 17:21:47', 'bash228', 'TL1350'),
(43, 'KS1676805783TL', 'OVERDUE', 'mobile_money', '2023-02-19 15:04:20', 'bash228', 'TL1350'),
(42, 'KS1676805783TL', 'NEW', 'mobile_money', '2023-02-19 14:48:33', 'john', 'KS6889');

-- --------------------------------------------------------

--
-- Table structure for table `courier_proxy`
--

DROP TABLE IF EXISTS `courier_proxy`;
CREATE TABLE IF NOT EXISTS `courier_proxy` (
  `proxy_id` int(100) NOT NULL AUTO_INCREMENT,
  `parcel_code_fk` varchar(225) NOT NULL,
  `proxy` varchar(5) NOT NULL,
  `proxy_name` varchar(225) NOT NULL,
  `proxy_ghcard` varchar(225) NOT NULL,
  `proxy_address` varchar(225) NOT NULL,
  `receiving_name` varchar(100) NOT NULL,
  `receiving_signature` longtext NOT NULL,
  `date_pickup` varchar(100) NOT NULL,
  `issued_by` varchar(225) NOT NULL,
  PRIMARY KEY (`proxy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_proxy`
--

INSERT INTO `courier_proxy` (`proxy_id`, `parcel_code_fk`, `proxy`, `proxy_name`, `proxy_ghcard`, `proxy_address`, `receiving_name`, `receiving_signature`, `date_pickup`, `issued_by`) VALUES
(17, 'KS1676805783TL', 'N', '', '', '', 'ba', '', '2023-02-19 03:05:26', 'bash228'),
(18, 'KS1676805783TL', 'N', '', '', '', 'ba', '', '2023-02-19 03:05:33', 'bash228');

-- --------------------------------------------------------

--
-- Table structure for table `courier_rate`
--

DROP TABLE IF EXISTS `courier_rate`;
CREATE TABLE IF NOT EXISTS `courier_rate` (
  `rate_id` int(100) NOT NULL AUTO_INCREMENT,
  `rate_weight_from` varchar(100) NOT NULL,
  `rate_weight_to` varchar(100) NOT NULL,
  `price` varchar(225) NOT NULL,
  `rate_added_by` varchar(225) NOT NULL,
  `rate_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rate_branch` varchar(100) NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_rate`
--

INSERT INTO `courier_rate` (`rate_id`, `rate_weight_from`, `rate_weight_to`, `price`, `rate_added_by`, `rate_date_added`, `rate_branch`) VALUES
(2, '0.01', '4.00', '140', 'bash228', '2023-01-06 02:58:40', 'TL1350');

-- --------------------------------------------------------

--
-- Table structure for table `courier_regional_branches`
--

DROP TABLE IF EXISTS `courier_regional_branches`;
CREATE TABLE IF NOT EXISTS `courier_regional_branches` (
  `branch_id` int(100) NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(225) NOT NULL,
  `prefix` varchar(5) NOT NULL,
  `branch_name` varchar(225) NOT NULL,
  `branch_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `branch_added_by` varchar(225) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_regional_branches`
--

INSERT INTO `courier_regional_branches` (`branch_id`, `branch_code`, `prefix`, `branch_name`, `branch_date_added`, `branch_added_by`) VALUES
(6, 'GH3722', 'GH', 'GHANA', '2023-01-23 09:31:05', 'bash228'),
(7, 'NIG2358', 'NIG', 'NIGERIA', '2023-01-23 09:32:04', 'bash228'),
(8, 'SA5568', 'SA', 'SOUTH AFRICA', '2023-01-23 09:32:17', 'bash228');

-- --------------------------------------------------------

--
-- Table structure for table `courier_tracking`
--

DROP TABLE IF EXISTS `courier_tracking`;
CREATE TABLE IF NOT EXISTS `courier_tracking` (
  `track_id` int(100) NOT NULL AUTO_INCREMENT,
  `parcel_code_fk` varchar(225) NOT NULL,
  `stage` varchar(100) NOT NULL,
  `remark` varchar(225) NOT NULL,
  `location` varchar(100) NOT NULL,
  `track_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `track_created_by` varchar(225) NOT NULL,
  PRIMARY KEY (`track_id`)
) ENGINE=MyISAM AUTO_INCREMENT=224 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_tracking`
--

INSERT INTO `courier_tracking` (`track_id`, `parcel_code_fk`, `stage`, `remark`, `location`, `track_date_created`, `track_created_by`) VALUES
(222, 'TL1676824134TK', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 16:28:54', 'bash228'),
(223, '1676824270', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 16:31:10', 'bash228'),
(221, 'TL1676822820AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 16:07:00', 'bash228'),
(220, 'TL1676822680AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 16:04:40', 'bash228'),
(219, 'TL1676822546AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 16:02:26', 'bash228'),
(218, 'TL1676822142AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 15:55:42', 'bash228'),
(217, 'TL1676822087AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 15:54:47', 'bash228'),
(216, 'TL1676821855AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 15:50:55', 'bash228'),
(215, 'TL1676821829AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 15:50:29', 'bash228'),
(214, 'TL1676821542AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 15:45:42', 'bash228'),
(213, 'TL1676821462AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 15:44:22', 'bash228'),
(212, 'TL1676821267AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 15:41:07', 'bash228'),
(211, 'TL1676820891AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 15:34:51', 'bash228'),
(210, 'TL1676819434AC', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'TL1350', '2023-02-19 15:10:34', 'bash228'),
(209, 'KS1676805783TL', '5', 'ITEM KS1676805783TL ISSUED AT DESTINATION', 'TL1350', '2023-02-19 15:05:33', 'bash228'),
(208, 'KS1676805783TL', '5', 'ITEM KS1676805783TL ISSUED AT DESTINATION', 'TL1350', '2023-02-19 15:05:26', 'bash228'),
(207, 'KS1676805783TL', '4', 'ITEM ON  KS16441136TL RECEIVED AT DESTINATION', 'TL1350', '2023-02-19 14:52:19', 'bash228'),
(206, 'KS1676805783TL', '3', 'ITEM DISPATCHED WITH MANIFEST - KS16441136TL TO  TAMALE INT. AIRPORT', 'KS6889', '2023-02-19 14:51:40', 'john'),
(204, 'KS1676805783TL', '1', 'ITEM RECEIVED AT ORIGIN FACILITY', 'KS6889', '2023-02-19 11:23:03', 'john'),
(205, 'KS1676805783TL', '2', 'ITEM ADDED TO MANIFEST - KS16441136TL', 'KS6889', '2023-02-19 14:51:15', 'john');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
