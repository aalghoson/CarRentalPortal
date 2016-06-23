
<?php
//for reservations management changes

include 'head.php';
include 'includes/connect.php';
include 'includes/goBack.php';

session_start();



	if( isset($_SESSION['user_id'])){
	
	}
	else{                             
		echo '<b>you need to login or signup to access this page</b><br>';
		
		echo '<META HTTP-EQUIV="Refresh" Content="1 ;URL=index.php">';
        header("refresh:3;url=index.php");
		die();
	}
	

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';
	}
	
	
?>


<div id="featured" class="container">
    <div class="boxB">
        
        <legend>Reservation</legend>
     <fieldset>
       
       
<?php 


// cancellation option
if(isset($_POST["choice_cancel"]))
{

	
	
	 $resv_ID = $_POST["choice_cancel"];
	// query reservation using the resv_id then change the status of the reservation to cancelled
	
	$sql_management3 = $conn->query("SELECT * FROM `reservation` WHERE `resv_id` = '$resv_ID'");
	
	$row_nums3 = $sql_management3->num_rows;
	 
	if($row_nums3 <= 0)
	{
		echo "No Reservations Found!.<br>";
	}else {
			$sql_cancel = $conn->query("UPDATE `reservation` SET `status` = 'cancelled' WHERE `resv_id` = '$resv_ID'");
			
			echo "Your reservation has been cancelled!<br>";
			header("refresh:3;url=management.php");
					?>
					
					If you have not been redirected in 3 seconds, click
			    	         <a href='management.php'>here</a> 
			    	         
					
					<?php
	}
	
	

	
	
}
// changes option
elseif(isset($_POST["choice_change"]))
{

	echo "HELLO2";







}else{
	die("error #2");
	header("refresh:3;url=index.php");
}




?>





        </fieldset>
    </div>
</div>






<?php

include 'footer.php';
?>






