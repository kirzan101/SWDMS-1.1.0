<?php 

	include "../../db_connect.php";
	
		$client_id = $_GET["client_id"];
		$count_no = $_GET["count_no"];
		$assistance_id = $_GET["assistance_id"];
		$interview_id = $_GET["interview_id"];
		
			$sql = "SELECT * FROM client WHERE client_id = $client_id";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();

			$firstname = $row['first_name'];
			$lastname = $row['last_name'];

			$sql = "SELECT * FROM assistance WHERE assistance_id = $assistance_id ";
			$result = $con->query($sql);
			$rows = $result->fetch_assoc();

			$worker_id = $rows['worker_id'];

			$sql = "SELECT * FROM workers WHERE worker_id = $worker_id";
			$result = $con->query($sql);
			$worker = $result->fetch_assoc();

			$worker_name = $worker['first_name'];

			// Delete training details
			$sql = " DELETE FROM client_training_details where client_id = $client_id && client_training_detail_id = $count_no ";
			
		if($con->multi_query($sql)){ //1
			 
			// Delete Client assistance details
			$sql = " DELETE FROM assistance where client_id = $client_id && service_id = 11 && assistance_id = $assistance_id";
		
		if($con->multi_query($sql)){ //2
			 
			// Delete interview log
			$sql = " DELETE FROM interview_log where client_id = $client_id  && service_id = 11 && interview_id = $interview_id";
			
		if($con->multi_query($sql)){ //3
			 
			// Delete interview details
			$sql = " DELETE FROM interview where client_id = $client_id && interview_id = $interview_id";
		
		if($con->multi_query($sql)){ //4
			 
		// Insert to activity_log Table 
		$sql = " INSERT INTO activity_log ( activity_date, details )
		VALUES ( now() , ' $worker_name DELETED $firstname $lastname details on Livelihood Assistance' )";

		if($con->multi_query($sql)){
				echo '<script>alert("Client Successfully Deleted");location="../table/delete-index.php?client_id='.$client_id.'";</script>';
			}
			else{
				echo '<script>alert("Client Unsuccessfully Deleted");location="../table/delete-index.php?client_id='.$client_id.'";</script>';
			}

		} // 4
		} // 3
		} // 2
		} // 1
?>