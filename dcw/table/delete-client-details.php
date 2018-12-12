<?php 

	include "../../db_connect.php";
	
		$client_id = $_GET["client_id"];
		$worker_id = $_GET["worker_id"];
		
		$sql = "SELECT * FROM client WHERE client_id = $client_id";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();

			$firstname = $row['first_name'];
			$lastname = $row['last_name'];

			$worker_id = $_GET['worker_id'];

			$sql = "SELECT * FROM workers WHERE worker_id = $worker_id";
			$result = $con->query($sql);
			$worker = $result->fetch_assoc();

			$worker_name = $worker['first_name'];
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');
		 
			// Delete client general details
			$sql = " UPDATE client SET `status` = 'DELETED' where client_id = $client_id";
			
		if($con->multi_query($sql)){ //1
			 
		// Insert to activity_log Table 
		$sql = " INSERT INTO activity_log ( activity_date, details )
		VALUES ( now() , ' $worker_name DELETED $firstname $lastname records' )";

		if($con->multi_query($sql)){
				echo '<script>alert("Client Successfully Deleted");location="../table/index.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				echo '<script>alert("Client Unsuccessfully Deleted");location="../table/delete-index.php?client_id='.$client_id.'";</script>';
			}

		} // 1
		else {
			// Rollback the transaction
			$con->rollback();
			echo '<script>alert("ERROR! Contact the ADMIN!");location="../table/delete-index.php?client_id='.$client_id.'";</script>';

		}
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
?>