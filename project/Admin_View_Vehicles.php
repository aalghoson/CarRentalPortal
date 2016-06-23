<?php


include 'head.php';
include 'includes/connect';
include 'includes/goBack.php';
session_start();


/*
$has_session = session_status() == PHP_SESSION_ACTIVE;
if($has_session == false){
	session_start();
}

*/
//include 'goBack.php';

?>



    <?php

/*TODO: condition to check if user is logged in to continue with the process.

	if( isset($_SESSION['user_id'])){
	
	}
	else{                             
		echo 'you need to login or signup to access this page<br>';
		
		echo '<META HTTP-EQUIV="Refresh" Content="1 ;URL=index.php">';
		die();
        
	}
*/
?>


        <?php


// div tags here



?>







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
    

    
  

        
?>




                <form action="Edit_Vehicle.php" method="post" enctype="multipart/form-data" class="centerform">
<br>
                        <h4 class="Rform">Choose a vehicle to edit or</h4><br>
                    <div class="alert alert-success">
                        <input type="button" class="btn btn-success" onclick="addVehicle()" value="Add a vehicle" style="margin-left:45%;">
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vehicle</th>
                                <th>Type</th>
                                <th>Rate</th>
                                <th></th>
                                <th></th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>


                            <?php




$getVehicle_sql = $conn->query("SELECT * FROM `vehicle`");

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
                                    <td>
                                        <?php echo $veh_ID;?>
                                    </td>
                                    <td>
                                        <?php echo $Year." ". $Make . " " . $Model; ?>
                                    </td>
                                    <td>
                                        <?php echo $Type; ?>
                                    </td>
                                    <td>
                                        <h3><?php echo "$".$Price; ?> </h3></td>
                                    <td> <img style="max-width: 300px;max-height: 300px;" class="img-responsive" src="<?php echo $img; ?>"> </td>
                                    <td>
                                        <button type="submit" name="edit" id="edit" value="<?php echo $veh_ID; ?>">Edit</button>
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#delModal" id="<?php echo $veh_ID;?>" value="DELETE">
                                    </td>
                                </tr>


                                <?php
          
          
      //end of while loop
         }


?>
                                    <div id="delModal" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Confirm Deletion of Vehicle</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><b>Are you sure you would like to delete this vehicle?</b></p>
                                                    <p><b>This action CANNOT be undone.</b></p>
                                                    The admin is required to check the box below before proceeding with any changes
                                                <br>
                                                <input type="checkbox" name="checkBox" id="checkBox" data-role="none">
                                                <b>Administator/Manager check : I agree to the changes.</b>
                                                <br>
<div id="result"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-info" data-toggle="modal" data-target="#delModal" value="No, Cancel">
                                                    <input type="button" class="btn btn-danger" id="delBut" onclick="deleteIt()" value="YES, Delete it">
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                        </tbody>

                    </table>

                </form>


                <script>
                    $('.modal').on('show.bs.modal', function (e) {
                        var trigger = $(e.relatedTarget);
                        window.theOne = (trigger[0].id);
                    });

                    function deleteIt() {
                        if(document.getElementById('checkBox').checked){
                        $.ajax({
                            type: 'POST'
                            , url: 'delete_vehicle.php'
                            , data: {num: window.theOne}
                            , success: function (data) {
                                $("#result").html(data);
                                location.reload();
                            }
                        });
                        }else{
                            alert("You must check the checkbox to continue.");
                        }
                    }
                    function addVehicle() {
                      window.location.href = "add_vehicle.php";
                    }
                </script>




                <?php

mysqli_close($conn);
include 'footer.php';

?>