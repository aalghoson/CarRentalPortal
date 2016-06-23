-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2016 at 12:31 AM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`location_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `address`) VALUES
(1, '188 University Rd, Regina,SK'),
(2, '1293 Broad ST, Regina,SK'),
(3, 'Saskatoon'),
(4, 'Moose Jaw'),
(5, 'Maple Creek'),
(6, 'Swift Current');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `disability` tinyint(1) NOT NULL DEFAULT '0',
  `user_location` int(255) DEFAULT NULL COMMENT 'FK'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`user_id`, `fname`, `lname`, `email`, `password`, `DOB`, `phone`, `disability`, `user_location`) VALUES
(5, 'John', 'Smith', 'jj@gmail.com', '12345', '1989-05-09', '3061112222', 0, 1),
(6, 'Anna', 'Reed', 'reed@gmail.com', '434343', '1980-05-11', '3064449900', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`resv_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resv_vehicle_id` int(11) NOT NULL,
  `pick_location` varchar(255) NOT NULL,
  `return_location` varchar(255) NOT NULL,
  `pick_date` date NOT NULL,
  `return_date` date NOT NULL,
  `pick_time` varchar(255) NOT NULL,
  `return_time` varchar(255) NOT NULL,
  `confirmation_code` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`resv_id`, `user_id`, `resv_vehicle_id`, `pick_location`, `return_location`, `pick_date`, `return_date`, `pick_time`, `return_time`, `confirmation_code`) VALUES
(1, 5, 1, '3024 Broad ST, Regina,SK', '3024 Broad ST, Regina,SK', '2016-05-27', '2016-05-30', 'Between 7:00 am and 11:59 am', 'Between 7:00 am and 11:59 am', ''),
(2, 6, 2, '3024 Broad ST, Regina,SK', '3024 Broad ST, Regina,SK', '2016-05-31', '2016-06-07', 'Between 7:00 am and 11:59 am', 'Between 7:00 am and 11:59 am', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
`vehicle_id` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `disability` tinyint(1) NOT NULL DEFAULT '0',
  `description` text,
  `pic_link` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `make`, `model`, `year`, `type`, `price`, `disability`, `description`, `pic_link`) VALUES
(1, 'Toyota', 'Camry', 2016, 'Sedan', 40, 0, 'Color Blue\r\nSEATS	5\r\nAIRBAGS	10\r\nFUEL EFFICIENCY RATING (L/100km)	9.4/6.7 (City/Hwy)\r\nENGINE	2.5 Litre 4-cyl\r\n\r\nStandard features include:\r\n\r\n*Display Audio with Bluetooth *Compatibility and USB Input\r\n*Air Conditioning\r\n*Backup Camera\r\n*Automatic Headlamp System\r\n*Cruise Control\r\n*Keyless Entry\r\n*Toyota''s Star Safety System', 'img/camry.jpg'),
(2, 'Toyota', 'Prius', 2016, 'Hybrid 5-DR Liftback', 40, 0, 'Color Pearl\r\nSeats 5\r\nAirbags 5\r\nFUEL EFFICIENCY RATING (L/100km)	4.4/4.6/4.5 (City/Hwy/Combined)\r\nHORSEPOWER 121 hp Net Power\r\nENGINE	1.8 Litre, 4-Cylinder, Hybrid\r\nSynergy Drive\r\n\r\nStandard features include:\r\n\r\n*LED Headlamps and Daylight Running Lights\r\n*Advanced Full-colour TFT Gauge Cluster\r\n*Eco Drive Monitor\r\n*Bluetooth Compatibility\r\n*6-Speakers\r\n*Backup Camera\r\n*Smart Key System\r\n*Push Button Start\r\n*Toyota''s Star Safety System', 'img/prius.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`user_id`), ADD KEY `user_location` (`user_location`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`resv_id`), ADD KEY `user_id` (`user_id`), ADD KEY `resv_vehicle_id` (`resv_vehicle_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
 ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `resv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`user_location`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `person` (`user_id`),
ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`resv_vehicle_id`) REFERENCES `vehicle` (`vehicle_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
