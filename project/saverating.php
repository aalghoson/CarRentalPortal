<?php
session_start();
include 'includes/connect.php';
$rating = $_REQUEST['rating'];
$user_ID = $_SESSION['user_id'];
echo 'You rated '.$rating."/5 <br>";
$sql_rate = "UPDATE person 
SET rating=$rating 
WHERE user_id='$user_ID'";
if ($conn->query($sql_rate) === TRUE) {
    echo "Thank you for rating our services";
} else {
    echo "Error: " . $conn->error;
}
?>
