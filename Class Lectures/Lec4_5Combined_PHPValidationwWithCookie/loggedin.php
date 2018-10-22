<?php 
session_start();

$usr = $_POST['username'];
$pass = $_POST['password'];


	if(isset($_COOKIE['saef']){
		if($pass == $_COOKIE['saef']) {
				echo "login Successful";
		} 
	  else {
		echo "not registered"; 
		} 
	}

		
?>

<html>

</html>