-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 06:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `islamic_will`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_assets`
--

CREATE TABLE `tbl_bank_assets` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `assets_type` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `branch_name` varchar(150) NOT NULL,
  `fd_recipt_No` varchar(100) NOT NULL,
  `key_number` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bank_assets`
--

INSERT INTO `tbl_bank_assets` (`id`, `will_id`, `assets_type`, `account_number`, `bank_name`, `branch_name`, `fd_recipt_No`, `key_number`, `state`, `pin_code`) VALUES
(4, 89372615, 'Savings A/c', '456456', 'ryrtyrty rty', 'rety ty', '', '', '', 0),
(5, 89372615, 'Savings A/c', '76746', 'herty erty', ' erty erty', '', '', '', 0),
(6, 89372615, 'Insurance Policy', '45674567', 'dfgh dfgh', 'fghfgdhd fgh', '', '', '', 0),
(8, 45637812, 'Savings A/c', 'fdghg dfgh', 'dfgh dfgh', 'dfgh dfgh', '', '', '', 0),
(13, 45637812, 'Savings A/c', '236256', 'sdfgsdfg sdfg', 'sdfg sdgf', '', '', '', 0),
(14, 45637812, 'Current A/C', 'demo', 'qwerqwer qre', 'qwerfg fdgh', '', '', '', 0),
(15, 45637812, 'Current A/C', '34563456', 'sdfgsd sdf g', 'sdfgsdfg sdfg', '', '', '', 0),
(19, 93562874, 'Savings A/c', '2345', 'adfgasg dafg', 'dfgsdfg sdfg', '', '', '', 0),
(20, 93562874, 'Current A/C', '111', 'aaa', 'sss', '', '', '', 0),
(21, 93562874, 'Savings A/c', 'demo2', 'BOI', 'Gadhinglaj', '', '', '', 0),
(22, 91874356, 'Savings A/c', '555666777', 'BOI', 'ertrt', '', '', '', 0),
(23, 64175829, 'Savings A/c', '23452345', 'fgsdfg', 'sdfgsg', '', '', '', 0),
(24, 64175829, 'Current A/C', '4567', 'dfghdfgh', 'dfghdfgh', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_executor`
--

CREATE TABLE `tbl_executor` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `executor_name` varchar(150) NOT NULL,
  `executor_dob` varchar(12) NOT NULL,
  `executor_age` int(11) NOT NULL,
  `executor_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_executor`
--

INSERT INTO `tbl_executor` (`id`, `will_id`, `executor_name`, `executor_dob`, `executor_age`, `executor_address`) VALUES
(1, 32564197, 'ASDA asd', '', 55, 'ASD asd ASD sad ASD'),
(5, 32564197, 'asdfasf', '', 22, ' asdf'),
(7, 89372615, 'dfgsdfg sgsdfg sdg', '', 60, ' sdfg sdfg sdfg'),
(11, 45637812, 'sdfgsdf sdfgsdfg', '', 55, 'sdfgs sdfg'),
(12, 64175829, 'Demo Exec', '', 53, 'Kagal'),
(13, 64175829, 'DemoSecond exec', '', 69, 'ytjhv jhfg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family_info`
--

CREATE TABLE `tbl_family_info` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `relationship` varchar(25) NOT NULL,
  `family_person_name` varchar(150) NOT NULL,
  `family_person_dob` varchar(12) NOT NULL,
  `family_person_age` int(11) NOT NULL,
  `family_person_age_format` varchar(20) NOT NULL,
  `is_minar` int(11) NOT NULL DEFAULT '0',
  `mother_of_minar` varchar(200) NOT NULL,
  `guardian_name` varchar(150) NOT NULL,
  `guardian_address` text NOT NULL,
  `opt_guardian_name` varchar(200) NOT NULL,
  `opt_guardian_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_family_info`
--

INSERT INTO `tbl_family_info` (`id`, `will_id`, `relationship`, `family_person_name`, `family_person_dob`, `family_person_age`, `family_person_age_format`, `is_minar`, `mother_of_minar`, `guardian_name`, `guardian_address`, `opt_guardian_name`, `opt_guardian_address`) VALUES
(5, 58746931, 'Daughter', 'dfg sdfg', '01/01/2019', 3, 'Year', 1, '', 'datta mane', 'Hasurchampu', '', ''),
(6, 89372615, 'Son', 'AWERFGH mkisadifh', '01/01/2012', 7, 'Year', 1, '', 'nhjuikm koiun', 'Kolhapur', '', ''),
(12, 45637812, 'Father', 'sdfg sdfg', '01-01-1959', 60, 'Year', 0, '', '', '', '', ''),
(19, 45637812, 'Son', 'sdfgf sdfg', '01-01-2017', 2, 'Year', 1, '', 'Shantaram Shinde', 'Rajarampuri', '', ''),
(20, 45637812, 'Daughter', 'sdfgfdg wtewrt', '01-01-2019', 3, 'Month', 1, '', 'Dattatray Mane', 'Hasurchampu', '', ''),
(33, 64175829, 'Father', 'Y Shinde', '01-03-1959', 60, 'Year', 0, '', '', '', '', ''),
(41, 93562874, 'Son', 'asdf asdf', '06-02-1999', 20, 'Year', 0, '', '', '', '', ''),
(42, 93562874, 'Father', 'dfgdj dfhj', '01-01-1941', 78, 'Year', 0, '', '', '', '', ''),
(43, 93562874, 'Son', 'afgdsdfgsdfg', '21-02-2015', 4, 'Year', 1, 'dfgh dfgh', 'dfgh dfgh', 'dfgh fdgh', 'dfghdfgh dfghdfgh', 'dgh dfghdfgh'),
(44, 93562874, 'Daughter', 'sfgsdfg sdfg', '22-02-2019', 2, 'Month', 1, 'dfgh dfghdfgh', 'eyerthdf dfgh', 'dfgj dfgh', '', ''),
(46, 91874356, 'Father', 'sdfgsfd sdgf', '01-03-1951', 68, 'Year', 0, '', '', '', '', ''),
(47, 59617832, 'Brother', 'Shantaram Y Shinde', '02-02-1980', 39, 'Year', 0, '', '', '', '', ''),
(48, 64175829, 'Mother', 'AWERTG BNMJIO MKJIO', '05-02-1960', 59, 'Year', 0, '', '', '', '', ''),
(49, 64175829, 'Brother', 'wrtyerty erty erty', '13-03-1981', 38, 'Year', 0, '', '', '', '', ''),
(50, 64175829, 'Sister', 'sdf sdfg sdfg', '19-03-1983', 36, 'Year', 0, '', '', '', '', ''),
(51, 64175829, 'Brother', 'fdgh dfgh dfgh', '01-04-1983', 36, 'Year', 0, '', '', '', '', ''),
(52, 64175829, 'Spouse', 'dfgh dfgh dfghyy', '16-04-1976', 43, 'Year', 0, '', '', '', '', ''),
(53, 64175829, 'Son', 'fghdfgh dfgh', '03-02-2000', 19, 'Year', 0, '', '', '', '', ''),
(54, 64175829, 'Daughter', 'sdgh sdfh', '12-03-2011', 8, 'Year', 1, 'dfgh dfgh dfghyy', 'sdfsdfg sdfg', 'Rajarampuri', '', ''),
(55, 64175829, 'Son', 'sdfgsfd sdfg', '07-04-2019', 1, 'Month', 1, 'sdfg sdfg', 'Dattatray Mane', 'Hasurchampu', '', ''),
(56, 64175829, 'Grand Father', 'rgert wertwert wret', '02-03-1935', 84, 'Year', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_funeral`
--

CREATE TABLE `tbl_funeral` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `funeral_name` varchar(200) NOT NULL,
  `funeral_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_funeral`
--

INSERT INTO `tbl_funeral` (`id`, `will_id`, `funeral_name`, `funeral_address`) VALUES
(4, 89372615, 'kdfjghsd sdflkgjh', 'alertuioy skdgjh'),
(7, 93562874, 'sfgsdgsdfg', 'sdfggfd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guardian`
--

CREATE TABLE `tbl_guardian` (
  `id` int(11) NOT NULL,
  `family_member_id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `guardian_name` varchar(150) NOT NULL,
  `guardian_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_gift`
--

CREATE TABLE `tbl_other_gift` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `gift_type` varchar(150) NOT NULL,
  `gift_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_other_gift`
--

INSERT INTO `tbl_other_gift` (`id`, `will_id`, `gift_type`, `gift_description`) VALUES
(3, 45637812, 'Jewellery and Valuables', 'sdgfsd gsdfg'),
(4, 89372615, 'Jewellery and Valuables', 'sdfg sdfg'),
(5, 93562874, 'Jewellery and Valuables', 'demo1'),
(6, 93562874, 'Remained Assets', 'demo2'),
(7, 93562874, 'Jewellery and Valuables', 'demo3'),
(8, 64175829, 'Jewellery and Valuables', 'sdfgsdfg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_info`
--

CREATE TABLE `tbl_personal_info` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `name_title` varchar(10) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `occupation` varchar(150) NOT NULL,
  `aadhar_no` varchar(15) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `is_have_child` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_personal_info`
--

INSERT INTO `tbl_personal_info` (`id`, `will_id`, `name_title`, `full_name`, `age`, `address`, `city`, `pin_code`, `state`, `country`, `mobile_no`, `email`, `occupation`, `aadhar_no`, `pan_no`, `gender`, `marital_status`, `is_have_child`) VALUES
(4, 45637812, 'Mr.', 'Dattatray Mane', 27, 'Hasurchampu', 'Gadhinglaj', 416501, 'Maharashtra', 'India', '8855870746', 'datta@pixelbazar.com', 'S/W Developer', '222333444555', 'ASDF123', 'Female', 'Unmarried', 0),
(6, 89372615, 'Mr.', 'Shantaram Shinde', 60, 'Rajarampuri', 'Kolhapur', 456123, 'Maharashtra', 'india', '9638527410', 'shantaram@gmail.com', 'Farmer', '333666999888', 'QWE4123', 'Male', 'Unmarried', 0),
(10, 64175829, 'Mr.', 'Shantaram Y Shinde', 27, 'Rajarampuri', 'Kolhapur', 456123, 'Maharashtra', 'India', '9999999999', 'shantaram2@gmail.com', 'Farmer', '898989898989', 'ASDF123', 'Male', 'Married', 1),
(11, 93562874, 'Mr.', 'Shantaram A Shinde', 60, 'Rajarampuri', 'Kolhapur', 456123, 'Maharashtra', 'India', '8888888888', 'shantaram3@gmail.com', 'Farmer', '112233445566', 'QWE4123', 'Male', 'Married', 1),
(12, 91874356, 'Mr.', 'Shantaram Y Shinde', 55, 'Rajarampuri', 'Kolhapur', 456123, 'Maharashtra', 'India', '9638527455', 'shantaram5@gmail.com', 'Farmer', '555555555566', '', 'Male', 'Unmarried', 0),
(13, 91756234, 'Mr.', 'Shantaram Shinde', 88, 'Rajarampuri', 'Kolhapur', 456123, 'Maharashtra', 'India', '9999999991', 'shantaram4@gmail.com', 'SW Developer', '998877665544', '', 'Male', 'Unmarried', 0),
(14, 59617832, 'Miss.', 'Shantaram A Shinde', 56, 'Rajarampuri', 'Kolhapur', 456123, 'Maharashtra', 'India', '9999999222', 'shantaram2444@gmail.com', 'Farmer', '223311223322', '', 'Female', 'Unmarried', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_real_estate`
--

CREATE TABLE `tbl_real_estate` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `estate_type` varchar(100) NOT NULL,
  `house_no` varchar(50) NOT NULL,
  `survey_number` varchar(50) NOT NULL,
  `measurment_area` double NOT NULL,
  `measurment_unit` varchar(50) NOT NULL,
  `estate_address` text NOT NULL,
  `estate_city` varchar(100) NOT NULL,
  `estate_pin` bigint(20) NOT NULL,
  `estate_state` varchar(100) NOT NULL,
  `estate_country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_real_estate`
--

INSERT INTO `tbl_real_estate` (`id`, `will_id`, `estate_type`, `house_no`, `survey_number`, `measurment_area`, `measurment_unit`, `estate_address`, `estate_city`, `estate_pin`, `estate_state`, `estate_country`) VALUES
(1, 45637812, 'Flat', '1', '2', 3, 'Square Meter', '4', '5', 6, '8', '7'),
(2, 45637812, 'Flat', '546456', '456', 0, 'Square Meter', 'Hasur', 'Gadhinglaj', 2345, 'MH', 'India'),
(3, 89372615, 'Flat', '123', '321', 500, 'Square Meter', 'Rajarampuri', 'Kolhapur', 555666, 'Maharashtra', 'India'),
(4, 93562874, 'Shop', '12345', '99945', 50045, 'Square Meter', 'Rajarampuri', 'Kolhapur', 222555, 'Maharashtra', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_fullname` varchar(150) NOT NULL,
  `user_mobile_number` bigint(20) NOT NULL,
  `user_email_id` varchar(150) NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_date` varchar(12) NOT NULL,
  `otp_start_time` varchar(10) NOT NULL,
  `otp_end_time` varchar(10) NOT NULL,
  `user_reg_date` varchar(12) NOT NULL,
  `user_subscription` int(11) NOT NULL DEFAULT '0',
  `user_subscription_type` varchar(150) NOT NULL,
  `user_subscription_start_date` varchar(12) NOT NULL,
  `user_subscription_end_date` varchar(12) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `reg_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_id`, `user_fullname`, `user_mobile_number`, `user_email_id`, `otp`, `otp_date`, `otp_start_time`, `otp_end_time`, `user_reg_date`, `user_subscription`, `user_subscription_type`, `user_subscription_start_date`, `user_subscription_end_date`, `user_password`, `user_username`, `reg_date`) VALUES
(1, 92138467, 'datta mane', 8855870746, 'datta@pixelbazar.com', 654871, '24-04-2019', '08:17:23', '08:32:23', '', 0, '', '', '', '', '', ''),
(2, 69384527, 'Shantaram Shinde', 9638527410, 'shantaram@gmail.com', NULL, '', '', '', '', 0, '', '', '', '', '', ''),
(6, 36192854, 'Shantaram Y Shinde', 9999999999, 'shantaram2@gmail.com', 643729, '27-04-2019', '14:03:50', '14:18:50', '', 0, '', '', '', '', '', ''),
(7, 75614289, 'Shantaram A Shinde', 8888888888, 'shantaram3@gmail.com', 351976, '27-04-2019', '06:42:03', '06:57:03', '', 0, '', '', '', '', '', ''),
(9, 61873459, 'Demo Name', 9966332255, 'datta1@pixelbazar.com', 649132, '25-04-2019', '15:30:14', '15:45:14', '', 0, '', '', '', '', '', '25-04-2019'),
(10, 34697528, 'Shantaram Y Shinde', 9638527455, 'shantaram5@gmail.com', NULL, '', '', '', '', 0, '', '', '', '', '', '27-04-2019'),
(11, 62981743, 'Shantaram Shinde', 9999999991, 'shantaram4@gmail.com', NULL, '', '', '', '', 0, '', '', '', '', '', '27-04-2019'),
(12, 25719438, 'Shantaram A Shinde', 9999999222, 'shantaram2444@gmail.com', NULL, '', '', '', '', 0, '', '', '', '', '', '27-04-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `vehicle_model` varchar(150) NOT NULL,
  `vehicle_make_year` varchar(50) NOT NULL,
  `registration_number` varchar(100) NOT NULL,
  `vehicle_company` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`id`, `will_id`, `vehicle_model`, `vehicle_make_year`, `registration_number`, `vehicle_company`) VALUES
(2, 45637812, 'AF ASDG D', '2017', '6546524', ''),
(3, 89372615, 'Honda', '2019', '963258', ''),
(4, 64175829, 'sdfgfgsfdg', '2019', 'dfsdfgsg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_will`
--

CREATE TABLE `tbl_will` (
  `id` int(11) NOT NULL,
  `will_user_id` bigint(20) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `is_will_complete` int(11) NOT NULL DEFAULT '0',
  `is_have_minar_child` int(11) NOT NULL,
  `will_place` varchar(150) NOT NULL,
  `will_date` varchar(12) NOT NULL,
  `will_time` varchar(20) NOT NULL,
  `date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_will`
--

INSERT INTO `tbl_will` (`id`, `will_user_id`, `will_id`, `is_will_complete`, `is_have_minar_child`, `will_place`, `will_date`, `will_time`, `date`) VALUES
(78, 92138467, 45637812, 0, 1, 'Kolhapur', '07-04-2019', '02:39:57 PM', ''),
(80, 69384527, 89372615, 0, 0, '', '20-04-2019', '', ''),
(84, 36192854, 64175829, 0, 1, '', '25-04-2019', '', ''),
(85, 75614289, 93562874, 0, 1, 'Kolhapur', '24-04-2019', '02:17:53 PM', ''),
(86, 34697528, 91874356, 0, 0, '', '27-04-2019', '', ''),
(87, 62981743, 91756234, 0, 0, '', '27-04-2019', '', ''),
(88, 25719438, 59617832, 0, 0, '', '27-04-2019', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_witness`
--

CREATE TABLE `tbl_witness` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `witness_name` varchar(150) NOT NULL,
  `witness_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_witness`
--

INSERT INTO `tbl_witness` (`id`, `will_id`, `witness_name`, `witness_address`) VALUES
(4, 32564197, 'sdfgsdf sdfgsdfg', 'sdfgsdfgsdfgsfdg sfdgsdg'),
(5, 89372615, 'ert wert', 'wert wret'),
(7, 45637812, 'Demo1 Witness', 'jsdfgh'),
(8, 45637812, 'Demo2 Witness2', 'eru ert dfg'),
(9, 93562874, 'sfghdfgj dfghdfgh', 'dfghdfgh dfgh'),
(10, 64175829, 'sdfhsdfgh sfgdhfgh', 'ghfghsfg fghgh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank_assets`
--
ALTER TABLE `tbl_bank_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_executor`
--
ALTER TABLE `tbl_executor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_family_info`
--
ALTER TABLE `tbl_family_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_funeral`
--
ALTER TABLE `tbl_funeral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guardian`
--
ALTER TABLE `tbl_guardian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_other_gift`
--
ALTER TABLE `tbl_other_gift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_personal_info`
--
ALTER TABLE `tbl_personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_real_estate`
--
ALTER TABLE `tbl_real_estate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_will`
--
ALTER TABLE `tbl_will`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank_assets`
--
ALTER TABLE `tbl_bank_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_executor`
--
ALTER TABLE `tbl_executor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_family_info`
--
ALTER TABLE `tbl_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_funeral`
--
ALTER TABLE `tbl_funeral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_guardian`
--
ALTER TABLE `tbl_guardian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_other_gift`
--
ALTER TABLE `tbl_other_gift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_personal_info`
--
ALTER TABLE `tbl_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_real_estate`
--
ALTER TABLE `tbl_real_estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_will`
--
ALTER TABLE `tbl_will`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
