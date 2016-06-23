
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
    <div class="boxB">
        
        <legend>Management</legend>
     <fieldset>
       
       <form action="admin_changes.php" method="POST" enctype="multipart/form-data" class="centerform">
       
 <?php 
 

 if(isset($_POST["View_Vehicles"]))
 {
 echo "hello vehicles";
 	
 }
 
 
 
     
?>

     
		
        </form>
        </fieldset>
    </div>
</div>






<?php

include 'footer.php';
?>
