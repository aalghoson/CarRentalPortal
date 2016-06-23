
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
		?>
<div id="featured" class="container">
    <div>
        
        <legend>Reservation Management</legend>
        
     <fieldset>
     <a href="index.php" class="btn btn-default btn-lg" data-role="none" style="float: right;">Create a Reservation</a>  
       
     <br>
       
       <form action="admin_changes.php" method="POST" enctype="multipart/form-data" class="centerform">
               - The admin is required to check the box below before proceeding with any changes<br>
       
        <input type="checkbox" name="checkBox" id="checkBox" data-role="none" required>
      <b>Administator/Manager check : I agree to the changes.</b>
   
 <?php 
 
// if button is clicked condition
 //if(isset($_POST["View_Reservation"])){
 	
 // query resv table
 // cancel resvs, add new resvs, delete resvs
 
	 $sql_management_view_resv = $conn->query("SELECT * FROM `reservation` ORDER BY status");
 
 	$row_nums_res = $sql_management_view_resv->num_rows;
 	if($row_nums_res <= 0)
 	{
 		echo "No Reservations Found on the database!<br>";
	 }else {

		
 		while($row_res = mysqli_fetch_assoc($sql_management_view_resv)){
		// loop through table and output everything
		$resv_ID = $row_res['resv_id'];
		$resv_user_id = $row_res['user_id'];
		$resv_vehicle_id = $row_res['resv_vehicle_id'];
		$row_res['return_location'];
		$row_res['pick_date'];
		$row_res['return_date'];
		$row_res['pick_time'];
		$row_res['pick_location'];
		$row_res['return_time'];
		$res_code = $row_res['confirmation_code'];
		$row_res['date_created'];
		$status_res = $row_res['status'];
		// table for reservations and thier info
 
		
		
		// ---------
		// query vehicle table using resv_vehicle_id
 
		$sql_vehicle_res = $conn->query("SELECT * FROM `vehicle` WHERE `vehicle_id` = '$resv_vehicle_id'");
		$row_nums = $sql_vehicle_res->num_rows;

		while ($row_veh_res = mysqli_fetch_assoc($sql_vehicle_res))
		{
			$vehicle = $row_veh_res['year'] . 
			" " . $row_veh_res['make']
			 ." ".$row_veh_res['model']
			." - ".  $row_veh_res['type']
			." - ". $row_veh_res['description'];
		}
		//-------------------
		
		// -----------
		// query person table using $resv_user_id
		
		$sql_user_res = $conn->query("SELECT * FROM `person` WHERE `user_id` = '$resv_user_id'");
		$row_nu = $sql_vehicle_res->num_rows;
		
		while ($row_user_res = mysqli_fetch_assoc($sql_user_res))
		{
			$res_customer = "Customer: ". $row_user_res['fname'] .
			" " . $row_user_res['lname']
			." - Email: ".$row_user_res['email']
			." - Phone: ".  $row_user_res['phone']
			." - Address: ". $row_user_res['address'];
		}
		//-------------------
		
		// -----------
		
		// display table here for each reservation, including details
		
		//echo "ID:".$resv_ID . " Confirmation Code: " . $res_code . " <br>";
		//echo $res_customer  . " <br>";;
		//echo $vehicle;
		
		
		
		
		// buttons here
		?>
		
		
		
		<table class="table table-striped ">
		<thead>
		<tr>
		<th></th>
		<th>ID</th>
		<th>Customer</th>
		<th>Date Created</th>
		<th>Vehicle</th>
		<th>Confirmation Code</th>
		<th>Status</th>
		<th></th>
		</tr>
		</thead>
		
		<tbody>
		<tr>
		<td> <button type="submit" class="btn btn-default btn-xs" data-role="none" name="View"
		      id="View" value="<?php echo $resv_ID; ?>">View</button>   
		</td>
		      
		<td> <?php echo $resv_ID; ?> </td>
		<td> <?php echo $res_customer; ?> </td>
		<td><?php echo $row_res['date_created']; ?></td>
		<td><?php echo $vehicle; ?></td>
		<td><?php echo $res_code; ?></td>
		<td><?php echo $status_res; ?></td>	        
		
		        <td>  
		        
		        <?php 
		        if($status_res === 'active'){

		        ?>
		        
		     <button type="submit" class="btn btn-default btn-sm" data-role="none" name="Delete"
		      id="Delete" value="<?php echo $resv_ID; ?>">Delete</button>     
		      <button type="submit" class="btn btn-primary btn-sm" data-role="none" name="Cancel"
		      id="Cancel" value="<?php echo $resv_ID; ?>">Cancel</button>   
		        
		         <?php 
		         }else{
		         	
				?>
				<button type="submit" class="btn btn-default btn-sm" data-role="none" name="Delete"
					id="Delete" value="<?php echo $resv_ID; ?>">Delete</button>

					<?php
		         }
		        
		        
		        ?>
		        </td>
		        
		      </tr>
		        </tbody>
		      
		        </table>
		        
		  <?php     
		//echo "<hr>";
		
		
		
 		}
	 }

 //}
?>
     
	 
 	
        </form>
        </fieldset>
    </div>
</div>






<?php

include 'footer.php';
?>