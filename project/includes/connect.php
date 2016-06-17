
<?php



//connect to database..

	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db = "db1";
	
	$conn = mysqli_connect($host, $user, $pass, $db) or die("database connection is not working");
	
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	

session_start();


	
//mysqli_select_db();


//mysqli_close($conn);


?>