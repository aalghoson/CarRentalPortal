<?php
include 'head.php';
include 'includes/connect.php';

?>

<div id="featured" class="container">
    <div class="boxB">
        
        
<?php
if(isset($_POST['Login'])){
    
    
    if (empty ( $_POST ["email"]) == false || empty ( $_POST ["password"] ) == false ){
       $user_email = mysqli_real_escape_string($conn, $_POST["email"]);
        $user_password = mysqli_real_escape_string($conn, $_POST["password"]);

    }
    else{
        
        echo "username and/or password cannot be empty.. redirecting";
		echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';
        
    }
    
    $login_sql = $conn->query("SELECT * FROM person WHERE email = '$user_email' AND password = '$user_password'");

     //check if exists on db
    $result_login = mysqli_query($conn,$login_sql);
    $count = mysqli_num_rows($result_login); // this should be one if user login is correct
    
    
    
    if(!$login_sql)
    {
            echo "<b>". $user_email ." e-mail address is not found</b><br>";   
            mysqli_close($conn);
            echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';
    } 
    
        $row = $login_sql->fetch_array(MYSQLI_BOTH);
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
?>

            
        <div class="alert alert-success">
         <h4 class="Rform">Welcome <?php echo $row['fname'] ?>, <br> Redirecting...</h4> 
        </div>


    <?php
				
		 echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';

	mysqli_close($conn);

}
else{
    
    //redirect
    echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';
    	mysqli_close($conn);

}

?>

    </div>

</div>




<?php

mysqli_close($conn);

include 'footer.php';

?>