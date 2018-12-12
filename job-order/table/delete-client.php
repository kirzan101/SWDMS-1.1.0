<?php 

	include "../../db_connect.php";
	
		$client_id = $_GET["client_id"];
		$worker_id = $_GET["worker_id"];

			$sql = "SELECT * FROM client WHERE client_id = $client_id";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();

			$firstname = $row['first_name'];
			$lastname = $row['last_name'];

			$sql = "SELECT * FROM workers WHERE worker_id = $worker_id";
			$result = $con->query($sql);
			$worker = $result->fetch_assoc();

			$worker_name = $worker['first_name'];

			 
			// Delete client general details
			$sql = " DELETE FROM client_general_details where client_id = $client_id";
			
		if($con->multi_query($sql)){ //1
			 
			// Delete client assistance details
			$sql = " DELETE FROM assistance where client_id = $client_id";
		
		if($con->multi_query($sql)){ //2
			 
			// Delete client interview log
			$sql = " DELETE FROM interview_log where client_id = $client_id";
			
		if($con->multi_query($sql)){ //3
			 
			// Delete client interview details 
			$sql = " DELETE FROM interview where client_id = $client_id";
		
		if($con->multi_query($sql)){ //4
			 
			// Delete client_child_details 
			$sql = " DELETE FROM client_child_details where client_id = $client_id";
		
		if($con->multi_query($sql)){ //5
			 
			// Delete client_premarriage_log
			$sql = " DELETE FROM client_death_aid_details where client_id = $client_id";
		
		if($con->multi_query($sql)){ //6
			 
			// Delete client_couple
			$sql = " DELETE FROM client_couple where client_id = $client_id";
		
		if($con->multi_query($sql)){ //7
			 
			// Delete client_death_aid_details
			$sql = " DELETE FROM client_death_aid_details where client_id = $client_id";
			
		if($con->multi_query($sql)){ //8
			 
			// Delete client_dwyna_details
			$sql = " DELETE FROM client_dwyna_details where client_id = $client_id";
			
		if($con->multi_query($sql)){ //9
			 
			// Delete client_general_fam
			$sql = " DELETE FROM client_general_fam where client_id = $client_id";
			
		if($con->multi_query($sql)){ //10
			 
			// Delete client_indigency_details
			$sql = " DELETE FROM client_indigency_details where client_id = $client_id";
			
		if($con->multi_query($sql)){ //11
			 
			// Delete client_premarriage_details
			$sql = " DELETE FROM client_premarriage_details where client_id = $client_id";
			
		if($con->multi_query($sql)){ //12
			 
			// Delete client_pwd_solo_details
			$sql = " DELETE FROM client_pwd_solo_details where client_id = $client_id";
		
		if($con->multi_query($sql)){ //13
			 
			// Delete client_referral_details
			$sql = " DELETE FROM client_referral_details where client_id = $client_id";
		
		if($con->multi_query($sql)){ //14
			 
			// Delete client_scsr_details
			$sql = " DELETE FROM client_scsr_details where client_id = $client_id";
		
		if($con->multi_query($sql)){ //15
			 
			// Delete client_solo_details
			$sql = " DELETE FROM client_solo_details where client_id = $client_id";
			
		if($con->multi_query($sql)){ //16
			 
			// Delete client_death_aid_details
			$sql = " DELETE FROM client_training_details where client_id = $client_id";
		
		if($con->multi_query($sql)){ //17
			 
			// Delete client
			$sql = " DELETE FROM client where client_id = $client_id";
		
		if($con->multi_query($sql)){ //18
			 
		// Insert to activity_log Table 
		$sql = " INSERT INTO activity_log ( activity_date, details )
		VALUES ( now() , ' $worker_name PERMANENTLY DELETED ALL the records of $firstname $lastname' )";

		if($con->multi_query($sql)){
				echo '<script>alert("Client Successfully Deleted");location="../table/deleted-list.php";</script>';
			}
			else{
				echo '<script>alert("Client Unsuccessfully Deleted");location="../table/deleted-list.php";</script>';
			}

		} // 18
		} // 17
		} // 16
		} // 15
		} // 14
		} // 13	
		} // 12
		} // 11
		} // 10
		} // 9
		} // 8
		} // 7
		} // 6
		} // 5
		} // 4
		} // 3
		} // 2
		} // 1
		else{
				echo '<script>alert("Client Unsuccessfully Deleted");location="../table/deleted-list.php";</script>';
			}
?>