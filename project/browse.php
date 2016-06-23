
<?php
//management for reservations management

include 'head.php';
include 'includes/connect.php';
include 'includes/goBack.php';

session_start();



if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';
}




?>




<div id="featured" class="container">
    <div class="">
        
        <legend>Vehicles</legend>
     <fieldset>
          <a href="index.php" class="btn btn-default btn-lg" data-role="none" style="float: right;">Create a Reservation</a>  
     
     
     <?php
$sql_management_browse = $conn->query("SELECT * FROM `vehicle` ORDER BY price");

$row_nums_br = $sql_management_browse->num_rows;
if($row_nums_br <= 0)
{
	echo "No vehicles Found on the database!<br>";
}else {


	while($row_b = mysqli_fetch_assoc($sql_management_browse)){
		// loop through table and output everything
		

?>
     
     <table class="table table-striped ">
		<thead>
		<tr>
		
		<th>

		<?php 
		
		// echo vehicle details from table here
		
		echo $row_b['year'] . 
			" " . $row_b['make']
			 ." ".$row_b['model']
			." - ".  $row_b['type']
			." - ". $row_b['description'];
		
		
		echo " <b>". " ------ Price : $".$row_b['price']. "</b>";
		
		
		?>
		        <img class="img-responsive" src="<?php echo $row_b['pic_link']; ?>"  height="170" width="292">
		
		</th>

		</tr>
		
		
		
		</thead>
	</table>

 
 
 
 <?php 
 
 //while loop end
 }
 // else end
 }
 ?>
 
        </fieldset>
    </div>
</div>






<?php

include 'footer.php';
?>
