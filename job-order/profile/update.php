
<?php
//Connect to MySQL DB
	include "../../db_connect.php";
		
//Declare variable
	if(isset($_POST['submit'])){
		$firstname = $_POST["firstname"];
		$middlename = $_POST["middlename"];
		$lastname =  $_POST["lastname"];
		$contactno =  $_POST["contactno"];
		$position =  $_POST["position"];		
		$unhashpassword = $_POST["password"];
		$repassword = $_POST["repassword"];
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');
		
// If password is not match to re-type password

	if($unhashpassword !== $repassword) {
		echo '<script>alert("Password is not MATCHED! Please re-type.");location="javascript:history.back()"</script>';
	} else {

// Update values to MySQL DB	
	
		$password = md5($unhashpassword);
		// Update to User Table
		$sql =  "UPDATE users SET `password` = '$password' WHERE user_id = '$user_id'; ";
			
		if($con->multi_query($sql)){

			// Update to Workers Table
			$stmt = $con->prepare("UPDATE workers SET first_name = ?, middle_name = ?, last_name = ?, contact_no = ?, position = ? WHERE worker_id = ?");
			$stmt->bind_param("sssssi",$firstname, $middlename, $lastname, $contactno,  $position, $worker_id);
			
			if($stmt->execute()){
				
				echo '<script>alert("User Successfully Updated. Please login again.");location="../../logout.php";</script>';
			}
			else{
				$con->rollback(); 
				echo '<script>alert("User Unsuccessfully Updated");location="index.php";</script>';
			}
			$stmt->close();	
					
		} 
		else{
			// Notification if all the data is not successfully inserted
			$con->rollback(); 
			echo '<script>alert("ERROR: Please Contact the Admin");location="index.php";</script>';
		}
	}
	
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
	
}
?>