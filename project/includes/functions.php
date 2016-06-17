
<?php


function logged_in(){
	return (isset( $_SESSION['user_id'] )) ? true : false;
}


function logout(){
    
    session_start();
	
	unset($_SESSION['user_id']);
	
	session_destroy();
	
    echo ' logged out!</br>';
	echo 'Goodbye!</br>Redirecting...';
	echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';
}


?>