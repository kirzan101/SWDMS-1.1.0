<?php

// Database connection
require_once('connection.php');

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = date('Y-m-d H:i A', strtotime($_POST['Event'][1])); //$_POST['Event'][1];
	$end = date('Y-m-d H:i A', strtotime($_POST['Event'][2])); //$_POST['Event'][2];

	$sql = "UPDATE events SET  start = '$start', end = '$end' WHERE id = $id ";

	
	$query = $connection->prepare( $sql );
	if ($query == false) {
	 print_r($connection->errorInfo());
	 die ('Error prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error execute');
	}else{
		die ('OK');
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
