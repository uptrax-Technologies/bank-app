-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 03:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `account_type` varchar(25) NOT NULL,
  `account_number` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pin` int(10) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `open_date` date NOT NULL,
  `note` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `Balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_name`, `branch`, `account_type`, `account_number`, `username`, `password`, `dob`, `gender`, `address`, `country`, `state`, `city`, `pin`, `mobile`, `email`, `open_date`, `note`, `image`, `status`, `Balance`) VALUES
(1, 'Igbara Lenu', 'Rumokoro', '123456789', 123456789, 'sleek', 'Test1234', '0000-00-00', 'Male', 'No 19 Mike Amadi Street, Rukpokwu', 'Nigeria', 'Rivers', 'Port Harcourt', 500101, '08137473485', 'michaellenu1@gmail.com', '2021-04-05', 'Just a dummy account', 'IMG_20191209_065426_1.jpg', 'active', 13100),
(9, 'kinanee  faith', 'Rumokoro', 'savings', 123456789, 'yira', 'Test1234', '0000-00-00', 'Female', 'No 19 Mike Amadi Street, Rukpokwu', 'Nigeria', 'Rivers', 'Port Harcourt', 500101, '08137473485', 'faithK@gmail.com', '2021-04-06', 'Just a dummy account', 'gimp.png', 'active', 250);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'kalashin', 'Test1234');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(11) NOT NULL,
  `otp1` int(11) NOT NULL,
  `otp2` int(11) NOT NULL,
  `transaction_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `otp1`, `otp2`, `transaction_id`) VALUES
(1, 2345, 1111, ''),
(2, 2345, 88900, '3333445243'),
(3, 313, 212, '606d8ace1b5a26.02465193'),
(4, 313, 212, '606da554850373.22207748'),
(5, 313, 212, '606da554850373.22207748'),
(6, 313, 212, '606dae00862ca6.49034131'),
(7, 313, 212, '606daee2b96818.63455608'),
(8, 313, 212, '606daee2b96818.63455608'),
(9, 313, 212, '606c3e0e4c8556.23823903');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `account_number` int(15) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_address` varchar(255) NOT NULL,
  `swiftcode` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` int(15) NOT NULL,
  `add_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `id` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `depositor` varchar(255) NOT NULL,
  `date` varchar(125) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `description` text NOT NULL,
  `transaction_type` varchar(225) NOT NULL,
  `uid` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`id`, `account`, `amount`, `depositor`, `date`, `address`, `mobile`, `description`, `transaction_type`, `uid`, `created_at`, `status`) VALUES
(26, 'kala', '200', 'faithK@gmail.com', '2021-04-06', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'credit', '606c3e0e4c8556.23823903', '2021-04-06 10:55:10', ''),
(27, 'yira', '500', 'faithK@gmail.com', '2021-04-06', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'credit', '606c3e44343917.22767885', '2021-04-06 10:56:04', ''),
(28, 'sleek', '300', 'michaellenu1@gmail.com', '2021-04-06', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'credit', '606c3eba72a971.47816322', '2021-04-06 10:58:02', ''),
(29, 'yira', '200', 'michaellenu1@gmail.com', '2021-04-06', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'credit', '606c3ef7176630.78259385', '2021-04-06 10:59:03', ''),
(30, 'yira', '300', 'faithK@gmail.com', '2021-04-06', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'credit', '606c3f4ef0f2d5.75807592', '2021-04-06 11:00:30', ''),
(31, 'kala', '200', 'faithK@gmail.com', '2021-04-06', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'credit', '606c3f7eaed0f4.43288592', '2021-04-06 11:01:18', ''),
(32, '', '300', 'faithK@gmail.com', '06-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, '', 'debit', '606c76460f17a7.17412150', '2021-04-06 14:55:02', ''),
(33, '', '200', 'faithK@gmail.com', '06-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, '', 'debit', '606c76a34a3370.76110618', '2021-04-06 14:56:35', ''),
(34, 'kala', '300', 'faithK@gmail.com', '06-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, '', 'debit', '606c777d1c36b8.14691510', '2021-04-06 15:00:13', ''),
(35, 'sleek', '300', 'faithK@gmail.com', '06-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, '', 'debit', '606c780a265968.71998123', '2021-04-06 15:02:34', ''),
(36, 'kala', '300', 'faithK@gmail.com', '06-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, '', 'debit', '606c7871ef4b82.69124900', '2021-04-06 15:04:17', ''),
(37, 'kala', '100', '', '06-04-2121', '', 0, 'i am running out of cash', 'debit', '606c796cdd5d17.37580783', '2021-04-06 15:08:28', ''),
(38, 'kala', '100', '', '06-04-2121', '', 0, 'i am running out of cash', 'debit', '606c797ae138a0.53036043', '2021-04-06 15:08:43', ''),
(39, 'kala', '100', 'faithK@gmail.com', '06-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606c7a104d16c6.92187506', '2021-04-06 15:11:12', ''),
(40, 'kala', '100', 'faithK@gmail.com', '06-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606c7a400bb354.32794475', '2021-04-06 15:12:00', ''),
(41, 'sleek', '900', '', '06-04-2121', '', 0, 'i am running out of cash', 'debit', '606c805223d0f9.77922296', '2021-04-06 15:37:54', ''),
(42, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606d7dddb65e98.99897526', '2021-04-07 09:39:41', 'pending'),
(43, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606d7f28d61a14.51878285', '2021-04-07 09:45:12', 'pending'),
(44, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606d7fb435bc50.60192537', '2021-04-07 09:47:32', 'pending'),
(45, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606d7fe3a07c98.52253012', '2021-04-07 09:48:19', 'pending'),
(46, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606d8010908778.01508613', '2021-04-07 09:49:04', 'pending'),
(47, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8a8dc22221.41998558', '2021-04-07 10:33:49', 'pending'),
(48, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8aa45f1577.37484670', '2021-04-07 10:34:12', 'pending'),
(49, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8ac1bb0bf1.97172676', '2021-04-07 10:34:41', 'pending'),
(50, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8ace1b5a26.02465193', '2021-04-07 10:34:54', 'pending'),
(51, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8ae7653932.16648859', '2021-04-07 10:35:19', 'pending'),
(52, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8b0af19cd1.27605879', '2021-04-07 10:35:54', 'pending'),
(53, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8ba5d3ec09.55438488', '2021-04-07 10:38:29', 'pending'),
(54, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8c11170970.28719562', '2021-04-07 10:40:17', 'pending'),
(55, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8c8a3836d2.63293141', '2021-04-07 10:42:18', 'pending'),
(56, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8d0a9091f0.02900509', '2021-04-07 10:44:26', 'pending'),
(57, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8e631514b0.27129484', '2021-04-07 10:50:11', 'pending'),
(58, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8e82bf4e80.23207847', '2021-04-07 10:50:42', 'pending'),
(59, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606d8e9294f594.26162290', '2021-04-07 10:50:58', 'pending'),
(60, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606da0874fd085.36146684', '2021-04-07 12:07:35', 'pending'),
(61, 'sleek', '200', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606da554850373.22207748', '2021-04-07 12:28:04', 'pending'),
(62, 'kala', '50', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'ordinary funding', 'debit', '606dacec2d1597.01830321', '2021-04-07 13:00:28', 'pending'),
(63, 'kala', '100', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606dad58c0eca3.87888959', '2021-04-07 13:02:16', 'pending'),
(64, 'kala', '100', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606dae00862ca6.49034131', '2021-04-07 13:05:04', 'pending'),
(65, 'kala', '30', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606daee2b96818.63455608', '2021-04-07 13:08:50', 'confirmed'),
(66, 'kala', '20', 'faithK@gmail.com', '07-04-2121', 'No 19 Mike Amadi Street, Rukpokwu', 2147483647, 'i am running out of cash', 'debit', '606db76f1d9147.40805482', '2021-04-07 13:45:19', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `Account_Name` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Loan_Purpose` varchar(250) NOT NULL,
  `app_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `Rep_pay_date` varchar(234) NOT NULL,
  `Interest` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `transaction_id`) VALUES
(6, '606c3e0e4c8556.23823903'),
(7, '606c3e44343917.22767885'),
(8, '606c3eba72a971.47816322'),
(9, '606c3ef7176630.78259385'),
(10, '606c3f4ef0f2d5.75807592'),
(11, '606c3f7eaed0f4.43288592'),
(12, '606db76f1d9147.40805482');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
