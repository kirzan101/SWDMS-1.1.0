<?php

require_once('connection.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM events WHERE id = $id";
	$query = $connection->prepare( $sql );
	if ($query == false) {
	 print_r($connection->errorInfo());
	 die ('Error prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Error execute');
	}
	
}elseif (isset($_POST['title']) && isset($_POST['id']) && isset($_POST['start']) && isset($_POST['end'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$start = date('Y-m-d H:i:s', strtotime($_POST['start']));
	$end = date('Y-m-d H:i:s', strtotime($_POST['end']));
	
	$sql = "UPDATE events SET  title = '$title', start = '$start', end = '$end' WHERE id = $id ";

	
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
header('Location: calendar.php');

	
?>
