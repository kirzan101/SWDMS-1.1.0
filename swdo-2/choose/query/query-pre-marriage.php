<?php

	include '../../db_connect.php';
	
	// Query for solo parent services
	$sql = "SELECT * FROM client c LEFT JOIN client_general_details g ON c.client_id = g.client_id LEFT JOIN assistance a ON c.client_id = a.client_id 
	WHERE c.client_id = $client_id AND g.interview_id = a.interview_id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc(); 
	
	if ( $row['sex'] == 'Male' ) {
		
	// Required variables
	$firstnamef = $middlenamef = $lastnamef = $sexf = $bdayf = $bplacef = $civilf = $preaddf = $barangayf = "";
	$proaddf = $educf = $skillf = $incomef = $mincomef = $mincomem = $afaddf = $afaddm = $family_headf = $positionf = "";

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

        	
	} else {
		
	// Required variables
	$firstnamem = $middlenamem = $lastnamem = $sexm = $bdaym = $bplacem = $civilm = $preaddm = $barangaym = "";
	$proaddm = $educm = $skillm = $incomem = $mincomem = $mincomef = $afaddm = $afaddf = $family_headm = $positionm = "";

		
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

		
	}
?>