
<?php
//Connect to MySQL DB
	include "../../db_connect.php";
	
//Declare variable
if(isset($_POST['submit'])){
	
		// General Inputs
		$firstname = ucfirst(strtolower($_POST["firstname"]));
		$lastname =  strtolower($_POST["lastname"]);
		$civil = $_POST["civil"];
		$religion = ucfirst(strtolower($_POST["religion"]));
		$tel = $_POST["tel"];
		$educ = ucfirst(strtolower($_POST["educ"]));
		$philn = $_POST["philn"];
		$skill = ucfirst(strtolower($_POST["skill"]));
		$income = $_POST["income"];
		$admission = $_POST["admission"];
		$reff1 = ucfirst(strtolower($_POST["reff1"]));
		$reff2 = ucfirst(strtolower($_POST["reff2"]));
		$house = ucfirst(strtolower($_POST["house"]));
		$lot = ucfirst(strtolower($_POST["lot"]));
		$areff1 = ucfirst(strtolower($_POST["areff1"]));
		$areff2 = ucfirst(strtolower($_POST["areff2"]));
		$assestment = ucfirst(strtolower($_POST["assestment"]));
		$contactno = $_POST["contactno"];
		
		// Service inputs
		$perpetrator = ucfirst(strtolower($_POST["perpetrator"]));
		$parent = ucfirst(strtolower($_POST["parent"]));
		$disposition = ucfirst(strtolower($_POST["disposition"]));
		$where = ucfirst(strtolower($_POST["where"]));
		$service = ucfirst(strtolower($_POST["service"]));
		$type = ucfirst(strtolower($_POST["type"]));
		$when = date('Y-m-d', strtotime($_POST['when']));
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');

		// Insert and Update values to MySQL DB	

		// Update to client table
		$stmt = $con->prepare("UPDATE client SET educ_attainment = ?, contact_no = ?, civil_status = ?, income = ?, skills = ? WHERE client_id= ?");
		$stmt->bind_param("sssssi", $educ, $contactno, $civil, $income, $skill, $client_id);
		if(!$stmt->execute()){ $con->rollback(); }
		$stmt->close();
			
			// UPDATE to client_general_details Table
			$stmt = $con->prepare("UPDATE client_general_details SET religion = ?, telephone = ?, provincial_address = ?, philhealth_no = ?, admission = ?, referral1 =?, referral2 = ?, referral_contact1 = ?, referral_contact2 = ?, house = ?, lot = ?, assestment = ? WHERE client_general_detail_id = ? ");
			$stmt->bind_param("ssssssssssssi", $religion, $tel, $proadd, $philn, $admission, $reff1, $reff2, $areff1, $areff2, $house, $lot, $assestment, $count_id );
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Update to client_dwyna_details table
			$stmt = $con->prepare("UPDATE client_dwyna_details SET type_of_abuse = ?, parent_name = ?, when_happened = ?, where_happened = ?, perpetrator = ?, services_rendered = ?, disposition = ? WHERE interview_id = ?");
			$stmt->bind_param("sssssssi", $type, $parent, $when, $where, $perpetrator, $service, $disposition, $interview_id);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to activity_log Table 
			$sql = " INSERT INTO activity_log ( activity_date, details )
						 VALUES ( now() , ' $worker_name Updated the Client named $firstname $lastname details of Disadvantage Women, Youth, and Other Needy Adult' )";

			
			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Updated");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Updated");location="../update/update-dwyna.php?client_id='.$client_id.'&&count_id='.$count_id.'";</script>';
			}

		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
}
?>