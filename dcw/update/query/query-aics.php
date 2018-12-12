<?php
	include '../../db_connect.php';
	
	// Query for AICS services

	$sql = "SELECT * FROM client c LEFT JOIN client_general_details g ON c.client_id = g.client_id LEFT JOIN assistance a ON c.client_id = a.client_id WHERE c.client_id = $client_id AND a.interview_id = g.interview_id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc(); 

	// client Table
	$firstname = $row['first_name'];
	$middlename = $row['middle_name'];
	$lastname = $row['last_name'];
	$age = $row['age'];
	$sex = $row['sex'];
	$bday = $row['date_of_birth'];
	$bplace = $row['place_of_birth'];
	$preadd = $row['address'];
	$educ = $row['educ_attainment'];
	$barangay = $row['barangay'];
	$income = $row['income'];
	$civil = $row['civil_status'];
	$skill = $row['skills'];
	$contactno = $row['contact_no'];
	
	// client_general_details Table
	$religion = $row['religion'];
	$telephone = $row['telephone'];
	$philn = $row['philhealth_no'];
	$reff1 = $row['referral1'];
	$reff2 = $row['referral2'];
	$areff1 = $row['referral_contact1'];
	$areff2 = $row['referral_contact2'];
	$house = $row['house'];
	$lot = $row['lot'];

?>