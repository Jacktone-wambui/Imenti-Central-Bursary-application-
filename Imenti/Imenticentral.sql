-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2023 at 10:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Imenticentral`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `aemail`, `apassword`) VALUES
(1, 'Chacha', 'admin@imenticentral.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `allocate`
--

CREATE TABLE `allocate` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `allocated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allocate`
--

INSERT INTO `allocate` (`id`, `amount`, `student_name`, `allocated_at`) VALUES
(1, 2070062.00, 'Jacktone', '2023-12-01 09:20:01'),
(2, 2070062.00, 'Jacktone', '2023-12-01 09:30:00'),
(3, 2070062.00, 'Jacktone', '2023-12-01 09:31:05'),
(4, 2070062.00, 'Jacktone', '2023-12-01 09:33:25'),
(5, 2070062.00, 'Jacktone', '2023-12-01 09:40:50'),
(6, 2070062.00, 'Jacktone', '2023-12-01 09:41:39'),
(7, 2070062.00, 'Jacktone', '2023-12-01 09:42:49'),
(8, 2070062.00, 'Jacktone', '2023-12-01 09:43:11'),
(9, 2070062.00, 'Jacktone', '2023-12-01 09:43:16'),
(10, 2070062.00, 'Jacktone', '2023-12-01 09:47:17'),
(11, 2070062.00, 'cliffe', '2023-12-01 09:48:24'),
(12, 2070062.00, 'Jacktone', '2023-12-01 09:50:38'),
(13, 2070062.00, 'John Doe', '2023-12-01 09:53:16'),
(14, 2070062.00, 'John Doe', '2023-12-01 09:53:28'),
(15, 2070062.00, 'Jacktone', '2023-12-01 09:55:21'),
(16, 2070062.00, 'cliffe', '2023-12-01 09:58:02'),
(17, 2070062.00, 'John Doe', '2023-12-01 09:58:17'),
(18, 2070062.00, 'cliffe', '2023-12-01 09:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `ward` varchar(20) NOT NULL,
  `parent_name` varchar(20) NOT NULL,
  `id_num` int(20) NOT NULL,
  `school` varchar(100) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `arrears` decimal(10,2) NOT NULL,
  `document` varchar(200) DEFAULT NULL,
  `sstatus` enum('disbursed','default','open') DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `first_name`, `email`, `phone_number`, `ward`, `parent_name`, `id_num`, `school`, `registration_number`, `arrears`, `document`, `sstatus`) VALUES
(1, 'Jacktone', 'jacktoneabongo@gmail.com', '+254768026324', 'hhhhhgg', 'hhjjjj', 6677766, 'fghhhhggg', 'fghjklkjhg', 444.00, '', 'disbursed'),
(2, 'cliffe', 'cliffeombeta@student.com', '56777775566', 'mavueni', 'onyi', 566677, 'waa secondary', 'sct3443-trrtt', 6754.00, '', 'default'),
(3, 'John Doe', 'johndoe@trr.com', '567765444', 'juja', 'yy', 6776544, 'juja seco', '454ffdd455', 6655.00, '', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(40) NOT NULL,
  `location` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_name`, `location`, `amount`, `code`, `created_at`) VALUES
(1, '', 'ddffffdfd', 2233.00, 'sdfghfds', '2023-11-30 19:12:17'),
(2, '', 'ddffffdfd', 2233.00, 'sdfghfds', '2023-11-30 21:21:53'),
(3, '', 'ddffffdfd', 2233.00, 'sdfghfds', '2023-11-30 21:24:03'),
(4, '', 'ddffffdfd', 56745.00, 'sdfghfds', '2023-11-30 21:24:31'),
(5, '', 'ddffffdfd', 556644.00, 'sdfghfds', '2023-11-30 21:25:38'),
(6, '', 'ddffffdfd', 667765.00, 'sdfghfds', '2023-11-30 21:30:34'),
(7, 'Newtone', 'Seattle', 544.00, 'erttgdd54', '2023-12-01 02:23:34'),
(8, 'Newtone', 'Seattle', 4000.00, 'srtyssdr', '2023-12-01 06:19:57'),
(9, 'Newtone', 'luanda', 777665.00, 'srtyssdr', '2023-12-01 08:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_no` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `Applicant_id` int(11) NOT NULL,
  `mpesa` varchar(255) DEFAULT NULL,
  `amount` bigint(30) DEFAULT NULL,
  `newpassword` varchar(300) DEFAULT NULL,
  `cpassword` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `fname`, `email`, `id_no`, `phone`, `location`, `gender`, `Applicant_id`, `mpesa`, `amount`, `newpassword`, `cpassword`) VALUES
(5, 'Newtone', 'donor@imenticentral.com', 123456789, 9876543, 'New York', 'Male', 1, 'MPESA123', 1000, '123', '123'),
(6, 'Jane Smith', 'janesmith@example.com', 987654321, 1234567, 'Los Angeles', 'Female', 2, 'MPESA456', 500, 'password456', 'password456'),
(7, 'Alice Johnson', 'alicejohnson@example.com', 654321987, 567890, 'London', 'Female', 3, 'MPESA789', 200, 'password789', 'password789'),
(8, 'Bob Williams', 'bobwilliams@example.com', 321654987, 432109, 'Paris', 'Male', 4, 'MPESA012', 300, 'password012', 'password012');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `DEADLINE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `NAME`, `STATUS`, `DEADLINE`) VALUES
(2, 'Regular', 'Open', '2018-08-02'),
(3, '2018 CDF', 'Open', '2018-07-30'),
(4, '2018 County', 'Open', '2018-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(128) NOT NULL,
  `semail` varchar(300) NOT NULL,
  `sname` varchar(300) DEFAULT NULL,
  `Form` varchar(128) DEFAULT NULL,
  `contacts` varchar(200) DEFAULT NULL,
  `post_address` varchar(200) DEFAULT NULL,
  `Postal_code` varchar(200) DEFAULT NULL,
  `Date_of_Birth` int(11) DEFAULT NULL,
  `Place_of_Birth` varchar(200) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `contact_name` varchar(200) DEFAULT NULL,
  `newpassword` varchar(300) DEFAULT NULL,
  `cpassword` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `semail`, `sname`, `Form`, `contacts`, `post_address`, `Postal_code`, `Date_of_Birth`, `Place_of_Birth`, `thumbnail`, `contact_name`, `newpassword`, `cpassword`) VALUES
(1, 'student@imenticentral.com', 'John Doe', 'Form A', '123456789', '123 Main St', '12345', 19900101, 'New York', 'thumbnail1.jpg', 'Jane Smith', '123', '123'),
(2, 'jane@example.com', 'Jane Smith', 'Form B', '987654321', '456 Oak St', '54321', 19900202, 'Los Angeles', 'thumbnail2.jpg', 'John Doe', 'password456', 'password456'),
(3, 'alice@example.com', 'Alice Johnson', 'Form C', '555555555', '789 Elm St', '67890', 19900303, 'Chicago', 'thumbnail3.jpg', 'Bob Thompson', 'password789', 'password789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocate`
--
ALTER TABLE `allocate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`),
  ADD UNIQUE KEY `mpesa` (`mpesa`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD UNIQUE KEY `NAME` (`NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allocate`
--
ALTER TABLE `allocate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
