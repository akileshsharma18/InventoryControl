-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 02:34 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intmgt1`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_admin`
--

CREATE TABLE `company_admin` (
  `com_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `count` int(10) DEFAULT '0',
  `imgpath` varchar(100) NOT NULL DEFAULT 'Logo/default-company-logo.jpg',
  `cooid` varchar(50) DEFAULT NULL,
  `lldt` date DEFAULT NULL,
  `typeoforg` varchar(50) NOT NULL,
  `empid` varchar(30) NOT NULL,
  `phoneno` bigint(100) NOT NULL,
  `comaddress` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `regdate` date NOT NULL,
  `alter_email` varchar(100) NOT NULL,
  `last_mod` date DEFAULT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `h_id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_admin`
--

INSERT INTO `company_admin` (`com_name`, `username`, `password`, `count`, `imgpath`, `cooid`, `lldt`, `typeoforg`, `empid`, `phoneno`, `comaddress`, `url`, `regdate`, `alter_email`, `last_mod`, `question`, `answer`, `fname`, `h_id`) VALUES
('HP', 'aniket1996@gmail.com', '123', 7, 'Logo/Iron Man SM.jpg', '101', '2018-04-17', 'Electronics', '201', 8050012797, 'Bengaluru,Karnataka 560072', 'hp.com', '2018-03-01', 'oshin1996@yahoo.com', '2018-04-17', 'Pet name', 'Dhruv', 'Aniket', 1),
('Dell', 'akilesh.sharma18@gmail.com', '123', 4, 'Logo/d8f853d317e133ff04eb727b06f56e58.jpg', NULL, '2018-04-18', 'Electronics', '78124', 8050012797, 'PES University, Dwaraka Nagar, Banashankari, Bengaluru, Karnataka, India', 'dell.com', '2018-04-18', 'akilesh.sharma18@outlook.com', NULL, 'Current Laptop', 'Dell', 'Akilesh', 13);

-- --------------------------------------------------------

--
-- Table structure for table `com_list`
--

CREATE TABLE `com_list` (
  `com_name` varchar(50) NOT NULL,
  `com_admin` varchar(50) NOT NULL,
  `date_of_reg` varchar(50) NOT NULL,
  `type_org` varchar(50) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_list`
--

INSERT INTO `com_list` (`com_name`, `com_admin`, `date_of_reg`, `type_org`, `feedback`, `email`, `url`) VALUES
('HP', 'Aniket', '2018-03-01', 'Electronics', 'Best', 'hp_2018_india@hp.com', 'www.hp.com'),
('Dell', 'Akilesh', '2018-04-18', 'Electronics', 'NULL', 'akilesh.sharma18@gmail.com', 'dell.com');

-- --------------------------------------------------------

--
-- Table structure for table `dell_category`
--

CREATE TABLE `dell_category` (
  `name` varchar(50) DEFAULT NULL,
  `noofpro` int(10) DEFAULT NULL,
  `shop_id` varchar(50) DEFAULT NULL,
  `alert` int(5) DEFAULT NULL,
  `shelf_no` int(10) DEFAULT NULL,
  `rack_no` int(10) DEFAULT NULL,
  `room_no` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dell_category`
--

INSERT INTO `dell_category` (`name`, `noofpro`, `shop_id`, `alert`, `shelf_no`, `rack_no`, `room_no`) VALUES
('Laptop', 1122, '10000', 50, 67, 87, 2),
('Desktop', 100, '10000', 100, 4, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dell_employee`
--

CREATE TABLE `dell_employee` (
  `empid` varchar(50) NOT NULL,
  `E_Gender` varchar(10) DEFAULT NULL,
  `E_Age` int(10) DEFAULT NULL,
  `E_Name` varchar(50) DEFAULT NULL,
  `E_DOJ` date DEFAULT NULL,
  `E_Designation` varchar(50) DEFAULT NULL,
  `E_Salary` int(30) DEFAULT NULL,
  `E_phone` bigint(100) DEFAULT NULL,
  `E_alter_email` varchar(100) DEFAULT NULL,
  `E_address` varchar(100) DEFAULT NULL,
  `E_experience` int(10) DEFAULT NULL,
  `E_specialization` varchar(50) DEFAULT NULL,
  `com_name` varchar(50) DEFAULT NULL,
  `balance` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dell_employee`
--

INSERT INTO `dell_employee` (`empid`, `E_Gender`, `E_Age`, `E_Name`, `E_DOJ`, `E_Designation`, `E_Salary`, `E_phone`, `E_alter_email`, `E_address`, `E_experience`, `E_specialization`, `com_name`, `balance`) VALUES
('78124', 'Male', 19, 'Akilesh', '2018-04-18', 'Company Admin', 40000, 9900245549, 'akilesh.sharma18@outlook.com', '1143, 13th cross Chandra Layout', 5, 'C#', 'Dell', 5000),
('76512', 'Male', 20, 'Harshit', '2018-04-18', 'Shop_Admin', 20000, 8892166080, 'harshitdave7@outlook.com', 'Jp Nagar 7th phase', 5, 'Unity', 'Dell', 4000),
('77123', 'Male', 20, 'Aniket', '2018-04-18', 'Shop_Admin', 10000, 8317312796, 'aniket1998@yahoo.com', 'Banashankari', 5, 'C++', 'Dell', 6500);

-- --------------------------------------------------------

--
-- Table structure for table `dell_feedback`
--

CREATE TABLE `dell_feedback` (
  `feed_id` varchar(50) NOT NULL,
  `from_empid` varchar(50) DEFAULT NULL,
  `to` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `feedback` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dell_history`
--

CREATE TABLE `dell_history` (
  `his_id` int(50) NOT NULL,
  `shopadmin_empid` varchar(50) DEFAULT NULL,
  `keeper_empid` varchar(50) DEFAULT NULL,
  `cat_name` varchar(50) DEFAULT NULL,
  `from_loc` varchar(50) DEFAULT NULL,
  `to_loc` varchar(50) DEFAULT NULL,
  `No_of_pro` int(50) DEFAULT NULL,
  `Mode_trans` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dell_map`
--

CREATE TABLE `dell_map` (
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `shop_id` varchar(50) DEFAULT NULL,
  `h_id` varchar(50) DEFAULT NULL,
  `type` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dell_map`
--

INSERT INTO `dell_map` (`latitude`, `longitude`, `address`, `city`, `shop_id`, `h_id`, `type`) VALUES
(12.934495, 77.534515, '1143, 13th cross Chandra Layout', 'Bangalore', 'NULL', '13', 'H'),
(12.976664, 77.571259, 'Majestic, Bengaluru, Karnataka, India', 'Bangalore', '10000', 'NULL', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `dell_money_transaction`
--

CREATE TABLE `dell_money_transaction` (
  `trans_id` int(50) NOT NULL,
  `from_empid` varchar(50) DEFAULT NULL,
  `to_empid` varchar(50) DEFAULT NULL,
  `total_amount` int(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `Back_Acc_From` varchar(50) DEFAULT NULL,
  `Bank_Acc_To` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dell_money_transaction`
--

INSERT INTO `dell_money_transaction` (`trans_id`, `from_empid`, `to_empid`, `total_amount`, `date`, `Back_Acc_From`, `Bank_Acc_To`) VALUES
(10000, '76512', '78124', 500, '2018-04-18', '4321', '1234'),
(10001, '78124', '76512', 500, '2018-04-18', '4321', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `dell_shop_admin`
--

CREATE TABLE `dell_shop_admin` (
  `shop_id` int(50) NOT NULL,
  `empid` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `count` int(20) DEFAULT NULL,
  `imgpath` varchar(50) DEFAULT NULL,
  `cooid` varchar(50) DEFAULT NULL,
  `lldt` date DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  `last_mod` date DEFAULT NULL,
  `question` varchar(50) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dell_shop_admin`
--

INSERT INTO `dell_shop_admin` (`shop_id`, `empid`, `username`, `password`, `count`, `imgpath`, `cooid`, `lldt`, `regdate`, `last_mod`, `question`, `answer`, `approval`) VALUES
(10000, '76512', 'hashitdave10@gmail.com', '123', 4, 'Logo/d8f853d317e133ff04eb727b06f56e58.jpg', NULL, '2018-04-18', '2018-04-18', NULL, 'Current Laptop', 'HP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dell_shop_keeper`
--

CREATE TABLE `dell_shop_keeper` (
  `keep_id` int(50) NOT NULL,
  `shop_id` varchar(50) DEFAULT NULL,
  `empid` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `count` int(20) DEFAULT NULL,
  `imgpath` varchar(50) DEFAULT NULL,
  `cooid` varchar(50) DEFAULT NULL,
  `lldt` date DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  `last_mod` date DEFAULT NULL,
  `question` varchar(50) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dell_shop_keeper`
--

INSERT INTO `dell_shop_keeper` (`keep_id`, `shop_id`, `empid`, `username`, `password`, `count`, `imgpath`, `cooid`, `lldt`, `regdate`, `last_mod`, `question`, `answer`, `approval`) VALUES
(10000, '10000', '77123', 'aniket1996@gmail.com', '123', 2, 'Logo/d8f853d317e133ff04eb727b06f56e58.jpg', NULL, '2018-04-18', '2018-04-18', NULL, 'Current Laptop', 'Dell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hp_category`
--

CREATE TABLE `hp_category` (
  `name` varchar(50) DEFAULT NULL,
  `noofpro` int(10) DEFAULT NULL,
  `shop_id` varchar(50) NOT NULL,
  `alert` int(5) DEFAULT NULL,
  `shelf_no` int(10) DEFAULT NULL,
  `rack_no` int(10) DEFAULT NULL,
  `room_no` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hp_category`
--

INSERT INTO `hp_category` (`name`, `noofpro`, `shop_id`, `alert`, `shelf_no`, `rack_no`, `room_no`) VALUES
('Laptop', 101, '2', 50, NULL, NULL, NULL),
('Laptop', 9900, '1', 50, NULL, NULL, NULL),
('Desktop', 0, '1', 100, NULL, NULL, NULL),
('Desktop', 0, '2', 100, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hp_employee`
--

CREATE TABLE `hp_employee` (
  `empid` varchar(50) NOT NULL,
  `E_Gender` varchar(10) DEFAULT NULL,
  `E_Age` int(10) DEFAULT NULL,
  `E_Name` varchar(50) DEFAULT NULL,
  `E_DOJ` date DEFAULT NULL,
  `E_Designation` varchar(50) DEFAULT NULL,
  `E_Salary` int(30) DEFAULT NULL,
  `E_phone` int(20) DEFAULT NULL,
  `E_alter_email` varchar(70) DEFAULT NULL,
  `E_address` varchar(100) DEFAULT NULL,
  `E_experience` int(10) DEFAULT NULL,
  `E_specialization` varchar(50) DEFAULT NULL,
  `com_name` varchar(50) DEFAULT NULL,
  `balance` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hp_employee`
--

INSERT INTO `hp_employee` (`empid`, `E_Gender`, `E_Age`, `E_Name`, `E_DOJ`, `E_Designation`, `E_Salary`, `E_phone`, `E_alter_email`, `E_address`, `E_experience`, `E_specialization`, `com_name`, `balance`) VALUES
('12678', 'Male', 19, 'Akilesh', '2018-04-02', 'Shop_Admin', 15000, 805001279, 'akilesh.sharma18@outlook.com', '#1143, Chandra Layout, Bangalore 560072', 1, 'C, C++, Java, C#', 'HP', 5000),
('123679', 'Male', 19, 'Harshit Dave', '2018-04-02', 'Shop_Keeper', 10000, 23394029, 'harshitdave7@yahoo.com', 'JP Nagar, 7th phase', 1, 'HTML, CSS, Unity, JS', 'HP', 5000),
('201', 'Male', 20, 'Aniket', '2018-04-02', 'Company_Admin', 30000, 889216608, 'oshin98@gmail.com', 'PES Hostel', 3, 'ASP.NET, Java, C#, Kotlin, HTML', 'HP', 5000),
('123672', 'Male', 20, 'Abhishek Gowda', '2018-04-02', 'Shop_Admin', 15000, 990024554, 'abhigowdru@outlook.com', 'Hebbal, Bangalore', 2, 'Hardware, OS, C#', 'HP', 5000),
('123671', 'Female', 23, 'Alia', '2018-04-02', 'Shop_keeper', 10000, 831731279, 'alia@gmail.com', 'Mumbai, Maharastra', 2, 'C#, Java, HTML', 'HP', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `hp_feedback`
--

CREATE TABLE `hp_feedback` (
  `feed_id` int(50) NOT NULL,
  `from_empid` varchar(50) DEFAULT NULL,
  `to` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `feedback` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hp_feedback`
--

INSERT INTO `hp_feedback` (`feed_id`, `from_empid`, `to`, `date`, `feedback`) VALUES
(2, '12678', 'Company_admin', '2018-04-16', 'HII'),
(3, '12678', 'Company_Admin', '2018-04-16', 'HII'),
(4, '123679', 'Shop_Admin', '2018-04-16', 'Yoo'),
(5, '123679', 'Shop_Admin', '2018-04-17', 'Hiiiiiii');

-- --------------------------------------------------------

--
-- Table structure for table `hp_history`
--

CREATE TABLE `hp_history` (
  `his_id` int(50) NOT NULL,
  `shopadmin_empid` varchar(50) DEFAULT NULL,
  `keeper_empid` varchar(50) DEFAULT NULL,
  `cat_name` varchar(50) DEFAULT NULL,
  `from_loc` varchar(50) DEFAULT NULL,
  `to_loc` varchar(50) DEFAULT NULL,
  `No_of_pro` int(50) DEFAULT NULL,
  `Mode_trans` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hp_history`
--

INSERT INTO `hp_history` (`his_id`, `shopadmin_empid`, `keeper_empid`, `cat_name`, `from_loc`, `to_loc`, `No_of_pro`, `Mode_trans`, `date`) VALUES
(1, '123672', '123671', 'Laptop', 'Bangalore', 'Mumbai', 25, 'Road', '2018-04-17'),
(2, '12678', '123679', 'Laptop', 'Bangalore', 'Mumbai', 100, 'NULL', '2018-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `hp_map`
--

CREATE TABLE `hp_map` (
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `shop_id` varchar(50) DEFAULT NULL,
  `h_id` varchar(50) DEFAULT NULL,
  `type` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hp_map`
--

INSERT INTO `hp_map` (`latitude`, `longitude`, `address`, `city`, `shop_id`, `h_id`, `type`) VALUES
(12.934495, 77.534515, 'PES Bangalore', 'Bangalore', '1', NULL, 'S'),
(19.040209, 72.850853, 'Dharavi', 'Mumbai', '2', NULL, 'S'),
(28.613939, 77.209023, 'New Delhi', 'Delhi', NULL, '1', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `hp_money_transaction`
--

CREATE TABLE `hp_money_transaction` (
  `trans_id` int(50) NOT NULL,
  `from_empid` varchar(50) DEFAULT NULL,
  `to_empid` varchar(50) DEFAULT NULL,
  `total_amount` int(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `Back_Acc_From` varchar(50) DEFAULT NULL,
  `Bank_Acc_To` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hp_money_transaction`
--

INSERT INTO `hp_money_transaction` (`trans_id`, `from_empid`, `to_empid`, `total_amount`, `date`, `Back_Acc_From`, `Bank_Acc_To`) VALUES
(1, '123672', '123671', 2000, '2018-04-02', '145367', '237689');

-- --------------------------------------------------------

--
-- Table structure for table `hp_shop_admin`
--

CREATE TABLE `hp_shop_admin` (
  `shop_id` int(50) NOT NULL,
  `empid` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `count` int(20) DEFAULT NULL,
  `imgpath` varchar(50) DEFAULT NULL,
  `cooid` varchar(50) DEFAULT NULL,
  `lldt` date DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  `last_mod` date DEFAULT NULL,
  `question` varchar(50) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hp_shop_admin`
--

INSERT INTO `hp_shop_admin` (`shop_id`, `empid`, `username`, `password`, `count`, `imgpath`, `cooid`, `lldt`, `regdate`, `last_mod`, `question`, `answer`, `approval`) VALUES
(1, '12678', 'akilesh.sharma18@gmail.com', '123', 15, 'Logo/Iron Man SM.jpg', NULL, '2018-04-18', '2018-04-02', '2018-04-16', 'My first laptop name', 'Dell latitude', 1),
(2, '123672', 'abhigowda@gmail.com', 'Abhi97', NULL, 'Logo/Iron Man SM.jpg', NULL, NULL, '2018-04-02', NULL, 'Favoritr color', 'Yellow', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hp_shop_keeper`
--

CREATE TABLE `hp_shop_keeper` (
  `keep_id` int(50) NOT NULL,
  `shop_id` varchar(50) DEFAULT NULL,
  `empid` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `count` int(20) DEFAULT NULL,
  `imgpath` varchar(50) DEFAULT NULL,
  `cooid` varchar(50) DEFAULT NULL,
  `lldt` date DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  `last_mod` date DEFAULT NULL,
  `question` varchar(50) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hp_shop_keeper`
--

INSERT INTO `hp_shop_keeper` (`keep_id`, `shop_id`, `empid`, `username`, `password`, `count`, `imgpath`, `cooid`, `lldt`, `regdate`, `last_mod`, `question`, `answer`, `approval`) VALUES
(1, '1', '123679', 'harshitdave10@gmail.com', 'Harshit.03', 5, 'Logo/Iron Man SM.jpg', NULL, '2018-04-17', '2018-04-02', '2018-04-17', 'My first laptop name', 'Samsung', 1),
(2, '2', '123671', 'aliahi@gmail.com', 'AliaBhat123', NULL, 'Logo/Iron Man SM.jpg', NULL, NULL, '2018-04-02', NULL, 'Pet Name', 'ZooZoo', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_admin`
--
ALTER TABLE `company_admin`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `com_list`
--
ALTER TABLE `com_list`
  ADD PRIMARY KEY (`com_name`);

--
-- Indexes for table `dell_category`
--
ALTER TABLE `dell_category`
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `dell_employee`
--
ALTER TABLE `dell_employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `dell_feedback`
--
ALTER TABLE `dell_feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `from_empid` (`from_empid`);

--
-- Indexes for table `dell_history`
--
ALTER TABLE `dell_history`
  ADD PRIMARY KEY (`his_id`),
  ADD KEY `cat_name` (`cat_name`),
  ADD KEY `shopadmin_empid` (`shopadmin_empid`),
  ADD KEY `keeper_empid` (`keeper_empid`);

--
-- Indexes for table `dell_map`
--
ALTER TABLE `dell_map`
  ADD PRIMARY KEY (`address`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `dell_money_transaction`
--
ALTER TABLE `dell_money_transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `from_empid` (`from_empid`),
  ADD KEY `to_empid` (`to_empid`);

--
-- Indexes for table `dell_shop_admin`
--
ALTER TABLE `dell_shop_admin`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `dell_shop_keeper`
--
ALTER TABLE `dell_shop_keeper`
  ADD PRIMARY KEY (`keep_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `hp_employee`
--
ALTER TABLE `hp_employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `hp_feedback`
--
ALTER TABLE `hp_feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `from_empid` (`from_empid`);

--
-- Indexes for table `hp_history`
--
ALTER TABLE `hp_history`
  ADD PRIMARY KEY (`his_id`),
  ADD KEY `shopadmin_empid` (`shopadmin_empid`),
  ADD KEY `keeper_empid` (`keeper_empid`),
  ADD KEY `cat_name` (`cat_name`);

--
-- Indexes for table `hp_map`
--
ALTER TABLE `hp_map`
  ADD PRIMARY KEY (`address`),
  ADD KEY `h_id` (`h_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `hp_money_transaction`
--
ALTER TABLE `hp_money_transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `from_empid` (`from_empid`),
  ADD KEY `to_empid` (`to_empid`);

--
-- Indexes for table `hp_shop_admin`
--
ALTER TABLE `hp_shop_admin`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `hp_shop_keeper`
--
ALTER TABLE `hp_shop_keeper`
  ADD PRIMARY KEY (`keep_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `empid` (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_admin`
--
ALTER TABLE `company_admin`
  MODIFY `h_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dell_history`
--
ALTER TABLE `dell_history`
  MODIFY `his_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
--
-- AUTO_INCREMENT for table `dell_money_transaction`
--
ALTER TABLE `dell_money_transaction`
  MODIFY `trans_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
--
-- AUTO_INCREMENT for table `dell_shop_admin`
--
ALTER TABLE `dell_shop_admin`
  MODIFY `shop_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
--
-- AUTO_INCREMENT for table `dell_shop_keeper`
--
ALTER TABLE `dell_shop_keeper`
  MODIFY `keep_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;
--
-- AUTO_INCREMENT for table `hp_feedback`
--
ALTER TABLE `hp_feedback`
  MODIFY `feed_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hp_history`
--
ALTER TABLE `hp_history`
  MODIFY `his_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hp_money_transaction`
--
ALTER TABLE `hp_money_transaction`
  MODIFY `trans_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hp_shop_admin`
--
ALTER TABLE `hp_shop_admin`
  MODIFY `shop_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hp_shop_keeper`
--
ALTER TABLE `hp_shop_keeper`
  MODIFY `keep_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
