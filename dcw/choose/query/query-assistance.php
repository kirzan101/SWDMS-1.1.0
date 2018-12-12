<?php

include '../../db_connect.php';

$stmt = $con->prepare("SELECT * FROM assistance WHERE client_id = ? && interview_id = ? && service_id = ?");
$stmt->bind_param("iii", $client_id, $interview_id, $service_id );
$stmt->execute();
$result = $stmt->get_result();
$assistance = $result->fetch_assoc();
$a_interview_id = $assistance['interview_id'];
$stmt->close();

if (empty($a_interview_id)) {

$serviceErr = '';
$serviceNotif = '';

} else {

$sql = "SELECT * FROM interview WHERE client_id = $client_id && interview_id = $a_interview_id";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$date = $row['interview_date'];
$d = date_parse_from_format("Y-m-d", $date);
$month = $d["month"];

$currMonth = date("m");

$serviceErr = '';
$serviceNotif = '';

if($month == $currMonth){

	$serviceNotif = '1';
	$serviceErr = '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>It seems that the client has ALREADY ACQUIRED this service for this month. Client is ONLY allowed to acquired this service <b>ONCE A MONTH</b>.
                  </div>';

} else {

	$serviceErr = '';

}
}

?>