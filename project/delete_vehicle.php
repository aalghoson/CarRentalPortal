<?php
include 'includes/connect.php';
$id = $_POST['num'];
$delSQL = "DELETE FROM vehicle WHERE vehicle_id=".$id;
if($conn->query($delSQL) === TRUE)
    echo "Sucessfully deleted ".$id;
else
    echo "Something went wrong. Vehicle not deleted.";
?>