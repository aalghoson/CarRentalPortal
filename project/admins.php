
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
    <div class="">
        
        <legend>Management</legend>
     <fieldset>
     
     <table class="table table-striped ">
		<thead>
		<tr>
		
		<th>
		 <form action="Admin_View_Vehicles.php" method="POST" enctype="multipart/form-data" class="centerform">
  <input type="submit"  name="View_Vehicles" id="View_Vehicles" class="btn btn-lg btn-primary" data-role="none" value="View Vehicles">
 </form>
		</th>
		
		
		<th>
		
 <form action="Admin_View_Reservation.php" method="POST" enctype="multipart/form-data" class="centerform">
  <input type="submit"  name="View_Reservation" id="View_Reservation" class="btn btn-lg btn-success" data-role="none" value="View Reservation">
 </form>
 
		</th>
		
		</tr>
		
		
		
		</thead>
	</table>

 
 
 
 
 
        </fieldset>
    </div>
</div>






<?php

include 'footer.php';
?>
