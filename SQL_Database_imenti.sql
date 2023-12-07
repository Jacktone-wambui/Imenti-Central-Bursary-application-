

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




--
-- Database: `Imenticentral`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--
INSERT INTO `admin` (`id`, `fname`, `aemail`, `apassword`) 
VALUES (1, 'Chacha', 'admin@imenticentral.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
   `ward` varchar(20) NOT NULL,
   `parent_name` varchar(20) NOT NULL,
    `id_num` int(20) NOT NULL,
  `school` varchar(100) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `arrears` decimal(10, 2) NOT NULL,
  `document` varchar(200) DEFAULT NULL,
  `sstatus` ENUM('disbursed', 'default','closed') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'default',
  PRIMARY KEY (`id`)
  
-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    code VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_no` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `amount` bigint(30) DEFAULT NULL,
  `newpassword` varchar(300) DEFAULT NULL,
  `cpassword` varchar(300) NOT NULL,
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `DEADLINE` date NOT NULL,
  PRIMARY KEY (`notification_id`),
  UNIQUE KEY `NAME` (`NAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `cpassword` varchar(300) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
