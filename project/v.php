
<?php
include 'connect.php';



if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
    echo '<META HTTP-EQUIV="Refresh" Content="3; URL=signup.php">';
}


$sql = $conn->query("INSERT INTO vehicle (`make`, `model`, `year`, `type`, `price`,`disability`, `description`, `pic_link`)
VALUES('Toyota', 'Camry', 2013, 'Sedan', 45, 0, 'Color White', 'img/camry_white.png'),
('Honda', 'Civic', 2012, 'Sedan', 40, 0, 'Color Red', 'img/civic_red.png'),
('Honda', 'Pilot', 2014, 'SUV', 60, 0, 'Color Black', 'img/pilot_black.png'),
('Ford', 'F150', 2010, 'Truck', 35, 0, 'Color Blue', 'img/F150-blue.png'),
('GMC', 'Sierra', 2012, 'Truck', 45, 0, 'Color Black', 'img/sierra_black.png'),
('Dodge', 'Grand Caravan', 2013, 'Van', 50, 0,'Color White', 'img/caravan_white.png'),
('Toyota', 'Sienna', 2015, 'Van', 65 ,1, 'Wheelchair Van, Color Silver', 'img/sienna_silver.png')");





/*


$sql = $conn->query("INSERT INTO person (`fname`, `lname`, `email`, `password`, `DOB`, `phone`) 
    VALUES('$fName', '$lName', '$email', '$pass', '$DateOfBirth', '$phone')");
    
    
    
$sql = "INSERT INTO vehicle (`make`, `model`, `year`, `type`, `price`,`description`, `pic_link`) 
    VALUES('Dodge', 'Viper GTC', 2016, 'Sport', 120, 'COLOR Purple' ,'img/viper.png')";
*/

mysqli_close($conn);


?>