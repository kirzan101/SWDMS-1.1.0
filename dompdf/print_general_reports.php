<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$from = $_GET['From'];
$to = $_GET['to'];
$from_month = date('F Y', strtotime($_GET['From']));
$to_month = date('F Y', strtotime($_GET['to']));

$sql = "SELECT * FROM client_couple";
if ($result = mysqli_query($con,$sql)) {
			
$couple=mysqli_num_rows($result);
mysqli_free_result($result);
}
	// SCSR
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 13 AND l.service_id = 13 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$scsrm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 13 AND l.service_id = 13 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$scsrf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	//	CICL
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 6 AND l.service_id = 6 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$ciclm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 6 AND l.service_id = 6 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$ciclf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	// RLOA	
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 12 AND l.service_id = 12 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$rloam = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 12 AND l.service_id = 12 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$rloaf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
	// Livelihood
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 11 AND l.service_id = 11 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$livelihoodm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 12 AND l.service_id = 1 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$livelihoodf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	
	// DWYNA - physical
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Physical Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_physicalm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Physical Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_physicalf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	// DWYNA - sexual	
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Sexual Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_sexualm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
 	
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Sexual Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_sexualf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	// DWYNA - verbal	
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Verbal Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_verbalm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Verbal Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_verbalf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	
	// DWYNA - psychological
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Psychological Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_psychologicalm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Psychological Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_psychologicalf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	// DWYNA - emotional
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Emotional Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_emotionalm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Emotional Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_emotionalf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	// DWYNA - Economic/Financial	
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Economic/Financial Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_economicm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Economic/Financial Abuse' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$dwyna_economicf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	// Indigency
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 14 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$indigencym = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 14 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$indigencyf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	// Solo parent - upper class
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND s.income_monthly >= 50000.00 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$upperm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND s.income_monthly >= 50000.00 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$upperf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	// Solo parent - middle class	
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND s.income_monthly >= 10001.00 AND s.income_monthly <= 49999.00 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$middlem = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND s.income_monthly >= 10001.00 AND s.income_monthly <= 49999.00 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$middlef = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}

	// Solo parent - Indigent class
	
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND s.income_monthly <= 10000.00 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$indigentm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND s.income_monthly <= 10000.00 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$indigentf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
	// PWD - Minor
	
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND s.details = 'Person with Disability ID' AND c.age <= 18 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$minorm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND s.details = 'Person with Disability ID' AND c.age <= 18 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$minorf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
	// PWD - Adult
	
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND s.details = 'Person with Disability ID' AND c.age BETWEEN '19' AND '59' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$adultm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND s.details = 'Person with Disability ID' AND c.age BETWEEN '19' AND '59' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$adultf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
	// PWD - Senior Citizen
	
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND s.details = 'Person with Disability ID' AND c.age >= 60 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$seniorm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND s.details = 'Person with Disability ID' AND c.age >= 60 AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$seniorf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
	// AICS - Burial
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 1 AND l.service_id = 1 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$burialm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 1 AND l.service_id = 1 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$burialf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
	// AICS - Educational
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 2 AND l.service_id = 2 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$educationalm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 2 AND l.service_id = 2 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$educationalf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
	// AICS - Food
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 3 AND l.service_id = 3 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$foodm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 3 AND l.service_id = 3 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$foodf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
		// AICS - Medical
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 4 AND l.service_id = 4 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$medicalm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 4 AND l.service_id = 4 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$medicalf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
		// AICS - Transportation
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 5 AND l.service_id = 5 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$transportationm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 5 AND l.service_id = 5 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$transportationf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	
	// Death Aid Assistance - PWD
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a  INNER JOIN client c,  interview i,  client_death_aid_details d  WHERE a.client_id = c.client_id  AND  a.interview_id = i.interview_id  AND  a.interview_id = d.interview_id  AND  a.service_id = 10  AND  c.sex = 'Male'  AND  c.status = 'ACTIVE'  AND  i.interview_id = d.interview_id  AND d.category = 'Person with Disability'  AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$deathaidpwdm = mysqli_num_rows($result);
			mysqli_free_result($result);

		}
		}
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a  INNER JOIN client c,  interview i,  client_death_aid_details d  WHERE a.client_id = c.client_id  AND  a.interview_id = i.interview_id  AND  a.interview_id = d.interview_id  AND  a.service_id = 10  AND  c.sex = 'Female'  AND  c.status = 'ACTIVE'  AND  i.interview_id = d.interview_id  AND d.category = 'Person with Disability'  AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$deathaidpwdf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
		
		// Death Aid Assistance - Senior Citizen
		
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a  INNER JOIN client c,  interview i,  client_death_aid_details d  WHERE a.client_id = c.client_id  AND  a.interview_id = i.interview_id  AND  a.interview_id = d.interview_id  AND  a.service_id = 10  AND  c.sex = 'Male'  AND  c.status = 'ACTIVE'  AND  i.interview_id = d.interview_id  AND d.category = 'Senior Citizen'  AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$deathaidm = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
if($con->query($sql)){

			$sql =  "SELECT * FROM assistance a  INNER JOIN client c,  interview i,  client_death_aid_details d  WHERE a.client_id = c.client_id  AND  a.interview_id = i.interview_id  AND  a.interview_id = d.interview_id  AND  a.service_id = 10  AND  c.sex = 'Female'  AND  c.status = 'ACTIVE'  AND  i.interview_id = d.interview_id  AND d.category = 'Senior Citizen'  AND i.interview_date BETWEEN '$from' AND '$to'";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$deathaidf = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		}
	
// Add another query for sc and pwd
	
	// Amount
	
if($con->query($sql)){

			$sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 1 AND l.service_id = 1 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id   AND i.interview_date BETWEEN '$from' AND '$to'";
			
			$result = $con->query($sql); 
			while ($row = $result->fetch_assoc()) { 
			$burialamount = $row['total']; 
			}
		}
		
if($con->query($sql)){

			$sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 2 AND l.service_id = 2 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id   AND i.interview_date BETWEEN '$from' AND '$to'";
			
			$result = $con->query($sql); 
			while ($row = $result->fetch_assoc()) { 
			$educationalamount = $row['total']; 
			}
		}
		
if($con->query($sql)){

			$sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 3 AND l.service_id = 3 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id   AND i.interview_date BETWEEN '$from' AND '$to'";
			
			$result = $con->query($sql); 
			while ($row = $result->fetch_assoc()) { 
			$foodamount = $row['total']; 
			}
		}
		
if($con->query($sql)){

			$sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 4 AND l.service_id = 4 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id   AND i.interview_date BETWEEN '$from' AND '$to'";
			
			$result = $con->query($sql); 
			while ($row = $result->fetch_assoc()) { 
			$medicalamount = $row['total']; 
			}
		}
		
if($con->query($sql)){

			$sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id =5 AND l.service_id = 5 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id   AND i.interview_date BETWEEN '$from' AND '$to'";
			
			$result = $con->query($sql); 
			while ($row = $result->fetch_assoc()) { 
			$transportationamount = $row['total']; 
			}
		}

if($con->query($sql)){

			$sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, client_death_aid_details d WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 10 AND c.status = 'ACTIVE' AND i.interview_id = d.interview_id AND d.category = 'Senior Citizen' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			$result = $con->query($sql); 
			while ($row = $result->fetch_assoc()) { 
			$deathaidamount = $row['total']; 
			}
		}

if($con->query($sql)){

			$sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, client_death_aid_details d WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 10 AND c.status = 'ACTIVE' AND i.interview_id = d.interview_id AND d.category = 'Person with Disability' AND i.interview_date BETWEEN '$from' AND '$to'";
			
			$result = $con->query($sql); 
			while ($row = $result->fetch_assoc()) { 
			$deathaidpwdamount = $row['total']; 
			}
		}
		
if($con->query($sql)){

		$totalm = $burialm + $educationalm + $foodm + $medicalm + $transportationm + $scsrm + $ciclm + $rloam + $livelihoodm + $dwyna_physicalm +$dwyna_sexualm + $dwyna_verbalm + $dwyna_psychologicalm + $dwyna_emotionalm + $dwyna_economicm + $indigencym + $upperm + $middlem + $indigentm + $minorm + $adultm + $seniorm + $deathaidpwdm + $deathaidm;
		$totalf = $burialf + $educationalf + $foodf + $medicalf + $transportationf + $scsrf + $ciclf + $rloaf + $livelihoodf + $dwyna_physicalf +$dwyna_sexualf + $dwyna_verbalf + $dwyna_psychologicalf + $dwyna_emotionalf + $dwyna_economicf + $indigencyf + $upperf + $middlef + $indigentf + $minorf + $adultf + $seniorf + $deathaidpwdmf + $deathaidf;
		$totalamount = $burialamount + $educationalamount + $foodamount + $medicalamount + $transportationamount + $deathaidpwdamount + $deathaidamount;
		
		}

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
        $pdf_filename = 'general_report';


$this_html ="
<!DOCTYPE html>
<html>
<title>Print General Report</title>

<center>
	<img src='images/dswd-logo.jpg' style='margin-right: 5%;' alt='images/dswd-logo' width='100' height='100' align='right' style='display: block; margin-left: 1% ; '>
	<img src='images/canaman-seal.png' style='margin-left: 5%;' alt='images/canaman-seal' width='100' height='100' align='left' style='display: block; margin-right: 1%;'>
	<h4 style='margin:0;'><b>Republic of the Philippines</b></h4>
	<h4 style='margin:0;'><b>Province of Camarines Sur</b></h4>
	<h4 style='margin:0;'><b>Municipality of Canaman</b></h4>
	<h4 style='margin:0;'><b>Tel. (054)881-27-08</b></h4>
    <h4 style='margin:0;'><b>Email:</b> <u>mswdo_canaman@yahoo.com</u></h4>
	<h4 style='margin:0;'><b>MUNICIPAL SOCIAL WELFARE AND DEVELOPMENT OFFICE</b></h4>
<hr>
	<h3 style='margin-bottom:0.1cm;margin-top:0.1cm;margin-bottom:0.1cm'><b>General Report</b></h3>
	<h4 style='margin:0;'><i>".$from_month." to ".$to_month."</i></h4>
</center>
<br>
<style>

@page { 
	margin: 0.5cm;
	margin-top: 0.5cm;
	margin-bottom: 0.1cm;
}

table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>

<table style='background: white;width: 100%; margin-bottom:0.5cm; border: 1px solid black;' >
    <thead>
        <tr>
            <th style='  text-transform: uppercase;' rowspan='2'>Services</th>
            <th style='  text-transform: uppercase;' colspan='3'>No. of Client</th>
			<th style='  text-transform: uppercase;' rowspan='2'>Amount</th>
        </tr>
        <tr>
            <th style='  text-transform: uppercase;'>Male</th>
            <th style='  text-transform: uppercase;'>Female</th>
            <th style='  text-transform: uppercase;'>Couple</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><b>Pre-marriage Counselling</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'><b>".$couple."</b></td>
            <td style=' text-align: center;'></td>
        </tr>
        <tr>
            <td><b>Social Case Study</b></td>
            <td style=' text-align: center;'>".$scsrm."</td>
            <td style=' text-align: center; '>".$scsrf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
        <tr>
            <td><b>Children in Conflict with the Law</b></td>
            <td style=' text-align: center;'>".$ciclm."</td>
            <td style=' text-align: center; '>".$ciclf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
        <tr>
            <td><b>Referral to other Agency</b></td>
            <td style=' text-align: center;'>".$rloam."</td>
            <td style=' text-align: center; '>".$rloaf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td><b>Livelihood Assistance</b></td>
            <td style=' text-align: center;'>".$livelihoodm."</td>
            <td style=' text-align: center;'>".$livelihoodf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
        <tr>
            <td><b>Disadvantaged Women, Youth & Othe Needy Adult</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center; '></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp; *Physical Abuse</td>
            <td style=' text-align: center;'>".$dwyna_physicalm."</td>
            <td style=' text-align: center; '>".$dwyna_physicalf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
        <tr>
            <td>&nbsp; *Sexual Abuse</td>
            <td style=' text-align: center;'>".$dwyna_sexualm."</td>
            <td style=' text-align: center; '>".$dwyna_sexualf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp; *Verbal Abuse</td>
            <td style=' text-align: center;'>".$dwyna_verbalm."</td>
            <td style=' text-align: center; '>".$dwyna_verbalf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
        <tr>
            <td>&nbsp; *Psychological Abuse</td>
            <td style=' text-align: center;'>".$dwyna_psychologicalm."</td>
            <td style=' text-align: center; '>".$dwyna_psychologicalf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp; *Emotional Abuse</td>
            <td style=' text-align: center;'>".$dwyna_emotionalm."</td>
            <td style=' text-align: center; '>".$dwyna_emotionalf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
        <tr>
            <td>&nbsp; *Economic/Financial Abuse</td>
            <td style=' text-align: center;'>".$dwyna_economicm."</td>
            <td style=' text-align: center; '>".$dwyna_economicf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td><b>Certificate of Indigency</b></td>
            <td style=' text-align: center;'>".$indigencym."</td>
            <td style=' text-align: center; '>".$indigencyf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
        <tr>
            <td><b>Issuance of Solo Parent and PWD ID</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center; '></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp; *Solo Parent</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center; '></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp;&nbsp; A - Upper Class</td>
            <td style=' text-align: center;'>".$upperm."</td>
            <td style=' text-align: center; '>".$upperf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp;&nbsp; B - Middle Class</td>
            <td style=' text-align: center;'>".$middlem."</td>
            <td style=' text-align: center; '>".$middlef."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp;&nbsp; C - Indigent</td>
            <td style=' text-align: center;'>".$indigentm."</td>
            <td style=' text-align: center; '>".$indigentf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp; *Person with Disability (PWD)</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center; '></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp;&nbsp; Minor: 0-18</td>
            <td style=' text-align: center;'>".$minorm."</td>
            <td style=' text-align: center; '>".$minorf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp;&nbsp; Adult: 19-59</td>
            <td style=' text-align: center;'>".$adultm."</td>
            <td style=' text-align: center; '>".$adultf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp;&nbsp; Senior Citizen: 60+</td>
            <td style=' text-align: center;'>".$seniorm."</td>
            <td style=' text-align: center; '>".$seniorf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
        <tr>
            <td><b>Aid to Individual in Crisis Situation</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center; '></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp; *Burial Assistance</td>
            <td style=' text-align: center;'><b>".$burialm."</b></td>
            <td style=' text-align: center; '><b>".$burialf."</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'>".$burialamount."</td>
        </tr>
		<tr>
            <td>&nbsp; *Educational Assistance</td>
            <td style=' text-align: center;'><b>".$educationalm."</b></td>
            <td style=' text-align: center; '><b>".$educationalf."</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'>".$educationalamount."</td>
        </tr>
		<tr>
            <td>&nbsp; *Food Assistance</td>
            <td style=' text-align: center;'><b>".$foodm."</b></td>
            <td style=' text-align: center; '><b>".$foodf."</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'>".$foodamount."</td>
        </tr>
		<tr>
            <td>&nbsp; *Medical Assistance</td>
            <td style=' text-align: center;'><b>".$medicalm."</b></td>
            <td style=' text-align: center; '><b>".$medicalf."</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'>".$medicalamount."</td>
        </tr>
		<tr>
            <td>&nbsp; *Transportation Assistance</td>
            <td style=' text-align: center;'><b>".$transportationm."</b></td>
            <td style=' text-align: center;'><b>".$transportationf."</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'>".$transportationamount."</td>
        </tr>
		<tr>
            <td><b>PWD and Senior Citizen Death Aid</b></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center; '></td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'></td>
        </tr>
		<tr>
            <td>&nbsp; *Person with Disability</td>
            <td style=' text-align: center;'>".$deathaidpwdm."</td>
            <td style=' text-align: center; '>".$deathaidpwdf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'>".$deathaidpwdamount."</td>
        </tr>
		<tr>
            <td>&nbsp; *Senior Citizen</td>
            <td style=' text-align: center;'>".$deathaidm."</td>
            <td style=' text-align: center; '>".$deathaidf."</td>
            <td style=' text-align: center;'></td>
            <td style=' text-align: center;'>".$deathaidamount."</td>
        </tr>
        <tr>
            <td><b>Total:</b></td>
            <td style=' text-align: center;'><b>".$totalm."</b></td>
            <td style=' text-align: center; '><b>".$totalf."</b></td>
            <td style=' text-align: center;'><b>".$couple."</b></td>
            <td style=' text-align: center;'><b>P".number_format("$totalamount",2)."</b></td>
        </tr>

    </tbody>
</table>



</html>
";

$dompdf->loadHtml($this_html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'Portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
$new = str_replace(" ", "", $pdf_filename);
// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream($new,array("Attachment"=>0));
?>

