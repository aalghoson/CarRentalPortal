<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Homepage</title>


<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="style0.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="p_validation.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<!--


<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>


[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]




-->


    
<header id="header" class="container">
	
	
    
<!--
<h2 class="Rform">Car Rental Service Portal</h2>
<nav>
	<div class="btn-group">
  <button type="button" class="btn btn-primary">Apple</button>
  <button type="button" class="btn btn-primary">Samsung</button>
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Sony <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="#">Tablet</a></li>
      <li><a href="#">Smartphone</a></li>
    </ul>
  </div>
</div>
	</nav> -->
	
    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Car Rental Service Portal</a>
    </div>
    
    <ul class="nav navbar-nav">
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
     
             <ul class="nav navbar-nav navbar-right">
          <?php // add code to check if user is logged in
          // if logged then display message and firstname, lastname and logout button
          // else display signup and login buttons
        include 'includes/functions.php';  
        include 'includes/connect.php';
                 session_start();
      
      
        if(logged_in() === true ){
			
			$user_ID = $_SESSION['user_id'];
			$User_sql = "SELECT * FROM person WHERE `user_id` = '$user_ID'";
			
			$result1 = mysqli_query($conn, $User_sql);
			
			 while($row = mysqli_fetch_assoc($result1)){
                $User_email = $row['email'];
                $User_fname = $row['fname'];
                $User_lname = $row['lname'];
                $User_phone = $row['phone'];
                //$User_address = $row['address']; 

                 
             }
            
            //$row = mysqli_fetch_assoc($result1);
				// get username
			//echo 'Logged in as ' , $_SESSION["uid"];
            echo "<b>". "Welcome " . $User_fname . " " . $User_lname . "</b>";
            
      ?>
            <br><a href="account.php">Account settings</a>
			<form action="logout.php" method="post" enctype="multipart/form-data" >
            <input type="submit" class="btn btn-danger" data-role="none" value="Logout">
            </form>
            </ul>
      
      
			<?php
        }
		else{ 
           ?>
                 <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php" class="ui-btn ui-btn-inline ui-corner-all"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
          <li><a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all" ><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                </ul>
      
        <?php        
            // display popup
        
		}
            
            
          ?>
   
        </div>  
        <?php 

          ?>
 <div data-role="popup" id="myPopup" class="ui-content" data-overlay-theme="b" style="min-width:250px;">
      <form method="post" action="login.php">
        <div>
          <label for="email" class="ui-hidden-accessible">Email:</label>
          <input type="email" name="email" id="email" placeholder="Email" required>
          <label for="pswd" class="ui-hidden-accessible">Password:</label>
          <input type="password" name="password" id="password" placeholder="Password" required><br>
            
            
          <input type="submit" data-inline="true" name="Login" value="Log in">
        </div>
      </form>
    </div>
         <?php 
            mysqli_close($conn);
        ?> 
</nav>



    
</header>

</head>

<body>
    
  