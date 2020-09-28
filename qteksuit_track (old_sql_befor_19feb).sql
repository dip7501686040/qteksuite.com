-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 05:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quteksuite`
--

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `statusid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `supplierid` int(11) NOT NULL,
  `seats` varchar(5) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `serial` text NOT NULL,
  `notes` text NOT NULL,
  `customfields` text NOT NULL,
  `qrvalue` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `licenseid` int(11) NOT NULL,
  `purchase_typeid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`id`, `clientid`, `statusid`, `categoryid`, `supplierid`, `seats`, `tag`, `name`, `serial`, `notes`, `customfields`, `qrvalue`, `type`, `licenseid`, `purchase_typeid`) VALUES
(1, 1, 2, 1, 1, '1', 'ITL-1', 'Windows 10 Pro', 'UC8wdXFmTllFTFI3V0U1cUhkZ29TQT09', '', 'a:0:{}', '', 'license', 1, 0),
(2, 1, 3, 1, 0, '5', 'ITL-2', 'Office Home & Business 2016', 'YkZ3TXlaaHZ4TjltOGhEZmU3Sm9Sdz12', '', '', '', 'license', 3, 0),
(3, 2, 3, 1, 3, '1', 'ITL-3', 'Windows Server 2012 R2 Essentials', 'YkZ3TXlaaHZ4TjltOGhEZmU3Sm9Sdz11', '', '', '', 'license', 4, 0),
(4, 2, 3, 3, 1, '', 'ITL-4', 'Corel Draw x5', 'YkZ3TXlaaHZ4TjltOGhEZmU3Sm9Sdz10', '', '', '', 'license', 3, 0),
(5, 2, 1, 1, 2, '3', 'ITL-5', 'Pratik', 'YkZ3TXlaaHZ4TjltOGhEZmU3Sm9Sdz09', '<p>This is test by pratik verma</p>', 'a:0:{}', '', 'license', 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
