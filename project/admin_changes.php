
<?php
//management for reservations management

include 'head.php';
include 'includes/connect.php';
include 'includes/goBack.php';

session_start();



	if($account_type === 'admin'){
	
	}
	else{                             
		echo '<b>Only admins get access to this page</b><br>';
		
		echo '<META HTTP-EQUIV="Refresh" Content="1 ;URL=index.php">';
        header("refresh:3;url=signup.php");
        ?>
        		
        		If you have not been redirected in 3 seconds, click
            	         <a href='index.php'>here</a> 
            	         
        		
        <?php
		die();
		}
		

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';
		}
		?>
		
		
<div id="featured" class="container">
    <div class="boxR">
        
        <legend>Reservation Management</legend>
        
     <fieldset>
     
     
     
     
 <?php    
if (isset($_POST["Delete"])){
// case 1 - delete
	
	$resv_id_view = $_POST['Delete'];

	$sql_management_ch = $conn->query("SELECT * FROM `reservation` WHERE `resv_id` = '$resv_id_view'");

	$row_nums = $sql_management_ch->num_rows;

	if($row_nums <= 0)
	{
	echo "No Reservations Found!.<br>";
	}else {

	$sql_management_del = $conn->query("DELETE FROM `reservation` WHERE `resv_id` = '$resv_id_view'");
		
	echo "<h4>Reservation has been deleted!</h4><br>";
	header("refresh:3;url=Admin_View_Reservation.php");
	?>
						
						If you have not been redirected in 3 seconds, click
				    	         <a href='Admin_View_Reservation.php'>here</a> 
				    	         
						
	<?php
		}


}
elseif(isset($_POST['Cancel'])){
// case 2 - cancel
   
   
	$resv_id_view = $_POST['Cancel'];

	$sql_management_cancel = $conn->query("SELECT * FROM `reservation` WHERE `resv_id` = '$resv_id_view'");
	
	$row_nums = $sql_management_cancel->num_rows;
	
	if($row_nums <= 0)
	{
		echo "No Reservations Found!.<br>";
	}else {
		$sql_cancel = $conn->query("UPDATE `reservation` SET `status` = 'cancelled' WHERE `resv_id` = '$resv_id_view'");
			
		echo "Reservation has been cancelled!<br>";
		header("refresh:3;url=Admin_View_Reservation.php");
		?>
						
						If you have not been redirected in 3 seconds, click
				    	         <a href='Admin_View_Reservation.php'>here</a> 
				    	         
						
	<?php
		}
		

}
elseif (isset($_POST['View'])){
	// case 3 - view
// query reservation table using resv_id and print details

	
	$resv_id_view = $_POST['View'];
	//echo $resv_id_view;
	$sql_management_view = $conn->query("SELECT * FROM `reservation` WHERE `resv_id` = '$resv_id_view'");
	
	$row_nums_res = $sql_management_view->num_rows;
	if($row_nums_res <= 0)
	{
		echo "No Reservations Found on the database!<br>";
	}else {
	
	
		while($row_view = mysqli_fetch_assoc($sql_management_view)){
			// loop through table and output everything
			$resv_user_id = $row_view['user_id'];
			$resv_vehicle_id = $row_view['resv_vehicle_id'];
			$row_view['return_location'];
			 $row_view['pick_date'];
			$row_view['return_date'];
			$row_view['pick_time'];
			$row_view['pick_location'];
			$row_view['return_time'];
			$res_code = $row_view['confirmation_code'];
			$row_view['date_created'];
			$status_res = $row_view['status'];
			// table for reservations and thier info
	

			$result1 = $conn->query("SELECT * FROM vehicle WHERE vehicle_id = '$resv_vehicle_id'");
			
			
			while($rows = mysqli_fetch_assoc($result1)){
				 
				 
				$Make = $rows['make'];
				$Model = $rows['model'];
				$Year = $rows['year'];
			
				$Type = $rows['type'];
				$Price = $rows['price'];
			
				$Des = $rows['description'];
				$pic = $rows['pic_link'];
			
			
				 
				 
				//echo $pic;
			}
				
			
			$sql_user_view = $conn->query("SELECT * FROM person WHERE `user_id`= '$resv_user_id'");
			
			while ($row_user_view = mysqli_fetch_assoc($sql_user_view))
			{
			$res_customer_view = "<b>Customer:</b> ". $row_user_view['fname'] .
			" " . $row_user_view['lname']
			." - Email: ".$row_user_view['email']
			." - Phone: ".  $row_user_view['phone']
			." - Address: ". $row_user_view['address'];
			}
			
			
			
			
			
			
			
			
			
			
			
			
			?>
	
			
	
					 <div class="alert alert-success">
			        <?php include 'includes/print.php';?>
			        <h4 class="Rform">Reservation Summary</h4> 
			        </div>
			
			        <?php
			        echo "<h3><b>Confirmation Code : ". $res_code . " - Status: " . $status_res ."</b></h3><br>";
			        echo "<legend></legend>";
			        echo $res_customer_view;
			        echo "<p><b>Pickup Location: </b>". $row_view['pick_location'] ."<br> <b>Return Location: </b>".$row_view['return_location'] ."</p>";
			        echo "<p><b>Pickup Date: </b>".  $row_view['pick_date'] ." <b>Pickup Time: </b>".$row_view['pick_time'] ."</p>";
			        echo "<p><b>Return Date: </b>". $row_view['return_date'] ." <b>Return Time: </b>".$row_view['return_time'] ."</p>";
			        echo "<p><b>Vehicle: </b>". $Year ." ". $Make ." ".$Model . " ". $Type ."</p><br>";
			        echo "<p><b> Description:</b> ".$Des ."</p>";
			        echo "<p><b> Daily Rate: $</b> ".$Price ."</p>";
			         
			        echo "<p><b> Price/day: $</b> ".((0.10)*$Price+$Price) ."</p>";
			        echo "<legend> </legend>";
			    
			    
			        ?>
			          <img class="img-responsive" src="<?php echo $pic; ?>"  height="170" width="292">
			
			        <?php
	
}


}
     


}
     ?>
     
     
     
     
    
        </fieldset>
    </div>
</div>






<?php

include 'footer.php';
?>
     