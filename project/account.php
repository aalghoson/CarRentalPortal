
<?php

include 'head.php';
include 'includes/connect.php';
include 'includes/goBack.php';

session_start();


//TODO: condition to check if user is logged in to continue with the process.

	if( isset($_SESSION['user_id'])){
	
	}
	else{                             
		echo '<b>you need to login or signup to access this page</b><br>';
		
		echo '<META HTTP-EQUIV="Refresh" Content="1 ;URL=index.php">';
        header("refresh:3;url=signup.php");
		die();
	}
?>

<div id="featured" class="container">
    <div class="boxB">
            
        <div class="alert alert-success">
         <h4 class="Rform">Account Information</h4>
        </div>
        
        
        <form method="POST" action="register_user.php" enctype="multipart/form-data">
        
        <b>Current Information:</b><br> 

<?php

echo "<i>Email : " . $User_email . "<br>";
echo "Name : " . $User_fname . " " .  $User_lname ."<br>";
echo "Phone : " . $User_phone . "</i>" . "<br>";
?>
                                              <legend></legend>
            
 <div class="alert alert-warning">
         <h4 class="Rform">Fill in the fields to update your account information</h4>
        </div>
            
        <b>New Email:</b><br>
        <input type="email" name="email" id="email" data-role="none" placeholder="Email" required><br><br>
            
        <b>New First Name:</b><br>
        <input type="text" name="fname" id="fname" data-role="none" maxlength="10" placeholder="Firstname" required><br><br>
            
        <b>New Last Name:</b><br>
        <input type="text" name="lname" id="lname" data-role="none" maxlength="10" placeholder="Lastname" required><br><br>   

        <b>New Address:</b><br>
        <input type="text" name="location" id="location" data-role="none" placeholder="#, Street, City, Prov." required><br><br>
            
            <b>New Phone Number:</b><br>
        <input type="tel" name="pNumber" id="pNumber" data-role="none" placeholder="+1-(ddd)-(ddd)-(dddd)" required><br><br> 
            
        <b>New Password:<p id="passw_error"></p></b>
        <input type="password" name="passw" id="passw" data-role="none" maxlength="6" placeholder="Password" required>
        <br>
            
            <b>Confirm New Password: <p id="passconf_error"></p></b>
        <input type="password" name="passconf" id="passconf" data-role="none" maxlength="6" placeholder="Confirm Password" required><br><br>
        
        <input type="checkbox" name="checkBox" id="checkBox" data-role="none" required>
        <b>I am over 18 years old and I agree on the terms of use.
        <br><br>
                                              <legend></legend>

        <input type="submit" name="Change" class="btn btn-success" data-role="none" value="Confirm Changes">
        <input type="reset" class="btn btn-info" data-inline="true" data-role="none" value="Reset">
 
            
            </form>
            <script type="text/javascript" src="p_validation_reg.js"></script>


    </div>
    
</div>








<?php

include 'footer.php';
?>
