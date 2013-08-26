-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2013 at 09:58 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resilie3_pos`
-- resilie3_admin 
-- QXAWS75RT87
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `usertype` char(1) DEFAULT 'P',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) DEFAULT 'P',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fullname`, `username`, `password`, `usertype`, `createddate`, `status`) VALUES
(1, 'Ananthan Praburam', 'Prabu', '8daecc148b6275e2e5f188118e9341e8', 'A', '2013-06-26 05:35:11', 'A'),
(2, 'Verasingam Rajeevan', 'Rajeev', 'a6146c5b05de3c6bf5d4f52b504e24db', 'A', '2013-07-08 09:13:56', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `_customers`
--

CREATE TABLE IF NOT EXISTS `_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(500) NOT NULL,
  `companyname` varchar(500) NOT NULL,
  `companyaddress` varchar(500) NOT NULL,
  `companytelnumber` varchar(15) NOT NULL,
  `companyemail` varchar(500) NOT NULL,
  `title` varchar(10) NOT NULL,
  `customername` varchar(500) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `customertelnumber` varchar(15) NOT NULL,
  `review` varchar(500) DEFAULT NULL,
  `status` char(1) DEFAULT 'A',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `_invoice`
--

CREATE TABLE IF NOT EXISTS `_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(500) NOT NULL,
  `invoicedate` varchar(12) NOT NULL,
  `paymentmode` varchar(12) NOT NULL,
  `customerid` varchar(500) DEFAULT NULL,
  `customername` varchar(500) NOT NULL,
  `customeraddress` varchar(500) DEFAULT NULL,
  `customertelnumber` varchar(15) DEFAULT NULL,
  `nettotal` decimal(8,2) DEFAULT NULL,
  `discounts` decimal(8,2) DEFAULT NULL,
  `vat` decimal(8,2) DEFAULT NULL,
  `grandtotal` decimal(8,2) DEFAULT NULL,
  `status` char(1) DEFAULT 'A',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`invoiceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `_invoiceitems`
--

CREATE TABLE IF NOT EXISTS `_invoiceitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(500) NOT NULL,
  `itemid` varchar(500) NOT NULL,
  `modelnumber` varchar(500) NOT NULL,
  `serialnumber` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `quantity` int(6) NOT NULL,
  `unitprice` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `status` char(1) DEFAULT 'A',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `_invoiceitems`
--
-- --------------------------------------------------------

--
-- Table structure for table `_itembrand`
--

CREATE TABLE IF NOT EXISTS `_itembrand` (
  `brandid` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(500) DEFAULT NULL,
  `itemtype` varchar(500) NOT NULL,
  `status` char(1) DEFAULT 'A',
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `_itembrand`
--

INSERT INTO `_itembrand` (`brandid`, `brand`, `itemtype`, `status`) VALUES
(1, 'intel', 'Processor', 'A'),
(2, 'Foxcon', 'Motherboard', 'A'),
(3, 'intel', 'Motherboard', 'A'),
(4, 'Asrock', 'Motherboard', 'A'),
(5, 'Asus', 'Motherboard', 'A'),
(6, 'e-sonic', 'Motherboard', 'A'),
(7, 'Kingston', 'Ram', 'A'),
(8, 'Trancend', 'Ram', 'A'),
(9, 'G-skill', 'Ram', 'A'),
(10, 'Toshiba', 'Hard disk', 'A'),
(11, 'Hitachi', '--Select--', 'A'),
(12, 'Samsung', 'DVD Rom', 'A'),
(13, 'Asus', 'DVD Rom', 'A'),
(14, 'Samsung', 'DVD Writer', 'A'),
(15, 'Asus', 'DVD Writer', 'A'),
(16, 'Samsung', 'Monitor', 'A'),
(17, 'LG', 'Monitor', 'A'),
(18, 'HP', 'Monitor', 'A'),
(19, 'Dell', 'Monitor', 'A'),
(20, 'AOC', 'Monitor', 'A'),
(21, 'Tech Com', 'Power Supply', 'A'),
(22, 'Eyesee', 'Power Supply', 'A'),
(23, 'Tech Com', 'Casing', 'A'),
(24, 'Fast Power', 'Casing', 'A'),
(25, 'Tech Com', 'UPS', 'A'),
(26, 'Fast Power', 'UPS', 'A'),
(27, 'J-way', 'Keyboard', 'A'),
(28, 'standard', 'Keyboard', 'A'),
(29, 'Tech Com', 'Keyboard', 'A'),
(30, 'Lazer', '--Select--', 'A'),
(31, 'CCIVO', 'Keyboard', 'A'),
(32, 'S-tech', 'Keyboard', 'A'),
(33, 'logitech', 'wirless keyboard', 'A'),
(34, 'Lazer', 'Mouse', 'A'),
(35, 'Dell', 'Mouse', 'A'),
(36, 'HP', 'Mouse', 'A'),
(37, 'Sony', 'Mouse', 'A'),
(38, 'Dell', 'Laptop Mouse', 'A'),
(39, 'HP', 'Laptop Mouse', 'A'),
(40, 'J-way', 'Laptop Mouse', 'A'),
(41, 'Tech Com', 'Laptop keyboard', 'A'),
(42, 'IBM', 'Laptop keyboard', 'A'),
(43, 'J-way', 'wirless mouse', 'A'),
(44, 'HP', 'wirless mouse', 'A'),
(45, 'Dell', 'wirless mouse', 'A'),
(46, 'Genious', 'wirless mouse', 'A'),
(47, 'Lazer', 'Head Phone', 'A'),
(48, 'Jhonystar', 'Head Phone', 'A'),
(49, 'Sony', 'Head Phone', 'A'),
(50, 'Besta', 'Head Phone', 'A'),
(51, 'Symbol', 'Head Phone', 'A'),
(52, 'Havit', 'Head Phone', 'A'),
(53, 'PC Plus', 'USB Headset', 'A'),
(54, 'mnghai', 'USB Headset', 'A'),
(55, 'Lazer', 'Speaker', 'A'),
(56, 'M700', 'Speaker', 'A'),
(57, 'Camac', 'Portable Mini Speaker', 'A'),
(58, 'Havit', 'Portable Mini Speaker', 'A'),
(59, 'Powered', 'Portable Mini Speaker', 'A'),
(60, 'Jeway', 'Web Cam', 'A'),
(61, 'Tech Com', 'Web Cam', 'A'),
(62, 'J-way', 'Web Cam', 'A'),
(63, 'Acer', 'DVD Writer', 'A'),
(64, 'Toshiba', 'External Hard disk', 'A'),
(65, 'Hitachi', 'External Hard disk', 'A'),
(66, 'Acer', 'External Hard disk', 'A'),
(67, 'Imation', 'External Hard disk', 'A'),
(68, 'Acer', 'External DVD Writer', 'A'),
(69, 'Toshiba', 'External DVD Writer', 'A'),
(70, 'Imation', 'External DVD Writer', 'A'),
(71, 'Eagle', 'DVR', 'A'),
(72 'Eagle', 'CCTV Camera', 'A'),
(73, 'Tech Com', 'Lan Card', 'A'),
(74, 'PCI', 'PCI Card', 'A'),
(75, 'Besta', 'USB Port', 'A'),
(76, 'Eagle', 'CCTV Power', 'A'),
(77, 'Nill', 'AC-DC Adaptor', 'A'),
(78, 'Huawei', 'Dongle - HSDPA', 'A'),
(79, 'Nill', 'Laptop Cleaner', 'A'),
(80, 'Nill', 'Cleaning Wet wipes', 'A'),
(81, 'Forum', 'Forum Cleaner', 'A'),
(82, 'Nill', 'Super Cleaner', 'A'),
(83, 'HP', 'Laser Jet Toner', 'A'),
(84, 'MO', 'Power Adapter', 'A'),
(85, 'Nill', 'USB Mini Fan', 'A'),
(86, 'Chusei', 'Card Reader', 'A'),
(87, 'Kasino', 'USB Hub', 'A'),
(88, 'Kingston', 'Pendrive', 'A'),
(89, 'Imation', 'Pendrive', 'A'),
(90, 'Genious', 'Woofer', 'A'),
(91, 'Microlab', 'Woofer', 'A'),
(92, 'HP', 'Printer', 'A'),
(93, 'Canon', 'Printer', 'A'),
(94, 'Havit', 'Laptop Cooler', 'A'),
(95, 'Nill', 'Laptop table', 'A'),
(96, 'HP', 'Scaner', 'A'),
(97, 'Canon', 'Scaner', 'A'),
(98, 'Prolink', 'Router', 'A'),
(99, 'TP-Link', 'Router', 'A'),
(100, 'Radeon', 'VGA Card', 'A'),
(101, 'Epson', 'Printer Ribbon', 'A'),
(102, 'HDMI', 'Cables', 'A'),
(103, 'Nill', 'Cables', 'A'),
(104, 'Intex', 'Laptop Sticker', 'A'),
(105, 'Nill', 'Laptop Sticker', 'A'),
(106, 'Screen ward', 'Laptop Sticker', 'A'),
(107, 'Kaspersky', 'Virus Guard', 'A'),
(108, 'Eset', 'Virus Guard', 'A'),
(109, 'AVG', 'Virus Guard', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `_items`
--

CREATE TABLE IF NOT EXISTS `_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(500) NOT NULL,
  `itemcatagory` varchar(500) NOT NULL,
  `modelnumber` varchar(500) NOT NULL,
  `itemname` varchar(500) NOT NULL,
  `itembrand` varchar(500) NOT NULL,
  `unitprice` decimal(12,0) DEFAULT '0',
  `salesprice` decimal(12,0) DEFAULT '0',
  `warranty` int(4) NOT NULL DEFAULT '0',
  `discounts` decimal(12,0) DEFAULT '0',
  `newarrival` char(1) DEFAULT 'N',
  `specialoffer` char(1) DEFAULT 'N',
  `review` varchar(500) DEFAULT NULL,
  `status` char(1) DEFAULT 'A',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supplierid` varchar(500) DEFAULT NULL,
  `suppliername` varchar(500) DEFAULT NULL,
  `specifications` text,
  `offerprice` decimal(12,0) DEFAULT NULL,
  `thumbimage` text,
  `productimage` text,
  PRIMARY KEY (`id`,`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `_items`
--

INSERT INTO `_items` (`id`, `itemid`, `itemcatagory`, `modelnumber`, `itemname`, `itembrand`, `unitprice`, `salesprice`, `warranty`, `discounts`, `newarrival`, `specialoffer`, `review`, `status`, `createddate`, `supplierid`, `suppliername`, `specifications`, `offerprice`, `thumbimage`, `productimage`) VALUES
(1, 'ITM00001', 'Processor', 'i3-2120', 'Intel core i3 Processor', 'intel', 16000, 16500, 36, 0, 'N', 'N', 'Nill', 'A', '2013-08-09 04:59:28', 'SUP00001', 'Micro Center				', 'Core i3 3.30 GHZ', 0, '../images/thumbs/19f42c2cd012bec7c06d90295a17d710-itm-ITM00001.jpeg', '../images/products/19f42c2cd012bec7c06d90295a17d710-itm-ITM00001.jpeg'),
(2, 'ITM00002', 'Processor', 'i5-3470', 'intel core i5 processor', 'intel', 27500, 28500, 36, 0, 'N', 'N', 'nill', 'A', '2013-08-09 05:05:15', 'SUP00001', 'Micro Center				', 'core i5 3.30 ghz', 0, '../images/thumbs/73efa6097f1bc6790bb4859b72980d21-itm-ITM00002.jpeg', '../images/products/73efa6097f1bc6790bb4859b72980d21-itm-ITM00002.jpeg'),
(3, 'ITM00003', 'Motherboard', 'H61MXE-V', 'Foxcon DDR3 Motherboard', 'Foxcon', 7900, 8750, 24, 0, 'N', 'N', 'nill', 'A', '2013-08-09 05:08:48', 'SUP00001', 'Micro Center				', 'DDR3 | PCI Express | intel Chipset', 0, '../images/thumbs/aa6d1f70ad332c7f01bb948414a5aa9b-itm-ITM00003.jpeg', '../images/products/aa6d1f70ad332c7f01bb948414a5aa9b-itm-ITM00003.jpeg'),
(4, 'ITM00004', 'Motherboard', 'H61M-DGS', 'Asrock DDR3 Motherboard', 'Asrock', 7800, 8250, 24, 0, 'N', 'N', 'nill', 'A', '2013-08-09 05:12:05', 'SUP00001', 'Micro Center				', 'DDR3 | intel Chipset | Suports intel core', 0, '../images/thumbs/b270a501d6db80a7d1ed91a35c380493-itm-ITM00004.jpeg', '../images/products/b270a501d6db80a7d1ed91a35c380493-itm-ITM00004.jpeg'),
(5, 'ITM00005', 'Motherboard', 'DH61WW', 'Intel DDR3 Motherboard', 'intel', 7750, 8300, 24, 0, 'N', 'N', 'nill', 'A', '2013-08-09 05:15:30', 'SUP00001', 'Micro Center				', 'DDR3 | support core i7 | LGA 1155 supports | Dual Channel DDR3', 0, '../images/thumbs/49d234ba01053208ea222c64bee8bd92-itm-ITM00005.jpeg', '../images/products/49d234ba01053208ea222c64bee8bd92-itm-ITM00005.jpeg'),
(6, 'ITM00006', 'Hard disk', 'DT01ACA050', '500GB Hard disk', 'Toshiba', 7100, 8100, 14, 0, 'N', 'N', 'nill', 'A', '2013-08-09 05:19:06', 'SUP00001', 'Micro Center				', '500GB | S-ATA', 0, '../images/thumbs/05e3ae21ee391394a242e413b04ff571-itm-ITM00006.jpeg', '../images/products/05e3ae21ee391394a242e413b04ff571-itm-ITM00006.jpeg'),
(7, 'ITM00007', 'Hard disk', 'DT01ACA100', '1TB Hard Disk', 'Toshiba', 11000, 13000, 14, 0, 'N', 'N', 'nill', 'A', '2013-08-09 05:21:58', 'SUP00001', 'Micro Center				', '1.0TB | S-ATA', 0, '../images/thumbs/c0036885b64913997ad8a16b6667d148-itm-ITM00007.jpeg', '../images/products/c0036885b64913997ad8a16b6667d148-itm-ITM00007.jpeg'),
(8, 'ITM00008', 'Ram', 'KVR1333D3N9', '4GB DDR3 Ram', 'Kingston', 4500, 5250, 36, 0, 'N', 'N', 'nill', 'A', '2013-08-09 05:24:40', 'SUP00001', 'Micro Center				', 'DDR3 | 4GB', 0, '../images/thumbs/b65bfe947070644206e3e647c3e79135-itm-ITM00008.jpeg', '../images/products/b65bfe947070644206e3e647c3e79135-itm-ITM00008.jpeg'),
(9, 'ITM00009', 'Head Phone', 'BT808', 'Stereo Head phone', 'Besta', 600, 600, 0, 0, 'N', 'N', 'Nill', 'A', '2013-08-09 05:29:51', 'SUP00002', 'Jana Computers				', 'Nill', 0, '../images/thumbs/b69329e137103047f760fce31b41b533-itm-ITM00009.jpeg', '../images/products/b69329e137103047f760fce31b41b533-itm-ITM00009.jpeg'),
(10, 'ITM00010', 'Head Phone', 'AHP-750', 'Stereo Multimedia Headset', 'Lazer', 500, 600, 0, 0, 'N', 'N', 'Nill', 'A', '2013-08-09 05:32:02', 'SUP00001', 'Micro Center				', 'Nill', 0, '../images/thumbs/a9dd4d00f329121d978901262e990501-itm-ITM00010.jpeg', '../images/products/a9dd4d00f329121d978901262e990501-itm-ITM00010.jpeg'),
(11, 'ITM00011', 'Head Phone', 'HV-ST041', 'Stereo Had phone', 'Havit', 125, 1750, 0, 0, 'Y', 'N', 'nill', 'A', '2013-08-09 05:35:33', 'SUP00001', 'Micro Center				', 'nill', 0, '../images/thumbs/5d8f6f6034a6fef4d21fde430b96cc1b-itm-ITM00011.jpeg', '../images/products/5d8f6f6034a6fef4d21fde430b96cc1b-itm-ITM00011.jpeg'),
(12, 'ITM00012', 'Head Phone', 'PC-4000', 'Stereo Hadphone with Mic', 'Symbol', 1100, 1400, 0, 0, 'Y', 'N', 'Nill', 'A', '2013-08-09 05:38:18', 'SUP00002', 'Jana Computers				', 'Nill', 0, '../images/thumbs/4a4b73063b780b7cd5b5ab4feaab17db-itm-ITM00012.jpeg', '../images/products/4a4b73063b780b7cd5b5ab4feaab17db-itm-ITM00012.jpeg'),
(13, 'ITM00013', 'USB Headset', 'USB-520', 'USB Head Set', 'mnghai', 1250, 1600, 0, 0, 'Y', 'N', 'Nill', 'A', '2013-08-09 05:40:30', 'SUP00001', 'Micro Center				', 'Nill', 0, '../images/thumbs/0c10078a3c3b6207fe0bc1311c834d41-itm-ITM00013.jpeg', '../images/products/0c10078a3c3b6207fe0bc1311c834d41-itm-ITM00013.jpeg'),
(14, 'ITM00014', 'VGA Card', 'HD5450', 'Radeon 1GB DDR3 VGA Card', 'Radeon', 6000, 6500, 0, 0, 'N', 'N', 'Nill', 'A', '2013-08-09 05:46:19', 'SUP00001', 'Micro Center				', 'HDMI | AMD | 40NM Process | 2GB Hyper Memory Support |\r\n', 0, '../images/thumbs/7802a25ac5198ae5cf2b8ec7eff2c095-itm-ITM00014.png', '../images/products/7802a25ac5198ae5cf2b8ec7eff2c095-itm-ITM00014.png'),
(15, 'ITM00015', 'Speaker', 'M700', 'USB Speaker', 'M700', 900, 1200, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 05:55:46', 'SUP00002', 'Jana Computers				', 'nill', 0, '../images/thumbs/8bd3763ccbd82f5f610ba603bfcf42ad-itm-ITM00015.png', '../images/products/8bd3763ccbd82f5f610ba603bfcf42ad-itm-ITM00015.png'),
(16, 'ITM00016', 'Speaker', 'AS-3852', 'USB Speaker', 'Lazer', 350, 450, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 05:57:13', 'SUP00001', 'Micro Center				', 'nill', 0, '../images/thumbs/916499b20fcdf7888def7e4e1191a48a-itm-ITM00016.png', '../images/products/916499b20fcdf7888def7e4e1191a48a-itm-ITM00016.png'),
(17, 'ITM00017', 'Portable Mini Speaker', 'U-215', 'Powered Notebook Speaker', 'Powered', 1700, 2500, 0, 0, 'Y', 'N', '', 'A', '2013-08-09 06:00:04', 'SUP00001', 'Micro Center				', 'USB Card | Memory Card | Battery | Recharge', 0, '../images/thumbs/ae82a73850337b7cdb7ca0af980a60af-itm-ITM00017.jpeg', '../images/products/ae82a73850337b7cdb7ca0af980a60af-itm-ITM00017.jpeg'),
(18, 'ITM00018', 'Portable Mini Speaker', 'CMK-50C', 'Portable mini Speaker', 'Camac', 1850, 2500, 0, 0, 'Y', 'N', 'nill', 'A', '2013-08-09 06:03:04', 'SUP00002', 'Jana Computers				', 'USB | Memeroy Card | Charge |', 0, '../images/thumbs/6368a41726c46c1b5636b30d5cf76a1f-itm-ITM00018.jpeg', '../images/products/6368a41726c46c1b5636b30d5cf76a1f-itm-ITM00018.jpeg'),
(19, 'ITM00019', 'External Hard disk', '593699', '500GB External Hard Disk', 'Toshiba', 8250, 9500, 12, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:06:20', 'SUP00001', 'Micro Center				', '500GB | USB 3.0 |', 0, '../images/thumbs/a2329151bb7846d7afa84fd0a5eec24d-itm-ITM00019.jpeg', '../images/products/a2329151bb7846d7afa84fd0a5eec24d-itm-ITM00019.jpeg'),
(20, 'ITM00020', 'External Hard disk', '593700-A2', '1.0 TB External Hard Disk', 'Toshiba', 11250, 12750, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:08:21', 'SUP00001', 'Micro Center				', '1.0 TB | USB 3.0', 0, '../images/thumbs/032826c2ce2f6d93cecc95ff70782390-itm-ITM00020.jpeg', '../images/products/032826c2ce2f6d93cecc95ff70782390-itm-ITM00020.jpeg'),
(21, 'ITM00021', 'Router', 'TD-W8951ND', '150Mbps Wirless N ADSL2+ Modem Router', 'TP-Link', 4500, 5500, 12, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:12:46', 'SUP00001', 'Micro Center				', '150MBps | 1 Antena | Online Gaming | High video streaming', 0, '../images/thumbs/04631a6a6b71d10708e77fd29134f48c-itm-ITM00021.jpeg', '../images/products/04631a6a6b71d10708e77fd29134f48c-itm-ITM00021.jpeg'),
(22, 'ITM00022', 'Router', 'TD-W8961ND', '300Mbps Wirless N Adsl2+ Modem Router', 'TP-Link', 5750, 6500, 12, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:18:01', '--Select--', '				', '300 Mbps | wifi | 2 antena | high video streaming | online gaming | Internet Phone calls', 0, '../images/thumbs/e7ddcfa86276d973a25931e4c25d7586-itm-ITM00022.jpeg', '../images/products/e7ddcfa86276d973a25931e4c25d7586-itm-ITM00022.jpeg'),
(23, 'ITM00023', 'External DVD Writer', '1212001', 'External USB 2.0 DVDRW', 'Acer', 4750, 6000, 12, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:22:14', 'SUP00001', 'Micro Center				', 'USB 2.0 | Read CD-24x DVD 8x | Write CD-24x DVD 8x | compatible DVD Dual Layer', 0, '../images/thumbs/2ffbec63aad58d88f771686159804eac-itm-ITM00023.jpeg', '../images/products/2ffbec63aad58d88f771686159804eac-itm-ITM00023.jpeg'),
(24, 'ITM00024', 'wirless keyboard', 'mk220', 'Logitech wirless Combo', 'logitech', 2750, 3250, 12, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:27:26', 'SUP00001', 'Micro Center				', 'Key board | Mouse', 0, '../images/thumbs/8f9903041822ee1afc5caa1c56a4f6bb-itm-ITM00024.jpeg', '../images/products/8f9903041822ee1afc5caa1c56a4f6bb-itm-ITM00024.jpeg'),
(25, 'ITM00025', 'Forum Cleaner', 'Nill', 'Universal Foam Cleaner', 'Forum', 450, 650, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:29:39', 'SUP00002', 'Jana Computers				', 'nill', 0, '../images/thumbs/0e2e34cef60c0a8fe1d9aecfc048ec23-itm-ITM00025.jpeg', '../images/products/0e2e34cef60c0a8fe1d9aecfc048ec23-itm-ITM00025.jpeg'),
(26, 'ITM00026', 'Dongle - HSDPA', 'Nill', 'USB HSDPA Modem(Dongle)', 'Huawei', 3000, 3500, 12, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:33:53', 'SUP00001', 'Micro Center				', 'nill', 0, '../images/thumbs/a7ae54bb82a2719f03ed436d77992458-itm-ITM00026.jpeg', '../images/products/a7ae54bb82a2719f03ed436d77992458-itm-ITM00026.jpeg'),
(27, 'ITM00027', 'CCTV Camera', 'SS-307CELIR', '3.6mm DIGITAL CCTV Camera', 'Eagle', 4000, 5500, 12, 0, 'Y', 'N', 'nill', 'A', '2013-08-09 06:39:00', 'SUP00001', 'Micro Center				', '3.6 MM | Digital Video | Night vision', 0, '../images/thumbs/73d7e2c1f0956157c3e9355c371d8907-itm-ITM00027.jpeg', '../images/products/73d7e2c1f0956157c3e9355c371d8907-itm-ITM00027.jpeg'),
(28, 'ITM00028', 'USB Mini Fan', 'HH-U510', 'USB Mini Desk fan', 'Nill', 850, 1250, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:41:31', 'SUP00001', 'Micro Center				', 'nill', 0, '../images/thumbs/2ac0aee59d5814f2d776ab6fff46f9bc-itm-ITM00028.jpeg', '../images/products/2ac0aee59d5814f2d776ab6fff46f9bc-itm-ITM00028.jpeg'),
(29, 'ITM00029', 'Super Cleaner', 'Nill', 'Super Cleaner - keyboard cleaner', 'Nill', 300, 350, 0, 0, 'Y', 'N', 'nill', 'A', '2013-08-09 06:43:20', 'SUP00002', 'Jana Computers				', 'nill', 0, '../images/thumbs/010e6a4cba4f25e4de31a8bfd64e7270-itm-ITM00029.jpeg', '../images/products/010e6a4cba4f25e4de31a8bfd64e7270-itm-ITM00029.jpeg'),
(30, 'ITM00030', 'AC-DC Adaptor', 'EA-01', 'AC-DC Adapter', 'Nill', 250, 300, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:44:33', 'SUP00001', 'Micro Center				', 'nill', 0, '', ''),
(31, 'ITM00031', 'AC-DC Adaptor', 'Nill', 'AC-DC Adapter', 'Nill', 250, 300, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:45:42', 'SUP00002', 'Jana Computers				', 'nill', 0, '', ''),
(32, 'ITM00032', 'wirless mouse', 'JM-0506', 'Wirless Mouse', 'J-way', 750, 1250, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:48:25', 'SUP00001', 'Micro Center				', 'nill', 0, '../images/thumbs/4231a6772bcab60b1b2b368dac7b283f-itm-ITM00032.jpeg', '../images/products/4231a6772bcab60b1b2b368dac7b283f-itm-ITM00032.jpeg'),
(33, 'ITM00033', 'Card Reader', 'CS-MP492', 'USB Card reader', 'Chusei', 100, 150, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:49:39', 'SUP00002', 'Jana Computers				', 'nill', 0, '', ''),
(34, 'ITM00034', 'PCI Card', 'Nill', 'Hi-Speed USB 2.0 PCI Card', 'PCI', 1500, 1850, 6, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:50:56', 'SUP00002', 'Jana Computers				', 'nill', 0, '', ''),
(35, 'ITM00035', 'Lan Card', 'SSD-LC-651', 'Lan Card', 'Tech Com', 350, 500, 3, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:52:04', 'SUP00002', 'Jana Computers', 'nill', 0, '', ''),
(36, 'ITM00036', 'PCI Card', 'Nill', 'PCI Sound Card', 'PCI', 750, 1500, 6, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:53:20', 'SUP00002', 'Jana Computers', 'nill', 0, '', ''),
(37, 'ITM00037', 'Cables', 'Nill', 'HDMI Cable', 'HDMI', 750, 1250, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:54:31', 'SUP00001', 'Micro Center', 'nill', 0, '', ''),
(38, 'ITM00038', 'DVR', 'ODVREAGSUP-204', 'CCTV DVR', 'Eagle', 8500, 9500, 12, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:56:07', 'SUP00001', 'Micro Center', '4 Port', 0, '', ''),
(39, 'ITM00039', 'Mouse', 'SY-639', 'Optical USB Mouse', 'Sony', 250, 300, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 06:59:46', 'SUP00002', 'Jana Computers', 'nill', 0, '', ''),
(40, 'ITM00040', 'Mouse', 'Nill', 'Optical USB Mouse', 'Lazer', 300, 350, 0, 0, 'N', 'N', 'nill', 'A', '2013-08-09 07:00:41', 'SUP00001', 'Micro Center', 'nill', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `_itemspecification`
--

CREATE TABLE IF NOT EXISTS `_itemspecification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` char(1) DEFAULT 'A',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `_itemtype`
--

CREATE TABLE IF NOT EXISTS `_itemtype` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(500) DEFAULT NULL,
  `status` char(1) DEFAULT 'A',
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `_itemtype`
--

INSERT INTO `_itemtype` (`typeid`, `type`, `status`) VALUES
(1, 'Processor', 'A'),
(2, 'Motherboard', 'A'),
(3, 'Ram', 'A'),
(4, 'Hard disk', 'A'),
(5, 'DVD Rom', 'A'),
(6, 'DVD Writer', 'A'),
(7, 'Monitor', 'A'),
(8, 'Power Supply', 'A'),
(9, 'Casing', 'A'),
(10, 'UPS', 'A'),
(11, 'Keyboard', 'A'),
(12, 'wirless keyboard', 'A'),
(13, 'Mouse', 'A'),
(14, 'Laptop Mouse', 'A'),
(15, 'Laptop keyboard', 'A'),
(16, 'wirless mouse', 'A'),
(17, 'Head Phone', 'A'),
(18, 'USB Headset', 'A'),
(19, 'Speaker', 'A'),
(20, 'Portable Mini Speaker', 'A'),
(21, 'Web Cam', 'A'),
(22, 'External Hard disk', 'A'),
(23, 'External DVD Writer', 'A'),
(24, 'DVR', 'A'),
(25, 'CCTV Camera', 'A'),
(26, 'Lan Card', 'A'),
(27, 'PCI Card', 'A'),
(28, 'USB Port', 'A'),
(29, 'CCTV Power', 'A'),
(30, 'AC-DC Adaptor', 'A'),
(31, 'Dongle - HSDPA', 'A'),
(32, 'Laptop Cleaner', 'A'),
(33, 'Cleaning Wet wipes', 'A'),
(34, 'Forum Cleaner', 'A'),
(35, 'Super Cleaner', 'A'),
(36, 'Laser Jet Toner', 'A'),
(37, 'Power Adapter', 'A'),
(38, 'USB Mini Fan', 'A'),
(39, 'Card Reader', 'A'),
(40, 'USB Hub', 'A'),
(41, 'Pendrive', 'A'),
(42, 'Woofer', 'A'),
(43, 'Printer', 'A'),
(44, 'Laptop Cooler', 'A'),
(45, 'Laptop table', 'A'),
(46, 'Scaner', 'A'),
(47, 'Router', 'A'),
(48, 'VGA Card', 'A'),
(49, 'Printer Ribbon', 'A'),
(50, 'Cables', 'A'),
(51, 'Laptop Sticker', 'A'),
(52, 'Virus Guard', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `_stockitems`
--

CREATE TABLE IF NOT EXISTS `_stockitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stockid` varchar(200) NOT NULL,
  `itemcatagory` varchar(500) DEFAULT NULL,
  `itemid` varchar(500) DEFAULT NULL,
  `itemname` varchar(500) DEFAULT NULL,
  `unitprice` decimal(8,2) DEFAULT NULL,
  `salesprice` decimal(8,2) DEFAULT NULL,
  `warranty` int(12) DEFAULT NULL,
  `quantity` int(12) DEFAULT NULL,
  `status` char(1) DEFAULT 'P',
  PRIMARY KEY (`id`,`stockid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `_stockitems`
--

-- --------------------------------------------------------

--
-- Table structure for table `_stocks`
--

CREATE TABLE IF NOT EXISTS `_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stockid` varchar(500) NOT NULL,
  `totalpurchasedprice` decimal(12,0) NOT NULL DEFAULT '0',
  `totalsalesprice` decimal(12,0) NOT NULL DEFAULT '0',
  `stockdate` date NOT NULL,
  `status` char(1) DEFAULT 'A',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`stockid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `_stocks`
--

-- --------------------------------------------------------

--
-- Table structure for table `_suppliers`
--

CREATE TABLE IF NOT EXISTS `_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplierid` varchar(500) NOT NULL,
  `companyname` varchar(500) NOT NULL,
  `companyaddress` varchar(500) NOT NULL,
  `companytelnumber` varchar(15) NOT NULL,
  `companyemail` varchar(500) NOT NULL,
  `title` varchar(10) NOT NULL,
  `suppliername` varchar(500) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `suppliertelnumber` varchar(15) NOT NULL,
  `review` varchar(500) DEFAULT NULL,
  `status` char(1) DEFAULT 'A',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`supplierid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `_suppliers`
--

INSERT INTO `_suppliers` (`id`, `supplierid`, `companyname`, `companyaddress`, `companytelnumber`, `companyemail`, `title`, `suppliername`, `designation`, `suppliertelnumber`, `review`, `status`, `createddate`) VALUES
(1, 'SUP00001', 'Micro Center', '401/3, 2nd floor, unity plaza, colombo-04.', '0112505801', 'microc@sltnet.lk', 'Mr.', 'Imran', 'Director', '0777316969', 'Main Dealer', 'A', '2013-08-09 03:20:56'),
(2, 'SUP00002', 'Jana Computers', '382/1, J.T. Complex, Galle Road, Colombo-06.', '0112360464', 'janatec@yahoo.com', 'Mr.', 'Janahan', 'Director', '0773405912', 'Supporting dealer, Not in the major activity', 'A', '2013-08-09 04:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `_transactions`
--

CREATE TABLE IF NOT EXISTS `_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactiondate` varchar(12) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `catagory` char(1) DEFAULT NULL,
  `account` char(1) DEFAULT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `_transactions`
--

--quotation

CREATE TABLE IF NOT EXISTS `_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotationid` varchar(500) NOT NULL,
  `quotationdate` varchar(12) NOT NULL,
  `paymentmode` varchar(12) NOT NULL,
  `customerid` varchar(500) DEFAULT NULL,
  `customername` varchar(500) NOT NULL,
  `customeraddress` varchar(500) DEFAULT NULL,
  `customertelnumber` varchar(15) DEFAULT NULL,
  `nettotal` decimal(8,2) DEFAULT NULL,
  `vat` decimal(8,2) DEFAULT NULL,
  `status` char(1) DEFAULT 'A',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`quotationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `_quotationitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotationid` varchar(500) NOT NULL,
  `itemid` varchar(500) NOT NULL,
  `modelnumber` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `quantity` int(6) NOT NULL,
  `unitprice` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `status` char(1) DEFAULT 'A',
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS _purchaseorder
(
	id int(11) NOT NULL AUTO_INCREMENT,
	orderid varchar(500) NOT NULL,
	orderdate varchar(12) NOT NULL,
	supplierid varchar(500) DEFAULT NULL,
	suppliername varchar(500) NOT NULL,
	nettotal decimal(8,2) DEFAULT NULL,
	vat decimal(8,2) DEFAULT NULL,
	status char(1) DEFAULT 'A',
	createddate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id,orderid)
  
);

CREATE TABLE IF NOT EXISTS _purchaseordereditems
(
	id int(11) NOT NULL AUTO_INCREMENT,
	orderid varchar(500) NOT NULL,
	itemid varchar(500) NOT NULL,
	modelnumber varchar(500) NOT NULL,
	description varchar(500) NOT NULL,
	quantity int(6) NOT NULL,
	unitprice decimal(8,2) DEFAULT NULL,
	total decimal(8,2) DEFAULT NULL,
	status char(1) DEFAULT 'A',
	createddate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS _issuecheque
(
	id int(11) NOT NULL AUTO_INCREMENT,
	chequeno varchar(10) NOT NULL,
	issuedate date,
	chequedate date,
	payto varchar(500) NOT NULL,
	amount decimal(8,2) DEFAULT NULL,
	issuetype char(1) DEFAULT '1',
	review varchar(500) NOT NULL,
	status char(1) DEFAULT 'A',
	createddate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id,chequeno)	
);

CREATE TABLE IF NOT EXISTS _receivechequecustomers
(
	id int(11) NOT NULL AUTO_INCREMENT,
	customerid varchar(100) NOT NULL,
	customername varchar(500) NOT NULL,
	receiptnumber varchar(500) NOT NULL,
	receivedate date,
	totalamount decimal(8,2) DEFAULT NULL,
	status char(1) DEFAULT 'A',
	createddate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id,receiptnumber)	
);

CREATE TABLE IF NOT EXISTS _receivecheques
(
	id int(11) NOT NULL AUTO_INCREMENT,
	receiptnumber varchar(500) NOT NULL,
	chequeno varchar(10) NOT NULL,
	chequedate date,
	originalamount decimal(8,2) DEFAULT NULL,
	amount decimal(8,2) DEFAULT NULL,
	chequetype char(1) DEFAULT '1',
	bankofcheque varchar(500) NOT NULL,
	review varchar(500) NOT NULL,
	status char(1) DEFAULT 'A',
	createddate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id,chequeno)	
);

CREATE TABLE IF NOT EXISTS _purchaseinvoice
(	id int(11) NOT NULL AUTO_INCREMENT,
	invoiceid varchar(500) NOT NULL,
	invoicedate date,
	description varchar(500) NOT NULL,
	receiptnumbers varchar(500) NOT NULL,
	overduedate date,
	amount decimal(8,2) DEFAULT NULL,
	paymenttype char(1) DEFAULT '2',
	status char(1) DEFAULT '1',
	createddate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id,invoiceid)	
);

CREATE TABLE IF NOT EXISTS _purchaseinvoicecheque
(
	id int(11) NOT NULL AUTO_INCREMENT,
	invoiceid varchar(500) NOT NULL,
	chequeno varchar(10) NOT NULL,
	chequedate date,
	amount decimal(8,2) DEFAULT NULL,
	status char(1) DEFAULT 'A',
	createddate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id,chequeno)	
);