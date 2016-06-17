
<?php

include 'head.php';
include 'includes/goBack.php';
session_start();

//include 'goBack.php';

?>



<?php

//TODO: condition to check if user is logged in to continue with the process.

	if( isset($_SESSION['user_id'])){
	
	}
	else{                             
		echo 'you need to login or signup to access this page<br>';
		
		echo '<META HTTP-EQUIV="Refresh" Content="1 ;URL=index.php">';
		die();
        
	}

?>

    
<?php


// div tags here



?>

            
            
            
            
            
<div id="featured" class="container">
    <div class="ResvBox">
            
        <div class="alert alert-success">
         <h4 class="Rform">Reservation</h4> 
        </div>

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
        

if(isset($_POST["Reserve"]))
{
    //take input
    $resvlocation = mysqli_real_escape_string($conn,$_POST['loc']);
    $resvDate = mysqli_real_escape_string($conn,$_POST['pickDate']);
    $resvTime = mysqli_real_escape_string($conn,$_POST['pickTime']);
    $retDate = mysqli_real_escape_string($conn,$_POST['returnDate']);
    $retTime = mysqli_real_escape_string($conn,$_POST['returnTime']);
    $Age = mysqli_real_escape_string($conn,$_POST['age']);
    $returnLocation = mysqli_real_escape_string($conn,$_POST['returnLoc']);
    
    
    echo "Pickup Location: " . $resvlocation;
    echo "<br> Date: " . $resvDate;
    echo "<br> Time: " . $resvTime;
    echo "<br><legend></legend>";
    echo "<br> Return Location: " . $returnLocation;
    echo "<br> Date: " . $retDate;
    echo "<br> Time: " . $retTime;
    //---------------------------
    
    $_SESSION['resvlocation'] = $resvlocation;
    $_SESSION['resvDate'] = $resvDate;
    $_SESSION['resvTime'] = $resvTime;
    $_SESSION['retDate'] = $retDate;
    $_SESSION['retTime'] = $retTime;
    $_SESSION['Age'] = $Age;
    $_SESSION['returnLocation'] = $returnLocation;

    
    
//--------------


    
}  

        
?>    
        
    </div>

    <div class="VehicleBox">
         <form action="paymentForm.php" method="post" enctype="multipart/form-data" class="centerform">
             
        <div class="alert alert-success">
         <h4 class="Rform">Choose a vehicle</h4> 
        </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Vehicle</th>
        <th>Type</th>
        <th>Rate</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
      
    <tbody>


<?php




$getVehicle_sql = $conn->query("SELECT * FROM vehicle");

$conn = mysqli_connect($host, $user, $pass, $db) or die("database connection is not working");
	/* check connection */
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}


        // use while loop to list the vehicles
       // echo each column inside of <td> tags in the table below

      while($row = mysqli_fetch_assoc($getVehicle_sql)){
             
          /// maybe we can pass veh_ID with GET method
            $veh_ID = $row['vehicle_id'];
            $Make = $row['make'];
            $Model = $row['model'];
            $Year = $row['year'];
            $Type = $row['type'];
            $Price = $row['price'];
            $Desc = $row['description'];
            $img = $row['pic_link'];

?>

        <!-- for all vehicles to be in one table, only <tr> tags should be inside the while loop 

<td> <input type="radio" id="vChoice" name="vChoice"></td>
-->
        
      <tr>
        
        <td> <?php echo $Year." ". $Make . " " . $Model; ?> </td>
        <td> <?php echo $Type; ?> </td>
        <td> <h3><?php echo "$".$Price; ?> </h3></td>
        <td> <img class="img-responsive" src="<?php echo $img; ?>"> </td>
          <td><button type="submit" name="choice" id="choice" value="<?php echo $veh_ID; ?>">Reserve</button></td>
      </tr>


<?php
          
          
      //end of while loop
}


?>

            </tbody>
      
        </table>
    </div>
    </form>
    
</div>






        
<?php

mysqli_close($conn);
include 'footer.php';

?>