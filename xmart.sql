-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2015 at 08:28 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `xmart_address`
--

CREATE TABLE IF NOT EXISTS `xmart_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_street` varchar(200) DEFAULT NULL,
  `address_no` varchar(45) DEFAULT NULL,
  `address_rt` varchar(50) DEFAULT NULL,
  `address_rw` varchar(50) DEFAULT NULL,
  `address_additional` varchar(500) DEFAULT NULL,
  `address_phone` varchar(100) NOT NULL,
  `address_longitude` varchar(200) DEFAULT NULL,
  `address_latitude` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `xmart_address`
--

INSERT INTO `xmart_address` (`address_id`, `user_id`, `address_street`, `address_no`, `address_rt`, `address_rw`, `address_additional`, `address_phone`, `address_longitude`, `address_latitude`) VALUES
(1, 1, 'Jl. Rs. Fatmawati, Pondok Labu, Daerah Khusus Ibukota ', '1', '1', '2', 'Jl. Rs. Fatmawati, Pondok Labu, Daerah Khusus Ibukota Jakarta, Indonesia', '62 765 6971', '-6.315207', '106.793401'),
(2, 2, 'Jl. teratai raya blok d1', '22', '6', '10', 'Perum taman duta cisalak', '62 765 6971', '-6.376343', '106.857921');

-- --------------------------------------------------------

--
-- Table structure for table `xmart_item`
--

CREATE TABLE IF NOT EXISTS `xmart_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `item_weight` float NOT NULL DEFAULT '0',
  `item_price` int(11) NOT NULL DEFAULT '0',
  `item_barcode` varchar(200) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xmart_item`
--

INSERT INTO `xmart_item` (`item_id`, `item_name`, `type_id`, `item_weight`, `item_price`, `item_barcode`) VALUES
(1, 'Fisherman friends', 3, 1, 13000, '50819515'),
(2, 'Hypermart Card', 2, 0, 1000, '8949172508'),
(3, 'Alba Pastiles', 3, 1, 6000, '8997004100015'),
(4, 'Smiling Tube', 3, 1, 8000, '8994191103966'),
(5, 'Sampoerna Mild 16', 1, 2, 15000, '8999909096004');

-- --------------------------------------------------------

--
-- Table structure for table `xmart_item_type`
--

CREATE TABLE IF NOT EXISTS `xmart_item_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xmart_item_type`
--

INSERT INTO `xmart_item_type` (`type_id`, `type_name`) VALUES
(1, 'Rokok'),
(2, 'Sabun'),
(3, 'Makanan Ringan'),
(4, 'Minuman Bersoda'),
(5, 'Bumbu Dapur');

-- --------------------------------------------------------

--
-- Table structure for table `xmart_market`
--

CREATE TABLE IF NOT EXISTS `xmart_market` (
  `market_id` int(11) NOT NULL AUTO_INCREMENT,
  `market_name` varchar(50) NOT NULL,
  `market_phone` varchar(50) NOT NULL,
  `market_no` varchar(20) NOT NULL,
  `market_street` varchar(200) NOT NULL,
  `market_rt` varchar(50) NOT NULL,
  `market_rw` varchar(50) NOT NULL,
  `market_latitude` varchar(200) NOT NULL,
  `market_longitude` varchar(200) NOT NULL,
  PRIMARY KEY (`market_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `xmart_market`
--

INSERT INTO `xmart_market` (`market_id`, `market_name`, `market_phone`, `market_no`, `market_street`, `market_rt`, `market_rw`, `market_latitude`, `market_longitude`) VALUES
(1, 'Indomaret Pondok Labu', '087787626', '23', 'Pangkalan jati', '2', '3', '-6.315879', '106.792990'),
(2, 'Alfamaret Pangkalan Ojeg', 'sdasda', '23', 'Pondok labu', '2', '99', '-6.315331', '106.795946');

-- --------------------------------------------------------

--
-- Table structure for table `xmart_market_item`
--

CREATE TABLE IF NOT EXISTS `xmart_market_item` (
  `market_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `market_id` int(11) DEFAULT NULL,
  `market_item_quantity` int(11) DEFAULT NULL,
  `market_item_price` float DEFAULT NULL,
  PRIMARY KEY (`market_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `xmart_market_item`
--

INSERT INTO `xmart_market_item` (`market_item_id`, `item_id`, `market_id`, `market_item_quantity`, `market_item_price`) VALUES
(1, 1, 1, 90, 13000),
(2, 2, 1, 50, 11000),
(3, 1, 2, 13, 12000),
(4, 3, 2, 40, 5000),
(5, 4, 2, 32, 6000),
(6, 5, 1, 100, 17500),
(7, 5, 2, 200, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `xmart_notify`
--

CREATE TABLE IF NOT EXISTS `xmart_notify` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` varchar(100) NOT NULL,
  `sales_status` int(11) NOT NULL,
  `notify_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `xmart_notify`
--

INSERT INTO `xmart_notify` (`notify_id`, `sales_id`, `sales_status`, `notify_status`) VALUES
(1, '1111102015110540', 2, 1),
(2, '1111102015110708', 2, 1),
(3, '1112102015085631', 2, 1),
(4, '1113102015103210', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `xmart_sales`
--

CREATE TABLE IF NOT EXISTS `xmart_sales` (
  `sales_id` varchar(100) NOT NULL,
  `market_id` int(11) DEFAULT NULL,
  `sales_date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sales_status` int(11) DEFAULT '0',
  `sales_date_complete` datetime DEFAULT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xmart_sales`
--

INSERT INTO `xmart_sales` (`sales_id`, `market_id`, `sales_date`, `user_id`, `sales_status`, `sales_date_complete`) VALUES
('1211102015095738', 2, '2015-10-11 14:57:39', 1, 3, NULL),
('1211102015110307', 2, '2015-10-11 16:03:09', 1, 1, NULL),
('1211102015110359', 2, '2015-10-11 16:04:00', 1, 1, NULL),
('1211102015110445', 2, '2015-10-11 16:04:49', 1, 1, NULL),
('1111102015110540', 1, '2015-10-11 16:05:41', 1, 2, '2015-10-13 03:25:53'),
('1111102015110622', 1, '2015-10-11 16:06:23', 1, 3, NULL),
('1111102015110708', 1, '2015-10-11 16:07:09', 1, 2, '2015-10-11 21:48:37'),
('1211102015111416', 2, '2015-10-11 16:14:22', 1, 1, NULL),
('1211102015115842', 2, '2015-10-11 16:58:43', 1, 1, NULL),
('1111102015115902', 1, '2015-10-11 16:59:03', 1, 1, NULL),
('1111102015115917', 1, '2015-10-11 16:59:19', 1, 1, NULL),
('1111102015115959', 1, '2015-10-11 17:00:01', 1, 3, '2015-10-19 11:37:07'),
('1212102015120020', 2, '2015-10-11 17:00:22', 1, 1, NULL),
('1212102015080911', 2, '2015-10-12 01:09:13', 1, 1, NULL),
('1212102015080921', 2, '2015-10-12 01:09:24', 1, 1, NULL),
('1112102015085631', 1, '2015-10-12 01:57:06', 1, 2, '2015-10-13 03:35:57'),
('2113102015091738', 1, '2015-10-13 02:17:40', 2, 1, NULL),
('1113102015103210', 1, '2015-10-13 03:32:11', 1, 2, NULL),
('1214102015094518', 2, '2015-10-14 02:45:20', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `xmart_sales_detail`
--

CREATE TABLE IF NOT EXISTS `xmart_sales_detail` (
  `sales_id` varchar(100) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `sales_detail_count` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xmart_sales_detail`
--

INSERT INTO `xmart_sales_detail` (`sales_id`, `item_id`, `sales_detail_count`) VALUES
('1211102015095738', 3, 4),
('1211102015095738', 4, 11),
('1211102015095738', 5, 12),
('1211102015095738', 7, 4),
('1211102015110307', 1, 5),
('1211102015110307', 6, 1),
('1211102015110359', 1, 2),
('1211102015110359', 6, 2),
('1211102015110445', 3, 2),
('1211102015110445', 4, 12),
('1211102015110445', 7, 3),
('1211102015110445', 7, 1),
('1111102015110540', 1, 2),
('1111102015110540', 2, 1),
('1111102015110540', 6, 2),
('1111102015110540', 6, 1),
('1111102015110622', 6, 12),
('1111102015110708', 1, 1),
('1111102015110708', 2, 2),
('1111102015110708', 6, 12),
('1111102015110708', 6, 3),
('1211102015111416', 3, 2),
('1211102015111416', 4, 1),
('111102015115005', 6, 12),
('111102015115140', 1, 12),
('111102015115411', 1, 2),
('111102015115411', 2, 3),
('1211102015115842', 7, 1),
('1111102015115902', 6, 12),
('1111102015115917', 6, 1),
('1111102015115959', 2, 2),
('1111102015115959', 6, 1),
('1212102015120020', 5, 2),
('1212102015120020', 7, 2),
('1212102015080911', 4, 3),
('1212102015080921', 7, 1),
('1112102015085631', 1, 1),
('2113102015091738', 6, 1),
('1113102015103210', 1, 2),
('1113102015103210', 2, 1),
('1113102015103210', 4, 2),
('1113102015103210', 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `xmart_sales_history`
--

CREATE TABLE IF NOT EXISTS `xmart_sales_history` (
  `sales_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` varchar(100) NOT NULL,
  `sales_status` int(11) NOT NULL,
  `sales_history_date` datetime NOT NULL,
  PRIMARY KEY (`sales_history_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `xmart_sales_history`
--

INSERT INTO `xmart_sales_history` (`sales_history_id`, `sales_id`, `sales_status`, `sales_history_date`) VALUES
(1, '1211102015095738', 1, '2015-10-11 14:57:39'),
(2, '1211102015110307', 1, '2015-10-11 16:03:09'),
(3, '1211102015110359', 1, '2015-10-11 16:04:00'),
(4, '1211102015110445', 1, '2015-10-11 16:04:49'),
(5, '1111102015110540', 1, '2015-10-11 16:05:41'),
(6, '1111102015110622', 1, '2015-10-11 16:06:23'),
(7, '1111102015110708', 1, '2015-10-11 16:07:09'),
(8, '1211102015111416', 1, '2015-10-11 16:14:22'),
(9, '111102015115005', 1, '2015-10-11 16:50:07'),
(10, '111102015115140', 1, '2015-10-11 16:51:42'),
(11, '111102015115411', 1, '2015-10-11 16:54:13'),
(12, '1211102015115842', 1, '2015-10-11 16:58:43'),
(13, '1111102015115902', 1, '2015-10-11 16:59:03'),
(14, '1111102015115917', 1, '2015-10-11 16:59:19'),
(15, '1111102015115959', 1, '2015-10-11 17:00:01'),
(16, '1212102015120020', 1, '2015-10-11 17:00:22'),
(17, '1111102015110708', 2, '2015-10-11 21:48:37'),
(18, '1212102015080911', 1, '2015-10-12 01:09:14'),
(19, '1212102015080921', 1, '2015-10-12 01:09:24'),
(20, '1112102015085631', 1, '2015-10-12 01:57:06'),
(21, '112102015123728', 1, '2015-10-12 05:37:30'),
(22, '2113102015091738', 1, '2015-10-13 02:17:40'),
(23, '1111102015110540', 2, '2015-10-13 03:25:53'),
(24, '1113102015103210', 1, '2015-10-13 03:32:11'),
(25, '1112102015085631', 2, '2015-10-13 03:35:57'),
(26, '1214102015094518', 1, '2015-10-14 02:45:20'),
(27, '1111102015115959', 2, '2015-10-19 11:37:07'),
(28, '1113102015103210', 2, '2015-10-19 13:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `xmart_user`
--

CREATE TABLE IF NOT EXISTS `xmart_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `xmart_user`
--

INSERT INTO `xmart_user` (`user_id`, `user_username`, `user_password`) VALUES
(1, 'dhika', 'audi'),
(2, 'andhika', 'purwanto');

-- --------------------------------------------------------

--
-- Table structure for table `xmart_user_admin`
--

CREATE TABLE IF NOT EXISTS `xmart_user_admin` (
  `user_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_admin_username` varchar(500) NOT NULL,
  `user_admin_password` varchar(500) NOT NULL,
  `market_id` int(11) NOT NULL,
  PRIMARY KEY (`user_admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `xmart_user_admin`
--

INSERT INTO `xmart_user_admin` (`user_admin_id`, `user_admin_username`, `user_admin_password`, `market_id`) VALUES
(1, 'admin', '4dm1n', 1),
(2, 'admin2', '4dm1n2', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
