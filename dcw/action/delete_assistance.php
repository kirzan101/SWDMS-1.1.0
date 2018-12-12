<?php 

	include "../../db_connect.php";
	
		$client_id = $_GET["client_id"];

			 
			// Insert to activity_log Table 
			$sql = " DELETE FROM assistance where client_id = $client_id && service_id = 5";
		
		if($con->multi_query($sql)){ //1
			 
			// Insert to activity_log Table 
			$sql = " DELETE FROM interview_log where client_id = $client_id && service_id = 5";
			
		if($con->multi_query($sql)){ //2
			 
			// Insert to activity_log Table 
			$sql = " DELETE FROM interview where client_id = $client_id ";
		
		if($con->multi_query($sql)){
				echo '<script>alert("Client Successfully Deleted");location="../table/delete-index.php?client_id='.$client_id.'";</script>';
			}
			else{
				echo '<script>alert("Client Unsuccessfully Deleted");location="../table/delete-index.php?client_id='.$client_id.'";</script>';
			}
		
		} // 2
		} // 1
?>