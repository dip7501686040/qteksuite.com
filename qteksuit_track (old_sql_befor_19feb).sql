-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2019 at 07:01 PM
-- Server version: 10.2.22-MariaDB
-- PHP Version: 7.2.7

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
(5, 'Routers', '#0b7c36');

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
(1, 1, 0, 1, 0, 0, 4, 1, 3, '2016-02-01', 24, 'IT-1', 'Desktop 1', 'QWERT12345', '', 0, '', '', 'assets', ''),
(2, 3, 0, 2, 0, 0, 3, 1, 3, '2016-02-01', 24, 'IT-2', 'DC Server', 'ASDFG12345', '', 0, '', '', 'assets', ''),
(3, 2, 0, 2, 0, 0, 1, 3, 3, '2016-02-01', 24, 'IT-3', 'Laptop 1', 'BNMHJK98765', '', 0, '', '', 'assets', ''),
(4, 2, 0, 3, 2, 9, 4, 1, 3, '2019-01-23', 36, 'LAP-0001', 'Lenovo Laptop', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '', 0, 'a:3:{i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}', '', 'assets', '');

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
(1, 3, '2019-02-07 00:00:00', '2019-02-08 00:00:00', 'Test', 1, ''),
(3, 3, '2019-02-09 00:00:00', '2019-02-09 00:00:00', 'Test again by pratik', 2, '');

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
(1, 1, 1, '4', 1, 1, 1, 1, 'Comments edit by pratik.', '2019-02-10 00:00:00', '2019-02-16 00:00:00', 1, '');

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
(3, 'QITCS', 'IT-', 'ITL-', '');

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
(4, 'ASE Test Ltd');

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
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `company_name`, `consumables_name`, `category`, `manufacture`, `location`, `model_no`, `item_no`, `order_no`, `purchase_date`, `purchase_cost`, `currency`, `quanitity`, `image`) VALUES
(1, '1', 'Consumar name', '2', '3', 'indore', 'MacBook Air', '0987', '123', '2019-02-01', '200', '2', '2', 'uploads/components/logo.png'),
(5, '2', 'asdfas', '3', '1', 'asdf', '4', 'asdf', 'sdaf', '2019-02-09', 'asdf', '4', '3', 'uploads/components/logo.png'),
(6, '4', 'Ram', '4', '4', 'Hyderabad', '4', '12', 'jgsuahfjl', '2019-02-05', '50', '1', '10', 'uploads/components/logo.png');

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
('email_from_address', 'ontrack@example.com'),
('email_from_name', 'OnTrack'),
('email_smtp_enable', 'false'),
('email_smtp_host', ''),
('email_smtp_port', ''),
('email_smtp_username', ''),
('email_smtp_password', ''),
('email_smtp_security', ''),
('email_smtp_domain', ''),
('email_smtp_auth', 'false'),
('week_start', '1'),
('log_retention', '365'),
('tickets_encrypton', ''),
('tickets_password', ''),
('tickets_username', ''),
('tickets_server', ''),
('license_tag_prefix', 'ITL-'),
('asset_tag_prefix', 'IT-'),
('company_details', ''),
('company_name', 'QTEK SUITE'),
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
('timezone', 'UTC'),
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
(2, 2, 1, 'shaikhameed.hassain@gmail.com', 'Ticket #768810 created', '<p>Hello hameed,<br><br>A new ticket has been created for your request.<br>Ticket ID:<b> #768810</b><br><br><br><br>You can reply to this email to add additional information.<br>Please do not remove the ticket number from the subject line.<br><br>Best regards,<br>QTEK SUITE</p>', '2019-02-05 14:38:12'),
(3, 1, 0, 'admin@gmail.com', 'New Support Ticket #768810', '<p>A new support ticket has been opened.</p>\n<p>Ticket ID:<b> #768810</b><br>Subject: New Hardware </p>\n<p><br></p><br>\n<p>Best regards,<br>QTEK SUITE</p>', '2019-02-05 14:38:13'),
(4, 2, 1, 'shaikhameed.hassain@gmail.com', '#768810 New Reply', '<p>Hello hameed,<br><br>A new reply has been added to your ticket.<br><br>Ticket ID: #768810<br><br><br><br>You can reply to this email to add additional information.<br>Please do not remove the ticket number from the subject line.<br><br>Best regards,<br>QTEK SUITE<br></p>', '2019-02-05 14:38:37');

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
(4, '1', 1, '2', 1, 1, 1, 1, 'Test', '2019-02-21 00:00:00', '2019-02-22 00:00:00', 1),
(5, '1', 3, '2', 1, 1, 1, 1, 'test1', '2019-02-19 00:00:00', '2019-02-20 00:00:00', 1);

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
  `qrvalue` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`id`, `clientid`, `statusid`, `categoryid`, `supplierid`, `seats`, `tag`, `name`, `serial`, `notes`, `customfields`, `qrvalue`) VALUES
(1, 1, 3, 1, 1, '1', 'ITL-1', 'Windows 10 Pro', 'ASDG1234', '', '', ''),
(2, 1, 3, 1, 0, '5', 'ITL-2', 'Office Home & Business 2016', 'ASDG1245', '', '', ''),
(3, 2, 3, 1, 3, '1', 'ITL-3', 'Windows Server 2012 R2 Essentials', 'ASDF125E', '', '', ''),
(4, 2, 3, 3, 1, '', 'ITL-4', 'Corel Draw x5', 'ASDFGH234', '', '', '');

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
(4, 2, '2019-02-09 00:00:00', '2019-02-09 00:00:00', 'Hello licenses allocate', 3);

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
(3, 1, 2);

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
(1, 1, 'Test Location');

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
(1, 'admin', 1, 0, 'admin', 'admin@gmail.com', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'skin-blue', 'opened', '', '', '', 'inkn3m7l2s3e2o4vq9nal0sde4', '', 30000, 'en', 1, ''),
(2, 'user', 2, 3, 'hameed', 'shaikhameed.hassain@gmail.com', '', 'System Admin', '9985495995', 'eebfbdb0fa2bbb9afbffb4c1bb44e5401aef3733', 'skin-blue', 'opened', '', '', '', 'bsars3j9bd6cbtrla03p91nag2', '', 0, 'en', 0, '');

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
(1, 'admin', 'Super Administrator', 'a:144:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:12:\"addMilestone\";i:26;s:13:\"editMilestone\";i:27;s:15:\"deleteMilestone\";i:28;s:16:\"releaseMilestone\";i:29;s:14:\"viewMilestones\";i:30;s:7:\"addTime\";i:31;s:8:\"editTime\";i:32;s:10:\"deleteTime\";i:33;s:8:\"viewTime\";i:34;s:9:\"addTicket\";i:35;s:10:\"editTicket\";i:36;s:12:\"deleteTicket\";i:37;s:12:\"manageTicket\";i:38;s:17:\"manageTicketRules\";i:39;s:17:\"manageTicketNotes\";i:40;s:22:\"manageTicketAssignment\";i:41;s:11:\"viewTickets\";i:42;s:8:\"addIssue\";i:43;s:9:\"editIssue\";i:44;s:11:\"deleteIssue\";i:45;s:11:\"manageIssue\";i:46;s:10:\"viewIssues\";i:47;s:10:\"addComment\";i:48;s:11:\"editComment\";i:49;s:13:\"deleteComment\";i:50;s:13:\"assignComment\";i:51;s:12:\"viewComments\";i:52;s:13:\"addCredential\";i:53;s:14:\"editCredential\";i:54;s:16:\"deleteCredential\";i:55;s:14:\"viewCredential\";i:56;s:15:\"viewCredentials\";i:57;s:5:\"addKB\";i:58;s:6:\"editKB\";i:59;s:8:\"deleteKB\";i:60;s:6:\"viewKB\";i:61;s:9:\"addPReply\";i:62;s:10:\"editPReply\";i:63;s:12:\"deletePReply\";i:64;s:12:\"viewPReplies\";i:65;s:10:\"uploadFile\";i:66;s:12:\"downloadFile\";i:67;s:10:\"deleteFile\";i:68;s:9:\"viewFiles\";i:69;s:7:\"addHost\";i:70;s:8:\"editHost\";i:71;s:10:\"deleteHost\";i:72;s:10:\"manageHost\";i:73;s:14:\"viewMonitoring\";i:74;s:7:\"addUser\";i:75;s:8:\"editUser\";i:76;s:10:\"deleteUser\";i:77;s:9:\"viewUsers\";i:78;s:8:\"addStaff\";i:79;s:9:\"editStaff\";i:80;s:11:\"deleteStaff\";i:81;s:9:\"viewStaff\";i:82;s:7:\"addRole\";i:83;s:8:\"editRole\";i:84;s:10:\"deleteRole\";i:85;s:9:\"viewRoles\";i:86;s:10:\"addContact\";i:87;s:11:\"editContact\";i:88;s:13:\"deleteContact\";i:89;s:12:\"viewContacts\";i:90;s:14:\"addCustomField\";i:91;s:15:\"editCustomField\";i:92;s:17:\"deleteCustomField\";i:93;s:16:\"viewCustomFields\";i:94;s:10:\"manageData\";i:95;s:14:\"manageSettings\";i:96;s:13:\"manageApiKeys\";i:97;s:8:\"viewLogs\";i:98;s:10:\"viewSystem\";i:99;s:10:\"viewPeople\";i:100;s:11:\"viewReports\";i:101;s:11:\"autorefresh\";i:102;s:6:\"search\";i:103;s:13:\"addComponents\";i:104;s:14:\"editComponents\";i:105;s:16:\"deleteComponents\";i:106;s:16:\"manageComponents\";i:107;s:14:\"viewComponents\";i:108;s:14:\"addConsumables\";i:109;s:15:\"editConsumables\";i:110;s:17:\"deleteConsumables\";i:111;s:17:\"manageConsumables\";i:112;s:15:\"viewConsumables\";i:113;s:7:\"viewSam\";i:114;s:6:\"addSam\";i:115;s:7:\"editSam\";i:116;s:9:\"deleteSam\";i:117;s:9:\"manageSam\";i:118;s:18:\"viewAssetsallocate\";i:119;s:17:\"addAssetsallocate\";i:120;s:18:\"editAssetsallocate\";i:121;s:20:\"deleteAssetsallocate\";i:122;s:20:\"manageAssetsallocate\";i:123;s:20:\"viewLicensesallocate\";i:124;s:19:\"addLicensesallocate\";i:125;s:20:\"editLicensesallocate\";i:126;s:22:\"deleteLicensesallocate\";i:127;s:22:\"manageLicensesallocate\";i:128;s:10:\"viewMaster\";i:129;s:9:\"addMaster\";i:130;s:10:\"editMaster\";i:131;s:12:\"deleteMaster\";i:132;s:12:\"manageMaster\";i:133;s:16:\"viewAssetsreturn\";i:134;s:15:\"addAssetsreturn\";i:135;s:16:\"editAssetsreturn\";i:136;s:18:\"deleteAssetsreturn\";i:137;s:18:\"manageAssetsreturn\";i:138;s:17:\"viewLicensereturn\";i:139;s:16:\"addLicensereturn\";i:140;s:17:\"editLicensereturn\";i:141;s:19:\"deleteLicensereturn\";i:142;s:19:\"manageLicensereturn\";i:143;s:4:\"Null\";}a:144:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:12:\"addMilestone\";i:26;s:13:\"editMilestone\";i:27;s:15:\"deleteMilestone\";i:28;s:16:\"releaseMilestone\";i:29;s:14:\"viewMilestones\";i:30;s:7:\"addTime\";i:31;s:8:\"editTime\";i:32;s:10:\"deleteTime\";i:33;s:8:\"viewTime\";i:34;s:9:\"addTicket\";i:35;s:10:\"editTicket\";i:36;s:12:\"deleteTicket\";i:37;s:12:\"manageTicket\";i:38;s:17:\"manageTicketRules\";i:39;s:17:\"manageTicketNotes\";i:40;s:22:\"manageTicketAssignment\";i:41;s:11:\"viewTickets\";i:42;s:8:\"addIssue\";i:43;s:9:\"editIssue\";i:44;s:11:\"deleteIssue\";i:45;s:11:\"manageIssue\";i:46;s:10:\"viewIssues\";i:47;s:10:\"addComment\";i:48;s:11:\"editComment\";i:49;s:13:\"deleteComment\";i:50;s:13:\"assignComment\";i:51;s:12:\"viewComments\";i:52;s:13:\"addCredential\";i:53;s:14:\"editCredential\";i:54;s:16:\"deleteCredential\";i:55;s:14:\"viewCredential\";i:56;s:15:\"viewCredentials\";i:57;s:5:\"addKB\";i:58;s:6:\"editKB\";i:59;s:8:\"deleteKB\";i:60;s:6:\"viewKB\";i:61;s:9:\"addPReply\";i:62;s:10:\"editPReply\";i:63;s:12:\"deletePReply\";i:64;s:12:\"viewPReplies\";i:65;s:10:\"uploadFile\";i:66;s:12:\"downloadFile\";i:67;s:10:\"deleteFile\";i:68;s:9:\"viewFiles\";i:69;s:7:\"addHost\";i:70;s:8:\"editHost\";i:71;s:10:\"deleteHost\";i:72;s:10:\"manageHost\";i:73;s:14:\"viewMonitoring\";i:74;s:7:\"addUser\";i:75;s:8:\"editUser\";i:76;s:10:\"deleteUser\";i:77;s:9:\"viewUsers\";i:78;s:8:\"addStaff\";i:79;s:9:\"editStaff\";i:80;s:11:\"deleteStaff\";i:81;s:9:\"viewStaff\";i:82;s:7:\"addRole\";i:83;s:8:\"editRole\";i:84;s:10:\"deleteRole\";i:85;s:9:\"viewRoles\";i:86;s:10:\"addContact\";i:87;s:11:\"editContact\";i:88;s:13:\"deleteContact\";i:89;s:12:\"viewContacts\";i:90;s:14:\"addCustomField\";i:91;s:15:\"editCustomField\";i:92;s:17:\"deleteCustomField\";i:93;s:16:\"viewCustomFields\";i:94;s:10:\"manageData\";i:95;s:14:\"manageSettings\";i:96;s:13:\"manageApiKeys\";i:97;s:8:\"viewLogs\";i:98;s:10:\"viewSystem\";i:99;s:10:\"viewPeople\";i:100;s:11:\"viewReports\";i:101;s:11:\"autorefresh\";i:102;s:6:\"search\";i:103;s:13:\"addComponents\";i:104;s:14:\"editComponents\";i:105;s:16:\"deleteComponents\";i:106;s:16:\"manageComponents\";i:107;s:14:\"viewComponents\";i:108;s:14:\"addConsumables\";i:109;s:15:\"editConsumables\";i:110;s:17:\"deleteConsumables\";i:111;s:17:\"manageConsumables\";i:112;s:15:\"viewConsumables\";i:113;s:7:\"viewSam\";i:114;s:6:\"addSam\";i:115;s:7:\"editSam\";i:116;s:9:\"deleteSam\";i:117;s:9:\"manageSam\";i:118;s:18:\"viewAssetsallocate\";i:119;s:17:\"addAssetsallocate\";i:120;s:18:\"editAssetsallocate\";i:121;s:20:\"deleteAssetsallocate\";i:122;s:20:\"manageAssetsallocate\";i:123;s:20:\"viewLicensesallocate\";i:124;s:19:\"addLicensesallocate\";i:125;s:20:\"editLicensesallocate\";i:126;s:22:\"deleteLicensesallocate\";i:127;s:22:\"manageLicensesallocate\";i:128;s:10:\"viewMaster\";i:129;s:9:\"addMaster\";i:130;s:10:\"editMaster\";i:131;s:12:\"deleteMaster\";i:132;s:12:\"manageMaster\";i:133;s:16:\"viewAssetsreturn\";i:134;s:15:\"addAssetsreturn\";i:135;s:16:\"editAssetsreturn\";i:136;s:18:\"deleteAssetsreturn\";i:137;s:18:\"manageAssetsreturn\";i:138;s:17:\"viewLicensereturn\";i:139;s:16:\"addLicensereturn\";i:140;s:17:\"editLicensereturn\";i:141;s:19:\"deleteLicensereturn\";i:142;s:19:\"manageLicensereturn\";i:143;s:4:\"Null\";}'),
(2, 'user', 'Standard User', 'a:144:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:12:\"addMilestone\";i:26;s:13:\"editMilestone\";i:27;s:15:\"deleteMilestone\";i:28;s:16:\"releaseMilestone\";i:29;s:14:\"viewMilestones\";i:30;s:7:\"addTime\";i:31;s:8:\"editTime\";i:32;s:10:\"deleteTime\";i:33;s:8:\"viewTime\";i:34;s:9:\"addTicket\";i:35;s:10:\"editTicket\";i:36;s:12:\"deleteTicket\";i:37;s:12:\"manageTicket\";i:38;s:17:\"manageTicketRules\";i:39;s:17:\"manageTicketNotes\";i:40;s:22:\"manageTicketAssignment\";i:41;s:11:\"viewTickets\";i:42;s:8:\"addIssue\";i:43;s:9:\"editIssue\";i:44;s:11:\"deleteIssue\";i:45;s:11:\"manageIssue\";i:46;s:10:\"viewIssues\";i:47;s:10:\"addComment\";i:48;s:11:\"editComment\";i:49;s:13:\"deleteComment\";i:50;s:13:\"assignComment\";i:51;s:12:\"viewComments\";i:52;s:13:\"addCredential\";i:53;s:14:\"editCredential\";i:54;s:16:\"deleteCredential\";i:55;s:14:\"viewCredential\";i:56;s:15:\"viewCredentials\";i:57;s:5:\"addKB\";i:58;s:6:\"editKB\";i:59;s:8:\"deleteKB\";i:60;s:6:\"viewKB\";i:61;s:9:\"addPReply\";i:62;s:10:\"editPReply\";i:63;s:12:\"deletePReply\";i:64;s:12:\"viewPReplies\";i:65;s:10:\"uploadFile\";i:66;s:12:\"downloadFile\";i:67;s:10:\"deleteFile\";i:68;s:9:\"viewFiles\";i:69;s:7:\"addHost\";i:70;s:8:\"editHost\";i:71;s:10:\"deleteHost\";i:72;s:10:\"manageHost\";i:73;s:14:\"viewMonitoring\";i:74;s:7:\"addUser\";i:75;s:8:\"editUser\";i:76;s:10:\"deleteUser\";i:77;s:9:\"viewUsers\";i:78;s:8:\"addStaff\";i:79;s:9:\"editStaff\";i:80;s:11:\"deleteStaff\";i:81;s:9:\"viewStaff\";i:82;s:7:\"addRole\";i:83;s:8:\"editRole\";i:84;s:10:\"deleteRole\";i:85;s:9:\"viewRoles\";i:86;s:10:\"addContact\";i:87;s:11:\"editContact\";i:88;s:13:\"deleteContact\";i:89;s:12:\"viewContacts\";i:90;s:14:\"addCustomField\";i:91;s:15:\"editCustomField\";i:92;s:17:\"deleteCustomField\";i:93;s:16:\"viewCustomFields\";i:94;s:10:\"manageData\";i:95;s:14:\"manageSettings\";i:96;s:13:\"manageApiKeys\";i:97;s:8:\"viewLogs\";i:98;s:10:\"viewSystem\";i:99;s:10:\"viewPeople\";i:100;s:11:\"viewReports\";i:101;s:11:\"autorefresh\";i:102;s:6:\"search\";i:103;s:13:\"addComponents\";i:104;s:14:\"editComponents\";i:105;s:16:\"deleteComponents\";i:106;s:16:\"manageComponents\";i:107;s:14:\"viewComponents\";i:108;s:14:\"addConsumables\";i:109;s:15:\"editConsumables\";i:110;s:17:\"deleteConsumables\";i:111;s:17:\"manageConsumables\";i:112;s:15:\"viewConsumables\";i:113;s:7:\"viewSam\";i:114;s:6:\"addSam\";i:115;s:7:\"editSam\";i:116;s:9:\"deleteSam\";i:117;s:9:\"manageSam\";i:118;s:18:\"viewAssetsallocate\";i:119;s:17:\"addAssetsallocate\";i:120;s:18:\"editAssetsallocate\";i:121;s:20:\"deleteAssetsallocate\";i:122;s:20:\"manageAssetsallocate\";i:123;s:20:\"viewLicensesallocate\";i:124;s:19:\"addLicensesallocate\";i:125;s:20:\"editLicensesallocate\";i:126;s:22:\"deleteLicensesallocate\";i:127;s:22:\"manageLicensesallocate\";i:128;s:10:\"viewMaster\";i:129;s:9:\"addMaster\";i:130;s:10:\"editMaster\";i:131;s:12:\"deleteMaster\";i:132;s:12:\"manageMaster\";i:133;s:16:\"viewAssetsreturn\";i:134;s:15:\"addAssetsreturn\";i:135;s:16:\"editAssetsreturn\";i:136;s:18:\"deleteAssetsreturn\";i:137;s:18:\"manageAssetsreturn\";i:138;s:17:\"viewLicensereturn\";i:139;s:16:\"addLicensereturn\";i:140;s:17:\"editLicensereturn\";i:141;s:19:\"deleteLicensereturn\";i:142;s:19:\"manageLicensereturn\";i:143;s:4:\"Null\";}'),
(3, 'admin', 'Administrator', 'a:144:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:12:\"addMilestone\";i:26;s:13:\"editMilestone\";i:27;s:15:\"deleteMilestone\";i:28;s:16:\"releaseMilestone\";i:29;s:14:\"viewMilestones\";i:30;s:7:\"addTime\";i:31;s:8:\"editTime\";i:32;s:10:\"deleteTime\";i:33;s:8:\"viewTime\";i:34;s:9:\"addTicket\";i:35;s:10:\"editTicket\";i:36;s:12:\"deleteTicket\";i:37;s:12:\"manageTicket\";i:38;s:17:\"manageTicketRules\";i:39;s:17:\"manageTicketNotes\";i:40;s:22:\"manageTicketAssignment\";i:41;s:11:\"viewTickets\";i:42;s:8:\"addIssue\";i:43;s:9:\"editIssue\";i:44;s:11:\"deleteIssue\";i:45;s:11:\"manageIssue\";i:46;s:10:\"viewIssues\";i:47;s:10:\"addComment\";i:48;s:11:\"editComment\";i:49;s:13:\"deleteComment\";i:50;s:13:\"assignComment\";i:51;s:12:\"viewComments\";i:52;s:13:\"addCredential\";i:53;s:14:\"editCredential\";i:54;s:16:\"deleteCredential\";i:55;s:14:\"viewCredential\";i:56;s:15:\"viewCredentials\";i:57;s:5:\"addKB\";i:58;s:6:\"editKB\";i:59;s:8:\"deleteKB\";i:60;s:6:\"viewKB\";i:61;s:9:\"addPReply\";i:62;s:10:\"editPReply\";i:63;s:12:\"deletePReply\";i:64;s:12:\"viewPReplies\";i:65;s:10:\"uploadFile\";i:66;s:12:\"downloadFile\";i:67;s:10:\"deleteFile\";i:68;s:9:\"viewFiles\";i:69;s:7:\"addHost\";i:70;s:8:\"editHost\";i:71;s:10:\"deleteHost\";i:72;s:10:\"manageHost\";i:73;s:14:\"viewMonitoring\";i:74;s:7:\"addUser\";i:75;s:8:\"editUser\";i:76;s:10:\"deleteUser\";i:77;s:9:\"viewUsers\";i:78;s:8:\"addStaff\";i:79;s:9:\"editStaff\";i:80;s:11:\"deleteStaff\";i:81;s:9:\"viewStaff\";i:82;s:7:\"addRole\";i:83;s:8:\"editRole\";i:84;s:10:\"deleteRole\";i:85;s:9:\"viewRoles\";i:86;s:10:\"addContact\";i:87;s:11:\"editContact\";i:88;s:13:\"deleteContact\";i:89;s:12:\"viewContacts\";i:90;s:14:\"addCustomField\";i:91;s:15:\"editCustomField\";i:92;s:17:\"deleteCustomField\";i:93;s:16:\"viewCustomFields\";i:94;s:10:\"manageData\";i:95;s:14:\"manageSettings\";i:96;s:13:\"manageApiKeys\";i:97;s:8:\"viewLogs\";i:98;s:10:\"viewSystem\";i:99;s:10:\"viewPeople\";i:100;s:11:\"viewReports\";i:101;s:11:\"autorefresh\";i:102;s:6:\"search\";i:103;s:13:\"addComponents\";i:104;s:14:\"editComponents\";i:105;s:16:\"deleteComponents\";i:106;s:16:\"manageComponents\";i:107;s:14:\"viewComponents\";i:108;s:14:\"addConsumables\";i:109;s:15:\"editConsumables\";i:110;s:17:\"deleteConsumables\";i:111;s:17:\"manageConsumables\";i:112;s:15:\"viewConsumables\";i:113;s:7:\"viewSam\";i:114;s:6:\"addSam\";i:115;s:7:\"editSam\";i:116;s:9:\"deleteSam\";i:117;s:9:\"manageSam\";i:118;s:18:\"viewAssetsallocate\";i:119;s:17:\"addAssetsallocate\";i:120;s:18:\"editAssetsallocate\";i:121;s:20:\"deleteAssetsallocate\";i:122;s:20:\"manageAssetsallocate\";i:123;s:20:\"viewLicensesallocate\";i:124;s:19:\"addLicensesallocate\";i:125;s:20:\"editLicensesallocate\";i:126;s:22:\"deleteLicensesallocate\";i:127;s:22:\"manageLicensesallocate\";i:128;s:10:\"viewMaster\";i:129;s:9:\"addMaster\";i:130;s:10:\"editMaster\";i:131;s:12:\"deleteMaster\";i:132;s:12:\"manageMaster\";i:133;s:16:\"viewAssetsreturn\";i:134;s:15:\"addAssetsreturn\";i:135;s:16:\"editAssetsreturn\";i:136;s:18:\"deleteAssetsreturn\";i:137;s:18:\"manageAssetsreturn\";i:138;s:17:\"viewLicensereturn\";i:139;s:16:\"addLicensereturn\";i:140;s:17:\"editLicensereturn\";i:141;s:19:\"deleteLicensereturn\";i:142;s:19:\"manageLicensereturn\";i:143;s:4:\"Null\";}'),
(4, 'admin', 'Technician', 'a:144:{i:0;s:9:\"addClient\";i:1;s:10:\"editClient\";i:2;s:12:\"deleteClient\";i:3;s:12:\"manageClient\";i:4;s:12:\"adminsClient\";i:5;s:11:\"viewClients\";i:6;s:8:\"addAsset\";i:7;s:9:\"editAsset\";i:8;s:11:\"deleteAsset\";i:9;s:11:\"manageAsset\";i:10;s:12:\"licenseAsset\";i:11;s:10:\"viewAssets\";i:12;s:10:\"addLicense\";i:13;s:11:\"editLicense\";i:14;s:13:\"deleteLicense\";i:15;s:13:\"manageLicense\";i:16;s:12:\"assetLicense\";i:17;s:12:\"viewLicenses\";i:18;s:10:\"addProject\";i:19;s:11:\"editProject\";i:20;s:13:\"deleteProject\";i:21;s:13:\"manageProject\";i:22;s:18:\"manageProjectNotes\";i:23;s:13:\"adminsProject\";i:24;s:12:\"viewProjects\";i:25;s:12:\"addMilestone\";i:26;s:13:\"editMilestone\";i:27;s:15:\"deleteMilestone\";i:28;s:16:\"releaseMilestone\";i:29;s:14:\"viewMilestones\";i:30;s:7:\"addTime\";i:31;s:8:\"editTime\";i:32;s:10:\"deleteTime\";i:33;s:8:\"viewTime\";i:34;s:9:\"addTicket\";i:35;s:10:\"editTicket\";i:36;s:12:\"deleteTicket\";i:37;s:12:\"manageTicket\";i:38;s:17:\"manageTicketRules\";i:39;s:17:\"manageTicketNotes\";i:40;s:22:\"manageTicketAssignment\";i:41;s:11:\"viewTickets\";i:42;s:8:\"addIssue\";i:43;s:9:\"editIssue\";i:44;s:11:\"deleteIssue\";i:45;s:11:\"manageIssue\";i:46;s:10:\"viewIssues\";i:47;s:10:\"addComment\";i:48;s:11:\"editComment\";i:49;s:13:\"deleteComment\";i:50;s:13:\"assignComment\";i:51;s:12:\"viewComments\";i:52;s:13:\"addCredential\";i:53;s:14:\"editCredential\";i:54;s:16:\"deleteCredential\";i:55;s:14:\"viewCredential\";i:56;s:15:\"viewCredentials\";i:57;s:5:\"addKB\";i:58;s:6:\"editKB\";i:59;s:8:\"deleteKB\";i:60;s:6:\"viewKB\";i:61;s:9:\"addPReply\";i:62;s:10:\"editPReply\";i:63;s:12:\"deletePReply\";i:64;s:12:\"viewPReplies\";i:65;s:10:\"uploadFile\";i:66;s:12:\"downloadFile\";i:67;s:10:\"deleteFile\";i:68;s:9:\"viewFiles\";i:69;s:7:\"addHost\";i:70;s:8:\"editHost\";i:71;s:10:\"deleteHost\";i:72;s:10:\"manageHost\";i:73;s:14:\"viewMonitoring\";i:74;s:7:\"addUser\";i:75;s:8:\"editUser\";i:76;s:10:\"deleteUser\";i:77;s:9:\"viewUsers\";i:78;s:8:\"addStaff\";i:79;s:9:\"editStaff\";i:80;s:11:\"deleteStaff\";i:81;s:9:\"viewStaff\";i:82;s:7:\"addRole\";i:83;s:8:\"editRole\";i:84;s:10:\"deleteRole\";i:85;s:9:\"viewRoles\";i:86;s:10:\"addContact\";i:87;s:11:\"editContact\";i:88;s:13:\"deleteContact\";i:89;s:12:\"viewContacts\";i:90;s:14:\"addCustomField\";i:91;s:15:\"editCustomField\";i:92;s:17:\"deleteCustomField\";i:93;s:16:\"viewCustomFields\";i:94;s:10:\"manageData\";i:95;s:14:\"manageSettings\";i:96;s:13:\"manageApiKeys\";i:97;s:8:\"viewLogs\";i:98;s:10:\"viewSystem\";i:99;s:10:\"viewPeople\";i:100;s:11:\"viewReports\";i:101;s:11:\"autorefresh\";i:102;s:6:\"search\";i:103;s:13:\"addComponents\";i:104;s:14:\"editComponents\";i:105;s:16:\"deleteComponents\";i:106;s:16:\"manageComponents\";i:107;s:14:\"viewComponents\";i:108;s:14:\"addConsumables\";i:109;s:15:\"editConsumables\";i:110;s:17:\"deleteConsumables\";i:111;s:17:\"manageConsumables\";i:112;s:15:\"viewConsumables\";i:113;s:7:\"viewSam\";i:114;s:6:\"addSam\";i:115;s:7:\"editSam\";i:116;s:9:\"deleteSam\";i:117;s:9:\"manageSam\";i:118;s:18:\"viewAssetsallocate\";i:119;s:17:\"addAssetsallocate\";i:120;s:18:\"editAssetsallocate\";i:121;s:20:\"deleteAssetsallocate\";i:122;s:20:\"manageAssetsallocate\";i:123;s:20:\"viewLicensesallocate\";i:124;s:19:\"addLicensesallocate\";i:125;s:20:\"editLicensesallocate\";i:126;s:22:\"deleteLicensesallocate\";i:127;s:22:\"manageLicensesallocate\";i:128;s:10:\"viewMaster\";i:129;s:9:\"addMaster\";i:130;s:10:\"editMaster\";i:131;s:12:\"deleteMaster\";i:132;s:12:\"manageMaster\";i:133;s:16:\"viewAssetsreturn\";i:134;s:15:\"addAssetsreturn\";i:135;s:16:\"editAssetsreturn\";i:136;s:18:\"deleteAssetsreturn\";i:137;s:18:\"manageAssetsreturn\";i:138;s:17:\"viewLicensereturn\";i:139;s:16:\"addLicensereturn\";i:140;s:17:\"editLicensereturn\";i:141;s:19:\"deleteLicensereturn\";i:142;s:19:\"manageLicensereturn\";i:143;s:4:\"Null\";}');

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
(1, 'Amazon', '', '', '', '', '', ''),
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
(54, -1, '47.247.206.118', 'User/Admin Logged In - ID: 1', '2019-02-02 19:55:12'),
(55, -1, '183.83.1.81', 'User/Admin Logged In - ID: 1', '2019-02-04 04:19:52'),
(56, -1, '27.5.43.29', 'User/Admin Login Failure - EMAIL: admin@admin.com', '2019-02-04 10:39:31'),
(57, -1, '27.5.43.29', 'User/Admin Login Failure - EMAIL: admin@gmail.com', '2019-02-04 10:39:41'),
(58, -1, '27.5.43.29', 'User/Admin Logged In - ID: 1', '2019-02-04 10:40:03'),
(59, -1, '116.74.34.171', 'User/Admin Logged In - ID: 1', '2019-02-05 05:28:18'),
(60, 1, '116.74.34.171', 'User/Staff Logged Out - ID: 1', '2019-02-05 05:29:22'),
(61, -1, '223.182.30.72', 'User/Admin Logged In - ID: 1', '2019-02-05 13:32:52'),
(62, 1, '223.182.30.72', 'Component Added - ID: 6', '2019-02-05 13:34:13'),
(63, -1, '116.74.34.171', 'User/Admin Logged In - ID: 1', '2019-02-05 14:13:13'),
(64, -1, '223.182.7.243', 'User/Admin Logged In - ID: 1', '2019-02-05 14:28:50'),
(65, 1, '223.182.7.243', 'Ticket Added - ID: 1', '2019-02-05 14:38:13'),
(66, 1, '223.182.7.243', 'Ticket Status Update - ID: 1', '2019-02-05 14:38:36'),
(67, 1, '223.182.7.243', 'Ticket Reply Added - ID: 2', '2019-02-05 14:38:37'),
(68, 1, '223.182.7.243', 'Support Department Added - ID: 2', '2019-02-05 14:39:58'),
(69, -1, '116.74.34.18', 'User/Admin Logged In - ID: 1', '2019-02-07 12:08:17'),
(70, -1, '106.76.206.141', 'User/Admin Logged In - ID: 1', '2019-02-07 14:09:06'),
(71, -1, '27.59.244.108', 'User/Admin Logged In - ID: 1', '2019-02-07 22:08:17'),
(72, -1, '106.76.246.23', 'User/Admin Logged In - ID: 1', '2019-02-08 05:59:44'),
(73, -1, '106.76.246.23', 'User/Admin Logged In - ID: 1', '2019-02-08 06:02:16'),
(74, -1, '106.77.182.197', 'User/Admin Logged In - ID: 1', '2019-02-08 13:44:40'),
(75, -1, '27.59.142.33', 'User/Admin Logged In - ID: 1', '2019-02-09 04:28:48'),
(76, -1, '103.44.0.221', 'User/Admin Logged In - ID: 1', '2019-02-11 11:22:29'),
(77, -1, '103.44.0.221', 'User/Admin Logged In - ID: 1', '2019-02-11 15:50:52'),
(78, -1, '157.48.12.42', 'User/Admin Logged In - ID: 1', '2019-02-12 06:09:28'),
(79, 1, '157.48.57.23', 'Ticket Edited - ID: 1', '2019-02-13 18:53:58'),
(80, -1, '116.75.193.90', 'User/Admin Logged In - ID: 1', '2019-02-19 08:46:31'),
(81, 1, '116.75.193.90', 'License Return Deleted - ID: 1', '2019-02-19 09:26:17'),
(82, 1, '116.75.193.90', 'License Return Added - ID: 5', '2019-02-19 09:27:03'),
(83, 1, '116.75.193.90', 'License Return Edited - ID: 5', '2019-02-19 09:27:46'),
(84, -1, '103.44.0.234', 'User/Admin Logged In - ID: 1', '2019-02-19 11:10:38'),
(85, -1, '116.75.193.90', 'User/Admin Logged In - ID: 1', '2019-02-19 11:11:03'),
(86, -1, '103.44.0.234', 'User/Admin Logged In - ID: 1', '2019-02-19 11:11:26'),
(87, -1, '116.75.197.25', 'User/Admin Logged In - ID: 1', '2019-02-20 14:04:37'),
(88, -1, '103.44.0.168', 'User/Admin Logged In - ID: 1', '2019-02-20 18:08:16'),
(89, -1, '103.44.0.174', 'User/Admin Logged In - ID: 1', '2019-02-21 17:16:28'),
(90, -1, '103.44.0.174', 'User/Admin Logged In - ID: 1', '2019-02-21 17:19:11'),
(91, -1, '116.74.33.17', 'User/Admin Logged In - ID: 1', '2019-02-22 12:50:30'),
(92, -1, '116.74.33.17', 'User/Admin Logged In - ID: 1', '2019-02-22 12:50:54'),
(93, -1, '103.44.0.193', 'User/Admin Logged In - ID: 1', '2019-02-22 12:54:38'),
(94, -1, '116.74.33.17', 'User/Admin Logged In - ID: 1', '2019-02-22 12:55:45');

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

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket`, `departmentid`, `clientid`, `userid`, `adminid`, `assetid`, `projectid`, `email`, `subject`, `status`, `priority`, `timestamp`, `notes`, `ccs`, `timespent`) VALUES
(1, 768810, 1, 1, 2, 1, 1, 1, 'shaikhameed.hassain@gmail.com', 'New Hardware ', 'Closed', 'Normal', '2019-02-05 14:38:10', '', '', 0);

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
(1, 'Default Department', ''),
(2, 'IT', 'support@qtekit.com');

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

--
-- Dumping data for table `tickets_replies`
--

INSERT INTO `tickets_replies` (`id`, `ticketid`, `peopleid`, `message`, `timestamp`) VALUES
(1, 1, 1, '', '2019-02-05 14:38:10'),
(2, 1, 1, '', '2019-02-05 14:38:36');

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
(3, 0, 1, 0, 1, 'a:1:{i:0;s:1:\"3\";}', 'a:0:{}', 'Coverted from issue\'s time spent during 1.11 version upgrade.', '2016-02-03', '00:00:00', '00:45:00'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assetsallocate`
--
ALTER TABLE `assetsallocate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assetsreturn`
--
ALTER TABLE `assetsreturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assets_customfields`
--
ALTER TABLE `assets_customfields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `licensereturn`
--
ALTER TABLE `licensereturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `licensesallocate`
--
ALTER TABLE `licensesallocate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `licenses_assets`
--
ALTER TABLE `licenses_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `licenses_customfields`
--
ALTER TABLE `licenses_customfields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets_departments`
--
ALTER TABLE `tickets_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets_pr`
--
ALTER TABLE `tickets_pr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets_replies`
--
ALTER TABLE `tickets_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
