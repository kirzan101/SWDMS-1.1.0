
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
		
		if ($_POST["position"] == 'MSWDO') {
			$usertype = 'M';
			$userposition = 'mswdo';
		} elseif ($_POST["position"] == 'SWDO II') {
			$usertype = 'M2';
			$userposition = 'swdo';
		} elseif ($_POST["position"] == 'Admin Aide') {
			$usertype = 'AA';
			$userposition = 'aide';
		} elseif ($_POST["position"] == 'Job Order') {
			$usertype = 'J';
			$userposition = 'job';
		} elseif ($_POST["position"] =='DCW') {
			$usertype = 'D';
			$userposition = 'dcw';
		} else {
			echo 'ERROR!';
		}
		
		$username = $lastname.'-'.$userposition;
		$unhashpassword = $_POST["password"];
		$repassword = $_POST["re-password"];
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');
		
// If password is not match to re-type password

	if($unhashpassword !== $repassword) {
		echo '<script>alert("Password is not MATCHED! Please re-type.");location="javascript:history.back()"</script>';
	} else {

// Insert values to MySQL DB		
		
		$password = md5($unhashpassword);
		// Insert to workers Table
		$sql =  "INSERT INTO users (  username, password, user_type, status )
				 VALUES ( '$username', '$password', '$usertype', 'ACTIVE');";
			
		if($con->multi_query($sql)){
			//Get the current value of user_id and insert it to $user_id
			$user_id = $con->insert_id;
			
			// Insert to interview Table 
			$stmt = $con->prepare("INSERT INTO workers (  user_id, first_name, middle_name, last_name, contact_no, position ) VALUES (?,?,?,?,?,?)");
			$stmt->bind_param("isssss", $user_id, $firstname, $middlename, $lastname, $contactno, $position);
		
			if($stmt->execute()){
				
				echo '<script>alert("User Successfully Registered");location="insert-profile.php";</script>';
			}
			else{
				$con->rollback(); 
				echo '<script>alert("User Unsuccessfully Registered");location="insert-profile.php";</script>';
			}
			$stmt->close();	
					
		} 
		else{
			// Notification if all the data is not successfully inserted
			$con->rollback(); 
			echo '<script>alert("ERROR: Please Contact the Admin");location="insert-profile.php";</script>';
		}
	}
	
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
	
}
?>