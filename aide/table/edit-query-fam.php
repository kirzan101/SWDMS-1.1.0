<?php

	include '../../db_connect.php';
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 1";
    $result = $con->query($sql);
    $fam1 = $result->fetch_assoc(); 

	// client Table
	$name1 = $fam1['name'];
	$age1 = $fam1['fam_age'];
	$sex1 = $fam1['fam_sex'];
	$birthdate1 = $fam1['birthdates'];
	$income1 = $fam1['fam_income'];
	$civil1 = $fam1['fam_civil_status'];
	$skill1 = $fam1['fam_skills'];
	$relation1 = $fam1['relationship'];
	$educ1 = $fam1['fam_educ_attainment'];
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 2";
    $result = $con->query($sql);
    $fam2 = $result->fetch_assoc(); 

	// client Table
	$name2 = $fam2['name'];
	$age2 = $fam2['fam_age'];
	$sex2 = $fam2['fam_sex'];
	$birthdate2 = $fam2['birthdates'];
	$income2 = $fam2['fam_income'];
	$civil2 = $fam2['fam_civil_status'];
	$skill2 = $fam2['fam_skills'];
	$relation2 = $fam2['relationship'];
	$educ2 = $fam2['fam_educ_attainment'];
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 3";
    $result = $con->query($sql);
    $fam3 = $result->fetch_assoc(); 

	// client Table
	$name3 = $fam3['name'];
	$age3 = $fam3['fam_age'];
	$sex3 = $fam3['fam_sex'];
	$birthdate3 = $fam3['birthdates'];
	$income3 = $fam3['fam_income'];
	$civil3 = $fam3['fam_civil_status'];
	$skill3 = $fam3['fam_skills'];
	$relation3 = $fam3['relationship'];
	$educ3 = $fam3['fam_educ_attainment'];
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 4";
    $result = $con->query($sql);
    $fam4 = $result->fetch_assoc(); 

	// client Table
	$name4 = $fam4['name'];
	$age4 = $fam4['fam_age'];
	$sex4 = $fam4['fam_sex'];
	$birthdate4 = $fam4['birthdates'];
	$income4 = $fam4['fam_income'];
	$civil4 = $fam4['fam_civil_status'];
	$skill4 = $fam4['fam_skills'];
	$relation4 = $fam4['relationship'];
	$educ4 = $fam4['fam_educ_attainment'];
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 5";
    $result = $con->query($sql);
    $fam5 = $result->fetch_assoc(); 

	// client Table
	$name5 = $fam5['name'];
	$age5 = $fam5['fam_age'];
	$sex5 = $fam5['fam_sex'];
	$birthdate5 = $fam5['birthdates'];
	$income5 = $fam5['fam_income'];
	$civil5 = $fam5['fam_civil_status'];
	$skill5 = $fam5['fam_skills'];
	$relation5 = $fam5['relationship'];
	$educ5 = $fam5['fam_educ_attainment'];
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 6";
    $result = $con->query($sql);
    $fam6 = $result->fetch_assoc(); 

	// client Table
	$name6 = $fam6['name'];
	$age6 = $fam6['fam_age'];
	$sex6 = $fam6['fam_sex'];
	$birthdate6 = $fam6['birthdates'];
	$income6 = $fam6['fam_income'];
	$civil6 = $fam6['fam_civil_status'];
	$skill6 = $fam6['fam_skills'];
	$relation6 = $fam6['relationship'];
	$educ6 = $fam6['fam_educ_attainment'];
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 7";
    $result = $con->query($sql);
    $fam7 = $result->fetch_assoc(); 

	// client Table
	$name7 = $fam7['name'];
	$age7 = $fam7['fam_age'];
	$sex7 = $fam7['fam_sex'];
	$birthdate7 = $fam7['birthdates'];
	$income7 = $fam7['fam_income'];
	$civil7 = $fam7['fam_civil_status'];
	$skill7 = $fam7['fam_skills'];
	$relation7 = $fam7['relationship'];
	$educ7 = $fam7['fam_educ_attainment'];
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 8";
    $result = $con->query($sql);
    $fam8 = $result->fetch_assoc(); 

	// client Table
	$name8 = $fam8['name'];
	$age8 = $fam8['fam_age'];
	$sex8 = $fam8['fam_sex'];
	$birthdate8 = $fam8['birthdates'];
	$income8 = $fam8['fam_income'];
	$civil8 = $fam8['fam_civil_status'];
	$skill8 = $fam8['fam_skills'];
	$relation8 = $fam8['relationship'];
	$educ8 = $fam8['fam_educ_attainment'];
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 9";
    $result = $con->query($sql);
    $fam9 = $result->fetch_assoc(); 

	// client Table
	$name9 = $fam9['name'];
	$age9 = $fam9['fam_age'];
	$sex9 = $fam9['fam_sex'];
	$birthdate9 = $fam9['birthdates'];
	$income9 = $fam9['fam_income'];
	$civil9 = $fam9['fam_civil_status'];
	$skill9 = $fam9['fam_skills'];
	$relation9 = $fam9['relationship'];
	$educ9 = $fam9['fam_educ_attainment'];
	
	// Query for client family
	$sql = "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 10";
    $result = $con->query($sql);
    $fam10 = $result->fetch_assoc(); 

	// client Table
	$name10 = $fam10['name'];
	$age10 = $fam10['fam_age'];
	$sex10 = $fam10['fam_sex'];
	$birthdate10 = $fam10['birthdates'];
	$income10 = $fam10['fam_income'];
	$civil10 = $fam10['fam_civil_status'];
	$skill10 = $fam10['fam_skills'];
	$relation10 = $fam10['relationship'];
	$educ10 = $fam10['fam_educ_attainment'];
	
?>