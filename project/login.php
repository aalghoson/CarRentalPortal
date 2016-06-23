<?php
include 'head.php';
include 'includes/connect.php';



?>



<div id="featured" class="container">
    <div class="boxB">
            


<?php 
if(isset($_POST['Login'])){
    
    
    if (empty ( $_POST ["email"]) == true || empty ( $_POST ["password"] ) == true ){
    	echo "username and/or password cannot be empty.. redirecting";
    	header("refresh:3;url=index.php");
    	
    }
    
    
    $user_email = mysqli_real_escape_string($conn, $_POST["email"]);
    $user_password = mysqli_real_escape_string($conn, $_POST["password"]);
    

    $login_sql = $conn->query("SELECT * FROM person WHERE email = '$user_email' AND password = '$user_password'");

     //check if exists on db
    $row_login = $login_sql->num_rows;
    //$result_login = mysqli_query($conn, $sql_management);
    
    
    if($row_login > 0)
    {
    	
    	$row = $login_sql->fetch_array(MYSQLI_BOTH);
    	session_start();
    	$_SESSION['user_id'] = $row['user_id'];
    	?>
    			
    	        <div class="alert alert-success">
    	         <h4 class="Rform">Welcome <?php echo $row['fname'] ?>, <br> Redirecting...</h4>
    	         
    	         If you have not been redirected in 3 seconds, click
    	         <a href='index.php'>here</a> 
    	         
    	        </div>
    	
    	
    	<?php
		echo '<META HTTP-EQUIV="Refresh" Content="1 ;URL=index.php">';
        header("refresh:3;url=index.php");    	
    	
    		mysqli_close($conn);
    		
    }
    else{
    	?>
    	
    	<div class="alert alert-danger">
		<h4 class="Rform"><?php echo $user_email; ?> e-mail address is not found! <br></h4>
    	         If you have not been redirected in 3 seconds, click
    	         <a href='index.php'>here</a> 
    	         
    	        </div>
    	<?php
    	header("refresh:3;url=index.php");
		mysqli_close($conn);    	
    }
    
        

}
else{
    
    //redirect
    header("refresh:3;url=index.php");
    	mysqli_close($conn);

}

?>

    </div>

</div>




<?php

mysqli_close($conn);

include 'footer.php';

?>