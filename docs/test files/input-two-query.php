<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$con = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
	
	$usernames = $_POST["username"];
	$passwords = $_POST["password"];
	$admins = $_POST["admins"];
	$test = $_POST["test"];
	
	$sql = "INSERT INTO users (username, password, user_type)
			VALUES ('$usernames', '$passwords', 1 );";
			
		if($con->query($sql)){
			$user_id = $con->insert_id;

		$sql = "INSERT INTO admins (user_id, username, password, user_type)
				VALUES ('$user_id', '$admins', '$test', 2 );";
				
			if($con->query($sql)){
				
				echo '<script>alert("Patient Successfully Registered");location="test.php";</script>';
			}
			else{
				echo '<script>alert("Error");location="test.php";</script>';
			}
			

		}
		else{
			echo '<script>alert("Error, in creating account");location="test.php";</script>';
		}
}
$con->close();
?>