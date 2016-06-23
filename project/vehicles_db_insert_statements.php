
<?php
include 'includes/connect.php';


// (2) Check connection:
if(!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}



$sql = $conn->query("INSERT INTO vehicle (`make`, `model`, `year`, `type`, `price`, `description`, `pic_link`)
VALUES('Toyota', 'Camry', 2013, 'Sedan', 45, 'Color White', 'img/camry_white.png'),
('Toyota', 'Prius', 2016, 'Hybrid 5-DR Hatchback', 45, 'Color White', 'img/prius.png'),
('Toyota', 'Sienna', 2015, 'Wheelchair Van', 65 , 'Color Silver','img/sienna_silver.png'),
('Honda', 'Civic', 2012, 'Sedan', 40, 'Color Red', 'img/civic_red.png'),
('Honda', 'Pilot', 2014, 'SUV', 60, 'Color Black', 'img/pilot_black.png'),
('Ford', 'F150', 2010, 'Truck', 60, 'Color Blue', 'img/F150-blue.png'),
('Ford', 'Taurus', 2016, 'Sedan', 60, 'Color Red', 'img/tau.png'),
('Ford', 'Fusion', 2016, 'Sedan', 45, 'Color White', 'img/fusion.png'),
('Ford', 'Edge', 2016, 'CUV', 55, 'Color Black', 'img/edge.png'),
('GMC', 'Sierra', 2012, 'Truck', 60, 'Color Black', 'img/sierra_black.png'),
('Dodge', 'Grand Caravan', 2013, 'Van', 50, 'Color White', 'img/caravan_white.png'),
('Dodge', 'Ram 1500', 2016, 'Truck', 60, 'Color Black', 'img/1500ram.png'),
('Dodge', 'Viper GTC', 2016, 'Sport', 140, 'Color Purple', 'img/viper.png'),
('Dodge', 'Journey', 2016, 'SUV', 60, 'Color Red', 'img/journey.png'),
('Chevrolet', 'Tahoe', 2015, 'SUV', 70, 'Color Black', 'img/2015ChevroletTahoe.png'),		
('Chevrolet', 'Cruze', 2016, 'Sedan', 40, 'Color Blue', 'img/cruze.png'),
('Chevrolet', 'Spark', 2016, 'Hatchback', 35, 'Color Lime', 'img/spark.png'),
('Chevrolet', 'Sonic', 2016, 'Hatchback', 35, 'Color Red', 'img/sonic.png'),
('Chevrolet', 'SS', 2016, 'Sedan-Sport', 60, 'Color Black', 'img/ss.png'),
('Dodge', 'Ram', 2010, 'Two-Truck', 50, 'For Towing services', 'img/tow.png')");



if (mysqli_query($conn, $$sql)) {
	echo "data inserted successfully";
}

else {
	echo "Error: " . mysqli_error($conn);
}


/*


$sql = $conn->query("INSERT INTO person (`fname`, `lname`, `email`, `password`, `DOB`, `phone`) 
    VALUES('$fName', '$lName', '$email', '$pass', '$DateOfBirth', '$phone')");
    
    
    
$sql = "INSERT INTO vehicle (`make`, `model`, `year`, `type`, `price`,`description`, `pic_link`) 
    VALUES('Dodge', 'Viper GTC', 2016, 'Sport', 120, 'COLOR Purple' ,'img/viper.png')";
*/

mysqli_close($conn);


?>