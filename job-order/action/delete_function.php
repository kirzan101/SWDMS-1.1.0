<?php 

$connection  = mysqli_connect('localhost','root','Canaman2018' , 'swdo'); 


if(isset($_POST['data'])){
	$dataArr = $_POST['data'] ; 
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_general_fam where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_general_details where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_dwyna_details where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_child_details where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_death_aid_details where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_indigency_details where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_couple where client_couple_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_refferal_details where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_scsr_details where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_solo_details where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_solo_fam where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_training_details where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client_pwd_solo where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM interview_log where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM assistance where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM interview where client_id='$id'");
	}
	
	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM client where client_id='$id'");
	}
	

}

?>