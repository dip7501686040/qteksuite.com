-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 11, 2020 at 07:00 PM
-- Server version: 10.2.33-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qteksuit_track`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `secretkey` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `roleid`, `name`, `secretkey`) VALUES
(1, 4, 'QITCS', 'abjlPORIjeNScrnvYizMsnAUojQR9GErrq8agZgWHn5pspaZb2LS0u75Rh1rBIxH');

-- --------------------------------------------------------

--
-- Table structure for table `approvalcategories`
--

CREATE TABLE `approvalcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvalcategories`
--

INSERT INTO `approvalcategories` (`id`, `name`, `color`) VALUES
(1, 'approval1', '#2f6adb'),
(2, 'approval2', '#2f6adb');

-- --------------------------------------------------------

--
-- Table structure for table `assetcategories`
--

CREATE TABLE `assetcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assetcategories`
--

INSERT INTO `assetcategories` (`id`, `name`, `color`) VALUES
(1, 'Desktops', '#1e3fda'),
(2, 'Laptops', '#058e29'),
(3, 'Servers', '#ff0000'),
(4, 'Printers', '#99ac14'),
(5, 'Routers', '#0b7c36'),
(6, 'department3', '#f29cea');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `manufacturerid` int(11) NOT NULL,
  `modelid` int(11) NOT NULL,
  `supplierid` int(11) NOT NULL,
  `statusid` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `warranty_months` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `locationid` int(11) NOT NULL,
  `customfields` text NOT NULL,
  `qrvalue` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `file` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `categoryid`, `adminid`, `clientid`, `userid`, `manufacturerid`, `modelid`, `supplierid`, `statusid`, `purchase_date`, `warranty_months`, `tag`, `name`, `serial`, `notes`, `locationid`, `customfields`, `qrvalue`, `type`, `file`) VALUES
(1, 1, 0, 1, 0, 0, 4, 1, 3, '2016-02-01', 24, 'IT-1', 'Desktop 1', 'QWERT12345', '', 0, 'a:3:{i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}', '', 'assets', 'uploads/assets/Hydrangeas.jpg'),
(3, 2, 0, 2, 3, 0, 1, 3, 3, '2016-02-01', 24, 'IT-3', 'Laptop 1', 'BNMHJK98765', '', 0, '', '', 'assets', 'uploads/assets/Hydrangeas.jpg'),
(4, 2, 0, 3, 2, 9, 4, 1, 3, '2019-01-23', 36, 'LAP-0001', 'Lenovo Laptop', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '', 0, 'a:3:{i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}', '', 'assets', 'uploads/assets/Hydrangeas.jpg'),
(5, 3, 1, 1, 2, 5, 2, 3, 4, '2019-02-21', 1, 'IT-5', 'test', 'SADFASDFADS121212DFDF', '<p>TEST</p>', 1, 'a:3:{i:1;s:4:\"2222\";i:2;s:3:\"Inr\";i:3;s:4:\"1212\";}', '', 'assets', 'uploads/assets/Hydrangeas.jpg'),
(6, 3, 1, 2, 2, 4, 2, 2, 4, '2019-02-21', 2, 'IT-6', 'ASDFADSF', 'DFADSFAS23232', '<p>SDFASDASDF TEST</p>', 2, 'a:3:{i:1;s:3:\"212\";i:2;s:3:\"Inr\";i:3;s:2:\"22\";}', '', 'assets', 'uploads/assets/Hydrangeas.jpg'),
(7, 3, 1, 2, 3, 2, 2, 3, 1, '2019-02-21', 2, 'IT-7', 'NEW ASSETS', 'ASDFADF2323434SDFAS', 'Test for not', 2, 'a:3:{i:1;s:4:\"2000\";i:2;s:3:\"Inr\";i:3;s:4:\"2100\";}', '', 'assets', 'uploads/assets/Hydrangeas.jpg'),
(8, 6, 1, 2, 4, 5, 3, 2, 3, '2019-02-22', 4, 'IT-8', 'Check', 'ASFAS34343', '<p>tttt</p>', 2, 'a:3:{i:1;s:3:\"555\";i:2;s:3:\"Inr\";i:3;s:3:\"555\";}', '', 'assets', 'uploads/assets/Hydrangeas.jpg'),
(9, 1, 0, 6, 10, 2, 3, 1, 3, '2020-08-28', 7, 'IT-9', 'TecH', '', '', 0, 'a:3:{i:1;s:0:\"\";i:2;s:3:\"Inr\";i:3;s:0:\"\";}', '', 'assets', '/uploads/assets/'),
(10, 3, 0, 7, 10, 2, 3, 1, 3, '2020-08-27', 0, 'Dell2154785', 'TecH', 'Dell2154785', '', 0, 'a:3:{i:1;s:7:\"2520000\";i:2;s:3:\"Inr\";i:3;s:0:\"\";}', '', 'assets', '0');

-- --------------------------------------------------------

--
-- Table structure for table `assetsallocate`
--

CREATE TABLE `assetsallocate` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `checkout_date` datetime NOT NULL,
  `checkin_date` datetime NOT NULL,
  `notes` varchar(255) NOT NULL,
  `manufacturer` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assetsallocate`
--

INSERT INTO `assetsallocate` (`id`, `userid`, `checkout_date`, `checkin_date`, `notes`, `manufacturer`, `file`) VALUES
(1, 3, '2019-02-07 00:00:00', '2019-02-08 00:00:00', 'Test', 1, 'uploads/assetsallocate/Hydrangeas.jpg'),
(3, 3, '2019-02-09 00:00:00', '2019-02-09 00:00:00', 'Test again by pratik', 2, 'uploads/assetsallocate/Hydrangeas.jpg'),
(4, 3, '2019-02-21 00:00:00', '2019-02-20 00:00:00', '<p>dfasdfdasf test</p>', 2, 'uploads/assetsallocate/Hydrangeas.jpg'),
(5, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '<p>dsfads</p>', 4, 'uploads/assetsallocate/Hydrangeas.jpg'),
(6, 2, '2019-02-23 00:00:00', '2019-02-23 00:00:00', '<p>dsfasfdasf</p>', 5, 'uploads/assetsallocate/Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `assetsreturn`
--

CREATE TABLE `assetsreturn` (
  `id` int(11) NOT NULL,
  `assets_number` int(11) NOT NULL,
  `assets_category` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `department` int(11) NOT NULL,
  `project_name` int(11) NOT NULL,
  `manager_name` int(11) NOT NULL,
  `approval_name` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `checkin_date` datetime NOT NULL,
  `checkout_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assetsreturn`
--

INSERT INTO `assetsreturn` (`id`, `assets_number`, `assets_category`, `employee_name`, `department`, `project_name`, `manager_name`, `approval_name`, `comments`, `checkin_date`, `checkout_date`, `status`, `file`) VALUES
(1, 1, 1, '4', 1, 1, 1, 1, 'Comments edit by pratik.', '2019-02-10 00:00:00', '2019-02-16 00:00:00', 1, 'uploads/assetsreturn/Penguins.jpg'),
(4, 3, 2, '3', 1, 1, 1, 1, 'Test comments', '2019-02-21 00:00:00', '2019-02-22 00:00:00', 3, 'uploads/assetsreturn/Penguins.jpg'),
(5, 4, 2, '3', 1, 1, 1, 2, 'test by return', '2019-02-18 00:00:00', '2019-02-21 00:00:00', 1, 'uploads/assetsreturn/Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `assets_customfields`
--

CREATE TABLE `assets_customfields` (
  `id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `options` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets_customfields`
--

INSERT INTO `assets_customfields` (`id`, `type`, `name`, `description`, `options`) VALUES
(1, 'Text Box', 'Price', '', ''),
(2, 'Dropdown', 'Price', '', 'Inr,USD,DNR,'),
(3, 'Text Box', 'Purchase Cost', 'Cost', 'Inr,USD,DNR,');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `asset_tag_prefix` varchar(255) NOT NULL,
  `license_tag_prefix` varchar(255) NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `asset_tag_prefix`, `license_tag_prefix`, `notes`) VALUES
(1, 'Client Inc.', 'IT-', 'ITL-', ''),
(2, 'Client 2 Inc.', 'IT-', 'ITL-', ''),
(3, 'QITCS', 'IT-', 'ITL-', ''),
(4, 'Soulpro', 'IT-', 'ITL-', ''),
(5, 'Tam', 'IT-', 'ITL-', ''),
(7, 'DEMO', 'QCS-DEMO-', 'QCS-DEMO-SW-', '');

-- --------------------------------------------------------

--
-- Table structure for table `clients_admins`
--

CREATE TABLE `clients_admins` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients_admins`
--

INSERT INTO `clients_admins` (`id`, `adminid`, `clientid`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`) VALUES
(1, 'Art Advanced Research Technologies Inc'),
(2, 'Aryt Industries Ltd'),
(3, 'ASAT Holdings Ltd'),
(4, 'ASE Test Ltd'),
(5, 'ABC Test'),
(6, '5');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `consumables_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `manufacture` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  `model_no` varchar(50) NOT NULL,
  `item_no` varchar(50) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_cost` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `quanitity` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `statusid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `company_name`, `consumables_name`, `category`, `manufacture`, `location`, `model_no`, `item_no`, `order_no`, `purchase_date`, `purchase_cost`, `currency`, `quanitity`, `image`, `statusid`) VALUES
(5, '2', 'asdfas', '3', '1', 'asdf', '4', 'asdf', '11', '2019-02-09', 'asdf', '4', '3', 'uploads/components/Koala.png', 3),
(6, '2', 'Consumable name', '3', '2', 'Madhya Pradesh', '2', '2', '1', '2019-02-21', '200', '1', '2', 'uploads/components/Chrysanthemum.jpg', 1),
(7, '2', 'dsfdas', '4', '2', 'sadfadsf', '2', 'dsfasdf', 'asdfa', '2019-02-06', 'sadf', '3', '3', 'uploads/components/Chrysanthemum.jpg', 6),
(8, '3', 'xcvxc', '2', '3', 'sdfasd', '1', 'sdf', '2', '2019-02-21', '33', '2', '3', 'uploads/components/Chrysanthemum.jpg', 1),
(9, '1', 'dsfasd', '4', '2', 'asd', '2', 'sdf', '3', '2019-02-14', '44', '1', '2', 'uploads/components/Chrysanthemum.jpg', 4),
(10, '3', 'dsaf', '4', '3', 'asfasd', '2', '2', '3', '2019-02-21', '333', '2', '3', 'uploads/components/Chrysanthemum.jpg', 3),
(11, '2', 'dsfs', '3', '2', 'dsfa', '2', '11', '4', '2019-02-21', '44', '3', '1', 'uploads/components/Chrysanthemum.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`name`, `value`) VALUES
('email_from_address', 'qsuite@qtekit.com'),
('email_from_name', 'QTEK SUITE'),
('email_smtp_enable', 'true'),
('email_smtp_host', 'mail.qtekit.com'),
('email_smtp_port', '587'),
('email_smtp_username', 'qsuite@qtekit.com'),
('email_smtp_password', 'skhH@76818'),
('email_smtp_security', 'SSL'),
('email_smtp_domain', ''),
('email_smtp_auth', 'true'),
('week_start', '1'),
('log_retention', '365'),
('tickets_encrypton', ''),
('tickets_password', ''),
('tickets_username', ''),
('tickets_server', ''),
('license_tag_prefix', 'ITL-'),
('asset_tag_prefix', 'IT-'),
('company_details', ''),
('company_name', 'QTEK IT'),
('tickets_notification', 'false'),
('sms_provider', 'clickatell'),
('sms_user', ''),
('sms_password', ''),
('sms_api_id', ''),
('sms_from', ''),
('app_name', '<b>QTEK</b> SUITE'),
('app_url', 'https://www.qteksuite.com'),
('table_records', '50'),
('db_version', '1.16'),
('project_tag_prefix', 'P-'),
('password_generator_length', '8'),
('default_lang', 'en'),
('auto_close_tickets', '0'),
('timezone', 'Asia/Kolkata'),
('auto_close_tickets_notify', 'false'),
('tickets_defaultdepartment', '0'),
('date_format', 'Y-m-d;yyyy-mm-dd'),
('tickets_publicform', 'false'),
('recaptcha', 'false'),
('recaptcha_sitekey', ''),
('recaptcha_secretkey', ''),
('tickets_publictext', ''),
('label_width', '70'),
('label_height', '60'),
('label_qrsize', '1.3'),
('ldap_enable', 'false'),
('ldap_host', ''),
('ldap_port', '389'),
('ldap_dn', ''),
('manual_qrvalue', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `consumables`
--

CREATE TABLE `consumables` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `consumables_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `manufacture` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  `model_no` varchar(50) NOT NULL,
  `item_no` varchar(50) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_cost` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `quanitity` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `statusid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumables`
--

INSERT INTO `consumables` (`id`, `company_name`, `consumables_name`, `category`, `manufacture`, `location`, `model_no`, `item_no`, `order_no`, `purchase_date`, `purchase_cost`, `currency`, `quanitity`, `image`, `statusid`) VALUES
(1, '4', 'Pratik Verma', '1', '1', 'Dhar', '2', '20', '3', '2019-02-06', '2000', '5', '5', 'D:\\xampp\\htdocs\\qteksuit\\uploads\\consumablesFortuner.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `webaddress` text NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `assetid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`) VALUES
(1, 'Dollar'),
(2, 'Dinar'),
(3, 'Dirham'),
(4, 'Euro'),
(5, 'Pound'),
(6, 'Peso'),
(7, 'Rupee'),
(8, 'Rupiah'),
(9, 'Yen'),
(10, 'Yuan');

-- --------------------------------------------------------

--
-- Table structure for table `departmentcategories`
--

CREATE TABLE `departmentcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmentcategories`
--

INSERT INTO `departmentcategories` (`id`, `name`, `color`) VALUES
(1, 'department1', '#2f6adb'),
(2, 'department2', '#2f6adb');

-- --------------------------------------------------------

--
-- Table structure for table `emaillog`
--

CREATE TABLE `emaillog` (
  `id` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `to` varchar(128) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emaillog`
--

INSERT INTO `emaillog` (`id`, `peopleid`, `clientid`, `to`, `subject`, `message`, `timestamp`) VALUES
(1, 2, 3, 'shaikhameed.hassain@gmail.com', 'New User', '<p>Hello hameed,<br><br>Your account has been successfully created.</p><p><br>Email Address: shaikhameed.hassain@gmail.com<br>Password: skhH@76818<br>https://www.qteksuite.com<br><br>Best regards,<br>QTEK SUITE<br></p>', '2019-01-23 16:59:55'),
(2, 8, 4, 'info@qtekit.com', 'New User', '<p>Hello Shaik Hameed,<br><br>Your account has been successfully created.</p><p><br>Email Address: info@qtekit.com<br>Password: H@meed2t<br>https://www.qteksuite.com<br><br>Best regards,<br>QTEK IT<br></p>', '2019-07-07 11:01:50'),
(3, 9, 5, 'hameed.hassain@outlook.com', 'New User', '<p>Hello itteam,<br><br>Your account has been successfully created.</p><p><br>Email Address: hameed.hassain@outlook.com<br>Password: skhH@76818<br>https://www.qteksuite.com<br><br>Best regards,<br>QTEK IT<br></p>', '2019-08-10 07:27:48'),
(4, 10, 6, 'hameed.shaik@qtekit.com', 'New User', '<p>Hello Hameed,<br><br>Your account has been successfully created.</p><p><br>Email Address: hameed.shaik@qtekit.com<br>Password: skhH@76818<br>https://www.qteksuite.com<br><br>Best regards,<br>QTEK IT<br></p>', '2020-08-29 15:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `assetid` int(11) NOT NULL,
  `ticketreplyid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

CREATE TABLE `hosts` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosts`
--

INSERT INTO `hosts` (`id`, `clientid`, `name`, `address`, `status`) VALUES
(1, 1, 'Google', 'www.google.com', ''),
(2, 2, 'DC Server', '10.0.0.25', ''),
(3, 2, 'Router', '10.0.0.1', ''),
(5, 3, 'Masthan', '192.168.43.133', ''),
(6, 3, 'qtekit.com', '45.64.104.167', '');

-- --------------------------------------------------------

--
-- Table structure for table `hosts_checks`
--

CREATE TABLE `hosts_checks` (
  `id` int(11) NOT NULL,
  `hostid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(60) NOT NULL,
  `port` varchar(60) NOT NULL,
  `monitoring` int(1) NOT NULL,
  `email` int(1) NOT NULL,
  `sms` int(1) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosts_checks`
--

INSERT INTO `hosts_checks` (`id`, `hostid`, `name`, `type`, `port`, `monitoring`, `email`, `sms`, `status`) VALUES
(1, 1, 'HTTP', 'Service', '80', 1, 1, 1, ''),
(2, 3, 'HTTP admin', 'Service', '80', 1, 1, 0, ''),
(3, 2, 'MySQL Database', 'Service', '3306', 1, 1, 1, ''),
(5, 6, 'qtekit.com', 'Service', '80', 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `hosts_history`
--

CREATE TABLE `hosts_history` (
  `id` int(11) NOT NULL,
  `checkid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `latency` varchar(10) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hosts_people`
--

CREATE TABLE `hosts_people` (
  `id` int(11) NOT NULL,
  `hostid` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosts_people`
--

INSERT INTO `hosts_people` (`id`, `hostid`, `peopleid`) VALUES
(1, 5, 2),
(2, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `assetid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `milestoneid` int(11) NOT NULL,
  `issuetype` varchar(15) NOT NULL,
  `priority` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 NOT NULL,
  `duedate` varchar(20) NOT NULL,
  `timespent` int(10) NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `clientid`, `assetid`, `projectid`, `adminid`, `milestoneid`, `issuetype`, `priority`, `status`, `name`, `description`, `duedate`, `timespent`, `dateadded`) VALUES
(1, 2, 2, 0, 0, 0, 'Task', 'High', 'To Do', 'Configure Active Directory', '', '', 180, '2016-02-03 00:00:00'),
(2, 2, 2, 0, 0, 0, 'Task', 'Low', 'In Progress', 'Reconfigure DNS server', '', '2016-03-27', 25, '2016-02-01 00:00:00'),
(3, 1, 1, 0, 0, 0, 'Task', 'Normal', 'Done', 'Install Office Suite', '', '2016-08-03', 45, '2016-02-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kb_articles`
--

CREATE TABLE `kb_articles` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `clients` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kb_articles`
--

INSERT INTO `kb_articles` (`id`, `categoryid`, `clients`, `name`, `content`) VALUES
(1, 1, 'a:1:{i:0;s:1:\"0\";}', 'Test Article', '<p>Article body.<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `kb_categories`
--

CREATE TABLE `kb_categories` (
  `id` int(11) NOT NULL,
  `clients` text NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kb_categories`
--

INSERT INTO `kb_categories` (`id`, `clients`, `name`) VALUES
(1, 'a:1:{i:0;s:1:\"0\";}', 'Test Category');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `name`, `color`) VALUES
(1, 'Requested', '#1ecbbd'),
(2, 'Pending', '#1ccd2b'),
(3, 'Deployed', '#3479da'),
(4, 'Archived', '#959d1c'),
(5, 'In Repair', '#da2727'),
(6, 'Broken', '#776e6e'),
(7, 'Repair', '#37ba72'),
(8, 'Disposal', '#1ecb77');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`) VALUES
(1, 'en', 'English (System)');

-- --------------------------------------------------------

--
-- Table structure for table `licensecategories`
--

CREATE TABLE `licensecategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licensecategories`
--

INSERT INTO `licensecategories` (`id`, `name`, `color`) VALUES
(1, 'Operating Systems', '#355ea7'),
(2, 'Office Suite', '#e4d811'),
(3, 'Graphics Editor', '#c62121'),
(4, 'Other', '#370b0b');

-- --------------------------------------------------------

--
-- Table structure for table `licensereturn`
--

CREATE TABLE `licensereturn` (
  `id` int(11) NOT NULL,
  `license_number` varchar(11) NOT NULL,
  `license_category` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `department` int(11) NOT NULL,
  `project_name` int(11) NOT NULL,
  `manager_name` int(11) NOT NULL,
  `approval_name` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `checkin_date` datetime NOT NULL,
  `checkout_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `licensereturn`
--

INSERT INTO `licensereturn` (`id`, `license_number`, `license_category`, `employee_name`, `department`, `project_name`, `manager_name`, `approval_name`, `comments`, `checkin_date`, `checkout_date`, `status`) VALUES
(1, '1', 1, '4', 1, 1, 1, 1, 'Comments edit by pratik.', '2019-02-11 00:00:00', '2019-02-16 00:00:00', 1),
(4, '1', 1, '2', 1, 1, 1, 1, 'Test', '2019-02-21 00:00:00', '2019-02-22 00:00:00', 1);

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
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`id`, `clientid`, `statusid`, `categoryid`, `supplierid`, `seats`, `tag`, `name`, `serial`, `notes`, `customfields`, `qrvalue`, `type`) VALUES
(1, 1, 2, 1, 1, '1', 'ITL-1', 'Windows 10 Pro', 'UC8wdXFmTllFTFI3V0U1cUhkZ29TQT09', '', 'a:0:{}', '', 'license'),
(2, 1, 3, 1, 0, '5', 'ITL-2', 'Office Home & Business 2016', 'YkZ3TXlaaHZ4TjltOGhEZmU3Sm9Sdz12', '', '', '', 'license'),
(3, 2, 3, 1, 3, '1', 'ITL-3', 'Windows Server 2012 R2 Essentials', 'YkZ3TXlaaHZ4TjltOGhEZmU3Sm9Sdz11', '', '', '', 'license'),
(4, 2, 3, 3, 1, '', 'ITL-4', 'Corel Draw x5', 'YkZ3TXlaaHZ4TjltOGhEZmU3Sm9Sdz10', '', '', '', 'license'),
(5, 2, 1, 1, 2, '3', 'ITL-5', 'Pratik', 'YkZ3TXlaaHZ4TjltOGhEZmU3Sm9Sdz09', '<p>This is test by pratik verma</p>', 'a:0:{}', '', 'license');

-- --------------------------------------------------------

--
-- Table structure for table `licensesallocate`
--

CREATE TABLE `licensesallocate` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `checkout_date` datetime NOT NULL,
  `checkin_date` datetime NOT NULL,
  `notes` varchar(255) NOT NULL,
  `manufacturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `licensesallocate`
--

INSERT INTO `licensesallocate` (`id`, `userid`, `checkout_date`, `checkin_date`, `notes`, `manufacturer`) VALUES
(1, 2, '2019-02-07 00:00:00', '2019-02-08 00:00:00', '  Test', 1),
(3, 3, '2019-02-09 00:00:00', '2019-02-09 00:00:00', 'Test again by pratik', 2),
(4, 2, '2019-02-09 00:00:00', '2019-02-09 00:00:00', 'Hello licenses allocate', 3),
(5, 2, '2020-08-25 00:00:00', '2020-12-31 00:00:00', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `licenses_assets`
--

CREATE TABLE `licenses_assets` (
  `id` int(11) NOT NULL,
  `licenseid` int(11) NOT NULL,
  `assetid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licenses_assets`
--

INSERT INTO `licenses_assets` (`id`, `licenseid`, `assetid`) VALUES
(1, 3, 1),
(2, 2, 1),
(5, 1, 3),
(4, 2, 10),
(6, 1, 3),
(7, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `licenses_customfields`
--

CREATE TABLE `licenses_customfields` (
  `id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `options` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `clientid`, `name`) VALUES
(1, 1, 'Test Location'),
(2, 2, 'Test Location');

-- --------------------------------------------------------

--
-- Table structure for table `managercategories`
--

CREATE TABLE `managercategories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managercategories`
--

INSERT INTO `managercategories` (`id`, `name`, `color`) VALUES
(1, 'manager', '#2f6adb'),
(2, 'manager2', '#2f6adb');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'Dell'),
(3, 'Microsoft'),
(4, 'HP'),
(5, 'Samsung'),
(6, 'ASUS'),
(7, 'Canon'),
(8, 'Cisco'),
(9, 'Lenovo'),
(10, 'Acer'),
(11, 'Epson');

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duedate` varchar(20) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`) VALUES
(1, 'MacBook Pro'),
(2, 'MacBook Air'),
(3, 'PowerEdge R220'),
(4, 'Optiplex 3020 MT');

-- --------------------------------------------------------

--
-- Table structure for table `notificationtemplates`
--

CREATE TABLE `notificationtemplates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 NOT NULL,
  `info` text NOT NULL,
  `sms` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notificationtemplates`
--

INSERT INTO `notificationtemplates` (`id`, `name`, `subject`, `message`, `info`, `sms`) VALUES
(1, 'New Ticket', 'Ticket #{ticketid} created', '<p>Hello {contact},<br><br>A new ticket has been created for your request.<br>Ticket ID:<b> #{ticketid}</b><br><br>{message}<br><br>You can reply to this email to add additional information.<br>Please do not remove the ticket number from the subject line.<br><br>Best regards,<br>{company}</p>', '{ticketid}, {status}, {subject}, {contact}, {message}, {company}, {appurl}, {client}, {department}', ''),
(2, 'New Ticket Reply', '#{ticketid} New Reply', '<p>Hello {contact},<br><br>A new reply has been added to your ticket.<br><br>Ticket ID: #{ticketid}<br><br>{message}<br><br>You can reply to this email to add additional information.<br>Please do not remove the ticket number from the subject line.<br><br>Best regards,<br>{company}<br></p>', '{ticketid}, {status}, {subject}, {contact}, {message}, {company}, {appurl}, {client}, {department}', ''),
(3, 'New User', 'New User', '<p>Hello {contact},<br><br>Your account has been successfully created.</p><p><br>Email Address: {email}<br>Password: {password}<br>{appurl}<br><br>Best regards,<br>{company}<br></p>', '{contact}, {email}, {password}, {company}, {appurl}', ''),
(5, 'Password Reset', 'Password Reset', '<p>Hello {contact},<br><br>Please follow the link below to reset your password.<br>{resetlink}<br><br>Best regards,<br>{company}<br></p>', '{contact}, {resetlink}, {company}, {appurl}', ''),
(6, 'Monitoring Notification', '{hostinfo} is now {status}', '<p>{hostinfo} status has changed to {status}.<br><br>Best regards,<br>{company}<br></p>', '{hostinfo}, {status}, {contact}, {company}', '{hostinfo} is now {status}'),
(7, 'New Ticket (Admin)', 'New Support Ticket #{ticketid}', '<p>A new support ticket has been opened.</p>\r\n<p>Ticket ID:<b> #{ticketid}</b><br>Subject: {subject}</p>\r\n<p><br>{message}</p><br>\r\n<p>Best regards,<br>{company}</p>', '{ticketid}, {status}, {subject}, {contact}, {message}, {company}, {appurl}, {client}, {department}', ''),
(8, 'New Ticket Reply (Admin)', 'New Reply to Ticket #{ticketid}', '<p>A new reply has been added to ticket #{ticketid}.<br>Subject: {subject}<br></p><p><br>{message}<br></p><p><br>Best regards,<br>{company}<br></p><p><br></p><p></p>', '{ticketid}, {status}, {subject}, {contact}, {message}, {company}, {appurl}, {client}, {department}', ''),
(9, 'Ticket Escalation (Admin)', 'Escalation Rule Processed #{ticketid}', '<p>Escalation rule processed for ticket #{ticketid}.<br>Subject: {subject}<br></p><p><br>{message}<br></p><p><br>Best regards,<br>{company}<br></p><p><br></p><p></p>', '{ticketid}, {status}, {subject}, {contact}, {message}, {company}, {appurl}, {client}, {department}', ''),
(10, 'Ticket Auto Close (User)', 'Support Ticket #{ticketid} Auto Closed', '<p>This is a notification to let you know that we are changing the status of your ticket #{ticketid}  to Closed as we have not received a response from you lately.<br></p><p><br>Ticket Subject: {subject}<br></p><p><br>Best regards,<br>{company}<br></p><p><br></p><p></p>', '{ticketid}, {status}, {subject}, {contact}, {message}, {company}, {appurl}, {client}, {department}', '');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `roleid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `ldap_user` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `theme` varchar(64) NOT NULL,
  `sidebar` varchar(64) NOT NULL,
  `layout` varchar(64) NOT NULL,
  `notes` text NOT NULL,
  `signature` text NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `resetkey` varchar(255) NOT NULL,
  `autorefresh` int(11) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `ticketsnotification` int(1) NOT NULL,
  `avatar` mediumblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `type`, `roleid`, `clientid`, `name`, `email`, `ldap_user`, `title`, `mobile`, `password`, `theme`, `sidebar`, `layout`, `notes`, `signature`, `sessionid`, `resetkey`, `autorefresh`, `lang`, `ticketsnotification`, `avatar`) VALUES
(1, 'admin', 1, 0, 'admin', 'qsuite@qtekit.com', '', '', '', '4a45cefba43fb7c1a61c38865ea8a7b52df109a8', 'skin-blue', 'opened', '', '', '', '0f29616916q9vrft1nle790d92', '', 0, 'en', 1, ''),
(2, 'user', 2, 3, 'hameed', 'shaikhameed.hassain@gmail.com', '', 'System Admin', '9985495995', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(3, 'user', 2, 3, 'Pratik', 'pratik@gmail.com', '', 'PHP', '9826969247', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(4, 'user', 2, 3, 'Harish', 'harish@gmail.com', '', 'PHP', '9826969248', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(7, '', 0, 0, '3', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, ''),
(8, 'user', 2, 4, 'Shaik Hameed', 'info@qtekit.com', '', 'IT', '9985495995', '000e23d3956d76a49f85c8ac098eec6093e4aaea', 'skin-blue', 'opened', '', '', '', 'ocr7ctg37ulu6niogne6plob61', '', 0, 'en', 0, ''),
(9, 'user', 2, 5, 'itteam', 'hameed.hassain@outlook.com', '', 'it admin', '9985495995', '4a45cefba43fb7c1a61c38865ea8a7b52df109a8', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, ''),
(10, 'user', 2, 7, 'Hameed', 'hameed.shaik@qtekit.com', '', 'Manager', '9985495995', '4a45cefba43fb7c1a61c38865ea8a7b52df109a8', 'skin-blue', 'opened', '', '', '', '', '', 0, 'en', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 NOT NULL,
  `description` text NOT NULL,
  `startdate` varchar(20) NOT NULL,
  `deadline` varchar(20) NOT NULL,
  `progress` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `clientid`, `tag`, `name`, `notes`, `description`, `startdate`, `deadline`, `progress`) VALUES
(1, 1, 'P-1', 'Test Project', '<p></p>', '', '', '', 70);

-- --------------------------------------------------------

--
-- Table structure for table `projects_admins`
--

CREATE TABLE `projects_admins` (
  `id` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects_admins`
--

INSERT INTO `projects_admins` (`id`, `projectid`, `adminid`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `perms` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `name`, `perms`) VALUES
(1, 'admin', 'Super Administrator', 'a:144:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:12:\"addMilestone\";i:26;s:13:\"editMilestone\";i:27;s:15:\"deleteMilestone\";i:28;s:16:\"releaseMilestone\";i:29;s:14:\"viewMilestones\";i:30;s:7:\"addTime\";i:31;s:8:\"editTime\";i:32;s:10:\"deleteTime\";i:33;s:8:\"viewTime\";i:34;s:9:\"addTicket\";i:35;s:10:\"editTicket\";i:36;s:12:\"deleteTicket\";i:37;s:12:\"manageTicket\";i:38;s:17:\"manageTicketRules\";i:39;s:17:\"manageTicketNotes\";i:40;s:22:\"manageTicketAssignment\";i:41;s:11:\"viewTickets\";i:42;s:8:\"addIssue\";i:43;s:9:\"editIssue\";i:44;s:11:\"deleteIssue\";i:45;s:11:\"manageIssue\";i:46;s:10:\"viewIssues\";i:47;s:10:\"addComment\";i:48;s:11:\"editComment\";i:49;s:13:\"deleteComment\";i:50;s:13:\"assignComment\";i:51;s:12:\"viewComments\";i:52;s:13:\"addCredential\";i:53;s:14:\"editCredential\";i:54;s:16:\"deleteCredential\";i:55;s:14:\"viewCredential\";i:56;s:15:\"viewCredentials\";i:57;s:5:\"addKB\";i:58;s:6:\"editKB\";i:59;s:8:\"deleteKB\";i:60;s:6:\"viewKB\";i:61;s:9:\"addPReply\";i:62;s:10:\"editPReply\";i:63;s:12:\"deletePReply\";i:64;s:12:\"viewPReplies\";i:65;s:10:\"uploadFile\";i:66;s:12:\"downloadFile\";i:67;s:10:\"deleteFile\";i:68;s:9:\"viewFiles\";i:69;s:7:\"addHost\";i:70;s:8:\"editHost\";i:71;s:10:\"deleteHost\";i:72;s:10:\"manageHost\";i:73;s:14:\"viewMonitoring\";i:74;s:7:\"addUser\";i:75;s:8:\"editUser\";i:76;s:10:\"deleteUser\";i:77;s:9:\"viewUsers\";i:78;s:8:\"addStaff\";i:79;s:9:\"editStaff\";i:80;s:11:\"deleteStaff\";i:81;s:9:\"viewStaff\";i:82;s:7:\"addRole\";i:83;s:8:\"editRole\";i:84;s:10:\"deleteRole\";i:85;s:9:\"viewRoles\";i:86;s:10:\"addContact\";i:87;s:11:\"editContact\";i:88;s:13:\"deleteContact\";i:89;s:12:\"viewContacts\";i:90;s:14:\"addCustomField\";i:91;s:15:\"editCustomField\";i:92;s:17:\"deleteCustomField\";i:93;s:16:\"viewCustomFields\";i:94;s:10:\"manageData\";i:95;s:14:\"manageSettings\";i:96;s:13:\"manageApiKeys\";i:97;s:8:\"viewLogs\";i:98;s:10:\"viewSystem\";i:99;s:10:\"viewPeople\";i:100;s:11:\"viewReports\";i:101;s:11:\"autorefresh\";i:102;s:6:\"search\";i:103;s:13:\"addComponents\";i:104;s:14:\"editComponents\";i:105;s:16:\"deleteComponents\";i:106;s:16:\"manageComponents\";i:107;s:14:\"viewComponents\";i:108;s:14:\"addConsumables\";i:109;s:15:\"editConsumables\";i:110;s:17:\"deleteConsumables\";i:111;s:17:\"manageConsumables\";i:112;s:15:\"viewConsumables\";i:113;s:7:\"viewSam\";i:114;s:6:\"addSam\";i:115;s:7:\"editSam\";i:116;s:9:\"deleteSam\";i:117;s:9:\"manageSam\";i:118;s:18:\"viewAssetsallocate\";i:119;s:17:\"addAssetsallocate\";i:120;s:18:\"editAssetsallocate\";i:121;s:20:\"deleteAssetsallocate\";i:122;s:20:\"manageAssetsallocate\";i:123;s:20:\"viewLicensesallocate\";i:124;s:19:\"addLicensesallocate\";i:125;s:20:\"editLicensesallocate\";i:126;s:22:\"deleteLicensesallocate\";i:127;s:22:\"manageLicensesallocate\";i:128;s:10:\"viewMaster\";i:129;s:9:\"addMaster\";i:130;s:10:\"editMaster\";i:131;s:12:\"deleteMaster\";i:132;s:12:\"manageMaster\";i:133;s:16:\"viewAssetsreturn\";i:134;s:15:\"addAssetsreturn\";i:135;s:16:\"editAssetsreturn\";i:136;s:18:\"deleteAssetsreturn\";i:137;s:18:\"manageAssetsreturn\";i:138;s:17:\"viewLicensereturn\";i:139;s:16:\"addLicensereturn\";i:140;s:17:\"editLicensereturn\";i:141;s:19:\"deleteLicensereturn\";i:142;s:19:\"manageLicensereturn\";i:143;s:4:\"Null\";}'),
(2, 'user', 'Standard User', 'a:118:{i:0;s:8:\"addAsset\";i:1;s:9:\"editAsset\";i:2;s:11:\"deleteAsset\";i:3;s:11:\"manageAsset\";i:4;s:12:\"licenseAsset\";i:5;s:10:\"viewAssets\";i:6;s:10:\"addLicense\";i:7;s:11:\"editLicense\";i:8;s:13:\"deleteLicense\";i:9;s:13:\"manageLicense\";i:10;s:12:\"assetLicense\";i:11;s:12:\"viewLicenses\";i:12;s:10:\"addProject\";i:13;s:11:\"editProject\";i:14;s:13:\"deleteProject\";i:15;s:13:\"manageProject\";i:16;s:18:\"manageProjectNotes\";i:17;s:13:\"adminsProject\";i:18;s:12:\"viewProjects\";i:19;s:12:\"addMilestone\";i:20;s:13:\"editMilestone\";i:21;s:15:\"deleteMilestone\";i:22;s:16:\"releaseMilestone\";i:23;s:14:\"viewMilestones\";i:24;s:7:\"addTime\";i:25;s:8:\"editTime\";i:26;s:10:\"deleteTime\";i:27;s:8:\"viewTime\";i:28;s:9:\"addTicket\";i:29;s:10:\"editTicket\";i:30;s:12:\"deleteTicket\";i:31;s:12:\"manageTicket\";i:32;s:17:\"manageTicketRules\";i:33;s:17:\"manageTicketNotes\";i:34;s:22:\"manageTicketAssignment\";i:35;s:11:\"viewTickets\";i:36;s:8:\"addIssue\";i:37;s:9:\"editIssue\";i:38;s:11:\"deleteIssue\";i:39;s:11:\"manageIssue\";i:40;s:10:\"viewIssues\";i:41;s:10:\"addComment\";i:42;s:11:\"editComment\";i:43;s:13:\"deleteComment\";i:44;s:13:\"assignComment\";i:45;s:12:\"viewComments\";i:46;s:13:\"addCredential\";i:47;s:14:\"editCredential\";i:48;s:16:\"deleteCredential\";i:49;s:14:\"viewCredential\";i:50;s:15:\"viewCredentials\";i:51;s:5:\"addKB\";i:52;s:6:\"editKB\";i:53;s:8:\"deleteKB\";i:54;s:6:\"viewKB\";i:55;s:9:\"addPReply\";i:56;s:10:\"editPReply\";i:57;s:12:\"deletePReply\";i:58;s:12:\"viewPReplies\";i:59;s:10:\"uploadFile\";i:60;s:12:\"downloadFile\";i:61;s:10:\"deleteFile\";i:62;s:9:\"viewFiles\";i:63;s:7:\"addHost\";i:64;s:8:\"editHost\";i:65;s:10:\"deleteHost\";i:66;s:10:\"manageHost\";i:67;s:14:\"viewMonitoring\";i:68;s:9:\"viewUsers\";i:69;s:14:\"addCustomField\";i:70;s:15:\"editCustomField\";i:71;s:17:\"deleteCustomField\";i:72;s:16:\"viewCustomFields\";i:73;s:10:\"manageData\";i:74;s:14:\"manageSettings\";i:75;s:13:\"manageApiKeys\";i:76;s:8:\"viewLogs\";i:77;s:10:\"viewSystem\";i:78;s:11:\"viewReports\";i:79;s:11:\"autorefresh\";i:80;s:6:\"search\";i:81;s:13:\"addComponents\";i:82;s:14:\"editComponents\";i:83;s:16:\"deleteComponents\";i:84;s:16:\"manageComponents\";i:85;s:14:\"viewComponents\";i:86;s:14:\"addConsumables\";i:87;s:15:\"editConsumables\";i:88;s:17:\"deleteConsumables\";i:89;s:17:\"manageConsumables\";i:90;s:15:\"viewConsumables\";i:91;s:7:\"viewSam\";i:92;s:6:\"addSam\";i:93;s:7:\"editSam\";i:94;s:9:\"deleteSam\";i:95;s:9:\"manageSam\";i:96;s:18:\"viewAssetsallocate\";i:97;s:17:\"addAssetsallocate\";i:98;s:18:\"editAssetsallocate\";i:99;s:20:\"deleteAssetsallocate\";i:100;s:20:\"manageAssetsallocate\";i:101;s:20:\"viewLicensesallocate\";i:102;s:19:\"addLicensesallocate\";i:103;s:20:\"editLicensesallocate\";i:104;s:22:\"deleteLicensesallocate\";i:105;s:22:\"manageLicensesallocate\";i:106;s:10:\"viewMaster\";i:107;s:16:\"viewAssetsreturn\";i:108;s:15:\"addAssetsreturn\";i:109;s:16:\"editAssetsreturn\";i:110;s:18:\"deleteAssetsreturn\";i:111;s:18:\"manageAssetsreturn\";i:112;s:17:\"viewLicensereturn\";i:113;s:16:\"addLicensereturn\";i:114;s:17:\"editLicensereturn\";i:115;s:19:\"deleteLicensereturn\";i:116;s:19:\"manageLicensereturn\";i:117;s:4:\"Null\";}'),
(3, 'user', 'Administrator', 'a:144:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:12:\"addMilestone\";i:26;s:13:\"editMilestone\";i:27;s:15:\"deleteMilestone\";i:28;s:16:\"releaseMilestone\";i:29;s:14:\"viewMilestones\";i:30;s:7:\"addTime\";i:31;s:8:\"editTime\";i:32;s:10:\"deleteTime\";i:33;s:8:\"viewTime\";i:34;s:9:\"addTicket\";i:35;s:10:\"editTicket\";i:36;s:12:\"deleteTicket\";i:37;s:12:\"manageTicket\";i:38;s:17:\"manageTicketRules\";i:39;s:17:\"manageTicketNotes\";i:40;s:22:\"manageTicketAssignment\";i:41;s:11:\"viewTickets\";i:42;s:8:\"addIssue\";i:43;s:9:\"editIssue\";i:44;s:11:\"deleteIssue\";i:45;s:11:\"manageIssue\";i:46;s:10:\"viewIssues\";i:47;s:10:\"addComment\";i:48;s:11:\"editComment\";i:49;s:13:\"deleteComment\";i:50;s:13:\"assignComment\";i:51;s:12:\"viewComments\";i:52;s:13:\"addCredential\";i:53;s:14:\"editCredential\";i:54;s:16:\"deleteCredential\";i:55;s:14:\"viewCredential\";i:56;s:15:\"viewCredentials\";i:57;s:5:\"addKB\";i:58;s:6:\"editKB\";i:59;s:8:\"deleteKB\";i:60;s:6:\"viewKB\";i:61;s:9:\"addPReply\";i:62;s:10:\"editPReply\";i:63;s:12:\"deletePReply\";i:64;s:12:\"viewPReplies\";i:65;s:10:\"uploadFile\";i:66;s:12:\"downloadFile\";i:67;s:10:\"deleteFile\";i:68;s:9:\"viewFiles\";i:69;s:7:\"addHost\";i:70;s:8:\"editHost\";i:71;s:10:\"deleteHost\";i:72;s:10:\"manageHost\";i:73;s:14:\"viewMonitoring\";i:74;s:7:\"addUser\";i:75;s:8:\"editUser\";i:76;s:10:\"deleteUser\";i:77;s:9:\"viewUsers\";i:78;s:8:\"addStaff\";i:79;s:9:\"editStaff\";i:80;s:11:\"deleteStaff\";i:81;s:9:\"viewStaff\";i:82;s:7:\"addRole\";i:83;s:8:\"editRole\";i:84;s:10:\"deleteRole\";i:85;s:9:\"viewRoles\";i:86;s:10:\"addContact\";i:87;s:11:\"editContact\";i:88;s:13:\"deleteContact\";i:89;s:12:\"viewContacts\";i:90;s:14:\"addCustomField\";i:91;s:15:\"editCustomField\";i:92;s:17:\"deleteCustomField\";i:93;s:16:\"viewCustomFields\";i:94;s:10:\"manageData\";i:95;s:14:\"manageSettings\";i:96;s:13:\"manageApiKeys\";i:97;s:8:\"viewLogs\";i:98;s:10:\"viewSystem\";i:99;s:10:\"viewPeople\";i:100;s:11:\"viewReports\";i:101;s:11:\"autorefresh\";i:102;s:6:\"search\";i:103;s:13:\"addComponents\";i:104;s:14:\"editComponents\";i:105;s:16:\"deleteComponents\";i:106;s:16:\"manageComponents\";i:107;s:14:\"viewComponents\";i:108;s:14:\"addConsumables\";i:109;s:15:\"editConsumables\";i:110;s:17:\"deleteConsumables\";i:111;s:17:\"manageConsumables\";i:112;s:15:\"viewConsumables\";i:113;s:7:\"viewSam\";i:114;s:6:\"addSam\";i:115;s:7:\"editSam\";i:116;s:9:\"deleteSam\";i:117;s:9:\"manageSam\";i:118;s:18:\"viewAssetsallocate\";i:119;s:17:\"addAssetsallocate\";i:120;s:18:\"editAssetsallocate\";i:121;s:20:\"deleteAssetsallocate\";i:122;s:20:\"manageAssetsallocate\";i:123;s:20:\"viewLicensesallocate\";i:124;s:19:\"addLicensesallocate\";i:125;s:20:\"editLicensesallocate\";i:126;s:22:\"deleteLicensesallocate\";i:127;s:22:\"manageLicensesallocate\";i:128;s:10:\"viewMaster\";i:129;s:9:\"addMaster\";i:130;s:10:\"editMaster\";i:131;s:12:\"deleteMaster\";i:132;s:12:\"manageMaster\";i:133;s:16:\"viewAssetsreturn\";i:134;s:15:\"addAssetsreturn\";i:135;s:16:\"editAssetsreturn\";i:136;s:18:\"deleteAssetsreturn\";i:137;s:18:\"manageAssetsreturn\";i:138;s:17:\"viewLicensereturn\";i:139;s:16:\"addLicensereturn\";i:140;s:17:\"editLicensereturn\";i:141;s:19:\"deleteLicensereturn\";i:142;s:19:\"manageLicensereturn\";i:143;s:4:\"Null\";}'),
(4, 'admin', 'Technician', 'a:144:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:12:\"addMilestone\";i:26;s:13:\"editMilestone\";i:27;s:15:\"deleteMilestone\";i:28;s:16:\"releaseMilestone\";i:29;s:14:\"viewMilestones\";i:30;s:7:\"addTime\";i:31;s:8:\"editTime\";i:32;s:10:\"deleteTime\";i:33;s:8:\"viewTime\";i:34;s:9:\"addTicket\";i:35;s:10:\"editTicket\";i:36;s:12:\"deleteTicket\";i:37;s:12:\"manageTicket\";i:38;s:17:\"manageTicketRules\";i:39;s:17:\"manageTicketNotes\";i:40;s:22:\"manageTicketAssignment\";i:41;s:11:\"viewTickets\";i:42;s:8:\"addIssue\";i:43;s:9:\"editIssue\";i:44;s:11:\"deleteIssue\";i:45;s:11:\"manageIssue\";i:46;s:10:\"viewIssues\";i:47;s:10:\"addComment\";i:48;s:11:\"editComment\";i:49;s:13:\"deleteComment\";i:50;s:13:\"assignComment\";i:51;s:12:\"viewComments\";i:52;s:13:\"addCredential\";i:53;s:14:\"editCredential\";i:54;s:16:\"deleteCredential\";i:55;s:14:\"viewCredential\";i:56;s:15:\"viewCredentials\";i:57;s:5:\"addKB\";i:58;s:6:\"editKB\";i:59;s:8:\"deleteKB\";i:60;s:6:\"viewKB\";i:61;s:9:\"addPReply\";i:62;s:10:\"editPReply\";i:63;s:12:\"deletePReply\";i:64;s:12:\"viewPReplies\";i:65;s:10:\"uploadFile\";i:66;s:12:\"downloadFile\";i:67;s:10:\"deleteFile\";i:68;s:9:\"viewFiles\";i:69;s:7:\"addHost\";i:70;s:8:\"editHost\";i:71;s:10:\"deleteHost\";i:72;s:10:\"manageHost\";i:73;s:14:\"viewMonitoring\";i:74;s:7:\"addUser\";i:75;s:8:\"editUser\";i:76;s:10:\"deleteUser\";i:77;s:9:\"viewUsers\";i:78;s:8:\"addStaff\";i:79;s:9:\"editStaff\";i:80;s:11:\"deleteStaff\";i:81;s:9:\"viewStaff\";i:82;s:7:\"addRole\";i:83;s:8:\"editRole\";i:84;s:10:\"deleteRole\";i:85;s:9:\"viewRoles\";i:86;s:10:\"addContact\";i:87;s:11:\"editContact\";i:88;s:13:\"deleteContact\";i:89;s:12:\"viewContacts\";i:90;s:14:\"addCustomField\";i:91;s:15:\"editCustomField\";i:92;s:17:\"deleteCustomField\";i:93;s:16:\"viewCustomFields\";i:94;s:10:\"manageData\";i:95;s:14:\"manageSettings\";i:96;s:13:\"manageApiKeys\";i:97;s:8:\"viewLogs\";i:98;s:10:\"viewSystem\";i:99;s:10:\"viewPeople\";i:100;s:11:\"viewReports\";i:101;s:11:\"autorefresh\";i:102;s:6:\"search\";i:103;s:13:\"addComponents\";i:104;s:14:\"editComponents\";i:105;s:16:\"deleteComponents\";i:106;s:16:\"manageComponents\";i:107;s:14:\"viewComponents\";i:108;s:14:\"addConsumables\";i:109;s:15:\"editConsumables\";i:110;s:17:\"deleteConsumables\";i:111;s:17:\"manageConsumables\";i:112;s:15:\"viewConsumables\";i:113;s:7:\"viewSam\";i:114;s:6:\"addSam\";i:115;s:7:\"editSam\";i:116;s:9:\"deleteSam\";i:117;s:9:\"manageSam\";i:118;s:18:\"viewAssetsallocate\";i:119;s:17:\"addAssetsallocate\";i:120;s:18:\"editAssetsallocate\";i:121;s:20:\"deleteAssetsallocate\";i:122;s:20:\"manageAssetsallocate\";i:123;s:20:\"viewLicensesallocate\";i:124;s:19:\"addLicensesallocate\";i:125;s:20:\"editLicensesallocate\";i:126;s:22:\"deleteLicensesallocate\";i:127;s:22:\"manageLicensesallocate\";i:128;s:10:\"viewMaster\";i:129;s:9:\"addMaster\";i:130;s:10:\"editMaster\";i:131;s:12:\"deleteMaster\";i:132;s:12:\"manageMaster\";i:133;s:16:\"viewAssetsreturn\";i:134;s:15:\"addAssetsreturn\";i:135;s:16:\"editAssetsreturn\";i:136;s:18:\"deleteAssetsreturn\";i:137;s:18:\"manageAssetsreturn\";i:138;s:17:\"viewLicensereturn\";i:139;s:16:\"addLicensereturn\";i:140;s:17:\"editLicensereturn\";i:141;s:19:\"deleteLicensereturn\";i:142;s:19:\"manageLicensereturn\";i:143;s:4:\"Null\";}'),
(5, 'admin', 'TecH', 'a:117:{i:0;s:8:\"addAsset\";i:1;s:9:\"editAsset\";i:2;s:11:\"deleteAsset\";i:3;s:11:\"manageAsset\";i:4;s:12:\"licenseAsset\";i:5;s:10:\"viewAssets\";i:6;s:10:\"addLicense\";i:7;s:11:\"editLicense\";i:8;s:13:\"deleteLicense\";i:9;s:13:\"manageLicense\";i:10;s:12:\"assetLicense\";i:11;s:12:\"viewLicenses\";i:12;s:10:\"addProject\";i:13;s:11:\"editProject\";i:14;s:13:\"deleteProject\";i:15;s:13:\"manageProject\";i:16;s:18:\"manageProjectNotes\";i:17;s:13:\"adminsProject\";i:18;s:12:\"viewProjects\";i:19;s:12:\"addMilestone\";i:20;s:13:\"editMilestone\";i:21;s:15:\"deleteMilestone\";i:22;s:16:\"releaseMilestone\";i:23;s:14:\"viewMilestones\";i:24;s:7:\"addTime\";i:25;s:8:\"editTime\";i:26;s:10:\"deleteTime\";i:27;s:8:\"viewTime\";i:28;s:9:\"addTicket\";i:29;s:10:\"editTicket\";i:30;s:12:\"deleteTicket\";i:31;s:12:\"manageTicket\";i:32;s:17:\"manageTicketRules\";i:33;s:17:\"manageTicketNotes\";i:34;s:22:\"manageTicketAssignment\";i:35;s:11:\"viewTickets\";i:36;s:8:\"addIssue\";i:37;s:9:\"editIssue\";i:38;s:11:\"deleteIssue\";i:39;s:11:\"manageIssue\";i:40;s:10:\"viewIssues\";i:41;s:10:\"addComment\";i:42;s:11:\"editComment\";i:43;s:13:\"deleteComment\";i:44;s:13:\"assignComment\";i:45;s:12:\"viewComments\";i:46;s:5:\"addKB\";i:47;s:6:\"editKB\";i:48;s:8:\"deleteKB\";i:49;s:6:\"viewKB\";i:50;s:10:\"uploadFile\";i:51;s:12:\"downloadFile\";i:52;s:10:\"deleteFile\";i:53;s:9:\"viewFiles\";i:54;s:14:\"viewMonitoring\";i:55;s:7:\"addUser\";i:56;s:8:\"editUser\";i:57;s:10:\"deleteUser\";i:58;s:9:\"viewUsers\";i:59;s:8:\"addStaff\";i:60;s:9:\"editStaff\";i:61;s:11:\"deleteStaff\";i:62;s:9:\"viewStaff\";i:63;s:7:\"addRole\";i:64;s:8:\"editRole\";i:65;s:10:\"deleteRole\";i:66;s:9:\"viewRoles\";i:67;s:10:\"addContact\";i:68;s:11:\"editContact\";i:69;s:13:\"deleteContact\";i:70;s:12:\"viewContacts\";i:71;s:10:\"manageData\";i:72;s:14:\"manageSettings\";i:73;s:13:\"manageApiKeys\";i:74;s:8:\"viewLogs\";i:75;s:10:\"viewSystem\";i:76;s:10:\"viewPeople\";i:77;s:11:\"viewReports\";i:78;s:11:\"autorefresh\";i:79;s:6:\"search\";i:80;s:13:\"addComponents\";i:81;s:14:\"editComponents\";i:82;s:16:\"deleteComponents\";i:83;s:16:\"manageComponents\";i:84;s:14:\"viewComponents\";i:85;s:14:\"addConsumables\";i:86;s:15:\"editConsumables\";i:87;s:17:\"deleteConsumables\";i:88;s:17:\"manageConsumables\";i:89;s:15:\"viewConsumables\";i:90;s:7:\"viewSam\";i:91;s:6:\"addSam\";i:92;s:7:\"editSam\";i:93;s:9:\"deleteSam\";i:94;s:9:\"manageSam\";i:95;s:18:\"viewAssetsallocate\";i:96;s:17:\"addAssetsallocate\";i:97;s:18:\"editAssetsallocate\";i:98;s:20:\"deleteAssetsallocate\";i:99;s:20:\"manageAssetsallocate\";i:100;s:20:\"viewLicensesallocate\";i:101;s:19:\"addLicensesallocate\";i:102;s:20:\"editLicensesallocate\";i:103;s:22:\"deleteLicensesallocate\";i:104;s:22:\"manageLicensesallocate\";i:105;s:10:\"viewMaster\";i:106;s:16:\"viewAssetsreturn\";i:107;s:15:\"addAssetsreturn\";i:108;s:16:\"editAssetsreturn\";i:109;s:18:\"deleteAssetsreturn\";i:110;s:18:\"manageAssetsreturn\";i:111;s:17:\"viewLicensereturn\";i:112;s:16:\"addLicensereturn\";i:113;s:17:\"editLicensereturn\";i:114;s:19:\"deleteLicensereturn\";i:115;s:19:\"manageLicensereturn\";i:116;s:4:\"Null\";}');

-- --------------------------------------------------------

--
-- Table structure for table `smslog`
--

CREATE TABLE `smslog` (
  `id` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `mobile` varchar(128) NOT NULL,
  `sms` varchar(256) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statuscodes`
--

CREATE TABLE `statuscodes` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuscodes`
--

INSERT INTO `statuscodes` (`id`, `code`, `type`, `message`) VALUES
(48, 11, 'danger', 'Error! Cannot add item.'),
(49, 21, 'danger', 'Error! Cannot save item.'),
(50, 31, 'danger', 'Error! Cannot delete item.'),
(47, 30, 'success', 'Item has been deleted successfully!'),
(46, 20, 'success', 'Item has been saved successfully!'),
(45, 10, 'success', 'Item has been added successfully!'),
(51, 40, 'success', 'Settings updated successfully!'),
(52, 1200, 'danger', 'Authentication Failed!'),
(53, 1300, 'success', 'Please check your email for a password reset link.'),
(54, 1400, 'danger', 'Email address was not found.'),
(55, 1500, 'danger', 'Invalid reset key!'),
(56, 1600, 'success', 'Success. Please log in with your new password! '),
(57, 1, 'danger', 'Unauthorized Access');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contactname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `contactname`, `phone`, `email`, `web`, `notes`) VALUES
(1, 'Amazon', 'Address: indore', 'Pratik', '0123456789', 'dummy@gmail.com', 'www.web.com', 'This is test'),
(2, 'Best Buy', '', '', '', '', '', ''),
(3, 'Newegg', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `systemlog`
--

CREATE TABLE `systemlog` (
  `id` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemlog`
--

INSERT INTO `systemlog` (`id`, `peopleid`, `ipaddress`, `description`, `timestamp`) VALUES
(1, -1, '::1', 'User/Admin Logged In - ID: 1', '2019-01-20 10:03:18'),
(2, 1, '::1', 'User/Staff Logged Out - ID: 1', '2019-01-20 10:04:04'),
(3, -1, '116.74.34.11', 'User/Admin Logged In - ID: 1', '2019-01-22 10:26:15'),
(4, -1, '157.48.5.238', 'User/Admin Logged In - ID: 1', '2019-01-22 13:19:59'),
(5, -1, '106.77.186.157', 'User/Admin Logged In - ID: 1', '2019-01-22 13:44:37'),
(6, 1, '157.48.18.92', 'User/Staff Logged Out - ID: 1', '2019-01-22 14:52:57'),
(7, -1, '157.48.60.25', 'User/Admin Logged In - ID: 1', '2019-01-22 17:21:42'),
(8, -1, '157.48.51.190', 'User/Admin Logged In - ID: 1', '2019-01-23 05:35:29'),
(9, -1, '106.76.239.160', 'User/Admin Logged In - ID: 1', '2019-01-23 13:36:19'),
(10, -1, '157.48.24.131', 'User/Admin Logged In - ID: 1', '2019-01-23 16:58:22'),
(11, 1, '157.48.24.131', 'Client Added - ID: 3', '2019-01-23 16:58:50'),
(12, 1, '157.48.24.131', 'User Added - ID: 2', '2019-01-23 16:59:55'),
(13, -1, '157.48.24.131', 'User/Admin Logged In - ID: 2', '2019-01-23 17:01:33'),
(14, 1, '157.48.24.131', 'Role Edited - ID: 2', '2019-01-23 17:03:52'),
(15, 2, '157.48.24.131', 'Asset Added - ID: 4', '2019-01-23 17:06:23'),
(16, 2, '157.48.24.131', 'Host Added - ID: 5', '2019-01-23 17:09:00'),
(17, 2, '157.48.24.131', 'Host Added - ID: 6', '2019-01-23 17:11:40'),
(18, 1, '157.48.24.131', 'Role Edited - ID: 2', '2019-01-23 17:12:54'),
(19, 2, '157.48.24.131', 'Check Added - ID: 5', '2019-01-23 17:15:46'),
(20, 2, '157.48.24.131', 'Check Edited - ID: 5', '2019-01-23 17:16:02'),
(21, 2, '157.48.24.131', 'Time Log Entry Added - ID: 4', '2019-01-23 17:21:25'),
(22, 1, '157.48.24.131', 'Asset Custom Field Added - ID: 1', '2019-01-23 17:24:49'),
(23, 1, '157.48.24.131', 'API Key Added - ID: 1', '2019-01-23 17:25:58'),
(24, 1, '157.48.24.131', 'API Key Added - ID: 2', '2019-01-23 17:26:07'),
(25, 1, '157.48.24.131', 'API Key Deleted - ID: 2', '2019-01-23 17:26:22'),
(26, -1, '27.5.47.125', 'User/Admin Logged In - ID: 1', '2019-01-24 06:34:21'),
(27, -1, '106.76.238.61', 'User/Admin Logged In - ID: 1', '2019-01-24 07:02:15'),
(28, 1, '106.76.214.126', 'Asset Custom Field Added - ID: 2', '2019-01-24 07:21:15'),
(29, -1, '27.5.47.125', 'User/Admin Logged In - ID: 1', '2019-01-24 07:23:51'),
(30, -1, '106.76.214.126', 'User/Admin Logged In - ID: 1', '2019-01-24 07:44:46'),
(31, -1, '27.5.47.125', 'User/Admin Logged In - ID: 1', '2019-01-24 07:56:41'),
(32, -1, '106.76.214.126', 'User/Admin Logged In - ID: 1', '2019-01-24 07:57:44'),
(33, -1, '27.5.47.125', 'User/Admin Logged In - ID: 1', '2019-01-24 07:58:22'),
(34, -1, '106.76.214.126', 'User/Admin Logged In - ID: 1', '2019-01-24 07:59:11'),
(35, -1, '157.44.183.70', 'User/Admin Logged In - ID: 1', '2019-01-25 16:31:27'),
(36, -1, '157.44.228.46', 'User/Admin Logged In - ID: 1', '2019-01-26 10:38:31'),
(37, 1, '157.44.228.46', 'Asset Edited - ID: 4', '2019-01-26 11:05:09'),
(38, 1, '157.44.228.46', 'Asset Custom Field Added - ID: 3', '2019-01-26 14:25:43'),
(39, -1, '116.75.193.254', 'User/Admin Logged In - ID: 1', '2019-01-29 08:28:27'),
(40, -1, '157.48.108.144', 'User/Admin Logged In - ID: 1', '2019-01-29 11:21:34'),
(41, -1, '223.238.126.97', 'User/Admin Logged In - ID: 1', '2019-01-30 07:17:52'),
(42, -1, '116.75.242.246', 'User/Admin Logged In - ID: 1', '2019-01-30 07:41:36'),
(43, -1, '223.238.126.97', 'User/Admin Logged In - ID: 1', '2019-01-30 07:42:24'),
(44, -1, '116.75.242.246', 'User/Admin Logged In - ID: 1', '2019-01-30 07:43:54'),
(45, -1, '223.238.126.97', 'User/Admin Logged In - ID: 1', '2019-01-30 07:44:12'),
(46, -1, '116.75.242.246', 'User/Admin Logged In - ID: 1', '2019-01-30 07:46:39'),
(47, -1, '223.238.126.97', 'User/Admin Logged In - ID: 1', '2019-01-30 07:46:56'),
(48, 1, '223.238.126.97', 'User Edited - ID: 2', '2019-01-30 10:09:29'),
(49, 1, '223.238.126.97', 'User/Staff Logged Out - ID: 1', '2019-01-30 10:09:33'),
(50, -1, '223.238.126.97', 'User/Admin Logged In - ID: 2', '2019-01-30 10:09:40'),
(51, 2, '223.238.126.97', 'Asset Edited - ID: 4', '2019-01-30 10:32:03'),
(52, -1, '223.182.120.38', 'User/Admin Logged In - ID: 1', '2019-01-31 05:33:23'),
(53, -1, '223.182.62.127', 'User/Admin Logged In - ID: 1', '2019-02-01 06:21:43'),
(54, -1, '::1', 'User/Admin Login Failure - EMAIL: admin@gmail.com', '2019-02-01 09:01:56'),
(55, -1, '::1', 'User/Admin Logged In - ID: 1', '2019-02-01 09:02:32'),
(56, 1, '::1', 'User/Staff Logged Out - ID: 1', '2019-02-01 13:26:56'),
(57, -1, '::1', 'User/Admin Logged In - ID: 2', '2019-02-01 13:27:20'),
(58, 2, '::1', 'User/Staff Logged Out - ID: 2', '2019-02-01 13:30:19'),
(59, -1, '::1', 'User/Admin Logged In - ID: 1', '2019-02-01 13:30:52'),
(60, 1, '::1', 'Role Edited - ID: 3', '2019-02-01 13:51:26'),
(61, 1, '::1', 'Role Edited - ID: 2', '2019-02-01 14:10:49'),
(62, 1, '::1', 'Role Edited - ID: 2', '2019-02-01 14:10:55'),
(63, 1, '::1', 'User/Staff Logged Out - ID: 1', '2019-02-02 06:03:31'),
(64, -1, '::1', 'User/Admin Logged In - ID: 1', '2019-02-02 06:03:46'),
(65, -1, '::1', 'User/Admin Login Failure - EMAIL: admin@gmail.com', '2019-02-02 06:54:39'),
(66, -1, '::1', 'User/Admin Login Failure - EMAIL: admin@gmail.com', '2019-02-02 06:55:01'),
(67, -1, '::1', 'User/Admin Logged In - ID: 1', '2019-02-02 06:55:18'),
(68, -1, '::1', 'User/Admin Logged In - ID: 1', '2019-02-02 06:56:58'),
(69, 1, '::1', 'Role Edited - ID: 3', '2019-02-02 08:09:51'),
(70, 1, '::1', 'Role Edited - ID: 3', '2019-02-02 08:10:10'),
(71, 1, '::1', 'Role Edited - ID: 3', '2019-02-02 08:32:13'),
(72, 1, '::1', 'Role Edited - ID: 3', '2019-02-02 08:32:24'),
(73, 1, '::1', 'Component Added - ID: 1', '2019-02-02 09:09:26'),
(74, 1, '::1', 'Component Added - ID: 2', '2019-02-02 10:14:50'),
(75, 1, '::1', 'Component Added - ID: 3', '2019-02-02 10:19:58'),
(76, 1, '::1', 'Component Added - ID: 4', '2019-02-02 10:28:41'),
(77, 1, '::1', 'Component Added - ID: 5', '2019-02-02 12:57:37'),
(78, 1, '::1', 'Components Edited - ID: 1', '2019-02-02 19:09:01'),
(79, 1, '::1', 'Components Edited - ID: 1', '2019-02-02 19:15:21'),
(80, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 05:42:06'),
(81, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 06:06:39'),
(82, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 06:20:47'),
(83, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 06:31:43'),
(84, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 06:32:18'),
(85, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 06:32:31'),
(86, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 07:05:28'),
(87, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 07:05:50'),
(88, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 07:08:44'),
(89, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 07:16:45'),
(90, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 07:16:54'),
(91, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 07:35:33'),
(92, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 07:39:41'),
(93, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 07:41:17'),
(94, 1, '::1', 'Components Edited - ID: 1', '2019-02-05 07:41:38'),
(95, 1, '::1', 'Role Edited - ID: 2', '2019-02-05 08:22:50'),
(96, 1, '::1', 'Role Edited - ID: 2', '2019-02-05 08:23:23'),
(97, 1, '::1', 'Consumables Added - ID: 1', '2019-02-05 10:07:21'),
(98, 1, '::1', 'Consumables Edited - ID: 1', '2019-02-05 10:21:11'),
(99, 1, '::1', 'Components Deleted - ID: 1', '2019-02-05 10:37:19'),
(100, 1, '::1', 'Role Edited - ID: 2', '2019-02-05 11:42:27'),
(101, 1, '::1', 'License Added - ID: 5', '2019-02-05 13:14:07'),
(102, 1, '::1', 'License Edited - ID: 5', '2019-02-05 13:14:38'),
(103, 1, '::1', 'License Edited - ID: 5', '2019-02-05 13:14:43'),
(104, 1, '::1', 'User Added - ID: 3', '2019-02-06 09:07:55'),
(105, 1, '::1', 'Role Edited - ID: 2', '2019-02-06 09:44:46'),
(106, 1, '::1', 'Asset Added - ID: 1', '2019-02-06 10:25:41'),
(107, 1, '::1', 'Asset Allocate Added - ID: 2', '2019-02-06 10:33:03'),
(108, 1, '::1', 'User/Staff Logged Out - ID: 1', '2019-02-06 11:32:45'),
(109, -1, '::1', 'User/Admin Logged In - ID: 1', '2019-02-06 11:32:47'),
(110, 1, '::1', 'Role Edited - ID: 2', '2019-02-06 11:34:19'),
(111, 1, '::1', 'Asset Allocate Added - ID: 3', '2019-02-06 11:53:16'),
(112, 1, '::1', 'Asset allocate Edited - ID: 1', '2019-02-06 16:39:13'),
(113, 1, '::1', 'Asset allocate Edited - ID: 1', '2019-02-06 16:45:04'),
(114, 1, '::1', 'Asset allocate Edited - ID: 1', '2019-02-06 16:45:15'),
(115, 1, '::1', 'Assets allocate Edited - ID: 1', '2019-02-06 16:51:37'),
(116, 1, '::1', 'Assets allocate Edited - ID: 3', '2019-02-06 16:56:42'),
(117, 1, '::1', 'Assets allocate Edited - ID: 3', '2019-02-06 16:56:53'),
(118, 1, '::1', 'Assets allocate Edited - ID: 3', '2019-02-06 17:02:02'),
(119, 1, '::1', 'Assets allocate Edited - ID: 3', '2019-02-06 17:02:07'),
(120, 1, '::1', 'Assets allocate Edited - ID: 3', '2019-02-06 17:02:28'),
(121, 1, '::1', 'Asset Deleted - ID: 2', '2019-02-06 17:35:54'),
(122, 1, '::1', 'Asset Allocate Deleted - ID: 2', '2019-02-06 17:36:42'),
(123, 1, '::1', 'Role Edited - ID: 2', '2019-02-06 17:47:13'),
(124, 1, '::1', 'Role Edited - ID: 2', '2019-02-06 17:57:40'),
(125, 1, '::1', 'Role Edited - ID: 2', '2019-02-06 17:58:36'),
(126, 1, '::1', 'Licenses allocate Edited - ID: 1', '2019-02-07 06:59:35'),
(127, 1, '::1', 'Licenses allocate Edited - ID: 1', '2019-02-07 06:59:40'),
(128, 1, '::1', 'Licenses Allocate Added - ID: 4', '2019-02-07 07:01:37'),
(129, 1, '::1', 'LicenseCategory Edited - ID: 1', '2019-02-07 07:43:26'),
(130, 1, '::1', 'LicenseCategory Added - ID: 5', '2019-02-07 07:43:59'),
(131, 1, '::1', 'LicenseCategory Deleted - ID: 5', '2019-02-07 07:44:12'),
(132, 1, '::1', 'Asset Edited - ID: 1', '2019-02-09 05:27:45'),
(133, 1, '::1', 'Asset Edited - ID: 1', '2019-02-09 05:29:05'),
(134, 1, '::1', 'Asset Edited - ID: 1', '2019-02-09 05:31:32'),
(135, 1, '::1', 'Asset Edited - ID: 1', '2019-02-09 05:32:03'),
(136, 1, '::1', 'Asset Edited - ID: 1', '2019-02-09 05:32:54'),
(137, 1, '::1', 'License Edited - ID: 1', '2019-02-09 05:40:50'),
(138, 1, '::1', 'License Edited - ID: 1', '2019-02-09 05:42:17'),
(139, 1, '::1', 'License Edited - ID: 1', '2019-02-09 05:44:09'),
(140, 1, '::1', 'License Edited - ID: 1', '2019-02-09 05:51:46'),
(141, 1, '::1', 'Role Edited - ID: 2', '2019-02-09 06:21:15'),
(142, 1, '::1', 'Role Edited - ID: 2', '2019-02-09 06:26:51'),
(143, 1, '::1', 'Role Edited - ID: 2', '2019-02-09 06:34:06'),
(144, 1, '::1', 'User/Staff Logged Out - ID: 1', '2019-02-09 06:38:33'),
(145, -1, '::1', 'User/Admin Logged In - ID: 1', '2019-02-09 06:38:35'),
(146, 1, '::1', 'Role Edited - ID: 2', '2019-02-09 06:41:00'),
(147, 1, '::1', 'DepartmentCategory Added - ID: 6', '2019-02-09 08:46:45'),
(148, 1, '::1', 'DepartmentCategory Added - ID: 3', '2019-02-09 08:47:40'),
(149, 1, '::1', 'DepartmentCategory Edited - ID: 1', '2019-02-09 09:34:13'),
(150, 1, '::1', 'DepartmentCategory Edited - ID: 1', '2019-02-09 09:36:52'),
(151, 1, '::1', 'DepartmentCategory Deleted - ID: 3', '2019-02-09 09:36:58'),
(152, 1, '::1', 'DepartmentCategory Added - ID: 4', '2019-02-09 10:10:54'),
(153, 1, '::1', 'DepartmentCategory Deleted - ID: 4', '2019-02-09 10:11:00'),
(154, 1, '::1', 'ManagerCategory Added - ID: 3', '2019-02-09 10:18:14'),
(155, 1, '::1', 'ManagerCategory Edited - ID: 3', '2019-02-09 10:18:25'),
(156, 1, '::1', 'ManagerCategory Deleted - ID: 3', '2019-02-09 10:18:31'),
(157, 1, '::1', 'Role Edited - ID: 2', '2019-02-09 10:29:06'),
(158, 1, '::1', 'Role Edited - ID: 2', '2019-02-09 11:24:55'),
(159, 1, '::1', 'Role Edited - ID: 2', '2019-02-09 11:36:37'),
(160, 1, '::1', 'ApprovalCategory Added - ID: 3', '2019-02-09 13:01:06'),
(161, 1, '::1', 'ApprovalCategory Edited - ID: 3', '2019-02-09 13:10:36'),
(162, 1, '::1', 'ApprovalCategory Deleted - ID: 3', '2019-02-09 13:10:45'),
(163, 1, '::1', 'Asset Return Added - ID: 1', '2019-02-11 07:19:11'),
(164, 1, '::1', 'Assets Return Edited - ID: 1', '2019-02-17 13:27:34'),
(165, 1, '::1', 'Asset Return Added - ID: 2', '2019-02-17 13:28:54'),
(166, 1, '::1', 'Asset Allocate Deleted - ID: 2', '2019-02-17 13:40:00'),
(167, 1, '::1', 'Asset Return Added - ID: 3', '2019-02-17 13:44:11'),
(168, 1, '::1', 'Asset Return Deleted - ID: 3', '2019-02-17 13:45:10'),
(169, 1, '::1', 'Role Edited - ID: 2', '2019-02-17 14:51:21'),
(170, 1, '::1', 'License Return Added - ID: 2', '2019-02-19 06:05:38'),
(171, 1, '::1', 'License Return Edited - ID: 2', '2019-02-19 06:09:03'),
(172, 1, '::1', 'License Return Edited - ID: 2', '2019-02-19 06:11:05'),
(173, 1, '::1', 'License Return Edited - ID: 2', '2019-02-19 06:15:30'),
(174, 1, '::1', 'License Return Edited - ID: 2', '2019-02-19 06:16:05'),
(175, 1, '::1', 'License Return Edited - ID: 2', '2019-02-19 06:16:17'),
(176, 1, '::1', 'License Return Edited - ID: 2', '2019-02-19 06:17:23'),
(177, 1, '::1', 'License Return Edited - ID: 2', '2019-02-19 06:17:45'),
(178, 1, '::1', 'License Return Edited - ID: 2', '2019-02-19 06:19:23'),
(179, 1, '::1', 'License Return Edited - ID: 2', '2019-02-19 06:19:35'),
(180, 1, '::1', 'Asset Return Deleted - ID: 2', '2019-02-19 06:19:57'),
(181, 1, '::1', 'License Return Deleted - ID: 2', '2019-02-19 06:22:47'),
(182, 1, '::1', 'License Return Added - ID: 3', '2019-02-19 06:23:47'),
(183, 1, '::1', 'License Return Deleted - ID: 3', '2019-02-19 06:25:08'),
(184, 1, '::1', 'License Return Added - ID: 4', '2019-02-19 06:26:31'),
(185, 1, '::1', 'License Return Edited - ID: 1', '2019-02-19 09:09:48'),
(186, 1, '::1', 'Asset Added - ID: 5', '2019-02-20 07:22:39'),
(187, 1, '::1', 'Asset Added - ID: 6', '2019-02-20 07:26:13'),
(188, 1, '::1', 'Asset Added - ID: 7', '2019-02-20 07:27:54'),
(189, 1, '::1', 'Asset Allocate Added - ID: 4', '2019-02-20 09:21:49'),
(190, 1, '::1', 'Asset Return Added - ID: 4', '2019-02-20 09:33:42'),
(191, 1, '::1', 'Assets Return Edited - ID: 1', '2019-02-20 09:34:15'),
(192, 1, '::1', 'Component Added - ID: 6', '2019-02-20 09:47:02'),
(193, 1, '::1', 'Components Edited - ID: 6', '2019-02-20 10:31:18'),
(194, 1, '::1', 'Component Added - ID: 7', '2019-02-20 10:39:42'),
(195, 1, '::1', 'Components Edited - ID: 7', '2019-02-20 10:56:55'),
(196, 1, '::1', 'Components Edited - ID: 7', '2019-02-20 10:57:15'),
(197, 1, '::1', 'Components Edited - ID: 7', '2019-02-20 10:59:56'),
(198, 1, '::1', 'Components Edited - ID: 7', '2019-02-20 11:01:46'),
(199, 1, '::1', 'Components Edited - ID: 7', '2019-02-20 11:02:13'),
(200, 1, '::1', 'Components Edited - ID: 7', '2019-02-20 11:05:34'),
(201, 1, '::1', 'Component Added - ID: 8', '2019-02-20 11:25:39'),
(202, 1, '::1', 'Component Added - ID: 9', '2019-02-20 11:38:33'),
(203, 1, '::1', 'Component Added - ID: 10', '2019-02-20 11:50:22'),
(204, 1, '::1', 'Component Added - ID: 11', '2019-02-20 11:51:44'),
(205, 1, '::1', 'Components Edited - ID: 10', '2019-02-20 11:56:27'),
(206, 1, '::1', 'Components Edited - ID: 9', '2019-02-20 11:58:04'),
(207, 1, '::1', 'Components Edited - ID: 9', '2019-02-20 12:01:39'),
(208, 1, '::1', 'Components Edited - ID: 9', '2019-02-20 12:03:24'),
(209, 1, '::1', 'Components Edited - ID: 9', '2019-02-20 12:03:47'),
(210, 1, '::1', 'Components Edited - ID: 9', '2019-02-20 12:05:13'),
(211, 1, '::1', 'Components Edited - ID: 9', '2019-02-20 12:20:36'),
(212, 1, '::1', 'Components Edited - ID: 9', '2019-02-20 12:22:53'),
(213, 1, '::1', 'Components Edited - ID: 9', '2019-02-20 12:23:26'),
(214, 1, '::1', 'Components Edited - ID: 9', '2019-02-20 12:24:29'),
(215, 1, '::1', 'Asset Allocate Added - ID: 5', '2019-02-20 12:48:19'),
(216, 1, '::1', 'Asset Added - ID: 8', '2019-02-20 12:55:16'),
(217, 1, '::1', 'Asset Allocate Added - ID: 6', '2019-02-20 13:19:14'),
(218, 1, '::1', 'Asset Return Added - ID: 5', '2019-02-20 13:41:10'),
(219, 1, '::1', 'Assets Return Edited - ID: 4', '2019-02-20 13:59:30'),
(220, -1, '116.74.33.17', 'User/Admin Logged In - ID: 1', '2019-02-22 13:39:05'),
(221, -1, '103.44.0.193', 'User/Admin Logged In - ID: 1', '2019-02-22 13:56:17'),
(222, -1, '116.74.33.17', 'User/Admin Logged In - ID: 1', '2019-02-22 13:56:33'),
(223, -1, '103.44.0.193', 'User/Admin Logged In - ID: 1', '2019-02-22 13:56:38'),
(224, -1, '116.74.33.17', 'User/Admin Logged In - ID: 1', '2019-02-22 13:57:02'),
(225, -1, '103.44.0.193', 'User/Admin Logged In - ID: 1', '2019-02-22 14:04:31'),
(226, -1, '116.75.198.192', 'User/Admin Logged In - ID: 1', '2019-02-27 05:46:02'),
(227, -1, '103.44.0.223', 'User/Admin Logged In - ID: 1', '2019-02-27 05:56:31'),
(228, -1, '116.75.198.192', 'User/Admin Logged In - ID: 1', '2019-02-27 06:39:26'),
(229, 1, '116.75.198.192', 'User/Staff Logged Out - ID: 1', '2019-02-27 06:39:35'),
(230, -1, '103.44.0.219', 'User/Admin Logged In - ID: 1', '2019-03-05 15:15:43'),
(231, -1, '27.5.44.35', 'User/Admin Logged In - ID: 1', '2019-03-07 07:47:15'),
(232, -1, '103.44.0.157', 'User/Admin Logged In - ID: 1', '2019-03-07 07:50:54'),
(233, -1, '106.76.240.111', 'User/Admin Logged In - ID: 1', '2019-03-14 19:06:44'),
(234, -1, '185.70.186.135', 'User/Admin Login Failure - EMAIL: persedia2024@gmail.com', '2019-03-28 21:45:40'),
(235, -1, '103.44.0.148', 'User/Admin Logged In - ID: 1', '2019-04-03 12:45:09'),
(236, -1, '185.70.186.135', 'User/Admin Login Failure - EMAIL: elbertdtemple1841@gmail.com', '2019-05-21 21:50:36'),
(237, -1, '117.246.176.251', 'User/Admin Login Failure - EMAIL: info@qtekit.com', '2019-06-06 02:38:35'),
(238, -1, '117.246.176.251', 'User/Admin Login Failure - EMAIL: info@qtekit.com', '2019-06-06 02:38:49'),
(239, -1, '117.246.176.251', 'User/Admin Logged In - ID: 1', '2019-06-06 02:38:59'),
(240, -1, '106.76.221.37', 'User/Admin Logged In - ID: 1', '2019-06-30 03:52:40'),
(241, -1, '106.51.69.104', 'User/Admin Logged In - ID: 1', '2019-07-06 10:15:06'),
(242, 1, '106.51.69.104', 'Client Added - ID: 4', '2019-07-07 11:00:33'),
(243, 1, '106.51.69.104', 'User Added - ID: 8', '2019-07-07 11:01:50'),
(244, 1, '106.51.69.104', 'User/Staff Logged Out - ID: 1', '2019-07-07 11:01:56'),
(245, -1, '106.51.69.104', 'User/Admin Logged In - ID: 8', '2019-07-07 11:02:14'),
(246, 8, '106.51.69.104', 'User/Staff Logged Out - ID: 8', '2019-07-07 11:02:45'),
(247, -1, '106.51.69.104', 'User/Admin Logged In - ID: 1', '2019-07-07 11:02:57'),
(248, 1, '106.51.69.104', 'Role Edited - ID: 2', '2019-07-07 11:04:52'),
(249, 1, '106.51.69.104', 'User/Staff Logged Out - ID: 1', '2019-07-07 11:04:56'),
(250, -1, '106.51.69.104', 'User/Admin Logged In - ID: 8', '2019-07-07 11:04:58'),
(251, -1, '106.51.69.104', 'User/Admin Logged In - ID: 8', '2019-07-30 10:56:41'),
(252, -1, '106.76.219.89', 'User/Admin Logged In - ID: 1', '2019-08-02 12:21:39'),
(253, -1, '223.182.47.222', 'User/Admin Login Failure - EMAIL: admin@example.com', '2019-08-10 07:22:44'),
(254, -1, '223.182.47.222', 'User/Admin Logged In - ID: 1', '2019-08-10 07:22:57'),
(255, 1, '223.182.47.222', 'Client Added - ID: 5', '2019-08-10 07:25:53'),
(256, 1, '223.182.47.222', 'Client Edited - ID: 5', '2019-08-10 07:26:01'),
(257, 1, '223.182.47.222', 'User Added - ID: 9', '2019-08-10 07:27:48'),
(258, 1, '223.182.47.222', 'User/Staff Logged Out - ID: 1', '2019-08-10 07:28:22'),
(259, -1, '223.182.47.222', 'User/Admin Logged In - ID: 9', '2019-08-10 07:28:47'),
(260, 9, '223.182.47.222', 'User/Staff Logged Out - ID: 9', '2019-08-10 07:29:21'),
(261, -1, '223.182.47.222', 'User/Admin Logged In - ID: 1', '2019-08-10 07:29:25'),
(262, -1, '106.200.175.231', 'User/Admin Logged In - ID: 1', '2019-08-12 23:27:42'),
(263, -1, '202.38.182.90', 'User/Admin Logged In - ID: 1', '2019-08-27 23:51:21'),
(264, -1, '202.38.182.90', 'User/Admin Logged In - ID: 1', '2019-08-27 23:51:22'),
(265, -1, '202.38.183.150', 'User/Admin Logged In - ID: 8', '2019-10-19 19:46:22'),
(266, -1, '45.64.104.167', 'User/Admin Login Failure - EMAIL: info@qtekit.com', '2019-10-19 19:46:38'),
(267, 8, '202.38.183.150', 'User/Staff Logged Out - ID: 8', '2019-10-19 19:48:27'),
(268, -1, '202.38.183.150', 'User/Admin Logged In - ID: 8', '2019-10-19 19:48:53'),
(269, -1, '45.64.104.167', 'User/Admin Logged In - ID: 8', '2019-10-19 19:49:13'),
(270, -1, '173.9.243.250', 'User/Admin Login Failure - EMAIL: jaliyahkey.qt.20132@supersend.biz', '2019-12-06 18:09:38'),
(271, -1, '47.23.101.26', 'User/Admin Login Failure - EMAIL: krystalballard.qt.20132@supersend.biz', '2019-12-12 15:48:43'),
(272, -1, '46.101.7.140', 'User/Admin Login Failure - EMAIL: laylaweber.qt.20132@supersendme.org', '2019-12-21 01:50:58'),
(273, -1, '68.183.104.51', 'User/Admin Login Failure - EMAIL: jerrysavage.qt.20132@supersendme.org', '2020-01-06 07:00:42'),
(274, -1, '206.189.131.213', 'User/Admin Login Failure - EMAIL: jasperharris.qt.20132@supersendme.org', '2020-01-07 16:10:40'),
(275, -1, '94.62.219.55', 'User/Admin Login Failure - EMAIL: maryballard.qt.20132@supersendme.org', '2020-01-08 11:28:25'),
(276, -1, '94.62.219.55', 'User/Admin Login Failure - EMAIL: leilaorr.qt.20132@supersendme.org', '2020-01-08 11:29:02'),
(277, -1, '45.55.229.108', 'User/Admin Login Failure - EMAIL: reubenfrazier.qt.20132@supersendme.org', '2020-01-10 08:57:59'),
(278, -1, '159.203.2.74', 'User/Admin Login Failure - EMAIL: roselynjordan.qt.20132@supersendme.org', '2020-01-10 08:58:11'),
(279, -1, '94.62.219.55', 'User/Admin Login Failure - EMAIL: laurelhumphrey.qt.20132@supersendme.org', '2020-01-10 08:58:37'),
(280, -1, '206.189.131.213', 'User/Admin Login Failure - EMAIL: jasperwu.qt.20132@supersendme.org', '2020-01-10 08:58:53'),
(281, -1, '159.203.2.74', 'User/Admin Login Failure - EMAIL: roselynlucero.qt.20132@supersendme.org', '2020-01-12 11:25:13'),
(282, -1, '162.244.225.30', 'User/Admin Login Failure - EMAIL: laylawalters.qt.20132@supersendme.org', '2020-01-12 11:25:57'),
(283, -1, '138.68.60.27', 'User/Admin Login Failure - EMAIL: erinharris.qt.20132@supersendme.org', '2020-01-12 11:26:24'),
(284, -1, '23.31.61.26', 'User/Admin Login Failure - EMAIL: aveririley.qt.20132@supersendme.org', '2020-01-12 11:30:10'),
(285, -1, '94.62.219.55', 'User/Admin Login Failure - EMAIL: amelieriley.qt.20132@supersendme.org', '2020-01-12 11:31:47'),
(286, -1, '159.203.2.74', 'User/Admin Login Failure - EMAIL: mariemcpherson.qt.20132@supersendme.org', '2020-01-12 11:32:46'),
(287, -1, '162.244.225.30', 'User/Admin Login Failure - EMAIL: jerryjordan.qt.20132@supersendme.org', '2020-01-12 11:34:17'),
(288, -1, '23.31.61.26', 'User/Admin Login Failure - EMAIL: allymaynard.qt.20132@supersendme.org', '2020-01-12 11:35:19'),
(289, -1, '94.62.219.55', 'User/Admin Login Failure - EMAIL: aliciacaldwell.qt.20132@supersendme.org', '2020-01-12 11:38:40'),
(290, -1, '68.183.104.51', 'User/Admin Login Failure - EMAIL: marykey.qt.20132@supersendme.org', '2020-01-12 11:40:58'),
(291, -1, '45.55.229.108', 'User/Admin Login Failure - EMAIL: krystalflowers.qt.20132@supersendme.org', '2020-01-12 11:41:23'),
(292, -1, '206.189.131.213', 'User/Admin Login Failure - EMAIL: julianneshort.qt.20132@supersendme.org', '2020-01-12 11:41:45'),
(293, -1, '68.183.104.51', 'User/Admin Login Failure - EMAIL: finneganshort.qt.20132@supersendme.org', '2020-01-12 11:42:35'),
(294, -1, '68.183.104.51', 'User/Admin Login Failure - EMAIL: juliannebush.qt.20132@supersendme.org', '2020-01-12 11:44:20'),
(295, -1, '112.133.236.87', 'User/Admin Login Failure - EMAIL: admin@admin.com', '2020-08-29 13:35:45'),
(296, -1, '112.133.236.87', 'User/Admin Logged In - ID: 1', '2020-08-29 13:40:31'),
(297, -1, '27.59.173.175', 'User/Admin Logged In - ID: 1', '2020-08-29 14:58:18'),
(298, -1, '27.59.173.175', 'User/Admin Logged In - ID: 1', '2020-08-29 15:03:06'),
(299, -1, '27.59.173.175', 'User/Admin Logged In - ID: 1', '2020-08-29 15:03:39'),
(300, 1, '27.59.173.175', 'Profile Edited - ID: 1', '2020-08-29 15:09:00'),
(301, 1, '27.59.173.175', 'User/Staff Logged Out - ID: 1', '2020-08-29 15:18:32'),
(302, -1, '27.59.173.175', 'User/Admin Logged In - ID: 1', '2020-08-29 15:18:35'),
(303, -1, '106.217.193.172', 'User/Admin Logged In - ID: 1', '2020-08-29 15:30:27'),
(304, 1, '106.217.193.172', 'Time Log Entry Edited - ID: 3', '2020-08-29 15:44:33'),
(305, 1, '106.217.193.172', 'Client Added - ID: 6', '2020-08-29 15:44:50'),
(306, 1, '106.217.193.172', 'Role Added - ID: 5', '2020-08-29 15:47:53'),
(307, 1, '106.217.193.172', 'User Added - ID: 10', '2020-08-29 15:49:03'),
(308, 1, '106.217.193.172', 'User/Staff Logged Out - ID: 1', '2020-08-29 15:50:23'),
(309, -1, '106.217.193.172', 'User/Admin Logged In - ID: 10', '2020-08-29 15:50:30'),
(310, 10, '106.217.193.172', 'User/Staff Logged Out - ID: 10', '2020-08-29 15:51:11'),
(311, -1, '106.217.193.172', 'User/Admin Logged In - ID: 1', '2020-08-29 15:51:14'),
(312, 1, '106.217.193.172', 'Role Edited - ID: 2', '2020-08-29 15:52:54'),
(313, 1, '106.217.193.172', 'User/Staff Logged Out - ID: 1', '2020-08-29 15:53:00'),
(314, -1, '106.217.193.172', 'User/Admin Logged In - ID: 10', '2020-08-29 15:53:05'),
(315, 10, '106.217.193.172', 'User/Staff Logged Out - ID: 10', '2020-08-29 15:53:10'),
(316, -1, '106.217.193.172', 'User/Admin Logged In - ID: 1', '2020-08-29 15:53:16'),
(317, 1, '106.217.193.172', 'User Edited - ID: 10', '2020-08-29 15:54:33'),
(318, 1, '106.217.193.172', 'User/Staff Logged Out - ID: 1', '2020-08-29 15:54:36'),
(319, -1, '106.217.193.172', 'User/Admin Logged In - ID: 10', '2020-08-29 15:54:39'),
(320, 10, '106.217.193.172', 'Asset Added - ID: 9', '2020-08-29 15:56:41'),
(321, 10, '106.217.193.172', 'User/Staff Logged Out - ID: 10', '2020-08-29 15:57:27'),
(322, -1, '106.217.193.172', 'User/Admin Logged In - ID: 1', '2020-08-29 15:59:28'),
(323, 1, '106.217.193.172', 'Client Deleted - ID: 6', '2020-08-29 16:02:24'),
(324, 1, '106.217.193.172', 'Client Added - ID: 7', '2020-08-29 16:02:59'),
(325, 1, '106.217.193.172', 'User Edited - ID: 10', '2020-08-29 16:04:11'),
(326, 1, '106.217.193.172', 'User/Staff Logged Out - ID: 1', '2020-08-29 16:04:38'),
(327, -1, '106.217.193.172', 'User/Admin Logged In - ID: 10', '2020-08-29 16:04:41'),
(328, 10, '106.217.193.172', 'Asset Added - ID: 10', '2020-08-29 16:10:17'),
(329, 10, '106.217.193.172', 'Asset Edited - ID: 10', '2020-08-29 16:10:45'),
(330, 10, '106.217.193.172', 'Asset Edited - ID: 10', '2020-08-29 16:11:32'),
(331, 10, '106.217.193.172', 'User/Staff Logged Out - ID: 10', '2020-08-29 16:17:33'),
(332, -1, '106.217.193.172', 'User/Admin Logged In - ID: 1', '2020-08-29 16:17:38'),
(333, 1, '112.133.236.87', 'Licenses Allocate Added - ID: 5', '2020-08-29 19:51:23'),
(334, -1, '223.187.185.89', 'User/Admin Logged In - ID: 1', '2020-08-31 18:53:25'),
(335, -1, '112.133.236.105', 'User/Admin Logged In - ID: 1', '2020-08-31 20:15:59'),
(336, -1, '223.238.32.140', 'User/Admin Logged In - ID: 1', '2020-09-01 17:18:46'),
(337, -1, '27.60.228.150', 'User/Admin Logged In - ID: 1', '2020-09-01 18:53:47'),
(338, -1, '27.59.244.145', 'User/Admin Logged In - ID: 1', '2020-09-02 11:04:07'),
(339, -1, '27.59.244.145', 'User/Admin Logged In - ID: 1', '2020-09-02 14:52:08'),
(340, -1, '112.133.236.58', 'User/Admin Logged In - ID: 1', '2020-09-02 21:13:07'),
(341, -1, '49.36.49.45', 'User/Admin Login Failure - EMAIL: admin@gmail.com', '2020-09-04 14:12:13'),
(342, -1, '49.36.49.45', 'User/Admin Login Failure - EMAIL: admin@gmail.com', '2020-09-04 14:13:46'),
(343, 1, '112.133.236.58', 'License Edited - ID: 1', '2020-09-06 16:09:58'),
(344, -1, '157.37.189.150', 'User/Admin Login Failure - EMAIL: qsuite@qtekit.com', '2020-09-08 21:24:10'),
(345, -1, '106.217.131.42', 'User/Admin Logged In - ID: 1', '2020-09-08 21:25:33'),
(346, -1, '157.37.189.150', 'User/Admin Logged In - ID: 1', '2020-09-08 21:26:21'),
(347, -1, '112.133.236.100', 'User/Admin Logged In - ID: 1', '2020-09-08 21:59:08'),
(348, -1, '27.59.143.66', 'User/Admin Logged In - ID: 1', '2020-09-09 07:30:26'),
(349, -1, '116.193.142.217', 'User/Admin Logged In - ID: 1', '2020-09-09 12:45:01'),
(350, -1, '106.217.247.125', 'User/Admin Logged In - ID: 1', '2020-09-09 15:56:01'),
(351, -1, '112.133.236.119', 'User/Admin Logged In - ID: 1', '2020-09-09 23:50:20'),
(352, -1, '157.43.247.60', 'User/Admin Login Failure - EMAIL: qsuite@qtekit.com', '2020-09-11 09:02:29'),
(353, -1, '157.43.247.60', 'User/Admin Logged In - ID: 1', '2020-09-11 09:03:18'),
(354, -1, '27.59.152.139', 'User/Admin Logged In - ID: 1', '2020-09-11 09:12:48'),
(355, -1, '157.43.247.60', 'User/Admin Logged In - ID: 1', '2020-09-11 09:19:48'),
(356, -1, '27.59.152.139', 'User/Admin Logged In - ID: 1', '2020-09-11 11:37:56'),
(357, -1, '157.43.225.154', 'User/Admin Logged In - ID: 1', '2020-09-11 14:02:51'),
(358, -1, '157.43.225.154', 'User/Admin Logged In - ID: 1', '2020-09-11 14:02:57'),
(359, -1, '157.43.225.154', 'User/Admin Logged In - ID: 1', '2020-09-11 14:03:11'),
(360, -1, '157.43.225.154', 'User/Admin Logged In - ID: 1', '2020-09-11 15:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticket` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `assetid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 NOT NULL,
  `ccs` varchar(255) NOT NULL,
  `timespent` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_departments`
--

CREATE TABLE `tickets_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_departments`
--

INSERT INTO `tickets_departments` (`id`, `name`, `email`) VALUES
(1, 'Default Department', '');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_pr`
--

CREATE TABLE `tickets_pr` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_pr`
--

INSERT INTO `tickets_pr` (`id`, `name`, `content`) VALUES
(1, 'Demo Predefined Reply', '<div><p>Predefined reply body.<br></p></div>');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_replies`
--

CREATE TABLE `tickets_replies` (
  `id` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `peopleid` int(11) NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_rules`
--

CREATE TABLE `tickets_rules` (
  `id` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `executed` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cond_status` varchar(255) NOT NULL,
  `cond_priority` varchar(255) NOT NULL,
  `cond_timeelapsed` varchar(20) NOT NULL,
  `cond_datetime` datetime NOT NULL,
  `act_status` varchar(255) NOT NULL,
  `act_priority` varchar(255) NOT NULL,
  `act_assignto` int(11) NOT NULL,
  `act_notifyadmins` int(1) NOT NULL,
  `act_addreply` int(1) NOT NULL,
  `reply` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `timelog`
--

CREATE TABLE `timelog` (
  `id` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `assetid` int(11) NOT NULL,
  `issues` text NOT NULL,
  `tickets` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timelog`
--

INSERT INTO `timelog` (`id`, `staffid`, `clientid`, `projectid`, `assetid`, `issues`, `tickets`, `description`, `date`, `start`, `end`) VALUES
(1, 0, 2, 0, 2, 'a:1:{i:0;s:1:\"1\";}', 'a:0:{}', 'Coverted from issue\'s time spent during 1.11 version upgrade.', '2016-02-03', '00:00:00', '03:00:00'),
(2, 0, 2, 0, 2, 'a:1:{i:0;s:1:\"2\";}', 'a:0:{}', 'Coverted from issue\'s time spent during 1.11 version upgrade.', '2016-02-01', '00:00:00', '00:25:00'),
(3, 0, 1, 1, 1, 'a:1:{i:0;s:1:\"3\";}', 'N;', 'Coverted from issue\'s time spent during 1.11 version upgrade.', '2016-02-03', '00:00:00', '00:45:00'),
(4, 2, 3, 0, 4, 'N;', 'N;', '', '2019-01-23', '16:21:07', '17:21:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvalcategories`
--
ALTER TABLE `approvalcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assetcategories`
--
ALTER TABLE `assetcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `assetsallocate`
--
ALTER TABLE `assetsallocate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assetsreturn`
--
ALTER TABLE `assetsreturn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets_customfields`
--
ALTER TABLE `assets_customfields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_admins`
--
ALTER TABLE `clients_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `consumables`
--
ALTER TABLE `consumables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departmentcategories`
--
ALTER TABLE `departmentcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emaillog`
--
ALTER TABLE `emaillog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hosts`
--
ALTER TABLE `hosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hosts_checks`
--
ALTER TABLE `hosts_checks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hosts_history`
--
ALTER TABLE `hosts_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hosts_people`
--
ALTER TABLE `hosts_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kb_articles`
--
ALTER TABLE `kb_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kb_categories`
--
ALTER TABLE `kb_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `licensecategories`
--
ALTER TABLE `licensecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licensereturn`
--
ALTER TABLE `licensereturn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `licensesallocate`
--
ALTER TABLE `licensesallocate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licenses_assets`
--
ALTER TABLE `licenses_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licenses_customfields`
--
ALTER TABLE `licenses_customfields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managercategories`
--
ALTER TABLE `managercategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificationtemplates`
--
ALTER TABLE `notificationtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_admins`
--
ALTER TABLE `projects_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smslog`
--
ALTER TABLE `smslog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `statuscodes`
--
ALTER TABLE `statuscodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemlog`
--
ALTER TABLE `systemlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_departments`
--
ALTER TABLE `tickets_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_pr`
--
ALTER TABLE `tickets_pr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_replies`
--
ALTER TABLE `tickets_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_rules`
--
ALTER TABLE `tickets_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelog`
--
ALTER TABLE `timelog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `approvalcategories`
--
ALTER TABLE `approvalcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assetcategories`
--
ALTER TABLE `assetcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assetsallocate`
--
ALTER TABLE `assetsallocate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assetsreturn`
--
ALTER TABLE `assetsreturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assets_customfields`
--
ALTER TABLE `assets_customfields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients_admins`
--
ALTER TABLE `clients_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `consumables`
--
ALTER TABLE `consumables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departmentcategories`
--
ALTER TABLE `departmentcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emaillog`
--
ALTER TABLE `emaillog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hosts`
--
ALTER TABLE `hosts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hosts_checks`
--
ALTER TABLE `hosts_checks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hosts_history`
--
ALTER TABLE `hosts_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hosts_people`
--
ALTER TABLE `hosts_people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kb_articles`
--
ALTER TABLE `kb_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kb_categories`
--
ALTER TABLE `kb_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `licensecategories`
--
ALTER TABLE `licensecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `licensereturn`
--
ALTER TABLE `licensereturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `licensesallocate`
--
ALTER TABLE `licensesallocate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `licenses_assets`
--
ALTER TABLE `licenses_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `licenses_customfields`
--
ALTER TABLE `licenses_customfields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managercategories`
--
ALTER TABLE `managercategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notificationtemplates`
--
ALTER TABLE `notificationtemplates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects_admins`
--
ALTER TABLE `projects_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `smslog`
--
ALTER TABLE `smslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuscodes`
--
ALTER TABLE `statuscodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `systemlog`
--
ALTER TABLE `systemlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_departments`
--
ALTER TABLE `tickets_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets_pr`
--
ALTER TABLE `tickets_pr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets_replies`
--
ALTER TABLE `tickets_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_rules`
--
ALTER TABLE `tickets_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timelog`
--
ALTER TABLE `timelog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
