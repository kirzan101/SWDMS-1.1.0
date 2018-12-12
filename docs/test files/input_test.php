<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$con = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
	
	$usernames = $_POST["username"];
	$passwords = $_POST["password"];
	$admins = $_POST["admins"];
	$test = $_POST["test"];

	$name1 = $_POST["name1"];
$name2 = $_POST["name2"];
$name3 = $_POST["name3"];
$name4 = $_POST["name4"];
$name5 = $_POST["name5"];
$name6 = $_POST["name6"];
$name7 = $_POST["name7"];
$name8 = $_POST["name8"];
$name9 = $_POST["name9"];
$name10 = $_POST["name10"];
$age1 = $_POST["age1"];
$age2 = $_POST["age2"];
$age3 = $_POST["age3"];
$age4 = $_POST["age4"];
$age5 = $_POST["age5"];
$age6 = $_POST["age6"];
$age7 = $_POST["age7"];
$age8 = $_POST["age8"];
$age9 = $_POST["age9"];
$age10 = $_POST["age10"];
$sex1 = $_POST["sex1"];
$sex2 = $_POST["sex2"];
$sex3 = $_POST["sex3"];
$sex4 = $_POST["sex4"];
$sex5 = $_POST["sex5"];
$sex6 = $_POST["sex6"];
$sex7 = $_POST["sex7"];
$sex8 = $_POST["sex8"];
$sex9 = $_POST["sex9"];
$sex10 = $_POST["sex10"];
$civil1 = $_POST["civil1"];
$civil2 = $_POST["civil2"];
$civil3 = $_POST["civil3"];
$civil4 = $_POST["civil4"];
$civil5 = $_POST["civil5"];
$civil6 = $_POST["civil6"];
$civil7 = $_POST["civil7"];
$civil8 = $_POST["civil8"];
$civil9 = $_POST["civil9"];
$civil10 = $_POST["civil10"];
$relation1 = $_POST["relation1"];
$relation2 = $_POST["relation2"];
$relation3 = $_POST["relation3"];
$relation4 = $_POST["relation4"];
$relation5 = $_POST["relation5"];
$relation6 = $_POST["relation6"];
$relation7 = $_POST["relation7"];
$relation8 = $_POST["relation8"];
$relation9 = $_POST["relation9"];
$relation10 = $_POST["relation10"];
$educ1 = $_POST["educ1"];
$educ2 = $_POST["educ2"];
$educ3 = $_POST["educ3"];
$educ4 = $_POST["educ4"];
$educ5 = $_POST["educ5"];
$educ6 = $_POST["educ6"];
$educ7 = $_POST["educ7"];
$educ8 = $_POST["educ8"];
$educ9 = $_POST["educ9"];
$educ10 = $_POST["educ10"];
$skill1 = $_POST["skill1"];
$skill2 = $_POST["skill2"];
$skill3 = $_POST["skill3"];
$skill4 = $_POST["skill4"];
$skill5 = $_POST["skill5"];
$skill6 = $_POST["skill6"];
$skill7 = $_POST["skill7"];
$skill8 = $_POST["skill8"];
$skill9 = $_POST["skill9"];
$skill10 = $_POST["skill10"];
$income1 = $_POST["income1"];
$income2 = $_POST["income2"];
$income3 = $_POST["income3"];
$income4 = $_POST["income4"];
$income5 = $_POST["income5"];
$income6 = $_POST["income6"];
$income7 = $_POST["income7"];
$income8 = $_POST["income8"];
$income9 = $_POST["income9"];
$income10 = $_POST["income10"];

	
	$sql = "INSERT INTO users (username, password, user_type)
			VALUES ('$usernames', '$passwords', 1 );";
			
		if($con->query($sql)){
			$user_id = $con->insert_id;

			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name1', '$age1', '$sex1', '$civil1', '$relation1', '$educ1', '$skill1', '$income1')";

			if($con->query($sql)){
			$user_id = $con->insert_id;
			
			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name2', '$age2', '$sex2', '$civil2', '$relation2', '$educ2', '$skill2', '$income2')";
			
			if($con->query($sql)){
			$user_id = $con->insert_id;
			
			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name3', '$age3', '$sex3', '$civil3', '$relation3', '$educ3', '$skill3', '$income3')";
			
			if($con->query($sql)){
			$user_id = $con->insert_id;
			
			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name4', '$age4', '$sex4', '$civil4', '$relation4', '$educ4', '$skill4', '$income4')";
			
			if($con->query($sql)){
			$user_id = $con->insert_id;
			
			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name5', '$age5', '$sex5', '$civil5', '$relation5', '$educ5', '$skill5', '$income5')";
			
			if($con->query($sql)){
			$user_id = $con->insert_id;
			
			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name6', '$age6', '$sex6', '$civil6', '$relation6', '$educ6', '$skill6', '$income6')";
			
			if($con->query($sql)){
			$user_id = $con->insert_id;
			
			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name7', '$age7', '$sex7', '$civil7', '$relation7', '$educ7', '$skill7', '$income7')";
			
			if($con->query($sql)){
			$user_id = $con->insert_id;
			
			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name8', '$age8', '$sex8', '$civil8', '$relation8', '$educ8', '$skill8', '$income8')";
			
			if($con->query($sql)){
			$user_id = $con->insert_id;
			
			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name9', '$age9', '$sex9', '$civil9', '$relation9', '$educ9', '$skill9', '$income9')";
			
			if($con->query($sql)){
			$user_id = $con->insert_id;
			
			$sql = " INSERT INTO client_general_fam ( user_id, name, fam_age, fam_sex, fam_civil_status, relationship, fam_educ_attainment, fam_skills, fam_income )
						 VALUES ('$user_id', '$name10', '$age10', '$sex10', '$civil10', '$relation10', '$educ10', '$skill10', '$income10')";
			
			if($con->multi_query($sql)){
				
				echo '<script>alert("Patient Successfully Registered");location="test.php";</script>';
			}
			else{
				echo '<script>alert("Error");</script>';
			}
			
			} //2
			} //3
			} //4
			} //5
			} //6
			} //7
			} //8
			} //9
			} //10
		
		}
		else{
			echo '<script>alert("Error, in creating account");</script>';
		}
}
$con->close();
?>