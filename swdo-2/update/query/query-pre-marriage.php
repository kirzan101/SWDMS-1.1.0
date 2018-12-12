<?php

	include '../../db_connect.php';
	
	// Query to get the client ID's
	$sql = "SELECT * FROM client_couple WHERE client_couple_id = $count";
	$result = $con->query($sql);
    $couple = $result->fetch_assoc(); 
	
	$husband_id = $couple['husband_id'];
	$wife_id = $couple['wife_id'];
	$marriage_date = $couple['marriage_date'];
	
	// Query to get the interview ID's
	$sql = "SELECT * FROM client_premarriage_log WHERE client_couple_id = $count";
	$result = $con->query($sql);
    $log = $result->fetch_assoc();
	
	$interview_idm = $log['interview_idm'];
	$interview_idf = $log['interview_idf'];
	
	//Query for client_premarriage_details
	// Male
	$sql = "SELECT * FROM client_premarriage_details WHERE interview_id = $interview_idm";
	$result = $con->query($sql);
    $pdetailsm = $result->fetch_assoc();
	
	$afaddm = $pdetailsm['address_marriage'];
	$mincomem = $pdetailsm['income_monthly'];
	
	// Female
	$sql = "SELECT * FROM client_premarriage_details WHERE interview_id = $interview_idf";
	$result = $con->query($sql);
    $pdetailsf = $result->fetch_assoc();
	
	$afaddf = $pdetailsf['address_marriage'];
	$mincomef = $pdetailsf['income_monthly'];
	
	// Query for client details
	$sql = "SELECT * FROM client c LEFT JOIN client_general_details g ON c.client_id = g.client_id LEFT JOIN assistance a ON c.client_id = a.client_id
	WHERE c.client_id = $husband_id AND g.interview_id = a.interview_id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc(); 

	//Male
	// client Table
	$firstnamem = $row['first_name'];
	$middlenamem = $row['middle_name'];
	$lastnamem = $row['last_name'];
	$agem = $row['age'];
	$sexm = $row['sex'];
	$bdaym = $row['date_of_birth'];
	$bplacem = $row['place_of_birth'];
	$preaddm = $row['address'];
	$educm = $row['educ_attainment'];
	$barangaym = $row['barangay'];
	$incomem = $row['income'];
	$civilm = $row['civil_status'];
	$skillm = $row['skills'];
	$contactnom = $row['contact_no'];
	$family_headm = $row['family_head'];
	$positionm = $row['position'];
	
	// client_general_details Table
	$religionm = $row['religion'];
	$telephonem = $row['telephone'];
	$philnm = $row['philhealth_no'];

	
	// Query for client details
	$sql = "SELECT * FROM client c LEFT JOIN client_general_details g ON c.client_id = g.client_id LEFT JOIN assistance a ON c.client_id = a.client_id
	WHERE c.client_id = $wife_id AND g.interview_id = a.interview_id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc(); 
	
	// Female	
	// client Table
	$firstnamef = $row['first_name'];
	$middlenamef = $row['middle_name'];
	$lastnamef = $row['last_name'];
	$agef = $row['age'];
	$sexf = $row['sex'];
	$bdayf = $row['date_of_birth'];
	$bplacef = $row['place_of_birth'];
	$preaddf = $row['address'];
	$educf = $row['educ_attainment'];
	$barangayf = $row['barangay'];
	$incomef = $row['income'];
	$civilf = $row['civil_status'];
	$skillf = $row['skills'];
	$contactnof = $row['contact_no'];
	$family_headf = $row['family_head'];
	$positionf = $row['position'];
	
	// client_general_details Table
	$religionf = $row['religion'];
	$telephonef = $row['telephone'];
	$philnf = $row['philhealth_no'];

		
?>