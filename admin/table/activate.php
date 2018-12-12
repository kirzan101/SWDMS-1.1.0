<?php
//Connect to MySQL DB
	include "../../db_connect.php";

// Insert values to MySQL DB		
		
		$user_id = $_GET['user_id'];
		$action = 'ACTIVE';
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');
		
			// Insert to interview Table 
			$stmt = $con->prepare("UPDATE users SET status = ? WHERE user_id = ? ");
			$stmt->bind_param("si", $action, $user_id);
		
			if($stmt->execute()){
				
				echo '<script>alert("User account is Successfully Activate");location="index.php";</script>';
			}
			else{
				$con->rollback(); 
				echo '<script>alert("User account is Unsuccessfully Activate");location="index.php";</script>';
			}
			$stmt->close();	
	
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
	
?>