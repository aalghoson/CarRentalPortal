<?php

include 'head.php';
include 'includes/connect.php';
// user should be logged in to view this page
session_start();

if( isset($_SESSION['user_id'])){
	
	}
	else{                             
		echo '<b>you need to login or signup to access this page</b><br>';
		
		echo '<META HTTP-EQUIV="Refresh" Content="1 ;URL=index.php">';
        header("refresh:3;url=signup.php");
		die();
        
	}

?>

<?php



if(isset($_POST["choice"]))
{

    $resvlocation = $_SESSION['resvlocation'];
    $resvDate = $_SESSION['resvDate'];
    $resvTime = $_SESSION['resvTime'];
    $retDate = $_SESSION['retDate'];
    $retTime = $_SESSION['retTime'];
    $Age = $_SESSION['Age'];
    $returnLocation = $_SESSION['returnLocation'];
    
    $vehicle_choice = $_POST['choice'];
    $_SESSION['vehicle_choice'] = $vehicle_choice;
    
    $sql_vehicle_choice = $conn->query("SELECT * FROM vehicle WHERE `vehicle_id` = '$vehicle_choice'");
    
    while($row = mysqli_fetch_assoc($sql_vehicle_choice)){
          /// info about reserved vehicle
            $_SESSION['res_vehicle'] = $row['year'] . " " . $row['make'] . " " . $row['model']. " - ". $row['description'] . " - " . $row['type'];
            $_SESSION['res_Price'] = $row['price'];
            $_SESSION['res_img'] = $row['pic_link'];
    }    
}else{
    
    ?>
         <div class="alert alert-warning">
         <h4 class="Rform">An error has occured!</h4> 
        </div>
    <?php
        header("refresh:3;url=index.php");
    
}


?>




<div class="container">
  <form class="form-horizontal" role="form" method="post" action="invoice.php">
    <fieldset>
      <legend>Payment</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Credit Card Number" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
              
             <div class="col-sm-3">
                   <input type="number" name="exp_date" id="exp_date" maxlength="4" max="9999" min="0" placeholder="format: MMYY" required>
             </div>
              
                <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
            <div class="col-sm-3">
            <input type="text" class="form-control" name="cvv" id="cvv" min="0" maxlength="3" max="999" placeholder="Security Code" required>
            </div>
              
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">

          <input type="submit" class="btn btn-success" data-inline="true" value="Pay Now" name="pay">
            <?php include 'includes/goBack.php'; ?>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php

include 'footer.php';


?>