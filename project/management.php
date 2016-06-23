
<?php
//management for reservations management

include 'head.php';
include 'includes/connect.php';
include 'includes/goBack.php';

session_start();



	if( isset($_SESSION['user_id'])){
	
	}
	else{                             
		echo '<b>you need to login or signup to access this page</b><br>';
		
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
    <div class="boxB">
        
        <legend>Reservations</legend>
     <fieldset>
       
 <form action="change_reservation.php" method="POST" enctype="multipart/form-data" class="centerform">




<?php

if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
    echo '<META HTTP-EQUIV="Refresh" Content="3; URL=signup.php">';
}

// using user_id we can query reservation table
     $sql_management = $conn->query("SELECT * FROM `reservation` WHERE `user_id` = '$user_ID' AND `status` = 'active'");
    
   
     
     
    // echo $sql_management;
    $row_nums = $sql_management->num_rows;
    $result = mysqli_query($conn, $sql_management);
     
     
     if($row_nums <= 0)
	{
	
		echo "No Reservations Found!.<br />";
	
	} else {
        
         while ($row_m = mysqli_fetch_assoc($sql_management))
		{
                // loop through table and output everything
             $row_m['resv_id'];
             $resv_vehicle_id = $row_m['resv_vehicle_id'];
             $row_m['return_location'];
             $row_m['pick_date'];
             $row_m['return_date'];
             $row_m['pick_time'];
             $row_m['pick_location'];
             $row_m['return_time'];
             $row_m['confirmation_code'];
             $row_m['date_created'];
             // table for reservations and thier info
				
             
             // query vehicle table using resv_vehicle_id
             
            $sql_vehicle = $conn->query("SELECT * FROM `vehicle` WHERE `vehicle_id` = '$resv_vehicle_id'");
            $row_nums2 = $sql_vehicle->num_rows;
            
            while ($row_v = mysqli_fetch_assoc($sql_vehicle))
            {
            	 $vehicle = "<b>Vehicle: </b>". $row_v['year'] . " " . $row_v['make'] ." ".$row_v['model']." - ".  $row_v['type']." - ".
            	 $row_v['description'];
            }

             
          ?>
     
     <table class="table table-striped ">
    <thead>
      <tr>
        <th>Confirmation Code</th>
        <th>Customer Name</th>
        <th>Date Created</th>
        <th></th>
      </tr>
    </thead>
      
    <tbody>
         <tr>
        
        <td> <h4><?php echo $row_m['confirmation_code']; ?> </h4></td>
        <td> <?php echo $User_fname." ".$User_lname; ?> </td>
        <td><?php echo $row_m['date_created']; ?></td>
        <td>  
     <!--        
     <button type="submit" class="btn btn-primary  btn-sm" data-role="none" name="choice_change" id="choice_change" value="<?php echo $row_m['resv_id']; ?>">Change</button>
      -->
     <button type="submit" class="btn btn-danger btn-sm" data-role="none" name="choice_cancel" id="choice_cancel" value="<?php echo $row_m['resv_id']; ?>">Cancel</button>     
              
        </td>
      </tr>
                 
      
        </tbody>
      
        </table>
             <?php echo $vehicle. "<br>"; 
             echo "<b>Pickup Location:</b> ". $row_m['pick_location'] . ",<br> Time: " . $row_m['pick_date'] . " " .  $row_m['pick_time'];
             echo "<br><b>Return Location: </b>". $row_m['return_location'] . ", <br>Time: " . $row_m['return_date'] . " " .  $row_m['return_time'];
           
             ?>
    		<hr>
                   <legend></legend>

     <br>
         <?php
        
         
         
         
         
         
         //end of while
      }
      ?>
      <input type="checkbox" name="checkBox" id="checkBox" data-role="none" required>
      <b>I agree to the changes and terms of use.</b>
      <?php
      
     }
     
     
?>

     
		
        </form>
        </fieldset>
    </div>
</div>






<?php

include 'footer.php';
?>
