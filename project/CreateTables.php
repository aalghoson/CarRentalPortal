<?php



// to create database if it does not exist
CREATE DATABASE IF NOT EXISTS rentdb;

//-----------




CREATE TABLE IF NOT EXISTS `person` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT,
 `fname` varchar(255) NOT NULL,
 `lname` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `phone` varchar(20) NOT NULL,
 `disability` tinyint(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
    
    

// CONSTRAINT `person_ibfk_1` FOREIGN KEY (`user_location`) REFERENCES `location` (`location_id`)



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



CREATE TABLE IF NOT EXISTS `vehicle` (
`vehicle_id` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` text,
  `pic_link` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;





ALTER TABLE `reservation`
 ADD PRIMARY KEY (`resv_id`), ADD KEY `user_id` (`user_id`), ADD KEY `resv_vehicle_id` (`resv_vehicle_id`);


ALTER TABLE `vehicle`
 ADD PRIMARY KEY (`vehicle_id`);










?>