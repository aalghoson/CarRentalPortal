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
echo '<META HTTP-EQUIV="Refresh" Content="1 ;URL=index.php">';
        header("refresh:3;url=index.php");

echo "<br>If you have not been redirected in 3 seconds, click <a href='index.php'>here</a>";
   
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