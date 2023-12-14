-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2023 at 04:17 PM
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
-- Table structure for table `courier_parcel`
--

DROP TABLE IF EXISTS `courier_parcel`;
CREATE TABLE IF NOT EXISTS `courier_parcel` (
  `parcel_id` int(100) NOT NULL AUTO_INCREMENT,
  `parcel_code` varchar(225) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_parcel`
--

INSERT INTO `courier_parcel` (`parcel_id`, `parcel_code`, `manifest_code`, `sender_type`, `sender_name`, `sender_address`, `sender_email`, `sender_location`, `sender_telephone`, `sender_origin`, `recipient_name`, `recipient_address`, `recipient_email`, `recipient_location`, `recipient_telephone`, `recipient_destination`, `flight`, `service_type`, `parcel_type`, `no_items`, `weight`, `volume`, `amount`, `content_descr`, `insurance`, `value_of_item`, `assign_status`, `date_created`, `date_received`, `created_by`, `date_modified`, `modified_by`, `user_branch`) VALUES
(93, 'TL1675119950TK', 'TK79929293', 'LOCAL', 'ISSAH MUBASIR', 'GHA-12345678901', 'MUBASIR18@GMAIL.COM', 'SSNIT', '0541506302', 'TL1350', 'ISSAH SAJIDA', 'GHA-78945613012', 'SAJIDA@GMAIL.COM', 'WA', '0202323323', 'TK8898', 'AWA587', 'AIRPORT-AIRPORT', 'AVI', '1', '5', 'N', '2.5', '', 'NO', '', 7, '2023-01-22 23:05:50', '2023-01-30 11:36:32', 'bash228', NULL, NULL, 'TL1350');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
