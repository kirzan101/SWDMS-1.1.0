
<?php
//Connect to MySQL DB
	include "../../db_connect.php";
	
//Declare variable
if(isset($_POST['submit'])){
		
		// General Inputs
		$firstname = ucfirst(strtolower($_POST["firstname"]));
		$middlename = ucfirst(strtolower($_POST["middlename"]));
		$lastname =  strtolower($_POST["lastname"]);
		$sex = $_POST["sex"];
		$birthDate = $_POST["bday"]; // Declare variable for birthdate
		$birthDate = explode("/", $birthDate); // Split a string by a specified string into pieces
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			? ((date("Y") - $birthDate[2]) - 1)
			: (date("Y") - $birthDate[2])); // Computes current date to inserted date
		$bday = date('Y-m-d', strtotime($_POST['bday'])); // Change the format from m-d-Y to Y-m-d
		$bplace = ucfirst(strtolower($_POST["bplace"]));
		$civil = $_POST["civil"];
		$religion = ucfirst(strtolower($_POST["religion"]));
		$tel = $_POST["tel"];
		$preadd = ucfirst(strtolower($_POST["preadd"]));
		$proadd = ucfirst(strtolower($_POST["proadd"]));
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
		$barangay = $_POST["barangay"];
		$contactno = $_POST["contactno"];
		$position = $_POST["position"];
		$family_head = ucfirst(strtolower($_POST["family_head"]));
		$status = 'ACTIVE';
		
		// Service inputs
		$whom = ucfirst(strtolower($_POST["whom"]));
		$refer = ucfirst(strtolower($_POST["refer"]));
		$disposition = ucfirst(strtolower($_POST["disposition"]));
		$where = ucfirst(strtolower($_POST["where"]));
		$service = ucfirst(strtolower($_POST["service"]));
		$committed = ucfirst(strtolower($_POST["committed"]));
		$type = ucfirst(strtolower($_POST["type"]));
		$when = date('Y-m-d', strtotime($_POST['when']));

		include 'details-fam-gen.php';
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');

		// Insert values to MySQL DB	

		// Insert to client table
		$stmt = $con->prepare("INSERT INTO client (  first_name, middle_name, last_name, sex, age, date_of_birth, place_of_birth, address, educ_attainment, contact_no,  status, civil_status, income, skills, position, family_head ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?)");
		$stmt->bind_param("ssssssssssssssss", $firstname, $middlename, $lastname, $sex, $age, $bday, $bplace, $preadd, $educ, $contactno, $status, $civil, $income, $skill, $position, $family_head);
		if(!$stmt->execute()){ $con->rollback(); }
		//Get the current value of client_id and insert it to $client_id
		$client_id = $con->insert_id;
		$stmt->close();

			// Insert to interview Table 
			$stmt = $con->prepare("INSERT INTO interview ( worker_id, client_id, interview_date, interview_time ) VALUES (?,?, CURDATE(), CURTIME())");
			$stmt->bind_param("ii", $worker_id, $client_id);
			if(!$stmt->execute()){ $con->rollback(); }
			$interview_id = $con->insert_id;
			$stmt->close();			

			// Insert to client_general_details Table
			$stmt = $con->prepare("INSERT INTO client_general_details ( client_id, religion, telephone, provincial_address, philhealth_no, admission, referral1, referral2, referral_contact1, referral_contact2, house, lot, assestment, interview_id ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?, ?)");
			$stmt->bind_param("issssssssssssi", $client_id, $religion, $tel, $proadd, $philn, $admission, $reff1, $reff2, $areff1, $areff2, $house, $lot, $assestment, $interview_id );
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to client_general_fam Table
			$fam1 = '1';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssssssi", $client_id, $name1, $age1, $sex1, $civil1, $relation1, $educ1, $skill1, $birthdate1, $income1, $fam1);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();

			// Insert to client_general_fam Table
			$fam2 = '2';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isssssssssi", $client_id, $name2, $age2, $sex2, $civil2, $relation2, $educ2, $skill2, $birthdate2, $income2, $fam2);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();

			// Insert to client_general_fam Table
			$fam3 = '3';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssssssi", $client_id, $name3, $age3, $sex3, $civil3, $relation3, $educ3, $skill3, $birthdate3, $income3, $fam3);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to client_general_fam Table
			$fam4 = '4';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssssssi", $client_id, $name4, $age4, $sex4, $civil4, $relation4, $educ4, $skill4, $birthdate4, $income4, $fam4);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();

			// Insert to client_general_fam Table
			$fam5 = '5';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssssssi", $client_id, $name5, $age5, $sex5, $civil5, $relation5, $educ5, $skill5, $birthdate5, $income5, $fam5);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to client_general_fam Table
			$fam6 = '6';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssssssi", $client_id, $name6, $age6, $sex6, $civil6, $relation6, $educ6, $skill6, $birthdate6, $income6, $fam6);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to client_general_fam Table
			$fam7 = '7';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssssssi", $client_id, $name7, $age7, $sex7, $civil7, $relation7, $educ7, $skill7, $birthdate7, $income7, $fam7);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to client_general_fam Table
			$fam8 = '8';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssssssi", $client_id, $name8, $age8, $sex8, $civil8, $relation8, $educ8, $skill8, $birthdate8, $income8, $fam8);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to client_general_fam Table
			$fam9 = '9';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssssssi", $client_id, $name9, $age9, $sex9, $civil9, $relation9, $educ9, $skill9, $birthdate9, $income9, $fam9);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to client_general_fam Table
			$fam10 = '10';
			$stmt = $con->prepare("INSERT INTO `client_general_fam` (`client_id`, `name`, `fam_age`, `fam_sex`, `fam_civil_status`, `relationship`, `fam_educ_attainment`, `fam_skills`, `birthdates`, `fam_income`, `fam_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isisssssssi", $client_id, $name10, $age10, $sex10, $civil10, $relation10, $educ10, $skill10, $birthdate10, $income10, $fam10);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to assistance Table
			$stmt = $con->prepare("INSERT INTO assistance ( client_id, worker_id, service_id, interview_id ) VALUES (?,?,?,?)");
			$stmt->bind_param("iiii", $client_id, $worker_id, $service_id, $interview_id);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to client_cicl_details Table
			$stmt = $con->prepare("INSERT INTO client_child_details ( client_id, reffered_by, type_of_offense, committed, when_happened, where_happened, to_whom, services_rendered, disposition, interview_id ) VALUES (?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("issssssssi", $client_id, $refer, $type, $committed, $when, $where, $whom, $service, $disposition, $interview_id);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
						 
			// Insert to interview_log Table
			$sql = " INSERT INTO interview_log ( client_id, worker_id, service_id, interview_id )
						 VALUES ('$client_id', '$worker_id', '$service_id' ,'$interview_id' )";
			
			if($con->multi_query($sql)){ //1
			 
			// Insert to activity_log Table 
			$sql = " INSERT INTO activity_log ( activity_date, details )
						 VALUES ( now() , ' $worker_name registered New Client named $firstname $lastname in Children in Conflict with the Law' )";

			
			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Registered");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../forms/form-cicl.php";</script>';
			}
			
			} //1
		
		else{
			// Rollback the transaction
			$con->rollback();
			// Notification if all the data is not successfully inserted
			echo '<script>alert("ERROR: Please Contact the Admin");location="../table/service_registry.php";</script>';
		}
		
// Insertion of Household ID
		
		// Query for Barangay
		$sql = "SELECT * FROM barangays WHERE barangay = '$barangay'";
		$result = $con->query($sql);
		$brgy = $result->fetch_assoc();

		$barangay_id = str_pad($brgy['barangay_id'], 2, "0", STR_PAD_LEFT); // Get the Barangay ID for Household ID echo 
		$hclient_id = str_pad($client_id, 6, "0", STR_PAD_LEFT);
		
		// Query for Household
		$sql = "SELECT * FROM household WHERE barangay = '$barangay' && family_head = '$family_head'";
		$result = $con->query($sql);
		$household = $result->fetch_assoc();
		
		// INSERT of Household		
		if ($family_head != $household['family_head'] AND $barangay != $household['barangay'] OR empty($household)) {
			
			$sql = "INSERT INTO household ( family_head, barangay ) VALUES ('$family_head', '$barangay') ";

			// Insert Household ID to Household	
			if($con->multi_query($sql)){
				$id = $con->insert_id;

				$hid = str_pad($id, 5, "0", STR_PAD_LEFT);
				
				$household_id = "4402-$barangay_id-$hid"; // Declare New Household ID
				
				$sql = "UPDATE household SET `household_id` = '$household_id' WHERE `id` = '$id'";
			
			// Insert Household ID to client details
			if($con->multi_query($sql)){
				$household_ids = "4402-$barangay_id-$hid-$hclient_id";
				
				// Insert the Household ID to client Details
				$sql = "UPDATE client SET `household_id` = '$household_ids',`barangay` = '$barangay' WHERE `client_id` = '$client_id'";
				
			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Registered");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../forms/form-cicl.php";</script>';
			}
				
			}
			}

		}
		// If the client has already a record
		elseif ($family_head == $household['family_head'] AND $barangay == $household['barangay']) {
			
			$id = $household['household_id']; // Existing household number
			
			$household_id = "$id-$hclient_id"; // Declare Household ID for the new client
			
			// Insert Household ID to client details
			$sql = "UPDATE client SET `household_id` = '$household_id',`barangay` = '$barangay' WHERE `client_id` = '$client_id'";

			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Registered");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../forms/form-cicl.php";</script>';
			}

		}
		else {
			// Rollback the transaction
			$con->rollback();
			echo '<script>alert("ERROR! Contact the ADMIN");location="../forms/form-cicl.php";</script>'; // Error if the condition does not met
		}
		
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
}
?>