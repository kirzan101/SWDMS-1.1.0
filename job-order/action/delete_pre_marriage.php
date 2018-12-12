<?php 
session_start();
if($_SESSION['user_type'] != 'M' || $_SESSION['user_type'] == NULL){
	header("Location: ../error-404.php");
}

$worker_name = $_SESSION['name_of_user'];
$worker_id = $_SESSION['worker_id'] ;

define("BASE_URL","/swdo");

	include "../../db_connect.php";
	
		$client_id = $_GET["client_id"];
		$count_no = $_GET['count_no'];
			 
		$sql = "SELECT * FROM client_couple WHERE client_couple_id = $count_no";
		$result = $con->query($sql);
		$rows = $result->fetch_assoc();
		
		$husband_id = $rows['husband_id']; 
		$wife_id = $rows['wife_id']; 
		$client_couple_id = $rows['client_couple_id'];
		$husband_name = $rows['husband_name'];
		$wife_name = $rows['wife_name'];
		$client_couple_id = $rows['client_couple_id'];
		
			// Delete husband premarriage details
			$sql = " DELETE FROM client_premarriage_details where client_id = $husband_id";
		
		if($con->multi_query($sql)){ //1
			
			// Delete wife premarriage details
			$sql = " DELETE FROM client_premarriage_details where client_id = $wife_id";

		if($con->multi_query($sql)){ //2
			
			// Delete premarrige log
			$sql = " DELETE FROM client_premarriage_log where client_couple_id = $count_no";
		
		if($con->multi_query($sql)){ //3
			 
			// Delete client couple details
			$sql = " DELETE FROM client_couple where client_couple_id = $count_no";
		
		if($con->multi_query($sql)){ //4
			 
			// Delete Husband Assistance Details
			$sql = " DELETE FROM assistance where client_id = $husband_id && service_id = 8";
		
		if($con->multi_query($sql)){ //5
			 
			// Delete Wife Assistance Details
			$sql = " DELETE FROM assistance where client_id = $wife_id && service_id = 8";
		
		if($con->multi_query($sql)){ //6
			 
			// Delete husband interview log
			$sql = " DELETE FROM interview_log where client_id = $husband_id  && service_id = 8";
			
		if($con->multi_query($sql)){ //7
			 
			// Delete wife interview log
			$sql = " DELETE FROM interview_log where client_id = $wife_id  && service_id = 8";
			
		if($con->multi_query($sql)){ //8
			 
			// Delete husband interview details
			$sql = " DELETE FROM interview where client_id = $husband_id ";
		
		if($con->multi_query($sql)){ //9
			 
			// Delete wife interview details
			$sql = " DELETE FROM interview where client_id = $wife_id ";
		
		if($con->multi_query($sql)){ //10
			 
			// Insert to activity_log Table 
			$sql = " INSERT INTO activity_log ( activity_date, details )
			VALUES ( now() , ' $worker_name DELETED $husband_name & $wife_name details on Premarriage Counseling' )";

		if($con->multi_query($sql)){ //11
			 
			// Delete premarriage log
			$sql = " DELETE FROM client_premarriage_log where client_couple_id = $client_couple_id ";

		if($con->multi_query($sql)){
				echo '<script>alert("Client Successfully Deleted");location="../table/delete-index.php?client_id='.$client_id.'";</script>';
			}
			else{
				echo '<script>alert("Client Unsuccessfully Deleted");location="../table/delete-index.php?client_id='.$client_id.'";</script>';
			}

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

?>