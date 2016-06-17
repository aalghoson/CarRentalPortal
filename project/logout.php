<?php
include 'head.php';
include 'includes/connect.php';
?>



   
<div id="featured" class="container">
    
    <div class="boxB">
        
        
<?php
	
	session_start();
	
	unset($_SESSION['user_id']);
	
	session_destroy();

	echo ' logged out!</br>';
	echo 'Goodbye!</br>Redirecting...';
	echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';

   
	/*
    
   session_start();
   session_destroy();
   header("Location: index.php");
   
   */
?>



    </div>
</div>

<?php

mysqli_close($conn);

include 'footer.php';

?>