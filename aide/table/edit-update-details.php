
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
		$preadd = ucfirst(strtolower($_POST["preadd"]));
		$educ = ucfirst(strtolower($_POST["educ"]));
		$skill = ucfirst(strtolower($_POST["skill"]));
		$income = $_POST["income"];
		$barangay = $_POST["barangay"];
		$contactno = $_POST["contactno"];
		$position = $_POST["position"];
		$family_head = ucfirst(strtolower($_POST["family_head"]));
		
		include 'details-fam-gen.php';
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');

		// Insert and Update values to MySQL DB	

		// Update to client table
		$stmt = $con->prepare("UPDATE client SET first_name = ?, middle_name = ?, last_name = ?, sex = ?, age = ?, date_of_birth = ?, place_of_birth = ?, address = ?, educ_attainment = ?, contact_no = ?, civil_status = ?, income = ?, skills = ?, position = ?, family_head = ? WHERE client_id = ? ");
		$stmt->bind_param("sssssssssssssssi", $firstname, $middlename, $lastname, $sex, $age, $bday, $bplace, $preadd, $educ, $contactno, $civil, $income, $skill, $position, $family_head, $client_id);
		if(!$stmt->execute()){ $con->rollback(); }
		$stmt->close();

		// Family Update Here
		
		$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id";
		$result = $con->query($sql);
		$famres = $result->fetch_assoc();
		 $errfam = $famres['client_general_fam_id'];

			if (empty($famres['client_general_fam_id'])) {
			
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
			
			}
			else if (isset($famres['client_general_fam_id'])) {
				
			// Update to client_general_fam Table
			$fam1 = '1';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name1, $age1, $sex1, $civil1, $relation1, $educ1, $skill1, $birthdate1, $income1, $fam1);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			$fam2 = '2';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name2, $age2, $sex2, $civil2, $relation2, $educ2, $skill2, $birthdate2, $income2, $fam2);
			if(!$stmt->execute()){ $con->rollback();; }
			$stmt->close();
			
			$fam3 = '3';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name3, $age3, $sex3, $civil3, $relation3, $educ3, $skill3, $birthdate3, $income3, $fam3);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			$fam4 = '4';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name4, $age4, $sex4, $civil4, $relation4, $educ4, $skill4, $birthdate4, $income4, $fam4);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			$fam5 = '5';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name5, $age5, $sex5, $civil5, $relation5, $educ5, $skill5, $birthdate5, $income5, $fam5);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			$fam6 = '6';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name6, $age6, $sex6, $civil6, $relation6, $educ6, $skill6, $birthdate6, $income6, $fam6);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			$fam7 = '7';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name7, $age7, $sex7, $civil7, $relation7, $educ7, $skill7, $birthdate7, $income7, $fam7);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			$fam8 = '8';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name8, $age8, $sex8, $civil8, $relation8, $educ8, $skill8, $birthdate8, $income8, $fam8);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			$fam9 = '9';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name9, $age9, $sex9, $civil9, $relation9, $educ9, $skill9, $birthdate9, $income9, $fam9);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			$fam10 = '10';
			$stmt = $con->prepare("UPDATE client_general_fam SET name = ?, fam_age = ?, fam_sex = ?, fam_civil_status = ?, relationship = ?, fam_educ_attainment = ?, fam_skills = ?, birthdates = ?, fam_income = ? WHERE fam_no = ?");
			$stmt->bind_param("sisssssssi", $name10, $age10, $sex10, $civil10, $relation10, $educ10, $skill10, $birthdate10, $income10, $fam10);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();

			}
			
			else {
				echo '<script>alert("Client Unsuccessfully Updated");location="../table/edit-client-details.php?client_id='.$client_id.'";</script>';
			}
			
			// Insert to activity_log Table 
			$sql = " INSERT INTO activity_log ( activity_date, details )
						 VALUES ( now() , ' $worker_name Updated the details of $firstname $lastname' )";

			
			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Updated");location="../table/edit-client-details.php?client_id='.$client_id.'";</script>';
			}
			else if ( $err == 1){
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Updated");location="../table/edit-client-details.php?client_id='.$client_id.'";</script>';
			}
			else {
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Updated");location="../table/edit-client-details.php?client_id='.$client_id.'";</script>';
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
				echo '<script>alert("Client Successfully Registered");location="../table/edit-client-details.php?client_id='.$client_id.'";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../table/edit-client-details.php?client_id='.$client_id.'";</script>';
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
				echo '<script>alert("Client Successfully Registered");location="../table/edit-client-details.php?client_id='.$client_id.'";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../table/edit-client-details.php?client_id='.$client_id.'";</script>';
			}

		}
		else {
			// Rollback the transaction
			$con->rollback();
			echo '<script>alert("ERROR! Contact the ADMIN");location="../table/edit-client-details.php?client_id='.$client_id.'";/script>'; // Error if the condition does not met
		}
		
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
}
?>