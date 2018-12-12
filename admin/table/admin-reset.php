<?php
//Connect to MySQL DB
	include "../../db_connect.php";

// Insert values to MySQL DB		
		
		$user_id = 1;
		$unhashpassword = 'DEFAULT123';
		$password = md5($unhashpassword);
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');
		
			// Insert to interview Table 
			$stmt = $con->prepare("UPDATE users SET password = ? WHERE user_id = ? ");
			$stmt->bind_param("si", $password, $user_id);
		
			if($stmt->execute()){
				
				echo '<script>alert("User Password Successfully Reset. The new Password is '.$unhashpassword.'");location="index.php";</script>';
			}
			else{
				$con->rollback(); 
				echo '<script>alert("User Password Unsuccessfully Reset");location="index.php";</script>';
			}
			$stmt->close();	
	
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
	
?>