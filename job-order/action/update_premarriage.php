<?php

	// Connect to MySQL DB
	include "../../db_connect.php";

	if(isset($_POST['submit'])){
		
		//Male input variable
		$firstnamem = ucfirst(strtolower($_POST["firstnamem"]));
		$middlenamem = ucfirst(strtolower($_POST["middlenamem"]));
		$lastnamem =  strtolower($_POST["lastnamem"]);
		$sexm = $_POST["sexm"];
		$birthDate = $_POST["bdaym"]; // Declare variable for birthdate
		$birthDate = explode("/", $birthDate); // Split a string by a specified string into pieces
		$agem = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			? ((date("Y") - $birthDate[2]) - 1)
			: (date("Y") - $birthDate[2])); // Computes current date to inserted date
		$bdaym = date('Y-m-d', strtotime($_POST['bdaym'])); // Change the format from m-d-Y to Y-m-d
		$bplacem = ucfirst(strtolower($_POST["bplacem"]));
		$civilm = $_POST["civilm"];
		$religionm = ucfirst(strtolower($_POST["religionm"]));
		$telm = $_POST["telm"];
		$preaddm = ucfirst(strtolower($_POST["preaddm"]));
		$proaddm = ucfirst(strtolower($_POST["proaddm"]));
		$educm = ucfirst(strtolower($_POST["educm"]));
		$philnm = $_POST["philnm"];
		$skillm = ucfirst(strtolower($_POST["skillm"]));
		$incomem = $_POST["incomem"];
		$mincomem = $_POST["mincomem"];
		$barangaym = $_POST["barangaym"];
		$contactnom = $_POST["contactnom"];
		$afaddm = ucfirst(strtolower($_POST["afaddm"]));
		
		//Female Input variable
		$firstnamef = ucfirst(strtolower($_POST["firstnamef"]));
		$middlenamef = ucfirst(strtolower($_POST["middlenamef"]));
		$lastnamef =  strtolower($_POST["lastnamef"]);
		$sexf = $_POST["sexf"];
		$birthDate = $_POST["bdayf"]; // Declare variable for birthdate
		$birthDate = explode("/", $birthDate); // Split a string by a specified string into pieces
		$agef = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			? ((date("Y") - $birthDate[2]) - 1)
			: (date("Y") - $birthDate[2])); // Computes current date to inserted date
		$bdayf = date('Y-m-d', strtotime($_POST['bdayf'])); // Change the format from m-d-Y to Y-m-d
		$bplacef = ucfirst(strtolower($_POST["bplacef"]));
		$civilf = $_POST["civilm"];
		$religionf = ucfirst(strtolower($_POST["religionf"]));
		$telf = $_POST["telf"];
		$preaddf = ucfirst(strtolower($_POST["preaddf"]));
		$proaddf = ucfirst(strtolower($_POST["proaddf"]));
		$educf = ucfirst(strtolower($_POST["educf"]));
		$philnf = $_POST["philnf"];
		$skillf = ucfirst(strtolower($_POST["skillf"]));
		$incomef = $_POST["incomef"];
		$mincomef = $_POST["mincomef"];
		$barangayf = $_POST["barangayf"];
		$contactnof = $_POST["contactnof"];
		$afaddf = ucfirst(strtolower($_POST["afaddf"]));
		
		// Premarriage details
		$marriage_date = date('Y-m-d', strtotime($_POST["marriage_date"]));
		
		$err = 0;
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');
		
		// If the client is Male
		// Male Update
		
		// Update to client table
		$stmt = $con->prepare("UPDATE client SET educ_attainment = ?, contact_no = ?, civil_status = ?, income = ?, skills = ? WHERE client_id= ?");
		$stmt->bind_param("sssssi", $educm, $contactnom, $civilm, $incomem, $skillm, $husband_id);
		if(!$stmt->execute()){ $con->rollback(); $err = 1; }
		$stmt->close();	

			// Update client_general_details Table
			$stmt = $con->prepare("UPDATE client_general_details SET religion = ?, telephone = ?, provincial_address = ?, philhealth_no = ? WHERE interview_id = ? ");
			$stmt->bind_param("ssssi", $religionm, $telm, $proaddm, $philnm, $interview_idm );
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			
			// Update client_premarriage_details Table
			$stmt = $con->prepare("UPDATE client_premarriage_details SET address_marriage = ?, income_monthly = ? WHERE interview_id = ? ");
			$stmt->bind_param("ssi", $afaddm, $mincomem, $interview_idm );
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			
		// Female Update
		
		// Update to client table
		$stmt = $con->prepare("UPDATE client SET educ_attainment = ?, contact_no = ?, civil_status = ?, income = ?, skills = ? WHERE client_id= ?");
		$stmt->bind_param("sssssi", $educf, $contactnof, $civilf, $incomef, $skillf, $wife_id);
		if(!$stmt->execute()){ $con->rollback(); $err = 1; }
		$stmt->close();	

			// Update client_general_details Table
			$stmt = $con->prepare("UPDATE client_general_details SET religion = ?, telephone = ?, provincial_address = ?, philhealth_no = ? WHERE interview_id = ? ");
			$stmt->bind_param("ssssi", $religionf, $telf, $proaddf, $philnf, $interview_idf );
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			
			// Update client_premarriage_details Table
			$stmt = $con->prepare("UPDATE client_premarriage_details SET address_marriage = ?, income_monthly = ? WHERE interview_id = ? ");
			$stmt->bind_param("ssi", $afaddf, $mincomef, $interview_idf );
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			
		// Marriage Date Update
		
		$stmt = $con->prepare("UPDATE client_couple SET marriage_date = ? WHERE husband_id = ? AND wife_id = ? ");
		$stmt->bind_param("sii", $marriage_date, $husband_id, $wife_id );
		if(!$stmt->execute()){ $con->rollback(); $err = 1; }
		$stmt->close();
		
		// Insert to activity_log Table 
			$sql = " INSERT INTO activity_log ( activity_date, details )
						 VALUES ( now() , ' $worker_name Updated the details of $firstnamem $lastname and $firstnamef $lastnamef in Premarriage Counselling' )";
						 
			if($con->multi_query($sql) AND $err == 0 ){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Updated");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Updated");location="../update/update-pre-marriage.php?count='.$count.'";</script>';
			}
		
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
}
?>