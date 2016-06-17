<?php
include "head.php";
include "includes/connect.php";
?>


  
<div id="featured" class="container">
    
    <div class="boxB">

<?php 

if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
    echo '<META HTTP-EQUIV="Refresh" Content="3; URL=signup.php">';
}

if(isset($_POST["Signup"]))
{
    
    ?>
        <div class="alert alert-success">
         <h4 class="Rform">New user registeration</h4> 
        </div>
        
    <?php
    
    
    // taking inputs
	$fName = mysqli_real_escape_string($conn, $_POST["fname"]);
	$lName = mysqli_real_escape_string($conn, $_POST["lname"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$pass = mysqli_real_escape_string($conn, $_POST["passw"]);
    //$DateOfBirth = mysqli_real_escape_string($conn, $_POST["DOB"]);
	$phone = mysqli_real_escape_string($conn, $_POST["pNumber"]);
	//$user_location = mysqli_real_escape_string($conn, $_POST["user_location"]);

    
    
    
    // check if duplicate email exists on db
    

    $sql_check = $conn->query("SELECT * from person where `email` = '$email'");
    
    $result = $conn->query($sql_check);
       
    if(!$row = mysqli_fetch_array($sql_check)) 
    {
        $sql = $conn->query("INSERT INTO person (`fname`, `lname`, `email`, `password`, `phone`) 
        VALUES('$fName', '$lName', '$email', '$pass', $phone')");
    
    } 
    else 
    {
        echo "...";
        echo "<b>". $email ." e-mail address you've entered is already registered in our databases, 
        you can login or register with a new email</b><br>";
        
        
        include 'includes/goBack.php';
    }    
    
    //echo "result:". $row['email'];
        
    
    // sql statement
	
?>
        
      
<?php
    
	if($sql){
		echo "<b>Registeration Completed...Redirecting!</b> <br>";
		header( "refresh:0;url=index.php" );
	}
	else
	{
		echo "An error occured...Redirecting! <br>";
		header("refresh:3;url=signup.php");
	}
    
    
    // end of if
}
        
else if(isset($_POST["Change"]))
{
    
    ?>
        <div class="alert alert-success">
         <h4 class="Rform">Updating account information</h4> 
        </div>
        
    <?php
    
    // taking inputs
	$nfName = mysqli_real_escape_string($conn, $_POST["fname"]);
	$nlName = mysqli_real_escape_string($conn, $_POST["lname"]);
	$nemail = mysqli_real_escape_string($conn, $_POST["email"]);
	$npass = mysqli_real_escape_string($conn, $_POST["passw"]);
	$nphone = mysqli_real_escape_string($conn, $_POST["pNumber"]);
	//$user_address = mysqli_real_escape_string($conn, $_POST["user_address"]);
    
        $sql = $conn->query("UPDATE person 
        SET `fname` = '$nfName',
        `lname` = '$nlName',
        `email` = '$nemail',
        `password` = '$npass',
        `phone` = '$nphone' 
        WHERE `user_id` = '$user_ID'");
	

    
	if($sql){
		echo "<b>Your account information has been updated...Redirecting!</b> <br>";
            echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';

		header( "refresh:0;url=index.php" );
	}
	else
	{
        echo "<b>Your account information cannot be updated at this time</b><br>";
    
		header("refresh:3;url=index.php");
	}
    
    
    
}else{
        ?>
         <div class="alert alert-warning">
         <h4 class="Rform">An error occured...Redirecting!</h4> 
        </div>
        <?php
        header("refresh:3;url=signup.php");
    
    }
        

        ?>
        
        
    </div>
</div>
        
        
<?php

mysqli_close($conn);
include "footer.php";
?>