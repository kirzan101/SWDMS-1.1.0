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
		$positionm = $_POST["positionm"];
		$family_headm = ucfirst(strtolower($_POST["family_headm"]));
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
		$positionf = $_POST["positionf"];
		$family_headf = ucfirst(strtolower($_POST["family_headf"]));
		$afaddf = ucfirst(strtolower($_POST["afaddf"]));
		
		// Premarriage details
		$husband_name = $_POST["firstnamem"] . " " . $_POST["lastnamem"];
		$wife_name = $_POST["firstnamef"] . " " . $_POST["lastnamef"];
		$marriage_date = date('Y-m-d', strtotime($_POST["marriage_date"]));
		
		// Not Required inputs
		$admission = "";
		$reff1 = "";
		$reff2 = "";
		$house = "";
		$lot = "";
		$areff1 = "";
		$areff2 = "";
		$assestment = "";
		$err = 0;
		$status = 'ACTIVE';
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');
		
		
		// Male Insert
		
		// Insert to client table
		$stmt = $con->prepare("INSERT INTO client (  first_name, middle_name, last_name, sex, age, date_of_birth, place_of_birth, address, educ_attainment, contact_no,  status, civil_status, income, skills, position, family_head ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?)");
		$stmt->bind_param("ssssssssssssssss", $firstnamem, $middlenamem, $lastnamem, $sexm, $agem, $bdaym, $bplacem, $preaddm, $educm, $contactnom, $status, $civilm, $incomem, $skillm, $positionm, $family_headm);
		if(!$stmt->execute()){ $con->rollback(); $err = 1; }
		$husband_id = $con->insert_id;
		$stmt->close();

			// Insert to interview Table 
			$stmt = $con->prepare("INSERT INTO interview ( worker_id, client_id, interview_date, interview_time ) VALUES (?,?, CURDATE(), CURTIME())");
			$stmt->bind_param("ii", $worker_id, $husband_id);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$interview_idm = $con->insert_id;
			$stmt->close();			

			// Insert to client_general_details Table
			$stmt = $con->prepare("INSERT INTO client_general_details ( client_id, religion, telephone, provincial_address, philhealth_no, admission, referral1, referral2, referral_contact1, referral_contact2, house, lot, assestment, interview_id ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?, ?)");
			$stmt->bind_param("issssssssssssi", $husband_id, $religionm, $telm, $proaddm, $philnm, $admission, $reff1, $reff2, $areff1, $areff2, $house, $lot, $assestment, $interview_idm );
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			 
			// Insert to lient_premarriage_details Table 
			$stmt = $con->prepare("INSERT INTO client_premarriage_details(client_id, address_marriage, interview_id, income_monthly) VALUES (?,?,?,?)");
			$stmt->bind_param("isis", $husband_id, $afaddm, $interview_idm, $mincomem);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();	
			
			// Insert to assistance Table
			$stmt = $con->prepare("INSERT INTO assistance ( client_id, worker_id, service_id, interview_id ) VALUES (?,?,?,?)");
			$stmt->bind_param("iiii", $husband_id, $worker_id, $service_id, $interview_idm);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			
			// Insert to interview_log Table
			$stmt = $con->prepare("INSERT INTO interview_log ( client_id, worker_id, service_id, interview_id ) VALUES (?,?,?,?)");
			$stmt->bind_param("iiii", $husband_id, $worker_id, $service_id, $interview_idm);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			
			// Female Insert
			
			// Insert to client table
			$stmt = $con->prepare("INSERT INTO client (  first_name, middle_name, last_name, sex, age, date_of_birth, place_of_birth, address, educ_attainment, contact_no,  status, civil_status, income, skills, position, family_head ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?)");
			$stmt->bind_param("ssssssssssssssss", $firstnamef, $middlenamef, $lastnamef, $sexf, $agef, $bdayf, $bplacef, $preaddf, $educf, $contactnof, $status, $civilf, $incomef, $skillf, $positionf, $family_headf);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$wife_id = $con->insert_id;
			$stmt->close();

			// Insert to interview Table 
			$stmt = $con->prepare("INSERT INTO interview ( worker_id, client_id, interview_date, interview_time ) VALUES (?,?, CURDATE(), CURTIME())");
			$stmt->bind_param("ii", $worker_id, $wife_id);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$interview_idf = $con->insert_id;
			$stmt->close();			

			// Insert to client_general_details Table
			$stmt = $con->prepare("INSERT INTO client_general_details ( client_id, religion, telephone, provincial_address, philhealth_no, admission, referral1, referral2, referral_contact1, referral_contact2, house, lot, assestment, interview_id ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?, ?)");
			$stmt->bind_param("issssssssssssi", $wife_id, $religionf, $telf, $proaddf, $philnf, $admission, $reff1, $reff2, $areff1, $areff2, $house, $lot, $assestment, $interview_idf );
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			 
			// Insert to lient_premarriage_details Table 
			$stmt = $con->prepare("INSERT INTO client_premarriage_details(client_id, address_marriage, interview_id, income_monthly) VALUES (?,?,?,?)");
			$stmt->bind_param("isis", $wife_id, $afaddf, $interview_idf, $mincomef);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();	
			
			// Insert to assistance Table
			$stmt = $con->prepare("INSERT INTO assistance ( client_id, worker_id, service_id, interview_id ) VALUES (?,?,?,?)");
			$stmt->bind_param("iiii", $wife_id, $worker_id, $service_id, $interview_idf);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			
			// Insert to interview_log Table
			$stmt = $con->prepare("INSERT INTO interview_log ( client_id, worker_id, service_id, interview_id ) VALUES (?,?,?,?)");
			$stmt->bind_param("iiii", $wife_id, $worker_id, $service_id, $interview_idf);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$stmt->close();
			
			// Insert to client_couple Table
			$stmt = $con->prepare("INSERT INTO client_couple ( husband_id, husband_name, wife_id, wife_name, marriage_date, status, interview_id ) VALUES (?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssi", $husband_id, $husband_name, $wife_id, $wife_name, $marriage_date, $status, $interview_idf);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$client_couple_id = $con->insert_id;
			$stmt->close();
			
			// Insert to Premarriage log Table 
			$stmt = $con->prepare("INSERT INTO client_premarriage_log ( worker_id, client_couple_id, interview_date, interview_time, interview_idm, interview_idf ) VALUES (?,?,CURDATE(),CURTIME(),?,?)");
			$stmt->bind_param("iiii", $worker_id, $client_couple_id, $interview_idm, $interview_idf);
			if(!$stmt->execute()){ $con->rollback(); $err = 1; }
			$client_couple_id = $con->insert_id;
			$stmt->close();
						
			if($err == 0){
				
				echo '<script>alert("Client Successfully Registered");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();				
				echo '<script>alert("Client Unsuccessfully Registered");location="../forms/form-pre-marriage.php";</script>';
			}	
			
		// Insertion of Household ID
		
		// Query for Barangay
		$sql = "SELECT * FROM barangays WHERE barangay = '$barangay'";
		$result = $con->query($sql);
		$brgy = $result->fetch_assoc();

		$barangay_idm = str_pad($brgy['barangay_id'], 2, "0", STR_PAD_LEFT); // Get the Barangay ID for Household ID echo 
		$hclient_id = str_pad($husband_id, 6, "0", STR_PAD_LEFT);
		
		// Query for Household
		$sql = "SELECT * FROM household WHERE barangay = '$barangaym' && family_head = '$family_headm'";
		$result = $con->query($sql);
		$householdm = $result->fetch_assoc();
		
		// INSERT of Household		
		if ($family_headm != $householdm['family_head'] AND $barangaym != $householdm['barangay'] OR empty($householdm)) {
			
			$sql = "INSERT INTO household ( family_head, barangay ) VALUES ('$family_headm', '$barangaym') ";

			// Insert Household ID to Household	
			if($con->multi_query($sql)){
				$id = $con->insert_id;

				$hid = str_pad($id, 5, "0", STR_PAD_LEFT);
				
				$household_idm = "4402-$barangay_idm-$hid"; // Declare New Household ID
				
				$sql = "UPDATE household SET `household_id` = '$household_idm' WHERE `id` = '$id'";
			
			// Insert Household ID to client details
			if($con->multi_query($sql)){
				$household_ids = "4402-$barangay_idm-$hid-$hclient_id";
				
				// Insert the Household ID to client Details
				$sql = "UPDATE client SET `household_id` = '$household_ids',`barangay` = '$barangaym' WHERE `client_id` = '$husband_id'";
				
			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Registered");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../forms/form-pre-marriage.php";</script>';
			}
				
			}
			}

		}
		// If the client has already a record
		elseif ($family_headm == $householdm['family_head'] AND $barangaym == $householdm['barangay']) {
			
			$id = $householdm['household_id']; // Existing household number
			
			$household_idm = "$id-$hclient_id"; // Declare Household ID for the new client
			
			// Insert Household ID to client details
			$sql = "UPDATE client SET `household_id` = '$household_idm',`barangay` = '$barangaym' WHERE `client_id` = '$husband_id'";

			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Registered");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../forms/form-pre-marriage.php";</script>';
			}

		}
		else {
			// Rollback the transaction
			$con->rollback();
			echo '<script>alert("ERROR! Contact the ADMIN");location="../forms/form-pre-marriage.php";</script>'; // Error if the condition does not met
		}
		
		
		// Insertion of Household ID for FEMALE
				
		// Query for Barangay
		$sql = "SELECT * FROM barangays WHERE barangay = '$barangayf'";
		$result = $con->query($sql);
		$brgy = $result->fetch_assoc();

		$barangay_idf = str_pad($brgy['barangay_id'], 2, "0", STR_PAD_LEFT); // Get the Barangay ID for Household ID echo 
		$hclient_id = str_pad($wife_id, 6, "0", STR_PAD_LEFT);
		
		// Query for Household
		$sql = "SELECT * FROM household WHERE barangay = '$barangayf' && family_head = '$family_headf'";
		$result = $con->query($sql);
		$householdf= $result->fetch_assoc();
		
		// INSERT of Household		
		if ($family_headf != $householdf['family_head'] AND $barangayf != $householdf['barangay'] OR empty($householdf)) {
			
			$sql = "INSERT INTO household ( family_head, barangay ) VALUES ('$family_headf', '$barangayf') ";

			// Insert Household ID to Household	
			if($con->multi_query($sql)){
				$id = $con->insert_id;

				$hid = str_pad($id, 5, "0", STR_PAD_LEFT);
				
				$household_idf = "4402-$barangay_idf-$hid"; // Declare New Household ID
				
				$sql = "UPDATE household SET `household_id` = '$household_idf' WHERE `id` = '$id'";
			
			// Insert Household ID to client details
			if($con->multi_query($sql)){
				$household_ids = "4402-$barangay_idf-$hid-$hclient_id";
				
				// Insert the Household ID to client Details
				$sql = "UPDATE client SET `household_id` = '$household_ids',`barangay` = '$barangayf' WHERE `client_id` = '$wife_id'";
				
			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Registered");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../forms/form-pre-marriage.php";</script>';
			}
				
			}
			}

		}
		// If the client has already a record
		elseif ($family_headf == $householdf['family_head'] AND $barangayf == $householdf['barangay']) {
			
			$id = $householdf['household_id']; // Existing household number
			
			$household_id = "$id-$hclient_id"; // Declare Household ID for the new client
			
			// Insert Household ID to client details
			$sql = "UPDATE client SET `household_id` = '$household_id',`barangay` = '$barangayf' WHERE `client_id` = '$wife_id'";

			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Registered");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../forms/form-pre-marriage.php";</script>';
			}

		}
		else {
			// Rollback the transaction
			$con->rollback();
			echo '<script>alert("ERROR! Contact the ADMIN");location="../forms/form-pre-marriage.php";</script>'; // Error if the condition does not met
		}
		
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
}
?>