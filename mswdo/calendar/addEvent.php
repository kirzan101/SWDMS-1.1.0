<?php

// Database connection
require_once('connection.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = date('Y-m-d H:i:s', strtotime($_POST['start'])); // date('Y-m-d', strtotime($_POST['start'])); // $_POST['start'];
	$end = date('Y-m-d H:i:s', strtotime($_POST['end']));
	$color = $_POST['color'];

	$sql = "INSERT INTO events(title, start, end, color) values ('$title', '$start', '$end', '$color')";
	//$req = $connection->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $connection->prepare( $sql );
	if ($query == false) {
	 print_r($connection->errorInfo());
	 die ('Error prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
