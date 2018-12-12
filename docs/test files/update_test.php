<?php
	
	include "../../db_connect.php";


	if(isset($_POST['SubmitUpdatePatient'])){
		$firstname = $_POST["firstname"];
		$middlename = $_POST["middlename"];
		$lastname =  $_POST["lastname"];
		$street = $_POST["street"];
		$barangay = $_POST["barangay"];
		$city = $_POST["city"];
		$contact_no = $_POST["contact_no"];
		$birthday = $_POST["birthday"];
		$philhealth = $_POST["philhealth"];
		$s_firstname = $_POST["s_firstname"];
		$s_middlename = $_POST["s_middlename"];
		$s_lastname = $_POST["s_lastname"];
		$s_contact = $_POST["s_contact"];
		$doctor = $_POST["doctor_id"];
		$patient_id = $_POST['patient_id'];

		$sql = "UPDATE patient SET `firstname` = '$firstname', 
									`middlename` = '$middlename', 
									`lastname` = '$lastname', 
									`street` = '$street',
									`barangay` = '$barangay',
									`city` = '$city',  
									`contact_no` = '$contact_no', 
									`birthdate` = '$birthday', 
									`philhealth_no` = '$philhealth', 
									`spouse_firstname` = '$s_firstname', 
									`spouse_middlename` = '$s_middlename', 
									`spouse_lastname` = '$s_lastname', 
									`spouse_contact_no` = '$s_contact',
									`doctor_id` = '$doctor' 
				WHERE patient_id = '$patient_id' ";

		if($con->query($sql)){
			echo '<script>alert("Patient Information Updated");location="../patient_profile.php?patient_id='.$patient_id.'";</script>';
		}
		else{
			echo '<script>alert("Error");location="../patient_update_form.php?patient_id='.$patient_id.'";</script>';
		}
	}
?>