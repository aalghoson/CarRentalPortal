
<?php

include 'head.php';
include 'includes/connect.php';
include 'includes/goBack.php';
// div tags here

?>



<div class="container">
  <form class="form-horizontal" role="form">
    <fieldset>
       

<?php
/////////////// 
            
           
            
$conn = mysqli_connect($host, $user, $pass, $db) or die("database connection is not working");
	/* check connection */
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

        
/* 
take user's email and confirmation code 
then query person table using email to get customer's info
*/
        

if(isset($_POST["Submit"]))
{
    $email = mysqli_real_escape_string($conn,$_POST['resv_email']);
    $confirmCode = mysqli_real_escape_string($conn,$_POST['code']);

        
$getID_sql = $conn->query("SELECT * FROM person WHERE email = '$email'");
    
  // / if($getID_sql){
    
         while($row = mysqli_fetch_assoc($getID_sql)){
             
            $userID = $row['user_id'];
            $firstName = $row['fname'];
            $lastName = $row['lname'];
            $phone = $row['phone'];
             
        
         }
    
   /* }
    else{ // die when no query found
        die("Your email is not found in our database");
    }*/
 
    
    
/* 
then query reservation table using userID to get reservation info
*/  

$result_resv = $conn->query("SELECT * FROM reservation WHERE user_id = '$userID' AND confirmation_code = '$confirmCode'");

    
    while($rows = mysqli_fetch_assoc($result_resv)){
    
    $resID = $rows['resv_id'];
    $uID = $rows['user_id'];
    $resV = $rows['resv_vehicle_id'];
        
    $pickLoc = $rows['pick_location'];
    $returnLoc = $rows['return_location']; 
        
    $pickDate = $rows['pick_date'];
    $pickTime = $rows['pick_time'];
        
    $returnDate = $rows['return_date'];
    $returnTime = $rows['return_time'];
        
    //$uID = $rows['return_date'];
   
    }// end of 1st while loop


//--------------
    
/* 
then query vehicle table using reserved car id to get vehicle's info
*/
       
$result1 = $conn->query("SELECT * FROM vehicle WHERE vehicle_id = '$resV'");


 while($rows = mysqli_fetch_assoc($result1)){
     
     
    $Make = $rows['make'];
    $Model = $rows['model'];
    $Year = $rows['year'];
        
    $Type = $rows['type'];
    $Price = $rows['price']; 
        
    $Des = $rows['description'];
    $pic = $rows['pic_link'];
        

     
     
//echo $pic;
}
     
if($result_resv == true){
    //if(!$getID_sql){
        ?>
        
        <div class="alert alert-success">
        <?php include 'includes/print.php';?>
        <h4 class="Rform">Reservation Summary</h4> 
        </div>

        <?php
        echo "<h3><b>Confirmation Code : #". $confirmCode . "</b></h3><br>";
        echo "<legend></legend>";
        echo "<p><b>Customer: </b>" . $firstName . " " . $lastName . " </p>";
        echo "<b>Email: </b>".$email. "<br>";
        echo "<p><b>Phone: </b>" . $phone . "</b></p>";
        echo "<p><b>Pickup Location: </b>". $pickLoc ."<br> <b>Return Location: </b>".$returnLoc ."</p>";
        echo "<p><b>Pickup Date: </b>". $pickDate ." <b>Pickup Time: </b>".$pickTime ."</p>";
        echo "<p><b>Return Date: </b>". $returnDate ." <b>Return Time: </b>".$returnTime ."</p>";
        echo "<p><b>Vehicle: </b>". $Year ." ". $Make ." ".$Model . " ". $Type ."</p><br>";
        echo "<p><b> Description:</b> ".$Des ."</p>";
        echo "<legend> </legend>";
    
    
        ?>
          <img class="img-responsive" src="<?php echo $pic; ?>">

        <?php
    
      
    
//}
    }else{
        
        ?>
         <div class="alert alert-warning">
         <h4 class="Rform">No reservation found!</h4> 
        </div>
        
        <?php
        header("refresh:3;url=index.php");
    
        }

        ?>

        
        
<?php   

mysqli_close($conn);

}
else{

    // redirect user here
    ?>
         <div class="alert alert-warning">
         <h4 class="Rform">No reservation found!</h4> 
        </div>
        
        <?php
        header("refresh:3;url=index.php");
    
    }
        ?>
       
      </fieldset></form>
</div>
        
<?php

include 'footer.php';

?>