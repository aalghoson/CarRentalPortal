

<?php 
// this file will query the database using the email the user provided
// then we query db with the email against person

include 'head.php';



$conn = mysqli_connect("localhost", "root", "root", "db1") or die("database connection is not working");
	/* check connection */
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	

if(isset($_POST["Submit"]))
{ 
    $email = mysqli_real_escape_string($conn,$_POST['resv_email']);
    $ccode = mysqli_real_escape_string($conn,$_POST['code']);

    echo "email is: ".$email. "<br />";
    
 //#### escape string when possible ###

//we get the user's id using their email then we get the reservation using that id
$sql_user_id = "SELECT user_id FROM person WHERE email = '$email'";
echo "My SQL command is: " . $sql_user_id. "<br />";

    if ($id_result = $conn->query($sql_user_id)) {

    /* fetch associative array */
    while ($row = $id_result->fetch_assoc()) {
        $user_id_value = $row['user_id'];
        
        echo $user_id_value."<br>";
    }

    /* free result set */
    //$result->free();
    }
    
    
    
    
    /*
       if (mysqli_num_rows($id_result) <= 0)
	{
		echo "Email is not found in our records!.<br />";
	} else {
		while ($row = mysqli_fetch_assoc($id_result)){
            $u_id = $row['user_id']
            //echo "user_id = ". $u_id;
                $id_result->free();
		}
    }
      */
   
    
    
// then we get reservation info using the user's id we stored in $user_id_value.

$sql_user_resv = "SELECT * FROM reservation WHERE user_id = '$user_id_value'";
echo "My SQL command is: " . $sql_user_resv. "<br />";
//$sql_user_idt = $conn->query("SELECT user_id FROM `person` WHERE email = '$email'");
echo "here" ."<br>";

    
    
if ($result = $conn->query($sql_user_resv)) {
    /* fetch associative array */
    while ($row1 = $result->fetch_assoc()) {
       echo "summary:" . $row1['resv_id'];
        
        }

            
    }
    
    
/*
$result = mysqli_query($conn, $sql_user_resv);
//TODO:output summary for user's reservation
   
    // TODO:format the table using div tags
    
    if (mysqli_num_rows($result)<=0)
	{
	
		echo "No Records Found.<br />";
	
	} else {
		echo "<table border=1>";
		echo "<tr><th>resv_id</th><th>user_id</th><th>vehicle</th><th>location</th><th>date</th></tr>";
		while ($row = mysqli_fetch_assoc($result))
			
		{
			
			echo "<tr>";
			
		echo "<td>" . $row['resv_id'] . "</td><td>" . $row['user_id']. "</td><td>". $row['resv_vehicle_id'] . "</td>
			<td>". $row['pick_location'] . "</td>";
			
			//$qu= $row['q_id'];
			// echo htmlspecialchars($qu);
			echo "</tr>";
		}
		echo "</table>";
    
    }
    
    
   
    */
    
    
    
    
    
    
    
//end of if
}







mysqli_close($conn);






include 'footer.php';

?>