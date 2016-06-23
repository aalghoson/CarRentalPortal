<?php

// (1) Create a MySQL database connection:
$conn = mysqli_connect("localhost", "alghosoa", "ahmad2","alghosoa");

// (2) Check connection:
if(!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


// to create database if it does not exist
//$sql0 = "CREATE DATABASE IF NOT EXISTS rentdb";

//-----------


$sql2 = "CREATE TABLE IF NOT EXISTS `reservation` (
`resv_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `resv_vehicle_id` int(11) NOT NULL,
  `pick_location` varchar(255) NOT NULL,
  `return_location` varchar(255) NOT NULL,
  `pick_date` date NOT NULL,
  `return_date` date NOT NULL,
  `pick_time` varchar(255) NOT NULL,
  `return_time` varchar(255) NOT NULL,
  `confirmation_code` varchar(255) NOT NULL,
`date_created` timestamp NOT NULL,
`status` varchar(10) NOT NULL DEFAULT 'active')" ;




if (mysqli_query($conn, $sql2)) {
	echo "table reservation created successfully";
}

else {
	echo "Error creating table: " . mysqli_error($conn);
}


// CONSTRAINT `person_ibfk_1` FOREIGN KEY (`user_location`) REFERENCES `location` (`location_id`)


$sql3 = "CREATE TABLE IF NOT EXISTS `vehicle` (
`vehicle_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` text NOT NULL,
  `pic_link` varchar(255) NOT NULL)";




if (mysqli_query($conn, $sql3)) {
	echo "table vehicle created successfully";
}

else {
	echo "Error creating table: " . mysqli_error($conn);
}






// (4) Always close Database connection:
mysqli_close($conn);


/*
 * 


####################
 
$sql_person = "create table if not exists person (`users_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`fname` varchar(255) NOT NULL,
		`lname` varchar(255) NOT NULL,
		`email` varchar(255) NOT NULL,
		`passowrd` varchar(10) NOT NULL,
		`phone` varchar(11) NOT NULL)";


if (mysqli_query($conn, $sql_person)) {
	echo "table created successfully";
}

else {
	echo "Error creating database: " . mysqli_error($conn);
}


####################
 * 
$sql1 = "CREATE TABLE IF NOT EXISTS `person` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `fname` varchar(255) NOT NULL,
 `lname` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `phone` varchar(20) NOT NULL,
 `disability` tinyint(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1";
    
    
    
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`resv_id`), ADD KEY `user_id` (`user_id`), ADD KEY `resv_vehicle_id` (`resv_vehicle_id`);


ALTER TABLE `vehicle`
 ADD PRIMARY KEY (`vehicle_id`);


*/







?>